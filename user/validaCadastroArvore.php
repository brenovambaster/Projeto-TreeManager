<?php
include('seguranca.php');

if (!isset($_GET['butao'])) {
    header('location: cadastro_arvores.php');
}
require_once("../00 - BD/bd_conexao.php");
// RECEBER OS DADOS VIA POST
// I- mapeamento e localização 
$situacao = "pendente";
$cordenadaGeografica =   addslashes($_GET['cordGeo']);
$rua = $_GET['rua'];
$numImovel = $_GET['numImovel'];
$distanciaPost = $_GET['distanciaPoste'];
$distanciaEsquina = $_GET['esquina'];
$distanciaEntreArvore = $_GET['distanciaEntreArvore'];
$distaEntradaGaragem = $_GET['distaEntradaGaragem'];
$distanciaLotesVagos = $_GET['distanciaLotesVagos'];
// II- características da árvore
$familia = $_GET['familia'];
$nomeCientifico = $_GET['nomeCientifico'];
$nomePopular = $_GET['nomePopular'];
$origem = $_GET['Origem'];
$habito = $_GET['habito'];
$toxidez = $_GET['toxidez'];
$alturaArvore = $_GET['alturaArvore'];
$alturaPrimeiraBifurc = $_GET['alturaPrimeiraBifurc'];
$avaliacaoArvore = $_GET['avalCond'];
$avalradicular = $_GET['avalradicular'];
// III- entorno e interferencias
$localPlantio = $_GET['LocalPlantio'];
$conflitos = $_GET['Conflitos'];
$poda = $_GET['Poda'];
$larguraCalcada = $_GET['larguraCalcada'];
$pavimentacaoCalcada = $_GET['Pavimentacao'];
$acaoRecomendada = $_GET['acaoRecomendada'];
$observacao = $_GET['observacao'];

//   ============== conectar ao banco para passar os dados...


$sql = " INSERT INTO arvore (Situacao,NomeCientifico, DistanciaLotes, DistanciaEsquinas, CondicaoFisicoSanitaria, AlturaPrimeiraBifurcacao, 
CondicaoSistemaRadicular, LarguraCalcada, NumImovelProx, Poda, LocalPlantio, CordGeo, Altura, Toxidez, DistanciaOutraArvore, AcaoRecomendada, 
PavimentacaoCalcada, DistanciaGaragens, Rua, Habito, Familia, DistanciaPostes, NomePopular, Origem, observacao) 
    
    VALUES('$situacao','$nomeCientifico','$distanciaLotesVagos', '$distanciaEsquina', '$avaliacaoArvore', '$alturaPrimeiraBifurc', '$avalradicular',
     '$larguraCalcada', '$numImovel','$poda', '$localPlantio','$cordenadaGeografica', '$alturaArvore', '$toxidez', '$distanciaEntreArvore', '$acaoRecomendada',
       '$pavimentacaoCalcada', '$distaEntradaGaragem', '$rua', '$habito', '$familia', '$distanciaPost', '$nomePopular' ,'$origem', '$observacao' )";

if ($con->query($sql) === TRUE) {
    fecharConexao($con);

    header("Location: cadastro_arvores.php?success");
} else {
    echo mysqli_error($con);
    fecharConexao($con);

    //header("Location: cadastro_arvores.php?error");
}
