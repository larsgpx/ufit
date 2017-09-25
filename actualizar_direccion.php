<?php
session_start();
require("libmail/class.phpmailer.php");

$pais = $_POST['pais'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion_1 = $_POST['direccion_1'];
$direccion_2 = $_POST['direccion_2'];
$provincia = $_POST['provincia'];
$departamento = $_POST['departamento'];
$distrito = $_POST['distrito'];
$codigo = $_POST['codigo'];
$telefono = $_POST['telefono'];

require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

// Redirect to home if no client present on session
$royaltyUtils->redirectIfNotClient(true);

$result = $db_Full->select_sql(" UPDATE tbl_clientes SET pais_direccion_cli='".$pais."' , nombre_direccion_cli='".$nombre."'
              , apellido_direccion_cli='".$apellidos."' , dir1_direccion_cli='".$direccion_1."'
              , dir2_direccion_cli='".$direccion_2."'  , fkdepartamento_cli='".$departamento."'  , fkprovincia_cli='".$provincia."' , fkdistrito_cli='".$distrito."'  
              , postal_direccion_cli='".$codigo."' , tel_direccion_cli='".$telefono."' where id_cli='".$_SESSION['id_cliente']."'  ")or die(mysql_error());
?>
