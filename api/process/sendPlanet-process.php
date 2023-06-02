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
    $planetsCount = $planet->getPlanetsCount($solarSystemId);
    
    $planetData = $planet->getAllPlanets($solarSystemId);

    if($planetData[0]["id_empire"] != $empireId){
        $planet1 = "null";
    }
    else {
        $planet1 = $planetData[0]["name"];
    }
    if($planetData[1]["id_empire"] != $empireId){
        $planet2 = "null";
    }
    else {
        $planet2 = $planetData[1]["name"];
    }
    if($planetData[2]["id_empire"] != $empireId){
        $planet3 = "null";
    }
    else {
        $planet3 = $planetData[2]["name"];
    }
    if($planetData[3]["id_empire"] != $empireId){
        $planet4 = "null";
    }
    else {
        $planet4 = $planetData[3]["name"];
    }
    if($planetData[4]["id_empire"] != $empireId){
        $planet5 = "null";
    }
    else {
        $planet5 = $planetData[4]["name"];
    }
    if($planetData[5]["id_empire"] != $empireId){
        $planet6 = "null";
    }
    else {
        $planet6 = $planetData[5]["name"];
    }
    if($planetData[6]["id_empire"] != $empireId){
        $planet7 = "null";
    }
    else {
        $planet7 = $planetData[6]["name"];
    }
    if($planetData[7]["id_empire"] != $empireId){
        $planet8 = "null";
    }
    else {
        $planet8 = $planetData[7]["name"];
    }
    if($planetData[8]["id_empire"] != $empireId){
        $planet9 = "null";
    }
    else {
        $planet9 = $planetData[8]["name"];
    }
    if($planetData[9]["id_empire"] != $empireId){
        $planet10 = "null";
    }
    else {
        $planet10 = $planetData[9]["name"];
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