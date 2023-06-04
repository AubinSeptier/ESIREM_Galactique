<?php
/**
 * @file ship_type.php
 * @details Ce fichier contient la classe Ship_Type qui permet de gérer les types de vaisseaux.
 */
include_once("database.php");

/**
 * @class Ship_Type
 * @brief Classe permettant de gérer les types de vaisseaux.
 */
class Ship_Type extends Database {
    
    /**
    * @fn public function getShip_Type($name)
    * @brief Obtenir les données sur un type de vaisseau.
    * @param $name Le nom du type de vaisseau à récupérer.
    * @return $result Un tableau d'informations sur le type de vaisseau ou false si le type n'a pas été trouvé
    */
    public function getShip_Type($name){
        $sql = "SELECT * FROM ship_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn public function setShip_Type($name, $deuterium_number, $metal_number, $building_time, $attack, $defense, $capacity)
    * @brief Ajouter un type de vaisseau à la base de données.
    * @param $name Le nom du type de vaisseau.
    * @param $deuterium_number Le nombre de deutérium nécessaire pour construire le vaisseau.
    * @param $metal_number Le nombre de métal nécessaire pour construire le vaisseau.
    * @param $building_time Le temps de construction du vaisseau.
    * @param $attack L'attaque du vaisseau.
    * @param $defense La défense du vaisseau.
    * @param $capacity La capacité de fret du vaisseau.
    */
    public function setShip_Type($name, $deuterium_number, $metal_number, $building_time, $attack, $defense, $capacity){
        $sql = "INSERT into ship_types(name, deuterium_number, metal_number, building_time, attack, defense, capacity) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $deuterium_number, $metal_number, $building_time, $attack, $defense, $capacity]);
    }
}