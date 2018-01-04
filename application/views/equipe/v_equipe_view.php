<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

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
									 	<h5 class="card-header"><?php echo strtoupper($nome);?> <span class="badge badge-dark"> <?php echo strtoupper($sigla);?></h5>
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
										<h5 class="card-status-desc"><i class="fa fa-fw fa-check-square" style="color: green;"></i> Ativa</h5>
									<?php }elseif($status == 'I'){ ?>
										<h5 class="card-status-desc"><i class="fa fa-fw fa-window-close" style="color: grey;"></i> Inativa</h5>
									<?php } ?>
								</div>
							</div>

							<div class="card card-team-coach" align="center">
								<h5 class="card-header card-team-coach-header">Coach</h5>
								<?php foreach($tecnico -> result() as $t_e){ ?>
								<img class="photo-team-coach" src="<?php echo site_url();?>assets/img/profiles/<?php echo $t_e->foto;?>" width="106" height="106">
								<div class="card-body card-team-coach-body">
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
									<div class="col-md-4">
										<div class="card card-team-player-profile-card" ><img src="<?php echo site_url();?>assets/img/profiles/thumb/<?php echo $j_e->foto;?>" width="106" height="106" style="border-radius: 50%;">
											<div class="card-body" align="center" style="padding: 5px;">
											<?php if(strlen($j_e->nick) < 8){ ?>
												<h4 class="card-title profile-nick">
												<span><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $j_e->pflag;?>.png" width="20" height="12"></span>
												<?php echo strtoupper($j_e->nick).'</strong></h4>';  
												}else{ ?>
												<h2 class="card-title profile-nick-small">
												<span><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $j_e->pflag;?>.png" width="20" height="12"></span>
												<?php echo strtoupper($j_e->nick).'</strong></h2>';  
										} ?>
											<div class="player-role-img" align="center" ><img src="<?php echo site_url();?>assets/img/roles/<?php echo $j_e->funcao_id;?>.png" width="45" height="45">					
											</div>
									<div style="margin-top: -15px;"><span class="profile-score">91</span>
									</div>
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

	<!-- HOME BAR -->
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		<div class="col-md-12 col_adjust">
					<div class="row">

						<!-- SIDE BARS - TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
							<div class="left-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
							</div>
						</div>


						<style>
						.card-body-player{
							padding-left:10px; 
							padding-right:5px;
							padding-bottom:0px;
							background-size:cover;
						}

						.card-player-body{
							margin-bottom: 10px; 
							overflow: hidden;  
							white-space: nowrap;
						}

						.inline-row-card{
							margin-bottom:8px;
						}

						.card-player-attribute-icon{
							width: 13%; 
							float:left; 
							height:24px; 
							margin-right:5px; 
							margin-top:-3px;
						}

						.progress-bar-adjust{
							height: 14px; 
							width:67%;
							margin-top:5px;
						}

						.attribute-value{
							width: 13%; 
							float:right; 
							height:24px; 
							background-color: #e5e5e5; 
							margin-left:5px; 
							border-radius:7px; 
							font-weight: bold;
						}
						
						.card-dark{background-color:#262b33;}
						.card{box-shadow:2px 2px 10px rgba(0,0,0,0.3); border:none;}
						.card-01 .card-body{position:relative; padding-top:40px; }
						.card-01 .badge-box{background-color: white;padding-top:5px;position:absolute; top:-20px; left:20%; width:60px; height:60px;margin-left:-32px; margin-top:-10px;text-align:center; border-radius: 50%;}
						.card-01 .badge-box-desc{background-color: white;padding-top:5px;position:absolute; top:-7px; left:28%; width:60%; height:40px;margin-left:-32px; margin-top:-10px;text-align:center; border-radius: 10px;}
						.profile-box{background-size:cover; float:left; width:100%; text-align:center; padding:30px 0; position:relative; overflow:hidden;}
						.profile-box:before{background-size:cover; width:120%; position:absolute; content:""; height:120%; left:-10%;top:0;z-index:0;}
						.profile-box img{width:150px; height:150px; position:relative; border:5px solid #fff;margin-top:-25px;}
						.social-box i {border:1px solid #DFC717; color:#DFC717; width:30px; height:30px; border-radius:50%;line-height:30px;}
						.social-box i:hover{background:#DFC717; color:#fff;}
						.social-box a{margin: 0 5px;}
						.profile-box-header{
							padding-top:7px;
							font-family: helvetica; 
							color: #9a835e;
							height: 35px; 
							border-top-left-radius: 10px; 
							border-top-right-radius: 10px; 
							font-weight:bold;
						}
						</style>
						<!-- TEAM PANEL -->
						<div class="col-md-10">
							<div class="row">
								<div style="height:70px; width: 100%; margin-bottom:10px; margin-top:5px;">
									<div style="float:left; width: 70px; ">
										<img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="70" height="70">
									</div>
									<div style="padding-left:82px; padding-top:12px; font-size:28px; font-weight: bold; color: #262b33;">CNB ESPORTS CLUB
									</div>
									<div style="margin-bottom: 20px;height: 32px; width: 100%; background-color: <?php echo $cor_primaria;?>; color: white; font-family: helvetica; font-weight:bold; font-size: 24px;" align="center">JOGADORES
									</div>


								</div>
							</div>
							<div class="row">

							<?php foreach($jogador_equipe -> result() as $j_e){ 
							$bg = 'http://localhost:8080/lms/assets/img/layout/card-player-background-'.$j_e->funcao_id.'.jpg'; ?>
								<div class="col-md-3">
									<div class="card card-01 card-dark" style="border-radius: 10px; margin-bottom: 10px;">
										<div class="profile-box-header" align="center">
											<img src="<?php echo site_url();?>assets/img/roles/<?php echo $j_e->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"><?php echo strtoupper($j_e->f_nome);?>
											<div style="float:right; width:25px; height:25px; margin-right: 7px;">
												<?php
													if($j_e->titular == 1){
														echo '<span class="badge" style="border: 2px solid #c8aa6e; background-color: #9a835e; color: white;" data-toggle="tooltip" data-placement="top" title="Titular">T</span>';
													}elseif($j_e->titular == 0){
														echo '<span class="badge" style="border: 2px solid #c8aa6e; background-color: #9a835e; color: white;" data-toggle="tooltip" data-placement="top" title="Reserva">R</span>';
													}?>
											</div>
										</div>
										<div class="profile-box" style="height: 150px; background:url('<?php echo $bg;?>') no-repeat;">
											<a href="<?php echo site_url().'index.php/jogador/view/'.$j_e->j_id;?> " target="_blank"><img class="card-img-top rounded-circle" style="margin-top: -35px;"src="<?php echo site_url();?>assets/img/profiles/thumb/<?php echo $j_e->foto;?>" alt="Card image cap"></a>
										</div>
										<div class="card-body text-center card-body-player">
											<div class="badge-box" data-toggle="tooltip" data-html="true" data-placement="left" title="Atributo: <b>Fogo</b>"><img src="<?php echo site_url();?>assets/img/atributos/FIRE.png" width="50" height="50">
											</div>
											<div class="badge-box-desc" style="margin-left: 10px; font-weight:bold; font-size: <?php if (strlen($j_e->nick) < 10){ echo '22'; }else{echo '18';};?>px;"><a href="<?php echo site_url().'index.php/jogador/view/'.$j_e->j_id;?>" style="color: #343a40; text-decoration: none;" target="_blank"><?php echo $j_e->nick;?></a>
											</div>
											<div class="card-player-body">
												<!-- ATRIBUTO - CONSISTENCIA -->
												<div class="row inline-row-card" name="atr_consistencia">
													<div class="card-player-attribute-icon" data-toggle="tooltip" data-placement="left" title="Consistência"><img src="<?php echo site_url();?>assets/img/atributos/attr-consistencia.png" width="20" height="20" style="border-radius:50%; border: 2px solid #545f71;">
													</div>
													<div class="progress progress-bar-adjust">
														<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $j_e->at_consist;?>0%;" aria-valuenow="<?php echo $j_e->at_consist;?>0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div class="attribute-value" align="center"><?php echo $j_e->at_consist;?>
													</div>
												</div>

												<!-- ATRIBUTO - MECANICAS -->
												<div class="row inline-row-card" name="atr_mecanicas">
													<div class="card-player-attribute-icon" data-toggle="tooltip" data-placement="left" title="Mecânicas"><img src="<?php echo site_url();?>assets/img/atributos/attr-mecanicas.png" width="20" height="20" style="border-radius:50%; border: 2px solid #545f71;">
													</div>
													<div class="progress progress-bar-adjust">
														<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $j_e->at_mec;?>0%;" aria-valuenow="<?php echo $j_e->at_mec;?>0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div class="attribute-value" align="center"><?php echo $j_e->at_mec;?>
													</div>
												</div>

												<!-- ATRIBUTO - MENTALIDADE -->
												<div class="row inline-row-card" name="atr_mentalidade">
													<div class="card-player-attribute-icon" data-toggle="tooltip" data-placement="left" title="Mentalidade"><img src="<?php echo site_url();?>assets/img/atributos/attr-mentalidade.png" width="20" height="20" style="border-radius:50%; border: 2px solid #545f71;">
													</div>
													<div class="progress progress-bar-adjust">
														<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $j_e->at_ment;?>0%;" aria-valuenow="<?php echo $j_e->at_ment;?>0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div class="attribute-value" align="center"><?php echo $j_e->at_ment;?>
													</div>
												</div>

												<!-- ATRIBUTO - VISAO DE JOGO -->
												<div class="row inline-row-card" name="atr_visao_de_jogo">
													<div class="card-player-attribute-icon" data-toggle="tooltip" data-placement="left" title="Visão de Jogo"><img src="<?php echo site_url();?>assets/img/atributos/attr-visao-de-jogo.png" width="20" height="20" style="border-radius:50%; border: 2px solid #545f71;">
													</div>
													<div class="progress progress-bar-adjust">
														<div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?php echo $j_e->at_vis;?>0%;" aria-valuenow="<?php echo $j_e->at_vis;?>0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div class="attribute-value" align="center"><?php echo $j_e->at_vis;?>
													</div>
												</div>

												<!-- ATRIBUTO - TRABALHO EM EQUIPE -->
												<div class="row inline-row-card" name="atr_trabalho_em_equipe">
													<div class="card-player-attribute-icon" data-toggle="tooltip" data-placement="left" title="Trabalho em Equipe"><img src="<?php echo site_url();?>assets/img/atributos/attr-trabalho-em-equipe.png" width="20" height="20" style="border-radius:50%; border: 2px solid #545f71;">
													</div>
													<div class="progress progress-bar-adjust">
														<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $j_e->at_trab;?>0%;" aria-valuenow="<?php echo $j_e->at_trab;?>0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<div class="attribute-value" align="center"><?php echo $j_e->at_trab;?>
													</div>
												</div>


											</div>
										</div>
									</div>
								</div>		

							<?php } ?>
									
							</div>
						</div>
					
					<!-- RIGHT SIDEBAR TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
						<div class="right-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
						</div>
						</div>
					</div>
				</div>
			</div>

		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">






		<div class="col-md-12 col_adjust">
					<div class="row">
						<!-- SIDE BARS - TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
							<div class="left-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
							</div>
						</div>

						<!-- TEAM PANEL -->
						<div class="col-md-10">
							<div class="col-md-12" style="float:none;">
								<div class="row">
									<div class="col-md-12">
										<div align="center" style="margin-left: -15px;padding-top:35px; padding-left:15px;position: absolute; height:270px; width: 100%;float: none;background:url('<?php echo site_url();?>assets/img/championships/champions/intz-1.jpg'); background-size: cover;">
											<div style="float: left; background-color:<?php echo $cor_secundaria;?>; width:200px; height:200px; border-radius:50%; padding-top: 5px; border: 5px solid <?php echo $cor_primaria;?>;">
											<img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="180" height="180">
											</div>
										</div>
									</div>
								</div>
								<div style="margin-top:280px;height: 32px; width: 100%; background-color: <?php echo $cor_primaria;?>; color: white; font-family: helvetica; font-weight:bold; font-size: 24px;" align="center">CONQUISTAS</div>
								<div style="margin-top:10px;">
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
					
					<!-- RIGHT SIDEBAR TEAM COLORS -->
						<div class="col-md-1 left-col-setup" style="background-color: <?php echo $cor_primaria;?>;">
							<div class="right-col-setup-inner" style="background-color: <?php echo $cor_secundaria;?>;">
							</div>
						</div>
					</div>
				</div>










		</div>


		
	</div>

</div>
