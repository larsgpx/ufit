<?php
class Asesorias{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newAsesorias()
	{
		$db_Full = new db_model(); $db_Full->conectar();
	?>




<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	var descripcion = document.clientes.elements['descripcion'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];

	if(titulo.value == ""){
		alert("Ingrese Título");
		titulo.focus();
		return false;
	}


	if(subtitulo.value == ""){
		alert("Ingrese Subtítulo");
		subtitulo.focus();
		return false;
	}


	if(descripcion.value == ""){
		alert("Ingrese Descripción");
		descripcion.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen de lista de Asesorías");
		imagen1.focus();
		return false;
	}


	if(imagen2.value == ""){
		alert("Ingrese imagen interna de la Asesoría");
		imagen2.focus();
		return false;
	}




	document.clientes.action="asesorias?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="asesorias" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA ASESORÍA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                 <label class="col-sm-2 control-label">Título</label>
                 <div class="col-sm-10">
                    <input type="text" name="titulo"  class="form-control generar_url" />
                 </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="hidden" name="url" class="form-control ini_url" value="asesoria/" />
                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="asesoria/" />
                  <input type="hidden" name="url" class="form-control mostrar_url" value="" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">SubTítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitulo"  class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control" ></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de lista de Asesorías </label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 380x380 px
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Interna de la Asesoría</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 595x385 px
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

	public function addAsesorias(){

		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT titulo_ase from tbl_asesorias where titulo_ase='".$_POST['titulo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$asesoria=$row['titulo_ase'];

		// if($asesoria=="")
		// {
		//

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


		$query_id = $db_Full->select_sql("INSERT INTO  tbl_asesorias VALUES ('' , '".$_POST['titulo']."' , '".$_POST['subtitulo']."' , '".$_POST['descripcion']."' , '".$name_pfd1[0].'.'.$ext1."' , '".$name_pfd2[0].'.'.$ext2."' , '0' , '".$_POST['url']."'   )");

		//$query = $db_Full->select_sql("SELECT url_page_tbl FROM tbl_page where tbl_asesorias = 'tbl_asesorias' and plantilla_page_tbl = 'asesoria_detalle'");

		$data = array(
                          "titulo_page_tbl"     => $_POST['titulo'],
                          "url_page_tbl"        => $_POST['url'],
                          "tabla_page_tbl"      => "tbl_asesorias",
                          "id_tabla_page_tbl"   => $query_id,
                          "visible_page"        => 1,
                          "estado_page_tbl"     => 'a',
                          "tipo_url_page"       => "i",
                          "fk_id_menu"          => 3,
                          //"parent_page_tbl"     => $parent,
                          "plantilla_page_tbl"  => "asesoria_detalle"
                        );

		
        $query = $db_Full->insert_table("tbl_page",$data);

		location("asesorias");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	    // }

	}


	public function editAsesorias(){


       $obj =  new Asesoria($_GET['id']);

		?>


<script>

function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	var descripcion = document.clientes.elements['descripcion'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];

	if(titulo.value == ""){
		alert("Ingrese Título");
		titulo.focus();
		return false;
	}


	if(subtitulo.value == ""){
		alert("Ingrese Subtítulo");
		subtitulo.focus();
		return false;
	}


	if(descripcion.value == ""){
		alert("Ingrese Descripción");
		descripcion.focus();
		return false;
	}




	document.clientes.action="asesorias?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="asesorias" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR ASESORÍA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control generar_url" value="<?php echo $obj->__get('_titulo'); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="hidden" name="ini_url" class="form-control ini_url" value="asesoria/" />
                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $obj->__get('_link'); ?>" />
                  <input type="hidden" name="url" class="form-control mostrar_url" value="" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">SubTítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitulo"  class="form-control" value="<?php echo $obj->__get('_subtitulo'); ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control"><?php echo $obj->__get('_descripcion'); ?></textarea>
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la cabecera de la página</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 380x380 px en formato .png
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
                    Tamaño recomendable 595x385 px
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

				<input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">

        	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


		<?php

	}
//Edita aesoria
	public function updateAsesorias()
	{   $db_Full = new db_model(); $db_Full->conectar();
		if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
		{//valida carga de la imagen1
			$destino1 = "../webroot/archivos/";
			$name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
			$temp1 = $_FILES['imagen1']['tmp_name'];
			$type1 = $_FILES['imagen1']['type'];
			$size1 = $_FILES['imagen1']['size'];
			$ext1 = end(explode(".", $name1));
			move_uploaded_file($temp1,$destino1.$name1);
			$name_pfd1 = explode(".",$name1);
			$update1 = " foto1_ase = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_asesorias SET ".$update1." WHERE id_ase = '".$_GET['id']."' ");
		}

