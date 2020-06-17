<?php
require_once('./seguranca.php');
require_once('../00 - BD/bd_conexao.php');


if (isset($_GET['params']))
    echo $_SESSION['validarSessao'] . " , " . $_SESSION['email'] . "," . $_SESSION['fone'];
elseif (isset($_POST['antiga']) && isset($_POST['trocar'])) {

    // Salt para encriptar em sha256 com um loop de 9000
    $senhaAntiga = $_POST['antiga'];
    $senhaAntiga = hashandsalt($senhaAntiga, $con);
    $id = $_SESSION['idUsu'];
    $sql = "SELECT idUsuario FROM usuario WHERE idUsuario = '$id' AND senha = '$senhaAntiga';";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // salt da nova senha
            $novaSenha = $_POST['trocar'];
            $novaSenha = hashandsalt($novaSenha, $con);

            $sql = "UPDATE usuario SET senha = '$novaSenha' WHERE idUsuario = '$id';";
            $con->query($sql);
            $_SESSION['senha'] = $novaSenha;
            echo "Senha trocada com sucesso!";
        } else echo "A senha digitada está incorreta!";
    } else echo "Não foi possível editar a senha.";
}
