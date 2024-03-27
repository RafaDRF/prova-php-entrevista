<?php

require_once dirname(__DIR__) . '/models/user.php';
require_once dirname(__DIR__) . '/infra/userRepository.php';

class CreateUser {

    public function run($name, $email){
        $userRepository = new UserRepository;

        $userModel = new UserModel(NULL, $name, $email);
        return $userRepository->createUser($userModel);
    }
}
