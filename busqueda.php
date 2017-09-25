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



</head>

<body>


<?php
include("header.php");
?>

<!-- Sección de resultados de búsqueda -->
<section id="busqueda">
	<div class="container fuente_georgia">

			<?php

				$contador_resultados=0;

				$resultType = $db_Full->select_sql("SELECT * FROM tbl_tipos where nombre_tipo = '".$_GET['buscador']."'limit 1");

				$fetchType = mysqli_fetch_row($resultType);

				if($fetchType){
					$result = $db_Full->select_sql("SELECT * FROM tbl_productos  where fktipo_producto='".$fetchType[0]."' ");
				}else{
					$result = $db_Full->select_sql("SELECT * FROM tbl_productos
					where titulo_producto like '%".$_GET['buscador']."%'
					or descripcion_producto like '%".$_GET['buscador']."%'
					or codigo_producto like '%".$_GET['buscador']."%'
					ORDER BY titulo_producto asc");
				}


				while ($row100 = mysqli_fetch_array($result)) $contador_resultados++;

				if(mysqli_num_rows($result)) mysql_data_seek($result,0);

			?>

		<div class="row">
			<div class="col-sm-12">
				<p>Resultado de tu búsquedad: “<?php echo $contador_resultados;?>” resultados</p>
			</div>
		</div>
		<div class="row">

			<?php

				$i=1;

				while ($row10 = mysqli_fetch_array($result)){

					?>

			<div class="col-sm-3 text-center">
				<a href="detalle_producto.php?id_producto=<?php echo $row10["id_producto"]; ?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
				<h5><?php echo $row10['titulo_producto']; ?></h5>
				<p><?php echo $row10['marca_producto']; ?></p>

				<?php

					if($row10['oferta_producto']=="SI"){
						?>

					<span class="text-danger">Sale $ <?php echo $row10['precio_oferta_producto']; ?></span>

						<?php
					}

				?>

			</div>

					<?php

					if($i%4==0){
						?>

		</div>
		<div class="row">
			<div class="height-20"></div>
		</div>
		<div class="row">

						<?php
					} $i++;

				}

			?>

		</div>
	</div>
</section>

<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
