<div class="base_slider">
	<div class="slider">
    	 <div id="owl-slider"  class="owl-carousel owl-theme">
         	<?php
         		 $sql_ofer=''; // faltaba definir variable 
         			
				 $sql_ofer.="SELECT id_cate_oferta,banner_cate_oferta FROM tbl_categorias_ofertas where  url_page_tbl='".$url_final."'  ";
				 
				 $result_ofe     = $db_Full->select_sql($sql_ofer);
				 $row_ofe   = mysqli_fetch_array($result_ofe);

				 //while ($row_ofe = mysqli_fetch_array($result_ofe))
				 //{
                    echo '<div class="item"><img src="'.$BASE_URL.'webroot/archivos/'.$row_ofe['banner_cate_oferta'].'" style="width:100%" ></div>';
				 //}
			?>
          </div>

    </div>
</div>
<!--FIN SLIDER-->

<!-- Contenido nuevo -->
<section id="ofertas-muestras">
	<div class="container">
		<div class="row">
			<div class="height-30"></div>
		</div>
		<div class="row">
        
        <?php

		$sql="SELECT pro.url_page_tbl,pro.foto_producto,pro.codigo_producto,pro.descuento_producto,
				     pro.titulo_producto,pro.precio_producto,pro.precio_oferta_producto,nombre_marca
				FROM tbl_productos pro
				inner join tbl_relacionar_productos_ofertas ofp on
				ofp.fkproducto_re_oferta  = pro.id_producto and
				ofp.fkcategoria_re_oferta = ".$row_ofe['id_cate_oferta']."
				inner join tbl_productos_marcas pmar on pmar.fkproducto_productos_marcas=pro.id_producto
				inner join tbl_marcas mar on mar.id_marca = pmar.FKMARCA_PRODUCTOS_MARCAS ";
		//echo $sql;
		$result10 = $db_Full->select_sql($sql);
		$cantidad = 0;

		while ($row10 = mysqli_fetch_array($result10))
		{
			
			if($cantidad % 4 != 0)
			{
		    ?>
			<div class="col-sm-3">
				<a href="<?php echo $BASE_URL.$row10['url_page_tbl']; ?>">
					<img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive">
				</a>
				<h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
				<?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>S/. <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">S/. <?php echo $row10['precio_producto'] - ($row10['descuento_producto']*$row10['precio_producto']/100); ?></span>
			</div>
			<?php
			}else
			{
			?>
            </div>
            <div class="row">
                <div class="height-30"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo $BASE_URL.$row10['url_page_tbl']; ?>">
                    	<img src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive">
                    </a>
                    <h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
                    <?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>S/. <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">S/. <?php echo $row10['precio_producto'] - ($row10['descuento_producto']*$row10['precio_producto']/100); ?></span>
                </div>
            <?php
			}
		$cantidad++;	
		}
	   ?>
	</div>
</section>