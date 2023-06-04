<?php
/**
 * @file ship.php
 * @details Ce fichier contient la classe Ship qui permet de gérer les vaisseaux.
 */
include_once("database.php");

/**
 * @class Ship
 * @brief Classe permettant de gérer les vaisseaux.
 */
class Ship extends Database {
        
    /**
    * @fn public function getShip($name)
    * @brief Obtenir un vaisseau à partir de son nom.
    * @param $name Le nom du vaisseau.
    * @return $result Un tableau d'informations sur le vaisseau ou false si aucun n'a été trouvé.
    */
    public function getShip($name){
        $sql = "SELECT * FROM ships WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
      
    /**
    * @fn public function setShip($name, $attack, $defense, $capacity, $id_fleet, $id_ship_type)
    * @brief Ajouter un vaisseau à la base de données.
    * @param $name Le nom du vaisseau.
    * @param $attack L'attaque du vaisseau.
    * @param $defense La défense du vaisseau.
    * @param $capacity La capacité de fret du vaisseau.
    * @param $id_fleet L'id de la flotte.
    * @param $id_ship_type L'id du type de vaisseau.
    */
    public function setShip($name, $attack, $defense, $capacity, $id_fleet, $id_ship_type){
        $sql = "INSERT into ships(name, attack, defense, capacity, id_fleet, id_ship_type) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $attack, $defense, $capacity, $id_fleet, $id_ship_type]);
    }

    /**
    * @fn public function updateShip($attack, $defense, $id_ship_type)
    * @brief Mettre à jour les statistiques d'un type de vaisseau dans la base de données.
    * @param $attack L'attaque du vaisseau.
    * @param $defense La défense du vaisseau.
    * @param $id_ship_type L'id du type de vaisseau.
    */
    public function updateShip($attack, $defense, $id_ship_type){
        $sql = "UPDATE ships SET attack = ?, defense = ? WHERE id_ship_type = ? ";
        $query = $this->connect()->prepare($sql);
        $query->execute([$attack, $defense, $id_ship_type]);
    }

    /**
    * @fn public function getShipCountByType($shipType)
    * @brief Obtenir le nombre de vaisseaux d'un certain type dans la base de données.
    * @param $shipType Le type de vaisseau.
    * @return $result Le nombre de vaisseaux du type donné.
    */
    public function getShipCountByType($shipType){
        $sql = "SELECT COUNT(*) as count FROM ships WHERE id_ship_type = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$shipType]);
        $result = $query->fetchColumn();
        return $result;
    }
}