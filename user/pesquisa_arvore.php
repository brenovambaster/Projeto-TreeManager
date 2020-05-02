<?php
// arquivo para conferir a url da página e com base na url decidir qual o tipo de pesquisa;
require_once('../00 - BD/bd_conexao.php');
function verurl()
{
    if (!isset($_POST['pesquisa'])) {
        // Exibir sem pesquisar
        $sql = "SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore ";
        $filtro = '';
    }
    if (isset($_POST['pesquisa'])) { //exibição com pesquisa
        require_once('../00 - BD/bd_conexao.php');
        //$id = $_POST['ID'];
        $rua = $_POST['rua'];
        $especie = $_POST['Especie'];
        $filtro = '';
        if ((!empty($especie) && empty($rua))) { // CASO APENAS A ESPECIE SEJA INFORMADA
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  where   NomeCientifico like '%$especie%'";
            $filtro = "Pesquisa por nome científico";
        } else if (!empty($rua) && empty($especie)) { // CASO APENAS A RUA SEJA INFORMADA
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  where   Rua like '%$rua%'";
            $filtro = "Pesquisa por rua";
        }
        if (!empty($especie) && !empty($rua)) { // CASO OS  DOIS CAMPOS TENHAM SIDO INFORMADOS 
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore where  Rua like '%$rua%' AND NomeCientifico like '%$especie%'";
            $filtro = "Pesquisa por nome científico e rua";
        }
        if (empty($especie) && empty($rua)) {
            $sql = "SELECT * FROM arvore";  // SEM INFORMAR NENHUM CAMPO
            $filtro = '';
        }
    }
    return $sql =  array(
        'sql' => $sql,
        'filtro' => $filtro
    );
}

$sql = verurl();
$resultado = $con->query($sql['sql']) or die("Erro ao se conectar com o Banco.");
fecharConexao($con);
