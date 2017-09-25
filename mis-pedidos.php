<?php
session_start();
require("conexion.php");

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
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<?php
include("head.php");
include("header.php");
?>
<!-- Contenido mis pedidos -->
<section id="mis-pedidos">
    <div class="height-20"></div>
    <div class="container fuente_georgia">
        <div class="row">           
            <h1 class="font_size18">Mis pedidos</h1>
        </div>
        <div class="row">
            <div class="height-20"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="table-responsive">
                    <table class="table table-hover border-off">
                        <thead>
                            <tr>
                                <th>Fecha de pedido</th>
                                <th>Número de pedido</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>06/10/2016</td>
                                <td>8975</td>
                                <td>USD $2000</td>
                                <td>Cancelado</td>
                                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#myModal">Ver detalle</a></td>
                            </tr>
                            <tr>
                                <td>06/10/2016</td>
                                <td>8975</td>
                                <td>USD $2000</td>
                                <td>Cancelado</td>
                                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#myModal">Ver detalle</a></td>
                            </tr>
                            <tr>
                                <td>06/10/2016</td>
                                <td>8975</td>
                                <td>USD $2000</td>
                                <td>Cancelado</td>
                                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#myModal">Ver detalle</a></td>
                            </tr>
                            <tr>
                                <td>06/10/2016</td>
                                <td>8975</td>
                                <td>USD $2000</td>
                                <td>Cancelado</td>
                                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#myModal">Ver detalle</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h4 class="section-title">Detalles del pedido</h4>
                <ul class="list-unstyled">
                    <li><b>Número de pedido:</b> 8975</li>
                    <li><b>Fecha de pedido:</b> 06/10/2016</li>
                    <li><b>Estado:</b> Cancelado</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Unidades</th>
                                <th>Artículo</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Pantalón</td>
                                <td>USD $70.00</td>
                                <td>USD $70.00</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Pantalón</td>
                                <td>USD $70.00</td>
                                <td>USD $70.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="height-30"></div>
                    <table class="table table-hover border-off">
                        <tbody>
                            <tr>
                                <td class="text-right" colspan="3">Tarjeta de regalo/Código de Dscto. aplicado:</td>
                                <td>- USD $10.00</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Subtotal:</td>
                                <td>USD $60.00</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Empaquetado:</td>
                                <td>USD $0.00</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Shipping:</td>
                                <td>USD $33.75</td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="3">Total a pagar:</th>
                                <th>USD $93.75</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
            <div class="height-30"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <ul class="list-unstyled">
                    <li><b>Método de envío:</b> PERÚ (Vía entrega, Urgente)</li>
                    <li><b>Tiempo de entrega física del producto:</b> 3-4 día(s) laborable(s)*</li>
                    <li><b>Preferencia de envío:</b> Please wait until the entire order is ready before shipping</li>
                    <li><b>Impuestos y aranceles:</b> No pagados por UFIT Perú/Tasas adicionales en la entrega</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Enviar a</th>
                                <th>Facturar a</th>
                                <th>Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Sr. Fernando Braillard<br>Surco<br>LIM,PER<br>051, Lima<br>fbraillard@ufit.pe<br>991-234-567</p>
                                </td>
                                <td>
                                    <p>Sr. Fernando Braillard<br>Surco<br>LIM,PER<br>051, Lima<br>fbraillard@ufit.pe<br>991-234-567</p>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Fin contenido mis pedidos -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
            <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Unidades</th>
                                <th>Artículo</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Pantalón</td>
                                <td>USD $70.00</td>
                                <td>USD $70.00</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Pantalón</td>
                                <td>USD $70.00</td>
                                <td>USD $70.00</td>
                            </tr>
                        </tbody>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<!--FOOTER-->
<?php
include("footer.php");
?>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
</script>
</body>
</html>
