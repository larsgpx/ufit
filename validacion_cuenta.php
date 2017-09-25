<?php
session_start();
extract($_REQUEST);

unset($_GET['PHPSESSID']);
unset($_GET['_ga']);

if($_SESSION['id_cliente']=="")
{
    header("Location:cuenta" . http_build_query($_GET));
}else
{
    header("Location:pago" . http_build_query($_GET));
}


?>
