<h2>Informações da série</h2>
<div class="col-6">
<table class="table table-striped table-bordered">
	<tbody>
	<?php
	    foreach($serie -> result() as $sc){
	?>
	<tr>
		<td align="center"><?= $sc->jogo_num;?></td>
		<td align="center"><?= $sc->placar_equipe1;?></td>
		<td align="center"><img class="img-logo-times" src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $sc->e1logo;?>" width="32" height="32"> <?= $sc->e1sigla;?></td>
		<td align="center">X</td>
		<td align="center"><img class="img-logo-times" src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $sc->e2logo;?>" width="32" height="32"> <?= $sc->e2sigla;?></td>
		<td align="center"><?= $sc->placar_equipe2;?></td>
		<td align="center"><?= $sc->status;?></td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>
</div>