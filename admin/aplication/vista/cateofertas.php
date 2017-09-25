<?php include("../admin/aplication/includes/admin/include.php"); ?> 
				
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">CATEGORÍA DE OFERTAS</h1>
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

  <!-- Start Presentation -->
  <div class="row presentation" style="padding:40px">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color10-bg"><i class="fa fa-table"></i></span>
      <h1>Categoría de Ofertas</h1>
     </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">


	
     <?php 
												//echo $msgbox->getMsgbox(); 
												$obj   = new Cateofertas($idioma, $msgbox, $sesion->getUsuario());
												// Create new Proyectos
												if(!isset($_GET['actioncat'])){
													if($_GET['action']){
														$accion = $_GET['action']."Cateofertas";	
														$obj->$accion();
													}else{
														$obj->listCateofertas();
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
    <img src="aplication/webroot/logo.png" width="100">
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<?php include("../admin/aplication/includes/admin/inc.footer2.php"); ?>
