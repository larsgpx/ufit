<?php 
session_start(); 
unset($_SESSION['id_cliente']); 
unset($_SESSION['nombre_cliente']); 
unset($_SESSION['carro']); 

header("Location:cuenta"); 
?>}