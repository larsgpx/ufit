<?php
class Bannerofertas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newBannerofertas()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var link = document.clientes.elements['link'];
	var imagen1 = document.clientes.elements['imagen1'];

	if(link.value == ""){
		alert("Ingrese link");
		link.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen");
		imagen1.focus();
		return false;
	}


	document.clientes.action="bannerofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="bannerofertas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO BANNER DE OFERTAS
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Link</label>
                <div class="col-sm-10">
                  <input type="text" name="link"  class="form-control" />
                </div>
              </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Banner </label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
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

	public function addBannerofertas(){
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

		

		$query = $db_Full->select_sql("INSERT INTO  tbl_banner_ofertas VALUES ('' , '".$name_pfd1[0].'.'.$ext1."' , '".$_POST['link']."'   )");


		location("bannerofertas");
		

	}


	public function editBannerofertas(){


       $obj =  new Banneroferta($_GET['id']);

		?>

<script>
function validando_clientes(opcion, id)
{
	var link = document.clientes.elements['link'];
	
	if(link.value == ""){
		alert("Ingrese link");
		link.focus();
		return false;
	}



	document.clientes.action="bannerofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}
</script>

 <a href="bannerofertas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR BANNER DE OFERTA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">



              <div class="form-group">
                <label class="col-sm-2 control-label">Link</label>
                <div class="col-sm-10">
                  <input type="text" name="link"  class="form-control" value="<?php echo $obj->__get('_link'); ?>" />
                </div>
              </div>




            <div class="form-group">
                <label class="col-sm-2 control-label">Banner </label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                   <?php
				  if($obj->__get('_imagen')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_imagen') ?>"  width="500" >
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

	public function updateBannerofertas()
	{    $db_Full = new db_model(); $db_Full->conectar();
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
			$update1 = " imagen_ba = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_banner_ofertas SET ".$update1." WHERE id_ba = '".$_GET['id']."' ");
		}



		$query = $db_Full->select_sql("UPDATE  tbl_banner_ofertas SET link_ba='".$_POST['link']."'  WHERE id_ba = '".$_GET['id']."' ");

		location("bannerofertas");
	}



	public function deleteBannerofertas()
	{
		$query = $db_Full->select_sql("DELETE  FROM tbl_banner_ofertas WHERE id_ba = '".$_GET['id']."'");
		location("bannerofertas");
	}





	public function listBannerofertas(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_banner_ofertas ");

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

    <a href="bannerofertas?action=new" class="btn btn-default btn-block">AGREGAR BANNER DE OFERTA</a>
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
          Lista de Banner
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <!--<th  ></th>-->
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

            <tr <?php /*?>id="list_item_<?php echo $row['id_ma']."|magazine"; ?>"<?php */?> >
            		<!--<td class="handle"><i class="fa fa-bars"></i></td>-->
                    <td ><?php echo $row['link_ba']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['imagen_ba']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['imagen_ba'] ?>" width="100"  >
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
                    	<a class="btn btn-default btn-block"  href="bannerofertas?id=<?php echo $row['id_ba'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                   
                   <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("bannerofertas",<?php echo $row['id_ba'] ?>,"delete")>ELIMINAR</a>
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

		  $.get("ajax?"+order,{action:'ordenarMagazine'},function(data){

		});
	  }
	});



});
			</script>


        <?php

	}

















	public function relacionarBannerofertas(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos order by id_producto asc");

		?>



    <a href="bannerofertas?action=list" class="btn btn-default btn-block">REGRESAR MAGAZINE</a>
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

                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE 	fkmagazine_ma_pro=".$_GET['id']." and fkproducto_ma_pro=".$row['id_producto']."");
					$NUM=mysql_num_rows($Query_SA);
					?>
                    <input type="checkbox" name="seccion[]" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
                    </td>

			</tr>
                <?php
			$w++;
			}
			?>


              <tr bgcolor="#F2F2F2">
                 <td colspan="4" align="center"  style="padding-top:20px; padding-bottom:20px" >
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='bannerofertas?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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







function addrelacionarBannerofertas(){//	FUNCION DE ACCESOS A LOS USUARIOS
		$db_Full = new db_model(); $db_Full->conectar();
		$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']."");
		for($j=0; $j<sizeof($_POST['seccion']);$j++){
			if($_POST['seccion'][$j]){
				$Query= $db_Full->select_sql($sql = "INSERT INTO tbl_magazines_productos VALUES( '' , '".$_GET['id']."' , '".$_POST['seccion'][$j]."'  ) "		);
			}
		}

		location("bannerofertas?action=relacionar&id=".$_GET['id']);
	}








}
?>
