<?php
/**
 * @file empire.php
 * @details Ce fichier contient la classe Empire qui est utilisée pour gérer les empires.
 */
include_once("database.php");

class Empire extends Database {
    
    
    /**
    * @fn getEmpireById($id)
    * @brief Récupérer les informations d'un empire avec un identifiant donné. 
    * @param $id L'identifiant de l'empire à récupérer.
    * @return $result Un tableau d'objets Empire ou false si aucun n'a été trouvé.
    */
    public function getEmpireById($id){
        $sql = "SELECT * FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    
    /**
    * @fn getEmpireByName($name)
    * @brief Obtenir l'empire avec un nom donné. 
    * @param $name Le nom de l'empire à récupérer.
    * @return $result Un tableau de l'empire avec le nom donné ou false s'il n'y en a pas.
    */
    public function getEmpireByName($name){
        $sql = "SELECT * FROM empires WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    
    /**
    * @fn setEmpire($name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user)
    * @brief Ajouter un empire à la base de données.
    * @param $name Le nom de l'empire.
    * @param $race La race de l'empire.
    * @param $adjective L'adjectif de l'empire.
    * @param $deuterium_stock Le stock de deutérium de l'empire.
    * @param $energy_stock Le stock d'énergie de l'empire.
    * @param $energy_stock_used L'énergie utilisée par l'empire.
    * @param $metal_stock Le stock de métal de l'empire.
    * @param $id_universe L'identifiant de l'univers dans lequel joue l'empire.
    * @param $id_user L'identifiant de l'utilisateur contrôlant l'empire.
    */
    public function setEmpire($name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user){
        $sql = "INSERT into empires(name, race, adjective, deuterium_stock, energy_stock, energy_stock_used, metal_stock, id_universe, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $race, $adjective, $deuterium_stock, $energy_stock, $energy_stock_used, $metal_stock, $id_universe, $id_user]);
    }

    
    /**
    * @fn getDeuteriumStock($id)
    * @brief Obtenir le stock de deutérium de l'empire. Il s'agit de la quantité de deutérium qu'un empire possède dans le stock.
    * @param $id L'identifiant de l'empire.
    * @return $result Quantité de stock qu'un joueur a dans le stock
    */
    public function getDeuteriumStock($id){
        $sql = "SELECT deuterium_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    
    /**
    * @fn getEnergyStock($id)
    * @brief Obtenir le stock d'énergie de l'empire. Ceci est utilisé pour déterminer la quantité d'énergie qu'un empire produit.
    * @param $id L'identifiant de l'empire.
    * @return $result Stock d'énergie de l'empire.
    */
    public function getEnergyStock($id){
        $sql = "SELECT energy_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    
    /**
    * @fn getEnergyStockUsed($id)
    * @brief Obtenir la quantité d'énergie utilisée par l'empire. Ceci est utilisé pour déterminer la quantité d'énergie utilisée par un empire
    * @param $id L'identifiant de l'empire.
    * @return $result La quantité d'énergie utilisée par l'empire.
    */
    public function getEnergyStockUsed($id){
        $sql = "SELECT energy_stock_used FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    
    /**
    * @fn getMetalStock($id)
    * @brief Obtenir le stock de métal de l'empire. Ceci est utilisé pour déterminer le stock disponible d'un empire
    * @param $id L'identifiant de l'empire.
    * @return $result Nombre de stocks disponibles pour l'empire.
    */
    public function getMetalStock($id){
        $sql = "SELECT metal_stock FROM empires WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    
    /**
    * @fn updateDeuteriumStock($deuterium_stock, $id)
    * @brief Mettre à jour le stock de deutérium de l'empire. Ceci est utilisé pour mettre à jour le stock d'un empire
    * @param $deuterium_stock Le stock de deutérium de l'empire.
    * @param $id L'identifiant de l'empire.
    */
    public function updateDeuteriumStock($deuterium_stock, $id){
        $sql = "UPDATE empires SET deuterium_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium_stock, $id]);
    }

    
    /**
    * @fn updateEnergyStock($energy_stock, $id)
    * @brief Mettre à jour le stock d'énergie de l'empire. Ceci est utilisé pour mettre à jour le stock d'énergie d'un empire
    * @param $energy_stock Le stock d'énergie de l'empire.
    * @param $id L'identifiant de l'empire.
    */
    public function updateEnergyStock($energy_stock, $id){
        $sql = "UPDATE empires SET energy_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock, $id]);
    }

    
    /**
    * @fn updateEnergyStockUsed($energy_stock_used, $id)
    * @brief Mettre à jour le stock d'énergie utilisé par l'empire. Ceci est utilisé pour mettre à jour le stock d'énergie utilisé d'un empire
    * @param $energy_stock_used Le stock d'énergie utilisé par l'empire.
    * @param $id L'identifiant de l'empire.
    */
    public function updateEnergyStockUsed($energy_stock_used, $id){
        $sql = "UPDATE empires SET energy_stock_used = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$energy_stock_used, $id]);
    }

    
    /**
    * @fn updateMetalStock($metal_stock, $id)
    * @brief Mettre à jour le stock de métal de l'empire. Permet de mettre à jour le stock de métaux d'un empire.
    * @param $metal_stock Le stock de métal de l'empire.
    * @param $id L'identifiant de l'empire.
    */
    public function updateMetalStock($metal_stock, $id){
        $sql = "UPDATE empires SET metal_stock = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$metal_stock, $id]);
    }

    /**
    * @fn getEmpireForeignKeys($id_universe, $id_user)
    * @brief Obtenir l'identifiant de l'empire selon son univers et son utilisateur. 
    * @param $id_universe L'identifiant de l'univers.
    * @param $id_user L'identifiant de l'utilisateur.
    */
    public function getEmpireForeignKeys($id_universe, $id_user){
        $sql = "SELECT id FROM empires WHERE id_universe = ? AND id_user = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_universe, $id_user]);
        $result = $query->fetchAll();
        return $result;
    }
}