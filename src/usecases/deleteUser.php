<?php

require_once dirname(__DIR__) . '/infra/userRepository.php';

class DeleteUser {

    public function run($id){
        $userRepository = new UserRepository();

        $userToDelete = $userRepository->getUserById($id);

        if (!$userToDelete) {
            return false;
        }

        $userRepository->deleteUser($userToDelete);
        return true;
    }
}
