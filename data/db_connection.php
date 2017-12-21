<?php
/**
 * db_connection.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

function db_connect(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root', 'root');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function validatePost($field){

    if (isset($_POST[$field]) and $_POST[$field] != ""){
        $data = $_POST[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    else {
        return false;
    }
}

function validateGet($field)
{
    if (isset($_GET[$field]) and $_GET[$field] != "") {
        $data = $_GET[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } else {

        return false;
    }
}



?>