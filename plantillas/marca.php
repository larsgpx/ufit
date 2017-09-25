<?php
//include("inc.aplication_top.php");
//session_start();
?>
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
	<link href="<?php echo $BASE_URL;?>css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- Popup Plugin Files -->
<script type="text/javascript" src="<?php echo $BASE_URL;?>fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $BASE_URL;?>fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo $BASE_URL;?>fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!--<script src="js/jquery.collagePlus.js"></script>-->
<script src="<?php echo $BASE_URL;?>js/jquery.removeWhitespace.js"></script>
<script src="<?php echo $BASE_URL;?>js/jquery.collageCaption.js"></script>

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

<!--FOTOS MARCAS-->
<div class="detalle_marcas">
	<?php

		$db_Full 		  = new db_model();
		$db_Full		 -> conectar();
		$result_marcas	  = $db_Full->select_sql("SELECT id_marca,
												         banner_marca 
												  FROM   tbl_marcas 
												  WHERE  url_page_tbl = '".$url_final."'");

		$data_marcas	  = mysqli_fetch_assoc($result_marcas);
		$banner_principal = $data_marcas['banner_marca'];
		$result 		  = $db_Full->select_sql("SELECT foto_tipos_marcas,
														 url_page_tbl,
														 fktipos_tipos_marcas,
														 numero_columna_marcas 
												  FROM   tbl_tipos_marcas 
												  WHERE  fkmarcas_tipos_marcas =".$data_marcas['id_marca']." 
														 order by orden_tipo_marcas asc");

	?>
	<section id="marcas_detalle">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 columna">
					<img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $banner_principal;?>" alt="" class="img-responsive">
				</div>
			</div>
			<div class="row">
				<div class="height-10"></div>
			</div>
			<?php 

				$i = 0; $columna = 0; $html = '';

				while($data_tipo = mysqli_fetch_assoc($result)){
					$i++;
					$foto1       = $data_tipo['foto_tipos_marcas'];
					$tipo        = $data_tipo['fktipos_tipos_marcas'];
					$n_column	 = $data_tipo['numero_columna_marcas'];
					$url_page    = (!empty($data_tipo['url_page_tbl'])) ? $data_tipo['url_page_tbl'] :  '#';

					if($columna == 0){
						$html    .= '<div class=" row">';
						$html    .= '<div class="columna col-sm-'.$n_column.'" data="'.$i.'">';
						$html    .= '<a href="'.$BASE_URL.$url_page.'">';
									  $html .= '<img src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
						$html    .= '</a>';
						$html    .= '</div>';
						$columna += $n_column;
					}
					else{
							if($columna == 12){
							   	    $html .= '</div>';
							   	    $html .= '<div class="row">';
									  $html .= '<div class="height-10"></div>';
								    $html .= '</div>';

								    $html   .= '<div class=" row">';
									$html   .= '<div class="columna col-xs-12 col-sm-'.$n_column.'" data="'.$i.'">';
										$html   .= '<a href="'.$BASE_URL.$url_page.'">';
													  $html .= '<img src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
										$html   .= '</a>';
									$html   .= '</div>';
							   	    $columna = $n_column; 
							}
							else{
									if(12 < ($columna + $n_column)){
										$columna  = 12;
									}
									else{
											$html .= '<div class="columna col-xs-12 col-sm-'.$n_column.'" data="'.$i.'">';
											$html .= '<a href="'.$BASE_URL.$url_page.'">';
													$html .= '<img src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
											$html .= '</a>';
										$html .= '</div>';
										$columna    += $n_column;
									}
							}
					}
				}
			?>
			<?php echo $html;?>
		</div>
	</section>

</div>