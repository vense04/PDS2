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

$logado = false;

// LogOut do Sistema
if (isset ( $_GET ['log'] )) {
	if ($_GET ['log'] == 'out') {
		unset ( $_SESSION ['Usuario'] );
		header ( "location:index.php" );
	}
}
// Não Está logado ?
if (! isSet ( $_SESSION ['Usuario'] )) {
	// Está logando ?
	if (isSet ( $_REQUEST ['usuario'] )) {
		include_once "assets/php/dao/usuarioDao.class.php";
		$UsuarioDao = new UsuarioDao();
		$login = $UsuarioDao->getLogin($_REQUEST ['usuario']);
		$registro = $login->fetch ( PDO::FETCH_ASSOC );
		
		// O usuário já existe em nossa base de dados ???
		if ($registro ["username"] == $_REQUEST ['usuario']) {
			// O usuário está ativo em nossa base de dados ??
			if (!$registro ['ativo']) {
				// A string de validação está correta ??
				if ($_GET ['validaCadastro'] = $registro ["validaCadastro"]) {
					// Se sim, ativa o usuário
					$UsuarioDao = new UsuarioDao();
					$UsuarioDao->statusUsuario($registro ["username"], 1);
					
					// Cria a sessão, caso esteja tudo certo com o usuário
					$_SESSION ['Usuario'] = $registro ["codUsuario"] . '+' . $registro ["nome"] . '+' . $registro ["tipoUsuario"] . '+' . $registro ["avatar"];
					$codUsuario = $registro ["codUsuario"];
					$tipoUsuario = $registro ["tipoUsuario"];
					$nome = $registro ["nome"];
					$avatar = $registro ["avatar"];
					$logado = true;
					
				}
				// Caso contrário redireciona para o index, com a msg de validção errada
				else {
					header ( "location:index.php?erro=validacaoErrada" );
				}
			}
			// Caso o usuário esteja validado, verifica a senha digitada
			else {
				if ($registro ["senha"] != md5_base64 ( $_POST ['senha'] ) . $hash) {
					// Caso esteja incorreta, redireciona para o index, com a msg de senha errada
					header ( "location:index.php?erro=senhaErrada");
				}
				else {
					// Cria a sessão, caso esteja tudo certo com o usuário
					$_SESSION ['Usuario'] = $registro ["codUsuario"] . '+' . $registro ["nome"] . '+' . $registro ["tipoUsuario"] . '+' . $registro ["avatar"];
					$codUsuario = $registro ["codUsuario"];
					$tipoUsuario = $registro ["tipoUsuario"];
					$nome = $registro ["nome"];
					$avatar = $registro ["avatar"];
					$logado = true;
				}
			}
			
			
			
		} else {
			//Usuário inexistente
			header ( "location:index.php?erro=usuarioInexistente&usuario=" . $_REQUEST ['usuario'] . "&banco=" . $registro ["username"]);
		}
	} 
	
// 	else {
// 		//Não está logado, se não estiver realizando um cadastro, retorna para o index
// 		if (!isSet($_POST["email"])) {
// 			header ( "location:index.php?erro=true" );
// 		}
// 	}
} 
// Está logado
else {
	$sessao = explode ( '+', $_SESSION ['Usuario'] );
	$codUsuario = $sessao [0];
	$tipoUsuario = $sessao [1];
	$nome = $sessao [2];
	$avatar = $sessao [3];
	$logado = true;
}

?>