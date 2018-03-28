<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row" style="padding-top: 10px;">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
		<div class="card card-team-tag">
	  		<h5 class="card-header text-white bg-ces-dark"><i class="fa fa-fw fa-flag"></i> EQUIPE</h5>
	  		<h5 class="card-header" style="background-color: #d7d7d7; text-align: center;"> <?php echo strtoupper($nome);?>
	  			<span class="badge badge-secondary"><?php echo strtoupper($sigla);?></span>
	  		</h5>
			<div class="card-body card-body-team">
				<div class="team-logo" align="center">
					<img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="250" height="250">
				</div>
			</div>
		</div>

		<div class="card card-team-tag">
			<div class="team-info" style="min-height: 50px; line-height: 35px; font-size: 18px; background-color: #dcdcdc;">
				<div class="row" style="padding-left: 20px;">
					<div style="width: 40%; height: 100%; padding-left: 10px; line-height: 50px; font-weight: bold; color: #6b6b6b;">Fundação:
					</div>
					<div style="width: 60%; height: 100%; padding-left: 10px; line-height: 50px; text-align: center;">2012
					</div>
				</div>
			</div>
			<div class="team-info" style="min-height: 50px; line-height: 35px; font-size: 18px; background-color: #e8e8e8;">
				<div class="row" style="padding-left: 20px;">
					<div style="width: 40%; height: 100%; padding-left: 10px; line-height: 50px; font-weight: bold; color: #6b6b6b;">Status:
					</div>
					<div style="width: 60%; height: 100%; padding-left: 10px; line-height: 50px; text-align: center;"><i style="color: #81d498;" class="fa fa-circle" aria-hidden="true"></i> Ativa
					</div>
				</div>
			</div>
			<div class="team-info" align="center" style="padding-top: 5px; min-height: 60px; line-height: 48px; font-size: 18px; background-color: #dcdcdc;">
				<a href="#" class="btn circle-button social-button" target="_blank"><i class="fa fa-fw fa-facebook"></i></a>
				<a href="#" class="btn circle-button social-button" target="_blank"><i class="fa fa-fw fa-twitter"></i></a>
				<a href="#" class="btn circle-button social-button" target="_blank"><i class="fa fa-fw fa-twitch"></i></a>
			</div>
		</div>


	</div>

<style>

</style>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
	<div class="card card-team-tag">
  		<h5 class="card-header bg-ces-dark"><i class="fa fa-fw fa-check"></i> CONQUISTAS</h5>
  		<div class="card-body card-body-team">
			<table class="table table-striped">
				<thead class="thead-light" style="text-light">
					<tr align="center">
						<th align="center">Ano</th>
						<th align="center">Posição</th>
						<th>Campeonato</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($equipe_titulos -> result() as $e_t){  ?>
					<tr>
						<td class="td_row" align="center"><?php echo $e_t->camp_ano;?></td>
						<?php 
						if($e_t->ec_posicao == 1){ 
								echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/first.png" width="25" height="25"> 1° Lugar</td>';
						}elseif($e_t->ec_posicao == 2){
								echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/second.png" width="25" height="25"> 2° Lugar</td>';
						}elseif($e_t->ec_posicao == 3){
								echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/third.png" width="25" height="25"> 3° Lugar</td>';
						}	?>
						<td class="td_row" ><?php echo $e_t->camp_nome;?></td>
					</tr>
					<?php	}
					?>
				</tbody>
			</table>
  		</div>
  	</div>
</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
		<div class="card text-white card-team-tag">
  			<h5 class="card-header text-white bg-ces-dark"><i class="fa fa-fw fa-users"></i> JOGADORES</h5>
  				<div class="card-body card-body-team">
					<div class="col-12">
						<?php
						foreach($jogador_equipe -> result() as $j_e){
						?>
						<!-- Card-Jogador -->
						<div class="card card-custom-jogador-time bg-dark text-white border-white" style="margin-bottom: 10px;">
							<div class="card-custom-img" style="background-image: url(<?php echo site_url();?>assets/img/layout/card-player-background-tag-horizontal.jpg);">
							</div>
							<div class="card-custom-avatar">
								<img class="img-fluid" src="<?php echo site_url();?>assets/img/jogadores/<?php echo $j_e->foto;?>" alt="Avatar" />
						 	</div>
						 	<div class="card-jogador-posicao">
								<img class="function-icon" src="<?php echo site_url();?>assets/img/roles/<?php echo $j_e->funcao_id;?>.png" alt="Funcão" height="32" width="32" />
						 	</div>
						  	<div class="card-body" style="background-color: #222; padding-top: 0px; padding-bottom: 0px;">
						    	<div class="card-jogador-title-name"><h4 class="card-title"><?php echo $j_e->nick;?> <img class="card-jogador-flag" src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $j_e->pflag;?>.png"/></h4>
								</div>
								<div style="height: 30px; margin-top: 5px;">
									<div class="jogador-score-tab">
										 <span style="font-size: 12px;"><i style="color: #ff5d48;" class="fa fa-fw fa-star"></i> Score</span><br> 
										 <span style="font-size: 38px; font-weight: 400;">7.1</span>
									</div>
									<div class="row" style="padding-left: 112px;">
										<div class="card-jogador-data data-abates" style="">
											<img src="<?php echo site_url();?>assets/img/layout/ico-abate.jpg" class="card-jogador-data-icon"/>
											<span>9.5</span>
										</div>
										<div class="card-jogador-data data-mortes">
											<img src="<?php echo site_url();?>assets/img/layout/ico-morte.jpg" class="card-jogador-data-icon"/>
											<span>4.2</span>
										</div>
										<div class="card-jogador-data data-assists">
											<img src="<?php echo site_url();?>assets/img/layout/ico-assist.jpg" class="card-jogador-data-icon"/>
											<span>7.1</span>
										</div>
									</div>
								</div>
						 	</div>
						</div>
						<!-- Fim card jogador -->
						<?php } ?>
					</div>
  				</div>
			</div>
		</div>
	</div>
</div>