<?php
/**
 * @file database.php
 * @details Ce fichier contient la classe Database qui est utilisée pour se connecter à la base de données.
 */

class Database {
    private $dbHost = "localhost";
    private $dbName = "esirem_galactique";
    private $dbUser = "root";
    private $dbPassword = "";
    private $db;

    /**
    * @fn protected function connect()
    * @brief Se connecte à la base de données.
    * @return db Renvoie un objet PDO pour la connexion à la base de données.
    */
    protected function connect(){
        $this->db = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPassword);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->db;
    }

    /**
    * @fn protected function disconnect()
    * @brief Se déconnecte de la base de données.
    */
    public function disconnect(){
        $this->db = null;
    }
}