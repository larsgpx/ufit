
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
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


<!-- Gift Card/Tarjeta de Regalo -->
<section id="gift-card" class="fuente_georgia">
	<div class="container" style="background-image: url('http://images.askmen.com/entertainment/mrtech/top-25-christmas-gifts-for-him_1384372092.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 80px 0;">
		<div class="gift-content">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="text-center">Gift Card</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<img src="images/card.png" class="img-responsive" alt="" />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 text-center">
					<div class="row">
					  <div class="height-10"></div>
					</div>
					<div class="row">
					  <p>
					  	Regala para un ser querido.
					  </p>
					</div>
					<div class="row">
					  <div class="col-sm-4">
					    <a class="btn btn-default" href="#">$ 100</a>
					  </div>
						<div class="col-sm-4">
					    <a class="btn btn-default" href="#">$ 200</a>
					  </div>
						<div class="col-sm-4">
					    <a class="btn btn-default" href="#">$ 300</a>
					  </div>
					</div>
					<div class="row">
					  <div class="height-20"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



</body>
</html>
