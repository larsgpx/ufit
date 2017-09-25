<?php
class SliderHome{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newSliderHome()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var title = document.clientes.elements['title'];
	var subtitle = document.clientes.elements['subtitle'];
  console.log("slider-home?action="+opcion+"&id="+id);
	if(title.value == ""){
		alert("Ingrese Título del Banner");
		nombre.focus();
		return false;
	}


	if(subtitle.value == ""){
		alert("Ingrese el subtítulo del banner");
		ancho.focus();
		return false;
	}



	document.clientes.action="slider-home?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>
  <script src="aplication/utilidades/ckeditor/ckeditor.js"></script>

   <a href="slider-home" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO BANNER HOME
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
                  <input type="text" name="title"  class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Subtítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitle"  class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Activar link</label>
                <div class="col-sm-2">
                  <input type="checkbox" name="foto1_has_link" class="form-control" value="has_link"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url Banner</label>
                <div class="col-sm-10">
                  <input type="text" name="foto1_link" class="form-control" value=""/>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 940x430 px en formato .jpg
                  </div>
                 </div>
              </div>
<!--ocultado Baner 2
              <div class="form-group">
                <label class="col-sm-2 control-label">Activar link</label>
                <div class="col-sm-2">
                  <input type="checkbox" name="foto2_has_link" class="form-control" value="has_link"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url Banner</label>
                <div class="col-sm-10">
                  <input type="text" name="foto2_link" class="form-control" value=""/>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen2" class="form-control" />
                 </div>
              </div>

ocultado Baner 2-->

				<input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


