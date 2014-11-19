<?php

// Verifica se o Username existe na base de dados
if (!empty($_GET["username"])) {
	require_once "../dao/usuarioDao.class.php";
	$UsuarioDao = new UsuarioDao();
 	$usuarios = $UsuarioDao->getLogin($_GET["username"]);
 	print $usuarios->rowCount(); 
}
// Verifica se o E-Mail existe na base de dados
if (!empty($_GET["email"])) {
	require_once "../dao/contatoDao.class.php";
	$ContatoDao = new ContatoDao();
	$contatos = $ContatoDao->verificaEmail($_GET["email"]);
	print $contatos->rowCount();
}

?>