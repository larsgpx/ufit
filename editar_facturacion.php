<?php 
//include("inc.aplication_top.php");
session_start();

require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();


$result2=$db_Full->select_sql("SELECT * from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2=mysqli_fetch_assoc($result2);
$pais_facturacion_cli = $data2['pais_facturacion_cli'];
$nombre_facturacion_cli = $data2['nombre_facturacion_cli'];
$apellido_facturacion_cli = $data2['apellido_facturacion_cli'];
$dir1_facturacion_cli = $data2['dir1_facturacion_cli'];
$dir2_facturacion_cli = $data2['dir2_facturacion_cli'];
$provincia_facturacion_cli = $data2['provincia_facturacion_cli'];
$postal_facturacion_cli = $data2['postal_facturacion_cli'];
$tel_facturacion_cli = $data2['tel_facturacion_cli'];

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
	
	  
		
});
			  
</script>


<script>
	
	
	function validando_facturacion()
	{
		var pais = document.cuenta.elements['pais'];
		var nombre = document.cuenta.elements['nombre'];
		var apellidos = document.cuenta.elements['apellidos'];
		var direccion_1 = document.cuenta.elements['direccion_1'];
		var provincia = document.cuenta.elements['provincia'];
		var codigo = document.cuenta.elements['codigo'];
		var telefono = document.cuenta.elements['telefono'];
		
		
		if(pais.value == "")
		{
			$("#pais").css("border-bottom-color", "#900");
			$("#pais").css("border-top-color", "#900");
			$("#pais").css("border-left-color", "#900");
			$("#pais").css("border-right-color", "#900");
			$("#error_pais").css("display", "block");
			return false;
		}else
		{
			$("#pais").css("border-bottom-color", "#000");
			$("#pais").css("border-top-color", "#000");
			$("#pais").css("border-left-color", "#000");
			$("#pais").css("border-right-color", "#000");
			$("#error_pais").css("display", "none");
		}
		
		
		if(nombre.value == "")
		{
			$("#nombre").css("border-bottom-color", "#900");
			$("#nombre").css("border-top-color", "#900");
			$("#nombre").css("border-left-color", "#900");
			$("#nombre").css("border-right-color", "#900");
			$("#error_nombre").css("display", "block");
			return false;
		}else
		{
			$("#nombre").css("border-bottom-color", "#000");
			$("#nombre").css("border-top-color", "#000");
			$("#nombre").css("border-left-color", "#000");
			$("#nombre").css("border-right-color", "#000");
			$("#error_nombre").css("display", "none");
		}
		
		
		if(apellidos.value == "")
		{
			$("#apellidos").css("border-bottom-color", "#900");
			$("#apellidos").css("border-top-color", "#900");
			$("#apellidos").css("border-left-color", "#900");
			$("#apellidos").css("border-right-color", "#900");
			$("#error_apellido").css("display", "block");
			return false;
		}else
		{
			$("#apellidos").css("border-bottom-color", "#000");
			$("#apellidos").css("border-top-color", "#000");
			$("#apellidos").css("border-left-color", "#000");
			$("#apellidos").css("border-right-color", "#000");
			$("#error_apellido").css("display", "none");
		}
		
		if(direccion_1.value == "")
		{
			$("#direccion_1").css("border-bottom-color", "#900");
			$("#direccion_1").css("border-top-color", "#900");
			$("#direccion_1").css("border-left-color", "#900");
			$("#direccion_1").css("border-right-color", "#900");
			$("#error_direccion_1").css("display", "block");
			return false;
		}else
		{
			$("#direccion_1").css("border-bottom-color", "#000");
			$("#direccion_1").css("border-top-color", "#000");
			$("#direccion_1").css("border-left-color", "#000");
			$("#direccion_1").css("border-right-color", "#000");
			$("#error_direccion_1").css("display", "none");
		}
		
		
		
		if(provincia.value == "")
		{
			$("#provincia").css("border-bottom-color", "#900");
			$("#provincia").css("border-top-color", "#900");
			$("#provincia").css("border-left-color", "#900");
			$("#provincia").css("border-right-color", "#900");
			$("#error_provincia").css("display", "block");
			return false;
		}else
		{
			$("#provincia").css("border-bottom-color", "#000");
			$("#provincia").css("border-top-color", "#000");
			$("#provincia").css("border-left-color", "#000");
			$("#provincia").css("border-right-color", "#000");
			$("#error_provincia").css("display", "none");
		}
		
		
		if(codigo.value == "")
		{
			$("#codigo").css("border-bottom-color", "#900");
			$("#codigo").css("border-top-color", "#900");
			$("#codigo").css("border-left-color", "#900");
			$("#codigo").css("border-right-color", "#900");
			$("#error_codigo").css("display", "block");
			return false;
		}else
		{
			$("#codigo").css("border-bottom-color", "#000");
			$("#codigo").css("border-top-color", "#000");
			$("#codigo").css("border-left-color", "#000");
			$("#codigo").css("border-right-color", "#000");
			$("#error_codigo").css("display", "none");
		}
		
		
		
		if(telefono.value == "")
		{
			$("#telefono").css("border-bottom-color", "#900");
			$("#telefono").css("border-top-color", "#900");
			$("#telefono").css("border-left-color", "#900");
			$("#telefono").css("border-right-color", "#900");
			$("#error_telefono").css("display", "block");
			return false;
		}else
		{
			$("#telefono").css("border-bottom-color", "#000");
			$("#telefono").css("border-top-color", "#000");
			$("#telefono").css("border-left-color", "#000");
			$("#telefono").css("border-right-color", "#000");
			$("#error_telefono").css("display", "none");
		}
		
		
		
		  $.ajax({
				  type: "POST",
				  url: "actualizar_facturacion.php",
				  data : "pais="+$('#pais').val()+"&nombre="+$('#nombre').val()+"&apellidos="+$('#apellidos').val()+"&direccion_1="+$('#direccion_1').val()+"&direccion_2="+$('#direccion_2').val()+"&provincia="+$('#provincia').val()+"&codigo="+$('#codigo').val()+"&telefono="+$('#telefono').val(),	 
				  success: function(data)
				  {
					   $.fancybox("#gracias");
					  setTimeout("location.href='detalle_cuenta.php'", 2000);
					
					
				  }
			});
			
		
		return false;
	}
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
<form action="" name="cuenta" method="post" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">DATOS DE FACTURACIÓN</td>
</tr>
</table>

