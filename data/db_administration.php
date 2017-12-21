<?php
/**
 * db_administration.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

require_once "db_connection.php";

//TENTER UN CONNEXION D'UN MEMBRE AVEC SON USERNAME ET SON MOT DE PASSE HASHÉ
function requestLogin($username, $token){
    $bdd = db_connect();
    if(!usernameExist($username)){
        return false;
    }

    try{
        $request = $bdd -> prepare("SELECT Token, AdminId FROM admins WHERE Username=:username");
        $request ->execute(array(
            "username"=>$username
        ));
        $data = $request -> fetch();

        $request -> closeCursor();

        if ($data["Token"] == $token){
            $_SESSION["adminId"] = $data["AdminId"];

            return true;
        } else {
            return false;
        }

    }catch (Exception $e){
        die($e->getMessage());
    }
}

function usernameExist($username){
    $bdd = db_connect();
    try{
        $request = $bdd -> prepare("SELECT COUNT(Username)'count' FROM admins WHERE Username=:username");
        $request ->execute(array(
            "username"=>$username
        ));
        $data = $request -> fetch();

        $request -> closeCursor();
        return ($data["count"] != 0);

    }catch (Exception $e){
        die($e->getMessage());
    }
}