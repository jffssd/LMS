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
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
                		<img class="login-tigle-logo" src="<?php echo base_url('assets/img/ces_logo.png');?>" alt="Imagem de Perfil">
					</div>
					<div class="card-header" style="text-align:center;">
						<h5 style="color: #ee4546;">CENTRO E-SPORTS!</h5>
					</div>
					<div class="card fat">
						<div class="card-title login-title-bg">
							<h4 class="form-login-title"><i class="fa fa-fw fa-chevron-right"></i> Entrar</h4>
						</div>
						<div class="card-body card-body-login">
    						<?php echo form_open('users/login'); ?>
							 
								<div class="form-group">
									<label for="email">Seu e-mail</label>
									<input id="usuario" type="text" class="form-control" name="usuario" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Senha
										<a href="<?php echo base_url().'users/relembrar_senha';?>" class="float-right ces-main-color-link">
											Esqueceu a senha?
										</a>
									</label>
									<input id="senha" type="password" class="form-control" name="senha" required data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Mantenha-me conectado
									</label>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn ces-main-color-bg btn-block">
										Entrar
									</button>
								</div>
								<div class="margin-top20 text-center ">
									Não possui uma conta? <a class="ces-main-color-link" href="<?php echo base_url().'registrar';?>">Cadastre-se aqui</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						CENTRO E-SPORTS! &copy; por <strong>jffssd</strong> - 2018
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