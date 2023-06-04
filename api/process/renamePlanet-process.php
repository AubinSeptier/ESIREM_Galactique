<?php
/**
 * @file renamePlanet-process.php
 * Fichier contenant le système complet de changement de nom de planète.
 * 
 * @page renamePlanet renamePlanet-process.php
 * 
 * Cette fonction réalise le processus de changement de nom de planète en utilisant la classe
 * Planet.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et change le nom de la planète avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si les paramètres requis ($_GET["planetName"], $_GET["id_planet"]) sont définis.
 * - Initialise l'objet nécessaire (Planet).
 * - Change le nom de la planète.
 * - Retourne un message de succès.
 * 
 * @throws Exception_1 Si les superglobalse GET ne sont pas récupérées ou vides, renvoie un message d'erreur.
 */
include_once("../classes/planet.php");

if(isset($_GET["planetName"]) && isset($_GET["id_planet"])){
    $planet = new Planet();
    $planetName = $_GET["planetName"];
    $id_planet = $_GET["id_planet"];

    $planet->updatePlanetName($planetName, $id_planet);
    echo json_encode(array("status" => "success"));
}
else {
    echo json_encode(array("status" => "Erreur lors du changement de nom de la planète"));
}