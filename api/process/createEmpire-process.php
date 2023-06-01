<?php
session_start();
include_once("../classes/empire.php");
include_once("../classes/planet.php");
include_once("../classes/solar_system.php");
include_once("../classes/galaxy.php");
include_once("../classes/user.php");
// Processus de création d'un empire

if(isset($_GET["empireName"]) && isset($_GET["empireRace"]) && isset($_GET["empireAdjective"])){
    // Initialisation et récupération des données utiles
    $empire = new Empire();
    $empireName = $_GET["empireName"];
    $empireRace = $_GET["empireRace"];
    $empireAdjective = $_GET["empireAdjective"];
    $empireDeuterium = 1000;
    $empireMetal = 1000;
    $empireUserId = $_SESSION["id"];
    $empireUniverseId = $_SESSION["universeId"];

    // Vérification de l'existence de l'empire
    if($empire->getEmpireByName($empireName)){
        echo json_encode(array("status" => "Ce nom d'Empire existe déjà"));
    }
    else{
        // Création de l'empire
        $empire->setEmpire($empireName, $empireRace, $empireAdjective, $empireDeuterium, 0, 0,$empireMetal, $empireUniverseId, $empireUserId);
        $_SESSION["empireId"] = $empire->getEmpireByName($empireName)[0]["id"];

        $galaxy = new Galaxy();
        $randomGalaxy = $galaxy->getRandomGalaxy($empireUniverseId);
        $solarSystem = new Solar_System();
        $randomSolarSystem = $solarSystem->getRandomSolar_System($randomGalaxy);
        $planet = new Planet();
        $randomPlanet = $planet->getRandomPlanet($randomSolarSystem);

        $empirePlanet = $planet->updatePlanetOwner($_SESSION["empireId"], $randomPlanet);
        echo json_encode(array("status" => "success"));
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la création de l'empire"));
}