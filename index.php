<?php
require_once "data/db_projects.php";

$projects = GetProjectsFr();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/components.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Olivier Brassard">


    <title>Olivier Brassard</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="css/fa-colored.css" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/theme.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <table>
                        <tr>
                            <td  class="brand-logo" style="padding-right: 10px; border-right: white solid 1px"><img alt="Brand" src="img/logo.png" width="20px"></td>
                            <td style="padding-left: 10px"><span class="light">Olivier</span> Brassard</td>
                        </tr>
                    </table>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">À Propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#project">Projets</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="en.php"><i class="fa fa-language black" aria-hidden="true"></i> en</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Intro Header -->
    <header class="intro fullHeight" style="display: none">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 fadein" style="display: none">
                        <h1 class="shadow-header">Bonjour</h1>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 style="margin-bottom: 25px">À propos</h2>
                    <a href="http://github.com/obrassard"><img class="img-circle img-responsive img-center" src="./img/me.png" width="200" alt="Photo de moi"></a>

                    <p id="no-margin">Hello world ! Je suis un étudiant canadien en informatique et ceci est le portfolio de mes projets personnels.
                        J'apprécie vraiment la programmation, j'apprends donc plusieurs langages, entre autre C#, Swift, Java, HTML, CSS et JS.
                        Les projets ci-dessous - et ce site lui-même - sont des «expériences de codage» que j'ai décidé de partager avec tous ceux qui, comme moi, ont une passion pour la prog !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Section -->
    <section id="project" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="projets">Projets</h2>
            </div>
            <section id="portfolio">
                <div class="container">
                    <?php
                    $cpt = 0;

                    foreach ( $projects as $oneproject ) {
                        if($cpt == 0) { echo "<div class='row'>";} ?>

                        <div class="col-sm-4 portfolio-item">
                            <a href="<?php echo $oneproject['Url'] ?>" class="portfolio-link" data-toggle="modal">
                                <img src="img/portfolio/<?php echo $oneproject['Image'] ?>" class="img-responsive mobile-margin bw bordered" alt="image du projet">
                            </a>
                            <p class="description">
                                <?php echo $oneproject['Description'] ?>
                            </p>
                        </div>

                        <?php
                        $cpt++;
                        if($cpt == 3){
                            echo "</div>";
                            $cpt = 0;
                        }
                    }
                    if ($cpt != 0) {
                        echo "</div>";
                    }

                    ?>
                </div>
            </section>
            <div class="col-lg-8 col-lg-offset-2">
                <h3 id="seeAll">Voir tous les projets <i class="fa fa-chevron-down"></i></h3>

            </div>
        </div>
    </section>

    <section id="github-projects" class="content-section text-center">
        <i id="arrow"></i>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 style="margin-bottom: 25px"><i class="fa fa-github" style="font-size:40px"></i></h2>
                </div>
                <div class="col-md-8 col-md-offset-2" id="AllProjects">
                    <!-- API content -->
                </div>
            </div>
        </div>

    </section>

    <!-- Contact Section -->
    <section id="contact" class="lessPadding container content-section ">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">

                <h2>Contactez-moi</h2>
                <p>Vous voulez me donner votre opinion, me suggérer des idées de projet ou simplement me dire bonjour ? Eh bien, contactez-moi !</p>

            </div>
            <div class="col-md-6 col-md-offset-3" >
                <form id="contactForm" action="https://formspree.io/brassard.oli@gmail.com" method="POST">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="_replyto">
                    </div>
                    <div class="form-group">
                        <label for="message">Votre message</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <input type="hidden" name="_next" value="http://obrassard.github.io/confirmation-fr.html" />
                    <input type="hidden" name="_subject" value="New message from your website!" />
                </form>
                <div class="alert alert-danger" id="alert" style="display: none" role="alert"> <strong>Oups!</strong> Veuillez compléter tous les champs.</div>
                <button class="btn btn-default pull-right" onclick="ValidateForm()">Envoyer</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                <li><a href="http://github.com/obrassard"><i class="fa fa-github"></i></a> </li>
                <li> <a href="http://twitter.com/br4ss4rdo"><i class="fa fa-twitter"></i></a> </li>
                <li> <a href="https://www.linkedin.com/in/obrassard/"><i class="fa fa-linkedin-square"></i></a> </li>
                <li> <a href="mailto:obrassard@intfinitlabs.ca"><i class="fa fa-envelope"></i></a> </li>
            </ul>
            <p id="copyright">&copy; Olivier Brassard - 2017</p><br>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/api.github.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/behavior.js"></script>
    <script src="./js/contactform.js"></script>
</body>

</html>
