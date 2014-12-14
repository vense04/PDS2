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
									type="text" class="form-control date-picker" name="" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Data Fim</label> <input type="text"
									class="form-control date-picker" name="" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Carga horaria</label> <input
									type="text" class="form-control" name="" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Periodo de Inscrição</label> <input
									type="text" class="form-control datepicker" name="" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Dias de Curso</label> <input type="text"
									class="form-control datepicker" name="" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Minimo para Certificado</label> <input
									type="text" class="form-control" name="" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Foto</label> <input type="file"
									class="form-control" name="" />
							</div>

							<div class="col-sm-6">
								<label class="control-label">Arquivo</label> <input type="file"
									class="form-control" name="" />
							</div>
						</div>
					</div>

					<div class="form-group" style="margin-left: 18px">
						<label class="control-label">Descrição</label>
						<textarea class="form-control" name="review" rows="10"
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
									<button type="submit" class="btn btn-theme">Enviar</button>
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
<?php
include_once 'footer.php';
?>
