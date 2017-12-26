<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>

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

						<!-- SIDE BARS - TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
							<div class="left-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
							</div>
						</div>

						<!-- TEAM PANEL -->
						<div class="col-md-4">
							<div class="row principal-row" align="center">
								<div class="col-md-12" align="center">
									<div class="card" style="margin-left: -10px;">
									 	<h4 class="card-header"><?php echo strtoupper($nome);?> <span class="badge badge-dark"> <?php echo strtoupper($sigla);?></h4>
										<div class="card-body" style="padding-top: 0px;">
										<div><img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="250" height="250">
										</div> 
										<ul class="list-group list-group-flush">
											<li class="list-group-item" style="padding: 0px;">
												<div class="row">
													<div class="team-panel-title">País
													</div>
													<div class="team-panel-desc"><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $pais;?>.png" width="30" height="20"> Brasil
													</div>
												</div>
											</li>
											<li class="list-group-item" style="padding: 0px;">
												<div class="row">
													<div class="team-panel-title">Região
													</div>
													<div class="team-panel-desc"><img src="<?php echo site_url();?>assets/img/logo-ligas/<?php echo $regiao;?>.png" width="120" height="25"> CBLOL
													</div>
												</div>
											</li>
											<li class="list-group-item" style="padding: 0px;">
												<div class="row">
													<div class="team-panel-title">Criação
													</div>
													<div class="team-panel-desc">10/12/2009
													</div>
												</div>
											</li>
											<li class="list-group-item" style="padding: 0px;">
												<div class="team-panel-social">
													<a href="#facebook"><img src="<?php echo site_url();?>assets/img/social/facebook.png" width="40" height="40"></a>
													<a href="#twitter"><img src="<?php echo site_url();?>assets/img/social/twitter.png" width="40" height="40"></a>
													<a href="#instagram"><img src="<?php echo site_url();?>assets/img/social/instagram.png" width="40" height="40"></a>
												</div>
											</li>
									  	</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- TEAM DATA PANEL -->
					<div class="col-md-2" style="padding: 0px;">
						<div class="row">
							<div class="card card-team-score" align="center">
								<h4 class="card-header card-team-score-header"><i class="fa fa-fw fa-star" style="color: orange;"></i> Nota</h4>
								<div class="card-body" align="center">
									<h1 class="card-team-score-font"><?php echo substr($valor,0,3);?></h1>
								</div>
							</div>

							<div class="card card-team-status"  align="center">
								<h4 class="card-header card-team-status-header"><i class="fa fa-fw fa-circle-o-notch"></i> Status</h4>
								<div class="card-body card-team-status-body">
									<?php
									if($status == 'A'){ ?>
										<h5><i class="fa fa-fw fa-check-square" style="color: green;"></i> Ativa</h5>
									<?php }elseif($status == 'I'){ ?>
										<h5><i class="fa fa-fw fa-window-close" style="color: grey;"></i> Inativa</h5>
									<?php } ?>
								</div>
							</div>

							<div class="card card-team-coach" align="center">
								<h5 class="card-header card-team-coach-header">Coach</h5>
								<?php foreach($tecnico -> result() as $t_e){ ?>
								<img class="photo-team-coach" src="<?php echo site_url();?>assets/img/profiles/<?php echo $t_e->foto;?>" width="106" height="106">
								<div class="card-body">
									<h6 class="card-team-coach-font"><?php echo $t_e->nome;?> "<span class="card-coach-nick"><?php echo $t_e->nick;?></span>" <?php echo $t_e->sobrenome;?></h6>
									<?php	}	?>
								</div>
							</div>
						</div>	
					</div>

					<!-- TEAM PLAYERS PANEL -->
					<div class="col-md-4 team-players-panel-adjust" style=""  align="center">
						<div class="col-md-12 team-players-panel-identity">
							<div class="card card-team-players">
								<h4 class="card-header">Jogadores</h4>
									<div class="card-body card-team-players-body">
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
									?>
										<div class="card card-team-player-profile-card" ><img src="<?php echo site_url();?>assets/img/profiles/<?php echo $j_e->foto;?>" width="106" height="106">
											<div class="card-body" align="center" style="padding: 5px;">
											<?php if(strlen($j_e->nick) < 8){ ?>
												<h4 class="card-title profile-nick">
												<span><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $j_e->pais_id;?>.png" width="20" height="12"></span>
												<?php echo strtoupper($j_e->nick).'</strong></h4>';  
												}else{ ?>
												<h2 class="card-title profile-nick-small">
												<span><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $j_e->pais_id;?>.png" width="20" height="12"></span>
												<?php echo strtoupper($j_e->nick).'</strong></h2>';  
										} ?>

									<?php if($j_e->funcao == 'TOP'){ 
											echo '<div class="player-role-img" align="center" ><img src="'.site_url().'assets/img/roles/Top_icon.png" width="45" height="45">';						
										}elseif($j_e->funcao == 'MID'){ 
											echo '<div class="player-role-img" align="center" ><img src="'.site_url().'assets/img/roles/Mid_icon.png" width="45" height="45">';						
										}elseif($j_e->funcao =="JNG"){ 
											echo '<div class="player-role-img" align="center" ><img src="'.site_url().'assets/img/roles/Jungle_icon.png" width="45" height="45">';						
										}elseif($j_e->funcao == "SUP"){ 
											echo '<div class="player-role-img" align="center" ><img src="'.site_url().'assets/img/roles/Support_icon.png" width="45" height="45">';						
										}elseif($j_e->funcao == "ADC"){ 
											echo '<div class="player-role-img" align="center" ><img src="'.site_url().'assets/img/roles/Bottom_icon.png" width="45" height="45">';						
										} ?>
									</div>
									<div style="margin-top: -15px;"><span class="profile-score">91</span>
									</div>
							</div>
						</div>
						<?php } 
							if($count == $break){
								echo '</div>';
							}
						?>
						</div>
						</div>
					</div>
				</div>
				<!-- RIGHT SIDEBAR TEAM COLORS -->
				<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
					<div class="right-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;"></div>
				</div>
			</div>
		</div>
	</div>
