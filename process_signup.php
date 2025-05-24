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

    if (empty($name)) {
        $response['errors'][] = "Emri është i detyrueshëm.";
    } elseif (strlen($name) < 2 || strlen($name) > 50) {
        $response['errors'][] = "Emri duhet të ketë midis 2 dhe 50 shkronjave.";
    } elseif (!preg_match('/^[\p{L}\s\'-]+$/u', $name)) {
        $response['errors'][] = "Emri përmban karaktere të palejuara (vetëm shkronja, hapësira, apostrofë ose vizë).";
    }

    if (empty($surname)) {
        $response['errors'][] = "Mbiemri është i detyrueshëm.";
    } elseif (strlen($surname) < 2 || strlen($surname) > 50) {
        $response['errors'][] = "Mbiemri duhet të ketë midis 2 dhe 50 shkronjave.";
    } elseif (!preg_match('/^[\p{L}\s\'-]+$/u', $surname)) {
        $response['errors'][] = "Mbiemri përmban karaktere të palejuara (vetëm shkronja, hapësira, apostrofë ose vizë).";
    }

    if (empty($email)) {
        $response['errors'][] = "Email-i është i detyrueshëm.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = "Email-i nuk është i vlefshëm.";
    } elseif (strlen($email) > 100) {
        $response['errors'][] = "Email-i nuk mund të jetë më i gjatë se 100 karaktere.";
    }

    if (empty($password)) {
        $response['errors'][] = "Fjalëkalimi është i detyrueshëm.";
    } elseif (strlen($password) < 8) {
        $response['errors'][] = "Fjalëkalimi duhet të ketë të paktën 8 karaktere.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $response['errors'][] = "Fjalëkalimi duhet të përmbajë të paktën një shkronjë të madhe.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $response['errors'][] = "Fjalëkalimi duhet të përmbajë të paktën një numër.";
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $response['errors'][] = "Fjalëkalimi duhet të përmbajë të paktën një karakter special (e.g., !@#$%^&*).";
    }

    if ($password !== $confirmPassword) {
        $response['errors'][] = "Fjalëkalimet nuk përputhen.";
    }

    if (empty($phone)) {
        $response['errors'][] = "Numri i telefonit është i detyrueshëm.";
    } elseif (!preg_match('/^\+?[0-9]{8,15}$/', $phone)) {
        $response['errors'][] = "Numri i telefonit duhet të jetë midis 8 dhe 15 shifrave (mund të fillojë me +).";
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