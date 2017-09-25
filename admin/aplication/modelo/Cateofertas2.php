<?php
class Cateofertas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newCateofertas()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var tipo = document.clientes.elements['tipo'];
	var imagen1 = document.clientes.elements['imagen1'];
	var imagen2 = document.clientes.elements['imagen2'];

	if(tipo.value == ""){
		alert("Ingrese Categoría de Ofertas");
		tipo.focus();
		return false;
	}


	if(imagen1.value == ""){
		alert("Ingrese imagen de la categoría");
		imagen1.focus();
		return false;
	}



	if(imagen2.value == ""){
		alert("Ingrese banner de la categoría");
		imagen2.focus();
		return false;
	}




	document.clientes.action="cateofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="cateofertas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA CATEGORÍA DE OFERTAS
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Categoría de Ofertas</label>
                <div class="col-sm-10">
                  <input type="text" name="tipo"  class="form-control" />
                </div>
              </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la categoría</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 395x270 px
                  </div>

                </div>
              </div>


                <div class="form-group">
                <label class="col-sm-2 control-label">Banner de la categoría</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />

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

	public function addCateofertas(){
		$db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("SELECT nombre_cate_oferta from tbl_categorias_ofertas where nombre_cate_oferta='".$_POST['tipo']."' ");
        $row   = mysqli_fetch_assoc($query);
		$tipo=$row['nombre_cate_oferta'];

		// if($tipo=="")
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



		$query = $db_Full->select_sql("INSERT INTO tbl_categorias_ofertas VALUES ('','".$_POST['tipo']."' , '".$name_pfd1[0].'.'.$ext1."' , '".$name_pfd2[0].'.'.$ext2."' )");


		location("cateofertas");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	  //   }

	}


	public function editCateofertas(){


       $obj =  new Cateoferta($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var tipo = document.clientes.elements['tipo'];

	if(tipo.value == ""){
		alert("Ingrese Categoría de Ofertas");
		tipo.focus();
		return false;
	}

	document.clientes.action="cateofertas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

 <a href="cateofertas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR CATEGORÍA DE OFERTAS
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
                <label class="col-sm-2 control-label">Categoría de Ofertas</label>
                <div class="col-sm-10">
                  <input type="text" name="tipo"  class="form-control generar_url" value="<?php echo $obj->__get('_nombre'); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="hidden" name="url" class="form-control ini_url" value="ofertas/" />
                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $obj->__get('_url'); ?>" />
                  <input type="hidden" name="url" class="form-control mostrar_url" value="" />
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen de la categoría</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 395x270 px
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
                <label class="col-sm-2 control-label">Banner de la categoría</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen2" class="form-control" />



                  <?php
				  if($obj->__get('_banner')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_banner') ?>"  >
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

	public function updateCateofertas()
	{   $db_Full       = new db_model(); $db_Full->conectar();
		if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
		{
			$destino1  = "../webroot/archivos/";
			$name1     = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
			$temp1     = $_FILES['imagen1']['tmp_name'];
			$type1     = $_FILES['imagen1']['type'];
			$size1     = $_FILES['imagen1']['size'];
			$ext1      = end(explode(".", $name1));
			move_uploaded_file($temp1,$destino1.$name1);
			$name_pfd1 = explode(".",$name1);
			$update1   = " foto_cate_oferta = '".$name_pfd1[0].'.'.$ext1."' ";
			$query     = $db_Full->select_sql("UPDATE  tbl_categorias_ofertas SET ".$update1." WHERE id_cate_oferta = '".$_GET['id']."' ");
		}


		if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
		{
			$destino2  = "../webroot/archivos/";
			$name2     = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
			$temp2     = $_FILES['imagen2']['tmp_name'];
			$type2     = $_FILES['imagen2']['type'];
			$size2     = $_FILES['imagen2']['size'];
			$ext2      = end(explode(".", $name2));
			move_uploaded_file($temp2,$destino2.$name2);
			$name_pfd2 = explode(".",$name2);
			$update2   = " banner_cate_oferta = '".$name_pfd2[0].'.'.$ext2."' ";
			$query     = $db_Full->select_sql("UPDATE  tbl_categorias_ofertas SET ".$update2." WHERE id_cate_oferta = '".$_GET['id']."' ");
		}


		$query = $db_Full->select_sql("UPDATE tbl_categorias_ofertas SET nombre_cate_oferta='".$_POST['tipo']."',url_page_tbl = '".$_POST['url']."' WHERE id_cate_oferta = '".$_GET['id']."'");

		$query_cat = $db_Full->select_sql("SELECT url_page_tbl FROM tbl_page WHERE tabla_page_tbl = 'tbl_categorias_ofertas' and url_page_tbl = '".$_POST['url']."' and fk_id_menu = 8");

		if(mysqli_num_rows($query_cat)){
		  $query = $db_Full->select_sql("UPDATE tbl_page SET titulo_page_tbl = '".$_POST['tipo']."',estado_page_tbl = 'a', id_tabla_page_tbl=".$_GET['id'].",url_page_tbl='".$_POST['url']."',tabla_page_tbl = 'tbl_categorias_ofertas', visible_page = 1,tipo_url_page = 'i', fk_id_menu = 8, plantilla_page_tbl ='categoria_ofertas',parent_page_tbl = 0 WHERE tabla_page_tbl = 'tbl_categorias_ofertas' and url_page_tbl = '".$_POST['url']."' and fk_id_menu = 8");
		}

		else{
				$data = array(
	                          "titulo_page_tbl"     => $_POST['tipo'],
	                          "url_page_tbl"        => $_POST['url'],
	                          "tabla_page_tbl"      => "tbl_categorias_ofertas",
	                          "id_tabla_page_tbl"   => $_GET['id'],
	                          "visible_page"        => 1,
	                          "estado_page_tbl"     => 'a',
	                          "tipo_url_page"       => "i",
	                          "fk_id_menu"          => 8,
	                          "parent_page_tbl"     => 0,
	                          "plantilla_page_tbl"  => "categoria_ofertas"
	                        );

	          	$query = $db_Full->insert_table("tbl_page",$data);
		}


		location("cateofertas");


	}



	public function deleteCateofertas()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_categorias_ofertas WHERE id_cate_oferta = '".$_GET['id']."'");
		location("cateofertas");
	}


	public function listCateofertas(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_categorias_ofertas");

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

    <a href="cateofertas?action=new" class="btn btn-default btn-block">AGREGAR CATEGORIAS DE OFERTAS</a>
<br>



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Categorías de ofertas
        </div>
        <div class="panel-body table-responsive">

            <table  id="example0" class="table display">
            <thead>
               <tr>
                <th  >Titulo</th>
                <th  >Imagen</th>
                <th >Relacionar Productos</th>
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

            <tr>

                    <td ><?php echo $row['nombre_cate_oferta']; ?></td>
                    <td valign="top" width="30%" >
                    	  <?php
						  if($row['foto_cate_oferta']!=".")
						   {
						   ?>
						  <img src="../webroot/archivos/<?php echo $row['foto_cate_oferta'] ?>" width="200"  >
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
                    	<a class="btn btn-default btn-block"  href="cateofertas?id=<?php echo $row['id_cate_oferta'] ?>&action=relacionar">RELACIONAR PRODUCTOS</a>
                    </td>

                    <td>
                    	<a class="btn btn-default btn-block"  href="cateofertas?id=<?php echo $row['id_cate_oferta'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("cateofertas",<?php echo $row['id_cate_oferta'] ?>,"delete")>ELIMINAR</a>
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






public function relacionarCateofertas()
	{
		
    $db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_productos where descuento_producto>0 ";
    $query = $db_Full->select_sql($sql);
	$obj =  new Cateoferta($_GET['id']);

	$sqls1 = " SELECT * FROM tbl_tipos WHERE id_tipo<>'7'";
	$querys1 = $db_Full->select_sql($sqls1);

	$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." ");
	$contador = mysqli_num_rows($validar_check);
   
   ?>

		<script>

			var lista=new Array();	

			<?php
			while($row_check = mysqli_fetch_assoc($validar_check))
			{
					$lista_productos[]=$row_check['fkproducto_re_oferta'];
			?>	
					lista.push(<?php echo $row_check['fkproducto_re_oferta'];?>);
			<?php
			}
			?>


		function enviar_tipos_relacionar(tipo)
		{
			
			$.ajax({
		                  type: "POST",
		                  url: "ubigeos.php?tipe=lista_tipos_relacionar_ofertas&id=<?php echo $_GET['id']; ?>",
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
		                  url: "ubigeos.php?tipe=lista_marcas_relacionar_ofertas&id=<?php echo $_GET['id']; ?>",
		                  data : "tipo="+$('#tipo').val()+"&marca="+$('#marca').val(),
		                  success: function(data)
		                  {
		                     $("#relacionar_productos").html(data);
		                  }
		            });

		}
		</script>


  <a href="categoria-de-oferta" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
  	<table>
  	<tr>
  	   
  		<td width="10"></td>
  		<td align="center">La categoría <B> <?php echo $obj->__get('_nombre'); ?> </B> se relacionará con :</td>
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
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='cateofertas?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." and fkproducto_re_oferta=".$row['id_producto']."");
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






     function addrelacionarCateofertas()
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
			$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_relacionar_productos_ofertas WHERE fkproducto_re_oferta=".$row1['id_producto']." ");
		}


		$array_2=array();
		$cadena = $_POST['lista_productos'];
		$array = explode(",", $cadena);

		foreach ($array as $clave=>$valor)
   		{	
   			if($valor!=0)
   			{
	   			$array_1 =array(
				 			"fkproducto_re_oferta" => $valor,
				 			"fkcategoria_re_oferta" => $_GET['id']
				 		); 
	   			array_push($array_2, $array_1);
   			}
   		}




		$Query= $db_Full->insert_batch("tbl_relacionar_productos_ofertas",$array_2);
		location("cateofertas?action=relacionar&id=".$_GET['id']);
	}




}
?>
