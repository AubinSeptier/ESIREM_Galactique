<?php
session_start();
include_once("../classes/fleet.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
include_once("../classes/empire.php");
include_once("../classes/research.php");
include_once("../classes/research_type.php");

$research = new Research();
$researchType = new Research_Type();
$fleet = new Fleet();
$empire = new Empire();
$ship_type = new Ship_Type();

$deuteriumStock = $empire->getDeuteriumStock($_SESSION["empireId"]);  
$metalStock = $empire->getMetalStock($_SESSION["empireId"]);
$fighterId = $ship_type->getShip_Type("fighter")[0]["id"];
$cruiserId = $ship_type->getShip_Type("cruiser")[0]["id"];
$transporterId = $ship_type->getShip_Type("transporter")[0]["id"];
$settlerId = $ship_type->getShip_Type("settler")[0]["id"];

if(isset($_GET["ship"]) && isset($_GET["id_planet"])){
    $id_planet = $_GET["id_planet"];
    $id_fleet = $fleet->getFleetByPlanet($id_planet)[0]["id"];
    $fleetSize = $fleet->getFleetByPlanet($id_planet)[0]["ships_number"];
    $fleetAttack = $fleet->getFleetByPlanet($id_planet)[0]["attack"];
    $fleetDefense = $fleet->getFleetByPlanet($id_planet)[0]["defense"];

    if($_GET["ship"] == "fighter"){
        $fighter = new Ship();
        
        $metalCost = $ship_type->getShip_Type("fighter")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("fighter")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("fighter")[0]["building_time"];

        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("fighter")[0]["attack"];
        $defense = $ship_type->getShip_Type("fighter")[0]["defense"];
        $capacity = $ship_type->getShip_Type("fighter")[0]["capacity"];
        $shipCount = $fighter->getShipCountByType($fighterId);
        $shipNumber = $shipCount + 1;
        $fleetAttack += $attack;
        $fleetDefense += $defense;
        $fleetSize += 1;

        $fighter->setShip("Chasseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $fighterId);
        $fleet->updateFleet($id_planet, $fleetSize, $fleetAttack, $fleetDefense);
        echo json_encode(array("status" => "success", "fleet" => $id_fleet, "Taille" => $fleetSize + 1, "Attack" => $fleetAttack + $attack, "Defense" => $fleetDefense + $defense));
    }
    if($_GET["ship"] == "cruiser"){
        $cruiser = new Ship();
        
        $metalCost = $ship_type->getShip_Type("cruiser")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("cruiser")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("cruiser")[0]["building_time"];

        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("cruiser")[0]["attack"];
        $defense = $ship_type->getShip_Type("cruiser")[0]["defense"];
        $capacity = $ship_type->getShip_Type("cruiser")[0]["capacity"];
        $shipCount = $cruiser->getShipCountByType($cruiserId);
        $shipNumber = $shipCount + 1;
        
        $cruiser->setShip("Croiseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $cruiserId);
        echo json_encode(array("status" => "success"));
    }
    if($_GET["ship"] == "transporter"){
        $transporter = new Ship();
        
        $metalCost = $ship_type->getShip_Type("transporter")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("transporter")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("transporter")[0]["building_time"];
        
        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("transporter")[0]["attack"];
        $defense = $ship_type->getShip_Type("transporter")[0]["defense"];
        $capacity = $ship_type->getShip_Type("transporter")[0]["capacity"];
        $shipCount = $transporter->getShipCountByType($transporterId);
        $shipNumber = $shipCount + 1;

        $transporter->setShip("Transporteur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $transporterId);
        echo json_encode(array("status" => "success"));
    }
    if($_GET["ship"] == "settler"){
        $settler = new Ship();
        
        $metalCost = $ship_type->getShip_Type("settler")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("settler")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("settler")[0]["building_time"];
        
        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("settler")[0]["attack"];
        $defense = $ship_type->getShip_Type("settler")[0]["defense"];
        $capacity = $ship_type->getShip_Type("settler")[0]["capacity"];
        $shipCount = $settler->getShipCountByType($settlerId);
        $shipNumber = $shipCount + 1;

        $settler->setShip("Colon #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $settlerId);
        echo json_encode(array("status" => "success"));
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la construction du vaisseau"));
}
