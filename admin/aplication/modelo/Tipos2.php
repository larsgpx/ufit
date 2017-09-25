<?php
class Tipos{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newTipos()
	{

	?>

<script>
function validando_clientes(opcion, id){
	var tipo = document.clientes.elements['tipo'];
	var imagen1 = document.clientes.elements['imagen1'];

	if(tipo.value == ""){
		alert("Ingrese Tipo de Prenda");
		tipo.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen de la cabecera de la página");
		imagen1.focus();
		return false;
	}

	document.clientes.action="tipos?action="+opcion+"&id="+id;
	document.clientes.submit();
}
</script>

   <a href="tipos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO TIPO DE PRENDA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Prenda</label>
                <div class="col-sm-10">
                  <input type="text" name="tipo"  class="form-control" />
                </div>
              </div>

  <?php /*?>          <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />

                </div>
              </div><?php */?>


				<input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
		<?php
	}

	public function addTipos(){
    $db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("SELECT nombre_tipo from tbl_tipos where nombre_tipo='".$_POST['tipo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$tipo=$row['nombre_tipo'];

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

		$query = $db_Full->select_sql("INSERT INTO  tbl_tipos VALUES ('','".$_POST['tipo']."' , '".$name_pfd1[0].'.'.$ext1."' , '0' )");

		location("tipos");
		 }else
		 {
		 echo '<script>alert("Estos datos ya existen");</script>';
	   }

	}

	public function editTipos(){
       $obj =  new Tipo($_GET['id']);
		?>


<script>
function validando_clientes(opcion, id){
	var tipo = document.clientes.elements['tipo'];

	if(tipo.value == ""){
		alert("Ingrese Tipo de Prenda");
		tipo.focus();
		return false;
	}

	document.clientes.action="tipos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="tipos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR TIPO DE PRENDA
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
                          <input type="text" name="titulo_seo"  class="titulo_seo form-control" maxlength="25" placeholder="Titulo SEO (Máximo 25 caracteres)" value="<?php echo $obj->__get('title_seo'); ?> " />
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
                <label class="col-sm-2 control-label">Tipo de Prenda</label>
                <div class="col-sm-10">
                  <input type="text" name="tipo"  class="form-control titulo_subseo generar_url" value="<?php echo $obj->__get('_nombre'); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="text" name="m_url"  class="form-control mostrar_url" disabled="disabled" value="<?php echo $obj->__get('url_page_tbl'); ?>" />
                  <input type="hidden" name="url"  class="form-control mostrar_url" value="<?php echo $obj->__get('url_page_tbl'); ?>" />
                </div>
              </div>

    <?php /*?>        <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la cabecera de la página</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />


                  <?php
				  if($obj->__get('_foto')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>"  >
                  <?php
				   }else
				   {
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php
                   }
				  ?>

                </div>
              </div><?php */?>


				<input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


        	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


		<?php

	}

	public function updateTipos()
	{
     $db_Full = new db_model();  $db_Full->conectar();  
    
     try{   
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
            			$update1 = " foto_tipo = '".$name_pfd1[0].'.'.$ext1."' ";
            			$query = $db_Full->select_sql("UPDATE  tbl_tipos SET ".$update1." WHERE id_tipo = '".$_GET['id']."' ");
          		}

              $tabla = "tbl_tipos";    
              $mensajes['global'] = '';
              $mensajes['seo'] = '';

              $query_tabla = $db_Full->select_sql("select id_tipo,url_page_tbl,_id_seo from $tabla where id_tipo = ".$_GET['id'].""); 
              
              $row_m = mysqli_fetch_assoc($query_tabla);
        
              if(mysqli_num_rows($query_tabla)){ 

                      if((empty($row_m['url_page_tbl']) && $row_m['_id_seo'] == 0) || (!empty($row_m['url_page_tbl']) && $row_m['_id_seo'] == 0)){  
                              $seo     =   array(
                                                 "title_seo"          =>  $_POST['titulo_seo'],
                                                 "keywords_seo"       =>  $_POST['keywords_seo'],
                                                 "description_seo"    =>  $_POST['descripcion_seo']
                                               );

                              $id_seo = $db_Full->insert_table("tbl_seo",$seo); 

                              if($id_seo == false){
                                    throw new Exception($mensajes['global']);
                              }

                              $page_tbl = array(
                                                 "titulo_page_tbl"    =>  $_POST['tipo'],
                                                 "url_page_tbl"       =>  $_POST['url'],
                                                 "plantilla_page_tbl" =>  "tipos_prenda",
                                                 "estado_page_tbl"    =>  "a",
                                                 "orden_page_tbl"     =>  0,
                                                 "tabla_page_tbl"     =>  "tbl_tipos",
                                                 "tipo_url_page"      =>  'i',
                                                 "id_tabla_page_tbl"  =>  $_GET['id'],
                                                 "fk_id_seo"          =>  $id_seo 
                                               );

                              $idPage = $db_Full->insert_table("tbl_page",$page_tbl);
                              
                              if($idPage == false) {
                                    throw new Exception($mensajes['global']);
                              }

                              $query_id = $query = $db_Full->select_sql("UPDATE $tabla SET nombre_tipo='".$_POST['tipo']."', url_page_tbl='".$_POST['url']."',_id_seo ='".$id_seo."'  WHERE id_tipo = '".$_GET['id']."'");

                              if($query_id == false) {
                                    throw new Exception($mensajes['global']);
                              }
                      }
                  
                    else{
                  
                              $query_id = $db_Full->select_sql("UPDATE  $tabla SET nombre_tipo='".$_POST['tipo']."', url_page_tbl='".$_POST['url']."'  WHERE id_tipo = '".$_GET['id']."' ");
                             /**************************************************************************************/
                              $seo   =  array(
                                                "title_seo"           => $_POST['titulo_seo'],
                                                "keywords_seo"        => $_POST['keywords_seo'],
                                                "description_seo"     => $_POST['descripcion_seo']
                                            );

                              $where  =  array(
                                                "id_seo"  => $row_m['_id_seo'] 
                                              );

                              $id_seo = $db_Full->update_table("tbl_seo",$seo,$where); 

                              if($id_seo == false) {
                                    throw new Exception($mensajes['seo']);
                              }
                            /**************************************************************************/  
                              $page_tbl = array(
                                                 "titulo_page_tbl"    =>  $_POST['tipo'],
                                                 "url_page_tbl"       =>  $_POST['url'],
                                                 "orden_page_tbl"     =>  0,
                                                 "tipo_url_page"      =>  'i',
                                                 "estado_page_tbl"    =>  "a",
                                                 "orden_page_tbl"     =>  0,
                                                 "tabla_page_tbl"     =>  "tbl_tipos",
                                                 "tipo_url_page"      =>  'i',
                                               );

                              $where    = array(
                                                 "url_page_tbl"       => "'".$row_m['url_page_tbl']."'"
                                               );

                              $idPage = $db_Full->update_table("tbl_page",$page_tbl,$where);

                              if($idPage == false) {
                                    throw new Exception($mensajes['global']);
                              }
                              $db_Full->commit();
                      }
              }

              $db_Full->commit();
              location("tipos");

        }catch(Exception $e){

            $db_Full->rollback();
            location("tipos");
        }   
    }


	public function deleteTipos()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_tipos WHERE id_tipo = '".$_GET['id']."'");
		location("tipos");
	}