        	</form>
      </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
		<?php
	}

	public function addSliderHome()
	{  $db_Full = new db_model(); $db_Full->conectar();

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
    //Ocultando Baner 2
		/*if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
		{
			    $destino1 = "../webroot/archivos/";
				$name1 = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
				$temp1 = $_FILES['imagen2']['tmp_name'];
				$ext2 = end(explode(".", $name1));
				$type1 = $_FILES['imagen2']['type'];
				$size1 = $_FILES['imagen2']['size'];

				move_uploaded_file($temp1,$destino1.$name1);
				$name_pfd2= explode(".",$name1);
		}*/



        $query = $db_Full->select_sql("INSERT INTO tbl_banner_home VALUES ('','".$_POST['title']."' , '".$_POST['subtitle']."' , '' )");
        $query = $db_Full->select_sql("select * from tbl_banner_home order by id desc limit 1");
        $lastInserted = mysqli_fetch_assoc($query);

        if(isset($_POST['foto1_has_link']) && $_POST['foto1_has_link'] == 'has_link'){
          $has_link = 1;
          $link = $_POST['foto1_link'];

          $query = $db_Full->select_sql("INSERT INTO tbl_banner_home_slides VALUES ('', " . $lastInserted['id'] . ", '".$name_pfd1[0].'.'.$ext1."', " . $has_link . ", '" . $link . "' )");
        }else{
          $has_link = 0;

          $query = $db_Full->select_sql("INSERT INTO tbl_banner_home_slides VALUES ('', " . $lastInserted['id'] . ", '".$name_pfd1[0].'.'.$ext1."', '', '' )");
        }

//Ocultando Baner 2
        /*if(isset($_POST['foto2_has_link']) && $_POST['foto2_has_link'] == 'has_link'){
          $has_link2 = 1;
          $link2 = $_POST['foto2_link'];

          $query = $db_Full->select_sql("INSERT INTO  tbl_banner_home_slides VALUES ('', " . $lastInserted['id'] . ", '".$name_pfd2[0].'.'.$ext2."', " . $has_link2 . ", '" . $link2 . "' )");
        }else{
          $has_link2 = 0;

          $query = $db_Full->select_sql("INSERT INTO  tbl_banner_home_slides VALUES ('', " . $lastInserted['id'] . ", '".$name_pfd2[0].'.'.$ext2."', '','' )");
        }*/



		location("slider-home");
	}


	public function editSliderHome(){


       $obj =  new SliderEditHome($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var title = document.clientes.elements['title'];
	var subtitle = document.clientes.elements['subtitle'];

	if(title.value == ""){
		alert("Ingrese Título del Banner");
		nombre.focus();
		return false;
	}


	if(subtitle.value == ""){
		alert("Ingrese subtítulo del Banner");
		ancho.focus();
		return false;
	}

	document.clientes.action="slider-home?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

<script src="aplication/utilidades/ckeditor/ckeditor.js"></script>

 <a href="slider-home" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR Banner HOME
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
                  <input type="text" name="title"  class="form-control" value="<?php echo $obj->__get('_title'); ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Subtítulo</label>
                <div class="col-sm-10">
                  <input type="text" name="subtitle"  class="form-control" value="<?php echo $obj->__get('_subtitle'); ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Activar link</label>
                <div class="col-sm-2">
                  <input type="checkbox" name="foto1_has_link" class="form-control" value="has_link" <?php if($obj->__get('_has_link1') == 1){ echo 'checked';} ?>/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url Banner</label>
                <div class="col-sm-10">
                  <input type="text" name="foto1_link" class="form-control" value="<?php echo $obj->__get('_link1');?>"/>
                </div>
              </div>


              <div class="form-group">
                   <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">

                  <input type="file" name="foto1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 940x430 px en formato .jpg
                  </div>  




                  <?php
				  if($obj->__get('_foto1')!=".")
				   {
				   ?>
                   <br>
                   <input type="hidden" name="old_foto1" value="<?php echo $obj->__get('_oldfoto1') ?>" />
                  <img style="width:100%;"  src="../webroot/archivos/<?php echo $obj->__get('_foto1') ?>"  >
                  <?php
				   }else
				   {
				  ?>
          <input type="hidden" name="old_foto1" value="" />
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php
                   }
				  ?>

                </div>
              </div>
<!--ocultado Baner 2

              <div class="form-group">
                <label class="col-sm-2 control-label">Activar link</label>
                <div class="col-sm-2">
                  <input type="checkbox" name="foto2_has_link" class="form-control" value="has_link" <?php //if($obj->__get('_has_link2') == 1){ echo 'checked';} ?>/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Url Banner</label>
                <div class="col-sm-10">
                  <input type="text" name="foto2_link" class="form-control" value="<?php //echo $obj->__get('_link2');?>"/>
                </div>
              </div>


              <div class="form-group">
                   <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">

                  <input type="file" name="foto2" class="form-control" />

                  <?php
				  //if($obj->__get('_foto2')!=".")
				   {
				   ?>
                   <br>
                   <input type="hidden" name="old_foto2" value="<?php //echo $obj->__get('_oldfoto2') ?>" />
                  <img src="../webroot/archivos/<?php //echo $obj->__get('_foto2') ?>"  >
                  <?php
				   }//else
				   {
				  ?>
          <input type="hidden" name="old_foto2" value="" />
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php
                   }
				  ?>

                </div>
              </div>
Fin ocultado Baner 2-->



				<input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


        	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


		<?php

	}
  //edita slider
	public function updateSliderHome()
	{//verifica que se haya cargado el archivo de imagen
    $db_Full = new db_model(); $db_Full->conectar();
		if(isset($_FILES['foto1']) && ($_FILES['foto1']['name'] != ""))
		{
			$destino1 = "../webroot/archivos/";
			$name1 = strtolower(date("ymdhis").$_FILES['foto1']['name']);
			$temp1 = $_FILES['foto1']['tmp_name'];
			$type1 = $_FILES['foto1']['type'];
			$size1 = $_FILES['foto1']['size'];
			$ext1 = end(explode(".", $name1));
			move_uploaded_file($temp1,$destino1.$name1);
			$name_pfd1 = explode(".",$name1);
			$update1 = " image = '".$name_pfd1[0].'.'.$ext1."' ";

      //edita foto, link
      if(isset($_POST['foto1_has_link']) && $_POST['foto1_has_link'] == 'has_link'){
        $has_link = 1;
        $link = $_POST['foto1_link'];

        $query = $db_Full->select_sql("UPDATE tbl_banner_home_slides SET ".$update1.", has_link=" . $has_link . ", link='" . $link . "' WHERE id = '".$_POST['old_foto1']."' ");
      }else{
        $has_link = 0;

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET ".$update1.", has_link=" . $has_link . ", link='' WHERE id = '".$_POST['old_foto1']."' ");
      }
		}else{
      if(isset($_POST['foto1_has_link']) && $_POST['foto1_has_link'] == 'has_link'){
        $has_link = 1;
        $link = $_POST['foto1_link'];

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET has_link=" . $has_link . ", link='" . $link . "' WHERE id = '".$_POST['old_foto1']."' ");
      }else{
        $has_link = 0;

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET has_link=" . $has_link . ", link='' WHERE id = '".$_POST['old_foto1']."' ");
      }
    }

//Ocultando Baner 2
		/*if(isset($_FILES['foto2']) && ($_FILES['foto2']['name'] != ""))
		{
			$destino1 = "../webroot/archivos/";
			$name1 = strtolower(date("ymdhis").$_FILES['foto2']['name']);
			$temp1 = $_FILES['foto2']['tmp_name'];
			$type1 = $_FILES['foto2']['type'];
			$size1 = $_FILES['foto2']['size'];
			$ext2 = end(explode(".", $name1));
			move_uploaded_file($temp1,$destino1.$name1);
			$name_pfd2 = explode(".",$name1);
			$update2 = " image = '".$name_pfd2[0].'.'.$ext2."' ";

      if(isset($_POST['foto2_has_link']) && $_POST['foto2_has_link'] == 'has_link'){
        $has_link = 1;
        $link = $_POST['foto2_link'];

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET ".$update2.", has_link=" . $has_link . ", link='" . $link . "' WHERE id = '".$_POST['old_foto2']."' ");
      }else{
        $has_link = 0;

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET ".$update2.", has_link=" . $has_link . ", link='' WHERE id = '".$_POST['old_foto2']."' ");
      }
		}else{
      if(isset($_POST['foto2_has_link']) && $_POST['foto2_has_link'] == 'has_link'){
        $has_link = 1;
        $link = $_POST['foto2_link'];

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET has_link=" . $has_link . ", link='" . $link . "' WHERE id = '".$_POST['old_foto2']."' ");
      }else{
        $has_link = 0;

        $query = $db_Full->select_sql("UPDATE  tbl_banner_home_slides SET has_link=" . $has_link . ", link='' WHERE id = '".$_POST['old_foto2']."' ");
      }
    }*/


    //edita tiulo y subtitulo
    $query = $db_Full->select_sql("UPDATE tbl_banner_home SET title='".$_POST['title']."' , subtitle='".$_POST['subtitle']."' WHERE id='".$_GET['id']."' ");
    location("slider-home");
	}


  
	public function deleteSliderHome()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_banner_home WHERE id = '".$_GET['id']."'");
		location("slider-home");
	}





	public function listBanners(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_banner_home order by orden asc");

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

    <a href="slider-home?action=new" class="btn btn-default btn-block">AGREGAR BANNER HOME</a>
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
          Lista de banners Home
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                 <th></th>
                <th>Título</th>
                <th>Subtítulo</th>
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

            <tr id="list_item_<?php echo $row['id']."|banner"; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
                    <td ><?php echo $row['title']; ?></td>
                     <td ><?php echo $row['subtitle']; ?></td>
                  <td>
                    	<a class="btn btn-default btn-block"  href="slider-home?id=<?php echo $row['id'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("slider-home",<?php echo $row['id'] ?>,"delete")>ELIMINAR</a>
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

		  $.get("ajax.php?"+order,{action:'ordenarBanner'},function(data){

		});
	  }
	});



});
			</script>

        <?php

	}







	public function listemailingPopuphomes(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_email group by email_em");

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



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en emailing
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr>
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr  >

                    <td ><?php echo $row['email_em']; ?></td>
                    <td></td>
                    <td></td>

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








   public function listnovedadesPopuphomes(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_novedades group by email_no");

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



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en novedades
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr>
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr  >

                    <td ><?php echo $row['email_no']; ?></td>
                    <td></td>
                    <td></td>

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




    public function listofertasPopuphomes(){
   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_ofertas group by email_ofe");

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



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en ofertas
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr>
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr  >

                    <td ><?php echo $row['email_ofe']; ?></td>
                    <td></td>
                    <td></td>

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





}
?>
