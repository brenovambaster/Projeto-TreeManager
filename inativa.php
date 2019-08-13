<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/inativa.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title> Administrador - Inativar Usuário </title>
    
  </head>
  <body>
	<div class="top-total">
	<div class="sair">
				<a class="exit opc" href="index.php"><img src="img/sair.png" height="30px" width="30px"> Sair </a>
			</div>
    <div class="menu">
		<div class="top-total">
            <!-- div top-total. DIV para todo o topo do site
			-->
			
                <div class="title">
                    <h1> Inativar Usuário </h1>
                </div>
				<nav class="navbar navbar-expand-lg ">
				<!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <a class="navbar-brand" href="#">
							<img src="img/menu.png" alt="Menu">						
                            <a  class="navbar-brand" href="#" > <b>Menu</b>  </a>
                        </a>
                    </button>
                <div class="collapse navbar-collapse justify-content-center hovermouse " id="collapsibleNavbar">  
                    <ul class="nav nav-pills navbar-nav">
                        <li class="nav-item">
						
                            <a class="nav-link opc" href="CadastroUso.php" > <img src="img/add_user.png" height="30px" width="30px">Adicionar Usuário</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ap" href="inativa.php"> <img src="img/inativa_user.png" height="30px" width="30px">Inativar Usuário</a>
                        </li>
                    </ul>
				</div>
                </div>
				</nav>
		</div>
	</div>
	<div class="conteudo rounded border border-secondary mt-3 col-md-3 col-sm-3">
	<form>
		<div class="row">
			<div class="col-md-6 ">
				<div class="pt-3">
					<b>Pesquise o Usuário:</b> 
				</div>
			</div>
			
			<div class="col-md-6 ">
				<select name="busca_usuario" class="form-control" id="busca_usuario" title="Usuários">
					<option value="#">Selecione</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
					<option value="#">Usuário</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<button  type="button" class="btn btn-success btn-block spc" name="inativar">Inativar Usuário</button>
			</div>
		</div>
	</div>
	</form>
        <div class="rodape text-center">
            <h2> Rodapé da pagina </h2>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>