<?php
require_once "db.php";

$sql = "SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="admin_newsletter.css?v=12345">

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

<hr>

<h2>Dërgo Newsletter</h2>
<form method="POST" action="send_newsletter.php" class="newsletter-form">
  <label for="subject">Subjekti:</label><br>
  <input type="text" id="subject" name="subject" required><br><br>

  <label for="message">Përmbajtja e mesazhit (HTML lejohet):</label><br>
  <textarea id="message" name="message" rows="10" required></textarea><br><br>

  <button type="submit">Dërgo Newsletter</button>
</form>
