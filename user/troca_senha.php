<?php
session_start();
include('../00 - BD/bd_conexao.php');

if(isset($_GET['params']))
    echo $_SESSION['validarSessao'] . " , " . $_SESSION['email'] . "," . $_SESSION['fone'];
elseif(isset($_POST['antiga']) && isset($_POST['trocar'])){

    $senhaAntiga = mysql_fix_string($con, $_POST['antiga']);
    $sql = "SELECT idUsuario FROM usuario WHERE idUsuario = " . $_SESSION['idUsu'] . " AND senha = $senhaAntiga;";
    $result = $con->query($sql);

    if ($result){
        $novaSenha = mysql_fix_string($con, $_POST['trocar']);
        $sql = "UPDATE usuario SET senha = $novaSenha WHERE idUsuario = " . $_SESSION['idUsu'] . ";";
        $con->query($sql);
        echo "Senha trocada com sucesso!";
    }else echo "A senha digitada está incorreta!";
}

function mysql_fix_string($conn, $string){
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}