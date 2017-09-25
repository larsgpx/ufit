<?php
session_start();
require("libmail/class.phpmailer.php");

$envio = $_POST['envio'];
require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();


// Redirect to home if no client present on session
$royaltyUtils->redirectIfNotClient(true);

$db_Full->select_sql(" UPDATE tbl_clientes SET envio_cli='".$envio."'  where id_cli='".$_SESSION['id_cliente']."'  ")or die(mysql_error());

?>
