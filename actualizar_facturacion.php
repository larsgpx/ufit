<?php
session_start();
require("libmail/class.phpmailer.php");

$pais = $_POST['pais'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion_1 = $_POST['direccion_1'];
$direccion_2 = $_POST['direccion_2'];
$provincia = $_POST['provincia'];
$codigo = $_POST['codigo'];
$telefono = $_POST['telefono'];

require("conexion.php");


include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

// Redirect to home if no client present on session
$royaltyUtils->redirectIfNotClient(true);

$db_Full->select_sql(" UPDATE tbl_clientes SET pais_facturacion_cli='".$pais."' , nombre_facturacion_cli='".$nombre."'
              , apellido_facturacion_cli='".$apellidos."' , dir1_facturacion_cli='".$direccion_1."'
              , dir2_facturacion_cli='".$direccion_2."' , provincia_facturacion_cli='".$provincia."'
              , postal_facturacion_cli='".$codigo."' , tel_facturacion_cli='".$telefono."' where id_cli='".$_SESSION['id_cliente']."'  ")or die(mysql_error());
?>