<div class="center_editar_cuenta">
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr><td height="40"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">País</td>
<td class="fuente_georgia font_size13">
	  <select type="text" name="pais" id="pais"  style="width:100%;background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
    	<option value="" <?php if($pais_facturacion_cli==""){ echo "selected"; } ?>>Seleccione</option>
                <option value="Afganistán" <?php if($pais_facturacion_cli=="Afganistán"){ echo "selected"; } ?> id="AF">Afganistán</option>
                <option value="Albania" <?php if($pais_facturacion_cli=="Albania"){ echo "selected"; } ?> id="AL">Albania</option>
                <option value="Alemania" <?php if($pais_facturacion_cli=="Alemania"){ echo "selected"; } ?> id="DE">Alemania</option>
                <option value="Andorra" <?php if($pais_facturacion_cli=="Andorra"){ echo "selected"; } ?> id="AD">Andorra</option>
                <option value="Angola" <?php if($pais_facturacion_cli=="Angola"){ echo "selected"; } ?> id="AO">Angola</option>
                <option value="Anguila" <?php if($pais_facturacion_cli=="Anguila"){ echo "selected"; } ?> id="AI">Anguila</option>
                <option value="Antártida" <?php if($pais_facturacion_cli=="Antártida"){ echo "selected"; } ?> id="AQ">Antártida</option>
                <option value="Antigua y Barbuda" <?php if($pais_facturacion_cli=="Antigua y Barbuda"){ echo "selected"; } ?> id="AG">Antigua y Barbuda</option>
                <option value="Antillas holandesas" <?php if($pais_facturacion_cli=="Antillas holandesas"){ echo "selected"; } ?>  id="AN">Antillas holandesas</option>
                <option value="Arabia Saudí" <?php if($pais_facturacion_cli=="Arabia Saudí"){ echo "selected"; } ?> id="SA">Arabia Saudí</option>
                <option value="Argelia" <?php if($pais_facturacion_cli=="Argelia"){ echo "selected"; } ?> id="DZ">Argelia</option>
                <option value="Argentina" <?php if($pais_facturacion_cli=="Argentina"){ echo "selected"; } ?> id="AR">Argentina</option>
                <option value="Armenia" <?php if($pais_facturacion_cli=="Armenia"){ echo "selected"; } ?> id="AM">Armenia</option>
                <option value="Aruba" <?php if($pais_facturacion_cli=="Aruba"){ echo "selected"; } ?> id="AW">Aruba</option>
                <option value="Australia" <?php if($pais_facturacion_cli=="Australia"){ echo "selected"; } ?> id="AU">Australia</option>
                <option value="Austria" <?php if($pais_facturacion_cli=="Austria"){ echo "selected"; } ?> id="AT">Austria</option>
                <option value="Azerbaiyán" <?php if($pais_facturacion_cli=="Azerbaiyán"){ echo "selected"; } ?> id="AZ">Azerbaiyán</option>
                <option value="Bahamas" <?php if($pais_facturacion_cli=="Bahamas"){ echo "selected"; } ?> id="BS">Bahamas</option>
                <option value="Bahrein" <?php if($pais_facturacion_cli=="Bahrein"){ echo "selected"; } ?> id="BH">Bahrein</option>
                <option value="Bangladesh" <?php if($pais_facturacion_cli=="Bangladesh"){ echo "selected"; } ?> id="BD">Bangladesh</option>
                <option value="Barbados" <?php if($pais_facturacion_cli=="Barbados"){ echo "selected"; } ?> id="BB">Barbados</option>
                <option value="Bélgica" <?php if($pais_facturacion_cli=="Bélgica"){ echo "selected"; } ?> id="BE">Bélgica</option>
                <option value="Belice" <?php if($pais_facturacion_cli=="Belice"){ echo "selected"; } ?> id="BZ">Belice</option>
                <option value="Benín" <?php if($pais_facturacion_cli=="Benín"){ echo "selected"; } ?> id="BJ">Benín</option>
                <option value="Bermudas" <?php if($pais_facturacion_cli=="Bermudas"){ echo "selected"; } ?> id="BM">Bermudas</option>
                <option value="Bhután" <?php if($pais_facturacion_cli=="Bhután"){ echo "selected"; } ?> id="BT">Bhután</option>
                <option value="Bielorrusia" <?php if($pais_facturacion_cli=="Bielorrusia"){ echo "selected"; } ?> id="BY">Bielorrusia</option>
                <option value="Birmania" <?php if($pais_facturacion_cli=="Birmania"){ echo "selected"; } ?> id="MM">Birmania</option>
                <option value="Bolivia" <?php if($pais_facturacion_cli=="Bolivia"){ echo "selected"; } ?> id="BO">Bolivia</option>
                <option value="Bosnia y Herzegovina" <?php if($pais_facturacion_cli=="Bosnia y Herzegovina"){ echo "selected"; } ?> id="BA">Bosnia y Herzegovina</option>
                <option value="Botsuana" <?php if($pais_facturacion_cli=="Botsuana"){ echo "selected"; } ?> id="BW">Botsuana</option>
                <option value="Brasil" <?php if($pais_facturacion_cli=="Brasil"){ echo "selected"; } ?> id="BR">Brasil</option>
                <option value="Brunei" <?php if($pais_facturacion_cli=="Brunei"){ echo "selected"; } ?> id="BN">Brunei</option>
                <option value="Bulgaria" <?php if($pais_facturacion_cli=="Bulgaria"){ echo "selected"; } ?> id="BG">Bulgaria</option>
                <option value="Burkina Faso" <?php if($pais_facturacion_cli=="Burkina Faso"){ echo "selected"; } ?> id="BF">Burkina Faso</option>
                <option value="Burundi" <?php if($pais_facturacion_cli=="Burundi"){ echo "selected"; } ?> id="BI">Burundi</option>
                <option value="Cabo Verde" <?php if($pais_facturacion_cli=="Cabo Verde"){ echo "selected"; } ?> id="CV">Cabo Verde</option>
                <option value="Camboya" <?php if($pais_facturacion_cli=="Camboya"){ echo "selected"; } ?> id="KH">Camboya</option>
                <option value="Camerún" <?php if($pais_facturacion_cli=="Camerún"){ echo "selected"; } ?> id="CM">Camerún</option>
                <option value="Canadá" <?php if($pais_facturacion_cli=="Canadá"){ echo "selected"; } ?> id="CA">Canadá</option>
                <option value="Chad" <?php if($pais_facturacion_cli=="Chad"){ echo "selected"; } ?> id="TD">Chad</option>
                <option value="Chile" <?php if($pais_facturacion_cli=="Chile"){ echo "selected"; } ?> id="CL">Chile</option>
                <option value="China" <?php if($pais_facturacion_cli=="China"){ echo "selected"; } ?> id="CN">China</option>
                <option value="Chipre" <?php if($pais_facturacion_cli=="Chipre"){ echo "selected"; } ?> id="CY">Chipre</option>
                <option value="Ciudad estado del Vaticano" <?php if($pais_facturacion_cli=="Ciudad estado del Vaticano"){ echo "selected"; } ?> id="VA">Ciudad estado del Vaticano</option>
                <option value="Colombia" <?php if($pais_facturacion_cli=="Colombia"){ echo "selected"; } ?> id="CO">Colombia</option>
                <option value="Comores" <?php if($pais_facturacion_cli=="Comores"){ echo "selected"; } ?> id="KM">Comores</option>
                <option value="Congo" <?php if($pais_facturacion_cli=="Congo"){ echo "selected"; } ?> id="CG">Congo</option>
                <option value="Corea" <?php if($pais_facturacion_cli=="Corea"){ echo "selected"; } ?> id="KR">Corea</option>
                <option value="Corea del Norte" <?php if($pais_facturacion_cli=="Corea del Norte"){ echo "selected"; } ?> id="KP">Corea del Norte</option>
                <option value="Costa del Marfíl" <?php if($pais_facturacion_cli=="Costa del Marfíl"){ echo "selected"; } ?> id="CI">Costa del Marfíl</option>
                <option value="Costa Rica" <?php if($pais_facturacion_cli=="Costa Rica"){ echo "selected"; } ?> id="CR">Costa Rica</option>
                <option value="Croacia" <?php if($pais_facturacion_cli=="Croacia"){ echo "selected"; } ?> id="HR">Croacia</option>
                <option value="Cuba"<?php if($pais_facturacion_cli=="Cuba"){ echo "selected"; } ?>  id="CU">Cuba</option>
                <option value="Dinamarca" <?php if($pais_facturacion_cli=="Dinamarca"){ echo "selected"; } ?> id="DK">Dinamarca</option>
                <option value="Djibouri" <?php if($pais_facturacion_cli=="Djibouri"){ echo "selected"; } ?> id="DJ">Djibouri</option>
                <option value="Dominica" <?php if($pais_facturacion_cli=="Dominica"){ echo "selected"; } ?> id="DM">Dominica</option>
                <option value="Ecuador" <?php if($pais_facturacion_cli=="Ecuador"){ echo "selected"; } ?> id="EC">Ecuador</option>
                <option value="Egipto" <?php if($pais_facturacion_cli=="Egipto"){ echo "selected"; } ?> id="EG">Egipto</option>
                <option value="El Salvador" <?php if($pais_facturacion_cli=="El Salvador"){ echo "selected"; } ?> id="SV">El Salvador</option>
                <option value="Emiratos Arabes Unidos" <?php if($pais_facturacion_cli=="Emiratos Arabes Unidos"){ echo "selected"; } ?> id="AE">Emiratos Arabes Unidos</option>
                <option value="Eritrea" <?php if($pais_facturacion_cli=="Eritrea"){ echo "selected"; } ?> id="ER">Eritrea</option>
                <option value="Eslovaquia" <?php if($pais_facturacion_cli=="Eslovaquia"){ echo "selected"; } ?> id="SK">Eslovaquia</option>
                <option value="Eslovenia" <?php if($pais_facturacion_cli=="Eslovenia"){ echo "selected"; } ?> id="SI">Eslovenia</option>
                <option value="España" <?php if($pais_facturacion_cli=="España"){ echo "selected"; } ?> id="ES">España</option>
                <option value="Estados Unidos" <?php if($pais_facturacion_cli=="Estados Unidos"){ echo "selected"; } ?> id="US">Estados Unidos</option>
                <option value="Estonia" <?php if($pais_facturacion_cli=="Estonia"){ echo "selected"; } ?> id="EE">Estonia</option>
                <option value="Etiopía" <?php if($pais_facturacion_cli=="Etiopía"){ echo "selected"; } ?> id="ET">Etiopía</option>
                <option value="Ex-República Yugoslava de Macedonia" <?php if($pais_facturacion_cli=="Ex-República Yugoslava de Macedonia"){ echo "selected"; } ?> id="MK">Ex-República Yugoslava de Macedonia</option>
                <option value="Filipinas" <?php if($pais_facturacion_cli=="Filipinas"){ echo "selected"; } ?> id="PH">Filipinas</option>
                <option value="Finlandia" <?php if($pais_facturacion_cli=="Finlandia"){ echo "selected"; } ?> id="FI">Finlandia</option>
                <option value="Francia" <?php if($pais_facturacion_cli=="Francia"){ echo "selected"; } ?> id="FR">Francia</option>
                <option value="Gabón" <?php if($pais_facturacion_cli=="Gabón"){ echo "selected"; } ?> id="GA">Gabón</option>
                <option value="Gambia" <?php if($pais_facturacion_cli=="Gambia"){ echo "selected"; } ?> id="GM">Gambia</option>
                <option value="Georgia" <?php if($pais_facturacion_cli=="Georgia"){ echo "selected"; } ?> id="GE">Georgia</option>
                <option value="Georgia del Sur y las islas Sandwich del Sur" <?php if($pais_facturacion_cli=="Georgia del Sur y las islas Sandwich del Sur"){ echo "selected"; } ?>id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                <option value="Ghana" <?php if($pais_facturacion_cli=="Ghana"){ echo "selected"; } ?> id="GH">Ghana</option>
                <option value="Gibraltar" <?php if($pais_facturacion_cli=="Gibraltar"){ echo "selected"; } ?> id="GI">Gibraltar</option>
                <option value="Granada" <?php if($pais_facturacion_cli=="Granada"){ echo "selected"; } ?> id="GD">Granada</option>
                <option value="Grecia" <?php if($pais_facturacion_cli=="Grecia"){ echo "selected"; } ?> id="GR">Grecia</option>
                <option value="Groenlandia" <?php if($pais_facturacion_cli=="Groenlandia"){ echo "selected"; } ?> id="GL">Groenlandia</option>
                <option value="Guadalupe" <?php if($pais_facturacion_cli=="Guadalupe"){ echo "selected"; } ?> id="GP">Guadalupe</option>
                <option value="Guam" <?php if($pais_facturacion_cli=="Guam"){ echo "selected"; } ?> id="GU">Guam</option>
                <option value="Guatemala" <?php if($pais_facturacion_cli=="Guatemala"){ echo "selected"; } ?> id="GT">Guatemala</option>
                <option value="Guayana" <?php if($pais_facturacion_cli=="Guayana"){ echo "selected"; } ?> id="GY">Guayana</option>
                <option value="Guayana francesa" <?php if($pais_facturacion_cli=="Guayana francesa"){ echo "selected"; } ?> id="GF">Guayana francesa</option>
                <option value="Guinea" <?php if($pais_facturacion_cli=="Guinea"){ echo "selected"; } ?> id="GN">Guinea</option>
                <option value="Guinea Ecuatorial" <?php if($pais_facturacion_cli=="Guinea Ecuatorial"){ echo "selected"; } ?> id="GQ">Guinea Ecuatorial</option>
                <option value="Guinea-Bissau" <?php if($pais_facturacion_cli=="Guinea-Bissau"){ echo "selected"; } ?> id="GW">Guinea-Bissau</option>
                <option value="Haití" <?php if($pais_facturacion_cli=="Haití"){ echo "selected"; } ?> id="HT">Haití</option>
                <option value="Holanda" <?php if($pais_facturacion_cli=="Holanda"){ echo "selected"; } ?> id="NL">Holanda</option>
                <option value="Honduras" <?php if($pais_facturacion_cli=="Honduras"){ echo "selected"; } ?> id="HN">Honduras</option>
                <option value="Hong Kong R. A. E" <?php if($pais_facturacion_cli=="Hong Kong R. A. E"){ echo "selected"; } ?> id="HK">Hong Kong R. A. E</option>
                <option value="Hungría" <?php if($pais_facturacion_cli=="Hungría"){ echo "selected"; } ?> id="HU">Hungría</option>
                <option value="India" <?php if($pais_facturacion_cli=="India"){ echo "selected"; } ?> id="IN">India</option>
                <option value="Indonesia" <?php if($pais_facturacion_cli=="Indonesia"){ echo "selected"; } ?> id="ID">Indonesia</option>
                <option value="Irak" <?php if($pais_facturacion_cli=="Irak"){ echo "selected"; } ?> id="IQ">Irak</option>
                <option value="Irán" <?php if($pais_facturacion_cli=="Irán"){ echo "selected"; } ?> id="IR">Irán</option>
                <option value="Irlanda" <?php if($pais_facturacion_cli=="Irlanda"){ echo "selected"; } ?> id="IE">Irlanda</option>
                <option value="Isla Bouvet" <?php if($pais_facturacion_cli=="Isla Bouvet"){ echo "selected"; } ?> id="BV">Isla Bouvet</option>
                <option value="Isla Christmas" <?php if($pais_facturacion_cli=="Isla Christmas"){ echo "selected"; } ?> id="CX">Isla Christmas</option>
                <option value="Isla Heard e Islas McDonald" <?php if($pais_facturacion_cli=="Isla Heard e Islas McDonald"){ echo "selected"; } ?> id="HM">Isla Heard e Islas McDonald</option>
                <option value="Islandia" <?php if($pais_facturacion_cli=="Islandia"){ echo "selected"; } ?> id="IS">Islandia</option>
                <option value="Islas Caimán" <?php if($pais_facturacion_cli=="Islas Caimán"){ echo "selected"; } ?> id="KY">Islas Caimán</option>
                <option value="Islas Cook" <?php if($pais_facturacion_cli=="Islas Cook"){ echo "selected"; } ?> id="CK">Islas Cook</option>
                <option value="Islas de Cocos o Keeling" <?php if($pais_facturacion_cli=="Islas de Cocos o Keeling"){ echo "selected"; } ?> id="CC">Islas de Cocos o Keeling</option>
                <option value="Islas Faroe" <?php if($pais_facturacion_cli=="Islas Faroe"){ echo "selected"; } ?> id="FO">Islas Faroe</option>
                <option value="Islas Fiyi" <?php if($pais_facturacion_cli=="Islas Fiyi"){ echo "selected"; } ?> id="FJ">Islas Fiyi</option>
                <option value="Islas Malvinas Islas Falkland" <?php if($pais_facturacion_cli=="Islas Malvinas Islas Falkland"){ echo "selected"; } ?> id="FK">Islas Malvinas Islas Falkland</option>
                <option value="Islas Marianas del norte" <?php if($pais_facturacion_cli=="Islas Marianas del norte"){ echo "selected"; } ?> id="MP">Islas Marianas del norte</option>
                <option value="Islas Marshall" <?php if($pais_facturacion_cli=="Islas Marshall"){ echo "selected"; } ?> id="MH">Islas Marshall</option>
                <option value="Islas menores de Estados Unidos" <?php if($pais_facturacion_cli=="Islas menores de Estados Unidos"){ echo "selected"; } ?> id="UM">Islas menores de Estados Unidos</option>
                <option value="Islas Palau" <?php if($pais_facturacion_cli=="Islas Palau"){ echo "selected"; } ?> id="PW">Islas Palau</option>
                <option value="Islas Salomón" <?php if($pais_facturacion_cli=="Islas Salomón"){ echo "selected"; } ?> id="SB">Islas Salomón</option>
                <option value="Islas Tokelau" <?php if($pais_facturacion_cli=="Islas Tokelau"){ echo "selected"; } ?> id="TK">Islas Tokelau</option>
                <option value="Islas Turks y Caicos" <?php if($pais_facturacion_cli=="Islas Turks y Caicos"){ echo "selected"; } ?> id="TC">Islas Turks y Caicos</option>
                <option value="Islas Vírgenes EE.UU." <?php if($pais_facturacion_cli=="Islas Vírgenes EE.UU."){ echo "selected"; } ?> id="VI">Islas Vírgenes EE.UU.</option>
                <option value="Islas Vírgenes Reino Unido" <?php if($pais_facturacion_cli=="Islas Vírgenes Reino Unido"){ echo "selected"; } ?> id="VG">Islas Vírgenes Reino Unido</option>
                <option value="Israel" <?php if($pais_facturacion_cli=="Israel"){ echo "selected"; } ?> id="IL">Israel</option>
                <option value="Italia" <?php if($pais_facturacion_cli=="Italia"){ echo "selected"; } ?> id="IT">Italia</option>
                <option value="Jamaica" <?php if($pais_facturacion_cli=="Jamaica"){ echo "selected"; } ?> id="JM">Jamaica</option>
                <option value="Japón" <?php if($pais_facturacion_cli=="Japón"){ echo "selected"; } ?> id="JP">Japón</option>
                <option value="Jordania" <?php if($pais_facturacion_cli=="Jordania"){ echo "selected"; } ?> id="JO">Jordania</option>
                <option value="Kazajistán" <?php if($pais_facturacion_cli=="Kazajistán"){ echo "selected"; } ?> id="KZ">Kazajistán</option>
                <option value="Kenia" <?php if($pais_facturacion_cli=="Kenia"){ echo "selected"; } ?> id="KE">Kenia</option>
                <option value="Kirguizistán" <?php if($pais_facturacion_cli=="Kirguizistán"){ echo "selected"; } ?> id="KG">Kirguizistán</option>
                <option value="Kiribati" <?php if($pais_facturacion_cli=="Kiribati"){ echo "selected"; } ?> id="KI">Kiribati</option>
                <option value="Kuwait" <?php if($pais_facturacion_cli=="Kuwait"){ echo "selected"; } ?> id="KW">Kuwait</option>
                <option value="Laos" <?php if($pais_facturacion_cli=="Laos"){ echo "selected"; } ?> id="LA">Laos</option>
                <option value="Lesoto" <?php if($pais_facturacion_cli=="Lesoto"){ echo "selected"; } ?> id="LS">Lesoto</option>
                <option value="Letonia" <?php if($pais_facturacion_cli=="Letonia"){ echo "selected"; } ?> id="LV">Letonia</option>
                <option value="Líbano" <?php if($pais_facturacion_cli=="Líbano"){ echo "selected"; } ?> id="LB">Líbano</option>
                <option value="Liberia" <?php if($pais_facturacion_cli=="Liberia"){ echo "selected"; } ?> id="LR">Liberia</option>
                <option value="Libia" <?php if($pais_facturacion_cli=="Libia"){ echo "selected"; } ?> id="LY">Libia</option>
                <option value="Liechtenstein" <?php if($pais_facturacion_cli=="Liechtenstein"){ echo "selected"; } ?> id="LI">Liechtenstein</option>
                <option value="Lituania" <?php if($pais_facturacion_cli=="Lituania"){ echo "selected"; } ?> id="LT">Lituania</option>
                <option value="Luxemburgo" <?php if($pais_facturacion_cli=="Luxemburgo"){ echo "selected"; } ?> id="LU">Luxemburgo</option>
                <option value="Macao R. A. E" <?php if($pais_facturacion_cli=="Macao R. A. E"){ echo "selected"; } ?> id="MO">Macao R. A. E</option>
                <option value="Madagascar" <?php if($pais_facturacion_cli=="Madagascar"){ echo "selected"; } ?> id="MG">Madagascar</option>
                <option value="Malasia" <?php if($pais_facturacion_cli=="Malasia"){ echo "selected"; } ?> id="MY">Malasia</option>
                <option value="Malawi" <?php if($pais_facturacion_cli=="Malawi"){ echo "selected"; } ?> id="MW">Malawi</option>
                <option value="Maldivas" <?php if($pais_facturacion_cli=="Maldivas"){ echo "selected"; } ?> id="MV">Maldivas</option>
                <option value="Malí" <?php if($pais_facturacion_cli=="Malí"){ echo "selected"; } ?> id="ML">Malí</option>
                <option value="Malta" <?php if($pais_facturacion_cli=="Malta"){ echo "selected"; } ?> id="MT">Malta</option>
                <option value="Marruecos" <?php if($pais_facturacion_cli=="Marruecos"){ echo "selected"; } ?> id="MA">Marruecos</option>
                <option value="Martinica" <?php if($pais_facturacion_cli=="Martinica"){ echo "selected"; } ?> id="MQ">Martinica</option>
                <option value="Mauricio" <?php if($pais_facturacion_cli=="Mauricio"){ echo "selected"; } ?> id="MU">Mauricio</option>
                <option value="Mauritania" <?php if($pais_facturacion_cli=="Mauritania"){ echo "selected"; } ?> id="MR">Mauritania</option>
                <option value="Mayotte" <?php if($pais_facturacion_cli=="Mayotte"){ echo "selected"; } ?> id="YT">Mayotte</option>
                <option value="México" <?php if($pais_facturacion_cli=="México"){ echo "selected"; } ?> id="MX">México</option>
                <option value="Micronesia" <?php if($pais_facturacion_cli=="Micronesia"){ echo "selected"; } ?> id="FM">Micronesia</option>
                <option value="Moldavia" <?php if($pais_facturacion_cli=="Argentina"){ echo "selected"; } ?> id="MD">Moldavia</option>
                <option value="Mónaco" <?php if($pais_facturacion_cli=="Mónaco"){ echo "selected"; } ?> id="MC">Mónaco</option>
                <option value="Mongolia" <?php if($pais_facturacion_cli=="Mongolia"){ echo "selected"; } ?> id="MN">Mongolia</option>
                <option value="Montserrat" <?php if($pais_facturacion_cli=="Montserrat"){ echo "selected"; } ?> id="MS">Montserrat</option>
                <option value="Mozambique" <?php if($pais_facturacion_cli=="Mozambique"){ echo "selected"; } ?> id="MZ">Mozambique</option>
                <option value="Namibia" <?php if($pais_facturacion_cli=="Namibia"){ echo "selected"; } ?> id="NA">Namibia</option>
                <option value="Nauru" <?php if($pais_facturacion_cli=="Nauru"){ echo "selected"; } ?> id="NR">Nauru</option>
                <option value="Nepal" <?php if($pais_facturacion_cli=="Nepal"){ echo "selected"; } ?> id="NP">Nepal</option>
                <option value="Nicaragua" <?php if($pais_facturacion_cli=="Nicaragua"){ echo "selected"; } ?> id="NI">Nicaragua</option>
                <option value="Níger" <?php if($pais_facturacion_cli=="Níger"){ echo "selected"; } ?> id="NE">Níger</option>
                <option value="Nigeria" <?php if($pais_facturacion_cli=="Nigeria"){ echo "selected"; } ?> id="NG">Nigeria</option>
                <option value="Niue" <?php if($pais_facturacion_cli=="Niue"){ echo "selected"; } ?> id="NU">Niue</option>
                <option value="Norfolk" <?php if($pais_facturacion_cli=="Norfolk"){ echo "selected"; } ?> id="NF">Norfolk</option>
                <option value="Noruega" <?php if($pais_facturacion_cli=="Noruega"){ echo "selected"; } ?> id="NO">Noruega</option>
                <option value="Nueva Caledonia" <?php if($pais_facturacion_cli=="Nueva Caledonia"){ echo "selected"; } ?> id="NC">Nueva Caledonia</option>
                <option value="Nueva Zelanda" <?php if($pais_facturacion_cli=="Nueva Zelanda"){ echo "selected"; } ?> id="NZ">Nueva Zelanda</option>
                <option value="Omán" <?php if($pais_facturacion_cli=="Omán"){ echo "selected"; } ?> id="OM">Omán</option>
                <option value="Panamá" <?php if($pais_facturacion_cli=="Panamá"){ echo "selected"; } ?> id="PA">Panamá</option>
                <option value="Papua Nueva Guinea" <?php if($pais_facturacion_cli=="Papua Nueva Guinea"){ echo "selected"; } ?> id="PG">Papua Nueva Guinea</option>
                <option value="Paquistán" <?php if($pais_facturacion_cli=="Paquistán"){ echo "selected"; } ?> id="PK">Paquistán</option>
                <option value="Paraguay" <?php if($pais_facturacion_cli=="Paraguay"){ echo "selected"; } ?> id="PY">Paraguay</option>
                <option value="Perú" <?php if($pais_facturacion_cli=="Perú"){ echo "selected"; } ?> id="PE">Perú</option>
                <option value="Pitcairn" <?php if($pais_facturacion_cli=="Pitcairn"){ echo "selected"; } ?> id="PN">Pitcairn</option>
                <option value="Polinesia francesa" <?php if($pais_facturacion_cli=="Polinesia francesa"){ echo "selected"; } ?> id="PF">Polinesia francesa</option>
                <option value="Polonia" <?php if($pais_facturacion_cli=="Polonia"){ echo "selected"; } ?> id="PL">Polonia</option>
                <option value="Portugal" <?php if($pais_facturacion_cli=="Portugal"){ echo "selected"; } ?> id="PT">Portugal</option>
                <option value="Puerto Rico" <?php if($pais_facturacion_cli=="Puerto Rico"){ echo "selected"; } ?> id="PR">Puerto Rico</option>
                <option value="Qatar" <?php if($pais_facturacion_cli=="Qatar"){ echo "selected"; } ?> id="QA">Qatar</option>
                <option value="Reino Unido" <?php if($pais_facturacion_cli=="Reino Unido"){ echo "selected"; } ?> id="UK">Reino Unido</option>
                <option value="República Centroafricana" <?php if($pais_facturacion_cli=="República Centroafricana"){ echo "selected"; } ?> id="CF">República Centroafricana</option>
                <option value="República Checa" <?php if($pais_facturacion_cli=="República Checa"){ echo "selected"; } ?> id="CZ">República Checa</option>
                <option value="República de Sudáfrica" <?php if($pais_facturacion_cli=="República de Sudáfrica"){ echo "selected"; } ?> id="ZA">República de Sudáfrica</option>
                <option value="República Democrática del Congo Zaire" <?php if($pais_facturacion_cli=="República Democrática del Congo Zaire"){ echo "selected"; } ?> id="CD">República Democrática del Congo Zaire</option>
                <option value="República Dominicana" <?php if($pais_facturacion_cli=="República Dominicana"){ echo "selected"; } ?> id="DO">República Dominicana</option>
                <option value="Reunión" <?php if($pais_facturacion_cli=="Reunión"){ echo "selected"; } ?> id="RE">Reunión</option>
                <option value="Ruanda" <?php if($pais_facturacion_cli=="Ruanda"){ echo "selected"; } ?>id="RW">Ruanda</option>
                <option value="Rumania" <?php if($pais_facturacion_cli=="Rumania"){ echo "selected"; } ?> id="RO">Rumania</option>
                <option value="Rusia" <?php if($pais_facturacion_cli=="Rusia"){ echo "selected"; } ?> id="RU">Rusia</option>
                <option value="Samoa" <?php if($pais_facturacion_cli=="Samoa"){ echo "selected"; } ?> id="WS">Samoa</option>
                <option value="Samoa occidental" <?php if($pais_facturacion_cli=="Samoa occidental"){ echo "selected"; } ?> id="AS">Samoa occidental</option>
                <option value="San Kitts y Nevis" <?php if($pais_facturacion_cli=="San Kitts y Nevis"){ echo "selected"; } ?> id="KN">San Kitts y Nevis</option>
                <option value="San Marino" <?php if($pais_facturacion_cli=="San Marino"){ echo "selected"; } ?> id="SM">San Marino</option>
                <option value="San Pierre y Miquelon" <?php if($pais_facturacion_cli=="San Pierre y Miquelon"){ echo "selected"; } ?> id="PM">San Pierre y Miquelon</option>
                <option value="San Vicente e Islas Granadinas" <?php if($pais_facturacion_cli=="San Vicente e Islas Granadinas"){ echo "selected"; } ?> id="VC">San Vicente e Islas Granadinas</option>
                <option value="Santa Helena" <?php if($pais_facturacion_cli=="Santa Helena"){ echo "selected"; } ?> id="SH">Santa Helena</option>
                <option value="Santa Lucía" <?php if($pais_facturacion_cli=="Santa Lucía"){ echo "selected"; } ?> id="LC">Santa Lucía</option>
                <option value="Santo Tomé y Príncipe" <?php if($pais_facturacion_cli=="Santo Tomé y Príncipe"){ echo "selected"; } ?> id="ST">Santo Tomé y Príncipe</option>
                <option value="Senegal" <?php if($pais_facturacion_cli=="Senegal"){ echo "selected"; } ?> id="SN">Senegal</option>
                <option value="Serbia y Montenegro" <?php if($pais_facturacion_cli=="Serbia y Montenegro"){ echo "selected"; } ?> id="YU">Serbia y Montenegro</option>
                <option value="Sychelles" <?php if($pais_facturacion_cli=="Sychelles"){ echo "selected"; } ?> id="SC">Seychelles</option>
                <option value="Sierra Leona" <?php if($pais_facturacion_cli=="Sierra Leona"){ echo "selected"; } ?> id="SL">Sierra Leona</option>
                <option value="Singapur" <?php if($pais_facturacion_cli=="Singapur"){ echo "selected"; } ?> id="SG">Singapur</option>
                <option value="Siria" <?php if($pais_facturacion_cli=="Siria"){ echo "selected"; } ?> id="SY">Siria</option>
                <option value="Somalia" <?php if($pais_facturacion_cli=="Somalia"){ echo "selected"; } ?> id="SO">Somalia</option>
                <option value="Sri Lanka" <?php if($pais_facturacion_cli=="Sri Lanka"){ echo "selected"; } ?> id="LK">Sri Lanka</option>
                <option value="Suazilandia" <?php if($pais_facturacion_cli=="Suazilandia"){ echo "selected"; } ?> id="SZ">Suazilandia</option>
                <option value="Sudán" <?php if($pais_facturacion_cli=="Sudán"){ echo "selected"; } ?> id="SD">Sudán</option>
                <option value="Suecia" <?php if($pais_facturacion_cli=="Suecia"){ echo "selected"; } ?> id="SE">Suecia</option>
                <option value="Suiza" <?php if($pais_facturacion_cli=="Suiza"){ echo "selected"; } ?> id="CH">Suiza</option>
                <option value="Surinam" <?php if($pais_facturacion_cli=="Surinam"){ echo "selected"; } ?> id="SR">Surinam</option>
                <option value="Svalbard" <?php if($pais_facturacion_cli=="Svalbard"){ echo "selected"; } ?> id="SJ">Svalbard</option>
                <option value="Tailandia" <?php if($pais_facturacion_cli=="Tailandia"){ echo "selected"; } ?> id="TH">Tailandia</option>
                <option value="Taiwán" <?php if($pais_facturacion_cli=="Taiwán"){ echo "selected"; } ?> id="TW">Taiwán</option>
                <option value="Tanzania" <?php if($pais_facturacion_cli=="Tanzania"){ echo "selected"; } ?> id="TZ">Tanzania</option>
                <option value="Tayikistán" <?php if($pais_facturacion_cli=="Tayikistán"){ echo "selected"; } ?> id="TJ">Tayikistán</option>
                <option value="Territorios británicos del océano Indico" <?php if($pais_facturacion_cli=="Territorios británicos del océano Indico"){ echo "selected"; } ?> id="IO">Territorios británicos del océano Indico</option>
                <option value="Territorios franceses del sur" <?php if($pais_facturacion_cli=="Territorios franceses del sur"){ echo "selected"; } ?> id="TF">Territorios franceses del sur</option>
                <option value="Timor Oriental" <?php if($pais_facturacion_cli=="Timor Oriental"){ echo "selected"; } ?> id="TP">Timor Oriental</option>
                <option value="Togo" <?php if($pais_facturacion_cli=="Togo"){ echo "selected"; } ?> id="TG">Togo</option>
                <option value="Tonga" <?php if($pais_facturacion_cli=="Tonga"){ echo "selected"; } ?> id="TO">Tonga</option>
                <option value="Trinidad y Tobago" <?php if($pais_facturacion_cli=="Trinidad y Tobago"){ echo "selected"; } ?> id="TT">Trinidad y Tobago</option>
                <option value="Túnez" <?php if($pais_facturacion_cli=="Túnez"){ echo "selected"; } ?> id="TN">Túnez</option>
                <option value="Turkmenistán" <?php if($pais_facturacion_cli=="Turkmenistán"){ echo "selected"; } ?> id="TM">Turkmenistán</option>
                <option value="Turquía" <?php if($pais_facturacion_cli=="Turquía"){ echo "selected"; } ?> id="TR">Turquía</option>
                <option value="Tuvalu" <?php if($pais_facturacion_cli=="Tuvalu"){ echo "selected"; } ?> id="TV">Tuvalu</option>
                <option value="Ucrania" <?php if($pais_facturacion_cli=="Ucrania"){ echo "selected"; } ?> id="UA">Ucrania</option>
                <option value="Uganda" <?php if($pais_facturacion_cli=="Uganda"){ echo "selected"; } ?> id="UG">Uganda</option>
                <option value="Uruguay" <?php if($pais_facturacion_cli=="Uruguay"){ echo "selected"; } ?> id="UY">Uruguay</option>
                <option value="Uzbekistán" <?php if($pais_facturacion_cli=="Uzbekistán"){ echo "selected"; } ?> id="UZ">Uzbekistán</option>
                <option value="Vanuatu" <?php if($pais_facturacion_cli=="Vanuatu"){ echo "selected"; } ?> id="VU">Vanuatu</option>
                <option value="Venezuela" <?php if($pais_facturacion_cli=="Venezuela"){ echo "selected"; } ?> id="VE">Venezuela</option>
                <option value="Vietnam" <?php if($pais_facturacion_cli=="Vietnam"){ echo "selected"; } ?> id="VN">Vietnam</option>
                <option value="Wallis y Futuna" <?php if($pais_facturacion_cli=="Wallis y Futuna"){ echo "selected"; } ?> id="WF">Wallis y Futuna</option>
                <option value="Yemen" <?php if($pais_facturacion_cli=="Yemen"){ echo "selected"; } ?> id="YE">Yemen</option>
                <option value="Zambia" <?php if($pais_facturacion_cli=="Zambia"){ echo "selected"; } ?> id="ZM">Zambia</option>
                <option value="Zimbabue" <?php if($pais_facturacion_cli=="Zimbabue"){ echo "selected"; } ?> id="ZW">Zimbabue</option>
    </select>
    <div id="error_pais" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su País</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" width="120" valign="top">Nombres</td>
