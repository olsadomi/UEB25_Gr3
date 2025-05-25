<?php
require_once "db.php";

$sql = "SELECT * FROM rental_requests ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menaxhimi i Kërkesave për Makina</title>
    <link rel="stylesheet" href="admin_rental_requests.css">
</head>
<body>
    <div class="rental-requests-container">
        <h1>Menaxhimi i Kërkesave për Makina</h1>
        <div class="table-responsive">
            <table class="rental-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marka e Makinës</th>
                        <th>Email</th>
                        <th>Kërkesa</th>
                        <th>Data</th>
                        <th>Veprimi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['car_brand']) ?></td>
                                <td><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></td>
                                <td><?= nl2br(htmlspecialchars($row['request_text'])) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($row['submitted_at'])) ?></td>
                                <td>
                                    <a href="reply_rental.php?email=<?= urlencode($row['email']) ?>&request_id=<?= $row['id'] ?>" class="reply-btn">Përgjigju</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="no-data">Nuk ka kërkesa të pranuara ende.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>