<?php
require_once dirname(__DIR__) . '/infra/colorRepository.php';

class GetAllColors {

    public function run(){
        $colorRepository = new ColorRepository();

        return $colorRepository->getAllColors();
    }
}
