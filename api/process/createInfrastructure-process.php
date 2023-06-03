<?php
session_start();
include_once("../classes/infrastructure.php");
include_once("../classes/infrastructure_type.php");
include_once("../classes/planet.php");
include_once("../classes/resource.php");
include_once("../classes/empire.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
include_once("../classes/research.php");
include_once("../classes/research_type.php");
// Processus de création d'une infrastructure


// Création d'objet pour manipuler les différentes données et les relier à la base de données
$infrastructure = new Infrastructure();
$resource = new Resource();
$infrastructure_type = new Infrastructure_Type();
$empire = new Empire();
$planet = new Planet();
$ship = new Ship();
$ship_type = new Ship_Type();
$research = new Research();
$research_type = new Research_Type();

// Répupération des données utiles
$deuteriumStock = $empire->getDeuteriumStock($_SESSION["empireId"]);
$energyStock = $empire->getEnergyStock($_SESSION["empireId"]);
$energyStockUsed = $empire->getEnergyStockUsed($_SESSION["empireId"]);  
$metalStock = $empire->getMetalStock($_SESSION["empireId"]);

$aiTechId = $research_type->getResearch_Type("ai")[0]["id"];
$energyTechId = $research_type->getResearch_Type("energy")[0]["id"];
$laserTechId = $research_type->getResearch_Type("laser")[0]["id"];
$ionsTechId = $research_type->getResearch_Type("ions")[0]["id"];
$shieldTechId = $research_type->getResearch_Type("shield")[0]["id"];

if(isset($_GET["infrastructure"]) && isset($_GET["id_planet"])){
    $id_planet = $_GET["id_planet"];
    $planetSize = $planet->getPlanetSize($id_planet)[0]["size"];
    $totalInfrastructureLevels = $infrastructure->getTotalInfrastructureLevels($id_planet) + 1;
    if($_GET["infrastructure"] == "research_lab"){
        if($planetSize > $totalInfrastructureLevels){
            // Récupération des données de l'infrastructure si place disponible
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["id"];

            $buildingTime = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["metal_production"]; 
            $attack = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["defense"];   

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else{
                // Création de l'infrastructure
                // To complete with research bonus
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $infrastructure->setInfrastructure("Laboratoire de recherche", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "space_sit"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["id"];

            $buildingTime = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["defense"];

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else{
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $infrastructure->setInfrastructure("Chantier Spatial", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                // To complete with ship_type building time update
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "nanites_factory"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["id"];

            $researchLevel = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["level"];
            if($researchLevel < 5){
                echo json_encode(array("status" => "Vous n'avez pas atteint le niveau 5 de la technologie IA"));
                exit();
            }

            $buildingTime = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["defense"];

            // To complete with AI Research level verification

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else{
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $infrastructure->setInfrastructure("Usine de nanites", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                // To complete with infrastructures building/upgrading time bonus
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "metal_mine"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["id"];

            $buildingTime = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["defense"];

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else {
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $metalProduction = $metalProduction * 1.5;
                $infrastructure->setInfrastructure("Mine de métal", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                echo json_encode(array("status" => "success"));
            }
        }  
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "deuterium_synthesizer"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["id"];

            $buildingTime = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["defense"];

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else {
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $deuteriumProduction = $deuteriumProduction * 1.3;
                $infrastructure->setInfrastructure("Synthétiseur de deutérium", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "solar_plant"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["id"];

            $buildingTime = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["defense"];

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else {
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $energyProduction = $energyProduction * 1.4;
                $infrastructure->setInfrastructure("Centrale solaire", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "fusion_plant"){
        if($planetSize > $totalInfrastructureLevels){
            $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["id"];

            $researchLevel = $research->getResearchLevel($energyTechId, $_SESSION["empireId"]);
            if($researchLevel < 10){
                echo json_encode(array("status" => "Vous n'avez pas atteint le niveau 10 de la technologie Energie"));
                exit();
            }

            $buildingTime = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["building_time"];
            $deuteriumCost = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["deuterium_cost"];
            $energyCost = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["energy_cost"];
            $metalCost = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["metal_cost"];
            $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["deuterium_production"];
            $energyProduction = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["energy_production"];
            $metalProduction = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["metal_production"];
            $attack = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["attack"];
            $defense = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["defense"];

            // To complete with Energy Research level verification

            if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
                echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
            }
            else {
                $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
                $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
                $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
                $upgradeTime = $buildingTime * 2;
                $deuteriumCost = $deuteriumCost * 1.6;
                $energyCost = $energyCost * 1.6;
                $metalCost = $metalCost * 1.6;
                $energyProduction = $energyProduction * 1.4;
                $infrastructure->setInfrastructure("Centrale à Fusion", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
                echo json_encode(array("status" => "success"));
            }
        }
        else{
            echo json_encode(array("status" => "Vous n'avez pas assez de place sur cette planète"));
        }
    }
    if($_GET["infrastructure"] == "laser_artillery"){
        $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["id"];

        $researchLevel = $research->getResearchLevel($laserTechId, $_SESSION["empireId"]);
        if($researchLevel < 1){
            echo json_encode(array("status" => "Vous n'avez pas atteint le niveau 1 de la technologie Laser"));
            exit();
        }

        $buildingTime = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["building_time"];
        $deuteriumCost = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["deuterium_cost"];
        $energyCost = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["energy_cost"];
        $metalCost = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["metal_cost"];
        $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["deuterium_production"];
        $energyProduction = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["energy_production"];
        $metalProduction = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["metal_production"];
        $attack = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["attack"];
        $defense = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["defense"];

        // To complete with Laser Research level verification

        if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
            $infrastructure->setInfrastructure("Artillerie laser", 0, 0, 0, 0, 0, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["infrastructure"] == "ion_gun"){
        $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["id"];

        $researchLevel = $research->getResearchLevel($ionsTechId, $_SESSION["empireId"]);
        if($researchLevel < 1){
            echo json_encode(array("status" => "Vous n'avez pas atteint le niveau 1 de la technologie Ions"));
            exit();
        }

        $buildingTime = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["building_time"];
        $deuteriumCost = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["deuterium_cost"];
        $energyCost = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["energy_cost"];
        $metalCost = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["metal_cost"];
        $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["deuterium_production"];
        $energyProduction = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["energy_production"];
        $metalProduction = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["metal_production"];
        $attack = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["attack"];
        $defense = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["defense"];

        // To complete with Ions Research level verification

        if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
            $infrastructure->setInfrastructure("Artillerie à ions", 0, 0, 0, 0, 0, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["infrastructure"] == "shield"){
        $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("shield")[0]["id"];

        $researchLevel = $research->getResearchLevel($shieldTechId, $_SESSION["empireId"]);
        if($researchLevel < 1){
            echo json_encode(array("status" => "Vous n'avez pas atteint le niveau 1 de la technologie Bouclier"));
            exit();
        }

        $buildingTime = $infrastructure_type->getInfrastructure_Type("shield")[0]["building_time"];
        $deuteriumCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["deuterium_cost"];
        $energyCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["energy_cost"];
        $metalCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["metal_cost"];
        $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["deuterium_production"];
        $energyProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["energy_production"];
        $metalProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["metal_production"];
        $attack = $infrastructure_type->getInfrastructure_Type("shield")[0]["attack"];
        $defense = $infrastructure_type->getInfrastructure_Type("shield")[0]["defense"];

        // To Complete with Shield Research level verification

        if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
            $upgradeTime = $buildingTime * 2;
            $deuteriumCost = $deuteriumCost * 1.5;
            $energyCost = $energyCost * 1.5;
            $metalCost = $metalCost * 1.5;
            $infrastructure->setInfrastructure("Bouclier", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
            echo json_encode(array("status" => "success"));
        }
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la construction de l'infrastructure"));
}


