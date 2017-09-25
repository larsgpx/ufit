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


 <?php
 $result = $db_Full->select_sql("SELECT * FROM tbl_asesorias where id_ase='".$_GET['id_asesoria']."' order by orden_ase asc");
 while ($row_marcas_2 = mysqli_fetch_array($result))
 {
	 $titulo=$row_marcas_2["titulo_ase"];
	 $subtitulo=$row_marcas_2["subtitulo_ase"];
	 $descripcion=$row_marcas_2["descripcion_ase"];
	 $foto=$row_marcas_2["foto2_ase"];
 }
 ?>

<!-- Descripción de la asesoría -->
<section id="informacion-asesoria">
  <div class="container fuente_georgia">
    <div class="row">
      <a href="javascript:history.back()" class="pull-right">Volver a <span class="text-uppercase">asesoría</span></a>
    </div>
    <div class="row">
      <h1 class="text-center text-uppercase">The Essentials</h1>
    </div>
    <div class="row">
      <div class="height-30"></div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <h4 class="text-uppercase">Asesoría experta</h4>
        <div class="height-20"></div>
        <ul class="list-unstyled">
          <?php
            $result100 = $db_Full->select_sql(" SELECT * FROM tbl_asesorias order by orden_ase desc limit 10");
            while ($row100 = mysqli_fetch_array($result100)){
          ?>

          <li><a href="A-<?php echo $row100['id_ase'];?>-<?php echo str_replace(' ','-',strtolower($row100['titulo_ase'])); ?>" class="font_size14"><?php echo $row100['titulo_ase'];?></a></li>

          <?php
            }
          ?>
        </ul>
      </div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-6">
            <figure>
              <img src="webroot/archivos/<?php echo $foto;?>" class="img-responsive" alt="" />
            </figure>
          </div>
          <div class="col-sm-6">
            <p>
              <?php echo $descripcion; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ./Descripción de la asesoría -->

<!-- Productos relacionados -->
<section id="productos-relacionados">
  <div class="container fuente_georgia">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-2">
        <div class="row">
          <hr>
        </div>
        <div class="row">
          <?php
            $i=1;
            $result10 = $db_Full->select_sql("SELECT tbl_productos.url_page_tbl as url,foto_producto,titulo_producto,codigo_producto,nombre_marca,precio_producto,precio_oferta_producto FROM tbl_asesorias_productos,tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_ase_pro=id_producto and fkase_ase_pro='".$_GET['id_asesoria']."' group by id_producto ");
            while ($row10 = mysqli_fetch_array($result10)){
          ?>

          <div class="col-sm-4">
            <a href="<?php echo $BASE_URL.$row10['url']; ?>">
              <figure>
                <img src="webroot/archivos/<?php echo $row10['foto_producto'];?>" class="img-responsive" alt="" />
              </figure>
            </a>
            <h5><?php echo $row10['titulo_producto'];?><br><small><?php echo $row10['codigo_producto'];?></small></h5>
            <span><?php echo $row10['nombre_marca'];?><br>$ <?php echo $row10['precio_producto'];?></span>
            <div class="height-20"></div>
          </div>

          <?php
              if($i%3==0){
                ?>
        </div>
        <div class="row">
                <?php
              } $i++;
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ./Productos relacionados -->

<!-- Footer -->
<?php
include("footer.php");
?>



</body>
</html>
