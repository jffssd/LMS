<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.team-create-edit{
	font-family: helvetica, tahoma;
	font-weight:bold;
	height: 120px; 
	padding:10px;
	margin-top:10px; 

	width:100%;
}

.form-adjust{
	margin-top:10px; 
	margin-bottom:10px;
}

.logo-team-store{
	float:left; 
	height:100px; 
	width:100px; 
	border-radius:10px; 
}

.name-team-store{
	padding-left: 130px; height: 100px; vertical-align: middle;
}
</style>
<div class="input-equipes">
	<div class="col-md-8 offset-md-2">
		<div class="row">
			<div class="page_title team-create-edit">
				<div class="logo-team-store"><img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo isset($id) ? $logo : 'default-team-logo.png';?>" width="100" height="100"></div>
				<div class="" style="color: #868e89;"><h2 style="font-weight: bold; margin-left:110px; font-size:32px;"><?php echo $titulo;?></h2><h4><?php echo isset($id) ? $nome : ''; ?> <?php echo isset($id) ? '<span class="badge badge-dark">'.$sigla.'</span>' : ''; ?></h4></div>
			</div>
		</div>


		<div class="row">
			<?= form_open('equipe/store')  ?>
				
			<div class="form-row">
    			<div class="form-group col-md-9">
      				<label for="nome">Nome da Equipe</label>
					<span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i>
						</div>
						<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome;?>" autofocus="true" required>
					</div>
					<small id="passwordHelpBlock" class="form-text text-muted">
						O nome da equipe deve contar no máximo 45 caracteres.
						</small>
				</div>
    			<div class="form-group col-md-3">
      				<label for="sigla">Sigla</label><?php echo form_error('sigla') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-quote-left" aria-hidden="true"></i>
						</div>
						<input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" value="<?php echo $sigla;?>" autofocus="true" required>
					</div>
				</div>
 			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="pais">País</label><span class="pais"><?php echo form_error('pais') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-flag" aria-hidden="true"></i>
						</div>
						<select name="pais" id="pais" class="form-control">
							<?php
								if(isset($id)){
									foreach($paises -> result() as $paises_s){
										if ($paises_s->id == $pais){ 
											echo '<option value="'.$paises_s->id.'" selected>'.$paises_s->nome.'</option>';
										}else{ 
											echo '<option value="'.$paises_s->id.'">'.$paises_s->nome.'</option>';
										}
									}
								}else{
									foreach($paises -> result() as $paises_s){
										if ($paises_s->id == 28){ 
											echo '<option value="'.$paises_s->id.'" selected>'.$paises_s->nome.'</option>';
										}else{ 
											echo '<option value="'.$paises_s->id.'">'.$paises_s->nome.'</option>';
										}
									}
								}
								
								 ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="regiao">Regiao</label><span class="regiao"><?php echo form_error('regiao') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<select name="regiao" id="regiao" class="form-control">
							<?php
							foreach($regioes -> result() as $regioes_s){
									if ($regioes_s->id == $regiao){
										echo '<option value="'.$regioes_s->id.'" selected>'.$regioes_s->sigla.' - '.$regioes_s->nome.'</option>';
									}else{
										echo '<option value="'.$regioes_s->id.'">'.$regioes_s->sigla.' - '.$regioes_s->nome.'</option>';
									}
								}	?>
						</select>
					</div>
				</div>
			</div>	

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="sede">Sede</label><span class="sede"><?php echo form_error('sede') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i>
						</div>
						<select name="sede" id="sede" class="form-control">
								<?php
								foreach($sedes -> result() as $s_s){
										if ($s_s->id == $sede){
											echo '<option value="'.$s_s->id.'" selected>'.$s_s->nome.'</option>';
										}else{
											echo '<option value="'.$s_s->id.'">'.$s_s->nome.'</option>';
										}
								}  ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="tecnico">Técnico</label><span class="tecnico"><?php echo form_error('tecnico') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i>
						</div>
						<select name="tecnico" id="tecnico" class="form-control">
								<?php
								foreach($tecnicos -> result() as $t_s){
										if ($t_s->id == $tecnico){
											echo '<option value="'.$t_s->id.'" selected>'.$t_s->nome.' "'.$t_s->nick.'" '.$t_s->sobrenome.'</option>';
										}else{
											echo '<option value="'.$t_s->id.'">'.$t_s->nome.' "'.$t_s->nick.'" '.$t_s->sobrenome.'</option>';
										}
								} ?>
						</select>
					</div>
				</div>
			</div>
				
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="logo">Logotipo</label><span class="logo"><?php echo form_error('logo') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i>
						</div>
						<input type="text" name="logo" id="logo" class="form-control" value="<?php echo $logo;?>" placeholder="<?php echo $logo;?>" autofocus="true" />
						<div class="input-group-addon">-logo.png
						</div>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="site">Site</label><span class="site"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>
						</div>
						<input type="text" name="site" id="site" class="form-control" value="<?php echo $site;?>" placeholder="<?php echo $site;?>" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_fb">Facebook</label><span class="social_fb"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_fb" id="social_fb" class="form-control" value="<?php echo $social_fb;?>" placeholder="<?php echo $social_fb;?>" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_tw">Twitter</label><span class="social_tw"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_tw" id="social_tw" class="form-control" value="<?php echo $social_tw;?>" placeholder="<?php echo $social_tw;?>" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_in">Instagram</label><span class="social_in"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-instagram" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_in" id="social_in" class="form-control" value="<?php echo $social_in;?>" placeholder="<?php echo $social_in;?>" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
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
			</div>

			<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">

			<div class="form-row">
				<div class="col">
					<div class="form-group text-left" style="margin-top:30px;">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
				</div>
				<div class="col">
					<div class="form-group text-left" style="margin-top:30px; float:right;">
						<?= anchor('equipe', 'Voltar', 'class="btn btn-secondary"') ?>
					</div>
				</div>
			</div>
				<?= form_close(); ?>
		</div>
	</div>	
</div>
