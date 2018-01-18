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

<div class="col-md-6">
	<div class="row">
		<div class="table-responsive" style="padding-top:10px; padding-left:0px; padding-right:0px;">
			<div style="background-color: #262b33; color #eeeeee; padding-top:16px; padding-left:0px; padding-right:0px; border-radius: 10px;">
				<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color:white; border: 1px solid #262b33;">
					<thead class="thead-dark">
						<tr>
							<th style="text-align:center;">Ano</th>
							<th style="text-align:center;">Equipe</th>
							<th style="text-align:center;" width="40">Transação</th>
							<th style="text-align:center;">Jogador</th>
							<th style="text-align:center;" width="25">Função</th>
							<th style="text-align:center;" width="25">País</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($transf_jogadores -> result() as $t_j){ ?>
						<tr>
							<td align="center"><h5><span class="badge badge-secondary"><?php echo date("Y", strtotime($t_j->data_transacao));?></span></h5></td>
							<td align="center"><img src="<?php echo site_url().'assets/img/logo-equipes/'.$t_j->equipe_logo;?>" alt="<?php echo $t_j->equipe_logo;?>" width="40" height="40"> </td>
							
							<?php	
							if($t_j->tipo == 'C'){ 
								echo '<td align="center"><i class="fa fa-fw fa-arrow-left" style="font-size:40px; color: #3498DB;"></i>';
							}elseif($t_j->tipo == 'S'){ 
								echo '<td align="center"><i class="fa fa-fw fa-arrow-right" style="font-size:40px; color: #c0392B;"></i>';
							}elseif($t_j->tipo == 'EI'){ 
								echo '<td align="center"><i class="fa fa-fw fa-sign-in fa-flip-horizontal" style="font-size:40px; color:#27AE60; "></i>';
							}elseif($t_j->tipo == 'EV'){ 
								echo '<td align="center"><i class="fa fa-fw fa-sign-out" style="font-size:40px; color:#16A085;"></i>';
							}
		
							?>
							</span></td>
							<td><img src="<?php echo site_url().'assets/img/profiles/thumb/'.$t_j->foto;?>" width="40" height="40" style="border-radius:7px;"> <span style="font-size: 16px;"><?php echo $t_j->nick;?></span></td>
							<td align="center"><img src="<?php echo site_url().'assets/img/roles/'.$t_j->funcao_id;?>.png" alt="<?php echo $t_j->funcao_nome;?>" width="40" height="40"></td>	
							<td><img src="<?php echo site_url().'assets/img/bandeiras/'.$t_j->pais_flag;?>.png" width="40" height="25"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready( function() {
	$('#dataTable').dataTable( {
	"pageLength": 20
	} );
} )
</script>