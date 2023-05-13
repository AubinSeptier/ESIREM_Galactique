<?php

class Database {
    private $dbHost = "localhost";
    private $dbName = "esirem_galactique";
    private $dbUser = "root";
    private $dbPassword = "";
    private $db;

    protected function connect(){
        $this->db = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPassword);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->db;
    }

    public function disconnect(){
        $this->db = null;
    }
}