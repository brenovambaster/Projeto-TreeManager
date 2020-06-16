<?php
require_once("../00 - BD/bd_conexao.php");
require_once('./seguranca.php');
$nome = mysql_fix_string($con, $_POST['nome']);
$fone = mysql_fix_string($con, $_POST['celular']);
$senha = hashandsalt($_POST['senha'], $con);
$email = mysql_fix_string($con, $_POST['email']);
$tipo = 'colaborador';
$foto = 'perfil.png';
$sql = "INSERT INTO usuario(nome,email,fone,senha,tipo,foto) VALUES('$nome','$email', '$fone','$senha','$tipo','$foto')";

if ($con->query($sql) === TRUE) {
	fecharConexao($con);
	header("location: index.php?new_user_success");
} else {
	if (mysqli_errno($con) == 1062) // o emial é uma chave única.  1062 é o erro gerado para o email duplicado;
		header("location: index.php?email_duplicate");
	fecharConexao($con);
}
