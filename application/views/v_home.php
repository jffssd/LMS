
	<div class="container">
		<h1 class="text-center text-light">Mini-Crud com CodeIgniter 3.0 e Bootstrap!</h1>
		<div class="col-md-12  table-background">
			
		  <div class="header-container">
				<h3 class="text-light"><?= $cadastros->num_rows(); ?> registros(s)</h3>
			</div>


			<div class="row">
			<?php if ($cadastros->num_rows() > 0){
				echo '<table class="table table-dark">';
				echo '<thead class="thead-light" style="text-light">';
				echo '<tr>';
				echo '<th>Código</th>';
				echo '<th>Nome</th>';
				echo '<th>Telefone</th>';
				echo '<th>E-mail</th>';
				echo '<th>Observações</th>';
				echo '<th>Ações</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
						 foreach($cadastros -> result() as $cadastro){
						echo '<tr>';
						echo '<td>'.$cadastro->id.'</td>';
						echo '<td>'.$cadastro->nome.'</td>';
						echo '<td>'.$cadastro->telefone.'</td>';
						echo '<td>'.$cadastro->email.'</td>';
						echo '<td>'.$cadastro->observacoes.'</td>';
						echo '<td>'.anchor("cadastro/edit/$cadastro->id", "Editar"); 
						echo '<a href="#" class="confirma_exclusao" data-id="'.$cadastro->id.'" data-nome="'.$cadastro->nome.'" />Excluir</a></td>';
						echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';
				} else{
					echo '<h4 class="text-light">Nenhum registro cadastrado.</h4>';
				} ?>
			</div>
			<div class="row">
				<?= anchor('cadastro/create', 'Novo Cadastro', array('class' => 'btn btn-success')); ?>
			</div>


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
				document.location.href = base_url + "index.php/cadastro/delete/"+id;
			});					
		});
	</script>
	
