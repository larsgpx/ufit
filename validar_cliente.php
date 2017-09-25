<?php
session_start();
require("conexion.php");

$email = $_POST['email'];
$clave = $_POST['clave'];
$producto = $_POST['producto'];

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

$query = $db_Full->select_sql("SELECT id_cli,nombre_cli,clave_cli from tbl_clientes where email_cli='".$email."' limit 1 ");
$row   = mysqli_fetch_assoc($query);
        
$id = $row['id_cli'];
$nombre = $row['nombre_cli'];



if($producto=="")
{
    if($royaltyUtils->checkPassword($row['clave_cli'], crypt($clave, $row['clave_cli']) ))
    {
        $_SESSION['id_cliente']=$id;
        $_SESSION['nombre_cliente']=$nombre;
        echo 1; //disponible
    }else
    {
        echo 0; //no disponible
    }
}else
{
    if($royaltyUtils->checkPassword($row['clave_cli'], crypt($clave, $row['clave_cli']) ))
    {
        $_SESSION['id_cliente']=$id;
        $_SESSION['nombre_cliente']=$nombre;
        echo 2; //disponible
    }else
    {
        echo 0; //no disponible
    }
}
?>
