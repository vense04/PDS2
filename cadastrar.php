<?php 
	include_once'header.php';
?>
	<div id="sobre">
		<div class="container">
			<h2>Cadastre-se</h2>
			<div class="row">
				<div class="col-md-6">
					<form class="form-horizontal" role="form" >

						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Nome</label>
							<div class="col-sm-10">
								<input type="text" placeholder="Nome" class="form-control">
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Email</label>
							<div class="col-sm-10">
								<input type="email" placeholder="Email" class="form-control">
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">RG</label>
							<div class="col-sm-4">
								<input type="text" placeholder="RG" class="form-control">
							</div>

							<label class="col-sm-2 control-label" for="textinput">CPF</label>
							<div class="col-sm-4">
								<input type="text" placeholder="CPF" class="form-control">
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Usuario</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Usuario" class="form-control">
							</div>

							<label class="col-sm-2 control-label" for="textinput">Senha</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Senha" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">CEP</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Cep" class="form-control">
							</div>
							<label class="col-sm-2 control-label" for="textinput">Estado</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Estado" class="form-control">
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Rua/Av.</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Rua/Av." class="form-control">
							</div>

							<label class="col-sm-2 control-label" for="textinput">Numero</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Numero" class="form-control">
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Bairro.</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Bairro" class="form-control">
							</div>

							<label class="col-sm-2 control-label" for="textinput">Cidade</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Cidade" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Telefone</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Telefone" class="form-control">
							</div>

							<label class="col-sm-2 control-label" for="textinput">Whatsapp</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Whatsapp" class="form-control">
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="textinput">Foto</label>
							<div class="col-sm-10">
								<input type="file" placeholder="Foto" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="pull-right">
									<button type="reset" class="btn btn-theme">Cancelar</button>
									<button type="submit" class="btn btn-theme">Enviar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
	include_once'footer.php';
?>