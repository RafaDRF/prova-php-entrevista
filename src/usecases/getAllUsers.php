<?php

require_once 'src/infra/userRepository.php';

class GetAllUsers {

    public function run(){
        $userRepository = new UserRepository();

        return $userRepository->getAllUsers();
    }
}