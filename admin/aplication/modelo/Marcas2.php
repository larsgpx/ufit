<?php
class Marcas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newMarcas()
	{
		$db_Full = new db_model();
$db_Full->conectar();
	?>

<script>


function validando_clientes(opcion, id){
	var marca = document.clientes.elements['marca'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];
	var imagen3 = document.clientes.elements['imagen3'];

	if(marca.value == ""){
		alert("Ingrese Marca");
		marca.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen de la cabecera de la página");
		imagen1.focus();
		return false;
	}


	if(imagen2.value == ""){
		alert("Ingrese imagen de la página marcas");
		imagen2.focus();
		return false;
	}


	if(imagen3.value == ""){
		alert("Ingrese banner de la página marcas");
		imagen3.focus();
		return false;
	}




	document.clientes.action="marcas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="marcas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA MARCA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Marca</label>
                <div class="col-sm-10">
                  <input type="text" name="marca"  class="form-control" />
                </div>
              </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la cabecera de la página</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 160x37 px en formato .png
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la página marcas</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 380x380 px
                  </div>

                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Banner de la página marcas</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1024x462 px
                  </div>

                </div>
              </div>


				<input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


        	</form>
      </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
		<?php
	}

	public function addMarcas(){

		$db_Full = new db_model();
$db_Full->conectar();
		$query = $db_Full->select_sql("SELECT nombre_marca from tbl_marcas where nombre_marca='".$_POST['marca']."' ");
        $row   = mysqli_fetch_assoc($query);
		$marca=$row['nombre_marca'];
		
		 if($marca=="")
		{


		if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
		{
			    $destino1 = "../webroot/archivos/";
				$name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
				$temp1 = $_FILES['imagen1']['tmp_name'];
				$ext1 = end(explode(".", $name1));
				$type1 = $_FILES['imagen1']['type'];
				$size1 = $_FILES['imagen1']['size'];

				move_uploaded_file($temp1,$destino1.$name1);
				$name_pfd1= explode(".",$name1);
		}

		if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
		{
			    $destino2 = "../webroot/archivos/";
				$name2 = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
				$temp2 = $_FILES['imagen2']['tmp_name'];
				$ext2 = end(explode(".", $name2));
				$type2 = $_FILES['imagen2']['type'];
				$size2 = $_FILES['imagen2']['size'];

				move_uploaded_file($temp2,$destino2.$name2);
				$name_pfd2= explode(".",$name2);
		}

		if(isset($_FILES['imagen3']) && ($_FILES['imagen3']['name'] != ""))
		{
			    $destino3 = "../webroot/archivos/";
				$name3 = strtolower(date("ymdhis").$_FILES['imagen3']['name']);
				$temp3 = $_FILES['imagen3']['tmp_name'];
				$ext3 = end(explode(".", $name3));
				$type3 = $_FILES['imagen2']['type'];
				$size3 = $_FILES['imagen2']['size'];

				move_uploaded_file($temp3,$destino3.$name3);
				$name_pfd3= explode(".",$name3);
		}

		$query = $db_Full->select_sql("INSERT INTO  tbl_marcas VALUES ('','".$_POST['marca']."' , '".$name_pfd1[0].'.'.$ext1."' , '".$name_pfd2[0].'.'.$ext2."' , '".$name_pfd3[0].'.'.$ext3."' , '0' )");
 			location("marcas");
		}
		 else
		 {
		 echo '<script>alert("Estos datos ya existen");</script>';
	     }

	}


	public function editMarcas(){

		$db_Full = new db_model();
		$db_Full->conectar();
       $obj =  new Marca($_GET['id']);
		?>

<script>


function validando_clientes(opcion, id){
	var marca = document.clientes.elements['marca'];

	if(marca.value == ""){
		alert("Ingrese Marca");
		marca.focus();
		return false;
	}



	document.clientes.action="marcas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="marcas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR MARCA
	          <ul class="panel-tools">
	            	<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
	            	<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
	          </ul>
        </div>

        <div class="panel-body">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
	           	    <div class="bloque_seo clearfix" style="margin: 20px 0;">
	              		<a class="btn btn-default col-sm-2 col-md-2 col-lg-2" role="button" data-toggle="collapse" href="#collapseSEO" aria-expanded="false" aria-controls="collapseExample">SEO</a>
	              		<div class="col-sm-7 col-md-7 col-lg-7 collapse" id="collapseSEO">
				              	  <div class="form-group">
						                <label class="col-sm-2 control-label">Titulo</label>
						                <div class="col-sm-10">
						                  <input type="text" name="titulo_seo"  class="titulo_seo form-control" maxlength="25" placeholder="Titulo SEO (Máximo 25 caracteres)" value="<?php echo $obj->__get('title_seo'); ?>" />
						                </div>
					              </div> 
					              <div class="form-group">
						                <label class="col-sm-2 control-label">Palabras clave</label>
						                <div class="col-sm-10">
						                  <input type="text" name="keywords_seo"  class="form-control" placeholder="Palabras claves separadas por coma para SEO" value="<?php echo $obj->__get('keywords_seo'); ?>" />
						                </div>
					              </div>
					              <div class="form-group">
						                <label class="col-sm-2 control-label">Descripcion</label>
						                <div class="col-sm-10">
						                  <textarea class="form-control" name="descripcion_seo" placeholder="Descripción del producto SEO"><?php echo $obj->__get('description_seo'); ?></textarea>
						                </div>
					              </div>
			     		</div>
	                </div>
	                <div class="form-group">
		                <label class="col-sm-2 control-label">Marca</label>
		                <div class="col-sm-10">
		                  <input type="text" name="marca" class="form-control titulo_subseo generar_url" value="<?php echo $obj->__get('_nombre'); ?>"  onclick="generar_url(this);" onkeyup="generar_url(this);" />
		                </div>
	                </div>
	                <div class="form-group">
		                <label class="col-sm-2 control-label">Url</label>
		                <div class="col-sm-10">
		                <input type="hidden" name="m_url" class="form-control ini_url" disabled="disabled" value="marcas/" />
		                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $obj->__get('url_page_tbl'); ?>" />
		                  <input type="hidden" name="url"  class="form-control mostrar_url" value="<?php echo $obj->__get('url_page_tbl'); ?>" />
		                </div>
              	    </div>
                	<div class="form-group">
		                <label class="col-sm-2 control-label">Imagen de la cabecera de la página</label>
		                <div class="col-sm-10">

		                  <input type="file" name="imagen1" class="form-control" />
		                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
		                    <i class="fa fa-lock"></i>
		                    Tamaño recomendable 160x37 px en formato .png
		                  </div>

		                  <?php
						  if($obj->__get('_foto1')!=".")
						   {
						   ?>
		                   <br>
		                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto1') ?>"  >
		                  <?php
						   }else
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
		                   }
						  ?>

		                </div>
                	</div>
	                <div class="form-group">
		                <label class="col-sm-2 control-label">Imagen de la página marcas</label>
		                <div class="col-sm-10">
			                  <input type="file" name="imagen2" class="form-control" />
			                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
			                    <i class="fa fa-lock"></i>
			                    Tamaño recomendable 320x320 px
			                  </div>
			                    <?php
							  if($obj->__get('_foto2')!=".")
							   {
							   ?>
			                   <br>
			                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto2') ?>"  >
			                  <?php
							   }else
							   {
							  ?>
							  <img src="../webroot/assets/img/no_image.png" width="100" >
							  <?php
			                   }
							  ?>
		                </div>
	                </div>

               		<div class="form-group">
		                <label class="col-sm-2 control-label">Banner de la página marcas</label>
		                <div class="col-sm-10">

		                  <input type="file" name="imagen3" class="form-control" />
		                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
		                    <i class="fa fa-lock"></i>
		                    Tamaño recomendable 1024x475 px
		                  </div>

		                  <?php
						  if($obj->__get('_banner')!=".")
						   {
						   ?>
		                   <br>
		                  <img src="../webroot/archivos/<?php echo $obj->__get('_banner') ?>" width="100%">
		                  <?php
						   }else
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
		                   }
						  ?>

		                </div>
              		</div>

					<input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">
        	</form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Row -->


		<?php

	}

	public function updateMarcas()
	{  $db_Full = new db_model(); $db_Full->conectar();
		try {   
		         $db_Full ->start(); 
				if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
				{
					$destino1 = "../webroot/archivos/";
					$name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
					$temp1 = $_FILES['imagen1']['tmp_name'];
					$type1 = $_FILES['imagen1']['type'];
					$size1 = $_FILES['imagen1']['size'];
					$ext1 = end(explode(".", $name1));
					move_uploaded_file($temp1,$destino1.$name1);
					$name_pfd1 = explode(".",$name1);
					$update1 = " foto1_marca = '".$name_pfd1[0].'.'.$ext1."' ";
					$query = $db_Full->select_sql("UPDATE  tbl_marcas SET ".$update1." WHERE id_marca = '".$_GET['id']."' ");
				}

				if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
				{
					$destino2 = "../webroot/archivos/";
					$name2 = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
					$temp2 = $_FILES['imagen2']['tmp_name'];
					$type2 = $_FILES['imagen2']['type'];
					$size2 = $_FILES['imagen2']['size'];
					$ext2 = end(explode(".", $name2));
					move_uploaded_file($temp2,$destino2.$name2);
					$name_pfd2 = explode(".",$name2);
					$update2 = " foto2_marca = '".$name_pfd2[0].'.'.$ext2."' ";
					$query = $db_Full->select_sql("UPDATE  tbl_marcas SET ".$update2." WHERE id_marca = '".$_GET['id']."' ");
				}

				if(isset($_FILES['imagen3']) && ($_FILES['imagen3']['name'] != ""))
				{
					$destino3 = "../webroot/archivos/";
					$name3 = strtolower(date("ymdhis").$_FILES['imagen3']['name']);
					$temp3 = $_FILES['imagen3']['tmp_name'];
					$type3 = $_FILES['imagen3']['type'];
					$size3 = $_FILES['imagen3']['size'];
					$ext3 = end(explode(".", $name3));
					move_uploaded_file($temp3,$destino3.$name3);
					$name_pfd3 = explode(".",$name3);
					$update3 = " banner_marca = '".$name_pfd3[0].'.'.$ext3."' ";
					$query = $db_Full->select_sql("UPDATE  tbl_marcas SET ".$update3." WHERE id_marca = '".$_GET['id']."' ");
				}

				$query = $db_Full->select_sql("UPDATE  tbl_marcas set nombre_marca ='".$_POST['marca']."' WHERE id_marca = '".$_GET['id']."' ");

				$tabla = "tbl_marcas";		
				$query_tabla = $db_Full->select_sql("select id_marca,foto1_marca,url_page_tbl,_id_seo from $tabla where id_marca = ".$_GET['id']."");  
				
		
				$row_m = mysqli_fetch_assoc($query_tabla);  
		
				if(mysqli_num_rows($query_tabla)){ 

					if((empty($row_m['url_page_tbl']) && $row_m['_id_seo'] == 0) 
						|| !empty($row_m['url_page_tbl']) && $row_m['_id_seo'] == 0){  
						 	$seo  =  array(
								    		"title_seo"         => $_POST['titulo_seo'],
								    		"keywords_seo"      => $_POST['keywords_seo'],
								    		"description_seo"   => $_POST['descripcion_seo']
						    			  );

							$id_seo = $db_Full->insert_table("tbl_seo",$seo); 

							if($id_seo == false) {
							    throw new Exception($mensajes['seo']);
							}

							$page_tbl = array(
						        				"titulo_page_tbl"    	=> $_POST['marca'],
						        				"url_page_tbl"       	=> $_POST['url'],
						        				"plantilla_page_tbl" 	=> "marca",
						        				"estado_page_tbl"    	=> "a",
						        				"orden_page_tbl"     	=> 0,
						        				"tabla_page_tbl"     	=> "tbl_marcas",
						        				"id_tabla_page_tbl"  	=> $_GET['id'],
						        				"tipo_url_page" 		=> 'i',
						        				"fk_id_seo" 		    => $id_seo,
						        				"fk_id_menu"            => 1
						        			  );

						    $idPage = $db_Full->insert_table("tbl_page",$page_tbl);
						    
						    if($idPage == false) {
				                throw new Exception($mensajes['seo']);
				    	    }

						    $id_marca = $db_Full->select_sql("UPDATE  tbl_marcas SET nombre_marca ='".$_POST['marca']."', url_page_tbl='".$_POST['url']."',_id_seo ='".$id_seo."' WHERE id_marca = '".$_GET['id']."' ");

						    $id_marca = $db_Full->select_sql("UPDATE tbl_page SET fk_id_menu = 1, url_page_tbl='".$_POST['url']."',imagen_page ='".$row_m['foto1_marca']."',titulo_page_tbl = '".$_POST['marca']."' WHERE id_tabla_page_tbl = '".$_GET['id']."' and fk_id_menu = 1 and tabla_page_tbl = 'tbl_marcas'");
							
							$id_marca = $db_Full->select_sql("UPDATE tbl_page SET fk_id_menu = 5, url_page_tbl='".$_POST['url']."',imagen_page ='".$row_m['foto1_marca']."',titulo_page_tbl = '".$_POST['marca']."' WHERE id_tabla_page_tbl = '".$_GET['id']."' and fk_id_menu = 5 and tabla_page_tbl = 'tbl_marcas'");

							if($id_marca == false) {
				                throw new Exception($mensajes['seo']);
				    	    }
					}	

			    	else{   
					        /**************************************************************************************/
					         $query_id = $db_Full->select_sql("UPDATE  tbl_marcas SET nombre_marca='".$_POST['marca']."', url_page_tbl='".$_POST['url']."'  WHERE id_marca = '".$_GET['id']."' ");

					          if($query_id == false) {
					              throw new Exception($mensajes['seo']);
					    	 }  
					        /**************************************************************************************/
				        	 $seo = array(
				    				       "title_seo"         => $_POST['titulo_seo'],
				    					   "keywords_seo"      => $_POST['keywords_seo'],
				    					   "description_seo"   => $_POST['descripcion_seo']
				    				    );

				        	 $where = array(
				        					"id_seo"  => $row_m['_id_seo'] 
				        			      );

							 $id_seo = $db_Full->update_table("tbl_seo",$seo,$where); 

							 if($id_seo == false) {
					            throw new Exception($mensajes['seo']);
					    	 }
			         		/**************************************************************************/	
				        	 $page_tbl = array(
				        				  	   "titulo_page_tbl"    	=> $_POST['marca'],
						        				"url_page_tbl"       	=> $_POST['url'],
						        				"plantilla_page_tbl" 	=> "marca",
						        				"estado_page_tbl"    	=> "a",
						        				"orden_page_tbl"     	=> 0,
						        				"tabla_page_tbl"     	=> "tbl_marcas",
						        				"id_tabla_page_tbl"  	=> $_GET['id'],
						        				"tipo_url_page" 		=> 'i',
						        				"fk_id_seo" 		    => $id_seo,
						        				"fk_id_menu"            => 1
				        			        );

				        	 $where   = array(
				        					   "tabla_page_tbl"        => "'tbl_marcas'",
				        					   "id_tabla_page_tbl"     => $_GET['id']
				        			         );

				        	 $idPage = $db_Full->update_table("tbl_page",$page_tbl,$where); //exit;

				        	 $id_marca = $db_Full->select_sql("UPDATE tbl_page SET fk_id_menu = 1, url_page_tbl='".$_POST['url']."',imagen_page ='".$row_m['foto1_marca'].'.'.$ext1."',	titulo_page_tbl = '".$_POST['marca']."' WHERE id_tabla_page_tbl = '".$_GET['id']."' and fk_id_menu = 1 and tabla_page_tbl = 'tbl_marcas'");
							
							$id_marca = $db_Full->select_sql("UPDATE tbl_page SET fk_id_menu = 5, url_page_tbl='".$_POST['url']."',imagen_page ='".$row_m['foto1_marca'].'.'.$ext1."',	titulo_page_tbl = '".$_POST['marca']."' WHERE id_tabla_page_tbl = '".$_GET['id']."' and fk_id_menu = 5 and tabla_page_tbl = 'tbl_marcas'");

							
				        	 echo $idPage;// exit;
				        	 if($idPage == false) {
					            throw new Exception($mensajes['global']);
					    	 }  
					    	 $db_Full->commit();
					    }	 
		   		}
		   		$db_Full->commit();
		  		location("marcas");
		  //exit;	
		}
		
		catch (Exception $e) { 
		        //$data['msj'] = $e->getMessage(); 
		        $db_Full->rollback();
		        //location("marcas");
		        //echo json_encode($data);
		 }	    
	}

	public function deleteMarcas()
	{	$db_Full = new db_model();
$db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_marcas WHERE id_marca = '".$_GET['id']."'");
		location("marcas");
	}

	public function listMarcas(){
		$db_Full = new db_model();
$db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_marcas order by orden_marca asc");

		?>

   <script>
   
	function mantenimiento(url,id,opcion){
	if(opcion!="delete"){
		location.replace(url+'?action='+opcion+'&id='+id);
	}else if(opcion=="delete"){
		if(!confirm("Esta Seguro que desea Eliminar el Registro")){
			return false;
		}else{
			location.replace(url+'?action='+opcion+'&id='+id);
		}
	}

} </script>

<?php /*?>    <a href="marcas?action=new" class="btn btn-default btn-block">AGREGAR MARCAS</a>
<br><?php */?>

<style>
#listadoul .handle {
	cursor:move;
	}
