<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Lidhja me DB dështoi: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Tabela 'users' u krijua me sukses!";
} else {
    echo "Gabim gjatë krijimit të tabelës: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!-- CREATE TABLE newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
); 

run sql on phpmyadmin
-->

