<section id="marcas">
  <div class="container">
    <div class="row">
      <?php

        $i = 1;
        $db_Full = new db_model();
        $db_Full->conectar();
        $result = $db_Full->select_sql("SELECT * FROM tbl_marcas order by orden_marca asc"); 
        while ($row_marcas_2 = mysqli_fetch_array($result)){
          if($i % 3 == 0){
            ?>

      <div class="columna col-sm-4">
        <a href="<?php echo  $row_marcas_2["url_page_tbl"]; ?>">
          <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $row_marcas_2["foto2_marca"];?>" alt="" class="img-responsive">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="height-10"></div>
    </div>
    <div class="row">
            <?php
          }else{
            ?>

      <div class="columna col-sm-4">
        <a href="<?php echo  $row_marcas_2["url_page_tbl"]; ?>">
          <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $row_marcas_2["foto2_marca"];?>" alt="" class="img-responsive">
        </a>
      </div>

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