<?php
session_start();
include_once("../classes/research.php");
include_once("../classes/research_type.php")
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

    $research_type = new Research_Type();
    $energyTech = $research_type->getResearchType("energy");
    $laserTech = $research_type->getResearchType("laser");
    $ionsTech = $research_type->getResearchType("ions");
    $shieldTech = $research_type->getResearchType("shield");
    $armamentTech = $research_type->getResearchType("armament");
    $aiTech = $research_type->getResearchType("ai");


    // Vérification de l'existence de l'empire
    if($empire->getEmpireByName($empireName)){
        echo json_encode(array("status" => "Ce nom d'Empire existe déjà"));
    }
    else{
        // Création de l'empire
        $empire->setEmpire($empireName, $empireRace, $empireAdjective, $empireDeuterium, 0, 0,$empireMetal, $empireUniverseId, $empireUserId);
        $_SESSION["empireId"] = $empire->getEmpireByName($empireName)[0]["id"];

        $galaxy = new Galaxy();
        $solarSystem = new Solar_System();
        $planet = new Planet();

        $randomGalaxy = $galaxy->getRandomGalaxy($empireUniverseId);
        $randomSolarSystem = $solarSystem->getRandomSolar_System($randomGalaxy);
        $randomPlanet = $planet->getRandomPlanet($randomSolarSystem);
        $planet->updatePlanetOwner($_SESSION["empireId"], $randomPlanet);
        
        $research = new Research();
        $research->setResearch("Energie", 0, $energyTech[0]["research_time"], $energyTech[0]["deuterium_cost"], $energyTech[0]["metal_cost"], $energyTech[0]["research_type"], $_SESSION["empireId"]);
        $research->setResearch("Laser", 0, $laserTech[0]["research_time"], $laserTech[0]["deuterium_cost"], $laserTech[0]["metal_cost"], $laserTech[0]["research_type"], $_SESSION["empireId"]);
        $research->setResearch("Ions", 0, $ionsTech[0]["research_time"], $ionsTech[0]["deuterium_cost"], $ionsTech[0]["metal_cost"], $ionsTech[0]["research_type"], $_SESSION["empireId"]);
        $research->setResearch("Bouclier", 0, $shieldTech[0]["research_time"], $shieldTech[0]["deuterium_cost"], $shieldTech[0]["metal_cost"], $shieldTech[0]["research_type"], $_SESSION["empireId"]);
        $research->setResearch("Armament", 0, $armamentTech[0]["research_time"], $armamentTech[0]["deuterium_cost"], $armamentTech[0]["metal_cost"], $armamentTech[0]["research_type"], $_SESSION["empireId"]);
        $research->setResearch("AI", 0, $aiTech[0]["research_time"], $aiTech[0]["deuterium_cost"], $aiTech[0]["metal_cost"], $aiTech[0]["research_type"], $_SESSION["empireId"]);
        
        echo json_encode(array("status" => "success"));
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la création de l'empire"));
}