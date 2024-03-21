<?php
include_once "../usecases/createUser.php";
include_once "../usecases/deleteUser.php";

$d = filter_input_array(INPUT_POST);

if(isset($_POST['create'])){

    $createUser = new CreateUser();
    $createUser->run($d['nome'], $d['email']);
    
    header("Location: ../../../index.php");
} elseif ($_POST['delete']) {
    $deleteUser = new DeleteUser();
    $deleteUser->run($d['id']);

    header("Location: ../../../index.php");
}
