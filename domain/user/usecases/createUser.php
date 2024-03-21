<?php

include_once '../repository/userRepository.php';
include_once '../models/user.php';

class CreateUser {

    public function run($name, $email){
        $userRepository = new UserRepository();

        $userModel = new UserModel(NULL, $name, $email);
        return $userRepository->createUser($userModel);
    }
}