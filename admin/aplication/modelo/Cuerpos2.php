<?php
class Cuerpos{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newCuerpos()
	{

	?>




<script>


function validando_clientes(opcion, id){
	
	var imagen1 = document.clientes.elements['imagen1'];
	var titulo = document.clientes.elements['titulo'];
	var link = document.clientes.elements['link'];
	
	if(imagen1.value == ""){
		alert("Ingrese imagen");
		imagen1.focus();
		return false;
	}
	
	if(titulo.value == ""){
		alert("Ingrese título");
		titulo.focus();
		return false;
	}
	
	
	if(link.value == ""){
		alert("Ingrese link de la imagen");
		link.focus();
		return false;
	}



	document.clientes.action="cuerpos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="cuerpos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA IMAGEN
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
             
            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 160x37 px en formato .png
                  </div>

                </div>
            </div>
	
			<div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control" />
                </div>
            </div>

 			<div class="form-group">
                <label class="col-sm-2 control-label">Link</label>
                
                <div class="col-sm-10">
                	<select class="form-control required ini_url" id="tipo" onchange="load_contenidos_tipo(this);"  name="link">
						<option value="" data="">Seleccione Tipo</option>
							<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_tipo'] ?>' data="<?php echo $rows1['url_page_tbl'] ?>"><?php echo $rows1['nombre_tipo'] ?></option>
	                        <?php } ?>
					</select>
                    <input type="text" name="link"  class="form-control" />
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

	public function addCuerpos(){

		$db_Full = new db_model(); $db_Full->conectar();

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

		
		$query      = $db_Full->select_sql("INSERT INTO  tbl_cuerpo_home VALUES ('' , '".$name_pfd1[0].'.'.$ext1."' , '".$_POST['link']."' , '".$_POST['titulo']."' )");

	location("cuerpos");

	}


