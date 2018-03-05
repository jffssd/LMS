<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>

.circle-button{
	width: 50px;
 	height: 50px;
 	text-align: center;
	padding: 6px 0;
	font-size: 28px;
	line-height: 1.428571429;
	border-radius: 50%;
}

.social-button-facebook{
	background-color: #4c699e;
	color: #ffffff !important;
}

.social-button-facebook:hover{
	background-color: #30487b;
	color: #ffffff !important;
}

.social-button-twitter{
	background-color: #2ba9e1;
	color: #ffffff !important;
}

.social-button-twitter:hover{
	background-color: #1c92c7;
	color: #ffffff !important;
}

.social-button-twitch{
	background-color: #7a56b1;
	color: #ffffff !important;
}

.social-button-twitch:hover{
	background-color: #644791;
	color: #ffffff !important;
}
</style>
<div class="row" style="padding-top: 10px;">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
		<div class="card card-team-tag">
	  		<h5 class="card-header text-white bg-ces-dark"><i class="fa fa-fw fa-check"></i> CONQUISTAS</h5>
	  		<h5 class="card-header" style="background-color: #d7d7d7; text-align: center;"> <?php echo strtoupper($nome);?>
	  			<span class="badge badge-secondary"><?php echo strtoupper($sigla);?></span>
	  		</h5>

	  			<div class="card-body card-body-team">
					<div class="team-logo" align="center">
						<img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="250" height="250">
					</div>
					
					<br>
					Logo: 
					<a href="#" class="btn circle-button social-button-facebook"><i class="fa fa-fw fa-facebook"></i></a>
					<a href="#" class="btn circle-button social-button-twitter"><i class="fa fa-fw fa-twitter"></i></a>
					<a href="#" class="btn circle-button social-button-twitch"><i class="fa fa-fw fa-twitch"></i></a>
					Nota: <?php echo substr($valor,0,3);?>
					<?php
					if($status == 'A'){ ?>
						<p class="card-status-desc"><i class="fa fa-fw fa-check-square" style="color: green;"></i> Ativa</p>
					<?php }elseif($status == 'I'){ ?>
						<p class="card-status-desc"><i class="fa fa-fw fa-window-close" style="color: grey;"></i> Inativa</p>
					<?php } ?>
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

<style>
.card-custom-jogador-time {
  overflow: hidden;
  min-height: 120px;
  border: 0;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
  border-radius: 10px;
}

.card-custom-img {
  height: 80px;
  min-height: 80px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-color: inherit;

}

/* First border-left-width setting is a fallback */
.card-custom-img::after {
  position: absolute;
  content: '';
  top: 40px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-top-width: 40px;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 545px;
  border-left-width: calc(575px - 5vw);
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  border-left-color: #222;
}

.card-custom-avatar img {
  border-radius: 50%;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
  position: absolute;
  top: 10px;
  left: 1.25rem;
  width: 100px;
  height: 100px;
  border: 2px solid #333;
}

.card-jogador-title-name{
	position: absolute; 
	top:40px; 
	left: 130px;
	background-color: #222; 
	border: 1px solid #333333;
	border-radius: 5px; 
	padding: 5px 8px 3px 5px;

}

.card-jogador-title-name h4{
	margin: 0px;
}

.card-jogador-flag{
	height:19px;
	width:29px;
	margin-bottom: 8px;
}

.card-jogador-data{
	width: 25%; 
	height: 30px;
	text-align: center;
	color: #eee;
	padding-top: 3px;
}

.card-jogador-data-icon{
	margin-top: -4px; 
	margin-left: 3px; 
	border-radius: 50%;
}

.data-abates{
    cursor:pointer;
    color: #ee4546;
    font-weight: bold;
}

.data-mortes{
    cursor:pointer;
    color: #633b90;
    font-weight: bold;
}

.data-assists{
    cursor:pointer;
    color: #26ce85;
    font-weight: bold;
}

.card-jogador-posicao{
	position: absolute; 
	bottom: 5px; 
	left: 0px;  
	width: 42px;  
	height: 42px; 
	z-index: 3; 
	background-color: #222; 
	border-radius: 50%; 
	padding-top: 3px; 
	padding-left: 4px; 
	border: 2px solid #333;
}

.jogador-score-tab{
	position: absolute; 
	right: 10px; 
	top:12px; 
	background-color: #222;
	border: 1px solid #333; 
	text-align: center; 
	padding: 8px; 
	border-radius: 5px;
}

@media (max-width: 600px) 
{
  .card-jogador-data-icon 
   {
    display: none;
   }
   .jogador-score-tab
   {
    display: none;
   }
   .card-jogador-posicao{
   		bottom: 15px; 
   }
}

.card-body-team{
	padding: 0px;
	background-color: #eeeeee; 
	padding-top: 10px;
}

.card-team-tag{
	border: none; 
	margin-bottom: 10px;
}

.bg-ces-dark{
	background-color: #1e282c;
	color: #d4d4d4 !important;
	text-align:center;
}
</style>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
	<div class="card text-white card-team-tag">
  		<h5 class="card-header text-white bg-ces-dark"><i class="fa fa-fw fa-check"></i> CONQUISTAS</h5>
  			<div class="card-body card-body-team">
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
							<div class="card-custom-img" style="background-image: url(http://localhost/ces/assets/img/layout/card-player-background-tag-horizontal.jpg);">
							</div>
							<div class="card-custom-avatar">
								<img class="img-fluid" src="http://localhost/ces/assets/img/profiles/thumb/<?php echo $j_e->foto;?>" alt="Avatar" />
						 	</div>
						 	<div class="card-jogador-posicao">
								<img class="function-icon" src="http://localhost/ces/assets/img/roles/<?php echo $j_e->funcao_id;?>.png" alt="Funcão" height="32" width="32" />
						 	</div>
						  	<div class="card-body" style="background-color: #222; padding-top: 0px; padding-bottom: 0px;">
						    	<div class="card-jogador-title-name"><h4 class="card-title"><?php echo $j_e->nick;?> <img class="card-jogador-flag" src="http://localhost/ces/assets/img/bandeiras/<?php echo $j_e->pflag;?>.png"/></h4>
								</div>
								<div style="height: 30px; margin-top: 5px;">
									<div class="jogador-score-tab">
										 <span style="font-size: 12px; "><i style="color: #ff5d48;" class="fa fa-fw fa-star"></i> Score</span><br> 
										 <span style="font-size: 38px; font-weight: 400;">7.1</span>
									</div>
									<div class="row" style="padding-left: 112px;">
										<div class="card-jogador-data data-abates" style="">
											<img src="http://localhost/ces/assets/img/layout/ico-abate.jpg" class="card-jogador-data-icon"/>
											<span>9.5</span>
										</div>
										<div class="card-jogador-data data-mortes">
											<img src="http://localhost/ces/assets/img/layout/ico-morte.jpg" class="card-jogador-data-icon"/>
											<span>4.2</span>
										</div>
										<div class="card-jogador-data data-assists">
											<img src="http://localhost/ces/assets/img/layout/ico-assist.jpg" class="card-jogador-data-icon"/>
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