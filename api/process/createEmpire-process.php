<?php
/**
 * @file createEmpire-process.php
 * Fichier contient le système complet de création d'un empire.
 * 
 * @page createEmpire createEmpire-process.php
 * 
 * Cette fonction réalise le processus de création d'un empire en utilisant les classes
 * Research, Research_Type, Empire, Galaxy, Solar_System, Planet, Resource et Fleet.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et crée un empire avec les paramètres donnés.
 * Elle met également à jour certaines entités liées à l'empire nouvellement créé.
 * 
 * 
 * La fonction effectue les étapes suivantes :
 *   - Vérifie si les paramètres requis ($_GET["empireName"], $_GET["empireRace"], $_GET["empireAdjective"]) sont définis.
 *   - Initialise les objets nécessaires (Empire, Research_Type, Galaxy, Solar_System, Planet, Resource, Fleet).
 *   - Vérifie si le nom de l'empire n'existe pas déjà.
 *   - Crée un nouvel empire avec les paramètres donnés et met à jour les variables de session.
 *   - Sélectionne aléatoirement une galaxie, un système solaire et une planète pour l'empire nouvellement créé.
 *   - Met à jour le propriétaire de la planète sélectionnée avec l'ID de l'empire.
 *   - Crée les ressources et la flotte de départ pour la planète natale l'empire.
 *   - Crée des recherches initiales (énergie, laser, ions, bouclier, armement, IA) pour l'empire.
 *   - Retourne un message de succès avec les détails de la galaxie, du système solaire et de la planète attribués à l'empire.
 * 
 * @throws Exception_1 Si l'empire existe déjà, renvoie un message d'erreur.
 * @throws Exception_2 Si les superglobales GET ne sont pas récupérées ou vides, renvoie un message d'erreur.
 *
 * @warning Problème que nous n'avons pas réussi à résoudre : la méthode getRandomPlanet() ne fonctionne pas au-delà du premier appel lors de la création du premier univers. 
 * Les deux autres méthodes pour la galaxie et le système solaire fonctionnent correctement pourtant bien de leurs côtés malgré un code similaire.
 * 
 */
session_start();
include_once("../classes/research.php");
include_once("../classes/research_type.php");
include_once("../classes/empire.php");
include_once("../classes/planet.php");
include_once("../classes/solar_system.php");
include_once("../classes/galaxy.php");
include_once("../classes/user.php");
include_once("../classes/resource.php");
include_once("../classes/fleet.php");
// Processus de création d'un empire

if(isset($_GET["empireName"]) && isset($_GET["empireRace"]) && isset($_GET["empireAdjective"])){
    // Initialisation et récupération des données utiles
    $empire = new Empire();
    $empireName = $_GET["empireName"];
    $empireRace = $_GET["empireRace"];
    $empireAdjective = $_GET["empireAdjective"];
    $empireDeuterium = 1000;
    $empireMetal = 1000;
    $empireUserId = $_SESSION["id"];
    $empireUniverseId = $_SESSION["universeId"];

    $research_type = new Research_Type();
    $energyTech = $research_type->getResearch_Type("energy");
    $laserTech = $research_type->getResearch_Type("laser");
    $ionsTech = $research_type->getResearch_Type("ions");
    $shieldTech = $research_type->getResearch_Type("shield");
    $armamentTech = $research_type->getResearch_Type("armament");
    $aiTech = $research_type->getResearch_Type("ai");


    // Vérification de l'existence de l'empire
    if($empire->getEmpireByName($empireName)){
        echo json_encode(array("status" => "Ce nom d'Empire existe déjà"));
    }
    else{
        // Création de l'empire
        $empire->setEmpire($empireName, $empireRace, $empireAdjective, $empireDeuterium, 0, 0,$empireMetal, $empireUniverseId, $empireUserId);
        $_SESSION["empireId"] = $empire->getEmpireByName($empireName)[0]["id"];

        $galaxy = new Galaxy();
        $solarSystem = new Solar_System();
        $planet = new Planet();

        $randomGalaxy = $galaxy->getRandomGalaxy($empireUniverseId);
        $randomSolarSystem = $solarSystem->getRandomSolar_System($randomGalaxy);
        $randomPlanet = $planet->getRandomPlanet($randomSolarSystem)[0]["id"];
        $planet->updatePlanetOwner($_SESSION["empireId"], $randomPlanet);

        $resource = new Resource();
        $resource->setResource(0, 0, 0, $randomPlanet);
        $fleet = new Fleet();
        $fleet->setFleet("Flotte de ".$empireName, 0, 0, 0, $_SESSION["empireId"], $randomPlanet);          
        
        $research = new Research();
        $research->setResearch("Energie", 0, $energyTech[0]["research_time"], $energyTech[0]["deuterium_cost"], $energyTech[0]["metal_cost"], $energyTech[0]["id"], $_SESSION["empireId"]);
        $research->setResearch("Laser", 0, $laserTech[0]["research_time"], $laserTech[0]["deuterium_cost"], $laserTech[0]["metal_cost"], $laserTech[0]["id"], $_SESSION["empireId"]);
        $research->setResearch("Ions", 0, $ionsTech[0]["research_time"], $ionsTech[0]["deuterium_cost"], $ionsTech[0]["metal_cost"], $ionsTech[0]["id"], $_SESSION["empireId"]);
        $research->setResearch("Bouclier", 0, $shieldTech[0]["research_time"], $shieldTech[0]["deuterium_cost"], $shieldTech[0]["metal_cost"], $shieldTech[0]["id"], $_SESSION["empireId"]);
        $research->setResearch("Armament", 0, $armamentTech[0]["research_time"], $armamentTech[0]["deuterium_cost"], $armamentTech[0]["metal_cost"], $armamentTech[0]["id"], $_SESSION["empireId"]);
        $research->setResearch("AI", 0, $aiTech[0]["research_time"], $aiTech[0]["deuterium_cost"], $aiTech[0]["metal_cost"], $aiTech[0]["id"], $_SESSION["empireId"]);
        
        echo json_encode(array("status" => "success", "Galaxy" => $randomGalaxy, "SolarSystem" => $randomSolarSystem, "Planet" => $randomPlanet));
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la création de l'empire"));
}