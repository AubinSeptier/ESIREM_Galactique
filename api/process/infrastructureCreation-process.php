<?php
session_start();
include_once("../classes/infrastructure.php");
include_once("../classes/infrastructure_type.php");
include_once("../classes/planet.php");
include_once("../classes/resource.php");
include_once("../classes/empires.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");

$infrastructure = new Infrastructure();
$resource = new Resource();
$infrastructure_type = new Infrastructure_Type();
$empire = new Empire();
$ship = new Ship();
$ship_type = new Ship_Type();

$deuteriumStock = $empire->getEmpire($_SESSION["empireId"])[0]["deuterium_stock"];
$energyStock = $empire->getEmpire($_SESSION["empireId"])[0]["energy_stock"];
$energyStockUsed = $empire->getEmpire($_SESSION["empireId"])[0]["energy_stock_used"];
$metalStock = $empire->getEmpire($_SESSION["empireId"])[0]["metal_stock"];

if(isset($_POST["research_lab"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
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
        echo "Vous n'avez pas assez de ressources";
    }
    else{
        // To complete with research bonus
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $infrastructure->setInfrastructure("Laboratoire de recherche", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["space_sit"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
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
        echo "Vous n'avez pas assez de ressources";
    }
    else{
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $infrastructure->setInfrastructure("Chantier Spatial", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
        // To complete with ship_type building time update
    }
}
if(isset($_POST["nanites_factory"]) && isset($_POST["id_planet"])){
    $_id_planet = $_POST["id_planet"];
    $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["id"];

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
        echo "Vous n'avez pas assez de ressources";
    }
    else{
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $infrastructure->setInfrastructure("Usine de nanites", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $_id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
        // To complete with infrastructures building/upgrading time bonus
    }
}
if(isset($_POST["metal_mine"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $metalProduction = $metalProduction * 1.5;
        $infrastructure->setInfrastructure("Mine de métal", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["deuterium_synthesizer"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $deuteriumProduction = $deuteriumProduction * 1.3;
        $infrastructure->setInfrastructure("Synthétiseur de deutérium", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["solar_plant"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $energyProduction = $energyProduction * 1.4;
        $infrastructure->setInfrastructure("Centrale solaire", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["fusion_plant"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
    $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["id"];

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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.6;
        $energyCost = $energyCost * 1.6;
        $metalCost = $metalCost * 1.6;
        $energyProduction = $energyProduction * 1.4;
        $infrastructure->setInfrastructure("Centrale à Fusion", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["laser_artillery"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
    $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["id"];

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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $infrastructure->setInfrastructure("Artillerie laser", 1, 0, 0, 0, 0, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["ion_gun"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
    $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["id"];

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
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $infrastructure->setInfrastructure("Artillerie à ions", 1, 0, 0, 0, 0, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}
if(isset($_POST["shield"]) && isset($_POST["id_planet"])){
    $id_planet = $_POST["id_planet"];
    $id_infrastructure_type = $infrastructure_type->getInfrastructure_Type("shield")[0]["id"];

    $buildingTime = $infrastructure_type->getInfrastructure_Type("shield")[0]["building_time"];
    $deuteriumCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["deuterium_cost"];
    $energyCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["energy_cost"];
    $metalCost = $infrastructure_type->getInfrastructure_Type("shield")[0]["metal_cost"];
    $deuteriumProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["deuterium_production"];
    $energyProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["energy_production"];
    $metalProduction = $infrastructure_type->getInfrastructure_Type("shield")[0]["metal_production"];
    $attack = $infrastructure_type->getInfrastructure_Type("shield")[0]["attack"];
    $defense = $infrastructure_type->getInfrastructure_Type("shield")[0]["defense"];

    if(($deuteriumCost > $deuteriumStock) || ($energyCost + $energyStockUsed > $energyStock) || ($metalCost > $metalStock)){
        echo "Vous n'avez pas assez de ressources";
    }
    else {
        $upgradeTime = $buildingTime * 2;
        $deuteriumCost = $deuteriumCost * 1.5;
        $energyCost = $energyCost * 1.5;
        $metalCost = $metalCost * 1.5;
        $infrastructure->setInfrastructure("Bouclier", 1, $upgradeTime, $deuteriumCost, $energyCost, $metalCost, $deuteriumProduction, $energyProduction, $metalProduction, $attack, $defense, $id_planet, $id_infrastructure_type);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateEnergyStockUsed($energyStockUsed + $energyCost, $_SESSION["empireId"]);
    }
}


