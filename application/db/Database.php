<?php

class Database extends PDO {

    private $host = 'localhost';
    private $db   = 'beejee';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';
    
    private $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    function __construct()
    {
        
    }

    function getDb() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        return new PDO($dsn, $this->user, $this->pass, $this->opt);
    }

}