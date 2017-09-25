<?php
class Productos{

	private $_idioma, $_msgbox; 

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;

	}


	public function newProductos()
	{   
		$db_Full = new db_model(); $db_Full->conectar();
		$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
		$querys1 = $db_Full->select_sql($sqls1);
		//lista marcas
		$sqls2 = "SELECT * FROM tbl_marcas";
		$querys2 = $db_Full->select_sql($sqls2);

		//lista tipo persona
		$sqls3 = "SELECT * FROM tbl_tipo_persona";
		$querys3 = $db_Full->select_sql($sqls3);
	?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/jquery.form.js" type="text/javascript"></script>
<script>

function validando_clientes(opcion, id)
{
	var titulo = document.clientes.elements['titulo'];
	var precio = document.clientes.elements['precio'];
	var codigo = document.clientes.elements['codigo'];
	var marca  = document.clientes.elements['marca'];
	var tipopersona = document.clientes.elements['tipopersona'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];
	var imagen3 = document.clientes.elements['imagen3'];
	var imagen4 = document.clientes.elements['imagen4'];
	var imagen5 = document.clientes.elements['imagen5'];
	var imagen6 = document.clientes.elements['imagen6'];
	var imagen7 = document.clientes.elements['imagen7'];
	var tipo    = document.clientes.elements['tipo'];
	var descripcion = document.clientes.elements['descripcion'];

	if(titulo.value == ""){
		alert("Ingrese Título del Producto");
		titulo.focus();
		return false;
	}


	if(precio.value == ""){
		alert("Ingrese precio del Producto");
		precio.focus();
		return false;
	}

	if(codigo.value == ""){
		alert("Ingrese código del Producto");
		codigo.focus();
		return false;
	}


	if(tipo.value == ""){
		alert("Ingrese Tipo de Prenda");
		tipo.focus();
		return false;
	}

	if(marca.value == ""){
		alert("Ingrese Marca");
		marca.focus();
		return false;
	}

	if(tipopersona.value == ""){
		alert("Ingrese Tipo de Persona");
		tipopersona.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen de producto");
		imagen1.focus();
		return false;
	}

	if(imagen2.value == ""){
		alert("Ingrese imagen de producto");
		imagen2.focus();
		return false;
	}


	if(imagen3.value == ""){
		alert("Ingrese imagen de producto");
		imagen3.focus();
		return false;
	}


	if(imagen4.value == ""){
		alert("Ingrese imagen de producto");
		imagen4.focus();
		return false;
	}


	if(imagen5.value == ""){
		alert("Ingrese imagen de producto");
		imagen5.focus();
		return false;
	}


	if(imagen6.value == ""){
		alert("Ingrese imagen de producto");
		imagen6.focus();
		return false;
	}


	if(imagen7.value == ""){
		alert("Ingrese imagen de producto");
		imagen7.focus();
		return false;
	}



	if(descripcion.value == ""){
		alert("Ingrese descripción del Producto");
		descripcion.focus();
		return false;
	}

	document.clientes.action = "productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}
$(document).ready(function(){
	
});
</script>

   <a href="productos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO PRODUCTO
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">  

           <form action="" method="post" name="clientes" class="form_upload form-horizontal row-border"  enctype="multipart/form-data">

			  <!-- SEO page information -->
			  <div id="display_error" style="display: none;">
			  		<div class="alert alert-warning"></div>
					<div class="alert alert-danger"></div>
			  </div>
			  <div id="display_success" style="display: none;">
					<div class="alert alert-success"></div>
			  </div>			
              <div class="bloque_seo clearfix" style="margin: 20px 0;">
              		<a class="btn btn-default col-sm-2 col-md-2 col-lg-2" role="button" data-toggle="collapse" href="#collapseSEO" aria-expanded="false" aria-controls="collapseExample">SEO</a>
              		<div class="col-sm-7 col-md-7 col-lg-7 collapse" id="collapseSEO">
			              	  <div class="form-group">
				                <label class="col-sm-2 control-label">Titulo</label>
				                <div class="col-sm-10">
				                  <input type="text" name="titulo_seo"  class="titulo_seo form-control" maxlength="25" placeholder="Titulo SEO (Máximo 25 caracteres)" />
				                </div>
				              </div> 
				              <div class="form-group">
				                <label class="col-sm-2 control-label">Palabras clave</label>
				                <div class="col-sm-10">
				                  <input type="text" name="keywords_seo"  class="form-control" placeholder="Palabras claves separadas por coma para SEO" />
				                </div>
				              </div>
				              <div class="form-group">
				                <label class="col-sm-2 control-label">Descripcion</label>
				                <div class="col-sm-10">
				                  <textarea class="form-control" name="descripcion_seo" placeholder="Descripción del producto SEO"></textarea>
				                </div>
				              </div>
		            </div>
              </div>

              <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Prenda *</label>
	                <div class="col-sm-10">
	                  <select class="form-control required ini_url" id="tipo" onchange="load_contenidos_tipo(this);"  name="tipo">
						<option value="" data="">Seleccione Tipo</option>
							<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_tipo'] ?>' data="<?php echo $rows1['url_page_tbl'] ?>"><?php echo $rows1['nombre_tipo'] ?></option>
	                        <?php } ?>
						</select>
	                 </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Título Producto *</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control titulo_subseo generar_url required" onclick="generar_url(this);" onkeyup="generar_url(this);" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="text" name="m_url"  class="form-control mostrar_url" disabled="disabled" />
                  <input type="hidden" name="url"  class="form-control mostrar_url" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label ">Precio *</label>
                <div class="col-sm-10">
                  <input type="text" name="precio"  class="form-control required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Moneda</label>
                <div class="col-sm-10">
                  <select name="tipo_moneda">
                  	<?php $query1 = $db_Full->select_sql("SELECT id_tipo_cambio,nombre_moneda FROM tbl_tipo_cambio");
        				  echo '<option value="">Seleccione moneda</option>';
        				  while ($row1   = mysqli_fetch_assoc($query1)){

        				  	echo '<option value="'.$row1['id_tipo_cambio'].'">'.$row1['nombre_moneda'].'</option>';
        				  }
        			?>
                  </select>
                </div>
              </div>

              <div class="form-group">
	                <label class="col-sm-2 control-label">Código *</label>
	                <div class="col-sm-10">
	                  <input type="text" name="codigo"  class="form-control required" />
	                </div>
              </div>
              <div class="form-group">

			  </div>
              <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" id="multiple_opcion_tipo">
              	 <ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#categorias">Asignar Categoría</a></li>
				    <li><a data-toggle="tab" href="#filtros">Asignar Fitros</a></li>
				    <li><a data-toggle="tab" href="#fotos_productos">Asignar Fotos</a></li>
				    <li><a data-toggle="tab" href="#caracteristicas_productos">Asignar Caracteristicas</a></li>
				 </ul>
				 <div class="tab-content">
					<div id="categorias" class="tab-pane fade in clearfix active">
						<div class="clearfix form-group">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 cat">
							    <label for="categoria_producto" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Categoría</label>
							    <div class="clearfix col-xs-9 col-sm-9 col-md-9 col-lg-9 lista_dinamic">
							    	<span class="btn lista_dinamic_button" onclick="list_dinamic_click(this);">Seleccione categoría</span>
							    	<ul id="categoria_producto" class="list_reset" opdata="load_contenidos_subcategorias();" copia="" data="" val=""></ul>
							    </div>
								<!-- <select name="categoria_producto" id="categoria_producto" class="col-xs-9 col-sm-9 col-md-9 col-lg-9" onchange="load_contenidos_subcategorias(this);">		
								   <option value="">Seleccione categoría</option>
								</select> -->
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 sub">
							    <label for="subcategoria_producto" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">SubCategoría</label>
							    <div class="clearfix col-xs-9 col-sm-9 col-md-9 col-lg-9 lista_dinamic">
							    	<span class="btn lista_dinamic_button" onclick="list_dinamic_click(this);">Seleccione categoría</span>
							    	<ul id="subcategoria_producto" class="lista_dinamic list_reset" opdata="" copia="" data="" val=""></ul>
							    	<div class="recover" style="display: none"></div>
							    </div>
								<!-- <select name="subcategoria_producto" id="subcategoria_producto" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<option value="">Seleccione subcategoría</option>
								</select> -->
							</div>
						</div>	
						<div class="clearfix">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a onclick="aplicar_caracteristicas_pro(this,'categoria');" class="aplicar btn btn-default col-xs-12 col-sm-12 col-md-12 col-lg-12">Aplicar</a>
							</div>
						</div>
						<input type="hidden" name="categorias_contents" class="caracteristicas_contents">
					</div>
					<div id="filtros" class="tab-pane fade clearfix">
						<div class="clearfix form-group">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 cat">
							    <label for="filtro_producto" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Filtro</label>
							    <div class="clearfix col-xs-9 col-sm-9 col-md-9 col-lg-9 lista_dinamic">
							    	<span class="btn lista_dinamic_button" onclick="list_dinamic_click(this);">Seleccione filtro</span>
							    	<ul id="filtro_producto" class="list_reset" opdata="load_contenidos_subfiltros();" copia="" data="" val=""></ul>
							    </div>
								<!-- <select name="filtro_producto" id="filtro_producto" class="col-xs-9 col-sm-9 col-md-9 col-lg-9" onchange="load_contenidos_subfiltros(this);">		
								   <option value="">Seleccione filtro</option>
								</select> -->
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 sub">
							    <label for="subfiltro_producto" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">SubFiltro</label>
							    <div class="clearfix col-xs-9 col-sm-9 col-md-9 col-lg-9 lista_dinamic">
							    	<span class="btn lista_dinamic_button" onclick="list_dinamic_click(this);">Seleccione subfiltro</span>
							    	<ul id="subfiltro_producto" class="lista_dinamic list_reset" opdata="" copia="" data="" val=""></ul>
							    	<div class="recover" style="display: none"></div>
							    </div>
								<!-- <select name="subfiltro_producto" id="subfiltro_producto" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<option value="">Seleccione subfiltro</option>
								</select> -->
							</div>
						</div>	
						<div class="clearfix">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<a onclick="aplicar_caracteristicas_pro(this,'');" class="aplicar btn btn-default col-xs-12 col-sm-12 col-md-12 col-lg-12">Aplicar</a>
								</div>
						</div>
						<input type="hidden" name="filtro_contents" class="caracteristicas_contents">
					</div>
					<div id="fotos_productos" class="tab-pane fade clearfix">
						<div id="uploader2">
							<p>Tu navegador no soporta Flash, Silverlight o HTML5 support.</p>
					    </div>
					</div>
					<div id="caracteristicas_productos" class="tab-pane fade clearfix">
						<div class="detalles_caract col-xs-5 col-sm-5 col-md-5 col-lg-5">
							
						</div>
						<div class="clearfix form-group col-xs-7 col-sm-7 col-md-7 col-lg-7">
								<div class="clearfix">
									<label for="titulo_caracteristicas" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Titulo</label>
									<input type="text" name="titulo_caracteristicas" id="titulo_caracteristicas" class="col-xs-8 col-sm-9 col-md-9 col-lg-9">
								</div>	
								<div class="clearfix">
									<label for="detalle_caracteristicas" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Detalle</label>
									<input type="text" name="detalle_caracteristicas" id="detalle_caracteristicas" class="col-xs-8 col-sm-9 col-md-9 col-lg-9">
								</div>
								<div class="clearfix">
									<div class="clearfix">
										<label for="descripcion_caracteristicas" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Descripción</label>
										<textarea name="descripcion_caracteristicas" id="descripcion_caracteristicas" class="col-xs-8 col-sm-9 col-md-9 col-lg-9" style="height: 126px;"></textarea>
									</div>
								</div>
								<div class="clearfix">
									<span onclick="add_caracteristica_multi(this);" class="btn btn-default">Agregar caracteristica</span>
								</div>
						</div>
						<input type="hidden" name="filtro_contents" class="caracteristicas_contents">
					</div>
				 </div>
              </div>

              <div class="clearfix">	
				  <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
	                  <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">Descuento (%)</label>
	                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                     <input type="number" name="descuento"  class="form-control" min="0" />
	                  </div>
	              </div>
	              <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
	                  <label class="col-xs-5 col-sm-5 col-md-5 col-lg-5 control-label">Periodo descuento</label>
	                  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
	                     <input type="text" id="periodo_descuento" name="periodo_descuento"  class="form-control" />
	                  </div>
	              </div>
              </div>

              <div class="form-group">
                	<label class="col-sm-2 control-label">Marca del Producto *</label>
	                <div class="col-sm-10">
	                  <select class="form-control required" id="marca"  name="marca">
						<option value=''> Seleccione Marca</option>
							<?php while($rows2 = mysqli_fetch_assoc($querys2)){?>
	                        <option value='<?php echo $rows2['id_marca'] ?>'><?php echo $rows2['nombre_marca'] ?></option>
	                        <?php } ?>
						</select>
					</div>
			  </div>

			  <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Persona *</label>
	                <div class="col-sm-10">
	                  <select class="form-control required" id="tipopersona"  name="tipopersona">
						<option value=''> Seleccione Tipo Persona</option>
							<?php while($rows3 = mysqli_fetch_assoc($querys3)){?>
	                        <option value='<?php echo $rows3['id_tipo_persona'] ?>'><?php echo utf8_encode($rows3['tipo_persona']); ?></option>
	                        <?php } ?>
						</select>
					</div>
			  </div>

			  <div id="uploader">
					<p>Tu navegador no soporta Flash, Silverlight o HTML5 support.</p>
			  </div>
			  <input type="hidden" name="files_uploader" id="files_uploader" class="required" />
			  <input type="hidden" name="files_uploader_internas" id="files_uploader2" class="required" />
              <input type="hidden" name="option_consulta" value="add_productos" />	
              <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto" class="form-control" />
              <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />
              
              <div class="form-group">
	                <label class="col-sm-2 control-label">*Descripción</label>
	                <div class="col-sm-10">
	                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control" ></textarea>
	                </div>
              </div>

              <a onclick="add_new_producto(this);" class="btn-submit btn btn-sm btn-success">GUARDAR</a>
				<!-- <input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR"> -->
        	</form>
        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
		<?php
	}

	public function addProductos(){

		exit;
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
		};



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
		};



		if(isset($_FILES['imagen3']) && ($_FILES['imagen3']['name'] != ""))
		{
			    $destino3 = "../webroot/archivos/";
				$name3 = strtolower(date("ymdhis").$_FILES['imagen3']['name']);
				$temp3 = $_FILES['imagen3']['tmp_name'];
				$ext3 = end(explode(".", $name3));
				$type3 = $_FILES['imagen3']['type'];
				$size3 = $_FILES['imagen3']['size'];

				move_uploaded_file($temp3,$destino3.$name3);
				$name_pfd3= explode(".",$name3);
		};




		if(isset($_FILES['imagen4']) && ($_FILES['imagen4']['name'] != ""))
		{
			    $destino4 = "../webroot/archivos/";
				$name4 = strtolower(date("ymdhis").$_FILES['imagen4']['name']);
				$temp4 = $_FILES['imagen4']['tmp_name'];
				$ext4 = end(explode(".", $name4));
				$type4 = $_FILES['imagen4']['type'];
				$size4 = $_FILES['imagen4']['size'];

				move_uploaded_file($temp4,$destino4.$name4);
				$name_pfd4= explode(".",$name4);
		};



		if(isset($_FILES['imagen5']) && ($_FILES['imagen5']['name'] != ""))
		{
			    $destino5 = "../webroot/archivos/";
				$name5 = strtolower(date("ymdhis").$_FILES['imagen5']['name']);
				$temp5 = $_FILES['imagen5']['tmp_name'];
				$ext5 = end(explode(".", $name5));
				$type5 = $_FILES['imagen5']['type'];
				$size5 = $_FILES['imagen5']['size'];

				move_uploaded_file($temp5,$destino5.$name5);
				$name_pfd5= explode(".",$name5);
		};



		if(isset($_FILES['imagen6']) && ($_FILES['imagen6']['name'] != ""))
		{
			    $destino6 = "../webroot/archivos/";
				$name6 = strtolower(date("ymdhis").$_FILES['imagen6']['name']);
				$temp6 = $_FILES['imagen6']['tmp_name'];
				$ext6 = end(explode(".", $name6));
				$type6 = $_FILES['imagen6']['type'];
				$size6 = $_FILES['imagen6']['size'];

				move_uploaded_file($temp6,$destino6.$name6);
				$name_pfd6= explode(".",$name6);
		};



		if(isset($_FILES['imagen7']) && ($_FILES['imagen7']['name'] != ""))
		{
			    $destino7 = "../webroot/archivos/";
				$name7 = strtolower(date("ymdhis").$_FILES['imagen7']['name']);
				$temp7 = $_FILES['imagen7']['tmp_name'];
				$ext7 = end(explode(".", $name7));
				$type7 = $_FILES['imagen7']['type'];
				$size7 = $_FILES['imagen7']['size'];

				move_uploaded_file($temp7,$destino7.$name7);
				$name_pfd7= explode(".",$name7);
		};



		$query = $db_Full->select_sql("SELECT titulo_producto FROM tbl_productos where titulo_producto='".$_POST['titulo']."' ");
        $row   = mysqli_fetch_assoc($query);
        		$tipo=$row['titulo_producto'];

		// if($tipo=="")
		// {
		//
		//registra producto
		if($_POST['titulo_seo']!='' && $_POST['keywords_seo'] && $_POST['descripcion_seo']){
			$query = $db_Full->select_sql("INSERT INTO  tbl_seo VALUES (".$_POST['titulo_seo']."' , '".$_POST['keywords_seo']."' , '".$_POST['descripcion_seo']."')");
			$id_seo=mysqli_insert_id();
		}
		else{
			$id_seo=0;
		}

		echo $id_seo;

