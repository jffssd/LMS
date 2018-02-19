<table>
	<thead>
		<th>Logo</th>
		<th>Nome</th>
		<th>Status</th>
	</thead>
	<tbody>
	<?php
	    foreach($campeonatos -> result() as $campeonato){
	?>
	<tr>
		<td><img src="<?php echo site_url().'assets/img/campeonatos/logos'.$campeonato->logo; ?>" alt="logo"></td>
		<td><a href="<?php echo site_url().'campeonatos/detalhes/'.$campeonato->id; ?>">Nome: <?= $campeonato->nome;?></a></td>
		<td>Ano: <?= $campeonato->ano;?></td>
		<td>Status: <?= $campeonato->status;?></td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>