		if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
		{//valida carga de la imagen2
			$destino2 = "../webroot/archivos/";
			$name2 = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
			$temp2 = $_FILES['imagen2']['tmp_name'];
			$type2 = $_FILES['imagen2']['type'];
			$size2 = $_FILES['imagen2']['size'];
			$ext2 = end(explode(".", $name2));
			move_uploaded_file($temp2,$destino2.$name2);
			$name_pfd2 = explode(".",$name2);
			$update2 = " foto2_ase = '".$name_pfd2[0].'.'.$ext2."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_asesorias SET ".$update2." WHERE id_ase = '".$_GET['id']."' ");
		}
		//echo $_POST['url']; exit;
		$query = $db_Full->select_sql("UPDATE  
									   tbl_asesorias 
									   SET titulo_ase='".$_POST['titulo']."' , 
									   subtitulo_ase='".$_POST['subtitulo']."' ,
		                               descripcion_ase='".$_POST['descripcion']."',
		                               url_page_tbl='".$_POST['url']."' 
		                               WHERE and tabla_page_tbl = 'tbl_asesorias' 
		                               and id_ase = '".$_GET['id']."' ");

		$query_page = $db_Full->select_sql("SELECT id_tabla_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$_GET['id']."' and tabla_page_tbl='tbl_asesorias' and plantilla_page_tbl='asesoria_detalle'  ");

		if(mysqli_num_rows($query_page)){ //echo $_POST['url']; exit;
				$query = $db_Full->select_sql("UPDATE  tbl_page 
											   SET titulo_page_tbl='".$_POST['titulo']."', 
											   url_page_tbl='".$_POST['url']."' ,
											   id_tabla_page_tbl =".$_GET['id'].",
											   visible_page = 0,
											   estado_page_tbl = 'a', 
											   tipo_url_page = 'i',
											   fk_id_menu = 3, 
											   plantilla_page_tbl='asesoria_detalle' 
											   WHERE id_tabla_page_tbl = '".$_GET['id']."' and tabla_page_tbl='tbl_asesorias' and 
											   plantilla_page_tbl='asesoria_detalle' ");
		}
		else{
				$data = array(
	                          "titulo_page_tbl"     => $_POST['titulo'],
	                          "url_page_tbl"        => $_POST['url'],
	                          "tabla_page_tbl"      => "tbl_asesorias",
	                          "id_tabla_page_tbl"   => $_GET['id'],
	                          "visible_page"        => 1,
	                          "estado_page_tbl"     => 'a',
	                          "tipo_url_page"       => "i",
	                          "fk_id_menu"          => 3,
	                          //"parent_page_tbl"     => $parent,
	                          "plantilla_page_tbl"  => "asesoria_detalle"
	                        );

	        	$query = $db_Full->insert_table("tbl_page",$data);
		}
		

		location("asesorias");
	}



	public function deleteAsesorias()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE FROM tbl_asesorias WHERE id_ase = '".$_GET['id']."'");
		location("asesorias");
	}





	public function listAsesorias(){
        $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_asesorias order by orden_ase asc");

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

    <a href="asesorias?action=new" class="btn btn-default btn-block">AGREGAR ASESORÍAS</a>
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
          Lista de Asesorias
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
               <?php /*?> <th  ></th><?php */?>
                <th  >Título</th>
                <th  >Subtítulo</th>
                <th  >Imagen</th>
                <th >Editar</th>
                <th >Relacionar Productos</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr id="list_item_<?php echo $row['id_ase']."|asesoria"; ?>" >
            		<?php /*?><td class="handle"><i class="fa fa-bars"></i></td><?php */?>
                    <td ><?php echo $row['titulo_ase']; ?></td>
                    <td ><?php echo $row['subtitulo_ase']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['foto1_ase']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto1_ase'] ?>" width="100"  >
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
                    	<a class="btn btn-default btn-block"  href="asesorias?id=<?php echo $row['id_ase'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block"  href="asesorias?id=<?php echo $row['id_ase'] ?>&amp;action=relacionar">RELACIONAR PRODUCTOS</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("asesorias",<?php echo $row['id_ase'] ?>,"delete")>ELIMINAR</a>
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

		  $.get("ajax.php?"+order,{action:'ordenarAsesoria'},function(data){

		});
	  }
	});



});
			</script>


        <?php

	}

















	public function relacionarAsesorias()
	{
		
    $db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_productos ";
    $query = $db_Full->select_sql($sql);
	$obj =  new Asesoria($_GET['id']);

	$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
	$querys1 = $db_Full->select_sql($sqls1);

	$validar_check=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." ");
    $contador = mysqli_num_rows($validar_check); 
   
   ?>

		<script>
		var lista=new Array();	

		<?php
		while($row_check = mysqli_fetch_assoc($validar_check))
		{
				$lista_productos[]=$row_check['fkproducto_ase_pro'];
		?>	
				lista.push(<?php echo $row_check['fkproducto_ase_pro'];?>);
		<?php
		}
		?>

		function enviar_tipos_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_tipos_relacionar_asesoria&id=<?php echo $_GET['id']; ?>",
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
		                  url: "ubigeos.php?tipe=lista_marcas_relacionar_marca&id=<?php echo $_GET['id']; ?>",
		                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
		                  success: function(data)
		                  {
		                     $("#relacionar_productos").html(data);
		                  }
		            });

		}
		</script>


  <a href="asesorias" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
  	<br>
  	<table>
  	<tr>
  	   <td align="center">Asesoría:  <B> <?PHP ECHO $obj->__get('_titulo'); ?> </B> se relacionará con :</td>
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
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='asesorias?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." and fkproducto_ase_pro=".$row['id_producto']."");
					$NUM=mysqli_num_rows($Query_SA);
					?>
                    <input type="checkbox" class="seccion" name="seccion" id="seccion"  value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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







function addrelacionarAsesorias()
{

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
			$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_asesorias_productos WHERE fkproducto_ase_pro=".$row1['id_producto']."  ");
		}



		$array_2=array();

		$cadena = $_POST['lista_productos'];
		$array = explode(",", $cadena);


		foreach ($array as $clave=>$valor)
   		{	
   			if($valor!=0)
   			{
	   			$array_1 =array(
				 			"fkproducto_ase_pro" => $valor,
				 			"fkase_ase_pro" => $_GET['id']
				 		); 
	   			array_push($array_2, $array_1);
   			}
   		}

	

		$Query= $db_Full->insert_batch("tbl_asesorias_productos",$array_2);
		
		location("asesorias?action=relacionar&id=".$_GET['id']);



	}








}
?>
