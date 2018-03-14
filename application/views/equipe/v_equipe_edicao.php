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
				<div class="" style="color: #868e89;"><h2 style="font-weight: bold; margin-left:110px; font-size:32px;"><?php echo $title;?></h2><h4><?php echo isset($id) ? $nome : ''; ?> <?php echo isset($id) ? '<span class="badge badge-dark">'.$sigla.'</span>' : ''; ?></h4></div>
			</div>
		</div>


		<div class="row">

			<?= form_open('equipe/store_edit')  ?>

			<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">

			<div class="form-row">
    			<div class="form-group col-md-9">
      				<label for="nome">Nome da Equipe</label>
					<span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i>
						</div>
						<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php if(isset($nome)){ echo $nome;}?>" autofocus="true" <?php if(isset($nome)){ echo 'disabled';}else{ echo 'required';}?>>
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
						<input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" value="<?php if(isset($sigla)){ echo $sigla;}?>" autofocus="true" <?php if(isset($sigla)){ echo 'disabled';}else{ echo 'required';}?>>
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
				<div class="form-group col-md-12">
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
						<input type="text" name="logo" id="logo" class="form-control" value="<?php if(isset($logo)){ echo $logo;}?>" placeholder="Logo" autofocus="true" />
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
						<input type="text" name="site" id="site" class="form-control" value="<?php if(isset($site)){ echo $site;}?>" placeholder="Site" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_fb">Facebook</label><span class="social_fb"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_fb" id="social_fb" class="form-control" value="<?php if(isset($social_fb)){ echo $social_fb;}?>" placeholder="Facebook" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_tw">Twitter</label><span class="social_tw"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_tw" id="social_tw" class="form-control" value="<?php if(isset($social_tw)){ echo $social_tw;}?>" placeholder="Twitter" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="social_in">Instagram</label><span class="social_in"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon"><i class="fa fa-instagram" aria-hidden="true"></i>
						</div>
						<input type="text" name="social_in" id="social_in" class="form-control" value="<?php if(isset($social_in)){ echo $social_in;}?>" placeholder="Instagram" autofocus="true" />
					</div>
				</div>
			</div>

            <div class="form-row">
				<div class="form-group col-md-12">
					<label for="cor_primaria">Cor Primária</label><span class="cor_primaria"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">#
						</div>
						<input type="text" name="cor_primaria" id="cor_primaria" class="form-control" value="<?php if(isset($cor_primaria)){ echo $cor_primaria;}?>" placeholder="Cor Primária" autofocus="true" />
					</div>
				</div>
			</div>

            <div class="form-row">
				<div class="form-group col-md-12">
					<label for="cor_secundaria">Cor Secundaria</label><span class="cor_secundaria"></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">#
						</div>
						<input type="text" name="cor_secundaria" id="cor_secundaria" class="form-control" value="<?php if(isset($cor_secundaria)){ echo $cor_secundaria;}?>" placeholder="Cor Secundária" autofocus="true" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="col">
					<div class="form-group text-left" style="margin-top:30px; float:right;">
						<?= anchor('equipe', 'Voltar', 'class="btn btn-secondary"') ?>
					</div>
				</div>
                <div class="col">
					<div class="form-group text-left" style="margin-top:30px;">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
				</div>
			</div>
				<?= form_close(); ?>
		</div>
	</div>
</div>
