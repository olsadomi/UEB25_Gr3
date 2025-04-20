$(function () {
    $("#navbar-placeholder").load("/UEB25_GR3/nav.php");
    $("#footer-placeholder").load("footer.html");
});


function popupFn() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popupDialog").style.display = "block";
}

function closeFn() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popupDialog").style.display = "none";
}

document.getElementById("overlay").addEventListener("click", function (e) {
    if (e.target === this) {
        closeFn();
    }
});



$(document).ready(function () {
    $(".faq-answer").hide();

    $(".faq-btn-open").click(function () {
        $(this).closest(".faq-item").find(".faq-answer").show(300);
        $(this).hide(); 
    });

    $(".faq-btn-close").click(function () {
        $(this).closest(".faq-item").find(".faq-answer").hide(300);
        $(this).closest(".faq-item").find(".faq-btn-open").show();
    });
});

new Swiper('.card-wrapper', {
    loop: true,
    spaceBetween: 30,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        0: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
    }
  });