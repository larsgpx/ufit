<?php
//include("inc.aplication_top.php");
session_start();
require 'conexion.php';

// var_dump($_SESSION['carro']);exit;
// Redirect to home if no client present on session
$royaltyUtils->redirectIfNotClient(false, 'cuenta');

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

$result2 = $db_Full->select_sql("SELECT * from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2 = mysqli_fetch_assoc($result2);
$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];
$clave_cliente = $data2['clave_cli'];

$nombre_direccion_cli = $data2['nombre_direccion_cli'];
$apellido_direccion_cli = $data2['apellido_direccion_cli'];
$dir1_direccion_cli = $data2['dir1_direccion_cli'];
$dir2_direccion_cli = $data2['dir2_direccion_cli'];
$postal_direccion_cli = $data2['postal_direccion_cli'];
$tel_direccion_cli = $data2['tel_direccion_cli'];
$envio_cli = $data2['envio_cli'];
$tarjeta = $data2['tarjeta_cli'];
$mes = $data2['mes_tarjeta_cli'];
$anio = $data2['anio_tarjeta_cli'];

$ruc_cliente = $data2['ruc_cli'];
$razon_cliente = $data2['razon_cli'];
$dni_cliente = $data2['dni_cli'];
$tipo_cliente = $data2['tipo_cli'];


$result20 = $db_Full->select_sql("SELECT * from tbl_clientes,departamento,distrito where id_cli='".$_SESSION['id_cliente']."' and fkdepartamento_cli=id_departamento and fkdistrito_cli=id_distrito ");
$data20 = mysqli_fetch_assoc($result20);
$departamento = $data20['nombre_departamento'];
$distrito = $data20['nombre_distrito'];


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


    $('.payButton').on('click', function(e){
        e.preventDefault();

        var formOfPayment = $('input[name=tarjeta]:checked').val();

        if(typeof formOfPayment == 'undefined'){
            alert('Necesita especificar una forma de pago');
            return false;
        }

        window.location.href = "checkout.php?p=" + formOfPayment;

        // $.ajax({
        //     type: "POST",
        //     url: "checkout.php",
        //     data : "envio="+envio.value,
        //     success: function(data)
        //     {
        //         if(tipo.value == "compra")
        //           {
        //               window.location.assign("pago.php");
        //           }else
        //           {
        //                 $.fancybox("#gracias");
        //                   setTimeout("location.href='detalle_cuenta.php'", 2000);
        //           }
        //
        //
        //     }
        // });
    });

});

</script>

<script>
function validando()
{
    document.cuenta.submit();
}
</script>


</head>

<body>


<?php
$BASE_URL="";
include("header.php");
?>

