<?php
session_start();
include_once("../classes/universe.php");
include_once("../classes/empire.php");

if(isset($_POST["universe"])){
    $universeName = $_POST["universe"];
    $universe = new Universe();
    $empire = new Empire();

    $universeData = $universe->getUniverseByName($universeName);


    if(!$universeData){
        echo "Cet univers n'existe pas";
        exit();
    }
    if($universeData) {
        $_SESSION["universeId"] = $universeData[0]["id"];
        $empireData = $empire->getEmpireForeignKeys($_SESSION["universeId"], $_SESSION["id"]);

        if(!$empireData){
            header("Location: ../../front/createEmpire.php");
            exit();
        }
        else{
            header("Location: ../../front/index.php");
            exit();
        }

        exit();
    }
}