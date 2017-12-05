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
		<div class="col-md-12" style="background-color: grey; ">
			<div class="row">
				<div class="col-md-4">
					<div class="logo-equipe" style="height:450px; background-color:red; ">
						<div class="row">
								<?php echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'">'; ?>
						</div>
						<div class="row">
							<?php
								var_dump($pais);
								foreach($paises -> result() as $p_s){
									if ($p_s->id == $pais){
										echo '<p>Pais: '.$p_s->nome.' ID: '.$p_s->id.'</p>';
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="logo-equipe" style="height:450px; background-color:blue; ">
						<div class="row">
							<?php echo '<p>Equipe: '.$nome.'</p>'; ?>
						</div>
						<div class="row">
							<?php echo '<p>Sigla: '.$sigla.'</p>'; ?>
						</div>
						<div class="row">
                    	<?php
						foreach($regioes -> result() as $r_s){
								if ($r_s->id == $regiao){
									echo '<p>Região: '.$r_s->sigla.' ID: '.$r_s->id.'</p>';
								}
						}
						?>
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
							<?= anchor('index.php/equipe', 'Voltar') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
