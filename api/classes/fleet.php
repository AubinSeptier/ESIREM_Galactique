<?php
include_once("database.php");

class Fleet extends Database {
        
        public function getFleet($id){
            $sql = "SELECT * FROM fleets WHERE id = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$id]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setFleet($id, $name, $ships_number, $attack, $defense, $id_empire, $id_planet){
            $sql = "INSERT into fleets(id, name, ships_number, attack, defense, id_empire, id_planet) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$id, $name, $ships_number, $attack, $defense, $id_empire, $id_planet]);
        }
}