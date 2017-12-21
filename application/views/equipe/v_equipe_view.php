<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


		<style>

		a:hover{
			background-color red;
		}
		</style>


		<?php echo '<div class="menu-nav-team" style="margin-bottom: 10px; background-color: #DFDFDF; padding: 10px; padding-bottom: 0px; border-radius: 7px;">'; ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<?php echo '<a class="nav-link active" style="color: '.$cor_terciaria.';" href="#">HOME</a>'; ?>
				</li>
				<li class="nav-item">
					<?php echo '<a class="nav-link" style="color: '.$cor_terciaria.';" href="#">JOGADORES</a>'; ?>
				</li>
				<li class="nav-item">
					<?php echo '<a class="nav-link" style="color: '.$cor_terciaria.';" href="#">CONQUISTAS</a>'; ?>
				</li>
			</ul>
		</div>

		<div class="col-md-12" style="background-color: #DFDFDF; border-radius: 15px;">
			<div class="row">

			<?php 
			echo '	<div class="col-md-1" style="background-color: '.$cor_primaria.'; padding: 0px; min-height: 20px;">'; 
			echo '		<div style="float: right; width: 50%; height: 100%; background-color: '.$cor_secundaria.';     filter:alpha(opacity=50);	opacity: 0.5;	-moz-opacity:0.5; -webkit-opacity:0.5; ">';
			echo '		</div>';
			echo '	</div>';
			?>
				<div class="col-md-6">
					<div class="row" align="center"  style="margin-top: 10px; display: flex; align-items: center;  justify-content: center;">
						<?php 	
							echo '<div class="col-md-12" align="center">';
							echo '	<div class="card">';
							echo '		<h4 class="card-header">'.strtoupper($nome).'  <span class="badge badge-dark">'.strtoupper($sigla).'</h4>';
							echo '		<div class="card-body">';
							echo '			<div><img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'" width="280" height="280"></div>'; 
							echo '			<ul class="list-group list-group-flush">';
							echo '				<li class="list-group-item" style="padding: 0px;">';
							echo '					<div class="row">';
							echo '					<div style="background-color: #DFDFDF; width: 15%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">País</div>';
							echo '					<div style="width: 35%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;"><img src="'.site_url().'assets/img/bandeiras/'.$pais.'.png" width="30" height="20"> Brasil</div>';
							echo '					<div style="background-color: #DFDFDF; width: 15%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Região</div>';
							echo '					<div style="width: 35%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;"><img src="'.site_url().'assets/img/logo-ligas/CBLOL.png" width="30" height="20""> CBLOL</div>';
							echo '					</div>';
							echo '				</li>';
							echo '				<li class="list-group-item" style="padding: 0px;">';
							echo '					<div class="row">';
							echo '					<div style="background-color: #DFDFDF; width: 15%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Coach</div>';
							echo '					<div style="width: 85%; height:30px;">Alvaro "juC" Souza</div>';
							echo '					</div>';
							echo '				</li>';
							echo '				<li class="list-group-item" style="padding: 0px;">';
							echo '					<div class="row">';
							echo '					<div style="background-color: #DFDFDF; width: 15%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Criação</div>';
							echo '					<div style="width: 35%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">10/12/2009</div>';
							echo '					<div style="background-color: #DFDFDF; width: 15%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Status</div>';
							echo '					<div style="width: 35%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Ativo</div>';
							echo '					</div>';
							echo '				</li>';
							echo '				<li class="list-group-item" style="padding: 0px;">';
							echo '					<div style="background-color: #DFDFDF; width: 100%; height:40px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;"><img src="'.site_url().'assets/img/social/facebook.png" width="40" height="40"><img src="'.site_url().'assets/img/social/twitter.png" width="40" height="40"><img src="'.site_url().'assets/img/social/facebook.png" width="40" height="40"></div>';
							echo '				</li>';
							echo '  		</ul>'	;
							echo '		</div>';
							echo '	</div>';
							echo '</div>';
						?>
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
						font-size: 35px;

					}

					.profile-nick{
						font-size: 16px;

					}

					.profile-nick-small{
						font-size: 11px;

					}

					p {
						margin: 0;
					}
				</style>

				<div class="col-md-4" style="height: 100%; "  align="center">
					<div class="col-md-12" style=" padding-right: 0px !important; padding-left: 0px !important;" >
						<div class="card" style="width: 100%; padding-right: 0px; padding-left: 0px; margin-top: 10px;">
							<?php echo '<h4 class="card-header">Jogadores</h4>';?>
								<div class="card-body">
						<?php 
							$count = 0;
							$break = $jogador_equipe->num_rows();
							echo '<div class="row">';
							foreach($jogador_equipe -> result() as $j_e){
								if($count % 3 == 0){
									echo '</div>';
									echo '<div class="row">';
								}
								$count++;
								echo '<div class="card" style="width: 108px; height: 200px; margin: 3px;"><img src="'.site_url().'/assets/img/profiles/'.$j_e->foto.'" width="106" height="106">';
								echo '	<div class="card-body" align="center" style="padding: 5px;">';
								
								if(strlen($j_e->nick) < 9){
									echo '		<h4 class="card-title profile-nick" style="margin-bottom: 0.1rem; text-overflow: clip; margin-left: -5px;">';
									echo '			<span><img src="'.site_url().'/assets/img/bandeiras/'.$j_e->pais_id.'.png" width="20" height="12"></span> ';
									echo strtoupper($j_e->nick).'</strong></h4>'; 
								}else{
									echo '		<h2 class="card-title profile-nick-small" style="margin-bottom: 0.1rem; text-overflow: clip; ">';
									echo '			<span><img src="'.site_url().'/assets/img/bandeiras/'.$j_e->pais_id.'.png" width="20" height="12"></span> ';
									echo strtoupper($j_e->nick).'</strong></h2>'; 
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

								echo '		<div style="margin-top: 10px;"><h1 class="profile-score">91<h1>';
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
					</div>
				</div>

				<?php echo '<div class="col-md-1" style="background-color: '.$cor_primaria.'; padding: 0px; min-height: 20px;">'; 
				echo '<div style="float: left; width: 50%; height: 100%; background-color: '.$cor_secundaria.';     filter:alpha(opacity=50);	opacity: 0.5;	-moz-opacity:0.5; -webkit-opacity:0.5; "></div>';?>
				</div>
				<?php echo '<div style="margin-top:5px;margin-bottom:5px;"><a class="btn btn-secondary" href="'.site_url().'index.php/equipe">Voltar</a>'; ?>
			</div>
			</div>
		</div>

