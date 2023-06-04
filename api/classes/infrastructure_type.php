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
        
    /**
    * @fn public function getInfrastructure_Type($name)
    * @brief Obtenir les données sur un type d'infrastucture.
    * @param $name Le nom du type d'infrastructure à récupérer.
    * @return $result Un tableau d'informations sur le type ou false si le type n'a pas été trouvé.
    */
    public function getInfrastructure_Type($name){
        $sql = "SELECT * FROM infrastructure_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn public function setInfrastructure_Type($name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense)
    * @brief Définir les types d'infrastructures dans le jeu. 
    * @param $name Le nom du type d'infrastructure.
    * @param $building_time Le temps de construction de l'infrastructure.
    * @param $deuterium_cost Le coût en deutérium de l'infrastructure.
    * @param $energy_cost Le coût en énergie de l'infrastructure.
    * @param $metal_cost Le coût en métal de l'infrastructure.
    * @param $deuterium_production La production de deutérium de l'infrastructure.
    * @param $energy_production La production d'énergie de l'infrastructure. 
    * @param $metal_production La production de métal de l'infrastructure.
    * @param $attack L'attaque de l'infrastructure. 
    * @param $defense La défense de l'infrastructure.
    */
    public function setInfrastructure_Type($name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense){
        $sql = "INSERT into infrastructure_types(name, building_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense]);
    }
}