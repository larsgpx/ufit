<?php
//include("inc.aplication_top.php");
session_start();

require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

$result2=$db_Full->select_sql("SELECT * from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2=mysqli_fetch_assoc($result2);
$envio = $data2['envio_cli'];

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


    $('.updateData').on('click', function(e){
        e.preventDefault();

        var envio = document.cuenta.elements['envio'];
        var tipo = document.cuenta.elements['tipo'];

          $.ajax({
                  type: "POST",
                  url: "actualizar_envio.php",
                  data : "envio="+envio.value,
                  success: function(data)
                  {
                      if(tipo.value == "compra")
                        {
                            window.location.assign("pago");
                        }else
                        {
                              $.fancybox("#gracias");
                                setTimeout("location.href='detalle_cuenta.php'", 2000);
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
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>




<!--FORMULARIO CUENTA-->

<div class="base_editar_cuenta">
<form action="" name="cuenta" method="post" enctype="multipart/form-data">
<input type="hidden" name="tipo" id="tipo" value="<?php echo $_GET['tipo']; ?>">
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">MÉTODO DE ENVÍO</td>
</tr>
</table>

<div class="center_editar_cuenta">
    <table cellpadding="0" cellspacing="0" align="center" width="100%">
     <tr><td height="40"></td></tr>
    <tr>
    <td align="left" class="fuente_georgia font_size14">Seleccione su método de envío preferido</td>
    </tr>
    </table>

    <table cellpadding="0" cellspacing="0" align="center" width="100%">
    <tr><td height="40"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13"><input type="radio" name="envio"  value="Standar Delivery"  <?php if($envio=="Standar Delivery"){ echo "checked";} ?>></td>
    <TD>STANDAR DELIVERY</TD>
    </tr>
    <tr><td height="10"></td></tr>
    <tr>
    <TD></TD>
    <td class="fuente_georgia font_size13" style="text-align:justify">
        Este servicio tiene un costo de S/. 10.00 con un plazo de 3 a 5 días hábiles.
    </td>
    </tr>
    <tr><td height="40"></td></tr>
    <tr>
    <td class="fuente_georgia font_size13"><input type="radio" name="envio"  value="Express Delivery" <?php if($envio=="Express Delivery"){ echo "checked";} ?> ></td>
    <TD>EXPRESS DELIVERY</TD>
    </tr>
    <tr><td height="10"></td></tr>
    <tr>
    <TD></TD>
    <td class="fuente_georgia font_size13" style="text-align:justify">
        Este servicio tiene un costo de S/. 20.00 con un plazo de 1 a 2 días hábiles.
    </td>
    </tr>
    </table>
</div>

<div class="left_crear_cuenta">

    <table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td height="30"></td></tr>
    <tr>
    <td align="center">
    <a href="detalle_cuenta.php">
      <div class="boton_crear_cuenta fuente_georgia font_size12">CANCELAR
      </div></td>
    </a>
    </tr>
    </table>

</div>

<div class="right_crear_cuenta">
    <table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td height="30"></td></tr>
    <tr>
    <td align="center">
        <div class="boton_crear_cuenta fuente_georgia font_size12 updateData" style="cursor: pointer">
            <a href="#" style="text-decoration:none;color:#FFF; cursor:pointer">ENVIAR</a>
        </div>
    </td>
    </tr>
    <tr><td height="30"></td></tr>
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
