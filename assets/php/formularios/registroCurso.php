<?php

// Houve uma requisição post
if (!empty($_POST)) {
	//Instanciando dados do formulários
	$nome = (isSet($_POST["nome"])) ? diferenteVazio($_POST["nome"]) : false;
	$tema = (isSet($_POST["tema"])) ? diferenteVazio($_POST["tema"]) : false;
	$dataInicio = (isSet($_POST["dataInicio"])) ? diferenteVazio($_POST["dataInicio"]) : false;
	$dataFim = (isSet($_POST["dataFim"])) ? diferenteVazio($_POST["dataFim"]) : false;
	$cargaHoraria = (isSet($_POST["cargaHoraria"])) ? diferenteVazio($_POST["cargaHoraria"]) : false;
	$periodo = (isSet($_POST["periodo"])) ? diferenteVazio($_POST["periodo"]) : false;
	$dias = (isSet($_POST["dias"])) ? diferenteVazio($_POST["dias"]) : false;
	$minimoCertificado = (isSet($_POST["minimoCertificado"])) ? diferenteVazio($_POST["minimoCertificado"]) : false;
	$descricao = (isSet($_POST["descricao"])) ? diferenteVazio($_POST["descricao"]) : false;
	$cep = (isSet($_POST["cep"])) ? diferenteVazio($_POST["cep"]) : false;
	$logradouro = (isSet($_POST["logradouro"])) ? diferenteVazio($_POST["logradouro"]) : false;
	$numero = (isSet($_POST["numero"])) ? diferenteVazio($_POST["numero"]) : false;
	$cidade = (isSet($_POST["cidade"])) ? diferenteVazio($_POST["cidade"]) : false;
	$estado = (isSet($_POST["estado"])) ? diferenteVazio($_POST["estado"]) : false;
	$bairro = (isSet($_POST["bairro"])) ? diferenteVazio($_POST["bairro"]) : false;
	
	//Valida os campos e cadastra o caboclo caso esteja tudo oks
	if ($nome && $tema && $dataInicio && $dataFim && $cargaHoraria && $periodo && $dias && $minimoCertificado && $cep) {
		include_once '../dao/cursoDao.class.php';
		// Se o array $_FILES não estiver vazio realiza o upload e salva a url da imagem, caso contrário deixa o campo vazio
		$avatar = str_replace("../../avatar/", "", (!empty($_FILES["avatar"])) ? uploadAvatar($_FILES["avatar"]) : "../../avatar/avatar.jpg");
		$cursoDao = new CursoDao();
		$codCurso = $cursoDao->insereCurso($detalhes, $minimoCertificado, $avatar, $codMinistrante, $tema, $nome, $inicio, $cargaHoraria, $fim);
		
		include_once '../dao/enderecoDao.class.php';
		$enderecoDao = new EnderecoDao();
		$enderecoDao->insereEndereco($complemento, $logradouro, $codUsuario, $codCurso, $cep, $cidade, $estado, $numero);
		
		// Insere os dias de aula
		include_once '../dao/aulaDao.class.php';
		foreach (explode($dias, ", ") as $dia) {
			$aulaDao = new AulaDao();
			$aulaDao->insereAula($dia, $codCurso);
		}
		
		
		// Se o array $_FILES["arquivos"] não estiver vazio, percorre todos os itens, realizando o upload dos mesmos ao servidor
		if (!empty($_FILES["arquivos"])) {
			include_once '../dao/materiaisDao.class.php';
			for ($i = 0; $i < $_FILES["arquivos"].size; $i++) {
				$materiaisDao = new MateriaisDao();
				$materiaisDao->insereMaterial(uploadArquivoCurso($arquivo, $nome), $codCurso);
			}
		}
		
	}
}

/**
 * Verifica se o campo informado não é vazio, retorna false se vazio e o campo caso != de vazio o/
 * @param String $campo
 * @return Ambigous <String, boolean>
 */
function diferenteVazio($campo) {
	return ($campo != "") ? $campo : false;
}

/**
 * Recebe a imagem do usuário, realiza o upload e retorna o caminha da mesma no servidor
 * @param String $avatar
 * @return string
 */
function uploadAvatar($avatar) {
		// Incluímos o arquivo com a classe 
		include_once '../util/classupload.php'; 
		// Associamos a classe à variável $upload 
		$upload = new UploadImagem(); 
		// Determinamos nossa largura máxima permitida para a imagem 
		$upload->width = 250; 
		// Determinamos nossa altura máxima permitida para a imagem 
		$upload->height = 250; 
		// Exibimos a mensagem com sucesso ou erro retornada pela função salvar. 
		//Se for sucesso, a mensagem também é um link para a imagem enviada. 
		return $upload->salvar("../../avatar/", $avatar); 
}

/**
 * Recebe os arquivos submetidos no formulário e os salva no servidor
 * 
 * @param File $arquivo
 * @param String $nomeCurso
 * @return string
 */
function uploadArquivoCurso($arquivo, $nomeCurso) {
	// Incluímos o arquivo com a classe
	include_once '../util/classupload.php';
	// Associamos a classe à variável $upload
	$upload = new UploadImagem();
	// Determinamos nossa largura máxima permitida para a imagem
	$upload->width = 250;
	// Determinamos nossa altura máxima permitida para a imagem
	$upload->height = 250;
	// Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
	//Se for sucesso, a mensagem também é um link para a imagem enviada.
	return $upload->salvar("../../" + $nomeCurso + "/", $avatar);
}

?>