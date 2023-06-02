<?php
session_start();
include_once("../classes/research.php");
include_once("../classes/research_type.php")
include_once("../classes/empire.php");
include_once("../classes/infrastructures.php");
include_once("../classes/infrastructure_type.php");
include_once("../classes/resource.php");

$research = new Research();
$research_type = new Research_Type();
$empire = new Empire();
$infrastructures = new Infrastructures();
$infrastructure_type = new Infrastructure_Type();

$deuteriumStock = $empire->getDeuteriumStock($_SESSION["empireId"]);
$energyStock = $empire->getEnergyStock($_SESSION["empireId"]);
$energyStockUsed = $empire->getEnergyStockUsed($_SESSION["empireId"]);  
$metalStock = $empire->getMetalStock($_SESSION["empireId"]);

$researchLabId = $infrastructure_type->getInfrastructureType("research_lab")[0]["id"];
$energyTechId = $research_type->getResearchType("energy")[0]["id"];
$laserTechId = $research_type->getResearchType("laser")[0]["id"];
$ionsTechId = $research_type->getResearchType("ions")[0]["id"];
$shieldTechId = $research_type->getResearchType("shield")[0]["id"];
$armamentTechId = $research_type->getResearchType("armament")[0]["id"];
$aiTechId = $research_type->getResearchType("ai")[0]["id"];

if(isset($_GET["energy"])){
    $deuteriumCost = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $energyTechId, $_SESSION["empireId"]);
    }
}
if(isset($_GET["laser"])){
    $deuteriumCost = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $laserTechId, $_SESSION["empireId"]);
    }   
}
if(isset($_GET["ions"])){
    $deuteriumCost = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $ionsTechId, $_SESSION["empireId"]);
    }
}
if(isset($_GET["shield"])){
    $deuteriumCost = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $shieldTechId, $_SESSION["empireId"]);
    }
}
if(isset($_GET["armament"])){
    $deuteriumCost = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $armamentTechId, $_SESSION["empireId"]);
    }
}
if(isset($_GET["ai"])){
    $deuteriumCost = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
    $metalCost = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["metal_cost"];
    $researchLevel = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["level"];
    $researchTime = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["research_time"];

    if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
        echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
    }
    else {
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $researchLevel++;
        $researchTime = $researchTime * 2;
        $research->updateResearch($researchLevel, $researchTime, $deuterium_cost, $metal_cost, $aiTechId, $_SESSION["empireId"]);
    }
}


