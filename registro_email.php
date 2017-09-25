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



<script>


	function validando()
	{
		
		
		var email_1 = document.cuenta.elements['email_1'];
		var email_2 = document.cuenta.elements['email_2'];
		
		
		
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
		
		
		
		
		
		if( (email_2.value == "") || (email_2.value != email_1.value) )
		{
			$("#email_2").css("border-bottom-color", "#900");
			$("#email_2").css("border-top-color", "#900");
			$("#email_2").css("border-left-color", "#900");
			$("#email_2").css("border-right-color", "#900");
			$(".alerta_3").css("display", "block");
			$("#error_correo").css("display", "block");
			return false;
		}else
		{
			$("#email_2").css("border-bottom-color", "#000");
			$("#email_2").css("border-top-color", "#000");
			$("#email_2").css("border-left-color", "#000");
			$("#email_2").css("border-right-color", "#000");
			$(".alerta_3").css("display", "none");
			$("#error_correo").css("display", "none");
		}
		
		
		
	
		
	
		
		
		 $.ajax({
				  type: "POST",
				  url: "enviar_popup_home.php",
				  data : "email_10="+$('#email_1').val(),	 
				  success: function(data)
				  {
					 	
				      $.fancybox("#gracias_popup");
					  setTimeout("location.href='index.php'", 2000);
					 
					
				  }
			});
			
		
		return false;
	}
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
                    <td width="320" align="left" style="color:#FFF">ESTAS REGISTRADO</td>
                    <td align="right" valign="top" width="30"><a href="detalle_cuenta.php" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>
                    
                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px; line-height:10px;">
                    <br><br><br>
                    GRACIAS POR REGISTRARTE.<BR><br>
                    Desde ahora recibirás muchas novedades. <br><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>
            
            




<!--FORMULARIO CUENTA-->

<div class="base_crear_cuenta">
<form action="" name="cuenta" method="post" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" align="center" width="90%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">REGISTRO A ENVÍO DE EMAIL</td>
</tr>
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size12" style="color:#000">Mantente en contacto con UFIT.PE a través de tu correo electrónico para enviarle lo último de la moda, ofertas, novedades, eventos y mucho más.</td>
</tr>
</table>

<div class="center_crear_cuenta">
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr><td height="40"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Correo electrónico</td>
<td class="fuente_georgia font_size13">
<input type="text" name="email_1" id="email_1" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_email_1" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_2" style="display:none;"></td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Confirmar Correo electrónico</td>
<td class="fuente_georgia font_size13">
<input type="text" name="email_2" id="email_2" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_correo" style="display:none;color:#F00;" class="fuente_georgia font_size13">Los correos no coinciden</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_3" style="display:none;"></td>
</tr>
</table>
</div>



<div class="left_crear_cuenta">
	
	<table cellpadding="0" cellspacing="0" width="80%" align="center">
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center">
    	<div class="boton_crear_cuenta fuente_georgia font_size12"><a href="index.php"  style="text-decoration:none;color:#FFF; cursor:pointer">CANCELAR</a></div>
    </td>
    </tr>
    </table>
  
</div>

<div class="right_crear_cuenta">
	<table cellpadding="0" cellspacing="0" width="80%" align="center">
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center"><input type="submit" onclick="return validando()" style="cursor:pointer"  class="boton_crear_cuenta fuente_georgia font_size12" value="ENVIAR"></td>
    </tr>
    </table>
</div>
</form>

<div id="cuenta_existe" style="display:none; width:100%; text-align:center;color:#F00;">
	<table cellpadding="0" cellspacing="0" align="center">
    <tr>
    <td valign="top"><img src="images/alerta_pago.jpg"></td>
    <td class="fuente_georgia font_size12">La dirección de correo electrónico que ha introducido ya está en uso. Si ya tiene una cuenta, inicie sesión ahora.</td>
    </tr>
    </table>

</div>


<div style="float:left;padding-top:50px; width:100%; height:1px;">&nbsp;</div>


</div>

<!-- FIN FORMULARIO CUENTA-->




<?php
include("footer.php");
?>

</body>    
</html>
