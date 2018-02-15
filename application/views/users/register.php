<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('users/register'); ?>
		<h3 class="text-center"><?= $title ?></h3>
		   <div class="form-group">
		   	 <label>Usuário</label>
		   	 <input type="text" class="form-control" name="usuario" placeholder="Usuário">
		   </div>
		   <div class="form-group">
		   	 <label>E-mail</label>
		   	 <input type="text" name="email" class="form-control" placeholder="E-mail">
		   </div>
		   <div class="form-group">
		   	 <label>Senha</label>
		   	 <input type="password" name="senha" class="form-control" placeholder="Senha">
		   </div>
		   <div class="form-group">
		   	 <label>Confirmar senha</label>
		   	 <input type="password" name="senha2" class="form-control" placeholder="Confirmação de Senha">
		   </div>
		   <button type="submit" class="btn btn-primary">Registrar!</button>
		<?php echo form_close() ?>
	</div>
</div>