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
    
        public function setInfrastructure($name, $id_planet, $id_infrastructure_type){
            $sql = "INSERT into infrastructures(name, id_planet, id_infrastructure_type) VALUES (?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $id_planet, $id_infrastructure_type]);
        }   
}