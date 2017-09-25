<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->

<link href="<?php echo $BASE_URL?>css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- Popup Plugin Files -->
<script type="text/javascript" src="<?php echo $BASE_URL?>fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $BASE_URL?>fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo $BASE_URL?>fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!-- Owl Carousel Assets -->
<link href="<?php echo $BASE_URL?>owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo $BASE_URL?>owl-carousel/owl.theme.css" rel="stylesheet">
<script src="<?php echo $BASE_URL?>owl-carousel/owl.carousel.js"></script>
<!-- Fin Owl Carousel Assets -->

<script src="<?php echo $BASE_URL?>js/jquery.collagePlus.js"></script>
<script src="<?php echo $BASE_URL?>js/jquery.removeWhitespace.js"></script>
<script src="<?php echo $BASE_URL?>js/jquery.collageCaption.js"></script>

<script type="text/javascript">

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

    <?php 
    if(isset($_GET['order']) && isset($_GET['status']) && $_GET['status'] == 'ok')
    {
            echo '$.fancybox("#orderPopup");';
    }else
    {
        if(!isset($_COOKIE['homePopup']))
        {
            echo '$.fancybox("#popup_principal", {afterClose: function(){setCookie("homePopup", "-", 1);}});';
            //echo '$("#notification-top").css("display","none");';
        }

    }
    ?>


      collage();
     $('.menu_fotos').collageCaption();

      $(".base_item_menu").hover(
      function() {
        $(this).find(".item_menu").css("color","#ff0000");
        $(this).find(".vista_menu").stop( true, true ).fadeIn(10);
      }, function() {
        $(this).find(".item_menu").css("color","#000000");
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



    var slider = $("#owl-slider");

    slider.owlCarousel(
    {
          itemsCustom :
          [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 1],
            [1000, 1],
            [1200, 1],
            [1400, 1],
            [1600, 1]
          ],
          navigation : false,
          pagination : false,
          paginationNumbers : false,
          navigationText: false,
          autoPlay: 2000
    });




});



function collage() {
        $('.menu_fotos').removeWhitespace().collagePlus(
            {
                'allowPartialLastRow' : true
            }
        );
    };

    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.menu_fotos .item_fotos').css("opacity", 0);
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

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo $BASE_URL?>css/bootstrap.min.css">

  </head>

<body>