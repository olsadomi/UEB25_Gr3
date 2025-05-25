<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "db.php";

error_log('Received POST data: ' . print_r($_POST, true));

$car_brand = isset($_POST['car_brand']) ? htmlspecialchars($_POST['car_brand']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$request_text = isset($_POST['request_text']) ? htmlspecialchars($_POST['request_text']) : '';

if (empty($car_brand) || empty($email) || empty($request_text)) {
    error_log('Validation failed: Empty fields');
    die(json_encode(['success' => false, 'message' => 'Të gjitha fushat duhet të plotësohen']));
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    error_log('Validation failed: Invalid email');
    die(json_encode(['success' => false, 'message' => 'Email jo valid']));
}

$sql = "INSERT INTO rental_requests (car_brand, email, request_text) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log('Prepare failed: ' . $conn->error);
    die(json_encode(['success' => false, 'message' => 'Prepare failed']));
}

$stmt->bind_param("sss", $car_brand, $email, $request_text);

if ($stmt->execute()) {
    error_log('Insert successful');
    echo json_encode(['success' => true, 'message' => 'Kërkesa juaj u dërgua me sukses!']);
} else {
    error_log('Execute failed: ' . $stmt->error);
    echo json_encode(['success' => false, 'message' => 'Gabim në databazë']);
}

$stmt->close();
$conn->close();
?>