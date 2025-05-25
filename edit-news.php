<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$id = intval($_POST['edit_id'] ?? $_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_path = 'uploads/' . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        $image_path = $target_path;
    }

    if ($image_path) {
        $stmt = $conn->prepare("UPDATE news SET title=?, content=?, category=?, image_path=? WHERE id=?");
        $stmt->bind_param("ssssi", $title, $content, $category, $image_path, $id);
    } else {
        $stmt = $conn->prepare("UPDATE news SET title=?, content=?, category=? WHERE id=?");
        $stmt->bind_param("sssi", $title, $content, $category, $id);
    }

    $stmt->execute();
    header("Location: admin_dashboard.php");
    exit();
}

// Merr të dhënat për formën
$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Lajmi nuk u gjet.";
    exit();
}

$news = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <meta charset="UTF-8">
    <title>Edito Lajmin</title>
    <link rel="stylesheet" href="edit-news.css">
</head>

<body>
    <div class="edit-container">
        <h2>Edito Lajmin</h2>
        <div class="from-container">
            <form action="edit-news.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?= $news['id'] ?>">

                <label for="title">Titulli:</label><br>
                <input type="text" name="title" value="<?= htmlspecialchars($news['title']) ?>" required><br><br>

                <label for="content">Përmbajtja:</label><br>
                <textarea name="content" rows="5" required><?= htmlspecialchars($news['content']) ?></textarea><br><br>

                <label for="category">Kategoria:</label><br>
                <select name="category" required>
                    <option value="">-- Zgjedh kategorine --</option>
                    <option value="risi" <?= $news['category'] == 'risi' ? 'selected' : '' ?>>Risi</option>
                    <option value="evente" <?= $news['category'] == 'evente' ? 'selected' : '' ?>>Evente</option>
                    <option value="destinacionet" <?= $news['category'] == 'destinacionet' ? 'selected' : '' ?>>
                        Destinacionet</option>
                </select><br><br>

                <label for="image">Ndrysho Foto (Opsionale):</label><br>
                <input type="file" name="image" accept="image/*"><br><br>
                <img src="<?php echo $news['image_path']; ?>" alt="Foto aktuale" width="200" height="auto"><br><br>

                <input type="submit" value="Ruaj Ndryshimet">
            </form>
        </div>
    </div>
</body>

</html>