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

<div class="col-md-8">
	<div class="row">
		<div class="table-responsive" style="padding-top:10px; padding-left:0px; padding-right:0px;">
			<div style="background-color: #262b33; color #eeeeee; padding-top:16px; padding-left:0px; padding-right:0px; border-radius: 10px;">
				<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color:white; border: 1px solid #262b33;">
					<thead class="thead-dark">
						<tr>
							<th style="text-align:center;">Ano</th>
							<th style="text-align:center;">Data</th>
							<th style="text-align:center;">Equipe</th>
							<th style="text-align:center;" width="70">Transação</th>
							<th style="text-align:center;">Jogador</th>
							<th style="text-align:center;" width="70">Posição</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($transf_jogadores -> result() as $t_j){ 
							
							if($t_j->tipo == 'C'){ 
								echo '<tr class="table-info">';
							
							}elseif($t_j->tipo == 'S'){ 
								echo '<tr class="table-danger">';
							
							}else{ 
								echo '<tr>';
							}?>
							<td align="center"><?php echo date("Y", strtotime($t_j->data_transacao));?></td>
							<td align="center"><?php echo date("d/m", strtotime($t_j->data_transacao));?></td>
							<td align="center"><img src="<?php echo site_url().'assets/img/logo-equipes/'.$t_j->equipe_logo;?>" alt="<?php echo $t_j->equipe_logo;?>" width="70" height="70"> </td>
							<td>
							<?php	
							if($t_j->tipo == 'C'){ 
								echo '<i class="fa fa-fw fa-arrow-left" style="font-size:70px;"></i>';
							}elseif($t_j->tipo == 'S'){ 
								echo '<i class="fa fa-fw fa-arrow-right" style="font-size:70px;"></i>';
							}elseif($t_j->tipo == 'EI'){ 
								echo '<i class="fa fa-fw fa-sign-in fa-flip-horizontal" style="font-size:70px;"></i>';
							}elseif($t_j->tipo == 'EV'){ 
								echo '<i class="fa fa-fw fa-sign-out" style="font-size:70px;"></i>';
							}
							
							
							
							?>
							</span></td>
							<td><img src="<?php echo site_url().'assets/img/profiles/thumb/'.$t_j->foto;?>" width="70" height="70" style="border-radius:7px;"> <span style="font-weight:bold; font-size: 20px;"><?php echo $t_j->nick;?></span> <img src="<?php echo site_url().'assets/img/bandeiras/'.$t_j->pais_flag;?>.png" width="25" height="15"></td>
							<td align="center"><img src="<?php echo site_url().'assets/img/roles/'.$t_j->funcao_id;?>.png" alt="<?php echo $t_j->funcao_nome;?>" width="70" height="70"></td>	
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>