<?php
/**
 * db_technologies.php
 * Created by Olivier Brassard on 06-09-18.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

require_once "db_connection.php";

function GetTechnologies(){
    $bdd = db_connect();
    try{
        $request = $bdd -> query("SELECT * FROM technologies where display = 1");
        if($request){
            return $request -> fetchAll();
        }
        $request ->closeCursor();
        return false;
    }catch (Exception $e){
        die($e->getMessage());
    }
}