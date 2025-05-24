<?php

session_start();
require 'db.php';

$created_by = $_SESSION['user_id'] ?? 1;

$title = $_POST['title'];
$content = $_POST['content'];
$category = $_POST['category'];

$target_direction = "fotot/";
$image_name = basename($_FILES["image"]["name"]);
$target_file = $target_direction . time() . "_" . $image_name;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $stmt = $conn->prepare("INSERT INTO news (title, content, category, image_path, created_by) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $title, $content, $category, $target_file, $created_by);

    if ($stmt->execute()) {
        header("Location: news.php?success=1");
        exit();
    } else {
        echo "Gabim gjate futjes se lajmit: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Gabim gjate ngarkimit te fotos.";
}
$conn->close();

?>