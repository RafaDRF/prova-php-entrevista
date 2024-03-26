<?php 

require_once dirname(__DIR__) . "/usecases/getAllColors.php";

$getAllColors = new GetAllColors;
$colors = $getAllColors->run();

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Gerenciar cores de  <?= $_GET['name']?></title>
</head>
<body>
  
<div class="container mt-4">
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gerenciar cores de  <?= $_GET['name']?>
                            <a href="../../index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($colors as $color)
                                 {
                                ?>
                                <tr>
                                    <td><?= $color->getName();?></td>
                                    <td><?= false ? 'vinculada' : 'não vinculada';?></td>
                                    <td>
                                        <?php
                                            if (false) {
                                        ?>
                                            <form action="../usecases/attachColor.php" method="POST" class="d-inline">
                                                <input type="hidden" name="colorId" value="<?=$color->getId();?>"></input>
                                                <input type="hidden" name="userId" value="<?=$_GET["id"];?>"></input>
                                                <button type="submit" name="attachcolor" class="btn btn-success btn-sm">Vincular</button>
                                            </form>
                                        <?php
                                            } else {
                                        ?>
                                            <form action="../usecases/detachColor.php" method="POST" class="d-inline">
                                                <input type="hidden" name="colorId" value="<?=$color->getId();?>"></input>
                                                <input type="hidden" name="userId" value="<?=$_GET["id"];?>"></input>
                                                <button type="submit" name="detachcolor" class="btn btn-danger btn-sm">Desvincular</button>
                                            </form>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
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