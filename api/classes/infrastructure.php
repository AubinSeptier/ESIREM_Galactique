<?php
include_once("database.php");

// To complete

class Infrastructure extends Database {
        
        public function getInfrastructure($name){
            $sql = "SELECT * FROM infrastructures WHERE name = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type){
            $sql = "INSERT into infrastructures(name, level, upgrade_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense, id_planet, id_infrastructure_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type]);
        }
        
        public function updateInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type){
            $sql = "UPDATE infrastructures SET name = ?, level = ?, upgrade_time = ?, deuterium_cost = ?, energy_cost = ?, metal_cost = ?, deuterium_production = ?, energy_production = ?, metal_production = ?, attack = ?, defense = ?, id_planet = ?, id_infrastructure_type = ? WHERE id = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type]);
        }
}