<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="jffssd">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url('assets/css/style-login.css');?>" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />


</head>

<style>
.form-control:focus{
	border-color: #bec4ca !important;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(101, 101, 101, 0.6) !important;
}

.login-title-bg{
	background-color: #2a383e;
    color: #ffffff;
    padding: 10px;
}

.card{
	border: none !important;
}
</style>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
                		<img class="login-tigle-logo" src="<?php echo base_url('assets/img/ces_logo.png');?>" alt="Imagem de Perfil">
					</div>
					<div class="card-header" style="text-align:center;">
						<h5 style="color: #ee4546;">CENTRO E-SPORTS!</h5>
					</div>
					<div class="card fat">
						<div class="card-title login-title-bg">
							<h4 class="form-login-title"><i class="fa fa-fw fa-chevron-right"></i> Lembrar minha senha</h4>
						</div>
						<div class="card-body">
    						<?php echo form_open('users/cadastrar_nova_senha'); ?>
								<div class="form-group">
									<label for="senha">Seu e-mail</label>
									<input id="email" type="text" class="form-control" name="email" value="<?php echo $email;?>" readonly>
									<input id="chave_temporaria" type="hidden" name="chave_temporaria" value="<?php echo $chave_temporaria;?>">						
									<label for="senha">Digite sua nova senha</label>
									<input id="senha" type="password" class="form-control" name="senha" value="" required autofocus>
									<label for="senha2">Redigite a senha</label>
									<input id="senha2" type="password" class="form-control" name="senha2" value="" required autofocus>
									</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn ces-main-color-bg btn-block">
										Definir nova senha
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Carreira e-Sports! &copy; por <strong>jffssd</strong> 2018
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?php echo base_url('assets/js/my-login.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>