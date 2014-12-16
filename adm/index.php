<?php
// Segurança do sistema
include_once '../assets/php/include/seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Administrator</title>
<meta name="generator" content="Bootply" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/styles.css" rel="stylesheet">

<!--  JS -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="../assets/js/jquery-ui.multidatespicker.js"></script>

<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/scripts.js"></script>



<script>
	$(function() {
		$(".most-ocul").click(function() {
			if ($(this).html() == "Ocultar") {
				$(this).empty();
				$(this).html("Mostrar");
			} else {
				$(this).empty();
				$(this).html("Ocultar");
			}
		})

	});
</script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- main right col -->
				<div class="column col-sm-12 col-md-12 col-lg-12 col-xs-11"
					id="main">

					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button"
								data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span> <span class="icon-bar"></span>
								<span class="icon-bar"></span> <span class="icon-bar"></span>
							</button>
							<a href="/" class="navbar-brand logo"><i
								class="glyphicon glyphicon-flash"></i></a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm"
									style="max-width: 360px;">
									<input type="text" class="form-control" placeholder="Search"
										name="srch-term" id="srch-term">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="glyphicon glyphicon-search"></i>
										</button>
									</div>
								</div>
							</form>
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
								<li><a href="#cadastroModal" role="button" data-toggle="modal"><i
										class="glyphicon glyphicon-plus"></i> Cadastrar Curso</a></li>
								<li><a href="#atualizaModal" role="button" data-toggle="modal"><i
										class="glyphicon glyphicon-refresh"></i> Atualiza Dados</a></li>
								<!-- 								<li><a href="#"><span class="badge">badge</span></a></li> -->
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown"><a href="#" class="dropdown-toggle"
									data-toggle="dropdown"><i
										class="glyphicon glyphicon-arrow-left"></i></a>
									<ul class="dropdown-menu">
										<li><a href="../index.php">Voltar ao Site</a></li>
									</ul></li>
							</ul>

						</nav>
					</div>
					<!-- /top nav -->

					<div class="padding">
						<div class="full col-sm-9">

							<!-- content -->
							<div class="row">

								<!-- main col left -->
								<div class="col-sm-5">

									<div class="panel panel-default">
										<div class="panel-thumbnail">
											<img src="http://placehold.it/600x250" class="img-responsive">
										</div>
										<div class="panel-body">
											<p class="lead">Urbanization</p>
											<p>45 Followers, 13 Posts</p>

											<p>
												<img
													src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28"
													width="28px" height="28px">
											</p>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a href="#cursos-concluidos" data-toggle="collapse"
												data-target="#cursos-concluidos"
												class="pull-right most-ocul"> Mostrar </a>
											<h4>Todos os Cursos</h4>
										</div>
										<div class="panel-body">
											<div id="cursos-concluidos" class="collapse">
												<div class="panel-body">

													<table class="table table-hover" id="dev-table">
														<thead>
															<tr>
																<th>Nome do Curso</th>
																<th>Arquivos</th>
																<th>Certificado</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>$linha["nome"]</td>
																<td><a href="#"><span class="glyphicon glyphicon-inbox"></span></a></td>
																<td><a href="#"><span class="glyphicon glyphicon-print"></span></a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4>What Is Bootstrap?</h4>
										</div>
										<div class="panel-body">Bootstrap is front end frameworkto
											build custom web applications that are fast, responsive &amp;
											intuitive. It consist of CSS and HTML for typography, forms,
											buttons, tables, grids, and navigation along with
											custom-built jQuery plug-ins and support for responsive
											layouts. With dozens of reusable components for navigation,
											pagination, labels, alerts etc..</div>
									</div>
								</div>

								<!-- main col right -->
								<div class="col-sm-7">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4>Lista de Presença</h4>
										</div>
										<div class="panel-body">
											<!-- Select Basic -->
											<div class="form-group">
												<label class="col-md-2 control-label" for="selectbasic">Curso</label>
												<div class="col-md-4">
													<select id="selectbasic" name="selectbasic"
														class="form-control">
														<option value="1">Curso1</option>
														<option value="2">Curso1</option>
													</select>
												</div>
												<label class="col-md-2 control-label" for="selectbasic">Data</label>
												<div class="col-md-4">
													<input type="text" placeholder="Data do curso"
														class="form-control date-picker">.
												</div>
											</div>
											<form class="form-horizontal">
												<table class="table table-hover col-sm-10" id="dev-table">
													<thead>
														<tr>
															<th>Nome do Aluno</th>
															<th>Presença</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Trout</td>
															<td><input type="checkbox" name="checkboxes" id=""
																value="1"></td>
														</tr>
														<tr>
														
														
														<tr>
															<td>Trout</td>
															<td><input type="checkbox" name="checkboxes"
																id="checkboxes-0" value="1"></td>
														</tr>
													</tbody>
												</table>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-8">
														<div class="pull-right">
															<button type="submit" class="btn btn-theme">Salvar</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--/row-->

							<div class="row">
								<div class="col-sm-6">
									<a href="#">Twitter</a> <small class="text-muted">|</small> <a
										href="#">Facebook</a> <small class="text-muted">|</small> <a
										href="#">Google+</a>
								</div>
							</div>

							<div class="row" id="footer">
								<div class="col-sm-6"></div>
								<div class="col-sm-6">
									<p>
										<a href="#" class="pull-right">©Copyright 2013</a>
									</p>
								</div>
							</div>

							<hr>

							<h4 class="text-center">
								<a href="http://bootply.com/96266" target="ext">Download this
									Template @Bootply</a>
							</h4>

							<hr>


						</div>
						<!-- /col-9 -->
					</div>
					<!-- /padding -->
				</div>
				<!-- /main -->

			</div>
		</div>
	</div>

	<!-- Cadastro Modal -->
	<div id="cadastroModal" class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h1>Cadastrar Curso</h1>
				</div>

				<form class="" role="form"
					action="../assets/php/formularios/registroCurso.php" method="post"
					enctype="multipart/form-data">
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
								<label class="control-label">Carga horaria</label> <input
									type="text" class="form-control" name="cargaHoraria" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Periodo de Inscrição</label> <input
									type="text" class="form-control  periodo" name="periodo" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Dias de Curso</label> <input
									type="text" class="form-control  dias" name="dias" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Minimo para Certificado</label> <select
									class="form-control" name="minimoCertificado">
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

							<!-- 							<div class="col-sm-6"> -->
							<!-- 								<label class="control-label">Arquivo</label> <input type="file" -->
							<!-- 									class="form-control" name="" /> -->
							<!-- 							</div> -->
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
									class="form-control" name="cep" id="cep" />
							</div>
							<div class="col-sm-8">
								<label class="control-label">Rua/Av.</label> <input type="text"
									class="form-control" name="logradouro" id="rua" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">Numero</label> <input type="text"
									class="form-control" name="numero" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Bairro</label> <input type="text"
									class="form-control" name="bairro" id="bairro" />
							</div>

							<div class="col-sm-4">
								<label class="control-label">Cidade</label> <input type="text"
									class="form-control" name="cidade" id="cidade" /> <input
									type="hidden" class="form-control" name="estado" id="uf" />
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

	<!--Atualiza modal-->
	<div id="atualizaModal" class="modal fade" tabindex="-1" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h1>Atualiza Dados</h1>
				</div>
				<form id="">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Nome</label> <input type="text"
									class="form-control" name="nome" />
							</div>
							<div class="col-sm-6 selectContainer">
								<label class="control-label">Senha</label> <input
									type="password" class="form-control" name="tema" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Email</label> <input type="text"
									class="form-control" name="nome" />
							</div>
							<div class="col-sm-6">
								<label class="control-label">Foto</label> <input type="file"
									class="form-control" name="" />
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


</body>
</html>




