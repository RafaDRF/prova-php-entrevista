<?php

class UserModel {

    private $id;
    private $name;
    private $email;
    private $colors = [];

    public function __construct($id, $name, $email){
        // $this->validateName($name);
        // $this->validateEmail($email);
        
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function getColors(){
        return $this->colors;
    }

    public function setColors($colors){
        $this->colors = $colors;
    }

    public function hasColor($color){
        return in_array($color, $this->colors);
    }

    private function validateName($name){

    }

    private function validateEmail($email){
        
    }
}