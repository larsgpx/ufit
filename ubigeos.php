<?php
include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

switch($_GET['tipe'])
{
	

   case 'p':{
		if($_POST['departamento']!='')
		{
			
			$sql=" SELECT * FROM provincia WHERE  id_departamento=".$_POST['departamento']." ORDER BY nombre_provincia ";
			$query = $db_Full->select_sql($sql);
		
			?>
			<option value="">Elegir provincia...</option>
			<?php
			while($row = mysqli_fetch_assoc($query))
			{
			?>
				<option value="<?php echo $row['id_provincia']?>"><?php echo $row['nombre_provincia']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir provincia...</option><?php }
		}break;
	
	

	case 'd':{
		if($_POST['provincia']!='')
		{
			$sql=" SELECT * FROM distrito WHERE id_provincia='".$_POST['provincia']."' ORDER BY nombre_distrito ";
			$query = $db_Full->select_sql($sql);

			
			?>

			<option value="">Elegir distrito...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_distrito']?>"><?php echo $row['nombre_distrito']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir distrito...</option><?php }
		}break;





   case 'tema':
   {
		if($_POST['id_tema']!='')
		{
			
                   

                        $n = $_POST['id_tema'];
                        $result10 = $db_Full->select_sql("SELECT * FROM tbl_temas where id_tema='".$_POST['id_tema']."' order by orden_tema asc");
                        while ($row10 = mysqli_fetch_array($result10))
                        {
                        ?>

			                    <div class="col-sm-12 pb-20">
			                        <div class="circle text-center pull-left"><?php echo $n;?></div>
			                        <h4><?php echo $row10['titulo_tema'];?></h4>
			                    </div>
			                   
			                    <div class="col-sm-12">
			                        <!-- Accordion -->
			                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			                                    <?php
			                                    $j=1;
			                                    $result100 = $db_Full->select_sql("SELECT * FROM tbl_preguntas where fktema_pre='".$row10['id_tema']."' ");
			                                    while ($row100 = mysqli_fetch_array($result100))
			                                    {
			                                    ?>

			                                    <div class="panel panel-default">
			                                        <div class="panel-heading" role="tab" id="heading<?php echo $j; ?>">
			                                          <h4 class="panel-title">
			                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#preg1<?php echo $j; ?>" aria-expanded="<?php if($j==1) echo 'true'; else echo 'false'; ?>" aria-controls="preg1<?php echo $j; ?>"><?php echo $row100['titulo_pre'];?></a>
			                                          </h4>
			                                        </div>
			                                        <div id="preg1<?php echo $j; ?>" class="panel-collapse collapse<?php if($j==1) echo ' in'; ?>" role="tabpanel" aria-labelledby="heading<?php echo $j; ?>">
			                                          <div class="panel-body">
			                                            <?php echo $row100['respuesta_pre'];?>
			                                          </div>
			                                        </div>
			                                    </div>
			                                    <?php
			                                    $j++;
			                                    }
			                                    ?>
			                        </div>
			                        <!-- ./Accordion -->
			                    </div>

                    <?php
                    }
          }          


	}break;







	case 'pedido':
   {
		if($_POST['id_pedido']!='')
		{
			
			$result2=$db_Full->select_sql("SELECT * from tbl_clientes,tbl_ordenes,tbl_productos_ordenes where tbl_clientes.id_cli=tbl_ordenes.id_cliente and tbl_clientes.id_cli=".$_GET['id_cliente']." and id_orden=tbl_ordenes.id and tbl_ordenes.id=".$_POST['id_pedido']." ");
			$data2=mysqli_fetch_assoc($result2);

			$numero_pedido = $data2['id'];
			$fecha_pedido = $data2['fecha_ingreso'];
			$estado_pedido = $data2['estado'];
			$total_pedido = $data2['total'];
			$envio_pedido = $data2['envio_cli'];
			$nombre_pedido = $data2['nombre_direccion_cli'];
			$apellido_pedido = $data2['apellido_direccion_cli'];
			$direccion_pedido = $data2['dir1_direccion_cli'];
			$email_pedido = $data2['email_cli'];
			$telefono_pedido = $data2['tel_direccion_cli'];
		?>

					<div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <h4 class="section-title">Detalles del pedido</h4>
                                    <ul class="list-unstyled">
                                        <li><b>Número de pedido:</b> <?php echo $numero_pedido; ?></li>
                                        <li><b>Fecha de pedido:</b> <?php echo date('d/m/Y', strtotime($fecha_pedido));  ?></li>
                                        <li><b>Estado:</b> <?php echo $estado_pedido; ?></li>
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
                                            <?php

                                            $result10=$db_Full->select_sql("SELECT * from tbl_productos_ordenes,tbl_productos where tbl_productos.id_producto=tbl_productos_ordenes.id_producto and id_orden=".$_POST['id_pedido']." ");
			

                                            while ($row10 = mysqli_fetch_array($result10))
											{
												
												?>
                                                <tr>
                                                    <td><?php echo $row10['cantidad']; ?></td>
                                                    <td><?php echo $row10['titulo_producto']; ?></td>
                                                    <td>S/. <?php echo $row10['precio']; ?></td>
                                                    <td>S/. <?php echo $row10['precio_total'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <div class="height-30"></div>
                                        <table class="table table-hover border-off" style="width: 300px">
                                            <tbody>
                                                <tr>
                                                    <th class="text-left" style="width: 100px">Total a pagar:</th>
                                                    <th class="text-left" style="width: 100px" width="100">S/. <?php echo $total_pedido; ?></th>
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
                                        <li><b>Método de envío:</b> <?php echo $envio_pedido; ?></li>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>
                                                        	<?php echo $nombre_pedido; ?> <?php echo $apellido_pedido; ?> 
                                                        	<br><?php echo $direccion_pedido; ?>
                                                        	<br><?php echo $email_pedido; ?>
                                                        	<br><?php echo $telefono_pedido; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

		<?php
                   
        }          
  }break;




}
?>