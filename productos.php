<?php
//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/jquery.row-grid.js"></script>

<!-- Popup Plugin Files -->
<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
    <link href="css/principal.css" rel="stylesheet" type="text/css">
<!--<![endif]-->

<!-- Owl Carousel Assets -->
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<script src="owl-carousel/owl.carousel.js"></script>

<script>
function eje_filtro_prod(THIS){
    //ordenar_productos
    $.ajax({
                  type: "POST",
                  url: "execute_producto.php",
                  data : {
                            tipo: ''
                  },
                  success: function(data)
                  {

                  }
            });
}
jQuery(document).ready(function($)
{
        $('.fancybox').fancybox();

        $('.fancybox-media')
            .fancybox({
                maxWidth    : 800,
                maxHeight    : 600,
                openEffect : 'none',
                closeEffect : 'none',
                prevEffect : 'none',
                nextEffect : 'none',
                arrows : false,
                helpers : {
                    media : {},
                    buttons : {}
                }
            });

      $(".base_item_menu").hover(
      function() {
        $(this).find(".vista_menu").stop( true, true ).fadeIn(10);
      }, function() {
        $(this).find(".vista_menu").stop( true, true ).fadeOut(10);
      });

      $(".vista_menu").hover(
      function() {
        $(this).parent().find("#titulo_menu").removeClass("item_menu");
        $(this).parent().find("#titulo_menu").addClass("item_menu_hover");
      }, function() {
        $(this).parent().find("#titulo_menu").removeClass("item_menu_hover");
        $(this).parent().find("#titulo_menu").addClass("item_menu");
      });



      var owl = $("#owl-demo");

      owl.owlCarousel(
      {
          itemsCustom :
          [
            [0, 1],
            [450, 2],
            [600, 3],
            [700, 3],
            [1000, 5],
            [1200, 6],
            [1400, 6],
            [1600, 6]
          ],
          navigation : false,
          pagination : false,
          paginationNumbers : false,
          navigationText: false,
          autoPlay: 2000
    });



});

</script>

<!--Listar por mayor y menor productos-->
    <script type="text/javascript">
        function ordenar_productos(id1,id2,id3,id4,id5){
            var idt1=id1;
            var idt2=id2
            var idt3=id3;
            var idt4=id4;
            var idt5=id5;
            $.ajax({
                url:'include/ajax_procesa_ordena_producto.php',
                data:{orden: idt1,
                        idtipo: idt2,
                        filtro: idt3,
                        get: idt4,
                        get2: idt5},
                type:'post',
                success:function(data){
                    $("#ordenar_productos").html(data);
                }
            }
            )
        }
    </script>
<!--Fin por myor y menor productos-->

</head>

<body>


<?php
include("header.php");

?>

<section id="banner-categories" class="fuente_georgia">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 padding-off">
        <?php   
        if(isset($_GET['id_marca'])){
            $result_banner_pric=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=".$_GET['id_marca']."");
                $data_banner=mysqli_fetch_assoc($result_banner_pric);
                $banner_marcaa= $data_banner['banner_marca'];
                $url_marca_banner = ($banner_marcaa=='')?'http://placehold.it/1200x600/000/fff' :'../webroot/archivos/'.$banner_marcaa;
        }
        else{
            $url_marca_banner = 'http://placehold.it/1200x600/000/fff';
        }
        ?>
        <?php 
            $t_categoria = isset($_GET['tipos']) ? $_GET['tipos']: 0;
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

<?php

