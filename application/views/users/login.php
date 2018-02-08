<html>
<head>

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/login-style.css');?>">

</head>
<body>
<div class="login">
    <div class="text-center" style="margin-bottom:10px;">
		<img src="<?php echo base_url(); ?>assets/images/yadi-ci-logo.png" alt="logo.png">
		<p style="color: #ee4445;">Carreira E-sports</p>
    </div>
    <?php echo form_open('users/login'); ?>
    	<input type="text" name="usuario" placeholder="Usuário" required="required" />
        <input type="password" name="senha" placeholder="Senha" required="required" />
        <button type="submit" class="btn btn-danger btn-block btn-large">Entrar!</button>
    </form>
</div>

</body>

<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</html>