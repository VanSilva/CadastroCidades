<!DOCTYPE html>
<?php
session_start();
require_once('../banco/conexao.php');
$sql  = "SELECT * FROM tb_cidade 
-- as c
-- INNER JOIN tb_regiao as r ON c.id_cidade = r.id_regiao";

$query = $con->query($sql);
$lista_cidade = $query->FetchAll();
?>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <title>Área do Administrador</title>
</head>

<body>
  <li class="nav-item">
    <a class="nav-link js-scroll active" href="../sair.php">Sair</a>
  </li>
  <a href="cadCidade.php" class="btn btn-primary" role="button">Cadastrar nova cidade</a>
  <div>
    <?php foreach ($lista_cidade as $cidade) : $id = $cidade['id_cidade']; ?>

    <div>
      <?= $cidade['nome']; ?>
    </div>
    <div>
      <?= $cidade['populacao']; ?>
    </div>
    <div>
      <?= $cidade['id_regiao']; ?>
    </div>

    <a href="manCidade.php?acao=update&id=<?= $id; ?>">Editar</a>
    <a href="manCidade.php?acao=delete&id=<?= $id; ?>">Excluir</a>
    <?php endforeach ?>
  </div>

  <script src="../lib/js/bootstrap.bundle.min.js"></script>
</body>
</html>