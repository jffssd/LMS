<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>

.circle-button{
	width: 50px;
 	height: 50px;
 	text-align: center;
	padding: 6px 0;
	font-size: 28px;
	line-height: 1.428571429;
	border-radius: 50%;
}

.social-button-facebook{
	background-color: #4c699e;
	color: #ffffff !important;
}

.social-button-facebook:hover{
	background-color: #30487b;
	color: #ffffff !important;
}

.social-button-twitter{
	background-color: #2ba9e1;
	color: #ffffff !important;
}

.social-button-twitter:hover{
	background-color: #1c92c7;
	color: #ffffff !important;
}

.social-button-twitch{
	background-color: #7a56b1;
	color: #ffffff !important;
}

.social-button-twitch:hover{
	background-color: #644791;
	color: #ffffff !important;
}
</style>

<pre>
<?php echo strtoupper($nome);?><br>
<?php echo strtoupper($sigla);?><br>
Logo: <img src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $logo;?>" width="32" height="32">
<a href="#" class="btn circle-button social-button-facebook"><i class="fa fa-fw fa-facebook"></i></a>
<a href="#" class="btn circle-button social-button-twitter"><i class="fa fa-fw fa-twitter"></i></a>
<a href="#" class="btn circle-button social-button-twitch"><i class="fa fa-fw fa-twitch"></i></a>
Nota: <?php echo substr($valor,0,3);?>
<?php
if($status == 'A'){ ?>
	<p class="card-status-desc"><i class="fa fa-fw fa-check-square" style="color: green;"></i> Ativa</p>
<?php }elseif($status == 'I'){ ?>
	<p class="card-status-desc"><i class="fa fa-fw fa-window-close" style="color: grey;"></i> Inativa</p>
<?php } ?>
</pre>
<table class="table table-striped">
	<thead class="thead-light" style="text-light">
		<tr align="center">
			<th align="center">Ano</th>
			<th align="center">Posição</th>
			<th>Campeonato</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($equipe_titulos -> result() as $e_t){  ?>
		<tr>
			<td class="td_row" align="center"><?php echo $e_t->camp_ano;?></td>
			<?php 
			if($e_t->ec_posicao == 1){ 
					echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/first.png" width="25" height="25"> 1° Lugar</td>';
			}elseif($e_t->ec_posicao == 2){
					echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/second.png" width="25" height="25"> 2° Lugar</td>';
			}elseif($e_t->ec_posicao == 3){
					echo	'<td class="td_row" align="center"><img src="'.site_url().'assets/img/awards/third.png" width="25" height="25"> 3° Lugar</td>';
			}	?>
			<td class="td_row" ><?php echo $e_t->camp_nome;?></td>
		</tr>
		<?php	}
		?>
	</tbody>
</table>
<div class="col-3">
<div class="card text-white bg-dark">
  <div class="card-header text-white">Header</div>
  <div class="card-body">
	<div class="col-9" style="background-color:red; height:150px; width:150px;"></div>
  </div>
    <div class="card-footer bg-dark text-white">Footer</div>
</div>
</div>