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

        $userRepository->detachColor($user, $colorToAttach);
        return true;
    }
}

$d = filter_input_array(INPUT_POST);

if(isset($_POST['detachcolor'])){

    $createUser = new DetachColor;
    $createUser->run($d['userId'], $d['colorId']);
    
    header('Location: ../pages/user-colors-view.php?id='.$d["userId"]);
}