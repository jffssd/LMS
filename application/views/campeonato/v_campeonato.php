
<style>
.breadcrumb-holder{
	background-color: #e4e4e4;
	height:46px;
}
.calendar-data{
	border: 3px solid black;
	text-align: center;
	height:50px;
	border-radius:7px;
	width:20%;
}

.side-calendar-item{
	opacity: 0.2;
}

.side-calendar-item-closer{
	opacity: 0.5;
}

.side-calendar-item-active{
	opacity: 1;
}

.calendar-description{
	text-align: center;
}

.calendar-p{
	
}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h2 class="main-title float-left">Equipes</h2>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item">Início</li>
					<li class="breadcrumb-item active">Equipes</li>
				</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
		<div class="row">
			<div class="calendar-data side-calendar-item">
				<div class="row">
					<p class="calendar-p">Semana 3</p>
				</div>
				<div class="row">
					<p class="calendar-p">PAIN vs CNB</p>
				</div>
			</div>
			<div class="calendar-data side-calendar-item-closer">2</div>
			<div class="calendar-data side-calendar-item-active">3</div>
			<div class="calendar-data side-calendar-item-closer">4</div>
			<div class="calendar-data side-calendar-item">5</div>
		</div>
	</div>
</div>
<table class="table table-striped">
	<thead>
		<th>Logo</th>
		<th>Nome</th>
		<th>Status</th>
	</thead>
	<tbody>
	<?php
	    foreach($campeonatos -> result() as $campeonato){
	?>
	<tr>
		<td><img src="<?php echo site_url().'assets/img/campeonatos/logos'.$campeonato->logo; ?>" alt="logo"></td>
		<td><a href="<?php echo site_url().'campeonatos/detalhes/'.$campeonato->id; ?>">Nome: <?= $campeonato->nome;?></a></td>
		<td>Ano: <?= $campeonato->ano;?></td>
		<td>Status: <?= $campeonato->status;?></td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>