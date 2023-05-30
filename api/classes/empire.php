<?php
include_once("database.php");

class Empire extends Database {
    
    // Récupérer un empire par son id
    public function getEmpireById($id){
        $sql = "SELECT * FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    // Récupérer un empire par son nom
    public function getEmpireByName($name){
        $sql = "SELECT * FROM empires WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    // Ajouter un empire et ses caractéristiques
    public function setEmpire($name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user){
        $sql = "INSERT into empires(name, race, adjective, deuterium_stock, energy_stock, energy_stock_used, metal_stock, id_universe, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user]);
    }

    // Récupérer le stock de Deuterium d'un empire selon son id
    public function getDeuteriumStock($id){
        $sql = "SELECT deuterium_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer le stock d'Energie d'un empire selon son id
    public function getEnergyStock($id){
        $sql = "SELECT energy_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer le stock d'Energie utilisé d'un empire selon son id
    public function getEnergyStockUsed($id){
        $sql = "SELECT energy_stock_used FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer le stock de Metal d'un empire selon son id
    public function getMetalStock($id){
        $sql = "SELECT metal_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Modifier le stock de Deuterium d'un empire selon son id
    public function updateDeuteriumStock($deuterium_stock, $id){
        $sql = "UPDATE empires SET deuterium_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium_stock, $id]);
    }

    // Modifier le stock d'Energie d'un empire selon son id
    public function updateEnergyStock($energy_stock, $id){
        $sql = "UPDATE empires SET energy_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock, $id]);
    }

    // Modifier le stock d'Energie utilisé d'un empire selon son id
    public function updateEnergyStockUsed($energy_stock_used, $id){
        $sql = "UPDATE empires SET energy_stock_used = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock_used, $id]);
    }

    // Modifier le stock de Metal d'un empire selon son id
    public function updateMetalStock($metal_stock, $id){
        $sql = "UPDATE empires SET metal_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$metal_stock, $id]);
    }

    public function getEmpireForeignKeys($id_universe, $id_user){
        $sql = "SELECT id FROM empires WHERE id_universe = ? AND id_user = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_universe, $id_user]);
        $result = $query->fetchAll();
        return $result;
    }
}