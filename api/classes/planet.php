<?php
include_once("database.php");

class Planet extends Database {
        
        public function getPlanet($name){
            $sql = "SELECT * FROM planets WHERE name = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setPlanet($name, $id_solar_system, $id_empire){
            $sql = "INSERT into planets(name, id_solar_system, id_empire) VALUES (?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $id_solar_system, $id_empire]);
        }
}