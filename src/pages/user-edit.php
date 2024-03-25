<?php 

require_once dirname(__DIR__) . "/usecases/getUser.php";

$GetUserById = new GetUserById;
$user = $GetUserById->run($_GET['id']);

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Editar Usuário</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Usuário
                            <a href="../../index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="../usecases/updateUser.php" method="POST">
                            <input type="hidden" name="id" value="<?= $user->getId() ?>">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" value="<?= $user->getName() ?>">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"  value="<?= $user->getEmail() ?>">
                            </div>
        
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>