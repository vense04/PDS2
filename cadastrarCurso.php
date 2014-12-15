<?php
include_once 'header.php';
if (!$logado) {
	header ( "location:index.php?erro=naoLogado");
}
?>
<div id="sobre">
	<div class="container">
		<div class="row">
			<h2>Cadastrar Curso</h2>
			<div class="col-md-9">
				<form class="form-horizontal" role="form" action="assets/php/formularios/registro.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-8">
								<label class="control-label">Nome</label> <input type="text"
									class="form-control" name="nome" />
							</div>

							<div class="col-sm-4 selectContainer">
								<label class="control-label">Tema</label> <input type="text"
									class="form-control" name="tema" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Data Inicio</label> <input
									type="text" class="form-control date-picker" name="dataInicio" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Data Fim</label> <input type="text"
									class="form-control date-picker" name="dataFim" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Carga horaria (Horas)</label> <input
									type="text" class="form-control" name="cargaHoraria" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Periodo de Inscrição</label> <input
									type="text" class="form-control periodo" name="periodo" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Dias de Curso (Aulas)</label> <input type="text"
									class="form-control dias" name="dias" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Minimo para Certificado</label> 
								<select class="form-control" name="minimoCertificado">
									<option value="50">50%</option>
									<option value="60">60%</option>
									<option value="70">70%</option>
									<option value="80">80%</option>
									<option value="90">90%</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Foto</label> <input type="file"
									class="form-control" name="avatar" />
							</div>

							<div class="col-sm-6">
								<label class="control-label">Arquivo</label> <input type="file"
									class="form-control" name="arquivos" multiple="multiple" />
							</div>
						</div>
					</div>

					<div class="form-group" style="margin-left: 18px">
						<label class="control-label">Descrição</label>
						<textarea class="form-control" name="descricao" rows="10"
							style="width: 98%; height: 80px"></textarea>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 selectContainer">
								<label class="control-label">CEP</label> <input type="text"
									class="form-control" name="cep" />
							</div>
							<div class="col-sm-4">
								<label class="control-label">Rua/Av.</label> <input type="text" readonly="readonly"
									class="form-control" name="logradouro" />
							</div>
							
							<div class="col-sm-4">
								<label class="control-label">Numero</label> <input type="text"
									class="form-control" name="numero" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Cidade</label> <input type="text" readonly="readonly"
									class="form-control" name="cidade" />
							</div>
							
							<div class="col-sm-4">
								<label class="control-label">Estado</label> <input type="text" readonly="readonly"
									class="form-control" name="estado" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Bairro</label> <input type="text" readonly="readonly"
									class="form-control" name="bairro" />
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-8">
								<div class="pull-right">
									<button type="reset" class="btn btn-theme">Cancelar</button>
									<button type="submit" id="submit" class="btn btn-theme" disabled="disabled">Cadastrar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/adm/cadastrarCurso.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/styles.css" rel="stylesheet">

<link href="../assets/css/daterangepicker.css" rel="stylesheet">


<!--  JS -->
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="assets/js/jquery-ui.multidatespicker.js"></script>




<script>
	$(function() {
		$(".periodo").multiDatesPicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior',
		    maxPicks: 2
		});
		$(".dias").multiDatesPicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
		$(".date-picker").datepicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
		
	});
</script>
<?php
include_once 'footer.php';
?>
