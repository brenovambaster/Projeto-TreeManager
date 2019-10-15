<?php
//---- Pagina para  receber  de perfil.php e editar perfilUso.php 0609
include('seguranca.php');
require_once('../00 - BD/bd_conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$id = $_SESSION['IdUsu'];
$sql = "UPDATE usuario SET Nome ='$nome', Senha='$senha', Telefone='$telefone', Email='$email' Where IdUsu='$id'";
$resultado = $con->query($sql);
if ($con->query($sql) === TRUE) {
   echo "success editar";
} else {
   echo "erro editar";
}

fecharConexao($con);
