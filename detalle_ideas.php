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
include("header.php");
?>

 <?php
 $result = $db_Full->select_sql("SELECT * FROM tbl_ideas where id_ide='".$_GET['id']."' order by orden_ide asc");
 while ($row_marcas_2 = mysqli_fetch_array($result))
 {
	 $titulo=$row_marcas_2["titulo_ide"];
	 $subtitulo=$row_marcas_2["subtitulo_ide"];
	 $descripcion=$row_marcas_2["descripcion_ide"];
	 $foto2=$row_marcas_2["foto2_ide"];
	 $foto3=$row_marcas_2["foto3_ide"];
	 $foto4=$row_marcas_2["foto4_ide"];
	 $foto5=$row_marcas_2["foto5_ide"];
	 $foto6=$row_marcas_2["foto6_ide"];
	 $foto7=$row_marcas_2["foto7_ide"];
 }
 ?>



<!--DETALLE ASESORIA-->
<div class="base_magazine">

	<table cellpadding="0" cellspacing="0" width="100%">
    <tr><td height="20"></td></tr>
	<tr><td align="right" ><a href="ideas.php" class="fuente_georgia font_size14 backToCategory" style="color:#000000; text-decoration:none;"><i>Volver a "Ideas para regalar"</i></a></td></tr>
	<tr><td height="40"></td></tr>
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


    <div style="width:100%;float:left">
    <table cellpadding="0" cellspacing="0" class="productos_magazine" align="center">
    <tr>
    <td align="center">

          <?php
		 $result10 = $db_Full->select_sql("SELECT * FROM tbl_ideas_productos,tbl_productos,tbl_marcas,tbl_productos_marcas
		                           where id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and
								   fkproducto_ide_pro=id_producto and fkideas_ide_pro='".$_GET['id']."' ");
		 while ($row10 = mysqli_fetch_array($result10))
		 {
	     ?>
               <a href="detalle_producto.php?id_producto=<?php echo $row10['id_producto']; ?>" style="text-decoration:none; color:#000;">
               <div class="item_magazine">
               <table cellpadding="0" cellspacing="0" width="100%">
               <tr>
                <td><img src="webroot/archivos/<?php echo $row10['foto_producto'];?>" width="100%"></td>
               </tr>
               <tr><td height="10"></td></tr>
               <tr>
               		<td class="fuente_georgia font_size12" align="left"><?php echo $row10['titulo_producto'];?></td>
               </tr>
               <tr><td height="5"></td></tr>
               <tr>
               		<td class="fuente_georgia font_size10" align="left"> <?php echo $row10['nombre_marca'];?></td>
               </tr>
               <tr><td height="5"></td></tr>
               <tr>
               		<td class="fuente_georgia font_size14" align="left">$ <?php echo $row10['precio_producto'];?></td>
               </tr>
               <tr><td height="50"></td></tr>
               </table>
               </div>
               </a>

          <?php
		 }
		  ?>

    </td>
    </tr>
    </table>
   	</div>

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
