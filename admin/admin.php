<?php 
include("aplication/controlador/inc.aplication_top.php");
$rol=$_SESSION['id_trabajador'];
// Recordar por 30 dias la cuenta.
if($_POST){
	if($_POST['recordar_si_MKD'] == 'si')
	{
		setcookie ("pass_MKD", "$_POST[password]", time () + 2592000);
		setcookie ("email_MKD", "$_POST[login]", time () + 2592000);
	}else{
		setcookie ("pass_MKD", "", time () + 604800);
		setcookie ("email_MKD", "", time () + 604800);
	}
}


include("aplication/vista/admin.php");

?>