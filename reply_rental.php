<?php
require_once 'db.php';
require_once 'reply_sender_rental.php';

if (isset($_GET['email'])) {
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    $car_brand = '';
    if ($id > 0) {
        $stmt = $conn->prepare("SELECT car_brand FROM rental_requests WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $car_brand = $row['car_brand'];
        }
        $stmt->close();
    }
} else {
    die("Email i pasaktë.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $car_brand = isset($_POST['car_brand']) ? $_POST['car_brand'] : '';

    if (sendRentalReply($to, $subject, $message, $car_brand)) {
        if ($id > 0) {
            $stmt = $conn->prepare("UPDATE rental_requests SET replied_at = NOW() WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
        
        $success_message = "<div class='status-message success'>Emaili u dërgua me sukses!</div>";
    } else {
        $error_message = "<div class='status-message error'>Dështoi dërgimi i emailit.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Përgjigju Kërkesës për Makinë</title>
    <link rel="stylesheet" href="reply_rental.css">
</head>
<body>
    <div class="reply-container">
        <h2>Dërgo Përgjigje</h2>
        
        <?php if (isset($success_message)) echo $success_message; ?>
        <?php if (isset($error_message)) echo $error_message; ?>
        
        <?php if (!empty($car_brand)): ?>
            <div class="car-brand-info">
                <strong>Kërkesa për:</strong> <?= htmlspecialchars($car_brand) ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="car_brand" value="<?= htmlspecialchars($car_brand) ?>">
            
            <label>Për:</label>
            <input type="email" name="to" value="<?= htmlspecialchars($email); ?>" readonly>
            
            <label>Subjekti:</label>
            <input type="text" name="subject" value="Përgjigje ndaj kërkesës suaj për makinë <?= !empty($car_brand) ? ' - ' . htmlspecialchars($car_brand) : '' ?>" required>
            
            <label>Mesazhi:</label>
            <textarea name="message" required></textarea>
            
            <input type="submit" value="Dërgo Email">
        </form>
        
        <a href="admin_rental_requests.php" class="back-link">Kthehu te lista e kërkesave</a>
    </div>
</body>
</html>