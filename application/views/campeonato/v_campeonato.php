
<style>
.breadcrumb-holder{
	background-color: #e4e4e4;
	height:46px;
}

</style>
<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h2 class="main-title float-left">Equipes</h2>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item">Início</li>
					<li class="breadcrumb-item active">Equipes</li>
				</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<style>
.campeonato-lista-item:hover{
	background-color: #d0d0d0 !important;
	box-shadow: inset 0px 0px 0px 1px #bbbbbb;
}
.campeonato-logo-thumb{
	height: 50px;
	width: 50px;
}
</style>
<div class="col-xl-4">

<?php foreach($campeonatos -> result() as $campeonato){ ?>

<div class="campeonato-lista-item" style="height: 70px; width: 100%; background-color: #e4e4e4; margin-bottom: 10px; cursor: pointer;">
	<div class="row" style="height: 70px; padding-left: 10px;">
		<div style="width:20%; height: 100%; line-height: 70px; padding-left: 10px; padding-bottom: 10px;">
			<img class="campeonato-logo-thumb" src="<?php echo site_url().'assets/img/campeonatos/logos/'.$campeonato->logo; ?>" alt="logo">
		</div>
		<div style="width: 60%; height: 100%;  line-height: 70px;">
			<a href="<?php echo site_url().'campeonatos/detalhes/'.$campeonato->id; ?>"><strong><?= $campeonato->nome;?></strong></a>
		</div>
		<div style="width: 20%; height: 100%;  line-height: 70px;">
			<a href="#"><?php echo $campeonato->temporada;?>ª Temp.</a>
		</div>
	</div>
</div>
<?php
}
?>
</div>