$query_id = $db_Full->select_sql("INSERT INTO  tbl_productos VALUES ('','".$_POST['titulo']."' , '".$_POST['url']."' , '".$_POST['precio']."' , '".$_POST['descripcion']."' , '".$_POST['codigo']."' , '".$_POST['tipo']."' , '".$name_pfd1[0].'.'.$ext1."' ,'".$_POST['precio_oferta']."' ,'".$_POST['oferta']."' , 0 , '".$name_pfd2[0].'.'.$ext2."' , '".$name_pfd3[0].'.'.$ext3."' , '".$name_pfd4[0].'.'.$ext4."' , '".$name_pfd5[0].'.'.$ext5."' , '".$name_pfd6[0].'.'.$ext6."' , '".$name_pfd7[0].'.'.$ext7."','".$id_seo."' )");

		$query = $db_Full->select_sql("INSERT INTO  tbl_page (titulo_page_tbl,url_page_tbl,estado_page_tbl,plantilla_page_tbl,tipo_url_page,visible_page,fk_id_menu,id_tabla_page_tbl) VALUES ('".$_POST['titulo']."'), '".$_POST['url']."'",'a','detalle_producto','i','0',7,$query_id);
		//ultimo id de producto
		$query1 = $db_Full->select_sql("SELECT MAX(id_producto) AS 'idprod' FROM tbl_productos");
        $row1   = mysqli_fetch_assoc($query1);
		$idprod=$row1['idprod'];
		//registra marca en producto
		$query2= $db_Full->select_sql("INSERT INTO tbl_productos_marcas VALUES ('','".$idprod."' , '".$_POST['marca']."' , '".$_POST['tipo']."') ");
		//registrando fecha de registro del poducto
		$fechaactual=date("Y/m/d");
		$query3= $db_Full->select_sql("INSERT INTO tbl_fecha_registro_producto VALUES ('','".$idprod."' , '".$fechaactual."') ");

		//registrando tipo persona
		$query4= $db_Full->select_sql("INSERT INTO tbl_producto_persona VALUES ('','".$idprod."' ,  '".$_POST['tipopersona']."' ) ");

		location("productos");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	    // }

	}


	public function editProductos(){
		$db_Full = new db_model(); $db_Full->conectar();
			$sqls1 = "SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
			$querys1 = $db_Full->select_sql($sqls1);
		    $obj =  new Producto($_GET['id']);

		//Lista marcas
		$query3     = $db_Full->select_sql("SELECT * FROM tbl_marcas");
		//lista marca de productos
		$query4     = $db_Full->select_sql("SELECT * FROM tbl_productos_marcas WHERE fkproducto_productos_marcas=".$_GET['id']." ");
		$row4       =  mysqli_fetch_assoc($query4);
		$marca_prod = $row4['fkmarca_productos_marcas'];
		//Lista Tipo persona
		$query6     = $db_Full->select_sql("SELECT * FROM tbl_tipo_persona");
		//lista Tipo persona de producto
		$query5     = $db_Full->select_sql("SELECT * FROM tbl_producto_persona WHERE id_producto=".$_GET['id']." ");
		$row5       = mysqli_fetch_assoc($query5);
		$tipoprsona = $row5['id_tipo_persona'];

		?>



<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var precio = document.clientes.elements['precio'];
	var codigo = document.clientes.elements['codigo'];
	var marca = document.clientes.elements['marca'];

	var tipo = document.clientes.elements['tipo'];
	var descripcion = document.clientes.elements['descripcion'];

	if(titulo.value == ""){
		alert("Ingrese Título del Producto");
		titulo.focus();
		return false;
	}


	if(precio.value == ""){
		alert("Ingrese precio del Producto");
		precio.focus();
		return false;
	}

	if(codigo.value == ""){
		alert("Ingrese código del Producto");
		codigo.focus();
		return false;
	}


	if(tipo.value == ""){
		alert("Ingrese Tipo de Prenda");
		tipo.focus();
		return false;
	}

	if(marca.value == ""){
		alert("Ingrese Marca");
		marca.focus();
		return false;
	}




	if(descripcion.value == ""){
		alert("Ingrese descripción del Producto");
		descripcion.focus();
		return false;
	}





	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="productos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR PRODUCTOS
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
				                  <textarea class="form-control" name="descripcion_seo" placeholder="Descripción del producto SEO" value="<?php echo $obj->__get('description_seo'); ?>"></textarea>
				                </div>
				              </div>
		              </div>
                </div>
                <div class="form-group">
	                <label class="col-sm-2 control-label">Título Producto</label>
	                <div class="col-sm-10">
	                  <input type="text" name="titulo" value="<?php echo $obj->__get('_titulo'); ?>"  class="form-control titulo_subseo generar_url" />
	                </div>
                </div>

                <div class="form-group">
	                <label class="col-sm-2 control-label">Url</label>
	                <div class="col-sm-10">
	                  <?php 
	                  	$id_tipo_prenda = $obj->__get('_fktipo');
	                  	$result_page = $db_Full->select_sql("select url_page_tbl from tbl_tipos where id_tipo=".$id_tipo_prenda);
	                  	$row_tipo = mysqli_fetch_assoc($result_page);
	                  ?>
	                  <input type="hidden" class="ini_url" value="<?php echo $row_tipo['url_page_tbl'];?>/">
	                  <input type="text" name="m_url"  class="form-control mostrar_url" disabled="disabled" value="<?php echo $obj->__get('url_page_tbl')?>" />
	                  <input type="hidden" name="url"  class="form-control mostrar_url" value="<?php echo $obj->__get('url_page_tbl')?>" />
	                </div>
                </div> 
                <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Moneda</label>
	                <div class="col-sm-10">
		                  <select name="tipo_moneda">
		                  	<?php $query1 = $db_Full->select_sql("SELECT id_tipo_cambio,nombre_moneda FROM tbl_tipo_cambio");
		        				  //$row1   = $query1->VerRegistro();
		        				  while ($row1   =  mysqli_fetch_assoc($query1)){
		        				  	$select = ($row1['id_tipo_cambio']==$obj->__get('fk_id_tipo_cambio'))?'selected':'';
		        				  	echo '<option value="'.$row1['id_tipo_cambio'].'" '.$select.'>'.$row1['nombre_moneda'].'</option>';
		        				  }
		        			?>
		                  </select>
	                </div>
                </div>

	            <div class="form-group">
	                <label class="col-sm-2 control-label">Precio</label>
	                <div class="col-sm-10">
	                  <input type="text" name="precio" value="<?php echo $obj->__get('_precio'); ?>"  class="form-control" />
	                </div>
	            </div>

	            <div class="form-group">
	                <label class="col-sm-2 control-label">¿Es oferta?</label>
	                <div class="col-sm-2">
	                  <input type="checkbox" name="oferta_producto" value="si" <?php if($obj->__get('_oferta') == 'si'){ echo 'checked';}else{ echo '';}?> class="form-control" />
	                </div>
	            </div>

	           <!-- <div class="form-group">
	                <label class="col-sm-2 control-label">Precio Oferta</label>
	                <div class="col-sm-10">
	                  <input type="text" name="precio_oferta_producto" value="<?php echo $obj->__get('_precio_oferta'); ?>"  class="form-control" />
	                </div>
	            </div>-->

	            <div class="form-group">
	                <label class="col-sm-2 control-label">Código</label>
	                <div class="col-sm-10">
	                  <input type="text" name="codigo" value="<?php echo $obj->__get('_codigo'); ?>" class="form-control" />
	                </div>
	            </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Prenda</label>
                <div class="col-sm-10">
                   <select class="form-control" id="tipo"  name="tipo">
						<?php while($rows1 =  mysqli_fetch_assoc($querys1)){?>
                        <option value='<?php echo $rows1['id_tipo'] ?>' <?php if($obj->__get('_fktipo')==$rows1['id_tipo']){ echo "selected"; } ?>><?php echo $rows1['nombre_tipo'] ?></option>
                        <?php }; ?>
					</select>
                 </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Marca del Producto</label>
                <div class="col-sm-10">
                  <select class="form-control" id="marca"  name="marca">
					<option value=''> Seleccione Marca</option>
						<?php while($rows3 =   mysqli_fetch_assoc($query3)){?>
                        <option value='<?php echo $rows3['id_marca'] ?>'<?php if($marca_prod==$rows3['id_marca']){ echo "selected"; } ?> ><?php echo $rows3['nombre_marca'] ?></option>
                        <?php } ?>
					</select>
				</div>
				</div>

				<div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Persona</label>
                <div class="col-sm-10">
                  <select class="form-control" id="tipopersona"  name="tipopersona">
					<option value=''> Seleccione Tipo Persona</option>
						<?php while($rows6 =   mysqli_fetch_assoc($query6)){?>
                        <option value='<?php echo $rows6['id_tipo_persona'] ?>' <?php if($tipoprsona==$rows6['id_tipo_persona']){ echo "selected"; } ?>><?php echo utf8_encode($rows6['tipo_persona']); ?></option>
                        <?php } ?>
					</select>
				</div>
				</div>

				<div class="clearfix">	
					  <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
		                  <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">Descuento (%)</label>
		                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		                     <input type="number" name="descuento"  class="form-control" min="0" value="<?php echo $obj->__get('descuento_producto'); ?>" />
		                  </div>
		              </div>
		              <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
		                  <label class="col-xs-5 col-sm-5 col-md-5 col-lg-5 control-label">Periodo descuento</label>
		                  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		                     <input type="text" id="periodo_descuento" name="periodo_descuento"  class="form-control" value="<?php echo $obj->__get('periodo_descuento_prod'); ?>" />
		                  </div>
		              </div>
               </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen principal del producto</label>
                <div class="col-sm-10">
                  <div>	
                      <input type="file" name="imagen1" class=" form-control" />
                  </div>
                  <!-- <input type="file" name="imagen1" class="form-control" /> -->
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php }; ?>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto1')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto1') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>




              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto2')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto2') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>




              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto3')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto3') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto4')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto4') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto5')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto5') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen7" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1050x1136px
                  </div>

                  <?php
				  if($obj->__get('_foto6')!=".")
				   {
				   ?>
                   <br>
                  <img style="width:20%;" src="../webroot/archivos/<?php echo $obj->__get('_foto6') ?>"  >
                  <?php
				   }else{
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php };?>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control" ><?php echo $obj->__get('_descripcion'); ?></textarea>
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

	public function updateProductos()
	{	$db_Full = new db_model(); $db_Full->conectar();

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
			$update1 = " foto_producto = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update1." WHERE id_producto = '".$_GET['id']."' ");
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
			$update2 = " foto1_producto = '".$name_pfd2[0].'.'.$ext2."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update2." WHERE id_producto = '".$_GET['id']."' ");
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
			$update3 = " foto2_producto = '".$name_pfd3[0].'.'.$ext3."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update3." WHERE id_producto = '".$_GET['id']."' ");
		}


		if(isset($_FILES['imagen4']) && ($_FILES['imagen4']['name'] != ""))
		{
			$destino4 = "../webroot/archivos/";
			$name4 = strtolower(date("ymdhis").$_FILES['imagen4']['name']);
			$temp4 = $_FILES['imagen4']['tmp_name'];
			$type4 = $_FILES['imagen4']['type'];
			$size4 = $_FILES['imagen4']['size'];
			$ext4 = end(explode(".", $name4));
			move_uploaded_file($temp4,$destino4.$name4);
			$name_pfd4 = explode(".",$name4);
			$update4 = " foto3_producto = '".$name_pfd4[0].'.'.$ext4."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update4." WHERE id_producto = '".$_GET['id']."' ");
		}



		if(isset($_FILES['imagen5']) && ($_FILES['imagen5']['name'] != ""))
		{
			$destino5 = "../webroot/archivos/";
			$name5 = strtolower(date("ymdhis").$_FILES['imagen5']['name']);
			$temp5 = $_FILES['imagen5']['tmp_name'];
			$type5 = $_FILES['imagen5']['type'];
			$size5 = $_FILES['imagen5']['size'];
			$ext5 = end(explode(".", $name5));
			move_uploaded_file($temp5,$destino5.$name5);
			$name_pfd5 = explode(".",$name5);
			$update5 = " foto4_producto = '".$name_pfd5[0].'.'.$ext5."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update5." WHERE id_producto = '".$_GET['id']."' ");
		}



		if(isset($_FILES['imagen6']) && ($_FILES['imagen6']['name'] != ""))
		{
			$destino6 = "../webroot/archivos/";
			$name6 = strtolower(date("ymdhis").$_FILES['imagen6']['name']);
			$temp6 = $_FILES['imagen6']['tmp_name'];
			$type6 = $_FILES['imagen6']['type'];
			$size6 = $_FILES['imagen6']['size'];
			$ext6 = end(explode(".", $name6));
			move_uploaded_file($temp6,$destino6.$name6);
			$name_pfd6 = explode(".",$name6);
			$update6 = " foto5_producto = '".$name_pfd6[0].'.'.$ext6."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update6." WHERE id_producto = '".$_GET['id']."' ");
		}



		if(isset($_FILES['imagen7']) && ($_FILES['imagen7']['name'] != ""))
		{
			$destino7 = "../webroot/archivos/";
			$name7 = strtolower(date("ymdhis").$_FILES['imagen7']['name']);
			$temp7 = $_FILES['imagen7']['tmp_name'];
			$type7 = $_FILES['imagen7']['type'];
			$size7 = $_FILES['imagen7']['size'];
			$ext7 = end(explode(".", $name7));
			move_uploaded_file($temp7,$destino7.$name7);
			$name_pfd7 = explode(".",$name7);
			$update7 = " foto6_producto = '".$name_pfd7[0].'.'.$ext7."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_productos SET ".$update7." WHERE id_producto = '".$_GET['id']."' ");
		}



		$query = $db_Full->select_sql("UPDATE tbl_productos_marcas SET fkmarca_productos_marcas='".$_POST['marca']."'
			                                               , fktipo_productos_marcas='".$_POST['tipo']."'
														   WHERE fkproducto_productos_marcas = '".$_GET['id']."'");

		$query1 = $db_Full->select_sql("UPDATE tbl_producto_persona SET id_tipo_persona='".$_POST['tipopersona']."'
														   WHERE id_producto = '".$_GET['id']."'");

		
		$query__ = $db_Full->select_sql("UPDATE  tbl_productos 
									     SET titulo_producto='".$_POST['titulo']."',
							                 precio_producto='".$_POST['precio']."',
							                 descuento_producto='".$_POST['descuento']."',

							                 
											descripcion_producto='".$_POST['descripcion']."',
							                url_page_tbl='".$_POST['url']."',
											codigo_producto='".$_POST['codigo']."',
											fktipo_producto='".$_POST['tipo']."',
											precio_oferta_producto='".$_POST['precio_oferta_producto']."',
											oferta_producto='".$_POST['oferta_producto']."'
											WHERE id_producto = '".$_GET['id']."' ");

		
	
		//include("model_productos"); 
			
		$query_tabla = $db_Full->select_sql("select id_producto,url_page_tbl,_id_seo from tbl_productos where id_producto = ".$_GET['id'].""); 
		
		$row_m = mysqli_fetch_assoc($query_tabla);
		
		if(mysqli_num_rows($query_tabla) == 0){ 

			if(empty($row_m['url_page_tbl']) || $row_m['_id_seo'] == 0){  //echo "entró";exit;
			 	$seo = array(
			    				"title_seo"         => $_POST['titulo_seo'],
			    				"keywords_seo"      => $_POST['keywords_seo'],
			    				"description_seo"   => $_POST['descripcion_seo']
			    			);

				$id_seo = $db_Full->insert_table("tbl_seo",$seo); //echo $id_seo; exit;
				/*if($id_seo == false) {
				    throw new Exception($mensajes['seo']);
				}*/
				$page_tbl = array(
			        				   "titulo_page_tbl"    => $_POST['titulo'],
			        				   "url_page_tbl"       => $_POST['url'],
			        				   "plantilla_page_tbl" => "detalle_producto",
			        				   "estado_page_tbl"    => "a",
			        				   "orden_page_tbl"     => 0,
			        				   "tabla_page_tbl"     => "tbl_productos",
			        				   "id_tabla_page_tbl"  => $_GET['id'],
			        				   "fk_id_seo" 		    => $id_seo,
			        				   "fk_id_menu"         => 7
			        			  );

			    $idPage = $db_Full->insert_table("tbl_page",$page_tbl);

			    
			    
			}
				
		}
		else{ //echo 'siiiiiii';exit;
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
					/*if($id_seo == false) {
				            throw new Exception($mensajes['seo']);
				    }*/
		        /**************************************************************************/	
			        $page_tbl = array(
			        				   "titulo_page_tbl"    => $_POST['titulo'],
			        				   "url_page_tbl"       => $_POST['url'],
			        				   "plantilla_page_tbl" => "detalle_producto",
			        				   "estado_page_tbl"    => "a",
			        				   "orden_page_tbl"     => 0,
			        				   "tabla_page_tbl"     => "tbl_productos",
			        				   "id_tabla_page_tbl"  => $_GET['id'],
			        				   "fk_id_seo" 		    => $id_seo,
			        				   "fk_id_menu"         => 7
			        			     );

			        $where = array(
			        				"id_tabla_page_tbl"    => $_GET['id'],
			        				"tabla_page_tbl"       =>"'tbl_productos'",
			        				"plantilla_page_tbl"   =>"'detalle_producto'"

			        			  );

			        $idPage = $db_Full->update_table("tbl_page",$page_tbl,$where);
			        
		   	}
		

		location("productos");


	}



	public function deleteProductos()
	{	//elimina producto
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE FROM tbl_productos WHERE id_producto = '".$_GET['id']."'");
		//elimina marca del producto
		$query2 = $db_Full->select_sql("DELETE FROM tbl_productos_marcas WHERE fkproducto_productos_marcas = '".$_GET['id']."'");
		//elimina fecha de registro de producto
		$query4 = $db_Full->select_sql("DELETE FROM tbl_fecha_registro_producto WHERE id_producto = '".$_GET['id']."'");
		//elimina tipo persona
		$query3 = $db_Full->select_sql("DELETE FROM tbl_producto_persona WHERE id_producto = '".$_GET['id']."'");
		
		$query5 = $db_Full->select_sql("DELETE FROM tbl_page WHERE tabla_page_tbl = 'tbl_productos' and plantilla_page_tbl = 'detalle_producto' and id_tabla_page_tbl = '".$_GET['id']."'");
		location("productos");
	}



	

	public function listProductos(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos WHERE id_tipo=fktipo_producto limit 0,10");

		?>

    <script>
		function mantenimientos(url,id,opcion){
			if(opcion!="delete"){
				location.replace(url+'?action='+opcion+'&id='+id);
			}else if(opcion=="delete"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'?action='+opcion+'&id='+id);
				}
			}
	    } 
	</script>

    <a href="productos?action=new" class="btn btn-default btn-block">NUEVO PRODUCTO</a>
<br>




<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th>Producto</th>
                <th>Tipo de Prenda</th>
                <!--<th>Asignar Marcas</th>-->
                <th>Asignar Categorías</th>
                <th>Asignar Filtros</th>
                <th>Agregar Fotos</th>
                <th>Agregar Características</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr class="gradeX">

                    <td ><?php echo $row['titulo_producto']; ?></td>
                    <td ><?php echo $row['nombre_tipo']; ?></td>
                    <!--<td>
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#Moda<?php //echo $row['id_producto']; ?>">ASIGNAR MARCAS</a>



                           Modal
                            <div class="modal fade" id="Moda<?php //echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">ASIGNAR MARCAS A : <?php //echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="productos_marcas?id_producto=<?php //echo $row['id_producto'] ?>&id_tipo=<?php //echo $row['fktipo_producto'] ?>&action=marcas" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                           End Moda Code

                    </td>-->



                    <td>
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#myModal<?php echo $row['id_producto']; ?>">ASIGNAR CATEGORÍAS</a>



                           <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">ASIGNAR CATEGORÍAS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="productos_categorias?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=categorias" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
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
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#Modal<?php echo $row['id_producto']; ?>">ASIGNAR FILTROS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">ASIGNAR FILTROS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="productos_filtros?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=filtros" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
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
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#Modal_foto<?php echo $row['id_producto']; ?>">AGREGAR FOTOS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal_foto<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR FOTOS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="productos_fotos?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=fotos" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
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
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#Modal_cara<?php echo $row['id_producto']; ?>">AGREGAR CARACTERÍSTICAS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal_cara<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR CARACTERÍSTICAS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="productos_caracteristicas?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=caracteristicas" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
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
                    	<a class="btn btn-default btn-block"  href="productos?id=<?php echo $row['id_producto'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick="mantenimientos('productos',<?php echo $row['id_producto'] ?>,'delete');">ELIMINAR</a>
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

        <?php

	}









	public function marcasProductos()
	{
		$db_Full = new db_model(); $db_Full->conectar();
		/*$query = $db_Full->select_sql("select  * FROM tbl_productos_marcas,tbl_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=".$_GET['id_producto']." ");*/
		$query = $db_Full->select_sql("SELECT * FROM tbl_productos_marcas pm
			INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca
			WHERE pm.fkproducto_productos_marcas=".$_GET['id_producto']." ");

		/*$sqls1 = " SELECT * FROM tbl_tipos_marcas,tbl_marcas where fkmarcas_tipos_marcas=id_marca and fktipos_tipos_marcas=".$_GET['id_tipo']." ";*/
		//Consulta para listar las marcas
		$sqls1 = "SELECT * FROM tbl_marcas";
		$querys1 = $db_Full->select_sql($sqls1);

	?>




<script>

function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_productos_marcas"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_productos_marcas"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }

function validando_clientes(opcion, id){
	var marca = document.clientes.elements['marca'];


	if(marca.value == ""){
		alert("Ingrese Marca");
		marca.focus();
		return false;
	}


	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



<div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

			  <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Marca</label>
                <div class="col-sm-10">
                  <select class="form-control" id="marca"  name="marca">
					<option value=''> Seleccione Marca</option>
						<?php while($rows1 =   mysqli_fetch_assoc($querys1)){?>
                        <option value='<?php echo $rows1['id_marca'] ?>'><?php echo $rows1['nombre_marca'] ?></option>
                        <?php } ?>
					</select>

                  <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto"  class="form-control" />
                  <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />
                </div>
              </div>

              <input type="submit" onclick="return validando_clientes('add_producto_marcas','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>


  <!-- End Row -->




   <br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Marcas
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th  >Marca</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row =   mysqli_fetch_assoc($query))
			{

			?>

            <tr class="gradeX">

                    <td ><?php echo $row['nombre_marca']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos_marcas?id_producto=<?php echo $_GET['id_producto'];?>&id_tipo=<?php echo $_GET['id_tipo'];?>",<?php echo $row['id_productos_marcas'] ?>,"delete_productos_marcas")>ELIMINAR</a>
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


    <?php
	}









	public function add_producto_marcasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar();
        $query = $db_Full->select_sql("SELECT fkmarca_productos_marcas from  tbl_productos_marcas  where fkmarca_productos_marcas='".$_POST['marca']."' and fktipo_productos_marcas='".$_POST['id_tipo']."' and fkproducto_productos_marcas='".$_POST['id_producto']."' ");
        $row   =  mysqli_fetch_assoc($query );
		$marca=$row['fkmarca_productos_marcas'];

		// if($marca=="")
		// {
			$query = $db_Full->select_sql("INSERT INTO  tbl_productos_marcas VALUES ('', '".$_POST['id_producto']."' , '".$_POST['marca']."' , '".$_POST['id_tipo']."' )");
		// }else
		// {
		// 	echo '<script>alert("Estos datos ya existen");</script>';
	    // }

		location("productos_marcas?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=marcas");

	}





	public function delete_productos_marcasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_marcas WHERE id_productos_marcas = '".$_GET['id']."'");
		location("productos_marcas?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=marcas");
	}








	public function categoriasProductos()
	{
       $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos_categorias,tbl_categorias where fkcategoria_productos_categorias=id_cate and fkproducto_productos_categorias=".$_GET['id_producto']." ");

	    $sqls1 = " SELECT * FROM tbl_categorias where fktipo_cate=".$_GET['id_tipo']." and tipo_categoria<>'descue' ";
		$querys1 = $db_Full->select_sql($sqls1);
		
	?>




<script>
function change_combo_ajax(THIS,lista){
	var option = $(THIS).val();
	var option_data =$(THIS).attr('data').val();

	$.ajax({
	         url:'gestion-consultas',
	         type:'POST',
	         data:{
	                option:option,
	                option_data:option_data,
	                option_consulta: 'combo_categoria'
	         },
	         success:function(data){
	         	console.log(data);
	            $("#"+"lista").html(data);
	         }
     });
	//categoria
}
function mantenimiento(url,id,opcion)
		{	console.log(opcion);
			if(opcion != "delete_productos_categorias"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion == "delete_productos_categorias"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }


function validando_clientes(opcion, id){
	var categoria    = document.clientes.elements['categoria'];
	var subcategoria = document.clientes.elements['subcategoria'];

	if(categoria.value == ""){
		alert("Ingrese Categoría");
		categoria.focus();
		return false;
	}


	if(subcategoria.value == ""){
		alert("Ingrese SubCategoría");
		subcategoria.focus();
		return false;
	}


	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



<div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

			  <div class="form-group" style="margin:0px" >
                <label class="col-sm-3 control-label">Categoría</label>
                <div class="col-sm-8">
                  <select class="form-control" id="categoria"  name="categoria" >
					<option value=''>Seleccione Categoría</option>
						<?php while($rows1 =mysqli_fetch_assoc( $querys1)){?>
                        <option value='<?php echo $rows1['id_cate'] ?>' data="<?php echo $rows1['tipo_categoria'] ?>"><?php echo $rows1['nombre_cate'] ?></option>
                        <?php } ?>
					</select>

                  <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto"  class="form-control" />
                  <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />
                </div>
              </div>


              <br>

               <div class="form-group" style="margin:0px">
                 <label class="col-sm-3 control-label">SubCategoría</label>
                 <div class="col-sm-8">
                  <select class="form-control" id="subcategoria"  name="subcategoria">
				  </select>
                 </div>
               </div>


              <input type="submit" onclick="return validando_clientes('add_producto_categorias','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>


  <!-- End Row -->




   <br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Categorías
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
                <tr>
	                <th>Categoría</th>
	                <th>SubCategoría</th>
	                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			$query3 = $db_Full->select_sql("SELECT nombre_item_categoria from tbl_productos_categorias,tbl_items_categoria  where id_item_categoria=fksubcategoria_productos_categorias and fksubcategoria_productos_categorias='".$row['fksubcategoria_productos_categorias']."'  ");
			$row3   = mysqli_fetch_assoc($query3);
			$subcategoria=$row3['nombre_item_categoria'];

			?>

            <tr class="gradeX">
					<td ><?php echo $row['nombre_cate']; ?></td>
                    <td ><?php echo $subcategoria; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos_categorias?id_producto=<?php echo $_GET['id_producto'];?>&id_tipo=<?php echo $_GET['id_tipo'];?>",<?php echo $row['id_productos_categorias'] ?>,"delete_productos_categorias")>ELIMINAR</a>
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


    <?php
	}









	public function add_producto_categoriasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar(); 
        $query = $db_Full->select_sql("SELECT fkcategoria_productos_categorias from tbl_productos_categorias where fkproducto_productos_categorias='".$_POST['id_producto']."' and fkcategoria_productos_categorias='".$_POST['categoria']."' and 	fktipo_productos_categorias='".$_POST['id_tipo']."'  and  fksubcategoria_productos_categorias='".$_POST['subcategoria']."' ");
        $row   = mysqli_fetch_assoc($query);
		$sub=$row['fkcategoria_productos_categorias'];

		if($sub=="")
		{
		$query = $db_Full->select_sql("INSERT INTO  tbl_productos_categorias  VALUES ('', '".$_POST['id_producto']."' , '".$_POST['categoria']."' , '".$_POST['subcategoria']."' , '".$_POST['id_tipo']."' )");
		 }else
		{
			echo '<script>alert("Estos datos ya existen");</script>';
	    }

		location("productos_categorias?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=categorias");

	}





	public function delete_productos_categoriasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar(); 
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_categorias WHERE id_productos_categorias='".$_GET['id']."' ");
		location("productos_categorias?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=categorias");
	}











	public function filtrosProductos()
	{$db_Full = new db_model(); $db_Full->conectar(); 

		$query = $db_Full->select_sql("select * FROM tbl_productos_filtros,tbl_filtros where fkfiltro_productos_filtros=id_filtro and fkproducto_productos_filtros=".$_GET['id_producto']." ");

	    $sqls1 = " SELECT * FROM tbl_filtros where 	fktipo_filtro=".$_GET['id_tipo']."  ";
		$querys1 = $db_Full->select_sql($sqls1);

	?>




<script>


function imagenes_filtro()
{
	
	filtro_text = $( "#filtro option:selected" ).html();

	if(filtro_text=="Color")
	{
		$('#imagen1_filtro').css("display","block");
		$('#imagen2_filtro').css("display","block");
	}else
	{
		$('#imagen1_filtro').css("display","none");
		$('#imagen2_filtro').css("display","none");

	}
}

function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_productos_filtros"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_productos_filtros"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }


