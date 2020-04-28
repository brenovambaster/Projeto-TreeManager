<?php
include("seguranca.php");
$idUsu = $_SESSION["idUsu"];
$idArvore = $_POST["idAvoreInp"];
$tipoServico = $_POST["servico"];
$descricaoServico = addslashes($_POST["descricaoServico"]);
date_default_timezone_set("Brazil/East");
$dataServico = date('yy,m,d');
$status = "pendente";


echo "id arvore" . $idArvore;
echo $dataServico;

require_once("../00 - BD/bd_conexao.php");
$sql1 = "SELECT * FROM arvore WHERE IdArvore = $idArvore";
$result = $con->query($sql1);
$info = mysqli_fetch_object($result);
if (mysqli_num_rows($result) == 0) {
    echo "<h2>  Nao existe essa árvore, por isso nao se pode fazer um registro. Tente novamente. </h2> ";
} else {
    $sql2 = "INSERT INTO servico(descricao, codArvore, tipoServico, dataServico, usuSolicitante, statusSer) VALUES
    ('$descricaoServico', '$idArvore', '$tipoServico', '$dataServico', '$idUsu', '$status')"; // Por que todos os valores dever ser passados com '' mesmo nao sendo string
    $resultado = $con->query($sql2);

    echo mysqli_error($con);

    if ($resultado == TRUE) {
        echo "aee";
    } else {
        echo "nao deu certo ";
    }
}
fecharConexao($con);
