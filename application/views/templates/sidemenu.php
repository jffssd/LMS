<style>
.submenuitem:hover{
    background-color: #36484f;
}
</style>

<div class="left main-sidebar">
	<div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a <?php echo $item=='inicio' ? 'class="active"' : ''; ?> href="<?php echo 'http://localhost/ces/inicio';?>"><i class="fa fa-fw fa-bars"></i><span> Painel Principal </span> </a>
                </li>

                <li class="submenu">
                    <a <?php echo $item=='perfil' ? 'class="active"' : ''; ?> href="<?php echo 'http://localhost/ces/perfil';?>"><i class="fa fa-fw fa-user-circle"></i><span> Perfil </span> </a>
                </li>

                <li class="submenu">
                    <a <?php echo $item=='mensagens' ? 'class="active"' : ''; ?> href="#"><i class="fa fa-fw fa-envelope-o"></i><span> Mensagens </span> <span class="label radius-circle bg-success float-right">2</span></a>
                </li>
                
                <li class="submenu">
                    <a href="#" class="bolao-link"><i class="fa fa-fw fa-soccer-ball-o"></i><span> Bolão </span> </a>
                </li>

                <li class="submenu">
                    <a href="#" class="carreira-link"><i class="fa fa-fw fa-star"></i><span> Carreira </span> </a>
                </li>

                <li class="submenu">
                    <a <?php echo $item=='campeonatos' ? 'class="active"' : ''; ?> href="#"><i class="fa fa-fw fa-trophy"></i> <span> Campeonatos </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li class="submenuitem"><a href="<?php echo base_url('campeonatos');?>">Todos</a></li>
                            <li class="submenuitem"><a href="#">Favoritos</a></li>
                            <li class="submenuitem"><a href="#">Por Região</a></li>
                            <li class="submenuitem"><a href="#">Internacional</a></li>
                        </ul>
                </li>
                                    
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-users"></i> <span> Equipes </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="#">Favoritas</a></li>
                        <li class="submenuitem"><a href="#">Por Região</a></li>
                        <li class="submenuitem"><a href="#">Internacional</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-user"></i> <span> Jogadores </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="#">Favoritos</a></li>
                        <li class="submenuitem"><a href="#">Por Região</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-handshake-o"></i> <span> Transferências </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="submenuitem"><a href="#">Todas</a></li>
                        <li class="submenuitem"><a href="#">Por Região</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-cog "></i><span> Configurações </span> </a>
                </li>
                
        </ul>

        <div class="clearfix"></div>
        </div>
    
        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->
