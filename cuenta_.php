<?php
//include("inc.aplication_top.php");
session_start();

if(isset($_GET['id_producto']) && $_GET['id_producto'] != ''){
    extract($_REQUEST);

    include('conexion.php');

    $id=$id_producto;

    if($cantidad==""){
      $cantidad = 1;
    }else{
        if(isset($_SESSION['carro'])){
            foreach ($_SESSION['carro'] as $product) {
              if($product['id'] == $id){
                // $cantidad = $product['cantidad'] + $cantidad;
                $cantidad = $cantidad;
                $foundInCart = true;
              }
            }
        }

    }

    // Check if we receive a size or color
    if(!isset($talla)){
      $talla = '';
    }
    if(!isset($color)){
      $color = '';
    }

    $isOfer = false;
    $checkIfOfert = $db_Full->select_sql("SELECT oferta_producto FROM tbl_productos WHERE id_producto='" . $id . "'");
    $checkIfOfertFetch = mysqli_fetch_array($checkIfOfert);

    if($checkIfOfertFetch['oferta_producto'] == 'SI'){
      $consulta1 = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,nombre_productos_fotos,oferta_producto,precio_oferta_producto, foto_producto FROM tbl_productos,tbl_productos_fotos,tbl_ofertas where id_producto=fkproducto_oferta and id_producto='".$id."' limit 1");
      $isOfer = true;
    }else{
      $consulta1 = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,foto_producto,oferta_producto,precio_oferta_producto FROM tbl_productos where id_producto='".$id."' ");
    }

    $obtener=mysqli_fetch_row($consulta1);
    $id=$obtener[0];
    $titulo=$obtener[1];

    if($isOfer){
      if($obtener[6]=="SI")
      {
        $precio= $obtener[7];
      }else
      {
        $precio = $obtener[2];
      }


      $descripcion=$obtener[3];
      $codigo=$obtener[4];
      $foto=$obtener[8];
    }else{
      if($obtener[6]=="SI")
      { $precio= $obtener[7];
      }else
      { $precio = $obtener[2]; }


      $descripcion=$obtener[3];
      $codigo=$obtener[4];
      $foto=$obtener[5];

    }


    if(isset($_SESSION['carro'])){
      $carro=$_SESSION['carro'];
    }

    $carro[$id]=array(
      'id'=>$id,
      'titulo'=>$titulo,
      'precio'=>$precio,
      'descripcion'=>$descripcion,
      'codigo'=>$codigo,
      'cantidad'=>$cantidad,
      'foto'=>$foto,
      'talla' => $talla,
      'color' => $color
    );

    $_SESSION['carro']=$carro;
}
?>

<!DOCTYPE html><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
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


    $('.resetPassword').on('click', function(e){
        e.preventDefault();

        var email_recuperar = document.formulario.elements['email_recuperar'];
        var email_recuperar2 = document.formulario.elements['email_recuperar2'];

        if(email_recuperar.value == "")
        {
            $("#email_recuperar").css("border-bottom-color", "#900");
            $("#email_recuperar").css("border-top-color", "#900");
            $("#email_recuperar").css("border-left-color", "#900");
            $("#email_recuperar").css("border-right-color", "#900");
            $("#error_correo_recuperar").css("display", "block");

            return false;
        }else
        {
            $("#email_recuperar").css("border-bottom-color", "#ccc");
            $("#email_recuperar").css("border-top-color", "#ccc");
            $("#email_recuperar").css("border-left-color", "#ccc");
            $("#email_recuperar").css("border-right-color", "#ccc");
            $("#error_correo_recuperar").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_recuperar.value))
        {
            $("#email_recuperar").css("border-bottom-color", "#900");
            $("#email_recuperar").css("border-top-color", "#900");
            $("#email_recuperar").css("border-left-color", "#900");
            $("#email_recuperar").css("border-right-color", "#900");
            $("#error_correo_recuperar").css("display", "block");

            return false;
        }else
        {
            $("#email_recuperar").css("border-bottom-color", "#ccc");
            $("#email_recuperar").css("border-top-color", "#ccc");
            $("#email_recuperar").css("border-left-color", "#ccc");
            $("#email_recuperar").css("border-right-color", "#ccc");
            $("#error_correo_recuperar").css("display", "none");
        }



        if( (email_recuperar2.value == "") || (email_recuperar2.value != email_recuperar.value) )
        {
            $("#email_recuperar2").css("border-bottom-color", "#900");
            $("#email_recuperar2").css("border-top-color", "#900");
            $("#email_recuperar2").css("border-left-color", "#900");
            $("#email_recuperar2").css("border-right-color", "#900");
            $("#error_correo").css("display", "block");
            return false;
        }else
        {
            $("#email_recuperar2").css("border-bottom-color", "#000");
            $("#email_recuperar2").css("border-top-color", "#000");
            $("#email_recuperar2").css("border-left-color", "#000");
            $("#email_recuperar2").css("border-right-color", "#000");
            $("#error_correo").css("display", "none");
        }


         $.ajax({
                  type: "POST",
                  url: "recuperar_clave.php",
                  data : "email_recuperar="+$('#email_recuperar').val(),

                  success: function(data)
                  {
                      if(data==1)
                      {
                           $("#inline").css("display", "none");
                            $.fancybox("#gracias");

                             setTimeout("location.href='cuenta.php'", 2000);
                      }
                      else
                      {
                          $("#error_correo_enviado").css("display", "block");
                          return false;
                      }
                  }
            });

        return false;

    })

});

