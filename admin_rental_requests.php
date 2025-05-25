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
    <style>
        .rental-requests-container {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .rental-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .rental-table th, .rental-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        
        .rental-table th {
            background-color: #4CAF50;
            color: white;
        }
        
        .rental-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .rental-table tr:hover {
            background-color: #ddd;
        }
        
        .message-cell {
            max-width: 300px;
            word-wrap: break-word;
        }
        
        .reply-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .reply-btn:hover {
            background-color: #0b7dda;
        }
        
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
    </style>
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
                                <td class="message-cell"><?= nl2br(htmlspecialchars($row['request_text'])) ?></td>
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