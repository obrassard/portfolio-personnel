/**
 * Created by obrassard on 2017-09-28.
 */

$(document).ready(function () {

    //Préchargement des images

    //FadeIn à l'arrivée sur une page
    $('.container').fadeIn(400);

    //FadeOut au changement de page
    $('.nav-link').click(function(evt) {

        evt.preventDefault();

        prochainePage = this.href;
        $('.container').fadeOut(500, function () {
            window.location = prochainePage;
        });

    });

    //Affichage des sous-menu dans la navbar
    $('.menu li').hover(function () {
        $(this).children().next().slideDown(200);
    }, function () {
        $(this).children().next().slideUp(200);
    });


    //Animation des logos animables
    $('#footer-logo-animable').hover(
        function () {
            $(this).animate({width: "55px"}, 300)
        }, function () {
            $(this).animate({width: "30px"}, 300)
        });


    //Animation du diaporama

    setInterval(function(){
        $(".diaporama img:first-child").animate({"margin-left": "-100%"}, 1000, function(){
            $(this).next().fadeIn(800);
            $(this).css("margin-left",0).css('display','none');
            $(this).appendTo("div.diaporama");
        });
    }, 6000);


});

