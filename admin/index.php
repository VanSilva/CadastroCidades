<!DOCTYPE html>
<?php
session_start();
require_once('../banco/conexao.php');
$sql  = "SELECT tb_regiao.nome AS tb_regiao, tb_cidade.* FROM tb_cidade
        INNER JOIN tb_regiao ON tb_regiao.id_regiao = tb_cidade.id_regiao";

$query = $con->query($sql);
$lista_cidade = $query->FetchAll();
?>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Área do Administrador</title>
</head>

<body>
  <div class="container col-md-2" style="margin-top: 70px;">
    <a class="btn btn-danger" href="../sair.php">Sair</a>
  </div>
  <div class="container" style="margin-top: 70px;">
    <h2>Cadastro de Cidades</h2>
    <a href="cadCidade.php" class="btn btn-primary" role="button">Cadastrar nova cidade</a>
    <br>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">População</th>
          <th scope="col">Região</th>
          <th scope="col"></th>
          <th scope="col"></th>
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
            <td><a href="manCidade.php?acao=update&id=<?= $id; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path></svg></a></td>
            <td><a href="manCidade.php?acao=delete&id=<?= $id; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg></a></td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</body>
</html>