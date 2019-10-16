<?php
if (isset($_GET['id'])) {
  // Conectando com o banco (veja o arquivo bd_conexao.php)
  // Agora existe o objeto $ conectado ao BD
  require_once('../00 - BD/bd_conexao.php');
  // Recebendo as informações do formulário-excluir.php
  $id  =  $_GET['id'];
  // Criando uma string com o código SQL de exclusão
  $sql  =  "
  DELETE FROM arvore
  WHERE IdArvore = $id
  ";
  // Mandando uma consulta para o banco!
  if ($con->query($sql) ===  TRUE) {
    $flag  =  1;
    echo "Deu Certo";
    header("Location:gerenciamento_arvores.php?success");
  } else {
    $flag  =  0;
    echo "Deu pau";
  }
  // Fechando a conexão
  fecharConexao($con);
}
