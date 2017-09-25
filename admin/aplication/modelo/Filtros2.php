<?php
class Filtros{

  private $_idioma, $_msgbox;

  public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
    $this->_idioma = $idioma ;
    $this->_msgbox = $msg ;
  }
  public function newFiltros()
  {

  ?>




<script>

function validando_clientes(opcion, id){
  var filtro = document.clientes.elements['filtro'];

  if(filtro.value == ""){
    alert("Ingrese Título del Filtro");
    filtro.focus();
    return false;
  }


  document.clientes.action="filtros?action="+opcion+"&id="+id;
  document.clientes.submit();
}


</script>

   <a href="filtros?action=list&id_tipo=<?php echo $_GET['id_tipo'] ?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO FILTRO
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                  <label class="col-sm-2 control-label">Título del Filtro</label>
                  <div class="col-sm-10">
                    <input type="text" name="filtro"  class="form-control" />
                    <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                  </div>
                  
              </div>
              
        <input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id_tipo'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


          </form>
      </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
    <?php
  }

  public function addFiltros(){//consulta para ingresr filtro de tipo de la ropa
    //valida que el dato ingresado no exista
    $db_Full = new db_model(); $db_Full->conectar();

    $query = $db_Full->select_sql("SELECT * FROM tbl_filtros f
      INNER JOIN  tbl_tipos t ON f.fktipo_filtro=t.id_tipo
      WHERE f.nombre_filtro='".$_POST['filtro']."' AND  t.id_tipo='".$_POST['id_tipo']."' ");
        $row   = mysqli_fetch_assoc($query);
   // $result   = mysql_result($query);
    //$row=mysql_fetch_assoc($result);
    $filtro = $row['nombre_filtro'];

     if($filtro == "")
     {
          $data = array(
                          "nombre_filtro"       => $_POST['filtro'],
                          "fktipo_filtro"       => $_POST['id_tipo'],
                          "_id_categoria"       => $_POST['copia_categoria']
                        );

          $query = $db_Full->insert_table("tbl_filtros",$data);


          if($_POST['copia_categoria'] == 0)
          {

          }

          location("filtros?action=list&id_tipo=".$_POST['id_tipo']." ");
      }else
      {
         echo '<script>alert("Estos datos ya existen");</script>';
         location("filtros?action=list&id_tipo=".$_POST['id_tipo']." ");
      }
  }


  public function editFiltros(){


       $obj =  new Filtro($_GET['id']);

    ?>


<script>

function validando_clientes(opcion, id){
  var filtro = document.clientes.elements['filtro'];

  if(filtro.value == ""){
    alert("Ingrese Título del Filtro");
    filtro.focus();
    return false;
  }


  document.clientes.action="filtros?action="+opcion+"&id="+id;
  document.clientes.submit();
}

</script>

 <a href="filtros?action=list&id_tipo=<?php echo $_GET['id_tipo']?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR FILTRO
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label">Título del Filtro</label>
                <div class="col-sm-10">
                  <input type="text" name="filtro"  class="form-control" value="<?php echo $obj->__get('_nombre'); ?>" />
                   <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                </div>
              </div>
              <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Copia de categoría</label>
                    <div class="col-sm-10">
                        <select name="copia_categoria">
                          <option value="0">No</option>
                          <?php 
                                $db_Full          = new db_model(); $db_Full->conectar();
                                $query_categorias = $db_Full->select_sql("SELECT id_cate,nombre_cate FROM tbl_categorias 
                                                                          WHERE fktipo_cate =".$_GET['id_tipo']);

                                if(mysqli_num_rows($query_categorias)){
                                    while($row = mysqli_fetch_assoc($query_categorias)){
                                       $select = ($obj->__get('_id_categoria') == $row['id_cate']) ? 'selected' : '';
                                       echo '<option value="'.$row['id_cate'].'" '.$select.'>'.$row['nombre_cate'].'</option>';
                                    }
                                }
                          ?>
                        </select>
                    </div>
              </div>


        <input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


          </form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


    <?php

  }

  public function updateFiltros()//consulta para editar filtro de tipo de ropa
  {//valida que no exista el falor ingresado
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("SELECT * FROM tbl_filtros f
      INNER JOIN  tbl_tipos t ON f.fktipo_filtro=t.id_tipo
      WHERE f.nombre_filtro='".$_POST['filtro']."' AND t.id_tipo='".$_POST['id_tipo']."' and _id_categoria=".$_POST['copia_categoria']);
        $row   = mysqli_fetch_assoc($query);
        $filtro = $row['nombre_filtro'];

     if($filtro == "")
    {
       $query = $db_Full->select_sql("UPDATE tbl_filtros SET nombre_filtro='".$_POST['filtro']."', _id_categoria=".$_POST['copia_categoria']."  WHERE id_filtro = '".$_GET['id']."' ");
     location("filtros?action=list&id_tipo=".$_POST['id_tipo']." ");
    }else{
    echo '<script>alert("Estos datos ya existen");</script>';
    location("filtros?action=list&id_tipo=".$_POST['id_tipo']." ");
      }



  }



  public function deleteFiltros()
  { $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("DELETE  FROM tbl_filtros WHERE id_filtro = '".$_GET['id']."'");
    location("filtros?action=list&id_tipo=".$_GET['id_tipo']." ");
  }





  public function listFiltros(){
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select  * FROM tbl_filtros where fktipo_filtro='".$_GET['id_tipo']."' ");

    ?>

    <script>

 function mantenimiento(url,id,opcion)
 {
  if(opcion!="delete"){
    location.replace(url+'&action='+opcion+'&id='+id);
  }else if(opcion=="delete"){
    if(!confirm("Esta Seguro que desea Eliminar el Registro")){
      return false;
    }else{
      location.replace(url+'&action='+opcion+'&id='+id);
    }
  }

 }



 function validando_clientes(opcion, id)
 {
  var filtro = document.clientes.elements['filtro'];

  if(filtro.value == ""){
    alert("Ingrese Título del Filtro");
    filtro.focus();
    return false;
  }


  document.clientes.action="filtros?action="+opcion+"&id="+id;
  document.clientes.submit();
 }

</script>



   <BR>
   <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
             <div class="form-group" style="margin:0px">
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Título del Filtro</label>
                    <div class="col-sm-5">
                      <input type="text" name="filtro"  class="form-control" />
                      <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                    </div>
                </div>    
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Copia de categoría</label>
                    <div class="col-sm-10">
                        <select name="copia_categoria">
                          <option value="0">No</option>
                          <?php 
                                $db_Full          = new db_model(); $db_Full->conectar();
                                $query_categorias = $db_Full->select_sql("SELECT id_cate,nombre_cate FROM tbl_categorias 
                                                                          WHERE fktipo_cate =".$_GET['id_tipo']);

                                if(mysqli_num_rows($query_categorias)){
                                    while($row = mysqli_fetch_assoc($query_categorias)){
                                      echo '<option value="'.$row['id_cate'].'">'.$row['nombre_cate'].'</option>';
                                    }
                                }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                  <input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id_tipo'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
                </div>
              </div>
          </form>
          </div>

      </div>


  </div>
  <!-- End  -->


<br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Filtros
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  >Filtro</th>
                <th  >Agregar Item</th>
                <th >Editar</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
      $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {

      ?>

            <tr class="gradeX">

                    <td ><?php echo $row['nombre_filtro']; ?></td>

                    <td>
                      <?php if($row['_id_categoria'] == 0){?>
                      <a class="btn btn-default btn-block" href="filtros?id_filtro=<?php echo $row['id_filtro'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&action=list_item">AGREGAR ITEM</a>
                      <?php }?>
                    </td>

                    <td>
                      <a class="btn btn-default btn-block"  href="filtros?id=<?php echo $row['id_filtro'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                      <a class="btn btn-default btn-block" onclick=mantenimiento("filtros?id_tipo=<?php echo $_GET['id_tipo'] ?>",<?php echo $row['id_filtro'] ?>,"delete")>ELIMINAR</a>
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

        <?php

  }







  public function list_itemFiltros(){
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select  * FROM tbl_items_filtro where fk_item_filtro='".$_GET['id_filtro']."' ");

    ?>

    <script>

 function mantenimiento(url,id,opcion)
 {
  if(opcion!="delete_item"){
    location.replace(url+'&action='+opcion+'&id='+id);
  }else if(opcion=="delete_item"){
    if(!confirm("Esta Seguro que desea Eliminar el Registro")){
      return false;
    }else{
      location.replace(url+'&action='+opcion+'&id='+id);
    }
  }

 }



 function validando_clientes(opcion, id)
 {
  var items = document.clientes.elements['items'];

  if(items.value == ""){
    alert("Ingrese Item");
    items.focus();
    return false;
  }


  document.clientes.action="filtros?action="+opcion+"&id="+id;
  document.clientes.submit();
 }

</script>


   <a href="filtros?action=list&id_tipo=<?php echo $_GET['id_tipo']?>" class="btn btn-default btn-block">ATRÁS</a>
   <BR>
   <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
             <div class="form-group" style="margin:0px">
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Título del Item</label>
                    <div class="col-sm-5">
                      <input type="text" name="items"  class="form-control" />
                      <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                      <input type="hidden" name="id_filtro" value="<?php echo $_GET['id_filtro'] ?>"  class="form-control" />
                    </div>
                </div>    
                
                <div class="col-sm-5">
                  <input type="submit" onclick="return validando_clientes('add_item','<?php echo $_GET['id_tipo'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
                </div>
              </div>
          </form>
          </div>

      </div>


  </div>
  <!-- End  -->


<br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Item
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th>Item</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
      $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {

      ?>
            <tr class="gradeX">

                    <td ><?php echo $row['nombre_item_filtro']; ?></td>
                    <td>
                      <a class="btn btn-default btn-block"  href="filtros?id=<?php echo $row['id_item_filtro'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&id_filtro=<?php echo $_GET['id_filtro'] ?>&action=edit_item">EDITAR</a>
                    </td>
                    <td>
                      <a class="btn btn-default btn-block" onclick=mantenimiento("filtros?id_tipo=<?php echo $_GET['id_tipo'] ?>&id_filtro=<?php echo $_GET['id_filtro'] ?>",<?php echo $row['id_item_filtro'] ?>,"delete_item")>ELIMINAR</a>
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

        <?php

  }






  public function add_itemFiltros(){//Consulta para agregar item al filtro de tipo de prenda
    //Valida que el ingresado no se repita
   // echo $_POST['items']."<br>";
    //echo $_POST['id_filtro']."<br>";
    //echo $_POST['id_tipo'];
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("SELECT * FROM tbl_items_filtro fi 
      INNER JOIN tbl_filtros f ON fi.fk_item_filtro=f.id_filtro
      INNER JOIN tbl_tipos t ON f.fktipo_filtro=t.id_tipo
    WHERE fi.nombre_item_filtro='".$_POST['items']."' AND f.id_filtro='".$_POST['id_filtro']."' AND t.id_tipo='".$_POST['id_tipo']."'");
        $row   = mysqli_fetch_assoc($query);
    $filtro=$row['nombre_item_filtro'];

    if($filtro=="")
    {

    $query = $db_Full->select_sql("INSERT INTO  tbl_items_filtro VALUES ('', '".$_POST['items']."' , '".$_POST['id_filtro']."'  )");

    location("filtros?action=list_item&id_tipo=".$_POST['id_tipo']."&id_filtro=".$_POST['id_filtro']." ");
    }else{
     echo '<script>alert("Estos datos ya existen");</script>';
     location("filtros?action=list_item&id_tipo=".$_POST['id_tipo']."&id_filtro=".$_POST['id_filtro']." ");
     }

  }



  public function delete_itemFiltros()
  { $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("DELETE  FROM tbl_items_filtro WHERE id_item_filtro = '".$_GET['id']."'");
    location("filtros?action=list_item&id_tipo=".$_GET['id_tipo']."&id_filtro=".$_GET['id_filtro']." ");
  }




  public function edit_itemFiltros(){
    $db_Full = new db_model(); $db_Full->conectar();

       $query = $db_Full->select_sql("SELECT nombre_item_filtro from tbl_items_filtro where id_item_filtro='".$_GET['id']."' ");
        $row   = mysqli_fetch_assoc($query);
    $item=$row['nombre_item_filtro'];

    ?>


<script>

 function validando_clientes(opcion, id)
 {
  var items = document.clientes.elements['items'];

  if(items.value == ""){
    alert("Ingrese Item");
    items.focus();
    return false;
  }


  document.clientes.action="filtros?action="+opcion+"&id="+id;
  document.clientes.submit();
 }

</script>

 <a href="filtros?action=list_item&id_tipo=<?php echo $_GET['id_tipo']?>&id_filtro=<?php echo $_GET['id_filtro']?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR FILTRO
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
             <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Título del Item</label>
                <div class="col-sm-5">
                <input type="text" name="items"  class="form-control" value="<?php echo $item; ?>" />
                  <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                  <input type="hidden" name="id_filtro" value="<?php echo $_GET['id_filtro'] ?>"  class="form-control" />
                </div>
                <div class="col-sm-5">
                  <input type="submit" onclick="return validando_clientes('update_item','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
        </div>
              </div>
          </form>



        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


    <?php

  }






  public function update_itemFiltros()
  {
     $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("UPDATE  tbl_items_filtro SET nombre_item_filtro='".$_POST['items']."'  WHERE id_item_filtro = '".$_GET['id']."' ");
    location("filtros?action=list_item&id_tipo=".$_POST['id_tipo']."&id_filtro=".$_POST['id_filtro']." ");
  }



}
?>
