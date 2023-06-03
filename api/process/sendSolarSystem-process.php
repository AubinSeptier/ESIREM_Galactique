<?php
include_once("../classes/solar_system.php");
include_once("../classes/galaxy.php");

$solarSystem = new Solar_System();
$galaxy = new Galaxy();

if(isset($_GET['galaxyName'])){
    $galaxyName = $_GET['galaxyName'];
    $galaxyId = $galaxy->getGalaxy($galaxyName)[0]["id"];

    $allSolarSystems = $solarSystem->getAllSolar_Systems($galaxyId)["name"];

    $data = array(
        "allSolarSystems" => $allSolarSystems
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des systèmes solaires."));
}