<?php

// Verifica se o Username existe na base de dados
if (!empty($_GET["username"])) {
	require_once "../../../dao/usuarioDao.class.php";
	$UsuarioDao = new UsuarioDao();
 	$usuarios = $UsuarioDao->verificaUsuario($_GET["username"]);
 	print $usuarios->rowCount(); 
}
// Verifica se o E-Mail existe na base de dados
if (!empty($_GET["email"])) {
	require_once "../../../dao/contatoDao.class.php";
	$ContatoDao = new ContatoDao();
	$contatos = $ContatoDao->verificaEmail($_GET["email"]);
	if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
	    print 1;
	}
	else {
		print $contatos->rowCount();
	}
	
}
// Verifica se o CPF ou CNPJ existe na base de dados
if (!empty($_GET["cpfCnpj"])) {
	require_once "../../../dao/usuarioDao.class.php";
	$UsuarioDao = new UsuarioDao();
 	$usuarios = $UsuarioDao->verificaUsuario($_GET["cpfCnpj"]);
 	print $usuarios->rowCount(); 
}

?>