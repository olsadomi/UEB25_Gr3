$(function(){
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
})

$(document).ready(function(){
    $(".filter-item").click(function(){
        const value = $(this).attr("data-filter");
        if (value == "all") {
            $(".post-box").show("3000");
        } else{
            $(".post-box")
                .not("." + value)
                .hide("3000"); 
            $(".post-box")
                .filter("." + value)
                .show("3000");
        }   
    });

    //Active filterin
    $(".filter-item").click(function(){
        $(this).addClass("active-filter").siblings().removeClass("active-filter")
    })
})


// Filtrimi i postimeve nga kërkimi
$(document).ready(function() {
    $("#search-input").on("keyup", function() {
        const value = $(this).val().toLowerCase();
        $(".post-box").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

window.onload = function(){
    const subscribe = confirm("Deshironi te abonoheni ne newsletter?");
    if(subscribe){
        window.location.href="about_us.php#newsletter";
    }
};

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}