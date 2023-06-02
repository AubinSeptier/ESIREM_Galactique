<?php
session_start();
include_once("../classes/galaxy.php");

$galaxy = new Galaxy();

$universeId = $_SESSION['universeId'];

$galaxy1 = $galaxy->getAllGalaxies($universeId)[0]["name"]; 
$galaxy2 = $galaxy->getAllGalaxies($universeId)[1]["name"];
$galaxy3 = $galaxy->getAllGalaxies($universeId)[2]["name"];
$galaxy4 = $galaxy->getAllGalaxies($universeId)[3]["name"];
$galaxy5 = $galaxy->getAllGalaxies($universeId)[4]["name"];

$data = array(
    "galaxy1" => $galaxy1,
    "galaxy2" => $galaxy2,
    "galaxy3" => $galaxy3,
    "galaxy4" => $galaxy4,
    "galaxy5" => $galaxy5
);

echo json_encode($data);

