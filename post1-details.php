<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve (VIDEO)</title>
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
            <div class="post1-image"></div>
            <div class="post-content">
                <div class="date-info">
                    <div>
                        <span>&bull;</span>
                        <span>January 2, 2025</span>
                    </div>
                </div>
                <h2>Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve (VIDEO)</h2>
                <p>
                    Në Aeroportin Ndërkombëtar “Adem Jashari” është duke vazhduar tollovia e njerëzve edhe sot. <br>

                    Kjo pasi dje janë anuluar një numër i madh i fluturimeve, si pasojë e mjegullës, e disa prej 
                    tyre kanë aterruar në aeroportin e Shkupit. <br>
                    <video controls width="650" height="360">
                        <source src="fotot/Tollovi në aeroportin e Prishtinë, shkak anulimet e fluturimeve.mp4" type="video/mp4">
                    </video> <br>
                    Për këtë çështje Liburn Aliu, ministri i Mjedisit, Planifikimit Hapësinor dhe Infrastrukturës, 
                    ka dhënë sqarime lidhur me anulimin e disa fluturimeve ditën e djeshme si shkak i mjegullës. <br>
                    Në një postim në Facebook, ai ka thënë se dje kanë ateruar aeroplanët e të cilëve pilotët kanë qenë 
                    të certifikuar për rënie në kushte të mjegullës. <br>
                    “Aeroporti i Prishtinës është në shërbim gjatë tërë kohës, pasi ka të instaluar dhe funksional 
                    sistemin e avancuar të aterrimit ILS CAT IIIb, i cili mundëson aterrime edhe në kushte të mjegullës 
                    së dendur, deri në dukshmëri minimale prej 50 metrash”. <br>
                    “Fluturimet me pilotë të certifikuar për përdorimin e këtij sistemi kanë aterruar me sukses, ndërsa 
                    ato fluturime pa certifikimin e nevojshëm janë anuluar ose devijuar. 46 ardhje-shkuarje janë realizuar 
                    me sukses, deri sa 12 janë anuluar ne ardhje”, ka thënë Aliu. <br>
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
                    Risi
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
                    <img src="fotot/foto2.jpg" alt="Post Image">
                    <div class="grid-content">
                        <a href="post2-details.html"><h4>Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar</h4></a>
                        <p>10 Dec 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto5.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post5-details.html"><h4>Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës "Adem Jashari"</h4></a>
                        <p>19 Dec 2024</p>
                    </div>
                </div>
                <div class="post-item">
                    <img src="fotot/foto4.jpg" alt="Post Image">
                    <div class="grid-content">
                        <a href="post4-details.html"><h4>Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane: Lidhje të Reja për Udhëtarët</h4></a>
                        <p>23 June 2021</p>
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