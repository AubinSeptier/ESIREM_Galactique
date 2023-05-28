<?php
include_once("database.php");

class Infrastructure_Type extends Database {
        
        public function getInfrastructure_Type($name){
            $sql = "SELECT * FROM infrastructure_types WHERE name = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setInfrastructure_Type($name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense){
            $sql = "INSERT into infrastructure_types(name, building_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $building_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense]);
        }
}