<?php
include_once("../classes/solar_system.php");
include_once("../classes/galaxy.php");

$solarSystem = new Solar_System();
$galaxy = new Galaxy();

if(isset($_GET['galaxyName'])){
    $galaxyName = $_GET['galaxyName'];
    $galaxyId = $galaxy->getGalaxy($galaxyName)[0]["id"];

    $solarSystem1 = $solarSystem->getAllSolar_Systems($galaxyId)[0]["name"];
    $solarSystem2 = $solarSystem->getAllSolar_Systems($galaxyId)[1]["name"];
    $solarSystem3 = $solarSystem->getAllSolar_Systems($galaxyId)[2]["name"];
    $solarSystem4 = $solarSystem->getAllSolar_Systems($galaxyId)[3]["name"];
    $solarSystem5 = $solarSystem->getAllSolar_Systems($galaxyId)[4]["name"];
    $solarSystem6 = $solarSystem->getAllSolar_Systems($galaxyId)[5]["name"];
    $solarSystem7 = $solarSystem->getAllSolar_Systems($galaxyId)[6]["name"];
    $solarSystem8 = $solarSystem->getAllSolar_Systems($galaxyId)[7]["name"];
    $solarSystem9 = $solarSystem->getAllSolar_Systems($galaxyId)[8]["name"];
    $solarSystem10 = $solarSystem->getAllSolar_Systems($galaxyId)[9]["name"];

    $data = array(
        "solarSystem1" => $solarSystem1,
        "solarSystem2" => $solarSystem2,
        "solarSystem3" => $solarSystem3,
        "solarSystem4" => $solarSystem4,
        "solarSystem5" => $solarSystem5,
        "solarSystem6" => $solarSystem6,
        "solarSystem7" => $solarSystem7,
        "solarSystem8" => $solarSystem8,
        "solarSystem9" => $solarSystem9,
        "solarSystem10" => $solarSystem10
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des systèmes solaires."));
}