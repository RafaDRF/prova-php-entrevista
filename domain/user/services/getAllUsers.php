<?php

include_once 'domain/user/repository/userRepository.php';

class GetAllUsers {

    public function run(){
        $userRepository = new UserRepository();

        return $userRepository->getAllUsers();
    }
}