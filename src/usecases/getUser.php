<?php

require_once 'src/infra/userRepository.php';

class GetUserById {

    public function run($id){
        $userRepository = new UserRepository();

        $user = $userRepository->getUserById($id);

        if (!$user) {
            return false;
        }

        return $user;
    }
}