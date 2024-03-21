<?php

require 'connection.php';
include_once "domain/user/services/getAllUsers.php";
include_once "domain/user/services/createUser.php";

$getAllUsers = new getAllUsers;
$createUser = new createUser;

$users = $getAllUsers->run();

echo "<table border='1'>

    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
        <th>Ação</th>    
    </tr>
";

foreach($users as $user) {

    echo sprintf("<tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>
                           <a href='/edit'>Editar</a>
                           <a href='domain/user/controller/userController.php?delete=$user->id?>'>Excluir</a>
                      </td>
                   </tr>",
        $user->id, $user->name, $user->email);

}

echo "</table>";

echo '<form action="domain/user/controller/userController.php" method="POST">
        <div>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="" autofocus require />
            </div>
            <div >
                <label>Email</label>
                <input type="text" name="email" value="" require />
            </div>
        </div>
        <div>
            <br>
            <button type="submit" name="create">Cadastrar</button>
        </div>
</form>';