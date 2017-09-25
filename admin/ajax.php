<?php 
include("../admin/aplication/controlador/inc.aplication_top2.php");
$obj = new Ajax($idioma);
if($_GET['action']){
	$accion = $_GET['action']."Ajax";	
	$obj->$accion();
}?>	