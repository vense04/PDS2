// Le JavaScript responsável pelo painel administrativo
$(function() {
	
	// inputs
	var campoNome = $("input[name='nome']");
	var campoTema = $("input[name='tema']");
	var campoDataInicio = $("input[name='dataInicio']");
	var campoDataFim = $("input[name='dataFim']");
	var campoCargaHoraria = $("input[name='cargaHoraria']");
	var campoPeriodo = $("input[name='periodo']");
	var campoDias = $("input[name='dias']");
	var campoMinimoCertificado = $("input[name='minimoCertificado']");
	var campoDescricao = $("input[name='descricao']");
	var campoCep = $("input[name='cep']");
	var campoNumero = $("input[name='numero']");
	
	$("input").blur(function() {
		if (validaCampo(campoNome) &&
			validaCampo(campoTema) &&
			validaCampo(campoDataInicio) &&
			validaCampo(campoDataFim) &&
			validaCampo(campoCargaHoraria) &&
			validaCampo(campoPeriodo) &&
			validaCampo(campoDias) &&
			validaCampo(campoMinimoCertificado) &&
			validaCampo(campoDescricao) &&
			validaCampo(campoCep) &&
			validaCampo(campoNumero)) {
			$("#submit").removeAttr("disabled");
		}
	});
	
	campoCep.mask("00000-000",{placeholder:"38408-000"});
	campoCep.keyup(function() {
		$.get(
			'assets/php/WS/CEP.php?cep=' + $(this).val()
			,	function(dados, status) {
				var dados = JSON.parse(dados);
				$('input[name="cidade"]').val(dados.cidade);
				$('input[name="estado"]').val(dados.uf);
				$('input[name="bairro"]').val(dados.bairro);
				$('input[name="logradouro"]').val(dados.logradouro);
				if (typeof dados.cidade != 'undefined') {
					$('input[name="numero"]').focus();
				}
			}
		)
	})
	
	/**
	 * validaCampo(campo)
	 * 
	 * Caso o campo esteja vazio retorna false, se não true
	 * 
	 * campo Input
	 * return true : false
	 */
	function validaCampo(campo) {
		return (campo.val() != "") ? true : false;
	}
	
});