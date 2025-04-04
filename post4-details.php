<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar</title>
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
            <div class="post4-image"></div>
            <div class="post-content">
                <div class="date-info">
                    <div>
                        <span>&bull;</span>
                        <span>December 10, 2024</span>
                    </div>
                </div>
                <h2>Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar</h2>
                <p>
                    Aeroporti i Prishtinës ka hapur dyert për një ngjarje të jashtëzakonshme: 
                    <b>Panairin e Turizmit Ndërkombëtar!</b> Ky event një-ditor i dedikuar promovimit të 
                    destinacioneve të ndryshme turistike ka sjellë pjesëmarrës nga agjenci udhëtimesh, 
                    operatorë turistikë, dhe kompani të tjera të industrisë së turizmit nga e gjithë bota.
                    Panairi ofron mundësi të shkëlqyera për pasagjerët dhe vizitorët të zbulojnë destinacione 
                    të reja dhe mundësi udhëtimi, si dhe të përfitoni nga ofertat speciale dhe zbritjet që ofrohen 
                    vetëm gjatë këtij eventi.<br>
                    <b>Qfare mund te prisni nga ky event?</b> <br>
                    Stenda informuese per destinacione te ndryshme turistike  <br>
                    Këshilla për udhëtimet dhe planet e udhëtimit për vitin 2025 <br>   
                    Mundësi për të fituar dhurata dhe vouchere udhëtimi <br>
                    Takime dhe biseda me ekspertët e industrisë së turizmit <br>
                    <b>Data e Eventit: </b> 15 Dhjetor 2024 <br>
                    <b>Ora: </b> 09:00 - 18:00 <br>
                    <b>Vendndodhja: </b> Salla e Eventeve, Aeroporti Ndërkombëtarë i Prishtinës <br>
                    Ky është një mundësi e shkëlqyer për të planifikuar udhëtimet tuaja të ardhshme dhe për të eksploruar 
                    opsionet që industria e turizmit ka për të ofruar. Mos e humbisni këtë mundësi dhe bëhuni pjesë e këtij 
                    eventi që do të ndikojë pozitivisht në udhëtimet tuaja!
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
                    Evente
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
                <div class="post-item">
                    <img src="fotot/foto7.webp" alt="Post Image">
                    <div class="grid-content">
                        <a href="post7-details.html">
                            <h4>Aeroporti i Prishtinës Pret Forumin e Biznesit 2024: Mundësi të Reja për Sipërmarrësit</h4>
                        </a>
                        <p>17 Nov 2024</p>
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