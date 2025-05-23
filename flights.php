<?php
global $airportName;
$airportName = "Prishtina International Airport";

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/helpers/flight_helpers.php';
require_once __DIR__ . '/helpers/cache_helpers.php';


initCache();

$arrivals = getFlightsWithCache('arrivals');
$departures = getFlightsWithCache('departures');

if (empty($arrivals)) {
    $arrivals = [
        [
            'flight_number' => 'N/A',
            'airline' => 'No flights available',
            'origin' => 'N/A',
            'scheduled_time' => '--:--',
            'status' => 'No data',
            'terminal' => 'N/A'
        ],
        [
            'flight_number' => 'PR999',
            'airline' => 'Placeholder Airlines',
            'origin' => 'Example City',
            'scheduled_time' => '12:00',
            'status' => 'On time',
            'terminal' => 'T1'
        ]
    ];
}

if (empty($departures)) {
    $departures = [
        [
            'flight_number' => 'N/A',
            'airline' => 'No flights scheduled',
            'destination' => 'N/A',
            'scheduled_time' => '--:--',
            'status' => 'No data',
            'terminal' => 'N/A'
        ],
        [
            'flight_number' => 'PR888',
            'airline' => 'Placeholder Airlines',
            'destination' => 'Sample Destination',
            'scheduled_time' => '15:30',
            'status' => 'Delayed',
            'terminal' => 'T2'
        ]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nisjet dhe mbërritjet</title>
    <link rel="stylesheet" href="flights.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
</head>

<body>
    <div id="navbar-placeholder">
    </div>

    <header id="flights-header">
        <div class="header">

            <?php
            class Greeting
            {
                public function getGreeting()
                {
                    $hour = date("H");
                    if ($hour < 12)
                        return "Mirëmëngjes!";
                    elseif ($hour < 18)
                        return "Mirëdita!";
                    else
                        return "Mirëmbrëma!";
                }
            }

            $greeter = new Greeting();
            ?>

            <div class="greeting">
                <h2 id="title1">Fluturimet</h2>
                <h2 id="greetingText"><?php echo $greeter->getGreeting(); ?></h2>

            </div>
            <h1 class="header" id="title2">Informatat</h1>
            <p class="header" id="tekst">Informacioni i fluturimit në <mark>kohë reale</mark> jepet si tregues dhe është
                i
                disponueshëm për fluturimet e sotme dhe të nesërme. Për më shumë informacion, ju lutemi, kontaktoni
                linjën tuaj ajrore.
            </p>
            <button id="playbutton" onclick="playAirportAudio()"><?php echo $airportName; ?></button>
            <audio id="audioPlayer" src="Airport Sound Effect.mp3"></audio>
        </div>
    </header>

    <section class="flights-arritjet">
        <div class="containerflights">
            <div class="constraint">
                <div class="row">
                    <div id="Row-elements">
                        <div id="flights-arritjet-icon-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g>
                                    <rect fill="none" height="24" width="24"></rect>
                                </g>
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M2.5,19h19v2h-19V19z M19.34,15.85c0.8,0.21,1.62-0.26,1.84-1.06c0.21-0.8-0.26-1.62-1.06-1.84l-5.31-1.42l-2.76-9.02 L10.12,2v8.28L5.15,8.95L4.22,6.63L2.77,6.24v5.17L19.34,15.85z"
                                                fill="#ffffff">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h2 id="title3">Mberritjet</h2>
                    </div>
                </div>
            </div>

            <div class="search" id="box2">
                <div class="search" id="Date">
                    <form method="get">
                        <select id="arr_status" onchange="filterArrivals()">
                            <option value="">Të Gjitha</option>
                            <option value="landed">Të ardhura</option>
                            <option value="scheduled">Të planifikuara</option>
                            <option value="other">Të tjera</option>
                        </select>
                    </form>

                </div>
                <div class="search">
                    <label style="margin-right: 5px;">Kerko</label>
                    <input id="srchArr" type="text" placeholder="Kerko Mberritjet">
                </div>
            </div>
            <div class="flights-arritjet-container">
                <div class="constraint">
                    <div class="containerflights">
                        <ul id="flights-container1">
                            <li>
                                <div id="tabletitle">
                                    <ul>
                                        <li>Koha</li>
                                        <li>Data</li>
                                        <li>Origjina</li>
                                        <li>Airline</li>
                                        <li>Nr. Fluturimi</li>
                                        <li>Statusi</li>
                                        <li></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <?php
                                usort($arrivals, function ($a, $b) {
                                    $timeA = strtotime($a['arrival']['estimated'] ?? $a['arrival']['scheduled'] ?? '');
                                    $timeB = strtotime($b['arrival']['estimated'] ?? $b['arrival']['scheduled'] ?? '');
                                    if ($timeA === false && $timeB === false)
                                        return 0;
                                    if ($timeA === false)
                                        return 1;
                                    if ($timeB === false)
                                        return -1;

                                    return $timeA - $timeB;
                                });
                                ?>

                                <?php
                                $arrivals = getFlightsWithCache('arrivals');

                                $statusFilter = $_GET['status'] ?? '';
                                if ($statusFilter !== '') {
                                    $arrivals = array_filter($arrivals, function ($flight) use ($statusFilter) {
                                        return strtolower($flight['flight_status'] ?? '') === strtolower($statusFilter);
                                    });
                                }
                                usort($arrivals, function ($a, $b) {
                                    $timeA = strtotime($a['arrival']['estimated'] ?? $a['arrival']['scheduled'] ?? '');
                                    $timeB = strtotime($b['arrival']['estimated'] ?? $b['arrival']['scheduled'] ?? '');
                                    return $timeA <=> $timeB;
                                });
                                ?>


                                <?php foreach ($arrivals as $flight): ?>
                                    <ul class="flights-box-arr"
                                        data-status="<?= strtolower($flight['flight_status'] ?? '') ?>"
                                        data-date="<?= getFlightDateType($flight['arrival']['scheduled']) ?>">
                                        <li><?= formatFlightTime($flight['arrival']['scheduled']) ?></li>
                                        <li><?= formatFlightDate($flight['arrival']['scheduled']) ?></li>
                                        <li><?= htmlspecialchars($flight['departure']['airport'] ?? 'N/A') ?>
                                            (<?= $flight['departure']['iata'] ?? '' ?>)</li>
                                        <li><?= htmlspecialchars($flight['airline']['name'] ?? 'N/A') ?></li>
                                        <li><?= $flight['flight']['iata'] ?? 'N/A' ?></li>
                                        <li><?= translateFlightStatus($flight['flight_status'] ?? '') ?></li>
                                        <div id="btnli">
                                            <li>
                                                <a href="#" data-details='<?= getFlightDetailsJson($flight) ?>'>
                                                    <span class="linkdetails">
                                                        <div id="linkbtn">
                                                            <button class="view-details-btn">
                                                                <img src="Photos/Home/info-flights.png" alt="Info">
                                                            </button>
                                                        </div>
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </section>

    <section class="flights-arritjet">
        <div class="containerflights">
            <div class="constraint">
                <div class="row">
                    <div id="Row-elements">
                        <div id="flights-nisjet-icon-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g>
                                    <rect fill="none" height="24" width="24"></rect>
                                </g>
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M2.5,19h19v2h-19V19z M22.07,9.64c-0.21-0.8-1.04-1.28-1.84-1.06L14.92,10l-6.9-6.43L6.09,4.08l4.14,7.17l-4.97,1.33 l-1.97-1.54l-1.45,0.39l2.59,4.49c0,0,7.12-1.9,16.57-4.43C21.81,11.26,22.28,10.44,22.07,9.64z"
                                                fill="#ffffff"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h2 id="title3">Nisjet</h2>
                    </div>
                </div>
            </div>

            <div class="search" id="box2">
                <div class="search" id="Date">
                    <form method="GET" id="filterForm">
                        <select id="dep_status" onchange="filterDepartures()">
                            <option value="">Të Gjitha</option>
                            <option value="active">Të nisura</option>
                            <option value="scheduled">Të planifikuara</option>
                            <option value="other">Të tjera</option>
                        </select>
                    </form>
                </div>
                <div class="search">
                    <label style="margin-right: 5px;">Kerko</label>
                    <input id="srchDep" type="text" placeholder="Kerko Nisjet...">
                </div>
            </div>
            <div class="flights-arritjet-container">
                <div class="constraint">
                    <div class="containerflights">

                        <ul id="flights-container1">
                            <li>
                                <div id="tabletitle">
                                    <ul>
                                        <li>Koha</li>
                                        <li>Data</li>
                                        <li>Origjin</li>
                                        <li>Airline</li>
                                        <li>Nr. Fluturimi</li>
                                        <li>Statusi</li>
                                        <div id="btnli">
                                            <li>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <?php
                                usort($departures, function ($a, $b) {
                                    $now = time();
                                    $timeA = strtotime($a['departure']['estimated'] ?? $a['departure']['scheduled'] ?? '');
                                    $timeB = strtotime($b['departure']['estimated'] ?? $b['departure']['scheduled'] ?? '');

                                    if ($timeA === false && $timeB === false)
                                        return 0;
                                    if ($timeA === false)
                                        return 1;
                                    if ($timeB === false)
                                        return -1;

                                    $isFutureA = $timeA >= $now;
                                    $isFutureB = $timeB >= $now;

                                    if ($isFutureA && !$isFutureB)
                                        return -1;
                                    if (!$isFutureA && $isFutureB)
                                        return 1;
                                    return abs($timeA - $now) <=> abs($timeB - $now);
                                });
                                ?>

                                <?php
                                $filteredDepartures = $departures;

                                if (isset($_GET['dep_status']) && $_GET['dep_status'] !== '') {
                                    $filter = $_GET['dep_status'];
                                    $filteredDepartures = array_filter($departures, function ($flight) use ($filter) {
                                        $status = strtolower($flight['flight_status'] ?? '');

                                        if ($filter === 'other') {
                                            return !in_array($status, ['active', 'scheduled']);
                                        }

                                        return $status === $filter;
                                    });

                                    usort($filteredDepartures, function ($a, $b) {
                                        $now = time();
                                        $timeA = strtotime($a['departure']['estimated'] ?? $a['departure']['scheduled'] ?? '');
                                        $timeB = strtotime($b['departure']['estimated'] ?? $b['departure']['scheduled'] ?? '');

                                        if ($timeA === false && $timeB === false)
                                            return 0;
                                        if ($timeA === false)
                                            return 1;
                                        if ($timeB === false)
                                            return -1;

                                        $isFutureA = $timeA >= $now;
                                        $isFutureB = $timeB >= $now;

                                        if ($isFutureA && !$isFutureB)
                                            return -1;
                                        if (!$isFutureA && $isFutureB)
                                            return 1;
                                        return abs($timeA - $now) <=> abs($timeB - $now);
                                    });
                                }
                                ?>

                                <div id="departure-results">
                                    <?php foreach ($filteredDepartures as $flight): ?>

                                        <ul class="flights-box-dep"
                                            data-status="<?= strtolower($flight['flight_status'] ?? '') ?>"
                                            data-date="<?= getFlightDateType($flight['departure']['scheduled']) ?>">
                                            <li><?= formatFlightTime($flight['departure']['scheduled']) ?></li>
                                            <li><?= formatFlightDate($flight['departure']['scheduled']) ?></li>
                                            <li><?= htmlspecialchars($flight['arrival']['airport'] ?? 'N/A') ?>
                                                (<?= $flight['arrival']['iata'] ?? '' ?>)</li>
                                            <li><?= htmlspecialchars($flight['airline']['name'] ?? 'N/A') ?></li>
                                            <li><?= $flight['flight']['iata'] ?? 'N/A' ?></li>
                                            <li><?= translateFlightStatus($flight['flight_status'] ?? '') ?></li>
                                            <div id="btnli">
                                                <li>
                                                    <a href="#"
                                                        data-details='<?= getFlightDetailsJson($flight, 'departure') ?>'>
                                                        <span class="linkdetails">
                                                            <div id="linkbtn">
                                                                <button class="view-details-btn">
                                                                    <img src="Photos/Home/info-flights.png" alt="Info">
                                                                </button>
                                                            </div>
                                                        </span>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>

                                    <?php endforeach; ?>
                                </div>
    </section>

    <br>
    <br>
    <div id="slogan">
        <h2>Ready for
            <span id="accent-color">the world</span>
        </h2>
        <br>
        <p>Shijoni fluturimin tuaj dhe <b>zbuloni ofertat</b> më të fundit nga partnerët tanë

        </p>
        <br>
    </div>

    <div id="offers-box">
        <div class="offers-partners-container">
            <div id="cover-img-content">
                <img src="fotot/car-rental-2.jpg">
            </div>
            <div id="content-card">
                <h3>Merr Makinë me qira</h3>
                <div id="content-card-button-group">
                    <p><span>Çmimet më të mira</span> të makinave me qira! Shijoni udhëtimin tuaj me ne. udhëtoni me
                        stil!</p>
                    <a class="link" target="_blank" href="services.php#car-rentals-section">Kliko Ketu!</a>
                </div>
            </div>
        </div>

        <div class="offers-partners-container">
            <div id="cover-img-content">
                <img src="Photos/Home/newsletter-flights.jpeg">
            </div>
            <div id="content-card">
                <div id="content-card-button-group">
                    <h3>Regjistrohu në buletinin tonë!</h3>
                    <p><span>Oferta pushimesh</span> të zgjedhura, lajmet më të fundit për udhëtimet, direkt në E-mail
                    </p>
                    <a class="link abonohu-btn" target="_blank" href="about_us.php#newsletter">Kliko Ketu!</a>


                </div>
            </div>
        </div>
    </div>

    <div id="footer-placeholder">

    </div>

    <div id="popup-overlay" style="display: none;"></div>


    <div id="flight-popup" style="display: none;">
        <span class="close">&times;</span>
        <div class="titleFlex">
            <h2 id="popup-title"></h2>
        </div>
        <div class="elementFlex">
            <div id="detailsSplit">
                <div id="popup-details"></div>
                <div id="popup-scheduled"></div>
            </div>
            <div id="countrySplit">
                <div id="popup-countryFrom" class="countryInfo"></div>
                <div id="popup-countryDestination" class="countryInfo"></div>
            </div>
        </div>

    </div>



    <script src="/UEB25_GR3/script/flights.js"></script>
    <script>
        $(function () {
            $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
            $("#footer-placeholder").load("footer.html");
        });




    </script>

</body>







</html>