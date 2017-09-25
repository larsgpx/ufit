<?php
include("admin/aplication/modelo/modelo_base_datos.php");
$BASE_URL="";
$db_Full = new db_model(); 
$db_Full->conectar(); 

//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<?php
include("head.php");
include("header.php");
?>




<!--SLIDER-->
<table cellpadding="0" cellspacing="0" width="100%" align="center">
<tr><td height="20"></td></tr>
</table>


<div class="base_slider">
	<div class="slider">

    	 <div id="owl-slider"  class="owl-carousel owl-theme">
         			<?php
         			$sql_ofer=''; // faltaba definir variable 
         			
				  if(isset($_GET['id']) && $_GET['id']!="")
				  {
				  	   $sql_ofer.="SELECT * FROM tbl_categorias_ofertas where id_cate_oferta!='' and id_cate_oferta='".$_GET['id']."'  ";
				  }else
				  {
					  $sql_ofer.="SELECT * FROM tbl_banner_ofertas  ";
				  }

				 $result_ofe = $db_Full->select_sql($sql_ofer);
				 while ($row_ofe = mysqli_fetch_array($result_ofe))
				 {
					   if(isset($_GET['id']) && $_GET['id']!="")
					  {
						   $banner=$row_ofe["banner_cate_oferta"];
					  }else
					  {
						  $banner=$row_ofe["imagen_ba"];
						  $links=$row_ofe["link_ba"];
					  }
				 ?>
                 
						  <?php
                          if(isset($_GET['id']) && $_GET['id']!="")
                          {
						  ?>
                                 <div class="item"><img src="webroot/archivos/<?php echo $banner;?>" style="width:100%" ></div>
                         <?php
                         }else
						 {
                         ?>
                         		<a href="<?php echo $links;?>">
                                 <div class="item"><img src="webroot/archivos/<?php echo $banner;?>" style="width:100%" ></div>
                                </a>
                         <?php
						 }
						 ?>
                   
                   <?php
				 }
				 
				   ?>
          </div>

    </div>
</div>
<!--FIN SLIDER-->



<!-- Contenido nuevo -->
<section id="ofertas-muestras">
	<div class="container">
		
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
        
        <?php
		if(isset($_GET['id']) && $_GET['id']!="")
		{
			$sql="SELECT tbl_productos.url_page_tbl as url,foto_producto,titulo_producto,codigo_producto,nombre_marca,precio_producto,precio_oferta_producto FROM tbl_ofertas,tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas WHERE fkmarca_productos_marcas=id_marca and fkproducto_oferta=id_producto and  id_tipo=fktipo_producto ";
			$sql.=" and fkcategoria_oferta='".$_GET['id']."' group by id_producto ";
		}else
		{
			$sql="SELECT tbl_productos.url_page_tbl as url,foto_producto,titulo_producto,codigo_producto,nombre_marca,precio_producto,precio_oferta_producto FROM tbl_productos,tbl_marcas,tbl_productos_marcas WHERE fkmarca_productos_marcas=id_marca and oferta_producto='SI' group by id_producto ";
		}
		
		$result10 = $db_Full->select_sql($sql);
		$cantidad=0;
		while ($row10 = mysqli_fetch_array($result10))
		{
			
			if($cantidad % 4 != 0)
			{
		    ?>
			<div class="col-sm-3">
				<a href="<?php echo $BASE_URL.$row10['url']; ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
				<h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
				<?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>$ <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">$ <?php echo $row10['precio_oferta_producto']; ?></span>
			</div>
			<?php
			}else
			{
			?>
            </div>
            <div class="row">
                <div class="height-30"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo $BASE_URL.$row10['url']; ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                    <h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
                    <?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>$ <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">$ <?php echo $row10['precio_oferta_producto']; ?></span>
                </div>
            <?php
			}
		$cantidad++;	
		}
	   ?>
	</div>
</section>








<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
