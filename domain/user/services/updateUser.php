<?php

include_once '../../../connection.php';
include_once '../repository/userRepository.php';
include_once '../models/user.php';

class UpdateUser {

    public function run($id, $name, $email){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        $userToUpdate = $userRepository.getUserById($id);

        if (!$userToUpdate) {
            return false;
        }

        $userModel = new UserModel($id, $name, $email);        

        $userRepository->updateUser($userModel);
        return true;
    }
}