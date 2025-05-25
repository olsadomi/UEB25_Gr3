<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Lidhja me DB dështoi: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    category VARCHAR(100),
    image_path VARCHAR(255),
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Tabela 'users' u krijua me sukses!";
} else {
    echo "Gabim gjatë krijimit të tabelës: " . mysqli_error($conn);
}

mysqli_close($conn);
?>