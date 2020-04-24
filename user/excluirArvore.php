<?php
if (isset($_GET['id'])) {
  // Conectando com o banco (veja o arquivo bd_conexao.php)
  // Agora existe o objeto $ conectado ao BD
  require_once('../00 - BD/bd_conexao.php');
  // Recebendo as informações do formulário-excluir.php
  $id  =  $_GET['id'];
  // Criando uma string com o código SQL de exclusão

  $sql1 = "SELECT Situacao FROM arvore where IdArvore = '$id'";
  $result = $con->query($sql1);
  $info = mysqli_fetch_object($result);

  if ($info->Situacao == 'cadastrada') {
    echo "<h2>Não se pode excluir essa árvore pois ela já foi validada pelo adm. Caso nessecite fazer alguma mudança, crie uma solicitação de serviço para esta árvore </h2>";
  } else {

    $sql  =  "DELETE FROM arvore WHERE IdArvore = $id";
    // Mandando uma consulta para o banco!
    if ($con->query($sql) ===  TRUE) {
      $flag  =  1;
      echo "Deu Certo";
      header("Location:gerenciamento_arvores.php?success");
    } else {
      $flag  =  0;
      echo "Deu erro";
    }
  }
  // Fechando a conexão
  fecharConexao($con);
}
