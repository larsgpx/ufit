<?php
class Ofertas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}


	public function newOfertas()
	{

	$db_Full = new db_model(); $db_Full->conectar();	
	$sqls1 = " SELECT * FROM tbl_tipos";
	$querys1 = $db_Full->select_sql($sqls1);

	$sqls2 = " SELECT * FROM tbl_categorias_ofertas";
	$querys2 = $db_Full->select_sql($sqls2);

	?>




<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var precio = document.clientes.elements['precio'];
	var codigo = document.clientes.elements['codigo'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];
	var imagen3 = document.clientes.elements['imagen3'];
	var imagen4 = document.clientes.elements['imagen4'];
	var imagen5 = document.clientes.elements['imagen5'];
	var imagen6 = document.clientes.elements['imagen6'];
	var imagen7 = document.clientes.elements['imagen7'];
	var tipo = document.clientes.elements['tipo'];
	var descripcion = document.clientes.elements['descripcion'];

	if(titulo.value == ""){
		alert("Ingrese Título de la Oferta");
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





	document.clientes.action="ofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="ofertas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA OFERTA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Título Oferta</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo"  class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Precio</label>
                <div class="col-sm-10">
                  <input type="text" name="precio"  class="form-control" />
                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Precio de oferta</label>
                <div class="col-sm-10">
                  <input type="text" name="precio_oferta"  class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Código</label>
                <div class="col-sm-10">
                  <input type="text" name="codigo"  class="form-control" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Prenda</label>
                <div class="col-sm-10">
                  <select class="form-control" id="tipo"  name="tipo">
					<option value=''> Seleccione Tipo</option>
						<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
                        <option value='<?php echo $rows1['id_tipo'] ?>'><?php echo $rows1['nombre_tipo'] ?></option>
                        <?php } ?>
					</select>
                 </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Categorías de Ofertas</label>
                <div class="col-sm-10">
                  <select class="form-control" id="categoria"  name="categoria">
					<option value=''> Seleccione Categoría de Oferta</option>
						<?php while($rows2 = mysqli_fetch_assoc($querys2)){?>
                        <option value='<?php echo $rows2['id_cate_oferta'] ?>'><?php echo $rows2['nombre_cate_oferta'] ?></option>
                        <?php } ?>
					</select>
                 </div>
              </div>



               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 470x660 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen7" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
                  </div>

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea type="text" name="descripcion" cols="10" rows="4"  class="form-control" ></textarea>
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

	public function addOfertas(){


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



		$query = $db_Full->select_sql("SELECT titulo_producto from tbl_productos where titulo_producto='".$_POST['titulo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$tipo=   $row['titulo_producto'];

		// if($tipo=="")
		// {
		//

		$query = $db_Full->select_sql("INSERT INTO  tbl_productos VALUES ('','".$_POST['titulo']."' , '".$_POST['precio']."' , '".$_POST['descripcion']."' , '".$_POST['codigo']."' , '".$_POST['tipo']."' , '".$name_pfd1[0].'.'.$ext1."' ,'".$_POST['precio_oferta']."' ,'SI' , 0 , '".$name_pfd2[0].'.'.$ext2."' , '".$name_pfd3[0].'.'.$ext3."' , '".$name_pfd4[0].'.'.$ext4."' , '".$name_pfd5[0].'.'.$ext5."' , '".$name_pfd6[0].'.'.$ext6."' , '".$name_pfd7[0].'.'.$ext7."' )");


		$query1 = $db_Full->select_sql("SELECT MAX(id_producto) as maximo from tbl_productos  ");
        $row1   = mysqli_fetch_assoc($query1);
		$maximo=$row1['maximo'];

		$query = $db_Full->select_sql("INSERT INTO  tbl_ofertas VALUES ('','".$_POST['desde']."' , '".$_POST['hasta']."' , '".$maximo."' , '".$_POST['categoria']."'
		                          , 'HABILITADO' )");

		location("ofertas");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	    // }

	}


	public function editOfertas(){
    $db_Full = new db_model(); $db_Full->conectar();
	$sqls1 = " SELECT * FROM tbl_tipos";
	$querys1 = $db_Full->select_sql($sqls1);

	$sqls2 = " SELECT * FROM tbl_categorias_ofertas";
	$querys2 = $db_Full->select_sql($sqls2);

       $obj =  new Oferta($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var titulo = document.clientes.elements['titulo'];
	var precio = document.clientes.elements['precio'];
	var codigo = document.clientes.elements['codigo'];

	var tipo = document.clientes.elements['tipo'];
	var descripcion = document.clientes.elements['descripcion'];

	if(titulo.value == ""){
		alert("Ingrese Título de la Oferta");
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




	if(descripcion.value == ""){
		alert("Ingrese descripción del Producto");
		descripcion.focus();
		return false;
	}





	document.clientes.action="ofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="ofertas" class="btn btn-default btn-block">ATRÁS</a>
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

             <div class="form-group">
                <label class="col-sm-2 control-label">Título Producto</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" value="<?php echo $obj->__get('_titulo'); ?>"  class="form-control" />
                   <input type="hidden" name="id_producto" value="<?php echo $obj->__get('_id_producto'); ?>"  class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Precio</label>
                <div class="col-sm-10">
                  <input type="text" name="precio" value="<?php echo $obj->__get('_precio'); ?>"  class="form-control" />
                </div>
              </div>





              <div class="form-group">
                <label class="col-sm-2 control-label">Precio de oferta</label>
                <div class="col-sm-10">
                  <input type="text" name="precio_oferta" value="<?php echo $obj->__get('_precio_oferta'); ?>"  class="form-control" />
                </div>
              </div>



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
						<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
                        <option value='<?php echo $rows1['id_tipo'] ?>' <?php if($obj->__get('_fktipo')==$rows1['id_tipo']){ echo "selected"; } ?>><?php echo $rows1['nombre_tipo'] ?></option>
                        <?php } ?>
					</select>
                 </div>
              </div>



               <div class="form-group">
                <label class="col-sm-2 control-label">Categorías de Ofertas</label>
                <div class="col-sm-10">
                  <select class="form-control" id="categoria"  name="categoria">
					   <?php while($rows2 = mysqli_fetch_assoc($querys2)){?>
                        <option value='<?php echo $rows2['id_cate_oferta'] ?>' <?php if($obj->__get('_fkcategoria')==$rows2['id_cate_oferta']){ echo "selected"; } ?> ><?php echo $rows2['nombre_cate_oferta'] ?></option>
                        <?php } ?>
					</select>
                 </div>
              </div>




               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 470x660 px
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



              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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
                <label class="col-sm-2 control-label">Imagen interna principal del producto</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen7" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 500x500 px
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

	public function updateOfertas()
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



		$query = $db_Full->select_sql("UPDATE  tbl_productos SET titulo_producto='".$_POST['titulo']."'
		                                               , precio_producto='".$_POST['precio']."'
													   , descripcion_producto='".$_POST['descripcion']."'
													   , codigo_producto='".$_POST['codigo']."'
													   , fktipo_producto='".$_POST['tipo']."'
													   , precio_oferta_producto='".$_POST['precio_oferta']."'
													   WHERE id_producto = '".$_POST['id_producto']."' ");


		$query = $db_Full->select_sql("UPDATE  tbl_ofertas SET fkcategoria_oferta='".$_POST['categoria']."' WHERE id_oferta = '".$_GET['id']."' ");


		location("ofertas");


	}



	public function deleteOfertas()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_ofertas WHERE id_oferta = '".$_GET['id']."'");
		location("ofertas");
	}





	public function listOfertas(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql(" SELECT * FROM tbl_ofertas,tbl_productos,tbl_tipos WHERE fkproducto_oferta=id_producto and  id_tipo=fktipo_producto   ");

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

    <a href="ofertas?action=new" class="btn btn-default btn-block">AGREGAR NUEVA OFERTA</a>
<br>




<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Ofertas
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th  >Producto</th>
                <th  >Tipo de Prenda</th>
                <th  >Agregar Fotos</th>
                <th  >Agregar Características</th>
                <th >Editar</th>
                <th >Eliminar</th>
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
                    	<a class="btn btn-default btn-block"  href="ofertas?id=<?php echo $row['id_oferta'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("ofertas",<?php echo $row['id_oferta'] ?>,"delete")>ELIMINAR</a>
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
















	public function fotosOfertas()
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



	document.clientes.action="ofertas?action="+opcion+"&id="+id;
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
				<th >Foto</th>
                <th >Eliminar</th>
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









	public function add_producto_fotosOfertas()
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

		$query = $db_Full->select_sql("INSERT INTO  tbl_productos_fotos VALUES ('', '".$_POST['id_producto']."' , '".$name_pfd1[0].'.'.$ext1."' , '' )");


		location("productos_fotos?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=fotos");

	}





	public function delete_productos_fotosOfertas()
	{  $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_fotos WHERE id_productos_fotos='".$_GET['id']."' ");
		location("productos_fotos?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=fotos");
	}


















	public function caracteristicasOfertas()
	{  $db_Full = new db_model(); $db_Full->conectar();

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





	document.clientes.action="ofertas?action="+opcion+"&id="+id;
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
                 <th  ></th>
                <th  >Titulo</th>
                <th  >Detalle</th>
                <th  >Descripción</th>
                <th >Eliminar</th>
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







	public function add_producto_caracteristicasOfertas()
	{   $db_Full = new db_model(); $db_Full->conectar();
        $query = $db_Full->select_sql("INSERT INTO  tbl_productos_caracteristicas  VALUES ('', '".$_POST['titulo']."' , '".$_POST['detalle']."' , '".$_POST['descripcion']."' , '".$_POST['id_producto']."' , '0' )");

		location("productos_caracteristicas?id_tipo=".$_POST['id_tipo']."&id_producto=".$_POST['id_producto']."&action=caracteristicas");

	}





	public function delete_productos_caracteristicasOfertas()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_productos_caracteristicas WHERE id_cara = '".$_GET['id']."'");
		location("productos_caracteristicas?id_producto=".$_GET['id_producto']."&id_tipo=".$_GET['id_tipo']."&action=caracteristicas");
	}














}
?>
