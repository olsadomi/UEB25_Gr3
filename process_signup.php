<?php
header('Content-Type: application/json');

require_once 'db.php';

$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phone = trim($_POST['phone']);

    if (strlen($name) < 2 || strlen($surname) < 2) {
        $response['errors'][] = "Emri dhe mbiemri duhet të kenë të paktën 2 shkronja.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = "Email-i nuk është i vlefshëm.";
    }

    if (strlen($password) < 6) {
        $response['errors'][] = "Fjalëkalimi duhet të ketë të paktën 6 karaktere.";
    }

    if ($password !== $confirmPassword) {
        $response['errors'][] = "Fjalëkalimet nuk përputhen.";
    }

    if (empty($response['errors'])) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $response['errors'][] = "Ky email është regjistruar më parë.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password, phone) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $surname, $email, $hashedPassword, $phone);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['redirect'] = 'login.php';
                $response['message'] = "Regjistrimi u krye me sukses!";
            } else {
                $response['errors'][] = "Dështoi regjistrimi. Ju lutemi provoni përsëri.";
            }

            $stmt->close();
        }

        $checkStmt->close();
    }

    $conn->close();
} else {
    $response['errors'][] = "Metoda e kërkesës nuk është e vlefshme.";
}

echo json_encode($response);
exit;
?>