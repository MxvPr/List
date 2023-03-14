<?php

// Connection à la base de données
class Database{
    private $bdd;
    
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=tasklist',"root","");
    }

    public function getBdd(){
        return $this->bdd;
    }

}