</script>



</head>



<body>


<?php
$BASE_URL="";
include("header.php");
?>






<!--FORMULARIO CUENTA-->
<div class="base_crear_cuenta">

<table cellpadding="0" cellspacing="0" align="center" width="90%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">MI CUENTA</td>
</tr>
</table>

<script>


    function validandox()
    {
        var email = document.cuentax.elements['email'];
        var clave = document.cuentax.elements['clave'];

        if(email.value == "")
        {
            $("#email").css("border-bottom-color", "#900");
            $("#email").css("border-top-color", "#900");
            $("#email").css("border-left-color", "#900");
            $("#email").css("border-right-color", "#900");
            $(".alerta_1").css("display", "block");
            $("#error_email").css("display", "block");
            return false;
        }else
        {
            $("#email").css("border-bottom-color", "#ccc");
            $("#email").css("border-top-color", "#ccc");
            $("#email").css("border-left-color", "#ccc");
            $("#email").css("border-right-color", "#ccc");
            $(".alerta_1").css("display", "none");
            $("#error_email").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email.value))
        {
            $("#email").css("border-bottom-color", "#900");
            $("#email").css("border-top-color", "#900");
            $("#email").css("border-left-color", "#900");
            $("#email").css("border-right-color", "#900");
            $(".alerta_1").css("display", "block");
            $("#error_email").css("display", "block");
            return false;
        }else
        {
            $("#email").css("border-bottom-color", "#ccc");
            $("#email").css("border-top-color", "#ccc");
            $("#email").css("border-left-color", "#ccc");
            $("#email").css("border-right-color", "#ccc");
            $(".alerta_1").css("display", "none");
            $("#error_email").css("display", "none");
        }



        if(clave.value == "")
        {
            $("#clave").css("border-bottom-color", "#900");
            $("#clave").css("border-top-color", "#900");
            $("#clave").css("border-left-color", "#900");
            $("#clave").css("border-right-color", "#900");
            $(".alerta_2").css("display", "block");
            $("#error_clave").css("display", "block");
            return false;
        }else
        {
            $("#clave").css("border-bottom-color", "#ccc");
            $("#clave").css("border-top-color", "#ccc");
            $("#clave").css("border-left-color", "#ccc");
            $("#clave").css("border-right-color", "#ccc");
            $(".alerta_2").css("display", "none");
            $("#error_clave").css("display", "none");
        }


         $.ajax({
                  type: "POST",
                  url: "validar_cliente.php",
                  data : "email="+$('#email').val()+"&clave="+$('#clave').val()+"&producto="+$('#producto').val(),

                  success: function(data)
                  {
                      if(data==0)
                      {
                          $("#error").css("display", "block");
                          return false;
                      }else if(data==2)
                      {
                          <?php
                          if(isset($_GET['id_producto']) && $_GET['id_producto']){
                              echo 'window.location.assign("pago.php")';
                          }else{
                              echo 'window.location.assign("detalle_producto.php?id_producto="+$("#producto").val());';
                          }
                          ?>

                      }else
                      {
                          window.location.assign("detalle_cuenta.php");
                      }


                  }
            });

        return false;

    }
    </script>


    <div id="gracias" style="width:350px;display: none; background-color:#FFF;">
    <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">RESTABLECER CONTRASEÑA</td>
                    <td align="right" valign="top" width="30"><a href="detalle_cuenta.php" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    GRACIAS, HEMOS ENVIADO UN CORREO ELECTRÓNICO PARA RESTABLECER TU CONTRASEÑA .<BR><br>
                    Compra en ROYALTY.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>


