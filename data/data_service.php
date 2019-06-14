<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

$mongo = new MongoDB\Client(
    getenv("CONNECTION_STRING")
);

$db = $mongo->portfolio;

$projects = $db->projects;
$admins = $db->admins;
$technos = $db->technologies;


function requestLogin($username, $token){
   
    global $admins;
    $user = $admins->findOne(["username"=> $username]);

    if(is_null($user)){
        return false;
    }

    if ($user->token == $token){
        $_SESSION["adminId"] = (string)$user->_id;
        return true;
    }
    return false;
}

function GetProjects(){
    global $projects;

    $pdata = $projects->find([], ['sort'=>["_id"=>-1]]);
    $pdata = iterator_to_array($pdata);
    return $pdata;
}

function AddProject($title, $capfr, $capen, $descfr, $descen, $url, $image){
    global $projects;

    $doc = [
        "title"=>$title,
        "image"=>$image,
        "url"=>$url,
        "caption" => [
            "fr"=>$capfr,
            "en"=>$capen
        ],
        "description" => [
            "fr"=>$descfr,
            "en"=>$descen
        ]
    ];

    $projects->insert($doc);
}

function GetTechnologies(){
    global $technos;
    $techs = $technos->find(['display'=>true]);
    $techs = iterator_to_array($techs);
    return $techs;
}