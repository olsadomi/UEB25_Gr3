<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/UEB25_GR3/nav.css">
</head>
<body>
    <?php 
        session_start();
        $loginBtnStatus ="";
        if(isset($_SESSION['user_id'])){
            $loginBtnStatus = "Logout";
        }else{
            $loginBtnStatus = "Login";
        }
    ?>
    <nav>
        <div class="nav-container"> 
            <div class="image">
                <img src="/UEB25_GR3/Photos/Home/logo2.png" id="logo1" alt="">
                <h1 id="logo-text">Prishtina Airport</h1>
            </div>

            <div class="linkat">
                <a href="/UEB25_GR3/index.php">Ballina</a>
                <a href="/UEB25_GR3/flights.php">Fluturime</a>
                <a href="/UEB25_GR3/services.php">Shërbimet</a>
                <a href="/UEB25_GR3/news.php">Lajme</a>
                <a href="/UEB25_GR3/about_us.php">Rreth Nesh</a>
                <a href="/UEB25_GR3/contact.php" style="margin-right: 2vw;">Kontakt</a>
                <button class="btnLogin"><?php echo $loginBtnStatus ?></button>
            </div>

            
        </div>
    </nav>

    <script src="/UEB25_GR3/script/nav.js?v=2"></script>
</body>
</html>