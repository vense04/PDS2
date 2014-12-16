<?php
include_once 'assets/php/dao/cursoDao.class.php';
$cursos = new CursoDao ();

if(isset($_POST["dado"])){
	$curso = $_POST["dado"];
	$json = json_decode ( $curso, true );
	$cod = $json ["cod"];
	$cursos->bancoDeDados->
	echo $cod;
	
}

	
	

