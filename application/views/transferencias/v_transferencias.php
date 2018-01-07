<div class="col-md-12">
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
							<td class="td_row"><a href="#" class="confirma_exclusao btn btn-danger btn-sm" data-id="<?php echo $jogador->id;?>" data-nome="<?php echo $jogador->nome;?>" /><i class="fa fa-times" aria-hidden="true"></i></a></td>
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