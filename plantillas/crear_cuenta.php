<?php 
//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
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
	
	  
		
});
			  
</script>



<script>



	function validandos()
	{
		
		var nombre = document.cuentas.elements['nombre'];
		var tipo = document.cuentas.elements['tipo'];
		var razon = document.cuentas.elements['razon'];
		var ruc = document.cuentas.elements['ruc'];
		var dni = document.cuentas.elements['dni'];
		var email_1 = document.cuentas.elements['email_1'];
		var email_2 = document.cuentas.elements['email_2'];
		var clave_1 = document.cuentas.elements['clave_1'];
		var clave_2 = document.cuentas.elements['clave_2'];
		var pais = document.cuentas.elements['pais'];
		
		
		
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
		
		
		
		
		if(clave_1.value == "")
		{
			$("#clave_1").css("border-bottom-color", "#900");
			$("#clave_1").css("border-top-color", "#900");
			$("#clave_1").css("border-left-color", "#900");
			$("#clave_1").css("border-right-color", "#900");
			$(".alerta_4").css("display", "block");
			$("#error_clave_1").css("display", "block");
			return false;
		}else
		{
			$("#clave_1").css("border-bottom-color", "#000");
			$("#clave_1").css("border-top-color", "#000");
			$("#clave_1").css("border-left-color", "#000");
			$("#clave_1").css("border-right-color", "#000");
			$(".alerta_4").css("display", "none");
			$("#error_clave_1").css("display", "none");
		}
		
		
		if( (clave_2.value == "") || (clave_2.value != clave_1.value) )
		{
			$("#clave_2").css("border-bottom-color", "#900");
			$("#clave_2").css("border-top-color", "#900");
			$("#clave_2").css("border-left-color", "#900");
			$("#clave_2").css("border-right-color", "#900");
			$(".alerta_5").css("display", "block");
			$("#error_clave").css("display", "block");
			return false;
		}else
		{
			$("#clave_2").css("border-bottom-color", "#000");
			$("#clave_2").css("border-top-color", "#000");
			$("#clave_2").css("border-left-color", "#000");
			$("#clave_2").css("border-right-color", "#000");
			$(".alerta_5").css("display", "none");
			$("#error_clave").css("display", "none");
		}
		
		
		
		
		if(pais.value == "")
		{
			$("#pais").css("border-bottom-color", "#900");
			$("#pais").css("border-top-color", "#900");
			$("#pais").css("border-left-color", "#900");
			$("#pais").css("border-right-color", "#900");
			$(".alerta_6").css("display", "block");
			$("#error_pais").css("display", "block");
			return false;
		}else
		{
			$("#pais").css("border-bottom-color", "#000");
			$("#pais").css("border-top-color", "#000");
			$("#pais").css("border-left-color", "#000");
			$("#pais").css("border-right-color", "#000");
			$(".alerta_6").css("display", "none");
			$("#error_pais").css("display", "none");
		}
		
		
		  $.ajax({
				  type: "POST",
				  url: "<?php echo $BASE_URL ?>guardar_cliente.php",
				  data : "nombre="+$('#nombre').val()+"&email_1="+$('#email_1').val()+"&clave_1="+$('#clave_1').val()+"&pais="+$('#pais').val()+"&tipo="+$('#tipo').val()+"&ruc="+$('#ruc').val()+"&razon="+$('#razon').val()+"&dni="+$('#dni').val(),	 
				  success: function(data)
				  {
					  if(data==0)
					  {	
						 $.fancybox("#gracias");
						 setTimeout("location.href='detalle_cuenta.php'", 2000);
						  //window.location.assign("detalle_cuenta.php");
					  }
					  else
					  {
						 
						  $("#cuenta_existe").css("display", "block");
						  return false;
					  }
					
				  }
			});
			
		
		return false;
	}
	</script>      
    
    
</head>

<body>




<div id="gracias" style="width:350px;display: none; background-color:#FFF;">
    <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>
                    
                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">  ESTAS REGISTRADO</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>
                    
                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px; line-height:10px;">
                    <br><br><br>
                    GRACIAS POR REGISTRARTE.<BR><br>
                    Desde ahora recibirás muchas novedades. <br><br>
                    Compra en ROYALTY.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>
            
            




<!--FORMULARIO CUENTA-->

<div class="base_crear_cuenta">
<form action="" name="cuentas" method="post" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" align="center" width="90%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">CREAR UNA CUENTA</td>
</tr>
</table>

<div class="center_crear_cuenta">
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr><td height="40"></td></tr>

<tr>
<td class="fuente_georgia font_size13" width="120" valign="top">Nombre</td>
<td class="fuente_georgia font_size13">
<input type="text" name="nombre" id="nombre" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_nombre" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese sus nombres</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_1" style="display:none;"></td>
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

