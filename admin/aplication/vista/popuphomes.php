<?php include("../admin/aplication/includes/admin/include.php"); ?> 

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">
    <?php if($_GET['action']=="listemailing") { echo "BD EMAILING"; } ?>
    <?php if($_GET['action']=="listnovedades") { echo "BD NOVEDADES"; } ?>
    <?php if($_GET['action']=="listofertas") { echo "BD OFERTAS"; } ?>
    <?php if($_GET['action']=="") { echo "POPUP HOME"; } ?>
   
    </h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Inicio</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Inicio</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">


	
     <?php 
												//echo $msgbox->getMsgbox(); 
												$obj   = new Popuphomes($idioma, $msgbox, $sesion->getUsuario());
												// Create new Proyectos
												if(!isset($_GET['actioncat'])){
													if($_GET['action']){
														$accion = $_GET['action']."Popuphomes";	
														$obj->$accion();
													}else{
														$obj->listPopuphomes();
													}
											   }?>
                                               
                                               
    





  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  	Copyright © 2015 
  </div>
  <div class="col-md-6 text-right">
    <img src="../webroot/logo.png" width="100">
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<?php include("../admin/aplication/includes/admin/inc.footer2.php"); ?>
