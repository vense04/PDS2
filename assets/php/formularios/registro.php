<?php
// Segurança do sistema
include_once '../include/seguranca.php';

// Houve uma requisição post
if (!empty($_POST)) {
	//Instanciando dados do formulários
	$nome = (isSet($_POST["nome"])) ? diferenteVazio($_POST["nome"]) : false;
	$email = (isSet($_POST["email"])) ? diferenteVazio($_POST["email"]) : false;
	$username = (isSet($_POST["username"])) ? diferenteVazio($_POST["username"]) : false;
	$rg = (isSet($_POST["rg"])) ? diferenteVazio($_POST["rg"]) : false;
	$cpfCnpj = (isSet($_POST["cpfCnpj"])) ? diferenteVazio($_POST["cpfCnpj"]) : false;
	$senha = (isSet($_POST["senha"])) ? diferenteVazio($_POST["senha"]) : false;
	$reSenha = (isSet($_POST["re-senha"])) ? diferenteVazio($_POST["re-senha"]) : false;
	// Caso a senha seja diferente do reperir senha
	$senha = ($senha == $reSenha) ? $senha : false;
	//Valida os campos e cadastra o caboclo caso esteja tudo oks
	if ($nome && $email && $username && $senha && $cpfCnpj) {
		include_once '../dao/usuarioDao.class.php';
		include_once '../dao/contatoDao.class.php';
		// Se o array $_FILES não estiver vazio realiza o upload e salva a url da imagem, caso contrário deixa o campo vazio
		$avatar = str_replace("../../img/", "", (!empty($_FILES["avatar"])) ? uploadAvatar($_FILES["avatar"]) : "../../img/avatar.jpg");
		$usuarioDao = new UsuarioDao();
		// Url para desbloqueio
		$validaCadastro = md5_base64(md5_base64($senha) . $hash . "validador de senha") . $hash;
		// Insere o usuário e guarda o retorno, o codUsuario
		$codUsuario = $usuarioDao->registro($nome, md5_base64($senha) . $hash, $validaCadastro, $username, 0, $avatar, $rg, $cpfCnpj);
		$contatoDao = new ContatoDao();
		//Cadastra o E-Mail do caboclo, campo tipoContato (E-Mail = 1)
		$contatoDao->insereContato($_POST["email"], 1, $codUsuario);
		
		/**
		 * 
		 * Agora é enviar o email com os dados com camarada, o link vai ser a url + $validaCadastro para desbloquear o camarada oks
		 * daí o vinícius monta uma tela para avisar que ele vai receber um email e a tela que mostra o cadastro desbloqueado oks
		 * 
		 */
		
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
		return $upload->salvar("../../img/", $avatar); 
}

?>