<?php
require_once "src/usecases/getAllUsers.php";

$getAllUsers = new GetAllUsers;
$users = $getAllUsers->run();
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>CRUD de Usuário</title>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Usuários Cadastrados
                                <a href="src/pages/user-create.php" class="btn btn-primary float-end">Cadastrar Usuário</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                if(count($users) > 0)
                                {
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Cores</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($users as $user)
                                        {
                                    ?>
                                            <tr>
                                                <td><?= $user->getId(); ?></td>
                                                <td><?= $user->getName(); ?></td>
                                                <td><?= $user->getEmail(); ?></td>
                                                <td> 
                                                    <?php 
                                                    foreach($user->getColors() as $color)
                                                        {
                                                    ?>
                                                        <ul><?=$color->getName();?></ul> 
                                                        <?php
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <a href="src/pages/user-colors-view.php?id=<?= $user->getId(); ?>&name=<?= $user->getName(); ?>" class="btn btn-info btn-sm">Gerenciar Cores</a>
                                                    <a href="src/pages/user-edit.php?id=<?= $user->getId(); ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="src/usecases/deleteUser.php" method="POST" class="d-inline">
                                                        <button type="submit" name="id" value="<?=$user->getId();?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                            <?php
                                        }
                                }
                                else
                                {
                                    echo '<h5 class="d-flex justify-content-center" > Nenhum usuário cadastrado </h5>';
                                }
                            ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>