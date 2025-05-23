<?php
require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $phone = trim($_POST['phone']);

    $errors = [];

    if (strlen($name) < 2 || strlen($surname) < 2) {
        $errors[] = "Emri dhe mbiemri duhet të kenë të paktën 2 shkronja.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email-i nuk është i vlefshëm.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Fjalëkalimi duhet të ketë të paktën 6 karaktere.";
    }

    if (!empty($errors)) {
        echo "<div class='message-container error'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    } else {
        // enkriptim i pass-it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //per sql injections
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        // nese e kishim vendos si query: $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        //nga inputi query final mund te behet nga useri: SELECT * FROM users WHERE email='' OR 1=1 --' AND password=''
        // e cila kthen true edhe ja lejon kycjen pa password user-it

        if ($checkStmt->num_rows > 0) {
            echo "<div class='message-container error'>Ky email është regjistruar më parë.</div>";
        } else {
    
            $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password, phone) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $surname, $email, $hashedPassword, $phone);

            if ($stmt->execute()) {
                echo "<div class='message-container success'>Regjistrimi u krye me sukses!</div>";
            } else {
                echo "<div class='message-container error'>Dështoi regjistrimi. Ju lutemi provoni përsëri.</div>";
            }

            $stmt->close();
        }

        $checkStmt->close();
    }

    $conn->close();
}
?>

<form method="POST" action="">
    <label>Emri:</label>
    <input type="text" name="name" required><br>

    <label>Mbiemri:</label>
    <input type="text" name="surname" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Fjalëkalimi:</label>
    <input type="password" name="password" required><br>

    <label>Telefoni:</label>
    <input type="text" name="phone"><br>

    <input type="submit" value="Regjistrohu">
</form>
