<?php
include('seguranca.php');
require_once('../00 - BD/bd_conexao.php');
$id = $_SESSION['idUsu'];

if (isset($_GET['remov'])) {

    $sql = "UPDATE usuario SET  foto='perfil.png' Where idUsuario='$id'";
    $resultado = $con->query($sql);
    if ($con->query($sql) === TRUE) {
        echo "success remover";
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
        <script type=\"text/javascript\">
            alert(\"A imagem  foi removida com sucesso.\");
        </script>
    ";
    } else {
        echo "erro remover";
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao remover a imagem\");
        </script>
    ";
    }
}
fecharConexao($con);
