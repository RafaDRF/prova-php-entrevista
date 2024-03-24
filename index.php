<?php

include_once "src/usecases/getAllUsers.php";
include_once "src/usecases/getUser.php";

$getAllUsers = new GetAllUsers;
$getUser = new GetUserById;

$users = $getAllUsers->run();
$uniqueUser = $getUser->run(1);

echo "<table border='1'>

    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
        <th>Ação</th>    
    </tr>
";

foreach($users as $user) {

    echo sprintf('<tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>
                           <a href="/edit">Editar</a>
    
                           <form action="src/usecases/deleteUser.php" method="POST">
                                <input type="hidden" name="id" value="%s" required/>
                                <button type="submit">Excluir</button>
                           </form>
                      </td>
                   </tr>',
        $user->id, $user->name, $user->email,$user->id);

}

echo "</table>";

echo  sprintf("$uniqueUser->id, $uniqueUser->name, $uniqueUser->email)");

echo '<form action="src/usecases/createUser.php" method="POST">
        <div>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="" autofocus required />
            </div>
            <div >
                <label>Email</label>
                <input type="text" name="email" value="" required />
            </div>
        </div>
        <div>
            <br>
            <button type="submit" name="create">Cadastrar</button>
        </div>
</form>';

echo '<form action="src/usecases/updateUser.php" method="POST">
        <div>
            <div>
                <label>ID</label>
                <input type="text" name="id" value="" autofocus required />
            </div>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="" autofocus required />
            </div>
            <div >
                <label>Email</label>
                <input type="text" name="email" value="" required />
            </div>
        </div>
        <div>
            <br>
            <button type="submit" name="create">Atualizar</button>
        </div>
</form>';
