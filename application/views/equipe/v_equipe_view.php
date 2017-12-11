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
		<div class="col-md-12" style="background-color: #f5f5f5; border: 1px solid #e2e2e2; border-radius: 7px;">
			<div class="row">
				<div class="col-md-3">
					<div class="logo-equipe">
						<div class="row"  style="background-color: white; margin-top: 10px; border: 1px solid #2f3f3f3; border-radius: 7px;">
								<?php echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'" width="200" height="200">'; ?>
						</div>
						<div class="row">
							<?php echo '<h3 align="center">'.$nome.'</h1>'; ?>
						</div>
						<div class="row">
							<?php 
								foreach($paises -> result() as $p_s){
									if ($p_s->id == $pais){
										echo '<h5 align="center">'.$sigla.'</h3>';
										echo '<img src="'.site_url().'assets/img/bandeiras/'.$p_s->name.'.png" width="30" height="20" alt="'.$p_s->nome.'">';
									}
								}
							?>
						</div>
						<div class="row">
                    	<?php
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
					<div class="logo-equipe" style="background-color:blue; ">
						<div class="row" style="height:200px; background-color:pink;">

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
				<div class="col-md-6" style="background-color:green; ">
					<div class="row">
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
							<div class="row">
								<div class="col-md-6">
									<p>ID: X</p>
									<p>João</p>
									<p>Cons: 8</p>
								</div>
								<div class="col-md-6">
									<p>Cons: 8</p>
									<p>Ment: 7</p>
									<p>Trab: 8</p>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
						<div class="row">
							<div class="col-md-6">
								<p>ID: X</p>
								<p>João</p>
								<p>Cons: 8</p>
							</div>
							<div class="col-md-6">
								<p>Cons: 8</p>
								<p>Ment: 7</p>
								<p>Trab: 8</p>
							</div>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
						</div>
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
						</div>
						<div class="col-md-6" style="height:120px; background-color: teal; border: 1px solid black;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
