<?php
require_once "db.php";

$sql = "SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="admin_newsletter.css">

<h1>Abonimet në Newsletter</h1>
<table>
  <thead>
    <tr>
      <th>Email</th>
      <th>Data e Abonimit</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['subscribed_at']) ?></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="3">Nuk ka abonime.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php $conn->close(); ?>
