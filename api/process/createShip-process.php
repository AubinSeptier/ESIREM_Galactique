<?php
include_once("../classes/fleet.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
include_once("../classes/empire.php");

if(isset($_POST["fighter"]) && isset($_POST["id_fleet"])){
    $fighter = new Ship();
    $id_fleet = $_POST["id_fleet"];
    $shipCount = $fighter->getShipCountByType("fighter");
    $shipNumber = $shipCount + 1;
    $metal = $fighter->getShipType("fighter")[0]["metal_number"];
    $deuterium = $fighter->getShipType("fighter")[0]["deuterium_number"];
    $building_time = $fighter->getShipType("fighter")[0]["building_time"];
    $attack = $fighter->getShipType("fighter")[0]["attack"];
    $defense = $fighter->getShipType("fighter")[0]["defense"];

    $fighter->setShip("Chasseur #".$shipNumber, $attack, $defense, $id_fleet, "fighter");

}
else if(isset($_POST["cruiser"]) && isset($_POST["id_fleet"])){
    $cruiser = new Ship();
    $id_fleet = $_POST["id_fleet"];
    $shipCount = $cruiser->getShipCountByType("cruiser");
    $shipNumber = $shipCount + 1;
    $metal = $cruiser->getShipType("cruiser")[0]["metal_number"];
    $deuterium = $cruiser->getShipType("cruiser")[0]["deuterium_number"];
    $building_time = $cruiser->getShipType("cruiser")[0]["building_time"];
    $attack = $cruiser->getShipType("cruiser")[0]["attack"];
    $defense = $cruiser->getShipType("cruiser")[0]["defense"];
    
    $cruiser->setShip("Croiseur #".$shipNumber, $attack, $defense, $id_fleet, "cruiser");
}
else if(isset($_POST["transporter"]) && isset($_POST["id_fleet"])){
    $transporter = new Ship();
    $id_fleet = $_POST["id_fleet"];
    $shipCount = $transporter->getShipCountByType("transporter");
    $shipNumber = $shipCount + 1;
    $metal = $transporter->getShipType("transporter")[0]["metal_number"];
    $deuterium = $transporter->getShipType("transporter")[0]["deuterium_number"];
    $building_time = $transporter->getShipType("transporter")[0]["building_time"];
    $attack = $transporter->getShipType("transporter")[0]["attack"];
    $defense = $transporter->getShipType("transporter")[0]["defense"];

    $transporter->setShip("Transporteur #".$shipNumber, $attack, $defense, $id_fleet, "transporter");
}
else if(isset($_POST["settler"]) && isset($_POST["id_fleet"])){
    $settler = new Ship();
    $id_fleet = $_POST["id_fleet"];
    $shipCount = $settler->getShipCountByType("settler");
    $shipNumber = $shipCount + 1;
    $metal = $settler->getShipType("settler")[0]["metal_number"];
    $deuterium = $settler->getShipType("settler")[0]["deuterium_number"];
    $building_time = $settler->getShipType("settler")[0]["building_time"];
    $attack = $settler->getShipType("settler")[0]["attack"];
    $defense = $settler->getShipType("settler")[0]["defense"];

    $settler->setShip("Colon #".$shipNumber, $attack, $defense, $id_fleet, $id_ship_type, "settler");
}
