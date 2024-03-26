<?php
require_once dirname(__DIR__) . '/infra/userRepository.php';

class GetUserColors {

    public function run($id){
        $colorRepository = new UserRepository();

        $user = $userRepository->getUserById($id);

        if (!$user) {
            return false;
        }

        return $colorRepository->getUserColors($user);
    }
}
