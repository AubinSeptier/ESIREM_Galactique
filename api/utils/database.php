<?php

class Database {
    private $host = "localhost";
    private $dbName = "esirem_galactique";
    private $user = "root";
    private $password = "";
    private $db;

    protected function connect(){
        $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->user, $this->password);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->db;
    }

    public function disconnect(){
        $this->db = null;
    }
}