<?php
session_start();
include_once("../classes/empire.php");
include_once("../classes/planet.php");
include_once("../classes/user.php");

if(isset($_POST["empireName"]) && isset($_POST["empireRace"]) && isset($_POST["empireAdjective"])){
    $empire = new Empire();
    $empireName = $_POST["empireName"];
    $empireRace = $_POST["empireRace"];
    $empireAdjective = $_POST["empireAdjective"];
    $empireDeuterium = 1000;
    $empireMetal = 1000;
    $empireUserId = $_SESSION["id"];
    $empireUniverseId = $_SESSION["universeId"];

    if($empire->getEmpire($empireName)){
        echo "Ce nom d\'empire existe déjà";
    }
    else{
        $empire->setEmpire($empireName, $empireRace, $empireAdjective, $empireDeuterium, 0, $empireMetal, $empireUserId, $empireUniverseId);
        $_SESSION["empireId"] = $empire->getEmpire($empireName)[0]["id"];

        $galaxy = new Galaxy();
        $randomGalaxy = $galaxy->getRandomGalaxy($empireUniverseId)[0]["id"];
        $solarSystem = new SolarSystem();
        $randomSolarSystem = $solarSystem->getRandomSolarSystem($randomGalaxy)[0]["id"];
        $planet = new Planet();
        $randomPlanet = $planet->getRandomPlanet($randomSolarSystem)[0]["id"];


        $empirePlanet = $planet->setPlanetOwner($empire->getEmpire($empireName)[0]["id"], $randomPlanet);
    }
}
else {
    echo "Erreur lors de la création de l'empire";
}