function validando_clientes(opcion, id){
	var filtro = document.clientes.elements['filtro'];
	var items = document.clientes.elements['item'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];

	if(filtro.value == ""){
		alert("Ingrese Filtro");
		filtro.focus();
		return false;
	}


	if(item.value == ""){
		alert("Ingrese Items");
		item.focus();
		return false;
	}

	

	filtro_text = $( "#filtro option:selected" ).html();

	if(filtro_text=="Color")
	{
		if(imagen1.value == "")
		{
			alert("Ingrese imagen");
			imagen1.focus();
			return false;
		}

		if(imagen2.value == "")
		{
			alert("Ingrese imagen");
			imagen2.focus();
			return false;
		}

	}

	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



<div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

			  <div class="form-group" style="margin:0px" >
                <label class="col-sm-3 control-label">Filtro</label>
                <div class="col-sm-8">
                  <select class="form-control" id="filtro"  name="filtro" onchange="imagenes_filtro()">
					<option value=''>Seleccione Filtro</option>
						<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
                        <option value='<?php echo $rows1['id_filtro'] ?>'><?php echo $rows1['nombre_filtro'] ?></option>
                        <?php } ?>
					</select>

                  <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto"  class="form-control" />
                  <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />
                </div>
              </div>

             <br>
               <div class="form-group" style="margin:0px">
                    <label class="col-sm-3 control-label">Copia de categoría</label>
                    <div class="col-sm-8">
                        <select name="copia_categoria" id="copia_categoria">
                          <option value="0">No</option>
                          <?php 
                                $db_Full          = new db_model(); $db_Full->conectar();
                                $query_categorias = $db_Full->select_sql("SELECT id_cate,nombre_cate FROM tbl_categorias 
                                                                          WHERE fktipo_cate =".$_GET['id_tipo']);

                                if(mysqli_num_rows($query_categorias)){
                                    while($row = mysqli_fetch_assoc($query_categorias)){
                                      echo '<option value="'.$row['id_cate'].'">'.$row['nombre_cate'].'</option>';
                                    }
                                }
                          ?>
                        </select>
                    </div>
                </div>
                

                <br>

               <div class="form-group" style="margin:0px">
                 <label class="col-sm-3 control-label">Items</label>
                 <div class="col-sm-8">
                  <select class="form-control" id="item"  name="item">
				  </select>
                 </div>
               </div>

               <br>



                <div class="form-group" id="imagen1_filtro" style="margin:0px; display: none;">
                <label class="col-sm-3 control-label">Imagen del Item (Sólo para colores)</label>
                <div class="col-sm-8">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 70x70px en formato .png
                  </div>

                </div>
              </div>


                <br>

                <div class="form-group" id="imagen2_filtro" style="margin:0px; display: none;">
                <label class="col-sm-3 control-label">Imagen del Item (Sólo para colores)</label>
                <div class="col-sm-8">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 240x240px en formato .png
                  </div>

                </div>
              </div>


               



              <input type="submit" onclick="return validando_clientes('add_producto_filtros','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>


  <!-- End Row -->




   <br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Filtros
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th >Filtro</th>
                <th >Item</th>
                <th >Imagen</th>
                <th >Imagen Venta</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

				if($row['condicional_productos_filtro']=="0")
				{	
					$query3 = $db_Full->select_sql("SELECT nombre_item_filtro from tbl_productos_filtros,tbl_items_filtro  where id_item_filtro=fksubfiltro_productos_filtros and fksubfiltro_productos_filtros='".$row['fksubfiltro_productos_filtros']."'  ");
					$row3   = mysqli_fetch_assoc($query3);
					$subfiltro=$row3['nombre_item_filtro'];
				}else
				{
					$query3 = $db_Full->select_sql(" SELECT nombre_item_categoria from tbl_items_categoria  where id_item_categoria	='".$row['fksubfiltro_productos_filtros']."'  ");
					$row3   = mysqli_fetch_assoc($query3);
					$subfiltro=$row3['nombre_item_categoria'];
				}

			?>

            <tr class="gradeX">
					<td ><?php echo $row['nombre_filtro']; ?></td>
                    <td ><?php echo $subfiltro; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['foto_productos_filtros']!="." )
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_productos_filtros'] ?>" width="100"  >
						  <?php
						   }else if($row['nombre_filtro']!="Talla")
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						   }
						  ?>
                    </td>


                    <td valign="top" >
                    	  <?php
						  if($row['foto2_productos_filtros']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto2_productos_filtros'] ?>" width="100"  >
						  <?php
						   }else if($row['nombre_filtro']!="Talla")
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						   }
						  ?>
                    </td>


                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos_filtros?id_producto=<?php echo $_GET['id_producto'];?>&id_tipo=<?php echo $_GET['id_tipo'];?>",<?php echo $row['id_producto_filtros'] ?>,"delete_productos_filtros")>ELIMINAR</a>
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


    <?php
	}









	public function add_producto_filtrosProductos()
	{   
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


        $query = $db_Full->select_sql("SELECT fkproducto_productos_filtros from tbl_productos_filtros where fkproducto_productos_filtros='".$_POST['id_producto']."' and fkfiltro_productos_filtros='".$_POST['filtro']."' and 	fktipo_productos_filtros='".$_POST['id_tipo']."'  and  fksubfiltro_productos_filtros='".$_POST['item']."' ");
        $row   = mysqli_fetch_assoc($query);
		$sub=$row['fkproducto_productos_filtros'];

		if($sub=="")
		{

			if($_POST['copia_categoria']=="0")
			{
				$copia=0;
			}else
			{
				$copia=1;
			}

			$query = $db_Full->select_sql("INSERT INTO  tbl_productos_filtros  VALUES ('', '".$_POST['id_producto']."' , '".$_POST['filtro']."' , '".$_POST['item']."' , '".$_POST['id_tipo']."' , '".$name_pfd1[0].'.'.$ext1."' , '".$name_pfd2[0].'.'.$ext2."' , '".$copia."' )");
			location("productos_filtros?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=filtros");
		}else{
			echo '<script>alert("Estos datos ya existen");</script>';
			location("productos_filtros?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=filtros");
	    }



	}





	public function delete_productos_filtrosProductos()
	{   $db_Full = new db_model(); $db_Full->conectar(); 
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_filtros WHERE 	id_producto_filtros='".$_GET['id']."' ");
		location("productos_filtros?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=filtros");
	}







	public function fotosProductos()
	{
        $db_Full = new db_model(); $db_Full->conectar(); 
		$query = $db_Full->select_sql("select  * FROM tbl_productos_fotos where	fkproducto_productos_fotos=".$_GET['id_producto']." order by 	orden_productos_fotos asc ");


	?>




<script>

function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_productos_fotos"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_productos_fotos"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}

	    }


