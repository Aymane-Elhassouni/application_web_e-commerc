<?php
namespace App\Models;
use App\Database\Database;
use PDO;
abstract class User{
    protected int $id;
    protected string $firstname ;
    protected string $lastname  ;
    protected string $email ;
    protected string $password  ;
    protected string $role  ;
    protected PDO $connection;
    public function __construct(){
        $connection = new Database();
        $this->connection = $connection->connection();
    }
    public function getId(){
        return $this->id;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
 
    public function getLastname(){
        return $this->lastname;
    }

    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getRole(){
        return $this->role;
    }

    public function findByEmail(string $email){
        $sql = "SELECT u.id,u.firstname,u.lastname,
        u.email,u.password,CASE WHEN a.id IS NOT NULL THEN 'admin' ELSE 'client' END AS role
        FROM users u LEFT JOIN admin a ON u.id = a.id
        LEFT JOIN clients c ON u.id = c.id
        WHERE (a.id IS NOT NULL OR c.id IS NOT NULL)
        AND email = :email";
        $stmt =$this->connection->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS,static::class);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }
} 