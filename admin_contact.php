<?php
require_once "db.php";

$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!-- You can still link a CSS file, or move styles to dashboard.css -->
<link rel="stylesheet" href="admin_contact.css">

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
      <th>Veprime</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['surname']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['message_type']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
          <td><?= htmlspecialchars($row['contact_method']) ?></td>
          <td><?= htmlspecialchars($row['submitted_at']) ?></td>
          <td><a href="reply.php?email=<?= urlencode($row['email']) ?>">Përgjigju</a></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="10">Nuk ka të dhëna.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php $conn->close(); ?>
