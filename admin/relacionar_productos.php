

public function relacionarProductos(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos,tbl_tipos WHERE  id_tipo=fktipo_producto  ");

		?>


<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos para Relacionar
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
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








	public function relacionar_finalProductos(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_productos where id_producto!='".$_GET['id']."' order by id_producto asc");
		$obj =  new Producto($_GET['id']);
		?>




    <a href="productos?action=relacionar" class="btn btn-default btn-block">REGRESAR</a>
  <br>


  <div style="font-size:20px;">EL producto <B> <?PHP ECHO $obj->__get('_titulo'); ?> </B>  se relacionará con :</div>
   <?php
				  if($obj->__get('_foto')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>" width="150"  >
                  <?php
				   }else
				   {
				  ?>
				  <img src="../webroot/assets/img/no_image.png" width="100" >
				  <?php
                   }
				  ?>

  <br><br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos a relacionar
        </div>
        <div class="panel-body table-responsive">




		<form name="f1" action="" method="post">
       <table  class="table display">
		  <tr bgcolor="#F2F2F2">
                 <td colspan="4" align="center"  style="padding-top:20px; padding-bottom:20px" >
				 <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='productos?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 </td>
			  </tr>
    </table>

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
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE 	fkproducto1_re_pro=".$_GET['id']." and fkproducto2_re_pro=".$row['id_producto']."");
					$NUM=mysql_num_rows($Query_SA);
					?>
                    <input type="checkbox" name="seccion[]" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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
		</form>

        </div>

      </div>
    </div>
    <!-- End Panel -->



     <?php
      }





	function addrelacionarProductos(){//	FUNCION DE ACCESOS A LOS USUARIOS
		$db_Full = new db_model(); $db_Full->conectar();
		$DelQuery=$db_Full->select_sql( "DELETE FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']."");
		for($j=0; $j<sizeof($_POST['seccion']);$j++){
			if($_POST['seccion'][$j]){
				$Query= $db_Full->select_sql($sql = "INSERT INTO tbl_relacionar_productos VALUES( '' , '".$_GET['id']."' , '".$_POST['seccion'][$j]."'  ) "		);
			}
		}

		location("productos?action=relacionar&id=".$_GET['id']);
	}
