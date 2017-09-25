<?php
//include("inc.aplication_top.php");
session_start();
require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
include_once("conexion.php");
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
<meta name="description" content="" />
<meta name="og:image" content="<?php echo $royaltyUtils->baseUrl(); ?>/images/cabecera_email.jpg" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
    <link href="css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- POPUP -->
<script type="text/javascript" src="fancybox/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- FIN POPUP -->

<!-- Owl Carousel Assets -->
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<script src="owl-carousel/owl.carousel.js"></script>
<!-- Fin Owl Carousel Assets -->

<script src="js/jquery.collagePlus.js"></script>
<script src="js/jquery.removeWhitespace.js"></script>
<script src="js/jquery.collageCaption.js"></script>


<script>

jQuery(document).ready(function($)
{
      $('.fancybox').fancybox();

      $('.fancybox-media')
                .attr('rel', 'media-gallery')
                .fancybox({
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

    <?php if(isset($_GET['order']) && isset($_GET['status']) && $_GET['status'] == 'ok'){
            echo '$.fancybox("#orderPopup");';
    }else{
        if(!isset($_COOKIE['homePopup'])){
            echo '$.fancybox("#popup_principal", {afterClose: function(){setCookie("homePopup", "-", 1);}});';
        }

    }
    ?>


      collage();
     $('.menu_fotos').collageCaption();

      $(".base_item_menu").hover(
      function() {
        $(this).find(".item_menu").css("color","#ff0000");
        $(this).find(".vista_menu").stop( true, true ).fadeIn(10);
      }, function() {
        $(this).find(".item_menu").css("color","#000000");
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



    var slider = $("#owl-slider");

    slider.owlCarousel(
    {
          itemsCustom :
          [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 1],
            [1000, 1],
            [1200, 1],
            [1400, 1],
            [1600, 1]
          ],
          navigation : false,
          pagination : false,
          paginationNumbers : false,
          navigationText: false,
          autoPlay: 2000
    });




});



function collage() {
        $('.menu_fotos').removeWhitespace().collagePlus(
            {
                'allowPartialLastRow' : true
            }
        );
    };

    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.menu_fotos .item_fotos').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });

</script>

<style>
    .container:before,
    .container:after {
      content: "";
      display: table;
    }
    .container:after {
      clear: both;
    }
    .item_fotos {
      float: left;
      margin-bottom: 5px;
    }
    .item_fotos img {
      max-width: 100%;
      max-height: 100%;
      vertical-align: bottom;
    }
    .first-item {
      clear: both;
    }
    .last-row, .last-row ~ .item_fotos {
      margin-bottom: 0;
    }
  </style>

</head>

<body>


<?php
include("header.php");
?>





<!--SLIDER-->
<?php
$sql = "Select * from tbl_banner_home order by id desc limit 1";
$query = $db_Full->select_sql($sql);
$titleHome = mysql_fetch_row($query);
if(count($titleHome) > 0):
?>
<table cellpadding="0" cellspacing="0" width="100%" align="center">
<tr>
    <td class="fuente_georgia font_size26" align="center"><?php echo $titleHome[1]; ?></td>
</tr>
<tr>
    <td class="fuente_georgia font_size16" align="center"><?php echo $titleHome[2]; ?></td>
</tr>
<tr><td height="20"></td></tr>
</table>
<?php endif; ?>


<?php
$sql = "Select * from tbl_banner_home_slides order by id desc";
$query = $db_Full->select_sql($sql);
;
?>
<div class="base_slider">
    <div class="slider">

         <div id="owl-slider"  class="owl-carousel owl-theme">
             <?php
             while ($bannersHome = mysql_fetch_array($query)) {
                 if($bannersHome['has_link'] == 1){
                     echo '<a href="' . $bannersHome['link'] . '"><div class="item"><img src="' . $royaltyUtils->baseUrl() . '/admin/aplication/webroot/archivos/' . $bannersHome['image'] . '" style="width:100%" ></div></a>';
                 }else{
                     echo '<div class="item"><img src="' . $royaltyUtils->baseUrl() . '/admin/aplication/webroot/archivos/' . $bannersHome['image'] . '" style="width:100%" ></div>';
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
<div class="menu_fotos">

     <?php
     $result = $db_Full->select_sql("SELECT * FROM tbl_tipos order by orden_tipo asc", $link);
     while ($row_tipo = mysql_fetch_array($result))
     {
     ?>


   <div class="item_fotos">
      <a href="categorias.php?tipos=<?php echo $row_tipo["id_tipo"];?>">
      <?php
      $imagen1 = getimagesize("admin/aplication/webroot/archivos/".$row_tipo["foto_tipo"]);
      $ancho1 = $imagen1[0];
      $alto1 = $imagen1[1];
      ?>
      <img src="admin/aplication/webroot/archivos/<?php echo $row_tipo["foto_tipo"];?>" <?php if($deviceType=="computer"){ ?> width="<?php echo $ancho1;?>" height="<?php echo $alto1;?>" <?php } ?>  />
      </a>
    </div>

    <?php
    }
    ?>


  </div>
<!--FIN FOTOS MENU-->


<!--REDES HOME-->
<div class="base_redes">

    <div class="left_redes">
        <table cellpadding="0" cellspacing="0" align="center" width="100%">
        <tr>
            <td class="fuente_georgia font_size20" style="color:#FFF" align="center">ÚNETE A NUESTRAS REDES SOCIALES</td>
        </tr>
        <tr><td height="20"></td></tr>
        <tr>
            <td align="center">
                        <a href="#"><img src="images/facebook_footer.png"></a>
                        <a href="#"><img src="images/youtube_footer.png"></a>
                        <a href="#"><img src="images/instagram_footer.png"></a>
                        <a href="#"><img src="images/email_footer.png"></a>
             </td>
        </tr>
        <tr><td height="20"></td></tr>
        <tr>
           <td align="center">
           <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">síguenos en Facebook /</a>
           <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">Youtube /</a>
           <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">Instagram /</a>
           <a href="#" class="fuente_georgia font_size15" style="color:#FFF;text-decoration:none">E mail</a>
           </td>
        </tr>
        </table>
    </div>

    <div class="right_redes">
        <table cellpadding="0" cellspacing="0" align="center" width="100%">
        <tr><td height="20"></td></tr>
        <tr>
            <td class="fuente_georgia font_size12" style="color:#FFF" align="center">Novedades y muchos privilegios encuentras en</td>
        </tr>
        <tr>
            <td class="fuente_georgia font_size20" style="color:#FFF" align="center">ROYALTY</td>
        </tr>
        <tr><td height="57"></td></tr>
        <tr>
           <td align="center">
                  <table cellpadding="0" cellspacing="0" width="100%">
               <tr>
                       <td align="center"><a href="magazine.php" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">MAGAZINE</a> </td>
                    <td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">ROYALTY CARD</a> </td>
                    <td align="center"><a href="asesoria.php" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">QUE ESTA DE MODA</a> </td>
                    <td align="center"><a href="ideas.php" class="fuente_georgia font_size12" style="color:#FFF;text-decoration:none">IDEAS PARA REGALAR</a></td>
               </tr>
               </table>
           </td>
        </tr>
        </table>
    </div>

</div>
<!--FIN REDES HOME-->


<!--LINKS HOME-->
<div class="base_videos">
    <table cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" height="50"></td></tr></table>
    <div class="videos">

    <table cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center" height="50" class="fuente_georgia font_size20"><b>VIDEOS</b></td></tr>
    </table>


     <?php
     $result_video = $db_Full->select_sql("SELECT * FROM tbl_videos order by orden_vi asc limit 3", $link);
     while ($row_video = mysql_fetch_array($result_video))
     {
     ?>
         <a href="<?php echo $row_video["link_vi"];?>" class="fancybox-media">
        <div class="item_video">
            <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center"><img src="admin/aplication/webroot/archivos/<?php echo $row_video["foto_vi"];?>" style="width:100%"></td>
            </tr>
            <tr><td height="10"></td></tr>
            <tr><td align="center" class="fuente_georgia font_size14"><?php echo $row_video["titulo_vi"];?></td></tr>
            <tr><td height="10"></td></tr>
            </table>
        </div>
        </a>
     <?php
     }
     ?>

    </div>
</div>
<!--FIN LINKS HOME-->


<?php
include("footer.php");
?>

    <?php
    if(isset($_GET['order']) && isset($_GET['status']) && $_GET['status'] == 'ok'):
    ?>
    <div id="orderPopup">
        <a href="javascript:$.fancybox.close();" style="cursor:pointer;text-decoration:none;color:#000">X</a>
        <h3>Gracias</h3>
        <p>Su pedido ha sido registrado en el sistema.</p>
    </div>
    <?php endif;?>
</body>
</html>
