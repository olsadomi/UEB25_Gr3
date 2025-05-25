
var container = document.querySelector(".nav-container")
var btnLogin = document.querySelector(".btnLogin")

if(window.location.href.includes("parkingReservation.php")){
    btnLogin.style.display = "block";
}else{
    btnLogin.style.display = "none";
}

function changeBg() {
    var scrollValue = window.scrollY;
    if (scrollValue > 10) {
        container.classList.add("scroll")
        btnLogin.classList.add("scroll")
    } else {
        container.classList.remove("scroll")
        btnLogin.classList.remove("scroll")
    }
}

window.addEventListener("scroll", changeBg);

document.querySelector(".image").addEventListener("click", function () {
    window.location.href = "/UEB25_GR3/index.php";
});
document.querySelector(".image").style.cursor = "pointer";  

btnLogin.addEventListener("click", function(){
    if(btnLogin.innerHTML=="Login"){
        window.location.href = "/UEB25_GR3/login.php";
    }else{
        fetch('logout.php', {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'logged_out') {
                alert("Logged out of account!")
                window.location.href = 'parkingReservation.php';
            }
        });
    }
    
});

