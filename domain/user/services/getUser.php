<?php

include_once '../../../connection.php';
include_once '../repository/userRepository.php';

class GetUserById {

    public function run($id){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        $user = $userRepository.getUserById($id);

        if (!$user) {
            return false;
        }

        return $user;
    }
}