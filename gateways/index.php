<?php
if (isset ( $_POST ["cod"] )) {
	$cod = $_POST ["cod"];

	
	
	$url = "http://localhost:8888/PDS2/assets/php/WS/index.php?cod=$cod";
	
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