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
include("head.php");
include("header.php");
?>

<!-- Seccion de marcas -->
<section id="marcas">
  <div class="container">
    <div class="row">
      <?php

        $i = 1;

        $result = $db_Full->select_sql("SELECT * FROM tbl_marcas order by orden_marca asc"); 
        while ($row_marcas_2 = mysqli_fetch_array($result)){
          if($i%3==0){
            ?>

      <div class="col-sm-4"><a href="M-<?php echo  $row_marcas_2["id_marca"]; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["nombre_marca"])); ?>"><img src="webroot/archivos/<?php echo $row_marcas_2["foto2_marca"];?>" alt="" class="img-responsive"></a></div>
    </div>
    <div class="row">
      <div class="height-30"></div>
    </div>
    <div class="row">

            <?php
          }else{
            ?>

      <div class="col-sm-4"><a href="M-<?php echo  $row_marcas_2["id_marca"]; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["nombre_marca"])); ?>"><img src="webroot/archivos/<?php echo $row_marcas_2["foto2_marca"];?>" alt="" class="img-responsive"></a></div>

            <?php
          } $i++;
        }

      ?>
    </div>
  </div>
</section>

<!--LINKS HOME-->
<div class="base_links_home">
	<div class="links_home">
    
       <div class="ancho_link_home_1"><a href="#" class="fuente_georgia font_size13" style="text-decoration:none;color:#000">GIFT CARD</a></div> 
       <div class="ancho_link_home_2"><a href="#" class="fuente_georgia font_size13" style="text-decoration:none;color:#000">ENVÍO INMEDIATO Y GRATUITO*</a></div>
       <div class="ancho_link_home_3"><a href="#" class="fuente_georgia font_size13" style="text-decoration:none;color:#000">FÁCIL DEVOLUCIÓN EN 60 DÍAS</a></div>
       <div class="ancho_link_home_4"><a href="#" class="fuente_georgia font_size13" style="text-decoration:none;color:#000">ENTREGA EN TODO EL MUNDO	MEMBRESIA</a></div>    
    	
    </div>
</div>
<!--FIN LINKS HOME-->


<!--FOOTER-->
<?php
include("footer.php");
?>


</body>    
</html>
