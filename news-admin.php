<?php session_start(); ?>
<?php
require 'db.php';
$result = $conn->query("SELECT id, title, created_at, category FROM news ORDER BY created_at DESC");
?>

<link rel="icon" href="logo-favicon.png">
<link rel="stylesheet" href="news-admin.css">

<div class="mainContainer">
<div class="container">
    <div class="form-container">
        <h2>Shto Lajm Te Ri</h2>
        <form action="news-insert.php" method="POST" enctype="multipart/form-data">
            <label for="title">Titulli:</label><br>
            <input type="text" name="title" required><br><br>

            <label for="content">Permbajtja: </label><br>
            <textarea name="content" rows="5" required></textarea><br><br>

            <label for="category">Kategoria:</label><br>
            <select name="category" required>
                <option value="">-- Zgjedh kategorine --</option>
                <option value="risi">Risi</option>
                <option value="evente">Evente</option>
                <option value="destinacionet">Destinacionet</option>
            </select><br><br>

            <label for="image">Foto (JPEG/PNG): </label><br>
            <input type="file" name="image" accept="image/*" required><br><br>

            <input type="submit" value="Publiko Lajmin">
        </form>
    </div>

    <div class="table-content">
        <h2>Lajmet Ekzistuese</h2>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Titulli</td>
                    <td>Data</td>
                    <td>Kategoria</td>
                    <td>Veprimet</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td class="actions">
                            <a href="edit-news.php?id=<?php echo $row['id']; ?>" class="edit">Edito</a>
                            <a href="delete-news.php?id=<?php echo $row['id']; ?>" class="delete"
                                onclick="return confirm('A jeni i sigurt qe deshironi ta fshini kete lajm?');">Fshij</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</div>