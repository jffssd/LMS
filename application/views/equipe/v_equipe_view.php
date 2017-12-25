<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.active {
	background-color: #ffffff !important;
	color: #000000 !important;
	z-index: 6 !important;
}
.gradient-menu{
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#a9e4f7+0,0fb4e7+100;Ble+3D+%235 */
	background: #343a40; /* Old browsers */
	background: -moz-linear-gradient(top, #343a40 0%, #4d565f 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, #343a40 0%,#4d565f 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, #343a40 0%,#4d565f 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#343a40', endColorstr='#4d565f',GradientType=0 ); /* IE6-9 */
	margin-top: -10px;
	margin-bottom: 10px; 
	padding: 10px; 
	padding-bottom: 0px; 
	height: 50px; 
	width: 100%;
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

.nav-menu-adjusted{
	margin-bottom:0px; 
	width: 100%;
}

.nav-menu-item{
	background-color: #eeeeee; 
	color: #484848; 
	z-index: 0;
}

.nav-menu-detail-color{
	width: 100%; 
	margin-top:-3px; 
	height: 3px; 
	z-index: 5;
}

.content-adjust-tab{
	margin-right: -25px; 
	margin-left: -10px;
}

.col_adjust{
	padding: 0px;
}

.left-col-setup{
	padding: 0px; 
	min-height: 20px;
}

.left-col-setup-inner{
	float: right; 
	width: 50%; 
	height: 100%; 
	filter:alpha(opacity=50);	
	opacity: 0.5;	
	-moz-opacity:0.5; 
	-webkit-opacity:0.5;
}

.principal-row{
	margin-top: 10px; 
	display: flex; 
	align-items: center;  
	justify-content: center;
}

.team-panel-title{
	font-weight: bold;
	background-color: #f7f7f7; 
	width: 20%; 
	height:30px; 
	border-left: 1px solid #DFDFDF; 
	border-right: 1px solid #DFDFDF;
}

.team-panel-desc{
	width: 80%; 
	height:30px; 
	border-left: 1px solid #DFDFDF; 
	border-right: 1px solid #DFDFDF;
}
</style>

<div class="gradient-menu">
	<ul class="nav nav-tabs justify-content-center nav-menu-adjusted" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link nav-menu-item active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-menu-item" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Jogadores</a>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-menu-item" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Conquistas</a>
		</li>
	</ul>
		<div class="nav-menu-detail-color" style="background-color: <?php echo $cor_primaria;?>;">
		</div>
		<div class="tab-content content-adjust-tab" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<div class="col-md-12 col_adjust">
			<div class="row">
				<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
					<div class="left-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
					</div>
				</div>
				<div class="col-md-4">
					<div class="row principal-row" align="center">
						<div class="col-md-12" align="center">
							<div class="card" style="margin-left: -10px;">
							 	<h4 class="card-header"><?php echo strtoupper($nome);?> <span class="badge badge-dark"> <?php echo strtoupper($sigla);?></h4>
								<div class="card-body" style="padding-top: 0px;">
									<div style=""><img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="250" height="250"></div> 
											<ul class="list-group list-group-flush">
												<li class="list-group-item" style="padding: 0px;">
													<div class="row">
													<div class="team-panel-title">País</div>
													<div class="team-panel-desc"><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $pais;?>.png" width="30" height="20"> Brasil</div>
													</div>
												</li>
												<li class="list-group-item" style="padding: 0px;">
													<div class="row">
													<div class="team-panel-title">Região</div>
													<div class="team-panel-desc"><img src="<?php echo site_url();?>assets/img/logo-ligas/<?php echo $regiao;?>.png" width="30" height="20"> CBLOL</div>
													</div>
												</li>
												<li class="list-group-item" style="padding: 0px;">
													<div class="row">
													<div style="font-weight: bold; background-color: #f7f7f7; width: 20%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">Criação</div>
													<div style="width: 80%; height:30px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;">10/12/2009</div>
													</div>
												</li>
												<li class="list-group-item" style="padding: 0px;">
													<div style="background-color: #f7f7f7; width: 100%; height:40px; border-left: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF; border-bottom: 1px solid #DFDFDF;"><a href="#facebook"><img src="<?php echo site_url();?>assets/img/social/facebook.png" width="40" height="40"></a><a href="#twitter"><img src="<?php echo site_url();?>assets/img/social/twitter.png" width="40" height="40"></a><a href="#instagram"><img src="<?php echo site_url();?>assets/img/social/instagram.png" width="40" height="40"></a></div>
												</li>
									  		</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

				<div class="col-md-2" style="padding: 0px;">
					<div class="row">
						<div class="card" style="margin-left: -12px; margin-top: 10px; width: 100%;" align="center">
							<h4 class="card-header" style="height: 50px; font-size: 18px; margin: 0px;"><i class="fa fa-fw fa-star"></i> Nota</h4>
							<div class="card-body" align="center">
							<h1 style="font-size: 90px; margin-top:-30px; margin-bottom:-20px;"><?php echo substr($valor,0,3);?></h1>
							</div>
						</div>

						<div class="card" style="margin-left: -12px; margin-top: 10px; width: 100%;" align="center">
							<h4 class="card-header" style="height: 40px; font-size: 18px; margin-top: -10px;"><i class="fa fa-fw fa-circle-o-notch"></i> Status</h4>
							<div class="card-body" style="height:50px;">
								
								<?php
								if($status == 'A'){
									echo '<h5><i class="fa fa-fw fa-check-square" style="color: green;"></i> Ativa</h5>';
								}elseif($status == 'I'){
									echo '<h5><i class="fa fa-fw fa-window-close" style="color: grey;"></i> Ativa</h5>';
								}
								?>
							</div>
						</div>

						<div class="card" style="margin-left: -12px; margin-top: 10px; width: 100%;" align="center">
							<h5 class="card-header" style="height: 40px;">Coach</h5>
							<?php 
								foreach($tecnico -> result() as $t_e){
								echo '<img style="margin-top:10px; margin-bottom:0px;" src="'.site_url().'assets/img/profiles/'.$t_e->foto.'" width="106" height="106">';
								echo '<div class="card-body">';
								echo '<h6 style="margin-top: -10px; margin-bottom: -5px; color: #4d565f">'.$t_e->nome.' "<span style="font-weight: bold; color: #343a40;">'.$t_e->nick.'</span>" '.$t_e->sobrenome.'</h6>';
							}
							?>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-4" style="height: 100%; margin-left: -10px;"  align="center">
					<div class="col-md-12" style=" padding-right: 0px !important; padding-left: 0px !important;  " >
						<div class="card" style="width: 100%; padding-right: 0px; padding-left: 0px; margin-top: 10px; min-width: 370px;">
							<h4 class="card-header">Jogadores</h4>
								<div class="card-body" style="padding: 0px; align: center; height: 410px; overflow-y: auto;" >
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
								echo '<div class="card" style="width: 108px; height: 190px; margin: 3px;"><img src="'.site_url().'/assets/img/profiles/'.$j_e->foto.'" width="106" height="106">';
								echo '	<div class="card-body" align="center" style="padding: 5px;">';
								
								if(strlen($j_e->nick) < 8){
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

				<div class="col-md-1" style="background-color: <?php echo $cor_primaria;?>; padding: 0px; min-height: 20px;">
					<div style="float: left; width: 50%; height: 100%; background-color: <?php echo $cor_secundaria;?>;     filter:alpha(opacity=50);	opacity: 0.5;	-moz-opacity:0.5; -webkit-opacity:0.5; "></div>
				</div>
			</div>
		</div>

</div>
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		
		
		
		
		</div>
		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
		</div>

</div>
