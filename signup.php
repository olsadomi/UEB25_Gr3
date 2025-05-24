<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
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

    if ($password !== $confirmPassword) {
        $errors[] = "Fjalëkalimet nuk përputhen.";
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

<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Regjistrim</title>
  <link rel="stylesheet" href="signup.css" />
</head>
<body>
  <div class="container">
    <form class="signup-form" id="signupForm" method="post">
      <h2>Krijo llogarinë</h2>

      <label for="name">Emri</label>
      <input type="text" id="name" name="name" required />

      <label for="surname">Mbiemri</label>
      <input type="text" id="surname" name="surname" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="phone">Telefoni</label>
      <input type="text" id="phone" name="phone" required />

      <label for="password">Fjalëkalimi</label>
      <input type="password" id="password" name="password" required />

      <label for="confirmPassword">Përsërit Fjalëkalimin</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required />

      <button type="submit">Regjistrohu</button>
    </form>
  </div>
</body>
</html>
