<?php
session_start();
extract($_REQUEST);

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model(); 
$db_Full->conectar(); 

$id=$id_producto;

$color=$colorProd;
$talla=$TallaProd;

$_SESSION['id']=$id;
if($cantidad=="")
{
  $cantidad = 1;
}

// Check if we receive a size or color
if(!isset($talla)){
  $talla = '';
}
if(!isset($color)){
  $color = '';
}

if($color!="undefined" && $talla!="undefined")
{
    $analizar = $db_Full->select_sql("SELECT nombre_item_categoria FROM tbl_items_categoria,tbl_productos_filtros where fksubfiltro_productos_filtros=id_item_categoria and  nombre_item_categoria='".$color."' and condicional_productos_filtro=1 ");
    $verfificar=mysqli_num_rows($analizar);

    if($verfificar==0)
    {
        $consulta = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,precio_oferta_producto,oferta_producto,foto2_productos_filtros,nombre_item_filtro,url_page_tbl,descuento_producto FROM tbl_productos,tbl_productos_filtros,tbl_filtros,tbl_items_filtro where fk_item_filtro=id_filtro and fksubfiltro_productos_filtros=id_item_filtro and fkfiltro_productos_filtros=id_filtro and id_producto=fkproducto_productos_filtros and id_producto=".$id." and nombre_item_filtro='".$color."' limit 1");

    }else
    {
      $consulta = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,precio_oferta_producto,oferta_producto,foto2_productos_filtros,tbl_productos.url_page_tbl,descuento_producto FROM tbl_productos,tbl_productos_filtros,tbl_items_categoria where  fksubfiltro_productos_filtros=id_item_categoria  and id_producto=fkproducto_productos_filtros and id_producto=".$id." and nombre_item_categoria='".$color."' limit 1");
    }

}else if($color=="undefined" && $talla!="undefined")
{
$consulta = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,precio_oferta_producto,oferta_producto,foto2_productos_filtros,nombre_item_filtro,url_page_tbl,foto_producto,descuento_producto FROM tbl_productos,tbl_productos_filtros,tbl_filtros,tbl_items_filtro where fk_item_filtro=id_filtro and fksubfiltro_productos_filtros=id_item_filtro and fkfiltro_productos_filtros=id_filtro and id_producto=fkproducto_productos_filtros and id_producto=".$id."  limit 1");

}else 
{
$consulta = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,precio_oferta_producto,oferta_producto,url_page_tbl,foto_producto,descuento_producto FROM tbl_productos where  id_producto=".$id."  limit 1");
}

$obtener=mysqli_fetch_assoc($consulta);


$id=$obtener['id_producto'];
$titulo=$obtener['titulo_producto'];

  if($obtener['oferta_producto']=="si")
  { $precio= $obtener['precio_producto'] - ($obtener['precio_producto']*$obtener['descuento_producto']/100);
  }else
  { $precio = $obtener['precio_producto']; }


$descripcion=$obtener['descripcion_producto'];
$codigo=$obtener['codigo_producto'];

if($color!="undefined")
{
  $foto=$obtener['foto2_productos_filtros'];
}else
{
  $foto=$obtener['foto_producto'];
}

if($foto=="")
{
  $foto=$obtener['foto_producto'];
}

$url=$obtener['url_page_tbl'];


if(isset($_SESSION['carro'])){
  $carro=$_SESSION['carro'];
}

$carro[$id]=array(
  'id'=>$id,
  'titulo'=>$titulo,
  'precio'=>$precio,
  'descripcion'=>$descripcion,
  'codigo'=>$codigo,
  'cantidad'=>$cantidad,
  'foto'=>$foto,
  'talla' => $talla,
  'color' => $color,
  'url' => $url
);

$_SESSION['carro']=$carro;

$cantidad_final=0;
if(isset($_SESSION['carro']))
{
    foreach ($_SESSION['carro'] as $product) 
    {
        $cantidad_final = $product['cantidad'] + $cantidad_final;
    }
}

echo $cantidad_final;
//header("Location:pago.php");

?>
