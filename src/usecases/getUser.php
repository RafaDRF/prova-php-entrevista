<?php

require_once dirname(__DIR__) . '/infra/userRepository.php';

class GetUserById {

    public function run($id){
        $userRepository = new UserRepository();

        $user = $userRepository->getUserById($id);

        if (!$user) {
            return false;
        }

        $user->setColors($userRepository->getUserColors($user));
        return $user;
    }
}