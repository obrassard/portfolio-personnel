<?php

require_once "data/data_service.php";

$translations = json_decode(file_get_contents('./lang.json')); 
$lang = (isset($_GET['lang']) && $_GET['lang']=="en") ? "en":"fr";
if ($lang == "en"){
    $r = $translations->en;
} else {
    $r = $translations->fr;
}

$projects = GetProjects();
$technologies = GetTechnologies();

?>
<!DOCTYPE html>
<html lang="<?php echo $lang?>">
<head>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125407681-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-125407681-1');
    </script>

    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/components.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Olivier S. Brassard">


    <title>Olivier S. Brassard</title>

    <!-- Bootstrap Core CSS -->
    <link href="packages/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="packages/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css"> -->
    <link href="css/fa-colored.css" rel="stylesheet" type="text/css">

    <!-- Swal-->
    <!-- <link href="packages/swal2/sweetalert2.min.css" rel="stylesheet" type="text/css"> -->

    <!-- Animate -->
    <link href="packages/animatecss/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Theme CSS -->
    <link href="css/theme.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <div class="spinner-splash" id="loader">
        <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
        </div>
    </div>
    

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <span class="collapse-label">Menu</span> <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <table>
                        <tr>
                            <td  class="brand-logo" style="padding-right: 10px; border-right: white solid 1px"><img alt="Brand" src="img/logo.png" width="20px"></td>
                            <td style="padding-left: 10px"><span class="light">Olivier S.</span> Brassard</td>
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
                        <a class="page-scroll" href="#about"><?php echo $r->about ?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#project"><?php echo $r->projects ?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"><?php echo $r->contact ?></a>
                    </li>
                    <li>
                        <a href="<?php echo $r->lang_redirect ?>"><i class="fa fa-language black" aria-hidden="true"></i> <?php echo $r->lang ?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro fullHeight">
        <div class="intro-body">      
        <div id="particles_effect" class="particles-effect"></div>  
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" id="intro-title">
                        <h1 class="shadow-header"><?php echo $r->welcome ?></h1>
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
                    <h2 style="margin-bottom: 25px"><?php echo $r->about ?></h2>
                    <a href="http://github.com/obrassard"><img class="img-circle img-responsive img-center" src="https://github.com/obrassard.png" width="200" alt="<?php echo $r->pofme ?>" data-aos="zoom-in"></a>
                    <p id="no-margin" data-aos="fade-up"><?php echo $r->welcome_message ?></p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Technologies Section -->
    <section id="technologies" class="container content-section text-center">
        <div class="row">
             <div class="col-lg-8 col-lg-offset-2">
                <h3><?php echo $r->tech_header ?></h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <?php foreach ( $technologies as $techno ) { ?>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <a href="<?php echo $techno['url'] ?? '' ?>" target="_blank">
                            <div class="card-body well well-dark" data-aos="zoom-in">
                                <?php /* To re-enable text hovering add class 'tech'*/ ?>
                                <img src="img/technologies/<?php echo $techno['image'] ?>" width="150px" alt="<?php echo $techno['name'] ?>"/>
                                <p class="tech-txt"><?php echo $techno['name'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Project Section -->
    <section id="project" class="container-fluid content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="projets"><?php echo $r->myprojects ?></h2>
            </div>
            <section id="portfolio">
                <div class="container-fluid">
                    <?php
                    $cpt = 0;

                    foreach ( $projects as $oneproject ) {
                        if($cpt == 0) { echo "<div class='row no-gutters'>";} 
                        
                        if (isset($oneproject['display']) && $oneproject['display'] == false){
                            continue;
                        }?>
                        
                        <div class="col-sm-4 portfolio-item gspaced" data-url="<?php echo $oneproject['url'] ?>">
                            <div class="bgimg">
                                <img src="img/portfolio/<?php echo $oneproject['image'] ?>" class="img-responsive mobile-margin bw " alt="<?php echo $r->altproject ?>">
                                <div class="description hover-description">
                                    <h3><?php echo $oneproject['title'] ?></h3>
                                    <hr>
                                    <p><?php echo $oneproject['caption'][$lang] ?></p>
                                </div>
                                <?php if (isset($oneproject['lang']) ) { ?>
                                    <span><?php echo $oneproject['lang'] ?></span>
                                <?php } ?>
                                <i class="fa fa-plus"></i>
                            </div>
                            <p class="description visible-xs">
                                <?php echo $oneproject['caption'][$lang] ?>
                            </p>
                            <div class="project-detail hidden">
                                <div class="title"><?php echo $oneproject['title'] ?></div>
                                <div class="details"><?php echo $oneproject['description'][$lang] ?></div>
                            </div>
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
                <button id="seeAll" class="btn btn-lg btn-primary"><?php echo $r->showallprojects ?> <i class="fa fa-chevron-down"></i></button>
            </div>
        </div>
    </section>

    <!-- GitHub Section -->
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
    <div class="pattern-background">
    <section id="contact" class="lessPadding container content-section ">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="sign shadow">
                    <span class="sign__word"><?php echo $r->contactme ?></span>
                </h2>

                <p class="shadow"><?php echo $r->contactmedetail ?></p>
            </div>
            <div class="col-md-8 col-md-offset-2" >
                <div class="form-wrapper glowing-border">
                    <form id="contactForm" action="https://formspree.io/hey@obrassard.ca" method="POST">
                        <div class="form-group">
                            <label for="name"><?php echo $r->frmname ?></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo $r->frmemail ?></label>
                            <input type="email" class="form-control" id="email" name="_replyto">
                        </div>
                        <div class="form-group">
                            <label for="message"><?php echo $r->frmmessage ?></label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                        <input type="hidden" name="_next" value="http://obrassard.ca/index.php?code=1#contactForm" />
                        <input type="hidden" name="_subject" value="New message from your website!" />
                    </form>
                    <div class="alert alert-danger" id="alert" style="display: none" role="alert" ><?php echo $r->frmerror ?></div>
                    <button class="btn btn-default" onclick="ValidateForm()"><?php echo $r->send ?></button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <?php
                if (isset($_GET['code'])){
                    if ($_GET['code'] == 1) {
                        echo '<br /><div class="alert alert-success" role="alert">'.
                        $r->sendconf.'</div>';
                    }

                } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="container text-center">
            <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                <li><a href="http://github.com/obrassard"><i class="fa fa-github"></i></a> </li>
                <li> <a href="mailto:hey@obrassard.ca"><i class="fa fa-envelope"></i></a> </li>
                <li> <a href="http://twitter.com/br4ss4rdo"><i class="fa fa-twitter"></i></a> </li>
                <li> <a href="https://www.linkedin.com/in/obrassard/"><i class="fa fa-linkedin-square"></i></a> </li>
            </ul>
            <p id="copyright"><span>&copy; Olivier S. Brassard - <?php echo date("Y"); ?></span></p><br>
            <img alt="brand" src="img/logo.png" width="50px">
        </div>
    </footer>
    </div>


    <template id="swal-btn-text">
        <?php echo $r->swalbtntext?>
    </template>


    <!-- TypeIt -->
    <script src="https://cdn.jsdelivr.net/npm/typeit/dist/typeit.min.js"></script>

    <!-- jQuery -->
    <script src="packages/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/api.github.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="packages/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Swal2 -->
    <script src="packages/swal2/sweetalert2.all.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- Theme JavaScript -->
    <script src="js/behavior.js"></script>
    <script src="./js/contactform.js"></script>

    <!-- Particle.js -->
    <script src="./js/particles/particles.min.js"></script>
    <script src="./js/particles/particles-app.js"></script>
 
</body>
</html>
