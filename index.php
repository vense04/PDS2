<?php
include_once 'header.php';
?>

<div id="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 centered">
				<h1>Certifica Cursos</h1>
				<h2>O melhor certificados de todos os tempos</h2>
			</div>
			<!-- /col-lg-8 -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /hello -->

<div id="green">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 centered">
				<img src="assets/img/iphone.png" alt="">
			</div>

			<div class="col-lg-7 centered">
				<h3>SOBRE</h3>
				<p>Muito obrigado pela confiança e por acreditar, como nós
					acreditamos, que dá para "despanelizar" o recrutamento na área,
					apresentando pessoas bacanas para empresas bacanas.</p>


			</div>
		</div>
	</div>
</div>

<section id="portfolio" class="bg-light-gray">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="section-heading">Cursos</h1>
			</div>
		</div>
		<div class="row">
			<?php
			include_once 'assets/php/dao/cursoDao.class.php';
			$cursos = new CursoDao ();
			$stmt = $cursos->selecionaCursos ();
			
			$i = 0;
			while ( $linha = $stmt->fetch () ) {
				echo '<div class="col-md-4 col-sm-6 portfolio-item">';
				echo '<a href="#portfolioModal' . $i . '" class="portfolio-link" data-toggle="modal">';
				echo '<div class="portfolio-hover">';
				echo '<div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div> ';
				echo '</div> <img src="assets/avatar/' . $linha ["avatar"] . '" class="img-responsive" alt="">';
				echo '</a> ';
				echo '<div class="portfolio-caption"> 
			 					<h4>' . $linha ["nome"] . '</h4> 
			 					<p class="text-muted">' . $linha ["tema"] . '</p> 
			 		  </div>';
				echo '</div>';
				$i ++;
			}
			?>
		</div>
	</div>
</section>
<?php
include_once 'assets/php/dao/cursoDao.class.php';
$cursos = new CursoDao ();
$stmt = $cursos->selecionaCursos ();

$i = 0;
while ( $linha = $stmt->fetch () ) {
echo'<div class="portfolio-modal modal fade" id="portfolioModal'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            Inicio: '.$linha["inicio"].'
                            <h2>'.$linha["nome"].'</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive" src="assets/avatar/'.$linha["avatar"].'" alt="">
                            <p>'.$linha["detalhes"].'</p>
                            <p>Quer se cadastrar nesse curso? Você pode se cadastrar e de graça, cortesia de Certificados Cursos.</p>
							<form action="assets/php/formularios/matriculaCurso.php" method="post" id="formcurso">
								<input type="hidden" id="cod" value="<?php echo  $codUsuario?>" name="cod">
								<button class="btn-theme btn" id="matricula">Cadastrar</button>
							</form>
                            <ul class="list-inline">
                                <li>Periodo de inscrições: '.$linha["inscricaoInicio"]." á ".$linha["inscricaoFim"].'</li>
                                <li>Codigo: <span id="codCurso">'.$linha["codCurso"].'</span></li>
                                <li>Tema: '.$linha["tema"].'</li>
                            </ul>
                            <button type="button" class="btn btn-theme pull-right" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
$i++;
}
?>

<?php
include_once 'footer.php';
?>