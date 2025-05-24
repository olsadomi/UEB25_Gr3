<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eProduct Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <aside>
        <h1>Prishtina Airport</h1>
        <nav>
            <a href="" onclick="showSection('dashboard')">Dashboard</a>
            <a href="#" onclick="loadContent('news-admin.php')">News</a>
            <a href="#" onclick="loadContent('admin_contact.php')">User Contact</a>
            <a href="#" onclick="showSection('parking')">Parking</a>
            <a href="#" onclick="showSection('sponsor')">Sponsor</a>
        </nav>
    </aside>

    <div class="main">
        <div class="topbar">
        </div>

        <div id="content-area">
            <h2>Dashboard</h2>
            <p>Welcome to the Dashboard!</p>
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