<section id="banner-categories" class="fuente_georgia">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 padding-off">
        <?php   
            $url_tipo              = explode('/',$url_final); 
            $titulo_tipo           = $url_tipo[2];
            $cantidad_paginador_2  = 10; 

        	 $result   = $db_Full->select_sql("SELECT fkmarcas_tipos_marcas,
                                                fktipos_tipos_marcas,
                                                url_page_tbl 
                                         from tbl_tipos_marcas 
                                         where url_page_tbl='".$url_final."' ");

        	 $row      = mysqli_fetch_assoc($result);
        	 $id_marca = $row['fkmarcas_tipos_marcas'];
        	 $id_tipo  = $row['fktipos_tipos_marcas'];

           $result32 = $db_Full->select_sql("SELECT columnas_tipo 
                                             from tbl_tipos 
                                             where id_tipo = ".$id_tipo."");

           $ro2      = mysqli_fetch_assoc($result32);

           $columna_tipo            = ($ro2['columnas_tipo'] == 0) ? 2 : $ro2['columnas_tipo'];

            $result_banner_pric     = $db_Full->select_sql("SELECT nombre_marca,
                                                        banner_marca 
                                                        from 
                                                        tbl_marcas 
                                                        where id_marca=".$id_marca."");

                $data_banner        = mysqli_fetch_assoc($result_banner_pric);
                $banner_marcaa      = $data_banner['banner_marca'];
                $url_marca_banner   = ($banner_marcaa == '')?'http://placehold.it/1200x600/000/fff' :$BASE_URL.'webroot/archivos/'.$banner_marcaa;
                $titulo_marcas      = $data_banner['nombre_marca'];

            $title_filtro_producto  =  '<a href="'.$BASE_URL.$row['url_page_tbl'].'">'.$titulo_marcas.'</a><span> -> </span><span class="active">'.$titulo_tipo.'</span>';
        
        ?>
        <div class="collapse-banner-category" style="position: relative; height:200px; background-image: url(<?php echo $url_marca_banner;?>); background-size: cover; background-repeat: no-repeat; background-position: center top;" state="off">
          <span>Perfil de marca <b>&#9013;</b></span>
        </div>
 
      </div>
    </div>
    <div class="row">
      <div class="height-20"></div>
    </div>
  </div>
</section>

<?php  "SELECT id_producto,precio_oferta_producto,oferta_producto,p.url_page_tbl as url_prod,foto_producto,nombre_marca,titulo_producto,precio_producto,precio_oferta_producto,precio_producto,descuento_producto FROM tbl_productos p,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas = id_producto and fkmarca_productos_marcas = '".$id_marca."' and fktipo_productos_marcas = '".$id_tipo."' limit 0,".$cantidad_paginador_2." ";

$result10 = $db_Full->select_sql("SELECT id_producto,precio_oferta_producto,oferta_producto,p.url_page_tbl as url_prod,foto_producto,nombre_marca,titulo_producto,precio_producto,precio_oferta_producto,precio_producto,descuento_producto FROM tbl_productos p,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas = id_producto and fkmarca_productos_marcas = '".$id_marca."' and fktipo_productos_marcas = '".$id_tipo."' limit 0,".$cantidad_paginador_2." ");

$result100 = $db_Full->select_sql("SELECT id_producto,precio_oferta_producto,oferta_producto,p.url_page_tbl as url_prod,foto_producto,nombre_marca,titulo_producto,precio_producto,precio_oferta_producto,precio_producto,descuento_producto FROM tbl_productos p,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas = id_producto and fkmarca_productos_marcas = '".$id_marca."' and fktipo_productos_marcas = '".$id_tipo."'  ");


$cantidad_items = mysqli_num_rows($result10);
$total_items = mysqli_num_rows($result100);

include("filtros_productos_marcas.php"); 

?>

<div class="base_productos col-md-9" style="padding: 0 15px;">
      	<div id="ordenar_productos">
      		
          <?php 

              $i=0;
              $c = 0;
              $num_columna_dis = $columna_tipo; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)

              $col = 12/$num_columna_dis;
              

      		while($row10 = mysqli_fetch_assoc($result10))
          { /*echo "SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fktipo_producto=id_tipo and id_producto='".$row10["id_producto"]."' and id_tipo=".$id_tipo." group by id_producto ";*/
         
                      $result11 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fktipo_producto=id_tipo and id_producto='".$row10["id_producto"]."' and id_tipo=".$id_tipo." group by id_producto ");

                  while($row11 = mysqli_fetch_array($result11))
                  {
                     $titulo=$row11["titulo_producto"];
                     $marca=$row11["nombre_marca"];
                     $preciopro="0";
                        if($row11['oferta_producto'] == "si")
                        { 
                          $precio= $row11['precio_producto'] - ($row11['precio_producto']*$row11['descuento_producto']/100);
                          $preciopro= $row11['precio_producto'];
                        }else
                        {
                           $precio = $row11["precio_producto"];
                        }
                     $tipo=$row11["nombre_tipo"];
                  }

                       $foto      = $BASE_URL.'webroot/archivos/'.$row10["foto_producto"];

                       $url_img   = (!empty($row10["foto_producto"]) && file_exists('../webroot/archivos/'.$row10["foto_producto"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 
                       
                       $i++;
                     
                       if($c == 0){
                 
                            echo '<div class="row">';
                        }
                        $c++;?>

                       <div class="col-sm-<?php echo $col?> fuente_georgia columna">
                                
                                <?php 
                                $ini = (!empty($row10["url_page_tbl"])) ? '<a class="img_producto" style="text-decoration:none;" href="'.$BASE_URL.$row10["url_page_tbl"].'">' : '<div class="img_producto">';
                                $fin = (!empty($row10["url_page_tbl"])) ? '</a>' : '</div>'; 
                                ?>

                                <?php echo $ini;?>
                                <img src="<?php echo $url_img?>" alt="" class="img-responsive">
                                <div class="height-10"></div>
                               
                                <h4 class="text-center section-title font_size13" style="color: #333">
                                <?php echo $row10["titulo_producto"]; ?> - <?php echo $marca; ?>
                                </h4>
                               
                                <hr>

                                <div class="text-center font_size16 precio" style="color:#337ab7;">
                                     <span>
                                     <?php
                                     if ($preciopro!="0") 
                                     {
                                      echo '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '.$preciopro.'  </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                      echo '&nbsp; &nbsp; &nbsp; Ahora: S/. '.$precio.' ';
                                     }else
                                     {
                                     echo 'S/. '.$precio;
                                     }
                                     ?>
                                     </span>
                                </div>
                                <?php echo $fin;?>  
                      </div>
                      
                      
              <?php }?>  
              </div>
       </div>

         <?php
          if($total_items>0)
          {
          ?>
              <div class="base_productos col-md-12" style="padding: 0 15px;">
                  <div style="width: 100%; padding: 10px; text-align: center">
                        <div id="ver_mas" style="margin: 10px;" >
                            Mostradas 1 - 
                            <span id="cantidad_mostrar" style="padding: 0px"><?php echo  $cantidad_items; ?></span> 
                            de 
                            <span id="total_mostrar" style="padding: 0px"><?php echo  $total_items; ?></span>
                        </div>


                        <?php
                        if($total_items>10)
                        {
                        ?>
                            <div style="text-align: -webkit-center; " id="boton_mostrar" onclick="captar_filtro(this);" tipo="<?php echo $id_tipo;?>" categoria="" subcategoria=""  data="" data2="" marca="<?php echo $id_marca;?>" cantidades="<?php echo $cantidad_items;?>" >
                                <div style="padding: 5px; background-color: #807979; color: #FFFFFF; width: 180px;cursor: pointer;">BAJAR MAS FOTOS</div>
                            </div>
                        <?php
                        }
                        ?>
                  </div>
              </div>
          <?php
          }
          ?>

	
</div>

</div>