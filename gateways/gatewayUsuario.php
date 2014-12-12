<?php
/**
 * Responsável por manipular os dados do usuário e direcionar a classe
 * 
 */

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, true);

if (isSet($_POST["usuario"])) {
	// Transforma o JSON em um array PHP
	$usuario = json_decode($_POST["usuario"], true);
	
	validaDados($usuario);
	
	function validaDados($usuario) {
		
		// Direciona para a requisição correta
		if ($usuario["acao"] == "cadastro" ||
			$usuario["acao"] == "editar") {
			if ($usuario["nome"] != "" 		&&
				$usuario["email"] != "" 	&&
				$usuario["cpfCnpj"] != "" 	&&
				$usuario["celular"] != "") {
				
				$dados = $_POST["usuario"];
				
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$resposta = curl_exec($curl);
				curl_close($curl);
				
			}
			else {
				$dados = http_build_query(
						array(
								'status' => 'Erro'
								,	'mensagem' => 'Erro, dados insuficientes.'
						)
				);
				$resposta = json_encode($dados);
			}
			
		}
		elseif ($usuario["acao"] == "deletar") {
			if ($usuario["codUsuario"] != "") {
				
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$resposta = curl_exec($curl);
				curl_close($curl);
				
			}
			else {
				$dados = http_build_query(
						array(
								'status' => 'Erro'
								,	'mensagem' => 'Erro, dados insuficientes.'
						)
				);
				$resposta = json_encode($dados);
			}
		}
		
		
		
	}
	
	
	
}
else {
	$dados = http_build_query(
			array(
								'status' => 'Erro'
								,	'mensagem' => 'Erro, usuário não informado.'
						)
	);
	$resposta = json_encode($dados);
}

// A resposta sempre será um JSON
print $resposta;

?>