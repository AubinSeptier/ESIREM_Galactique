<?php
session_start();
include_once("../classes/infrastructure.php");
include_once("../classes/infrastructure_type.php");
include_once("../classes/planet.php");
include_once("../classes/resource.php");
include_once("../classes/empires.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
// Processus d'amléioration d'une infrastructure


// Création d'objet pour manipuler les différentes données et les relier à la base de données
$infrastructure = new Infrastructure();
$resource = new Resource();
$infrastructure_type = new Infrastructure_Type();
$empire = new Empire();
$planet = new Planet();
$ship = new Ship();
$ship_type = new Ship_Type();

// Répupération des données utiles
$deuteriumStock = $empire->getEmpireById($_SESSION["empireId"])[0]["deuterium_stock"];
$energyStock = $empire->getEmpireById($_SESSION["empireId"])[0]["energy_stock"];
$energyStockUsed = $empire->getEmpireById($_SESSION["empireId"])[0]["energy_stock_used"];
$metalStock = $empire->getEmpireById($_SESSION["empireId"])[0]["metal_stock"];

$researchLabId = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["id"];
$spaceSitId = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["id"];
$nanitesFactoryId = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["id"];
$metalMineId = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["id"];
$deuteriumSynthesizerId = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["id"];
$solarPlantId = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["id"];
$fusionPlantId = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["id"];
$shieldId = $infrastructure_type->getInfrastructure_Type("shield")[0]["id"];

if(isset($_GET["infrastructureId"]) && isset($_GET["id_planet"])){
    $infrastructureId = $_GET["infrastructureId"];
    $id_planet = $_GET["id_planet"];
    $infrastructureData = $infrastructure->getInfrastructureByPlanetId($infrastructureId, $id_planet);
    $infrastructureTypeId = $infrastructureData[0]["id_infrastructure_type"];
    $planetSize = $planet->getPlanetSize($id_planet)[0]["size"];
    $totalInfrastructureLevels = $infrastructure->getTotalInfrastructureLevels($id_planet) + 1;

    if($planetSize > $totalInfrastructureLevels){
        $level = $infrastructureData[0]["level"];
        $upgrade_time = $infrastructureData[0]["upgrade_time"];
        $deuteriumCost = $infrastructureData[0]["deuterium_cost"];
        $energyCost = $infrastructureData[0]["energy_cost"];
        $metalCost = $infrastructureData[0]["metal_cost"];
        $deuteriumProduction = $infrastructureData[0]["deuterium_production"];
        $energyProduction = $infrastructureData[0]["energy_production"];
        $metalProduction = $infrastructureData[0]["metal_production"];
        $attack = $infrastructureData[0]["attack"];
        $defense = $infrastructureData[0]["defense"];
        if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
            echo "Vous n'avez pas assez de ressources";
        }
        else {
            $level += 1;
            $upgrade_time = $upgrade_time * 2;
            $deuteriumCost = $deuteriumCost * 1.6;
            $energyCost = $energyCost * 1.6;
            $metalCost = $metalCost * 1.6;
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
            if($infrastructureTypeId == $researchLabId){
                // To complete with researches bonuses
                
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $spaceSitId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $nanitesFactoryId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $metalMineId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $deuteriumSynthesizerId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $solarPlantId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $fusionPlantId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
            if($infrastructureTypeId == $shieldId){
                $infrastructure->upgradeInfrastructure($infrastructureId, $id_planet, $level, $upgrade_time, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense);
            }
        }       
    }
    else {
        echo "Vous ne pouvez pas améliorer plus d'infrastructures sur cette planète";
    }
}