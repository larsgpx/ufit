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
?>


<!--FOTOS MARCAS-->
<div class="detalle_marcas">


       <!--consulta las excepciones
      <?php /*
		$result = $db_Full->select_sql("SELECT * FROM tbl_marcas WHERE id_marca!=2 and id_marca!=3 and id_marca!=4 and id_marca!=5 and id_marca!=6 and id_marca!=7 and id_marca!=8 and id_marca!=9");
	    while ($row_banner_marcas = mysqli_fetch_array($result))
	    {

		$imagen1 = getimagesize("webroot/archivos/".$row_banner_marcas["banner_marca"]);
	    $ancho1 = $imagen1[0];
	    $alto1 = $imagen1[1]; */
		?>
            <div class="item_fotos">
            <a href="productos.php?id_marca=<?php //echo $row_banner_marcas["id_marca"];?>"><img src="webroot/archivos/<?php //echo $row_banner_marcas["banner_marca"];?>" <?php //if($deviceType=="computer"){ ?> width="<?php //echo $ancho1;?>" height="<?php //echo $alto1;?>" <?php// } ?> ></a>
            </div>
        <?php// }?>

        <?php /*
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas!=2 and fkmarcas_tipos_marcas!=3 and fkmarcas_tipos_marcas!=4 and fkmarcas_tipos_marcas!=5 and fkmarcas_tipos_marcas!=6 and fkmarcas_tipos_marcas!=7 and fkmarcas_tipos_marcas!=8 and fkmarcas_tipos_marcas!=9 order by id_tipos_marcas asc");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {
		$imagen10 = getimagesize("webroot/archivos/".$row_banner_marcas10["foto_tipos_marcas"]);
	    $ancho10 = $imagen10[0];
	    $alto10 = $imagen10[1]; */
		?>
            <div class="item_fotos">
            <a href="productos.php?id_marca=<?php //echo $row_banner_marcas10["fkmarcas_tipos_marcas"] . '&id_cat=' . $row_banner_marcas10["fktipos_tipos_marcas"];?>"><img src="webroot/archivos/<?php //echo $row_banner_marcas10["foto_tipos_marcas"];?>" <?php //if($deviceType=="computer"){ ?> width="<?php //echo $ancho10;?>" height="<?php //echo $alto10;?>" <?php //} ?> ></a>
            </div>
        <?php //}?>
      Fin consulta las excepciones-->

<!-- Contenido nuevo rock-&-republic-->
<?php
if ($_GET['id_marca']==2) {
	//Consulta Banner
		$result002=$db_Full->select_sql("SELECT banner_marca FROM tbl_marcas WHERE id_marca=2");
		$data002=mysqli_fetch_assoc($result002);
		$banner002 = $data002['banner_marca'];

		//Lista imagenes

		$result201=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=132 ");
		$data211=mysqli_fetch_assoc($result201);
		$foto1 = $data211['foto_tipos_marcas'];
		$link1 = $data211['fktipos_tipos_marcas'];

		$result202=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=133 ");
		$data212=mysqli_fetch_assoc($result202);
		$foto2 = $data212['foto_tipos_marcas'];
		$link2 = $data212['fktipos_tipos_marcas'];

		$result203=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=134 ");
		$data213=mysqli_fetch_assoc($result203);
		$foto3 = $data213['foto_tipos_marcas'];
		$link3 = $data213['fktipos_tipos_marcas'];

		$result204=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=135 ");
		$data214=mysqli_fetch_assoc($result204);
		$foto4 = $data214['foto_tipos_marcas'];
		$link4 = $data214['fktipos_tipos_marcas'];

		$result205=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=136 ");
		$data215=mysqli_fetch_assoc($result205);
		$foto5 = $data215['foto_tipos_marcas'];
		$link5 = $data215['fktipos_tipos_marcas'];

		$result206=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=137 ");
		$data216=mysqli_fetch_assoc($result206);
		$foto6 = $data216['foto_tipos_marcas'];
		$link6 = $data216['fktipos_tipos_marcas'];
	?>
	<section id="marca-rock-and-republic">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $banner002;?>" alt="" class="img-responsive">
			</div>
		</div>


		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link1;}; ?>"><img src="webroot/archivos/<?php echo $foto1;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link2;}; ?>"><img src="webroot/archivos/<?php echo $foto2;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link3;}; ?>"><img src="webroot/archivos/<?php echo $foto3;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link4;}; ?>"><img src="webroot/archivos/<?php echo $foto4;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link5;}; ?>"><img src="webroot/archivos/<?php echo $foto5;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=2&id_cat='.$link6;}; ?>"><img src="webroot/archivos/<?php echo $foto6;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
	</div>
