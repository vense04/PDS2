<div id="news">
	<div class="container">
		<div class="row centered">
			<h3>Cadastre-se e receba nosso informativos</h3>
			<form id="newsletter" action="javascript:void%200">
				<input type="email" placeholder="Digite o seu email" id="news-email"
					class="col-md-4 col-md-offset-3">
				<button class="btn btn-theme col-md-2" type="submit">Enviar</button>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<div id="social">
	<div class="container">
		<div class="row centered">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="col-md-3">
					<a href="#"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="col-md-3">
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</div>
				<div class="col-md-3">
					<a href="#"><i class="fa fa-twitter"></i></a>
				</div>
				<div class="col-md-3">
					<a href="#"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /social -->


<div id="f">
	<div class="container">
		<div class="row">
			<p>&copy Todos os direitos reservados</p>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/bootstrap.js"></script>



<?php  if (!$logado) { ?>
<!-- Inicio modal login -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1"
	role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="login">
						<form class="form-horizontal" id="logon" method="post">
							<div class="close-modal" data-dismiss="modal">
								<div class="lr">
									<div class="rl"></div>
								</div>
							</div>
							<h1>Login</h1>
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="userid">Usuario:</label>
									<div class="controls">
										<input required="" id="userid" name="usuario" type="text"
											class="form-control" placeholder="Usuário" class="input-medium"
											required="">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="passwordinput">Senha:</label>
									<div class="controls">
										<input required="" id="passwordinput" name="senha"
											class="form-control" type="password" placeholder=""
											class="input-medium">
									</div>
								</div>
								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="signin"></label>
									<div class="controls">
										<button type="submit" id="submit" class="btn btn-theme">Entrar</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Fim modal login -->
<?php }?>
<script type="text/javascript">
	$(function() {
		$("#logon").submit(function() {
			
		});
	})
</script>
</body>
</html>


