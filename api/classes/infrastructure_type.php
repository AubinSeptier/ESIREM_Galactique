<?php
include_once("database.php");

// To complete

class Infrastructure_Type extends Database {
        
        public function getInfrastructure_Type($name){
            $sql = "SELECT * FROM infrastructure_types WHERE name = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setInfrastructure_Type($id, $name, $deuterium_number, $metal_number, $building_time, $attack, $defense){
            $sql = "INSERT into infrastructure_types(id, name, deuterium_number, metal_number, building_time, attack, defense) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$id, $name, $deuterium_number, $metal_number, $building_time, $attack, $defense]);
        }
}