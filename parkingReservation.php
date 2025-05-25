<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezero Parking</title>
     <link rel="stylesheet" href="/UEB25_GR3/style/parkingReservation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>
    <nav>
        <div id="navbar-placeholder"></div>
    </nav> 

    <header>
        <h3>Rezervimi Online i Parkingut</h3>
        <section id="parkingCalc">
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
                    <form id="parkingForm" action="parkingReservation.php" method="POST">
                        <div id="sub-container">
                            <div>
                                <label for="Entry Date">Data hyrjes</label>
                                <input type="date" class="parking-input"  id="data-hyrje" name="data-hyrje" 
                                value="<?php echo isset($_POST['data-hyrje']) ? htmlspecialchars($_POST['data-hyrje']) : ''; ?>">
                            
                                <label for="Exit Date" >Data daljes</label>
                                <input type="date" class="parking-input" id="data-dalje" name="data-exit" 
                                value="<?php echo isset($_POST['data-dalje']) ? htmlspecialchars($_POST['data-dalje']) : ''; ?>">
                            </div>
                            
                            <div>
                                <label for="Koha">Koha hyrjes</label>
                                <input type="time" class="parking-input" id="koha-hyrje" name="time-entry" 
                                value="<?php echo isset($_POST['koha-hyrje']) ? htmlspecialchars($_POST['koha-hyrje']) : ''; ?>">
                                
                                <label for="Koha">Koha daljes</label>
                                <input type="time" class="parking-input" id="koha-dalje" name="time-exit" 
                                value="<?php echo isset($_POST['koha-dalje']) ? htmlspecialchars($_POST['koha-dalje']) : ''; ?>">
                            </div>
                        </div>

                        <p id="showQmimi">Totali: <?php echo isset($_POST['qmimi']) ? htmlspecialchars($_POST['qmimi']): '0'; ?> €</p>
                        <button type="button" id="btn-paguaj">Paguaj</button>
                    </form>
                </div>
            </div>
        </section>
    </header>

    <script src="/UEB25_GR3/script/parkingReservation.js"></script>
</body>
</html>