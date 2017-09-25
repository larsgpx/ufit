<!-- script pago -->
<script type="text/javascript" src="<?php echo $BASE_URL;?>js/pago.js"></script>
<!-- fin script pago -->

<script type="text/javascript" src="<?php echo $BASE_URL;?>js/jquery.elevateZoom-3.0.8.min.js"></script>
<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>

<script>

function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
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
                  url: "../guardar_comentario.php",
                  data : "titulo="+$('#titulo').val()+"&estrella="+$('#estrella').val()+"&comentario="+$('#comentario').val()+"&cliente="+$('#cliente').val()+"&producto="+$('#producto').val(),

                  success: function(data)
                  {
                       $.fancybox("#gracias_comentario");
                     setTimeout(location.reload(true), 2000);

                  }
            });

        return false;
    });









     $('.enviar_email_amigo').on('click', function(e){
        e.preventDefault();

        var mi_nombre = document.popup_amigo.elements['mi_nombre'];
        var nombre_amigo = document.popup_amigo.elements['nombre_amigo'];
        var email_amigo = document.popup_amigo.elements['email_amigo'];
        

        if(mi_nombre.value == "")
        {
            $("#mi_nombre").css("border-bottom-color", "#900");
            $("#mi_nombre").css("border-top-color", "#900");
            $("#mi_nombre").css("border-left-color", "#900");
            $("#mi_nombre").css("border-right-color", "#900");
            $("#mi_nombre_error").css("display", "block");

            return false;
        }else
        {
            $("#mi_nombre").css("border-bottom-color", "#ccc");
            $("#mi_nombre").css("border-top-color", "#ccc");
            $("#mi_nombre").css("border-left-color", "#ccc");
            $("#mi_nombre").css("border-right-color", "#ccc");
            $("#mi_nombre_error").css("display", "none");
        }

        if(nombre_amigo.value == "")
        {
            $("#nombre_amigo").css("border-bottom-color", "#900");
            $("#nombre_amigo").css("border-top-color", "#900");
            $("#nombre_amigo").css("border-left-color", "#900");
            $("#nombre_amigo").css("border-right-color", "#900");
            $("#nombre_amigo_error").css("display", "block");

            return false;
        }else
        {
            $("#nombre_amigo").css("border-bottom-color", "#ccc");
            $("#nombre_amigo").css("border-top-color", "#ccc");
            $("#nombre_amigo").css("border-left-color", "#ccc");
            $("#nombre_amigo").css("border-right-color", "#ccc");
            $("#nombre_amigo_error").css("display", "none");
        }




        if(email_amigo.value == "")
        {
            $("#email_amigo").css("border-bottom-color", "#900");
            $("#email_amigo").css("border-top-color", "#900");
            $("#email_amigo").css("border-left-color", "#900");
            $("#email_amigo").css("border-right-color", "#900");
            $("#email_amigo_error").css("display", "block");

            return false;
        }else
        {
            $("#email_amigo").css("border-bottom-color", "#ccc");
            $("#email_amigo").css("border-top-color", "#ccc");
            $("#email_amigo").css("border-left-color", "#ccc");
            $("#email_amigo").css("border-right-color", "#ccc");
            $("#email_amigo_error").css("display", "none");
        }


         $.ajax({
                  type: "POST",
                  url: "../enviar_email_producto.php",
                  data : "email_amigo="+$('#email_amigo').val()+"&nombre_amigo="+$('#nombre_amigo').val()+"&titulo_producto="+$('#titulo_producto').val()+"&precio_producto="+$('#precio_producto').val()+"&codigo_producto="+$('#codigo_producto').val()+"&marca_producto="+$('#marca_producto').val()+"&foto_producto="+$('#foto_producto').val()+"&mi_nombre="+$('#mi_nombre').val(),

                  success: function(data)
                  {
                     $.fancybox("#gracias_comentario_recomendar");
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

$id_producto = $id_page_table;

$result1 = $db_Full->select_sql("SELECT titulo_producto,nombre_marca,oferta_producto,precio_producto,descuento_producto,descripcion_producto,codigo_producto,nombre_tipo,id_tipo,foto_producto,foto1_producto,foto2_producto,foto3_producto,foto4_producto,foto5_producto,foto6_producto,fk_id_tipo_cambio FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fktipo_producto=id_tipo and id_producto='".$id_producto."' group by id_producto ");

if(mysqli_num_rows($result1)){


while ($row1 = mysqli_fetch_array($result1))
{
    $titulo         = $row1["titulo_producto"];
    $marca          = $row1["nombre_marca"];
    $id_tipo_cambio = $row1["fk_id_tipo_cambio"];
    if($row1['oferta_producto'] == "si")
    { 
      $precio       = $row1['precio_producto'] - ($row1['precio_producto']*$row1['descuento_producto']/100);
      $preciopro    = $row1['precio_producto'];
    }else
    {
       $precio      = $row1["precio_producto"];
    }

    $descripcion    = $row1["descripcion_producto"];
    $codigo         = $row1["codigo_producto"];
    $tipo           = $row1["nombre_tipo"];
    $id_tipo        = $row1["id_tipo"];

    $fotoss [1]     = $row1["foto_producto"];
    $fotoss [2]     = $row1["foto1_producto"];
    $fotoss [3]     = $row1["foto2_producto"];
    $fotoss [4]     = $row1["foto3_producto"];
    $fotoss [5]     = $row1["foto4_producto"];
    $fotoss [6]     = $row1["foto5_producto"];
    $fotoss [7]     = $row1["foto6_producto"];
    //$fotoss [7]   = $row1["foto7_producto"];

    $foto1          = $row1["foto_producto"];
    $foto2          = $row1["foto1_producto"];
    $foto3          = $row1["foto2_producto"];
    $foto4          = $row1["foto3_producto"];
    $foto5          = $row1["foto4_producto"];
    $foto6          = $row1["foto5_producto"];
    $foto7          = $row1["foto6_producto"];
}



$result10 = $db_Full->select_sql("SELECT COUNT(id_comentario) as cantidad FROM tbl_comentarios where fkproducto_comentario=".$id_producto." ");

while ($row10 = mysqli_fetch_array($result10))
{
    $cantidad_comentario=$row10['cantidad'];
}
$cantidad_estrellas = 0;
$result100 = $db_Full->select_sql("SELECT SUM(estrella_comentario) as estrella FROM tbl_comentarios where fkproducto_comentario=".$id_producto." ");
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
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size14" style="color:#000;padding:25px; width:100%;">
                    <br>
                    <div style="width:100%;background-color:#EFEFEF; ">
                        <table cellpadding="0" cellspacing="0" style="padding:15px;">
                        <tr>
                        <td> <img  src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1; ?>" style="width:100px"></td>
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
                            <img id="estrella_uno" src="<?php echo $BASE_URL;?>images/estrella_uno.png" style="padding-right:10px; cursor:pointer">
                            <img id="estrella_1" src="<?php echo $BASE_URL;?>images/estrella_dos.png" style="padding-right:10px; display:none; cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_dos" src="<?php echo $BASE_URL;?>images/estrella_uno.png" style="padding-right:10px; cursor:pointer">
                            <img id="estrella_2" src="<?php echo $BASE_URL;?>images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_tres" src="<?php echo $BASE_URL;?>images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_3" src="<?php echo $BASE_URL;?>images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_cuatro" src="<?php echo $BASE_URL;?>images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_4" src="<?php echo $BASE_URL;?>images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
                        </td>
                         <td align="center" height="29">
                            <img id="estrella_cinco" src="<?php echo $BASE_URL;?>images/estrella_uno.png" style="padding-right:10px;cursor:pointer">
                            <img id="estrella_5" src="<?php echo $BASE_URL;?>images/estrella_dos.png" style="padding-right:10px; display:none;cursor:pointer">
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
                      <input type="hidden" name="producto" id="producto" style="width:100%" value="<?php echo $id_producto;?>">
                    <br><br>

                    Tu comentario :
                    <br><br>
                    <textarea  name="comentario" id="comentario" style="width:100%; height:70px"></textarea>
                    <div id="error_comentario_error" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Comentario</div>
                    <br><br>

                    <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                    <td align="center">
                        <div class="boton_crear_cuenta fuente_georgia font_size12 addComment" style="cursor: pointer;">
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
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size14" style="color:#000;padding:25px; width:100%;">
                    <br>
                    <div style="width:100%;background-color:#EFEFEF; ">
                        <table cellpadding="0" cellspacing="0" style="padding:15px;">
                        <tr>
                        <td> <img  src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1; ?>" style="width:100px"></td>
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
                        <?php if($cantidad_estrellas<="1"){ ?><td align="center" height="29"><img src="<?php echo $BASE_URL;?>images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="2"){ ?><td align="center" height="29"><img src="<?php echo $BASE_URL;?>images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="3"){ ?><td align="center" height="29"><img src="<?php echo $BASE_URL;?>images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="4"){ ?><td align="center" height="29"><img src="<?php echo $BASE_URL;?>images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <?php if($cantidad_estrellas<="5"){ ?><td align="center" height="29"><img src="<?php echo $BASE_URL;?>images/estrella.jpg" style="padding-right:10px"></td> <?php } ?>
                        <td class="fuente_georgia font_size24" style="padding-bottom:8px" align="center"  height="29"><?php echo $cantidad_estrellas;?></td>
                    </tr>
                    </table>

                    <?php
                    }
                    ?>

                    <br>

                    <?php
                    $result50=$db_Full->select_sql("SELECT *  FROM tbl_comentarios,tbl_clientes where id_cli=fkcliente_comentario and fkproducto_comentario=".$id_producto." ");                    while ($row50 = mysqli_fetch_array($result50))
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

<!-- Detalle del Producto -->

<section id="detalle-producto">
  <div class="container">
    <table cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="right" ><a href = "javascript:history.back()" class="fuente_georgia font_size14 backToCategory" style="color:#000000; text-decoration:none;"><i>Volver a <?php echo $tipo;  ?></i></a></td></tr>
    </table>

        <div class="fotos_productos">

        <div id="foto">
            <img class="foto_producto_item" id="foto_1" src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1; ?>" data-zoom-image="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1; ?>" style="width:100%">
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
        <?php 
              for ($i = 0; $i <= 7; $i++) { 
                if(isset($fotoss[$i]) && !empty($fotoss[$i])){
                  echo '<td width="10%" style="padding:3px; border:solid 1px #666;">
                   <img id="foto'.$i.'" class="productThumbnail" src="'.$BASE_URL.'webroot/archivos/'.$fotoss[$i].'" style="width:100%;cursor:pointer">
                  </td>';
                  echo '<td width="4%"></td>';
                }
              }
        ?>
      
        <td width="10%"></td>
        </tr>
        </table>
        </div>

        <div class="descripcion_productos">

        <form id="addToCart" name="addToCart"  class="preOrder" action="validacion.php" method="get">

            <table cellpadding="0" cellspacing="0" width="100%">
            <tr><td class="fuente_georgia font_size22"><b><?php echo $titulo; ?></b></td></tr>
            <tr><td height="10"></td></tr>
            <tr><td class="fuente_georgia font_size22"><b><?php echo $marca; ?></b></td></tr>
            <tr><td height="10"></td></tr>
            <tr>
              <td>
                <div class="fuente_georgia font_size17">
                <?php 
                  $nacional        = false;
                  $moneda_nacional = 1;
                  $detalle_precio  = array();
                  $result_moneda   = $db_Full->select_sql("SELECT id_tipo_cambio,
                                                                simbolo_moneda,
                                                                valor_moneda,
                                                                tipo_moneda 
                                                          FROM  tbl_tipo_cambio 
                                                          WHERE estado_moneda = 1 
                                                          ORDER BY tipo_moneda DESC");
                  


                  while($row_moneda = mysqli_fetch_assoc($result_moneda)){

                      if(strtoupper($row_moneda['tipo_moneda']) == 'N' && $nacional == false){
                         $moneda_nacional = $row_moneda['valor_moneda'];
                         $nacional = true;
                      }
                      if($row_moneda['id_tipo_cambio'] == $id_tipo_cambio){
                         /*$row_moneda['simbolo_moneda'];
                         $row_moneda['valor_moneda'];
                         $row_moneda['tipo_moneda']*/
                         if(strtoupper($row_moneda['tipo_moneda']) == 'N'){
                            $moneda = $row_moneda['valor_moneda'];
                            $simb   = $row_moneda['simbolo_moneda'];
                         }
                         else{
                            $moneda = $row_moneda['valor_moneda']*$moneda_nacional;
                            $simb   = $row_moneda['simbolo_moneda'];
                         }
                         
                      }
                      else{
                            $moneda = $row_moneda['valor_moneda']*$moneda_nacional;
                            $simb   = $row_moneda['simbolo_moneda'];
                      }

                     echo '<div class="col-md-6">';
                    if (@$preciopro) {
                      echo '<span class="text-danger">Antes: '.$simb.'<s> '.round($preciopro/$moneda,1).' </s><br></span>';
                      echo '<span>Ahora: '.$simb.' '.round($precio/$moneda,1).'</span>';
                    }else{
                       echo '<span>'.$simb.' '.round($precio/$moneda,1).'</span>';
                    }
                     echo '</div>';
                  }
                  ?>
                  </div>
              </td>
            </tr>
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
                            echo '<td align="center" height="29"><img src="'.$BASE_URL.'images/estrella.jpg" style="padding-right:10px"></td>';
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


            <tr>

              <td class="fuente_georgia font_size14" style="color:#5b5b5f;">
            <a href="#lista_comentarios" class="fancybox" style="text-decoration:none;color:#5b5b5f"><?php echo $cantidad_comentario;?> Comentarios ></a>
            <a href="#popup_registro_comentario" class="fancybox" <?php /*?> onclick="return validando_popup_comentario()" <?php */?>  style="text-decoration:none;color:#5b5b5f">Escribe un comentario</a></td></tr>
            <tr>
                <td>

                 <?php
                 $result2 = $db_Full->select_sql("SELECT * FROM tbl_productos_caracteristicas where fkproducto_cara='".$id_producto."' ");
                 while ($row2 = mysqli_fetch_array($result2))
                 {
                 ?>

                 <div class="item_descripcion">
                    <div style="width:100%; height:1px; background-color:#000; margin-top:10px; margin-bottom:10px;">&nbsp;</div>
                    <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="30%" align="left" class="fuente_georgia font_size14"><?php echo $row2["titulo_cara"]; ?></td>
                        <td width="65%" align="left" class="fuente_georgia font_size14"><?php echo $row2["detalle_cara"]; ?></td>
                        <td width="5%" align="right" style="cursor:pointer" class="flecha"><img src="<?php echo $BASE_URL;?>images/detalle_flecha_abajo.jpg"></td>
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


            <!-- FILTRO COLOR -->

             <?php
             $resultp = $db_Full->select_sql("SELECT count(*) AS 'col' FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                            and  fkproducto_productos_filtros='".$id_producto."' AND nombre_filtro='color' or  nombre_filtro='colores' group by id_filtro ");
            $dato=mysqli_fetch_assoc($resultp);
            $color=$dato['col'];
            if ($color>=1) 
            {
                 $result41 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                                and  fkproducto_productos_filtros='".$id_producto."' AND nombre_filtro='color' group by id_filtro ");
                 while ($row41 = mysqli_fetch_array($result41))
                 {
            ?>
             <tr>
                <td>
                      <div class="form-group">
                        <h5><?php echo $row41["nombre_filtro"]; ?> del Producto </h5>
                        
                          <div class="talla-list">

                            <?php

                             $result400 = $db_Full->select_sql("SELECT nombre_item_filtro as item,foto_productos_filtros as foto FROM tbl_productos_filtros,tbl_items_filtro, tbl_filtros  where fksubfiltro_productos_filtros=id_item_filtro and id_filtro=fk_item_filtro and  fkproducto_productos_filtros='".$id_producto."' and fkfiltro_productos_filtros=".$row41["id_filtro"]." and  condicional_productos_filtro=0 AND nombre_filtro='color' ");
                            
                             while ($row400 = mysqli_fetch_array($result400))
                             {
                             
                                    echo '<input type="hidden" id="cantidad_color" name="cantidad_color" value="1" >';

                                   
                                      echo '<label class="radio-inline">
                                      <input type="radio" name="colorProd" id="colorProd" value="'.$row400["item"].'">
                                    <div class="btn-pfilter" style="padding:3px; !important;"><img style="height:40px !important;" src="'.$BASE_URL.'webroot/archivos/'. $row400["foto"].'" alt="" class="img-thumbnail"></div>
                                    </label>';
                                    
                             }



                               $result4001 = $db_Full->select_sql(" SELECT nombre_item_categoria as item ,foto_productos_filtros as foto from tbl_items_categoria,tbl_productos_filtros where  fksubfiltro_productos_filtros=id_item_categoria  and fkproducto_productos_filtros='".$id_producto."' and  condicional_productos_filtro=1 ");

                                while ($row4001 = mysqli_fetch_array($result4001))
                                 {
                                    if($row4001["foto"]!=".")
                                    {
                                      echo '<input type="hidden" id="cantidad_color" name="cantidad_color" value="1" >';

                                   
                                      echo '<label class="radio-inline">
                                      <input type="radio" name="colorProd" id="colorProd" value="'.$row4001["item"].'">
                                    <div class="btn-pfilter" style="padding:3px; !important;"><img style="height:40px !important;" src="'.$BASE_URL.'webroot/archivos/'. $row4001["foto"].'" alt="" class="img-thumbnail"></div>
                                    </label>';
                                    }
                                 }


                             ?>


                          </div>
                        </div>
                        <div id="error_color" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Seleccione Color.</div>

               </td>
             </tr>
            <?php
            }

            }
            ?>
            <!-- FIN FILTRO COLOR -->


            <!-- OTROS FILTROS -->
             <?php
             $result40 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                            and  fkproducto_productos_filtros='".$id_producto."' AND nombre_filtro='talla' group by id_filtro ");
             while ($row40 = mysqli_fetch_array($result40))
             {
             ?>
             <tr>
                <td>


                     <div class="form-group">
                        <h5><?php echo $row40["nombre_filtro"]; ?> del Producto</h5>
                              <div class="talla-list">
                            <?php
                            

                            
                             $result400 = $db_Full->select_sql("SELECT nombre_item_filtro as item, nombre_filtro as filtro, foto_productos_filtros as foto FROM tbl_productos_filtros,tbl_items_filtro, tbl_filtros  where fksubfiltro_productos_filtros=id_item_filtro and id_filtro=fk_item_filtro and  fkproducto_productos_filtros='".$id_producto."' and fkfiltro_productos_filtros=".$row40["id_filtro"]." AND nombre_filtro='Talla' order by nombre_item_filtro asc");
                         
                      
                               
                             while ($row400 = mysqli_fetch_array($result400))
                             {
                                echo '<input type="hidden" id="cantidad_talla" name="cantidad_talla" value="1" >';

                                    
                                        echo '<label class="radio-inline">
                                        <input type="radio" name="TallaProd"  value="' . $row400["item"] . '"/>
                                        <div class="btn-pfilter">' . $row400["item"] . '</div>
                                        </label>
                                        <input type="hidden" value="">';
                                  
                                
                             }


                             
                                $result4001 = $db_Full->select_sql(" SELECT nombre_item_categoria as item ,foto_productos_filtros as foto from tbl_items_categoria,tbl_productos_filtros where  fksubfiltro_productos_filtros=id_item_categoria  and fkproducto_productos_filtros='".$id_producto."' and  condicional_productos_filtro=1 ");

                                while ($row4001 = mysqli_fetch_array($result4001))
                                 {
                                    if($row4001["foto"]==".")
                                    {
                                      echo '<input type="hidden" id="cantidad_talla" name="cantidad_talla" value="1" >';

                                          
                                              echo '<label class="radio-inline">
                                              <input type="radio" name="TallaProd"  value="' . $row4001["item"] . '"/>
                                              <div class="btn-pfilter">' . $row4001["item"] . '</div>
                                              </label>
                                              <input type="hidden" value="">';
                                    }
                                 }
                              

                             ?>
                            </div>
                           </div>

                           <div id="error_talla" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Seleccione Talla.</div>

               </td>
             </tr>
            <?php
            }
            ?>
            <!-- FIN OTROS FILTROS -->


            <tr>
                <td>

                    <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                       <div class="form-group">
                        <h5>Cantidad</h5>
                        <div class="cantidad-list">
                          <button type="button" class="btn-pfilter set-less">-</button>
                          <input type="text" value="1" name="cantidad" id="cantidadProd" class="cantidadProd" onKeyPress="return soloNumeros(event)" />
                          <button type="button" class="btn-pfilter set-more">+</button>
                        </div>
                      </div>
                    </tr>
                    </table>
               </td>
            </tr>


            <tr><td height="10"></td></tr>



             <tr>
                <td>
                    
                    <a href="javascript:{}" class="addCartButton" style="text-decoration:none"><div  class="fuente_georgia font_size16 boton_carrito" style="width: 180px;">Añadir a cesta</div></a>
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto?>">

                        <!-- popup carrito -->
                        

                         <div id="popup_carrito" style="width:600px;display: none; background-color:#FFF;">
                         
                         <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#000000; text-align: center">
                          <TR>
                          <td align="center">
                              <table width="60%" align="center" cellpadding="0" cellspacing="0" style="background-color:#000000; text-align: center">
                              <tr><td height="10"></td></tr>
                              <TR>
                                <td width="30%" style="text-align: right;">
                                  <img src="<?php echo $BASE_URL; ?>images/icono_venta.png" width="80">
                                </td>
                                 <td width="70%" style="text-align: center; color: #FFFFFF">
                                  ¡HAS AGREGADO UN PRODUCTO </BR> AL CARRITO DE COMPRAS !
                                </td>
                              </TR>
                              <tr><td height="10"></td></tr>
                              </table>
                          </td>
                          </TR>
                          </table>

                          <div style="padding: 20px">
                              <div id="btn_seguir_compra" style="padding: 8px; border:solid 1px #000000;   background-color: #FFFFFF; color: #000000; width: 45%; float: left; text-align: center; cursor: pointer;"> SEGUIR COMPRANDO </div>
                              <div style="padding: 20px;  width: 10%; float: left; "></div>
                              <div id="btn_finalizar_compra" style="padding: 8px; border:solid 1px #000000; background-color: #FFFFFF; color: #000000; width: 45%;float: left;text-align: center;cursor: pointer;"> FINALIZAR COMPRA </div>
                          </div>

                        </div>
                        <!-- fin popup carrito -->
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
                            <a href="javascript:fbShare('<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>', 'Fb Share', 'Facebook share popup', '<?php echo $BASE_URL;?>/webroot/archivos/<?php echo $foto1; ?>', 520, 350)"><img width="25" src="<?php echo $BASE_URL;?>images/facebook_footer.png"></a>
                            <a href="#popup_enviar_amigo" class="fancybox"><img src="<?php echo $BASE_URL;?>images/email_footer.png" width="25"></a>
                        </td>
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
              
              <h4><b>SUGERIR PRODUCTO A UN AMIGO</b></h4>

              <p>Rellena el siguiente formulario con los datos contacto de destino.</p>

              <form action="" enctype="multipart/form-data" method="post" name="popup_amigo">
              <input type="hidden" name="titulo_producto" id="titulo_producto" value="<?php echo $titulo; ?>">
              <input type="hidden" name="precio_producto" id="precio_producto" value="<?php echo $precio; ?>">
              <input type="hidden" name="codigo_producto" id="codigo_producto" value="<?php echo $codigo; ?>">
              <input type="hidden" name="marca_producto" id="marca_producto" value="<?php echo $marca; ?>">
              <input type="hidden" name="foto_producto" id="foto_producto" value="<?php echo $BASE_URL; ?>webroot/archivos/<?php echo $foto1; ?>">
              <table>
                <tbody>
                  <tr>
                    <td>Mi nombre (*):</td>
                    <td>
                      <input name="mi_nombre" id="mi_nombre" type="email" />
                      <div id="mi_nombre_error" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Ingrese su Nombre.</div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nombre del amigo (*):</td>
                    <td>
                      <input name="nombre_amigo" id="nombre_amigo" type="text" />
                      <div id="nombre_amigo_error" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Ingrese Nombre del amigo.</div>
                    </td>
                  </tr>
                  <tr>
                    <td>Email del amigo (*):</td>
                    <td>
                      <input name="email_amigo" id="email_amigo" type="email" />
                      <div id="email_amigo_error" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Ingrese Email del amigo.</div>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td style="text-align:right"><input type="submit" class="enviar_email_amigo" value="Enviar" /></td>
                  </tr>
                </tbody>
              </table>
              </form>

            </div>
            <div class="col-sm-5 padding-off">
              <img src="<?php echo $BASE_URL; ?>/webroot/archivos/<?php echo $foto1; ?>"  alt="" class="img-responsive">
            </div>
          </div>

        </div>
      <?php
      }
      ?>
  </div>
</section>
<!-- ./Detalle del Producto -->

<!-- Muestra fotográfica del outfit -->
<section id="outfitdemuestra">
  <div class="container">
    <div class="row">
			<div class="height-30"></div>
		</div>

      <?php
        $result4 = $db_Full->select_sql("SELECT * FROM tbl_productos_fotos  where  fkproducto_productos_fotos='".$id_producto."' ORDER BY orden_productos_fotos  ASC");
        while ($row4 = mysqli_fetch_array($result4)){
      ?>
      <div class="row">
        <?php if(!empty($row4["nombre_productos_fotos"])){ ?>
  			<img src="<?php echo $BASE_URL; ?>webroot/archivos/<?php echo $row4["nombre_productos_fotos"]; ?>" class="img-responsive col-lg-12" alt="">
        <?php }?>
  		</div>
  		<div class="row">
  			<div class="height-30"></div>
  		</div>
      <?php
        }}
      ?>

  </div>
</section>
<!-- ./Muestra fotográfica del outfit -->


<!-- Combinar mi prenda con.. -->
<?php
$sql="SELECT tbl_productos.url_page_tbl,foto_producto,titulo_producto,nombre_marca,descuento_producto,precio_producto from tbl_relacionar_productos,tbl_productos,tbl_productos_marcas,tbl_marcas where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fkproducto1_re_pro='".$id_producto."' and fkproducto2_re_pro=id_producto group by id_producto";
$result5 = $db_Full->select_sql($sql);

$result5 = $db_Full->select_sql($sql);
$cantidad_combinacion= mysqli_num_rows($result5);

if($cantidad_combinacion>0)
{
?>
<section id="combinar-prenda">
	<div class="container fuente_georgia">
		<div class="row">
			<h2 class="text-center">Combina con otra prenda</h2>
		</div>
		<div class="row">
			<div class="height-20"></div>
		</div>
		<div class="row">

			<div id="carouselCombinarPrenda" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
				<!--
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>
				-->

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">

					<div class="item active">
						<div class="wrapper">
						
              <?php
              while ($row5 = mysqli_fetch_array($result5)){
              ?> 
              <div class="col-sm-3">
								<a href="<?php echo $BASE_URL.$row5['url_page_tbl']; ?>"><img src="../webroot/archivos/<?php echo $row5['foto_producto']; ?>" class="img-responsive" alt="" /></a>
								
								<p>
									<h5>
                  <?php echo $row5['titulo_producto']; ?><br>
                  <small><?php echo $row5['nombre_marca']; ?></small>
                  </h5>
                  
                  <?php
                  if($row5['descuento_producto']>0)
                  {
                  ?>
                  <span class="text-muted">Precio normal: <s>S/. <?php echo $row5['precio_producto']; ?></s></span><br>
                  <span class="text-danger">S/. <?php echo $row5['precio_producto'] - ($row5['precio_producto']*$row5['descuento_producto']/100); ?></span>
                  <?php
                  }else
                  {
                  ?>
                     <span class="text-muted">Precio: S/. <?php echo $row5['precio_producto']; ?></span><br>
                  <?php
                  }
                  ?>
								</p>
							</div>

              <?php
              }
              ?>
						</div>
			    </div>

					
					

			  </div>
			</div>

		</div>
	</div>
</section>
<!-- ./Combinar mi prenda con.. -->
<?php
}
?>




<!-- También te podría quedar -->
<?php

$result11 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_marcas,tbl_productos_marcas  where fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas=id_marca and fktipo_producto=id_tipo and id_producto!='".$id_producto."' and id_tipo=".$id_tipo." group by id_producto limit 1 ");

if(mysqli_num_rows($result11)){
  while ($row11 = mysqli_fetch_array($result11))
  {
   $id_producto_prenda=$row11["id_producto"];
   $titulo_prenda=$row11["titulo_producto"];
   $marca_prenda=$row11["nombre_marca"];

    if($row11['oferta_producto']=="si")
    { 
      $precio_prenda= $row11['precio_producto'] - ($row11['precio_producto']*$row11['descuento_producto']/100);
      $preciopro_prenda= $row11['precio_producto'];
    }else
    {
       $precio_prenda = $row11["precio_producto"];
    }

    $descripcion_prenda=$row11["descripcion_producto"];
    $codigo_prenda=$row11["codigo_producto"];
    $tipo_prenda=$row11["nombre_tipo"];
    $id_tipo_prenda=$row11["id_tipo"];

    $foto1_prenda=$row11["foto_producto"];
    $foto2_prenda=$row11["foto2_producto"];
    $foto3_prenda=$row11["foto3_producto"];
    $foto4_prenda=$row11["foto4_producto"];
    $foto5_prenda=$row11["foto5_producto"];
    $foto6_prenda=$row11["foto6_producto"];
  }

?>
<section id="tambien-opcion">
	<div class="container fuente_georgia">
		<div class="row">
			<h2 class="text-center">También te podría quedar</h2>
		</div>
		<div class="row">
			<div class="height-20"></div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-5 text-center">

						<div id="carouselTambienOpcion" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#carouselTambienOpcion" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselTambienOpcion" data-slide-to="1"></li>
						    <li data-target="#carouselTambienOpcion" data-slide-to="2"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
						   
                <div class="item active">
						      <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1_prenda; ?>" alt="" class="img-responsive">
						      <div class="carousel-caption"></div>
						    </div>
						    <div class="item">
						      <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto2_prenda; ?>" alt="" class="img-responsive">
						      <div class="carousel-caption"></div>
						    </div>
								<div class="item">
						      <img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto3_prenda; ?>" alt="" class="img-responsive">
						      <div class="carousel-caption"></div>
						    </div>

								<div class="height-10"></div>
								<a href="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $foto1_prenda; ?>" class="fancybox"><i class="fa fa-search-plus" aria-hidden="true"></i> Ver detalle</a>
						  </div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#carouselTambienOpcion" role="button" data-slide="prev">
						    <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carouselTambienOpcion" role="button" data-slide="next">
						    <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

					</div>
					<div class="col-sm-7">
						<h4 class="section-title"><small><?php echo $marca_prenda; ?></small><br><?php echo $titulo_prenda; ?></h4>
						<p><?php echo $descripcion_prenda ?></p>
						<ul class="list-unstyled">
							<li> <span class="text-danger">S/. <?php echo $precio_prenda; ?></span></li>
							<li><?php echo $codigo_prenda; ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4">

				<!-- Consulta relativa al producto -->
				 <form id="addToCart_prenda" name="addToCart_prenda"  class="preOrder" action="validacion.php" method="get">
					
          <input type="hidden" name="id_producto_prenda"  id="id_producto_prenda" value="<?php echo $id_producto_prenda; ?>">

					<div class="form-group">
						<!-- FILTRO COLOR -->
             <?php
             $resultp5 = $db_Full->select_sql("SELECT count(*) AS 'col' FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                            and  fkproducto_productos_filtros='".$id_producto_prenda."' AND nombre_filtro='color' or  nombre_filtro='colores' group by id_filtro ");
            $dato=mysqli_fetch_assoc($resultp5);
            $color=$dato['col'];
            if ($color>=1) 
            {
                 $result415 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                                and  fkproducto_productos_filtros='".$id_producto_prenda."' AND nombre_filtro='color' group by id_filtro ");
                 while ($row41 = mysqli_fetch_array($result415))
                 {
            ?>
            
                      <div class="form-group">
                        <h5><?php echo $row41["nombre_filtro"]; ?> del Producto</h5>
                          
                          <div class="talla-list">

                            <?php
                             $result405 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_items_filtro, tbl_filtros  where fksubfiltro_productos_filtros=id_item_filtro and id_filtro=fk_item_filtro and  fkproducto_productos_filtros='".$id_producto_prenda."' and fkfiltro_productos_filtros=".$row41["id_filtro"]." AND nombre_filtro='color' and  condicional_productos_filtro=0");
                             while ($row400 = mysqli_fetch_array($result405))
                             {
                                    
                                    echo '<input type="hidden" id="cantidad_color_2" name="cantidad_color_2" value="1" >';

                                    if($row400["foto_productos_filtros"]!=".")
                                    {
                                        echo '<label class="radio-inline">
                                        <input type="radio" name="colorProd" id="colorProd"  value="'.$row400["nombre_item_filtro"].'"/>
                                        <div class="btn-pfilter" style="padding:3px; !important;"><img style="height:40px !important;" src="'.$BASE_URL.'webroot/archivos/'.$row400["foto_productos_filtros"].'" class="img-thumbnail"></div>
                                        </label>';
                                
                                    }else
                                    {
                                      echo '<label class="radio-inline">
                                      <input type="radio" name="colorProd" id="colorProd" value="'.$row400["nombre_item_filtro"].'">
                                    <div class="btn-pfilter" style="padding:3px; !important;"><img style="height:40px !important;" src="'.$BASE_URL.'webroot/archivos/'. $row400["nombre_item_filtro"].'" alt="" class="img-thumbnail"></div>
                                    </label>';
                                    }
                             }


                              $result4001 = $db_Full->select_sql(" SELECT nombre_item_categoria as item ,foto_productos_filtros as foto from tbl_items_categoria,tbl_productos_filtros where  fksubfiltro_productos_filtros=id_item_categoria  and fkproducto_productos_filtros='".$id_producto_prenda."' and  condicional_productos_filtro=1 ");

                                while ($row4001 = mysqli_fetch_array($result4001))
                                 {
                                    if($row4001["foto"]!=".")
                                    {
                                      echo '<input type="hidden" id="cantidad_color" name="cantidad_color" value="1" >';

                                   
                                      echo '<label class="radio-inline">
                                      <input type="radio" name="colorProd" id="colorProd" value="'.$row4001["item"].'">
                                    <div class="btn-pfilter" style="padding:3px; !important;"><img style="height:40px !important;" src="'.$BASE_URL.'webroot/archivos/'. $row4001["foto"].'" alt="" class="img-thumbnail"></div>
                                    </label>';
                                    }
                                 }


                             ?>
                          </div>
                        </div>
                        <div id="error_color_prenda" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Seleccione Color.</div>

            <?php
            }

            }
            ?>
            <!-- FIN FILTRO COLOR -->
					</div>


					<div class="form-group">
						 <!-- OTROS FILTROS -->
             <?php
             $result40 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_filtros  where fkfiltro_productos_filtros=id_filtro
                                            and  fkproducto_productos_filtros='".$id_producto_prenda."' AND nombre_filtro='talla' group by id_filtro ");
             while ($row40 = mysqli_fetch_array($result40))
             {
             ?>
             <tr>
                <td>


                     <div class="form-group">
                        <h5><?php echo $row40["nombre_filtro"]; ?> del Producto</h5>
                              <div class="talla-list">
                            <?php
                             $result400 = $db_Full->select_sql("SELECT * FROM tbl_productos_filtros,tbl_items_filtro, tbl_filtros  where fksubfiltro_productos_filtros=id_item_filtro and id_filtro=fk_item_filtro
                                                            and  fkproducto_productos_filtros='".$id_producto_prenda."' and fkfiltro_productos_filtros=".$row40["id_filtro"]." AND nombre_filtro='Talla' and  condicional_productos_filtro=0 order by nombre_item_filtro asc");
                             while ($row400 = mysqli_fetch_array($result400))
                             {
                                   echo '<input type="hidden" id="cantidad_talla_2" name="cantidad_talla_2" value="1" >';

                                    if($row400["foto_productos_filtros"]!=".")
                                    {
                                        
                                        echo '<label class="radio-inline">
                                        <input type="radio" name="'.$row400["nombre_filtro"].'Prod"  value="' . $row400["nombre_item_filtro"] . '"/>
                                        <div class="btn-pfilter">' . $row400["nombre_item_filtro"] . '</div>
                                        </label>
                                        <input type="hidden" value="">';
                               
                                    }else{
                                        echo '<label class="radio-inline">
                                        <input type="radio" name="'.$row400["nombre_filtro"].'Prod"  value="' . $row400["nombre_item_filtro"] . '"/>
                                        <div class="btn-pfilter">' . $row400["nombre_item_filtro"] . '</div>
                                        </label>
                                        <input type="hidden" value="">';
                                    }
                                
                             }



                               $result4001 = $db_Full->select_sql(" SELECT nombre_item_categoria as item ,foto_productos_filtros as foto from tbl_items_categoria,tbl_productos_filtros where  fksubfiltro_productos_filtros=id_item_categoria  and fkproducto_productos_filtros='".$id_producto_prenda."' and  condicional_productos_filtro=1 ");

                                while ($row4001 = mysqli_fetch_array($result4001))
                                 {
                                    if($row4001["foto"]==".")
                                    {
                                      echo '<input type="hidden" id="cantidad_talla" name="cantidad_talla" value="1" >';

                                          
                                              echo '<label class="radio-inline">
                                              <input type="radio" name="TallaProd"  value="' . $row4001["item"] . '"/>
                                              <div class="btn-pfilter">' . $row4001["item"] . '</div>
                                              </label>
                                              <input type="hidden" value="">';
                                    }
                                 }



                             ?>
                            </div>
                           </div>

                           <div id="error_talla_prenda" style="display: none; color: rgb(255, 0, 0);" class="fuente_georgia font_size13">Seleccione Talla.</div>

               </td>
             </tr>
            <?php
            }
            ?>
            <!-- FIN OTROS FILTROS -->

					</div>


					<div class="form-group">
						<h5>Cantidad</h5>
						<div class="cantidad-list-prenda">
							<button type="button" class="btn-pfilter set-less">-</button>
							<input type="text" value="1" name="cantidad_prenda" onKeyPress="return soloNumeros(event)" id="cantidadProd_prenda" class="cantidadProd_prenda"/>
							<button type="button" class="btn-pfilter set-more">+</button>
						</div>
					</div>
					<div class="form-group">
						<a href="#" class="addCartButton_prenda" style="text-decoration:none">
            <div  class="fuente_georgia font_size16 boton_carrito" style="width: 180px;">Añadir a cesta</div>
            </a>
					</div>
				</form>
				<!-- ./Consulta relativa al producto -->

			</div>
		</div>
	</div>
</section>
<!-- ./También te podría quedar -->


		

    <?php  }
    // imprimirlas luego que la página es recargada
    if (isset($_COOKIE['cookie_productos_3'])) 
    {
    ?>

<!-- Productos recientemente vistos -->
<section id="recien-vistos">
  <div class="container fuente_georgia">
    <div class="row">
      <h2 class="text-center">Productos recientemente vistos</h2>
    </div>
    <div class="row">
      <div class="height-20"></div>
    </div>
    <div class="row">
    <?php
        foreach ($_COOKIE['cookie_productos_3'] as $name => $value) 
        {
            $name = htmlspecialchars($name);
            $value = htmlspecialchars($value);
            
            $result50 = $db_Full->select_sql("SELECT * from tbl_productos where id_producto=".$value." limit 1 ");
            
            while ($row50 = mysqli_fetch_array($result50))
            {
            ?> 
              <div class="col-sm-2">
              <a href="<?php echo $BASE_URL.$row50['url_page_tbl']; ?>"><img alt="" class="img-responsive" src="../webroot/archivos/<?php echo $row50['foto_producto']; ?>"></a>
              <h5 class="text-center section-title"><?php echo $row50["titulo_producto"]; ?></h5>
              </div>

            <?php
            }
        }
    ?>

      </div>
  </div>
</section>

    <?php
    }
    ?>

			
	