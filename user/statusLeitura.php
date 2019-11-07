<?php
require_once('../00 - BD/bd_conexao.php');
#Quando o usuário clicar em lido, o status da árvore será mudado e mostrado na tebela de solicitaçoes. 
# Essa página irá pegar o status de leitua e irá setar no banco de dados como "lido" ou "nao lido"
$leitura = $_GET['leitura'];
$id = $_GET['identificador'];
$sql = "UPDATE solicita  set statusSol ='$leitura' where IdSol= $id";
$resultado = $con->query($sql);
if ($resultado === true) {
    echo "deu certo";
    $flag = "sucesso";
} else {
    echo mysqli_error($con);
    echo "deu errado";
    $flag = "erro";
}
header("Location:verSolicitacao.php?id=$id");
fecharConexao($con);
