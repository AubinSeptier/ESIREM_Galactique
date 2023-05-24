<?php
include_once("database.php");

class Ship_Type extends Database {
    
    public function getShip_Type($name){
        $sql = "SELECT * FROM ship_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setShip_Type($name, $deuterium_number, $metal_number, $building_time, $attack, $defense){
        $sql = "INSERT into ship_types(name, deuterium_number, metal_number, building_time, attack, defense) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $deuterium_number, $metal_number, $building_time, $attack, $defense]);
    }
}