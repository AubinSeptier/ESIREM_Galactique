<?php
/**
 * @file sendSolarSystem-process.php
 * Fichier contenant le système complet d'envoi des données du système solaire vers le frontend.
 * 
 * @page sendSolarSystem sendSolarSystem-process.php
 * 
 * Cette fonction réalise le processus d'envoi des données du système solaire vers le frontend en utilisant les classes
 * Solar_System et Galaxy.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et envoie les données du système solaire vers le frontend.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_GET["galaxyName"]) est défini.
 * - Initialise les objets nécessaires (Solar_System et Galaxy).
 * - Envoie les données du système solaire vers le frontend.
 * - Retourne un message de succès avec les données du système solaire.
 * 
 * @throws Exception_1 Si la superglobalse GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 */
include_once("../classes/solar_system.php");
include_once("../classes/galaxy.php");

$solarSystem = new Solar_System();
$galaxy = new Galaxy();

if(isset($_GET['galaxyName'])){
    $galaxyName = $_GET['galaxyName'];
    $galaxyId = $galaxy->getGalaxy($galaxyName)[0]["id"];

    $allSolarSystems = $solarSystem->getAllSolar_Systems($galaxyId)["name"];

    $data = array(
        "allSolarSystems" => $allSolarSystems
    );

    echo json_encode($data);

}
else {
    echo json_encode(array("status" => "Erreur lors de la récupération des systèmes solaires."));
}