<?php 
include("../admin/aplication/controlador/inc.aplication_top2.php");
//$rol=$sesion->getUsuario()->getRol();
// Recordar por 30 dias la cuenta.
$rol=$_SESSION['id_trabajador'];
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

include("aplication/vista/ideas.php");

?>