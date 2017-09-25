<?php 
$rol=$sesion->getUsuario()->getRol();
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
<!-- <ul class="sidebar-panel nav">
  <li class="sidetitle">MENU</li>

  <li><a href="index.php"><span class="icon color5"><i class="fa fa-home"></i></span>Inicio</a> </li>
  <li><a href="tipo-moneda"><span class="icon color5"><i class="fa fa-user"></i></span>Tipo de cambio</a> </li>
  <li><a href="tipo_cambio.php"><span class="icon color5"><i class="fa fa-user"></i></span>Paginas</a> </li>
  <li><a href="trabajadores.php"><span class="icon color8"><i class="fa fa-user"></i></span>Trabajadores<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="clientes.php"><span class="icon color8"><i class="fa fa-user"></i></span>Clientes<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="cuerpos.php"><span class="icon color8"><i class="fa fa-user"></i></span>Cuerpo Inicio<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="marcas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Marcas<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="tipos.php"><span class="icon color8"><i class="fa fa-user"></i></span>Tipos de Prenda<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="productos.php"><span class="icon color8"><i class="fa fa-user"></i></span>Productos<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="ventas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Ventas<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
  <li><a href="asesorias.php"><span class="icon color8"><i class="fa fa-user"></i></span>Asesorías<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="magazine.php"><span class="icon color8"><i class="fa fa-user"></i></span>Magazine<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="ideas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Ideas para Regalar<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="temas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Preguntas Frecuentes<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="videos.php"><span class="icon color8"><i class="fa fa-user"></i></span>Videos<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="cateofertas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Categoría Ofertas<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="ofertas.php"><span class="icon color8"><i class="fa fa-user"></i></span>Ofertas<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="productos.php?action=relacionar"><span class="icon color8"><i class="fa fa-user"></i></span>Relacionar Productos<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="popups.php"><span class="icon color8"><i class="fa fa-user"></i></span>Popup<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="popuphomes.php"><span class="icon color8"><i class="fa fa-user"></i></span>Popup Home<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
 <li><a href="bd.php?action=listemailing"><span class="icon color8"><i class="fa fa-user"></i></span>Inscripción Emailing<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
<li><a href="bd.php?action=listnovedades"><span class="icon color8"><i class="fa fa-user"></i></span>Inscripción Novedades<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
<li><a href="bd.php?action=listofertas"><span class="icon color8"><i class="fa fa-user"></i></span>Inscripción Ofertas<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
<li><a href="new_arrivals.php"><span class="icon color8"><i class="fa fa-user"></i></span>New Arrivals<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>
<li><a href="slider-home.php"><span class="icon color8"><i class="fa fa-user"></i></span>Banner Home / Título<span class="label label-danger"><i class="fa fa-user"></i></span></a></li>



</ul> -->



</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
