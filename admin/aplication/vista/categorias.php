<?php include("../admin/aplication/includes/admin/include2.php"); ?> 	
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content" style="margin:0px;padding:0px" >


  <!-- Start Presentation -->
  <div class="row presentation" style="padding:0px; margin:0px">

    <div class="col-lg-8 col-md-6 titles">
      <h1>
      <?php
      if($_GET['action']=="edit_imagenes" || $_GET['action']=="list_imagenes")
	  {
		  echo "IMAGENES";
	  }else
	  {
		  echo "CATEGORÍAS";
	  }
	  ?>
      
      </h1>
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
												$obj   = new Categorias($idioma, $msgbox, $sesion->getUsuario());
												// Create new Proyectos
												if(!isset($_GET['actioncat'])){ 
													if($_GET['action']){
														$accion = $_GET['action']."Categorias";	
														$obj->$accion();
													}else{
														$obj->listCategorias();
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
