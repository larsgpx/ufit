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



</head>

<body>


<?php
include("header.php");
?>





<!--MARCAS-->
<div class="base_estilos">
	<div class="estilos">
 		<table cellpadding="0" cellspacing="0" class="base_tecto_estilos" align="center">
        <tr>
       		<td background="images/fondo_popup.jpg" style="padding:8px;" >
            	<table cellpadding="0" cellspacing="0" align="center"  style="background-color:#FFF;width:100%; padding:20px;" >
                <tr>
                    <td align="center"><img src="images/maquina.jpg"> </td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td align="center" class="fuente_georgia font_size30"><b>ESTILOS & CONSEJOS FIT</b></td>
                </tr>
                <tr><td align="center"><div style="width:50%; margin:30px; height:1px; background-color:#666">&nbsp;</div></td></tr>
                <tr>
                    <td align="center" class="fuente_georgia font_size15">
                    	<div style="width:60%;">
                    	PÓNGASE EN CONTACTO CON NUESTRO EQUIPO DE EXPERTOS  LAS 24 HORAS DEL DÍA, SIETE DÍAS A LA SEMANA
                        </div>
                    </td>
                </tr>
                <tr><td height="30"></td></tr>
                <tr>
                    <td align="center" class="fuente_georgia font_size13">
                    	<div style="width:80%;">
                    	Email styleconsultant@mrporter.com o llame al 0800 044 5706 desde el Reino Unido, +1 877 957 7677 de los EE.UU. y +44 330 022 5706 internacional
                    	</div>
                    </td>
                </tr>
                <tr><td align="center"><div style="width:50%; margin:30px; height:1px; background-color:#666">&nbsp;</div></td></tr>
                <tr>
                    <td align="center" class="fuente_georgia font_size22"><b>QUE PODEMOS HACER POR USTED</b></td>
                </tr>
                 <tr><td height="20"></td></tr>
                 <tr>
                    <td align="center">
                    	
                        <div style="float:left">
                        
                            <div class="item_estilo">
                                <table cellpadding="0" cellspacing="0" align="left" >
                                <tr>
                                    <td align="left" class="fuente_georgia font_size15">ENCUENTRE EL AJUSTE PERFECTO</td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td align="left" class="fuente_georgia font_size13">Para ayudarle a tomar una decisión informada, tratamos en cada prenda para aconsejar cómo el diseñador dimensionamiento carreras </td>
                                </tr>
                                </table>
                            </div>
                            
                            <div class="item_estilo">
                                <table cellpadding="0" cellspacing="0" align="left" >
                                <tr>
                                    <td align="left" class="fuente_georgia font_size15">INSPIRACIÓN OUTFIT</td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td align="left" class="fuente_georgia font_size13">Nosotros le ayudaremos a crear un look adecuado para cualquier evento</td>
                                </tr>
                                </table>
                            </div>
                        
                        </div>
                        
                        <div style="float:left">
                            <div class="item_estilo">
                                <table cellpadding="0" cellspacing="0" align="left" >
                                <tr>
                                    <td align="left" class="fuente_georgia font_size15">ENCUENTRE EL AJUSTEPERFECTO</td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td align="left" class="fuente_georgia font_size13">Para ayudarle a tomar una decisión informada, tratamos en cada prenda para aconsejar cómo el diseñador dimensionamiento carreras </td>
                                </tr>
                                </table>
                            </div>
                            
                            
                            <div class="item_estilo">
                                <table cellpadding="0" cellspacing="0" align="left" >
                                <tr>
                                    <td align="left" class="fuente_georgia font_size15">INSPIRACIÓN OUTFIT</td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td align="left" class="fuente_georgia font_size13">Nosotros le ayudaremos a crear un look adecuado para cualquier evento</td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
                
                </table>
        	</td>
        </tr>
        </table>
    </div>
</div>
<!--FIN MARCAS-->






<!--FOOTER-->
<?php
include("footer.php");
?>


</body>    
</html>
