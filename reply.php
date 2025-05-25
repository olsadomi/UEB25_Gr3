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
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 600px; margin: 0 auto; }
        label { display: block; margin-top: 10px; }
        input[type="email"], input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea { height: 150px; }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
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