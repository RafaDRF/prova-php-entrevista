<?php

require_once dirname(__DIR__) .'/../connection.php';
require_once dirname(__DIR__) . '/models/user.php';
require_once dirname(__DIR__) . '/models/color.php';
require_once dirname(__DIR__) . '/infra/colorRepository.php';

class UserRepository {

    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new Connection();
    }

    public function getAllUsers()
    {
        $records = $this->dbConnection->query("SELECT * FROM users");    

        $usersModels = [];

        foreach($records as $r) {
            $m = new UserModel($r->id, $r->name, $r->email);
            
            $m->setColors($this->getUserColors($m));
            array_push($usersModels, $m);
        }

        return $usersModels;
    }

    public function getUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $r = $stmt->fetchObject();

        return new UserModel($r->id, $r->name, $r->email);
    }

    public function deleteUser($userModel){
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':id', $userModel->getId());
        $stmt->execute();

        $sql = 'DELETE FROM user_colors WHERE user_id = :id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':id', $userModel->getId());
        $stmt->execute();

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
    }

    public function updateUser($userModel)
    {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->dbConnection->prepare($sql);

        $stmt->bindValue(':id', $userModel->getId());
        $stmt->bindValue(':name', $userModel->getName());
        $stmt->bindValue(':email', $userModel->getEmail());
        $stmt->execute();

         return true;
    }

    public function getUserColors($userModel)
    {
        $sql = 'SELECT * FROM user_colors WHERE user_id = :id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':id', $userModel->getId());
        $stmt->execute();
        $colors_ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);

        $colorRepository = new ColorRepository;
        $colorsModels = [];

        foreach($colors_ids as $colorId) {
            array_push($colorsModels, $colorRepository->getColorById($colorId));
        }

        return $colorsModels;
    }

    public function attachColor($userModel, $colorModel)
    {
        $sql = 'INSERT INTO user_colors(color_id, user_id) VALUES(:color_id, :user_id)';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':color_id', $colorModel->getId());
        $stmt->bindValue(':user_id', $userModel->getId());
        $stmt->execute();
    }

    public function detachColor($userModel, $colorModel)
    {
        $sql = 'DELETE FROM user_colors WHERE user_id = :user_id AND color_id = :color_id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':color_id', $colorModel->getId());
        $stmt->bindValue(':user_id', $userModel->getId());
        $stmt->execute();
    }
}