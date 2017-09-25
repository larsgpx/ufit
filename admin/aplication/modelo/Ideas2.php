<?php
class Ideas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newIdeas()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	//var url = document.clientes.elements['url'];
	var seccion = document.clientes.elements['seccion'];
	var imagen = document.clientes.elements['imagen'];

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
	/*if(url.value == ""){
		alert("Ingrese URL");
		url.focus();
		return false;
	}*/
	if(seccion.value == ""){
		alert("Ingrese Sección");
		seccion.focus();
		return false;
	}
	if(imagen.value == ""){
		alert("Ingrese imagen");
		imagen.focus();
		return false;
	}

	document.clientes.action="ideas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>
<!--video-->
    <script type="text/javascript">
        function bloque_video(){
        	var idt1=$("#seccion").val();
            // alert(idt1);
        	$.ajax({
                url:'ajax_procesa_bloquevideo',
                data:{orden: idt1},
                type:'post',
                success:function(data){
                    $("#inputimgvideo").html(data);
                }
            }
            )
        }
    </script> 
<!--Fin video-->    
   <a href="ideas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVAS IDEAS PARA REGALAR
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

       <div class="panel-body">

        <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
        	<!-- <div class="tools">
        		<div class="tools_titulo">
        			<div class="icono">
        				<label>Titulo</label>
        				<span class="glyphicon glyphicon-text-height"></span>
        			</div>
        			<div class="contents" style="display: none;">
        				<input type="hidden" class="tipo" value="text">
	        			<div class="clearfix">
		        			<label for="titulo">Titulo</label>
			        		<input type="text" name="titulo" id="titulo">
		        		</div>
		        		<div class="clearfix">
		        			<label for="columna_titulo">Columna</label>
			        		<input type="text" name="" id="columna_titulo">
		        		</div>
        			</div>
	        	</div>
	        	<div class="tools_subtitulo">
	        		<div class="icono">
        				<label>Sub titulo</label>
        				<span class="glyphicon glyphicon-text-height"></span>
        			</div>
        			<div class="contents" style="display: none;">
		        		<input type="hidden" class="tipo" value="text">
		        		<div class="clearfix">
			        		<label for="subtitulo">Subtitulo</label>
			        		<input type="text" name="subtitulo" id="subtitulo">
		        		</div>
		        		<div class="clearfix">
		        			<label for="columna_subtitulo">Columna</label>
			        		<input type="text" name="" id="columna_subtitulo">
		        		</div>
		        	</div>	
	        	</div>
	        	<div class="tools_video">
	        		<div class="icono">
        				<label>Video youtube</label>
        				<span class="glyphicon glyphicon-film"></span>
        			</div>
        			<div class="contents" style="display: none;">
		        		<input type="hidden" class="tipo" value="video_youtube">
		        		<div class="clearfix">
			        		<label for="video">Video</label>
			        		<input type="text" name="video" id="video">
		        		</div>
		        		<div class="clearfix">
		        			<label for="columna_video_youtube">Columna</label>
			        		<input type="text" name="" id="columna_video_youtube">
		        		</div>
		        	</div>	
	        	</div>
	        	<div class="tools_image">
	        		<div class="icono">
        				<label>Imagen</label>
        				<span class="glyphicon glyphicon-picture"></span>
        			</div>
        			<div class="contents" style="display: none;">
		        		<input type="hidden" class="tipo" value="imagen">
		        		<div class="clearfix">
			                <label class="col-sm-2 control-label">Imagen Principal de lista de ideas</label>
			                <div class="col-sm-10">
				                <input type="file" name="imagen" class="form-control" />
				                <div class="kode-alert kode-alert-icon kode-alert-click alert6">
				                    <i class="fa fa-lock"></i>
				                    Tamaño recomendable - Bloque 1: 320x319px, Bloque 2: 1021x327px, Bloque 3: 496x323px, Bloque 4: 1021x327px, Bloque Video: 1021x575px
				                </div>
			                </div>
		                </div>
		                <div class="clearfix">
		        			<label for="columna_imagen">Columna</label>
			        		<input type="text" name="" id="columna_imagen">
		        		</div>
		        	</div>	
	            </div>
        	</div> -->

              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">SubTítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitulo"  class="form-control" />
                </div>
              </div>

               <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de Contenido</label>
	                <div class="col-sm-4">
	                	<select id='seccion' name='tipo_contenido' class="form-control" onchange="bloque_video();">
	                		<option value=''>Seleccione tipo de Contenido</option>
	                		<option value='1'>Bloque</option>
	                		<option value='2'>Video</option>
	                	</select>
	                  <!--<input class='inputradio' type='radio' name='seccion' value='1' checked> Pequeño 
		              <input class='inputradio' type='radio' name='seccion' value='2'> Grande-->
	                </div>
              </div>

              <div class="form-group">
	                <label class="col-sm-2 control-label">Tipo de enlace</label>
	                <div class="col-sm-4">
	                	<select id='seccion' name='tipo_enlace' class="form-control">
	                		<option value=''>Seleccione tipo de enlace</option>
	                		<option value='i'>Interno</option>
	                		<option value='e'>Externo</option>
	                	</select>
	                  <!--<input class='inputradio' type='radio' name='seccion' value='1' checked> Pequeño 
		              <input class='inputradio' type='radio' name='seccion' value='2'> Grande-->
	                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">URL</label>
                <div class="col-sm-10">
                  <input type="text" name="url" class="form-control" >
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
	                    <i class="fa fa-lock"></i>
	                    Sólo para el Bloque 1,2,3 y 4
	              </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Principal de lista de ideas</label>
                <div class="col-sm-10">
	                  <input type="file" name="imagen" class="form-control" />
	                   <div class="kode-alert kode-alert-icon kode-alert-click alert6">
	                    <i class="fa fa-lock"></i>
	                    Tamaño recomendable - Bloque 1: 320x319px, Bloque 2: 1021x327px, Bloque 3: 496x323px, Bloque 4: 1021x327px, Bloque Video: 1021x575px
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

	public function addIdeas(){
		//verifica imagen cargada
		$db_Full = new db_model(); $db_Full->conectar();
			if(isset($_FILES['imagen']) && ($_FILES['imagen']['name'] != ""))
			{
				    $destino1 = "../webroot/archivos/";
					$name1 = strtolower(date("ymdhis").$_FILES['imagen']['name']);
					$temp1 = $_FILES['imagen']['tmp_name'];
					$ext1 = end(explode(".", $name1));
					$type1 = $_FILES['imagen']['type'];
					$size1 = $_FILES['imagen']['size'];

					move_uploaded_file($temp1,$destino1.$name1);
					 $name_pfd1= explode(".",$name1);
			}
			//inserta idea para regalar
			$query = $db_Full->select_sql("INSERT INTO tbl_ideas (titulo_idea,subtitulo_idea,tipo_enlace,url_idea,imagen_idea,seccion_idea) VALUES ('".$_POST['titulo']."' , '".$_POST['subtitulo']."' , ,'".$_POST['tipo_enlace']."', '".$_POST['url']."' , '".$name_pfd1[0].'.'.$ext1."', '".$_POST['tipo_contenido']."') ");


		$query2 = $db_Full->select_sql("SELECT MAX(id_idea) AS 'id' FROM tbl_ideas");
		$row2   =  mysqli_fetch_assoc($query2);
		$ultimoid=$row2['id'];

		if ($_POST['seccion']=='5') {
			//inserta idea para regalar
			$query3 = $db_Full->select_sql("UPDATE tbl_ideas SET url_video_idea='".$_POST['seccion']."' WHERE id_idea='".$ultimoid."' ");	
		}

		location("ideas");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
		// location("ideas");
	    // }

	}


	public function editIdeas(){
		$db_Full = new db_model(); $db_Full->conectar();

       	$obj =  new Idea($_GET['id']);
       	$ididea=$_GET['id'];
       	//consulta datos de la idea
       	$query = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE id_idea=$ididea");
		$rowid   = mysqli_fetch_assoc($query);
		?>


<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	//var url = document.clientes.elements['url'];
	var seccion = document.clientes.elements['seccion'];

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
	/*if(url.value == ""){
		alert("Ingrese URL");
		url.focus();
		return false;
	}*/
	if(seccion.value == ""){
		alert("Ingrese Sección");
		seccion.focus();
		return false;
	}




	document.clientes.action="ideas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="ideas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR IDEAS PARA REGALAR
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
                  <input type="text" name="titulo"  class="form-control" value="<?php echo $rowid['titulo_idea']; ?>" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">SubTítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitulo" value="<?php echo $rowid['subtitulo_idea']; ?>"  class="form-control" />
                </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Bloque</label>
                <div class="col-sm-3">
                	<select id='seccion' name='seccion' class="form-control" onchange="bloque_video();">
                		<option value=''>Seleccione Bloque de Contenido</option>
                		<option value='1' <?php if($rowid['seccion_idea']=='1'){echo 'selected';}?>>Bloque 1</option>
                		<option value='2' <?php if($rowid['seccion_idea']=='2'){echo 'selected';}?>>Bloque 2</option>
                		<option value='3' <?php if($rowid['seccion_idea']=='3'){echo 'selected';}?>>Bloque 3</option>
                		<option value='4' <?php if($rowid['seccion_idea']=='4'){echo 'selected';}?>>Bloque 4</option>
                		<option value='5' <?php if($rowid['seccion_idea']=='5'){echo 'selected';}?>>Bloque Video</option>
                	</select>
                  <!--<input class='inputradio' type='radio' name='seccion' value='1' <?php //if($rowid['seccion_idea']=='1'){echo 'checked';}?>> Pequeño
	              <input class='inputradio' type='radio' name='seccion' value='2' <?php //if($rowid['seccion_idea']=='2'){echo 'checked';}?>> Grande-->
                </div>
              </div>

   			 <div class="form-group">
                <label class="col-sm-2 control-label">URL</label>
                <div class="col-sm-10">
                  <input type="text" name="url"  value="<?php echo $rowid['url_idea']; ?>" class="form-control" >
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
	                    <i class="fa fa-lock"></i>
	                    Sólo para el Bloque 1,2,3 y 4
	              </div>
                </div>
              </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">Imagen Principal de lista de ideas</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen" class="form-control" />
                    <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable - Bloque 1: 320x319px, Bloque 2: 1021x327px, Bloque 3: 496x323px, Bloque 4: 1021x327px, Bloque Video: 1021x575px
                  </div>
                   <?php
				  if($rowid['imagen_idea']!="")
				   {
				   ?>
                   <br>
                  <img style='width:20%;' src="../webroot/archivos/<?php echo $rowid['imagen_idea']; ?>"  >
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
                <label class="col-sm-2 control-label">URL de Video</label>
                <div class="col-sm-10">
                  <div id='inputimgvideo'>
	                  <input type="text" name="video" class="form-control" value='<?php echo $rowid['url_video_idea']; ?>' />
	                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
	                    <i class="fa fa-lock"></i>
	                    Solo si se selecciona el Bloque de Video
	                  </div>
	              </div>
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

	public function updateIdeas()
	{  $db_Full = new db_model(); $db_Full->conectar();
		/*if ($_POST['seccion']=='5') {
			$query = $db_Full->select_sql("UPDATE  tbl_ideas SET titulo_idea='".$_POST['titulo']."' , subtitulo_idea='".$_POST['subtitulo']."' , url_idea='".$_POST['url']."', url_video_idea= '".$_POST['video']."',  seccion_idea='".$_POST['seccion']."'  WHERE id_idea = '".$_GET['id']."' ");
		}else{*/
			if(isset($_FILES['imagen']) && ($_FILES['imagen']['name'] != ""))
			{
				$destino1 = "../webroot/archivos/";
				$name1 = strtolower(date("ymdhis").$_FILES['imagen']['name']);
				$temp1 = $_FILES['imagen']['tmp_name'];
				$type1 = $_FILES['imagen']['type'];
				$size1 = $_FILES['imagen']['size'];
				$ext1 = end(explode(".", $name1));
				move_uploaded_file($temp1,$destino1.$name1);
				$name_pfd1 = explode(".",$name1);
				$update1 = " imagen_idea = '".$name_pfd1[0].'.'.$ext1."' ";
				$query = $db_Full->select_sql("UPDATE  tbl_ideas SET ".$update1." WHERE id_idea = '".$_GET['id']."' ");
			}

			$query = $db_Full->select_sql("UPDATE  tbl_ideas SET titulo_idea='".$_POST['titulo']."' , subtitulo_idea='".$_POST['subtitulo']."' , url_idea='".$_POST['url']."', url_video_idea= '".$_POST['video']."',  seccion_idea='".$_POST['seccion']."'  WHERE id_idea = '".$_GET['id']."' ");
		//}


		location("ideas");
	}



	public function deleteIdeas()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_ideas WHERE id_idea = '".$_GET['id']."'");
		location("ideas");
	}





	public function listIdeas(){
		//lista ideas para regalar
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT  * FROM tbl_ideas ORDER BY id_idea ASC");

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

    <a href="ideas?action=new" class="btn btn-default btn-block">AGREGAR IDEAS PARA REGALAR</a>
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
          Lista de Ideas para regalar
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
             <!--   <th  ></th>-->
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Imagen</th>
                <th>Editar</th>
                <!--<th>Relacionar Productos</th>-->
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr id="list_item_<?php echo $row['id_idea']."|ideas"; ?>" >
            		<!--<td class="handle"><i class="fa fa-bars"></i></td>-->
                    <td ><?php echo $row['titulo_idea']; ?></td>
                    <td ><?php echo $row['subtitulo_idea']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['imagen_idea']!="")
						  {
						   ?>
						  <img src="../webroot/archivos/<?php  echo $row['imagen_idea'] ?>" width="100"  >
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
                    	<a class="btn btn-default btn-block"  href="ideas?id=<?php echo $row['id_idea']; ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <!--<td>
                    	<a class="btn btn-default btn-block"  href="ideas?id=<?php //echo $row['id_idea'] ?>&amp;action=relacionar">RELACIONAR PRODUCTOS</a>
                    </td>-->
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("ideas",<?php echo $row['id_idea']; ?>,"delete")>ELIMINAR</a>
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

<?php /*?>
		HABILITAR DRAG AND DROP
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

            <script>
			$(document).ready(function(){



	$("#listadoul").sortable({
	  handle : '.handle',
	  update : function () {
		var order = $('#listadoul').sortable('serialize');

		  $.get("ajax?"+order,{action:'ordenarIdeas'},function(data){

		});
	  }
	});



});
			</script><?php */?>


        <?php

	}

















	public function relacionarIdeas(){

		//$query = $db_Full->select_sql("select  * FROM tbl_productos order by id_producto asc");

		?>



    <a href="ideas?action=list" class="btn btn-default btn-block">REGRESAR IDEAS PARA REGALAR</a>
<br>



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos a relacionar
        </div>
        <div class="panel-body table-responsive">
		<form name="f1" action="" method="post">
            <table class="table display">
            <thead>
               <tr>
                <th  >Título</th>
                <th  >Imagen</th>
                <th >Activar</th>
                </tr>
              </thead>
              <tbody>
              <?php
			$w = 1;
			//while($row = mysqli_fetch_assoc($query))
			//{

			?>

            <tr >

                    <td ><?php //echo $row['titulo_producto']; ?></td>
                    <td valign="top" >
                    	  <?php
						 // if($row['foto_producto']!=".")
						//   {
						   ?>
						  <img src="../webroot/archivos/<?php //echo $row['foto_producto'] ?>" width="100"  >
						  <?php
						 //  }else
						 //  {
						  ?>
						  <img src="../webroot/assets/img/no_image.png" width="100" >
						  <?php
						 //  }
						  ?>
                    </td>
                    <td>
                    <?php
                  //  $Query_SA=mysql_query("SELECT * FROM tbl_ideas_productos WHERE 	fkideas_ide_pro=".$_GET['id']." and fkproducto_ide_pro=".$row['id_producto']."");
					//$NUM=mysql_num_rows($Query_SA);
					?>
                    <input type="checkbox" name="seccion[]" value="<?php //echo $row['id_producto']?>" <?php //if($NUM==1){// echo "checked"; }?>>
                    </td>

			</tr>
                <?php
			$w++;
			//}
			?>


              <tr bgcolor="#F2F2F2">
                 <td colspan="4" align="center"  style="padding-top:20px; padding-bottom:20px" >
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='ideas?id=<?php// echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 </td>
			  </tr>

            </tbody>
            </table>
		</form>

        </div>

      </div>
    </div>
    <!-- End Panel -->





        <?php

	}







function addrelacionarIdeas(){//	FUNCION DE ACCESOS A LOS USUARIOS

		/*$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_ideas_productos WHERE fkideas_ide_pro=".$_GET['id']."");
		for($j=0; $j<sizeof($_POST['seccion']);$j++){
			if($_POST['seccion'][$j]){
				$Query= $db_Full->select_sql($sql = "INSERT INTO tbl_ideas_productos VALUES( '' , '".$_GET['id']."' , '".$_POST['seccion'][$j]."'  ) "		);
			}
		}*/

		location("ideas?action=relacionar&id=".$_GET['id']);
	}








}
?>
