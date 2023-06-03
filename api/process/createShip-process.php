<?php
/**
 * @file createShip-process.php
 * Fichier contient le système complet de création d'un vaisseau.
 * 
 * @page createShip createShip-process.php
 * 
 * Cette fonction réalise le processus de création d'un vaisseau en utilisant les classes
 * Research, Research_Type, Empire, Galaxy, Solar_System, Planet, Resource et Fleet.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et crée un vaisseau avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si les paramètres requis ($_GET["ship"], $_GET["id_planet"]) sont définis.
 * - Initialise les objets nécessaires (Research, Research_Type, Empire, Galaxy, Solar_System, Planet, Resource, Fleet).
 * - Vérifie si le joueur a les recherches nécessaires pour construire le vaisseau.
 * - Vérifie si le joueur a assez de ressources pour construire le vaisseau.
 * - Crée un nouveau vaisseau avec les paramètres donnés.
 * - Met à jour la flotte de la planète sélectionnée avec le nouveau vaisseau.
 * - Retourne un message de succès avec les détails du vaisseau construit.
 * 
 * @throws Exception_1 Si les ressources nécessaires sont insuffisantes, renvoie un message d'erreur.
 * @throws Exception_2 Si les superglobales GET ne sont pas récupérées ou vides, renvoie un message d'erreur.
 * 
 * @remark Actuellement, les vaisseaux peuvent être construits sans avoir les bâtiments nécessaires.
 *  
 * @warning Problème que nous n'avons pas réussi à résoudre : La méthode updateFleet() n'actualise pas la flotte de la planète sélectionnée. La méthode SQL fonctionne pourtant si on la teste de façon brut directement dans MariaDB.
 */
session_start();
include_once("../classes/fleet.php");
include_once("../classes/ship.php");
include_once("../classes/ship_type.php");
include_once("../classes/empire.php");
include_once("../classes/research.php");
include_once("../classes/research_type.php");

$research = new Research();
$researchType = new Research_Type();
$fleet = new Fleet();
$empire = new Empire();
$ship_type = new Ship_Type();

$deuteriumStock = $empire->getDeuteriumStock($_SESSION["empireId"]);  
$metalStock = $empire->getMetalStock($_SESSION["empireId"]);
$fighterId = $ship_type->getShip_Type("fighter")[0]["id"];
$cruiserId = $ship_type->getShip_Type("cruiser")[0]["id"];
$transporterId = $ship_type->getShip_Type("transporter")[0]["id"];
$settlerId = $ship_type->getShip_Type("settler")[0]["id"];

if(isset($_GET["ship"]) && isset($_GET["id_planet"])){
    $id_planet = $_GET["id_planet"];
    $id_fleet = $fleet->getFleetByPlanet($id_planet)[0]["id"];
    $fleetSize = $fleet->getFleetByPlanet($id_planet)[0]["ships_number"];
    $fleetAttack = $fleet->getFleetByPlanet($id_planet)[0]["attack"];
    $fleetDefense = $fleet->getFleetByPlanet($id_planet)[0]["defense"];

    if($_GET["ship"] == "fighter"){
        $fighter = new Ship();
        
        $metalCost = $ship_type->getShip_Type("fighter")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("fighter")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("fighter")[0]["building_time"];

        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("fighter")[0]["attack"];
        $defense = $ship_type->getShip_Type("fighter")[0]["defense"];
        $capacity = $ship_type->getShip_Type("fighter")[0]["capacity"];
        $shipCount = $fighter->getShipCountByType($fighterId);
        $shipNumber = $shipCount + 1;
        $fleetAttack += $attack;
        $fleetDefense += $defense;
        $fleetSize += 1;

        $fighter->setShip("Chasseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $fighterId);
        $fleet->updateFleet($fleetSize, $fleetAttack, $fleetDefense, $id_planet);
        echo json_encode(array("status" => "success", "planet" => $id_planet, "Taille" => $fleetSize + 1, "Attack" => $fleetAttack + $attack, "Defense" => $fleetDefense + $defense));
    }
    if($_GET["ship"] == "cruiser"){
        $cruiser = new Ship();
        
        $metalCost = $ship_type->getShip_Type("cruiser")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("cruiser")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("cruiser")[0]["building_time"];

        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("cruiser")[0]["attack"];
        $defense = $ship_type->getShip_Type("cruiser")[0]["defense"];
        $capacity = $ship_type->getShip_Type("cruiser")[0]["capacity"];
        $shipCount = $cruiser->getShipCountByType($cruiserId);
        $shipNumber = $shipCount + 1;
        
        $cruiser->setShip("Croiseur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $cruiserId);
        $fleet->updateFleet($fleetSize, $fleetAttack, $fleetDefense, $id_planet);
        echo json_encode(array("status" => "success"));
    }
    if($_GET["ship"] == "transporter"){
        $transporter = new Ship();
        
        $metalCost = $ship_type->getShip_Type("transporter")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("transporter")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("transporter")[0]["building_time"];
        
        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("transporter")[0]["attack"];
        $defense = $ship_type->getShip_Type("transporter")[0]["defense"];
        $capacity = $ship_type->getShip_Type("transporter")[0]["capacity"];
        $shipCount = $transporter->getShipCountByType($transporterId);
        $shipNumber = $shipCount + 1;

        $transporter->setShip("Transporteur #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $transporterId);
        $fleet->updateFleet($fleetSize, $fleetAttack, $fleetDefense, $id_planet);
        echo json_encode(array("status" => "success"));
    }
    if($_GET["ship"] == "settler"){
        $settler = new Ship();
        
        $metalCost = $ship_type->getShip_Type("settler")[0]["metal_number"];
        $deuteriumCost = $ship_type->getShip_Type("settler")[0]["deuterium_number"];
        $building_time = $ship_type->getShip_Type("settler")[0]["building_time"];
        
        if($metalCost > $metalStock || $deuteriumCost > $deuteriumStock){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources pour construire ce vaisseau"));
            exit;
        }
        
        $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
        $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
        $attack = $ship_type->getShip_Type("settler")[0]["attack"];
        $defense = $ship_type->getShip_Type("settler")[0]["defense"];
        $capacity = $ship_type->getShip_Type("settler")[0]["capacity"];
        $shipCount = $settler->getShipCountByType($settlerId);
        $shipNumber = $shipCount + 1;

        $settler->setShip("Colon #".$shipNumber, $attack, $defense, $capacity, $id_fleet, $settlerId);
        $fleet->updateFleet($fleetSize, $fleetAttack, $fleetDefense, $id_planet);
        echo json_encode(array("status" => "success"));
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la construction du vaisseau"));
}