function validando_clientes(opcion, id){
	var imagen1 = document.clientes.elements['imagen1'];

	if(imagen1.value == ""){
		alert("Ingrese Foto");
		imagen1.focus();
		return false;
	}



	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



<div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

			  <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Imagen del Producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1051x1078 px
                  </div>

                </div>
              </div>

             <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto"  class="form-control" />
             <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />

             <input type="submit" onclick="return validando_clientes('add_producto_fotos','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>


  <!-- End Row -->




   <br>

<style>
#listadoul .handle {
	cursor:move;
	}
</style>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Fotos
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                <th></th>
				<th>Foto</th>
				<!--<th>Editar</th>-->
                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		    ?>
            <tr id="list_item_<?php echo $row['id_productos_fotos']."|productos|".$_GET['id_producto']; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
					<td>
                          <?php
						  if($row['nombre_productos_fotos']!=".")
						  {
						  ?>
						  <img src="../webroot/archivos/<?php echo $row['nombre_productos_fotos'] ?>" width="200"  >
						  <?php
						  }else
						  {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						  }
						  ?>
                    </td>
                    <!--<td>
                    	<a class="btn btn-default btn-block" href="productos_fotos?id_producto=<?php //echo $_GET['id_producto'];?>&id_tipo=<?php //echo $_GET['id_tipo'];?>&id_producto=<?php// echo $row['id_productos_fotos']; ?>&action=edit_producto_fotos">EDITAR</a>
                    </td>-->
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos_fotos?id_producto=<?php echo $_GET['id_producto'];?>&id_tipo=<?php echo $_GET['id_tipo'];?>",<?php echo $row['id_productos_fotos'] ?>,"delete_productos_fotos")>ELIMINAR</a>
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

					  $.get("ajax?"+order,{action:'ordenarFotoProducto'},function(data){

					});
				  }
				});

			});
			</script>


    <?php
	}









	public function add_producto_fotosProductos()
	{   $db_Full = new db_model(); $db_Full->conectar(); 

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

		$query = $db_Full->select_sql("INSERT INTO  tbl_productos_fotos VALUES ('', '".$_POST['id_producto']."' , '".$name_pfd1[0].'.'.$ext1."' , '' )");


		location("productos_fotos?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=fotos");

	}





	public function delete_productos_fotosProductos()
	{   $db_Full = new db_model(); $db_Full->conectar(); 
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_fotos WHERE id_productos_fotos='".$_GET['id']."' ");
		location("productos_fotos?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=fotos");
	}


















	public function caracteristicasProductos()
	{
        $db_Full = new db_model(); $db_Full->conectar(); 
		$query = $db_Full->select_sql("select  * FROM tbl_productos_caracteristicas where fkproducto_cara=".$_GET['id_producto']." order by orden_cara asc ");


	?>




<script>

function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_productos_caracteristicas"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_productos_caracteristicas"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }

