<?php
//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<?php
include("head.php");
include("header.php");
?>

<!-- Sección de Asesoría personal -->
<section id="asesoria">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center fuente_georgia font_size28 section-title">Asesoramiento Experto<br><small>Asesoramiento, Consejos, Información e inspiración</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>
        <div class="row">

            <?php

                $i = 1;

                $result = $db_Full->select_sql("SELECT * FROM tbl_asesorias order by orden_ase asc");
                while ($row_marcas_2 = mysqli_fetch_array($result)){
                    if($i%3==0){
                        ?>

            <div class="col-sm-4 text-center fuente_georgia">
                <a href="A-<?php echo  $row_marcas_2['id_ase']; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["titulo_ase"])); ?>"><img src="webroot/archivos/<?php echo $row_marcas_2["foto1_ase"];?>" alt="" class="img-responsive"></a>
                <h4 class="section-title"><?php echo  $row_marcas_2["titulo_ase"]; ?></h4>
                <hr>
                <p><?php echo  $row_marcas_2["subtitulo_ase"]; ?></p>
                <a class="btn-black" href="A-<?php echo  $row_marcas_2['id_ase']; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["titulo_ase"])); ?>">Quiero saber más</a>
                <div class="height-30 visible-xs"></div>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>
        <div class="row">

                        <?php
                    }else{
                        ?>

            <div class="col-sm-4 text-center fuente_georgia">
                <a href="A-<?php echo  $row_marcas_2['id_ase']; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["titulo_ase"])); ?>"><img src="webroot/archivos/<?php echo $row_marcas_2["foto1_ase"];?>" alt="" class="img-responsive"></a>
                <h4 class="section-title"><?php echo  $row_marcas_2["titulo_ase"]; ?></h4>
                <hr>
                <p><?php echo  $row_marcas_2["subtitulo_ase"]; ?></p>
                <a class="btn-black" href="A-<?php echo  $row_marcas_2['id_ase']; ?>-<?php echo str_replace(' ','-',strtolower($row_marcas_2["titulo_ase"])); ?>">Quiero saber más</a>
                <div class="height-30 visible-xs"></div>
            </div>

                        <?php
                    } $i++;
                }

            ?>
        </div>
    </div>
</section>

<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
