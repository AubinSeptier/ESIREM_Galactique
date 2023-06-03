<?php
session_start();
include_once("../classes/universe.php");
include_once("../classes/empire.php");

if(isset($_GET["universe"])){
    $universeName = $_GET["universe"];
    $universe = new Universe();
    $empire = new Empire();

    $universeData = $universe->getUniverseByName($universeName);


    if(!$universeData){
        echo json_encode(array("status" => "L'univers n'existe pas"));
        exit();
    }
    if($universeData) {
        $_SESSION["universeId"] = $universeData[0]["id"];
        $empireData = $empire->getEmpireForeignKeys($_SESSION["universeId"], $_SESSION["id"]);

        if(!$empireData){
            echo json_encode(array("status" => "Empire does not exist"));
            exit();
        }
        else{
            echo json_encode(array("status" => "Empire already exists"));
        }

    }
}