<input type="radio" name="tipo" id="tipo" style="border:solid 1px #000; height:15px; " value="RUC" onclick="validar_tipo(this);" > RUC <br>
<input type="radio" name="tipo" id="tipo" style="border:solid 1px #000; height:15px; " value="DNI" onclick="validar_tipo(this);" > DNI

<div id="error_tipo" style="display:none;color:#F00;" class="fuente_georgia font_size13">Seleccione</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_tipo" style="display:none;"></td>
</tr>
<tr><td height="10"></td></tr>


<tr >
<td ></td>
<td class="fuente_georgia font_size13 razon" style="display: none" >
Razón Social <input type="text" name="razon" id="razon" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_razon" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Razón Social</div>
</td>
<td></td>
</tr>
<tr class="ruc" style="display: none"><td height="10"></td></tr>


<tr >
<td ></td>
<td class="fuente_georgia font_size13 ruc" style="display: none" >
RUC <input type="text" name="ruc" id="ruc" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_ruc" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su RUC</div>
</td>
<td></td>
</tr>
<tr class="ruc" style="display: none"><td height="30"></td></tr>


<tr >
<td ></td>
<td class="fuente_georgia font_size13 dni" style="display: none" >
DNI <input type="text" name="dni" id="dni" style="width:100%; border:solid 1px #000; height:25px" maxlength="30">
<div id="error_dni" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su DNI</div>
</td>
<td></td>
</tr>
<tr class="dni" style="display: none"><td height="30"></td></tr>


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
<tr><td height="30"></td></tr>


<tr>
<td class="fuente_georgia font_size13" valign="top">Crear Contraseña</td>
<td class="fuente_georgia font_size13">
<input type="password" name="clave_1" id="clave_1" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_clave_1" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su contraseña</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_4" style="display:none;"></td>
</tr>
<tr><td height="30"></td></tr>



<tr>
<td class="fuente_georgia font_size13" valign="top">Confirmar Contraseña</td>
<td class="fuente_georgia font_size13">
<input type="password" name="clave_2" id="clave_2" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_clave" style="display:none;color:#F00;" class="fuente_georgia font_size13">Las contraseñas no coinciden</div>
</td>
<td width="10"></td>
<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_5" style="display:none;"></td>
</tr>
<tr><td height="30"></td></tr>


