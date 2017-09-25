<?php
//include("inc.aplication_top.php");
session_start();
require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

include("admin/aplication/modelo/modelo_base_datos.php");
$BASE_URL="";
$db_Full = new db_model(); 
$db_Full->conectar(); 

//lista ideas
 @$result = $db_Full->select_sql("SELECT * FROM tbl_ideas");
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
	<link href="css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- Popup Plugin Files -->
<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!-- Owl Carousel Assets -->
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<script src="owl-carousel/owl.carousel.js"></script>
<!-- Fin Owl Carousel Assets -->

<script src="js/jquery.collagePlus.js"></script>
<script src="js/jquery.removeWhitespace.js"></script>
<script src="js/jquery.collageCaption.js"></script>

<script>


        $(document).ready(function(){

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
            	collage();
                $('.detalle_marcas').collageCaption();

				collage();
                $('.detalle_marcas').collageCaption();

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


		 function collage() {
        $('.detalle_marcas').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 2000,
                'targetHeight'  : 300
            }
        );
    };

    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.detalle_marcas .item_fotos').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });
</script>

<style>
    .container:before,
    .container:after {
      content: "";
      display: table;
    }
    .container:after {
      clear: both;
    }
    .item_fotos {
      float: left;
      margin-bottom: 5px;
    }
    .item_fotos img {
      max-width: 100%;
      max-height: 100%;
      vertical-align: bottom;
    }
    .first-item {
      clear: both;
    }
    .last-row, .last-row ~ .item_fotos {
      margin-bottom: 0;
    }
  </style>

</head>

<body>


<?php
include("header.php");
?>


<!--FOTOS MAGAZINE-->



