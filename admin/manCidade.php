<?php

require_once "../banco/conexao.php";
$acao = $_GET['acao'];

if ($acao == "update") {

  $sql  = "SELECT * FROM tb_cidade WHERE id_cidade=:id";
  $query = $con->prepare($sql);
  $params = array('id' => $_GET['id']);
  $r = $query->execute($params);
  
  if ($r == false) {
    echo "Erro ao tentar recuperar os dados";
    die();
  }

  $registro = $query->fetch();
  require "./editCidade.php";

} elseif ($acao == "atualizar") {

  $sql = "UPDATE tb_cidade SET nome=:nome, populacao=:populacao, id_regiao=:id_regiao WHERE id_cidade=:id_cidade";
  $query = $con->prepare($sql);
  $registro = $_POST;
  $registro['id_cidade'] = $_GET['id_cidade'];

  $r = $query->execute($registro);
  
  if ($r == true) {
    header("Location:index.php");
    return;
  } else {
    echo "Erro ao tentar atualizar os dados";
  }

} elseif ($acao == "delete") {

  $id = $_GET['id'];
  $sql = "DELETE FROM tb_cidade WHERE id_cidade= :id";
  $query = $con->prepare($sql);
  $r = $query->execute(array('id' => $id));
  
  if ($r == true) { 
    header("Location:index.php");
    return;
  } else {
    echo "Erro ao tentar excluir os dados";
  }

} elseif ($acao == "create") {

  $cidade = $_POST;

  $sql = "INSERT INTO tb_cidade(id_regiao, nome, populacao) VALUES(:id_regiao, :nome, :populacao)";
  $query = $con->prepare($sql);
  $r = $query->execute($cidade);
  
  if ($r == true) {
    header("Location:index.php");
    return;
  } else {
    //print(pg_errormessage($con));
      echo "Não foi possível cadastrar";
  }
}