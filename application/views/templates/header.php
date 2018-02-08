<html>
  <head>
    <title>Carreira e-Sports!</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>

<a>Carreira e-Sports!</a>	
  <ul>
  	<li><a href="<?php echo base_url(); ?>">Início</a></li>
  	<li><a href="<?php echo base_url(); ?>sobre">Sobre</a></li>
    <li><a href="<?php echo base_url(); ?>contato">Contato</a></li>
    <li><a href="<?php echo base_url(); ?>administrator">Área Restrita</a></li>
  </ul>	
  <ul>
    <?php if(!$this->session->userdata('login')): ?>
    <li><a href="<?php echo site_url();?>users/register">Register</a></li>
    <li><a href="<?php echo site_url();?>users/login">Login</a></li>
    <?php endif; ?>
    <?php if($this->session->userdata('login')): ?>
    <li><a href="<?php echo base_url(); ?>users/dashboard"><?php echo $this->session->userdata('usuario'); ?></a></li>
    <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
         <?php endif; ?>
  </ul>  

  <div class="container">
  <hr>

  <!-- Flash Messages -->
    <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>