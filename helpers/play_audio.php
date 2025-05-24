<?php
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Only POST requests allowed']);
    exit;
}

if (!isset($_POST['action']) || $_POST['action'] !== 'play_audio') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

echo json_encode([
    'status' => 'success',
    'message' => 'Audio play request received'
]);
exit;