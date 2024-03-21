<?php
include_once "../services/createUser.php";
include_once "../services/deleteUser.php";

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['create'])){

    $createUser = new CreateUser();
    $createUser->run($d['nome'], $d['email']);
    
    header("Location: ../../../index.php");
} elseif ($_POST['delete']) {
    $deleteUser = new DeleteUser();
    $deleteUser->run($d['id']);

    header("Location: ../../../index.php");
}
