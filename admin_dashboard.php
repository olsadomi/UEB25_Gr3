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
            <a href="#" onclick="showSection('news')">News</a>
            <a href="#" onclick="showSection('user_contact')">User Contact</a>
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
        function showSection(id) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });

            const selected = document.getElementById(id);
            if (selected) {
                selected.classList.add('active');
            }
        }
    </script>
</body>

</html>