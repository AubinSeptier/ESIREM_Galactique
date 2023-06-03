<?php
include_once("../classes/planet.php");

if(isset($_GET["planetName"]) && isset($_GET["id_planet"])){
    $planet = new Planet();
    $planetName = $_GET["planetName"];
    $id_planet = $_GET["id_planet"];

    $planet->updatePlanetName($planetName, $id_planet);
    echo json_encode(array("status" => "success"));
}
else {
    echo json_encode(array("status" => "Erreur lors du changement de nom de la planète"));
}