</section>
<?php   } ?>
<!-- fin Contenido nuevo rock-&-republic-->




      <!--consulta de imagenes aeropostale-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=3 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result03=$db_Full->select_sql("SELECT banner_marca FROM tbl_marcas WHERE id_marca=3");
		$data03=mysqli_fetch_assoc($result03);
		$banner03 = $data03['banner_marca'];

		$result301=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=114 ");
		$data311=mysqli_fetch_assoc($result301);
		$foto1 = $data311['foto_tipos_marcas'];
		$link1 = $data311['fktipos_tipos_marcas'];

		$result302=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=115 ");
		$data312=mysqli_fetch_assoc($result302);
		$foto2 = $data312['foto_tipos_marcas'];
		$link2 = $data312['fktipos_tipos_marcas'];

		$result303=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=116 ");
		$data313=mysqli_fetch_assoc($result303);
		$foto3 = $data313['foto_tipos_marcas'];
		$link3 = $data313['fktipos_tipos_marcas'];

		$result304=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=117 ");
		$data314=mysqli_fetch_assoc($result304);
		$foto4 = $data314['foto_tipos_marcas'];
		$link4 = $data314['fktipos_tipos_marcas'];

		$result305=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=118 ");
		$data315=mysqli_fetch_assoc($result305);
		$foto5 = $data315['foto_tipos_marcas'];
		$link5 = $data315['fktipos_tipos_marcas'];
		?>
		<!--Fin consulta de imagenes aeropostale-->
<!-- Contenido nuevo aeropostale-->
<section id="marca-aeropostale">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $banner03;?>" alt="" class="img-responsive">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=3&id_cat='.$link1;} ?>"><img src="webroot/archivos/<?php echo $foto1;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=3&id_cat='.$link2;} ?>"><img src="webroot/archivos/<?php echo $foto2;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=3&id_cat='.$link3;} ?>"><img src="webroot/archivos/<?php echo $foto3;?>" alt="" class="img-responsive"></a></div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4"><a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=3&id_cat='.$link4;} ?>"><img src="webroot/archivos/<?php echo $foto4;?>" alt="" class="img-responsive"></a></div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4"><a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=3&id_cat='.$link5;} ?>"><img src="webroot/archivos/<?php echo $foto5;?>" alt="" class="img-responsive"></a></div>
		</div>
	</div>
</section>
<?php 	}?>
<!-- Fin Contenido nuevo aeropostale-->
    	<!--consulta de imagenes Innovatore-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=4 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result004=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=4 ");
		$data04=mysqli_fetch_assoc($result004);
		$banner04= $data04['banner_marca'];

		$result401=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=56 ");
		$data411=mysqli_fetch_assoc($result401);
		$foto1 = $data411['foto_tipos_marcas'];
		$link1 = $data411['fktipos_tipos_marcas'];

		$result402=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=57 ");
		$data412=mysqli_fetch_assoc($result402);
		$foto2 = $data412['foto_tipos_marcas'];
		$link2 = $data412['fktipos_tipos_marcas'];

		$result403=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=58 ");
		$data413=mysqli_fetch_assoc($result403);
		$foto3 = $data413['foto_tipos_marcas'];
		$link3 = $data413['fktipos_tipos_marcas'];

		$result404=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=59 ");
		$data414=mysqli_fetch_assoc($result404);
		$foto4 = $data414['foto_tipos_marcas'];
		$link4 = $data414['fktipos_tipos_marcas'];

		$result405=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=60 ");
		$data415=mysqli_fetch_assoc($result405);
		$foto5 = $data415['foto_tipos_marcas'];
		$link5 = $data415['fktipos_tipos_marcas'];

		$result406=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=61 ");
		$data416=mysqli_fetch_assoc($result406);
		$foto6 = $data416['foto_tipos_marcas'];
		$link6 = $data416['fktipos_tipos_marcas'];
		?>
		<!--Fin consulta de imagenes Innovatore-->
