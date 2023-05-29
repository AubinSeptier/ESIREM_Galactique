<?php
session_start();
include_once("../classes/universe.php");
include_once("../classes/galaxy.php");
include_once("../classes/solar_system.php");
include_once("../classes/planet.php");

if(isset($_POST["universeName"])){
    $universeName = $_POST["universeName"];
    $universe = new Universe();
    $universeData = $universe->getUniverse($universeName);
        
    if($universeData){
        echo "Ce nom d\'univers existe déjà";
        exit();
    }
    
    $universe->setUniverse($universeName);
    $universeData = $universe->getUniverse($universeName);
    $_SESSION["universeId"] = $universeData[0]["id"];

    $galaxyNames = ["Andromeda", "Triangulum", "Sombrero", "Tourbillon", "Cigar", "Eagle", "Antennae", "Sunflower", "Black Eye", "Cartwheel", "Medusa", "Fireworks", "Bode", "Magellan", "Sculptor", "Leo", "Fornax", "Draco", "Pegasus", "Orion", "Centaurus", "Phoenix", "Hercules", "Ursa Major", "Ursa Minor", "Lyra", "Perseus", "Hydra", "Aquarius", "Gemini", "Sagittarius", "Taurus", "Cassiopeia", "Crater", "Carina", "Columbia", "Dorado", "Octans", "Pisces", "Corona Borealis", "Virgo", "Libra", "Meunier"];
    $solarSystemNames = ["Solara", "Astra", "Nova Terra", "Stellaris", "Solstice", "Celestia", "Cosmos", "Nebulon", "Auroria", "Zodiacus", "Aetheris", "Helion", "Luminaris", "Sirius", "Polaris", "Lyria", "Andromedon", "Capellus", "Vegalux", "Cassiopeus", "Draconis", "Cygnus", "Phoenicia", "Pegasus Prime", "Aquilian", "Perseon", "Herculeon", "Centauri", "Scorpius", "Sagittarion", "Canis Solaris", "Geminos", "Libranis", "Taureon", "Arianis", "Leonis", "Virgonis", "Aquarian", "Piscean", "Carinon", "Serpentis", "Delphion", "Eridanis", "Hydraon", "Cruxalis", "Colombo", "Leoprian", "Coronis", "Ursalon", "Solarius", "Jean-Luc Breton", "Maxence", "Aubin", "Coruscant", "Dathomir", "Kashyyk", "Tatooine", "Dagobah", "Naboo", "Jakku", "Hoth", "Mustafar", "Endor", "Yavin", "Alderaan", "Kamino", "Geonosis", "Mandalore", "Lothal", "Malachor", "Mortis", "Mandalore"];
    shuffle($galaxyNames);
    shuffle($solarSystemNames);


    $galaxy = new Galaxy();
    $solarSystem = new Solar_System();
    $planet = new Planet();

    for($i = 0; $i<5; $i++){
        $galaxy->setGalaxy($galaxyNames[$i], $universe->getUniverse($universeName)[0]["id"]);
        for($j = 0; $j<10; $j++){
            $planets_number = rand(4, 10);
            $solarSystem->setSolar_System($solarSystemNames[$j], $planets_number, $galaxy->getGalaxy($finalGalaxyNames[$i])[0]["id"]);
            $positions = range(1, 10);
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
                $planet->setPlanet($solarSystemNames[$j]." ".$position, $position, $size, $solarSystem->getSolar_System($solarSystemNames[$j])[0]["id"], null);
            }
        }
    }
}
else {
    echo "Erreur lors de la création de l'univers";
}

