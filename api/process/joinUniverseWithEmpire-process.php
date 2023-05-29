<?php
session_start();
include_once("../classes/universe.php");
include_once("../classes/empire.php");

if(isset($_POST["universe"]) && isset($_POST["empire"])){
    $universeName = $_POST["universe"];
    $empireName = $_POST["empire"];
    $universe = new Universe();
    $empire = new Empire();

    $universeData = $universe->getUniverse($universeName);
    $empireData = $empire->getEmpire($empireName);

    if(!$universeData){
        echo "Cet univers n'existe pas";
        exit();
    }
    if(!$empireData){
        echo "Cet empire n'existe pas";
        exit();
    }
    if($universeData && $empireData) {
        $_SESSION["universeId"] = $universeData[0]["id"];
        $_SESSION["empireId"] = $empireData[0]["id"];
        header("Location: ../../index.php");
        exit();
    }

    header("Location: ../../front/index.php");
    exit();
}
else {
    echo "Erreur lors de la connexion à l'univers";
}