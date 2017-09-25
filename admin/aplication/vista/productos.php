
<?php include("../admin/aplication/includes/admin/include.php"); ?> 
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">PRODUCTOS</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Inicio</a></li>
      </ol>
    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Inicio</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation" style="padding:40px">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color10-bg"><i class="fa fa-table"></i></span>
      <h1>Productos</h1>
     </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


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
      } 
  </script>

  <!-- Start Row -->
  <div class="row">
     <?php $db_Full = new db_model();$db_Full->conectar();
                        //echo $msgbox->getMsgbox(); 
                        $obj   = new Productos($idioma, $msgbox, $sesion->getUsuario());
                        // Create new Proyectos

                        if(!isset($_GET['actioncat'])){
                          if($_GET['action']){
                            $accion = $_GET['action']."Productos"; 
                            $obj->$accion(); 
                          }else{
                            //$obj->listProductos2();
                            //$obj->listProductos(); $db_Full = new db_model();
$query = $db_Full->select_sql("SELECT id_producto,titulo_producto,fktipo_producto,nombre_tipo FROM tbl_productos inner join tbl_tipos tip on tip.id_tipo=fktipo_producto");
?>

    <a href="productos?action=new" class="btn btn-default btn-block">NUEVO PRODUCTO</a>
<br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Productos
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th>Producto</th>
                <th>Tipo de Prenda</th>
                <!--<th>Asignar Marcas</th>-->
                <th>Asignar Categorías</th>
                <th>Asignar Filtros</th>
                <th>Agregar Fotos</th>
                <th>Agregar Características</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
      $w = 1;
      while($row =mysqli_fetch_array($query))
      {

      ?>

            <tr class="gradeX">

                    <td ><?php echo $row['titulo_producto']; ?></td>
                    <td ><?php echo $row['nombre_tipo']; ?></td>
                    <td>
                      <a class="btn btn-default btn-block" onclick="pasar_url_iframe(this);"  data-toggle="modal" data-target="#myModal<?php echo $row['id_producto']; ?>" data-link="productos_categorias?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=categorias">ASIGNAR CATEGORÍAS</a>

                           <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">ASIGNAR CATEGORÍAS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->

                    </td>
                    <td>
                      <a class="btn btn-default btn-block" onclick="pasar_url_iframe(this);" data-toggle="modal" data-target="#Modal<?php echo $row['id_producto']; ?>" data-link="productos_filtros?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=filtros">ASIGNAR FILTROS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">ASIGNAR FILTROS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->


                    </td>


                     <td>
                      <a class="btn btn-default btn-block" onclick="pasar_url_iframe(this);" data-toggle="modal" data-target="#Modal_foto<?php echo $row['id_producto']; ?>" data-link="productos_fotos?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=fotos">AGREGAR FOTOS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal_foto<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR FOTOS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->
                     </td>


                     <td>
                      <a class="btn btn-default btn-block" onclick="pasar_url_iframe(this);" data-toggle="modal" data-target="#Modal_cara<?php echo $row['id_producto']; ?>" data-link="productos_caracteristicas?id_producto=<?php echo $row['id_producto'] ?>&id_tipo=<?php echo $row['fktipo_producto'] ?>&action=caracteristicas">AGREGAR CARACTERÍSTICAS</a>

                         <!-- Modal -->
                            <div class="modal fade" id="Modal_cara<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR CARACTERÍSTICAS A : <?php echo $row['titulo_producto']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->
                     </td>

                    <td>
                      <a class="btn btn-default btn-block"  href="productos?id=<?php echo $row['id_producto'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                      <a class="btn btn-default btn-block" onclick=mantenimiento("productos",<?php echo $row['id_producto'] ?>,"delete")>ELIMINAR</a>
                    </td>

      </tr>
                <?php
      $w++;
      }
      ?>

               </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->

                  <?php       }
                         }?>
                                               

  </div>
  <!-- End Row -->


</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
    Copyright © 2015 
  </div>
  <div class="col-md-6 text-right">
    <img src="../webroot/logo.png" width="100">
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

          
<?php include("../admin/aplication/includes/admin/inc.footer2.php"); ?>
    
  