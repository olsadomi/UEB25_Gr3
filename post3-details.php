<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit të Prishtinës</title>
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
            <div class="post3-image"></div>
            <div class="post-content">
                <div class="date-info">
                    <div>
                        <span>&bull;</span>
                        <span>February 1, 2024</span>
                    </div>
                </div>
                <h2>Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit të Prishtinës</h2>
                <p>
                    Aeroporti Ndërkombëtar i Prishtinës ka nisur një projekt ambicioz të quajtur "Green Airport", 
                    i cili synon të reduktojë ndotjen dhe të rrisë përdorimin e burimeve të qëndrueshme. Panelët 
                    diellorë janë instaluar për të prodhuar energji elektrike, ndërsa sistemet e ndriçimit janë 
                    zëvendësuar me LED për kursim energjie.Për më tepër, janë krijuar hapësira të reja të gjelbra, 
                    duke përfshirë një kopsht në zonën e jashtme të aeroportit. Pasagjerët do të kenë mundësinë të 
                    relaksohen në natyrë para fluturimeve. Ky projekt është një hap i rëndësishëm drejt përmbushjes 
                    së objektivave për një mjedis më të pastër.
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
                <div class="post-item">
                    <img src="fotot/foto6.jpg" alt="Post Image">
                    <div class="grid-content">
                        <a href="post6-details.html">
                            <h4>Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare</h4>
                        </a>
                        <p>15 Jan 2022</p>
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