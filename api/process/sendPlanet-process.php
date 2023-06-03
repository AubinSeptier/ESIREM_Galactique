<?php
session_start();
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

$solarSystem = new Solar_System();
$planet = new Planet();
$empireId = $_SESSION['empireId'];

if(isset($_GET["solarSystemName"])){
    $solarSystemName = $_GET["solarSystemName"];
    $solarSystemId = $solarSystem->getSolar_System($solarSystemName)[0]["id"];
    
    $allPlanetsData = $planet->getAllPlanets($solarSystemId, $empireId);    

    $data = array(
        "allPlanetsData" => $allPlanetsData
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des planètes."));
}