<td class="fuente_georgia font_size13">
<input type="text" name="nombre" id="nombre" maxlength="30" value="<?php echo $nombre_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_nombre" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese sus Nombres</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" width="120" valign="top">Apellidos</td>
<td class="fuente_georgia font_size13">
<input type="text" name="apellidos" id="apellidos" maxlength="30" value="<?php echo $apellido_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_apellido" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese sus Apellidos</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Dirección 1</td>
<td class="fuente_georgia font_size13">
<input type="text" name="direccion_1" id="direccion_1" value="<?php echo $dir1_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_direccion_1" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Dirección</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Dirección 2</td>
<td class="fuente_georgia font_size13">
<input type="text" name="direccion_2" id="direccion_2" value="<?php echo $dir2_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px"></td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Provincia</td>
<td class="fuente_georgia font_size13">
<input type="text" name="provincia" id="provincia" value="<?php echo $provincia_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_provincia" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Provincia</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Código Postal</td>
<td class="fuente_georgia font_size13">
<input type="text" name="codigo" id="codigo" value="<?php echo $postal_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_codigo" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Código Postal</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Teléfono</td>
<td class="fuente_georgia font_size13">
<input type="text" name="telefono" id="telefono" value="<?php echo $tel_facturacion_cli; ?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_telefono" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Teléfono</div>
</td>
</tr>
</table>
</div>

<div class="left_crear_cuenta">
	
	<table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td height="30"></td></tr>
    <tr>
    <td align="center"><div class="boton_crear_cuenta fuente_georgia font_size12"><a href="detalle_cuenta.php"  style="text-decoration:none;color:#FFF; cursor:pointer">CANCELAR</a></div></td>
    </tr>
    </table>
  
</div>

<div class="right_crear_cuenta">
	<table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td height="30"></td></tr>
    <tr>
    <td align="center"><input type="submit" onclick="return validando_facturacion()" style="cursor:pointer" class="boton_crear_cuenta fuente_georgia font_size12" value="ENVIAR"></td>
    </tr>
    <tr><td height="30"></td></tr>
    </table>
</div>
</form>

<div style="float:left;padding-top:20px; width:100%; height:1px;">&nbsp;</div>


</div>

<!-- FIN FORMULARIO CUENTA-->




<!--FOOTER-->
<?php
include("footer.php");
?>


</body>    
</html>
