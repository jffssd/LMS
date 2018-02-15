<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color:white; border: 1px solid #262b33;">
	<thead class="thead-dark">
		<tr>
		<th style="text-align:center;">id</th>
		<th style="text-align:center;">Função</th>
		<th style="text-align:center;">Jogador</th>
		<th style="text-align:center;">País</th>
		<th width="15"></th>
		<th width="15"></th>
		<th width="15"></th>
	    </tr>
	</thead>
	<tbody>
	<?php 
	$count = 0;
	foreach($jogadores -> result() as $jogador){
	$count++; ?>
		<tr>
			<td class="td_row"><?php echo $jogador->id;?></td>
	    <td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $jogador->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"> <?php echo $jogador->funcao_nome;?></td>
			<td class="td_row"><img src="<?php echo site_url();?>assets/img/profiles/thumb/<?php echo $jogador->foto;?>" width="40" height="40">  <strong><?php echo $jogador->nick;?></strong></td>
			<td class="td_row"><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $jogador->pais_flag;?>.png" alt="<?php echo $jogador->pais_nome;?>" width="30" height="20"> <?php echo $jogador->pais_nome;?></td>
			<td class="td_row"><a href="<?php echo site_url();?>jogador/view/<?php echo $jogador->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
			<td class="td_row"><a href="<?php echo site_url();?>jogador/edit/<?php echo $jogador->id;?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
			<td class="td_row"><a href="#" class="confirma_exclusao btn btn-danger btn-sm" data-id="<?php echo $jogador->id;?>" data-nome="<?php echo $jogador->nick;?>" /><i class="fa fa-times" aria-hidden="true"></i></a></td>
		</tr>
		<?php }	?>
	</tbody>
</table>


			
<div class="modal fade" id="modal_confirmation">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Confirma Exclusão</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
      <div class="modal-body">
        <p style="color:#afafaf;">Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não</button>
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
				document.location.href = base_url + "index.php/jogador/delete/"+id;
			});					
		});
	</script>

	<script>
		$(document).ready( function () {
			$('#dataTable').dataTable( {
			"lengthChange": false
			} );
		} );
	</script>