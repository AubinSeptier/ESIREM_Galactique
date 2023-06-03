<?php
/**
 * @file createUniverse-process.php
 * Fichier contient le système complet de création d'un univers.
 * 
 * @page createUniverse createUniverse-process.php
 * 
 * Cette fonction réalise le processus de création d'un univers en utilisant les classes
 * Universe, Galaxy, Solar_System et Planet.
 * Elle récupère les données nécessaires depuis la superglobale $_GET et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et crée un univers avec les paramètres donnés.
 * Elle crée également les galaxies, systèmes solaires et planètes de l'univers.
 * 
 * La fonction effectue les étapes suivantes :
 *  - Vérifie si les paramètres requis ($_GET["universeName"]) sont définis.
 *  - Initialise le premier objet nécessaire (Universe).
 *  - Vérifie si l'univers n'existe pas déjà.
 *  - Crée un nouvel univers avec les paramètres donnés et met à jour les variables de session.
 *  - Définit une liste de noms de galaxies et de systèmes solaires.
 *  - Initialise les autres objets nécessaires (Galaxy, Solar_System, Planet).
 *  - Crée les galaxies, systèmes solaires et planètes de l'univers à l'aide de boucles for imbriquées.
 *  - Retourne un message de succès.
 * 
 * @throws Exception_1 Si l'univers existe déjà, renvoie un message d'erreur.
 * @throws Exception_2 Si la superglobale GET n'est pas récupérée ou vide, renvoie un message d'erreur.
 */
session_start();
include_once("../classes/universe.php");
include_once("../classes/galaxy.php");
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

if(isset($_GET["universeName"])){
    $universeName = $_GET["universeName"];
    $universe = new Universe();
    $universeData = $universe->getUniverseByName($universeName);
        
    if($universeData){
        echo json_encode(array("status" => "L'univers existe déjà"));
        exit();
    }
    
    $universe->setUniverse($universeName);
    $universeData = $universe->getUniverseByName($universeName);
    $_SESSION["universeId"] = $universeData[0]["id"];

    $galaxyNames = ["Andromeda", "Triangulum", "Sombrero", "Tourbillon", "Cigar", "Eagle", "Antennae", "Sunflower", "Black Eye", "Cartwheel", "Medusa", "Fireworks", "Bode", "Magellan", "Sculptor", "Leo", "Fornax", "Draco", "Pegasus", "Orion", "Centaurus", "Phoenix", "Hercules", "Ursa Major", "Ursa Minor", "Lyra", "Perseus", "Hydra", "Aquarius", "Gemini", "Sagittarius", "Taurus", "Cassiopeia", "Crater", "Carina", "Columbia", "Dorado", "Octans", "Pisces", "Corona Borealis", "Virgo", "Libra", "Meunier"];
    $solarSystemNames = ["Solara", "Astra", "Nova Terra", "Stellaris", "Solstice", "Celestia", "Cosmos", "Nebulon", "Auroria", "Zodiacus", "Aetheris", "Helion", "Luminaris", "Sirius", "Polaris", "Lyria", "Andromedon", "Capellus", "Vegalux", "Cassiopeus", "Draconis", "Cygnus", "Phoenicia", "Pegasus Prime", "Aquilian", "Perseon", "Herculeon", "Centauri", "Scorpius", "Sagittarion", "Canis Solaris", "Geminos", "Libranis", "Taureon", "Arianis", "Leonis", "Virgonis", "Aquarian", "Piscean", "Carinon", "Serpentis", "Delphion", "Eridanis", "Hydraon", "Cruxalis", "Colombo", "Leoprian", "Coronis", "Ursalon", "Solarius", "Jean-Luc Breton", "Maxence", "Aubin", "Coruscant", "Dathomir", "Kashyyk", "Tatooine", "Dagobah", "Naboo", "Jakku", "Hoth", "Mustafar", "Endor", "Yavin", "Alderaan", "Kamino", "Geonosis", "Mandalore", "Lothal", "Malachor", "Mortis", "Mandalore"];
    shuffle($galaxyNames);
    shuffle($solarSystemNames);


    $galaxy = new Galaxy();
    $solarSystem = new Solar_System();
    $planet = new Planet();


    for($i = 0; $i<5; $i++){
        $galaxy->setGalaxy($galaxyNames[$i], $universe->getUniverseByName($universeName)[0]["id"]);
        for($j = 0; $j<10; $j++){
            $positions = NULL;
            $positions = range(1, 10);
            $planets_number = rand(4, 10);
            $solarSystemName = array_shift($solarSystemNames);
            $solarSystem->setSolar_System($solarSystemName, $planets_number, $galaxy->getGalaxy($galaxyNames[$i])[0]["id"]);
            shuffle($positions);
            for($k = 0; $k<$planets_number; $k++){
                $position = array_shift($positions);
                switch($position){
                    case 1:
                        $size = 90;
                        break;
                    case 2:
                        $size = 100;
                        break;
                    case 3:
                        $size = 110;
                        break;
                    case 4:
                        $size = 120;
                        break;
                    case 5:
                        $size = 130;
                        break;
                    case 6:
                        $size = 130;
                        break;
                    case 7:
                        $size = 120;
                        break;
                    case 8:
                        $size = 110;
                        break;
                    case 9:
                        $size = 100;
                        break;
                    case 10:
                        $size = 90;
                        break;
                }
                $planet->setPlanet($solarSystemName." ".$position, $position, $size, $solarSystem->getSolar_System($solarSystemName)[0]["id"], null);
            }
        }
    }
    echo json_encode(array("status" => "success"));
}
else {
    echo json_encode(array("status" => "Erreur lors de la création de l'univers"));
}

