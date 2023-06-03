<?php
session_start();
include_once("../classes/fleet.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
include_once("../classes/empire.php");
include_once("../classes/research.php");
include_once("../classes/research_type.php");

$research = new Research();
$researchType = new ResearchType();

if(isset($_GET["fighter"]) && isset($_GET["id_fleet"])){
    $fighter = new Ship();
    $id_fleet = $_GET["id_fleet"];
    $shipCount = $fighter->getShipCountByType("fighter");
    $shipNumber = $shipCount + 1;
    $metal = $fighter->getShipType("fighter")[0]["metal_number"];
    $deuterium = $fighter->getShipType("fighter")[0]["deuterium_number"];
    $building_time = $fighter->getShipType("fighter")[0]["building_time"];
    $attack = $fighter->getShipType("fighter")[0]["attack"];
    $defense = $fighter->getShipType("fighter")[0]["defense"];
    $capacity = $fighter->getShipType("fighter")[0]["capacity"];

    $fighter->setShip("Chasseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, "fighter");
}
else if(isset($_GET["cruiser"]) && isset($_GET["id_fleet"])){
    $cruiser = new Ship();
    $id_fleet = $_GET["id_fleet"];
    $shipCount = $cruiser->getShipCountByType("cruiser");
    $shipNumber = $shipCount + 1;
    $metal = $cruiser->getShipType("cruiser")[0]["metal_number"];
    $deuterium = $cruiser->getShipType("cruiser")[0]["deuterium_number"];
    $building_time = $cruiser->getShipType("cruiser")[0]["building_time"];
    $attack = $cruiser->getShipType("cruiser")[0]["attack"];
    $defense = $cruiser->getShipType("cruiser")[0]["defense"];
    $capacity = $cruiser->getShipType("cruiser")[0]["capacity"];
    
    $cruiser->setShip("Croiseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, "cruiser");
}
else if(isset($_GET["transporter"]) && isset($_GET["id_fleet"])){
    $transporter = new Ship();
    $id_fleet = $_GET["id_fleet"];
    $shipCount = $transporter->getShipCountByType("transporter");
    $shipNumber = $shipCount + 1;
    $metal = $transporter->getShipType("transporter")[0]["metal_number"];
    $deuterium = $transporter->getShipType("transporter")[0]["deuterium_number"];
    $building_time = $transporter->getShipType("transporter")[0]["building_time"];
    $attack = $transporter->getShipType("transporter")[0]["attack"];
    $defense = $transporter->getShipType("transporter")[0]["defense"];
    $capacity = $transporter->getShipType("transporter")[0]["capacity"];

    $transporter->setShip("Transporteur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, "transporter");
}
else if(isset($_GET["settler"]) && isset($_GET["id_fleet"])){
    $settler = new Ship();
    $id_fleet = $_GET["id_fleet"];
    $shipCount = $settler->getShipCountByType("settler");
    $shipNumber = $shipCount + 1;
    $metal = $settler->getShipType("settler")[0]["metal_number"];
    $deuterium = $settler->getShipType("settler")[0]["deuterium_number"];
    $building_time = $settler->getShipType("settler")[0]["building_time"];
    $attack = $settler->getShipType("settler")[0]["attack"];
    $defense = $settler->getShipType("settler")[0]["defense"];
    $capacity = $settler->getShipType("settler")[0]["capacity"];

    $settler->setShip("Colon #".$shipNumber, $attack, $defense, $capacity, $id_fleet, "settler");
}
else{
    echo "Erreur lors de la création du vaisseau";
}
