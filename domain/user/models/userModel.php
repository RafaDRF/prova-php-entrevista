<?php

class UserModel {

    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    private function validateName($name){

    }

    private function validateEmail($email){
        
    }
}