<style>

.card{box-shadow:2px 2px 10px rgba(0,0,0,0.3); border:none;}
.card-01 .card-body{position:relative; padding-top:40px;}
.card-01 .badge-box{position:absolute; top:-20px; left:50%; width:60px; height:60px;margin-left:-32px; margin-top:-10px;text-align:center; border-radius: 50%;}
.profile-box{background-size:cover; float:left; width:100%; text-align:center; padding:30px 0; position:relative; overflow:hidden;}
.profile-box:before{filter: blur(10px);background:url("https://images.pexels.com/photos/195825/pexels-photo-195825.jpeg?h=350&auto=compress&cs=tinysrgb") no-repeat; background-size:cover; width:120%; position:absolute; content:""; height:120%; left:-10%;top:0;z-index:0;}
.profile-box img{width:170px; height:170px; position:relative; border:5px solid #fff;margin-top:-25px;}
.social-box i {border:1px solid #DFC717; color:#DFC717; width:30px; height:30px; border-radius:50%;line-height:30px;}
.social-box i:hover{background:#DFC717; color:#fff;}
.social-box a{margin: 0 5px;}

</style>
	<!-- HOME BAR -->
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		
		
		<div class="col-md-12 col_adjust">
					<div class="row">

						<!-- SIDE BARS - TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
							<div class="left-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
							</div>
						</div>

						<!-- TEAM PANEL -->
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-3">
									<div class="card card-01">
										<div class="profile-box" style="height: 180px;">
											<img class="card-img-top rounded-circle" src="<?php echo site_url();?>assets/img/profiles/foto.jpg" alt="Card image cap">
										</div>
										<div class="card-body text-center" style="padding-left:15px; padding-right:5px;">
											<div class="badge-box" style="background-color: white;padding-top:5px;"><img src="<?php echo site_url();?>assets/img/roles/Top_icon.png" width="50" height="50">
											</div>
											<h4 class="card-title" style="margin-top: -5px;">TinOwns</h4>
											<div style="margin-bottom: 10px; overflow: hidden;  white-space: nowrap;">
												<div class="row" style="margin-bottom:5px;d-inline-block;">
													<div style="width: 13%; float:left; height:24px; background-color: yellow; margin-right:5px; border: 1px solid black; border-radius:50%;"><i class="fa fa-leaf" aria-hidden="true"></i>
													</div>
													<div class="progress" style="height: 24px; width:62%;">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div style="width: 13%; float:right; height:24px; background-color: white; margin-left:5px; border-radius:7px; font-weight: bold;">7
													</div>
												</div>

												<div class="row" style="margin-bottom:5px;d-inline-block;">
													<div style="width: 13%; float:left; height:24px; background-color: yellow; margin-right:5px; border: 1px solid black; border-radius:50%;"><i class="fa fa-leaf" aria-hidden="true"></i>
													</div>
													<div class="progress" style="height: 24px; width:62%;">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div style="width: 13%; float:right; height:24px; background-color: white; margin-left:5px; border-radius:7px; font-weight: bold;">7
													</div>
												</div>

												<div class="row" style="margin-bottom:5px;d-inline-block;">
													<div style="width: 13%; float:left; height:24px; background-color: yellow; margin-right:5px; border: 1px solid black; border-radius:50%;"><i class="fa fa-leaf" aria-hidden="true"></i>
													</div>
													<div class="progress" style="height: 24px; width:62%;">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div style="width: 13%; float:right; height:24px; background-color: white; margin-left:5px; border-radius:7px; font-weight: bold;">7
													</div>
												</div>
												
												<div class="row" style="margin-bottom:5px;d-inline-block;">
													<div style="width: 13%; float:left; height:24px; background-color: yellow; margin-right:5px; border: 1px solid black; border-radius:50%;"><i class="fa fa-leaf" aria-hidden="true"></i>
													</div>
													<div class="progress" style="height: 24px; width:62%;">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div style="width: 13%; float:right; height:24px; background-color: white; margin-left:5px; border-radius:7px; font-weight: bold;">7
													</div>
												</div>

												<div class="row" style="margin-bottom:5px;d-inline-block;">
													<div style="width: 13%; float:left; height:24px; background-color: yellow; margin-right:5px; border: 1px solid black; border-radius:50%;"><i class="fa fa-leaf" aria-hidden="true"></i>
													</div>
													<div class="progress" style="height: 24px; width:62%;">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div style="width: 13%; float:right; height:24px; background-color: white; margin-left:5px; border-radius:7px; font-weight: bold;">7
													</div>
												</div>

												<div>
												<a href="#"><button type="button" class="btn btn-info">Perfil Completo</button></a>
												</div>
											</div>
										</div>
									</div>
								</div>			
							</div>
						</div>
					
					<!-- RIGHT SIDEBAR TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
						<div class="right-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;"></div>
						</div>
					</div>
			</div>
		</div>
	</div>
		
		</div>
		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
		</div>

</div>
