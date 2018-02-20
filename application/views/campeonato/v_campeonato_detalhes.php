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
<?php
foreach ($tabela_campeonato as $tc) {
?>
<table>
	<thead>
		<th>#</th>
		<th>Equipe</th>
		<th>Jogos</th>
		<th>Pontos</th>
		<th>Vitórias</th>
		<th>Derrotas</th>
	</thead>
	<tbody>
		<tr>
		    <td><?= $tc['ranking']; ?></td>
		    <td><?= $tc['sigla']; ?></td>
		    <td><?= $tc['jogos']; ?></td>
		    <td><?= $tc['pontos']; ?></td>
		    <td><?= $tc['vitorias']; ?></td>
		    <td><?= $tc['derrotas']; ?></td>
		</tr>
	</tbody>
</table>
<?php
}
?>

<?php
$count = 0;
foreach ($series_campeonato as $sc) {

	if($sc['semana'] != $count){
		$count = $sc['semana'];
		echo '<h3>Semana - '.$sc['semana'].'</h3>' ;
	}
?>
	<tr>
	    <td><?= $sc['e1sigla']; ?></td>
	    <td><?= $count; ?></td>
	    <td><?= $sc['e2sigla']; ?></td>
	</tr>
	
<?php
}
?>

<table>