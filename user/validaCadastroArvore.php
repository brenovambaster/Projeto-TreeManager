<?php
include_once('seguranca.php');

if (!isset($_GET['butao'])) {
    header('location: cadastro_arvores.php');
}
require_once("../00 - BD/bd_conexao.php");

// I- mapeamento e localização 
$situacao = "pendente";
$latitude =   addslashes($_GET['lat']);
$longitude =   addslashes($_GET['long']);
$rua = addslashes($_GET['rua']);
$numImovel = addslashes($_GET['numImovel']);
$n1 = $distanciaPost = $_GET['distanciaPoste'];
$n2 = $distanciaEsquina = $_GET['esquina'];
$n3 = $distanciaEntreArvore = $_GET['distanciaEntreArvore'];
$n4 = $distaEntradaGaragem = $_GET['distaEntradaGaragem'];
$n5 = $distanciaLotesVagos = $_GET['distanciaLotesVagos'];

// II- características da árvore

$familia = addslashes($_GET['familia']);
$nomeCientifico = addslashes($_GET['nomeCientifico']);
$nomePopular = addslashes($_GET['nomePopular']);
$origem = $_GET['Origem'];
$habito = $_GET['habito'];
$toxidez = $_GET['toxidez'];
$n6 = $alturaArvore =  $_GET['alturaArvore'];
$n7 =   $alturaPrimeiraBifurc = $_GET['alturaPrimeiraBifurc'];
$avaliacaoArvore = $_GET['avalCond'];
$avalradicular = $_GET['avalradicular'];

// III- entorno e interferencias

$localPlantio = $_GET['LocalPlantio'];
$conflitos = $_GET['Conflitos'];
$poda = $_GET['Poda'];
$n8 = $larguraCalcada = $_GET['larguraCalcada'];

$pavimentacaoCalcada = $_GET['Pavimentacao'];
// pegar os campos que obrigatoriamente precisam sem números. 
$campo = array(
    // checa se sao números e armazena o  resultado como true or false;
    'Distancia_Postes' => is_numeric($n1) && $n1 > 0,
    'Distancia_Esquina' => is_numeric($n2) && $n2 > 0,
    'Distancia_EntreArvore' => is_numeric($n3) && $n3 > 0,
    'Distancia_Entrada_Garagem' => is_numeric($n4) && $n4 > 0,
    'Distancia_Lotes_Vagos' => is_numeric($n5) && $n5 > 0,
    'Altura_da_Arvore' => is_numeric($n6) && $n6 > 0,
    'altura_Primeira_Bifurcacao' => is_numeric($n7) && $n7 > 0,
    'largura_Calcada' => is_numeric($n8) && $n8 > 0,
    'latitude' => is_numeric($latitude),
    'longitude' => is_numeric($longitude)
);
if (in_array(false, $campo)) {
    echo ("Algum campo foi preenchido incorretamente ou não foi preenchido. Por favor corrija.");
    unset($campo);
} else {
    $sql = "INSERT INTO arvore (Situacao,NomeCientifico, DistanciaLotes, DistanciaEsquinas, CondicaoFisicoSanitaria, AlturaPrimeiraBifurcacao, 
    CondicaoSistemaRadicular, LarguraCalcada, NumImovelProx, Poda, LocalPlantio, conflitos, latitude, longitude, Altura, Toxidez, DistanciaOutraArvore, 
    PavimentacaoCalcada, DistanciaGaragens, Rua, Habito, Familia, DistanciaPostes, NomePopular, Origem) 
    
    VALUES('$situacao','$nomeCientifico','$distanciaLotesVagos', '$distanciaEsquina', '$avaliacaoArvore', '$alturaPrimeiraBifurc', '$avalradicular',
     '$larguraCalcada', '$numImovel','$poda', '$localPlantio','$conflitos','$latitude', '$longitude', '$alturaArvore', '$toxidez', '$distanciaEntreArvore',
       '$pavimentacaoCalcada', '$distaEntradaGaragem', '$rua', '$habito', '$familia', '$distanciaPost', '$nomePopular' ,'$origem' )";

    if ($con->query($sql)) {
        fecharConexao($con);

        echo "Sucesso!";
    } else {
        echo mysqli_error($con);
        fecharConexao($con);

        //header("Location: cadastro_arvores.php?error");
    }
}
