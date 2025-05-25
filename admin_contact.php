<?php
require_once "db.php";

$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="admin_contact.css">

<div class="contacts-container">
    <h1>Menaxhimi i kontakteve</h1>
    <div class="table-responsive">
        <table class="contacts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Telefoni</th>
                    <th>Lloji</th>
                    <th>Mesazhi</th>
                    <th>Metoda</th>
                    <th>Data</th>
                    <th>Veprimi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['surname']) ?></td>
                            <td><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td><?= htmlspecialchars($row['message_type']) ?></td>
                            <td class="message-cell"><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                            <td><?= htmlspecialchars($row['contact_method']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['submitted_at'])) ?></td>
                            <td>
                                <a href="reply.php?email=<?= urlencode($row['email']) ?>" class="reply-btn">Përgjigju</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="no-data">Nuk ka të dhëna.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $conn->close(); ?>