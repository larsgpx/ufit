<?php
include('../conexion.php');

$idorden=$_POST['orden'];
//orden 1: de mayor a menor
//orden 2: de menor a mayor
$id_tipo=$_POST['idtipo'];
$tipofiltro=$_POST['filtro'];
$get=$_POST['get'];
$get2=$_POST['get2'];

if ($tipofiltro==11) {
	if ($idorden==1) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fktipo_producto='".$id_tipo."' group by precio_producto DESC", $link);
	}elseif($idorden==2) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas  where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fktipo_producto='".$id_tipo."' group by precio_producto ASC", $link);
	}
    $cont=1;
	 while ($row10 = mysql_fetch_array($result1))
     {
        if ($cont%2>0) { ?>
         <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
        <?php  }else{   ?>
         <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
    <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>


 <?php
}elseif($tipofiltro==12) {
	if ($idorden==1) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fkcategoria_productos_categorias='".$get."' and fktipo_productos_categorias='".$id_tipo."' group by tbl_productos.precio_producto  DESC", $link);
	}elseif($idorden==2) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fkcategoria_productos_categorias='".$get."' and fktipo_productos_categorias='".$id_tipo."' group by tbl_productos.precio_producto ASC", $link);
  	}
	 $cont=1;
     while ($row10 = mysql_fetch_array($result1))
     {
        if ($cont%2>0) { ?>
         <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
        <?php  }else{   ?>
                <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
         <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
<?php 
}elseif($tipofiltro==13) {
    if ($idorden==1) {
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas='".$get2."' and fktipo_productos_marcas='".$get."' group by tbl_productos.precio_producto  DESC", $link);
    }elseif($idorden==2) {
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkmarca_productos_marcas='".$get2."' and fktipo_productos_marcas='".$get."' group by tbl_productos.precio_producto ASC", $link);
    }
     $cont=1;
     while ($row10 = mysql_fetch_array($result1))
     {
        if ($cont%2>0) { ?>
         <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
        <?php  }else{   ?>
                <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
          <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
<?php 
}elseif ($tipofiltro==14) {
	if ($idorden==1) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fksubcategoria_productos_categorias='".$get."' and fktipo_productos_categorias='".$id_tipo."' order by tbl_productos.precio_producto  DESC", $link);
	}elseif($idorden==2) {
		$result1 = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_productos_categorias,tbl_marcas, tbl_productos_marcas where fkmarca_productos_marcas=id_marca and fkproducto_productos_marcas=id_producto and fkproducto_productos_categorias=id_producto and fksubcategoria_productos_categorias='".$get."' and fktipo_productos_categorias='".$id_tipo."' order by tbl_productos.precio_producto ASC", $link);
	}
	 $cont=1;
     while ($row10 = mysql_fetch_array($result1))
     {
        if ($cont%2>0) { ?>
         <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
        <?php  }else{   ?>
                <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
      <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

<?php }elseif ($tipofiltro==15) {
    if ($idorden==1) {
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_productos p 
                    INNER JOIN tbl_productos_marcas pm ON p.id_producto=pm.fkproducto_productos_marcas 
                    INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca 
                    INNER JOIN tbl_producto_persona pp ON p.id_producto=pp.id_producto 
                    INNER JOIN tbl_fecha_registro_producto f ON p.id_producto=f.id_producto 
                    WHERE pp.id_tipo_persona='".$get2."' AND f.fecha_registro BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND p.fktipo_producto='".$get."' order by p.precio_producto  DESC", $link);
    }elseif($idorden==2) {
        $result1 = $db_Full->select_sql("SELECT * FROM tbl_productos p 
                    INNER JOIN tbl_productos_marcas pm ON p.id_producto=pm.fkproducto_productos_marcas 
                    INNER JOIN tbl_marcas m ON pm.fkmarca_productos_marcas=m.id_marca 
                    INNER JOIN tbl_producto_persona pp ON p.id_producto=pp.id_producto 
                    INNER JOIN tbl_fecha_registro_producto f ON p.id_producto=f.id_producto 
                    WHERE pp.id_tipo_persona='".$get2."' AND f.fecha_registro BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND p.fktipo_producto='".$get."' order by p.precio_producto ASC", $link);
    }
     $cont=1;
     while ($row10 = mysql_fetch_array($result1))
     {
        if ($cont%2>0) { ?>
         <div class="row">
                    <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
        <?php  }else{   ?>
                <div class="col-xs-6 fuente_georgia">
                        <a href="D-<?php echo $row10["id_producto"]; ?>-<?php echo str_replace(' ','-',strtolower($row10['titulo_producto'])); ?>"><img src="admin/aplication/webroot/archivos/<?php echo $row10["foto_producto"]; ?>" alt="" class="img-responsive"></a>
                        <div class="height-10"></div>
                        <h4 class="text-center section-title font_size18"><?php echo $row10["titulo_producto"]; ?></h4>
                        <h5 class="text-center font_size18"><?php echo $row10["nombre_marca"]; ?></h5>
                        <?php 
                        if ($row10['oferta_producto']=="SI") {
                            echo '<h5 class="text-center font_size18"><span class="text-danger"><s>$'.$row10['precio_producto'].'</s></span></h5>';
                        }?>
                        <hr>
                        <div class="text-center font_size16 precio">
                        <span><?php
                                        if($row10['oferta_producto']=="SI")
                                        {echo '$'.$row10['precio_oferta_producto'];
                                        }else
                                        { echo  '$'.$row10["precio_producto"]; }
                                        ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>
     <?php } $cont=$cont+1; }?>

                    </div>
                    <div class="row">
                        <div class="height-30"></div>
                    </div>

<?php  
}else{
	echo 'Debe seleccionar';
	
}

//$consulta="";
//@$resultado = $db_Full->select_sql($consulta);

//if($resultado){
		
?>


 <?php //} ?>