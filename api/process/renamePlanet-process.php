<?php
include_once("planet.php");

if(isset($_POST["planetName"]) && isset($_POST["planetId"])){
    $planet = new Planet();
    $planetName = $_POST["planetName"];
    $planetId = $_POST["planetId"];

    $planet->updatePlanetName($planetName, $planetId);
    echo json_encode(array("status" => "success"));
}
else {
    echo json_encode(array("status" => "Erreur lors du changement de nom de la planète"));
}