<!-- Contenido nuevo Innovatore-->
<section id="marca-innovatore">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img alt="" class="img-responsive" src="webroot/archivos/<?php echo $banner04;?>">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link1;} ?> ">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto1;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-8">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link2;} ?> ">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto2;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link3;} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto3;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link4;} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto4;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link5;} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto5;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=4&id_cat='.$link6;} ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto6;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
	</div>
</section>
<?php 	}?>
<!--Fin Contenido nuevo Innovatore-->
<!--consulta de imagenes ritzy-of-italy-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=5 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result005=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=5 ");
		$data05=mysqli_fetch_assoc($result005);
		$banner05= $data05['banner_marca'];

		$result501=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=93");
		$data511=mysqli_fetch_assoc($result501);
		$foto1 = $data511['foto_tipos_marcas'];
		$link1 = $data511['fktipos_tipos_marcas'];

		$result502=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=94 ");
		$data512=mysqli_fetch_assoc($result502);
		$foto2 = $data512['foto_tipos_marcas'];
		$link2 = $data512['fktipos_tipos_marcas'];

		$result503=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=95");
		$data513=mysqli_fetch_assoc($result503);
		$foto3 = $data513['foto_tipos_marcas'];
		$link3 = $data513['fktipos_tipos_marcas'];

		$result504=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=96");
		$data514=mysqli_fetch_assoc($result504);
		$foto4 = $data514['foto_tipos_marcas'];
		$link4 = $data514['fktipos_tipos_marcas'];

		$result505=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=97");
		$data515=mysqli_fetch_assoc($result505);
		$foto5 = $data515['foto_tipos_marcas'];
		$link5 = $data515['fktipos_tipos_marcas'];

		$result506=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=98");
		$data516=mysqli_fetch_assoc($result506);
		$foto6 = $data516['foto_tipos_marcas'];
		$link6 = $data516['fktipos_tipos_marcas'];
		?>
<!--Fin consulta de imagenes ritzy-of-italy-->
<!-- Contenido nuevo ritzy-of-italy-->
<section id="ritzy">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $banner05;?>" alt="" class="img-responsive">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link1;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto1;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link2;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto2;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link3;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto3;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link4;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto4;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link5;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto5;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=5&id_cat='.$link6;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto6;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
	</div>
</section>
<?php 	}?>
<!--consulta de imagenes renzo-lucciano-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=6 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result006=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=6");
		$data06=mysqli_fetch_assoc($result006);
		$banner06= $data06['banner_marca'];

		$result601=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=87");
		$data611=mysqli_fetch_assoc($result601);
		$foto1 = $data611['foto_tipos_marcas'];
		$link1 = $data611['fktipos_tipos_marcas'];

		$result602=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=88 ");
		$data612=mysqli_fetch_assoc($result602);
		$foto2 = $data612['foto_tipos_marcas'];
		$link2 = $data612['fktipos_tipos_marcas'];

		$result603=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=89");
		$data613=mysqli_fetch_assoc($result603);
		$foto3 = $data613['foto_tipos_marcas'];
		$link3 = $data613['fktipos_tipos_marcas'];

		$result604=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=90");
		$data614=mysqli_fetch_assoc($result604);
		$foto4 = $data614['foto_tipos_marcas'];
		$link4 = $data614['fktipos_tipos_marcas'];

		$result605=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=91");
		$data615=mysqli_fetch_assoc($result605);
		$foto5 = $data615['foto_tipos_marcas'];
		$link5 = $data615['fktipos_tipos_marcas'];

		$result606=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=92");
		$data616=mysqli_fetch_assoc($result606);
		$foto6 = $data616['foto_tipos_marcas'];
		$link6 = $data616['fktipos_tipos_marcas'];
		?>
