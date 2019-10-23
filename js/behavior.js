function animate(selector, animation) {
    const element =  document.querySelector(selector)
    element.classList.add('animated', animation)
}
//Fadein animation of the header
$(document).ready(function () {

    lang = $('html').attr('lang');
    greeting = lang == 'fr' ? 'Bonjour !':'Welcome !'
      
    setTimeout(function(){
        $('#loader').fadeOut('slow');
        animate('h1.shadow-header','flipInX')
        // new TypeIt('#intro-typed', {
        //     loop: false,
        //     breakLines: false,
        //     waitUntilVisible: true,
        //     speed: 80,
        //     strings: greeting,
        //     cursorChar: '_'
        //   }).go();
    }, 1000)

    AOS.init();
});


// jQuery to collapse the navbar on scroll
function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $(".navbar-collapse").collapse('hide');
});

//==================== Github Integration Animations ============================

$('#seeAll').click(function(){
    if($(this).children("i").hasClass("fa-chevron-down")){
        $('#github-projects').slideDown(700, "easeInOutCubic", function(){
            $('#arrow').fadeIn();
        });
    } else {
        $('#arrow').fadeOut(function(){
            $('#github-projects').slideUp(700, "easeInOutCubic");
        });
    }
    $(this).children("i").toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");

})

//==================== Projects details SWAL ============================

$('div.portfolio-item').click(function(){
    let $title = $(this).find(".project-detail .title").text();
    let $details = $(this).find(".project-detail .details").text();
    let $url = $(this).attr("data-url");
    let $btnText = $("#swal-btn-text").html();

    swal({
        title: $title,
        text: $details,
        showConfirmButton: ($url !== ""),
        confirmButtonText: $btnText,
        confirmButtonClass : 'btn swal-styled-btn',
        showCloseButton: true
    }).then((result) => {
        if (result.value) {
            window.open($url, '_blank');
        }
      })
});