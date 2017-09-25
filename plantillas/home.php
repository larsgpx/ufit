<?php
//Lista slides y sus caracteristicas
$db_Full = new db_model(); 
$db_Full->conectar();
$sql = "SELECT * FROM tbl_banner_home_slides s INNER JOIN tbl_banner_home sl on s.banner_home_id=sl.id order by orden asc";
$query = $db_Full->select_sql($sql);

$cantidad_banners = mysqli_num_rows($query);

?>

<!-- Slider principal de la página web -->
<section id="slider_principal">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <div id="carouselPrincipal" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <?php
            for($p = 0; $p < $cantidad_banners; $p++)
            {
            ?>
            <li data-target="#carouselPrincipal" data-slide-to="<?php echo $p; ?>" class="<?php if($p == "0"){ echo "active"; } ?>"></li>
            <?php
            }
            ?>
        </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <?php

              $i=0;

              while ($bannersHome = mysqli_fetch_array($query))
              {
                if($bannersHome['has_link'] == 1)
                {
            ?>

            <div class="item <?php if($i==0) echo 'active'; ?>">
              <table cellpadding="0" cellspacing="0" width="100%" align="center">
              <tr>
                  <td class="fuente_georgia font_size26" align="center"><?php echo $bannersHome['title'];//$titleHome[1]; ?></td>
              </tr>
              <tr>
                  <td class="fuente_georgia font_size16" align="center"><?php echo $bannersHome['subtitle']; //$titleHome[2]; ?></td>
              </tr>
              <tr><td height="20"></td></tr>
              </table>
              <!--<a href="<?php //echo $bannersHome['link']; ?>"><img class="img-responsive" src="<?php //echo $royaltyUtils->baseUrl() . '/webroot/archivos/' . $bannersHome['image']; ?>" alt=""></a>-->
              <a href="<?php echo $bannersHome['link']; ?>">
                <div class="imageSlide" style="width: 100%; background-image:url('webroot/archivos/<?php echo $bannersHome['image']; ?>'); background-position: center; background-size: cover; height: 467px;"></div>
              </a>
            </div>

            <?php
                }else{
            ?>

            <div class="item <?php if($i==0) echo 'active'; ?>">
              <table cellpadding="0" cellspacing="0" width="100%" align="center">
              <tr>
                  <td class="fuente_georgia font_size26" align="center"><?php echo $bannersHome['title'];//$titleHome[1]; ?></td>
              </tr>
              <tr>
                  <td class="fuente_georgia font_size16" align="center"><?php echo $bannersHome['subtitle']; //$titleHome[2]; ?></td>
              </tr>
              <tr><td height="20"></td></tr>
              </table>
              <!--<img class="img-responsive" src="<?php //echo $royaltyUtils->baseUrl() . '/webroot/archivos/' . $bannersHome['image']; ?>" alt="">-->
              <div class="imageSlide" style="width: 100%; background-image:url('webroot/archivos/<?php echo $bannersHome['image']; ?>'); background-position: center; background-size: cover; height: 467px;"></div>
            </div>

            <?php
                } $i++;
              }
            ?>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<div class="base_slider">
    <div class="slider">

         <div id="owl-slider"  class="owl-carousel owl-theme">
             <?php
             while ($bannersHome = mysqli_fetch_array($query)) {
                 if($bannersHome['has_link'] == 1){
                    echo '<a href="' . $bannersHome['link'] . '"><div class="item"><img src="'.$BASE_URL.'webroot/archivos/' . $bannersHome['image'] . '" style="width:100%" ></div></a>';

                 }else{
                     echo '<div class="item"><img src="' .$BASE_URL. '/webroot/archivos/' . $bannersHome['image'] . '" style="width:100%" ></div>';

                 }
             }
              ?>
          </div>

    </div>
</div>
<!--FIN SLIDER-->



<!--LINKS HOME-->
<div class="base_links_home">
    <div class="links_home">

       <div class="ancho_link_home_1"><a href="#" class="fuente_georgia font_size13 " style="text-decoration:none;color:#000">GIFT CARD</a></div>
       <div class="ancho_link_home_2"><a href="#popup_gratuito" class="fuente_georgia font_size13 fancybox" style="text-decoration:none;color:#000">ENVÍO INMEDIATO Y GRATUITO*</a></div>
       <div class="ancho_link_home_3"><a href="#popup_devolucion" class="fuente_georgia font_size13 fancybox" style="text-decoration:none;color:#000">FÁCIL DEVOLUCIÓN EN 60 DÍAS</a></div>
       <div class="ancho_link_home_4"><a href="#popup_entrega" class="fuente_georgia font_size13 fancybox" style="text-decoration:none;color:#000">ENTREGA EN TODO EL MUNDO	MEMBRESIA</a></div>

    </div>
</div>
<!--FIN LINKS HOME-->



<!--FOTOS MENU-->

