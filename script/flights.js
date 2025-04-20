$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});


$(document).ready(function () { 
    $(".view-details-btn").on("click", function (e) {
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



document.addEventListener('DOMContentLoaded', () => {
    const playbutton = document.getElementById("playbutton");
    const audioPlayer = document.getElementById("audioPlayer");

    if (playbutton && audioPlayer) {
        playbutton.addEventListener('click', () => {
            try {
                audioPlayer.play()
                    .then(() => {
                        console.log("Audio is playing successfully.");
                    })
                    .catch(error => {
                        console.error("Audio playback failed:", error);
                        alert("Failed to play audio. Please check your browser settings.");
                    });
            } catch (error) {
                console.error("An unexpected error occurred while trying to play audio:", error);
                alert("Something went wrong while trying to play the audio.");
            }
        });
    } else {
        console.error("Play button or audio player not found!");
    }
});

let numrat = [1, 2, 3, 4, 5];

let numratnew = numrat.filter((a, b) => {
    return a % 2 !== 0;   
});

console.log(numratnew);



 
