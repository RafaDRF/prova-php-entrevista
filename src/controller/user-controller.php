<?php

require_once dirname(__DIR__) . '/usecases/attachColor.php';
require_once dirname(__DIR__) . '/usecases/detachColor.php';
require_once dirname(__DIR__) . '/usecases/createUser.php';
require_once dirname(__DIR__) . '/usecases/deleteUser.php';
require_once dirname(__DIR__) . '/usecases/updateUser.php';

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

} else if(isset($_POST['create-user'])){

    $action = new CreateUser;
    $action->run($d['name'], $d['email']);
    
    header("Location: ../../index.php");

} else if(isset($_POST['delete-user'])){

    $action = new DeleteUser;
    $action->run($d['id']);
    
    header("Location: ../../index.php");

} else if(isset($_POST['update-user'])){

    $action = new UpdateUser;
    $action->run($d['id'], $d['name'], $d['email']);
    
    header("Location: ../../index.php");
}