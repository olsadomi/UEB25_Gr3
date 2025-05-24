<?php

require_once "db.php";

$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kontaktet</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Kontaktet e Pranuara</h1>
    <table>
        <thead>
    <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Email</th>
        <th>Telefoni</th>
        <th>Lloji</th>
        <th>Mesazhi</th>
        <th>Metoda e kontaktit</th>
        <th>Data</th>
        <th>Veprime</th> <!-- Kjo shton kolonën e butonit -->
    </tr>
</thead>
<tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['surname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['message_type']}</td>
                <td>{$row['message']}</td>
                <td>{$row['contact_method']}</td>
                <td>{$row['submitted_at']}</td>
                <td><a href='reply.php?email=" . urlencode($row['email']) . "'>Përgjigju</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Nuk ka të dhëna.</td></tr>";
    }
    ?>
</tbody>

    </table>
</body>
</html>

<?php
$conn->close();
?>
