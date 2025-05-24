$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});

var btnPay = document.getElementById("btn-paguaj");
var entryDate = document.querySelector("#data-hyrje");
var exitDate = document.querySelector("#data-dalje");
var entryTime = document.querySelector("#koha-hyrje");
var exitTime = document.querySelector("#koha-dalje");
var showQmimi = document.querySelector("#showQmimi");



var parkingInputs = document.querySelectorAll(".parking-input");
var qmimi=0;
var isValid = false;

btnPay.addEventListener("click", function(){
    let entryDateTime = new Date(`${entryDate.value}T${entryTime.value}`);
    let exitDateTime = new Date(`${exitDate.value}T${exitTime.value}`);

    for(let i=0;i<4;i++){
        if(parkingInputs[i].value==""){
            console.log(i);
            parkingInputs[i].classList.add("fieldNull")
        }else{
            parkingInputs[i].classList.remove("fieldNull")
        }
    }

    if(entryDateTime >= exitDateTime){
        dataGabim();
        isValid=false;
        return;
    }

    let diff = new Date(exitDateTime.getTime()-entryDateTime.getTime());
    let diffMinutes = Math.floor((diff / (1000 * 60)) % 60); 
    let diffHours = Math.floor((diff/ (1000 * 60 * 60)) % 24);
    let diffDays = Math.floor(diff / (1000 * 60 * 60 * 24)); 
   
    qmimi =0;
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
        showQmimi.innerHTML = "Totali: " + qmimi + "€";
        isValid=true;
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
        showQmimi.innerHTML = "Totali: " + qmimi + "€";
        isValid=true;
    }

    if(isValid){
        
    }
})


function dataGabim(){
    console.log("WRONG");

    showQmimi.classList.remove("active")
    showQmimi.classList.add("wrong");
    showQmimi.innerHTML = "Data është vendosur gabim!"; 
    return;
}

