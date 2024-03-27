<?php

require_once dirname(__DIR__) . '/usecases/attachColor.php';
require_once dirname(__DIR__) . '/usecases/detachColor.php';

$d = filter_input_array(INPUT_POST);

if(isset($_POST['attachcolor'])){

    $action = new AttachColor;
    $action->run($d['userId'], $d['colorId']);
    
    header('Location: ../pages/user-colors-view.php?id='.$d["userId"]);
    
} else if(isset($_POST['detachcolor']))
{
    $action = new DetachColor;
    $action->run($d['userId'], $d['colorId']);
    
    header('Location: ../pages/user-colors-view.php?id='.$d["userId"]);
}