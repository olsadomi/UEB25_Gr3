<?php 
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

$currentAdmin = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airport Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=12345">
</head>

<body>

    <aside>
        <h1 id="dashboardTitle">Prishtina Airport</h1>
        <p id="adminiKycur">Admini i kyqur: <strong><?php echo htmlspecialchars($currentAdmin); ?></strong></p>
        <nav>
            <a href="" onclick="showSection('dashboard')">Dashboard</a>
            <a href="#" onclick="loadContent('news-admin.php')">Menaxhimi i Lajmeve</a>
            <a href="#" onclick="loadContent('admin_contact.php')">Menaxhimi i Kontaktit</a>
            <a href="#" onclick="loadContent('admin_newsletter.php')">Menaxhimi i Newsletter</a>
            <a href="#" onclick="loadContent('admin_rental_requests.php')">Menaxhimi i Makinave me Qira</a>
            <a href="#" onclick="showSection('sponsor')">Menaxhimi i Sponsoreve</a>
            <a href="logout.php">Dalje</a>
        </nav>
    </aside>

    <div class="main">
        <div class="topbar">
        </div>

        <div id="content-area">
            <h2>Dashboard</h2>
            <p>Mire se erdhet ne faqen e Adminit!</p>
        </div>
    </div>

    <script>
        function loadContent(page) {
            fetch(page)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("content-area").innerHTML = html;
                })
                .catch(err => {
                    document.getElementById("content-area").innerHTML = "<p>Error loading content.</p>";
                    console.error(err);
                });
        }
    </script>


</body>

</html>