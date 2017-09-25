<?php
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
include("admin/aplication/modelo/modelo_base_datos.php");
$BASE_URL="";
include("head.php");
include("header.php");
?>

 <?php
 $db_Full = new db_model(); 
$db_Full->conectar(); 
 $result = $db_Full->select_sql("SELECT * FROM tbl_magazines where id_ma='".$_GET['id']."' order by orden_ma asc");
 while ($row_marcas_2 = mysqli_fetch_array($result))
 {
	 $titulo=$row_marcas_2["titulo_ma"];
	 $subtitulo=$row_marcas_2["subtitulo_ma"];
	 $descripcion=$row_marcas_2["descripcion_ma"];
	 $foto2=$row_marcas_2["foto2_ma"];
	 $foto3=$row_marcas_2["foto3_ma"];
	 $foto4=$row_marcas_2["foto4_ma"];
	 $foto5=$row_marcas_2["foto5_ma"];
	 $foto6=$row_marcas_2["foto6_ma"];
	 $foto7=$row_marcas_2["foto7_ma"];
 }
 ?>



<!--DETALLE ASESORIA-->
<div class="base_magazine">

	<table cellpadding="0" cellspacing="0" width="100%">
    <tr><td height="40"><td align="right" ><a href = "javascript:history.back()" class="fuente_georgia font_size14 backToCategory" style="color:#000000; text-decoration:none;"><i>Volver a CATÁLOGO</i></a></td></td></tr>
    </table>

    <div class="left_magazine">
    <table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr>
    	<td><img src="webroot/archivos/<?php echo $foto2;?>" width="100%"></td>
    </tr>
    </table>
    </div>

    <div class="right_magazine">

    	<div class="foto_magazine">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td><img src="webroot/archivos/<?php echo $foto3;?>" width="100%"></td>
            </tr>
            </table>
        </div>

        <div class="foto_magazine">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td><img src="webroot/archivos/<?php echo $foto4;?>" width="100%"></td>
            </tr>
            </table>
        </div>

        <div class="foto_magazine">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td><img src="webroot/archivos/<?php echo $foto5;?>" width="100%"></td>
            </tr>
            </table>
        </div>


        <div class="foto_magazine">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td><img src="webroot/archivos/<?php echo $foto6;?>" width="100%"></td>
            </tr>
            </table>
        </div>


        <div class="foto_magazine">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td><img src="webroot/archivos/<?php echo $foto7;?>" width="100%"></td>
            </tr>
            </table>
        </div>



        <div class="texto_magazine">
            <table cellpadding="0" cellspacing="0" width="80%" align="center">
            <tr><td height="50"></td></tr>
            <tr>
            <td align="center" class="fuente_georgia font_size18"><i><?php echo $subtitulo; ?></i></td>
            </tr>
            <tr><td height="10"></td></tr>
            <tr>
            <td align="center" class="fuente_georgia font_size35"><?php echo $titulo; ?> </td>
            </tr>
            <tr><td height="30"></td></tr>
            <tr>
            <td align="center" class="fuente_georgia font_size14">
            	<?php echo $descripcion; ?>
            </td>
            </tr>
            </table>
        </div>


    </div>






<!-- Contenido nuevo -->
<section id="catalogo-muestras">
	<div class="container">
		
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
                 <?php
				 $cantidad=0;
				 $result10 = $db_Full->select_sql("SELECT tbl_productos.url_page_tbl as url,foto_producto,titulo_producto,codigo_producto,nombre_marca,precio_producto,precio_oferta_producto,descuento_producto FROM tbl_magazines_productos,tbl_productos,tbl_marcas,tbl_productos_marcas
										   where id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and
										   fkproducto_ma_pro=id_producto and fkmagazine_ma_pro='".$_GET['id']."' group by id_producto ");
				 while ($row10 = mysqli_fetch_array($result10))
				 {
				 	if($cantidad % 3 != 0)
					{
		    		?>
					<div class="col-sm-4">
						<a href="<?php echo $BASE_URL.$row10['url']; ?>"><img src="webroot/archivos/<?php echo $row10['foto_producto'];?>" alt="" class="img-responsive"></a>
						<h5><?php echo $row10['titulo_producto'];?><br><small><?php echo $row10['codigo_producto'];?></small></h5>
						<span><?php echo $row10['nombre_marca'];?><br>S/. <?php echo $row10['precio_producto'] - ($row10['precio_producto']*$row10['descuento_producto']/100); ?></span>
					</div>
					<?php
					}else
					{
					?>
				</div>
				<div class="row">
					<div class="height-30"></div>
					<div class="height-30"></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<a href="<?php echo $BASE_URL.$row10['url']; ?>"><img src="webroot/archivos/<?php echo $row10['foto_producto'];?>" alt="" class="img-responsive"></a>
						<h5><?php echo $row10['titulo_producto'];?><br><small><?php echo $row10['codigo_producto'];?></small></h5>
						<span><?php echo $row10['nombre_marca'];?><br>S/. <?php echo $row10['precio_producto'] - ($row10['precio_producto']*$row10['descuento_producto']/100); ?></span>
					</div>
					 <?php
					}
				$cantidad++;	
				}
				?>
				</div>
				
                
                
			</div>
		</div>
	</div>
</section>


    <table cellpadding="0" cellspacing="0" width="100%">
    <tr><td height="60"></td></tr>
    </table>


</div>
<!--DETALLE ASESORIA-->





<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
