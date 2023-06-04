<?php
/**
 * @file sendUniverse-process.php
 * Fichier contenant le système complet d'envoi des données de l'univers vers le frontend.
 * 
 * @page sendUniverse sendUniverse-process.php
 * 
 * Cette fonction réalise le processus d'envoi des données de l'univers vers le frontend en utilisant la classe
 * Universe.
 * Elle récupère les données nécessaires depuis la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et envoie les données de l'univers vers le frontend.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_SESSION["universeId"]) est défini.
 * - Initialise l'objet nécessaire (Universe).
 * - Envoie les données de l'univers vers le frontend.
 * - Retourne un message de succès avec les données de l'univers.
 */
session_start();
include_once("../classes/universe.php");

$universe = new Universe();

$allUniverses = $universe->getAllUniverses();
$data = array(
    "allUniverses" => $allUniverses
);

echo json_encode($data);

