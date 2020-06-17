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
$lat = addslashes($_GET['lat']);
$long = addslashes($_GET['long']); //funcao para transformar aspas simples ( ' ) aspas duplas ( " ) barra invertida ( \ )
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
if (in_array(false, $campo)) // procurar o valor falso no array campo 
{
    echo ("ALGUM CAMPO NUMÉRICO FOI PREENCHIDO COM LETRA OU SÍMBOLO. VEJA QUIAS:<br> ");
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
            echo "$k<br>";
        }
    }
    unset($campo);

    echo "POR FAVOR,VOLTE NA PÁGINA ANTERIOR E REVISE CUIDADOSAMENTE OS CAMPOS SUPRACITADOS.";
} else {




    //   ============== conectar ao banco para passar os dados...


    $sql = "UPDATE arvore SET 
    Situacao ='$situacao', NomeCientifico ='$nomeCientifico', DistanciaLotes ='$distanciaLotesVagos', 
    DistanciaEsquinas='$distanciaEsquina',  CondicaoFisicoSanitaria='$avaliacaoArvore', 
    AlturaPrimeiraBifurcacao='$alturaPrimeiraBifurc', CondicaoSistemaRadicular='$avalradicular',
    LarguraCalcada='$larguraCalcada', NumImovelProx='$numImovel', Poda='$poda', LocalPlantio='$localPlantio',
    conflitos='$conflitos', latitude='$lat', longitude='$long' , Altura='$alturaArvore', Toxidez='$toxidez',
    DistanciaOutraArvore='$distanciaEntreArvore', PavimentacaoCalcada='$pavimentacaoCalcada',
    DistanciaGaragens='$distaEntradaGaragem', Rua='$rua', Habito='$habito', Familia='$familia', 
    DistanciaPostes='$distanciaPost', NomePopular='$nomePopular', Origem='$origem' WHERE IdArvore ='$id_arvore' ";
    if ($con->query($sql) === TRUE) {
        fecharConexao($con);

        echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=gerenciamento_arvores.php'>
               <script type=\"text/javascript\">
                     alert(\"Árvore foi editada com sucesso.\");
                    console.log(\" arvore editada \");
               </script>";
    } else {
        echo mysqli_error($con);
        fecharConexao($con);

        //header("Location: cadastro_arvores.php?error");
    }
}
