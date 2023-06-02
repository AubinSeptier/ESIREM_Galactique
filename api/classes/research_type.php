<?php
/**
 * @class Research_Type
 * @brief Classe permettant de gérer les types de recherche.
 */
include_once("database.php");

class Research_Type extends Database {
    /**
    * @fn getResearchType($name)
    * @brief Obtenir les données sur un type de recherche.
    * @param $name Le nom du type de recherche à récupérer.
    * @return $result Un tableau d'informations sur le type ou false si le type n'a pas été trouvé
    */
    public function getResearchType($name){
        $sql = "SELECT * FROM research_types WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn setResearch_Type($name, $research_type, $deuterium_cost, $metal_cost)
    * @brief Définir le type de recherche pour un utilisateur. 
    * @param $name Le nom du type de recherche.
    * @param $research_type Le type de recherche.
    * @param $deuterium_cost Le coût en deutérium de la recherche.
    * @param $metal_cost Le coût en métal de la recherche.
    */
    public function setResearch_Type($name, $research_type, $deuterium_cost, $metal_cost){
        $sql = "INSERT into research_types(name, research_type, deuterium_cost, metal_cost) VALUES (?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $research_type, $deuterium_cost, $metal_cost]);
    }

}