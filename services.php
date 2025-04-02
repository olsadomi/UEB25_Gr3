<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shërbimet</title>
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="services_responsive.css">
    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
</head>

<body>
    <div id="navbar-placeholder"></div>

    <header id="services-header">
        <h1>Shërbimet</h1>
    </header>

    <section id="what-we-offer-section">
        <h2>Çfarë ofrojmë ne?</h2>
        <canvas id="circleCanvas" width="600" height="200"></canvas>

        <script>
            const canvas = document.getElementById("circleCanvas");
            const ctx = canvas.getContext("2d");

            const circles = [
                { x: 100, y: 100, radius: 75, color: "#0c356a", text: "Shërbim Klienti 24/7", dx: 0.5, dy: 0.5 },
                { x: 300, y: 100, radius: 75, color: "#ffc436", text: "Hapësirë komode", dx: -0.5, dy: 0.5 },
                { x: 500, y: 100, radius: 75, color: "#0174be", text: "Teknologji moderne", dx: 0.5, dy: -0.5 },
            ];

            function drawCircle(circle) {
                ctx.beginPath();
                ctx.arc(circle.x, circle.y, circle.radius, 0, Math.PI * 2);
                ctx.fillStyle = circle.color;
                ctx.fill();
                ctx.closePath();

                ctx.fillStyle = "#fff";
                ctx.font = "16px sans-serif";
                ctx.textAlign = "center";
                ctx.textBaseline = "middle";
                ctx.fillText(circle.text, circle.x, circle.y);
            }

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                circles.forEach(circle => {
                    drawCircle(circle);

                    circle.x += circle.dx;
                    circle.y += circle.dy;

                    if (circle.x + circle.radius > canvas.width || circle.x - circle.radius < 0) {
                        circle.dx = -circle.dx;
                    }
                    if (circle.y + circle.radius > canvas.height || circle.y - circle.radius < 0) {
                        circle.dy = -circle.dy;
                    }
                });

                requestAnimationFrame(animate);
            }

            animate();
        </script>
    </section>

    <section id="where-to-buy-tickets-section">
        <h2>Ku mund të bleni bileta në <abbr title="Prishtina Airport">PIA</abbr>?</h2>

        <table>
            <thead>
                <th>Agjencia</th>
                <th>Oraret</th>
                <th>Lokacioni</th>
            </thead>

            <tbody>
                <tr>
                    <td>Air Albania</td>
                    <td><u>00:00 - 12:00</u> & <u>13:00 - 23:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Austrian Airlines</td>
                    <td><u>24/7</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>British Airways</td>
                    <td><u>00:00 - 11:00</u> & <u>12:00 - 22:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Amadeus Travel and Tours</td>
                    <td><u>00:00 - 12:00</u> & <u>13:00 - 23:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Albawings</td>
                    <td><u>00:00 - 10:00</u> & <u>12:00 - 23:59</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Dea Lines</td>
                    <td><u>00:00 - 12:00</u> & <u>13:00 - 23:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Union Travel</td>
                    <td><u>24/7</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Easy Travel</td>
                    <td><u>24/7</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>WizzAir</td>
                    <td><u>24/7</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Air Albania</td>
                    <td><u>00:00 - 12:00</u> & <u>13:00 - 23:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Blue Panorama</td>
                    <td><u>00:00 - 12:00</u> & <u>13:00 - 23:00</u></td>
                    <td>Check-in Area</td>
                </tr>
                <tr>
                    <td>Olympic Airways</td>
                    <td><u>24/7</u></td>
                    <td>Check-in Area</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="wifi-section">
        <h2>Interneti</h2>
        <button class="wifi-button">Klikoni këtu për detajet shtesë</button>
        <div class="message-box">Kemi një befasi për ju! Ne ofrojmë FREE WI-FI në çdo hapësirë të aeroportit tonë!</div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".wifi-button").click(function () {
                    $(".message-box").fadeOut(300, function () {
                        $(this)
                            .slideDown(700)
                            .animate({ opacity: 1 }, 400);
                    });
                });
            });
        </script>
    </section>

    <section id="car-rentals-section">
        <h2>Rent a Car - Merr makinen me qira</h2>
        <div id="car-rental-container">
            <div class="car-rental-brand">
                <h3><b>Hertz</b></h3>
                <img src="car-rental-1.jpg">
                <p><i>Shërbehu në Hertz - me mijëra lokacione në gjithë botën!</i></p>
                <button onclick="showDetails(0)">Detajet</button>
            </div>
            <div class="car-rental-brand">
                <h3><b>Europcar</b></h3>
                <img src="car-rental-2.jpg">
                <p><i>Shërbime të mrekullueshme, makina të reja, çmime marramendëse!</i></p>
                <button onclick="showDetails(1)">Detajet</button>
            </div>
            <div class="car-rental-brand">
                <h3><b>AVIS</b></h3>
                <img src="car-rental-3.jpg">
                <p><i>Përzgjedh nga larmishmëria e pafundme e makinave që ofrojmë!</i></p>
                <button onclick="showDetails(2)">Detajet</button>
            </div>
        </div>

        <div id="tab">
            <div id="tab-content">
                <span id="close-button">&times;</span>
                <div id="tab-details"></div>
            </div>
        </div>
    </section>

    <section id="transport-section">
        <div id="transport-container">
            <div class="transport-circle"><a href="taxi.pdf" download="taxi.pdf" target="_blank">TAKSI<br> <span>Lexo më
                        shumë</span></a></div>
            <div class="transport-circle"><a href="bus.pdf" download="bus.pdf" target="_blank">AUTOBUS <br><span>Lexo më
                        shumë</span></a></div>
        </div>
    </section>

    <section id="parking-spots-section">
        <h2>Hapësirat për parking</h2>
        <p class="counter">0</p>

        <table>
            <thead>
                <th>Koha</th>
                <th>Pagesa</th>
            </thead>
            <tbody>
                <tr>
                    <td>15 minuta</td>
                    <td>FREE</td>
                </tr>
                <tr>
                    <td>Deri ne 2 orë</td>
                    <td>2&#8364;</td>
                </tr>
                <tr>
                    <td>2-6 orë</td>
                    <td>4&#8364;</td>
                </tr>
                <tr>
                    <td>6-12 orë</td>
                    <td>6&#8364;</td>
                </tr>
                <tr>
                    <td>24 orë</td>
                    <td>8&#8364;</td>
                </tr>
            </tbody>
        </table>

        <div class="calculator">
            <h3>Kalkulatori për pagesën e parkingut</h3>

            <div class="input-group">
                <label for="entryDate">Data e hyrjes: </label>
                <input type="date" id="entryDate">
                <label for="entryHour">Ora: </label>
                <input type="number" id="entryHour" min="0" max="23" value="10">
                <label for="entryMin">Min: </label>
                <input type="number" id="entryMin" min="0" max="59" value="00">
            </div>

            <div class="input-group">
                <label for="exitDate">Data e daljes: </label>
                <input type="date" id="exitDate">
                <label for="exitHour">Ora: </label>
                <input type="number" id="exitHour" min="0" max="23" value="10">
                <label for="exitMin">Min: </label>
                <input type="number" id="exitMin" min="0" max="59" value="00">
            </div>

            <div class="button-container">
                <button onclick="calculateFee()">Kalkulo</button>
            </div>

            <div class="result" id="result"></div>
        </div>
    </section>

    <section id="photo-collage-section">
        <h2>Dyqanet</h2>
        <div class="gallery shops">
            <img src="shop1.jpg" alt="Shop 1">
            <img src="shop2.jpeg" alt="Shop 2">
            <img src="shop3.webp" alt="Shop 3">
            <img src="shop4.jpg" alt="Shop 4">
            <img src="shop5.jpg" alt="Shop 5">
            <img src="shop6.jpg" alt="Shop 6">
            <img src="shop7.webp" alt="Shop 7">
            <img src="shop8.jpg" alt="Shop 8">
            <img src="shop9.jpg" alt="Shop 9">
        </div>

        <h2>Restaurantet</h2>
        <div class="gallery restaurants">
            <img src="restaurant1.webp" alt="Restaurant 1">
            <img src="restaurant2.jpg" alt="Restaurant 2">
            <img src="restaurant3.jpg" alt="Restaurant 3">
            <img src="restaurant4.jpg" alt="Restaurant 4">
            <img src="restaurant5.jpg" alt="Restaurant 5">
            <img src="restaurant6.jpg" alt="Restaurant 6">
            <img src="restaurant7.jpg" alt="Restaurant 7">
            <img src="restaurant8.jpg" alt="Restaurant 8">
            <img src="restaurant9.jpg" alt="Restaurant 9">
        </div>
    </section>

    <section id="star-rating-section">
        <h2>Vlerësoni aeroportin:</h2>
        <div class="star-rating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <p>Vlerësimi juaj: <span id="rating-value">0</span> yje</p>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var stars = $(".star");
            var ratingValue = $("#rating-value");

            stars.on("mouseover", function () {
                var value = $(this).data("value");

                stars.each(function () {
                    if ($(this).data("value") <= value) {
                        $(this).css("color", "gold");
                    } else {
                        $(this).css("color", "#ccc");
                    }
                });
            });

            stars.on("mouseout", function () {
                stars.each(function () {
                    if (!$(this).hasClass("selected")) {
                        $(this).css("color", "#ccc");
                    }
                });
            });

            stars.on("click", function () {
                var value = $(this).data("value");
                ratingValue.text(value);

                stars.each(function () {
                    if ($(this).data("value") <= value) {
                        $(this).addClass("selected");
                    } else {
                        $(this).removeClass("selected");
                    }
                });
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            let hasAnimated = false;

            $(window).on("scroll", function () {
                let sectionOffset = $("#parking-spots-section").offset().top;
                let scrollPosition = $(window).scrollTop();
                let windowHeight = $(window).height();

                if (scrollPosition + windowHeight > sectionOffset && !hasAnimated) {
                    hasAnimated = true;
                    animateCounter(0, 950, 4000);
                }
            });

            function animateCounter(start, end, duration) {
                let $counter = $(".counter");
                let range = end - start;
                let startTime = Date.now();

                function updateCounter() {
                    let elapsed = Date.now() - startTime;
                    let progress = elapsed / duration;

                    let easedProgress = easeInOut(progress);
                    let currentValue = Math.floor(start + range * easedProgress);

                    $counter.text(currentValue);

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        $counter.text(end);
                    }
                }

                function easeInOut(t) {
                    return t < 0.5 ? 2 * t * t : 1 - Math.pow(-2 * t + 2, 2) / 2;
                }

                updateCounter();
            }
        });
    </script>

    <div id="footer-placeholder"></div>

    <script src="sevices.js"></script>


</body>

</html>