<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["email"])) {
        $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

        if ($email) {
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "airport";

            $conn = mysqli_connect($host, $username, $password, $database);

            if (!$conn) {
                echo json_encode(["success" => false, "message" => "Database connection failed."]);
                exit;
            }

            $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Faleminderit për abonimin!"]);
            } else {
                if ($conn->errno === 1062) {
                    echo json_encode(["success" => false, "message" => "Ky email është tashmë i abonuar."]);
                } else {
                    echo json_encode(["success" => false, "message" => "Gabim gjatë abonimit: " . $conn->error]);
                }
            }

            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(["success" => false, "message" => "Email i pavlefshëm."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Ju lutem vendosni një email."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Kërkesë e pavlefshme."]);
}
?>
