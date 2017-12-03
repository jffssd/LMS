<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div>
	<div class="container-fluid">
	
		<h1 class="text-center"><?= $titulo ?></h1>
		
		
		</div>
		<div class="col-md-12" style="background-color: grey; ">
			<div class="row">
				<div class="col-md-4">
					<div class="logo-equipe" style="height:450px; background-color:red; ">
						<div class="row">
								<?php echo '<img src="'.site_url().'/assets/img/logo-equipes/'.$logo.'">'; ?>
						</div>
						<div class="row">

							<?php
								var_dump($pais_id);
								foreach($paises -> result() as $s_s){
									if ($p_s->id == $pais_id){
										echo '<p>Pais: '.$p_s->nome.' ID: '.$p_s->id.'</p>';
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="logo-equipe" style="height:450px; background-color:blue; ">
						<div class="row">
							<?php echo '<p>Equipe: '.$nome.'</p>'; ?>
						</div>
						<div class="row">
							<?php echo '<p>Sigla: '.$sigla.'</p>'; ?>
						</div>
						<div class="row">
                    	<?php
						foreach($regioes -> result() as $r_s){
								if ($r_s->id == $regiao){
									echo '<p>Região: '.$r_s->sigla.' ID: '.$r_s->id.'</p>';
								}
						}
						?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="logo-equipe" style="height:450px; background-color:yellow;">

					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-3">


					
					
                    
			</div>
			<div class="row">

                    <div class="row">
						<?php echo '<p>Status: '.$status.'</p>'; ?>
					</div>
                    <div class="row">
                    <?php
						foreach($sedes -> result() as $s_s){
								if ($s_s->id == $sede){
									echo '<p>Sede: '.$s_s->nome.' ID: '.$s_s->id.'</p>';
								}
						}
						?>
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
						<?php echo '<p>Logo: '.$logo.'</p>'; ?>
					</div>
                    <div class="row">
						<?php echo '<p>Cor Primária: '.$cor_primaria.'</p>'; ?>
					</div>
                    <div class="row">
						<?php echo '<p>Cor Secundária: '.$cor_secundaria.'</p>'; ?>
					</div>
				</div>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<?= anchor('index.php/equipe', 'Voltar') ?>
			</div>
		</div>	
