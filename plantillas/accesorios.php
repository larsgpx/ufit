<?php      
  $result                 = $db_Full->select_sql("SELECT titulo_page_tbl,url_page_tbl,id_tabla_page_tbl,parent_page_tbl 
                                                  FROM tbl_page 
                                                  WHERE id_page_tbl = ".$id_page);

  $ro                     = mysqli_fetch_assoc($result);

  $id_tipo                = $ro['id_tabla_page_tbl'];

  /*$title_filtro_producto  = '<a href="'.$BASE_URL.$ro2['url_page_tbl'].'">'.$ro2['titulo_page_tbl'].'</a><span> -> </span><a href="'.$BASE_URL.$ro['url_page_tbl'].'">'.$ro['titulo_page_tbl'].'</a><span> -> </span><span class="active">'.$title.'</span>';*/

$title_filtro_producto = 'ACCESORIOS';

include("filtros_productos.php"); ?>

<div class="base_productos col-md-9" style="padding: 0 15px;">
  <div id="ordenar_productos">
    <?php 
    $result10 = $db_Full->select_sql("SELECT foto_tipo_img,fk_tipo_img,numero_columna_tipo FROM tbl_tipos_imagenes WHERE fk_tipo_img =".$id_tipo." order by orden_tipo asc");
    $i = 0;
    while($row10 = mysqli_fetch_assoc($result10)){
      $foto      = $BASE_URL.'webroot/archivos/'.$row10["foto_producto"];
      $url_img   = (!empty($row10["foto_producto"]) && file_exists('../webroot/archivos/'.$row10["foto_producto"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 
      $i++;
    ?>
    <?php if($i % 2 != 0){ echo '<div class="row">';}?>
              <div class="col-xs-6 fuente_georgia columnas">
                  <?php 
                        $ini = (!empty($row10["url_page_tbl"])) ? '<a class="img_producto" href="'.$BASE_URL.$row10["url_page_tbl"].'">' : '<div class="img_producto">';
                        $fin = (!empty($row10["url_page_tbl"])) ? '</a>' : '</div>'; 
                  ?>
                  <?php echo $ini;?>
                       <img src="<?php echo $url_img?>" alt="" class="img-responsive">
                       <div class="height-10"></div>
                       <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                       <hr>
                  <?php echo $fin;?>  
              </div>
      <?php if($i % 2 == 0){ echo '</div>';}?>              
      <?php }?>        
  </div>
</div>

</div>
