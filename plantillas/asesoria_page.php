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

                    $url = (!empty($row_marcas_2['url_page_tbl'])) ? $BASE_URL.$row_marcas_2['url_page_tbl'] : '#';
                    if($i % 3 == 0){
                        ?>

            <div class="col-sm-4 text-center fuente_georgia">
                <a href="<?php echo $url ?>">
                    <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $row_marcas_2["foto1_ase"];?>" alt="" class="img-responsive">
                </a>
                <h4 class="section-title"><?php echo  $row_marcas_2["titulo_ase"]; ?></h4>
                <hr>
                <p><?php echo  $row_marcas_2["subtitulo_ase"]; ?></p>
                <a class="btn-black" href="<?php echo $url?>">Quiero saber más</a>
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
                <a href="<?php echo $url ?>">
                    <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $row_marcas_2["foto1_ase"];?>" alt="" class="img-responsive">
                </a>
                <h4 class="section-title"><?php echo  $row_marcas_2["titulo_ase"]; ?></h4>
                <hr>
                <p><?php echo  $row_marcas_2["subtitulo_ase"]; ?></p>
                <a class="btn-black" href="<?php echo $url?>">Quiero saber más</a>
                <div class="height-30 visible-xs"></div>
            </div>

                        <?php
                    } $i++;
                }

            ?>
        </div>
    </div>
</section>