<tr>
<td class="fuente_georgia font_size13" valign="top">País</td>
    <td class="fuente_georgia font_size13">
    <select type="text" name="pais" id="pais"  style="width:100%;background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
    	      
                <option value="Afganistán" id="AF">Afganistán</option>
                <option value="Albania" id="AL">Albania</option>
                <option value="Alemania" id="DE">Alemania</option>
                <option value="Andorra" id="AD">Andorra</option>
                <option value="Angola" id="AO">Angola</option>
                <option value="Anguila" id="AI">Anguila</option>
                <option value="Antártida" id="AQ">Antártida</option>
                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                <option value="Argelia" id="DZ">Argelia</option>
                <option value="Argentina" id="AR">Argentina</option>
                <option value="Armenia" id="AM">Armenia</option>
                <option value="Aruba" id="AW">Aruba</option>
                <option value="Australia" id="AU">Australia</option>
                <option value="Austria" id="AT">Austria</option>
                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                <option value="Bahamas" id="BS">Bahamas</option>
                <option value="Bahrein" id="BH">Bahrein</option>
                <option value="Bangladesh" id="BD">Bangladesh</option>
                <option value="Barbados" id="BB">Barbados</option>
                <option value="Bélgica" id="BE">Bélgica</option>
                <option value="Belice" id="BZ">Belice</option>
                <option value="Benín" id="BJ">Benín</option>
                <option value="Bermudas" id="BM">Bermudas</option>
                <option value="Bhután" id="BT">Bhután</option>
                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                <option value="Birmania" id="MM">Birmania</option>
                <option value="Bolivia" id="BO">Bolivia</option>
                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                <option value="Botsuana" id="BW">Botsuana</option>
                <option value="Brasil" id="BR">Brasil</option>
                <option value="Brunei" id="BN">Brunei</option>
                <option value="Bulgaria" id="BG">Bulgaria</option>
                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                <option value="Burundi" id="BI">Burundi</option>
                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                <option value="Camboya" id="KH">Camboya</option>
                <option value="Camerún" id="CM">Camerún</option>
                <option value="Canadá" id="CA">Canadá</option>
                <option value="Chad" id="TD">Chad</option>
                <option value="Chile" id="CL">Chile</option>
                <option value="China" id="CN">China</option>
                <option value="Chipre" id="CY">Chipre</option>
                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                <option value="Colombia" id="CO">Colombia</option>
                <option value="Comores" id="KM">Comores</option>
                <option value="Congo" id="CG">Congo</option>
                <option value="Corea" id="KR">Corea</option>
                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                <option value="Costa Rica" id="CR">Costa Rica</option>
                <option value="Croacia" id="HR">Croacia</option>
                <option value="Cuba" id="CU">Cuba</option>
                <option value="Dinamarca" id="DK">Dinamarca</option>
                <option value="Djibouri" id="DJ">Djibouri</option>
                <option value="Dominica" id="DM">Dominica</option>
                <option value="Ecuador" id="EC">Ecuador</option>
                <option value="Egipto" id="EG">Egipto</option>
                <option value="El Salvador" id="SV">El Salvador</option>
                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                <option value="Eritrea" id="ER">Eritrea</option>
                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                <option value="Eslovenia" id="SI">Eslovenia</option>
                <option value="España" id="ES">España</option>
                <option value="Estados Unidos" id="US">Estados Unidos</option>
                <option value="Estonia" id="EE">Estonia</option>
                <option value="c" id="ET">Etiopía</option>
                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                <option value="Filipinas" id="PH">Filipinas</option>
                <option value="Finlandia" id="FI">Finlandia</option>
                <option value="Francia" id="FR">Francia</option>
                <option value="Gabón" id="GA">Gabón</option>
                <option value="Gambia" id="GM">Gambia</option>
                <option value="Georgia" id="GE">Georgia</option>
                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                <option value="Ghana" id="GH">Ghana</option>
                <option value="Gibraltar" id="GI">Gibraltar</option>
                <option value="Granada" id="GD">Granada</option>
                <option value="Grecia" id="GR">Grecia</option>
                <option value="Groenlandia" id="GL">Groenlandia</option>
                <option value="Guadalupe" id="GP">Guadalupe</option>
                <option value="Guam" id="GU">Guam</option>
                <option value="Guatemala" id="GT">Guatemala</option>
                <option value="Guayana" id="GY">Guayana</option>
                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                <option value="Guinea" id="GN">Guinea</option>
                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                <option value="Haití" id="HT">Haití</option>
                <option value="Holanda" id="NL">Holanda</option>
                <option value="Honduras" id="HN">Honduras</option>
                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                <option value="Hungría" id="HU">Hungría</option>
                <option value="India" id="IN">India</option>
                <option value="Indonesia" id="ID">Indonesia</option>
                <option value="Irak" id="IQ">Irak</option>
                <option value="Irán" id="IR">Irán</option>
                <option value="Irlanda" id="IE">Irlanda</option>
                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                <option value="Islandia" id="IS">Islandia</option>
                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                <option value="Islas Cook" id="CK">Islas Cook</option>
                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                <option value="Islas Palau" id="PW">Islas Palau</option>
                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                <option value="Israel" id="IL">Israel</option>
                <option value="Italia" id="IT">Italia</option>
                <option value="Jamaica" id="JM">Jamaica</option>
                <option value="Japón" id="JP">Japón</option>
                <option value="Jordania" id="JO">Jordania</option>
                <option value="Kazajistán" id="KZ">Kazajistán</option>
                <option value="Kenia" id="KE">Kenia</option>
                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                <option value="Kiribati" id="KI">Kiribati</option>
                <option value="Kuwait" id="KW">Kuwait</option>
                <option value="Laos" id="LA">Laos</option>
                <option value="Lesoto" id="LS">Lesoto</option>
                <option value="Letonia" id="LV">Letonia</option>
                <option value="Líbano" id="LB">Líbano</option>
                <option value="Liberia" id="LR">Liberia</option>
                <option value="Libia" id="LY">Libia</option>
                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                <option value="Lituania" id="LT">Lituania</option>
                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                <option value="Madagascar" id="MG">Madagascar</option>
                <option value="Malasia" id="MY">Malasia</option>
                <option value="Malawi" id="MW">Malawi</option>
                <option value="Maldivas" id="MV">Maldivas</option>
                <option value="Malí" id="ML">Malí</option>
                <option value="Malta" id="MT">Malta</option>
                <option value="Marruecos" id="MA">Marruecos</option>
                <option value="Martinica" id="MQ">Martinica</option>
                <option value="Mauricio" id="MU">Mauricio</option>
                <option value="Mauritania" id="MR">Mauritania</option>
                <option value="Mayotte" id="YT">Mayotte</option>
                <option value="México" id="MX">México</option>
                <option value="Micronesia" id="FM">Micronesia</option>
                <option value="Moldavia" id="MD">Moldavia</option>
                <option value="Mónaco" id="MC">Mónaco</option>
                <option value="Mongolia" id="MN">Mongolia</option>
                <option value="Montserrat" id="MS">Montserrat</option>
                <option value="Mozambique" id="MZ">Mozambique</option>
                <option value="Namibia" id="NA">Namibia</option>
                <option value="Nauru" id="NR">Nauru</option>
                <option value="Nepal" id="NP">Nepal</option>
                <option value="Nicaragua" id="NI">Nicaragua</option>
                <option value="Níger" id="NE">Níger</option>
                <option value="Nigeria" id="NG">Nigeria</option>
                <option value="Niue" id="NU">Niue</option>
                <option value="Norfolk" id="NF">Norfolk</option>
                <option value="Noruega" id="NO">Noruega</option>
                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                <option value="Omán" id="OM">Omán</option>
                <option value="Panamá" id="PA">Panamá</option>
                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                <option value="Paquistán" id="PK">Paquistán</option>
                <option value="Paraguay" id="PY">Paraguay</option>
                <option value="Perú" id="PE" selected>Perú</option>
                <option value="Pitcairn" id="PN">Pitcairn</option>
                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                <option value="Polonia" id="PL">Polonia</option>
                <option value="Portugal" id="PT">Portugal</option>
                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                <option value="Qatar" id="QA">Qatar</option>
                <option value="Reino Unido" id="UK">Reino Unido</option>
                <option value="República Centroafricana" id="CF">República Centroafricana</option>
                <option value="República Checa" id="CZ">República Checa</option>
                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                <option value="República Dominicana" id="DO">República Dominicana</option>
                <option value="Reunión" id="RE">Reunión</option>
                <option value="Ruanda" id="RW">Ruanda</option>
                <option value="Rumania" id="RO">Rumania</option>
                <option value="Rusia" id="RU">Rusia</option>
                <option value="Samoa" id="WS">Samoa</option>
                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                <option value="San Marino" id="SM">San Marino</option>
                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                <option value="Santa Helena" id="SH">Santa Helena</option>
                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                <option value="Senegal" id="SN">Senegal</option>
                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                <option value="Sychelles" id="SC">Seychelles</option>
                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                <option value="Singapur" id="SG">Singapur</option>
                <option value="Siria" id="SY">Siria</option>
                <option value="Somalia" id="SO">Somalia</option>
                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                <option value="Suazilandia" id="SZ">Suazilandia</option>
                <option value="Sudán" id="SD">Sudán</option>
                <option value="Suecia" id="SE">Suecia</option>
                <option value="Suiza" id="CH">Suiza</option>
                <option value="Surinam" id="SR">Surinam</option>
                <option value="Svalbard" id="SJ">Svalbard</option>
                <option value="Tailandia" id="TH">Tailandia</option>
                <option value="Taiwán" id="TW">Taiwán</option>
                <option value="Tanzania" id="TZ">Tanzania</option>
                <option value="Tayikistán" id="TJ">Tayikistán</option>
                <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                <option value="Togo" id="TG">Togo</option>
                <option value="Tonga" id="TO">Tonga</option>
                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                <option value="Túnez" id="TN">Túnez</option>
                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                <option value="Turquía" id="TR">Turquía</option>
                <option value="Tuvalu" id="TV">Tuvalu</option>
                <option value="Ucrania" id="UA">Ucrania</option>
                <option value="Uganda" id="UG">Uganda</option>
                <option value="Uruguay" id="UY">Uruguay</option>
                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                <option value="Vanuatu" id="VU">Vanuatu</option>
                <option value="Venezuela" id="VE">Venezuela</option>
                <option value="Vietnam" id="VN">Vietnam</option>
                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                <option value="Yemen" id="YE">Yemen</option>
                <option value="Zambia" id="ZM">Zambia</option>
                <option value="Zimbabue" id="ZW">Zimbabue</option>
    </select>
    
    <div id="error_pais" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su País</div>
    
    </td>
    <td width="10"></td>
	<td align="left" width="26" valign="top"><img src="images/alerta_pago.jpg" class="alerta_6" style="display:none;"></td>
</tr>
</table>
</div>



<div class="left_crear_cuenta">
	
	<table cellpadding="0" cellspacing="0" width="80%" align="center">
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center">
    	<div class="boton_crear_cuenta fuente_georgia font_size12"><a href="cuenta.php"  style="text-decoration:none;color:#FFF; cursor:pointer">CANCELAR</a></div>
    </td>
    </tr>
    </table>
  
</div>

<div class="right_crear_cuenta">
	<table cellpadding="0" cellspacing="0" width="80%" align="center">
    <tr><td height="20"></td></tr>
    <tr>
    <td align="center"><input type="submit" onclick="return validandos()" style="cursor:pointer"  class="boton_crear_cuenta fuente_georgia font_size12" value="ENVIAR"></td>
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





</body>    
</html>
