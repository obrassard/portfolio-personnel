$(document).ready(function () {

    $("#prenom").focus();

    $("#formulaire-inscription").validate({

        //Règles de validation
        rules: {
            prenom:{
                required:true,
                minlength:2
            },
            nom:{
                required:true,
                minlength: 2
            },
            email:{
                required:true,
                email:true
            },
            username:{
                required:true,
                maxlength:15,
                minlength:2
            },
            githubid:{
                required:false,
                pattern: /^@./
            },
            password1:{
                required:true,
                minlength:8,
                maxlength:16,
                pattern: /^(?=.*[a-zA-Z])(?=.*[0-9])/
            },
            password2:{
                required:true,
                equalTo: "#password1"
            }
        },

        //Messages
        messages: {
            prenom:{
                required:"> Le prénom est requis",
                minlength:"> Le prénom doit avoir au moins 2 caractères"
            },
            nom:{
                required:"> Le nom est requis",
                minlength:"> Le nom doit avoir au moins 2 caractères"
            },
            email:{
                email:"> Veuillez entrer une adresse email valide",
                required:"> L'adresse email est requise"
            },
            githubid:{
                pattern: "> Le nom d'utlisateur doit commencer par @"
            },
            username:{
                required:"> Ce champ est requis",
                maxlength:"> Le nom d'utilisateur ne peut pas dépasser 15 caractères",
                minlegth:"> Le nom d'utilisateur doit avoir au moins 2 caractères"
            },
            password1:{
                required:"> Ce champ est requis",
                minlength:"> Votre mot de passe doit contenir de 8 à 16 caractères, aumoins un chifre et une lettre",
                maxlength:"> Votre mot de passe doit contenir de 8 à 16 caractères, aumoins un chifre et une lettre",
                pattern: "> Votre mot de passe doit contenir de 8 à 16 caractères, aumoins un chifre et une lettre"
            },
            password2:{
                required:"> Ce champ est requis",
                equalTo: "> Les deux mot de passe ne correspondent pas"
            }

        }
    });


    //Action à effectuer lorsque le formulaire est valide
    $('#formulaire-inscription').submit(function (evt) {

        evt.preventDefault();
        if($(this).valid()){
            //Vider le formulaire
            $('#formulaire-inscription input').val("");
            $('#formulaire-inscription textarea').val("");

            //Afficher la confirmation
            $('#confirmation').fadeIn(500);
            return false;
        }else{
            $('#formulaire-inscription input.error')[0].focus();
        }
    });

    //Lorsqu'on clique sur J'ai compris
    $('#confirmation a').click(function (evt) {
        evt.preventDefault();
        $('#confirmation').fadeOut(500);
        $('.form-section').hide(800, function () {
            $('#footer-logo-animable').animate({width: "90px", right: "0", bottom: "0"}, 500, function () {
                $(this).fadeOut(400, function () {
                    window.location = "./index.html"
                });
            });
        });
    })
});


