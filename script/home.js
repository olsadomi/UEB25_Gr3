$(function(){
    $("#navbar-placeholder").load("nav.html");
    $("#footer-placeholder").load("footer.html");
});

var airport_container = document.querySelector(".airport");
var city_container = document.querySelector(".city");
var btnAirport= document.querySelector("#plane");
var btnCity= document.querySelector("#city");

btnAirport.addEventListener("click", function(){
    console.log("OK");
    city_container.classList.remove("active");
    airport_container.classList.add("active")
    btnAirport.classList.add("active")
    btnCity.classList.remove("active")
})

btnCity.addEventListener("click", function(){
    console.log("OK");
    city_container.classList.add("active");
    airport_container.classList.remove("active")
    btnCity.classList.add("active")
    btnAirport.classList.remove("active")
})
 
var entryDate = document.querySelector("#data-hyrje");
var exitDate = document.querySelector("#data-dalje");
var entryTime = document.querySelector("#koha-hyrje");
var exitTime = document.querySelector("#koha-dalje");
var btnParking = document.querySelector("#btn-parking");
var showQmimi = document.querySelector("#showQmimi");

var parkingInputs = document.querySelectorAll(".parking-input");


btnParking.addEventListener("click", function(){
    let entryDateTime = new Date(`${entryDate.value}T${entryTime.value}`);
    let exitDateTime = new Date(`${exitDate.value}T${exitTime.value}`);

    for(let i=0;i<4;i++){
        if(parkingInputs[i].value==""){
            console.log(i);
            parkingInputs[i].classList.add("fieldNull")
            showQmimi.style.display = "none";
        }else{
            parkingInputs[i].classList.remove("fieldNull")
            showQmimi.style.display = "block";
        }
    }

    if(entryDateTime >= exitDateTime){
        dataGabim();
        return;
    }

    let diff = new Date(exitDateTime.getTime()-entryDateTime.getTime());
    let diffMinutes = Math.floor((diff / (1000 * 60)) % 60); 
    let diffHours = Math.floor((diff/ (1000 * 60 * 60)) % 24);
    let diffDays = Math.floor(diff / (1000 * 60 * 60 * 24)); 
   
    let qmimi =0;
    if(diffDays>0){
        qmimi =diffDays*8;
        if(diffHours >=12){
            qmimi+=8;
        }else if(diffHours>=6){
            qmimi+=6;
        }else if(diffHours>=2){
            qmimi += 4;
        }else{
            qmimi += 2;
        }
        dataSakt(qmimi);
    }
    
    if(diffDays==0){
        if(diffMinutes<=15 && diffHours==0){
            qmimi = qmimi;
        }
        else if(diffHours >=12){
            qmimi+=8;
        }else if(diffHours>=6){
            qmimi+=6;
        }else if(diffHours>=2){
            qmimi+=4;
        }else if((diffMinutes>=15 && diffHours==0) || (diffMinutes>=15 && diffHours<2)){
            qmimi +=2;
        }
        dataSakt(qmimi);
    }
})


function dataGabim(){
    console.log("WRONG");
 
    showQmimi.classList.remove("active")
    showQmimi.classList.add("wrong");
    showQmimi.innerHTML = "Data është vendosur gabim!"; 
    btnParking.style.transform = "translateY(20px)";
    return;
}

function dataSakt(qmimi){
    btnParking.style.transform = "translateY(20px)";
 
    showQmimi.classList.remove("wrong")
    showQmimi.classList.add("showQmimi");
    showQmimi.innerHTML = "Cmimi: " + qmimi + "€";
}

const easterDiv = document.querySelector(".easterEgg");
const easterAudio = document.querySelector("#easterAudio");

easterDiv.addEventListener("click", function(){
    easterAudio.currentTime = 0;
    easterAudio.play();
})


