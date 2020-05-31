<?php
include('seguranca.php');

if (!isset($_GET['butao'])) {
    header('location: cadastro_arvores.php');
}
require_once("../00 - BD/bd_conexao.php");
// RECEBER OS DADOS VIA POSTs
// I- mapeamento e localização 
$situacao = "pendente";
$cordenadaGeografica =   addslashes($_GET['cordGeo']); //funcao para transformar aspas simples ( ' ) aspas duplas ( " ) barra invertida ( \ )
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
    'largura_Calcada' => is_numeric($n8)
);
if (in_array(false, $campo)) {
    echo "<script> alert('";
    echo ("ALGUM CAMPO NUMÉRICO FOI PREENCHIDO COM LETRA OU SÍMBOLO. VEJA QUIAS:" . '\n');
    /*
    while (list($NomeCampo, $Valor) = each($campo)) {
        if ($Valor === FALSE) {
            echo "$NomeCampo<br>";
        };
    } // NÃO USEI ESTA FUNCAO PQ SEGUNDO A DOCUMENTAÇÃO ESTÁ DESATUALIZADA :( ;
  */

    foreach ($campo as $k => $v) {
        // $k é a key ou "nome da posicao" e $v o valor daquela posicao  naquele instate;
        if ($v === false) {

            $teste = $k;
            // print_r($teste);
            echo "$k" . '\n';
            // seria melhor ciar um novo array dinamico com apenas os campos preenchidos incorretamente.
            // Mas nao consegui fazer isso. obs*Tentar fazer essa validação com JS. 
            // validar formulário para que os campos nao aceitem valores < 0
        }
    }
    unset($campo);

    echo "POR FAVOR,VOLTE NA PÁGINA ANTERIOR E REVISE CUIDADOSAMENTE OS CAMPOS SUPRACITADOS.";
    echo "'); </script>";
} else {




    $sql = " INSERT INTO arvore (Situacao,NomeCientifico, DistanciaLotes, DistanciaEsquinas, CondicaoFisicoSanitaria, AlturaPrimeiraBifurcacao, 
    CondicaoSistemaRadicular, LarguraCalcada, NumImovelProx, Poda, LocalPlantio, conflitos, CordGeo, Altura, Toxidez, DistanciaOutraArvore, 
    PavimentacaoCalcada, DistanciaGaragens, Rua, Habito, Familia, DistanciaPostes, NomePopular, Origem) 
    
    VALUES('$situacao','$nomeCientifico','$distanciaLotesVagos', '$distanciaEsquina', '$avaliacaoArvore', '$alturaPrimeiraBifurc', '$avalradicular',
     '$larguraCalcada', '$numImovel','$poda', '$localPlantio','$conflitos','$cordenadaGeografica', '$alturaArvore', '$toxidez', '$distanciaEntreArvore',
       '$pavimentacaoCalcada', '$distaEntradaGaragem', '$rua', '$habito', '$familia', '$distanciaPost', '$nomePopular' ,'$origem' )";

    if ($con->query($sql) === TRUE) {
        fecharConexao($con);

        header("Location: cadastro_arvores.php?success");
    } else {
        echo mysqli_error($con);
        fecharConexao($con);

        //header("Location: cadastro_arvores.php?error");
    }
}