function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];


	if(titulo.value == ""){
		alert("Ingrese Título");
		titulo.focus();
		return false;
	}





	document.clientes.action="productos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



<div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control" />
                </div>
              </div>

              <br>

              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Detalle</label>
                <div class="col-sm-10">
                  <input type="text" name="detalle"  class="form-control" />
                </div>
              </div>

              <br>

              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea name="descripcion"  class="form-control" ></textarea>
                </div>
              </div>

              <input type="hidden" value="<?php echo $_GET['id_producto']?>" name="id_producto"  class="form-control" />
              <input type="hidden" value="<?php echo $_GET['id_tipo']?>" name="id_tipo"  class="form-control" />


              <input type="submit" onclick="return validando_clientes('add_producto_caracteristicas','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">

        	</form>
      </div>

      </div>
    </div>


  <!-- End Row -->



  <style>
#listadoul .handle {
	cursor:move;
	}
</style>

   <br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Carcaterísticas
        </div>
        <div class="panel-body table-responsive">

            <table  class="table display">
            <thead>
               <tr>
                 <th></th>
                <th>Titulo</th>
                <th>Detalle</th>
                <th>Descripción</th>
                <!--<th>Editar</th>-->
                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

             <tr id="list_item_<?php echo $row['id_cara']."|caracteristicas|".$_GET['id_producto']; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
					<td ><?php echo $row['titulo_cara']; ?></td>
                    <td ><?php echo $row['detalle_cara']; ?></td>
                    <td ><?php echo $row['descripcion_cara']; ?></td>
                    <!--<td>
                    	<a class="btn btn-default btn-block" href="productos_caracteristicas?id=?id_producto=<?php //echo $_GET['id_producto'];?>&id_tipo=<?php //echo $_GET['id_tipo'];?>&action=edit_caracte">EDITAR</a>
                    </td>-->
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos_caracteristicas?id_producto=<?php echo $_GET['id_producto'];?>&id_tipo=<?php echo $_GET['id_tipo'];?>",<?php echo $row['id_cara'] ?>,"delete_productos_caracteristicas")>ELIMINAR</a>
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

		  $.get("ajax?"+order,{action:'ordenarCaracteristicas'},function(data){

		});
	  }
	});



});
			</script>


    <?php
	}




	public function getProductosId($id){
		$db_Full = new db_model(); $db_Full->conectar();
		$sql = "SELECT * FROM tbl_productos where id_producto=".$id."  ";
		$query = $db_Full->select_sql($sql);
		while ($row = $query -> VerRegistro()) {

			$data[] = array(
				          'id' =>$row['id_producto'],
			              'titulo' =>$row['titulo_producto'],
						  'precio' =>$row['precio_producto']
			              );

		}

		return $data;
	}


	public function edit_producto_caracteristicasProductos()
	{
        echo "hola";

	}


	public function add_producto_caracteristicasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar();
        $query = $db_Full->select_sql("INSERT INTO  tbl_productos_caracteristicas  VALUES ('', '".$_POST['titulo']."' , '".$_POST['detalle']."' , '".$_POST['descripcion']."' , '".$_POST['id_producto']."' , '0' )");

		location("productos_caracteristicas?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=caracteristicas");

	}





	public function delete_productos_caracteristicasProductos()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_caracteristicas WHERE id_cara = '".$_GET['id']."'");
		location("productos_caracteristicas?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=caracteristicas");
	}











