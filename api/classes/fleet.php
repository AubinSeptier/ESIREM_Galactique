<?php
/**
 * @file fleet.php
 * @details Ce fichier contient la classe Fleet qui est utilisée pour gérer les flottes.
 */
include_once("database.php");

/**
 * @class Fleet
 * @brief Classe permettant de gérer les flottes.
 */
class Fleet extends Database {
        
    /**
    * @fn public function getFleet($id)
    * @brief Obtenir la flotte par son id.
    * @param $id L'id de la flotte.
    * @return $result Une tableau des données de la flotte ou false si aucune n'a été trouvée.
    */
    public function getFleet($id){
        $sql = "SELECT * FROM fleets WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn public function getFleetByPlanet($id_planet)
    * @brief Obtenir la flotte selon l'id de la planète.
    * @param $id_planet L'id de la planète.
    * @return $result Une tableau des données de la flotte de la planète ou false si aucune n'a été trouvée.
    */
    public function getFleetByPlanet($id_planet){
        $sql = "SELECT * FROM fleets WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn public function setFleet($name, $ships_number, $attack, $defense, $id_empire, $id_planet)
    * @brief Ajouter une flotte à la base de données.
    * @param $name Le nom de la flotte.
    * @param $ships_number Le nombre de vaisseaux dans la flotte.
    * @param $attack L'attaque totale de la flotte.
    * @param $defense La défense totale de la flotte.
    * @param $id_empire L'id de l'empire auquel appartient la flotte.
    * @param $id_planet L'id de la planète où se trouve la flotte.
    */
    public function setFleet($name, $ships_number, $attack, $defense, $id_empire, $id_planet){
        $sql = "INSERT into fleets(name, ships_number, attack, defense, id_empire, id_planet) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $ships_number, $attack, $defense, $id_empire, $id_planet]);
    }
 
    /**
    * @fn public function updateFleet($ships_number, $attack, $defense, $id_planet)
    * @brief Mettre à jour de la flotte dans la base de données.
    * @param $ships_number Le nombre de vaisseaux dans la flotte.
    * @param $attack L'attaque totale de la flotte.
    * @param $defense La défense totale de la flotte.
    * @param $id_planet L'id de la planète où se trouve la flotte.
    * 
    * @warning Cette fonction ne fonctionne pas dans le process mais fonctionne de manière brut en ligne de commande en utilisant des valeurs tests.
    */
    public function updateFleet($ships_number, $attack, $defense, $id_planet){
        $sql = "UPDATE fleets SET ships_number = ?, attack = ?, defense = ? WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$ships_number, $attack, $defense, $id_planet]);
    }
}