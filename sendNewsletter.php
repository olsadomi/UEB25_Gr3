<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendNewsletter($subject, $messageHtml, $subscribers) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.ethereal.email';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'harold.robel49@ethereal.email';
        $mail->Password   = 'Re2je4qvPQ2VjMzBjT';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('harold.robel49@ethereal.email', 'Aeroporti i Prishtinës');
        $mail->addAddress('harold.robel49@ethereal.email'); 
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $messageHtml;

        foreach ($subscribers as $email) {
            $mail->addBCC($email); 
        }

        return $mail->send();
    } catch (Exception $e) {
        error_log("Gabim në dërgimin e newsletter-it: " . $e->getMessage());
        return false;
    }
}
