<?php
/**
 * @file sendGalaxy-process.php
 * Fichier contenant le système complet d'envoi des données de la galaxie vers le frontend.
 * 
 * @page sendGalaxy sendGalaxy-process.php
 * 
 * Cette fonction réalise le processus d'envoi des données de la galaxie vers le frontend en utilisant la classe
 * Galaxy.
 * Elle récupère les données nécessaires depuis la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et envoie les données de la galaxies vers le frontend.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_SESSION["universeId"]) est défini.
 * - Initialise l'objet nécessaire (Galaxy).
 * - Envoie les données de la galaxie vers le frontend.
 * - Retourne un message de succès avec les données de la galaxie.
 */
session_start();
include_once("../classes/galaxy.php");

$galaxy = new Galaxy();

$universeId = $_SESSION['universeId'];

$allGalaxies = $galaxy->getAllGalaxies($universeId)["name"]; 


$data = array(
    "allGalaxies" => $allGalaxies
);

echo json_encode($data);

