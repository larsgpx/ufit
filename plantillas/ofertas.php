<!--SLIDER-->
<table cellpadding="0" cellspacing="0" width="100%" align="center">
<tr><td height="20"></td></tr>
</table>

<div class="base_slider">
	<div class="slider">

    	 <div id="owl-slider"  class="owl-carousel owl-theme">
         			<?php
         			$sql_ofer=''; // faltaba definir variable 
         			
				  if(isset($_GET['id']) && $_GET['id']!="")
				  {
				  	   $sql_ofer.="SELECT * FROM tbl_categorias_ofertas where id_cate_oferta!='' and id_cate_oferta='".$_GET['id']."'  ";
				  }else
				  {
					  $sql_ofer.="SELECT * FROM tbl_banner_ofertas  ";
				  }

				 $result_ofe = $db_Full->select_sql($sql_ofer);
				 while ($row_ofe = mysqli_fetch_array($result_ofe))
				 {
					   if(isset($_GET['id']) && $_GET['id']!="")
					  {
						   $banner=$row_ofe["banner_cate_oferta"];
					  }else
					  {
						  $banner=$row_ofe["imagen_ba"];
						  $links=$row_ofe["link_ba"];
					  }
				 ?>
                 
						  <?php
                          if(isset($_GET['id']) && $_GET['id']!="")
                          {
						  ?>
                                 <div class="item"><img src="webroot/archivos/<?php echo $banner;?>" style="width:100%" ></div>
                         <?php
                         }else
						 {
                         ?>
                         		<a href="<?php echo $links;?>">
                                 <div class="item"><img src="webroot/archivos/<?php echo $banner;?>" style="width:100%" ></div>
                                </a>
                         <?php
						 }
						 ?>
                   
                   <?php
				 }
				 
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
		if(isset($_GET['id']) && $_GET['id']!="")
		{
			$sql="SELECT descuento_producto,precio_oferta_producto,titulo_producto,pro.url_page_tbl as url_prod,foto_producto,codigo_producto,nombre_marca,titulo_producto,precio_producto FROM tbl_ofertas,tbl_productos pro,tbl_tipos,tbl_marcas,tbl_productos_marcas WHERE fkmarca_productos_marcas=id_marca and fkproducto_oferta=id_producto and  id_tipo=fktipo_producto ";

			$sql.=" and fkcategoria_oferta='".$_GET['id']."' group by id_producto ";
		}else
		{
			$sql="SELECT descuento_producto,precio_oferta_producto,pro.titulo_producto,pro.url_page_tbl as url_prod,pro.foto_producto,pro.codigo_producto,nombre_marca,pro.precio_producto FROM tbl_productos pro,tbl_marcas,tbl_productos_marcas WHERE fkproducto_productos_marcas=id_producto AND fkmarca_productos_marcas=id_marca and oferta_producto='SI' group by id_producto ";
		}
		
		$result10 = $db_Full->select_sql($sql);
		$cantidad=0;

		while ($row10 = mysqli_fetch_assoc($result10))
		{
			
			if($cantidad % 4 != 0)
			{
		    ?>
			<div class="col-sm-3">
				<a href="<?php echo $BASE_URL.$row10['url_prod'];?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
				<h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
				<?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>S/. <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">S/. <?php echo $row10['precio_producto'] - ($row10['precio_producto']*$row10['descuento_producto']/100); ?></span>
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
                    <a href="<?php echo $BASE_URL.$row10['url_prod'];?>"><img src="webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                    <h5><?php echo $row10['titulo_producto']; ?><br><small><?php echo $row10['codigo_producto']; ?></small></h5>
                    <?php echo $row10['nombre_marca']; ?><br><span class="text-muted">Precio normal: <s>S/. <?php echo $row10['precio_producto']; ?></s></span><br><span class="text-danger">S/. <?php echo $row10['precio_producto'] - ($row10['precio_producto']*$row10['descuento_producto']/100); ?></span>
                </div>
            <?php
			}
		$cantidad++;	
		}
	   ?>
	</div>
</section>