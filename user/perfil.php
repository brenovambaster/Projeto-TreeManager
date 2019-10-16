<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=dsevice-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/perfil1.css">
	<?php
	include('iconeSite.php'); // ícone do site
	?>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title> Perfil de Usuário </title>


</head>

<body>

	<?php include('statusSession.php');   ?>


	<div class="top-total">
		<!-- div top-total. DIV para todo o topo do site
            -->

		<div class="menu">
			<h1> Perfil de Usuário </h1>
		</div>

		<?php include('navbar.php'); ?>

	</div>


	<div class="conteudo container-fluid d-flex  col-md-10 border-secondary mx-auto mt-3 row">

		<div class="foto col-md-2 mr-3   ">
			<img src="../img/foto-perfil.png" height="120px" width="120px">
		</div>
		<div class="conteudo   col-md-7 col-sm-10 ml-3 mt-1 ">
			<?php require_once('../00 - BD/bd_conexao.php');
			$id = $_SESSION['IdUsu'];
			$sql = "SELECT * FROM usuario WHERE IdUsu =$id";
			$result = $con->query($sql);
			$info = mysqli_fetch_object($result);


			?>
			<form action="EditarPerfil.php" method="post">
				<div class="form-group col-md-10  ">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Name:</span>
						</div>
						<input type="text" class="form-control form-group " id="#" name="nome" placeholder="<?php echo $info->Nome; ?>" required="required"></input>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">E-mail:</span>
						</div>
						<input type="text" class="form-control form-group" id="#" name="email" placeholder="<?php echo $info->Email; ?>" required="required"></input>
					</div>
					<div class="input-group mb-3">
						<div class=" input-group-prepend">
							<span class="input-group-text" id="basic-addon1"> Phone:</span>
						</div>
						<input type="text" class="form-control  form-group" id="#" name="telefone" placeholder="<?php echo $info->Telefone; ?>" required="required"></input>
					</div>
					<div class="input-group mb-3">

						<div class=" input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Password:</span>
						</div>
						<input type=" password" class="form-control  form-group" id="#" name="senha" placeholder="<?php echo $info->Senha; ?>" required="required"></input>
					</div>

					<!---------------------------- Criado butão editar e limpar de forma funcional---------------------------------->
					<button type="submit" class="btn btn-info conf" name="confirm">Editar</button>
					<button type="reset" class="btn btn-danger conf" name="limpar">Limpar</button>
					<!-------------------------------------------------------------------------------------------------------------->
				</div>
			</form>
			<?php fecharConexao($con); ?>
		</div>
	</div>
	<!--
	<div class="rodape fixed-bottom text-center">

		<h2> Rodapé da pagina </h2>
	</div>
	-->


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>