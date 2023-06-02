<?php
session_start();
include_once("../classes/empire.php");

$empire = new Empire();
$empireId = $_SESSION['empireId'];

$empireName = $empire->getEmpireById($empireId)[0]["name"];
$empireRace = $empire->getEmpireById($empireId)[0]["race"];
$empireAdjective = $empire->getEmpireById($empireId)[0]["adjective"];
$empireDeuterium = $empire->getEmpireById($empireId)[0]["deuterium_stock"];
$empireEnergy = $empire->getEmpireById($empireId)[0]["energy_stock"];
$empireEnergyUsed = $empire->getEmpireById($empireId)[0]["energy_stock_used"];
$empireMetal = $empire->getEmpireById($empireId)[0]["metal_stock"];

$data = array("empireName" => $empireName, "empireRace" => $empireRace, "empireAdjective" => $empireAdjective, "empireDeuterium" => $empireDeuterium, "empireEnergy" => $empireEnergy, "empireEnergyUsed" => $empireEnergyUsed, "empireMetal" => $empireMetal);
echo json_encode($data);
