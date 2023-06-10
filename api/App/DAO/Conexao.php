<?php 

namespace App\DAO;

abstract class Conexao{
    
    protected $pdo;

    public function __construct(){        
        
        $host = "localhost";
        $dbname = "crud_react";
        $port = "3306";
        $user = "root";
        $pass = "";

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}