<?php
include("seguranca.php");
if ($_POST["idAvoreInp"] > 0) { // caso o id  seja  válido ele entra aqui. 


    $idUsu = $_SESSION["idUsu"];
    $idArvore = '';
    $idArvore = $_POST["idAvoreInp"];
    $tipoServico = $_POST["servico"];
    $descricaoServico = addslashes($_POST["descricaoServico"]);
    date_default_timezone_set("Brazil/East");
    $dataServico = date('yy,m,d');
    $status = "pendente";

    echo "id arvore" . $idArvore;
    require_once("../00 - BD/bd_conexao.php");
    $sql1 = "SELECT * FROM arvore WHERE IdArvore = $idArvore";
    $result = $con->query($sql1);
    $info = mysqli_fetch_object($result);
    if (mysqli_num_rows($result) == 0) {
        echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=gerenciamento_arvores.php'>
    <script type=\"text/javascript\">
        alert(\"Nao existe essa árvore, por isso nao se pode fazer um registro. Tente novamente. \");
    </script>
";
    } else {
        $sql2 = "INSERT INTO servico(descricao, codArvore, tipoServico, dataServico, usuSolicitante, statusSer) VALUES
    ('$descricaoServico', '$idArvore', '$tipoServico', '$dataServico', '$idUsu', '$status')"; // Por que todos os valores dever ser passados com '' mesmo nao sendo string
        $resultado = $con->query($sql2);

        echo mysqli_error($con);
        fecharConexao($con);
        if ($resultado == TRUE) {
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=solicitacoes.php'>
            <script type=\"text/javascript\">
                alert(\"Serviço solicitado com sucesso. Veja aqui as suas solicitações:\");
            </script>
        ";

            echo "serviço solicitado";
        } else {
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=gerenciamento_arvores.php'>
            <script type=\"text/javascript\">
                alert(\"erro solicitar serviço. Tente novamente\");
            </script>
        ";

            echo "erro solicitar serviço";
        }
    }
} else {
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=gerenciamento_arvores.php'>
    <script type=\"text/javascript\">
        alert(\"ID inválido. Tente novamente\");
    </script>";
}
