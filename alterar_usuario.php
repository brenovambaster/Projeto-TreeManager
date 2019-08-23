<?php
 require_once("00 - BD/bd_conexao.php");
 $nome = $_POST['nome_cad'];
 $fone = $_POST['telefone_cad'];
 $senha = $_POST['senha_cad'];
 $email = $_POST['email'];
 $id= $_GET['id'];
 $sql = "UPDATE usuario SET Nome ='$nome', Senha='$senha', Telefone='$fone', Email='$email' Where IdUsu=$id";
 $resultado = $con->query($sql);

 if ($con->query($sql) === TRUE){
   
     header("Location: CadastroUso.php?alterado");
 }else{
    header("Location: CadastroUso.php?erroAlterar");
 }

fecharConexao($con);








?>