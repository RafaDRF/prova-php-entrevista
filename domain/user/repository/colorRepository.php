<?php
include_once 'connection.php';

class ColorRepository {

    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new Connection();
    }

    public function getColorById($id)
    {
        $sql = 'SELECT * FROM colors WHERE id = :id';
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindValue(':id', $id);
        
         return $stmt->execute();
    }
}