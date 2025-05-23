$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});


$(document).ready(function () { 
    $(".view-details-btn").on("click", function (e) {
        fetchFlights('arrivals');
        fetchFlights('departures');
    
        e.preventDefault();
 
        var flightDetails = $(this).closest("a").data("details");

        if (!flightDetails) {
            console.error("No flight details found. Ensure your <a> tag has the 'data-details' attribute.");
            return;
        }

       
        $("#popup-title").text(flightDetails.title || "Flight Details");

       
        $("#popup-details").html(flightDetails.details ? flightDetails.details.replace(/\n/g, "<br>") : "No additional details available.");
        $("#popup-scheduled").html(flightDetails.scheduled ? flightDetails.scheduled.replace(/\n/g, "<br>") : "No additional details available.");
        $("#popup-countryFrom").html(flightDetails.countryFrom ? flightDetails.countryFrom.replace(/\n/g, "<br>") : "No additional details available.");
        $("#popup-countryDestination").html(flightDetails.countryDestination ? flightDetails.countryDestination.replace(/\n/g, "<br>") : "No additional details available.");

        
        $("#flight-popup, #popup-overlay").fadeIn();
    });

   
    $(".close").on("click", function () {
        $("#flight-popup, #popup-overlay").fadeOut();
    });

 
    $(window).on("click", function (event) {
        if ($(event.target).is("#popup-overlay")) {
            $("#flight-popup, #popup-overlay").fadeOut();
        }
    });
});


$(document).ready(function () {
   
    $("#srchArr").val("");  
    $("#selectdatearr").val("");  
    $("#srchDep").val(""); 
    $("#selectdatedep").val("");  

    function filterArrivals() {
        const textValueArr = $("#srchArr").val().toLowerCase();
        const selectedDateArr = $("#selectdatearr").val();

        $(".flights-box-arr").filter(function () {
            const matchesTextArr = $(this).text().toLowerCase().indexOf(textValueArr) > -1;
            const matchesDateArr = !selectedDateArr || $(this).data("date") === selectedDateArr;
            $(this).toggle(matchesTextArr && matchesDateArr);
        });
    }

    function filterDepartures() {
        const textValueDep = $("#srchDep").val().toLowerCase();
        const selectedDateDep = $("#selectdatedep").val();

        $(".flights-box-dep").filter(function () {
            const matchesTextDep = $(this).text().toLowerCase().indexOf(textValueDep) > -1;
            const matchesDateDep = !selectedDateDep || $(this).data("date") === selectedDateDep;
            $(this).toggle(matchesTextDep && matchesDateDep);
        });
    }
 
    $("#srchArr").on("keyup", function () {
        filterArrivals();
    });
 
    $("#selectdatearr").on("change", function () {
        filterArrivals();
    });
 
    $("#srchDep").on("keyup", function () {
        filterDepartures();
    });
 
    $("#selectdatedep").on("change", function () {
        filterDepartures();
    });
 
    filterArrivals();
    filterDepartures();
});

 

function validate() {
    var isValid = true;
    var mesazhi = "";
    var emailElement = document.getElementById("email").value;

    if (emailElement.length > 0 && emailElement.includes("@")) {
        var indexOfAt = emailElement.indexOf("@");
        var texAfter = emailElement.slice(indexOfAt + 1);
        var textAfterArray = texAfter.split(".");

        if (textAfterArray.length === 1) {
            isValid = false;
            mesazhi = "Ju lutemi futni një email të vlefshëm.";
        } else {
            mesazhi = "Faleminderit që jeni abonuar në buletinin tonë!";
        }
    } else {
        isValid = false;
        mesazhi = "Ju lutemi futni një email të vlefshëm.";
    }

    var messageElement = document.getElementById("mesazh");
    messageElement.innerText = mesazhi;
    messageElement.style.display = "block";  
}






