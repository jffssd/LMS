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
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-picture-o"></i> Imagem de Perfil</h3>
            </div>
            <div class="card-body" align="center">
                <img src="<?php echo base_url('assets/images/users/').$this->session->userdata('imagem_perfil');?>" alt="Imagem de Perfil" style="border-radius:50%; width: 150px; height: 150px;">
            </div>
        </div>				
    </div>	

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">						
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
                            echo '<td class="short-email-data"><span class="badge badge-primary">Nova!</span></td>';
                        }else{
                            echo '<td class="short-email-data"><span class="badge badge-secondary">Lida</span></td>';
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
    
</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">						
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
</div>	

<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
  Tooltip on right
</button>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>