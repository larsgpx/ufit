<?php
class Ventas
{
    private $_idioma, $_msgbox;

    public function __construct(Idioma $idioma = null, Msgbox $msg = null)
    {
        $this->_idioma = $idioma;
        $this->_msgbox = $msg;
    }

    public function listVentas()
    {   $db_Full = new db_model(); $db_Full->conectar();

        $sql = " SELECT * FROM tbl_ordenes where id!='' ";

        if ($_GET['dato'] != '') {
            $sql .= " and codigo like '%".$_GET['dato']."%'   ";
        }

        if ($_GET['date-range-picker'] != '') {
            $del = substr($_GET['date-range-picker'], 0, 10);
            $al = substr($_GET['date-range-picker'], 12, 100);

            $sql .= " and fecha_ingreso between '".$del."' and '".$al."' ";
        }

        $sql .= ' order by id desc ';

        $query = $db_Full->select_sql($sql);

        $query10 = $db_Full->select_sql('SELECT COUNT(id) as cantidad FROM tbl_ordenes');
        $row10 = mysqli_fetch_assoc($query10);
        $cantidades = $row10['cantidad'];

        ?>

         <script>
        function mantenimiento(url,id,opcion){
    if(opcion!="delete"){
        location.replace(url+'?action='+opcion+'&id='+id);
    }else if(opcion=="delete"){
        if(!confirm("Esta Seguro que desea Eliminar el Registro")){
            return false;
        }else{
            location.replace(url+'?action='+opcion+'&id='+id);
        }
    }

} </script>

 <!--   <a href="clientes?action=new" class="btn btn-default btn-block">AGREGAR CLIENTES</a>
<br>-->

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Ventas
        </div>


       <!-- <table cellpadding="0" cellspacing="0" border="0" width="100%">

            <td align="left">
            <form action="ventas">
            <input type="text" name="dato" id="dato"  placeholder="Buscar" value="<?php echo $_GET['dato'];
        ?>" style="width:65%" >
            <input type="hidden" name="action" id="action" value="<?php echo $_GET['action'];
        ?>"   >
            <input type="submit" name="buscar" value="FILTRAR LA LISTA" class="btn btn-sm btn-success" style="margin-top:-5px;width:15%">
             <A href="ventas?action=<?php echo $_GET['action'];
        ?>" class="btn btn-sm btn-danger" style="margin-top:-5px;width:15%">CANCELAR FILTRO</a>
            </form>
            </td>
             </tr></table>

            <br>-->


        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr >
               <th >N° Orden</th>
               <th >Cliente</th>
               <th >Email</th>
               
                <th >Fecha</th>
                <th >Estado</th>
                <th >Total</th>
                 <th >VER</th>
                </tr>
              </thead>
              <tbody >
              <?php
              while ($row = mysqli_fetch_assoc($query)) {
                  $id_client = $row['id_cliente'];
                  $codigo_orden = $row['codigo'];
                  $id_orden = $row['id'];
                  $estado_orden = $row['estado'];
                  $fecha_ingreso = date_format(date_create($row['fecha_ingreso']),"d/m/Y");
                  $total = $row['total'];
                  $moneda = $row['moneda'];
                  $forma_pago = $row['forma_pago'];

                  $info_cliente_query = $db_Full->select_sql('SELECT * FROM tbl_clientes where id_cli='.$id_client.' ');

                  $info_cliente = mysqli_fetch_assoc($info_cliente_query);

                  $nombre_cliente = $info_cliente['nombre_cli'];
                  $apellido_cliente = $info_cliente['apellido_cli'];
                  $email_cliente = $info_cliente['email_cli'];
                  $pais_cliente = $info_cliente['pais_cli'];
                  $estado_cliente = $info_cliente['dir1_direccion_cli'];
                  $ciudad_cliente = $info_cliente['provincia_direccion_cli'];
                  $codigo_postal_cliente = $info_cliente['postal_direccion_cli'];
                  $celular_cliente = $info_cliente['tel_direccion_cli'];
                  $direccion_cliente = $info_cliente['dir1_direccion_cli'];

                  /*cantidad*/
                //   $cantidad_productos = 0;
                //   foreach ($array_todo as $key => $value) {
                //       $datos = explode('-', $value);
                //       $cantidad = $datos[1];
                //       $cantidad_productos = $cantidad_productos * 1 + $cantidad;
                //   }
                    /*fin cantidad*/

              ?>

              <tr>
                     <td  bgcolor="#EAEAEA" width="120" >
                     <?php echo $id_orden;?>
                     </td>
                     <td  bgcolor="#EAEAEA" ><?PHP echo $nombre_cliente;?> <?PHP echo $apellido_cliente;?></td>
                     <td  bgcolor="#EAEAEA" ><?PHP echo $email_cliente;?></td>
                     
                     <td  bgcolor="#EAEAEA" ><?PHP echo $fecha_ingreso;?></td>
                     <td  bgcolor="#EAEAEA" ><?PHP echo $estado_orden;?></td>
                    <td  bgcolor="#EAEAEA" ><?php echo $moneda . ' ' . $total;?></td>
                     <td  bgcolor="#EAEAEA">
                     <a data-rel="tooltip" data-placement="top" data-original-title="Ver Detalle de la Venta" href="ventas?action=ver&id=<?php echo $id_orden; ?>">
                     VER DETALLE
                     </a>
                     </td>
             </tr>
                <?php
            ++$w;
              }
        ?>

               </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->

        <?php

    }