function playAirportAudio() {
    const playButton = document.getElementById("playbutton");
    const audioPlayer = document.getElementById("audioPlayer");
    const originalText = playButton.textContent;
    
    if (!audioPlayer._endedListenerAdded) {
        audioPlayer.addEventListener('ended', () => {
            playButton.textContent = originalText;
        });
        audioPlayer._endedListenerAdded = true;
    }

    $.ajax({
        url: 'play_audio.php',
        type: 'POST',
        data: {
            action: 'play_audio',
            airport: originalText 
        },
        success: function(response) {
            audioPlayer.play()
                .then(() => {
                    playButton.textContent = "Playing...";
                })
                .catch(error => {
                    console.error("Playback error:", error);
                    playButton.textContent = originalText;
                    alert("Audio playback failed");
                });
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            playButton.textContent = originalText;
            alert("Request failed");
        }
    });
}

let numrat = [1, 2, 3, 4, 5];

let numratnew = numrat.filter((a, b) => {
    return a % 2 !== 0;   
});

console.log(numratnew);

function fetchFlights(type = 'arrivals') {
    $.ajax({
        url: 'api/flights.php',
        type: 'GET',
        data: { type: type },
        success: function(flights) {
            updateFlightTable(flights, type);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching flights:", error);

            if(type === 'arrivals') {
                updateFlightTable(staticArrivals, 'arrivals');
            } else {
                updateFlightTable(staticDepartures, 'departures');
            }
        }
    });
}

function updateFlightTable(flights, type) {
    const container = type === 'arrivals' 
        ? document.getElementById('flights-container1')
        : document.getElementById('flights-container2');
    
    const header = container.querySelector('li:first-child');
    container.innerHTML = '';
    container.appendChild(header);
    
    flights.forEach(flight => {
        const flightEl = document.createElement('li');
        flightEl.className = `flights-box-${type === 'arrivals' ? 'arr' : 'dep'}`;
        flightEl.setAttribute('data-date', getFlightDateType(flight));
        
        flightEl.innerHTML = `
            <li>${formatTime(flight.arrival.scheduled)}</li>
            <li>${formatDate(flight.arrival.scheduled)}</li>
            <li>${flight.departure.airport} (${flight.departure.iata})</li>
            <li>${flight.airline.name}</li>
            <li>${flight.flight.iata}</li>
            <li>${translateStatus(flight.flight_status)}</li>
            <div id="btnli">
                <li>
                    <a href="#" data-details='${getFlightDetails(flight)}'>
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
        `;
        
        container.appendChild(flightEl);
    });
    

    $(".view-details-btn").off('click').on('click', showFlightDetails);
}

function formatTime(dateString) {
    return new Date(dateString).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
}

function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString();
}

function translateStatus(status) {
    const statusMap = {
        'scheduled': 'Scheduled',
        'active': 'In Air',
        'landed': 'Landed',
        'cancelled': 'Cancelled',
        'diverted': 'Diverted'
    };
    return statusMap[status] || status;
}

function getFlightDetails(flight) {
    return JSON.stringify({
        title: `Flight Details: ${flight.flight.iata}`,
        details: `Departed at ${formatTime(flight.departure.scheduled)},\nFrom: ${flight.departure.terminal || 'Terminal not specified'}`,
        scheduled: `Scheduled arrival time: ${formatDate(flight.arrival.scheduled)} \nAt: ${formatTime(flight.arrival.scheduled)}`,
        countryFrom: `From: ${flight.departure.airport} (${flight.departure.iata})`,
        countryDestination: `To: Kosovo, Prishtina(PIA)`
    });
}


function filterArrivals() {
    const filter = document.getElementById('arr_status').value.toLowerCase();
    const flights = document.querySelectorAll('.flights-box-arr');

    flights.forEach(flight => {
        const status = flight.dataset.status;

        if (!filter) {
            flight.style.display = '';
        } else if (filter === 'other') {
            flight.style.display = (status !== 'landed' && status !== 'scheduled') ? '' : 'none';
        } else {
            flight.style.display = (status === filter) ? '' : 'none';
        }
    });
}

function filterDepartures() {
    const filter = document.getElementById('dep_status').value.toLowerCase();
    const flights = document.querySelectorAll('.flights-box-dep');

    flights.forEach(flight => {
        const status = flight.dataset.status;

        if (!filter) {
            flight.style.display = '';
        } else if (filter === 'other') {
            flight.style.display = (status !== 'active' && status !== 'scheduled') ? '' : 'none';
        } else {
            flight.style.display = (status === filter) ? '' : 'none';
        }
    });
}


 
