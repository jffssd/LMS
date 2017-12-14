<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



	<div class="container-fluid">
		<div class="menu-nav-team">
			<?php echo '<ul class="team-nav-menu" style="background-color: '.$cor_primaria.';">';
				echo '<li class="team-nav-li" style="color: '.$cor_terciaria.';"><a href="#home">O Time</a></li>';
				echo '<li class="team-nav-li" style="color: '.$cor_terciaria.';"><a href="#news">História</a></li>';
				echo '<li class="team-nav-li" style="color: '.$cor_terciaria.';"><a href="#contact">Conquistas</a></li>';
				echo '<li class="team-nav-li" style="color: '.$cor_terciaria.';"><a href="#about">Jogadores</a></li>';
				echo '<li class="team-nav-li" style="color: '.$cor_terciaria.';"><a href="#about">Comissão</a></li>';
				?>
			</ul>
		</div>
		<div>

		
		</div>

		<div class="col-md-12" style="background-color: #f5f5f5; border: 1px solid #e2e2e2; border-radius: 7px;">
			<div class="row">
				<div class="col-md-4">
					<div class="logo-equipe">
						<div class="row"  style="background-color: white; margin-top: 10px; border: 1px solid #2f3f3f3; border-radius: 7px;">
								<?php echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'" width="280" height="280">'; ?>
						</div>
						<div class="row">
							<?php echo '<h3 align="center">'.$nome.'</h1>'; ?>
						</div>
						<div class="row">
							<?php 
								foreach($paises -> result() as $p_s){
									if ($p_s->id == $pais){
										echo '<h5 align="center">'.$sigla.'</h3>';
										echo '<img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'">';
									}
								}
							?>
						</div>
						<div class="row">
                    	<?php
						foreach($regioes -> result() as $r_s){
								if ($r_s->id == $regiao){
									echo '<img src="'.site_url().'assets/img/logo-ligas/'.$r_s->sigla.'.png" width="30" height="20" alt="'.$r_s->sigla.'">';
									
								}
						}
						?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="logo-equipe" style="">
						<div class="row" style="height:200px;">

						</div>
						<div class="row">
							<?php
							foreach($tecnicos -> result() as $t_s){
									if ($t_s->id == $tecnico){
										echo '<p>Tecnico: '.$t_s->nome.' "'.$t_s->nick.'" '.$t_s->sobrenome.' - ID: '.$t_s->id.'</p>';
									}
							}
							?>
						</div>
						<div class="row">
								<?php echo '<p>Comissão: '.$comissao.'</p>'; ?>
						</div>
						<div class="row">
								<?php echo '<p>Status: '.$status.'</p>'; ?>
						</div>
						<div class="row">
							<?= anchor('index.php/equipe', 'Voltar') ?>
						</div>
					</div>
				</div>

				<div class="col-md-4" style="height: 488px; ">
				<h2>Jogadores</h2>
					<?php
						$count = 0;
						foreach($jogador_equipe -> result() as $j_e){
							echo '<div class="row" style="background-color: red; margin-top: 10px; border: 1px solid black;">';
							echo '<img src="'.site_url().'assets/img/profiles/'.$j_e->foto.'" width="120" height="120">';
							echo '<h5>'.strtoupper($j_e->nick).'</h5>';								
							echo '<p style="margin-left: 10px;">'.$j_e->funcao.'</p>';
							foreach($paises -> result() as $p_s){
								if ($p_s->id == $j_e->pais_id){
									echo '<img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'">';
								}
							}
							echo '<h1>'.$j_e->at_trab + $j_e->at_ment + $j_e->at_consist + $j_e->at_mec + $j_e->at_vis.'</h1>';
							echo '</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>	
