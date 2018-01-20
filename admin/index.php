<?php session_start();
/**
 * index.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

if (!isset($_SESSION['adminId'])){
    header('Location: connexion.php');
    die();
}


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Administration - obrassard.ca </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav my-2 my-lg-0 ">
                    <li class="nav-item ">
                        <a class="nav-link" href="http://obrassard.ca">Retourner au site principal</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container" style="padding-top: 20px">
            <div class="row">
                <div class="col-md-12"><h1>Administration</h1><hr></div>
                <hr>
                <div class="col-md-12"><br /><h4>Ajouter un projet</h4></div>
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="./projectUpload.php">
                      <div class="form-row">
                        <div class="col-md">
                          <textarea type="text" class="form-control" placeholder="Description Français" name="descfr" required></textarea>
                        </div>
                        <div class="col-md">
                          <textarea type="text" class="form-control" placeholder="Description Anglais" name="descen" required></textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md">
                          <input type="text" class="form-control" placeholder="url vers site FR" name="urlfr" required>
                        </div>
                        <div class="col-md">
                          <input type="text" class="form-control" placeholder="url vers site EN" name="urlen" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-3">
                          <input type="text" class="form-control" placeholder="Nom du fichier" name="name" required>
                        </div>
                        <div class="col-md">
                          <input type="file" class="form-control" name="thumbnail" required>
                        </div>
                      </div>
                      <input type="submit" value="Ajouter le projet" class="btn btn-primary btn-block" />
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
