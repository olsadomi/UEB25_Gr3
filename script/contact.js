$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});

function countchar() {
    const mesazhi = document.getElementById("mesazhi");
    const output = document.getElementById("charCount");
    output.textContent = mesazhi.value.length;
}



function validateLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.length <= 2) {
        alert("Emri i llogarisë duhet të jetë më i gjatë se 2 karaktere.");
        return false; 
    }

    if (password.length <= 6) {
        alert("Fjalëkalimi duhet të jetë më i gjatë se 6 karaktere.");
        return false; 
    }

    return true;
}

function validateEmail() {
    const emailInput = document.getElementById('email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (emailInput.match(emailRegex)) {
        alert('Email është i vlefshëm!');
    } else {
        alert('Ju lutem vendosni një email të vlefshëm.');
    }
}


  