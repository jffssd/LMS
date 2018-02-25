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
						.card{box-shadow:2px 2px 10px rgba(0,0,0,0.3); border:none; max-width: 300px; min-width: 200px;}
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
							<div class="row" >
								<div style="width: 100%; padding-top:10px;">
									<div style="float:left; width: 50px; padding-top: 4px; padding-left: 10px;">
										<img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="40" height="40">
									</div>
									<div style="padding-top: 8px;margin-bottom: 20px;height: 50px; width: 100%; background-color: #262b33; color: white; font-family: helvetica; font-weight:bold; font-size: 24px; border-top-left-radius: 10px; border-top-right-radius: 10px; " align="center">JOGADORES
									</div>
								</div>
							</div>
							<div class="row" style="background-color: #eeeeee; padding-top: 20px; margin-top:-20px;">
							<?php foreach($jogador_equipe -> result() as $j_e){ 
							$bg = 'http://localhost:8080/lms/assets/img/layout/card-player-background-'.$j_e->funcao_id.'.jpg'; ?>
								<div class="col-md-3" >
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