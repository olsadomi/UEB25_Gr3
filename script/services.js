$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});


const tab = document.getElementById('tab');
const tabContent = document.querySelector('#tab-content #tab-details');
const closeButton = document.querySelector('#close-button');

const details = [
    `<p>Mirë se vini në Hertz Car Hire. Në vitin 1918, themeluesi ynë, Walter Jacobs pati një ide të guximshme. Sot, me mbi 10,000 vendndodhje në 145 vende dhe 6 kontinente, ne jemi kompania më globale e makinave me qira në botë.</p>
    <p>Kontaktoni me kompaninë:</p>
    <address>Website: <a href="http://www.hertzalbania.com/">http://www.hertzalbania.com/</a></address>
    <address>Email: <a href="mailto:info@hertzalbania.com">info@hertzalbania.com</a></address>
    <address>Nr. tel: <a href="tel:+38344205877">+38344205877</a></address>
    <form>
        <label class="paraqitni">Paraqitni kerkesen tuaj:</label>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <textarea placeholder="Shkruani kerkesen ketu..."></textarea>
        <button type="submit">Dergo</button>
    </form>`,

    `<p>Shërbimi miqësor, makinat e reja dhe çmimet e ulëta janë pjesë e ofertës sonë të përditshme. Pavarësisht nëse jeni duke marrë me qira një makinë për biznes ose kënaqësi, Europcar ka makinën e duhur me qira në Aeroportin e Prishtines për ju.</p>
    <p>Kontaktoni me kompaninë:</p>
    <address>Website: <a href="https://www.cheap-auto-rentals.com">https://www.cheap-auto-rentals.com</a></address>
    <address>Email: <a href="mailto:info@europcar.com.al">info@europcar.com.al</a></address>
    <address>Nr. tel: <a href="tel:+38349125875">+38349125875</a></address>
    <form>
        <fieldset>Paraqitni kerkesen tuaj:</fieldset>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <textarea placeholder="Shkruani kerkesen ketu..."></textarea>
        <button type="submit">Dergo</button>
    </form>`,

    `<p>Mirë se vini në AVIS. Rent a Car në Prishtina Airport, (PA) me Avis Rent a Car. Zgjidhni nga një sërë opsionesh te makinave speciale lokale.</p>
    <p>Kontaktoni me kompaninë:</p>
    <address>Website: <a href="http://www.avis.al/">http://www.avis.al/</a></address>
    <address>Email: <a href="mailto:info@avis.al">info@avis.al</a></address>
    <address>Nr. tel: <a href="tel:+38348205333">+38348205333</a></address>
    <form>
        <fieldset>Paraqitni kerkesen tuaj:</fieldset>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <textarea placeholder="Shkruani kerkesen ketu..."></textarea>
        <button type="submit">Dergo</button>
    </form>`
];

function showDetails(index) {
    tabContent.innerHTML = details[index];
    tab.style.display = "flex";
}


closeButton.addEventListener("click", ()=>{
    tab.style.display = "none";
})

window.addEventListener("click", (event) => {
    if(event.target === tab) {
        tab.style.display = "none";
    }
})


function calculateFee() {
    const entryDate = new Date(document.getElementById("entryDate").value);
    const exitDate = new Date(document.getElementById("exitDate").value);

    const entryHour = parseInt(document.getElementById("entryHour").value);
    const entryMin = parseInt(document.getElementById("entryMin").value);
    const exitHour = parseInt(document.getElementById("exitHour").value);
    const exitMin = parseInt(document.getElementById("exitMin").value);

    entryDate.setHours(entryHour, entryMin);
    exitDate.setHours(exitHour, exitMin);

    if (isNaN(entryDate) || isNaN(exitDate)) {
        document.getElementById("result").innerHTML = "Të lutem mbush të gjitha të dhënat!";
        return;
    }

    const durationInMs = exitDate - entryDate;
    if (durationInMs <= 0) {
        document.getElementById("result").innerHTML =
            "Data e daljes duhet të jetë më e vonshme se data e hyrjes!";
        return;
    }

    const hours = durationInMs / (1000 * 3600);

    const days = Math.floor(hours / 24);
    const remainingHours = hours % 24;

    let fee = 0;
    let resultText = `Koha e parkingut: ${days} dite dhe ${remainingHours.toFixed(2)} ore<br>`;

    fee = days * 8;

    if (remainingHours <= 0.25) {
    } else if (remainingHours <= 2) {
        fee += 2;
    } else if (remainingHours <= 6) {
        fee += 4;
    } else if (remainingHours <= 12) {
        fee += 6;
    } else {
        fee += 8;
    }

    resultText += `<br>Totali: ${fee}&#8364;`;

    document.getElementById("result").innerHTML = resultText;
}

//per plotesim te kerkesave

function EmriKonstruktorit(param1, param2) {
    this.veti1 = param1;
    this.veti2 = param2;

    this.metode = function() {
        console.log('Kjo është një metodë.');
    }
}

// Krijimi i instancës
let objekti1 = new EmriKonstruktorit('vlera1', 'vlera2');
let objekti2 = new EmriKonstruktorit('vlera1', 'vlera2');
let objekti3 = new EmriKonstruktorit('vlera1', 'vlera2');

//maxNumer
console.log(Number.MAX_VALUE); // Vlera maksimale numerike në JS
let num = Number.MAX_VALUE * 2;
console.log(num);

//toString
let num4 = 255;
console.log(num4.toString()); // "255"
console.log(num4.toString(2)); //binare
console.log(num4.toString(16)); //hex

//NaN
let invalidNumber = Number('abc');
console.log(invalidNumber); // NaN
console.log(isNaN(invalidNumber));
