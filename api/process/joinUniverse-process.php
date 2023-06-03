<?php
/**
 * @file joinUniverse-process.php
 * Fichier contenant le système complet de connexion à un univers.
 * 
 * @page joinUniverse joinUniverse-process.php
 * 
 * Cette fonction réalise le processus de connexion à un univers en utilisant les classes
 * Universe et Empire.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et crée un empire avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si le paramètre requis ($_GET["universe"]) est défini.
 * - Initialise les objets nécessaires (Universe et Empire).
 * - Vérifie si l'univers existe.
 * - Vérifie si l'empire existe.
 * - Retourne un message de succès.
 * 
 * @throws Exception_1 Si l'univers n'existe pas, renvoie un message d'erreur.
 * @throws Exception_2 Si l'empire n'existe pas, renvoie un message spécifique.
 * @throws Exception_2 Si l'empire existe déjà, renvoie un message spécifique.
 * @throws Exception_3 Si la superglobale GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 */
session_start();
include_once("../classes/universe.php");
include_once("../classes/empire.php");

if(isset($_GET["universe"])){
    $universeName = $_GET["universe"];
    $universe = new Universe();
    $empire = new Empire();

    $universeData = $universe->getUniverseByName($universeName);


    if(!$universeData){
        echo json_encode(array("status" => "L'univers n'existe pas"));
        exit();
    }
    if($universeData) {
        $_SESSION["universeId"] = $universeData[0]["id"];
        $empireData = $empire->getEmpireForeignKeys($_SESSION["universeId"], $_SESSION["id"]);

        if(!$empireData){
            echo json_encode(array("status" => "Empire does not exist"));
            exit();
        }
        else{
            echo json_encode(array("status" => "Empire already exists"));
        }

    }
}
else {
    echo json_encode(array("status" => "Erreur lors de la connexion à l'univers"));
}