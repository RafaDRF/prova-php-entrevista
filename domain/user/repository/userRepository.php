<?php

class UserRespository {

    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAllUsers()
    {
        return $this->dbConnection->query("SELECT * FROM users");
    }

    public function getUserById($id)
    {
        return true; // user model
    }

    public function deleteUserById($id){
        return true;
    }

    public function createUser($userModel)
    {
        $sql = 'INSERT INTO users(name, email) VALUES(:name, :email)';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':name', $userModel->getName());
        $stmt->bindValue(':email', $userModel->getEmail());
        $stmt->execute();

         return $this->dbConnection->lastInsertId();
    } // https://www.sqlitetutorial.net/sqlite-php/insert/
}