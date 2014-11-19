
$(function() {
	
	// inputs para validar
	var campoUserName = $("input[name='username']");
	var campoEmail = $("input[name='email']");
	var campoSenha = $("input[name='senha']");
	var campoReSenha = $("input[name='re-senha']");
	
	// Verifica a existência do usuário no sistema
	campoUserName.keyup(function() {
		$.get(
				"ajax/verifica.php?username=" + campoUserName.val(),
				function(dados, status){
					if (parseInt(dados) == 0) {
						campoUserName.css({"background-color" : "#00FF66", "color" : "black"});
						$("#spanUserName").html("");
					}
					else {
						campoUserName.css({"background-color" : "#FF0000", "color" : "white"});
						$("#spanUserName").html("<h5>Já existe um usuário com esse username.</h5>");
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
						campoEmail.css("background-color", "#00FF66");
					}
					else {
						campoEmail.css("background-color", "#FF0000");
					}
				}
			);		
	})
	
	// Verifica a consistencia da senha
	campoReSenha.keyup(function() {
		if (campoSenha.val() != campoReSenha.val()) {
			campoReSenha.css({"background-color" : "#FF0000", "color" : "white"});
			$("#spanReSenha").html("<h5>Você precisa repetir a senha digitada acima.</h5>");
		}
		else {
			campoReSenha.css({"background-color" : "#00FF66", "color" : "black"});
			$("#spanReSenha").html("");
		}
	})
});