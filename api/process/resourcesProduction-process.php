<?php
/**
 * @file resourcesProduction-process.php
 * Fichier contenant le système complet de production des ressources.
 * 
 * @page resourcesProduction resourcesProduction-process.php
 * 
 * Cette fonction réalise le processus de production des ressources en utilisant les classes
 * Infrastructure et Resource.
 * Elle récupère les données nécessaires depuis la superglobale $_POST et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et met à jour les ressources de la planète avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_GET["id_planet"]) est défini.
 * - Initialise les objets nécessaires (Infrastructure et Resource).
 * - Met à jour les ressources de la planète.
 * 
 * @throws Exception_1 Si la superglobalse GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 */
session_start();
include_once("../classes/infrastructure.php");
include_once("../classes/resource.php");


if(isset($_GET["id_planet"])){
    $infrastructure = new Infrastructure();
    $resource = new Resource();
    $id_planet = $_GET["id_planet"];

    $totalDeuterium = $infrastructure->getTotalDeuterium($id_planet);
    $totalEnergy = $infrastructure->getTotalEnergy($id_planet);
    $totalMetal = $infrastructure->getTotalMetal($id_planet);

    $resource->updateResource($totalDeuterium, $totalEnergy, $totalMetal, $id_planet);
}
else {
    echo "Erreur lors de la récupération des ressources";
}
