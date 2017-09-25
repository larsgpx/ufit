<section id="filtros-generales">
    <div class="container fuente_georgia">
        <div class="row">
            <h2 class="pull-left section-title font_size24"><?php echo $title_filtro_producto;?></h2>
            <span class="pull-right" style="margin-top: 10px;"> <div id="total_items" style="float: left"><?php  if(isset($total_items)){ echo $total_items; } ?> </div> &nbsp; Items</span>
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
                        $cantidad_paginador = 0;
                        $result2 = $db_Full->select_sql("SELECT * 
                                                         FROM tbl_filtros 
                                                         where fktipo_filtro='".$id_tipo ."' ");
                        $i       = 0;

                        while ($row2 = mysqli_fetch_assoc($result2)){ $i++;
   
                 ?>

                    <li>

                        <div class="dropdown">
                            <span class="dropdown-toggle" categoria="<?php echo $id_cat;?>" marca="0" tipo= "<?php echo $id_tipo;?>" data_link="link" data="<?php echo $row2["id_filtro"];?>" onclick="captar_filtro(this);" id="filtroTalla" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo $row2["nombre_filtro"]; ?> 
                             <div class="circle"><span class="caret"></span></div>
                            </span>

                            <ul class="dropdown-menu" aria-labelledby="filtroTalla">
                                <?php

                                    @$subcat = $_GET['subcategoria'];
                                    @$cat    = $_GET['categoria'];
                                    ## Armar la url de envío
                                    $cantidad_marca = 0;

                                if($row2['_id_categoria'] != 0)
                                {   
                                     $result3   = $db_Full->select_sql("SELECT icat.id_item_categoria,
                                                                        icat.nombre_item_categoria,
                                                                        icat.url_page_tbl 
                                                                        FROM tbl_categorias 
                                                                        inner join tbl_items_categoria icat on
                                                                        icat.fk_item_categoria = id_cate
                                                                        where id_cate='".$row2['_id_categoria'] ."'");
                                } 
                                else{
                                        $result3    = $db_Full->select_sql("SELECT * 
                                                                            FROM tbl_filtros,
                                                                            tbl_items_filtro 
                                                                            where id_filtro = fk_item_filtro and 
                                                                            id_filtro = '".$row2["id_filtro"]."' and 
                                                                            fktipo_filtro='".$id_tipo."' 
                                                                            ORDER BY nombre_item_filtro asc ");
                                }                               
                                    
                                     

                                if(mysqli_num_rows($result3))
                                {
                                    while($row3 = mysqli_fetch_assoc($result3))
                                    {
                                        if($row2["nombre_filtro"] != "Marca")
                                        {
                                            $nombre_filtro = isset($row3["nombre_item_filtro"]) ? $row3["nombre_item_filtro"] : $row3["nombre_item_categoria"];
                                            $id_filtro = isset($row3["id_item_filtro"]) ? $row3["id_item_filtro"] : $row3["id_item_categoria"];
                                        ?>
                                        <li>
                                            <?php if(isset($id_cat)){?>
                                            <span data_link="link_row" data="<?php echo $row2["id_filtro"];?>" tipo= "<?php echo $id_tipo;?>" data2="<?php echo $id_filtro;?>" categoria="<?php echo $id_cat;?>" marca="0"  subcategoria="<?php echo  $id_page_table;?>" cantidades="<?php echo $cantidad_paginador;?>" onclick="captar_filtro(this);" onclick2="setCookie('filtro_<?php echo $i?>','<?php echo $nombre_filtro; ?>','1')"><?php echo ucfirst(strtolower($nombre_filtro)); ?>
                                            </span>
                                            <?php }
                                            else{
                                            ?>   
                                                <span data_link="link_row" data="<?php echo $row2["id_filtro"];?>" tipo = "<?php echo $id_tipo;?>" data2="<?php echo $row3["id_item_filtro"];?>" categoria="" marca="0" subcategoria="" cantidades="<?php echo $cantidad_paginador;?>" onclick="captar_filtro(this);" onclick2="setCookie('filtro_<?php echo $i?>','<?php echo $row3["nombre_item_filtro"]; ?>','1')"><?php echo ucfirst(strtolower($row3["nombre_item_filtro"])); ?>
                                            </span>
                                            <?php }?> 
                                        </li>

                                        <?php
                                        }else
                                        {
                                                if($cantidad_marca == 0)
                                                {
                                                    $resultf = $db_Full->select_sql("select m.url_page_tbl,
                                                                                     m.nombre_marca,id_marca 
                                                                                     from tbl_marcas m
                                                                                     inner join tbl_tipos_marcas tmar on 
                                                                                     fkmarcas_tipos_marcas = id_marca and 
                                                                                     fktipos_tipos_marcas =".$id_tipo." 
                                                                                     inner join tbl_productos_marcas pm on 
                                                                                     pm.fkmarca_productos_marcas =id_marca and 
                                                                                     pm.fktipo_productos_marcas=".$id_tipo." 
                                                                                     group by id_marca"); 
                                                          
                                                          while($row_subf = mysqli_fetch_assoc($resultf))
                                                          {

                                                            $url3 = $row_subf["url_page_tbl"];
                                                          ?>
                                                            <li>
                                                                <span href="<?php echo $BASE_URL.$url3;?>" data_link="link_row" tipo = "<?php echo $id_tipo;?>" data="<?php echo $row2["id_filtro"];?>" categoria="<?php echo  $id_cat;?>" subcategoria="<?php echo  $id_page_table;?>" cantidades="<?php echo $cantidad_paginador;?>" subcategoria="<?php echo  $id_page_table;?>" data2="<?php echo $row3["id_item_filtro"];?>" marca="<?php echo $row_subf["id_marca"]; ?>"  onclick="captar_filtro(this);"><?php echo ucfirst(strtolower($row_subf["nombre_marca"])); ?>
                                                              
                                                                </span>
                                                            </li>
                                                          <?php
                                                            }
                                                            $cantidad_marca++;
                                                }
                                        }
                                    }
                                }else if($row2["nombre_filtro"] == "Marca")
                                { 
                                    
                                       $resultf = $db_Full->select_sql("select tbl_marcas.url_page_tbl,
                                                                        nombre_marca,
                                                                        id_marca from tbl_marcas,
                                                                        tbl_productos_marcas,
                                                                        tbl_productos 
                                                                        where fkmarca_productos_marcas =id_marca and 
                                                                        fktipo_productos_marcas=".$id_tipo." and  
                                                                        fkproducto_productos_marcas =tbl_productos.id_producto 
                                                                        group by id_marca"); 

                                          while($row_subf = mysqli_fetch_assoc($resultf))
                                          {
                                            $url3 = $row_subf["url_page_tbl"];
                                          ?>
                                            <li>
                                                <span href="<?php echo $BASE_URL.$url3;?>" data_link="link_row" tipo="<?php echo $id_tipo;?>" data="" cantidades="<?php echo $cantidad_paginador;?>" categoria="<?php echo  $id_cat;?>" subcategoria="<?php echo  $id_page_table;?>" data2="" marca="<?php echo $row_subf["id_marca"]; ?>"  onclick="captar_filtro(this);"><?php echo strtolower($row_subf["nombre_marca"]); ?>
                                              
                                                </span>
                                            </li>
                                          <?php
                                          }
                                }
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
                    <ul class="dropdown-menu" id="filtroOrdenarPor" aria-labelledby="filtroOrdenarPor">
                       <!-- <li><a href=javascript:ordenar_productos1(1,<?php //echo $id_tipo;?>,<?php //echo $idajax; ?>,<?php //echo $get1; ?>,<?php //echo $get2; ?>)>De mayor a menor</a></li>
                        <li><a href=javascript:ordenar_productos1(2,<?php //echo $id_tipo;?>,<?php //echo $idajax; ?>,<?php //echo $get1; ?>,<?php //echo $get2; ?>)>De menor a mayor</a></li>-->
                        <li class="mayor_menor">De mayor a menor</li>
                        <li class="menor_mayor">De menor a mayor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--PRODUCTOS-->
<table cellpadding="0" cellspacing="0" width="100%"><tr><td height="20"></td></tr></table>
<div class="container">
    <div class="base_filtros_productos clearfix col-md-3 no_padding">
        <div class="">

            <?php
            $result4 = $db_Full->select_sql("SELECT * FROM tbl_categorias where fktipo_cate='".$id_tipo."' ");
            while ($row4 = mysqli_fetch_assoc($result4))
            {
            ?>
            <div class="item_filtro">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr><td height="10"></td></tr>
                <tr>
                <td class="fuente_georgia font_size20" style="letter-spacing:2px"><b><a href="<?php  ?>" style="text-decoration:none; color:#000"><?php echo $row4["nombre_cate"]; ?></a></b></td>
                </tr>
                <tr><td height="10"></td></tr>
                <?php
                $result5 = $db_Full->select_sql("SELECT nombre_item_categoria,id_item_categoria,icat.url_page_tbl as url_items_cat 
                                                 FROM  tbl_items_categoria icat,tbl_categorias cat 
                                                 where id_cate = fk_item_categoria and  id_cate ='".$row4["id_cate"]."' and fktipo_cate='".$id_tipo."' ");

                while ($row5 = mysqli_fetch_assoc($result5))
                {
                ?>
                <tr>
                    <td class="fuente_georgia font_size14">
                        <?php 
                        if(!empty($row5["url_items_cat"])){
                          echo  '<a href="'.$BASE_URL.$row5["url_items_cat"].'" style="text-decoration:none; color:#000">'.$row5["nombre_item_categoria"].'</a>';
                        }
                        else{
                            echo  '<span style="text-decoration:none; color:#000">'.$row5["nombre_item_categoria"].'</span>';
                        }
                        ?>
                        
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr><td height="30"></td></tr>
                </table>
            </div>
            <?php
            }
            ?>



        </div>

    </div>

<!--FIN PRODUCTOS-->

