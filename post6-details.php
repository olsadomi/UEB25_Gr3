<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane: Lidhje të Reja për Udhëtarët</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="post6-image"></div>
            <div class="post-content">
                <div class="date-info">
                    <div>
                        <span>&bull;</span>
                        <span>June 23, 2021</span>
                    </div>
                </div>
                <h2>Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane: Lidhje të Reja për Udhëtarët</h2>
                <p>
                    Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" vazhdon të jetë pika kryesore e lidhjes 
                    ajrore për Kosovën, duke ofruar destinacione të shumta në Evropë dhe më gjerë. Me rritjen e 
                    kërkesës për udhëtime, aeroporti ka zgjeruar gamën e fluturimeve, duke përfshirë:
                    <b>Lidhje të reja sezonale:</b> Fluturime për destinacione turistike si Bodrum, Antalya dhe Heraklion. <br>
                    <b>Rritje të fluturimeve drejt metropoleve evropiane:</b> Përfshirë Vjenën, Zyrihun, dhe Frankfurtin, me frekuencë 
                    të shtuar për t'iu përshtatur udhëtarëve të biznesit dhe atyre turistikë.
                    <b>Fluturime të përkohshme:</b> Opsione për qytete si Düsseldorf dhe Stuttgart gjatë sezonit të verës.
                </p>
            </div>
            <div class="comments-section">
                <h3>Komente</h3>
                <textarea placeholder="Shkruani komentin tuaj..." rows="4"></textarea>
                <button onclick="submitComment()">Dërgo</button>
                <div id="comments-list">
                </div>
            </div>
            <div class="end-post">
                <div class="kategoria-post">
                    Destinacionet
                </div>
                <div class="share-section">
                    <button onclick="sharePost('facebook')">Facebook</button>
                    <button onclick="sharePost('linkedin')">LinkedIn</button>
                    <button onclick="sharePost('instagram')">Instagram</button>
                </div>
            </div>
        </div>
        <div class="other-posts">
            <h3>Lajme tjera</h3>
            <div class="post-grid">
                <div class="post-item">
                    <img src="fotot/foto7.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post7-details.html">
                            <h4>Aeroporti i Prishtinës Pret Forumin e Biznesit 2024: Mundësi të Reja për Sipërmarrësit</h4>
                        </a>
                        <p>17 Nov 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto1.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post1-details.html">
                            <h4>Aeroporti i Prishtinës Përgatitet për Sezonin Dimëror me Investime në Infrastrukturë
                            </h4>
                        </a>
                        <p>7 Dec 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto2.jpg" alt="Post Image">
                    <div class="grid-content">
                        <a href="post2-details.html">
                            <h4>Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare</h4>
                        </a>
                        <p>12 Nov 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function () {
            $("#navbar-placeholder").load("nav.html");
            $("#footer-placeholder").load("footer.html");
        })
    </script>
    <div id="footer-placeholder"></div>
</body>

</html>