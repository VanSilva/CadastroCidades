<!DOCTYPE html>
<html lang="pt">
<?php
require_once('banco/conexao.php');
$sql  = "SELECT tb_regiao.nome AS tb_regiao, tb_cidade.* FROM tb_cidade
        INNER JOIN tb_regiao ON tb_regiao.id_regiao = tb_cidade.id_regiao";

$query = $con->query($sql);
$lista_cidade = $query->FetchAll();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Área do Administrador</title>
</head>

<body class="text-center" style="background-color: #f5f5f0;">

  <div class="container col-md-5" style="margin-top: 100px; ">
    <h1>Bem-vindo ao cadastro de cidades!</h1>
    <br>
    <br>
    <a href="login.php" class="btn btn-outline-info btn-lg btn-block">Área Administrativa</a>
    <a href="#cidades" class="btn btn-outline-info btn-lg btn-block">Ver cidades</a>
  </div>

  <div class="container" style="margin-top: 303px; margin-bottom: 350px;" id="cidades">
    <h2>Cidades</h2>
    <br>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">População</th>
          <th scope="col">Região</th>
        </tr>
      </thead>

      <?php foreach ($lista_cidade as $cidade) : $id = $cidade['id_cidade']; 
      ?>
        <tbody>
          <tr>
            <th scope="row"><?= $cidade['id_cidade']; ?></th>
            <td><?= $cidade['nome']; ?></td>
            <td><?= $cidade['populacao']; ?></td>
            <td><?= $cidade['tb_regiao']; ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>

</body>
</html>