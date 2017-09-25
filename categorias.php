<?php 
//include("inc.aplication_top.php");
session_start();
require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
?>

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

<!-- POPUP -->

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<!-- FIN POPUP -->

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

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>


<?php
include("header.php");
?>


<!-- Contenido nuevo -->
<?php
        $result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=".$_GET['tipos']."  group by id_tipo_img  order by id_tipo_img asc");
       $datos=mysqli_fetch_assoc($result10);
        
     
?>
<section id="categorias">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo $datos["link_tipo_img"];?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $datos['foto_tipo_img'] ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
<?php
//catgoria 1
if ($_GET['tipos']==1) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=2");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=3");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=4");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=5");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=6");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=7");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=8");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=9");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=1 AND id_tipo_img=10");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img']; 
} 
//catgoria 2 
if ($_GET['tipos']==2) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=12");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=13");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=14");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=15");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=16");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=17");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=18");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=19");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=2 AND id_tipo_img=20");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img']; 
}
//categoria 3
if ($_GET['tipos']==3) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=32");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=33");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=34");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=35");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=36");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=37");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=38");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=39");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=3 AND id_tipo_img=40");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];   
  }  
//categoria 4
if ($_GET['tipos']==4) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=22");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=23");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=24");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=25");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=26");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=27");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=28");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=29");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=4 AND id_tipo_img=30");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];   
  }
//categoria 5
if ($_GET['tipos']==5) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=42");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=43");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=44");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=45");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=46");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=47");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=48");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=49");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=5 AND id_tipo_img=50");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];   
  }   
 //categoria 6
/*if ($_GET['tipos']==6) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=42");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=43");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=44");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=45");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=46");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=47");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=48");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=49");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=6 AND id_tipo_img=50");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];   
  }   */ 
//catgoria 13 
if ($_GET['tipos']==13) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=52");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=53");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=54");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=55");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=56");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=57");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=58");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=59");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=13 AND id_tipo_img=60");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];    
}
//catgoria 14 
if ($_GET['tipos']==14) {
    $result1= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=62");
    $datos1=mysqli_fetch_assoc($result1);
    $foto1=$datos1['foto_tipo_img'];
    $link1=$datos1['link_tipo_img'];

    $result2= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=63");
    $datos2=mysqli_fetch_assoc($result2);
    $foto2=$datos2['foto_tipo_img'];
    $link2=$datos2['link_tipo_img'];

    $result3= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=64");
    $datos3=mysqli_fetch_assoc($result3);
    $foto3=$datos3['foto_tipo_img'];
    $link3=$datos3['link_tipo_img']; 

    $result4= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=65");
    $datos4=mysqli_fetch_assoc($result4);
    $foto4=$datos4['foto_tipo_img'];
    $link4=$datos4['link_tipo_img']; 

    $result5= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=66");
    $datos5=mysqli_fetch_assoc($result5);
    $foto5=$datos5['foto_tipo_img'];
    $link5=$datos5['link_tipo_img']; 

    $result6= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=67");
    $datos6=mysqli_fetch_assoc($result6);
    $foto6=$datos6['foto_tipo_img'];
    $link6=$datos6['link_tipo_img'];

    $result7= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=68");
    $datos7=mysqli_fetch_assoc($result7);
    $foto7=$datos7['foto_tipo_img'];
    $link7=$datos7['link_tipo_img'];

    $result8= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=69");
    $datos8=mysqli_fetch_assoc($result8);
    $foto8=$datos8['foto_tipo_img'];
    $link8=$datos8['link_tipo_img'];

    $result9= $db_Full->select_sql("SELECT * FROM tbl_tipos_imagenes, tbl_categorias WHERE fk_tipo_img=fktipo_cate AND fk_tipo_img=14 AND id_tipo_img=70");
    $datos9=mysqli_fetch_assoc($result9);
    $foto9=$datos9['foto_tipo_img'];
    $link9=$datos9['link_tipo_img'];     
  }

  ?>		
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php echo $link1;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto1; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo $link2;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto2; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo $link3;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto3; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo $link4;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto4; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php echo $link5;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto5; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-8">
				<a href="<?php echo $link6;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto6; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo $link7;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto7; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo $link8;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto8; ?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo $link9;?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto9; ?>); background-size: cover; background-position: center;"></div>
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
