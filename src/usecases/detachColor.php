<?php

require_once dirname(__DIR__) . '/infra/userRepository.php';
require_once dirname(__DIR__) . '/infra/colorRepository.php';

class DetachColor {

    public function run($userId, $colorId){
        $userRepository = new UserRepository;
        $colorRepository = new ColorRepository;

        $user = $userRepository->getUserById($userId);
        $colorToAttach = $colorRepository->getColorById($colorId);

        if (!$user || !$colorToAttach) {
            return false;
        }

        $userRepository->detachColor($user->id, $colorToAttach->id);
        return true;
    }
}
