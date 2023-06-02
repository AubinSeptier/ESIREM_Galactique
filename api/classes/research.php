<?php
/**
 * @file research.php
 * @details Ce fichier contient la classe Research qui est utilisée pour gérer les recherches.
 */
include_once 'database.php';

// To complete

/**
 * @class Research
 * @brief Classe permettant de gérer les recherches.
 */
class Research extends Database {

    /**
     * @fn getResearch($name)
     * @brief Récupérer les informations d'une recherche spécifique. 
     * @param $name Le nom de la recherche à récupérer.
     * @return $result Un tableau d'objets Research ou false si aucun n'a été trouvé.
     */
    public function getResearch($name){
        $sql = "SELECT * FROM researches WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @fn setResearch($name, $level, $research_time, $deuterium_cost, $metal_cost, $empire)
     * @brief Définir une recherche pour un utilisateur.
     * @param $name Le nom de la recherche.
     * @param $level Le niveau de la recherche.
     * @param $research_time Le temps de recherche.
     * @param $deuterium_cost Le coût en deutérium de la recherche.
     * @param $metal_cost Le coût en métal de la recherche.
     * @param $id_empire L'empire auquel la recherche appartient.
     */
    public function setResearch($name, $level, $research_time, $deuterium_cost, $metal_cost, $id_research_type, $id_empire){
        $sql = "INSERT into researches(name, level, research_time, deuterium_cost, metal_cost, id_empire) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $level, $research_time, $deuterium_cost, $metal_cost, $id_empire]);
    }
}