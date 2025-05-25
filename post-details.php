<?php
require 'db.php';
session_start();

if (!isset($_GET['id'])) {
    echo "Lajmi nuk u gjet";
    exit();
}

$news_id = intval($_GET['id']);

$viewed = isset($_COOKIE['viewed_posts']) ? json_decode($_COOKIE['viewed_posts'], true) : [];

if(isset($viewed[$news_id])){
    $viewed[$news_id]++;
} else {
    $viewed[$news_id] = 1;
}

setcookie('viewed_posts', json_encode($viewed), time() + 3600, "/");

$stmt = $conn->prepare("SELECT n.title, n.content, n.image_path, n.category, n.created_at, u.name as author
                                FROM news n
                                JOIN users u on n.created_by = u.id
                                WHERE n.id = ?");
$stmt->bind_param("i", $news_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Lajmi nuk u gjet.";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="post-details.css">
    <script src="post-details.js"></script>
</head>

<body>
    <nav>
        <div id="navbar-placeholder"></div>
    </nav>

    <section id="all">
        <div class="post-container">
            <div class="post-image">
                <img src="<?php echo $row['image_path']; ?>" alt="Foto e lajmit" width="100%" height="450px">
            </div>
            <div class="post-content">
                <div class="date-info">
                    <span>&bull;</span>
                    <span><?php echo date("F j, Y", strtotime($row['created_at'])); ?></span>
                </div>
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
            </div>

            <div class="end-post">
                <div class="kategoria-post"><?php echo htmlspecialchars($row['category']); ?></div>
                <div class="share-section">
                    <button onclick="sharePost('facebook')">Facebook</button>
                    <button onclick="sharePost('linkedin')">LinkedIn</button>
                    <button onclick="sharePost('instagram')">Instagram</button>
                </div>
            </div>
            <div class="author-section" style="padding: 0 30px 20px; color: #777; font-size: 14px;">
                Shkruar nga: <strong><?php echo htmlspecialchars($row['author']); ?></strong>
            </div>
        </div>

        <?php
            $other_stmt = $conn->prepare("SELECT id, title, image_path, created_at FROM news
                                        WHERE id != ?");
            $other_stmt->bind_param("i", $news_id);
            $other_stmt->execute();
            $other_result = $other_stmt->get_result();

            $all_news = [];

            while($r= $other_result->fetch_assoc()){
                $all_news[] = $r;
            }
            
            usort($all_news, function($a, $b) use ($viewed){
                $viewsA = $viewed[$a['id']] ?? 0;
                $viewsB = $viewed[$b['id']] ?? 0;
                return $viewsB <=> $viewsA;
            });

            $recommended = array_slice($all_news, 0 ,3);
        ?>

        <div class="other-posts">
            <h3>Lajme tjera</h3>
            <div class="post-grid">
                <?php foreach($recommended as $other):?>
                <div class="post-item">
                    <img src="<?php echo htmlspecialchars($other['image_path']); ?>" alt="Post Image">
                    <div class="grid-content">
                        <a href="post-details.php?id=<?php echo $other['id']; ?>">
                            <h4><?php echo htmlspecialchars($other['title']); ?></h4>
                        </a>
                        <p><?php echo date("d M Y", strtotime($other['created_at'])); ?></p>
                    </div>
                </div>
               <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
        $(function () {
            $("#navbar-placeholder").load("nav.html");
            $("#footer-placeholder").load("footer.html");
        });
    </script>

    <div id="footer-placeholder"></div>

</body>

</html>