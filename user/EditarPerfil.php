<?php
//---- Pagina para  receber  de perfil.php e editar perfilUso.php 0609
include('seguranca.php');
require_once('../00 - BD/bd_conexao.php');

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$telefone = $_POST['telefone'];
$senha = addslashes($_POST['senha']);
$id = $_SESSION['idUsu'];
$sql = "UPDATE usuario SET nome ='$nome', senha='$senha', fone='$telefone', email='$email' Where idUsuario='$id'";

if (empty($nome) && empty($email) && empty($telefone) && empty($senha)) { // não deixar entrar pela url com nenhuma valor setado
   header("location:perfil.php");
} else {
   $resultado = $con->query($sql);
   if ($con->query($sql) === TRUE) /* se eu colocar a variavrl $resultado fica a msm coisa? */ {
      echo "success editar";
      header("location:perfil.php?userEdit");
   } else {
      echo "erro editar";
      header("location:perfil.php?userError");
   }
}


fecharConexao($con);