<div class="left_crear_cuenta">
    <form action="" name="cuentax" method="post" enctype="multipart/form-data" >
    <table cellpadding="0" cellspacing="0" width="80%" align="center">
     <tr><td height="20"></td></tr>
    <tr>
    <td class="fuente_georgia font_size14">INGRESAR</td>
    </tr>
    <tr><td height="20"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">Correo electrónico</td>
    </tr>
    <tr><td height="10"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">
    <input type="text" name="email" id="email" style="width:100%; border:solid 1px #000; height:25px" >
    <input type="hidden" name="producto" id="producto" value="<?php echo $royaltyUtils->getValueIfExists($_GET, 'id_producto') ?>" style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_email" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
    </td>
    <td width="10"></td>
    <td align="left" width="26"><img src="images/alerta_pago.jpg" class="alerta_1" style="display:none;"></td>
    </tr>
    <tr><td height="20"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">Contraseña</td>
    </tr>
    <tr><td height="10"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">
    <input type="password" name="clave" id="clave" style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_clave" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Contraseña</div>
    </td>
    <td width="10"></td>
    <td align="left" width="26"><img src="images/alerta_pago.jpg" class="alerta_2" style="display:none;"></td>
    </tr>

    <tr><td height="10"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13" align="left" style="color:#F00; display:none" id="error">Datos Incorrectos</td>
    </tr>

    <tr><td height="10"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13" align="right"><a  href="#inline1" class="fancybox" style="color:#000; text-decoration:none; cursor:pointer"> <i>Olvidé mi contraseña ></i></td>
    </tr>
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center"><input type="submit" style="cursor:pointer;" onclick="return validandox()" class="boton_crear_cuenta fuente_georgia font_size12" value="INGRESAR"></td>
    </tr>
    </table>

    </form>

    <div id="inline1" style="width:450px;display: none; background-color:#FFF;">

        <table cellpadding="0" cellspacing="0" width="100%" style="background-color:#000;padding:20px;" >
        <tr>
        <td width="420" align="left" class="fuente_georgia font_size18" style="color:#FFF" >OLVIDÉ MI CONTRASEÑA</td>
        <td align="right" width="30"><a href="javascript:$.fancybox.close();" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
        </tr>
        </table>

        <form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data" >
        <table cellpadding="0" cellspacing="0" width="80%" align="center">
        <tr><td height="30"></td></tr>
        <tr>
        <td align="left" class="fuente_georgia font_size14" style="color:#000">Por favor ingrese el correo electrónico que utilizó para crear su cuenta y le enviaremos el enlace para restablecer su contraseña.</td>
        </tr>
        <tr><td height="30"></td></tr>
        <tr>
        <td align="left" class="fuente_georgia font_size14" style="color:#000">Correo electrónico</td>
        </tr>
        <tr><td height="15"></td></tr>
        <tr>
        <td align="left">
        <input type="text" name="email_recuperar" id="email_recuperar" style="width:100%; border:solid 1px #000; height:25px"  >
        <div id="error_correo_recuperar" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
        </td>
        </tr>
        <tr><td height="15"></td></tr>
        <tr>
        <tr>
        <td align="left" class="fuente_georgia font_size14" style="color:#000">Confirmar correo electrónico</td>
        </tr>
        <tr><td height="15"></td></tr>
        <tr>
        <td align="left">
        <input type="text" name="email_recuperar2" id="email_recuperar2" style="width:100%; border:solid 1px #000; height:25px"  >
        <div id="error_correo" style="display:none;color:#F00;" class="fuente_georgia font_size13">Los correos no coinciden</div>
        </td>
        </tr>
        <tr><td height="15"></td></tr>
        <tr>
        <td align="left"><a href="<?php echo $BASE_URL?>crear-cuenta" class="fuente_georgia font_size14" style="text-decoration:none;color:#000"><i>Crear una nueva cuenta > </i></a></td>
        </tr>
        <tr><td height="40"></td></tr>
        <tr>
        <td><div style="width:100%; height:1px; background-color:#000"></div></td>
        </tr>
        <tr><td height="10"></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%"><a href="javascript:$.fancybox.close();" class="boton_crear_cuenta fuente_georgia font_size12" style="color:#FFF;cursor:pointer;text-decoration:none;">CANCELAR</a></td>
        <td align="right" width="50%">
            <div class="boton_crear_cuenta fuente_georgia font_size12">
                <a class="resetPassword" href="#" style="text-decoration:none;color:#FFF; cursor:pointer">ENVIAR</a>
            </div>
        </td>
        </tr>
        </table>

        </form>

        <table cellspacing="0" cellpadding="0" id="error_correo_enviado">
        <tr><td height="15"></td></tr>
        <tr><td height="30" style="color:#F00;display:none">Los datos no son correctos.</td></tr>
        </table>
    </div>


</div>

<div class="right_crear_cuenta">
    <table cellpadding="0" cellspacing="0" width="80%" align="center">
     <tr><td height="20"></td></tr>
    <tr>
    <td class="fuente_georgia font_size14">CREAR UNA CUENTA</td>
    </tr>
    <tr><td height="20"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">Regristrate en ROYALTY.PE para disfrutar de una experiencia de compra.</td>
    </tr>
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center">
      <a class="btn-black font_size12" href="<?php echo $BASE_URL?>crear-cuenta"  style="text-decoration:none;color:#FFF">CREAR UNA CUENTA</a>
    </td>
    </tr>
    </table>
</div>

<div style="float:left;padding-top:50px; width:100%; height:1px;">&nbsp;</div>

</div>

<!-- FIN FORMULARIO CUENTA-->




<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
