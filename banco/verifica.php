<?php
session_start();
require_once('conexao.php');

$usuario = $_POST['usuario'];

if(isset($usuario) && isset($_POST['senha'])){  
    
$sql = $con->prepare("SELECT count(*) as qtd FROM tb_usuario WHERE usuario=:usuario AND senha= :senha");
$sql->execute(array("usuario" => $usuario  , "senha" => ($_POST['senha'])));
$result = $sql->fetch(PDO::FETCH_ASSOC);
print('teste');
print(implode($result));
}


if($result['qtd']==1) {
    $_SESSION['autenticado'] = $usuario;
    header("Location: ../admin/index.php");
  } else {
    print("erro");
    exit();
}

?>