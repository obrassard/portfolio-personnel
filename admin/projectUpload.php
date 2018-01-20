<?php
session_start();
require_once "../data/db_projects.php";
if (!isset($_SESSION['adminId'])){
    header('Location: connexion.php');
    die();
}

$descFr = validatePost("descfr");
$descEn = validatePost("descen");
$urlFr = validatePost("urlfr");
$urlEn = validatePost("urlen");
$fileName = validatePost("name");

if(!$descEn || !$descFr || !$urlFr || !$urlEn || !$fileName){
    header('Location: index.php?code=2');
    die();
}
//Traitement de l'image :

if (isset($_FILES['thumbnail']) AND $_FILES['thumbnail']['error'] == 0)
{
    if ($_FILES['thumbnail']['size'] <= 5000000) //5Mo max
    {
        $infosfichier = pathinfo($_FILES['thumbnail']['name']);
        $extensionFichier = strtolower($infosfichier['extension']);
        $extensions_valides = array('jpg', 'jpeg', 'png');
        if (in_array($extensionFichier, $extensions_valides))
        {
            $file = $fileName.".".$extensionFichier;
            $name = "../img/portfolio/".$file;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'],$name);

            AddProjectEn($descEn, $urlEn, $file);
            AddProjectFr($descFr, $urlFr, $file);

            header('Location: index.php/?code=1');
        } else {
            header('Location: index.php/?code=2');
        }
    }
    else {
        header('Location: index.php/?code=2');
    }
} else {
    header('Location: index.php/?code=2');
}


?>
