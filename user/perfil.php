<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=dsevice-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#343a40">
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
				<div class="">

					<img src="foto_perfil/<?php echo $info->foto; ?>" max-width="300px" max-height="300px" alt="perfil" class="img-thumbnail rounded">
					<!-- <img src="../img/foto-perfil.png" height="120px" width="120px"> -->

					<!-- Button trigger modal -->
					<div class="ml-1">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
							Atualizar foto
						</button>
						<a class="btn btn-secondary btn-sm" href="remov_foto.php?remov">Remover/Anônima</a>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<h5 class="modal-title" id="exampleModalLabel">Atualizar foto</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="editar_foto.php" method="post" enctype="multipart/form-data">
										<div class="form-group col">

											<div class="input-group ">
												<input class="btn rouded" name="arquivo" type="file" name="foto" id="">
												<input class="btn btn-info" type="submit" value="enviar">
											</div>

										</div>

									</form>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

								</div>
							</div>
						</div>
					</div>




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
						<button type="submit" class="btn btn-info conf" name="confirm">Salvar</button>
						<button type="reset" class="btn btn-danger conf" name="limpar">Desfazer</button>
						<!-------------------------------------------------------------------------------------------------------------->
					</div>
				</form>
				<?php fecharConexao($con); ?>

			</div>

		</div>

	</div>





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