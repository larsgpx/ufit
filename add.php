<?php
session_start();
extract($_REQUEST);

$db_Full = new db_model(); $db_Full->conectar(); 

$id=$id_producto;
$_SESSION['id']=$id;
if($cantidad==""){
  $cantidad = 1;
}else{
  if(isset($_SESSION['carro'])){
    foreach ($_SESSION['carro'] as $product) {
      if($product['id'] == $id)
      {
         $cantidad = $product['cantidad'] + $cantidad;
        //$cantidad = $cantidad;
        $foundInCart = true;
      }
    }
  }else{
    $cantidad = 1;
  }
}

// Check if we receive a size or color
if(!isset($talla)){
  $talla = '';
}
if(!isset($color)){
  $color = '';
}

$consulta1 = $db_Full->select_sql("SELECT *
    FROM tbl_productos left join tbl_productos_fotos on tbl_productos.id_producto=tbl_productos_fotos.id_productos_fotos
    where id_producto='".$id."' limit 1");
// $consulta1 = $db_Full->select_sql("SELECT id_producto,titulo_producto,precio_producto,descripcion_producto,codigo_producto,nombre_productos_fotos,oferta_producto,precio_oferta_producto FROM tbl_productos,tbl_productos_fotos where id_producto='".$id."' limit 1");
$obtener=mysqli_fetch_row($consulta1);

$id=$obtener[0];
$titulo=$obtener[1];

  if($obtener[10]=="SI")
  { $precio= $obtener[8];
  }else
  { $precio = $obtener[3]; }


$descripcion=$obtener[3];
$codigo=$obtener[4];
$foto=$obtener[6];

$foto=$obtener[6];


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
  'color' => $color
);

$_SESSION['carro']=$carro;

echo $cantidad;
//header("Location:pago.php");

?>
