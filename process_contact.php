<?php
header('Content-Type: application/json');

$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Lidhja me DB dështoi: ' . mysqli_connect_error()]));
}


class CustomValidationException extends Exception {}

$response = ['success' => false, 'message' => '', 'errors' => []];

try {

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $surname = isset($_POST['surname']) ? trim($_POST['surname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $message_type = isset($_POST['lloji']) ? trim($_POST['lloji']) : '';
    $message = isset($_POST['mesazhi']) ? trim($_POST['mesazhi']) : '';
    $contact_method = isset($_POST['contact-method']) ? trim($_POST['contact-method']) : '';

    $errors = [];

    if (!preg_match("/^[a-zA-ZëËçÇ]{2,20}$/u", $name)) {
        $errors[] = "Emri nuk është i vlefshëm (vetëm shkronja, 2-20 karaktere).";
    }

    if (!preg_match("/^[a-zA-ZëËçÇ]{2,20}$/u", $surname)) {
        $errors[] = "Mbiemri nuk është i vlefshëm (vetëm shkronja, 2-20 karaktere).";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email-i nuk është i vlefshëm.";
    }

    if (!preg_match("/^\+?\(?\d{1,9}\)?[-\s]?\(?\d{2,3}\)?[-\s]?\d{3}[-\s]?\d{3,4}$/", $phone)) {
        $errors[] = "Numri i telefonit nuk është i vlefshëm.";
    }

    $valid_types = ["sugjerim", "kerkese", "ankese", "tjeter"];
    if (!in_array($message_type, $valid_types)) {
        $errors[] = "Zgjedhni një lloj të vlefshëm të mesazhit.";
    }

    $allowed_methods = ["Email", "Thirrje telefonike", "SMS"];
    if (!in_array($contact_method, $allowed_methods)) {
        $errors[] = "Zgjedhni një mënyrë të vlefshme kontakti.";
    }

    if (empty($message)) {
        $errors[] = "Mesazhi nuk mund të jetë bosh.";
    }

    if (!empty($errors)) {
        throw new CustomValidationException(implode('|', $errors));
    }

    preg_match_all('/\d/', $message, $matches);
    $numberCount = count($matches[0]);

    $stmt = $conn->prepare("INSERT INTO contacts (name, surname, email, phone, message_type, message, contact_method) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $surname, $email, $phone, $message_type, $message, $contact_method);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Faleminderit për mesazhin tuaj! Do t\'ju kontaktojmë së shpejti.';
    } else {
        throw new Exception('Gabim gjatë ruajtjes së të dhënave: ' . $stmt->error);
    }

    $stmt->close();
    
} catch (CustomValidationException $e) {
    $errorList = explode('|', $e->getMessage());
    $response['errors'] = $errorList;
    
} catch (Exception $e) {
    $response['errors'] = [$e->getMessage()];
} finally {
    $conn->close();
}

echo json_encode($response);
?>