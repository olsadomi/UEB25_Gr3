<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- google fonts link per icon ne swiper -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
    <!-- link per Swiper JS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="nav.css">

</head>

<body>

    <nav>
        <div id="navbar-placeholder"></div>
    </nav>


    <div class="pjesa-1">
        <div class="background-image">
            <img src="background-aboutus.png" alt="About Us Background">
        </div>
        <div class="titulli-aboutus">
            <h3>Rreth Nesh</h3>
            <p>Mirë se vini në <b>PIA</b>, porta juaj drejt udhëtimeve të lehta dhe <em>përvojave të paharrueshme</em>
            </p>
        </div>
    </div>


    <div class="pjesa-2">
        <div class="pjesa-2-foto">
            <img src="aboutus-foto2.png">
        </div>
        <div class="pjesa-2-2">
            <div class="learn-more">
                <img src="meso-me-shume.png" alt="LEARN MORE">
            </div>
            <div class="learn-more-text">
                <p>Ne jemi krenarë që jemi më shumë se thjesht një qendër kalimtare — aeroporti
                    ynë është një vend ku fasilitetet e klasit botëror, shërbimi i jashtëzakonshëm
                    dhe pasioni për inovacionin bashkohen për të krijuar një përvojë udhëtimi të pa krahasueshme.</p>

                <p>Ndodhur në zemër të Prishtinës, ne lidhim miliona udhëtarë çdo vit me
                    destinacione në të gjithë botën, duke ofruar një përzierje të përsosur komoditeti,
                    rehatie dhe efikasiteti.</p>

                <p>Qëndrueshmëria është në thelb të asaj që bëjmë, dhe ne synojmë të minimizojmë ndikimin
                    tonë mjedisor, ndërkohë që vazhdojmë të ofrojmë shërbime të nivelit të lartë. Pavarësisht
                    nëse jeni një vizitor për herë të parë, një fluturues i rregullt, apo dikush që kalon përmes,
                    ne jemi këtu për t'ju bërë përvojën tuaj të paharrueshme. Në PIA, mezi presim të
                    jemi pjesë e udhëtimit tuaj.</p>

            </div>
        </div>
    </div>

    <div class="container-rr">
        <div class="stats-aboutus">
            <div class="stats-titulli">
                <!-- <img src="gjate-vitit-te-fundit.png"> -->
                <p>GJATË VITIT TË FUNDIT</p>
            </div>
            <div class="stats-cards ">
                <div class="stats-card1 flip3D">
                    <div class="front-x"><img src="card-1-aboutus.png"></div>
                    <div class="back-x">
                        <p>Me mbi 3.4 milionë pasagjerë të shërbyer në vitin 2023, Aeroporti ka përjetuar
                            një rritje të ndjeshme të numrit të udhëtarëve,
                            duke pasqyruar një kërkesë të madhe për fluturime dhe lidhje më të shpejta
                            ndërkombëtare.</p>
                    </div>
                </div>
                
                    <div class="stats-card flip3D">
                        <div class="front-x"><img src="card-2-aboutus.png"></div>
                        <div class="back-x">
                            <p>Aeroporti ofron fluturime drejt 28 destinacioneve në 14 shtete,
                                duke lidhur Kosovën me qytetet kryesore të Evropës dhe të Lindjes së Mesme.
                                Kjo rrjetë fluturimesh i mundëson udhëtarëve një gamë të gjerë mundësish për udhëtime
                                ndërkombëtare.</p>
                        </div>
                    </div>
                    <div class="stats-card flip3D">
                        <div class="front-x"><img src="card-3-aboutus.png"></div>
                        <div class="back-x">
                            <p>Me një terminal modern dhe infrastrukturë të avancuar,
                                Aeroporti është projektuar për të akomoduar deri në 5 milionë pasagjerë çdo vit.
                                Ky kapacitet i lartë siguron shërbime efikase dhe rritje të vazhdueshme të fluksit të
                                udhëtarëve.
                            </p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

    <div class="visit-kosova-banner">
        <div class="visit-kosova-banner-foto">
            <img src="kosova-banner.png">
        </div>
        <div class="visit-kosova-banner-text">
            <p>ZBULO BUKURINË E KOSOVËS</p>
        </div>
    </div>



    <p class="slider-paragraph-title">PARTNERËT TANË NË FLUTURIME</p>
    <div class="container-rr swiper">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                <li class="card-item swiper-slide">
                    <a href="https://www.austrian.com/xk/en/homepage" class="card-link" target="_blank">
                        <img src="austrian-airlines.jpg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Austrian Airlines</p>
                        <h2 class="card-title">Fluturoni me elegancën dhe traditën e Austrian Airlines.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://www.ryanair.com/ie/en" class="card-link" target="_blank">
                        <img src="ryanair.jpg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Ryanair Airlines</p>
                        <h2 class="card-title">Bileta të përballueshme për çdo aventurë me Ryanair.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://www.swiss.com/xx/en/homepage" class="card-link" target="_blank">
                        <img src="swiss-airlines.jpg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Swiss Airlines</p>
                        <h2 class="card-title">Përjetoni cilësinë zvicerane në çdo fluturim me Swiss.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://wwws.airfrance.fr/en" class="card-link" target="_blank">
                        <img src="airFrance-airlines.jpg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Air France Airlines</p>
                        <h2 class="card-title">Udhëtoni me stil dhe rehati me Air France.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://www.lufthansa.com/xx/en/homepage" class="card-link" target="_blank">
                        <img src="lufthansa-airlines.jpeg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Lufthansa Airlines</p>
                        <h2 class="card-title">Siguri dhe shërbim premium me Lufthansa.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://www.britishairways.com/travel/home/public/en_us/" class="card-link" target="_blank">
                        <img src="british-airways.jpg" alt="Austrian Airlines" class="card-image">
                        <p class="badge">British Airways</p>
                        <h2 class="card-title">Eksperiencë unike udhëtimi me British Airways.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="https://www.virginatlantic.com/en-xk" class="card-link" target="_blank">
                        <img src="virginAtlantic-airlines.png" alt="Austrian Airlines" class="card-image">
                        <p class="badge">Virgin Atlantic Airlines</p>
                        <h2 class="card-title">Udhëtoni me stil dhe inovacion me Virgin Atlantic.</h2>
                        <button class="card-button material-symbols-outlined">arrow_forward</button>
                    </a>
                </li>
            </ul>

            <div class="swiper-pagination"></div>
            <div class="swiper-slide-button swiper-button-prev"></div>
            <div class="swiper-slide-button swiper-button-next"></div>
        </div>
    </div>



    <div class="container-rr">
        <div class="faq">
            <div class="faq-pyetjet">
                <p>FREQUENTLY ASKED QUESTIONS</p>

                <div class="faq-item">
                    <div class="faq-pyetje">Ku është sporteli im për check-in?
                        <button class="faq-btn-open">&plus;</button>
                    </div>

                    <div class="faq-answer">
                        Mund të gjeni sportelin tuaj për check-in në tabelat e informacionit,
                         ku do të shfaqet avioni dhe numri i sportelit. 
                        Po ashtu, stafi i aeroportit mund t'ju ndihmojë nëse keni nevojë.
                        <button class="faq-btn-close">&minus;</button>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pyetje">Cili është kufiri i peshës për bagazh?
                        <button class="faq-btn-open">&plus;</button>
                    </div>

                    <div class="faq-answer">Kufiri i peshës për bagazh ndryshon në varësi të linjës ajrore dhe klasës së biletës. 
                        Kontrolloni me kompaninë tuaj ajrore për detajet specifike mbi peshën e lejuar të bagazhit.
                        <button class="faq-btn-close">&minus;</button>
                    </div>
                </div>

                <div class="faq-item">

                    <div class="faq-pyetje">A mund të sjell lëngje në bagazhin e dorës?
                        <button class="faq-btn-open">&plus;</button>
                    </div>

                    <div class="faq-answer">Lëngjet janë të lejuara në bagazhin e dorës vetëm nëse janë të paketuara
                         në shishe me kapacitet deri në 100 ml dhe janë vendosur në një qese plastike të pastër dhe të mbyllur.
                        <button class="faq-btn-close">&minus;</button>
                    </div>

                </div>

                <div class="faq-item">

                    <div class="faq-pyetje">Çfarë duhet të bëj nëse fluturimi im është vonuar?
                        <button class="faq-btn-open">&plus;</button>
                    </div>

                    <div class="faq-answer">Në rast se fluturimi juaj është vonuar, kontaktoni stafin e kompanisë ajrore për të marrë informacion 
                        rreth mundësive të ndryshme, përfshirë akomodimin dhe mundësitë e kalimit në fluturime të tjera.
                        <button class="faq-btn-close">&minus;</button>
                    </div>
                
                </div>

            </div>

            <div class="faq-icon">
                <img src="FAQs-amico.png">
            </div>

        </div>
    </div>


    <div class="abonohu">
        <div class="abonohu-text">Abonohu në </div>
        <button class="abonohu-btn" onclick="popupFn()">Newsletter</button>
        
    </div>







    <div id="overlay" style="display: none;"></div>
    <div id="popupDialog" style="display: none;">
        <button class="close-btn" onclick="closeFn()">&times;</button>

        <div class="newsletter-text">
            <h2>Fluturime & Oferta - Të rejat nga Aeroporti</h2>
            <p>Bëhu pjesë e komunitetit tonë! Abonohu në newsletter-in tonë për të marrë informacione ekskluzive mbi
                ofertat speciale, shërbimet e aeroportit,
                këshilla udhëtimi dhe shumë më tepër. Qëndro i informuar dhe bëje përvojën tënde në aeroport më të lehtë
                dhe më të këndshme.</p>
            <form>
                <label for="nl-email">Enter your email:</label><br>
                <input type="email" name="nl-email" placeholder="Enter email..." />
                <button class="subscribe-btn" type="submit">Abonohu</button>
            </form>
        </div>
    </div>



    <div id="footer-placeholder"></div>

    
    <!-- Swiper JS script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="about_us.js"></script>
</body>

</html>