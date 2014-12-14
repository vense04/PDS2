<?php 
	// Segurança do sistema
	include_once 'assets/php/include/seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Certifica Cursos</title>

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/chart.js"></script>


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>

	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><i
					class="glyphicon glyphicon-flash"></i></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="cursos.php">Cursos</a></li>
					<?php  if (!$logado) { ?>
					<li><a href="cadastrar.php">Cadastre-se</a></li>
					<li class="active"><button class="btn-theme radius" href="#login"
							data-toggle="modal" data-target=".bs-modal-sm">LOGIN</button></li>
					<?} else { ?>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="false"> <img
							class="profile-img foto"
							src="assets/img/<?= $avatar ?>" style="max-width: 100px; max-height: 41px" /> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Meus Cursos</a></li>
							<li class="divider"></li>
							<li><a href="#">Alterar Cadastro</a></li>
							<li class="divider"></li>
							<li class="divider"></li>
							<li><a href="?log=out">Sair</a></li>
						</ul></li>
					<?}?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
