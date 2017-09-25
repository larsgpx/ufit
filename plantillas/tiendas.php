

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



<!-- Contenido Encuentra nuestras tiendas -->
<section id="tiendas">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 fuente_georgia">
        <img src="images/tiendas.jpg" alt="" class="img-responsive">
        <h1 class="font_size28 section-title">Encuentra nuestras tiendas</h1>
        <p></p>
      </div>
      <div id="locations" class="col-sm-6" style="height: 450px;"></div>
    </div>
  </div>
</section>


<!-- Gmaps and Google Maps API needed library -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqpi05EOs1kRvTmTzJgMg5-iMJ0pdHNkY" type="text/javascript"></script>

<script type="text/javascript">
    // Locate map

    //CC Megaplaza

    var myCenter=new google.maps.LatLng(-11.9839326,-77.0669646);

    //CC San Miguel

    var myCenter2=new google.maps.LatLng(-12.0761546,-77.0858315);

    //CC Plaza Lima Sur

    var myCenter3=new google.maps.LatLng(-12.1729479,-77.0173213);

    //CC Outlet Los Portales

    var myCenter4=new google.maps.LatLng(-12.018366,-77.1186934);

    //CC Real Plaza - Chiclayo

    var myCenter5=new google.maps.LatLng(-6.8373537,-79.9061553);

    //CC El Quinde shopping Plaza - Cajamarca

    var myCenter6=new google.maps.LatLng(-7.1492954,-78.5265934);

    //Mall Aventura Plaza - Callao

    var myCenter7=new google.maps.LatLng(-12.0544095,-77.1019908);

    //Mall Aventura Plaza - Trujillo

    var myCenter8=new google.maps.LatLng(-8.1024445,-79.0482622);

    //Mall Aventura Plaza - Lima

    var myCenter9=new google.maps.LatLng(-12.0566317,-76.970967);

    //Mall Aventura Plaza - Arequipa

    var myCenter10=new google.maps.LatLng(-16.4178085,-71.5138507);

    //CC Real Plaza Centro Civico - Lima

    var myCenter11=new google.maps.LatLng(-12.0573532,-77.037029);

    //CC Real Plaza - Huanuco

    var myCenter12=new google.maps.LatLng(-9.919426,-76.2410322);

    var contentString = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Mega Plaza </h3>'+
    '<p>Av. Alfredo Mendiola 3698 (Independencia)<br>Telf.: (511) 486-7070</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString2 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Plaza San Miguel</h3>'+
    '<p>Av. La Marina 2000 (San Miguel)<br>Telf.: (511) 566-3085</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString3 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Plaza Lima Sur</h3>'+
    '<p>Av. Prolongacion paseo de la Republica s/n (Chorrillos)<br>Telf.: (511) 251-7004</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString4 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Lima Outlet Center Los Portales</h3>'+
    '<p>Av. Elmer Faucett Nro. 3443 (Callao)<br>Telf.: (511) 574-9237</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString5 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Real Plaza</h3>'+
    '<p>Cl. Mariscal Andres Avelino Caceres Nro. 222<br>Telf.: (5174) 234-182</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString6 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. El Quinde Shopping Plaza</h3>'+
    '<p>Jr. Sor Manuela Gil 151 (Cajamarca)<br>Telf.: (5176) 361-449</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString7 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Mall Aventura Plaza Bellavista</h3>'+	
    '<p>Av. Oscar R. Benavides 3866 (Bellavista)<br>Telf.: (511) 621-9948</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString8 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Mall Aventura Plaza</h3>'+
    '<p>Av. Mansiche y America Oeste s/n (Trujillo)<br>Telf.: (5144) 607-536</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString9 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Mall Aventura Plaza Santa Anita</h3>'+
    '<p>Av. Carretera Central 111 (Santa Anita)<br>Telf.: (511) 637-3487</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString10 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Mall Aventura Plaza Porongoche</h3>'+
    '<p>Av. Porongoche 500 (Paucarpata)<br>Telf.: (5154) 614-716</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString11 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Real Plaza Centro Civico</h3>'+
    '<p>Av. Inca Garcilaso de la Vega 1337 (Cercado de Lima)</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var contentString12 = '<div id="content">'+
    '<h3 class="color-blue-2">Royalty - C.C. Real Plaza</h3>'+
    '<p>JR. Independencia S/N Int. Ref Las Moras<br>Telf.: (5162) 512-439</p>'+
    '<a target="_blank" href="#">Royalty</a>'+
    '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    
    var marker=new google.maps.Marker({
        position:myCenter
    });

    var marker2=new google.maps.Marker({
        position:myCenter2
    });

    var marker3=new google.maps.Marker({
        position:myCenter3
    });

    var marker4=new google.maps.Marker({
        position:myCenter4
    });

    var marker5=new google.maps.Marker({
        position:myCenter5
    });

    var marker6=new google.maps.Marker({
        position:myCenter6
    });

    var marker7=new google.maps.Marker({
        position:myCenter7
    });

    var marker8=new google.maps.Marker({
        position:myCenter8
    });

    var marker9=new google.maps.Marker({
        position:myCenter9
    });

    var marker10=new google.maps.Marker({
        position:myCenter10
    });

    var marker11=new google.maps.Marker({
        position:myCenter11
    });

    var marker12=new google.maps.Marker({
        position:myCenter12
    });


    function initialize() {

        var styles = [
        {
          featureType: "road",
          elementType: "geometry",
          stylers: [
            { lightness: 40 },
            { visibility: "simplified" }
          ]
        },{
          featureType: "road",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];

      var mapProp = {
          center: {lat: -12.0911219, lng: -77.032809},
          zoom: 5,
          draggable: true,
          styles: styles,
          mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      
      var map=new google.maps.Map(document.getElementById("locations"),mapProp);

      marker.setMap(map);
      marker2.setMap(map);
      marker3.setMap(map);
      marker4.setMap(map);
      marker5.setMap(map);
      marker6.setMap(map);
      marker7.setMap(map);
      marker8.setMap(map);
      marker9.setMap(map);
      marker10.setMap(map);
      marker11.setMap(map);
      marker12.setMap(map);
        
      google.maps.event.addListener(marker, 'click', function() {
          
        infowindow.setContent(contentString);
        infowindow.open(map, marker);
        
      });

      google.maps.event.addListener(marker2, 'click', function() {
        
        infowindow.setContent(contentString2);
        infowindow.open(map, marker2);
        
      });

      google.maps.event.addListener(marker3, 'click', function() {
        
        infowindow.setContent(contentString3);
        infowindow.open(map, marker3);
        
      });

      google.maps.event.addListener(marker4, 'click', function() {
        
        infowindow.setContent(contentString4);
        infowindow.open(map, marker4);
        
      });

      google.maps.event.addListener(marker5, 'click', function() {
        
        infowindow.setContent(contentString5);
        infowindow.open(map, marker5);
        
      });

      google.maps.event.addListener(marker6, 'click', function() {
        
        infowindow.setContent(contentString6);
        infowindow.open(map, marker6);
        
      });

      google.maps.event.addListener(marker7, 'click', function() {
        
        infowindow.setContent(contentString7);
        infowindow.open(map, marker7);
        
      });

      google.maps.event.addListener(marker8, 'click', function() {
        
        infowindow.setContent(contentString8);
        infowindow.open(map, marker8);
        
      });

      google.maps.event.addListener(marker9, 'click', function() {
        
        infowindow.setContent(contentString9);
        infowindow.open(map, marker9);
        
      });

      google.maps.event.addListener(marker10, 'click', function() {
        
        infowindow.setContent(contentString10);
        infowindow.open(map, marker10);
        
      });

      google.maps.event.addListener(marker11, 'click', function() {
        
        infowindow.setContent(contentString11);
        infowindow.open(map, marker11);
        
      });

      google.maps.event.addListener(marker12, 'click', function() {
        
        infowindow.setContent(contentString12);
        infowindow.open(map, marker12);
        
      });

      google.maps.event.addListener(window, 'resize', function() {
        map.setCenter(center);
      });

    };

    initialize();
</script>



</body>    
</html>
