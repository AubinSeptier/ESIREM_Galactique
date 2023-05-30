<?php

class Database {
    private $dbHost = "localhost";
    private $dbName = "esirem_galactique";
    private $dbUser = "root";
    private $dbPassword = "";
    private $db;

    // Se connecter à la base de données
    protected function connect(){
        $this->db = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPassword);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->db;
    }

    // Se déconnecter de la base de données
    public function disconnect(){
        $this->db = null;
    }
}