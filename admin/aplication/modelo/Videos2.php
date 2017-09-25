<?php
class Videos{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newVideos()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var links = document.clientes.elements['link'];
	var imagen1 = document.clientes.elements['imagen1'];

	if(titulo.value == ""){
		alert("Ingrese Título");
		titulo.focus();
		return false;
	}


	if(links.value == ""){
		alert("Ingrese Link de Youtube");
		links.focus();
		return false;
	}




	if(imagen1.value == ""){
		alert("Ingrese imagen");
		imagen1.focus();
		return false;
	}




	document.clientes.action="videos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="videos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO VIDEO
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
                  <input type="text" name="titulo"  class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Link del video de Youtube</label>
                <div class="col-sm-10">
                  <input type="text" name="link"  class="form-control" />
                </div>
              </div>



               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 315x110 px
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

	public function addVideos(){
        
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT titulo_vi from tbl_videos where titulo_vi='".$_POST['titulo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$asesoria=$row['titulo_vi'];

		// if($asesoria=="")
		// {


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





		$query = $db_Full->select_sql("INSERT INTO  tbl_videos VALUES ('','".$_POST['titulo']."'  , '".$name_pfd1[0].'.'.$ext1."' , '".$_POST['link']."' , '0' )");


		location("videos");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
		// location("videos");
	  //   }

	}


	public function editVideos(){


       $obj =  new Video($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var links = document.clientes.elements['link'];
	var imagen1 = document.clientes.elements['imagen1'];

	if(titulo.value == ""){
		alert("Ingrese Título");
		titulo.focus();
		return false;
	}


	if(links.value == ""){
		alert("Ingrese Link de Youtube");
		links.focus();
		return false;
	}




	document.clientes.action="videos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="videos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR VIDEO
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
                  <input type="text" name="titulo"  class="form-control" value="<?php echo $obj->__get('_titulo'); ?>" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Link del video de Youtube</label>
                <div class="col-sm-10">
                  <input type="text" name="link"  class="form-control" value="<?php echo $obj->__get('_link'); ?>" />
                </div>
              </div>






              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                     Tamaño recomendable 315x110 px
                  </div>

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

	public function updateVideos()
	{   $db_Full = new db_model(); $db_Full->conectar();
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
			$update1 = " foto_vi = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_videos SET ".$update1." WHERE id_vi = '".$_GET['id']."' ");
		}




		$query = $db_Full->select_sql("UPDATE  tbl_videos SET titulo_vi='".$_POST['titulo']."' , link_vi='".$_POST['link']."'    WHERE id_vi = '".$_GET['id']."' ");



		location("videos");
	}



	public function deleteVideos()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_videos WHERE id_vi = '".$_GET['id']."'");
		location("videos");
	}





	public function listVideos(){
    	$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_videos order by orden_vi asc");

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

    <a href="videos?action=new" class="btn btn-default btn-block">AGREGAR VIDEOS</a>
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
          Lista de Videos
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  ></th>
                <th  >Título</th>
                <th  >Link</th>
                <th  >Imagen</th>
                <th >Editar</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr id="list_item_<?php echo $row['id_vi']."|video"; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
                    <td ><?php echo $row['titulo_vi']; ?></td>
                    <td ><?php echo $row['link_vi']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['foto_vi']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_vi'] ?>" width="100"  >
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
                    	<a class="btn btn-default btn-block"  href="videos?id=<?php echo $row['id_vi'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("videos",<?php echo $row['id_vi'] ?>,"delete")>ELIMINAR</a>
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

		  $.get("ajax.php?"+order,{action:'ordenarVideo'},function(data){

		});
	  }
	});



});
			</script>


        <?php

	}



















}
?>
