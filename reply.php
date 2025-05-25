<?php
require_once 'reply_sender.php';

if (isset($_GET['email'])) {
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
} else {
    die("Email i pasaktë.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (sendContactReply($to, $subject, $message)) {
        echo "<p style='color:green;'>Emaili u dërgua me sukses!</p>";
    } else {
        echo "<p style='color:red;'>Dështoi dërgimi i emailit.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Përgjigju Kontaktes</title>
    <link rel="stylesheet" href="reply.css">
</head>
<body>
    <h2>Dërgo Email Përgjigje</h2>
    <form method="post">
        <label>Për:</label>
        <input type="email" name="to" value="<?php echo htmlspecialchars($email); ?>" readonly>
        
        <label>Subjekti:</label>
        <input type="text" name="subject" value="Pergjigje ndaj kontaktit tuaj" required>
        
        <label>Mesazhi:</label>
        <textarea name="message" required></textarea>
        
        <input type="submit" value="Dërgo Email">
    </form>
</body>
</html>