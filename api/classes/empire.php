<?php
include_once("database.php");

class Empire extends Database {
    
    public function getEmpire($id){
        $sql = "SELECT * FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setEmpire($name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user){
        $sql = "INSERT into empires(name, race, adjective, deuterium_stock, energy_stock, energy_stock_used, metal_stock, id_universe, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user]);
    }

    public function getDeuteriumStock($id){
        $sql = "SELECT deuterium_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    public function getEnergyStock($id){
        $sql = "SELECT energy_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    public function getEnergyStockUsed($id){
        $sql = "SELECT energy_stock_used FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    public function getMetalStock($id){
        $sql = "SELECT metal_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    public function updateDeuteriumStock($deuterium_stock, $id){
        $sql = "UPDATE empires SET deuterium_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium_stock, $id]);
    }

    public function updateEnergyStock($energy_stock, $id){
        $sql = "UPDATE empires SET energy_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock, $id]);
    }

    public function updateEnergyStockUsed($energy_stock_used, $id){
        $sql = "UPDATE empires SET energy_stock_used = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock_used, $id]);
    }

    public function updateMetalStock($metal_stock, $id){
        $sql = "UPDATE empires SET metal_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$metal_stock, $id]);
    }
}