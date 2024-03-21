<?php

include_once '../../../connection.php';
include_once '../repository/userRepository.php';
include_once '../models/user.php';

class CreateUser {

    public function run($name, $email){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        $userModel = new UserModel(NULL, $name, $email);
        return $userRepository->createUser($userModel);
    }
}