<?php
require_once('00 - BD/bd_conexao.php');
$email = $_POST['email'];
$nome = $_POST['nome'];
$fone = $_POST['fone'];
$texto = $_POST['texto'];
$data_atual = date("Y-m-d");
$status = "nao lido";
$sql = "INSERT INTO solicita ( Nome, DataSol, texto, EmailSol, statusSol, Fone) VALUES ('$nome','$data_atual','$texto','$email', '$status', '$fone')";

if ($con->query($sql) === TRUE) {

    echo "Sucesso";
} else {

    echo $con->error;
}
fecharConexao($con);