	public function editCuerpos(){
       $obj =  new Cuerpo($_GET['id']);

		?>
<script>


function validando_clientes(opcion, id){
	
	var titulo = document.clientes.elements['titulo'];
	
	
	if(titulo.value == ""){
		alert("Ingrese título");
		titulo.focus();
		return false;
	}
	
	document.clientes.action="cuerpos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="cuerpos" class="btn btn-default btn-block">ATRÁS</a>
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

          
            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    <?php
                    if($obj->__get('_id') == 4)
					{
						echo "Tamaño recomendable 785x345 px ";
					}
					if($obj->__get('_id') == 5)
					{
						echo "Tamaño recomendable 385x345 px ";
					}
					if($obj->__get('_id') == 6)
					{
						echo "Tamaño recomendable 385x165 px ";
					}
					if($obj->__get('_id') == 7)
					{
						echo "Tamaño recomendable 385x165 px ";
					}
					if($obj->__get('_id') == 8)
					{
						echo "Tamaño recomendable 555x345 px ";
					}
					if($obj->__get('_id') == 9)
					{
						echo "Tamaño recomendable 780x345 px ";
					}
					if($obj->__get('_id') == 10)
					{
						echo "Tamaño recomendable 385x345 px ";
					}
					if($obj->__get('_id') == 11)
					{
						echo "Tamaño recomendable 785x345 px ";
					}
					if($obj->__get('_id') == 12)
					{
						echo "Tamaño recomendable 385x345 px ";
					}
					if($obj->__get('_id') == 13)
					{
						echo "Tamaño recomendable 385x345 px ";
					}
					?>
                   
                  </div>

                  <?php
				  if($obj->__get('_imagen') != ".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_imagen') ?>" width="500" >
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
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control" value="<?php echo $obj->__get('_titulo'); ?>" />
                </div>
              </div>
              
              
              
        <div class="form-group">
                <label class="col-sm-2 control-label">Link</label>
                <div class="col-sm-10">
                  <select name="link" class="form-control">
                  	  <?php $db_Full = new db_model(); $db_Full->conectar(); 
                  	  		$query_link = $db_Full->select_sql("select 
                  	  			                                url_page_tbl,
                  	  			                                nombre_tipo 
                  	  			                                from tbl_tipos");

                  	  			$row_url['url'][0]     = '';
                  	  			$row_url['nombre'][0]  = 'Seleccione un enlace';
                  	  			$row_url['url'][1]     = 'marcas';
                  	  			$row_url['nombre'][1]  = 'MARCAS';
                  	  			$row_url['url'][2]     = 'asesoria';
                  	  			$row_url['nombre'][2]  = 'ASESORIA';
                  	  			$row_url['url'][3]     = 'new-arrivals/hombre';
                  	  			$row_url['nombre'][3]  = 'NEW ARRIVALS HOMBRE';
                  	  			$row_url['url'][4]     = 'new-arrivals/ninos';
                  	  			$row_url['nombre'][4]  = 'NEW ARRIVALS NIÑOS';
                  	  		    $i = 5;

                  	  		while($roww = mysqli_fetch_assoc($query_link)){
                  	  			$row_url['url'][$i]    = $roww['url_page_tbl']; 
                  	  			$row_url['nombre'][$i] = $roww['nombre_tipo']; 
                  	  			$i++;
                  	  		}
                  	  		
                  	  		for ($j = 0; $j < $i; $j++) { 
                  	  			$active = ($obj->__get('_link') == $row_url['url'][$j]) ? 'selected':'';
                  	  			echo '<option value="'.$row_url['url'][$j].'" '.$active.'>'.$row_url['nombre'][$j].'</option>';

                  	  		}
                  	  		echo '<option value="">NINGUNO</option>';
                  	  ?>
                  </select>	
                  <!-- <input type="text" name="link"  class="form-control" value="<?php echo $obj->__get('_link'); ?>" /> -->
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

	public function updateCuerpos()
	{  $db_Full = new db_model(); $db_Full->conectar();
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
			$update1 = " imagen_cuerpo = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_cuerpo_home SET ".$update1." WHERE id_cuerpo = '".$_GET['id']."' ");
		}

		$query = $db_Full->select_sql("UPDATE  tbl_cuerpo_home SET link_cuerpo='".$_POST['link']."' , titulo_cuerpo='".$_POST['titulo']."' WHERE id_cuerpo = '".$_GET['id']."' ");

		location("cuerpos");
	}


	public function deleteCuerpos()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_cuerpo_home WHERE id_cuerpo = '".$_GET['id']."'");
		location("cuerpos");
	}


	public function listCuerpos()
	{   $db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("select  * FROM tbl_cuerpo_home order by id_cuerpo asc");

		?>
<a href="cuerpos?action=new" class="btn btn-default btn-block">NUEVO CUERPO</a>
<br>
<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Imágenes del cuerpo
        </div>
        <div class="panel-body table-responsive" id="cuerpo_inicio">

            <table class="table display" >
            <thead>
                <tr>
	                <th>Imagen</th>
	                <th>Título</th>
	                <th>Bloque</th>
	                <th>Columna</th>
	                <th>Orden</th>
	                <th>Tamaño</th>
	                <th>Editar</th>
                </tr>
              </thead>
              <tbody>
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
			?>

            <tr > 
                    <td valign="top" >
                    	  <?php
						  if($row['imagen_cuerpo']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['imagen_cuerpo'] ?>" width="150">
						  <?php
						   }else
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						   }
						  ?>
                    </td>
                    <td >
                    	 <input type="text" class="texto_imagen" name="texto_imagen[]" value="<?php echo $row['titulo_cuerpo']; ?>">
                    </td>
                    <td>
                    	<div class="clearfix">
	                    	<select class="apertura_columna" name="columnas_aper[]">
				            	<?php 
				            		$op = array(0 => "Ninguno", 1 => "Abrir bloque", 2 => "Cerrar bloque");
					            	for($i = 0; $i <= 2 ; $i++){
					            		$v2 = ($row['apertura_columnas_cuerpohome'] == $i) ? 'selected' : '';
					            		echo '<option value="'.$i.'" '.$v2.'>'.$op[$i].'</option>';
					            	}
				            	?>
				            </select>
				            <?php $v = $row['numero_columna_cuerpohome_aper'];?>
			            	<input type="number" class="anumero_columnas" name="anumero_columnas[]" min="0" max="12" value="<?php echo $v;?>">
			            </div>
			            <div class="clearfix">
			            	<label>Tipo de imagen</label>
				            <select class="tipo_imagen" name="tipo_imagen[]">
				            	<?php
				            		$op = array(1 => "Cover", 2 => "Normal");
					            	for($i = 1; $i <= 2 ; $i++){
					            		$v2 = ($row['tipo_imagen_cuerpo_home'] == $i) ? 'selected' : '';
					            		echo '<option value="'.$i.'" '.$v2.'>'.$op[$i].'</option>';
					            	}
					            ?>	
				            </select>
			            </div>
			            
			            
                    <!-- <a href="<?php echo $row['link_cuerpo']; ?>" target="_blank">Ver link</a> -->
                    </td>
                    <td>
                    	<div class="clearfix">
	                    	<input type="hidden" class="tipo" name="tipo_home[]" value="<?php echo $row['id_cuerpo'];?>">
				            <?php $v = $row['numero_columna_cuerpohome'];?>
				            <input type="number" class="numero_columnas" name="numero_columnas[]" min="0" max="12" value="<?php echo $v;?>">
				        </div>
				        <div class="clearfix">
				        	<label>Clases:</label>
				        	<input type="text" class="clases_imagen" min="0" name="clases_imagen[]" value="<?php echo $row['clases_cuerpo_home']; ?>">
				        </div>    
                    </td>
                    <td>
                    	<div class="clearfix">
	                    	<?php $v2 = ($row['orden_tipo_magazines'] != 0) ? $row['orden_tipo_magazines'] : 0;?>
				            <input type="number" class="orden_imagen" min="0" name="orden_imagen[]" value="<?php echo $v2;?>">
			            </div>
			            <div class="clearfix">
                    		<label>Tamaño texto:</label>
			            	<select class="size_texto_imagen" name="size_texto_imagen[]">
			            	    
			            	    <?php
				            		$op = array('n' => "Normal", 'p' => "Pequeño");
				            		foreach ($op as $key => $value) {
				            			$v2 = ($row['size_texto_imagen_cuerpo_home'] == $key) ? 'selected' : '';
					            		echo '<option value="'.$key.'" '.$v2.'>'.$value.'</option>';
				            		}
					            ?>	
			            	</select>
                    	</div>
                    </td>
                    <td>
                    	<div class="clearfix">
                    		<label>Ancho:</label>
			            	<input type="number" class="ancho_imagen" min="0" name="ancho_imagen[]" placeholder="100%"  value="<?php echo $row['width_cuerpo_home']; ?>">
                    	</div>
                    	<div class="clearfix">
                    		<label>Alto:</label>
			            	<input type="number" class="alto_imagen" min="0" name="alto_imagen[]" placeholder="Auto"  value="<?php echo $row['height_cuerpo_home']; ?>">
                    	</div>
                    </td>
                    <td>

                    	<a class="btn btn-default btn-block"  href="cuerpos?id=<?php echo $row['id_cuerpo'] ?>&amp;action=edit">EDITAR</a>
                    </td>
			</tr>
                <?php
			$w++;
			}
			?>

               </tbody>
            </table>
            <span type="button" id="update_imagenes" onclick="updateImagenesColumnasMagazine(this,'gallery_home','#cuerpo_inicio');" class="btn btn-green">Actualizar todo</span>
        </div>

      </div>
    </div>
    <!-- End Panel -->
    <?php
	}


}
?>
