<?php
require_once 'sendNewsletter.php';
require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($subject) || empty($message)) {
        echo "Ju lutem plotësoni të gjitha fushat.";
        exit;
    }

    $emails = [];
    $result = $conn->query("SELECT email FROM newsletter_subscribers");
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }
    $conn->close();

    if (empty($emails)) {
        echo "Nuk ka abonentë për të dërguar newsletter-in.";
        exit;
    }

    if (sendNewsletter($subject, $message, $emails)) {
        echo "Newsletter-i u dërgua me sukses!";
    } else {
        echo "Dërgimi dështoi.";
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
