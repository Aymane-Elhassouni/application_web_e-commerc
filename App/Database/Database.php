<?php
namespace App\Database;
use PDO;
use PDOException;
class Database{
    private $dsname = "mysql:host=localhost;dbname=gestionorders;";
    private PDO $pdo;
    public function __construct(){
        try{
            $this->pdo = new PDO($this->dsname,'root','');
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function connection(){
        return $this->pdo;
    }
    
}