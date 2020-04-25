<?php
// arquivo para conferir a url da página e com base na url decidir qual o tipo de pesquisa;
require_once('../00 - BD/bd_conexao.php');
function verurl()
{
    if (!isset($_POST['pesquisa'])) {
        // Exibir sem pesquisar
        $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore ";

        return $sql;
    }
    if (isset($_POST['pesquisa'])) { //exibição com pesquisa
        require_once('../00 - BD/bd_conexao.php');
        //$id = $_POST['ID'];
        $rua = $_POST['rua'];
        $especie = $_POST['Especie'];
        if ((!empty($especie) && empty($rua))) { // CASO APENAS A ESPECIE SEJA INFORMADA
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo FROM arvore  where   NomeCientifico like '%$especie%'";
        } else if (!empty($rua) && empty($especie)) { // CASO APENAS A RUA SEJA INFORMADA
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo FROM arvore  where   Rua like '%$rua%'";
        }
        if (!empty($especie) && !empty($rua)) { // CASO OS  DOIS CAMPOS TENHAM SIDO INFORMADOS 
            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo FROM arvore where  Rua like '%$rua%' AND NomeCientifico like '%$especie%'";
        }
        if (empty($especie) && empty($rua)) {
            $sql = "SELECT * FROM arvore";  // SEM INFORMAR NENHUM CAMPO
        }
        return $sql;
    }
}
$sql = verurl();
$resultado = $con->query($sql) or die("Erro ao se conectar com o Banco.");
fecharConexao($con);