<!-- Contenido nuevo -->
<section id="ideas">
	<div class="container">
		<div class="row">
			<h1 class="text-center fuente_georgia font_size28 title-uppercase">Ideas para regalar</h1>
		</div>
		<div class="row">

    <?php
    $cont=0;
	$result = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE seccion_idea='1' order by id_idea asc");
	while ($row_marcas_2 = mysqli_fetch_array($result))
	{
	?>

  <?php
    $imagen1 = getimagesize("webroot/archivos/".$row_marcas_2['imagen_idea']);
    $ancho1 = $imagen1[0];
    $alto1 = $imagen1[1];
  ?>

       <div class="col-sm-4">
				<div class="square-container">
					<a href="<?php echo  $row_marcas_2['url_idea']; ?>">
            <div class="image-content" style="width: 100%; height: 330px; background-image: url('webroot/archivos/<?php echo $row_marcas_2["imagen_idea"];?>'); background-size: cover; background-position: center;"></div>
						<h5 class="text-center fuente_georgia font_size14"><?php echo $row_marcas_2["titulo_idea"];?><br><small><?php echo $row_marcas_2["subtitulo_idea"];?></small></h5>
					</a>
				</div>
			</div>



	<?php
	}
	?>

		</div>
  <!-- Banner Horizontal -->
	<div class="row">
	<?php
	$result1 = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE seccion_idea='2' order by id_idea asc");
	while ($row_marcas_3 = mysqli_fetch_array($result1))
	{
	?>

      <?php
      $imagen1 = getimagesize("webroot/archivos/".$row_marcas_3['imagen_idea']);
	  $ancho1 = $imagen1[0];
	  $alto1 = $imagen1[1];
	  ?>

       	<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase"><?php echo $row_marcas_3["titulo_idea"];?></h2>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a href="<?php echo  $row_marcas_3['url_idea']; ?>">
            <div class="image-content" style="width: 100%; height: 330px; background-image: url('webroot/archivos/<?php echo $row_marcas_3["imagen_idea"];?>'); background-size: cover; background-position: center;"></div>
						<!-- <img src="webroot/archivos/<?php echo $row_marcas_3["imagen_idea"];?>" alt="" class="img-responsive">-->
						<h5 class="text-center fuente_georgia font_size14"><?php echo $row_marcas_3["subtitulo_idea"];?></h5>
					</a>
				</div>
			</div>
		</div>


	<?php
	}
	?>
	</div>
  <!-- Banner par -->
	<div class="row">
		<?php
	$result1 = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE seccion_idea='3' order by id_idea asc");
	while ($row_marcas_3 = mysqli_fetch_array($result1))
	{
	?>

      <?php
      $imagen1 = getimagesize("webroot/archivos/".$row_marcas_3['imagen_idea']);
	  $ancho1 = $imagen1[0];
	  $alto1 = $imagen1[1];
	  ?>
      	<!--<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase"><?php //echo $row_marcas_3["titulo_idea"];?></h2>
		</div>-->
		<div class="row">
			<div class="col-sm-6">
				<div class="square-container">
					<a href="<?php echo  $row_marcas_3['url_idea']; ?>">
            <div class="image-content" style="width: 100%; height: 330px; background-image: url('webroot/archivos/<?php echo $row_marcas_3["imagen_idea"];?>'); background-size: cover; background-position: center;"></div>
						<!-- <img src="webroot/archivos/<?php echo $row_marcas_3["imagen_idea"];?>" alt="" class="img-responsive">-->
						<h5 class="text-center fuente_georgia font_size14"><?php echo $row_marcas_3["subtitulo_idea"];?><br><small><?php echo $row_marcas_3["subtitulo_idea"];?></small></h5>
					</a>
				</div>
			</div>
		</div>
	<?php }	?>
	</div>
	<div class="row">
		<?php
	$result1 = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE seccion_idea='4' order by id_idea asc");
	while ($row_marcas_4 = mysqli_fetch_array($result1))
	{
	?>

      <?php
      $imagen1 = getimagesize("webroot/archivos/".$row_marcas_4['imagen_idea']);
	  $ancho1 = $imagen1[0];
	  $alto1 = $imagen1[1];
	  ?>
	  <div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase"><?php echo $row_marcas_4["titulo_idea"];?></h2>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a href="<?php echo  $row_marcas_4['url_idea']; ?>">
						<img src="webroot/archivos/<?php echo $row_marcas_4["imagen_idea"];?>" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14"><?php echo $row_marcas_4["subtitulo_idea"];?></h5>
					</a>
				</div>
			</div>
		</div>
	<?php }	?>
	</div>
	<div class="row">
		<?php
	$result5 = $db_Full->select_sql("SELECT * FROM tbl_ideas WHERE seccion_idea='5' order by id_idea asc");
	while ($row_marcas_5 = mysqli_fetch_array($result5))
	{
	?>

      <?php
      $imagen1 = getimagesize("webroot/archivos/".$row_marcas_5['imagen_idea']);
	  $ancho1 = $imagen1[0];
	  $alto1 = $imagen1[1];
	  ?>
	  <div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase"><?php echo $row_marcas_5["titulo_idea"];?></h2>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a class="fancybox-media" href="<?php echo  $row_marcas_5['url_video_idea']; ?>">
						<img src="webroot/archivos/<?php echo $row_marcas_5["imagen_idea"];?>" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">aa<?php echo $row_marcas_5["subtitulo_idea"];?></h5>
					</a>
				</div>
			</div>
		</div>

	<?php }	?>
	</div>
		<!--<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a href="#">
						<img src="images/banner_ideas.jpg" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">Read &amp; shop now</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase">Gift cards</h2>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="square-container">
					<a href="#">
						<img src="images/card1.jpg" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">Read &amp; shop now</h5>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="square-container">
					<a href="#">
						<img src="images/card2.jpg" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">Read &amp; shop now</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase">Shop for her at net-a-royalty.pe</h2>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a href="#">
						<img src="images/shop_ideas.jpg" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">Read &amp; shop now</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase">Video</h2>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="square-container">
					<a class="fancybox-media" href="https://www.youtube.com/watch?v=WwHKYWKOnoQ">
						<img src="images/video_ideas.jpg" alt="" class="img-responsive">
						<h5 class="text-center fuente_georgia font_size14">Read &amp; shop now</h5>
					</a>
				</div>
			</div>
		</div>-->
	</div>
</section>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="30"></td></tr>
</table>
<!--FIN MAGAZINE-->

<!--FOOTER-->
<?php
include("footer.php");
?>


</body>
</html>
