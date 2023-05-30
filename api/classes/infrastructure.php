<?php
include_once("database.php");

class Infrastructure extends Database {
        
    // Récupérer une infrastructure par son nom
    public function getInfrastructure($name){
        $sql = "SELECT * FROM infrastructures WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter une infrastructure et ses caractéristiques
    public function setInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type){
        $sql = "INSERT into infrastructures(name, level, upgrade_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense, id_planet, id_infrastructure_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type]);
    }
    
    // Modifier les caractéristiques d'une infrastructure
    public function updateInfrastructure($name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type){
        $sql = "UPDATE infrastructures SET name = ?, level = ?, upgrade_time = ?, deuterium_cost = ?, energy_cost = ?, metal_cost = ?, deuterium_production = ?, energy_production = ?, metal_production = ?, attack = ?, defense = ?, id_planet = ?, id_infrastructure_type = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $level, $upgrade_time, $deuterium_cost, $energy_cost, $metal_cost, $deuterium_production, $energy_production, $metal_production, $attack, $defense, $id_planet, $id_infrastructure_type]);
    }

    // Récupérer la production totale de Deuterium par planète
    public function getTotalDeuterium($id_planet){
        $sql = "SELECT SUM(deuterium_production) as totalDeuterium FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer la production totale d'Energie par planète
    public function getTotalEnergy($id_planet){
        $sql = "SELECT SUM(energy_production) as totalEnergy FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer la production totale de Metal par planète
    public function getTotalMetal($id_planet){
        $sql = "SELECT SUM(metal_production) as totalMetal FROM infrastructures WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }

    // Récupérer le niveau total des infrastructures de la planète (hors systèmes de défense)
    public function getTotalInfrastructureLevels($id_planet){
        $sql = "SELECT SUM(level) as totalInfrastructureLevels FROM infrastructures WHERE id_planet = ? AND defense > 0";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchColumn();
        return $result;
    }
}