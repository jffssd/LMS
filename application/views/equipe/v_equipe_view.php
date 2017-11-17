<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div style="height:100%; width:10%; background-color:red;">
	<div class="container">
	
		<h1 class="text-center"><?= $titulo ?></h1>
		
		
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
                    <div class="row">
						<?php echo '<p>ID: '.$id.'</p>'; ?>
					</div>
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
                    <div class="row">
                    <?php
						foreach($paises -> result() as $s_s){
								if ($p_s->id == $pais){
									echo '<p>Pais: '.$p_s->nome.' ID: '.$p_s->id.'</p>';
								}
						}
						?>
                    </div>
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
