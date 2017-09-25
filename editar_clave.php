<?php
session_start();

require("conexion.php");
include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();



$result2=$db_Full->select_sql("SELECT id_cli,nombre_cli,email_cli from tbl_clientes where id_cli='".$_GET['u']."' AND token_nueva_clave_cli='".$_GET['token'] . "' limit 1 ");
$data2=mysqli_fetch_array($result2);

$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];

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


<!-- POPUP -->
<script type="text/javascript" src="fancybox/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
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
jQuery(document).ready(function($)
{

    $('.fancybox').fancybox();

      $(".base_item_menu").hover(
      function() {
        $(this).find(".vista_menu").stop( true, true ).fadeIn("0.2");
      }, function() {
        $(this).find(".vista_menu").stop( true, true ).fadeOut("0.2");
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

    $('.updateData').on('click', function(e){
        e.preventDefault();

        var nombre = document.cuenta.elements['nombre'];
        var email_1 = document.cuenta.elements['email_1'];
        var clave_1 = document.cuenta.elements['clave_1'];


        if(nombre.value == "")
        {
            $("#nombre").css("border-bottom-color", "#900");
            $("#nombre").css("border-top-color", "#900");
            $("#nombre").css("border-left-color", "#900");
            $("#nombre").css("border-right-color", "#900");
            $(".alerta_1").css("display", "block");
            $("#error_nombre").css("display", "block");
            return false;
        }else
        {
            $("#nombre").css("border-bottom-color", "#000");
            $("#nombre").css("border-top-color", "#000");
            $("#nombre").css("border-left-color", "#000");
            $("#nombre").css("border-right-color", "#000");
            $(".alerta_1").css("display", "none");
            $("#error_nombre").css("display", "none");
        }




        if(email_1.value == "")
        {
            $("#email_1").css("border-bottom-color", "#900");
            $("#email_1").css("border-top-color", "#900");
            $("#email_1").css("border-left-color", "#900");
            $("#email_1").css("border-right-color", "#900");
            $(".alerta_2").css("display", "block");
            $("#error_email_1").css("display", "block");
            return false;
        }else
        {
            $("#email_1").css("border-bottom-color", "#000");
            $("#email_1").css("border-top-color", "#000");
            $("#email_1").css("border-left-color", "#000");
            $("#email_1").css("border-right-color", "#000");
            $(".alerta_2").css("display", "none");
            $("#error_email_1").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_1.value))
        {
            $("#email_1").css("border-bottom-color", "#900");
            $("#email_1").css("border-top-color", "#900");
            $("#email_1").css("border-left-color", "#900");
            $("#email_1").css("border-right-color", "#900");
            $(".alerta_2").css("display", "block");
            $("#error_email_1").css("display", "block");
            return false;
        }else
        {
            $("#email_1").css("border-bottom-color", "#000");
            $("#email_1").css("border-top-color", "#000");
            $("#email_1").css("border-left-color", "#000");
            $("#email_1").css("border-right-color", "#000");
            $(".alerta_2").css("display", "none");
            $("#error_email_1").css("display", "none");
        }





        if(clave_1.value == "")
        {
            $("#clave_1").css("border-bottom-color", "#900");
            $("#clave_1").css("border-top-color", "#900");
            $("#clave_1").css("border-left-color", "#900");
            $("#clave_1").css("border-right-color", "#900");
            $(".alerta_4").css("display", "block");
            $("#error_clave").css("display", "block");
            return false;
        }else
        {
            $("#clave_1").css("border-bottom-color", "#000");
            $("#clave_1").css("border-top-color", "#000");
            $("#clave_1").css("border-left-color", "#000");
            $("#clave_1").css("border-right-color", "#000");
            $(".alerta_4").css("display", "none");
            $("#error_clave").css("display", "none");
        }





          $.ajax({
                  type: "POST",
                  url: "actualizar_cliente.php",
                  data : "nombre="+$('#nombre').val()+"&email_1="+$('#email_1').val()+"&clave_1="+$('#clave_1').val()+"&id="+$('#id').val(),
                  success: function(data)
                  {

                      $.fancybox("#gracias");
                      setTimeout("location.href='cerrar_cuenta.php'", 2000);


                  }
            });


        return false;
    });

});

</script>



</head>

<body>


<?php
include("header.php");
?>




<div id="gracias" style="width:350px;display: none; background-color:#FFF;">
    <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">GRACIAS</td>
                    <td align="right" valign="top" width="30"><a href="detalle_cuenta.php" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    GRACIAS POR ACTUALIZAR TUS DATOS.<BR><br>
                    Compra en ROYALTY.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>




<!--FORMULARIO CUENTA-->

<div class="base_editar_cuenta">
<form action="" name="cuenta" method="post" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">MI CUENTA</td>
</tr>
</table>

<div class="center_editar_cuenta">

    <table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td height="40"></td></tr>
    <tr>
    <td align="left"  class="fuente_georgia font_size14" >INFORMACIÓN DE CUENTA</td>
    </tr>
    </table>

    <table cellpadding="0" cellspacing="0" align="center" width="100%">
    <tr><td height="50"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13" width="120">Nombre</td>
    <td class="fuente_georgia font_size13">
    <input type="hidden" id="id" name="id" value="<?php echo $_GET['u'] ?>">
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre_cliente;?>" style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_nombre" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese sus Nombres</div>
    </td>
    </tr>
    <tr><td height="30"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">Correo electrónico</td>
    <td class="fuente_georgia font_size13">
    <input type="text" id="email_1" name="email_1" value="<?php echo $email_cliente;?>"  style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_email_1" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
    </td>
    </tr>
    <tr><td height="30"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13">Nueva Contraseña</td>
    <td class="fuente_georgia font_size13">
    <input type="password" id="clave_1" name="clave_1" value=""  style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_clave" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese una Contraseña</div>
    </td>
    </tr>
    <tr><td height="30"></td></tr>
    </table>

    <table cellpadding="0" cellspacing="0" width="80%" align="center">
    <tr><td height="40"></td></tr>
    <tr>
    <td align="center">
        <div class="boton_crear_cuenta fuente_georgia font_size12">
            <a class="updateData" href="#" style="text-decoration:none;color:#FFF; cursor:pointer">ACTUALIZAR</a>
        </div>
    </td>
    </tr>
    <tr><td height="40"></td></tr>
    </table>

</div>
</form>
</div>

<!-- FIN FORMULARIO CUENTA-->




<!--FOOTER-->
<?php
include("footer.php");
?>


</body>
</html>
