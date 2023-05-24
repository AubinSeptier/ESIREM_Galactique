<?php
include_once("database.php");

class Empire extends Database {
    
    public function getEmpire($name){
        $sql = "SELECT * FROM empires WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setEmpire($name, $race, $adjective, $deuterium_stock, $energy_stock, $metal_stock, $id_universe, $id_user){
        $sql = "INSERT into empires(name, race, adjective, deuterium_stock, energy_stock, metal_stock, id_universe, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $race, $adjective, $deuterium_stock, $energy_stock, $metal_stock, $id_universe, $id_user]);
    }
}