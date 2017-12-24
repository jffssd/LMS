		<div class="col-md-8">
			<div class="row">
			<?php

			if ($equipes->num_rows() > 0){

				
				
				echo '<table class="table table-striped">';
				echo '<thead class="thead-light" style="text-light">';
				echo '<tr>';
				echo '<th> </th>';
				echo '<th>Nome</th>';
				echo '<th>Sigla</th>';
				echo '<th>CP</th>';
				echo '<th>CS</th>';
				echo '<th width="10%" colspan="3">Ações</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
						foreach($equipes -> result() as $equipe){
						echo '<tr>';
						echo '<td class="td_row"><img src="'.site_url().'assets/img/logo-equipes/'.$equipe->logo.'" class="logo-team"></td>';
						echo '<td class="td_row">'.$equipe->nome.'</td>';
						echo '<td class="td_row"><span class="badge badge-dark">'.$equipe->sigla.'</span></td>';
						echo '<td class="td_row"><div class="team_color_box" style="background-color:'.$equipe->cor_primaria.'; "></div></td>';
						echo '<td class="td_row"><div class="team_color_box" style="background-color:'.$equipe->cor_secundaria.';"></div></td>';
						echo '<td class="td_row"><a href="'.site_url().'index.php/equipe/view/'.$equipe->id.'" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';	
						echo '<td class="td_row"><a href="'.site_url().'index.php/equipe/edit/'.$equipe->id.'" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
						echo '<td class="td_row"><a href="#" class="confirma_exclusao btn btn-danger btn-sm" data-id="'.$equipe->id.'" data-nome="'.$equipe->nome.'" /><i class="fa fa-times" aria-hidden="true"></i></a></td>';
						echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

				} else{
					echo '<h4 class="text-light">Nenhum registro cadastrado.</h4>';
				} ?>

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
	
