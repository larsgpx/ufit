<?php 
//include("inc.aplication_top.php");
session_start();

require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();


$result2=$db_Full->select_sql("SELECT * from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2=mysqli_fetch_assoc($result2);
$tarjeta = $data2['tarjeta_cli'];
$mes = $data2['mes_tarjeta_cli'];
$anio = $data2['anio_tarjeta_cli'];

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
	
	function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
	
	function validando_tarjeta()
	{
		var tarjeta = document.cuenta.elements['tarjeta'];
		var mes = document.cuenta.elements['mes'];
		var anio = document.cuenta.elements['anio'];
		
		
		if(tarjeta.value == "")
		{
			$("#tarjeta").css("border-bottom-color", "#900");
			$("#tarjeta").css("border-top-color", "#900");
			$("#tarjeta").css("border-left-color", "#900");
			$("#tarjeta").css("border-right-color", "#900");
			$("#error_tarjeta").css("display", "block");
			return false;
		}else
		{
			$("#tarjeta").css("border-bottom-color", "#000");
			$("#tarjeta").css("border-top-color", "#000");
			$("#tarjeta").css("border-left-color", "#000");
			$("#tarjeta").css("border-right-color", "#000");
			$("#error_tarjeta").css("display", "none");
		}
		
		
		if(mes.value == "")
		{
			$("#mes").css("border-bottom-color", "#900");
			$("#mes").css("border-top-color", "#900");
			$("#mes").css("border-left-color", "#900");
			$("#mes").css("border-right-color", "#900");
			$("#error_mes").css("display", "block");
			return false;
		}else
		{
			$("#mes").css("border-bottom-color", "#000");
			$("#mes").css("border-top-color", "#000");
			$("#mes").css("border-left-color", "#000");
			$("#mes").css("border-right-color", "#000");
			$("#error_mes").css("display", "none");
		}
		
		
		if(anio.value == "")
		{
			$("#anio").css("border-bottom-color", "#900");
			$("#anio").css("border-top-color", "#900");
			$("#anio").css("border-left-color", "#900");
			$("#anio").css("border-right-color", "#900");
			$("#error_anio").css("display", "block");
			return false;
		}else
		{
			$("#anio").css("border-bottom-color", "#000");
			$("#anio").css("border-top-color", "#000");
			$("#anio").css("border-left-color", "#000");
			$("#anio").css("border-right-color", "#000");
			$("#error_anio").css("display", "none");
		}
		
	
		
		  $.ajax({
				  type: "POST",
				  url: "actualizar_tarjeta.php",
				  data : "tarjeta="+$('#tarjeta').val()+"&mes="+$('#mes').val()+"&anio="+$('#anio').val(),	 
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
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px; ">
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
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<td height="20"></td>
</tr>
<tr>
<td align="left" class="fuente_georgia font_size18" style="background-color:#000; color:#FFF; padding:15px">INFORMACIÓN DE TARJETA DE CRÉDITO</td>
</tr>
</table>

<div class="center_editar_cuenta">
<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr><td height="40"></td></tr>
<tr>
<td class="fuente_georgia font_size13" valign="top">Número de Tarjeta</td>
<td width="20"></td>
<td class="fuente_georgia font_size13">
<input type="text" name="tarjeta" id="tarjeta" onKeyPress="return soloNumeros(event)"  value="<?php echo $tarjeta;?>" style="width:100%; border:solid 1px #000; height:25px">
<div id="error_tarjeta" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Número de Tarjeta</div>
</td>
</tr>
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size13" width="120" valign="top">Fecha de Expiración</td>
<td width="20"></td>
<td class="fuente_georgia font_size13" valign="top">
	
    <select type="text" name="mes" id="mes"  style="width:45%; background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
    	<option value="" <?php if($mes=="Seleccione"){ echo "selected";} ?> >Seleccione</option>
        <option value="Enero" <?php if($mes=="Enero"){ echo "selected";} ?> >Enero</option>
        <option value="Febrero" <?php if($mes=="Febrero"){ echo "selected";} ?> >Febrero</option>
        <option value="Marzo" <?php if($mes=="Marzo"){ echo "selected";} ?> >Marzo</option>
        <option value="Abril" <?php if($mes=="Abril"){ echo "selected";} ?> >Abril</option>
        <option value="Mayo" <?php if($mes=="Mayo"){ echo "selected";} ?> >Mayo</option>
        <option value="Junio" <?php if($mes=="Junio"){ echo "selected";} ?> >Junio</option>
        <option value="Julio" <?php if($mes=="Julio"){ echo "selected";} ?> >Julio</option>
        <option value="Setiembre" <?php if($mes=="Setiembre"){ echo "selected";} ?> >Setiembre</option>
        <option value="Octubre" <?php if($mes=="Octubre"){ echo "selected";} ?> >Octubre</option>
        <option value="Noviembre" <?php if($mes=="Noviembre"){ echo "selected";} ?> >Noviembre</option>
        <option value="Diciembre" <?php if($mes=="Diciembre"){ echo "selected";} ?> >Diciembre</option>
    </select>
   
    
     <select type="text" name="anio" id="anio"  style="width:45%; float:right; background: url(images/combobox.jpg) no-repeat right #FFF; overflow: hidden;border:solid 1px #000; height:25px;-webkit-appearance: none;">
    	<option value="" <?php if($anio=="Seleccione"){ echo "selected";} ?> >Seleccione</option>
        <option value="2016" <?php if($anio=="2016"){ echo "selected";} ?> >2016</option>
        <option value="2017" <?php if($anio=="2017"){ echo "selected";} ?> >2017</option>
        <option value="2018" <?php if($anio=="2018"){ echo "selected";} ?> >2018</option>
        <option value="2019" <?php if($anio=="2019"){ echo "selected";} ?> >2019</option>
        <option value="2020" <?php if($anio=="2020"){ echo "selected";} ?> >2020</option>
        <option value="2021" <?php if($anio=="2021"){ echo "selected";} ?> >2021</option>
        <option value="2022" <?php if($anio=="2022"){ echo "selected";} ?> >2022</option>
        <option value="2023" <?php if($anio=="2023"){ echo "selected";} ?> >2023</option>
        <option value="2024" <?php if($anio=="2024"){ echo "selected";} ?> >2024</option>
        <option value="2025" <?php if($anio=="2025"){ echo "selected";} ?> >2025</option>
    </select>
    
    <br><br>
    <div id="error_mes" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Mes de Expiración</div>
    <div id="error_anio" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese Año de Expiración </div>
   
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
    <td align="center"><input type="submit" onclick="return validando_tarjeta()"  class="boton_crear_cuenta fuente_georgia font_size12" style="cursor:pointer;" value="ENVIAR"></td>
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
