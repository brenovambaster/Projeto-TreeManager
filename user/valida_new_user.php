<?php 
require_once("../00 - BD/bd_conexao.php");
$nome= $_POST['nome'];
$fone = $_POST['celular'];
$senha = $_POST['senha'];
$email = $_POST['email'];
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