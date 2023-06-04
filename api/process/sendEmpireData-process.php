<?php
/**
 * @file sendEmpireData-process.php
 * Fichier contenant le système complet d'envoi des données de l'empire.
 * 
 * @page sendEmpireData sendEmpireData-process.php
 * 
 * Cette fonction réalise le processus d'envoi des données de l'empire en utilisant la classe
 * Empire.
 * Elle récupère les données nécessaires depuis la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et envoie les données de l'empire.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_SESSION["empireId"]) est défini.
 * - Initialise l'objet nécessaire (Empire).
 * - Envoie les données de l'empire.
 * - Retourne un message de succès avec les données de l'empire.
 */
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
