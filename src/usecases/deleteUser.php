<?php

require_once dirname(__DIR__) . '/infra/userRepository.php';

class DeleteUser {

    public function run($id){
        $userRepository = new UserRepository();

        $userToDelete = $userRepository->getUserById($id);

        if (!$userToDelete) {
            return false;
        }

        $userRepository->deleteUserById($userToDelete->id);
        return true;
    }
}

$d = filter_input_array(INPUT_POST);

if(isset($_POST['id'])){

    $createUser = new DeleteUser;
    $createUser->run($d['id']);
    
    header("Location: ../../index.php");
}