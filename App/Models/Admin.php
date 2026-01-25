<?php
namespace App\Models;
use PDO;
class Admin extends User{
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    

    public function save($firstname, $lastname, $email, $password) {
        $sql = 'INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $password]);
        $adminId = $this->connection->lastInsertId();
        $stmtAdmin = $this->connection->prepare('INSERT INTO admin (id) VALUES (?)');
        $stmtAdmin->execute([$adminId]);

        return $adminId;
    }


    public function toArray() {
        return [
            'id'            => $this->id,
            'firstname'     => $this->firstname,
            'lastname'      => $this->lastname,
            'email'         => $this->email,
            'password'      => $this->password,
            'role'          => $this->role
        ];
    }

}