<?php
/**
 * @file makeResearch-process.php
 * Fichier contenant le système complet de recherche.
 * 
 * @page makeResearch makeResearch-process.php
 * 
 * Cette fonction réalise le processus de recherche en utilisant les classes
 * Research, Research_Type, Empire, Infrastructure et Infrastructure_Type.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et met à jour les recherches de l'empire avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Initialise les objets nécessaires (Research, Research_Type, Empire, Infrastructure et Infrastructure_Type).
 * - Vérifie si le paramètre requis ($_GET["research"]) est défini.
 * - Vérifie si les ressources nécessaires sont disponibles.
 * - Met à jour les ressources de l'empire.
 * - Met à jour les recherches de l'empire.
 * - Retourne un message de succès.
 * 
 * Il existe le même processus pour chaque recherche possible (Energie, Laser, Ions, Bouclier, Armement et IA).
 * 
 * @throws Exception_1 Si les ressources nécessaires ne sont pas disponibles, renvoie un message d'erreur.
 * @throws Exception_2 Si les technologies requises ne sont pas possédées, renvoie un message d'erreur.
 * @throws Exception_3 Si la superglobale GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 * 
 * @remark Actuellement, les technologies peuvent être recherchées sans les bâtiments nécessaires.
 */
session_start();
include_once("../classes/research.php");
include_once("../classes/research_type.php");
include_once("../classes/empire.php");
include_once("../classes/infrastructure.php");
include_once("../classes/infrastructure_type.php");
include_once("../classes/resource.php");

$research = new Research();
$research_type = new Research_Type();
$empire = new Empire();
$infrastructure = new Infrastructure();
$infrastructure_type = new Infrastructure_Type();

$deuteriumStock = $empire->getDeuteriumStock($_SESSION["empireId"]);
$energyStock = $empire->getEnergyStock($_SESSION["empireId"]);
$energyStockUsed = $empire->getEnergyStockUsed($_SESSION["empireId"]);  
$metalStock = $empire->getMetalStock($_SESSION["empireId"]);

$researchLabId = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["id"];
$energyTechId = $research_type->getResearch_Type("energy")[0]["id"];
$laserTechId = $research_type->getResearch_Type("laser")[0]["id"];
$ionsTechId = $research_type->getResearch_Type("ions")[0]["id"];
$shieldTechId = $research_type->getResearch_Type("shield")[0]["id"];
$armamentTechId = $research_type->getResearch_Type("armament")[0]["id"];
$aiTechId = $research_type->getResearch_Type("ai")[0]["id"];

if(isset($_GET["research"])){
    if($_GET["research"] == "energy"){
        $deuteriumCost = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["research_time"];

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $energyTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["research"] == "laser"){
        $deuteriumCost = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["research_time"];
        $energyTechLevel = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["level"];

        if($energyTechLevel < 5){
            echo json_encode(array("status" => "Vous devez avoir atteint le niveau 5 de la technologie Energie"));
            exit();
        }

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $laserTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }   
    }
    if($_GET["research"] == "ions"){
        $deuteriumCost = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["research_time"];
        $laserTechLevel = $research->getResearchById($laserTechId, $_SESSION["empireId"])[0]["laser"];

        if($laserTechLevel < 5){
            echo json_encode(array("status" => "Vous devez avoir atteint le niveau 5 de la technologie Laser"));
            exit();
        }

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $ionsTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["research"] == "shield"){
        $deuteriumCost = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($shieldTechId, $_SESSION["empireId"])[0]["research_time"];
        $energyTechLevel = $research->getResearchById($energyTechId, $_SESSION["empireId"])[0]["level"];
        $ionsTechLevel = $research->getResearchById($ionsTechId, $_SESSION["empireId"])[0]["level"];

        if(($energyTechLevel < 8) && ($ionsTechLevel < 2)){
            echo json_encode(array("status" => "Vous devez avoir atteint le niveau 8 de la technologie Energie et le niveau 2 de la technologie Ions"));
            exit();
        }

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $shieldTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["research"] == "armament"){
        $deuteriumCost = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($armamentTechId, $_SESSION["empireId"])[0]["research_time"];

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $armamentTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }
    }
    if($_GET["research"] == "ai"){
        $deuteriumCost = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["deuterium_cost"];
        $metalCost = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["metal_cost"];
        $researchLevel = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["level"];
        $researchTime = $research->getResearchById($aiTechId, $_SESSION["empireId"])[0]["research_time"];

        if(($deuteriumCost > $deuteriumStock) || ($metalCost > $metalStock)){
            echo json_encode(array("status" => "Vous n'avez pas assez de ressources"));
        }
        else {
            $empire->updateDeuteriumStock($deuteriumStock - $deuteriumCost, $_SESSION["empireId"]);
            $empire->updateMetalStock($metalStock - $metalCost, $_SESSION["empireId"]);
            $researchLevel++;
            $researchTime = $researchTime * 2;
            $research->updateResearch($researchLevel, $researchTime, $deuteriumCost, $metalCost, $aiTechId, $_SESSION["empireId"]);
            echo json_encode(array("status" => "success"));
        }
    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la recherche"));
}


