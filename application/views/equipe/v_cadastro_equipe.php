<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<div class="col-sm-12">
			<div class="row">
				<div class="page_title">
				<?php 
				if(isset($id)){
					echo '<img src="'.site_url().'assets/img/logo-equipes/'.$logo.'" style="width:20%;float:left;"><h2 style="float:right;">'.$titulo.'</h2>';
				} 
				?>
				</div>
			</div>
			<div class="row">
				
			</div>
			<div class="row">
				<?= form_open('equipe/store')  ?>
					<div class="form-row">
						<div class="col" style="margin-top:10px; margin-bottom:10px">
							<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
							<?php echo '<input type="text" name="nome" id="nome" class="form-control" value="'.$nome.'" autofocus="true" />'; ?>
						</div>
						<div class="col" style="margin-top:10px; margin-bottom:10px">
							<label for="sigla">Sigla</label><span class="erro"><?php echo form_error('sigla') ?  : ''; ?></span>
							<input type="text" name="sigla" id="sigla" class="form-control" value="<?= set_value('sigla') ? : (isset($sigla) ? $sigla : '') ?>" autofocus='true' />
						</div>
						<div class="col" style="margin-top:10px; margin-bottom:10px">
						<label for="comissao">Tam. máx. comissão técnica</label><span class="erro"><?php echo form_error('comissao') ?  : ''; ?></span>
						<?php echo '<input type="text" name="comissao" id="comissao" class="form-control" value="'.$comissao.'" autofocus="true" />'; ?>					
						</div>
					</div>

					<div class="form-row">
						<div class="col" style="margin-top:10px; margin-bottom:10px">
							<label for="pais">País</label><span class="pais"><?php echo form_error('pais') ?  : ''; ?></span>
							<?php
							echo '<select name="pais" id="pais" class="form-control">';
							foreach($paises -> result() as $paises_s){
									if ($paises_s->id == $pais){
										echo '<option value="'.$paises_s->id.'" selected>'.$paises_s->nome.'</option>';
									}else{
									echo '<option value="'.$paises_s->id.'">'.$paises_s->nome.'</option>';
									}
							}
							echo '</select>';?>
						</div>
						<div class="col" style="margin-top:10px; margin-bottom:10px">
						<label for="regiao">Regiao</label><span class="regiao"><?php echo form_error('regiao') ?  : ''; ?></span>
							<?php
							echo '<select name="regiao" id="regiao" class="form-control">';
							foreach($regioes -> result() as $regioes_s){
									if ($regioes_s->id == $regiao){
										echo '<option value="'.$regioes_s->id.'" selected>'.$regioes_s->sigla.'</option>';
									}else{
									echo '<option value="'.$regioes_s->id.'">'.$regioes_s->sigla.' - '.$regioes_s->nome.'</option>';
									}
							}
							echo '</select>';?>
						</div>
					</div>	
					
					<div class="form-group">
						<label for="status">Status</label><span class="status"><?php echo form_error('status') ?  : ''; ?></span>
						<?php
						foreach ($status_equipe as $s_e){
							if ($s_e == $status){

								echo '<label class="radio-inline"><input type="radio" name="status" id="status" value="'.$s_e.'" checked>'.$s_e.'</label>';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="status" id="status" value="'.$s_e.'">'.$s_e.'</label>';
								
							}
						}
						?>
					</div>

					<div class="form-row">
						<div class="col">
							<label for="sede">Sede</label><span class="sede"><?php echo form_error('sede') ?  : ''; ?></span>
							<?php
							echo '<select name="sede" id="sede" class="form-control">';
							foreach($sedes -> result() as $s_s){
									if ($s_s->id == $sede){
										echo '<option value="'.$s_s->id.'" selected>'.$s_s->nome.'</option>';
									}else{
									echo '<option value="'.$s_s->id.'">'.$s_s->nome.'</option>';
									}
							}
							echo '</select>';?>
						</div>
						<div class="col">
						<label for="tecnico">Técnico</label><span class="tecnico"><?php echo form_error('tecnico') ?  : ''; ?></span>
						<?php
						echo '<select name="tecnico" id="tecnico" class="form-control">';
						foreach($tecnicos -> result() as $t_s){
								if ($t_s->id == $tecnico){
									echo '<option value="'.$t_s->id.'" selected>'.$t_s->nome.' "'.$t_s->nick.'" '.$t_s->sobrenome.'</option>';
								}else{
								echo '<option value="'.$t_s->id.'">'.$t_s->nome.' "'.$t_s->nick.'" '.$t_s->sobrenome.'</option>';
								}
						}
						echo '</select>';?>
						</div>
					</div>
					<div class="form-group">
						<label for="logo">Logotipo</label><span class="logo"><?php echo form_error('logo') ?  : ''; ?></span>
						<?php echo '<input type="text" name="logo" id="logo" class="form-control" value="'.$logo.'" autofocus="true" />'; ?>
					</div>
					
					<div class="form-inline" >
						<div class="form-group inline-spaced">
							<label for="cor_primaria">Cor Primária</label><span class="cor_primaria inline-spaced"><?php echo form_error('cor_primaria') ?  : ''; ?></span>
							<?php echo '<input type="color" name="cor_primaria" id="cor_primaria" value="'.$cor_primaria.'">'; ?>
						</div>
					
						
						<div class="form-group inline-spaced">
							<label for="cor_secundaria">Cor Secundária</label><span class="cor_secundaria inline-spaced"><?php echo form_error('cor_secundaria') ?  : ''; ?></span>
							<?php echo '<input type="color" name="cor_secundaria" id="cor_secundaria" value="'.$cor_secundaria.'">'; ?>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="form-group text-left" style="margin-top:30px;">
								<input type="submit" value="Salvar" class="btn btn-success" />
							</div>
						</div>
						<div class="col">
							<div class="form-group text-left" style="margin-top:30px; float:right;">
							<?= anchor('index.php/equipe', 'Voltar', 'class="btn btn-secondary "') ?>
							</div>
						</div>
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
				<?= form_close(); ?>
			</div>
			
		</div>	
