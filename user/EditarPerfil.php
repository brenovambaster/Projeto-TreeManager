<?php
//---- Pagina para  receber  de perfil.php e editar perfilUso.php 0609
include('seguranca.php');
require_once('../00 - BD/bd_conexao.php');

$nome = mysql_fix_string($con, $_POST['nome']);
$email = mysql_fix_string($con, $_POST['email']);
$telefone = mysql_fix_string($con, $_POST['telefone']);
$id = $_SESSION['idUsu'];

$sql = "UPDATE usuario SET nome ='$nome' ,fone='$telefone', email='$email' Where idUsuario='$id'";

if (empty($nome) && empty($email) && empty($telefone) && empty($senha)) { // não deixar entrar pela url com nenhuma valor setado
   header("location:perfil.php");
} else {
   $resultado = $con->query($sql);
   if ($con->query($sql) === TRUE) {
      $_SESSION['validarSessao'] = $nome;
      $_SESSION['email'] = $email;
      $_SESSION['fone'] = $telefone;

      echo " <script>console.log(\"sucesso ao editar perfil\");</script>";
      echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
      <script type=\"text/javascript\">
          alert(\"O seu perfil foi editado com sucesso.\");
          console.log(\"perfil editado\");
      </script>";
   } else {
      echo "erro editar";
      echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
      <script type=\"text/javascript\">
          alert(\"Falha ao editar o seu perfil\");
          console.log(\"falha ao editar perfil\");
      </script>";
   }
}


fecharConexao($con);
