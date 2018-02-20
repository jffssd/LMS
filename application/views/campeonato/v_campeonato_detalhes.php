<h2>Informações do Campeonato</h2>

ID: <?php echo $id;?><br>
Nome: <?php echo $nome;?><br>
Logo: <?php echo $logo;?><br>
Ano: <?php echo $ano;?><br>
Temporada: <?php echo $temporada;?><br>
Núm. Divisões: <?php echo $numDeDivisoes;?><br>

Região ID: <?php echo $regiao_id;?><br>
Região: <?php echo $regiao_sigla;?><br>

<h3>Fase de Grupos - Info</h3>

Núm. Times: <?php echo $fg_numDeTimes;?><br>
Qtd. jogos série: <?php echo $fg_qtd_jogos_serie;?><br>

<h3>Fase Playoffs - Info</h3>

Núm. Times: <?php echo $pl_numDeTimes;?><br>
Qtd. jogos série: <?php echo $pl_qtd_jogos_serie;?><br>
Qtd. jogos série final: <?php echo $pl_qtd_jogos_serie_final;?><br>

<p><a href="<?php echo base_url('campeonatos');?>">Voltar</a></p>

<style>
	td, th{
		text-align: center;
	}
</style>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="border: 1px solid black;">
	<div class="row">
		<div class="col-1">#</div>
		<div class="col-3">Equipe</div>
		<div class="col-2">J</div>
		<div class="col-2">P</div>
		<div class="col-2">V</div>
		<div class="col-2">D</div>
	</div>
<?php
foreach ($tabela_campeonato as $tc) {
?>
	<div class="row">
		<div class="col-1"><?= $tc['ranking']; ?></div>
		<div class="col-3"><img src="<?php echo base_url('assets/img/logo-equipes/');?><?= $tc['logo']; ?>" width="24" height="24"> <?= $tc['sigla']; ?></div>
		<div class="col-2"><?= $tc['jogos']; ?></div>
		<div class="col-2"><?= $tc['pontos']; ?></div>
		<div class="col-2"><?= $tc['vitorias']; ?></div>
		<div class="col-2"><?= $tc['derrotas']; ?></div>
	</div>
<?php
}
?>
</div>

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
<?php
$count = 0;
foreach ($series_campeonato as $sc) {

	if($sc['semana'] != $count){
		$count = $sc['semana'];
		echo '<h4>Semana - '.$sc['semana'].'</h4>' ;
	}
?>

	<div class="row" style="margin-bottom:10px; border: 1px solid black;">
		<div class="col-4" style="text-align:center;"><img src="<?php echo base_url('assets/img/logo-equipes/');?><?= $sc['e1logo']; ?>" width="24" height="24"> <?php echo $sc['e1sigla'];?></div>
		<div class="col-4" style="text-align:center;">X</div>
		<div class="col-4" style="text-align:center;"><img src="<?php echo base_url('assets/img/logo-equipes/');?><?= $sc['e2logo']; ?>" width="24" height="24"> <?php echo $sc['e2sigla'];?></div>
	</div>

<?php
}
?>
</div>	