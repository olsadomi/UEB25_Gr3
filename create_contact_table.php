<?php
require_once "db.php";
$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    surname VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    message_type ENUM('sugjerim', 'kerkese', 'ankese', 'tjeter') NOT NULL,
    message TEXT,
    contact_method ENUM('Email', 'Thirrje telefonike', 'SMS'),
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($conn->query($sql) === TRUE) {
    echo "Tabela 'contacts' u krijua me sukses!";
} else {
    echo "Gabim gjatë krijimit të tabelës: " . $conn->error;
}

$conn->close();

?>