<!--Fin consulta de imagenes renzo-lucciano-->
<!-- Contenido nuevo -->
<section id="marca-lucciano">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $banner06;?>" alt="" class="img-responsive">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link1;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto1;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-6">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link2;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto2;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link3;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto3;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-8">
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link4;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto4;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link5;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto5;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=6&id_cat='.$link6;}; ?>">
					<div  style="width: 100%; height:400px; background-image: url(webroot/archivos/<?php echo $foto6;?>); background-size: cover; background-position: center;"></div>
				</a>
			</div>
		</div>
	</div>
</section>
<?php 	} ?>
<!--Fin Contenido nuevo renzo-lucciano-->
     <!--consulta de imagenes energie-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=9 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result105=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=9 ");
		$data105=mysqli_fetch_assoc($result105);
		$banner150 = $data105['banner_marca'];

		$result100=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=138 ");
		$data100=mysqli_fetch_assoc($result100);
		$foto1 = $data100['foto_tipos_marcas'];
		$link1 = $data100['fktipos_tipos_marcas'];

		$result101=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=139 ");
		$data101=mysqli_fetch_assoc($result101);
		$foto2 = $data101['foto_tipos_marcas'];
		$link2 = $data101['fktipos_tipos_marcas'];

		$result102=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=140 ");
		$data102=mysqli_fetch_assoc($result102);
		$foto3 = $data102['foto_tipos_marcas'];
		$link3 = $data102['fktipos_tipos_marcas'];

		$result103=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=141 ");
		$data103=mysqli_fetch_assoc($result103);
		$foto4 = $data103['foto_tipos_marcas'];
		$link4 = $data103['fktipos_tipos_marcas'];

		$result104=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=142 ");
		$data104=mysqli_fetch_assoc($result104);
		$foto5 = $data104['foto_tipos_marcas'];
		$link5 = $data104['fktipos_tipos_marcas'];
		?>
		<!--Fin consulta de imagenes energie-->
<!-- Contenido nuevo energie-->
<section id="marca-energie">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img class="img-responsive" src="webroot/archivos/<?php echo $banner150;?>" alt="">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=9&id_cat='.$link1;}; ?>">
                  <img class="img-responsive" src="webroot/archivos/<?php echo $foto1;?>" alt="">
                </a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
            	<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=9&id_cat='.$link2;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto2;?>" alt="">
                </a>
				<div class="height-30"></div>
                <a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=9&id_cat='.$link3;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto4;?>" alt="">
                </a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
            <a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=9&id_cat='.$link4;}; ?>">
				<img class="img-responsive" src="webroot/archivos/<?php echo $foto3;?>" alt="">
            </a>
				<div class="height-30"></div>
            <a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=9&id_cat='.$link5;}; ?>">
				<img class="img-responsive" src="webroot/archivos/<?php echo $foto5;?>" alt="">
            </a>
			</div>
		</div>
	</div>