public function ofertaProductos(){
	$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos,tbl_tipos WHERE oferta_producto='SI' and id_tipo=fktipo_producto order by orden_oferta_producto asc ");

		?>

         <script>
		function mantenimiento(url,id,opcion){
	if(opcion!="delete_oferta"){
		location.replace(url+'?action='+opcion+'&id='+id);
	}else if(opcion=="delete_oferta"){
		if(!confirm("Esta Seguro que desea Eliminar esta oferta")){
			return false;
		}else{
			location.replace(url+'?action='+opcion+'&id='+id);
		}
	}

} </script>




<style>
#listadoul .handle {
	cursor:move;
	}
</style>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos en oferta
        </div>
        <div class="panel-body table-responsive">

            <table  class="table display">
            <thead>
               <tr>
                <th  ></th>
                <th  >Producto</th>
                <th  >Tipo de Prenda</th>
                <th>Foto</th>
                <th  >Precio</th>
                <th  >Precio de Oferta</th>
                <th >Eliminar Oferta</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

              <tr id="list_item_<?php echo $row['id_producto']."|oferta"; ?>" >
					<td class="handle"><i class="fa fa-bars"></i></td>
                    <td ><?php echo $row['titulo_producto']; ?></td>
                    <td ><?php echo $row['nombre_tipo']; ?></td>

                     <td>
                     <?php
						  if($row['foto_producto']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="50"  >
						  <?php
						   }else
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						   }
						  ?>
                    </td>

                    <td ><?php echo $row['precio_producto']; ?></td>
                    <td ><?php echo $row['precio_oferta_producto']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("productos",<?php echo $row['id_producto'] ?>,"delete_oferta")>ELIMINAR OFERTA</a>
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

		  $.get("ajax?"+order,{action:'ordenarOferta'},function(data){

		});
	  }
	});



});
			</script>



        <?php

	}





	public function delete_ofertaProductos()
	{	$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("UPDATE  tbl_productos SET oferta_producto='NO'    WHERE id_producto = '".$_GET['id']."' ");
		location("productos?action=oferta");
	}



