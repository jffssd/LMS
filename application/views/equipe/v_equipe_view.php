<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>




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
				<?php echo '<div class="col-md-1" style="background-color: '.$cor_primaria.'; padding: 0px; min-height: 20px;">'; 
				echo '<div style="float: right; width: 50%; height: 100%; background-color: '.$cor_secundaria.';     filter:alpha(opacity=50);	opacity: 0.5;	-moz-opacity:0.5; -webkit-opacity:0.5; "></div>';?>
				</div>
				<div class="col-md-6">
					<div class="logo-equipe">
						<div class="row" align="center"  style="margin-top: 10px; border: 1px solid #2f3f3f3; border-radius: 7px;   display: flex; align-items: center;  justify-content: center;">
							<?php 	
									echo '<div class="col-md-12" align="center">';
									echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'" width="320" height="320">'; 
									echo '</div';
									echo '<div class="row" align="center">';
									echo '<p><h3>'.strtoupper($nome).' <span class="badge badge-dark">'.strtoupper($sigla).'</span></h1></p>';
									foreach($paises -> result() as $p_s){
										if ($p_s->id == $pais){
											echo '<p>País: <img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'">'.$p_s->nome.'</p>';
										}
									}
									echo '<p>Fundado em: <strong>2011</strong>';
									foreach($regioes -> result() as $r_s){
										if ($r_s->id == $regiao){
											echo '<p>Região: <img src="'.site_url().'assets/img/logo-ligas/'.$r_s->sigla.'.png" width="30" height="20" alt="'.$r_s->sigla.'"> '.$r_s->sigla.'</p>';
										}
									}
							?>
							</div>
						</div>
					</div>
				</div>


				<style>
					.player-profile-rows{
						margin: 5px;
					}

					.player-profile-cell {
						border: 1px solid;
						border-color: #e4e4e4;
						height: 100px; 
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
						font-size: 50px;
					}

					.profile-nick{
						font-size: 20px;
					}

					.profile-nick-small{
						font-size: 13px;
					}

					p {
						margin: 0;
					}



				</style>

				<div class="col-md-4" style="height: 100%; "  align="center">
				<h2>JG</h2>
					<div class="col-md-12" style=" padding-right: 0px !important; padding-left: 0px !important;" >
						<?php 
							$count = 0;
							$break = $jogador_equipe->num_rows();
							echo '<div class="row">';
							foreach($jogador_equipe -> result() as $j_e){
								if($count % 2 == 0){
									echo '</div>';
									echo '<div class="row">';
								}
								$count++;
								echo '<div class="card" style="width: 152px; height: 240px; margin: 5px;"><img src="'.site_url().'/assets/img/profiles/'.$j_e->foto.'" width="150" height="150">';
								echo '	<div class="card-body" align="center" style="padding: 0.5rem;">';
								
								if(strlen($j_e->nick) < 10){
									echo '		<h4 class="card-title profile-nick" style="margin-bottom: 0.1rem; text-overflow: clip;">';
									echo '			<span><img src="'.site_url().'/assets/img/bandeiras/'.$j_e->pais_id.'.png" width="25" height="15"></span> ';
									echo '		<strong>'.strtoupper($j_e->nick).'</strong></h4>'; 
								}else{
									echo '		<h2 class="card-title profile-nick-small" style="margin-bottom: 0.1rem; text-overflow: clip; ">';
									echo '			<span><img src="'.site_url().'/assets/img/bandeiras/'.$j_e->pais_id.'.png" width="25" height="15"></span> ';
									echo '		<strong>'.strtoupper($j_e->nick).'</strong></h2>'; 
								}

									if($j_e->funcao == 'TOP'){
										echo '		<div style="padding-top: 10px;float:left;   display: flex;  justify-content: center; align-items: center;" align="center" ><img src="'.site_url().'/assets/img/roles/Top_icon.png" width="45" height="45">'; 							
									}elseif($j_e->funcao == 'MID'){
										echo '		<div style="padding-top: 10px;float:left;   display: flex;  justify-content: center; align-items: center;" align="center" ><img src="'.site_url().'/assets/img/roles/Mid_icon.png" width="45" height="45">'; 							
									}elseif($j_e->funcao =="JNG"){
										echo '		<div style="padding-top: 10px;float:left;   display: flex;  justify-content: center; align-items: center;" align="center" ><img src="'.site_url().'/assets/img/roles/Jungle_icon.png" width="45" height="45">'; 							
									}elseif($j_e->funcao == "SUP"){
										echo '		<div style="padding-top: 10px;float:left;   display: flex;  justify-content: center; align-items: center;" align="center" ><img src="'.site_url().'/assets/img/roles/Support_icon.png" width="45" height="45">'; 							
									}elseif($j_e->funcao == "ADC"){
										echo '		<div style="padding-top: 10px;float:left;   display: flex;  justify-content: center; align-items: center;" align="center" ><img src="'.site_url().'/assets/img/roles/Bottom_icon.png" width="45" height="45">'; 							
									}
									echo '</div>';

								echo '		<div><h1 class="profile-score">91<h1>';
								echo '		</div>';
								echo '	</div>';
								echo '</div>';
							
							}
							if($count == $break){
								echo '</div>';
							}
						?>
					
					</div>



				</div>

				<?php echo '<div class="col-md-1" style="background-color: '.$cor_primaria.'; padding: 0px; min-height: 20px;">'; 
				echo '<div style="float: left; width: 50%; height: 100%; background-color: '.$cor_secundaria.';     filter:alpha(opacity=50);	opacity: 0.5;	-moz-opacity:0.5; -webkit-opacity:0.5; "></div>';?>
				</div>
			</div>
		</div>

