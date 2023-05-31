<?php
/**
 * @file ship_type.php
 * @details Ce fichier contient la classe Ship_Type qui permet de gérer les types de vaisseaux.
 */
include_once("database.php");

class Ship_Type extends Database {
    
    // Récupérer un type de vaisseau par son nom
    public function getShip_Type($name){
        $sql = "SELECT * FROM ship_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    // Modifier les caractéristiques d'un type de vaisseau
    public function setShip_Type($name, $deuterium_number, $metal_number, $building_time, $attack, $defense, $capacity){
        $sql = "INSERT into ship_types(name, deuterium_number, metal_number, building_time, attack, defense, capacity) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $deuterium_number, $metal_number, $building_time, $attack, $defense, $capacity]);
    }
}