<?php
include('seguranca.php');
require_once('../00 - BD/bd_conexao.php');
$id = $_SESSION['idUsu'];
$arquivo    = $_FILES['arquivo']['name'];
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb
$formatoPermitido = array("png", "jpeg", "jpg", "gif");
$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['arquivo']['error'] != 0) {
    echo ("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
   <script type=\"text/javascript\">
      alert(\"Não foi possivel fazer o upload\");
   </script>";



    exit; //Para a execução do script
}

if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "Arquivo Muito Grande. Máximo é 5MB";
    exit;
}

if (in_array($extensao, $formatoPermitido)) {
    $pasta = "foto_perfil/";
    $temporario = $_FILES['arquivo']['tmp_name'];
    $novoName = uniqid() . ".$extensao";

    if (move_uploaded_file($temporario, $pasta . $novoName)) {
        $mensagem = "Enviado com sucesso";
    } else {
        $mensagem = "falha ao enviar foto";
    }
} else {
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
   <script type=\"text/javascript\">
      alert(\"A imagem não foi cadastrada. Extesão inválida.\");
   </script>
";
    exit;
}
echo $mensagem;

$sql = "SELECT foto from usuario WHERE idUsuario=$id";
$resultado = $con->query($sql);
$info = $resultado->fetch_array(MYSQLI_ASSOC);
$foto = $info['foto'];
if ($foto != 'perfil.png')
    unlink("foto_perfil/$foto");


$sql = "UPDATE usuario SET  foto='$novoName' Where idUsuario='$id'";
$resultado = $con->query($sql);
if ($con->query($sql) === TRUE) {
    $_SESSION['foto'] = $novoName;
    echo "success editar";
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
    <script type=\"text/javascript\">
        alert(\"A imagem  foi cadastrada com sucesso.\");
    </script>
";
} else {
    echo "erro editar";
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
    <script type=\"text/javascript\">
        alert(\"A imagem não foi cadastrada \");
    </script>
";
}

fecharConexao($con);
