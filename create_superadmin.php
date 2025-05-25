<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Lidhja me DB deshtoi: " . mysqli_connect_error());
}

$name = "Super";
$surname = "Admin";
$email = "superadmin@airport.com";
$plainPassword = "SuperSecure123"; 
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
$phone = "000000000";
$role = "admin";

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Superadmin already exists.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password, phone, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $surname, $email, $hashedPassword, $phone, $role);

    if ($stmt->execute()) {
        echo "Superadmin inserted successfully!";
    } else {
        echo "Gabim gjatë inserimit: " . $stmt->error;
    }

    $stmt->close();
}

$check->close();
$conn->close();
?>
