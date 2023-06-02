<?php
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

$solarSystem = new SolarSystem();
$planet = new Planet();

if(isset($_GET["solarSystemName"])){
    $solarSystemName = $_GET["solarSystemName"];
    $solarSystemId = $solarSystem->getSolarSystem($solarSystemName)[0]["id"];
    $planetsCount = $planet->getPlanetsCount($solarSystemId);
    
    $planetData = $planet->getAllPlanets($solarSystemId);

    for($i = 0; $i < $planetsCount; $i++){
        switch($i){
            case 0:
                $planet1 = $planetData[$i]["name"];
                break;
            case 1:
                $planet2 = $planetData[$i]["name"];
                break;
            case 2:
                $planet3 = $planetData[$i]["name"];
                break;
            case 3:
                $planet4 = $planetData[$i]["name"];
                break;
            case 4:
                $planet5 = $planetData[$i]["name"];
                break;
            case 5:
                $planet6 = $planetData[$i]["name"];
                break;
            case 6:
                $planet7 = $planetData[$i]["name"];
                break;
            case 7:
                $planet8 = $planetData[$i]["name"];
                break;
            case 8:
                $planet9 = $planetData[$i]["name"];
                break;
            case 9:
                $planet10 = $planetData[$i]["name"];
                break;
        }
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