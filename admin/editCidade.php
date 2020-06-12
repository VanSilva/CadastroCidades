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
  <title>UpFotos</title>
</head>

<body>
  <?php
  if (isset($registro)) {
    $acao = "manCidade.php?acao=atualizar&id_cidade="
      . $registro['id_cidade'];
  } else {
    $acao = "manCidade.php?acao=create";
  }
  ?>

  <form action="<?= $acao; ?>" method="POST">

    <label>Nome</label>
    <input type="text" name="nome" value="<?php if (isset($registro)) echo $registro['nome']; ?>"> <br>
    <br>
    <label>População</label>
    <input type="number" name="populacao" value="<?php if (isset($registro)) echo $registro['populacao']; ?>"> <br>

    <select name="id_regiao">
      <?php foreach ($lista_regiao as $regiao) : ?>
        <?php $id_regiao = $regiao['id_regiao'] ?>

        <option value="<?php echo $regiao['id_regiao']; ?>">
          <?php echo "Região " ?>
          <?php echo $regiao['nome']; ?>
        </option>

      <?php endforeach ?>

      <input type="submit" value="Editar">
      <a href="index.php">Cancelar</a>
  </form>

</body>
</html>