</style>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Marcas
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            	<thead>
	               <tr>
	                <th></th>
	                <th>Marca</th>
	                <th>Imagen</th>
	                <th>Agregar Imágenes</th>
	                <th>Editar</th>
	                <th>Eliminar</th>
	                </tr>
              	</thead>

                <tbody id="listadoul">
	              <?php
					$w = 1;
					while($row = mysqli_fetch_assoc($query))
					{

					?>

		            <tr id="list_item_<?php echo $row['id_marca']."|marca"; ?>" >
		            		<td class="handle"><i class="fa fa-bars"></i></td>
		                    <td ><?php echo $row['nombre_marca']; ?></td>
		                    <td valign="top" >
		                    	  <?php
								  if($row['foto1_marca']!=".")
								   {
								   ?>
								  <img src="../webroot/archivos/<?php echo $row['foto1_marca'] ?>"  >
								  <?php
								   }else
								   {
								  ?>
								  <img src="../webroot/assets/img/no_image.png" width="100" >
								  <?php
								   }
								  ?>
		                    </td>
		                    
		                    <td>
		                    	<a class="btn btn-default btn-block" data-toggle="modal" data-target="#Moda<?php echo $row['id_marca']; ?>" onclick="modal_tipos_iframe(this);" data-modal="tipos_marcas?id_marca=<?php echo $row['id_marca'] ?>&action=list_tipos">AGREGAR IMAGENES</a>
		                         <div class="modal fade" id="Moda<?php echo $row['id_marca']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		                              <div class="modal-dialog modal-lg">
		                                <div class="modal-content">
		                                  <div class="modal-header">
		                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                    <h4 class="modal-title">RELACIONAR TIPOS DE PRENDAS A LA MARCA : <?php echo $row['nombre_marca']; ?></h4>
		                                  </div>
		                                  <div class="modal-body">
		                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
		                                  </div>
		                                  <div class="modal-footer">
		                                  	<div class="mensaje">
		                                  		<span class="alert alert-success"></span>
		                                  		<span class="alert alert-danger"></span>
		                                  	</div>
		                                  	<button type="button" id="update_imagenes" onclick="updateImagenesColumnas(this,'gallery_tipo_marcas_cambio');" class="btn btn-green">Actualizar</button>
		                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
		                                  </div>
		                                </div>
		                              </div>
		                            </div>
		                    </td>
		                    
		                    
		                    
		                    <td>
		                    	<a class="btn btn-default btn-block"  href="marcas?id=<?php echo $row['id_marca'] ?>&amp;action=edit">EDITAR</a>
		                    </td>
		                    <td>
		                    	<a class="btn btn-default btn-block" onclick=mantenimiento("marcas",<?php echo $row['id_marca'] ?>,"delete")>ELIMINAR</a>
		                    </td>

					</tr>
		                <?php
					$w++;
					}
					?>

               	</tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

            <script>
			$(document).ready(function(){

				$("#listadoul").sortable({
				  handle : '.handle',
				  update : function () {
						var order = $('#listadoul').sortable('serialize');

						  $.get("ajax.php?"+order,{action:'ordenarMarca'},function(data){

						});
					  }
					});

				});
			</script>

        <?php

	}


	public function list_tiposMarcas(){
		 $db_Full = new db_model();$db_Full->conectar(); //echo $_GET['id_marca'];
		
		 $query_w = $db_Full->select_sql("SELECT t.fkmarcas_tipos_marcas,t.id_tipos_marcas,t.url_page_tbl as url_tipos,t.fktipos_tipos_marcas,tt.url_page_tbl as url_tipo,tt.nombre_tipo,foto_tipos_marcas,numero_columna_marcas,t.orden_tipo_marcas FROM tbl_tipos_marcas t,tbl_tipos tt where t.fktipos_tipos_marcas=id_tipo and t.fkmarcas_tipos_marcas=".$_GET['id_marca']." order by t.id_tipos_marcas asc");

		 /*$sqls1 = " SELECT t.url_page_tbl as tipo_url,t.nombre_tipo,m.url_page_tbl,m.url_tipo_marca as url_marcas FROM tbl_tipos t inner join tbl_marcas m on m.id_marca=".$_GET['id_marca'];
		 $querys1 = $db_Full->select_sql($sqls1);

         $option = array(); $i = 0;
		 while($row_url = mysqli_fetch_assoc($querys1)){
		 	
		 	 $option[$i]['tipo_url']       = $row_url['tipo_url'];
			 $option[$i]['url_page_tbl']   = $row_url['url_page_tbl'];
			 $option[$i]['url_marcas']     = $row_url['url_marcas'];
			 $option[$i]['nombre_tipo']    = $row_url['nombre_tipo'];
			 $option[$i]['url_tipo_marca'] = $row_url['url_tipo_marca'];
			 $i++;
		 }*/
		?>
		<link href="../js/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../js/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
         <script>
         var foto_maqueta;
         $(document).ready(function(){
         	$("#maqueta_gallery .tools .fila .icono").click(function(){
         		$(this).parents("#maqueta_gallery").find(".maqueta").append('<div class="fila_bloque"><input onclick="click_radio_fil_col(this);" type="radio" class="radio_id" name="radio_fil_col[]"></div>');
         	});
         	
         });
         function click_radio_fil_col(THIS){
         	foto_maqueta = $(THIS).parent(); //console.log($(THIS).context.parent() );
         }
		function move_img2(THIS){ 
			$V = $("#maqueta_gallery .maqueta .fila_bloque").find(foto_maqueta);
			$("#maqueta_gallery .maqueta li").draggable({
			    containment: $V,
			    parent: "#maqueta_gallery .maqueta",
			 	cursor: "crosshair",
			 	refreshPositions: true
			});
		}
		function move_img(THIS){ //console.log('hi');
			$("#maqueta_gallery .imagenes ul li").draggable({
			    containment: "#maqueta_gallery .maqueta .fila_bloque",
			    parent: "#maqueta_gallery .maqueta",
			 	cursor: "crosshair",
			 	refreshPositions: true,
			 	stop : function(event,ui){
			 		cl   = $(THIS).attr("class");
			 		cla  = cl.split(' ');
					l    = parseInt($(THIS).css("left"))+230; 
			 		w    = parseInt($(THIS).css("width"));  //console.log($("#maqueta_gallery .maqueta").find("."+cla[0]).length);
			 		//h    = parseInt($(THIS).css("height")); 
			 		if($("#maqueta_gallery .maqueta").find("."+cla[0]).length == 0){
			 			var clone_details = $("#maqueta_gallery .maqueta ").find(foto_maqueta).append('<div>'+$(THIS).html()+'</div>');
				 		clone_details.find("div").css({"width":"100%","left":l});
				 		clone_details.find("div").attr("onclick","move_img2(this)");
				 		clone_details.find("div").addClass("clearfix");
				 		$(THIS).remove();
			 		}
			 		
			 	}
			});
		}
		function mantenimiento(url,id,opcion)
		{	
			if(opcion!="delete_tipos_marcas"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_tipos_marcas"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }

		function validando_clientes(opcion, id)
		{
			var tipo = document.clientes.elements['tipo'];
			var imagen1 = document.clientes.elements['imagen1'];

			if(tipo.value == ""){
				alert("Ingrese Tipo");
				tipo.focus();
				return false;
			}


			if(imagen1.value == ""){
				alert("Ingrese imagen de la marca según el tipo de prenda");
				imagen1.focus();
				return false;
			}

			document.clientes.action="marcas?action="+opcion+"&id="+id;
			document.clientes.submit();
		}


       </script>



    <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Tipos de prenda</label>
                <div class="col-sm-10">
                  <select class="form-control" id="tipo"  name="tipo">
					<option value=''> Seleccione Tipo</option>
						<?php 
						$query_tipo = $db_Full->select_sql("SELECT * from tbl_tipos");
						while($row_tipo = mysqli_fetch_assoc($query_tipo))
						{
						?>
                        <option value='<?php echo $row_tipo['id_tipo'] ?>'><?php echo $row_tipo['nombre_tipo'] ?></option>
                        <?php } ?>
					</select>

                  <input type="hidden" value="<?php echo $_GET['id_marca']?>" name="id_marca"  class="form-control" />
                </div>
              </div>

              <br>
            <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Imagen de la marca según el tipo de prenda</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 380x345 px
                  </div>

                </div>
              </div>


				<input type="submit" onclick="return validando_clientes('add_tipos_marcas','<?php echo $_GET['id_marca'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


        	</form>

      		</div>

      </div>


  </div>
  <!-- End  -->



    <br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista
        </div>
        <div class="panel-body table-responsive">
        	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#list_reporte_marcas">Lista</a></li>
			  <li><a data-toggle="tab" href="#maqueta_gallery">Maqueta</a></li>
			</ul>

			<div class="tab-content">
	            <table  class="table display tab-pane fade in active" id="list_reporte_marcas">
	            	<thead>
		                <tr>
			                <th>Tipo</th>
			                <th>Imagen</th>
			                <th>N columnas</th>
			                <th>Orden</th>
			                <th>Editar</th>
			                <th>Eliminar</th>
		                </tr>
	              	</thead>
	              	<tbody>
		              <?php
						$w = 1;
						while($rowwf = mysqli_fetch_assoc($query_w))
						{

						?>

			            <tr class="gradeX"> 

			                    <td ><?php if($rowwf['fktipos_tipos_marcas'] == '7'){
			                    		 echo "-";
			                    }else{
			                    	echo $rowwf['nombre_tipo'];
			                    }
			                    ?></td>

			                    <td valign="top" >
			                    	  <?php
									  if($rowwf['foto_tipos_marcas']!=".")
									   {
									   ?>
									  <img src="../webroot/archivos/<?php echo $rowwf['foto_tipos_marcas'] ?>" width="200" value="12">
									  <?php
									   }else
									   {
									  ?>
									  <img src="../webroot/assets/img/no_image.png" width="100" >
									  <?php
									   }
									  ?>
			                    </td>
			                    <td> 
			                    	<input type="hidden" class="tipo"  name="tipo_marca[]" value="<?php echo $rowwf['id_tipos_marcas'];?>">

			                        <?php $v = ($rowwf['numero_columna_marcas'] != 0) ? $rowwf['numero_columna_marcas'] : 1?>
			                    	<input type="number" class="numero_columnas" name="numero_columnas[]" min="1" max="12" value="<?php echo $v;?>">
			                    </td>
			                    <td>
			                    	<?php $v2 = ($rowwf['orden_tipo_marcas'] != 0) ? $rowwf['orden_tipo_marcas'] : 0?>
			                    	<input type="number" class="orden_imagen"  name="orden_imagen[]" value="<?php echo $v2;?>">
			                    	<input type="hidden" class="url_n_1" name="url_marca_m" value="<?php echo $_GET['id_marca'];?>">
			                    	<input type="hidden" class="url_n_2" name="url_tipo_m[]" value="<?php echo $rowwf['url_tipo']?>">
			                    </td>
			                    <td>
			                    	<a class="btn btn-default btn-block"  href="tipos_marcas?id_marca=<?php echo $_GET['id_marca'];?>&id=<?php echo $rowwf['id_tipos_marcas'];?>&action=edit_tipos_marcas">EDITAR</a>
			                    </td>
			                    
			                     <td>
			                    	<a class="btn btn-default btn-block" onclick=mantenimiento("tipos_marcas?id_marca=<?php echo $_GET['id_marca'];?>",<?php echo $rowwf['id_tipos_marcas'] ?>,"delete_tipos_marcas")>ELIMINAR</a>
			                    </td>

						</tr>
			                <?php
						$w++;
						}
						?>

	               	</tbody>
	            </table>

	            <div id="maqueta_gallery" class="tab-pane fade">
				   <div class="col-md-8">
				   		<div class="tools clearfix">
				   			<div class="col-md-5">
				   				<div class="fila">
				   					<div class="title_fila">Crear fila</div>
					   				<div class="body_fila clearfix">
					   					<div class="col-md-3 no_padding column_izq">
					   						<span class="icono glyphicon glyphicon-collapse-down"></span>
					   					</div>
					   					<div class="col-md-9 no_padding">
					   						<div class="clearfix">
						   						<label for="fila_up_space" class="col-md-8 no_padding">Esp. sup.</label>
							   					<input type="number" class="col-md-4 no_padding" id="fila_up_space" value="0" min="0">
						   					</div>
						   					<div class="clearfix">
								   				<label for="fila_down_space" class="col-md-8 no_padding">Esp. inf.</label>
								   				<input type="number" class="col-md-4 no_padding" id="fila_down_space" value="0" min="0">
								   			</div>
					   					</div>
					   				</div>
				   				</div>
				   			</div>
				   			<div class=" col-md-7">
				   				<div class="columna">
				   					<div class="title_columna">Crear columna</div>
					   				<div class="body_columna clearfix">
					   					<div class="col-md-3 column_izq">
					   						<span class="icono glyphicon glyphicon-collapse-down"></span>
					   					</div>
					   					<div class="col-md-9 no_padding">
					   						<div class="clearfix">
					   							<div class="col-md-6 no_padding">
							   						<label for="column_width" class="col-md-8 no_padding">Ancho</label>
								   					<input type="number" class="col-md-4 no_padding" id="column_width" value="0" min="0.9" max="1" step="any">
							   					</div>
							   					<div class="col-md-6">
									   				<label for="column_height" class="col-md-6 no_padding">Alto</label>
									   				<input type="number" class="col-md-6 no_padding" id="column_height" placeholder="auto" min="0">
									   			</div>
					   						</div>
					   						<div class="clearfix">
						   						<div class="col-md-6 no_padding">
							   						<label for="column_up_space" class="col-md-8 no_padding">Esp. sup.</label>
								   					<input type="number" class="col-md-4 no_padding" id="column_up_space" value="0" min="0">
							   					</div>
							   					<div class="col-md-6">
									   				<label for="column_down_space" class="col-md-7 no_padding">Esp. inf.</label>
									   				<input type="number" class="col-md-5 no_padding" id="column_down_space" value="0" min="0">
									   			</div>
								   			</div>
					   					</div>
					   				</div>
				   				</div>
				   			</div>
				   		</div>
				   		<div class="maqueta">

				   		</div>
				   </div>
				   <div class="col-md-4 no_padding imagenes">
				   		<ul class="list_reset">
				   			<?php $query2 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas,tbl_tipos  where fktipos_tipos_marcas=id_tipo and fkmarcas_tipos_marcas=".$_GET['id_marca']." order by id_tipos_marcas asc");
				   				$i=0;
					   			while($row2 = mysqli_fetch_assoc($query2))
								{	//print_r($row2);
									if($row2['foto_tipos_marcas']!=".")
									{
							       		echo '<li onclick="move_img(this);" class="img_'.$i.' col-md-5" data="'.$row2['id_tipos_marcas'].'">
							       		<img class="col-md-12 no_padding" src="../webroot/archivos/'.$row2['foto_tipos_marcas'].'"></li>';
							   		}
								 }
							 ?>
				   		</ul>
				   </div>	
				</div>
			</div>	
        </div>
      </div>
    </div>
    <!-- End Panel -->

        <?php

	}








	public function add_tipos_marcasMarcas()
	{
		
		$db_Full = new db_model();
        $db_Full->conectar();
		
		$query = $db_Full->select_sql("SELECT fktipos_tipos_marcas from  tbl_tipos_marcas  where fktipos_tipos_marcas='".$_POST['tipo']."' and fkmarcas_tipos_marcas='".$_GET['id_marca']."' ");
        $row   = mysqli_fetch_assoc($query);
		$tipo=$row['fktipos_tipos_marcas'];
		 
		 if($tipo=="")
		 {


		if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
		{
			    $destino1 = "../webroot/archivos/";
				$name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
				$temp1 = $_FILES['imagen1']['tmp_name'];
				$ext1 = end(explode(".", $name1));
				$type1 = $_FILES['imagen1']['type'];
				$size1 = $_FILES['imagen1']['size'];

				move_uploaded_file($temp1,$destino1.$name1);
				$name_pfd1= explode(".",$name1);
		}

		$query = $db_Full->select_sql("INSERT INTO  tbl_tipos_marcas (id_tipos_marcas,fkmarcas_tipos_marcas,foto_tipos_marcas,numero_columna_marcas,orden_tipo_marcas,fktipos_tipos_marcas) VALUES ('', '".$_POST['id_marca']."' , '".$name_pfd1[0].'.'.$ext1."' , '' , '' , '".$_POST['tipo']."' )");

		 }else
		 {
		 echo '<script>alert("Estos datos ya existen");</script>';
	     }

		location("tipos_marcas?id_marca=".$_POST['id_marca']."&action=list_tipos");

	}




	public function delete_tipos_marcasMarcas()
	{   $db_Full = new db_model();
$db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_tipos_marcas WHERE id_tipos_marcas = '".$_GET['id']."'");
		location("tipos_marcas?id_marca=".$_GET['id_marca']."&action=list_tipos");
	}


	public function edit_tipos_marcasMarcas(){
		$db_Full = new db_model();
$db_Full->conectar();

        $query = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas, tbl_tipos where fktipos_tipos_marcas = id_tipo AND id_tipos_marcas='".$_GET['id']."' ");
        $row   = mysqli_fetch_assoc($query);
		$foto  = $row['foto_tipos_marcas'];
		$id    = $_GET['id'];


        //tipo de prenda
		$query2=$db_Full->select_sql("SELECT * FROM tbl_tipos");	
		?>

	
 <a href="tipos_marcas?id_marca=<?php echo $_GET['id_marca']; ?>&action=list_tipos" class="btn btn-default btn-block">ATRÁS</a>
<br>

<script>


function validando_clientes(opcion, id){
	var tipoprenda = document.clientes.elements['tipoprenda'];

	if(tipoprenda.value == ""){
		alert("Seleccione una opción de tipo de prenda");
		tipoprenda.focus();
		return false;
	}

	document.clientes.action="tipos_marcas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR IMAGEN
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="id_marca" value="<?php echo $_GET['id_marca'] ?>">
            <div class="form-group">
            <label class="col-sm-2 control-label">Tipo de Prenda</label>
             <div class="col-sm-10">	
             <select name="tipoprenda" class="form-control" />
             <option value=''>Seleccionar Tipo de Prenda</option>
              <?php
                  $w = 1;
                  while($row2 =  mysqli_fetch_assoc($query2))
                  { 
                  	$selected = ($row['id_tipo'] == $row2['id_tipo']) ? "selected":'';
                    echo '<option '.$selected.' value="'.$row2['id_tipo'].'">'.$row2['nombre_tipo'].'</option>';
                    $w++;
                  }?>
              <!--<option value='0' <?php //if($row['tipo_foto1']=='0'){ //echo "selected"; } ?>>Ninguno</option> -->
              </select>
              </div> 	
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">
				  <input type="hidden" name="imagen" value="<?php echo $row['foto_tipos_marcas'] ?>">
                  <input type="file" name="imagen1" class="form-control" />
					
 				 <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>Tamaño recomendable 670x400 px
                 </div>

                  <?php
				  if($foto!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $foto ?>" width="200" >
                  <?php
				   }else
				   {
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php
                   }
				  ?>

                </div>
              </div>


				<input type="submit" onclick="return validando_clientes('update_tipos_marcas','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


        	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


		<?php

	}
	
	
	
	public function update_tipos_marcasMarcas()
	{   $db_Full = new db_model();
$db_Full->conectar();
		//verificar que el tipo de prenda seleccionado ya no exista
		$query1 = $db_Full->select_sql("SELECT count(*) AS 'canttipo' FROM tbl_tipos_marcas,tbl_tipos  where fktipos_tipos_marcas=id_tipo and fkmarcas_tipos_marcas='".$_POST['id_marca']."' AND fktipos_tipos_marcas='".$_POST['tipoprenda']."' AND id_tipos_marcas<>'".$_POST['id']."' AND fktipos_tipos_marcas<>'7'");
		$row1 = mysqli_fetch_assoc($query1);
		$tipoprenda1=$row1['canttipo'];
		/*if ($tipoprenda1>=1 ) {
			echo '<script>alert("Ya se ha seleccionado este tipo de prenda");</script>';
			location("tipos_marcas?id_marca=".$_POST['id_marca']."&action=list_tipos");
		}else{*/
			if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
			{//verifica que se haya cargado la imagen
				$destino1 = "../webroot/archivos/";
				$name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
				$temp1 = $_FILES['imagen1']['tmp_name'];
				$type1 = $_FILES['imagen1']['type'];
				$size1 = $_FILES['imagen1']['size'];
				$ext1 = end(explode(".", $name1));
				move_uploaded_file($temp1,$destino1.$name1);
				$name_pfd1 = explode(".",$name1);
				$update1 = " foto_tipos_marcas = '".$name_pfd1[0].'.'.$ext1."' ";

				$query = $db_Full->select_sql("UPDATE  tbl_tipos_marcas SET ".$update1.", fktipos_tipos_marcas='".$_POST['tipoprenda']."' WHERE id_tipos_marcas = ".$_GET['id']." ");


				location("tipos_marcas?id_marca=".$_POST['id_marca']."&action=list_tipos");
			}else{//si no se cargo imagen, entonces mantiene la imagen actual


				$query = $db_Full->select_sql("UPDATE  tbl_tipos_marcas SET foto_tipos_marcas='".$_POST['imagen']."', fktipos_tipos_marcas='".$_POST['tipoprenda']."' WHERE id_tipos_marcas = ".$_GET['id']." ");
				location("tipos_marcas?id_marca=".$_POST['id_marca']."&action=list_tipos");
			}
		/*}*/	
		


	}
	

}
?>
