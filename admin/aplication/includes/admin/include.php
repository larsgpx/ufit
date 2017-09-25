<?php 
$rol=$_SESSION['id_trabajador'];//$sesion->getUsuario()->getRol();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="" />
  <title>ADMIN</title>

  <!-- ========== Css Files ========== -->
  <link href="../webroot/assets/css/root.css" rel="stylesheet">
  <link href="../js/plupload-2.1.9/js/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet">


  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="../webroot/assets/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="index.php" class="logo"><img src="../webroot/logo_admin.png" width="150" style="margin-top:-4px; margin-left:5px"></a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->


    <!-- Start Top Menu -->
    <ul class="topmenu" style="margin-left:20px">
      <li><a href="trabajadores.php"><i class="fa fa-user"></i> Trabajadores</a></li>
      <li><a href="clientes.php"><i class="fa fa-user"></i> Clientes</a></li>
    </ul>
    <!-- End Top Menu -->


    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton" aria-expanded="false">CREAR <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="trabajadores.php"><i class="fa falist fa-file-image-o"></i>Trabajadores</a></li>
          <li><a href="clientes.php"><i class="fa falist fa-file-image-o"></i>Clientes</a></li>
        </ul>
    </li>


    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><i class="fa fa-user"></i> <b>Admin</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li><a href="?action=logout"><i class="fa falist fa-power-off"></i> Cerrar Sesión</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEBAR -->
<div class="sidebar clearfix">
    
   <?php echo $menu_admin;?>

</div>