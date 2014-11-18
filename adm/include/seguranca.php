<?php
session_start ();
header ( 'Content-Type: text/html; charset=utf-8' );
ini_set ( 'default_charset', 'utf-8' );
$codUsuario = 0;
/**
 * @autor Rodrigo Fonseca
 * @contato rodrigofonsecajr@hotmail.com
 */
function md5_base64($data) {
	// Criptografia padrão md5
	return md5 ( $data );
}

// Hash da senha
$hash = md5_base64 ( "SistematizacaoCertificadosTabajaras" );

function confereSenha($senha, $confirmaSenha) {
	if ($senha == $confirmaSenha) {
		return true;
	} else {
		return false;
	}
}

// LogOut do Sistema
if (isset ( $_GET ['log'] )) {
	if ($_GET ['log'] == 'out') {
		unset ( $_SESSION ['Usuario'] );
		header ( "location:index.php" );
	}
}
// Não Está logado ?
if (! isSet ( $_SESSION ['Usuario'] )) {
	// Está logando
	if (isSet ( $_POST ['usuario'] )) {
		include_once "dao/usuarioDao.class.php";
		$UsuarioDao = new UsuarioDao();
		$login = $UsuarioDao->getLogin($_POST ['usuario']);
		$registro = $login->fetch ( PDO::FETCH_ASSOC );
		if ($registro ["username"] == $_POST ['usuario']) {
			if ($registro ["senha"] != md5_base64 ( $_POST ['senha'] ) . $hash) {
				header ( "location:index.php?erro=senhaErrada" );
			} else {
				// Cria a sessão
				$_SESSION ['Usuario'] = $registro ["codUsuario"] . '+' . $registro ["nome"] . '+' . $registro ["tipoUsuario"] . '+' . $registro ["avatar"];
				$codUsuario = $registro ["codUsuario"];
				$tipoUsuario = $registro ["tipoUsuario"];
				$nome = $registro ["nome"];
			}
		} else {
			//Usuário inexistente
			header ( "location:index.php?erro=usuarioInexistente" . $login->rowCount());
		}
	} else {
		//Não está logado
		header ( "location:index.php?erro=true" );
	}
} // Está logado
else {
	$sessao = explode ( '+', $_SESSION ['Usuario'] );
	$codUsuario = $sessao [0];
	$tipoUsuario = $sessao [1];
	$nome = $sessao [2];
}

?>