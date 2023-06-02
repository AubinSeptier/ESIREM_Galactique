<?php
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

$solarSystem = new Solar_System();
$planet = new Planet();

if(isset($_GET["solarSystemName"])){
    $solarSystemName = $_GET["solarSystemName"];
    $solarSystemId = $solarSystem->getSolar_System($solarSystemName)[0]["id"];
    $planetsCount = $planet->getPlanetsCount($solarSystemId);
    
    $planetData = $planet->getAllPlanets($solarSystemId);

    for($i = 0; $i < $planetsCount; $i++){
    }
    

    $data = array(
        "planet1" => $planet1,
        "planet2" => $planet2,
        "planet3" => $planet3,
        "planet4" => $planet4,
        "planet5" => $planet5,
        "planet6" => $planet6,
        "planet7" => $planet7,
        "planet8" => $planet8,
        "planet9" => $planet9,
        "planet10" => $planet10
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des planètes."));
}