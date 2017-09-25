<?php 
session_start(); 
extract($_GET); 
$carro=$_SESSION['carro']; 
unset($carro[$id]); 
$_SESSION['carro']=$carro; 
header("Location:pago"); 
?>