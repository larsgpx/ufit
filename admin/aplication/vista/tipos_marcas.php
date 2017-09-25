<?php include("../admin/aplication/includes/admin/include2.php"); ?> 			
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content" style="margin:0px;padding:0px" >


  <!-- Start Presentation -->
  <div class="row presentation" style="padding:0px; margin:0px">

    <div class="col-lg-8 col-md-6 titles">
      <h1>MARCAS</h1>
     </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row" style="margin:0px">


	
     <?php 
												//echo $msgbox->getMsgbox(); 
												$obj   = new Marcas($idioma, $msgbox, $sesion->getUsuario());
												// Create new Proyectos
												if(!isset($_GET['actioncat'])){
													if($_GET['action']){
														$accion = $_GET['action']."Marcas";	
														$obj->$accion();
													}else{
														$obj->list_tiposMarcas();
													}
											   }?>
                                               
                                               
    





  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 




</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php include("../admin/aplication/includes/admin/inc.footer2.php"); ?>
