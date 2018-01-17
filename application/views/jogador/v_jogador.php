<style>
.page-item.active .page-link {
    z-index: 2;
    color: #eeeeee;
    background-color: #515c6c;
    border-color: #dddddd;
}

.page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #262b33;
    background-color: #eeeeee;
    border: 1px solid #dddddd;
}
.container-fluid{
	padding-left: 0px;
	padding-right: 0px;
}

.col-sm-12{
	padding-left:0px;
	padding-right:0px;
}

.dataTables_filter {
	color: #eeeeee;
	margin-right:15px;
}

.dataTables_length{
	color: #eeeeee
}

.dataTables_info{
	color: #eeeeee;
	margin-left:15px;
	margin-bottom:5px;
}

.pagination{
	margin-right: 15px !important;
    margin-bottom: 10px !important;
}

</style>

<div class="tab-jogador" style="padding:10px;">
	<div class="col-md-12">
		<div class="row">




			<div class="col-md-3" style="border-radius: 10px; padding-bottom: 10px;">
				<div class="row" style="margin-bottom: 0px;background-color:#262b33; color: #eeeeee; height: 50px; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
					<div class="col-12" align="center" style="margin-bottom:5px; padding-top:14px;">
						<h5 style="font-size:16px;"><strong>MELHORES POR POSICAO</strong></h5>
					</div>
				</div>
				<div style="background-color: #00778d; height:4px;">
				</div>
				<table class="table table-striped" style="background-color:white; border: 1px solid #262b33;margin-bottom:0px;">
					<tbody>
					
								<?php 
										$count = 0;
										foreach($top_jogadores as $t_j){
											$count++; ?>
										<tr>
											<td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $t_j[fid];?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"></td>
											<td class="td_row"><strong><?php echo $t_j[nick];?></strong></td>
											<td class="td_row"><?php echo $t_j[soma];?></td>
										</tr>
								<?php 	if ($count == 5){
													break;
										}
								}
								?>
							</tbody>
						</table>
				<div align="center" class="tbl-footer" style="margin-top: 0px;background-color:#262b33; color: #eeeeee; height: 30px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; "><a href="#" style="color:#eeeeee; text-decoration:none;">Ver mais...</a>
				</div>
			</div>

		


			<div class="col-md-3" style="border-radius: 10px; padding-bottom: 10px;">
				<div class="row" style="margin-bottom: 0px;background-color:#262b33; color: #eeeeee; height: 50px; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
					<div class="col-12" align="center" style="margin-bottom:5px; padding-top:14px;">
						<h5 style="font-size:16px;"><strong>MAIS ESCALADOS</strong></h5>
					</div>
				</div>
				<div style="background-color: #00778d; height:4px;">
				</div>
				<?php	if ($jogadores->num_rows() > 0){ ?>
				<table class="table table-striped" style="background-color:white; border: 1px solid #262b33;margin-bottom:0px;">
					<tbody>
						<?php 
							$count = 0;
							foreach($jogadores -> result() as $jogador){
								$count++; ?>
								<tr>
									<td class="td_row"><?php echo $count;?></td>
									<td class="td_row"><strong><?php echo $jogador->nick;?></strong></td>
									<td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $jogador->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"></td>
									<td class="td_row">0</td>
								</tr>
							<?php 	
								if ($count == 5){
									break;
								}
							}
							?>
					</tbody>
				</table>
				<?php
					} else{	?>
					<h4 class="text-light">Nenhum registro cadastrado.</h4>
					<?php 
						} ?>
				<div align="center" class="tbl-footer" style="margin-top: 0px;background-color:#262b33; color: #eeeeee; height: 30px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; "><a href="#" style="color:#eeeeee; text-decoration:none;">Ver mais...</a>
				</div>
			</div>

			<div class="col-md-3" style="border-radius: 10px; padding-bottom: 10px;">
				<div class="row" style="margin-bottom: 0px;background-color:#262b33; color: #eeeeee; height: 50px; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
					<div class="col-12" align="center" style="margin-bottom:5px; padding-top:14px;">
						<h5 style="font-size:16px;"><strong>MAIORES ATRIBUTOS</strong></h5>
					</div>
				</div>
				<div style="background-color: #00778d; height:4px;">
				</div>
				<?php	if ($jogadores->num_rows() > 0){ ?>
				<table class="table table-striped" style="background-color:white; border: 1px solid #262b33;margin-bottom:0px;">
					<tbody>
						<?php 
							$count = 0;
							foreach($jogadores -> result() as $jogador){
								$count++; ?>
								<tr>
									<td class="td_row"><?php echo $count;?></td>
									<td class="td_row"><strong><?php echo $jogador->nick;?></strong></td>
									<td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $jogador->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"></td>
									<td class="td_row">0</td>
								</tr>
							<?php 	
								if ($count == 5){
									break;
								}
							}
							?>
					</tbody>
				</table>
				<?php
					} else{	?>
					<h4 class="text-light">Nenhum registro cadastrado.</h4>
					<?php 
						} ?>
				<div align="center" class="tbl-footer" style="margin-top: 0px;background-color:#262b33; color: #eeeeee; height: 30px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; "><a href="#" style="color:#eeeeee; text-decoration:none;">Ver mais...</a>
				</div>
			</div>
			
			<div class="col-md-3" style="border-radius: 10px; padding-bottom: 10px;">
				<div class="row" style="margin-bottom: 0px;background-color:#262b33; color: #eeeeee; height: 50px; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
					<div class="col-12" align="center" style="margin-bottom:5px; padding-top:14px;">
						<h5 style="font-size:16px;"><strong>MAIORES PERÍCIAS</strong></h5>
					</div>
				</div>
				<div style="background-color: #00778d; height:4px;">
				</div>
				<?php	if ($jogadores->num_rows() > 0){ ?>
				<table class="table table-striped" style="background-color:white; border: 1px solid #262b33;margin-bottom:0px;">
					<tbody>
						<?php 
							$count = 0;
							foreach($jogadores -> result() as $jogador){
								$count++; ?>
								<tr>
									<td class="td_row"><?php echo $count;?></td>
									<td class="td_row"><strong><?php echo $jogador->nick;?></strong></td>
									<td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $jogador->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"></td>
									<td class="td_row">0</td>
								</tr>
							<?php 	
								if ($count == 5){
									break;
								}
							}
							?>
					</tbody>
				</table>
				<?php
					} else{	?>
					<h4 class="text-light">Nenhum registro cadastrado.</h4>
					<?php 
						} ?>
				<div align="center" class="tbl-footer" style="margin-top: 0px;background-color:#262b33; color: #eeeeee; height: 30px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; "><a href="#" style="color:#eeeeee; text-decoration:none;">Ver mais...</a>
				</div>
			</div>



		</div>


		<div class="row">
			<?php	if ($jogadores->num_rows() > 0){ ?>
			<div class="table-responsive" style="padding-top:10px; padding-left:0px; padding-right:0px;">
				<div style="background-color: #262b33; color #eeeeee; padding-top:16px; padding-left:0px; padding-right:0px; border-radius: 10px;">
					<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color:white; border: 1px solid #262b33;">
						<thead class="thead-dark">
							<tr>
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
								<td class="td_row"><img src="<?php echo site_url();?>assets/img/roles/<?php echo $jogador->funcao_id;?>.png" width="24" height="24" style="margin-top:-3px; margin-right:5px;"> <?php echo $jogador->funcao_nome;?></td>
								<td class="td_row"><img src="<?php echo site_url();?>assets/img/profiles/thumb/<?php echo $jogador->foto;?>" width="40" height="40">  <strong><?php echo $jogador->nick;?></strong></td>
								<td class="td_row"><img src="<?php echo site_url();?>assets/img/bandeiras/<?php echo $jogador->pais_flag;?>.png" alt="<?php echo $jogador->pais_nome;?>" width="30" height="20"> <?php echo $jogador->pais_nome;?></td>
								<td class="td_row"><a href="<?php echo site_url();?>jogador/view/<?php echo $jogador->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
								<td class="td_row"><a href="<?php echo site_url();?>jogador/edit/<?php echo $jogador->id;?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<td class="td_row"><a href="#" class="confirma_exclusao btn btn-danger btn-sm" data-id="<?php echo $jogador->id;?>" data-nome="<?php echo $jogador->nick;?>" /><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
			  			<?php }
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
	</div>
</div>


			
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
	