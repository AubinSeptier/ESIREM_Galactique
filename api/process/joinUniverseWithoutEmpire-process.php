<?php
session_start();
include_once("../classes/universe.php");
include_once("../classes/empire.php");

if(isset($_POST["universe"])){
    $universeName = $_POST["universe"];
    $universe = new Universe();

    $universeData = $universe->getUniverse($universeName);

    if(!$universeData){
        echo "Cet univers n'existe pas";
        exit();
    }
    if($universeData) {
        $_SESSION["universeId"] = $universeData[0]["id"];
        header("Location: ../../front/createEmpire.php")
        exit();
    }
}