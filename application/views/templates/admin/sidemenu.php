<style>
.submenuitem:hover{
    background-color: #36484f;
}
</style>

<div class="left main-sidebar">
	<div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="sidebar-header" style="background-color: #222;">
                    <a><i class="fa fa-fw fa-bars"></i><span> Painel Principal </span> </a>
                </li>

                <li class="submenu">
                    <a <?php echo $item=='mensagens' ? 'class="active"' : ''; ?> href="<?php echo base_url('mensagens');?>"><i class="fa fa-fw fa-envelope-o"></i><span> Mens. dos Usuários </span> <span class="label radius-circle bg-success float-right">2</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-user"></i> <span> Usuários </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="<?php echo base_url('admin/usuarios');?>">Todos</a></li>
                        <li class="submenuitem"><a href="<?php echo base_url('admin/cadastrar_usuario');?>">Cadastrar</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="<?php echo base_url('bolao/inicio');?>"><i class="fa fa-fw fa-soccer-ball-o"></i><span> Bolão </span> </a>
                </li>

                <li class="submenu">
                    <a href="<?php echo base_url('carreira/inicio');?>"><i class="fa fa-fw fa-star"></i><span> Carreira </span> </a>
                </li>

                <li class="submenu">
                    <a <?php echo $item=='campeonatos' ? 'class="active"' : ''; ?> href="#"><i class="fa fa-fw fa-trophy"></i> <span> Campeonatos </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li class="submenuitem"><a href="<?php echo base_url('campeonatos');?>">Todos</a></li>
                            <li class="submenuitem"><a href="#">Cadastrar</a></li>
                        </ul>
                </li>
                                    
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-users"></i> <span> Equipes </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="<?php echo base_url('equipe');?>">Todos</a></li>
                            <li class="submenuitem"><a href="#">Cadastrar</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-user"></i> <span> Jogadores </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="<?php echo base_url('jogador');?>">Todos</a></li>
                        <li class="submenuitem"><a href="#">Cadastrar</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-handshake-o"></i> <span> Transferências </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="<?php echo base_url('transferencia');?>">Todos</a></li>
                        <li class="submenuitem"><a href="#">Cadastrar</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="<?php echo base_url('configuracoes');?>"><i class="fa fa-fw fa-cog "></i><span> Configurações </span> </a>
                </li>
               
        </ul>

        <div class="clearfix"></div>
        </div>
    
        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->
