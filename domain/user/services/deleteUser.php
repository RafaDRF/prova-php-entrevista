<?php

include_once '../../../connection.php';
include_once '../repository/userRepository.php';

class DeleteUser {

    public function run($id){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        $userToDelete = $userRepository.getUserById($id);

        if (!$userToDelete) {
            return false;
        }

        $userRepository->deleteUserById($userToDelete->id);
        return true;
    }
}