<?php
include_once 'header.php';
?>
<div id="sobre">
	<div class="container">
		<h2>Cadastre-se</h2>
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" role="form">
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">Nome</label>
						<div class="col-sm-10">
							<input type="text" placeholder="Nome" name="nome" class="form-control">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">E-mail</label>
						<div class="col-sm-10">
							<input type="email" placeholder="Email" name="email" class="form-control">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">CPF/CNPJ</label>
						<div class="col-sm-10">
							<input type="text" placeholder="CPF/CNPJ" class="form-control">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">Usuario</label>
						<div class="col-sm-10">
							<input type="text" name="username" placeholder="Usuario" class="form-control">
							 <span id="spanUserName" class="text-red"></span>
						</div>

					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">Senha</label>
						<div class="col-sm-4">
							<input type="password" name="senha" placeholder="Senha" class="form-control">
						</div>

						<label class="col-sm-2 control-label" for="textinput">Re-Senha</label>
						<div class="col-sm-4">
							<input type="password" name="re-senha" placeholder="Senha novamente" class="form-control">
						</div>
						<span id="spanReSenha" class="text-red"></span>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="textinput">Foto</label>
						<div class="col-sm-10">
							<input type="file" placeholder="Foto" id="avatar"  name="avatar" class="form-control">
						</div>
						<span id="avatarPreview"></span>
						<input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
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
<script src="assets/js/app/registro.js"></script>
<?php
include_once 'footer.php';
?>