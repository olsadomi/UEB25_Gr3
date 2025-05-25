<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['edit_id']);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $image_path = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_path = 'fotot/' . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        $image_path = $target_path;
    }

    if ($image_path) {
        $stmt = $conn->prepare("UPDATE news SET title=?, content=?, category=?, image_path=? WHERE id=?");
        $stmt->bind_param("ssssi", $title, $content, $category, $image_path, $id);
    } else {
        $stmt = $conn->prepare("UPDATE news SET title=?, content=?, category=? WHERE id=?");
        $stmt->bind_param("sssi", $title, $content, $category, $id);
    }

    $stmt->execute();

    header("Location: news-admin.php");
    exit();
}
?>