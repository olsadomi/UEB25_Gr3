<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "airport";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $name, $role, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_role'] = $role;

            if ($role === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: parkingReservation.php");
            }
            exit();
        } else {
            $error = "Fjalëkalimi është gabim.";
        }
    } else {
        $error = "Ky email nuk ekziston.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="login-container">
        <h2>Kyçu</h2>
        <?php if (!empty($error))
            echo "<div class='error'>$error</div>"; ?>
        <form method="post" action="login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Fjalëkalimi" required>
            <a id="signupLink" href="signup.php">Nuk ke llogari? Regjistrohu</a>
            <input type="submit" value="Kyçu">
        </form>
    </div>
</body>

</html>