// Le JavaScript responsável pelo painel administrativo
$(function() {
	
	// inputs
	var campoCep = $("input[name='cep']");
	
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
});