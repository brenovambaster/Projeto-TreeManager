<?php
include('seguranca.php');
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Formulário de árvore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href=" ../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/formulario-estilo.css">
	<?php
	include('iconeSite.php'); // ícone do site
	?>

</head>

<body>

	<div class="container borda-baixo">
		<?php
		require_once("../00 - BD/bd_conexao.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM arvore where IdArvore =  $id";
		$resultado = $con->query($sql);
		$info = mysqli_fetch_object($resultado);
		$retorno = situacaoEditar($resultado, $id, $info);
		fecharConexao($con);

		if ($retorno == 1) { ?>

			<div class="box-body">
				<form method="get" action="editar_arvore.php">
					<div>
						<h1 class="text-center">Forumuário para editar árvores</h1>
						<hr>
					</div>
					<div class="fundo">
						<div>
							<a class="btn btn-success col-12" data-toggle="collapse" href="#Mapeamento-e-localização" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">I- Mapeamento e localização</a>

							<div class="collapse multi-collapse" id="Mapeamento-e-localização">
								<div class="form-row">

									<div class="form-group col-md-4 ">
										<label for="text">Cordendas Geográficas:</label>
										<input class="form-control" type="text" name="cordGeo" value="<?php echo htmlspecialchars($info->CordGeo); ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="text">Rua:</label>
										<input class="form-control" type="text" name="rua" placeholder="Ex: Rua Santa Isabel" value="<?php echo htmlspecialchars($info->Rua); ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="numImovel"> Nº do imóvel mais próximo </label>
										<input class=" form-control" type="text" name="numImovel" placeholder="Ex: A 230" value="<?php echo $info->NumImovelProx; ?>">
									</div>
								</div>
								<div class="form-row">

									<legend>
										<h5 class="text-center">Distância da árvore em relação aos equipaentos hurbanos.</h5>
									</legend>
									<div class="form-group col-md-2">
										<label for="Postes">Postes(m):</label>
										<input type="text" name="distanciaPoste" class="form-control" placeholder="Ex: 2.5" aria-describedby="helpId" value="<?php echo $info->DistanciaPostes; ?>">

									</div>
									<div class="form-group col-md-2">
										<label for="Esquinas:">Esquinas(m):</label>
										<input type="text" class="form-control" name="esquina" placeholder="Ex: 4.9" value="<?php echo $info->DistanciaEsquinas; ?>">
									</div>
									<div class=" form-group col-md-3 ">
										<label for="entreOutrasArv "> Entre outra árvore(m):</label>
										<input type="text " class="form-control " name="distanciaEntreArvore" placeholder="Ex: 5.6" value="<?php echo $info->DistanciaOutraArvore; ?>">
									</div>
									<div class=" form-group col-md-3 ">
										<label for="garagens "> Entrada de garagens(m):</label>
										<input type="text " class="form-control" name="distaEntradaGaragem" placeholder="Ex: 5.6" value="<?php echo $info->DistanciaGaragens; ?>">
									</div>
									<div class=" form-group col-md-2 ">
										<label for="loteVago"> Lotes vagos(m):</label>
										<input type="text " class="form-control" name="distanciaLotesVagos" placeholder="Ex: 5.6 " value="<?php echo $info->DistanciaLotes; ?>">
									</div>
								</div>
							</div>
						</div>


						<div>
							<a class="btn btn-secondary  col-12" data-toggle="collapse" href="#Características-da-árvore" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">II- Características da árvore</a>

							<div class="collapse multi-collapse" id="Características-da-árvore">
								<div class="form-row">

									<legend> 1. Identificação</legend>
									<div class="form-group col-md-3">
										<label for="familia">Família:</label>
										<input type="text" class="form-control" name="familia" placeholder="Rutaceae" style="font-style:italic" value="<?php echo $info->Familia; ?>">
									</div>
									<div class="form-group col-md-3">
										<label for="nomeCinetifico">Nome científico:</label>
										<input type="text" class="form-control" name="nomeCientifico" placeholder="Murraya paniculata" style="font-style:italic" value="<?php echo $info->NomeCientifico; ?>">
									</div>
									<div class="form-group col-md-3">
										<label for="nomePopular">Nome popular:</label>
										<input type="text" class="form-control" name="nomePopular" placeholder="Murta-de-cheiro" style="font-style:italic" value="<?php echo $info->NomePopular; ?>">
									</div>
								</div>
								<div class="radios form-row ">
									<div class=" form-radio col-md-3">
										<?php
										$valorNat = "";
										$valorExo = "";
										if ($info->Origem == 'nativa') {
											$valorNat = "checked";
										} else {
											$valorExo = "checked";
										}
										?>
										<label class="font-weight-bold">Origem:</label>
										<label for="nativa">Nativa:</label>
										<input class="form-radio-inline" type="radio" name="Origem" id="nativa" value="nativa" <?php echo $valorNat; ?>>
										<label for="exotica">Exótica:</label>
										<input class="form-radio-inline" type="radio" name="Origem" id="exotica" value="exótica" <?php echo $valorExo; ?>>

									</div><br>

									<div class=" form-radio col-md-3">
										<?php
										$valorArv = "";
										$valorArbs = "";
										if ($info->Habito == 'arvore') {
											$valorArv = "checked";
										} else {
											$valorArbs = "checked";
										}

										?>
										<label class="font-weight-bold">Hábito:</label>
										<label for="habitArvore">Árvore:</label>
										<input class="form-radio-inline" id="habitArvore" type="radio" name="habito" value="arvore" <?php echo $valorArv; ?>>
										<label for="arbusto">Arbusto:</label>
										<input class="form-radio-inline" id="arbusto" type="radio" name="habito" value="arbusto" <?php echo $valorArbs; ?>>

									</div>
									<div class=" form-radio col-md-3">
										<?php
										$valorSim = "";
										$valorNao = "";
										if ($info->Toxidez == 'sim') {
											$valorSim = "checked";
										} else {
											$valorNao = "checked";
										} ?>

										<label class="font-weight-bold">Toxidez:</label>
										<label for="toxiSim">Sim:</label>
										<input class="form-radio-inline" type="radio" id="toxiSim" name="toxidez" value="Sim" <?php echo $valorSim; ?>>
										<label for="toxiNao">Não:</label>
										<input class="form-radio-inline" type="radio" id="toxiNao" name="toxidez" value="Nao" <?php echo $valorNao; ?>>

									</div>
								</div>

								<div class="form-row ">
									<legend>2. Porte da árvore</legend>
									<div class="form-group col-md-3">
										<label for="alturaArvor"> Altura da árvore(m):</label>
										<input type="text" id="alturaArvor" class="form-control" name="alturaArvore" placeholder="2.10" value="<?php echo $info->Altura; ?>">

									</div>
									<div class="form-group col-md-3">
										<label for="bifurcacao">Altura da 1º bifurcação(m):</label>
										<input type="text" class="form-control" name="alturaPrimeiraBifurc" placeholder="1.15" value="<?php echo $info->AlturaPrimeiraBifurcacao; ?>">
									</div>

								</div>
								<div class="form-group">
									<legend>3. Condição físico-sanitária</legend>
									<div class="form-group  col-md-10">
										<h5>Avaliação da saúde da árvore:</h5>
										<?php
										$aval1 = "";
										$aval2 = "";
										$aval3 = "";
										$aval4 = "";
										if ($info->CondicaoFisicoSanitaria == 'aval1') {
											$aval1 = "checked";
										}
										if ($info->CondicaoFisicoSanitaria == 'aval2') {
											$aval2 = "checked";
										}
										if ($info->CondicaoFisicoSanitaria == 'aval3') {
											$aval3 = "checked";
										}
										if ($info->CondicaoFisicoSanitaria == 'aval4') {
											$aval4 = "checked";
										}
										?>

										<div class="form-check">
											<input class="form-check-input" type="radio" name="avalCond" value="aval1" id="aval1" <?php echo $aval1; ?>>
											<label class="form-check-label" for="aval1"> Árvore vigorosa, sem sinais de pragas, doenças ou danos</label><br>

											<input class="form-check-input" type="radio" name="avalCond" value="aval2" id="aval2" <?php echo $aval2; ?>>
											<label class="form-check-label" for="aval2"> Árvore com vigor médio, podendo apresentar pequenos danos físicos, problemas de pragas ou doenças</label><br>

											<input class="form-check-input" type="radio" name="avalCond" value="aval3" id="aval3" <?php echo $aval3; ?>>
											<label class="form-check-label" for="aval3"> Árvore em estágio de declínio e com severos danos de pragas, doenças ou físicos</label><br>

											<input class="form-check-input" type="radio" name="avalCond" value="aval4" id="aval4" <?php echo $aval4; ?>>
											<label class="form-check-label" for="aval4"> Árvore morta ou com morte iminente </label>
										</div>


									</div>

									<legend>4. Condição do sitema radicular</legend>
									<div class="form-group col-md-10">
										<div>
											<h5>Avaliação da possibilidade das raízes superficiais causarem danos:</b></h5>
										</div>
										<?php
										$avalradicular1 = "";
										$avalradicular2 = "";
										$avalradicular3 = "";
										if ($info->CondicaoSistemaRadicular == "avalradicular1") {
											$avalradicular1 = "checked";
										}
										if ($info->CondicaoSistemaRadicular == "avalradicular2") {
											$avalradicular2 = "checked";
										}
										if ($info->CondicaoSistemaRadicular == "avalradicular3") {
											$avalradicular3 = "checked";
										}

										?>


										<div class="form-check">
											<input class="form-check-input" id="avalRad1" type="radio" name="avalradicular" value="avalradicular1" <?php echo $avalradicular1; ?>>
											<label class="form-check-label" for="avalRad1"> Raiz totalmente subterrânea. </label> </br>

											<input class="form-check-input" id="avalRad2" type="radio" name="avalradicular" value="avalradicular2" <?php echo $avalradicular2; ?>>
											<label class="form-check-label" for="avalRad2"> Raiz de forma superficial só na área de crescimento da árvore.</label> <br>

											<input class="form-check-input" id="avalRad3" type="radio" name="avalradicular" value="avalradicular3" <?php echo $avalradicular3; ?>>
											<label class="form-check-label" for="avalRad3"> Raiz de forma supercial ultrapassando a área de crescimento da árvore e provocando danos. </label><br>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div>
							<a class="btn btn-success col-12" data-toggle="collapse" href="#Entorno-e-interferências" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">III- Entorno e interferências</a>
							<div class="collapse multi-collapse" id="Entorno-e-interferências">

								<div class=" form-group form-row">

									<div class="form-radio col-md-6 col-sm-3 ">

										<b>Local de Plantio:</b>
										<?php
										$calcada = '';
										$praca = '';
										$viaPublica = '';
										$outro = '';
										if ($info->LocalPlantio == 'calcada') {
											$calcada = "checked";
										}
										if ($info->LocalPlantio == 'praca') {
											$praca = "checked";
										}
										if ($info->LocalPlantio == 'ViaPublica') {
											$viaPublica = "checked";
										}
										if ($info->LocalPlantio == 'outro') {
											$outro = "checked";
										}
										?>

										<div class="custom-control custom-radio">
											<input type="radio" class="form-radio-inline" name="LocalPlantio" id="calcada" value="calcada" <?php echo $calcada; ?>>
											<label class="form-check-label" for="calcada"> Calçada</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="form-radio-inline" name="LocalPlantio" id="praca" value="praca" <?php echo $praca; ?>>
											<label class="form-check-label" for="praca"> Praça</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="form-radio-inline" name="LocalPlantio" id="ViaPublica" value="ViaPublica" <?php echo $viaPublica; ?>>
											<label class="form-check-label" for="ViaPublica"> Via Pública</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="form-radio-inline" name="LocalPlantio" id="Outro" value="Outro" <?php echo $outro; ?>>
											<label class="form-check-label" for="Outro"> Outro</label>
										</div>

									</div>
									<div class="form-group col-md-6">
										<label for="largura"> Largura da calçada:</label>
										<input type="text" name="larguraCalcada" id="largura" class="form-control" value="<?php echo $info->LarguraCalcada; ?>">
									</div>

								</div>

								<div class="form-group form-row">
									<?php
									$rede = '';
									$contrucao = '';
									$outraArvore = '';
									$sinalizacao = '';
									$outro = '';
									if ($info->conflitos == "redeDeEnergia") {
										$rede = "checked";
									}
									if ($info->conflitos == "construcoes") {
										$contrucao = "checked";
									}
									if ($info->conflitos == "outraArvore") {
										$outraArvore = "checked";
									}
									if ($info->conflitos == "sinalizacao") {
										$sinalizacao = "checked";
									}
									if ($info->conflitos == "outro") {
										$outro = "checked";
									}

									?>
									<div class="form-group  col-md-4 col-sm-3  borda-direita"> Conflitos: <br>
										<div class="custom-control custom-radio">
											<input class="form-check-input" type="radio" name="Conflitos" id="redeDeEnergia" value="redeDeEnergia" <?php echo $rede; ?>>
											<label for="redeDeEnergia"> Rede de energia</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="form-check-input" type="radio" name="Conflitos" id="Construçoes" value="construcoes" <?php echo $contrucao; ?>>
											<label for="Construçoes"> Construções</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="form-check-input" type="radio" name="Conflitos" id="outraArvore" value="outraArvore" <?php echo $outraArvore; ?>>
											<label for="outraArvore"> Outra árvore</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="form-check-input" type="radio" name="Conflitos" id="Sinalizacao" value="sinalizacao" <?php echo $sinalizacao; ?>>
											<label for="Sinalizacao"> Sinalização </label>
										</div>
										<div class="custom-control custom-radio">
											<input class="form-check-input" type="radio" name="Conflitos" id="OutroVal" value="outro" <?php echo $outro; ?>>
											<label for="OutroVal"> Outro </label><br><br>
										</div>
									</div>

									<div class=" form-group col-md-4 col-sm-3 borda-direita "> Poda: <br>
										<?php
										$podaLeve = '';
										$podaPesada = '';
										$semPoda = '';
										if ($info->Poda == "podaLeve") {
											$podaLeve = "checked";
										}
										if ($info->Poda == "podaPesada") {
											$podaPesada = "checked";
										}
										if ($info->Poda == "semPoda") {
											$semPoda = "checked";
										}



										?>
										<div class="custom-control custom-radio">
											<input type="radio" name="Poda" id="podaLeve" value="podaLeve" <?php echo $podaLeve; ?>>
											<label for="podaLeve"> Poda leve</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" name="Poda" id="podaPesada" value="podaPesada" <?php echo $podaPesada; ?>>
											<label for="podaPesada"> Poda pesada</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" name="Poda" id="semPoda" value="semPoda" <?php echo $semPoda; ?>>
											<label for="semPoda"> Sem poda</label>
										</div>

									</div>
									<div class=" form-group col-md-4 col-sm-3 borda-direita "> Pavimentação da calçada <br>
										<?php
										$comPav = '';
										$semPav = '';
										if ($info->PavimentacaoCalcada == "comPavimento") {
											$comPav = "checked";
										}
										if ($info->PavimentacaoCalcada == "semPavimento") {
											$semPav = "checked";
										}

										?>

										<div class="custom-control custom-radio">
											<input type="radio" name="Pavimentacao" id="comPavimento" value="comPavimento" <?php echo $comPav; ?>>
											<label for="comPavimento"> Com pavimento </label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" name="Pavimentacao" id="semPavimento" value="semPavimento" <?php echo $semPav; ?>>
											<label for="semPavimento"> Sem pavimento</label>
										</div>

									</div>
								</div>
							</div>
						</div>

					</div>
					<div>
						<input type="hidden" name="id_arvore" class="btn btn-light disabled" value="<?php echo $id; ?>">
						<input class="btn btn-primary col-2 col-xs-3" type="submit" name="butao" value="Salvar">
						<input class="btn btn-danger col-2 col-xs-3" type="reset" value="Limpar"></div>
				</form>

			</div>


		<?php
		}
		?>
	</div>



	<!--===========================================script=================================================	-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php
/* só pode editar uma árvore enquanto a situação dela for != de "cadastrado"; Se já estiver cadastrada, 
é necessário abrir uma solicatação para o adm editar.  


*/
function situacaoEditar($resultado, $id, $info)
{

	if (mysqli_num_rows($resultado) == 0) {
		echo "<h2>Não existe essa árvore no banco de dados </h2>";
		echo  '<a class="btn btn-primary" href="gerenciamento_arvores.php">Voltar</a>';
		$flag = 3;
	} else {

		if (($info->Situacao) == "cadastrada") {
			echo " <h3> A operação nao pode ser realizada pois a árvore já foi validada pelo adm. 
		Para que possa editar as informações, solicite uma serviço de edição  para a árvore de ID=$id </h3>";
			echo  '<a class="btn btn-primary" href="gerenciamento_arvores.php">Voltar</a>';
			echo "<a class='btn btn-success ml-3' href='solicitar_servico.php?id=$id'>  Solicitar agora </a>";

			$flag = 0;
		} else { // quando ela for pendente

			$flag = 1;
		}
	}
	return $flag;
}
?>