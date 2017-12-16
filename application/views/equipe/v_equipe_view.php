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

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="logo-equipe" style="background-color: black;">
						<div class="row" align="center"  style="height: 80%; background-color: blue;margin-top: 10px; border: 1px solid #2f3f3f3; border-radius: 7px;   display: flex; align-items: center;  justify-content: center;">
							<?php 	echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'" width="320" height="320">'; 
									echo '<h3 align="center">'.$nome.'</h1>';
									foreach($paises -> result() as $p_s){
										if ($p_s->id == $pais){
											echo '<h5 align="center">'.$sigla.'</h3>';
											echo '<img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'">';
										}
									}

									foreach($regioes -> result() as $r_s){
										if ($r_s->id == $regiao){
											echo '<img src="'.site_url().'assets/img/logo-ligas/'.$r_s->sigla.'.png" width="30" height="20" alt="'.$r_s->sigla.'">';
											
										}
									}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="logo-equipe" style="background-color: green;">
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

				<div class="col-md-5" style="height: 488px; ">
				<h2>JG</h2>

				<style>
					.player-profile-rows{
						margin: 5px;
					}

					.player-profile-cell {
						border: 1px solid;
						border-color: #e4e4e4;
						height: 140px; 
						width: 100%; 
						border-radius: 10px; 
						padding: 10px;
					}

					.player-profile-pic {
						height:120px; 
						width: 35%; 
						float: left;
					}

					.player-profile-info {
						padding-left: 5px;
						height:120px; 
						width: 60%;
					}

					.player-profile-score {
						float: right;
						height:120px; 
						width: 40%;
						display: flex;
  						align-items:center;
  						justify-content:center;
						margin-right: -20px;
					}

					.profile-score {
						font-size: 70px;

					}

					.profile-nick{
						font-size: 20px;
						font-weight: bold;

					}

					.profile-nick-small{
						font-size: 16px;
						font-weight: bold;

					}

					p {
						margin: 0;

					}



				</style>

							<?php
							foreach($jogador_equipe -> result() as $j_e){
								echo '<div class="row player-profile-rows">';
								echo '<div class="player-profile-cell">';
									echo '<div class="row">';
										echo '<div class="player-profile-pic" align="center">';
										echo '<img src="'.site_url().'/assets/img/profiles/foto.jpg" width="120" height="120">';
										echo '</div>';
										echo '<div class="player-profile-info">';
											echo '<div class="player-profile-score">';
											$score_result = $j_e->at_trab + $j_e->at_ment + $j_e->at_consist + $j_e->at_mec + $j_e->at_vis;
											echo '<h1 class="profile-score">'.$score_result.'</h1>';
											echo '</div>';
											echo '<div>';
											$length = strlen($j_e->nick);
											if($length < 10){
												foreach($paises -> result() as $p_s){
													if ($p_s->id == $j_e->pais_id){
														echo '<p class="profile-nick">'.strtoupper($j_e->nick).' <span><img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'"></span></p>';
													}
												}
											}else{
												foreach($paises -> result() as $p_s){
													if ($p_s->id == $j_e->pais_id){
														echo '<p class="profile-nick-small">'.strtoupper($j_e->nick).' <span><img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'"></span></p>';
													}
												}
											}


											echo '</div>';
											
											if($j_e->funcao == 'TOP'){
												echo '<p><span class="badge badge-danger">Topo</span></p>';
											}elseif($j_e->funcao == 'MID'){
												echo '<p><span class="badge badge-info">Meio</span></p>';
											}elseif($j_e->funcao =="JNG"){
												echo '<p><span class="badge badge-success">Caçador</span></p>';
											}elseif($j_e->funcao == "SUP"){
												echo '<p><span class="badge badge-dark">Suporte</span></p>';
											}elseif($j_e->funcao == "ADC"){
												echo '<p><span class="badge badge-primary">Atirador</span></p>';
											}else{

											}

											if($j_e->titular == 0){
												echo '<p><span class="badge badge-warning">Titular</span></p> ';
											}elseif($j_e->titular == 1){
												echo '<p><span class="badge badge-secondary">Reserva</span></p> ';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							}
							?>

				</div>
			</div>
		</div>
	</div>	
