 <?php

 
 $result = $db_Full->select_sql("SELECT * FROM tbl_asesorias where id_ase='".$id_page_table ."' order by orden_ase asc");
 while ($row_marcas_2 = mysqli_fetch_array($result))
 {
	 $titulo=$row_marcas_2["titulo_ase"];
	 $subtitulo=$row_marcas_2["subtitulo_ase"];
	 $descripcion=$row_marcas_2["descripcion_ase"];
	 $foto=$row_marcas_2["foto2_ase"];
 }
 ?>

<!-- Descripción de la asesoría -->
<section id="informacion-asesoria">
  <div class="container fuente_georgia">
    <div class="row">
      <a href="javascript:history.back()" class="pull-right">Volver a <span class="text-uppercase">asesoría</span></a>
    </div>
    <div class="row">
      <h1 class="text-center text-uppercase">The Essentials</h1>
    </div>
    <div class="row">
      <div class="height-30"></div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <h4 class="text-uppercase">Asesoría experta</h4>
        <div class="height-20"></div>
        <ul class="list-unstyled">
          <?php
            $result100 = $db_Full->select_sql(" SELECT * FROM tbl_asesorias order by orden_ase desc limit 10");
            while ($row100 = mysqli_fetch_array($result100)){
              $url = (!empty($row100['url_page_tbl'])) ? $BASE_URL.$row100['url_page_tbl'] : '#';
              $active = ($row100['url_page_tbl'] == $url_final) ? 'active' : '';
          ?>

          <li><a href="<?php echo $url; ?>" class="<?php echo $active?> font_size14"><?php echo $row100['titulo_ase'];?></a></li>

          <?php
            }
          ?>
        </ul>
      </div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-6">
            <figure>
              <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $foto;?>" class="img-responsive" alt="" />
            </figure>
          </div>
          <div class="col-sm-6">
            <p>
              <?php echo $descripcion; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ./Descripción de la asesoría -->

<!-- Productos relacionados -->
<section id="productos-relacionados">
  <div class="container fuente_georgia">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-2">
        <div class="row">
          <hr>
        </div>
        <div class="row">
          <?php
            $i=1;
            $result10 = $db_Full->select_sql("SELECT tbl_productos.url_page_tbl as url,foto_producto,titulo_producto,codigo_producto,nombre_marca,precio_producto,precio_oferta_producto,id_producto,descuento_producto FROM tbl_asesorias_productos,tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_ase_pro = id_producto and fkase_ase_pro='".$id_page_table."' group by id_producto ");
            while ($row10 = mysqli_fetch_array($result10)){
          ?>

          <div class="col-sm-4">
            <a href="<?php echo $BASE_URL.$row10['url']; ?>">
              <figure>
                <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $row10['foto_producto'];?>" class="img-responsive" alt="" />
              </figure>
            </a>
                   <h5>
                  <?php echo $row10['titulo_producto']; ?><br>
                  <small style="font-size:12px "><?php echo $row10['nombre_marca']; ?></small>
                  </h5>
                  
            <?php
                  if($row10['descuento_producto']>0)
                  {
                  ?>
                  <span class="text-muted" style="font-size:12px ">Precio normal: <s>S/. <?php echo $row10['precio_producto']; ?></s></span><br>
                  <span class="text-danger" style="font-size:15px ">S/. <?php echo $row10['precio_producto'] - ($row10['precio_producto']*$row10['descuento_producto']/100); ?></span>
                  <?php
                  }else
                  {
                  ?>
                     <span class="text-muted" style="font-size:15px ">Precio: S/. <?php echo $row10['precio_producto']; ?></span><br>
                  <?php
                  }
                  ?>


            <div class="height-20"></div>
          </div>

          <?php
              if($i%3==0){
                ?>
        </div>
        <div class="row">
                <?php
              } $i++;
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ./Productos relacionados -->


