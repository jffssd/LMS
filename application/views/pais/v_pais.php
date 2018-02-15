<table class="table table-striped">
	<thead class="thead-light" style="text-light">
		<tr>
			<th>ID</th>
			<th>Bandeira/Flag</th>
			<th>Nome</th>
			<th>Name</th>
			<th>Flag</th>
			<th width="10%" colspan="3">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($paises -> result() as $pais){  ?>
		<tr>
			<td class="td_row"><?php echo $pais->id;?></td>
			<td class="td_row"><img src="<?php echo site_url().'assets/img/bandeiras/'.$pais->flag.'.png';?>" width="30" height="15"></td>
			<td class="td_row"><?php echo $pais->nome;?></td>
			<td class="td_row"><?php echo $pais->name;?></td>
			<td class="td_row"><?php echo $pais->flag;?></td>
			<td class="td_row"><a href="<?php echo site_url('pais/edit/').$pais->id;?>"/>Editar</a></td>
			<td class="td_row"><a href="<?php echo site_url('pais/delete/').$pais->id;?>"/>Excluir</a></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>