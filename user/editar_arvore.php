<?php
include('seguranca.php');

if (!isset($_GET['butao'])) {
    header('location: gerenciamento_arvores.php');
}
require_once("../00 - BD/bd_conexao.php");
// RECEBER OS DADOS VIA get
// I- mapeamento e localização 
$id_arvore = $_GET['id_arvore'];
$situacao = "pendente";
$latitude = addslashes($_GET['lat']);
$longitude = addslashes($_GET['long']); //funcao para transformar aspas simples ( ' ) aspas duplas ( " ) barra invertida ( \ )
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
    'Distancia_Postes' => is_numeric($n1),
    'Distancia_Esquina' => is_numeric($n2),
    'Distancia_EntreArvore' => is_numeric($n3),
    'Distancia_Entrada_Garagem' => is_numeric($n4),
    'Distancia_Lotes_Vagos' => is_numeric($n5),
    'Altura_da_Arvore' => is_numeric($n6),
    'altura_Primeira_Bifurcacao' => is_numeric($n7),
    'largura_Calcada' => is_numeric($n8),
    'latitude' => is_numeric($latitude),
    'longitude' => is_numeric($longitude)
);
if (in_array(false, $campo)) {
    echo ("Algum campo foi preenchido incorretamente ou não foi preenchido. Por favor corrija.");
    unset($campo);
} else {
    //   ============== conectar ao banco para passar os dados...


    $sql = "UPDATE arvore SET 
    Situacao ='$situacao', NomeCientifico ='$nomeCientifico', DistanciaLotes ='$distanciaLotesVagos', 
    DistanciaEsquinas='$distanciaEsquina',  CondicaoFisicoSanitaria='$avaliacaoArvore', 
    AlturaPrimeiraBifurcacao='$alturaPrimeiraBifurc', CondicaoSistemaRadicular='$avalradicular',
    LarguraCalcada='$larguraCalcada', NumImovelProx='$numImovel', Poda='$poda', LocalPlantio='$localPlantio',
    conflitos='$conflitos', latitude='$latitude', longitude='$longitude' , Altura='$alturaArvore', Toxidez='$toxidez',
    DistanciaOutraArvore='$distanciaEntreArvore', PavimentacaoCalcada='$pavimentacaoCalcada',
    DistanciaGaragens='$distaEntradaGaragem', Rua='$rua', Habito='$habito', Familia='$familia', 
    DistanciaPostes='$distanciaPost', NomePopular='$nomePopular', Origem='$origem' WHERE IdArvore ='$id_arvore' ";
    
    if ($con->query($sql)) {
        fecharConexao($con);
        echo "Sucesso!";
    } else {
        echo mysqli_error($con);
        fecharConexao($con);

        //header("Location: cadastro_arvores.php?error");
    }
}
