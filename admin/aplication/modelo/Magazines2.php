<?php
class Magazines{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newMagazines()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	var descripcion = document.clientes.elements['descripcion'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];
	var imagen3 = document.clientes.elements['imagen3'];
	var imagen4 = document.clientes.elements['imagen4'];
	var imagen5 = document.clientes.elements['imagen5'];
	var imagen6 = document.clientes.elements['imagen6'];
	var imagen7 = document.clientes.elements['imagen7'];

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
		alert("Ingrese imagen");
		imagen1.focus();
		return false;
	}


	if(imagen2.value == ""){
		alert("Ingrese imagen");
		imagen2.focus();
		return false;
	}


	if(imagen3.value == ""){
		alert("Ingrese imagena");
		imagen3.focus();
		return false;
	}



	if(imagen4.value == ""){
		alert("Ingrese imagen");
		imagen4.focus();
		return false;
	}



	if(imagen5.value == ""){
		alert("Ingrese imagen");
		imagen5.focus();
		return false;
	}




	if(imagen6.value == ""){
		alert("Ingrese imagen");
		imagen6.focus();
		return false;
	}




	if(imagen7.value == ""){
		alert("Ingrese imagen");
		imagen7.focus();
		return false;
	}




	document.clientes.action="magazine?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="magazine" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO MAGAZINE
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
                <label class="col-sm-2 control-label">Imagen Principal de lista de Magazine </label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Principal Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 560x520 px
                  </div>

                </div>
              </div>



               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen7" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
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

	public function addMagazines(){

		$db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("SELECT titulo_ma from tbl_magazines where titulo_ma='".$_POST['titulo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$asesoria=$row['titulo_ma'];

		 if($asesoria=="")
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
				$type3 = $_FILES['imagen3']['type'];
				$size3 = $_FILES['imagen3']['size'];

				move_uploaded_file($temp3,$destino3.$name3);
				$name_pfd3= explode(".",$name3);
		}



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
		}



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
		}



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
		}



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
		}




		$query = $db_Full->select_sql("INSERT INTO  tbl_magazines VALUES ('','".$_POST['titulo']."' , '".$_POST['subtitulo']."' , '".$_POST['descripcion']."' , '".$name_pfd1[0].'.'.$ext1."' , '".$name_pfd2[0].'.'.$ext2."' , '".$name_pfd3[0].'.'.$ext3."' , '".$name_pfd4[0].'.'.$ext4."' , '".$name_pfd5[0].'.'.$ext5."' , '".$name_pfd6[0].'.'.$ext6."' , '".$name_pfd7[0].'.'.$ext7."' , '0' )");


		location("magazine");
		 }else
		 {
		echo '<script>alert("Estos datos ya existen");</script>';
		 location("magazine");
	     }

	}


	public function editMagazines(){


       $obj =  new Magazine($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var subtitulo = document.clientes.elements['subtitulo'];
	var descripcion = document.clientes.elements['descripcion'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];
	var imagen3 = document.clientes.elements['imagen3'];
	var imagen4 = document.clientes.elements['imagen4'];
	var imagen5 = document.clientes.elements['imagen5'];
	var imagen6 = document.clientes.elements['imagen6'];
	var imagen7 = document.clientes.elements['imagen7'];

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

	document.clientes.action="magazine?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="magazine" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR MAGAZINE
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
                  <input type="hidden" name="ini_url" class="form-control ini_url" value="catalogo/" />
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
                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control" ><?php echo $obj->__get('_descripcion'); ?></textarea>
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Principal de lista de Magazine </label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
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
                <label class="col-sm-2 control-label">Imagen Principal Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 560x520 px
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
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                   <?php
				  if($obj->__get('_foto3')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto3') ?>"  >
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
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                   <?php
				  if($obj->__get('_foto4')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto4') ?>"  >
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
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                   <?php
				  if($obj->__get('_foto5')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto5') ?>"  >
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
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                   <?php
				  if($obj->__get('_foto6')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto6') ?>"  >
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
                <label class="col-sm-2 control-label">Imagen Pequeña Interna de Magazine</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen7" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 115x105 px
                  </div>

                   <?php
				  if($obj->__get('_foto7')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto7') ?>"  >
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

	public function updateMagazines()
	{   
		$db_Full = new db_model(); $db_Full->conectar();
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
			$update1 = " foto1_ma = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update1." WHERE id_ma = '".$_GET['id']."' ");
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
			$update2 = " foto2_ma = '".$name_pfd2[0].'.'.$ext2."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update2." WHERE id_ma = '".$_GET['id']."' ");
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
			$update3 = " foto3_ma = '".$name_pfd3[0].'.'.$ext3."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update3." WHERE id_ma = '".$_GET['id']."' ");
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
			$update4 = " foto4_ma = '".$name_pfd4[0].'.'.$ext4."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update4." WHERE id_ma = '".$_GET['id']."' ");
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
			$update5 = " foto5_ma = '".$name_pfd5[0].'.'.$ext5."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update5." WHERE id_ma = '".$_GET['id']."' ");
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
			$update6 = " foto6_ma = '".$name_pfd6[0].'.'.$ext6."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update6." WHERE id_ma = '".$_GET['id']."' ");
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
			$update7 = " foto7_ma = '".$name_pfd7[0].'.'.$ext7."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_magazines SET ".$update7." WHERE id_ma = '".$_GET['id']."' ");
		}

		$query = $db_Full->select_sql("UPDATE tbl_magazines 
									   SET titulo_ma  ='".$_POST['titulo']."' ,
									   subtitulo_ma   ='".$_POST['subtitulo']."' ,
									   url_page_tbl   ='".$_POST['url']."' ,
		                               descripcion_ma ='".$_POST['descripcion']."'   
		                               WHERE id_ma    = '".$_GET['id']."' ");

		$query_page = $db_Full->select_sql("SELECT id_tabla_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$_GET['id']."' and tabla_page_tbl='tbl_magazines' and plantilla_page_tbl='catalogo_detalle'  ");

		if(mysqli_num_rows($query_page)){ //echo $_POST['url']; exit;
				$query = $db_Full->select_sql("UPDATE  tbl_page 
											   SET titulo_page_tbl='".$_POST['titulo']."', 
											   url_page_tbl='".$_POST['url']."' ,
											   id_tabla_page_tbl =".$_GET['id'].",
											   visible_page = 0,
											   estado_page_tbl = 'a', 
											   tipo_url_page = 'i',
											   fk_id_menu = 3, 
											   plantilla_page_tbl='catalogo_detalle' 
											   WHERE id_tabla_page_tbl = '".$_GET['id']."' and tabla_page_tbl='tbl_magazines' and 
											   plantilla_page_tbl='catalogo_detalle' ");
		}
		else{
				$data = array(
	                          "titulo_page_tbl"     => $_POST['titulo'],
	                          "url_page_tbl"        => $_POST['url'],
	                          "tabla_page_tbl"      => "tbl_magazines",
	                          "id_tabla_page_tbl"   => $_GET['id'],
	                          "visible_page"        => 1,
	                          "estado_page_tbl"     => 'a',
	                          "tipo_url_page"       => "i",
	                          "fk_id_menu"          => 3,
	                          //"parent_page_tbl"     => $parent,
	                          "plantilla_page_tbl"  => "catalogo_detalle"
	                        );

	        	$query = $db_Full->insert_table("tbl_page",$data);
		}

		location("magazine");
	}



	public function deleteMagazines()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_magazines WHERE id_ma = '".$_GET['id']."'");
		location("magazine");
	}





	public function listMagazines(){
        $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_magazines order by orden_ma asc");

		?>

    
         <?php /*?> 
		 Sirve para elimina un magazine
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

    <a href="magazine?action=new" class="btn btn-default btn-block">AGREGAR MAGAZINE</a>
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
          Lista de Magazine
        </div>
        <div id="list_magazine" class="panel-body table-responsive">

            <table id="example0" class="table display">
              <thead>
	                <tr>
	                <!--<th  ></th>-->
		                <th>Título</th>
		                <th>Subtítulo</th>
		                <th>Imagen</th>
		                <th>Editar</th>
		                <th>Aper./cier. col.</th>
		                <th>N COLUMNAS</th>
		                <th>ORDEN</th>
		                <th>Relacionar Productos</th>

	              	<?php /*?>  <th >Eliminar</th><?php */?>
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
                    <td ><?php echo $row['titulo_ma']; ?></td>
                    <td ><?php echo $row['subtitulo_ma']; ?></td>
                    <td valign="top" >
                    	  <?php
						  if($row['foto1_ma']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto1_ma'] ?>" width="100"  >
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
                    	<a class="btn btn-default btn-block"  href="magazine?id=<?php echo $row['id_ma'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	
			            <select class="apertura_columna" name="columnas_aper[]">
			            	<?php 
			            		$op = array(0 => "Ninguno", 1 => "Abrir bloque", 2 => "Cerrar bloque");
				            	for($i = 0; $i <= 2 ; $i++){
				            		$v2 = ($row['apertura_columnas_magazines'] == $i) ? 'selected' : '';
				            		echo '<option value="'.$i.'" '.$v2.'>'.$op[$i].'</option>';
				            	}
			            	?>
			            </select>
			            <?php $v = $row['numero_columna_magazines_aper'];?>
			            <input type="number" class="anumero_columnas" name="anumero_columnas[]" min="0" max="12" value="<?php echo $v;?>">
                    </td>
                    <td>
                    	<input type="hidden" class="tipo"  name="tipo_marca[]" value="<?php echo $row['id_ma'];?>">
			            <?php $v = $row['numero_columna_magazines'];?>
			            <input type="number" class="numero_columnas" name="numero_columnas[]" min="0" max="12" value="<?php echo $v;?>">
                    </td>
                    <td>
                    	<?php $v2 = ($row['orden_tipo_magazines'] != 0) ? $row['orden_tipo_magazines'] : 0?>
			            <input type="number" class="orden_imagen" min="0" name="orden_imagen[]" value="<?php echo $v2;?>">
                    </td>
                    
                    <td>
                    	<a class="btn btn-default btn-block"  href="magazine?id=<?php echo $row['id_ma'] ?>&amp;action=relacionar">RELACIONAR PRODUCTOS</a>
                    </td>
                    <?php /*?><td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("magazine",<?php echo $row['id_ma'] ?>,"delete")>ELIMINAR</a>
                    </td><?php */?>

			</tr>
                <?php
			$w++;
			}
			?>

               </tbody>
            </table>

            <span type="button" id="update_imagenes" onclick="updateImagenesColumnasMagazine(this,'gallery_magazine','#list_magazine');" class="btn btn-green">Actualizar todo</span>
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

















	public function relacionarMagazines()
	{
	
	$db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_productos ";
    $query = $db_Full->select_sql($sql);
	$obj =  new Magazine($_GET['id']);

	$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
	$querys1 = $db_Full->select_sql($sqls1);

	$validar_check=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." ");
    $contador = mysqli_num_rows($validar_check);     
        
   
   ?>

		<script>
		var lista=new Array();	

		<?php
		while($row_check = mysqli_fetch_assoc($validar_check))
		{
				$lista_productos[]=$row_check['fkproducto_ma_pro'];
		?>	
				lista.push(<?php echo $row_check['fkproducto_ma_pro'];?>);
		<?php
		}
		?>

 
		
		function enviar_tipos_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_tipos_relacionar_magazine&id=<?php echo $_GET['id']; ?>",
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
		                  url: "ubigeos.php?tipe=lista_marcas_relacionar_magazine&id=<?php echo $_GET['id']; ?>",
		                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
		                  success: function(data)
		                  {
		                     $("#relacionar_productos").html(data);
		                  }
		            });

		}
		</script>


  <a href="magazine" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
  	<br>
  	<table>
  	<tr>
  	   <td align="center">Magazine:  <B> <?PHP ECHO $obj->__get('_titulo'); ?> </B> se relacionará con :</td>
  	</tr>
  	</table>
  </div>
                   

 
<form name="f1" action="" method="post" >

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
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='magazine?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 </td>
			  </tr>
    </table>

    	<div id="relacionar_productos">
    		<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
            
    		

            <table id="example1" class="table display">
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
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." and fkproducto_ma_pro=".$row['id_producto']."");
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







function addrelacionarMagazines()
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
			$DelQuery=$db_Full->select_sql( " DELETE FROM tbl_magazines_productos WHERE fkproducto_ma_pro=".$row1['id_producto']."  ");
		}



		/*
		for($j=0; $j<sizeof($_POST['seccion']);$j++)
		{
			if($_POST['seccion'][$j])
			{
			 	$array_1 =array(
			 			"fkproducto_ma_pro" => $_POST['seccion'][$j],
			 			"fkmagazine_ma_pro" => $_GET['id']
			 		); 
			 	array_push($array_2, $array_1);
			}
		}*/

		$array_2=array();
		$cadena = $_POST['lista_productos'];
		$array = explode(",", $cadena);

		foreach ($array as $clave=>$valor)
   		{	
   			if($valor!=0)
   			{
	   			$array_1 =array(
				 			"fkproducto_ma_pro" => $valor,
				 			"fkmagazine_ma_pro" => $_GET['id']
				 		); 
	   			array_push($array_2, $array_1);
   			}
   		}
		$Query= $db_Full->insert_batch("tbl_magazines_productos",$array_2);
		
		location("magazine?action=relacionar&id=".$_GET['id']);

}








}
?>
