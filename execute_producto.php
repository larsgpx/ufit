<?php 

  switch ($_POST['tipo']) {
  	case 'filtros_producto':

  		
        if(isset($_GET['tipos']) && $_GET['tipos'] != "")
        {
            if(isset($_GET['orden'])){
                if($_GET['orden'] == 'mayor'){
                    $order = 'desc';
                }else{
                    $order = 'asc';
                }

                $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas   where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fktipo_producto='".$_GET['tipos']."' group by id_producto order by precio_producto " . $order);
            }else{
                if(isset($_GET['filtro']) && $_GET['filtro'] !== ''){
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos, tbl_productos_categorias, tbl_productos_filtros,tbl_items_filtro,tbl_marcas, tbl_productos_marcas
                                                where
                                                fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and
                                                fksubfiltro_productos_filtros=id_item_filtro
                                                and fkproducto_productos_categorias=id_producto
                                                and fktipo_producto='".$_GET['tipos']."'
                                                and fktipo_productos_categorias='".$id_tipo."'
                                                and  fkproducto_productos_filtros=id_producto
                                                and nombre_item_filtro='".$_GET['filtro']."' order by tbl_productos.id_producto desc");
                }else{
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fktipo_producto='".$_GET['tipos']."' group by id_producto order by tbl_productos.id_producto");
                }
            }
           $cont=1;
            while ($row10 = mysqli_fetch_array($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>

            <?php  }else{   ?>
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

        <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
        <?php } ?>



        <?php
        if(isset($_GET['e']) && $_GET['categoria']!="")
        {
            if(isset($_GET['orden'])){
                if($_GET['orden'] == 'mayor'){
                    $order = 'desc';
                }else{
                    $order = 'asc';
                }

                $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fkcategoria_productos_categorias='".$_GET['categoria']."' and fktipo_productos_categorias='".$id_tipo."' group by id_producto order by tbl_productos.precio_producto " . $order);
            }else{
                if(isset($_GET['filtro']) && $_GET['filtro'] !== ''){
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos, tbl_productos_categorias, tbl_productos_filtros,tbl_items_filtro,tbl_marcas, tbl_productos_marcas
                                                where
                                                fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and
                                                fksubfiltro_productos_filtros=id_item_filtro
                                                and fkproducto_productos_categorias=id_producto
                                                and fkcategoria_productos_categorias='".$_GET['categoria']."'
                                                and fktipo_productos_categorias='".$id_tipo."'
                                                and  fkproducto_productos_filtros=id_producto
                                                and nombre_item_filtro='".$_GET['filtro']."' order by tbl_productos.id_producto desc");
                }else{
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fkcategoria_productos_categorias='".$_GET['categoria']."' and fktipo_productos_categorias='".$id_tipo."' group by tbl_productos.id_producto order by tbl_productos.id_producto ");
                }
            }
            $cont=1;
            while ($row10 = mysqli_fetch_array($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>

            <?php  }else{   ?>
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

      <?php } $cont=$cont+1; }?>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
        <?php } ?>


       <?php
        if(isset($_GET['subcategoria']) && $_GET['subcategoria'] != "")
        {
            if(isset($_GET['orden'])){
                if($_GET['orden'] == 'mayor'){
                    $order = 'desc';
                }else{
                    $order = 'asc';
                }

                $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fksubcategoria_productos_categorias='".$_GET['subcategoria']."' and fktipo_productos_categorias='".$id_tipo."' group by id_producto order by tbl_productos.precio_producto " . $order);
            }else{
                if(isset($_GET['filtro']) && $_GET['filtro'] !== ''){
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos, tbl_productos_categorias, tbl_productos_filtros,tbl_items_filtro,tbl_marcas, tbl_productos_marcas
                                                where
                                                fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and
                                                fksubfiltro_productos_filtros=id_item_filtro
                                                and fkproducto_productos_categorias=id_producto
                                                and fksubcategoria_productos_categorias='".$_GET['subcategoria']."'
                                                and fktipo_productos_categorias='".$id_tipo."'
                                                and  fkproducto_productos_filtros=id_producto
                                                and nombre_item_filtro='".$_GET['filtro']."' order by tbl_productos.id_producto desc");
                }else{
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fksubcategoria_productos_categorias='".$_GET['subcategoria']."' and fktipo_productos_categorias='".$id_tipo."' group by id_producto order by tbl_productos.id_producto desc ");
                }
            }



           $cont=1;
            while ($row10 = mysqli_fetch_array($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>

            <?php  }else{   ?>
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

        <?php } $cont=$cont+1; }?>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
        <?php } ?>


            <!--
                <a href="D-<?php //echo $row10["id_producto"]; ?>-<?php //echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>" style="text-decoration:none; color:#000">
                <div class="item_productos">
                <table cellpadding="0" cellspacing="0" width="95%" align="center">
                    <tr>
                    <td align="right" class="wow"><img src="webroot/archivos/<?php //echo $row10["foto_producto"]; ?>" width="100%"></td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    <tr>
                    <td align="center" class="fuente_georgia font_size18"><?php //echo $row10["titulo_producto"]; ?></td>
                    </tr>
                    <tr>
                        <td align="center" class="fuente_georgia font_size18"><?php //echo $row10["nombre_marca"]; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%" align="center">
                            <tr>
                                <td align="center" width="38%"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td>
                                <td align="center" class="fuente_georgia font_size14" width="26%">$
                                <span class="price"><?php
                               /* if($row10['oferta_producto']=="SI")
                                { echo $row10['precio_oferta_producto'];
                                }else
                                { echo  $row10["precio_producto"]; }*/
                                ?>
                                </td></span>
                                <td align="center" width="38%"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td height="40"></td></tr>
                    </table>
                </div>
                </a>-->

        <?php
        if(isset($_GET['id_marca']) && $_GET['id_marca'] !== "" && isset($_GET['id_cat']) && $_GET['id_cat'] !== '')
        {
            if(isset($_GET['orden'])){
                if($_GET['orden'] == 'mayor'){
                    $order = 'desc';
                }else{
                    $order = 'asc';
                }

                $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas='".$_GET['id_marca']."' and fktipo_productos_marcas='".$_GET['id_cat']."' order by tbl_pro,tbl_marcas, tbl_productos_marcasductos.precio_producto group by id_producto" . $order);
            }else{
                if(isset($_GET['filtro']) && $_GET['filtro'] !== ''){
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos, tbl_productos_marcas, tbl_productos_filtros,tbl_items_filtro,tbl_marcas, tbl_productos_marcas
                                                where
                                                 fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and
                                                 fksubfiltro_productos_filtros=id_item_filtro
                                                and fkproducto_productos_marcas=id_producto
                                                and fkmarca_productos_marcas='".$_GET['id_marca']."'
                                                and fktipo_productos_marcas='".$id_tipo."'
                                                and fkproducto_productos_filtros=id_producto
                                                and nombre_item_filtro='".$_GET['filtro']."' order by tbl_productos.id_producto desc");
                }else{
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas='".$_GET['id_marca']."' and fktipo_productos_marcas='".$_GET['id_cat']."' group by id_producto order by tbl_productos.id_producto desc");
                }
            }
            if(mysqli_num_rows($result10) > 0){
            $cont=1;
            while ($row10 = mysqli_fetch_array($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>

            <?php  }else{   ?>
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

        <?php } $cont=$cont+1; }?>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
        <?php } } ?>





        <!--new arrivals-->
        <?php
        if(isset($_GET['id']) && $_GET['id'] != "")
        {
            if(isset($_GET['orden'])){
                if($_GET['orden'] == 'mayor'){
                    $order = 'desc';
                }else{
                    $order = 'asc';
                }
                $fechaactual=date("d/m/y");
                //lista productos de los ultimos 20 dias
                $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos p
                    INNER JOIN tbl_productos_marcas pm ON p.id_producto=pm.fkproducto_productos_marcas
                    INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca
                    INNER JOIN tbl_producto_persona pp ON p.id_producto=pp.id_producto
                    INNER JOIN tbl_fecha_registro_producto f ON p.id_producto=f.id_producto
                    WHERE pp.id_tipo_persona='".$_GET['newarri']."' AND f.fecha_registro BETWEEN NOW() - INTERVAL 20 DAY AND NOW() AND p.fktipo_producto='".$_GET['id']."'
                    group by p.id_producto order by p.precio_producto " . $order);
            }else{
                if(isset($_GET['filtro']) && $_GET['filtro'] !== ''){
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos, tbl_productos_categorias, tbl_productos_filtros,tbl_items_filtro,tbl_marcas, tbl_productos_marcas
                                                where
                                                fkmarca_productos_marcas=id_marca
                                                and fkproducto_productos_marcas=id_producto
                                                and fksubfiltro_productos_filtros=id_item_filtro
                                                and fkproducto_productos_categorias=id_producto
                                                and fktipo_producto='".$_GET['id']."'
                                                and fktipo_productos_categorias='".$id_tipo."'
                                                and  fkproducto_productos_filtros=id_producto
                                                and nombre_item_filtro='".$_GET['filtro']."'
                                                order by tbl_productos.id_producto desc");
                }else{//lista productos de los ultimos 20 dias
                    $result10 = $db_Full->select_sql("SELECT * FROM tbl_productos p
                    INNER JOIN tbl_productos_marcas pm ON p.id_producto=pm.fkproducto_productos_marcas
                    INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca
                    INNER JOIN tbl_producto_persona pp ON p.id_producto=pp.id_producto
                    INNER JOIN tbl_fecha_registro_producto f ON p.id_producto=f.id_producto
                    WHERE pp.id_tipo_persona='".$_GET['newarri']."' AND f.fecha_registro BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND p.fktipo_producto='".$_GET['id']."'
                    group by p.id_producto order by p.id_producto");
                }
            }
             $cont=1;
            while ($row10 = mysqli_fetch_array($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>

            <?php  }else{   ?>
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

        <?php } $cont=$cont+1; }?>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
        <?php } ?>


        <!--Fin new arrivals-->

            </div>
    </div>

  		break;
  }

?>