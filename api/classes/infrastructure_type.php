<?php
/**
 * @file infrastructure_type.php
 * @details Ce fichier contient la classe Infrastructure_Type qui permet de gérer les types d'infrastructures.
 */
include_once("database.php");

/**
 * @class Infrastructure_Type
 * @brief Classe permettant de gérer les types d'infrastructures.
 */
class Infrastructure_Type extends Database {
        
    // Récupérer un type d'infrastructure par son nom
    public function getInfrastructure_Type($name){
        $sql = "SELECT * FROM infrastructure_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter un nouveau type d'infrastructure et ses caractéristiques
    public function setInfrastructure_Type($name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense){
        $sql = "INSERT into infrastructure_types(name, building_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense]);
    }
}