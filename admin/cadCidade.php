<?php
session_start();

if (!isset($_SESSION['autenticado'])) {
  header('Location: ../login.php');
}

require_once "../banco/conexao.php";

$sql = "SELECT * FROM tb_regiao;";
$query = $con->query($sql);
$lista_regiao = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <title>Bem-vindo!</title>
</head>
<body>
				
  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  if (isset($registro)) {
    $acao = "manCidade.php?acao=atualizar&id="
    . $registro['id_cidade'];
    } else {
    $acao = "manCidade.php?acao=create";
  }
  ?>

<div class="intro-content display-table">
   		<div class="table-cell">
     		<div class="container">

             <div id="cadCidade" class="alert alert-success" style="display: none;">
                Álbum Gravado com Sucesso
            </div>

				<?php
				if (isset($registro)) {
				$acao = "manCidade.php?acao=atualizar&id="
					. $registro['id'];
				} else {
				$acao = "manCidade.php?acao=create";
				}
				?>

				<form class="contactForm" action="<?= $acao; ?>" id="formulario" class="contact-form php-mail-form" method="POST" role="form" enctype="multipart/form-data">
					<div id="errormessage"></div>
					<div class="row">
						<div class="col-md-10 mb-10">

							<label>Nome</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php if (isset($registro))  echo $registro['nome']; ?>">
								<div class="validate"></div>
              </div>

              <label>População</label>
							<div class="form-group">
								<input type="text" class="form-control" id="populacao" name="populacao" placeholder="População" value="<?php if (isset($registro))  echo $registro['populacao']; ?>">
								<div class="validate"></div>
              </div>

              <label>Selecione o álbum que a foto ficará:</label>
              <div class="col-md-10 mb-10">
                <div class="form-group">
                  <select class="form-control" name="id_regiao">
                    
                  <?php foreach ($lista_regiao as $regiao) : ?>
                    <?php $id = $regiao['id_regiao'] ?>

                      <option class="text-black" value="<?php echo $regiao['id_regiao']; ?>">   
                        <?php echo "Região " ?>	
                        <?php echo $regiao['nome']; ?>
                      </option>
                  <?php endforeach ?>

                </div>
              </div>
						</div>
						<br>
						
          </div>
          <input type="submit" value="Cadastrar">
					

					<a href="index.php" class="btn btn-secondary">Cancelar</a>
				</form>
         	</div>
      	</div>
    </div>

	<script src="lib/js/bootstrap.bundle.min.js"></script>


</body>
</html>