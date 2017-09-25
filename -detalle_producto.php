<?php
//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<script src="http://cdnjs.cloudflare.com/amysql_fetch_arrayjax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/jquery.row-grid.js"></script>

<!-- POPUP -->
<script type="text/javascript" src="fancybox/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery.zoom.min.js"></script> -->

<!-- Popup Plugin Files -->
<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!-- FIN POPUP -->

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
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>

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


      $('.flecha').click(function(){
                $(this).parent().parent().parent().parent().find('.detalle').toggle("fast");

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

    // $('.foto_producto_item').elevateZoom();
    // $('#foto').zoom({url: $('.foto_producto_item').attr('src')});

    $('#foto_1').elevateZoom({
        scrollZoom: true
    });

    // do your stuff

    // remove only the "img" elevateZoom



    $('.productThumbnail').on('click', function(e){
        e.preventDefault();

        $('#foto_1').attr('src', $(this).attr('src'));
        $('#foto_1').attr('data-zoom-image', $(this).attr('src'));

        $('.zoomContainer').remove();
        $('#foto_1').removeData('elevateZoom');
        $('#foto_1').removeData('zoomImage');

        $('#foto_1').elevateZoom({
            scrollZoom: true
        });
    });


    $( "#estrella_uno" ).click(function() {
      $("#estrella_uno").css("display","none");
      $("#estrella_1").css("display","block");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
       $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
       $("#estrella").val("1");

    });


    $( "#estrella_1" ).click(function() {
      $("#estrella_uno").css("display","block");
      $("#estrella_1").css("display","none");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
       $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("");
    });


    $( "#estrella_dos" ).click(function() {
      $("#estrella_uno").css("display","none");
      $("#estrella_1").css("display","block");
      $("#estrella_dos").css("display","none");
      $("#estrella_2").css("display","block");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
       $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("2");
    });


    $( "#estrella_2" ).click(function() {
      $("#estrella_uno").css("display","block");
      $("#estrella_1").css("display","none");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
       $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("");
    });



     $( "#estrella_tres" ).click(function() {
      $("#estrella_uno").css("display","none");
      $("#estrella_1").css("display","block");
      $("#estrella_dos").css("display","none");
      $("#estrella_2").css("display","block");
      $("#estrella_tres").css("display","none");
      $("#estrella_3").css("display","block");
       $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("3");
    });


    $( "#estrella_3" ).click(function() {
      $("#estrella_uno").css("display","block");
      $("#estrella_1").css("display","none");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
      $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("");
    });




     $( "#estrella_cuatro" ).click(function() {
      $("#estrella_uno").css("display","none");
      $("#estrella_1").css("display","block");
      $("#estrella_dos").css("display","none");
      $("#estrella_2").css("display","block");
      $("#estrella_tres").css("display","none");
      $("#estrella_3").css("display","block");
       $("#estrella_cuatro").css("display","none");
      $("#estrella_4").css("display","block");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("4");
    });


    $( "#estrella_4" ).click(function() {
      $("#estrella_uno").css("display","block");
      $("#estrella_1").css("display","none");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
      $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("");
    });



         $( "#estrella_cinco" ).click(function() {
      $("#estrella_uno").css("display","none");
      $("#estrella_1").css("display","block");
      $("#estrella_dos").css("display","none");
      $("#estrella_2").css("display","block");
      $("#estrella_tres").css("display","none");
      $("#estrella_3").css("display","block");
       $("#estrella_cuatro").css("display","none");
      $("#estrella_4").css("display","block");
       $("#estrella_cinco").css("display","none");
      $("#estrella_5").css("display","block");
      $("#estrella").val("5");
    });


    $( "#estrella_5" ).click(function() {
      $("#estrella_uno").css("display","block");
      $("#estrella_1").css("display","none");
      $("#estrella_dos").css("display","block");
      $("#estrella_2").css("display","none");
      $("#estrella_tres").css("display","block");
      $("#estrella_3").css("display","none");
      $("#estrella_cuatro").css("display","block");
      $("#estrella_4").css("display","none");
       $("#estrella_cinco").css("display","block");
      $("#estrella_5").css("display","none");
      $("#estrella").val("");
    });

    $('.addCartButton').on('click', function(e){
        e.preventDefault();

        var countTalla = $('input[name=talla]').length,
            countColor = $('input[name=color]').length;

        if(countTalla > 0 && typeof $('input[name=talla]:checked', '#addToCart').val() == 'undefined'){
            alert('Debe seleccionar una talla para continuar');
            return false;
        }

        if(countColor > 0 && typeof $('input[name=color]:checked', '#addToCart').val() == 'undefined'){
            alert('Debe seleccionar un color para continuar');
            return false;
        }

        document.getElementById('addToCart').submit();
        return false;
    });

    $('.addComment').on('click', function(e){
        e.preventDefault();

        var titulo = document.comentario.elements['titulo'];
        var estrella = document.comentario.elements['estrella'];
        var comentario = document.comentario.elements['comentario'];


        if(estrella.value == "")
        {
            $("#estrella_error").css("border-bottom-color", "#900");
            $("#estrella_error").css("border-top-color", "#900");
            $("#estrella_error").css("border-left-color", "#900");
            $("#estrella_error").css("border-right-color", "#900");
            $("#error_estrella_error").css("display", "block");

            return false;
        }else
        {
            $("#estrella_error").css("border-bottom-color", "#ccc");
            $("#estrella_error").css("border-top-color", "#ccc");
            $("#estrella_error").css("border-left-color", "#ccc");
            $("#estrella_error").css("border-right-color", "#ccc");
            $("#error_estrella_error").css("display", "none");
        }



        if(titulo.value == "")
        {
            $("#titulo_error").css("border-bottom-color", "#900");
            $("#titulo_error").css("border-top-color", "#900");
            $("#titulo_error").css("border-left-color", "#900");
            $("#titulo_error").css("border-right-color", "#900");
            $("#error_titulo_error").css("display", "block");

            return false;
        }else
        {
            $("#titulo_error").css("border-bottom-color", "#ccc");
            $("#titulo_error").css("border-top-color", "#ccc");
            $("#titulo_error").css("border-left-color", "#ccc");
            $("#titulo_error").css("border-right-color", "#ccc");
            $("#error_titulo_error").css("display", "none");
        }



        if(comentario.value == "")
        {
            $("#comentario_error").css("border-bottom-color", "#900");
            $("#comentario_error").css("border-top-color", "#900");
            $("#comentario_error").css("border-left-color", "#900");
            $("#comentario_error").css("border-right-color", "#900");
            $("#error_comentario_error").css("display", "block");

            return false;
        }else
        {
            $("#comentario_error").css("border-bottom-color", "#ccc");
            $("#comentario_error").css("border-top-color", "#ccc");
            $("#comentario_error").css("border-left-color", "#ccc");
            $("#comentario_error").css("border-right-color", "#ccc");
            $("#error_comentario_error").css("display", "none");
        }


         $.ajax({
                  type: "POST",
                  url: "guardar_comentario.php",
                  data : "titulo="+$('#titulo').val()+"&estrella="+$('#estrella').val()+"&comentario="+$('#comentario').val()+"&cliente="+$('#cliente').val()+"&producto="+$('#producto').val(),

                  success: function(data)
                  {
                       $.fancybox("#gracias_comentario");
                      setTimeout(location.reload(true), 2000);

                  }
            });

        return false;
    });
});

