<div class="tab-equipe" style="padding:10px;">
<div class="col-md-12">
	<div class="row">
	

	<?php	if ($paises->num_rows() > 0){ ?>

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
					<?php foreach($paises -> result() as $pais){  ?>
							<tr>
								<td class="td_row"><?php echo $pais->id;?></td>
								<td class="td_row"><img src="<?php echo site_url().'assets/img/bandeiras/'.$pais->flag.'.png';?>" width="30" height="15"></td>
								<td class="td_row"><?php echo $pais->nome;?></td>
								<td class="td_row"><?php echo $pais->name;?></td>
								<td class="td_row"><?php echo $pais->flag;?></td>
								<td class="td_row"><a href="#" class="confirma_exclusao btn btn-danger btn-sm" data-id="<?php echo $pais->id;?>" data-nome="<?php echo $pais->nome;?>" /><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
					<?php
					}
					?>
					</tbody>
				</table>
		<?php
		} else{	?>
			<h4 class="text-light">Nenhum registro cadastrado.</h4>
		<?php 
		} ?>
	</div>
</div>	
</div>




	
<div class="modal fade" id="modal_confirmation">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Confirmação de Exclusão</h4>
	</div>
	<div class="modal-body">
		<p style="color:#afafaf;">Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
		<button type="button" class="btn btn-danger" id="btn_excluir">Sim. Acabe com ele</button>
	</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>	
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script>

var base_url = "<?= base_url(); ?>";

$(function(){
	$('.confirma_exclusao').on('click', function(e) {
			e.preventDefault();
			
			var nome = $(this).data('nome');
			var id = $(this).data('id');
			
			$('#modal_confirmation').data('nome', nome);
			$('#modal_confirmation').data('id', id);
			$('#modal_confirmation').modal('show');
	});
	
	$('#modal_confirmation').on('show.bs.modal', function () {
		var nome = $(this).data('nome');
		$('#nome_exclusao').text(nome);
	});	
	
	$('#btn_excluir').click(function(){
		var id = $('#modal_confirmation').data('id');
		document.location.href = base_url + "index.php/equipe/delete/"+id;
	});					
});
</script>

