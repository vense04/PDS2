// Le JavaScript responsável por validar o cadastro de usuários
$(function() {
	
	// inputs para validar
	var campoUserName = $("input[name='username']");
	var campoEmail = $("input[name='email']");
	var campoSenha = $("input[name='senha']");
	var campoReSenha = $("input[name='re-senha']");
	
	// Campos que precisam ser validados
	var userValido = false, emailValido = false, resenhaValido = false;
	
	// Verifica a existência do usuário no sistema
	campoUserName.keyup(function() {
		$.get(
				"ajax/verifica.php?username=" + campoUserName.val(),
				function(dados, status){
					if (parseInt(dados) == 0) {
						original(campoUserName, $("#spanUserName"));
						userValido = true;
					}
					else {
						campoUserName.css({"background-color" : "#FF0000", "color" : "white"});
						if (campoUserName.val() == "") {
							$("#spanUserName").html("<h5>O campo Username não pode ficar vazio.</h5>");
						}
						else {
							$("#spanUserName").html("<h5>Já existe um usuário com esse username.</h5>");
						}
						userValido = false;
					}
				}
			);
	})
	// Verifica a existência do email no sistema
	campoEmail.keyup(function() {
		$.get(
				"ajax/verifica.php?email=" + campoEmail.val(),
				function(dados, status){
					if (parseInt(dados) == 0) {
						original(campoEmail, $("#spanEmail"));
						emailValido = true;
					}
					else {
						campoEmail.css({"background-color" : "#FF0000", "color" : "white"});
						$("#spanEmail").html("<h5>Já existe um usuário com esse E-Mail.</h5>");
						emailValido = false;
					}
				}
			);		
	})
	
	// Verifica a consistencia da senha
	campoReSenha.keyup(function() {
		if (campoSenha.val() != campoReSenha.val()) {
			campoReSenha.css({"background-color" : "#FF0000", "color" : "white"});
			$("#spanReSenha").html("<h5>Você precisa repetir a senha digitada acima.</h5>");
			resenhaValido = false;
		}
		else {
			original(campoReSenha, $("#spanReSenha"));
			resenhaValido = true;
		}
	})
	
	// Retorna o campo na configuração original
	function original(campo, spam) {
		campo.css({"background-color" : "white", "color" : "black"});
		spam.html("");
	}
	
	// Quando perdo o foco do campo, valida o formulário
	$("input").blur(function() {
		if (userValido &&
			emailValido &&
			resenhaValido) {
			$("button").removeAttr("disabled");
		}
	});
	
	//Filtra apenas imagens dos tipos desejados
	$("#avatar").change(function() {
		if ($(this).val().indexOf(".jpg") > 0 ||
			$(this).val().indexOf(".jpeg") > 0 ||
			$(this).val().indexOf(".png") > 0) {
			$("#spanAvatar").html("");
		}
		else {
			$(this).val("");
			$("#spanAvatar").html("<h5>Só são permitidos imagens do tipo jpg, jpeg, png.</h5>");
		}
	})
});