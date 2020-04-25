<?php
include('seguranca.php');

 require_once("../00 - BD/bd_conexao.php");
 $nome = $_POST['nome_cad'];
 $fone = $_POST['telefone_cad'];
 $senha = $_POST['senha_cad'];
 $email = $_POST['email'];
 $id= $_GET['id'];
 $sql = "UPDATE usuario SET nome ='$nome', senha='$senha', fone='$fone', email='$email' Where idUsuario=$id";
 $resultado = $con->query($sql);

 if ($con->query($sql) === TRUE){
   
     header("Location: CadastroUso.php?alterado");
 }else{
    header("Location: CadastroUso.php?erroAlterar");
 }

fecharConexao($con);
