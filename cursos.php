<?php
include_once 'header.php';

?>
<section id="portfolio" class="bg-light-gray">
	<div class="container" id="sobre">
		<div class="row">
			<div class="col-lg-12">
				<h2>Cursos</h2>
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
				$i++;
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
								<input type="hidden" id="cod" value="'.$linha["codCurso"].'" name="cod">
								<input type="hidden" id="cod" value="'.$codUsuario.'" name="cod">
								<button class="btn-theme btn" id="matricula">Cadastrar</button>
							</form>
                            <ul class="list-inline">
                                <li>Periodo de inscrições: '.$linha["inscricaoInicio"]." á ".$linha["inscricaoFim"].'</li>
                                <li>Codigo: '.$linha["codMinistrante"].'</li>
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
include_once 'footer.php'?>