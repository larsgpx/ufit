<?php
session_start();
require("conexion.php");


if($_SESSION['id_cliente'] != "")
{
    echo 1; //disponible
}else
{
	echo 0; //no disponible
}
?>