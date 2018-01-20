<?php
/**
 * db_projects.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

require_once "db_connection.php";

function GetProjectsFr(){
    $bdd = db_connect();
    try{
        $request = $bdd -> query("SELECT * FROM project_fr");
        if($request){
            return $request -> fetchAll();
        }
        $request ->closeCursor();
        return false;
    }catch (Exception $e){
        die($e->getMessage());
    }
}
function GetProjectsEn(){
    $bdd = db_connect();
    try{
        $request = $bdd -> query("SELECT * FROM project_en");
        if($request){
            return $request -> fetchAll();
        }
        $request ->closeCursor();
        return false;
    }catch (Exception $e){
        die($e->getMessage());
    }
}

function AddProjectFr($desc, $url, $image){
    $bdd = db_connect();
    try{
        $request = $bdd -> prepare("INSERT INTO project_fr(Description, Image, Url) VALUES (:descr, :image, :url)");
        $request -> execute(array(
            "descr"=>$desc,
            "image"=>$image,
            "url"=>$url
        ));
        $request -> closeCursor();

    }catch (Exception $e){
        die($e->getMessage());
    }
}
function AddProjectEn($desc, $url, $image){
    $bdd = db_connect();
    try{
        $request = $bdd -> prepare("INSERT INTO project_en(Description, Image, Url) VALUES (:descr, :image, :url)");
        $request -> execute(array(
            "descr"=>$desc,
            "image"=>$image,
            "url"=>$url
        ));
        $request -> closeCursor();

    }catch (Exception $e){
        die($e->getMessage());
    }
}



?>
