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

$id = $id_page_table;//id del new arrivals
//lista datos del new arrivals
$result1 = $db_Full->select_sql("SELECT * 
	                             FROM tbl_new_arrivals 
	                             WHERE id_new_arrivals = $id");

$data1   = mysqli_fetch_assoc($result1);
$i = 0;

for ($i=1; $i <= 6; $i++) { 
	$data_tipo['foto'.$i]  			= $data1['foto'.$i];
	$data_tipo['tipo_foto'.$i] 		= $data1['tipo_foto'.$i];
	$data_tipo['foto_columna'.$i] 	= $data1['foto_columna'.$i];
	$data_tipo['width_foto'.$i] 	= $data1['width_foto'.$i];
	$data_tipo['height_foto'.$i] 	= $data1['height_foto'.$i];
	$data_tipo['url_foto'.$i]       = $data1['url_foto'.$i];

	/*$query_u = $db_Full->select_sql("select url_page_tbl from tbl_productos where id_producto =".$data1['tipo_foto'.$i]);
	$url     = mysqli_fetch_assoc($query_u);
	$data_tipo['url_foto'.$i]  = (!empty($url['url_page_tbl'])) ? $url['url_page_tbl'] :  '#';*/
}

?>
<!-- Contenido nuevo -->
<section id="marca-lucciano">
    <div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $data1['banner_new_arrivals']?>" alt="" class="img-responsive">
				</div>
			</div>
			<div class="row">
				<div class="height-30"></div>
			</div>
			<?php  
				
				$i = 0; $columna = 0; $html = '';

				for ($i = 1; $i <= 6; $i++) {
					$foto1       = $data_tipo['foto'.$i];
					$tipo        = $data_tipo['tipo_foto'.$i];
					$n_column	 = $data_tipo['foto_columna'.$i];
					$enlace      = (!empty($data_tipo['url_foto'.$i])) ? $BASE_URL.$data_tipo['url_foto'.$i] : '#';
					/***********ANCHO Y ALTO IMG**********************/
					$ff_w      	 = isset($data_tipo['width_foto'.$i]) ? $data_tipo['width_foto'.$i]  : '0';
					$ff_h	     = isset($data_tipo['height_foto'.$i])? $data_tipo['height_foto'.$i] : '0';
					$width 		 = (0 < $ff_w)? 'width = "'.$ff_w.'"':'';
					$height 	 = (0 < $ff_h)? 'height = "'.$ff_h.'"':'';
					$pw 		 = (substr($ff_w,strlen($ff_w)-1) == '%') ? '%':'px';  
					$ph 	     = (substr($ff_h,strlen($ff_h)-1) == '%') ? '%':'px';
					$style       = ($ff_w != '' && $ff_h != '' && $ff_w != 0 && $ff_h != 0) ? 'style = "background-image: url('.$BASE_URL.'/webroot/archivos/'.$foto1.'); display:block; background-size: cover; background-position: center; width: '.$ff_w.$pw.'; height: '.$ff_h.$ph.'"':'';

					$style_img       = ($ff_w != '' && $ff_h != '' && $ff_w != 0 && $ff_h != 0) ? 'style = "width: '.$ff_w.$pw.'; height: '.$ff_h.$ph.'"':'style=""';
					/**************************************************/
					if($columna == 0){
						$html   .= '<div class="row">';
						$html   .= '<div class="col-sm-'.$n_column.'" data="'.$i.'">';
						$html   .= '<a '.$style.' href="'.$enlace.'">';
									  
									  if($style == '' && !empty($foto1)){
									  	$html .= '<img '.$style_img.' '.$width.' '.$height.' src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
									  }

						$html   .= '</a>';
						$html   .= '</div>';
						$columna    += $n_column;
					}
					else{
							   if($columna == 12){
							   	    $html .= '</div>';
							   	    $html .= '<div class="row">';
									  $html .= '<div class="height-30"></div>';
								    $html .= '</div>';

								    $html   .= '<div class="row">';
									$html   .= '<div class="col-sm-'.$n_column.'" data="'.$i.'">';
										$html   .= '<a '.$style.'  href="'.$enlace.'">';

												if($style == '' && !empty($foto1)){
													$html .= '<img '.$style_img.' '.$width.' '.$height.' src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
												}	
													  
										$html   .= '</a>';
									$html   .= '</div>';
							   	    $columna = $n_column; 
							   }
							   else{
							   	 	$html .= '<div class="col-sm-'.$n_column.'" data="'.$i.'">';
										$html .= '<a '.$style.'  href="'.$enlace.'">';

											if($style == '' && !empty($foto1)){
												$html .= '<img '.$style_img.' '.$width.' '.$height.' src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
											}

										$html .= '</a>';
									$html .= '</div>';
									$columna    += $n_column;
							   }
					}
				}
			?>
			<?php echo $html;?>
	</div>

</section>
