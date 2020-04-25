<?php
include('seguranca.php');

if (!isset($_POST['butaoCadastro'])) {
	header("Location: CadastroUso.php");
} else {


	$nome = $_POST["nome_cad"];
	$fone = $_POST["telefone_cad"];
	$senha = $_POST["senha_cad"];
	$email = $_POST['email'];
	require_once('../00 - BD/bd_conexao.php');
	$sql = " INSERT INTO usuario (IdUsu, Nome, Senha, Telefone,Email) VALUES ('NULL','$nome','$senha','$fone','$email')";

	if ($con->query($sql) === TRUE) {
		fecharConexao($con);
		header("Location: CadastroUso.php?success");
	} else {
		fecharConexao($con);
		header("Location: CadastroUso.php?error");
	}
}
