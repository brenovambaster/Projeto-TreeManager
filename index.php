<?php 
session_start();
if(!isset($_SESSION['validarSessao'])){
	setcookie(session_name(), '', time() - 60*60*24*30, '/');
	session_destroy();
	$painel = 'user/index.php';
}else $painel = 'user/perfil.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title> Arborização Urbana em Salinas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#312b2be1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/css_index.css">
	<!--	============================================================================================ -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
	
	<section class="menuNavegacao" style="min-height: 185px; background-color: #343a40;">
		<div class="text-center text-light">
			<h1>Controle da arborização urbana em Salinas</h1> <br>
			
		</div>



		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span> <img src="img/menu.png" alt="home" height="30px" width="30px"></span>
				<span class="navbar-brand" href="#"> Menu</span>

			</button>


			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

				<ul class="navbar-nav mx-auto mt-2 mt-lg-0 ">
					<li class="nav-item active">
						<a class="nav-link" href="index.php"><img src="img/home1.png" alt="home" height="30px" width="30px"> Home </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#conheca_projeto"><img src="img/conheca_projeto.png" alt="erroImg" height="30px" width="30px"> Conheça sobre o projeto</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link " href="#veja_arvores_cadastradas"> <img src="img/cadastro.png" alt="cadastro" height="30px" width="30px"> Veja as árvores já cadastradas</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link " href="#contato"> <img src="img/fone.png" alt="cont" height="30px" width="30px"> Contato</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link " 
						href="<?php echo $painel; ?>"> 
						<img src="img/perfil.png" alt="cont" height="30px" width="30px"> login</a>
					</li>

				</ul>
			</div>
		</nav>


	</section>

	<section class="imgs-carosel">


		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="imgs-banners/banner.jpg" class="d-block" height="400px"  alt="...">
				</div>
				<div class="carousel-item">
					<img src="imgs-banners/banner-2.jpg" class="d-block" height="400px" alt="...">
				</div>
				<div class="carousel-item">
					<img src="imgs-banners/banner-3.jpg" class="d-block" height="400px" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
	<section class="conheca_projeto" id="conheca_projeto">	
		<div class="container">
			<div class="">
				<h2 class="text-center">Conheça sobre o projeto</h2>	
				<p class="text-justify">
				O “Controle do Manejo e Monitoramento da Arborização Urbana em Salinas”, é um projeto elaborado por um grupo de alunos do curso Técnico de Informática- Campus Salinas. O projeto teve início com um pedido de Alunos do curso superior de Engenharia Florestal-Campus Salinas, para que fizesse um site no qual permita fazer o cadastro das árvores de salinas, e assim foi feito.</p>	
				<p class="text-justify">
					O objetivo geral do site é auxiliar no controle das árvores em Salinas, fazendo o cadastro e disponibilizando as informações necessárias e específicas das mesmas. O intuito é agilizar o cadastro e o processamento do dados, para que assim pessoas responsáveis pelo projeto possam ter uma maior eficácia no monitoramento das árvores. Ainda assim tendo objetivos mais específicos como, Identificar árvores que precisam de cuidados como árvores em estados de calamidade, árvores que precisam de podas, testemunhar a flora arbórea em Salinas e fazer o levantamento de espécies abundantes e escassas em Salinas.
				</p>
			</div>
		</div>


	</section>



	<section class="section-3" id="">
		<div class="container mt-4">

			<div class="row row-cols-1 row-cols-md-3 justify-content-center container ml-3" style="margin-top:10%;">
				<div class="col-md-4 mb-4 wow fadeIn">
					<div class="card shadow rounded">
						<img class="card-img-top" src="salinas/museu_salinas_01.jpg" alt="Imagem de capa do card">
						<div class="card-body">
							<h5 class="card-title"><strong class="text-danger"> 01.</strong>Museu da cachaça</h5>
							<span>Conheça Salinas</span>
							<p class="card-text text-preto">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 mb-4 wow fadeIn">
					<div class="card shadow rounded">
						<img class="card-img-top" src="salinas/museu_salinas_03.jpg" alt="Imagem de capa do card">
						<div class="card-body">
							<h5 class="card-title"><strong class="text-primary"> 02.</strong> Alguma outra informação</h5>
							<p class="card-text text-preto">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>

						</div>
					</div>
				</div>

				<div class="col-md-4 mb-4">
					<div class="card shadow rounded wow fadeIn">
						<img class="card-img-top"  src="salinas/ifnmg_logo.jpg" alt="Imagem de capa do card">
						<div class="card-body">
							<h5 class="card-title"><strong class="text-success"> 03.</strong>IFNMG Campus Salinas </h5>
							<h6 class="card-subtitle mb-2  text-success">O que é?</h6>
							<p class="card-text text-preto">um texto qualquer para apresentar funcionalidades
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contato" id="contato">
		<div class="container" style="margin-top:10%;">
			<h2 class=" text-success text-center tit"> Fale conosco...</h2>
			<form action="" method="GET" class="offset-md-3 col-md-10 wow slideInLeft ">

				<div class="form-group">
					<label for="InputNome">Seu nome:</label>
					<input type="name" required class="form-control shadow rounded col-md-7" id="InputNome" aria-describedby="nameHelp">

				</div>
				<div class="form-group">
					<label for="InputEmail">E-mail:</label>
					<input type="email" required class="form-control shadow rounded col-md-7" aria-describedby="emailHelp" id="InputEmail">
				</div>
				<div class="form-group">
					<label for="InputFone">Telefone:</label>
					<input type="phone" required class="form-control shadow rounded col-md-7" id="InputFone">

				</div>
				<div class="form-group">
					<label for="InputCity">Cidade:</label>
					<input type="city" class="form-control shadow rounded col-md-7" id="InputCity">

				</div>
				<div class="form-group ">
					<label for="mensagem">Mensagem:</label>
					<textarea class="form-control col-md-7 shadow rounded" required id="mensagem" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary mb-3">Enviar</button>
			</form>
		</div>
	</section>

	<section>
		<div id="veja_arvores_cadastradas">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.2894881429465!2d-42.311307231264074!3d-16.157172937397245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x74debf0b63fd265%3A0xd64db0172cd62beb!2sIFNMG+-+Instituto+Federal+do+Norte+de+Minas+Gerais%2C+Campus+Salinas!5e1!3m2!1spt-BR!2sbr!4v1562761986425!5m2!1spt-BR!2sbr" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen>
			</iframe>
		</div>
	</section>



	
</body>

</html>