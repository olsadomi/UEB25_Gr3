<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Lajmet e fundit - Airport Prishtinë</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <nav>
        <div id="navbar-placeholder"></div>
    </nav>


    <!--Krijimi i nje section-->
    <section class="news-home">
        <div class="news-text">
            <h2 class="news-titulli">Faqja Kryesore Per Lajme</h2>
            <span class="news-nentitulli">Gjithqka qe ju duhet te dini</span>
        </div>
    </section>

    <!-- Moduli i Lajmeve të Fundit -->
    <div class="latest-news-carousel">
        <h3>Lajmet e Fundit</h3>
        <div class="carousel">
            <span class="carousel-item">Lajmi 1: Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve.</span>
            <span class="carousel-item">Lajmi 2: Event i ri në Aeroport për turistët!</span>
            <span class="carousel-item">Lajmi 3: Fluturime të reja për 2024.</span>
            <span class="carousel-item">Lajmi 4: Shërbimi i Self Check-in.</span>
        </div>
    </div>

    <div class="filter-search-container">
        <!--Post filteri-->
        <div class="filter-center">
            <div class="post-filter">
                <span class="filter-item active-filter" data-filter="all">All</span>
                <span class="filter-item" data-filter="destinacionet">Destinacionet</span>
                <span class="filter-item" data-filter="evente">Evente</span>
                <span class="filter-item" data-filter="risi">Risi</span>
            </div>
        </div>
        <!-- Shiriti i kërkimit -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Kërko postime...">
        </div>
    </div>

    <!--Postimet-->
    <section class="postet">
        <!--Posti 1-->
        <div class="post-box risi">
            <img src="fotot/foto1.webp" alt="" class="post-img">
            <h2 class="kategoria">Risi</h2>
            <a href="post1-details.html" class="post-titulli">Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve (VIDEO)</a>
            <span class="post-date">2 Jan 2025</span>
            <p class="post-pershkrimi">
                Në prag të sezonit dimëror, Aeroporti Ndërkombëtar i Prishtinës ka nisur një sërë përmirësimesh
                për të garantuar një përvojë sa më të mirë për udhëtarët. Salla e pritjes ka kaluar në rinovim,
                duke përfshirë shtimin e ulëseve dhe stacioneve për karikim pajisjesh elektronike.Një tjetër
                investim i rëndësishëm ka qenë në sistemet e sigurisë, ku janë instaluar skanera të rinj të
                teknologjisë së lartë që ofrojnë kontrolle më të shpejta dhe efikase. Për më tepër, stafi është
                trajnuar për t'u përballur me rritjen e numrit të udhëtarëve gjatë sezonit të festave.
            </p>
        </div>
        <!--Posti 2-->
        <div class="post-box destinacionet">
            <img src="fotot/foto2.jpg" alt="" class="post-img">
            <h2 class="kategoria">Destinacionet</h2>
            <a href="post2-details.html" class="post-titulli">Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat
                Ndërkombëtare</a>
            <span class="post-date">12 Nov 2022</span>
            <p class="post-pershkrimi">
                Nga fillimi i vitit 2024, Aeroporti i Prishtinës do të ofrojë fluturime për destinacione
                të reja, duke përfshirë Barcelonën, Stambollin dhe Abu Dhabin. Kjo lëvizje vjen si pjesë e
                bashkëpunimeve të reja me linja ajrore ndërkombëtare, si Turkish Airlines dhe Wizz Air.
                Pasagjerët tani do të kenë mundësi të zgjedhin më shumë fluturime direkte, duke ulur kohën
                e pritjes dhe koston e udhëtimeve. Zëdhënësja e aeroportit deklaroi: "Ne jemi të përkushtuar
                që të sjellim më shumë mundësi për qytetarët e Kosovës dhe të rrisim lidhjet tona me botën."
            </p>
        </div>
        <!--Posti 3-->
        <div class="post-box risi">
            <img src="fotot/foto3.webp" alt="" class="post-img">
            <h2 class="kategoria">Risi</h2>
            <a href="post3-details.html" class="post-titulli">Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit
                të Prishtinës</a>
            <span class="post-date">1 Feb 2024</span>
            <p class="post-pershkrimi">
                Aeroporti Ndërkombëtar i Prishtinës ka nisur një projekt ambicioz të quajtur "Green Airport",
                i cili synon të reduktojë ndotjen dhe të rrisë përdorimin e burimeve të qëndrueshme. Panelët
                diellorë janë instaluar për të prodhuar energji elektrike, ndërsa sistemet e ndriçimit janë
                zëvendësuar me LED për kursim energjie.Për më tepër, janë krijuar hapësira të reja të gjelbra,
                duke përfshirë një kopsht në zonën e jashtme të aeroportit. Pasagjerët do të kenë mundësinë të
                relaksohen në natyrë para fluturimeve. Ky projekt është një hap i rëndësishëm drejt përmbushjes
                së objektivave për një mjedis më të pastër.
            </p>
        </div>
        <!--Posti 4-->
        <div class="post-box evente">
            <img src="fotot/foto4.jpg" alt="" class="post-img">
            <h2 class="kategoria">Evente</h2>
            <a href="post4-details.html" class="post-titulli">Aeroporti i Prishtinës Organizoi Panairin e Turizmit -
                Oportunitete të Rrethit Ndërkombëtar</a>
            <span class="post-date">10 Dec 2024</span>
            <p class="post-pershkrimi">
                Aeroporti i Prishtinës ka hapur dyert për një ngjarje të jashtëzakonshme:
                <b>Panairin e Turizmit Ndërkombëtar!</b> Ky event një-ditor i dedikuar promovimit të
                destinacioneve të ndryshme turistike ka sjellë pjesëmarrës nga agjenci udhëtimesh,
                operatorë turistikë, dhe kompani të tjera të industrisë së turizmit nga e gjithë bota.
                Panairi ofron mundësi të shkëlqyera për pasagjerët dhe vizitorët të zbulojnë destinacione
                të reja dhe mundësi udhëtimi, si dhe të përfitoni nga ofertat speciale dhe zbritjet që ofrohen
                vetëm gjatë këtij eventi.<br>
                <b>Qfare mund te prisni nga ky event?</b> <br>
                Stenda informuese per destinacione te ndryshme turistike <br>
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

        <!--Posti 5-->
        <div class="post-box risi">
            <img src="fotot/foto5.webp" alt="" class="post-img">
            <h2 class="kategoria">Risi</h2>
            <a href="post5-details.html" class="post-titulli">Shërbimi i Self Check-in tani edhe në Aeroportin
                Ndërkombëtar të Prishtinës "Adem Jashari"</a>
            <span class="post-date">19 Dec 2024</span>
            <p class="post-pershkrimi">
                <b>Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës "Adem Jashari"
                    Sistemi i pranimit të udhëtarëve dhe valixheve mund të bëhet nga vetë udhëtarët përmes kioskave të
                    "Self-Check-in"</b>
                Pas hapjes së katër portave shtesë dhe duke shtuar hapësirat për procesimin e udhëtarëve tani Aeroporti
                Ndërkombëtar
                i Prishtinës ka lansuar edhe shërbimin e Self Check-in.<br>
                ANP "Adem Jashari" LKIA nga muaji gusht ka ofruar sistemin e pranimit të udhëtarëve dhe valixheve që
                mund të bëhet
                nga vetë udhëtarët, sistem ky që është pjesë e teknologjisë që përdoret për të lehtësuar procedurat para
                fluturimit
                të udhëtareve. <br>
                Tani aeroporti ka të instaluar 6 Self Check-in kioska dhe 10 Self Bag Drops për valixhe.
                Udhëtarët duhet të përdorin këto paisje në pajtueshmëri me kohën e hapjes dhe mbylljes së
                fluturimit ku për një fluturim mund të fillojnë procedurat e Self Check-in 3 orë para nisjes
                së fluturimit dhe përfundojnë 40 min para orës së nisjes. <br>
                <b>Dokumentet e nevojshme për përdorimin e Self Check-in:</b> <br>
                Udhëtarët për të përdorur Kioskat për Self Check-in duhet të posedojnë Pasaportë.
                Letërnjoftimi ende nuk përkrahet nga këto pajisje për të kryer pranimin e udhëtarit. <br>
                Përjashtim nga kjo përbëjnë rastet kur udhëtarët kanë përfunduar check-in online me ID
                kartelë. Në ato raste ata mund të përdorin edhe letërnjoftimin e tyre për të printuar
                biletën e tyre në Kioskat për Self Check-in. Nga muaji Gusht kur edhe ANP ka vënë në
                funksion Self Check-in, janë 26 mijë udhëtarë që kanë kryer procedurat nga vetë ata dhe
                janë procesuar mbi 15 mijë valixhe nëpërmjet Bag drops.
        </div>
        <!--Posti 6-->
        <div class="post-box destinacionet">
            <img src="fotot/foto6.jpg" alt="" class="post-img">
            <h2 class="kategoria">Destinacionet</h2>
            <a href="post6-details.html" class="post-titulli">Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane:
                Lidhje të Reja për Udhëtarët</a>
            <span class="post-date">23 June 2021</span>
            <p class="post-pershkrimi">
                Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" vazhdon të jetë pika kryesore e lidhjes
                ajrore për Kosovën, duke ofruar destinacione të shumta në Evropë dhe më gjerë. Me rritjen e
                kërkesës për udhëtime, aeroporti ka zgjeruar gamën e fluturimeve, duke përfshirë:
                <b>Lidhje të reja sezonale:</b> Fluturime për destinacione turistike si Bodrum, Antalya dhe Heraklion.
                <br>
                <b>Rritje të fluturimeve drejt metropoleve evropiane:</b> Përfshirë Vjenën, Zyrihun, dhe Frankfurtin, me
                frekuencë
                të shtuar për t'iu përshtatur udhëtarëve të biznesit dhe atyre turistikë.
                <b>Fluturime të përkohshme:</b> Opsione për qytete si Düsseldorf dhe Stuttgart gjatë sezonit të verës.
            </p>
        </div>
        <!--Posti 7-->
        <div class="post-box evente">
            <img src="fotot/foto7.webp" alt="" class="post-img">
            <h2 class="kategoria">Evenete</h2>
            <a href="post7-details.html" class="post-titulli">Aeroporti i Prishtinës Pret Forumin e Biznesit 2024:
                Mundësi të Reja për Sipërmarrësit</a>
            <span class="post-date">17 Nov 2024</span>
            <p class="post-pershkrimi">
                Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" është nikoqir i një eventi madhor për
                bizneset dhe sipërmarrësit në rajon. <b>Forumi i Biznesit 2024</b>, që do të mbahet më
                <b>20 Dhjetor 2024</b>, synon të mbledhë profesionistë nga industri të ndryshme për të
                diskutuar mundësitë e reja të bashkëpunimit dhe inovacionet teknologjike në transport dhe turizëm.
                <br>
                <b>Aktivitetet kryesore përfshijnë:</b> <br>
                <b>Panel diskutimi:</b> Të ftuar ekspertë ndërkombëtarë dhe vendas që do të ndajnë trendet më të fundit
                në biznes dhe aviacion.
                <b>Sesione rrjetëzimi:</b> Një mundësi për pjesëmarrësit të lidhin partneritete dhe të zgjerojnë rrjetin
                e tyre profesional.
                <b>Ekspozitë e inovacioneve:</b> Prezantime të teknologjive të reja që përmirësojnë përvojën e
                udhëtarëve. <br>
                <b>Data dhe Vendi:</b> <br>
                <b>Data: </b> 20 Dhjetor 2024 <br>
                <b>Ora: </b> 10:00 - 16:00 <br>
                <b>Vendndodhja: </b> Terminali i Ri, Aeroporti Ndërkombëtar i Prishtinës <br>
                <b>Pjesmarrja eshte falas</b>, jeni te mireseardhur.
            </p>
        </div>
    </section>

    <!--Lidhja me me JS dhe me navbarin-->
    <script src="news.js"></script>
    <div id="footer-placeholder"></div>
</body>

</html>