</section>
<?php 	} ?>
<!-- fin Contenido nuevo -->
<!--consulta de imagenes hartzvolk-->
        <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=7 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result105=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=7 ");
		$data105=mysqli_fetch_assoc($result105);
		$banner150 = $data105['banner_marca'];

		$result100=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=143 ");
		$data100=mysqli_fetch_assoc($result100);
		$foto1 = $data100['foto_tipos_marcas'];
		$link1 = $data100['fktipos_tipos_marcas'];

		$result101=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=144 ");
		$data101=mysqli_fetch_assoc($result101);
		$foto2 = $data101['foto_tipos_marcas'];
		$link2 = $data101['fktipos_tipos_marcas'];

		$result102=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=145 ");
		$data102=mysqli_fetch_assoc($result102);
		$foto3 = $data102['foto_tipos_marcas'];
		$link3 = $data102['fktipos_tipos_marcas'];

		$result103=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=146 ");
		$data103=mysqli_fetch_assoc($result103);
		$foto4 = $data103['foto_tipos_marcas'];
		$link4 = $data103['fktipos_tipos_marcas'];

		$result104=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=147 ");
		$data104=mysqli_fetch_assoc($result104);
		$foto5 = $data104['foto_tipos_marcas'];
		$link5 = $data104['fktipos_tipos_marcas'];

		$result105=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=148 ");
		$data105=mysqli_fetch_assoc($result105);
		$foto6 = $data105['foto_tipos_marcas'];
		$link6 = $data105['fktipos_tipos_marcas'];
		?>
<!--Fin consulta de imagenes hartzvolk-->
<!-- Contenido nuevo hartzvolk-->
<section id="marca-energie">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

					<img class="img-responsive" src="webroot/archivos/<?php echo $banner150;?>" alt="">

			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link1;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto1;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link2;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto4;?>" alt="">
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link3;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto2;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link4;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto5;?>" alt="">
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link5;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto3;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link6;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto6;?>" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
 <?php } ?>
 <!-- fin Contenido nuevo hartzvolk-->
 <!--consulta de imagenes stropicciato-->
         <?php
		$result10 = $db_Full->select_sql("SELECT * FROM tbl_tipos_marcas  where fkmarcas_tipos_marcas=8 and fkmarcas_tipos_marcas=".$_GET['id_marca']." limit 1");
	    while ($row_banner_marcas10 = mysqli_fetch_array($result10))
	    {

		$result105=$db_Full->select_sql("SELECT banner_marca from tbl_marcas where id_marca=8 ");
		$data105=mysqli_fetch_assoc($result105);
		$banner150 = $data105['banner_marca'];

		$result100=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=119 ");
		$data100=mysqli_fetch_assoc($result100);
		$foto1 = $data100['foto_tipos_marcas'];
		$link1 = $data100['fktipos_tipos_marcas'];

		$result101=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=120 ");
		$data101=mysqli_fetch_assoc($result101);
		$foto2 = $data101['foto_tipos_marcas'];
		$link2 = $data101['fktipos_tipos_marcas'];

		$result102=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=121 ");
		$data102=mysqli_fetch_assoc($result102);
		$foto3 = $data102['foto_tipos_marcas'];
		$link3 = $data102['fktipos_tipos_marcas'];

		$result103=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=122 ");
		$data103=mysqli_fetch_assoc($result103);
		$foto4 = $data103['foto_tipos_marcas'];
		$link4 = $data103['fktipos_tipos_marcas'];

		$result104=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=123 ");
		$data104=mysqli_fetch_assoc($result104);
		$foto5 = $data104['foto_tipos_marcas'];
		$link5 = $data104['fktipos_tipos_marcas'];

		$result105=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=124 ");
		$data105=mysqli_fetch_assoc($result105);
		$foto6 = $data105['foto_tipos_marcas'];
		$link6 = $data105['fktipos_tipos_marcas'];

		$result106=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=149 ");
		$data106=mysqli_fetch_assoc($result106);
		$foto7 = $data106['foto_tipos_marcas'];
		$link7 = $data106['fktipos_tipos_marcas'];

		$result107=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=150 ");
		$data107=mysqli_fetch_assoc($result107);
		$foto8 = $data107['foto_tipos_marcas'];
		$link8 = $data107['fktipos_tipos_marcas'];

		$result108=$db_Full->select_sql("SELECT foto_tipos_marcas,fktipos_tipos_marcas from tbl_tipos_marcas where id_tipos_marcas=151 ");
		$data108=mysqli_fetch_assoc($result108);
		$foto9 = $data108['foto_tipos_marcas'];
		$link9 = $data108['fktipos_tipos_marcas'];
		?>
<!--Fin consulta de imagenes stropicciato-->
<!-- Contenido nuevo stropicciato-->
<section id="marca-rock-and-republic">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="webroot/archivos/<?php echo $banner150;?>" alt="" class="img reponsive">
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link1;}; ?>"><img src="webroot/archivos/<?php echo $foto1;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link2;}; ?>"><img src="webroot/archivos/<?php echo $foto2;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link3;}; ?>"><img src="webroot/archivos/<?php echo $foto3;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link4;}; ?>"><img src="webroot/archivos/<?php echo $foto4;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link5;}; ?>"><img src="webroot/archivos/<?php echo $foto5;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link6;}; ?>"><img src="webroot/archivos/<?php echo $foto6;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
        <div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link7=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link7;}; ?>"><img src="webroot/archivos/<?php echo $foto7;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link8=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link8;}; ?>"><img src="webroot/archivos/<?php echo $foto8;?>" alt="" class="img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<a href="<?php if($link9=='7'){ echo '#';}else{ echo 'productos.php?id_marca=8&id_cat='.$link9;}; ?>"><img src="webroot/archivos/<?php echo $foto9;?>" alt="" class="img-responsive"></a>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!--Fin Contenido nuevo stropicciato-->
