<?php
require_once('./seguranca.php');
require_once('../00 - BD/bd_conexao.php');


if (!isset($_POST['butaoLogin'])) {
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?urlNot'>";
}

// Pegando as informações do formulário.
$email  = mysql_fix_string($con, $_POST['email_login']);
$senha  = hashandsalt($_POST['senha_login'], $con);
$lembrarme = $_POST['lembrarme'];
//**TENHO QUE RECEBER O OPAÇAO DE MARTER-ME LOGADO 

// Criando a minha string com o código SQL de consulta
$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

// Mando a SQL para o banco através do método query da 
//    classe de conexão mysqli() expressa pelo obj $con
$resultado = $con->query($sql) or die("Erro ao conectar com o Banco");


// Transformando a estrutura do $resultado em um obj.
//    com as informações dos campos da tabela no BD.
$infoUsuario = mysqli_fetch_object($resultado);

if (empty($infoUsuario)) {
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?error_login'>";
} else {
	// Adicionando uma informação à sessão
	if ($infoUsuario->status == 'ativo') {
		$_SESSION['validarSessao'] = $infoUsuario->nome;
		$_SESSION['idUsu'] = $infoUsuario->idUsuario;
		$_SESSION['email'] = $infoUsuario->email;
		$_SESSION['senha'] = $infoUsuario->senha;
		$_SESSION['fone'] = $infoUsuario->fone;
		$_SESSION['foto'] = $infoUsuario->foto;
		if($lembrarme == "logado"){
			setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 365, '/');
		}
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>";
	} else {
		echo "Infelizmente você foi desativado. Se isso foi um erro, contate ao adm pelo formulário na página inicial\n";

		echo '<a href="../index.php?#contato">Clique aqui</a>';
	}
}

// Fechando a conexção
fecharConexao($con);
