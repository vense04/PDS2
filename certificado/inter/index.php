<?php
if (isset ( $_POST ["gerar"] )) {
	$gerar = $_POST ["gerar"];
	
	$val = json_decode ( $gerar, true );
	
	$cod = utf8_decode ( $val ["cod"] );
	$curso = utf8_decode ( $val ["curso"] );
	$dataini = utf8_decode ( $val ["dataini"] );
	$datafim = utf8_decode ( $val ["datafim"] );
	$cargah = utf8_decode ( $val ["cargah"] );
	$nome = utf8_decode ( $val ["nome"] );
	
	$json = array (
			"nome" => $nome,
			"cod" => $cod,
			"curso" => $curso,
			"cargah" => $cargah,
			"dataini" => $dataini,
			"datafim" => $datafim 
	);
	
	$dados = http_build_query ( array (
			"certificado" => json_encode ( $json ) 
	) );
	
	$url = "http://localhost:8888/Certificados/ws/index.php";
	
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_POST, true );
	curl_setopt ( $curl, CURLOPT_URL, $url );
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $dados );
	curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt ( $curl, CURLOPT_HEADER, false );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
	$resposta = curl_exec ( $curl );
	curl_close ( $curl );
	
	echo $resposta;
}
?>