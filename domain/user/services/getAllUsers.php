<?php

include_once 'connection.php';
include_once 'domain/user/repository/userRepository.php';

class GetAllUsers {

    public function run(){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        return $userRepository->getAllUsers();
    }
}