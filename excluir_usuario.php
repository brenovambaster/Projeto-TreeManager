<?php
require_once("00 - BD/bd_conexao.php");
$id = $_GET['id'];
$sql = " DELETE FROM usuario WHERE IdUsu = $id ";
if ($con->query($sql) === TRUE) {
    $flag = "excluido";
  } else {
    $flag = "erroExcluir";
  }

  // Fechando a conexão
  fecharConexao($con);

  if (isset($_GET['id'])) {
    header("Location: CadastroUso.php?result=$flag");
  } else {
    header("Location: errp.php?result=$flag");
  }

  ?>