$(document).ready(function() {
    $(".quantityProduct").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
    </script>



</head>

<body>


<?php
include("header.php");

$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fktipo_producto=id_tipo and id_producto='".$_GET['id_producto']."' group by id_producto ");

while ($row1 = mysqli_fetch_array($result1))
{
  $titulo=$row1["titulo_producto"];
 $marca=$row1["nombre_marca"];
  if($row1['oferta_producto']=="SI")
  { $precio= $row1['precio_oferta_producto'];
  }else{
      $isDayOfer = $db_Full->select_sql("SELECT * FROM tbl_ofertas where fkproducto_oferta='".$_GET['id_producto']."' ");
      if(count($isDayOfer) > 0){
          $precio= $row1['precio_oferta_producto'];
      }else{
          $precio = $row1["precio_producto"]; 
      }

  }


  $descripcion=$row1["descripcion_producto"];
  $codigo=$row1["codigo_producto"];
  $tipo=$row1["nombre_tipo"];
  $id_tipo=$row1["id_tipo"];

  $foto1=$row1["foto_producto"];
  $foto2=$row1["foto2_producto"];
  $foto3=$row1["foto3_producto"];
  $foto4=$row1["foto4_producto"];
  $foto5=$row1["foto5_producto"];
  $foto6=$row1["foto6_producto"];
}



$result10 = $db_Full->select_sql("SELECT COUNT(id_comentario) as cantidad FROM tbl_comentarios where fkproducto_comentario=".$_GET['id_producto']." ");
while ($row10 = mysqli_fetch_array($result10))
{
    $cantidad_comentario=$row10['cantidad'];
}
$cantidad_estrellas = 0;
$result100 = $db_Full->select_sql("SELECT SUM(estrella_comentario) as estrella FROM tbl_comentarios where fkproducto_comentario=".$_GET['id_producto']." ");
while ($row100 = mysqli_fetch_array($result100))
{
    if($cantidad_comentario>0)
    {
    $cantidad_estrellas += $row100['estrella'];
    }else
    {
    $cantidad_estrellas=0;
    }
}

if($cantidad_comentario < 1){
    $cantidad_estrellas = 0;
}else{
    $cantidad_estrellas=round($cantidad_estrellas/$cantidad_comentario);
}

?>





<!--POPUP PRODUCTOS-->
<div id="popup_registro_comentario" style="width:600px;display: none; background-color:#FFF;">
                <form action="" name="comentario" method="post" enctype="multipart/form-data" >
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">ESCRIBA UN COMENTARIO</td>
                    <td align="right" valign="top" width="30"><a href="javascript:$.fancybox.close();" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size14" style="color:#000;padding:25px; width:100%;">
                    <br>
                    <div style="width:100%;background-color:#EFEFEF; ">
                        <table cellpadding="0" cellspacing="0" style="padding:15px;">
                        <tr>
                        <td> <img  src="webroot/archivos/<?php echo $foto1; ?>" style="width:100px"></td>
                        <td width="10"></td>
                        <td class="fuente_georgia font_size14" valign="top"><?php echo $titulo; ?></td>
                        </tr>
                        </table>
                    </div>
                    <br>

                    Calificación: <br><br>
                    Selecciones el número de estrellas que refleja tu calificación
                    <br><br>

                    <table cellpadding="0" cellspacing="0" height="29" >
                    <tr>
                        <td align="center" height="29">
                            <img id="estrella_uno" src="images/estrella_uno.png" style="padding-right:10px; cursor:pointer">
                            <img id="estrella_1" src="images/estrella_dos.png" style="padding-right:10px; display:none; cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_dos" src="images/estrella_uno.png" style="padding-right:10px; cursor:pointer">
                            <img id="estrella_2" src="images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_tres" src="images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_3" src="images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_cuatro" src="images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_4" src="images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_cinco" src="images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_5" src="images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                    </tr>
                    </table>
                    <div id="error_estrella_error" style="display:none;color:#F00;" class="fuente_georgia font_size13">Seleccione un número de estrellas</div>
                    <br><br>


                    Título de tu comentario :
                    <br><br>
                    <input type="text" name="titulo" id="titulo" style="width:100%">
                    <div id="error_titulo_error" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Título del Comentario</div>
                    <input type="hidden" name="estrella" id="estrella" style="width:100%">
                     <input type="hidden" name="cliente" id="cliente" style="width:100%" value="<?php echo $_SESSION['id_cliente']?>">
                      <input type="hidden" name="producto" id="producto" style="width:100%" value="<?php echo $_GET['id_producto']?>">
                    <br><br>

                    Tu comentario :
                    <br><br>
                    <textarea  name="comentario" id="comentario" style="width:100%; height:70px"></textarea>
                    <div id="error_comentario_error" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Comentario</div>
                    <br><br>

                    <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                    <td align="center">
                        <div class="boton_crear_cuenta fuente_georgia font_size12">
                            <a class="addComment" href="#" style="text-decoration:none;color:#FFF; cursor:pointer">ENVIAR</a>
                        </div>
                    </td>
                    </tr>
                    </table>

                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>





<div id="lista_comentarios" style="width:600px;display: none; background-color:#FFF;">
                <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">ESCRIBA UN COMENTARIO</td>
                    <td align="right" valign="top" width="30"><a href="javascript:$.fancybox.close();" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size14" style="color:#000;padding:25px; width:100%;">
                    <br>
                    <div style="width:100%;background-color:#EFEFEF; ">
                        <table cellpadding="0" cellspacing="0" style="padding:15px;">
                        <tr>
                        <td> <img  src="webroot/archivos/<?php echo $foto1; ?>" style="width:100px"></td>
                        <td width="10"></td>
                        <td class="fuente_georgia font_size14" valign="top"><?php echo $titulo; ?></td>
                        </tr>
                        </table>
                    </div>
                    <br>

                      <?php
                    if($cantidad_estrellas>0)
                    {
                    ?>
                    Calificación: <br><br>

                    <table cellpadding="0" cellspacing="0" height="29" >
                    <tr>
                        <?php if($cantidad_estrellas<="1"){ ?><td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="2"){ ?><td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="3"){ ?><td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="4"){ ?><td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="5"){ ?><td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <td class="fuente_georgia font_size24" style="padding-bottom:8px" align="center"  height="29"><?php echo $cantidad_estrellas;?></td>
                    </tr>
                    </table>

                    <?php
                    }
                    ?>

                    <br>

                    <?php
                    $result50=$db_Full->select_sql("SELECT *  FROM tbl_comentarios,tbl_clientes where id_cli=fkcliente_comentario and fkproducto_comentario=".$_GET['id_producto']." ");                    while ($row50 = mysqli_fetch_array($result50))
                    {
                    ?>
                        <br>
                        <b><?php echo date("d/m/Y",strtotime($row50['fecha_comentario'])); ?> - <?php echo $row50['nombre_cli'];?></b>
                        <br>
                        <?php echo $row50['titulo_comentario'];?>
                        <br><br>

                        <b>Comentario :</b>
                        <br>
                        <?php echo $row50['des_comentario'];?>
                        <br><br>
                        <div style="width:100%; height:1px; background-color:#CCC;">&nbsp;</div>
                    <?php
                    }
                    ?>


                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>

               </div>

<!--POPUP PRODUCTOS-->

<!--DETALLE PRODUCTOS-->

<div class="base_detalle_productos">

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td align="right" ><a href = "javascript:history.back()" class="fuente_georgia font_size14 backToCategory" style="color:#000000; text-decoration:none;"><i>Volver a <?php echo $tipo ?></i></a></td></tr>
</table>

    <div class="fotos_productos">

    <div id="foto">
        <img class="foto_producto_item" id="foto_1" src="webroot/archivos/<?php echo $foto1; ?>" data-zoom-image="webroot/archivos/<?php echo $foto1; ?>" style="width:100%">
        <!-- <img class="foto_producto_item" id="foto_2" src="webroot/archivos/<?php echo $foto2; ?>" data-zoom-image="webroot/archivos/<?php echo $foto2; ?>" style="width:100%; display:none">
        <img class="foto_producto_item" id="foto_3" src="webroot/archivos/<?php echo $foto3; ?>" data-zoom-image="webroot/archivos/<?php echo $foto3; ?>" style="width:100%; display:none">
        <img class="foto_producto_item" id="foto_4" src="webroot/archivos/<?php echo $foto4; ?>" data-zoom-image="webroot/archivos/<?php echo $foto4; ?>" style="width:100%; display:none">
        <img class="foto_producto_item" id="foto_5" src="webroot/archivos/<?php echo $foto5; ?>" data-zoom-image="webroot/archivos/<?php echo $foto5; ?>" style="width:100%; display:none">
        <img class="foto_producto_item" id="foto_6" src="webroot/archivos/<?php echo $foto6; ?>" data-zoom-image="webroot/archivos/<?php echo $foto6; ?>" style="width:100%; display:none"> -->
    </div>

    <table cellpadding="0" cellspacing="0" width="100%">
    <tr><td height="20"></td></tr>
    </table>

    <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td width="10%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto1"  class="productThumbnail" src="webroot/archivos/<?php echo $foto1; ?>" style="width:100%;cursor:pointer"></td>
    <td width="4%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto2"  class="productThumbnail" src="webroot/archivos/<?php echo $foto2; ?>" style="width:100%;cursor:pointer"></td>
    <td width="4%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto3"  class="productThumbnail" src="webroot/archivos/<?php echo $foto3; ?>" style="width:100%;cursor:pointer"></td>
    <td width="4%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto4"  class="productThumbnail" src="webroot/archivos/<?php echo $foto4; ?>" style="width:100%;cursor:pointer"></td>
    <td width="4%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto5"  class="productThumbnail" src="webroot/archivos/<?php echo $foto5; ?>" style="width:100%;cursor:pointer"></td>
    <td width="4%"></td>
    <td width="10%" style="padding:3px; border:solid 1px #666;"><img id="foto6"  class="productThumbnail" src="webroot/archivos/<?php echo $foto6; ?>" style="width:100%;cursor:pointer"></td>
    <td width="10%"></td>
    </tr>
    </table>
    </div>

    <div class="descripcion_productos">

    <form id="addToCart" name="addToCart" action="validacion.php" method="get">

        <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td class="fuente_georgia font_size22"><b><?php echo $titulo; ?></b></td></tr>
        <tr><td height="10"></td></tr>
        <tr><td class="fuente_georgia font_size22"><b><?php echo $marca; ?></b></td></tr>
        <tr><td height="10"></td></tr>
        <tr><td class="fuente_georgia font_size24">$<?php echo $precio; ?> USD</td></tr>
        <tr><td height="15"></td></tr>
        <?php
        if($cantidad_estrellas>0)
        {
        ?>
        <tr>
            <td height="29">
                <table cellpadding="0" cellspacing="0" height="29" >
                   <tr>
                    <?php
                    for ($i=0; $i < $cantidad_estrellas; $i++) {
                        echo '<td align="center" height="29"><img src="images/estrella.jpg" style="padding-right:10px"></td>';
                    }
                    ?>
                    <td class="fuente_georgia font_size24" style="padding-bottom:8px" align="center"  height="29"><?php echo $cantidad_estrellas;?></td>
                </tr>
                </table>
            </td>
        </tr>
        <tr><td height="10"></td></tr>
        <?php
        }
        ?>
        <tr><td class="fuente_georgia font_size14" style="color:#5b5b5f;">
        <a href="#lista_comentarios" class="fancybox" style="text-decoration:none;color:#5b5b5f"><?php echo $cantidad_comentario;?> Comentarios ></a>
        <a href="#" onclick="return validando_popup_comentario()"  style="text-decoration:none;color:#5b5b5f">Escribe un comentario</a></td></tr>
        <tr>
            <td>

             <?php
             $result2 = $db_Full->select_sql("SELECT * FROM tbl_productos_caracteristicas where fkproducto_cara='".$_GET['id_producto']."' ");
             while ($row2 = mysqli_fetch_array($result2))
             {
             ?>

             <div class="item_descripcion">
                <div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14"><?php echo $row2["titulo_cara"]; ?></td>
                    <td width="65%" align="left" class="fuente_georgia font_size14"><?php echo $row2["detalle_cara"]; ?></td>
                    <td width="5%" align="right" style="cursor:pointer" class="flecha"><img src="images/detalle_flecha_abajo.jpg"></td>
                </tr>
                </table>
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr><td height="10"></td></tr>
                <tr style="display:none" class="detalle">
                    <td width="30%" align="left" class="fuente_georgia font_size14" style="text-align:justify">
                    <?php echo $row2["descripcion_cara"]; ?>
                    </td>
                </tr>
                </table>
            </div>

            <?php
             }
            ?>


<div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>

            
            </td>
        </tr>

        <tr><td height="10"></td></tr>


       


         <?php
         $result40 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                        and  fkproducto_productos_filtros='".$_GET['id_producto']."' group by id_filtro ");
         while ($row40 = mysqli_fetch_array($result40))
         {
         ?>
         <tr>
            <td>
               
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14" valign="top"><?php echo $row40["nombre_filtro"]; ?></td>
                    <td width="70%" align="left" class="fuente_georgia font_size14">
                        <?php
                         $result400 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_items_filtro  where fksubfiltro_productos_filtros=id_item_filtro
                                                        and  fkproducto_productos_filtros='".$_GET['id_producto']."' and fkfiltro_productos_filtros=".$row40["id_filtro"]." ");
                         while ($row400 = mysqli_fetch_array($result400))
                         {
                         ?>
                         <div class="toggle-btn-grp cssonly" style="float:left; padding:1px; text-align:center; width:30px;">
                             <?php
                                if($row400["foto_productos_filtros"]!=".")
                                {
                                    echo '<div><input type="radio" name="color" value="' . $row400["foto_productos_filtros"] . '"/><label onclick="" class="toggle-btn"><img  src="webroot/archivos/' . $row400["foto_productos_filtros"] . '" style="width:30px"></label></div>';
                            ?>

                            <?php
                                }else
                                {
                                    echo '<div><input type="radio" name="talla" value="' . $row400["nombre_item_filtro"] . '"/><label onclick="" class="toggle-btn">' . $row400["nombre_item_filtro"] . '</label></div>';
                                }
                            ?>
                         </div>
                         <div style="float:left; padding:5px; border:solid 0px #000"></div>
                         <?php
                         }
                         ?>
                    </td>
                </tr>
                </table>
           </td>
         </tr>
        <?php
        }
        ?>


        <tr>
            <td>
                
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14">Cantidad </td>
                    <td width="70%" align="left" class="fuente_georgia font_size14"><input class="quantityProduct" type="text" name="cantidad" value="1" style="border:solid 1px #999; width:50px; height:30px;text-align:center"></td>
                </tr>
                </table>
           </td>
        </tr>


        <tr><td height="10"></td></tr>
        
        
        
         <tr>
            <td>
                <!-- <a href="validacion.php?id_producto=<?php echo $_GET['id_producto']?>" style="text-decoration:none"><div  class="fuente_georgia font_size16 boton_carrito">AÑADIR A CESTA</div></a> -->
                <a href="javascript:{}" class="addCartButton" style="text-decoration:none"><div  class="fuente_georgia font_size16 boton_carrito">AÑADIR A CESTA</div></a>
                <input type="hidden" name="id_producto" value="<?php echo $_GET['id_producto']?>">
            </td>
        </tr>

        <tr><td height="10"></td></tr>

        <tr>
            <td>
                <div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14">Devoluciones</td>
                    <td width="70%" align="left" class="fuente_georgia font_size14">Devoluciones con recogida gratuita.</td>
                </tr>
                </table>
           </td>
        </tr>

        <tr>
            <td>
                <div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14"><u>Añadir a mis favoritos</u> </td>
                    <td width="70%" align="right" class="fuente_georgia font_size14">
                        <a href="javascript:fbShare('<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>', 'Fb Share', 'Facebook share popup', '<?php echo $royaltyUtils->baseUrl(); ?>/webroot/archivos/<?php echo $foto1; ?>', 520, 350)"><img src="images/facebook_footer.png"></a>
                        <a href="#popup_enviar_amigo" class="fancybox"><img src="images/email_footer.png"></a>
                    </td>
                </tr>
                </table>
           </td>
        </tr>

        <tr>
            <td>
                <div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>
                <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%" align="left" class="fuente_georgia font_size14">Código de producto </td>
                    <td width="70%" align="left" class="fuente_georgia font_size14"><?php echo $codigo; ?></td>
                </tr>
                </table>
           </td>
        </tr>
        
      </table>
    </form>
  </div>

  <!-- Pop-up para enviar a un amigo un producto -->
  <?php

  $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=15 ");
  while ($row_popup = mysqli_fetch_array($result_popup))
  {
  ?>
    <div id="popup_enviar_amigo" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">

      <div class="row fuente_georgia padding-off">
        <div class="col-sm-7">
          <?php  echo  $row_popup["des_popup"];  ?>
        </div>
        <div class="col-sm-5 padding-off">
          <img src="<?php echo $royaltyUtils->baseUrl(); ?>/webroot/archivos/<?php echo $foto1; ?>" alt="" class="img-responsive">
        </div>
      </div>

    </div>
  <?php
  }
  ?>

    <div class="mas_fotos_productos">

     <?php
     $result4 = $db_Full->select_sql("SELECT * FROM tbl_productos_fotos  where  fkproducto_productos_fotos='".$_GET['id_producto']."' ORDER BY orden_productos_fotos  ASC");
     while ($row4 = mysqli_fetch_array($result4))
     {
     ?>
         <img src="webroot/archivos/<?php echo $row4["nombre_productos_fotos"]; ?>" width="100%" style="float:left">
     <?php
     }
     ?>
    </div>

    <div id="recomendados_productos">
    </div>

      <div id="otros_productos">
    </div>


</div>
<!--FIN DETALLE PRODUCTOS-->





<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