    public function verVentas()
    {   $db_Full = new db_model(); $db_Full->conectar();
        $sql = ' SELECT * FROM tbl_ordenes where id='.$_GET['id'].' ';
        $query = $db_Full->select_sql($sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id_client = $row['id_cliente'];
            $codigo_orden = $row['codigo'];
            $id_orden = $row['id'];
            $estado_orden = $row['estado'];
            $fecha_ingreso = date_format(date_create($row['fecha_ingreso']),"d/m/Y");
            $total = $row['total'];
            $moneda = $row['moneda'];
            $forma_pago = $row['forma_pago'];

            $info_cliente_query = $db_Full->select_sql('SELECT * FROM tbl_clientes where id_cli='.$id_client.' ');

            $info_cliente = mysqli_fetch_assoc($info_cliente_query);

            $nombre_cliente = $info_cliente['nombre_cli'];
            $apellido_cliente = $info_cliente['apellido_cli'];
            $email_cliente = $info_cliente['email_cli'];
            $pais_cliente = $info_cliente['pais_cli'];
            $estado_cliente = $info_cliente['dir1_direccion_cli'];
            $ciudad_cliente = $info_cliente['provincia_direccion_cli'];
            $codigo_postal_cliente = $info_cliente['postal_direccion_cli'];
            $celular_cliente = $info_cliente['tel_direccion_cli'];
            $direccion_cliente = $info_cliente['dir1_direccion_cli'];

                /*cantidad*/
            //     $cantidad_productos = 0;
            // foreach ($array_todo as $key => $value) {
            //     $datos = explode('-', $value);
            //     $cantidad = $datos[1];
            //     $cantidad_productos = $cantidad_productos * 1 + $cantidad;
            // }
                /*fin cantidad*/
        }

        ?>


       <a  href="ventas" class="btn btn-app btn-danger no-radius espacio2" style="margin-bottom:5px;width:100%" >
                <i class="icon-paste bigger-200"></i>
                Regresar a lista de Ventas
            </a>


        <br><br>

        <div id="eleg_bu">




            <b>DETALLE DEL CLIENTE</b>
            <br><br>

           <div class="table-responsive">
            <table cellpadding="0" cellspacing="0">
            <tr>
            <td><b>Nombres</b></td>
            <td width="10"></td>
            <td><?php echo $nombre_cliente;?> <?php echo $apellido_cliente;?></td>
            </tr>
            <tr>
            <td><b>Email</b></td>
            <td width="10"></td>
            <td><?php echo $email_cliente;?></td>
            </tr>
            <tr>
            <td><b>N° de teléfono</b></td>
            <td width="10"></td>
            <td><?php echo $celular_cliente;?></td>
            </tr>
           
            <tr>
            <td><b>Direccion 1</b></td>
            <td width="10"></td>
            <td><?php echo $estado_cliente;?></td>
            </tr>


            <td><b>Fecha</b></td>
            <td width="10"></td>
            <td><?php echo $fecha_ingreso;?></td>
            </tr>
            <tr>
            <td><b>Orden ID</b></td>
            <td width="10"></td>
            <td><?php echo $id_orden;?></td>
            </tr>
            <tr>
            <td><b>Código de Orden</b></td>
            <td width="10"></td>
            <td><?php echo $codigo_orden;?></td>
            </tr>
            </table>
            </div>

            <br/>





            <br>
            <b>DETALLE DE LA VENTA</b>
            <br><br>

                <div class="table-responsive">
            <table id="sample-table-1" class="table  table-bordered" style="width:99.2%;">
                  <thead>
                   <tr >
                    <th>Producto</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Cantidad</th>
                     <th >Precio</th>
                     <th >Total</th>
                    </tr>
                  </thead>
                  <tbody id="listadoul">
                      <?php
                      $sql = 'SELECT * FROM tbl_ordenes
                                LEFT JOIN tbl_productos_ordenes ON tbl_ordenes.id = tbl_productos_ordenes.id_orden
                                LEFT JOIN tbl_productos ON tbl_productos_ordenes.id_producto = tbl_productos.id_producto
                                WHERE tbl_productos_ordenes.id_orden='.$id_orden.' ';
                      $query = $db_Full->select_sql($sql);

                      $total_suma_productos = 0;

                      while ($row = mysqli_fetch_assoc($query)) {
                          $nombre_producto = $row['titulo_producto'];
                          $talla_producto = $row['talla_producto'];
                          $color_producto = $row['color_producto'];
                          $foto_producto = $row['foto_producto'];
                          $precio_producto = $row['precio'];
                          $moneda_producto = $row['moneda'];
                          $precio_total = $row['precio_total'];
                          $cantidad_producto = $row['cantidad'];
                          $forma_pago = $row['forma_pago'];
                          $total_cantidad_producto = (float)$precio_producto * (int)$cantidad_producto;
                          $total_suma_productos += $total_cantidad_producto;
                      ?>
                          <tr>
                              <td><?php echo $nombre_producto;?></td>
                              <td><?php echo $talla_producto;?></td>
                              <td><img width="100"  src="../webroot/archivos/<?php echo $foto_producto;?>"/></td>
                              <td><?php echo $cantidad_producto;?></td>
                              <td><?php echo $moneda_producto . ' ' . $precio_producto;?></td>
                              <td><?php echo $moneda_producto . ' ' . $total_cantidad_producto;?></td>
                          </tr>
                      <?php
                      }
                    ?>

                  </tbody>

                  </table>

                  </div>

            <br/>
            <b style="font-size:20px">TOTAL: <?php echo $moneda_producto . ' ' . $total_suma_productos;?></b>
            <br/><br/>
            <b style="font-size:20px"><!--FORMA DE PAGO:-->
            <?php
            switch ($forma_pago) {
                case 'credit':
                    echo 'Tarjeta de crédito';
                    break;
                case 'paypal':
                    echo 'Paypal';
                    break;
                case 'deposit':
                    echo 'Depósito bancario';
                    break;
                case 'cash':
                    echo 'Pago contra entrega';
                    break;
            }
            ?>
            </b>
             </div>


        <?php

    }
}
?>
