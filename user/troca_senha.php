<?php
session_start();
require_once('../00 - BD/bd_conexao.php');
require_once('./seguranca.php');

if(isset($_GET['params']))
    echo $_SESSION['validarSessao'] . " , " . $_SESSION['email'] . "," . $_SESSION['fone'];
elseif(isset($_POST['antiga']) && isset($_POST['trocar'])){

    // Salt para encriptar em sha256 com um loop de 9000
    $senhaAntiga = $_POST['antiga'];
    $senhaAntiga = hashandsalt($senhaAntiga, $con);

    $sql = "SELECT idUsuario FROM usuario WHERE idUsuario = " . $_SESSION['idUsu'] . " AND senha = \"$senhaAntiga\";";
    $result = $con->query($sql);
    
    if ($result){
        if($result->num_rows > 0){
            // salt da nova senha
            $novaSenha = $_POST['trocar'];
            $novaSenha = hashandsalt($novaSenha, $con);

            $sql = "UPDATE usuario SET senha = \"$novaSenha\" WHERE idUsuario = \"" . $_SESSION['idUsu'] . "\";";
            $con->query($sql);
            echo "Senha trocada com sucesso!";
        }else echo "A senha digitada está incorreta!";
    }else echo "A senha digitada está incorreta!";
}