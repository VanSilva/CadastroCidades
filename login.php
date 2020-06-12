<?php
    //iniciando sessao
	session_start();
  if(isset($_GET['acao']) && $_GET['acao']=='logout' || !isset($_SESSION['autenticado'])){
    unset($_SESSION['autenticado']);
    session_destroy();
  }

  require_once('./banco/conexao.php');
  if(isset($_POST['usuario']) && isset($_POST['senha'])){
      
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);
        
    $sql = $con->prepare("SELECT count(*) as qtd FROM usuario WHERE usuario=:usuario AND senha= :senha");
    $sql->execute(array("usuario" => $usuario  , "senha" => md5($_POST['senha'])));
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    

    if($result['qtd']==1){
      $_SESSION['autenticado'] = $usuario; 
      $_SESSION['dados'] = ["dados"=> $result]; // pega todos os dados do user e joga na sessao dados
      header('Location: ./admin/index.php');
    }else{
      $mensagem = "Usuário/Senha Incorretos";
    }
  }
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <title>Bem-vindo!</title>
</head>

<body>
<div>
  <?php if (isset($mensagem)) { ?>
    <div class="alert alert-danger" role="alert">
    <?= $mensagem; ?>
  </div>
  <?php } ?>

  <form action="./banco/verifica.php" method="POST">

    <div>
      <div>
        <label>Usuário</label>
      </div>
      <input type="text" name="usuario" id="inputUsuario" placeholder="Usuario"  required autofocus>
    </div>

    <div>
      <div>
        <label>Senha</label>
      </div>
      <input type="password" name="senha" id="inputSenha" placeholder="Senha" required>
    </div>

    <button type="submit">Acessar</button>
    <a href="index.php" type="button" class="btn btn-secondary btn-lg btn-block">Cancelar</a>
    <br>
  </form>
</div>

<!--  bootstrap  -->
  <script src="lib/js/bootstrap.min.js"></script>

</body>

</html>