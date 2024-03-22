<?php

require_once dirname(__DIR__) . '/infra/userRepository.php';

class GetAllUsers {

    public function run(){
        $userRepository = new UserRepository();

        return $userRepository->getAllUsers();
    }
}