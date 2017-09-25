<section id="banner-categories" class="fuente_georgia">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 padding-off">
        <?php   

        $result_page = $db_Full->select_sql("SELECT id_tabla_page_tbl 
                                                            from tbl_page 
                                                            where tabla_page_tbl = 'tbl_productos' and url_page_tbl = '".$url_final."'");
        $row_page = mysqli_fetch_assoc($result_page);
        $id_producto = $row_page['id_tabla_page_tbl'];

        $result_pro = $db_Full->select_sql("SELECT fkmarca_productos_marcas,fktipo_productos_marcas
                                                            from tbl_productos_marcas 
                                                            where fkproducto_productos_marcas = ".$id_producto);
        $row_prod = mysqli_fetch_assoc($result_pro);
        $id_marca = $row_prod['fkmarca_productos_marcas'];
        $id_tipo  = $row_prod['fktipo_productos_marcas'];

        $result_banner_pric = $db_Full->select_sql("SELECT banner_marca 
                                                            from tbl_marcas 
                                                            where id_marca=".$id_marca."");

        $data_banner = mysqli_fetch_assoc($result_banner_pric);
        $banner_marcaa = $data_banner['banner_marca'];
        $url_marca_banner = ($banner_marcaa == '')?'http://placehold.it/1200x600/000/fff' :'admin/aplication/webroot/archivos/'.$banner_marcaa;

        ?>
        <?php 
            $t_categoria = isset($id_tipo) ? $id_tipo: 0;
            if($t_categoria != 6 && $url_marca_banner!= 'http://placehold.it/1200x600/000/fff'){
        ?>
        <div class="collapse-banner-category" style="position: relative; height:200px; background-image: url(<?php echo $url_marca_banner;?>); background-size: cover; background-repeat: no-repeat; background-position: center top;" state="off">
          <span>Perfil de marca <b>&#9013;</b></span>
        </div>
        <?php }?>
      </div>
    </div>
    <div class="row">
      <div class="height-20"></div>
    </div>
  </div>
</section>

<section id="filtros-generales">
    <div class="container fuente_georgia">
        <div class="row">
            <h2 class="pull-left section-title font_size24">Comprar todo <?php /*echo $tipo;*/?></h2>
            <span class="pull-right" style="margin-top: 10px;"><?php /*echo $total;*/ ?> Items</span>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <h3 class="section-title font_size18 filters-title">Filtros</h3>
            </div>
            <div class="col-sm-10 filters-list">
                <ul class="list-inline">

                    <?php

                        $result2 = $db_Full->select_sql("SELECT * FROM tbl_filtros where fktipo_filtro='".$id_tipo."' ");
                        $i=0;
                        while ($row2 = mysqli_fetch_array($result2)){$i++;
                            ?>

                    <li>

                        <div class="dropdown">
                            <a class="dropdown-toggle" id="filtroTalla" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo $row2["nombre_filtro"]; ?> <div class="circle"><span class="caret"></span></div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="filtroTalla">
                                <?php

                                    @$subcat = $_GET['subcategoria'];

                                    @$cat = $_GET['categoria'];

                                    ## Armar la url de envío

                                    $result3 = $db_Full->select_sql("SELECT * FROM tbl_filtros,tbl_items_filtro where id_filtro=fk_item_filtro and id_filtro='".$row2["id_filtro"]."' and fktipo_filtro='".$id_tipo."' ");
                                if(mysql_num_rows($result3)){
                                    while ($row3 = mysqli_fetch_array($result3)){
                                        ?>

                                <li><a href="#" onclick="setCookie('filtro_<?php echo $i?>','<?php echo $row3["nombre_item_filtro"]; ?>','1')"><?php echo $row3["nombre_item_filtro"]; ?></a></li>

                                        <?php
                                    }}
                                    else{ 
                                    //if($row_cate['tipo_categoria']=='compra'){
                                      $resultf = $db_Full->select_sql("select url_marca,nombre_marca from tbl_tipos_marcas,tbl_tipos, tbl_marcas
WHERE  fkmarcas_tipos_marcas =id_marca and fktipos_tipos_marcas=id_tipo and tipo='prod' and id_tipo =".$id_tipo." GROUP BY id_marca ORDER BY fkmarcas_tipos_marcas desc", $link); 
                                      while ($row_subf = mysqli_fetch_array($resultf)){
                                            $purl3 ='S-'.$row_subf["url_marca"].'-'.str_replace(' ','-',strtolower($row_sub["url_marca"]));
                                            $url3=($row_subf["url_marca"]=='') ? $purl3 : $row_sub["url_items_categoria"];
                                            
                                      ?>
                                      <li><a href="<?php echo $url3;?>"><?php echo strtolower($row_subf["nombre_marca"]); ?></a>
                                      </li>
                                    <?php
                                    //}
                                  }}
                                ?>
                            </ul>
                        </div>

                    </li>

                            <?php
                        }

                    ?>

                </ul>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <div class="dropdown pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Ordenar por <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filtroOrdenarPor">


                       <!-- <li><a href=javascript:ordenar_productos1(1,<?php //echo $id_tipo;?>,<?php //echo $idajax; ?>,<?php //echo $get1; ?>,<?php //echo $get2; ?>)>De mayor a menor</a></li>
                        <li><a href=javascript:ordenar_productos1(2,<?php //echo $id_tipo;?>,<?php //echo $idajax; ?>,<?php //echo $get1; ?>,<?php //echo $get2; ?>)>De menor a mayor</a></li>-->
                        <li><a href=javascript:ordenar_productos(1,<?php echo $id_tipo;?>,<?php echo $idajax; ?>,<?php echo $get; ?>,<?php echo $get2; ?>)>De mayor a menor</a></li>
                        <li><a href=javascript:ordenar_productos(2,<?php echo $id_tipo;?>,<?php echo $idajax; ?>,<?php echo $get; ?>,<?php echo $get2; ?>)>De menor a mayor</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>