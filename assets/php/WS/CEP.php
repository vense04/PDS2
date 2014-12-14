<?php

if (isSet($_GET["cep"])) {
	if (preg_match_all("/^[0-9]{5}-[0-9]{3}$/", $_GET["cep"])) {
		
		$cep = str_replace("-", "", $_GET["cep"]);
		
		$jsonReq = array(
				'cep' => $cep
		);
		
		$dados = http_build_query(
				array(
						'cep' => json_encode($jsonReq) //Transforme em string para enviar
				)
		);
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, false);
		curl_setopt($curl, CURLOPT_URL, "http://cep.republicavirtual.com.br/web_cep.php?cep=" . $cep . "&formato=json");
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$resposta = curl_exec($curl);
		curl_close($curl);
		echo($resposta);
		
	}
	else {
		$jsonReq = array(
				'erro' => "true"
		);
		print json_encode($jsonReq); //Transforme em string para enviar
	}
}

?>