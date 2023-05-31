<?php
/**
 * @file ship.php
 * @details Ce fichier contient la classe Ship qui permet de gérer les vaisseaux.
 */
include_once("database.php");

class Ship extends Database {
        
    // Récupérer un vaisseau par son nom
    public function getShip($name){
        $sql = "SELECT * FROM ships WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
      
    // Ajouter un nouveau vaisseau et ses caractéristiques
    public function setShip($name, $attack, $defense, $capacity, $id_fleet, $id_ship_type){
        $sql = "INSERT into ships(name, attack, defense, capacity, id_fleet, id_ship_type) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $attack, $defense, $capacity, $id_fleet, $id_ship_type]);
    }

    // Modifier les caractéristiques d'un vaisseau
    public function updateShip($attack, $defense, $id_ship_type){
        $sql = "UPDATE ships SET attack = ?, defense = ? WHERE id_ship_type = ? ";
        $query = $this->connect()->prepare($sql);
        $query->execute([$attack, $defense, $id_ship_type]);
    }

    // Compter le nombre de vaisseaux par type
    public function getShipCountByType($shipType){
        $sql = "SELECT COUNT(*) as count FROM ships WHERE id_ship_type = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$shipType]);
        $result = $query->fetchColumn();
        return $result;
    }
}