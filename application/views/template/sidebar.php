<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #262b33 !important;" id="mainNav" >
    <a class="navbar-brand" href="<?php echo site_url();?>equipe">E-Sports Manager</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo site_url();?>equipe">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Principal</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo site_url();?>equipe">
            <i class="fa fa-fw fa-inbox"></i>
            <span class="nav-link-text">Caixa de Entrada</span>
          </a>
        </li>

        <hr class="nav-menu-divider" style="height: 1px; margin: 0px; overflow: hidden; background-color: #737a81; width: 100%; opacity: 0.1;">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Equipes">
          <?php echo '<a class="nav-link" href="'.site_url().'equipe">'; ?>
            <i class="fa fa-fw fa-users "></i>
            <span class="nav-link-text">Equipes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Jogadores">
          <?php echo '<a class="nav-link" href="'.site_url().'jogador">'; ?>
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Jogadores</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transferências">
          <?php echo '<a class="nav-link" href="'.site_url().'transferencias">'; ?>
            <i class="fa fa-fw fa-exchange"></i>
            <span class="nav-link-text">Transferências</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Geral">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseGeral" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Geral</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseGeral">
            <li>
              <a href="<?php echo site_url();?>pais"><i class="fa fa-fw fa-flag"></i> Países</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-flag"></i> Cards</a>
            </li>
          </ul>
        </li>

        <hr class="nav-menu-divider" style="height: 1px; margin: 0px; overflow: hidden; background-color: #737a81; width: 100%; opacity: 0.1;">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>

      <!-- NAVBAR TOGGLER -->

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
      <!-- NAVBAR TOP -->
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Menesagens
              <span class="badge badge-pill badge-primary">12 Novas</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Novas Mensagens:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">MSG1</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">MSG2</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Ver todas Mensagens</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Novos Alertas:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Mudança de Status</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">MSG 1</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Mudança de Status</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">MSG 2</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Ver todos os alertas</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Pesquisar por...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>