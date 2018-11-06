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
        $request = $bdd -> query("SELECT Title, `CaptionFR` as 'Caption',`DescriptionFR` as 'Description',`Image`,`Url` FROM `projects` order by Id desc");
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
        $request = $bdd -> query("SELECT Title, `CaptionEN` as 'Caption', `DescriptionEN` as 'Description',`Image`,`Url` FROM `projects` order by Id desc");
        if($request){
            return $request -> fetchAll();
        }
        $request ->closeCursor();
        return false;
    }catch (Exception $e){
        die($e->getMessage());
    }
}

function AddProject($title, $capfr, $capen, $descfr, $descen, $url, $image){
    $bdd = db_connect();
    try{
        $request = $bdd -> prepare("INSERT INTO `projects`(Title, `CaptionFR`, `CaptionEN`, `DescriptionFR`, `DescriptionEN`, `Image`, `Url`) 
                                    VALUES  (:title, :captionfr, :captionen, :descfr, :descen :image, :url)");
        $request -> execute(array(
            "title"=>$title,
            "captionfr"=>$capfr,
            "captionen"=>$capen,
            "descfr"=>$descfr,
            "descen"=>$descen,
            "image"=>$image,
            "url"=>$url
        ));
        $request -> closeCursor();

    }catch (Exception $e){
        die($e->getMessage());
    }
}

?>