<section id="menu-fotos">
  <div class="container-fluid padding-off">

    <?php

      $result = $db_Full->select_sql("SELECT * FROM tbl_cuerpo_home order by id_cuerpo asc");

      $ndato = 1;
      $nfila = 1;

      $ord1 = 1; $ord2 = 2; $ord3 = 3;

      echo '<div class="row padding-off">';

      /*while ($row_tipo = mysqli_fetch_array($result)){

      	$validate_name = strtolower($row_tipo['titulo_cuerpo']);
        $enlace_producto_tipo = $row_tipo["link_cuerpo"];

        ?>

        <!-- impresion de una fila -->
        <?php

          // Para la primera fila, una fila par y una fila impar

          if($nfila == 1){
            // Sólo para la primera fila
            switch ($ndato) {
              case 1:{

                ?>

                <div class="col-md-6 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              case 2:{

                ?>

                <div class="col-md-3 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              default:{

                if($ndato == 3){

                ?>

                <div class="col-md-3 col-sm-12">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="banner-short text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center; border-bottom: solid 5px #fff;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>

              <?php

                }else{

              ?>

                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="banner-short text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center; border-top: solid 5px #fff;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php

                  $ord1+=4; $ord2+=4; $ord3+=4;

                }
              }
                break;
            }

          }else if($nfila % 2 != 0){

            // Para una fila impar
            switch ($ndato) {
              case $ord1:{

                ?>

                <div class="col-md-6 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              case $ord2:{

                ?>

                <div class="col-md-3 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              default:{
                ?>

                <div class="col-md-3 col-sm-12">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
                $ord1+=3; $ord2+=3; $ord3+=3;
              }
                break;
            }

          }else{

            // Para una fila par
            switch ($ndato) {
              case $ord1:{
                ?>

                <div class="col-md-3 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              case $ord2:{
                ?>

                <div class="col-md-5 col-sm-6">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

                <?php
              }
                break;

              default:{
                ?>

                <div class="col-md-4 col-sm-12">
                  <a href="<?php echo $enlace_producto_tipo;?>">
                    <div class="text-center" style="background-image: url('webroot/archivos/<?php echo $row_tipo["imagen_cuerpo"]; ?>'); background-size: cover; background-position: center; border-bottom: solid 5px #fff;"><?php echo $row_tipo["titulo_cuerpo"]; ?></div>
                  </a>
                </div>

              <?php
                $ord1+=3; $ord2+=3; $ord3+=3;
              }
                break;
            }
          }

        ?>


        <?php

        if($ndato==4 || $ndato ==7){
          $nfila++;
          echo '</div><div class="row padding-off">';
        }

        $ndato++;

      }*/
      $result10 = $db_Full->select_sql("SELECT  id_cuerpo,
                                                imagen_cuerpo,
                                                link_cuerpo ,
                                                titulo_cuerpo,
                                                numero_columna_cuerpohome,
                                                orden_tipo_cuerpohome,
                                                apertura_columnas_cuerpohome,
                                                numero_columna_cuerpohome_aper,
                                                width_cuerpo_home,
                                                height_cuerpo_home,
                                                tipo_imagen_cuerpo_home,
                                                size_texto_imagen_cuerpo_home,
                                                clases_cuerpo_home 
                                        FROM    tbl_cuerpo_home ");
?>


<!-- Contenido nuevo -->
<section id="home">
  <div class="clearfix">
    <?php 
      $i = 0;
        $c = 0;
        //$num_columna_dis = $columna_tipo;
        //$col = 12/$num_columna_dis;
    ?>
    <div class="clearfix">
      <?php 
        $ccolumna = 0;

        if(mysqli_num_rows($result10))
          {
            while($row10 = mysqli_fetch_assoc($result10))
            {   $i++; 
                $c++;

                $width      = ($row10["width_cuerpo_home"] == ''  || $row10["width_cuerpo_home"]  == 0) ?  'width :100%;' : 'width:'.$row10["width_cuerpo_home"].'px!important;';
                $height     = ($row10["height_cuerpo_home"] == '' || $row10["height_cuerpo_home"] == 0) ? '' : 'height:'.$row10["height_cuerpo_home"].'px!important;';
                $style_size = ' '.$width.$height;
                $clases     = $row10["clases_cuerpo_home"];

                $foto       = $BASE_URL.'webroot/archivos/'.$row10["imagen_cuerpo"];
                $url_img    = ($row10["imagen_cuerpo"] != '' && file_exists('webroot/archivos/'.$row10["imagen_cuerpo"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 

                $columna    = $row10["numero_columna_cuerpohome"];
                $title      = $row10["titulo_cuerpo"];
                //$title      = ($row10["size_texto_imagen_cuerpo_home"] == 'n') ? $row10["titulo_cuerpo"] : '<small>'.$row10["titulo_cuerpo"].'</small>';
                $m_columna  = ($columna != 0) ? 'col-sm-'.$columna.' fuente_georgia columna padding-as' : 'col-sm-12 padding-as';
                $tipo_img   = ($row10["tipo_imagen_cuerpo_home"] == 1) ? '<div class="text-center '.$clases.'" style="background-image: url('."'".'webroot/archivos/'.$row10["imagen_cuerpo"]."'".'); background-size: cover; background-position: center;'.$style_size.'"'.'>'.$title.'</div>' : '<img src="'.$url_img.'" alt="" class="img-responsive" style="'.$style_size.'">';

                if($row10["apertura_columnas_cuerpohome"] == 1){
                   if($row10["numero_columna_cuerpohome_aper"] != 0){
                    echo '<div class="col-sm-'.$row10["numero_columna_cuerpohome_aper"].'  no_padding">';
                   }
                    else{
                            if($ccolumna == 0){
                               echo '<div class="clearfix">';
                            }
                    }       
              }

                            echo '<div class="'.$m_columna.'">';
                                    
                                      $ini = (!empty($row10["link_cuerpo"])) ? '<a class="img_producto" style="text-decoration:none;" href="'.$BASE_URL.$row10["link_cuerpo"].'">' : '<div class="img_producto">';

                                      $fin = (!empty($row10["link_cuerpo"])) ? '</a>' : '</div>'; 
                                    
                          echo $ini;
                                          echo $tipo_img;//'<img src="'.$url_img.'" alt="" class="img-responsive" style="'.$style_size.'">';
                                      echo $fin; 
                                      echo '<div class="row">';
                            echo '<div class="height-10"></div>';
                          echo '</div>';
                              echo '</div>';
              

                if($row10["apertura_columnas_cuerpohome"] == 2){
                  if(12 <= $ccolumna + $columna){
                   $ccolumna = 0;

                } 
                else{
                  $ccolumna += $columna;
                }
                              echo '</div>';
                              
              }
                    
                    
            }
          }  
      echo '</div>';
    ?>

  </div>
</section>

<!--FIN FOTOS MENU-->


<!--Sección de Redes sociales y Enlaces externos-->
<section id="base_redes">
  <div class="container-fluid padding-off">
    <div class="row padding-off">
      <div class="col-sm-6">
        <table cellpadding="0" cellspacing="0" align="center" width="100%">
          <tr>
              <td class="fuente_georgia font_size20" style="color:#FFF" align="center">ÚNETE A NUESTRAS REDES SOCIALES</td>
          </tr>
          <tr><td height="20"></td></tr>
          <tr>
              <td align="center">
                          <a href="https://www.facebook.com/ROYALTY.peru" target="_blank"><img src="<?php echo $BASE_URL;?>images/facebook_footer.png" width="27"></a>
                          <a href="#"><img src="<?php echo $BASE_URL;?>images/youtube_footer.png" width="27"></a>
                          <a href="#"><img src="<?php echo $BASE_URL;?>images/instagram_footer.png" width="27"></a>
                          <a href="mailto:ventas@ufit.pe"><img src="<?php echo $BASE_URL;?>images/email_footer.png" width="27"></a>
               </td>
          </tr>
          <tr><td height="20"></td></tr>
          <tr>
             <td align="center">
             <a href="https://www.facebook.com/ROYALTY.peru" target="_blank" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">síguenos en Facebook /</a>
             <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">Youtube /</a>
             <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">Instagram /</a>
             <a href="mailto:ventas@ufit.pe" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">E-mail</a>
             </td>
          </tr>
        </table>
      </div>
      <div class="col-sm-6">
        <table cellpadding="0" cellspacing="0" align="center" width="100%">
          <tr><td height="20"></td></tr>
          <tr>
              <td class="fuente_georgia font_size12" style="color:#FFF" align="center">Novedades y muchos privilegios encuentras en</td>
          </tr>
          <tr>
              <td class="fuente_georgia font_size20" style="color:#FFF" align="center">UFIT</td>
          </tr>
          <tr><td height="57"></td></tr>
          <tr>
             <td align="center">
                    <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                         <td align="center"><a href="catalogo" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">CATALOGO</a> </td>
                      <td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">UFIT CARD</a> </td>
                      <td align="center"><a href="asesoria" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">QUE ESTA DE MODA</a> </td>
                      <td align="center"><a href="ideas" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">IDEAS PARA REGALAR</a></td>
                 </tr>
                 </table>
             </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Sección de Videos de la página de Inicio -->

<section id="videos-inicio">
  <div class="container">
    <div class="row">
      <h3 class="text-center title-uppercase">Videos</h3>
    </div>
    <div class="row">

      <?php

        $result_video = $db_Full->select_sql("SELECT * FROM tbl_videos order by orden_vi asc limit 3");
        while ($row_video = mysqli_fetch_array($result_video)){

          ?>

      <div class="col-sm-4">
        <a href="<?php echo $row_video["link_vi"];?>" class="fancybox-media">
          <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $row_video["foto_vi"];?>" alt="" class="img-responsive">
        </a>
        <div class="height-20"></div>
        <p class="text-center"><?php echo $row_video["titulo_vi"];?></p>
      </div>

          <?php

        }

      ?>

    </div>
  </div>
</section>