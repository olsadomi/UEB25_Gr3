
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shto Lajm - Admin</title>
</head>
<body>
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
</body>
</html>