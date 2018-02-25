<style>
.img-logo-times{
	height:200px;
	width:200px;
	max-height:400px;
	max-width:400px;
}

.team-tags{
	padding:10px;
	background-color:#e4e4e4;
	margin:5px;
}

.team-tags:hover{
	background-color:#d0d0d0;

	-webkit-box-shadow:inset 0px 0px 0px 1px #bbbbbb;
    -moz-box-shadow:inset 0px 0px 0px 1px #bbbbbb;
    box-shadow:inset 0px 0px 0px 1px #bbbbbb;
}

.breadcrumb-holder{
	background-color: #e4e4e4;
	height:46px;
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

<div class="col-md-12">
<div class="row">
    <?php
    foreach($equipes -> result() as $equipe){
    ?>
 	<div class="team-tags">
 		<a href="<?php echo base_url().'equipe/detalhes/'.$equipe->id;?>"><img class="img-logo-times" src="<?php echo site_url();?>assets/img/logo-equipes/<?php echo $equipe->logo;?>" class="logo-team"></a>
 	</div>
	<?php
	}
	?>
</div>
</div>