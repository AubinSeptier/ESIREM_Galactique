<?php
/**
 * @file infrastructure.php
 * @details Ce fichier contient la classe Infrastructure qui est utilisée pour gérer les infrastructures.
 */
include_once("database.php");

/**
 * @class Infrastructure
 * @brief Classe permettant de gérer les infrastructures.
 */
class Infrastructure extends Database {       
    
    /**
    * @fn public function getInfrastructure($name)
    * @brief Obtenir les données sur une infrastructure par son nom.
    * @param $name Le nom de l'infrastructure à récupérer.
    * @return $result Un tableau de données sur l'infrastructure ou false si l'infrastructure n'a pas été trouvée.
    */
    public function getInfrastructure($name){
        $sql = "SELECT * FROM infrastructures WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn public function getInfrastructureByPlanetId($name, $id_planet)
    * @brief Obtenir une infrastructure par son nom et l'id de la planète.
    * @param $name Le nom de l'infrastructure.
    * @param $id_planet L'id de la planète.
    * @return $result Une tableau des données de l'infrastructure ou false si aucune n'a été trouvée.
    */
    public function getInfrastructureByPlanetId($name, $id_planet){
        $sql = "SELECT * FROM infrastructures WHERE name = ? AND id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $id_planet]);
        $result = $query->fetchAll();
    }
        
    /**
    * @fn public function setInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type)
    * @brief Ajouter une infrastructure à la base de données.
    * @param $name Le nom de l'infrastructure.
    * @param $level Le niveau de l'infrastructure. 
    * @param $upgrade_time Le temps de construction de l'infrastructure.
    * @param $deuterium_cost Le coût en deutérium de l'infrastructure.
    * @param $energy_cost Le coût en énergie de l'infrastructure.
    * @param $metal_cost Le coût en métal de l'infrastructure.
    * @param $deuterium_production La production de deutérium de l'infrastructure.
    * @param $energy_production La production d'énergie de l'infrastructure.
    * @param $metal_production La production de métal de l'infrastructure.
    * @param $attack L'attaque de l'infrastructure.
    * @param $defense La défense de l'infrastructure.
    * @param $id_planet L'id de la planète où se trouve l'infrastructure.
    * @param $id_infrastructure_type L'id du type d'infrastructure.
    */
    public function setInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type){
        $sql = "INSERT into infrastructures(name, level, upgrade_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense, id_planet, id_infrastructure_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type]);
    }   
    
    /**
     * @fn public function updateInfrastructure($id, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense)
    * @brief Mettre à jour une infrastructure.
    * @param $id L'id de l'infrastructure.
    * @param $level Le niveau de l'infrastructure.
    * @param $upgrade_time Le temps de construction de l'infrastructure.
    * @param $deuterium_cost Le coût en deutérium de l'infrastructure.
    * @param $energy_cost Le coût en énergie de l'infrastructure. 
    * @param $metal_cost Le coût en métal de l'infrastructure.
    * @param $deuterium_production La production de deutérium de l'infrastructure.
    * @param $energy_production La production d'énergie de l'infrastructure.
    * @param $metal_production La production de métal de l'infrastructure.
    * @param $attack L'attaque de l'infrastructure.
    * @param $defense La défense de l'infrastructure.
    */
    public function updateInfrastructure($id, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense){
        $sql = "UPDATE infrastructures SET level = ?, upgrade_time = ?, deuterium_cost = ?, energy_cost = ?, metal_cost = ?, deuterium_production = ?, energy_production = ?, metal_production = ?, attack = ?, defense = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense]);
    }

    
    /**
    * @fn public function getTotalDeuterium($id_planet)
    * @brief Obtenir le total de deutérium produits sur la planète.
    * @param $id_planet L'id de la planète.
    * @return $result Le total de deutérium produit sur la planète.
    */
    public function getTotalDeuterium($id_planet){
        $sql = "SELECT SUM(deuterium_production) as totalDeuterium FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }
    
    /**
    * @fn public function getTotalEnergy($id_planet)
    * @brief Obtenir le total d'énergie produit sur la planète.
    * @param $id_planet L'id de la planète.
    * @return $result Le total de énergie produit sur la planète.
    */
    public function getTotalEnergy($id_planet){
        $sql = "SELECT SUM(energy_production) as totalEnergy FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }
    
    /**
    * @fn public function getTotalMetal($id_planet)
    * @brief Obtenir le total de métaux produits sur la planète.
    * @param $id_planet L'id de la planète.
    * @return $result Le total de métaux produits sur la planète.
    */
    public function getTotalMetal($id_planet){
        $sql = "SELECT SUM(metal_production) as totalMetal FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }
    
    /**
    * @fn public function getTotalInfrastructureLevels($id_planet)
    * @brief Obtenir le niveau total des infrastructures de la planète.
    * @param $id_planet
    * @return $result Le niveau total des infrastructures de la planète.
    */
    public function getTotalInfrastructureLevels($id_planet){
        $sql = "SELECT SUM(level) as totalInfrastructureLevels FROM infrastructures WHERE id_planet = ? AND defense > 0";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }
}