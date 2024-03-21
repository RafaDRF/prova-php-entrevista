<?php

include_once '../repository/userRepository.php';
include_once '../models/user.php';
include_once '../models/color.php';

class AttachColor {

    public function run($name, $email){
        $connection = new Connection();
        $userRepository = new UserRespository($connection);

        $user = new UserModel(NULL, $name, $email);
        $color = new ColorModel($name);

        return $userRepository->attachColor($user, $color);
    }
}