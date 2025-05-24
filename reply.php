<?php
if (isset($_GET['email'])) {
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
} else {
    die("Email i pasaktë.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Header për të përdorur një email "nga" Gmail ose Yahoo
    $headers = "From: youremail@gmail.com\r\n";
    $headers .= "Reply-To: youremail@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Dërgo emailin
    if (mail($to, $subject, $message, $headers)) {
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
</head>
<body>
<h2>Dërgo Email</h2>
<form method="post">
    <label>To:</label><br>
    <input type="email" name="to" value="<?php echo htmlspecialchars($email); ?>" readonly><br><br>

    <label>Subject:</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Mesazhi:</label><br>
    <textarea name="message" rows="6" cols="40" required></textarea><br><br>

    <input type="submit" value="Dërgo Email">
</form>
</body>
</html>
