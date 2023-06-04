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
     * @brief Récupérer les informations d'une recherche spécifique à partir de son nom. 
     * @param $name Le nom de la recherche à récupérer.
     * @return $result Un tableau d'objets Research ou false si aucun n'a été trouvé.
     */
    public function getResearchByName($name){
        $sql = "SELECT * FROM researches WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @fn getResearchById($id_research_type, $id_empire)
     * @brief Récupérer les informations d'une recherche spécifique à partir de ses clés étrangères.
     * @param $id_research_type L'id du type de recherche à récupérer.
     * @param $id_empire L'id de l'empire auquel la recherche appartient.
     * @return $result Un tableau de données de la recherche ou false si aucun n'a été trouvé.
     */
    public function getResearchById($id_research_type, $id_empire){
        $sql = "SELECT * FROM researches WHERE id_research_type = ? AND id_empire = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_research_type, $id_empire]);
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
        $sql = "INSERT into researches(name, level, research_time, deuterium_cost, metal_cost, id_research_type, id_empire) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $level, $research_time, $deuterium_cost, $metal_cost, $id_research_type, $id_empire]);
    }

    public function updateResearch($level, $research_time, $deuterium_cost, $metal_cost, $id_research_type, $id_empire){
        $sql = "UPDATE researches SET level = ?, research_time = ?, deuterium_cost = ?, metal_cost = ? WHERE id_research_type = ? AND id_empire = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$level, $research_time, $deuterium_cost, $metal_cost, $id_research_type, $id_empire]);
    }
}