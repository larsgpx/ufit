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
                        <?php
                        $result = $db_Full->select_sql("select id,total,estado,fecha_ingreso from tbl_ordenes where id_cliente='".$_SESSION['id_cliente']."'  ");
                        while ($row = mysqli_fetch_array($result))
                        {
                        ?>
                            <tr>
                                <td><?php echo date('d/m/Y', strtotime($row['fecha_ingreso']));  ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td>S/. <?php echo $row['total']; ?></td>
                                <td><?php echo $row['estado']; ?></td>
                                <td><a href="#" onclick="ver_detalle(<?php echo $row['id']; ?>)" class="text-danger">Ver detalle</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>

        <script>
        function ver_detalle(id)
        {
            $.ajax({
                          type: "POST",
                          url: "ubigeos.php?tipe=pedido&id_cliente=<?php echo $_SESSION['id_cliente']; ?>",
                          data : "id_pedido="+id,
                          success: function(data)
                          {

                              $("#detalle_productos").html(data);


                          }
                    });
        }
        </script>

                <div id="detalle_productos">

                            

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

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
</script>
</body>
</html>