<?php 
        $cantidad=0;
        @$carro = $_SESSION['carro'];
        @$id=$_SESSION['id'];
        if( isset($carro) )
        { 
          foreach ($carro as $k => $v) 
          {
            $cantidad++;
            $array_producto[]=$v['id'];
          }
        }

 if($cantidad>0)
 { 
?>
<section id="recomendados">
  <div class="container">
    <div class="row">
      <div class="height-20"></div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h3 class="text-center fuente_georgia font_size18 section-title">También te encantará</h3>
      </div>
    </div>

    <div class="row">
      <div id="reacionadosCarousel" class="carousel slide">
        
        <?php /*/ ?>
        <ol class="carousel-indicators">
           <?php 
            @$carro = $_SESSION['carro'];
            @$id=$_SESSION['id'];
            foreach ($carro as $k => $v) 
            {
              $result201 = $db_Full->select_sql("SELECT count(*) AS 'cant' FROM tbl_relacionar_productos,tbl_productos WHERE fkproducto1_re_pro='".$id."' AND fkproducto2_re_pro=id_producto");
              $data=mysqli_fetch_assoc($result201);
              $cant=$data['cant'];
              $canti=$cant/5;//cantidad de registros entre 5
           
              if (($cant%5)==0) {//evalua el residuo de la cantidad es mayor a cero
             $canti=$canti;
               ?>
               
            <?php
             }else{
               echo $canti=round($canti)+1;
            } 
              for ($i=1; $i <=$canti ; $i++) { ?>
              <li data-target="#reacionadosCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i==1){echo "active";};?>"></li>
            <?php } 
             
           }
           ?>
       
        </ol>
        <?php /*/ ?>
 
        <div class="carousel-inner fuente_georgia">
          <?php 
          if ($carro != '' && $cantidad>0) 
          {
                        if($cantidad==1)
                        {
                            $result201 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[0]." AND fkproducto2_re_pro=id_producto limit 5");
                            while ($row201 = mysqli_fetch_array($result201))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row201['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row201['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row201['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row201['precio_producto'];?>
                                                            <?php
                                                            if ($row201['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row201['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }
                        }else if ($cantidad==2) 
                        {
                           $result201 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[0]." AND fkproducto2_re_pro=id_producto limit 3");
                            while ($row201 = mysqli_fetch_array($result201))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row201['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row201['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row201['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row201['precio_producto'];?>
                                                            <?php
                                                            if ($row201['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row201['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }

                            $result202 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[1]." AND fkproducto2_re_pro=id_producto limit 2");
                            while ($row202 = mysqli_fetch_array($result202))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row202['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row202['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row202['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row202['precio_producto'];?>
                                                            <?php
                                                            if ($row202['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row202['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }

                        }else
                        {


                            $result201 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[0]." AND fkproducto2_re_pro=id_producto limit 2");
                            while ($row201 = mysqli_fetch_array($result201))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row201['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row201['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row201['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row201['precio_producto'];?>
                                                            <?php
                                                            if ($row201['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row201['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }

                            $result202 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[1]." AND fkproducto2_re_pro=id_producto limit 2");
                            while ($row202 = mysqli_fetch_array($result202))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row202['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row202['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row202['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row202['precio_producto'];?>
                                                            <?php
                                                            if ($row202['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row202['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }


                            $result203 = $db_Full->select_sql("SELECT * FROM tbl_relacionar_productos,tbl_productos WHERE  fkproducto1_re_pro=".$array_producto[2]." AND fkproducto2_re_pro=id_producto limit 1");
                            while ($row203 = mysqli_fetch_array($result203))
                            {
                            ?>
                             <div class="item active" >
                                            <div class="row-fluid">
                                                  <div class="span3">
                                                        <a href="<?php echo $BASE_URL.$row203['url_page_tbl']; ?>">
                                                        <img src="webroot/archivos/<?php echo $row203['foto_producto'];?>" alt="" class="img-responsive">
                                                        </a>
                                                        <h4 class="text-center section-title font_size14"><?php echo $row203['titulo_producto'];?></h4>
                                                        <p class="text-center">Orig. S/. <?php echo $row203['precio_producto'];?>
                                                            <?php
                                                            if ($row203['oferta_producto'] == 'SI') 
                                                            {
                                                            ?>
                                                            <br><span class="text-danger">Sale S/. <?php echo $row203['precio_oferta_producto'];?>
                                                            </span>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </p>
                                                  </div> 
                                            </div><!--/row-fluid-->
                                    </div><!--/item--> 
                            <?php
                            }

                        }
          }
          ?>

       </div>
       </div>
        
<?php /*/ ?>
<div class="row">
      <div id="reacionadosCarousel" class="carousel slide">
     
      
        <div class="carousel-inner fuente_georgia">
            
          <div class="item active">
            <div class="row-fluid">
              <div class="span3">
                <a href="#">
                  <img src="https://unsplash.it/500/600/" alt="" class="img-responsive">
                </a>
                <h4 class="text-center section-title font_size14">Nombre Producto</h4>
                <p class="text-center">Orig. $ precio<br><span class="text-danger">Sale $oferta</span></p>
              </div>
              <div class="span3">
                <a href="#">
                  <img src="https://unsplash.it/500/600/" alt="" class="img-responsive">
                </a>
                <h4 class="text-center section-title font_size14">Nombre Producto</h4>
                <p class="text-center">Orig. $ precio<br><span class="text-danger">Sale $oferta</span></p>
              </div>
              <div class="span3">
                <a href="#">
                  <img src="https://unsplash.it/500/600/" alt="" class="img-responsive">
                </a>
                <h4 class="text-center section-title font_size14">Nombre Producto</h4>
                <p class="text-center">Orig. $ precio<br><span class="text-danger">Sale $oferta</span></p>
              </div>
              <div class="span3">
                <a href="#">
                  <img src="https://unsplash.it/500/600/" alt="" class="img-responsive">
                </a>
                <h4 class="text-center section-title font_size14">Nombre Producto</h4>
                <p class="text-center">Orig. $ precio<br><span class="text-danger">Sale $oferta</span></p>
              </div>
              <div class="span3">
                <a href="#">
                  <img src="https://unsplash.it/500/600/" alt="" class="img-responsive">
                </a>
                <h4 class="text-center section-title font_size14">Nombre Producto</h4>
                <p class="text-center">Orig. $ precio<br><span class="text-danger">Sale $oferta</span></p>
              </div>
            </div>
          </div>

         
        </div>
      </div>
    </div>

<?php /*/ ?>

</section>
<?php 
} 
?>

<!-- PAGO -->
<div class="base_pago">

    <?php /*/ ?><div class="recomendados_pago">
        <table cellpadding="0" cellspacing="0" width="100%" align="center">
        <tr><td height="20"></td></tr>
            <tr>
            <td align="center" class="fuente_georgia font_size20" >También te encantará</td>
            <!-- <td align="center" class="fuente_georgia font_size20" >You´ll Also Love</td> -->
        </tr>
        <tr><td height="20"></td></tr>
        <tr>
            <td align="center" >

                <table cellpadding="0" cellspacing="0"  class="espacio_recomendado_pago" align="center">
                <tr>
                <td align="center">

             <?php
             @$carro = $_SESSION['carro'];
             $cantidad_items = 1;
             if ($carro != '') {
                 foreach ($carro as $k => $v) 
                 {
                     $result200 = $db_Full->select_sql("SELECT * from tbl_relacionar_productos,tbl_productos where fkproducto1_re_pro='".$v['id']."' and fkproducto2_re_pro=id_producto ");
                     while ($data200 = mysqli_fetch_array($result200)) 
                     {
                         if ($cantidad_items <= 3) {
                             ++$cantidad_items;

                             ?>

                    <a href="detalle_producto.php?id_producto=<?php echo $data200['id_producto'];
                             ?>" style="text-decoration:none;">
                    <div class="item_recomendado_pago">
                        <table cellpadding="0" cellspacing="0" width="100%" align="center">
                         <tr>
                            <td align="center" class="fuente_georgia font_size20" ><img src="webroot/archivos/<?php echo $data200['foto_producto'];
                             ?>" width="144"></td>
                        </tr>
                        <tr>
                            <td align="center" class="fuente_georgia font_size13"  style="color:#000"><b><?php echo $data200['titulo_producto'];
                             ?></b></td>
                        </tr>
                        <tr>
                            <td align="center" class="fuente_georgia font_size13" style="color:#000">Orig. $<?php echo $data200['precio_producto'];
                             ?></td>
                        </tr>
                        <?php
                        if ($data200['oferta_producto'] == 'SI') {
                            ?>
                        <tr>
                            <td align="center" class="fuente_georgia font_size13" style="color:#F00" >Sale $<?php echo $data200['precio_oferta_producto'];
                            ?></td>
                        </tr>
                        <?php

                        }
                             ?>
                        </table>
                    </div>
                    </a>

                <?php

                         }
                     }
                 }
             }
                ?>




                </td>
                </tr>
                </table>

            </td>
        </tr>
        <tr><td height="20"></td></tr>
        </table>
    </div><?php /*/ ?>

    <div class="left_pago">
    <form action="https://www.sandbox.paypal.com/cgi-bin/websc" name="cuenta" method="post">

         <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
         <input type="hidden" name="business" value="millyt-facilitator@netkrom.com">
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000;">
        <tr><td height="10"></td></tr>
        <tr>
        <td class="fuente_georgia font_size20" style="padding:10px">Bolsa de compras</td>
        </tr>
        <tr><td height="10"></td></tr>
        <tr><td width="100%"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td></tr>



    <?php

    @$carro = $_SESSION['carro'];

    $product_id_array = '';
    $contador = 0;
    $sub_total = 0;
    $total = 0;
    $cantidad = 0;
    $envio = 0;
    $envio_total = 0;

    if ($carro != '') {
        foreach ($carro as $k => $v) {
            ++$contador;
            $cantidad = $cantidad * 1 + $v['cantidad'];
            $sub_total = $sub_total * 1 + ($v['cantidad'] * $v['precio']);
            $product_id_array .= $v['id'].'-'.$v['cantidad'].',';

            $total = $total * 1 + ($v['cantidad'] * $v['precio']);

            ?>

     <input type="hidden" name="item_name_<?php echo $contador;
            ?>" value="<?php echo $v['titulo'];
            ?>">
     <input type="hidden" name="amount_<?php echo $contador;
            ?>" value="<?php echo $v['precio'];
            ?>">
     <input type="hidden" name="quantity_<?php echo $contador;
            ?>" value="<?php echo $v['cantidad'];
            ?>">


        <tr>
            <td style="padding:10px; ">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%">
                        <table cellpadding="0" cellspacing="0" width="100%">
                        <tr><td><img src="webroot/archivos/<?php echo $v['foto'];
            ?>" width="100%"></td></tr>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                <td align="left"><a href="<?php echo $BASE_URL?><?php echo $v['url']; ?>" class="fuente_georgia font_size12" style="text-decoration:none;color:#5b5b5f">Editar</a></td>
                                <td align="right" ><a href="eliminar_carrito.php?id=<?php echo $v['id'];
            ?>" class="fuente_georgia font_size12" style="text-decoration:none;color:#5b5b5f">Remover</a></td>
                                </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                    <td width="10"></td>
                    <td class="fuente_georgia font_size14" valign="top">
                        <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                        <td align="left">
                            <b><?php echo $v['titulo'];
            ?></b>
                            <!--<br>
                            <span style="color:#5b5b5f">SR-341-839 &nbsp;&nbsp;&nbsp; En stock</span>-->
                        </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                        <tr>
                        <td>

                            <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f">Cantidad</td>
                                <td width="10"></td>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f"><?php echo $v['cantidad'];
            ?></td>
                            </tr>
                            <?php if ($v['talla'] != 'undefined'): ?>
                            <tr>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f">Talla</td>
                                <td width="10"></td>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f"><?php echo $v['talla'];?></td>
                            </tr>
                            <?php endif;
            ?>
                             <?php if ($v['color'] != 'undefined'): ?>
                            <tr>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f">Color</td>
                                <td width="10"></td>
                                <td align="left" class="fuente_georgia font_size14" style="color:#5b5b5f"><?php echo $v['color'];?></td>
                            </tr>
                            <?php endif;
            ?>
                            </table>

                        </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                        <!--<tr>
                        <td align="left">
                            <span class="fuente_georgia font_size14" style="color:#F00">Special 5/$27.50</span>
                        </td>
                        </tr>-->
                        </table>
                    </td>
                    <td width="10"></td>
                    <td class="fuente_georgia font_size14" align="right" valign="top"><b>S/. <?php echo $v['precio'];
            ?></b></td>
                </tr>
                </table>
            </td>
        </tr>

        <?php

        }
    }
        ?>


      <input type="hidden" name="custom" value="<?php echo $product_id_array;?>-<?php echo $envio;?>-<?php echo $_SESSION['id_cliente'];?>">
      <input type="hidden" name="notify_url" value="<?php echo $royaltyUtils->baseUrl();?>/ipn.php">
      <input type="hidden" name="return" value="<?php echo $royaltyUtils->baseUrl();?>/detalle_cuenta.php">
      <input type="hidden" name="rm" value="2">
      <input type="hidden" name="cbt" value="Return to The Store">
      <input type="hidden" name="cancel_return" value="<?php echo $royaltyUtils->baseUrl();?>/index.php">
      <input type="hidden" name="lc" value="US">
      <input type="hidden" name="currency_code" value="USD">

        <tr><td width="100%"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td></tr>

        <tr>
            <td style="padding:20px;">
                            <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                            <td align="left"><img src="images/alerta_pago.jpg"></td>
                            <td width="10"></td>
                            <td align="left" class="fuente_georgia font_size12" style="color:#5b5b5f">
                                Podrás revisar el precio final y los otros detalles de tu pedido
                                en el área de la derecha antes de finalizar tu orden.
                               <!-- You will be able to review the final price and other details of your
                               Order Total at the right before you Place Order. -->
                            </td>
                            </tr>
                            </table>


                            <table cellpadding="0" cellspacing="0" width="100%">
                            <tr><td height="10"></td></tr>
                            <tr>
                            <td align="left" class="fuente_georgia font_size14">Subtotal</td>
                            <!-- <td align="left" class="fuente_georgia font_size14">Merchandise Subtotal</td> -->
                            <td align="right" >
                            <span class="fuente_georgia font_size24" style="color:#F00">S/. <?php echo $total;?></span><br>
                            <span class="fuente_georgia font_size12" style="color:#5b5b5f">Todos los precios están en soles</span><br>
                            </td>
                            </tr>
                            </table>
            </td>
        </tr>

        </table>
        </form>
    </div>

    <div class="right_pago">

        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000;">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size20">Checkout</span><BR>
                        <span class="fuente_georgia font_size14">Hola <?php echo $_SESSION['nombre_cliente'];?></span>
                    </td>
                    <td align="right">
                      <?php if ($total > 0) 
                      {
                      ?>
                          <!--<a href="#" onclick="validando();"><img src="images/boton_paypal.jpg"></a>-->
                      <?php
                      } 
                      ?>
                    </td>
                </tr>
                </table>

            </td>
        </tr>
        <tr><td height="10"></td></tr>
        </table>



        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000; background-color:#f7f8f8">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size20" style="color:#000">1. Datos del cliente</span><BR><br>
                        <span class="fuente_georgia font_size14" style="color:#5b5b5f"><b>Dirección de envío</b></span><BR>
                        <span class="fuente_georgia font_size14" style="color:#5b5b5f">
                        <?php if($nombre_direccion_cli!=""){ echo $nombre_direccion_cli; echo " ";  echo $apellido_direccion_cli;  } ?> 
                        <?php if($dir1_direccion_cli!=""){ echo "<br>"; echo $dir1_direccion_cli; } ?>
                        <?php if($departamento!=""){ echo "<br>"; echo $departamento; } ?>
                        <?php if($distrito!=""){ echo "<br>"; echo $distrito; } ?>
                        <?php if($postal_direccion_cli!=""){ echo "<br>"; echo "Postal: "; echo $postal_direccion_cli; } ?>
                        <?php if($tel_direccion_cli!=""){  echo "<br>"; echo "Tel/Cel: "; echo $tel_direccion_cli; } ?>
                        <?php if($email_cliente!=""){  echo "<br>"; echo "Email: "; echo $email_cliente; } ?>
                       
                       
                        <?php
                        if($dir1_direccion_cli=="")
                        echo "<span style='color:#FF0000'><br> Ingrese dirección de envío</span>";
                        ?>

                        </span>
                    </td>
                    <td align="right" valign="top" class="fuente_georgia font_size14"><a href="editar_direccion.php?tipo=compra" style="text-decoration:none; color:#000">Editar ></a></td>
                </tr>
                </table>
               
            </td>
        </tr>
        </table>




        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000; background-color:#f7f8f8">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size20" style="color:#000">2. Delivery</span>
                        <span class="fuente_georgia font_size14" style="color:#5b5b5f">
                        <b> 
                          <?php if($envio_cli!=""){ echo "<br><br>"; echo $envio_cli; } ?>
                        </b>
                        <br>

                          <?php 
                          if($envio_cli=="Standar Delivery")
                          {
                            echo " Este servicio tiene un costo de S/. 10.00 con <br> un plazo de 3 a 5 días hábiles.";
                          }else if($envio_cli=="Express Delivery")
                          {
                            echo "Este servicio tiene un costo de S/. 20.00 con <br>un plazo de 1 a 2 días hábiles.";
                          }

                          ?>  

                        <?php
                        if($envio_cli=="")
                        echo "<span style='color:#FF0000'><br> Ingrese dirección de envío</span>";
                        ?>
                        </span>
                       
                    </td>
                    <td align="right" valign="top" class="fuente_georgia font_size14"><a href="editar_envio.php?tipo=compra" style="text-decoration:none; color:#000">Editar ></a></td>
                </tr>
                </table>

            </td>
        </tr>
        <tr><td height="10"></td></tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>



        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000; background-color:#f7f8f8">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size20" style="color:#000">3. Tipo de Pago</span>
                        <br><br>
                        <span class="fuente_georgia font_size14" style="color:#5b5b5f">
                        <table>
                              <tr>
                              <td class="fuente_georgia font_size13">

                              <script>
                              function validar_tipo(tipo) 
                              {
                                 if(tipo.value=="RUC")
                                 {
                                   $(".razon").css("display","block");
                                   $(".ruc").css("display","block");
                                   $(".dni").css("display","none");
                                 }else
                                 {
                                    $(".dni").css("display","block");
                                    $(".razon").css("display","none");
                                    $(".ruc").css("display","none");
                                 }
                              }
                              </script>

                              <b>
                              <?php 
                              if($tipo_cliente=="RUC"){ echo "FACTURA";}else if($tipo_cliente=="DNI"){ echo "BOLETA"; } 
                              ?>
                              <br>
                              <?php 
                              if($tipo_cliente=="RUC")
                              { 
                                echo "Razón Social: ";
                                echo $razon_cliente;
                                echo "<br>";
                                echo "RUC: ";
                                echo $ruc_cliente;
                              }else if($tipo_cliente=="DNI")
                              { 
                                echo "DNI: ";
                                echo $dni_cliente;
                              } 
                              ?>
                              </b>

                              </td>
                              </tr>


                        </table>

                        <?php
                        if($tipo_cliente=="")
                        echo "<span style='color:#FF0000'><br> Seleccione un tipo de pago</span>";
                        ?>
                        </span>
                       
                    </td>
                    <td align="right" valign="top" class="fuente_georgia font_size14"><a href="editar_email.php?tipo=compra" style="text-decoration:none; color:#000">Editar ></a></td>
                </tr>
                </table>

            </td>
        </tr>
        <tr><td height="10"></td></tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>


        <?php
        if($dir1_direccion_cli!="" && $envio_cli!="" && $total > 0 && $tipo_cliente!="")
        {
        ?>
        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000;">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">
            <span class="fuente_georgia font_size20">4. Pago</span>
            </td>
        </tr>
        <tr><td height="10"></td></tr>
        <tr><td width="100%"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td></tr>
        <tr>
            <td style="padding:10px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td class="fuente_georgia font_size14" width="30"><input type="radio" name="tarjeta" value="credit" checked=""></td>
                <td class="fuente_georgia font_size14"><span class="fuente_georgia font_size14" style="color:#5b5b5f">Tarjeta de crédito</span></td>
                </tr>
                <tr>
                <td></td>
                <td align="left"><img src="images/tarjetas.jpg"></td>
                </tr>
                </table>

            </td>
        </tr>

        <tr>
        <td style="padding:10px"> 
                <table cellpadding="0" cellspacing="0" align="center" width="100%">
                <tr>
                <td class="fuente_georgia font_size13" valign="top">Número de Tarjeta</td>
                <td width="20"></td>
                <td class="fuente_georgia font_size13">
                <input type="text" name="tarjeta" id="tarjeta" onKeyPress="return soloNumeros(event)"  value="<?php echo $tarjeta;?>" style="width:100%; border:solid 1px #000; height:25px">
                <div id="error_tarjeta" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Número de Tarjeta</div>
                </td>
                </tr>
                <tr><td height="30"></td></tr>
                <tr>
                <td class="fuente_georgia font_size13" width="120" valign="top">Fecha de Expiración</td>
                <td width="20"></td>
                <td class="fuente_georgia font_size13" valign="top">
                  
                    <select type="text" name="mes" id="mes"  style="width:45%; background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
                      <option value="" <?php if($mes=="Seleccione"){ echo "selected";} ?> >Seleccione</option>
                        <option value="Enero" <?php if($mes=="Enero"){ echo "selected";} ?> >Enero</option>
                        <option value="Febrero" <?php if($mes=="Febrero"){ echo "selected";} ?> >Febrero</option>
                        <option value="Marzo" <?php if($mes=="Marzo"){ echo "selected";} ?> >Marzo</option>
                        <option value="Abril" <?php if($mes=="Abril"){ echo "selected";} ?> >Abril</option>
                        <option value="Mayo" <?php if($mes=="Mayo"){ echo "selected";} ?> >Mayo</option>
                        <option value="Junio" <?php if($mes=="Junio"){ echo "selected";} ?> >Junio</option>
                        <option value="Julio" <?php if($mes=="Julio"){ echo "selected";} ?> >Julio</option>
                        <option value="Setiembre" <?php if($mes=="Setiembre"){ echo "selected";} ?> >Setiembre</option>
                        <option value="Octubre" <?php if($mes=="Octubre"){ echo "selected";} ?> >Octubre</option>
                        <option value="Noviembre" <?php if($mes=="Noviembre"){ echo "selected";} ?> >Noviembre</option>
                        <option value="Diciembre" <?php if($mes=="Diciembre"){ echo "selected";} ?> >Diciembre</option>
                    </select>
                   
                    
                     <select type="text" name="anio" id="anio"  style="width:45%; float:right; background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
                      <option value="" <?php if($anio=="Seleccione"){ echo "selected";} ?> >Seleccione</option>
                        <option value="2016" <?php if($anio=="2016"){ echo "selected";} ?> >2016</option>
                        <option value="2017" <?php if($anio=="2017"){ echo "selected";} ?> >2017</option>
                        <option value="2018" <?php if($anio=="2018"){ echo "selected";} ?> >2018</option>
                        <option value="2019" <?php if($anio=="2019"){ echo "selected";} ?> >2019</option>
                        <option value="2020" <?php if($anio=="2020"){ echo "selected";} ?> >2020</option>
                        <option value="2021" <?php if($anio=="2021"){ echo "selected";} ?> >2021</option>
                        <option value="2022" <?php if($anio=="2022"){ echo "selected";} ?> >2022</option>
                        <option value="2023" <?php if($anio=="2023"){ echo "selected";} ?> >2023</option>
                        <option value="2024" <?php if($anio=="2024"){ echo "selected";} ?> >2024</option>
                        <option value="2025" <?php if($anio=="2025"){ echo "selected";} ?> >2025</option>
                    </select>
                    
                    <br><br>
                    <div id="error_mes" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Mes de Expiración</div>
                    <div id="error_anio" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Año de Expiración </div>
                   
                </td>
                </tr>
                </table>
        </td>
        </tr>
       <!--
        <tr>
            <td style="padding:10px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td class="fuente_georgia font_size14" width="30"><input type="radio" name="tarjeta" value="paypal"></td>
                <td>
                    <table cellpadding="0" cellspacing="0">
                    <tr>
                    <td><img src="images/tarjeta_paypal.jpg"></td>
                    <td class="fuente_georgia font_size14"><span class="fuente_georgia font_size14" style="color:#5b5b5f"> &nbsp;&nbsp; Usar PayPal</span></td>
                    </tr>
                    </table>
                </td>
                </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="padding:10px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td class="fuente_georgia font_size14" width="30"><input type="radio" name="tarjeta" value="deposit"></td>
                <td class="fuente_georgia font_size14"><span class="fuente_georgia font_size14" style="color:#5b5b5f">Depósito en cuenta corriente</span></td>
                </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="padding:10px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td class="fuente_georgia font_size14" width="30"><input type="radio" name="tarjeta" value="cash"></td>
                <td class="fuente_georgia font_size14"><span class="fuente_georgia font_size14" style="color:#5b5b5f">Pago en efectivo en contra entrega</span></td>
                </tr>
                </table>
            </td>
        </tr>
        -->

        </table>


       


        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="20"></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" width="100%" style="border:solid 1px #000; background-color:#f7f8f8">
        <tr><td height="10"></td></tr>
        <tr>
            <td style="padding:10px">

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size20" style="color:#000">5. Revisión de pedido </span>
                    </td>
                </tr>
                <tr><td height="20"></td></tr>
                </table>

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size14"><b>Resumen del pedido</b></span>
                    </td>
                    <td></td>
                </tr>
                <tr><td height="10"></td><td height="10"></td></tr>
               
                <?php
                if($tipo_cliente=="DNI")
                {
                ?>
                  <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Subtotal de la mercadería</span></td>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">S/. <?php echo number_format($total,2);?></span></td>
                  </tr>
                <?php 
                }else
                {
                ?>
                  <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Subtotal de la mercadería</span></td>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">S/. <?php echo number_format($total-($total*18/100),2);?></span></td>
                  </tr>

                  <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">I.G.V.</span></td>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">S/. <?php echo number_format($total*18/100,2);?></span></td>
                  </tr>
                <?php
                }
                ?>
                

                <tr><td height="10"></td><td height="10"></td></tr>
                <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Envío a su dirección</span></td>
                    <td>
                    <span class="fuente_georgia font_size14" style="color:#5b5b5f">
                      <?php 
                      if( $total>200 ) 
                      { 
                        $envio="0.00";
                      }else if($envio_cli=="Standar Delivery")
                      {
                        $envio = "10.00";
                      }else if($envio_cli=="Express Delivery")
                      {
                        $envio = "20.00";
                      }

                      ?>  
                      
                      S/. <?php echo $envio; ?>
                    
                    </span>
                    </td>
                </tr>
               
                <tr><td height="10"></td><td height="10"></td></tr>
                <tr>
                    <td><span class="fuente_georgia font_size14"><b>Total del pedido</b></span></td>
                    <td><span class="fuente_georgia font_size14"><b>S/. <?php echo number_format($total+$envio,2);?></b></span></td>
                </tr>
                </table>

                <table cellpadding="0" cellspacing="0" width="100%">
                <tr><td height="20"></td></tr>
                <tr>
                    <td align="left"><div style="width:100%; height:1px; background-color:#ccc;"></td>
                </tr>
                <tr><td height="20"></td></tr>
                </table>

                <?php /*/ ?><table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left">
                        <span class="fuente_georgia font_size14"><b>Resumen del pago</b></span>
                    </td>
                    <td></td>
                </tr>
               
                <tr><td height="10"></td><td height="10"></td></tr>
                <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Pago de hoy día</span></td>
                    <td></td>
                </tr>
                <tr><td height="10"></td><td height="10"></td></tr>
                <tr>
                    <td><span class="fuente_georgia font_size14"><b>Cargo en la tarjeta de crédito</b></span></td>
                    <!-- <td><span class="fuente_georgia font_size14"><b>Credit Card Payment Due</b></span></td> -->
                    <td><span class="fuente_georgia font_size20" style="color:#F00">S/. <?php echo $total+$envio; ?></span></td>
                </tr>
                </table>


                <table cellpadding="0" cellspacing="0" width="100%">
                <tr><td height="20"></td></tr>
                <tr>
                    <td align="left"><div style="width:100%; height:1px; background-color:#ccc;"></td>
                </tr>
                <tr><td height="20"></td></tr>
                </table>
                <?php /*/ ?>

                <table cellpadding="0" cellspacing="0" width="100%">
               <!-- <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Impuestos, tasas y aranceles:</span></td>
                    <td><span class="fuente_georgia font_size14" >Lorem</span></td>
                </tr>
                 <tr><td height="10"></td><td height="10"></td></tr>
                <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Tiempo de entrega:</span></td>
                    <td><span class="fuente_georgia font_size14" >Lorem</span></td>
                </tr>
                 <tr><td height="10"></td><td height="10"></td></tr>-->
                <tr>
                    <td><span class="fuente_georgia font_size14" style="color:#5b5b5f">Fácil devolución en 60 días</span></td>
                    <td><span class="fuente_georgia font_size14" ><!--Lorem--></span></td>
                </tr>
                </table>

            </td>
        </tr>
        <tr><td height="10"></td></tr>
        </table>
         <table cellpadding="0" cellspacing="0" width="100%">
         <?php
         if ($total > 0) {
             ?>
           <tr><td height="20"></td></tr>
        <tr>
            <td align="right">
                <a href="#" style="color:#FFF; background-color:#000; padding:10px; text-decoration:none;" class="fuente_georgia font_size14 payButton">PAGAR</a>
            </td>
        </tr>

         <?php
         }
         ?>
        <tr><td height="20"></td></tr>
        <tr><td align="right"><a href="#popup_privacidad" style="color:#F00; text-decoration:none;" class="fancybox fuente_georgia font_size14">Leer políticas de privacidad</a></td></tr>
        </table>

        <?php
        }
        ?>

    </div>

</div>
<!--FIN PAGO-->



<!--FOOTER-->
<?php
include 'footer.php';
?>

<script type="text/javascript">
  $(document).ready(function() {
      $('#reacionadosCarousel').carousel({
        interval: 10000
    })
  });
</script>

</body>
</html>
