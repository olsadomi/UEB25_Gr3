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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
</head>

<body>
    <div id="navbar-placeholder">
    </div>

    <header id="flights-header">
        <div class="header">
            <h2 class="header" id="title1">Fluturimet</h2>
            <h1 class="header" id="title2">Informatat</h1>
            <p class="header" id="tekst">Informacioni i fluturimit në <mark>kohë reale</mark> jepet si tregues dhe është
                i
                disponueshëm për fluturimet e sotme dhe të nesërme. Për më shumë informacion, ju lutemi, kontaktoni
                linjën tuaj ajrore.
            </p>
            <button id="playbutton">Prishtina Airport</button>
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
                        <h2 id="title3">Arrivals</h2>
                    </div>
                </div>
            </div>

            <div class="search" id="box2">
                <div class="search" id="Date">
                    <label style="margin-right: 5px;">Dita</label>
                    <select id="selectdatearr">
                        <option value="">All</option>
                        <option value="today">Today</option>
                        <option value="tomorrow">Tomorrow</option>
                    </select>
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
                                        <li>Time</li>
                                        <li>Date</li>
                                        <li>Origin</li>
                                        <li>Airline</li>
                                        <li>Flight no.</li>
                                        <li>Status</li>
                                        <li></li>

                                    </ul>
                                </div>
                            </li>
                            <li>

                                <ul class="flights-box-arr" data-date="today">
                                    <li>00:05</li>
                                    <li>02/01/2025</li>
                                    <li>Milan Malpensa(IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5026</li>
                                    <li>Landed</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: W4 5026", "details": "Departed at 10:00 PM,\nFrom: Terminal 2", "scheduled": "Scheduled arrival time: January 2, 2025 \nAt: 0:05", "countryFrom": "From: Italy , Milan Malpensa(MIX)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-arr" data-date="tomorrow">
                                    <li>00:05</li>
                                    <li>02/01/2025</li>
                                    <li>Milan Bergamo (IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5022</li>
                                    <li>On-Route</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5022", "details": "Departed at 10:00 PM,\nFrom: Terminal 1", "scheduled": "Scheduled arrival time: January 2, 2025 \nAt: 0:08", "countryFrom": "From: Italy , Milan Bergamo(BGY)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-arr" data-date="today">
                                    <li>00:27</li>
                                    <li>02/01/2025</li>
                                    <li>Brindisi(IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5044</li>
                                    <li>On-Route</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5044", "details": "Departed at 10:30 PM,\nFrom: Terminal 4", "scheduled": "Scheduled arrival time: January 2, 2025 \nAt: 0:27", "countryFrom": "From: Italy, Brindisi(BDS)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-arr" data-date="today">
                                    <li>00:30</li>
                                    <li>02/01/2025</li>
                                    <li>Bari(IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5044</li>
                                    <li>Cancelled</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5044", "details": "Departed at --:-- PM,\nFrom: Terminal --", "scheduled": "Scheduled arrival time: --:--", "countryFrom": "Status: Cancelled", "countryDestination": "Contact for more information."}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                        </li>
                                        </a>
                                    </div>
                                </ul>


                                <ul class="flights-box-arr" data-date="today">
                                    <li>00:50</li>
                                    <li>02/01/2025</li>
                                    <li>Vienna/Vjene(IT)</li>
                                    <li>AUSTRIAN AIRLINES AG</li>
                                    <li>OS 849</li>
                                    <li>Landed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: OS 849", "details": "Departed at 11:15 PM,\nFrom: Terminal 6", "scheduled": "Scheduled arrival time: January 2, 2025 \nAt: 0:50", "countryFrom": "From: Austria, Vienna/Vjene (VIE)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-arr" data-date="today">
                                    <li>00:20</li>
                                    <li>05/01/2025</li>
                                    <li>Genoa(IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5084</li>
                                    <li>Landed</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: W4 5084", "details": "Departed at 11:00 PM,\nFrom: Terminal 5", "scheduled": "Scheduled arrival time: January 5, 2025 \nAt: 0:20", "countryFrom": "From: Italy , Genoa(GOA)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-arr" data-date="tomorrow">
                                    <li>02:45</li>
                                    <li>05/01/2025</li>
                                    <li>London Luton(GB)</li>
                                    <li>Wizz Air UK</li>
                                    <li>W9 5006</li>
                                    <li>Landed</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: W9 5006", "details": "Departed at 12:00 AM,\nFrom: Terminal 4", "scheduled": "Scheduled arrival time: January 5, 2025 \nAt: 2:45", "countryFrom": "From: United Kingdom , London Luton(LTN)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-arr" data-date="today">
                                    <li>07:25</li>
                                    <li>05/01/2025</li>
                                    <li>Bologna/Bolonje(IT)</li>
                                    <li>Ryanair</li>
                                    <li>FR 8398</li>
                                    <li>Delayed</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: FR 8398", "details": "Departed at 4:30 AM,\nFrom: Terminal 1", "scheduled": "Scheduled arrival time: January 5, 2025 \nAt: 7:25", "countryFrom": "From: Italy , Bologna/Bolonje(BLQ)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-arr" data-date="tomorrow">
                                    <li>08:55</li>
                                    <li>05/01/2025</li>
                                    <li>Zurich(CH)</li>
                                    <li>SWISS International Airlines</li>
                                    <li>LX 1442</li>
                                    <li>On-Route</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: LX 1442", "details": "Departed at 5:45 AM,\nFrom: Terminal 2", "scheduled": "Scheduled arrival time: January 5, 2025 \nAt: 8:25", "countryFrom": "From: Switzerland , Zurich (ZRH)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-arr" data-date="tomorrow">
                                    <li>10:30</li>
                                    <li>05/01/2025</li>
                                    <li>Duseldorf(DE)</li>
                                    <li>EUROWINGS</li>
                                    <li>EW 9916</li>
                                    <li>On-Route</li>
                                    <div id="btnli">
                                        <li><a href="#"
                                                data-details='{"title": "Flight Details: EW 9916", "details": "Departed at 7:25 AM,\nFrom: Terminal 9", "scheduled": "Scheduled arrival time: January 5, 2025 \nAt: 10:30", "countryFrom": "From: Germany , Duseldorf(DUS)", "countryDestination": "To: Kosovo, Prishtina(PIA)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn">
                                                            <img src="Photos/info-flights.png" alt="Info">
                                                        </button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                            </li>
                        </ul>
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
                        <h2 id="title3">Departures</h2>
                    </div>
                </div>
            </div>

            <div class="search" id="box2">
                <div class="search" id="Date">
                    <label style="margin-right: 5px;">Dita</label>
                    <select id="selectdatedep">
                        <option value="">All</option>
                        <option value="today">Today</option>
                        <option value="tomorrow">Tomorrow</option>
                    </select>
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
                                        <li>Time</li>
                                        <li>Date</li>
                                        <li>Origin</li>
                                        <li>Airline</li>
                                        <li>Flight no.</li>
                                        <li>Status</li>
                                        <div id="btnli">
                                            <li>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                            <li>

                                <ul class="flights-box-dep" data-date="today">
                                    <li>02:25</li>
                                    <li>20/12/2024</li>
                                    <li>Sabiha Gokcen Intl.</li>
                                    <li>Pegasus Airlines</li>
                                    <li>PC 284</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-dep" data-date="tomorrow">
                                    <li>04:00</li>
                                    <li>20/12/2024</li>
                                    <li>London Luton (GB)</li>
                                    <li>Wizz Air UK</li>
                                    <li>W9 5005</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-dep" data-date="today">
                                    <li>06:00</li>
                                    <li>20/12/2024</li>
                                    <li>Cienna/Vjene (AT)</li>
                                    <li>Austrian Airlines AG</li>
                                    <li>OS 850</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-dep" data-date="today">
                                    <li>06:00</li>
                                    <li>20/12/2024</li>
                                    <li>Brussels Charleroi(BE)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5131</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>


                                <ul class="flights-box-dep" data-date="tomorrow">
                                    <li>06:05</li>
                                    <li>20/12/2024</li>
                                    <li>Dortmund(DE)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5101</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-dep" data-date="today">
                                    <li>06:50</li>
                                    <li>05/01/2025</li>
                                    <li>Treviso(IT)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5036</li>
                                    <li>Delayed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5046", "details": "Check-in From: Desk 20, \nCheck-in to: Desk 26, \nGate: 04 ", "scheduled": "Scheduled Departure at 06:50 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Italy , Treviso(TSF)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-dep" data-date="today">
                                    <li>10:00</li>
                                    <li>05/01/2025</li>
                                    <li>Prague (CZ)</li>
                                    <li>Wizz Air Malta</li>
                                    <li>W4 5137</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5137", "details": "Check-in From: Desk 20, \nCheck-in to: Desk 25, \nGate: 14 ", "scheduled": "Scheduled Departure at 10:00 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Czech Republic , Prague(PRG)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-dep" data-date="today">
                                    <li>18:40</li>
                                    <li>05/01/2025</li>
                                    <li>Stockholm Arlanda(ARN)</li>
                                    <li>Ryanair</li>
                                    <li>FR 8418</li>
                                    <li>Delayed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 8418", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 12 ", "scheduled": "Scheduled Departure at 06:40 PM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Sweden , Stockholm Arlanda (ARN)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-dep" data-date="tomorrow">
                                    <li>06:00</li>
                                    <li>05/01/2025</li>
                                    <li>Brussels Charleroi(BE)</li>
                                    <li>Wizz Arir Malta</li>
                                    <li>W4 5131</li>
                                    <li>Departed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: W4 5131", "details": "Check-in From: Desk 20, \nCheck-in to: Desk 26, \nGate: 02 ", "scheduled": "Scheduled Departure at 06:00 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Belgium , Brussels Charleroi (CRL)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>

                                <ul class="flights-box-dep" data-date="tomorrow">
                                    <li>09:55</li>
                                    <li>05/01/2025</li>
                                    <li>Vienna/Vjene(AT)</li>
                                    <li>Ryanair</li>
                                    <li>FR 6889</li>
                                    <li>Gate Closed</li>
                                    <div id="btnli">
                                        <li>
                                            <a href="#"
                                                data-details='{"title": "Flight Details: FR 6889", "details": "Check-in From: Desk A, \nCheck-in to: Desk B, \nGate: 04 ", "scheduled": "Scheduled Departure at 09:55 AM", "countryFrom": "From: Kosovo, Prishtina(PIA)", "countryDestination": "To: Austria , Vienna/Vjene(VIE)"}'>
                                                <span class="linkdetails">
                                                    <div id="linkbtn">
                                                        <button class="view-details-btn"><img
                                                                src="Photos/info-flights.png" alt="Info"></button>
                                                    </div>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>



                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                    <img src="car-rental-2.jpg">
                </div>
                <div id="content-card">
                    <h3>Merr Makinë me qira</h3>
                    <p>Çmimet më të mira të makinave me qira! Shijoni udhëtimin tuaj me ne.</p>
                    <a class="link" target="_blank" href="services.html#car-rentals-section">Kliko Ketu!</a>

                </div>
            </div>

            <div class="offers-partners-container">
                <div id="cover-img-content">
                    <img src="Photos/newsletter-flights.jpeg">
                </div>
                <div id="content-card">
                    <h3>Regjistrohu në buletinin tonë!</h3>
                    <p><span>Oferta pushimesh</span> të zgjedhura, lajmet më të fundit për udhëtimet, direkt në E-mail</p>
                    <div id="newsletter-submit">
                    <input type="email" id="email" name="email" placeholder="Enter your email..." required>
                    <button type="submit" id="submitemail" style="font-size: 10px;">Regjistrohu</button>
                    </div>
                    <p id="mesazh"></p>
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



    <script src="flights.js"></script>
    <script>
        $(function () {
            $("#navbar-placeholder").load("nav.html");
            $("#footer-placeholder").load("footer.html");
        });


        document.getElementById('submitemail').addEventListener('click', validate);
        messageElement.style.display = "none";  
        messageElement.innerText = "";
            
    </script>

</body>







</html>