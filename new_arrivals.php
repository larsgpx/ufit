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
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
	<link href="css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 
<!-- Popup Plugin Files -->
<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->
 
<!--<script src="js/jquery.collagePlus.js"></script>-->
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
                'targetHeight'  : 670
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

$id=$_GET['id'];//id del new arrivals
//lista datos del new arrivals
$result1 = $db_Full->select_sql("SELECT * FROM tbl_new_arrivals WHERE id_new_arrivals=$id");
$data1=mysqli_fetch_assoc($result1);
?>

<!-- Contenido nuevo -->
<section id="marca-lucciano">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $data1['banner_new_arrivals'];?>" alt="" class="img-responsive">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<a href="<?php if($data1['tipo_foto1']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto1'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto1'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-6">
				<a href="<?php if($data1['tipo_foto2']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto2'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto2'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($data1['tipo_foto3']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto3'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto3'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-8">
				<a href="<?php if($data1['tipo_foto4']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto4'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto4'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<a href="<?php if($data1['tipo_foto5']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto5'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto5'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($data1['tipo_foto6']=='7'){echo '#';}else{ echo 'productos.php?id='.$data1['tipo_foto6'].'&newarri='.$_GET['id'];} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $data1['foto6'];?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
	</div>
</section>

<!--FOOTER-->

<?php
include("footer.php");
?>

</body>    
</html>
