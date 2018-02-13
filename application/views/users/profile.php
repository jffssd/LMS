<style>
.short-email-data{
    height:50px;
    padding-left:10px;
    padding-right:10px;
    border-bottom: 1px solid #e5e5e5;
    border-top: 1px solid #e5e5e5;
    overflow: hidden;
}
</style>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left"><?= $title ?></h1>
			<ol class="breadcrumb float-right">
	        	<li class="breadcrumb-item"><a href="<?php base_url('inicio');?>"><i class="fa fa-fw fa-home"></i> Início</a></li>
				<li class="breadcrumb-item active"><?= $title ?></li>
			</ol>
			<div class="clearfix">
            </div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-picture-o"></i> Imagem de Perfil</h3>
            </div>
            <div class="card-body" align="center">
                <img src="<?php echo base_url('assets/images/users/').$this->session->userdata('imagem_perfil');?>" alt="Imagem de Perfil" style="border-radius:50%; width: 150px; height: 150px;">
            </div>
        </div>				
    </div>	

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="float-left"><i class="fa fa-envelope-o"></i> Mensagens</h3>
                <a href="#" class="label radius-circle bg-primary float-right" style="font-size:14px; color: #fff;">Ver todas as mensagens</a>
            </div>
            <div class="card-body table-responsive-md">
                <table class="table-hover" style="width:100%;">
                    <tbody>
                    <?php
                    $count = 0;
                    foreach($mensagens -> result() as $msg){
                        $count++;
                        echo '<tr>';
                        if($count < 3){
                            echo '<td class="short-email-data"><span class="badge badge-primary"><i class="fa fa-envelope-o"></i> Nova!</span></td>';
                        }else{
                            echo '<td class="short-email-data"><span class="badge badge-secondary"><i class="fa fa-envelope-open-o"></i> Lida</span></td>';
                        }
                        echo '<td class="short-email-data"><a href="#">'.$msg->autor.'</a></td>';
                        echo '<td class="short-email-data">'.$msg->mensagem.'</td>';
                        echo '<td class="short-email-data">'.date("d/m/Y", strtotime($msg->data_envio)).'</td>';
                        echo '</tr>';
                        }?>
                        </tbody>
                </table>
            </div>
        </div>				
    </div>	
</div>

<style>
.profile-info-title{
    font-weight: bold;
    color: #6b6b6b;
}

.profile-info-data{
    color: #6b6b6b;
}

.profile-info-row{
    margin: 10px;
}

.profile-info-card-body{
    padding-left: 5px;
}

.card-modules-node{
    margin-left:15px;
    margin-bottom: 10px;
}

.bg-pink-ces{
    background-color: #ee4445;
}

.card-record-data{
    font-size: 14px;
}
</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">						
        <div class="card mb-3">
            <div class="card-header">
            <h3><i class="fa fa-info"></i> Informações</h3>
            </div>
            <div class="card-body profile-info-card-body">
                <div class="row profile-info-row">
                    <div class="profile-info-title col-4">Usuário: </div><div class="col-8">usuario_teste_29</div>
                </div>
                <div class="row profile-info-row">
                    <div class="profile-info-title col-4">Nome: </div><div class="col-8">João Felipe Ferreira</div>
                </div>
                <div class="row profile-info-row">
                    <div class="profile-info-title col-4">E-mail: </div><div class="col-8 text-truncate">usuario_teste_29@gmail.com</div>
                </div>
                <div class="row profile-info-row">
                    <div class="profile-info-title col-4">País: </div><div class="col-8">Brasil</div>
                </div>
                <div class="row profile-info-row">
                    <div class="profile-info-title col-4">Registro: </div><div class="col-8">29/12/2017</div>
                </div>
            </div>
        </div>				
    </div>	

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">						
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
            <h3 class="text-white"><i class="fa fa-star text-warning"></i> Realizações</h3>
            </div>
            <div class="card-body profile-info-card-body ">
                <div class="card-modules-node">
                    <p class="card-record-data" style="margin:5px;"><b>Carreira Jogador</b><span class="text-white pull-right">45/100</span></p>
                    <div class="progress" style="height:10px;">
                        <div class="progress-bar progress-xs bg-pink-ces" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45">
                        </div>
                    </div>
                </div>
                <div class="card-modules-node">
                    <p class="card-record-data" style="margin:5px;"><b>Carreira Técnico</b><span class="text-white pull-right">73/100</span></p>
                    <div class="progress" style="height:10px;">
                        <div class="progress-bar progress-xs bg-pink-ces" role="progressbar" style="width: 73%;" aria-valuenow="73" aria-valuemin="0" aria-valuemax="73">
                        </div>
                    </div>
                </div>
                <div class="card-modules-node">
                    <p class="card-record-data" style="margin:5px;"><b>Bolão</b><span class="text-white pull-right">82/100</span></p>
                    <div class="progress" style="height:10px;">
                        <div class="progress-bar progress-xs bg-pink-ces" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="82">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"><a href="#" class="text-white">Ver todas as realizações...</a>
            </div>
        </div>				
    </div>	

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">						
        <div class="card mb-3">
            <div class="card-header">
            <h3><i class="fa fa-star"></i> Realizações</h3>
            </div>
            <div class="card-body profile-info-card-body ">
            </div>
            <div class="card-footer"><a href="#">Ver todas as realizações...</a>
            </div>
        </div>				
    </div>	
</div>	