public function relacionarProductos()
{
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos,tbl_tipos WHERE  id_tipo=fktipo_producto  ");

		$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
		$querys1 = $db_Full->select_sql($sqls1);
		

		?>


<!-- Start Panel -->
<script>
function enviar_tipos(tipo)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_tipos",
                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
                  success: function(data)
                  {
                     $("#relacionar_productos").html(data);
                  }
            });

}

function enviar_combo(tipo)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_tipos_combobox",
                  data : "tipo="+$('#tipo').val(),
                  success: function(data)
                  {
                     $("#marca").html(data);
                  }
            });

}


function enviar_marcas(marcas)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_marcas",
                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
                  success: function(data)
                  {
                     $("#relacionar_productos").html(data);
                  }
            });

}
</script>
      <div id="row">
             <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Prenda</label>
	                <div class="col-sm-3">
	                  <select class="form-control required ini_url" id="tipo" onchange="enviar_tipos(this.value);enviar_combo(this.value);"  name="tipo">
						<option value="" data="">Seleccione Tipo</option>
							<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_tipo'] ?>' data="<?php echo $rows1['url_page_tbl'] ?>"><?php echo $rows1['nombre_tipo'] ?></option>
	                        <?php } ?>
						</select>
	                 </div>
              </div>

              <div class="form-group">
                	<label class="col-sm-2 control-label">Marca del Producto</label>
	                <div class="col-sm-3">
	                  <select class="form-control required" id="marca" name="marca" onchange="enviar_marcas(this.value);">
						
						</select>
					</div>
			  </div>

