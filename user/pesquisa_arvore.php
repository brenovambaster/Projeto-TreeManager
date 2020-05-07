<?php
// arquivo para conferir a url da página e com base na url decidir qual o tipo de pesquisa;
require_once('../00 - BD/bd_conexao.php');
function verurl()
{
    $rua = '';
    $especie = '';
    if (!isset($_POST['pesquisa'])) {
        // Exibir os dados  sem pesquisar

        $sql = "SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore ";
        $escolha_de_pesquisa = 1;
    }
    if (isset($_POST['pesquisa'])) { //exibição com pesquisa
        //$id = $_POST['ID'];
        $rua = $_POST['rua'];
        $especie = $_POST['Especie'];

        if ((!empty($especie) && empty($rua))) {
            // CASO APENAS A ESPECIE SEJA INFORMADA

            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  where   NomeCientifico like '%$especie%'";
            $escolha_de_pesquisa = 2;
        } else if (!empty($rua) && empty($especie)) {
            // CASO APENAS A RUA SEJA INFORMADA

            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  where   Rua like '%$rua%'";
            $escolha_de_pesquisa = 3;
        }
        if (!empty($especie) && !empty($rua)) {
            // CASO OS  DOIS CAMPOS TENHAM SIDO INFORMADOS 

            $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore where  Rua like '%$rua%' AND NomeCientifico like '%$especie%'";
            $escolha_de_pesquisa = 4;
        }
        if (empty($especie) && empty($rua)) {

            $sql = "SELECT * FROM arvore";  // SEM INFORMAR NENHUM CAMPO
            $filtro = '';
            $escolha_de_pesquisa = 5;
        }
    }

    return $sql =  array(
        'sql' => $sql,
        'escolha_de_pesquisa' => $escolha_de_pesquisa,
        'rua' => $rua,
        'especie' => $especie
    );
}
$sql = verurl();
$resultado = $con->query($sql['sql']) or die("Erro ao se conectar com o Banco.");

function escolha_de_pesquisa($sql_array, $offset, $linhas_por_pag)
{
    $escolha_de_pesquisa = $sql_array['escolha_de_pesquisa'];
    $rua = $sql_array['rua'];
    $especie = $sql_array['especie'];
    $offset = $offset;
    $linhas_por_pag = $linhas_por_pag;

    if ($escolha_de_pesquisa == 1) {
        $sql = "SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore LIMIT $offset , $linhas_por_pag ";
        $filtro = '';
        // retornar a sql de acordo com a escolha e com o limite da paginacao

    }
    if ($escolha_de_pesquisa == 2) {
        $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  WHERE   NomeCientifico like '%$especie%' LIMIT $offset , $linhas_por_pag ";
        $filtro = "Pesquisa por nome científico";
        // retornar a sql de acordo com a escolha e com o limite da paginacao
    }
    if ($escolha_de_pesquisa == 3) {
        // retornar a sql de acordo com a escolha e com o limite da paginacao
        $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore   WHERE   Rua like '%$rua%' LIMIT $offset , $linhas_por_pag";
        $filtro = "Pesquisa por rua";
    }
    if ($escolha_de_pesquisa == 4) {
        $sql = " SELECT IdArvore, NomeCientifico, Rua, CordGeo, Situacao FROM arvore  WHERE  Rua like '%$rua%' AND NomeCientifico like '%$especie%' LIMIT $offset , $linhas_por_pag ";
        $filtro = "Pesquisa por nome científico e rua";
        // retornar a sql de acordo com a escolha e com o limite da paginacao
    }
    if ($escolha_de_pesquisa == 5) {
        $sql = "SELECT * FROM arvore LIMIT $offset , $linhas_por_pag";
        // retornar a sql de acordo com a escolha e com o limite da paginacao
        $filtro = "";
    }

    return $arvore = array(
        'sql' => $sql,
        'filtro' => $filtro
    );
}
