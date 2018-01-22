<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">
  <meta name="author" content="João Felipe">
  <?php
    echo '<link rel="icon" href="'.site_url().'/favicon.ico" type="image/x-icon">';
  ?>
  <title>LMS</title>
  <!-- Bootstrap core CSS-->
  <!-- Latest compiled and minified CSS -->
  <script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.js"></script>
  <!--<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.quick.search.js"></script>-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="<?php echo site_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo site_url();?>assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="<?php echo site_url();?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo site_url();?>assets/css/style.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer" id="page-top" style="padding-bottom:0px;">
  <!-- Navigation-->

  <?php echo $sidebar;?>


  <div class="content-wrapper" style="padding: 0px !important;">
    <div class="container-fluid" style="padding: 0px !important;">
      <!-- Breadcrumbs-->
        <?php echo $conteudo;?>
    </div>
  </div>
    <!-- Bootstrap core JavaScript-->
    <?php echo '<script src="'.site_url().'assets/js/jquery.js" ></script>';
          echo '<script src="'.site_url().'assets/jquery/jquery.min.js"></script>';
          echo '<script src="'.site_url().'assets/bootstrap/js/bootstrap.bundle.min.js"></script>';
    // Core plugin JavaScript-->
          echo '<script src="'.site_url().'assets/jquery-easing/jquery.easing.min.js"></script>';
    // Page level plugin JavaScript-->
          echo '<script src="'.site_url().'assets/chart.js/Chart.min.js"></script>';
          echo '<script src="'.site_url().'assets/datatables/jquery.dataTables.js"></script>';
          echo '<script src="'.site_url().'assets/datatables/dataTables.bootstrap4.js"></script>';
    // Custom scripts for all pages-->
          echo '<script src="'.site_url().'assets/js/sb-admin.min.js"></script>';
    // Custom scripts for this page-->
          echo '<script src="'.site_url().'assets/js/sb-admin-datatables.min.js"></script>';
          echo '<script src="'.site_url().'assets/js/sb-admin-charts.min.js"></script>';
    ?>
  </div>
</body>

</html>
