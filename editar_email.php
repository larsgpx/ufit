<?php
session_start();
require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

$result2=$db_Full->select_sql("SELECT id_cli,nombre_cli,email_cli,clave_cli,ruc_cli,razon_cli,dni_cli,tipo_cli from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2=mysqli_fetch_assoc($result2);
$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];
$clave_cliente = $data2['clave_cli'];

$ruc_cliente = $data2['ruc_cli'];
$razon_cliente = $data2['razon_cli'];
$dni_cliente = $data2['dni_cli'];
$tipo_cliente = $data2['tipo_cli'];


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
        var compra = document.cuenta.elements['compra'];
        var tipo = document.cuenta.elements['tipo'];
        var razon = document.cuenta.elements['razon'];
        var ruc = document.cuenta.elements['ruc'];
        var dni = document.cuenta.elements['dni'];


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



        if(tipo.value == "")
        {
            $(".alerta_tipo").css("display", "block");
            $("#error_tipo").css("display", "block");
            return false;
        }else
        {
            $(".alerta_tipo").css("display", "none");
            $("#error_tipo").css("display", "none");

            if(tipo.value == "RUC")
            {
                if(razon.value == "")
                {
                    $("#error_razon").css("display", "block");
                    return false;
                }else
                {
                    $("#error_razon").css("display", "none");
                }

                if(ruc.value == "")
                {
                    $("#error_ruc").css("display", "block");
                    return false;
                }else
                {
                    $("#error_ruc").css("display", "none");
                }
            }else
            {
                if(dni.value == "")
                {
                    $("#error_dni").css("display", "block");
                    return false;
                }else
                {
                    $("#error_dni").css("display", "none");
                }
            }
        
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







          $.ajax({
                  type: "POST",
                  url: "actualizar_cliente.php",
                  data : "nombre="+$('#nombre').val()+"&email_1="+$('#email_1').val()+"&clave_1="+$('#clave_1').val()+"&ruc="+$('#ruc').val()+"&razon="+$('#razon').val()+"&dni="+$('#dni').val()+"&tipo="+$('input[name=tipo]:checked').val(),
                  success: function(data)
                  {

                    if(compra.value == "compra")
                        {
                            window.location.assign("pago");
                        }else
                        {
                            $.fancybox("#gracias");
                             setTimeout("location.href='cerrar_cuenta.php'", 2000);

                        }
                      

                  }
            });


        return false;
    });


});

</script>



</head>

<body>


<?php
$BASE_URL="";
include("header.php");
?>




<div id="gracias" style="width:350px;display: none; background-color:#FFF;">
    <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF"> &nbsp; GRACIAS</td>
                    <td align="right" width="30" style="text-align: center"><a href="detalle_cuenta.php" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br>
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
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre_cliente;?>" style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_nombre" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese sus Nombres</div>
    </td>
    </tr>
    <tr><td height="10"></td></tr>
   


   <tr>
    <td class="fuente_georgia font_size13" width="120" valign="top"></td>
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

   <input type="hidden" name="compra" id="compra" value="<?php echo $_GET['tipo']; ?>">

    <input type="radio" name="tipo" id="tipo" style="border:solid 1px #000; height:15px; " value="RUC" onclick="validar_tipo(this);" <?php if($tipo_cliente=="RUC"){ echo "checked"; }?> > RUC <br>
    <input type="radio" name="tipo" id="tipo" style="border:solid 1px #000; height:15px; " value="DNI" onclick="validar_tipo(this);" <?php if($tipo_cliente=="DNI"){ echo "checked"; }?> > DNI

    <div id="error_tipo" style="display:none;color:#F00;" class="fuente_georgia font_size13">Seleccione</div>
    </td>
    <td width="10"></td>
    <td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_tipo" style="display:none;"></td>
    </tr>
    <tr><td height="10"></td></tr>


    
    <tr >
    <td ></td>
    <td class="fuente_georgia font_size13 razon"  <?php if($tipo_cliente=="RUC"){echo "style='display: block'";}else{echo "style='display: none'";} ?> >
    Razón Social <input type="text" name="razon" id="razon" value="<?php echo $razon_cliente;?>" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
    <div id="error_razon" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Razón Social</div>
    </td>
    <td></td>
    </tr>
    <tr class="ruc" <?php if($tipo_cliente=="RUC"){echo "style='display: block'";}else{echo "style='display: none'";} ?>><td height="10"></td></tr>


    <tr >
    <td ></td>
    <td class="fuente_georgia font_size13 ruc" <?php if($tipo_cliente=="RUC"){echo "style='display: block'";}else{echo "style='display: none'";} ?> >
    RUC <input type="text" name="ruc" id="ruc" value="<?php echo $ruc_cliente;?>" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
    <div id="error_ruc" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su RUC</div>
    </td>
    <td></td>
    </tr>
    <tr class="ruc" <?php if($tipo_cliente=="RUC"){echo "style='display: block'";}else{echo "style='display: none'";} ?>><td height="30"></td></tr>
   

    <tr >
    <td ></td>
    <td class="fuente_georgia font_size13 dni" <?php if($tipo_cliente=="DNI"){echo "style='display: block'";}else{echo "style='display: none'";} ?> >
    DNI <input type="text" name="dni" id="dni" value="<?php echo $dni_cliente;?>" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
    <div id="error_dni" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su DNI</div>
    </td>
    <td></td>
    </tr>
    <tr class="dni" <?php if($tipo_cliente=="DNI"){echo "style='display: block'";}else{echo "style='display: none'";} ?>><td height="30"></td></tr>


    <tr>
    <td class="fuente_georgia font_size13">Correo electrónico</td>
    <td class="fuente_georgia font_size13">
    <input type="text" id="email_1" name="email_1" value="<?php echo $email_cliente;?>"  style="width:100%; border:solid 1px #000; height:25px">
    <div id="error_email_1" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
    </td>
    </tr>
    <tr><td height="30"></td></tr>
    

    <tr>
    <td class="fuente_georgia font_size13">Cambie su Contraseña</td>
    <td class="fuente_georgia font_size13">
    <input type="password" id="clave_1" name="clave_1" value=""  style="width:100%; border:solid 1px #000; height:25px">
    <span>(dejar en blanco si no se quiere cambiar)</span>
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
