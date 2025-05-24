<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
    <link rel="stylesheet" href="/UEB25_GR3/style/home.css">
    <title>Prishtina Airport</title>

    <!-- ICON LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
</head>
<body>
    <nav>
        <div id="navbar-placeholder"></div>
    </nav> 

    <header>
        <div class="title-text">
            <h3>Mirë se erdhët në <br>
                <span id="title-main">Prishtina International Airport</span><br>
                <span id="title-second">Adem Jashari</span>
            </h3>
        </div>

        <div class="easterEgg">
            <audio id="easterAudio" src="audio/MOV_0.mp3"></audio>
        </div>

        <?php 
            class Flashcard{
                private $path;
                private $text;
                private $title;

                function __construct($path, $title, $text){
                    $this->path = $path;
                    $this->title = $title;
                    $this->text = $text;
                }

                function getPath(){
                    return $this->path;
                }
                function getTitle(){
                    return $this->title;
                }
                function getText(){
                    return $this->text;
                }
            }

            $flashcards = [
                new Flashcard("/UEB25_GR3/Photos/Home/flash-airplane.png", "Pse ne?", "Ofrimi i shërbimit të shkëlqyer dhe një staf i trajnuar sigurojnë udhëtime të sigurta dhe komode. Zgjedhja jonë do t'ju bëjë të ndiheni të sigurt dhe të kënaqur gjatë çdo udhëtimi."),
                new Flashcard("/UEB25_GR3/Photos/Home/flash-luggage.png", "Siguria?", "Siguria është prioriteti ynë kryesor. Përdorimi i teknologjive moderne dhe masave të rrepta na mundëson të sigurojmë udhëtime të sigurta dhe pa shqetësime për çdo udhëtar."),
                new Flashcard("/UEB25_GR3/Photos/Home/flash-location.png", "Destinacionet?", "Ofrimi i fluturimeve për destinacione të ndryshme anembanë botës. Ne lidhim qytete të njohura dhe mundësojmë udhëtime të paharrueshme për çdo udhëtar.")
            ];
        ?>

        <section class="flash-cards">
            <?php foreach($flashcards as $flashcard): ?>
                <div class="flashcard" id="first-flashcard">
                    <img src="<?php echo $flashcard->getPath()?>" alt="">
                    <h2><?php echo $flashcard->getTitle()?></h2>
                    <p><?php echo $flashcard->getText() ?></p>
                </div>
            <?php endforeach; ?>
        </section>
    </header>


    <div class="bg-container">
        <section id="experience">
            <h1 class="section-title">Si deshironi ta perjetoni Prishtinen?</h1>

            <div class="experience-filter">
                <div id="plane" class="active" >
                    <i class="fa-solid fa-plane" style="transform: rotate(-45deg);margin-right: 10px;"></i>
                    <p>Brenda ne Aeroport</p>
                </div>
                <div id="city">
                    <i class="fa-solid fa-city" style="margin-right: 10px;"></i>
                    <p>Eksploro Qytetin</p>
                </div>
            </div>

            <div class="exp-photo-container airport active">
                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-cafe.jpg);">
                    <p>Shijoni kafenë tuaj të preferuar në aeroport.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-shopping.webp);">
                    <p>Dyqane me markat më të njohura ndërkombëtare.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-kidsplayzone.webp);">
                    <p>Zona e lojërave për fëmijë për argëtim të sigurt.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-dutyfree.webp);">
                    <p>Blini produkte pa taksa në dyqanet Duty Free.</p>
                </div>
                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-relax.webp);">
                    <p>Pushoni dhe relaksohuni para fluturimit tuaj.</p>
                </div>
            </div>

            <div class="exp-photo-container city">
                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-bibloteka.avif);">
                    <p>Eksploroni arkitekturën unike dhe koleksionin e gjerë të librave.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-newborn.jpg);">
                    <p>Vend ikonik në Prishtinë që simbolizon pavarësinë e Kosovës.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-concert.jpg);">
                    <p>Përjetoni jetën e natës me klube dhe ambiente me muzikë live.</p>
                </div>

                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-muzeu.jpg);">
                    <p>Udhëtoni në kohë dhe mësoni për traditat dhe kulturën në Kosovë.</p>
                </div>
                <div class="exp-photo" style="background-image: url(/UEB25_GR3/Photos/Home/exp-mall.jpg);">
                    <p>Zbuloni Prishtina Mall për shopping dhe argëtim të shkëlqyer!</p>
                </div>
            </div>
        </section>

        <?php 
            $partners = [
                ["img"=>"/UEB25_GR3/Photos/Home/logo-kfc.png", "name"=>"KFC Kosova"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-airprishtina.png", "name"=>"Air Prishtina"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-pizza.png", "name"=>"Sach Pizza"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-prishtinamall.png", "name"=>"Prishtina Mall"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-bank.png", "name"=>"Pro Credit Bank"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-sach.png", "name"=>"Sach Caffe"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-up.png", "name"=>"Universiteti i Prishtinës"],
                ["img"=>"/UEB25_GR3/Photos/Home/logo-swiss.png", "name"=>"Swiss Diamond Hotel"]
            ];
        ?>

        <section id="partners">
            <h1 class="section-title">Partnerë tanë</h1>
            <div class="partners-container">
            <?php foreach($partners as $partner):?>
                <div class="partners-child">
                    <div class="blueshade"></div>
                    <img src="<?php echo $partner["img"]; ?>" alt="">
                    <p><?php echo $partner["name"];?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="parkingCalc">
            <h1 class="section-title">Parking Calculator</h1>

            <div class="parking-container">
                <div class="parking-prices">
                    <table>
                        <tr>
                            <td>0-15 MINUTA</td>
                            <td>Falas</td>
                        </tr>
                        <tr>
                            <td>DERI 2 ORË</td>
                            <td>€2.00</td>
                        </tr>
                        <tr>
                            <td>2-6 ORË</td>
                            <td>€4.00</td>
                        </tr>
                        <tr>
                            <td>6-12 ORË</td>
                            <td>€6.00</td>
                        </tr>
                        <tr>
                            <td>24 ORË</td>
                            <td>€8.00</td>
                        </tr>
                        <tr>
                            <td>AUTOBUS</td>
                            <td>€10.00</td>
                        </tr>
                    </table>
                    <p>Kujdes: Në rast humbje të biletës, duhet paguar tarifë prej 8€</p>
                </div>

                <div class="parking-calculator">
                    <div id="sub-container">
                        <div>
                            <label for="Entry Date">Data hyrjes</label>
                            <input type="date" class="parking-input"  id="data-hyrje" name="data-hyrje" value="">
                            <label for="Exit Date" >Data daljes</label>
                            <input type="date" class="parking-input" id="data-dalje" name="data-exit" value="">
                        </div>
                        <div>
                            <label for="Koha">Koha hyrjes</label>
                            <input type="time" class="parking-input" id="koha-hyrje" name="time-entry" value="">
                            <label for="Koha">Koha daljes</label>
                            <input type="time" class="parking-input" id="koha-dalje" name="time-exit" value="">
                        </div>
                    </div>
                    
                    <p id="showQmimi"></p>
                    <button type="submit" id="btn-parking">Llogarit</button>
                </div>
            </div>
        </section>

        <section id="orientationVideo">
            <h1 class="section-title">Fluturimi i parë? Ja çfarë duhet të dish</h1>

            <div class="orient-container">
                <div class="orient-photo"></div>
    
                <div class="orient-video">
                    <video width="100%" height="auto" controls>
                        <source src="/UEB25_GR3/Photos/Home/Orientation video.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            
        </section>
    </div>

    <footer>
        <div id="footer-placeholder"></div>
    </footer>

    <script src="/UEB25_GR3/script/home.js"></script>
</body>
</html>