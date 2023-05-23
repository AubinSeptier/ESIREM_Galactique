<?php
include_once("database.php");

class Ship extends Database {
            
            public function getShip($name){
                $sql = "SELECT * FROM ships WHERE name = ?";
                $query = $this->connect()->prepare($sql);
                $query->execute([$name]);
                $result = $query->fetchAll();
                return $result;
            }
        
            public function setShip($id, $name, $attack, $defense, $id_fleet, $id_ship_type){
                $sql = "INSERT into ships(id, name, attack, defense, id_fleet, id_ship_type) VALUES (?, ?, ?, ?, ?, ?)";
                $query = $this->connect()->prepare($sql);
                $query->execute([$id, $name, $attack, $defense, $id_fleet, $id_ship_type]);
            }
}