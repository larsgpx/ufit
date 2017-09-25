<?php include("../admin/aplication/includes/admin/include.php"); ?> 

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Costos de envío</h1>
  </div>
  <!-- End Page Header -->



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">


	
     <?php              //$idioma='';
												//echo $msgbox->getMsgbox(); 
												$obj   = new Costos($idioma, $msgbox, $sesion->getUsuario());
												// Create new Proyectos
												if(!isset($_GET['actioncat'])){
													if($_GET['action']){ 
														$accion = $_GET['action']."Costos";	
														$obj->$accion();
													}else{
														$obj->listCostos();
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