<!-- Contenido nuevo etiqueta negra-->
<?php
if ($_GET['id_marca']==10) {
	//Consulta Banner
		$result010=$db_Full->select_sql("SELECT banner_marca FROM tbl_marcas WHERE id_marca=10");
		$data010=mysqli_fetch_assoc($result010);
		$banner010 = $data010['banner_marca'];

		//Lista imagenes

		$result201=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=152 ");
		$data211=mysqli_fetch_assoc($result201);
		$foto1 = $data211['foto_tipos_marcas'];
		$link1 = $data211['fktipos_tipos_marcas'];

		$result202=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=153 ");
		$data212=mysqli_fetch_assoc($result202);
		$foto2 = $data212['foto_tipos_marcas'];
		$link2 = $data212['fktipos_tipos_marcas'];

		$result203=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=154 ");
		$data213=mysqli_fetch_assoc($result203);
		$foto3 = $data213['foto_tipos_marcas'];
		$link3 = $data213['fktipos_tipos_marcas'];

		$result204=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=155 ");
		$data214=mysqli_fetch_assoc($result204);
		$foto4 = $data214['foto_tipos_marcas'];
		$link4 = $data214['fktipos_tipos_marcas'];

		$result205=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=156 ");
		$data215=mysqli_fetch_assoc($result205);
		$foto5 = $data215['foto_tipos_marcas'];
		$link5 = $data215['fktipos_tipos_marcas'];

		$result206=$db_Full->select_sql("SELECT * FROM tbl_tipos_marcas WHERE id_tipos_marcas=157 ");
		$data216=mysqli_fetch_assoc($result206);
		$foto6 = $data216['foto_tipos_marcas'];
		$link6 = $data216['fktipos_tipos_marcas'];
	?>
<section id="marca-etiqueta-negra">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

					<img class="img-responsive" src="webroot/archivos/<?php echo $banner010;?>" alt="">

			</div>
		</div>
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php if($link1=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link1;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto1;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link2=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link2;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto4;?>" alt="">
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link3=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link3;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto2;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link4=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link4;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto5;?>" alt="">
				</a>
			</div>
			<div class="height-30 visible-xs"></div>
			<div class="col-sm-4">
				<a href="<?php if($link5=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link5;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto3;?>" alt="">
				</a>
				<div class="height-30"></div>
				<a href="<?php if($link6=='7'){ echo '#';}else{ echo 'productos.php?id_marca=7&id_cat='.$link6;}; ?>">
					<img class="img-responsive" src="webroot/archivos/<?php echo $foto6;?>" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<?php   } ?>
<!-- fin Contenido nuevo tiqueta negra-->




</div>
<!--FIN FOTOS MARCAS-->

<!--FOOTER-->
<?php
include("footer.php");
?>



</body>
</html>
