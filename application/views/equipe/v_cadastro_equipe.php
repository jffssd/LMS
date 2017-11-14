<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo ?> - Mini-Crud com Bootstrap e CodeIgniter 3.0</title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
	<style>
		.erro {
			color: #f00;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center"><?= $titulo ?></h1>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<?= form_open('index.php/equipe/store')  ?>
					<div class="form-group">
						<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>
					<div class="form-group">
						<label for="sigla">Sigla</label><span class="erro"><?php echo form_error('sigla') ?  : ''; ?></span>
						<input type="text" name="sigla" id="sigla" class="form-control" value="<?= set_value('sigla') ? : (isset($sigla) ? $sigla : '') ?>" autofocus='true' />
					</div>
					<div class="form-group">
						<label for="regiao">Regiao</label><span class="regiao"><?php echo form_error('regiao') ?  : ''; ?></span>
						<input type="text" name="regiao" id="regiao" class="form-control" value="<?= set_value('regiao') ? : (isset($regiao) ? $regiao : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
					<label for="regiao">País</label><span class="regiao"><?php echo form_error('regiao') ?  : ''; ?></span>

					<?php	
					echo '<select name="pais" id="pais" class="form-control">';
					foreach($paises -> result() as $pais){
							echo '<option value="'.$pais->id.'">'.$pais->nome.'</option>';
					}
					echo '</select>';
					
					?>
					</div>
					<div class="form-group">
						<label for="status">Status</label><span class="status"><?php echo form_error('status') ?  : ''; ?></span>
						<textarea name="status" id="status" class="form-control" /><?= set_value('status') ? : (isset($status) ? $status : ''); ?></textarea>
					</div>
					
					<div class="form-group">
						<label for="sede">Sede</label><span class="sede"><?php echo form_error('sede') ?  : ''; ?></span>
						<textarea name="sede" id="sede" class="form-control" /><?= set_value('sede') ? : (isset($sede) ? $sede : ''); ?></textarea>
					</div>

					<div class="form-group">
						<label for="tecnico">Tecnico</label><span class="tecnico"><?php echo form_error('tecnico') ?  : ''; ?></span>
						<textarea name="tecnico" id="tecnico" class="form-control" /><?= set_value('tecnico') ? : (isset($tecnico) ? $tecnico : ''); ?></textarea>
					</div>

					<div class="form-group">
						<label for="comissao">Comissao</label><span class="comissao"><?php echo form_error('comissao') ?  : ''; ?></span>
						<textarea name="comissao" id="comissao" class="form-control" /><?= set_value('comissao') ? : (isset($comissao) ? $comissao : ''); ?></textarea>
					</div>

					<div class="form-group">
						<label for="logo">Logotipo</label><span class="logo"><?php echo form_error('logo') ?  : ''; ?></span>
						<textarea name="logo" id="logo" class="form-control" /><?= set_value('logo') ? : (isset($logo) ? $logo : ''); ?></textarea>
					</div>

					<div class="form-group">
						<label for="cor_primaria">Cor Primaria</label><span class="cor_primaria"><?php echo form_error('cor_primaria') ?  : ''; ?></span>
						<textarea name="cor_primaria" id="cor_primaria" class="form-control" /><?= set_value('cor_primaria') ? : (isset($cor_primaria) ? $cor_primaria : ''); ?></textarea>
					</div>

					<div class="form-group">
						<label for="cor_secundaria">Cor Secundaria</label><span class="cor_secundaria"><?php echo form_error('cor_secundaria') ?  : ''; ?></span>
						<textarea name="cor_secundaria" id="cor_secundaria" class="form-control" /><?= set_value('cor_secundaria') ? : (isset($cor_secundaria) ? $cor_secundaria : ''); ?></textarea>
					</div>
					
					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>


					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
				<?= form_close(); ?>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<?= anchor('', 'Página Inicial') ?>
			</div>
		</div>	
	</div>
</body>
</html>