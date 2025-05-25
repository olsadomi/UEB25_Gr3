<?php
require_once 'db.php';
require_once 'reply_sender.php';

if (isset($_GET['email'])) {
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $request_id = isset($_GET['request_id']) ? intval($_GET['request_id']) : 0;
} else {
    die("Email i pasaktë.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $request_id = isset($_POST['request_id']) ? intval($_POST['request_id']) : 0;

    if (sendContactReply($to, $subject, $message)) {
        
        if ($request_id > 0) {
            $stmt = $conn->prepare("UPDATE rental_requests SET replied_at = NOW() WHERE id = ?");
            $stmt->bind_param("i", $request_id);
            $stmt->execute();
            $stmt->close();
        }
        
        $success_message = "<p style='color:green;'>Emaili u dërgua me sukses!</p>";
    } else {
        $error_message = "<p style='color:red;'>Dështoi dërgimi i emailit.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Përgjigju Kërkesës për Makinë</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            color: #333;
            text-align: center;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="email"],
        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #2196F3;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Dërgo Email Përgjigje</h2>
    
    <?php if (isset($success_message)) echo $success_message; ?>
    <?php if (isset($error_message)) echo $error_message; ?>
    
    <form method="post">
        <input type="hidden" name="request_id" value="<?= $request_id ?>">
        
        <label>Për:</label>
        <input type="email" name="to" value="<?= htmlspecialchars($email); ?>" readonly>
        
        <label>Subjekti:</label>
        <input type="text" name="subject" value="Përgjigje ndaj kërkesës suaj për makinë" required>
        
        <label>Mesazhi:</label>
        <textarea name="message" required></textarea>
        
        <input type="submit" value="Dërgo Email">
    </form>
    
    <a href="admin_rental_requests.php" class="back-link">Kthehu te lista e kërkesave</a>
</body>
</html>