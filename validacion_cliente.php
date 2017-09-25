<?php 
session_start(); 

if($_SESSION['id_cliente']!="")
{
	header("Location:detalle-cuenta");	
}else
{
	header("Location:cuenta"); 
}

?>