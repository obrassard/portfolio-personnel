<?php
/**
 * login.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

session_start();
require_once "../data/db_administration.php";


$username = validatePost("username");
$token = md5(validatePost('password'));

if(!($username && $token)){
    header('Location: connexion.php?error=1');
} else {
    $result = requestLogin($username,$token);
    if (!$result){
        header('Location: connexion.php?error=1');
    } else {
        header('Location: index.php');
    }
}