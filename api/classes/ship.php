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
        
    public function setShip($name, $attack, $defense, $id_fleet, $id_ship_type){
        $sql = "INSERT into ships(name, attack, defense, id_fleet, id_ship_type) VALUES (?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $attack, $defense, $id_fleet, $id_ship_type]);
    }

    public function updateShip($name, $attack, $defense, $id_fleet, $id_ship_type){
        $sql = "UPDATE ships SET name = ?, attack = ?, defense = ?, id_fleet = ?, id_ship_type = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $attack, $defense, $id_fleet, $id_ship_type]);
    }

    public function getShipCountByType($shipType){
        $sql = "SELECT COUNT(*) as count FROM ships WHERE id_ship_type = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$shipType]);
        $result = $query->fetchColumn();
        return $result;
    }
}