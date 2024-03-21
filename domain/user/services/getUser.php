<?php

include_once '../repository/userRepository.php';

class GetUserById {

    public function run($id){
        $userRepository = new UserRespository();

        $user = $userRepository.getUserById($id);

        if (!$user) {
            return false;
        }

        return $user;
    }
}