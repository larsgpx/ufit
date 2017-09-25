<?php
session_start();
require("libmail/class.phpmailer.php");

$nombre = $_POST['nombre'];
$email_1 = $_POST['email_1'];
$clave_1 = $_POST['clave_1'];
$tipo = $_POST['tipo'];

if($tipo=="RUC")
{
    $ruc = $_POST['ruc'];
    $razon = $_POST['razon'];
    $dni = "";
}else
{
    $ruc = "";
    $razon = "";
    $dni = $_POST['dni'];
}


   



$id=$_SESSION['id_cliente'];



require("conexion.php");

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

$result2=$db_Full->select_sql("SELECT id_cli,nombre_cli,email_cli from tbl_clientes where id_cli='".$id."' ");
$data2=mysqli_fetch_assoc($result2);
$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];




$_SESSION['nombre_cliente']=$nombre;


// Change password if it comes any value
if($clave_1 != ''){
    $clave_cliente = $royaltyUtils->hashPassword($clave_1);

    $db_Full->select_sql(" UPDATE tbl_clientes SET nombre_cli='".$nombre."' , email_cli='".$email_1."' , clave_cli='".$clave_cliente."' , ruc_cli='".$ruc."' , razon_cli='".$razon."'  , dni_cli='".$dni."' , tipo_cli='".$tipo."'    where id_cli='".$id."'  ")or die(mysql_error());
}else{
    $db_Full->select_sql(" UPDATE tbl_clientes SET nombre_cli='".$nombre."' , email_cli='".$email_1."' , ruc_cli='".$ruc."' , razon_cli='".$razon."'  , dni_cli='".$dni."' , tipo_cli='".$tipo."' where id_cli='".$id."'  ")or die(mysql_error());
}



        $para = $email_1;
        $asunto = "Royalty, tu contrase&ntilde;a ha sido cambiada";

        $contenido = "<html><body>";

        $contenido .="

        <table width='100%' border='0' cellpadding='0' cellspacing='0'>
        <tr>
        <td align='center'>

        <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Tu contrase&ntilde;a ha sido cambiada</font>  <br><br>

        <table cellpadding='0' cellspacing='0' width='520'>
        <tr>
        <td align='left'><img src='" . $royaltyUtils->baseUrl() . "/images/cabecera_email.jpg'></td>
        </tr>
        <tr><td height='20'></td></tr>
        </table>

        <table cellpadding='0' cellspacing='0' width='520' >
        <tr>
        <td width='40'></td>
        <td align='left' width='440'><font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Estimado/a ".$nombre.",</font></td>
        <td width='40'></td>
        </tr>
        <tr><td width='40' height='20'></td><td width='440' height='20'></td><td width='40' height='20'></td></tr>
        <tr>
        <td width='40'></td>
        <td width='440' align='left'>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Tu contrase&ntilde;a ha sido actualizada.</font><br><br>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Gracias.</font><br><br>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Atentamente, </font> <br>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">ROYALTY </font> <br><br>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">Visita </font>
            <font face=\"Arial, Helvetica, sans-serif\" color=\"#FF0000\" size=\"2\">ROYALTY.PE</font> <br>
        </td>
        <td width='40'></td>
        </tr>
        </table>

        </td>
        </tr>
        </table>
        ";


         $contenido .= "</body></html>";

        //Enviando
        $headers = ("Content-type: text/html; charset=iso-8859-1\r\n");
        $headers .= "From: Royalty.pe <no-reply@royalty.pe>\r\n";

        $variable = mail($para ,$asunto, $contenido, $headers);

        $contenido = "confirmacion";





?>
