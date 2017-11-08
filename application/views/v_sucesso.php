
<body>
	<div class="container">
		<h1 class="text-center">Mensagem</h1>
		<div class="col-md-12">
			<div class="row">
				<div class="alert alert-success text-center">
					<?= $mensagem; ?>
				</div>
			</div>
			<div class="row text-center">
				<?= anchor('', 'Página Inicial');  ?>
			</div>
		</div>	
	</div>
</body>
</html>