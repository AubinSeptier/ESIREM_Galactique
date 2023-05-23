<?php
include_once("database.php");

class Solar_System extends Database {
    
    public function getSolar_System($name){
        $sql = "SELECT * FROM solar_systems WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setSolar_System($id, $name, $planets_number $id_galaxy){
        $sql = "INSERT into solar_systems(id, name, planets_number, id_galaxy) VALUES (?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id, $name, $planets_number, $id_galaxy]);
    }
}