if(isset($_GET['tipos']) && $_GET['tipos'] != "")
{
    if(isset($_GET['orden'])){
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_tipos where id_tipo='".$_GET['tipos']."' ");
    }else{
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_tipos where id_tipo='".$_GET['tipos']."' ");
    }

    while ($row1 = mysqli_fetch_assoc($result1))
    {
        $tipo=$row1["nombre_tipo"];
        $id_tipo=$row1["id_tipo"];
        $get=$_GET['tipos'];
        $get2='0';
        $idajax=11;//tipo de filtro que será enviado por ajax
    }

    $result=$db_Full->select_sql("SELECT count(*) as total FROM tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fktipo_producto='".$_GET['tipos']."' ");
    $data=mysqli_fetch_assoc($result);
     $total=$data['total'];

}else if(isset($_GET['categoria']) && $_GET['categoria']!="")
{

    $result1 = $db_Full->select_sql("SELECT * FROM tbl_categorias,tbl_tipos where id_tipo=fktipo_cate and id_cate='".$_GET['categoria']."' ");
    while ($row1 = mysqli_fetch_assoc($result1))
    {
        $id_tipo=$row1["id_tipo"];
        $tipo=$row1["nombre_tipo"];
        $get=$_GET['categoria'];
        $get2='0';
         $idajax=12;//tipo de filtro que será enviado por ajax
    }

    $result=$db_Full->select_sql("SELECT count(*) as total FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fkcategoria_productos_categorias='".$_GET['categoria']."' and fktipo_productos_categorias='".$id_tipo."' ");
    $data=mysqli_fetch_assoc($result);
    $total=$data['total'];

}else if(isset($_GET['id_cat']) && $_GET['id_cat']!="")
{

    $result1 = $db_Full->select_sql("SELECT * FROM tbl_categorias,tbl_tipos where id_tipo=fktipo_cate and fktipo_cate='".$_GET['id_cat']."' ");
    while ($row1 = mysqli_fetch_assoc($result1))
    {
        $id_tipo=$row1["id_tipo"];
        $tipo=$row1["nombre_tipo"];
        $get=$_GET['id_cat'];
        $get2=$_GET['id_marca'];
        $idajax=13;//tipo de filtro que será enviado por ajax
    }

    $result=$db_Full->select_sql("SELECT count(*) as total FROM tbl_productos,tbl_productos_marcas where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas='".$_GET['id_marca']."' and fktipo_productos_marcas='".$_GET['id_cat']."' ");
    $data=mysqli_fetch_assoc($result);
    $total=$data['total'];

}else if(isset($_GET['subcategoria']) && $_GET['subcategoria']!="")
{
    $result1 = $db_Full->select_sql("SELECT * FROM tbl_items_categoria,tbl_categorias,tbl_tipos where id_cate=fk_item_categoria and id_tipo=fktipo_cate and id_item_categoria='".$_GET['subcategoria']."' ");
    while ($row1 = mysqli_fetch_assoc($result1))
    {
        $id_tipo=$row1["id_tipo"];
        $tipo=$row1["nombre_tipo"];
        $get=$_GET['subcategoria'];
        $get2='0';
        $idajax=14;//tipo de filtro que será enviado por ajax
    }

    $result=$db_Full->select_sql("SELECT count(*) as total FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fksubcategoria_productos_categorias='".$_GET['subcategoria']."' and fktipo_productos_categorias='".$id_tipo."' ");
    $data=mysqli_fetch_assoc($result);
    $total=$data['total'];
}else if(isset($_GET['id']) && $_GET['id'] != "" && $_GET['newarri'])
{
    if(isset($_GET['orden'])){
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_tipos where id_tipo='".$_GET['id']."' ");
    }else{
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_tipos where id_tipo='".$_GET['id']."' ");
    }

    while ($row1 = mysqli_fetch_assoc($result1))
    {
        $tipo=$row1["nombre_tipo"];
        $id_tipo=$row1["id_tipo"];
        $get=$_GET['id'];
        $get2=$_GET['newarri'];
        $idajax=15;//tipo de filtro que será enviado por ajax
    }

    $result=$db_Full->select_sql("SELECT count(*) as total FROM tbl_productos p
                    INNER JOIN tbl_productos_marcas pm ON p.id_producto=pm.fkproducto_productos_marcas
                    INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca
                    INNER JOIN tbl_producto_persona pp ON p.id_producto=pp.id_producto
                    INNER JOIN tbl_fecha_registro_producto f ON p.id_producto=f.id_producto
                    WHERE pp.id_tipo_persona='".$_GET['newarri']."' AND f.fecha_registro BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND p.fktipo_producto='".$_GET['id']."' ");
    $data=mysqli_fetch_assoc($result);
    $total=$data['total'];


}

?>


<!-- Filtros generales para cada producto -->
<section id="filtros-generales">
    <div class="container fuente_georgia">
        <div class="row">
            <h2 class="pull-left section-title font_size24">Comprar todo <?php echo $tipo;?></h2>
            <span class="pull-right" style="margin-top: 10px;"><?php echo $total; ?> Items</span>
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
                        while ($row2 = mysqli_fetch_assoc($result2)){$i++;
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
                                if(mysqli_num_rows($result3)){
                                    while ($row3 = mysqli_fetch_assoc($result3)){
                                        ?>

                                <li><a href="#" onclick="setCookie('filtro_<?php echo $i?>','<?php echo $row3["nombre_item_filtro"]; ?>','1')"><?php echo $row3["nombre_item_filtro"]; ?></a></li>

                                        <?php
                                    }}
                                    else{ 
                                    //if($row_cate['tipo_categoria']=='compra'){
                                      $resultf = $db_Full->select_sql("select mar.url_page_tbl,nombre_marca from tbl_tipos_marcas,tbl_tipos, tbl_marcas mar WHERE  fkmarcas_tipos_marcas =id_marca and fktipos_tipos_marcas=id_tipo and tipo='prod' and id_tipo =".$id_tipo." GROUP BY id_marca ORDER BY fkmarcas_tipos_marcas desc"); 
                                      while ($row_subf = mysqli_fetch_assoc($resultf)){
                                            $purl3 ='S-'.$row_subf["url_page_tbl"].'-'.str_replace(' ','-',strtolower($row_sub["url_page_tbl"]));
                                            $url3=($row_subf["url_page_tbl"]=='') ? $purl3 : $row_sub["url_items_categoria"];
                                            
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



<!--PRODUCTOS-->
<table cellpadding="0" cellspacing="0" width="100%"><tr><td height="20"></td></tr></table>
<div class="base_filtros_productos">
    <div class="base_filtros">

        <?php
        $result4 = $db_Full->select_sql("SELECT * FROM tbl_categorias where fktipo_cate='".$id_tipo."' ");
        while ($row4 = mysqli_fetch_assoc($result4))
        {
        ?>
        <div class="item_filtro">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr><td height="10"></td></tr>
            <tr>
            <td class="fuente_georgia font_size20" style="letter-spacing:2px"><b><a href="C-<?php echo $row4["id_cate"]; ?>-<?php echo str_replace(' ','-',strtolower($row4["nombre_cate"])); ?>" style="text-decoration:none; color:#000"><?php echo $row4["nombre_cate"]; ?></a></b></td>
            </tr>
            <tr><td height="10"></td></tr>
            <?php
            $result5 = $db_Full->select_sql("SELECT * FROM  tbl_items_categoria,tbl_categorias where id_cate=fk_item_categoria and  id_cate='".$row4["id_cate"]."' and fktipo_cate='".$id_tipo."' ");
            while ($row5 = mysqli_fetch_assoc($result5))
            {
            ?>
            <tr>
            <td class="fuente_georgia font_size14"><a href="S-<?php echo $row5["id_item_categoria"]; ?>-<?php echo str_replace(' ','-',strtolower($row5["nombre_item_categoria"])); ?>" style="text-decoration:none; color:#000"><?php echo $row5["nombre_item_categoria"]; ?></a></td>
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

<div class="base_productos" style="padding: 0 15px;">

<div id="ordenar_productos">
        <?php
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
            while ($row10 = mysqli_fetch_assoc($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
            while ($row10 = mysqli_fetch_assoc($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
            while ($row10 = mysqli_fetch_assoc($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                    <td align="right" class="wow"><img src="../webroot/archivos/<?php //echo $row10["foto_producto"]; ?>" width="100%"></td>
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
            while ($row10 = mysqli_fetch_assoc($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
            while ($row10 = mysqli_fetch_assoc($result10))
            {
                if ($cont%2>0) {?>
                    <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="../webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
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
</div>
<!--FIN PRODUCTOS-->





<!--FOOTER-->
<?php
include("footer.php");
?>


</body>
</html>
