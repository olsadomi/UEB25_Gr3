<?php 
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendContactReply($to, $subject, $message, $fromEmail = 'harold.robel49@ethereal.email', $fromName = 'Prishtina Airport') {
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.ethereal.email';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'harold.robel49@ethereal.email';     
        $mail->Password   = 'Re2je4qvPQ2VjMzBjT';        
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to); 
        $mail->isHTML(true);
        $mail->Subject = $subject; 
        $mail->Body    = "Faleminderit per kontaktimin.<br><br>"
                       . "<i>" . nl2br(htmlspecialchars($message)) . "</i>";

        

        return $mail->send();
    } catch (Exception $e) {
        error_log("Gabim në dërgimin e emailit: " . $e->getMessage());
        return false;
    }
}
?>