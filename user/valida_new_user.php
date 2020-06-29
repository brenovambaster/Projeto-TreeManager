<?php
require_once("../00 - BD/bd_conexao.php");

$senha = hashandsalt($_POST['senha'], $con);
$confSenha = hashandsalt($_POST['confirmaSenha'], $con);

if($senha != $confSenha){
	echo "As senhas são diferentes! Por favor volte e corrija.";
}else{
	$nome = mysql_fix_string($con, $_POST['nome']);
	$fone = mysql_fix_string($con, $_POST['celular']);
	$email = mysql_fix_string($con, $_POST['email']);
	$tipo = 'colaborador';
	$foto = 'perfil.png';
	$sql = "INSERT INTO usuario(nome,email,fone,senha,tipo,foto) VALUES('$nome','$email', '$fone','$senha','$tipo','$foto')";

	if ($con->query($sql)) {
		fecharConexao($con);
		echo "Sucesso!";
	} else {
		if (mysqli_errno($con) == 1062) // o emial é uma chave única.  1062 é o erro gerado para o email duplicado;
			echo "Email já existe!";
		fecharConexao($con);
	}
}

function mysql_fix_string($conn, $string){
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
  }
  
  function hashandsalt($string, $conn){
	return mysql_fix_string($conn, crypt($string, '$5$rounds=9000$gerencia_arvo'));
  }
  