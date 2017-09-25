<?php

$db_Full = new db_model();
$db_Full->conectar();

$result2=$db_Full->select_sql("SELECT * from tbl_clientes where id_cli='".$_SESSION['id_cliente']."' ");
$data2=mysqli_fetch_assoc($result2);
$id_cliente = $data2['id_cli'];
$nombre_cliente = $data2['nombre_cli'];
$email_cliente = $data2['email_cli'];
$clave_cliente = $data2['clave_cli'];
$nombre_facturacion_cli = $data2['nombre_facturacion_cli'];
$apellido_facturacion_cli = $data2['apellido_facturacion_cli'];
$dir1_facturacion_cli = $data2['dir1_facturacion_cli'];

$nombre_direccion_cli = $data2['nombre_direccion_cli'];
$apellido_direccion_cli = $data2['apellido_direccion_cli'];
$dir1_direccion_cli = $data2['dir1_direccion_cli'];
$envio = $data2['envio_cli'];

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ROYALTY</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!-- Sección de Detalle de la cuenta -->
<section id="detalle-cuenta">
    <div class="container">
        <div class="row fuente_georgia">
            <div class="col-sm-12 padding-off">
                <h1 class="font_size18">Cuenta de "<?php echo $_SESSION['nombre_cliente'];?>"</h1>
            </div>
        </div>
        <div class="row fuente_georgia panel-grey">
            <div class="col-sm-3">
                <h4 class="font_size14">Información de la cuenta</h4>
                <p><?php echo $email_cliente;?></p>
                <ul class="list-unstyled">
                    <li><a href="editar_email.php">Editar ></a></li>
                    <li><a href="mis-pedidos">Mis Pedidos ></a></li>
                    <li><a href="cerrar_sesion.php">Cerrar Sesión ></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="font_size14">Información de facturación</h4>
                <p><?php echo $nombre_facturacion_cli . ' ' . $apellido_facturacion_cli;  ?><br> <?php echo $dir1_facturacion_cli; ?></p>
                <ul class="list-unstyled">
                    <li><a href="editar_facturacion.php">Editar ></a></li>
                    <li><a href="editar_tarjeta.php">Agregar tarjeta de crédito ></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="font_size14">Dirección de envío</h4>
                <p><?php echo $nombre_direccion_cli;  ?> &nbsp; <?php echo $apellido_direccion_cli;  ?> <br> <?php echo $dir1_direccion_cli; ?></p>
                <ul class="list-unstyled">
                    <li><a href="editar_direccion.php">Editar ></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="font_size14">Método de envío</h4>
                <p><?php echo $envio;?></p>
                <ul class="list-unstyled">
                    <li><a href="editar_envio.php">Editar ></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


</body>
</html>
