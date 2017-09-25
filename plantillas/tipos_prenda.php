<div class="detalle_tipo_prenda">
	<?php
		$db_Full 		  = new db_model();
		$db_Full		 -> conectar();
		$result_marcas	  = $db_Full->select_sql("SELECT id_tipo,foto_tipo FROM tbl_tipos WHERE url_page_tbl = '".$url_final."'");
		$data_marcas	  = mysqli_fetch_assoc($result_marcas);
		$banner_principal = $data_marcas['foto_tipo'];

		$result 		  = $db_Full->select_sql("SELECT foto_tipo_img,fk_tipo_img,numero_columna_tipo,url_page_tbl FROM tbl_tipos_imagenes WHERE fk_tipo_img =".$data_marcas['id_tipo']." order by orden_tipo asc");
	?>
	<section id="marcas_detalle">
		<div class="container">
			<!-- <div class="row">
				<div class="col-sm-12">
					<img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $banner_principal;?>" alt="" class="img-responsive">
				</div>
			</div> -->
			
			<?php 

				$i = 0; $columna = 0; $html = '';

				while($data_tipo   = mysqli_fetch_assoc($result)){
					$i++;
					$foto1       = $data_tipo['foto_tipo_img'];
					$tipo        = $data_tipo['fk_tipo_img'];
					$n_column	 = $data_tipo['numero_columna_tipo'];
					$url         = (!empty($data_tipo['url_page_tbl'])) ? $BASE_URL.$data_tipo['url_page_tbl'] : '#';
					
					if($columna == 0){
						$html   .= '<div class="row">';
						$html   .= '<div class="columna col-sm-'.$n_column.'" data="'.$i.'">';
						$html   .= '<a href="'.$url.'">';
									  $html .= '<img src="'.$BASE_URL.'webroot/archivos/'.$foto1.'" alt="" class="img-responsive">';
						$html   .= '</a>';
						$html   .= '</div>';
						$columna    += $n_column;
					}
					else{
							   if($columna == 12){
							   	    $html .= '</div>';
							   	    $html .= '<div class="row">';
									  $html .= '<div class="height-10"></div>';
								    $html .= '</div>';

								    $html   .= '<div class="row">';
									$html   .= '<div class="columna col-sm-'.$n_column.'" data="'.$i.'">';
										$html   .= '<a href="'.$url.'">';
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
												$html .= '<div class="columna col-sm-'.$n_column.'" data="'.$i.'">';
													$html .= '<a href="'.$url.'">';
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