<?php

session_start();

if (!isset($_SESSION['autenticado'])) {
  header('Location: ../login.php');
}

require_once "../banco/conexao.php";

$sql  = "SELECT * FROM tb_cidade;";
$query = $con->query($sql);
$lista_cidades = $query->fetchAll();

$sql = "SELECT * FROM tb_regiao;";
$query = $con->query($sql);
$lista_regiao = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Área do Administrador</title>
</head>

<body class="text-center" style="background-color: #f5f5f0;">
  <?php
  if (isset($registro)) {
    $acao = "manCidade.php?acao=atualizar&id_cidade="
      . $registro['id_cidade'];
  } else {
    $acao = "manCidade.php?acao=create";
  }
  ?>

  <div class="container col-md-5" style="margin-top: 70px; ">
    <form action="<?= $acao; ?>" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Cadastrar Cidade</h1>

      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control form-control-lg" name="nome" required autofocus value="<?php if (isset($registro)) echo $registro['nome']; ?>"> <br>
      </div>

      <div class="form-group">
        <label>População</label>
        <input type="number" class="form-control form-control-lg" name="populacao" required value="<?php if (isset($registro)) echo $registro['populacao']; ?>"> <br>
      </div>

      <label>Selecione a região:</label>
      <select class="form-control form-control-lg" name="id_regiao">
        <?php foreach ($lista_regiao as $regiao) : ?>
          <?php $id_regiao = $regiao['id_regiao'] ?>
          <option value="<?php echo $regiao['id_regiao']; ?>">
            <?php echo "Região " ?>
            <?php echo $regiao['nome']; ?>
          </option>
        <?php endforeach ?>
      </select>
      <br>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Editar">
      <a href="index.php" class="btn btn-secondary btn-lg btn-block">Cancelar</a>

    </form>
  </div>
</body>

</html>