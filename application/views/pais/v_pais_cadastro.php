<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= form_open('pais/store')  ?>
<div class="form-group">
	<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
	<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
</div>
	<div class="form-group">
	<label for="name">Name</label><span class="erro"><?php echo form_error('name') ?  : ''; ?></span>
	<input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ? : (isset($name) ? $name : ''); ?>" />
</div>
	<div class="form-group">
	<label for="Flag">Flag</label><span class="erro"><?php echo form_error('flag') ?  : ''; ?></span>
	<input type="text" name="flag" id="flag" class="form-control" value="<?= set_value('flag') ? : (isset($flag) ? $flag : ''); ?>" />
</div>
<div class="form-group text-right">
	<input type="submit" value="Salvar" class="btn btn-success" />
</div>
<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
	<?= form_close(); ?>

<?= anchor('', 'Página Inicial', 'btn btn-success') ?>