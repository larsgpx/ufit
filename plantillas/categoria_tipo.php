<?php    
        $cantidad_paginador=10;
        $result                 =  $db_Full->select_sql("SELECT parent_page_tbl 
                                                         FROM tbl_page 
                                                         WHERE id_page_tbl=".$id_page);

        $ro                     =  mysqli_fetch_assoc($result);

        $result2                =  $db_Full->select_sql("SELECT id_tabla_page_tbl 
                                                         FROM tbl_page 
                                                         WHERE id_page_tbl=".$ro['parent_page_tbl']);

        $ro2                    =  mysqli_fetch_assoc($result2);
        $id_tipo                =  $ro2['id_tabla_page_tbl'];



        $result                 =  $db_Full->select_sql("SELECT id_tipo,nombre_tipo,url_page_tbl,columnas_tipo 
                                                         FROM tbl_tipos 
                                                         WHERE id_tipo = ".$id_tipo);

        $row_cat                =  mysqli_fetch_assoc($result); 
        $titulo_categoria       =  $row_cat['nombre_tipo'];
        $columna_tipo           = ($row_cat['columnas_tipo'] == 0) ? 2 : $row_cat['columnas_tipo'];


        $consulta_categoria     =  $db_Full->select_sql("SELECT id_cate,tipo_categoria FROM tbl_categorias where url_page_tbl = '".$url_final."' ");
        $row_categoria          =  mysqli_fetch_assoc($consulta_categoria); 
        $titulo_tipo_categoria  =  $row_categoria['tipo_categoria'];
        $id_cat                 =  $row_categoria['id_cate'];


        /********************************TITULO NAV****************************************/
        $title_filtro_producto  =  '<a href="'.$BASE_URL.$row_cat['url_page_tbl'].'">'.$titulo_categoria.'</a><span> -> </span><span class="active">'.$title.'</span>';


        if($titulo_tipo_categoria=="descue")
        {
       
              $result10 = $db_Full->select_sql("SELECT id_producto,titulo_producto,url_page_tbl,foto_producto FROM tbl_productos where 
                                               fktipo_producto=$id_tipo and descuento_producto>0  limit 0,".$cantidad_paginador." ");

              $result100 = $db_Full->select_sql(" SELECT id_producto,titulo_producto,url_page_tbl,foto_producto FROM tbl_productos where 
                                                  fktipo_producto=$id_tipo and descuento_producto>0 ");

              $total_items = mysqli_num_rows($result100);
        
        }else if($titulo_tipo_categoria=="recien")
        {
       
              $result10 = $db_Full->select_sql("SELECT id_producto,titulo_producto,url_page_tbl,foto_producto FROM tbl_productos where 
                                               fktipo_producto=$id_tipo and fecha_producto BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE()  limit 0,".$cantidad_paginador." ");

              $result100 = $db_Full->select_sql(" SELECT id_producto,titulo_producto,url_page_tbl,foto_producto FROM tbl_productos where 
                                                  fktipo_producto=$id_tipo and fecha_producto BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE() ");

              $total_items = mysqli_num_rows($result100);
        
        }else if($titulo_tipo_categoria=="marca")
        {
       
             $result10 = $db_Full->select_sql("SELECT id_producto,titulo_producto,tbl_productos.url_page_tbl,foto_producto FROM tbl_productos ,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas = id_producto  and fktipo_productos_marcas = '".$id_tipo."' limit 0,".$cantidad_paginador." ");

              $result100 = $db_Full->select_sql("SELECT id_producto,titulo_producto,tbl_productos.url_page_tbl,foto_producto FROM tbl_productos ,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas = id_producto  and fktipo_productos_marcas = '".$id_tipo."'  ");


              $total_items = mysqli_num_rows($result100);
        
        }else 
        {
               $result10 = $db_Full->select_sql("SELECT nombre_cate,
                                             subcat.img_items_categoria,
                                             subcat.url_page_tbl as url,
                                             foto_cate,
                                             subcat.nombre_item_categoria
                                      FROM  tbl_categorias cat 
                                      inner join tbl_items_categoria subcat on subcat.fk_item_categoria = cat.id_cate 
                                      WHERE cat.fktipo_cate =".$id_tipo." and cat.url_page_tbl = '".$url_final."' ");
        }

        $cantidad_items = mysqli_num_rows($result10);
        
        if($titulo_tipo_categoria == "recien")
        {
            include("filtros_productos_recien_llegados.php"); 
        }else if($titulo_tipo_categoria == "marca")
        {
            include("filtros_productos_comprar_marca.php"); 
        }else if($titulo_tipo_categoria == "descue")
        {
            include("filtros_productos_descuentos.php"); 
        }
        include("filtros_productos.php");
?>

        
        <?php
        if($titulo_tipo_categoria=="descue")
        { 
        ?>  

                    <div class="base_productos col-md-9" style="padding: 0 15px;">
                        <div id="ordenar_productos">

                          <?php 

                          $i = 0;
                          $c = 0;
                          $num_columna_dis = $columna_tipo; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)

                          $col = 12/$num_columna_dis;

                          if(mysqli_num_rows($result10))
                          {

                            while($row10 = mysqli_fetch_assoc($result10))
                            {

                                  $result11 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  
                                                                    where fkproducto_productos_marcas = id_producto and 
                                                                          fkmarca_productos_marcas = id_marca and 
                                                                          fktipo_producto = id_tipo and 
                                                                          id_producto ='".$row10["id_producto"]."' and 
                                                                          id_tipo = ".$id_tipo." group by id_producto limit 1 ");

                                  while($row11 = mysqli_fetch_array($result11))
                                  {
                                        $titulo         = $row11["titulo_producto"];
                                        $marca          = $row11["nombre_marca"];
                                        $preciopro      = "0";

                                        if($row11['oferta_producto'] == "si")
                                        { 
                                             $precio    = $row11['precio_producto'] - ($row11['precio_producto'] * $row11['descuento_producto']/100);
                                             $preciopro = $row11['precio_producto'];

                                        }else{
                                                $precio = $row11["precio_producto"];
                                              }

                                        $tipo = $row11["nombre_tipo"];
                                  }


                                  $foto      = $BASE_URL.'webroot/archivos/'.$row10["foto_producto"];
                                  $url_img   = (!empty($row10["foto_producto"]) && file_exists('../webroot/archivos/'.$row10["foto_producto"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 
                                       
                                  $i++; 
                                  
                                  if($c == 0){
                                       
                                      echo '<div class="row">';
                                  }
                                  $c++;
                                  //if($i % 2 != 0){ echo '<div class="row">';}
                                  ?>
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
                                                  <div class="text-center font_size16 precio">
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
                                   

                            <?php 
                            }
                          }    
                        ?>        
                        </div>
                      </div>
                        

                        <?php
                        if($total_items > 0)
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
                                      if($total_items > 10)
                                      {
                                      ?>
                                          <div style="text-align: -webkit-center; " id="boton_mostrar" onclick="captar_filtro_descuento(this);" tipo="<?php echo $id_tipo;?>" categoria="<?php echo  $id_cat;?>" subcategoria=""  data="" data2="" marca="" cantidades="<?php echo $cantidad_items;?>" >
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

             
        <?php
        }else if($titulo_tipo_categoria=="recien")
        {
        ?>  

                    <div class="base_productos col-md-9" style="padding: 0 15px;">
                        <div id="ordenar_productos">

                          <?php 

                          $i = 0;
                          $c = 0;
                          $num_columna_dis = $columna_tipo; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)

                          $col = 12/$num_columna_dis;

                          if(mysqli_num_rows($result10))
                          {

                            while($row10 = mysqli_fetch_assoc($result10))
                            {

                                  $result11 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  
                                                                    where fkproducto_productos_marcas = id_producto and 
                                                                          fkmarca_productos_marcas = id_marca and 
                                                                          fktipo_producto = id_tipo and 
                                                                          id_producto ='".$row10["id_producto"]."' and 
                                                                          id_tipo = ".$id_tipo." group by id_producto limit 1 ");

                                  while($row11 = mysqli_fetch_array($result11))
                                  {
                                        $titulo         = $row11["titulo_producto"];
                                        $marca          = $row11["nombre_marca"];
                                        $preciopro      = "0";

                                        if($row11['oferta_producto'] == "si")
                                        { 
                                             $precio    = $row11['precio_producto'] - ($row11['precio_producto'] * $row11['descuento_producto']/100);
                                             $preciopro = $row11['precio_producto'];

                                        }else{
                                                $precio = $row11["precio_producto"];
                                              }

                                        $tipo = $row11["nombre_tipo"];
                                  }


                                  $foto      = $BASE_URL.'webroot/archivos/'.$row10["foto_producto"];
                                  $url_img   = (!empty($row10["foto_producto"]) && file_exists('../webroot/archivos/'.$row10["foto_producto"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 
                                       
                                  $i++; 
                                  
                                  if($c == 0){
                                       
                                      echo '<div class="row">';
                                  }
                                  $c++;
                                  //if($i % 2 != 0){ echo '<div class="row">';}
                                  ?>
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
                                                  <div class="text-center font_size16 precio">
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

                            <?php 
                            }
                          }    
                        ?>   
                     </div>
                     </div>
                        

                        <?php
                        if($total_items > 0)
                        {
                        ?>
                            <div  class="base_productos col-md-12" style="padding: 0 15px;">
                                <div style="width: 100%; padding: 10px; text-align: center">
                                      <div id="ver_mas" style="margin: 10px;" >
                                          Mostradas 1 - 
                                          <span id="cantidad_mostrar" style="padding: 0px"><?php echo  $cantidad_items; ?></span> 
                                          de 
                                          <span id="total_mostrar" style="padding: 0px"><?php echo  $total_items; ?></span>
                                      </div>


                                      <?php
                                      if($total_items > 10)
                                      {
                                      ?>
                                          <div style="text-align: -webkit-center; " id="boton_mostrar" onclick="captar_filtro_recien_llegados(this);" tipo="<?php echo $id_tipo;?>" categoria="<?php echo  $id_cat;?>" subcategoria=""  data="" data2="" marca="" cantidades="<?php echo $cantidad_items;?>" >
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


             
        <?php
        }else if($titulo_tipo_categoria=="marca")
        {
        ?>  

                    <div class="base_productos col-md-9" style="padding: 0 15px;">
                        <div id="ordenar_productos">

                          <?php 

                          $i = 0;
                          $c = 0;
                          $num_columna_dis = $columna_tipo; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)

                          $col = 12/$num_columna_dis;

                          if(mysqli_num_rows($result10))
                          {

                            while($row10 = mysqli_fetch_assoc($result10))
                            {

                                  $result11 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  
                                                                    where fkproducto_productos_marcas = id_producto and 
                                                                          fkmarca_productos_marcas = id_marca and 
                                                                          fktipo_producto = id_tipo and 
                                                                          id_producto ='".$row10["id_producto"]."' and 
                                                                          id_tipo = ".$id_tipo." group by id_producto limit 1 ");

                                  while($row11 = mysqli_fetch_array($result11))
                                  {
                                        $titulo         = $row11["titulo_producto"];
                                        $marca          = $row11["nombre_marca"];
                                        $preciopro      = "0";

                                        if($row11['oferta_producto'] == "si")
                                        { 
                                             $precio    = $row11['precio_producto'] - ($row11['precio_producto'] * $row11['descuento_producto']/100);
                                             $preciopro = $row11['precio_producto'];

                                        }else{
                                                $precio = $row11["precio_producto"];
                                              }

                                        $tipo = $row11["nombre_tipo"];
                                  }


                                  $foto      = $BASE_URL.'webroot/archivos/'.$row10["foto_producto"];
                                  $url_img   = (!empty($row10["foto_producto"]) && file_exists('../webroot/archivos/'.$row10["foto_producto"])) ? $foto : $BASE_URL.'images/producto_default.jpg'; 
                                       
                                  $i++; 
                                  
                                  if($c == 0){
                                       
                                      echo '<div class="row">';
                                  }
                                  $c++;
                                  //if($i % 2 != 0){ echo '<div class="row">';}
                                  ?>
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
                                                  <div class="text-center font_size16 precio">
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


                            <?php 
                            }
                          }    
                        ?>        
                        </div>
                     </div>
                        

                        <?php
                        if($total_items > 0)
                        {
                        ?>
                            <div  class="base_productos col-md-12" style="padding: 0 15px;">
                                <div style="width: 100%; padding: 10px; text-align: center">
                                      <div id="ver_mas" style="margin: 10px;" >
                                          Mostradas 1 - 
                                          <span id="cantidad_mostrar" style="padding: 0px"><?php echo  $cantidad_items; ?></span> 
                                          de 
                                          <span id="total_mostrar" style="padding: 0px"><?php echo  $total_items; ?></span>
                                      </div>


                                      <?php
                                      if($total_items > 10)
                                      {
                                      ?>
                                          <div style="text-align: -webkit-center; " id="boton_mostrar" onclick="captar_filtro_comprar_marca(this);" tipo="<?php echo $id_tipo;?>" categoria="<?php echo  $id_cat;?>" subcategoria=""  data="" data2="" marca="" cantidades="<?php echo $cantidad_items;?>" >
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


             
        <?php
        }else
        {
        ?>  
                <div class="base_productos col-md-9" style="padding: 0 15px;">
                <div id="ordenar_productos">
                    <?php 
                    $i = 0;
                    while($row10  =  mysqli_fetch_assoc($result10))
                    {

                            $img_cate   =  (!empty($row10["foto_cate"]) && file_exists('../webroot/archivos/'.$row10["foto_cate"])) ? $BASE_URL.'webroot/archivos/'.$row10["foto_cate"] : $BASE_URL.'images/producto_default.jpg';
                           
                            $url_img    =  (!empty($row10["img_items_categoria"]) && file_exists('../webroot/archivos/'.$row10["img_items_categoria"])) ? $BASE_URL.'webroot/archivos/'.$row10["img_items_categoria"] : $img_cate; 

                            $i++;
                            ?>

                            <?php 
                              if($i % 2 != 0)
                              { 
                              echo '<div class="row">';
                              }
                            ?>
                                      <div class="col-xs-6 fuente_georgia columna">
                                            <?php 
                                                  $ini = (!empty($row10["url"])) ? '<a href="'.$BASE_URL.$row10["url"].'">' : '<div>';
                                                  $fin = (!empty($row10["url"])) ? '</a>' : '</div>'; 
                                            ?>
                                            <?php echo $ini;?>
                                            <img src="<?php echo $url_img; ?>" alt="" class="img-responsive">
                                            <div class="height-10"></div>
                                            <h5 class="text-center font_size18"><?php echo strtoupper($row10["nombre_item_categoria"]); ?></h5>
                                            <hr>
                                            <?php echo $fin;?> 
                                      </div>
                            <?php 
                            if($i % 2 == 0)
                            { 
                              echo '</div>';
                            }
                  }
                  ?>             
                </div>
              </div>
        <?php
        }
        ?>



</div>