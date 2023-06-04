<?php
/**
 * @file sendPlanet-process.php
 * Fichier contenant le système complet d'envoi des données de la planète vers le frontend.
 * 
 * @page sendPlanet sendPlanet-process.php
 * 
 * Cette fonction réalise le processus d'envoi des données de la planète vers le frontend en utilisant les classes
 * Solar_System et Planet.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et envoie les données de la planète vers le frontend.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_GET["solarSystemName"]) est défini.
 * - Initialise les objets nécessaires (Solar_System et Planet).
 * - Envoie les données de la planète vers le frontend.
 * - Retourne un message de succès avec les données de la planète.
 * 
 * @throws Exception_1 Si la superglobalse GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 */
session_start();
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

$solarSystem = new Solar_System();
$planet = new Planet();
$empireId = $_SESSION['empireId'];

if(isset($_GET["solarSystemName"])){
    $solarSystemName = $_GET["solarSystemName"];
    $solarSystemId = $solarSystem->getSolar_System($solarSystemName)[0]["id"];
    
    $allPlanetsData = $planet->getAllPlanets($solarSystemId, $empireId);    

    $data = array(
        "allPlanetsData" => $allPlanetsData
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des planètes."));
}