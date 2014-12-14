<?php
include_once 'header.php';
?>
<div id="sobre">
	<div class="container">
		<div class="row">
			<h2>Cadastre-se</h2>
			<div class="col-md-9">
				<form class="form-horizontal" role="form">
					<div class="form-group container">
						<div class="row">
							<div class="col-md-8">
								<label class="control-label">Nome</label> 
								<input type="text" class="form-control" name="nome" />
							</div>
						</div>
					</div>
					<div class="form-group container">
						<div class="row">
							<div class="col-md-8">
								<label class="control-label">Email</label> <input type="text"
									class="form-control" name="email" />
									<span id="spanEmail" class="text-red"></span>
							</div>
						</div>
					</div>
					<div class="form-group container">
						<div class="row">
							<div class="col-md-4">
								<label class="control-label">RG</label> <input type="text"
									class="form-control" name="rg" /> <span id="spanRg"
									class="text-red"></span>
							</div>

							<div class="col-md-4">
								<label class="control-label">CPF/CNPJ</label> <input type="text"
									class="form-control" name="cpfCnpj" /> <span id="spanCpfCnpj"
									class="text-red"></span>
							</div>
						</div>
					</div>
					<div class="form-group container">
						<div class="row">
							<div class="col-md-8">
								<label class="control-label">Usuario</label> <input type="text"
									class="form-control" name="username" /> <span id="spanUserName"
									class="text-red"></span>
							</div>
						</div>
					</div>


					<div class="form-group container">
						<div class="row">
							<div class="col-md-4">
								<label class="control-label">Senha</label> <input
									type="password" class="form-control" name="senha" />
							</div>

							<div class="col-md-4">
								<label class="control-label">Re-Senha</label> <input
									type="password" class="form-control" name="re-senha" /> <span
									id="spanReSenha" class="text-red"></span>
							</div>
						</div>
					</div>

					<div class="form-group container">
						<div class="row">
							<div class="col-md-8">
								<label class="control-label">Foto</label> <input type="file"
									class="form-control" name="avatar" id="avatar" /> <span
									id="avatarPreview"></span> <input type="hidden"
									name="MAX_FILE_SIZE" value="1024000" />
							</div>
						</div>
					</div>

					<div class="form-group container">
						<div class=" col-md-8">
							<div class="pull-right">
								<button type="reset" class="btn btn-theme">Cancelar</button>
								<button id="submit" type="submit" disabled="disabled" class="btn btn-theme">Enviar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/app/registro.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<?php
include_once 'footer.php';
?>
