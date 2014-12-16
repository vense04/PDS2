<?php
if(isset($_GET)){
	$cod= $_GET["cod"];
}

include_once 'assets/php/dao/cursoDao.class.php';
$cursos = new CursoDao ();
$cursos->selecionaCursoUsuario($cod);

if($cursos->rowCount()){
	$linhas = $stmt->fetchAll ( PDO::FETCH_ASSOC );
	
	echo json_encode($linhas);
}
	
	