</div>
<br><br>

    <div class="col-md-12" >
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos para Relacionar
        </div>
        <div class="panel-body table-responsive" id="relacionar_productos">


            <table id="example1" class="table display">
            <thead>
               <tr>
                <th  >Producto</th>
                <th  >Tipo de Prenda</th>
                <th  >Foto</th>
                <th  >Precio</th>
                <th  >Precio Oferta</th>
                <th >Relacionar Productos</th>
                </tr>
              </thead>
              <tbody>
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

              <tr  >
					<td ><?php echo $row['titulo_producto']; ?></td>
                    <td ><?php echo $row['nombre_tipo']; ?></td>
                    <td>
                     <?php
						  if($row['foto_producto']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="50"  >
						  <?php
						   }else
						   {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						   }
						  ?>
                    </td>
                    <td ><?php echo $row['precio_producto']; ?></td>
                    <td ><?php echo $row['precio_oferta_producto']; ?></td>
                      <td>
                    	<a class="btn btn-default btn-block"  href="productos?id=<?php echo $row['id_producto'] ?>&action=relacionar_final">RELACIONAR PRODUCTOS</a>
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



     <?php
    }








	public function relacionar_finalProductos()
	{
		
    $db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_productos where id_producto!='".$_GET['id']."' order by id_producto asc";
    $query = $db_Full->select_sql($sql);
	$obj =  new Producto($_GET['id']);

	$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
	$querys1 = $db_Full->select_sql($sqls1);

	$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." ");
    $contador = mysqli_num_rows($validar_check); 
   
   ?>

		<script>

		var lista=new Array();	

		<?php
		while($row_check = mysqli_fetch_assoc($validar_check))
		{
				$lista_productos[]=$row_check['fkproducto2_re_pro'];
		?>	
				lista.push(<?php echo $row_check['fkproducto2_re_pro'];?>);
		<?php
		}
		?>

		function enviar_tipos_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_tipos_relacionar&id=<?php echo $_GET['id']; ?>",
		                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
		                  success: function(data)
		                  {
		                     $("#relacionar_productos").html(data);
		                  }
		            });

		}

		function enviar_combo_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_tipos_combobox",
		                  data : "tipo="+$('#tipo').val(),
		                  success: function(data)
		                  {
		                     $("#marca").html(data);
		                  }
		            });

		}




		function enviar_combo_categoria_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_categorias_combobox",
		                  data : "tipo="+$('#tipo').val(),
		                  success: function(data)
		                  {
		                     $("#categoria").html(data);
		                  }
		            });

		}


		function enviar_marcas_relacionar(marcas)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_marcas_relacionar&id=<?php echo $_GET['id']; ?>",
		                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
		                  success: function(data)
		                  {
		                     $("#relacionar_productos").html(data);
		                  }
		            });

		}
		</script>


  <a href="productos?action=relacionar" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
  	<table>
  	<tr>
  	    <td align="center">
  				   <?php
				   if($obj->__get('_foto')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>" width="50"  >
                  <?php
				   }else
				   {
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="50" >
				  <?php
                   }
				  ?>
  		</td>
  		<td width="10"></td>
  		<td align="center">El producto <B> <?PHP ECHO $obj->__get('_titulo'); ?> </B> se relacionará con :</td>
  	</tr>
  	</table>
  </div>
                   

 
<form name="f1" action="" method="post">

 <div id="row">
             <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Prenda</label>
	                <div class="col-sm-3">
	                  <select class="form-control required ini_url" id="tipo" onchange="enviar_tipos_relacionar(this.value);enviar_combo_relacionar(this.value);"  name="tipo">
						<option value="" data="">Seleccione Tipo</option>
							<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_tipo'] ?>' data="<?php echo $rows1['url_page_tbl'] ?>"><?php echo $rows1['nombre_tipo'] ?></option>
	                        <?php } ?>
						</select>
	                 </div>
              </div>

              <div class="form-group">
                	<label class="col-sm-2 control-label">Marca del Producto</label>
	                <div class="col-sm-3">
	                  <select class="form-control required" id="marca" name="marca" onchange="enviar_marcas_relacionar(this.value);">
					  </select>
					</div>
			  </div>


</div>
<br><br>


<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos a relacionar
        </div>
        <div class="panel-body table-responsive">




		
       <table  class="table display">
		  <tr bgcolor="#F2F2F2">
                 <td colspan="4" align="center"  style="padding-top:20px; padding-bottom:20px" >
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='productos?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 </td>
			  </tr>
    </table>

    	<div id="relacionar_productos">
    		<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  >Título</th>
                <th  >Imagen</th>
                <th >Activar</th>
                <th ></th>
                <th ></th>
                </tr>
              </thead>
              <tbody>
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr >

                    <td ><?php echo $row['titulo_producto']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['foto_producto']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
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
                    <?php
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." and fkproducto2_re_pro=".$row['id_producto']."");
					$NUM=mysqli_num_rows($Query_SA);
					?>
                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
                    </td>
                    <TD></TD>
                    <TD></TD>
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
    </div>

    </form>
    <!-- End Panel -->



     <?php
      }





	function addrelacionarProductos()
	{//	FUNCION DE ACCESOS A LOS USUARIOS
		$db_Full = new db_model(); $db_Full->conectar();
		
		$tipo=$_POST['tipo'];
		$marca=$_POST['marca'];

		if($_POST['tipo']!='' && $_POST['marca']!='')
		{
			$sql1="SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and id_marca=".$_POST['marca']." group by id_producto ";
			$query1 = $db_Full->select_sql($sql1);
		}else if($_POST['tipo']!='')
		{
			$sql1="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
			$query1 = $db_Full->select_sql($sql1);
		}else
		{
			$sql1="SELECT * FROM tbl_productos  ";
			$query1 = $db_Full->select_sql($sql1);
		}
		
		while($row1 = mysqli_fetch_assoc($query1))
		{			
			$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_relacionar_productos WHERE fkproducto2_re_pro=".$row1['id_producto']." ");
		}


		$array_2=array();
		$cadena = $_POST['lista_productos'];
		$array = explode(",", $cadena);

		foreach ($array as $clave=>$valor)
   		{	
   			if($valor!=0)
   			{
	   			$array_1 =array(
				 			"fkproducto2_re_pro" => $valor,
				 			"fkproducto1_re_pro" => $_GET['id']
				 		); 
	   			array_push($array_2, $array_1);
   			}
   		}


		$Query= $db_Full->insert_batch("tbl_relacionar_productos",$array_2);
		location("productos?action=relacionar_final&id=".$_GET['id']);
	}



}
?>
