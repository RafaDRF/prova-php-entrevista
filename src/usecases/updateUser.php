<?php

require_once dirname(__DIR__) . '/models/user.php';
require_once dirname(__DIR__) . '/infra/userRepository.php';

class UpdateUser {

    public function run($id, $name, $email){
        $userRepository = new UserRepository();

        $userToUpdate = $userRepository->getUserById($id);

        if (!$userToUpdate) {
            return false;
        }

        $userModel = new UserModel($id, $name, $email);        

        $userRepository->updateUser($userModel);
        return true;
    }
}
