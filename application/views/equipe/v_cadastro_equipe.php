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
	background-color: grey; 
	width:100%;
}

.form-adjust{
	margin-top:10px; 
	margin-bottom:10px;
}
</style>

<div class="input-equipes">
	<div class="col-md-8 offset-md-2">
		<div class="row">
			<div class="page_title team-create-edit">
				<div class="" style="float:left; height:100px; width:100px; background-color:red; border-radius:10px;">
				</div>
				<div class="" style="padding-left: 110px; height: 100px; vertical-align: middle;background-color: blue;"><h2 style="color: #222; text-weight: bold;"><?php echo 'EDIÇÃO DE EQUIPE';?></h2><h4>Equipe Nome</h4>
				</div>
			</div>
		</div>


		<div class="row">
			<?= form_open('equipe/store')  ?>
				
			<div class="form-row">
    			<div class="form-group col-md-9">
      				<label for="nome">Nome da Equipe</label>
					<span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">@
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
						<div class="input-group-addon">@
						</div>
						<input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" value="<?php echo $sigla;?>" autofocus="true" required>
					</div>
				</div>
 			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="pais">País</label><span class="pais"><?php echo form_error('pais') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">@
						</div>
						<select name="pais" id="pais" class="form-control">
							<?php
								foreach($paises -> result() as $paises_s){
										if ($paises_s->id == $pais){ 
											echo '<option value="'.$paises_s->id.'" selected>'.$paises_s->nome.'</option>';
										}else{ 
											echo '<option value="'.$paises_s->id.'">'.$paises_s->nome.'</option>';
										}
								} ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="regiao">Regiao</label><span class="regiao"><?php echo form_error('regiao') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">@
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
				<div class="form-group col-md-6">
					<label for="tecnico">Técnico</label><span class="tecnico"><?php echo form_error('tecnico') ?  : ''; ?></span>
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
				
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="logo">Logotipo</label><span class="logo"><?php echo form_error('logo') ?  : ''; ?></span>
					<div class="input-group mb-2">
						<div class="input-group-addon">@
						</div>
						<input type="text" name="logo" id="logo" class="form-control" value="<?php echo $logo;?>" placeholder="<?php echo $logo;?>" autofocus="true" />
						<div class="input-group-addon">-logo.png
						</div>
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
						<?= anchor('index.php/equipe', 'Voltar', 'class="btn btn-secondary "') ?>
					</div>
				</div>
			</div>
				<?= form_close(); ?>
		</div>
	</div>	
</div>