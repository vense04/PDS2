// Le JavaScript responsável por validar o cadastro de usuários
$(function() {
	
	// inputs para validar
	var campoUserName = $("input[name='username']");
	var campoRg = $("input[name='rg']");
	var campoCpfCnpj = $("input[name='cpfCnpj']");
	var campoEmail = $("input[name='email']");
	var campoSenha = $("input[name='senha']");
	var campoReSenha = $("input[name='re-senha']");
	
	// Campos que precisam ser validados
	var userValido = false, emailValido = false, resenhaValido = false, cpfCnpjValido = false;
	
	//Aplicando máscaras
	campoRg.mask("00.000.000/AAAAA", {placeholder: "00.000.000/SSPMG"});
	
	// Valida CPF ou CNPJ
	campoCpfCnpj.focusout(function() {
        var cpfcnpj, element;
        element = $(this);
        element.unmask();
        cpfcnpj = element.val().replace(/\D/g, '');
        if (cpfcnpj.length > 11) {
            element.mask("99.999.999/999?9-99");
        } else {
            element.mask("999.999.999-99?9-99");
        }
        element.val(element.val().replace('?', ''));
        $.get(
				"assets/php/valida/verifica.php?cpfCnpj=" + cpfcnpj,
				function(dados, status){
					if (parseInt(dados) == 0) {
						original(campoCpfCnpj, $("#spanCpfCnpj"));
						cpfCnpjValido = true;
					}
					else {
						campoCpfCnpj.css({"background-color" : "#FF0000", "color" : "white"});
						if (campoCpfCnpj.val() == "") {
							$("#spanCpfCnpj").html("<h5>O campo CPF/CNPJ não pode ficar vazio.</h5>");
						}
						else {
							$("#spanCpfCnpj").html("<h5>Já existe um usuário com esse CPF/CNPJ.</h5>");
						}
						cpfCnpjValido = false;
					}
				}
			);
    }).trigger('focusout');
	
	// Verifica a existência do usuário no sistema
	campoUserName.keyup(function() {
		$.get(
				"assets/php/valida/verifica.php?username=" + campoUserName.val(),
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
		$.get("assets/php/valida/verifica.php?email=" + campoEmail.val(),
				function(dados, status){
					if (parseInt(dados) == 0) {
						original(campoEmail, $("#spanEmail"));
						emailValido = true;
					}
					else {
						campoEmail.css({"background-color" : "#FF0000", "color" : "white"});
						$("#spanEmail").html("<h5>Já existe um usuário com esse E-Mail, ou o formato digitado é inválido.</h5>");
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
			resenhaValido &&
			cpfCnpjValido) {
			$("#submit").removeAttr("disabled");
		}
	});
	
	//Filtra apenas imagens dos tipos desejados
	$("#avatar").change(function() {
		if ($(this).val().toLowerCase().indexOf(".jpg") > 0 ||
			$(this).val().toLowerCase().indexOf(".jpeg") > 0 ||
			$(this).val().toLowerCase().indexOf(".png") > 0) {
			$("#spanAvatar").html("");
			
			// Mostra um preview da imagem escolhida
			var oFReader = new FileReader();
		    oFReader.readAsDataURL(this.files[0]);
		    console.log(this.files[0]);
		    oFReader.onload = function (oFREvent) {
		        $('#avatarPreview').html('<img style="max-width:350px;max-height:350px; margin:10px auto !important" class="img-responsive" src="'+oFREvent.target.result+'">');
		    };
		}
		else {
			$(this).val("");
			$("#avatarPreview").html("<h5>Só são permitidos imagens do tipo jpg, jpeg, png.</h5>");
		}
	})
});