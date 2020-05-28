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

		<?php include('navbar.php');
		lerUrl();
		?>

	</div>
	<?php require_once('../00 - BD/bd_conexao.php');
	$id = $_SESSION['idUsu'];
	$sql = "SELECT * FROM usuario WHERE idUsuario =$id";

	$result = $con->query($sql) or die("Erro ao se conectar ao banco");
	$info = mysqli_fetch_object($result);


	?>



	<div class="container mt-5">
		<div class="row">
			<div class="col-md-3 mb-3">
				<div class=" ">

					<img src="../img/perfil.png" alt="..." max-height="10%" max-width="10%" class="img-thumbnail rounded">
					<!-- <img src="../img/foto-perfil.png" height="120px" width="120px"> -->

				</div>
			</div>

			<div class="col-md-7">
				<form action="EditarPerfil.php" method="post">
					<div class="form-group col-md-10  ">

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Name:</span>
							</div>
							<input type="text" class="form-control form-group " id="#" name="nome" value="<?php echo htmlspecialchars($info->nome); ?>" required="required"></input>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
							</div>
							<div class="custom-file">
								<input name="foto" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">E-mail:</span>
							</div>
							<input type="email" class="form-control form-group" id="#" name="email" value="<?php echo $info->email; ?>" required="required"></input>
						</div>
						<div class="input-group mb-3">
							<div class=" input-group-prepend">
								<span class="input-group-text" id="basic-addon1"> Phone:</span>
							</div>
							<input type="text" class="form-control  form-group" id="#" name="telefone" value="<?php echo $info->fone; ?>" required="required"></input>
						</div>
						<div class="input-group mb-3">

							<div class=" input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Password:</span>
							</div>
							<input type="password" class="form-control  form-group" id="#" name="senha" value="<?php echo $info->senha; ?>" required="required"></input>
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
<?php
function lerUrl()
{


	if (isset($_GET['userEdit'])) {
		echo '<script>alert("Usuário editado com sucesso.");</script>';
	}
	if (isset($_GET['userError'])) {
		echo '<script>alert("Erro ao editar Usuário.Tente novamente");</script>';
	} else {
	}
}

?>