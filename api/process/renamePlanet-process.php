<?php
include_once("planet.php");

if(isset($_POST["planetName"]) && isset($_POST["planetId"])){
    $planet = new Planet();
    $planetName = $_POST["planetName"];
    $planetId = $_POST["planetId"];

    $planet->setPlanetName($planetName, $planetId);
}
else {
    echo "Erreur lors du renommage de la planète";
}