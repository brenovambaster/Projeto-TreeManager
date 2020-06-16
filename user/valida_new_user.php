<?php 
require_once("../00 - BD/bd_conexao.php");
require_once('./seguranca.php');
$nome= mysql_fix_string($con, $_POST['nome']);
$fone = mysql_fix_string($con, $_POST['celular']);
$senha = hashandsalt($_POST['senha'], $con);
$email = mysql_fix_string($con, $_POST['email']);
$tipo ='colaborador';

$sql = "INSERT INTO usuario(nome,email,fone,senha,tipo) VALUES('$nome','$email', '$fone','$senha','$tipo')" ;

if ($con->query($sql) === TRUE) {
	fecharConexao($con);
	header("location: index.php?new_user_success");
	echo "DEU CERTO";
} else {
	fecharConexao($con);

	echo "DEU erro";
}








?>