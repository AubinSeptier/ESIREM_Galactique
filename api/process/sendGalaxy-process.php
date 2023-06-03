<?php
session_start();
include_once("../classes/galaxy.php");

$galaxy = new Galaxy();

$universeId = $_SESSION['universeId'];

$allGalaxies = $galaxy->getAllGalaxies($universeId)["name"]; 


$data = array(
    "allGalaxies" => $allGalaxies
);

echo json_encode($data);

