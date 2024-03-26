<?php

require_once dirname(__DIR__) .'/../connection.php';
require_once dirname(__DIR__) . '/models/color.php';

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
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $r = $stmt->fetchObject();

        return new ColorModel($r->id, $r->name);
    }

    public function getAllColors()
    {
        $records = $this->dbConnection->query("SELECT * FROM colors");    

        $colorsModels = [];

        foreach($records as $r) {
            $m = new ColorModel($r->id, $r->name);
            array_push($colorsModels, $m);
        }

        return $colorsModels;
    }
}