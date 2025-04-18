
var container = document.querySelector(".nav-container")


function changeBg() {
    var scrollValue = window.scrollY;
    if (scrollValue > 10) {
        container.classList.add("scroll")
    } else {
        container.classList.remove("scroll")

    }
}

window.addEventListener("scroll", changeBg);

document.querySelector(".image").addEventListener("click", function () {
    window.location.href = "index.html";
});
document.querySelector(".image").style.cursor = "pointer";