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

$d = filter_input_array(INPUT_POST);

if(isset($_POST['create'])){

    $createUser = new CreateUser;
    $createUser->run($d['name'], $d['email']);
    
    header("Location: ../../index.php");
}
