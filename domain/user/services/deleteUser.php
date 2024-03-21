<?php

include_once '../repository/userRepository.php';

class DeleteUser {

    public function run($id){
        $userRepository = new UserRespository();

        $userToDelete = $userRepository.getUserById($id);

        if (!$userToDelete) {
            return false;
        }

        $userRepository->deleteUserById($userToDelete->id);
        return true;
    }
}