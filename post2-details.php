<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare</title>
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
            <div class="post2-image"></div>
            <div class="post-content">
                <div class="date-info">
                    <div>
                        <span>&bull;</span>
                        <span>November 12, 2022</span>
                    </div>
                </div>
                <h2>Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare</h2>
                <p>
                    Nga fillimi i vitit 2024, Aeroporti i Prishtinës do të ofrojë fluturime për destinacione 
                    të reja, duke përfshirë Barcelonën, Stambollin dhe Abu Dhabin. Kjo lëvizje vjen si pjesë e 
                    bashkëpunimeve të reja me linja ajrore ndërkombëtare, si Turkish Airlines dhe Wizz Air.
                    Pasagjerët tani do të kenë mundësi të zgjedhin më shumë fluturime direkte, duke ulur kohën 
                    e pritjes dhe koston e udhëtimeve. Zëdhënësja e aeroportit deklaroi: "Ne jemi të përkushtuar 
                    që të sjellim më shumë mundësi për qytetarët e Kosovës dhe të rrisim lidhjet tona me botën."
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
                    <img src="fotot/foto3.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post3-details.html">
                            <h4>Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit të Prishtinës</h4>
                        </a>
                        <p>1 Feb 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto4.jpg" alt="Post Image">
                    <div class="grid-content">
                        <a href="post4-details.html">
                            <h4>Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar
                            </h4>
                        </a>
                        <p>10 Dec 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto5.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post5-details.html">
                            <h4>Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës "Adem Jashari"</h4>
                        </a>
                        <p>19 Dec 2024</p>
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