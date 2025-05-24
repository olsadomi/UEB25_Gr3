<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Lidhja me DB dështoi: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Tabela 'newsletter_subscribers' u krijua me sukses!";
} else {
    echo "Gabim gjatë krijimit të tabelës: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
