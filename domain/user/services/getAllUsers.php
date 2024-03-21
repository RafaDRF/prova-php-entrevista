<?php

include_once 'domain/user/repository/userRepository.php';

class GetAllUsers {

    public function run(){
        $userRepository = new UserRespository();

        return $userRepository->getAllUsers();
    }
}