	public function listTipos(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_tipos WHERE id_tipo<>'7' order by orden_tipo asc");

		?>

         <script>
         function load_combo_ajax_iframe(THIS,id){ }
		function mantenimiento(url,id,opcion){
	if(opcion!="delete"){
		location.replace(url+'?action='+opcion+'&id='+id);
	}else if(opcion == "delete"){
		if(!confirm("Esta Seguro que desea Eliminar el Registro")){
			return false;
		}else{
			location.replace(url+'?action='+opcion+'&id='+id);
		}
	}

} </script>
<?php /*?>
    <a href="tipos?action=new" class="btn btn-default btn-block">AGREGAR TIPOS DE PRENDA</a>
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
          Lista de Tipos de Prenda
        </div>
        <div class="panel-body table-responsive">

            <table  class="table display">
            <thead>
               <tr>
                <!--<th></th>-->
                <th  >Tipo de Prenda</th>
               <?php /*?> <th  >Imagen</th><?php */?>
            <?php /*?>    <th  >Agregar Marcas</th><?php */?>
                <th  >Agregar Categorías</th>
                <th  >Agregar Filtros</th>
                <th  >Agregar Imágnes</th>
                <th >Editar</th>
            <!--    <th >Eliminar</th>-->
                </tr>
              </thead>
               <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr id="list_item_<?php echo $row['id_tipo']."|tipos"; ?>" >
            		<?php /*?><td class="handle"><i class="fa fa-bars"></i></td><?php */?>
                    <td ><?php echo $row['nombre_tipo']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick="modal_tipos_iframe(this);" data-modal="categorias?id_tipo=<?php echo $row['id_tipo'] ?>&tipo=<?php echo $row['tipo']; ?>&action=list"  data-toggle="modal" data-target="#myModal<?php echo $row['id_tipo']; ?>">AGREGAR CATEGORÍAS</a>

                           <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $row['id_tipo']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR CATEGORÍAS A : <?php echo $row['nombre_tipo']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe id="asignar_categoria_ifr"  src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->

                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick="modal_tipos_iframe(this);" data-modal="filtros?id_tipo=<?php echo $row['id_tipo'] ?>&action=list" data-toggle="modal" data-target="#Modal<?php echo $row['id_tipo']; ?>">AGREGAR FILTROS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal<?php echo $row['id_tipo']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR FILTROS A : <?php echo $row['nombre_tipo']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe id="asignar_filtro_ifr"  src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->


                    </td>

                    
                     <td>
                     <?php 

					 if($row['tipo'] == "prod")
					 {
					 ?>
                    	<a class="btn btn-default btn-block" onclick="modal_tipos_iframe(this);" data-modal="categorias?id_tipo=<?php echo $row['id_tipo'] ?>&action=list_imagenes" data-toggle="modal" data-target="#Modal_img<?php echo $row['id_tipo']; ?>">AGREGAR IMAGENES</a>
                         <div class="modal fade" id="Modal_img<?php echo $row['id_tipo']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR IMAGENES A : <?php echo $row['nombre_tipo']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <div class="mensaje">
                                      <span class="alert alert-success"></span>
                                      <span class="alert alert-danger"></span>
                                    </div>
                                    <button type="button" id="update_imagenes" onclick="updateImagenesColumnas(this,'gallery_tipo');" class="btn btn-green">Actualizar</button>
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                      <?php 
					 }
					 ?>   
                      </td>
                    
                    
                    
                    <td>
                    	<a class="btn btn-default btn-block"  href="tipos?id=<?php echo $row['id_tipo'] ?>&action=edit">EDITAR</a>
                    </td>
                <?php /*?>    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("tipos",<?php echo $row['id_tipo'] ?>,"delete")>ELIMINAR</a>
                    </td><?php */?>

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


  <?php /*?>    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

            <script>
			$(document).ready(function(){



	$("#listadoul").sortable({
	  handle : '.handle',
	  update : function () {
		var order = $('#listadoul').sortable('serialize');

		  $.get("ajax?"+order,{action:'ordenarTipo'},function(data){

		});
	  }
	});



});
			</script><?php */?>


        <?php

	}










}
?>
