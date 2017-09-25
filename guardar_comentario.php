<?php
session_start();
require("libmail/class.phpmailer.php");


$titulo = $_POST['titulo'];
$estrella = $_POST['estrella'];
$comentario = $_POST['comentario'];
$cliente = $_POST['cliente'];
$producto = $_POST['producto'];


require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();


$result2=$db_Full->select_sql("SELECT id_cli,nombre_cli,email_cli,clave_cli from tbl_clientes where id_cli='".$cliente."' ");
$data2=mysqli_fetch_assoc($result2);
$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];
$clave_cliente = $data2['clave_cli'];


if($id_cliente != "")
{
   $db_Full->select_sql("INSERT INTO tbl_comentarios (id_comentario,titulo_comentario,des_comentario,estrella_comentario,fkproducto_comentario,fkcliente_comentario,fecha_comentario)
											 VALUES ('', '".$titulo."' , '".$comentario."' , '".$estrella."' , '".$producto."' , '".$cliente."' , NOW() ) ")or die(mysql_error());
										 
		
		
}
	
					
		
?>