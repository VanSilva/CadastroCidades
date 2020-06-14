<?php
    //iniciando sessao
	session_start();
  if(isset($_GET['acao']) && $_GET['acao']=='logout' || !isset($_SESSION['autenticado'])){
    unset($_SESSION['autenticado']);
    session_destroy();
  }

?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Login</title>
</head>

<body class="text-center" style="background-color: #f5f5f0;">
<div>
  <?php if (isset($mensagem)) { ?>
    <div class="alert alert-danger" role="alert">
    <?= $mensagem; ?>
  </div>
  <?php } ?>
  <div class="container col-md-3" style="margin-top: 70px;">
    <form class="form-signin" action="./banco/verifica.php" method="POST">
      <img class="mb-4" src="logo-upf.png" alt="" width="170" height="120">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input class="form-control" type="text" name="usuario" id="inputUsuario" placeholder="Usuario"  required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input class="form-control" type="password" name="senha" id="inputSenha" placeholder="Senha" required>
        <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
      <a href="index.php" type="button" class="btn btn-secondary btn-lg btn-block">Cancelar</a>
      <br>
    </form>
  </div>

</body>
</html>