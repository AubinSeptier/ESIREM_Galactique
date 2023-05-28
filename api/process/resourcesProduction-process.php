<?php
session_start();
include_once("../classes/infrastructure.php");
include_once("../classes/resource.php");


if(isset($_POST["id_planet"])){
    $infrastructure = new Infrastructure();
    $resource = new Resource();
    $id_planet = $_POST["id_planet"];

    $totalDeuterium = $infrastructure->getTotalDeuterium($id_planet);
    $totalEnergy = $infrastructure->getTotalEnergy($id_planet);
    $totalMetal = $infrastructure->getTotalMetal($id_planet);

    $resource->updateResource($totalDeuterium, $totalEnergy, $totalMetal, $id_planet);
}
else {
    echo "Erreur lors de la récupération des ressources";
}
