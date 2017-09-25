<?php
class Categorias{

  private $_idioma, $_msgbox;

  public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
    $this->_idioma = $idioma ;
    $this->_msgbox = $msg ;
  }
  public function newCategorias()
  {

  ?>


<script src="../js/jquery.min.js"></script>
<script src="../webroot/js/admin/admin.js"></script>
<script>

function validando_clientes(opcion, id){
  var categoria = document.clientes.elements['categoria'];

  if(categoria.value == ""){
    alert("Ingrese Título de la Categoría");
    categoria.focus();
    return false;
  }

  document.clientes.action="categorias?action="+opcion+"&id="+id;
  document.clientes.submit();
}


</script>

   <a href="categorias?action=list&id_tipo=<?php echo $_GET['id_tipo'] ?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVA CATEGORÍA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label">Título de la Categoría</label>
                <div class="col-sm-10">
                  <input type="text" name="categoria" class="generar_url"  class="form-control" />
                  <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>" class="form-control" />
                </div>
              </div>
              <div class="clearfix">
                    <label class="col-sm-2 control-label">Imagen de portada</label>
                    <div class="col-sm-7">
                         <input type="file" name="img" class="form-control" />
                    </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="hidden" name="url" class="form-control ini_url" value="" />
                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="" />
                  <input type="hidden" name="url" class="form-control mostrar_url" value="" />
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

  public function addCategorias(){
    $db_Full = new db_model(); $db_Full->conectar();

    $query  = $db_Full->select_sql("SELECT nombre_cate from tbl_categorias where nombre_cate='".$_POST['categoria']."' ");
    $row    = mysqli_fetch_assoc($query);
    $filtro = $row['nombre_cate'];

      if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
      {
            $destino1 = "../webroot/archivos/";
            $name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
            $temp1 = $_FILES['imagen1']['tmp_name'];
            $ext1 = end(explode(".", $name1));
            $type1 = $_FILES['imagen1']['type'];
            $size1 = $_FILES['imagen1']['size'];

            move_uploaded_file($temp1,$destino1.$name1);
            $name_pfd1= explode(".",$name1);
       }

    /*$query = $db_Full->select_sql("INSERT INTO  tbl_categorias VALUES ('', '".$_POST['categoria']."' , '".$_POST['id_tipo']."' , '0' , '".$name_pfd1[0].'.'.$ext1."'   )");*/

     $query = $db_Full->select_sql("INSERT INTO  tbl_categorias (  nombre_cate, fktipo_cate,orden_cate,foto_cate) VALUES ( '".$_POST['categoria']."' , '".$_POST['id_tipo']."' , '0' , '".$name_pfd1[0].'.'.$ext1."'  )");

    location("categorias?action=list&id_tipo=".$_POST['id_tipo']." ");

  }

  public function editCategorias(){
      $db_Full = new db_model(); $db_Full->conectar();

      $query = $db_Full->select_sql("SELECT t.url_page_tbl from tbl_categorias c inner join tbl_tipos t on t.id_tipo = c.fktipo_cate and t.id_tipo = ".$_GET['id_tipo']." group by t.id_tipo");

      $row_cat   = mysqli_fetch_assoc($query);  

      $obj =  new Categoria($_GET['id']);

    ?>
<script src="../js/jquery.min.js"></script>
<script src="../webroot/js/admin/admin.js"></script>
<script>

function validando_clientes(opcion, id){

  var categoria = document.clientes.elements['categoria'];
  var imagen1 = document.clientes.elements['imagen1'];

  if(categoria.value == ""){
    alert("Ingrese Título de la Categoría");
    categoria.focus();
    return false;
  }

  document.clientes.action="categorias?action="+opcion+"&id="+id;
  document.clientes.submit();
}


</script>
 <a href="categorias?action=list&id_tipo=<?php echo $_GET['id_tipo']?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR CATEGORÍA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

          <div class="panel-body">

          <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label">Título de la Categoría</label>
                <div class="col-sm-10">
                    <input type="text" name="categoria" class="generar_url form-control" value="<?php echo $obj->__get('_nombre'); ?>" />
                   <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'];?>"  class="form-control" />
                   <input type="hidden" name="tipo" value="<?php echo $_GET['id_tipo']?>">
                </div>
              </div>
             
              <div class="clearfix">
                    <label class="col-sm-2 control-label">Imagen de portada</label>
                    <div class="col-sm-7">
                         <img src="../webroot/archivos/<?php echo $obj->__get('_foto');?>" width="320" height="240">
                         <input type="file" name="imagen1" class="form-control" /><br>
                    </div>
              </div>

              <div class="form-group"> 
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                <?php 
                   $url_ini = $row_cat['url_page_tbl'].'/';
                   $url_final = ($obj->__get('_url_pag') != '') ? $obj->__get('_url_pag') : $row_cat['url_page_tbl'].'/'; 
                ?> 
                  <input type="hidden" name="icat" class="form-control" value="<?php echo $_GET['id'];?>" />
                  <input type="hidden" name="ini_url" class="form-control ini_url" value="<?php echo $url_ini;?>" />
                  <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $url_final; ?>" />
                  <input type="hidden" name="url" class="form-control mostrar_url" value="<?php echo $url_final; ?>" />
                </div>
              </div>

           <?php /*?> <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">

                  <input type="file" name="imagen1" class="form-control" />


                  <?php
          if($obj->__get('_foto')!=".")
           {
           ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>"  >
                  <?php
           }else
           {
          ?>
          <img src="../webroot/assets/img/no_image.png" width="100" >
          <?php
                   }
          ?>

                </div>
              </div><?php */?>

            <input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


        </form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
    <?php
  }

  public function updateCategorias()
  {
    $db_Full = new db_model(); $db_Full->conectar();
    if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
    {
      $destino1 = "../webroot/archivos/";
      $name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
      $temp1 = $_FILES['imagen1']['tmp_name'];
      $type1 = $_FILES['imagen1']['type'];
      $size1 = $_FILES['imagen1']['size'];
      $ext1 = end(explode(".", $name1));
      move_uploaded_file($temp1,$destino1.$name1);
      $name_pfd1 = explode(".",$name1);
      $update1 = " foto_cate = '".$name_pfd1[0].'.'.$ext1."' ";
      $query = $db_Full->select_sql("UPDATE  tbl_categorias SET ".$update1." WHERE id_cate = '".$_GET['id']."' ");
    }

    $query = $db_Full->select_sql("UPDATE  tbl_categorias SET nombre_cate='".$_POST['categoria']."',url_page_tbl='".$_POST['url']."'  WHERE id_cate = '".$_GET['id']."' ");

    $query2 = $db_Full->select_sql("SELECT url_page_tbl FROM tbl_page WHERE url_page_tbl = '".$_POST['url']."' and tabla_page_tbl = 'tbl_categorias' ");

    $query3 = $db_Full->select_sql("SELECT id_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$_POST['tipo']."' and tabla_page_tbl = 'tbl_tipos' ");

    $prow = mysqli_fetch_assoc($query3); 
    $parent = $prow['id_page_tbl']; 

    if(mysqli_num_rows($query2)){ 

        $query = $db_Full->select_sql("UPDATE  tbl_page SET titulo_page_tbl = '".$_POST['categoria']."',estado_page_tbl     = 'a', id_tabla_page_tbl=".$_POST['icat'].",url_page_tbl='".$_POST['url']."',visible_page = 1,tipo_url_page = 'i', fk_id_menu = 3, plantilla_page_tbl ='categoria_tipo',parent_page_tbl =".$parent." WHERE url_page_tbl = '".$_POST['url']."' and tabla_page_tbl = 'tbl_categorias'");
    }
    else{

          $data = array(
                          "titulo_page_tbl"     => $_POST['categoria'],
                          "url_page_tbl"        => $_POST['url'],
                          "tabla_page_tbl"      => "tbl_categorias",
                          "id_tabla_page_tbl"   => $_POST['icat'],
                          "visible_page"        => 1,
                          "estado_page_tbl"     => 'a',
                          "tipo_url_page"       => "i",
                          "fk_id_menu"          => 3,
                          "parent_page_tbl"     => $parent,
                          "plantilla_page_tbl"  => "categoria_tipo"
                        );

          $query = $db_Full->insert_table("tbl_page",$data);
    }

    location("categorias?action=list&id_tipo=".$_POST['tipo']." ");
  }

  public function deleteCategorias()
  { $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("DELETE  FROM tbl_categorias WHERE id_cate = '".$_GET['id']."'");
    location("categorias?action=list&id_tipo=".$_GET['id_tipo']." ");
  }

  public function listCategorias()
  {
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select * FROM tbl_categorias where fktipo_cate='".$_GET['id_tipo']."' order by orden_cate asc ");

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

function validando_clientes(opcion, id){

   var categoria = document.clientes.elements['categoria'];
   //var imagen1 = document.clientes.elements['imagen1'];

  if(categoria.value == ""){
    alert("Ingrese Título de la Categoría");
    categoria.focus();
    return false;
  }

  /*if(imagen1.value == ""){
    alert("Ingrese imagen");
    imagen1.focus();
    return false;
  }
*/
  document.clientes.action="categorias?action="+opcion+"&id="+id;
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
                <label class="col-sm-2 control-label">Título de la Categoría</label>

                <div class="col-sm-5">
                  <input type="text" name="categoria"  class="form-control" />
                  <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                  <br>
                </div>
              </div>
            
       
          <div class="form-group"  style="margin:0px">
                <label class="col-sm-2 control-label">Imagen de portada</label>
                <div class="col-sm-5">

                  <input type="file" name="imagen1" class="form-control" />

                </div>
              </div>


                <div class="form-group" style="margin:0px">
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
          Lista de Categorias
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
                <tr>
                  <th></th>
                  <th>Categoría</th>
                  <th>Agregar Item</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
               <tbody id="listadoul">
              <?php
      $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {

      ?>
            <tr id="list_item_<?php echo $row['id_cate']."|categorias|".$_GET['id_tipo']; ?>" >
                <td class="handle"><i class="fa fa-bars"></i></td>

                    <td ><?php echo $row['nombre_cate'];?></td>

                    <td> 
                      <a id="agregar_categorias_iframe" class="btn btn-default btn-block" href="categorias?id_cate=<?php echo $row['id_cate'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&tipo=<?php echo $row['tipo_categoria'] ?>&action=list_item">AGREGAR ITEM</a>
                    </td>

                    <td>
                      <a id="editar_categorias_iframe" class="btn btn-default btn-block"  href="categorias?id=<?php echo $row['id_cate'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&tipo=<?php echo $row['tipo_categoria'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                      <a class="btn btn-default btn-block" onclick=mantenimiento("categorias?id_tipo=<?php echo $_GET['id_tipo'] ?>",<?php echo $row['id_cate'] ?>,"delete")>ELIMINAR</a>
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

     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

    <script>
             
      $(document).ready(function(){

            $("#listadoul").sortable({
                handle : '.handle',
                update : function () {
                var order = $('#listadoul').sortable('serialize');

                  $.get("ajax?"+order,{action:'ordenarCategoria'},function(data){

                });
                }
            });
      });
      </script>
    <!-- End Panel -->

        <?php
  }

  public function list_itemCategorias(){
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select  * FROM tbl_items_categoria  inner join tbl_categorias cat on cat.id_cate = fk_item_categoria where fk_item_categoria='".$_GET['id_cate']."'");
    $row_2 = mysqli_fetch_assoc($query);
    ?>
    <script>
    
 function mantenimiento(url,id,opcion)
 {
  if(opcion!="delete_item"){
    location.replace(url+'&action='+opcion+'&id='+id);
  }else if(opcion == "delete_item"){
    if(!confirm("Esta Seguro que desea Eliminar el Registro")){
      return false;
    }else{
      location.replace(url+'&action='+opcion+'&id='+id);
    }
  }

 }

function validando_clientes(opcion, id){

   var categoria = document.clientes.elements['items'];

  if(categoria.value == ""){
    alert("Ingrese Título del Item");
    categoria.focus();
    return false;
  }

  document.clientes.action="categorias?action="+opcion+"&id="+id;
  document.clientes.submit();
}

</script>
   <a href="categorias?action=list&id_tipo=<?php echo $_GET['id_tipo']?>&tipo=$_GET['tipo']"  class="btn btn-default btn-block">ATRÁS</a>
   <BR>
   <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group" style="margin:0px">

                  <?php $tip_cat = isset($_GET['tipo']) ? $_GET['tipo']: $row_2['tipo_categoria'];
                        if($tip_cat == 'marca'){
                        $query_select = $db_Full->select_sql("select id_marca,nombre_marca,url_page_tbl from tbl_marcas");
                        echo '<div class="clearfix ">';
                            echo '<label class="col-sm-2 control-label">Seleccione marca</label>';
                            echo '<div class="col-sm-5">';
                            echo '<select name="items" id="titulo_categoria_tipos" class="form-control generar_url">';
                              echo '<option value="">Seleccione la marca</option>';
                            while($row_s = mysqli_fetch_assoc($query_select))
                            {  
                              $url_mar   = explode('/',$row_s['url_page_tbl']);
                              echo '<option value="'.$url_mar[1].'">'.$row_s['nombre_marca'].'</option>';
                            }
                            echo '</select></div>';
                        echo "</div>";
                        echo '<div class="clearfix ">';
                                  echo '<label class="col-sm-2 control-label">Url</label>';
                                echo '<div class="col-sm-7">';
                                      $query3    = $db_Full->select_sql("SELECT url_page_tbl FROM  tbl_categorias WHERE   id_cate = ".$_GET['id_cate']);

                                      $prow      = mysqli_fetch_assoc($query3); 
                                      $url_final = ($prow['url_page_tbl'] != '') ? $prow['url_page_tbl'].'/' : '';

                                      echo '<input type="hidden" name="cate" value="'.$_GET['id_cate'].'" />';
                                      echo '<input type="hidden" name="ini_url" class="form-control ini_url" value="'.$url_final.'" />';
                                      echo '<input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="'.$url_final.'" />';
                                      echo '<input type="hidden" name="url" class="form-control mostrar_url" value="'.$url_final.'" />';
                                    echo '</div>';
                        echo '</div>';
                    }
                    else{
                           if($tip_cat == 'compra'){
                              echo '<input type="hidden" name="cate" value="'.$_GET['id_cate'].'" />';
                              echo '<div class="form-group col-sm-6 col-md-6 col-lg-6">';
                                echo '<label class="col-sm-4 col-md-4 col-lg-4 control-label">Título del Item</label>';
                                echo '<div class="col-sm-6 col-md-6 col-lg-6">';
                                  echo '<input type="text" name="items" class="form-control generar_url" value="'.$items.'" />';
                                echo '</div>'; 
                              echo '</div>';   
                              echo '<div class="form-group col-sm-6 col-md-6 col-lg-6">';
                                  echo '<label class="col-sm-4 col-md-4 col-lg-4 control-label">Valor del Item</label>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-6">';
                                    echo '<input type="number" name="items2" class="form-control" min="0" value="'.$item2.'" />';
                                  echo '</div>'; 
                              echo '</div>';  
                              echo '<div class="form-group col-sm-6 col-md-6 col-lg-6">';
                                  echo '<label class="col-sm-4 col-md-4 col-lg-4 control-label"># de productos</label>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-6">';
                                    echo '<input type="number" name="items3" class="form-control" min="0" value="'.$item3.'" />';
                                  echo '</div>'; 
                              echo '</div>';  
                              echo '<div class="form-group col-sm-6 col-md-6 col-lg-6">';
                                  echo '<label class="col-sm-4 col-md-4 col-lg-4 control-label">Tendencia</label>';
                                  echo '<div class="col-sm-6 col-md-6 col-lg-6">';
                                      echo '<select name="items4" class="form-control">';
                                          echo '<option value="n">Ninguno</option>';
                                          echo '<option value="s">Subida</option>';
                                          echo '<option value="b">Bajada</option>';
                                      echo '</select>';
                                  echo '</div>'; 
                              echo '</div>';  
                              echo '<div class="clearfix">';
                                    echo '<label class="col-sm-2 control-label">Url</label>';
                                    echo '<div class="col-sm-7">';
                                      $query3    = $db_Full->select_sql("SELECT url_page_tbl FROM  tbl_categorias WHERE   id_cate = ".$_GET['id_cate']);

                                      $prow      = mysqli_fetch_assoc($query3); 
                                      $url_final = ($prow['url_page_tbl'] != '') ? $prow['url_page_tbl'].'/' : '';

                                      echo '<input type="hidden" name="cate" value="'.$_GET['id_cate'].'" />';
                                      echo '<input type="hidden" name="ini_url" class="form-control ini_url" value="'.$url_final.'" />';
                                      echo '<input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="'.$url_final.'" />';
                                      echo '<input type="hidden" name="url" class="form-control mostrar_url" value="'.$url_final.'" />';
                                    echo '</div>';
                                 echo '</div>';
                           }
                           else{
                                 echo '<div class="clearfix">';
                                    echo '<label class="col-sm-2 control-label ">Título del Item</label>';
                                    echo '<div class="col-sm-7">';
                                    echo '<input type="text" name="items" class="form-control generar_url" /></div>';
                                 echo '</div>';
                                 echo '<div class="clearfix">';
                                    echo '<label class="col-sm-2 control-label">Imagen de portada</label>';
                                    echo '<div class="col-sm-7">';
                                    echo '<input type="file" name="img" class="form-control" /></div>';
                                 echo '</div>';
                                 echo '<div class="clearfix">';
                                   echo '<label class="col-sm-2 control-label">Url</label>';
                                    echo '<div class="col-sm-7">';
                                      $query3    = $db_Full->select_sql("SELECT url_page_tbl FROM  tbl_categorias WHERE   id_cate = ".$_GET['id_cate']);

                                      $prow      = mysqli_fetch_assoc($query3); 
                                      $url_final = ($prow['url_page_tbl'] != '') ? $prow['url_page_tbl'].'/' : '';

                                      echo '<input type="hidden" name="cate" value="'.$_GET['id_cate'].'" />';
                                      echo '<input type="hidden" name="ini_url" class="form-control ini_url" value="'.$url_final.'" />';
                                      echo '<input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="'.$url_final.'" />';
                                      echo '<input type="hidden" name="url" class="form-control mostrar_url" value="'.$url_final.'" />';
                                    echo '</div>';
                                 echo '</div>'; 
                           }
                           
                    }
                    ?>
                  <!--  -->
                  <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                  <input type="hidden" name="id_cate" value="<?php echo $_GET['id_cate'] ?>"  class="form-control" />
                  
              </div>

               <div class="form-group" style="margin:0px">
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
                <th >Item</th>
                <th >Editar</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php        
      
      if($tip_cat == 'marca'){

          $query_select = $db_Full->select_sql("SELECT id_marca,
                                                       id_tipos_marcas,
                                                       m.url_page_tbl as url_marcas,
                                                       nombre_marca,
                                                       fkmarcas_tipos_marcas,
                                                       fktipos_tipos_marcas 
                                                FROM   tbl_tipos_marcas,tbl_tipos,tbl_marcas m
                                                WHERE  fkmarcas_tipos_marcas = id_marca 
                                                       and fktipos_tipos_marcas=id_tipo 
                                                       and id_tipo =".$_GET["id_tipo"]." 
                                                       GROUP BY id_marca 
                                                       ORDER BY fkmarcas_tipos_marcas desc"); 
          $w = 1;
          while($row = mysqli_fetch_assoc($query_select))
          {

          ?>
                <tr class="gradeX">

                        <td ><?php echo $row['nombre_marca']; ?></td>
                        <td>
                          <a class="btn btn-default btn-block" href="categorias?idmarca=<?php echo $row['id_marca'] ?>&fmarcas=<?php echo $row['fkmarcas_tipos_marcas'];?>&id_tipo=<?php echo $row['fktipos_tipos_marcas'];?>&tipo=<?php echo $tip_cat;?>&action=edit_item">EDITAR</a>
                        </td>
                        <td>
                          <a class="btn btn-default btn-block" onclick=mantenimiento("categorias?idmarca=<?php echo $row['id_marca']; ?>&fmarcas=<?php echo $row['fkmarcas_tipos_marcas'] ?>&id_tipo=<?php echo $row['fktipos_tipos_marcas'];?>&tipo=<?php echo $tip_cat;?>",'',"delete_item")>ELIMINAR</a>
                        </td>

          </tr>
            <?php
          $w++;
          }
      }
      else{     
                $query = $db_Full->select_sql("SELECT nombre_cate,tipo_categoria,subcat.id_item_categoria,subcat.img_items_categoria,subcat.url_page_tbl as url,foto_cate,subcat.nombre_item_categoria
                                      from tbl_categorias cat 
                                      inner join tbl_items_categoria subcat on subcat.fk_item_categoria = cat.id_cate 
                                      where cat.id_cate =".$_GET['id_cate']);
                 
                $w = 1;
                while($row = mysqli_fetch_assoc($query))
                {
                ?>
                      <tr class="gradeX">

                              <td ><?php echo $row['nombre_item_categoria']; ?></td>
                              <td>
                                <a class="btn btn-default btn-block"  href="categorias?id=<?php echo $row['id_item_categoria'] ?>&id_tipo=<?php echo $_GET['id_tipo'] ?>&id_cate=<?php echo $_GET['id_cate'] ?>&tipo=<?php echo isset($_GET['tipo'])?$_GET['tipo']:$row['tipo_categoria'];?>&action=edit_item">EDITAR</a>
                              </td>
                              <td>
                                <a class="btn btn-default btn-block" onclick=mantenimiento("categorias?id_tipo=<?php echo $_GET['id_tipo'] ?>&id_cate=<?php echo $_GET['id_cate'] ?>",<?php echo $row['id_item_categoria'] ?>,"delete_item")>ELIMINAR</a>
                              </td>

                </tr>
                          <?php
                $w++;
                }
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

  public function add_itemCategorias(){ 
    $db_Full = new db_model(); $db_Full->conectar();
    //consulta para evaluar si existe item ingresado

    $query = $db_Full->select_sql("SELECT * FROM tbl_items_categoria ci 
      INNER JOIN tbl_categorias c ON ci.fk_item_categoria=c.id_cate
      INNER JOIN tbl_tipos t ON c.fktipo_cate=t.id_tipo 
      WHERE ci.nombre_item_categoria='".$_POST['items']."' AND t.id_tipo='".$_POST['id_tipo']."' AND c.id_cate='".$_POST['id_cate']."'");


        $row    = mysqli_fetch_assoc($query);
        $filtro = $row['nombre_item_categoria'];

     if($filtro == "")
     {

        $valor      = (isset($_POST['items2']))  ? $_POST['items2']   : 0;
        $num        = (isset($_POST['items3']))  ? $_POST['items3']   : 0;
        $tendencia  = (isset($_POST['items4']))  ? $_POST['items4']   : 'n';

        if(isset($_POST['marca'])){
              $id = $db_Full->select_sql("INSERT INTO tbl_items_categoria (nombre_item_categoria,fk_item_categoria,valor_item_categoria,tendencia_item,numero_item,url_page_tbl,img_items_categoria) VALUES ('".$_POST['items']."','".$_POST['id_cate']."','".$valor."','".$tendencia."','".$num ."','".$_POST['url']."','".$name_file."' )");

                $query2 = $db_Full->select_sql("SELECT url_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$id."' and tabla_page_tbl = 'tbl_items_categoria' ");

                if(mysqli_num_rows($query2) == 0){
                    $query3 = $db_Full->select_sql("SELECT id_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$_POST['cate']."' and tabla_page_tbl = 'tbl_tipos' ");

                    $prow   = mysqli_fetch_assoc($query3); 
                    $parent = $prow['id_page_tbl']; 

                    $data = array(
                                   "titulo_page_tbl"     => $_POST['items'],
                                   "url_page_tbl"        => $_POST['url'],
                                   "tabla_page_tbl"      => "tbl_items_categoria",
                                   "id_tabla_page_tbl"   => $_GET['cate'],
                                   "visible_page"        => 1,
                                   "estado_page_tbl"     => 'a',
                                   "tipo_url_page"       => "i",
                                   "fk_id_menu"          => 3,
                                   "parent_page_tbl"     => $parent,
                                   "plantilla_page_tbl"  => "compra_por_marca"
                                 );

                    $query = $db_Full->insert_table("tbl_page",$data);
                }

        }
        else{ 
                $name_file = '';
                if(isset($_FILES['img']) && ($_FILES['img']['name'] != ""))
                {
                    $destino1 = "../webroot/archivos/";
                    $name1 = strtolower(date("ymdhis").$_FILES['img']['name']);
                    $temp1 = $_FILES['img']['tmp_name'];
                    $ext1 = end(explode(".", $name1));
                    $type1 = $_FILES['img']['type'];
                    $size1 = $_FILES['img']['size'];

                    move_uploaded_file($temp1,$destino1.$name1);
                    $name_pfd1= explode(".",$name1);
                    $name_file   =  $name_pfd1[0].'.'.$ext1;

                }

                $id = $db_Full->select_sql("INSERT INTO tbl_items_categoria (nombre_item_categoria,fk_item_categoria,valor_item_categoria,tendencia_item,numero_item,url_page_tbl,img_items_categoria) VALUES ('".$_POST['items']."','".$_POST['id_cate']."','".$valor."','".$tendencia."','".$num ."','".$_POST['url']."','".$name_file."' )");

                $query2 = $db_Full->select_sql("SELECT url_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$id."' and tabla_page_tbl = 'tbl_items_categoria' ");

                if(mysqli_num_rows($query2) == 0){
                    $query3 = $db_Full->select_sql("SELECT id_page_tbl FROM tbl_page WHERE id_tabla_page_tbl = '".$_POST['cate']."' and tabla_page_tbl = 'tbl_tipos' ");

                    $prow   = mysqli_fetch_assoc($query3); 
                    $parent = $prow['id_page_tbl']; 

                    $data = array(
                                   "titulo_page_tbl"     => $_POST['items'],
                                   "url_page_tbl"        => $_POST['url'],
                                   "tabla_page_tbl"      => "tbl_items_categoria",
                                   "id_tabla_page_tbl"   => $_GET['cate'],
                                   "visible_page"        => 1,
                                   "estado_page_tbl"     => 'a',
                                   "tipo_url_page"       => "i",
                                   "fk_id_menu"          => 3,
                                   "parent_page_tbl"     => $parent,
                                   "plantilla_page_tbl"  => "categoria_detalle"
                                 );

                    $query = $db_Full->insert_table("tbl_page",$data);
                }
        }
       
        //print_r($query);
        location("categorias?action=list_item&id_tipo=".$_POST['id_tipo']."&id_cate=".$_POST['id_cate']." ");
    }
    else{
           echo '<script>alert("Estos datos ya existen");</script>';
       }

  }

  public function delete_itemCategorias()
  {  $db_Full = new db_model(); $db_Full->conectar();
      if(isset($_GET['idmarca'])){
          $query = $db_Full->select_sql("DELETE FROM tbl_tipos_marcas WHERE fkmarcas_tipos_marcas = '".$_GET['idmarca']."' and fktipos_tipos_marcas = '".$_GET['id_tipo']."' ");

    location("categorias?action=list_item&id_tipo=".$_GET['id_tipo']."&tipo=".$_GET['tipo']."&id_cate=".$_GET['id_cate']." ");

      }
      else{ 
          $query = $db_Full->select_sql("DELETE FROM tbl_items_categoria WHERE id_item_categoria = '".$_GET['id']."'");
    location("categorias?action=list_item&id_tipo=".$_GET['id_tipo']."&id_cate=".$_GET['id_cate']." ");
      }
  }

  public function edit_itemCategorias(){
      $db_Full = new db_model(); $db_Full->conectar();
       $query = $db_Full->select_sql("SELECT id_item_categoria,img_items_categoria,url_page_tbl,nombre_item_categoria,valor_item_categoria,tendencia_item,numero_item,fk_item_categoria from tbl_items_categoria where id_item_categoria='".$_GET['id']."' ");
        $row   = mysqli_fetch_assoc($query);
        $item  = $row['nombre_item_categoria'];
        $item2 = $row['valor_item_categoria'];
        $item3 = $row['numero_item'];
        $item4 = $row['tendencia_item'];
    ?>
<script>

 function validando_clientes(opcion,tipo, id)
 {
  var items = document.clientes.elements['items'];

  if(items.value == ""){
    alert("Ingrese Item");
    items.focus();
    return false;
  }

  document.clientes.action="categorias?action="+opcion+"&tipo="+tipo+"&id="+id;
  document.clientes.submit();
 }

</script>

 <a href="categorias?action=list_item&id_tipo=<?php echo $_GET['id_tipo']?>&id_cate=<?php echo $_GET['id_cate']?>&tipo=<?php echo $_GET['tipo'] ?>" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR ITEM DE LA CATEGORÍA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool">  <i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
             <div class="form-group" style="margin:0px">
                <?php if($_GET['tipo'] == 'compra'){?>
                <div class="clearfix">
                  <div class="col-sm-3 col-md-3 col-lg-3 no_padding">
                        <label class="col-sm-3 col-md-3 col-lg-3 control-label">Título</label>
                        <div class="col-sm-9 col-md-9 col-lg-9 no_padding">
                          <input type="text" name="items"  class="form-control generar_url" value="<?php echo $item; ?>" />
                        </div>
                  </div>  
                  <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="col-sm-7 col-md-7 col-lg-7 control-label">Valor del Item</label>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                          <input type="number" name="items2"  class="form-control" value="<?php echo $item2; ?>" min="0"/>
                        </div>
                  </div>
                  <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="col-sm-6 col-md-6 col-lg-6 control-label"># de productos</label>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                          <input type="number" name="items3"  class="form-control" value="<?php echo $item3; ?>" min="0" />
                        </div>
                  </div>
                  <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="col-sm-4 col-md-4 col-lg-4 control-label">Tendencia</label>
                        <div class="col-sm-8 col-md-8 col-lg-8">
                          <?php   $ol = ''; $op2 = array(
                                                          "n" => "Ninguno",
                                                          "s" => "Subida",
                                                          "b" => "Bajada"
                                                        );

                                  foreach ($op2 as $key => $value){
                                      $selected = ($item4 == $key) ? 'selected': '';
                                      $ol.= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                  }
                          ?>

                          <select name="items4" class="form-control3">
                               <?php echo $ol;?>
                          </select>
                        </div>
                  </div>
                </div>  
                <div class="clearfix">
                    <label class="col-sm-2 control-label">Url</label>
                    <div class="col-sm-7">
                                <?php 
                                    $query_cat = $db_Full->select_sql("SELECT url_page_tbl 
                                                                         FROM tbl_categorias 
                                                                         WHERE id_cate = ".$row['fk_item_categoria']);

                                    $prow2     = mysqli_fetch_assoc($query_cat); 
                                    $url_final   = ($row['url_page_tbl'] != '') ? $row['url_page_tbl'] : '';
                                ?>
                          <input type="hidden" name="cate" value="<?php echo $_GET['id_cate']?>" />
                          <input type="hidden" name="ini_url" class="form-control ini_url" value="<?php echo $prow2['url_page_tbl'].'/';?>" />
                          <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $url_final;?>" />
                          <input type="hidden" name="url" class="form-control mostrar_url" value="<?php echo $url_final;?>" />
                    </div>
                </div>
                <?php }else{?>  
                    <?php if($_GET['tipo'] == 'marca'){?>
                    <div class="clearfix">
                        <label class="col-sm-2 control-label">Título del Item</label>
                        <div class="col-sm-5">
                          <?php 
                           $query_selectt = $db_Full->select_sql("select id_marca,nombre_marca from tbl_marcas");
                            echo '<select name="marca" id="titulo_categoria_tipos" class="form-control generar_url">';
                              echo '<option value="">Seleccione la marca</option>';
                            while($row_s = mysqli_fetch_assoc($query_selectt))
                            {  $select = ($row_s['id_marca'] == $_GET['idmarca']) ? 'selected' : '';
                               echo '<option value="'.$row_s['id_marca'].'" '.$select.'>'.$row_s['nombre_marca'].'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                    </div>
                    <div class="clearfix">
                          <label class="col-sm-2 control-label">Url</label>
                          <div class="col-sm-7">
                          <?php     
                                    $url_final   = ($row['url_page_tbl'] != '') ? $row['url_page_tbl'] : '';
                          ?>
                          <input type="hidden" name="cate" value="<?php echo $_GET['id_cate']?>" />
                          <input type="hidden" name="ini_url" class="form-control ini_url" value="<?php echo $prow2['url_page_tbl'].'/';?>" />
                          <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $url_final;?>" />
                          <input type="hidden" name="url" class="form-control mostrar_url" value="<?php echo $url_final;?>" />
                          </div>
                    </div> 
                <?php } else{ ?>

                    <label class="col-sm-2 control-label">Título del Item</label>
                    <div class="clearfix">
                        <div class="col-sm-7">
                          <input type="text" name="items"  class="form-control generar_url" value="<?php echo $item; ?>" />
                        </div>
                    </div>
                    <div class="clearfix">
                              <?php 
                                    $query_cat = $db_Full->select_sql("SELECT url_page_tbl 
                                                                         FROM tbl_categorias 
                                                                         WHERE id_cate = ".$row['fk_item_categoria']);

                                    $prow2     = mysqli_fetch_assoc($query_cat); 
                              ?>
                               <label class="col-sm-2 control-label">Imagen de portada</label>
                               <div class="col-sm-7">
                                  <img src="../webroot/archivos/<?php echo $row['img_items_categoria'];?>" width="320" height="240">
                                  <input type="file" name="img" class="form-control" />
                               </div>
                    </div>
                    <div class="clearfix">
                      <label class="col-sm-2 control-label">Url</label>
                      <div class="col-sm-7">
                          <?php  
                                 $url_final   = ($row['url_page_tbl'] != '') ? $row['url_page_tbl'] : '';
                          ?>
                          <input type="hidden" name="cate" value="<?php echo $_GET['id_cate']?>" />
                          <input type="hidden" name="ini_url" class="form-control ini_url" value="<?php echo $prow2['url_page_tbl'].'/';?>" />
                          <input type="text" name="m_url" class="form-control mostrar_url" disabled="disabled" value="<?php echo $url_final;?>" />
                          <input type="hidden" name="url" class="form-control mostrar_url" value="<?php echo $url_final;?>" />
                      </div>
                    </div>
                <?php  } ?>
                <?php }?>
                <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo'] ?>"  class="form-control" />
                <input type="hidden" name="id_cate" value="<?php echo $_GET['id_cate'] ?>"  class="form-control" />
                <div class="col-sm-5">
                  <input type="submit" onclick="return validando_clientes('update_item','<?php echo isset($_GET['tipo'])? $_GET['tipo']:'' ?>','<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>')" class="btn btn-sm btn-success" value="GUARDAR">
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

  public function update_itemCategorias()
  { 
    $db_Full = new db_model(); $db_Full->conectar();
    if($_POST['items2'] != '' && $_POST['items3'] != '' && $_POST['items4'] != ''){
       if($_POST['items2'] < 0){
           $_POST['items2'] = 0;
       }
       if($_POST['items3'] < 0){
           $_POST['items3'] = 0;
       }

               $query = $db_Full->select_sql("UPDATE  tbl_items_categoria 
                                      SET nombre_item_categoria='".$_POST['items']."',
                                          valor_item_categoria='".$_POST['items2']."',
                                          numero_item='".$_POST['items3']."',
                                          tendencia_item='".$_POST['items4']."',
                                          url_page_tbl = '".$_POST['url']."'  
                                      WHERE id_item_categoria = '".$_GET['id']."' ");

                //verificar si existe la url del item de categoria
                $query2  = $db_Full->select_sql("SELECT url_page_tbl 
                                                 FROM tbl_page 
                                                 WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                and tabla_page_tbl = 'tbl_items_categoria'");
                //parent de item categoria
                $ini_url = substr($_POST['ini_url'],0,strlen($_POST['ini_url'])-1); 
                

                $query3  = $db_Full->select_sql("SELECT id_page_tbl 
                                                FROM tbl_page 
                                                WHERE url_page_tbl = '".$ini_url."' 
                                                      and tabla_page_tbl = 'tbl_categorias' ");
            

                $prow   = mysqli_fetch_assoc($query3); 
                $parent = $prow['id_page_tbl']; 
                //echo $parent; exit;

                if(mysqli_num_rows($query2)){

                    $query = $db_Full->select_sql("UPDATE  tbl_page 
                                                   SET titulo_page_tbl         = '".$_POST['items']."',
                                                       estado_page_tbl         = 'a', 
                                                       id_tabla_page_tbl       = '".$_GET['id']."',
                                                       url_page_tbl            ='".$_POST['url']."',
                                                       visible_page            = 1,
                                                       tipo_url_page           = 'i', 
                                                       fk_id_menu              = 3, 
                                                       plantilla_page_tbl      = 'categoria_detalle',
                                                       parent_page_tbl         =".$parent." 
                                                       WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                       and tabla_page_tbl = 'tbl_items_categoria'");
                }
                else{
                      $data = array(
                                      "titulo_page_tbl"     => $_POST['items'],
                                      "url_page_tbl"        => $_POST['url'],
                                      "tabla_page_tbl"      => "tbl_items_categoria",
                                      "id_tabla_page_tbl"   => $_GET['id'],
                                      "visible_page"        => 1,
                                      "estado_page_tbl"     => 'a',
                                      "tipo_url_page"       => "i",
                                      "fk_id_menu"          => 3,
                                      "parent_page_tbl"     => $parent,
                                      "plantilla_page_tbl"  => "categoria_detalle"
                                    );

                      $query = $db_Full->insert_table("tbl_page",$data);
                }

    location("categorias?action=list_item&id_tipo=".$_POST['id_tipo']."&id_cate=".$_POST['id_cate']." ");
    }
    else{

           if(isset($_POST['marca'])){
              $query = $db_Full->select_sql("UPDATE tbl_tipos_marcas 
                                             SET fkmarcas_tipos_marcas='".$_POST['marca']."' ,
                                             url_page_tbl = '".$_POST['url']."' 
                                             WHERE fkmarcas_tipos_marcas = '".$_GET['idmarca']."' 
                                             and fktipos_tipos_marcas='".$_GET['id_tipo']." ");
    //location("categorias?action=list_item&id_tipo=".$_POST['id_tipo']."&id_cate=".$_POST['id_cate']." ");
               //verificar si existe la url del item de categoria
                /*$query2  = $db_Full->select_sql("SELECT url_page_tbl 
                                                 FROM tbl_page 
                                                 WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                and tabla_page_tbl = 'tbl_items_categoria'");*/
                //parent de item categoria
                /*$ini_url = substr($_POST['ini_url'],0,strlen($_POST['ini_url'])-1); 
                

                $query3  = $db_Full->select_sql("SELECT id_page_tbl 
                                                FROM tbl_page 
                                                WHERE url_page_tbl = '".$ini_url."' 
                                                      and tabla_page_tbl = 'tbl_categorias' ");
            
                $prow   = mysqli_fetch_assoc($query3); 
                $parent = $prow['id_page_tbl']; */
                //echo $parent; exit;

                /*if(mysqli_num_rows($query2)){

                    $query = $db_Full->select_sql("UPDATE  tbl_page 
                                                   SET titulo_page_tbl         = '".$_POST['items']."',
                                                       estado_page_tbl         = 'a', 
                                                       id_tabla_page_tbl       = '".$_GET['id']."',
                                                       url_page_tbl            ='".$_POST['url']."',
                                                       visible_page            = 1,
                                                       tipo_url_page           = 'i', 
                                                       fk_id_menu              = 3, 
                                                       plantilla_page_tbl      = 'categoria_detalle',
                                                       parent_page_tbl         =".$parent." 
                                                       WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                       and tabla_page_tbl = 'tbl_items_categoria'");
                }
                else{
                      $data = array(
                                      "titulo_page_tbl"     => $_POST['items'],
                                      "url_page_tbl"        => $_POST['url'],
                                      "tabla_page_tbl"      => "tbl_items_categoria",
                                      "id_tabla_page_tbl"   => $_GET['id'],
                                      "visible_page"        => 1,
                                      "estado_page_tbl"     => 'a',
                                      "tipo_url_page"       => "i",
                                      "fk_id_menu"          => 3,
                                      "parent_page_tbl"     => $parent,
                                      "plantilla_page_tbl"  => "categoria_detalle"
                                    );

                      $query = $db_Full->insert_table("tbl_page",$data);
                }*/
           }
            // marcas
          else{ 
                //Actualizar el item de la categoria
                $name_file = '';
                if(isset($_FILES['img']) && ($_FILES['img']['name'] != ""))
                {
                    $destino1    = "../webroot/archivos/";
                    $name1       = strtolower(date("ymdhis").$_FILES['img']['name']);
                    $temp1       = $_FILES['img']['tmp_name'];
                    $ext1        = end(explode(".", $name1));
                    $type1       = $_FILES['img']['type'];
                    $size1       = $_FILES['img']['size'];

                    move_uploaded_file($temp1,$destino1.$name1);
                    $name_pfd1   = explode(".",$name1);
                    $name_file   =  $name_pfd1[0].'.'.$ext1;
                    $query   = $db_Full->select_sql("UPDATE tbl_items_categoria 
                                                 SET img_items_categoria='".$name_file."'
                                                 WHERE id_item_categoria = '".$_GET['id']."'");
                }
                
                $query   = $db_Full->select_sql("UPDATE tbl_items_categoria 
                                                 SET nombre_item_categoria='".$_POST['items']."', 
                                                   url_page_tbl = '".$_POST['url']."'
                                                 WHERE id_item_categoria = '".$_GET['id']."'");
                //verificar si existe la url del item de categoria
                $query2  = $db_Full->select_sql("SELECT url_page_tbl 
                                                 FROM tbl_page 
                                                 WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                and tabla_page_tbl = 'tbl_items_categoria'");
                //parent de item categoria
                $ini_url = substr($_POST['ini_url'],0,strlen($_POST['ini_url'])-1); 
                

                $query3  = $db_Full->select_sql("SELECT id_page_tbl 
                                                FROM tbl_page 
                                                WHERE url_page_tbl = '".$ini_url."' 
                                                      and tabla_page_tbl = 'tbl_categorias' ");
            

                $prow   = mysqli_fetch_assoc($query3); 
                $parent = $prow['id_page_tbl']; 
                //echo $parent; exit;

                if(mysqli_num_rows($query2)){

                    $query = $db_Full->select_sql("UPDATE tbl_page 
                                                   SET titulo_page_tbl         = '".$_POST['items']."',
                                                       estado_page_tbl         = 'a', 
                                                       id_tabla_page_tbl       = '".$_GET['id']."',
                                                       url_page_tbl            ='".$_POST['url']."',
                                                       visible_page            = 1,
                                                       tipo_url_page           = 'i', 
                                                       fk_id_menu              = 3, 
                                                       plantilla_page_tbl      = 'categoria_detalle',
                                                       parent_page_tbl         =".$parent." 
                                                       WHERE id_tabla_page_tbl = '".$_GET['id']."' 
                                                       and tabla_page_tbl = 'tbl_items_categoria'");
                }
                else{
                      $data = array(
                                      "titulo_page_tbl"     => $_POST['items'],
                                      "url_page_tbl"        => $_POST['url'],
                                      "tabla_page_tbl"      => "tbl_items_categoria",
                                      "id_tabla_page_tbl"   => $_GET['id'],
                                      "visible_page"        => 1,
                                      "estado_page_tbl"     => 'a',
                                      "tipo_url_page"       => "i",
                                      "fk_id_menu"          => 3,
                                      "parent_page_tbl"     => $parent,
                                      "plantilla_page_tbl"  => "categoria_detalle"
                                    );

                      $query = $db_Full->insert_table("tbl_page",$data);
                }


    location("categorias?action=list_item&id_tipo=".$_POST['id_tipo']."&id_cate=".$_POST['id_cate']." ");
          } 
    }

  }
  
  public function list_imagenesCategorias()
  {
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select  * 
                                   FROM tbl_tipos_imagenes 
                                   where fk_tipo_img=".$_GET['id_tipo']." 
                                   order by id_tipo_img asc");

    ?>


<script>
function validando_clientes(opcion, id)
{
      var imagen1 = document.clientes.elements['imagen1'];
      var columna = document.clientes.elements['columna'];
      var orden = document.clientes.elements['orden'];

     

      if(imagen1.value == ""){
        alert("Ingrese imagen de la marca según el tipo de prenda");
        imagen1.focus();
        return false;
      }

      if(columna.value == ""){
        alert("Ingrese columna");
        columna.focus();
        return false;
      }

      if(orden.value == ""){
        alert("Ingrese orden");
        orden.focus();
        return false;
      }

      document.clientes.action="categorias?action="+opcion+"&id="+id;
      document.clientes.submit();
}
</script>

     <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

           <input type="hidden" name="id_tipo" value="<?php echo $_GET['id_tipo']; ?>" class="form-control" />

            <div class="form-group" style="margin:5px">
                <label class="col-sm-3 control-label">Imágenes según el tipo de prenda</label>
                <div class="col-sm-9">
                  <input type="file" name="imagen1" class="form-control" />
                </div>
              </div>

               <div class="form-group" style="margin:5px">
                <label class="col-sm-3 control-label">Columna</label>
                <div class="col-sm-9">
                  <input type="number" name="columna" class="form-control" />
                </div>
              </div>

               <div class="form-group" style="margin:5px">
                <label class="col-sm-3 control-label">Orden</label>
                <div class="col-sm-9">
                  <input type="number" name="orden" class="form-control" />
                </div>
              </div>

        <input type="submit" onclick="return validando_clientes('add_list_imagenes','<?php echo $_GET['id_tipo'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


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
          Imágenes 
        </div>
        <div class="panel-body table-responsive">

            <table class="table display">
            <thead>
               <tr>
                <th>Imagen</th>
                <th>Link</th>
                <th>N COLUMNAS</th>
                <th>ORDEN</th>
                <th>Url</th>
                <th Editar</th>
                </tr>
              </thead>
              <tbody>
              <?php
      $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {
      ?>

            <tr> 
                    <td valign="top" >
                        <?php
                          if($row['foto_tipo_img'] != ".")
                           {
                           ?>
                             <img src="../webroot/archivos/<?php echo $row['foto_tipo_img'] ?>" width="150">
                          <?php
                           }else
                           {
                          ?>
                            <img src="../webroot/assets/img/no_image.png" width="100">
                          <?php
                           }
                        ?>
                    </td>
                    <td><a class="btn btn-default btn-block" href="<?php echo $row['link_tipo_img']; ?>" target="_blank">Ver link</a></td>
                    <td> 
                      <input type="hidden" class="tipo"  name="tipo_marca[]" value="<?php echo $row['id_tipo_img'];?>">
                        <?php $v = ($row['numero_columna_tipo'] != 0) ? $row['numero_columna_tipo'] : 1?>
                      <input type="number" class="numero_columnas" name="numero_columnas[]" min="1" max="12" value="<?php echo $v;?>">
                    </td>
                    <td>
                      <?php $v2 = ($row['orden_tipo'] != 0) ? $row['orden_tipo'] : 0?>
                      <input type="number" class="orden_imagen"  name="orden_imagen[]" value="<?php echo $v2;?>">
                    </td>
                    <td>
                       <select class="url_imagen"  name="url_imagen[]">
                        <?php $query_ca = $db_Full->select_sql("SELECT url_page_tbl,
                                                                       nombre_cate 
                                                                FROM tbl_categorias 
                                                                WHERE fktipo_cate = ".$row['fk_tipo_img']);

                        echo '<option value="">Seleccione url</option>';

                        if(mysqli_num_rows($query_ca)){
                            while($rowe = mysqli_fetch_assoc($query_ca)){
                              $selected = ($rowe['url_page_tbl'] == $row['url_page_tbl']) ? 'selected': '';
                                echo '<option '.$selected.' value="'.$rowe['url_page_tbl'].'">'.$rowe['nombre_cate'].'</option>';
                            } 
                        }
                        ?>
                          
                       </select>
                    </td>
                    <td>
                      <a class="btn btn-default btn-block"  href="categorias?id_tipo=<?php echo $_GET['id_tipo']; ?>&id=<?php echo $row['id_tipo_img'] ?>&action=edit_imagenes">EDITAR</a>
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





  public function add_list_imagenesCategorias()
  {
    
    $db_Full = new db_model();
    $db_Full->conectar();
    
   

    if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
    {
          $destino1 = "../webroot/archivos/";
        $name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
        $temp1 = $_FILES['imagen1']['tmp_name'];
        $ext1 = end(explode(".", $name1));
        $type1 = $_FILES['imagen1']['type'];
        $size1 = $_FILES['imagen1']['size'];

        move_uploaded_file($temp1,$destino1.$name1);
        $name_pfd1= explode(".",$name1);
    }

    $query = $db_Full->select_sql("INSERT INTO  tbl_tipos_imagenes (id_tipo_img,foto_tipo_img,link_tipo_img,fk_tipo_img,numero_columna_tipo, orden_tipo) VALUES ('',  '".$name_pfd1[0].'.'.$ext1."' ,  '".$_POST['link']."' , '".$_POST['id_tipo']."' , '".$_POST['columna']."' , '".$_POST['orden']."' )");


    location("categorias.php?id_tipo=".$_POST['id_tipo']."&action=list_imagenes");

  }




  
    public function edit_imagenesCategorias(){
      $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("SELECT * from tbl_tipos_imagenes where id_tipo_img='".$_GET['id']."' ");
        $row   = mysqli_fetch_assoc($query);
    $id=$row['id_tipo_img'];
    $foto=$row['foto_tipo_img'];
      $link=$row['link_tipo_img'];

    ?>
<script>

function validando_clientes(opcion, id)
{
  
  var link = document.clientes.elements['link'];
 
  document.clientes.action="categorias?action="+opcion+"&id="+id;
  document.clientes.submit();
 
}


</script>
 <a href="categorias?id_tipo=<?php echo $_GET['id_tipo']; ?>&action=list_imagenes" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR IMAGEN
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

          
            <div class="form-group">
                <label class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">
                   <input type="file" name="imagen1" class="form-control" />
                 

                  <?php
                  if($foto!=".")
                   {
                   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $foto ?>" width="300" >
                  <?php
                   }else
                   {
                  ?>
                  <img src="../webroot/assets/img/no_image.png" width="100" >
                  <?php
                   }
                    ?>

                </div>
              </div>


              
        <div class="form-group">
                <label class="col-sm-2 control-label">Link</label>
                <div class="col-sm-10">
                  <!-- <input type="text" name="link"  class="form-control" value="<?php echo $link; ?>" /> -->
                    <?php $query = $db_Full->select_sql("SELECT fktipo_cate,url_page_tbl,nombre_cate from tbl_categorias where fktipo_cate='".$_GET['id_tipo']."' and url_page_tbl<>'' ");
                           $query2 = $db_Full->select_sql("SELECT link_tipo_img from tbl_tipos_imagenes where fk_tipo_img='".$_GET['id_tipo']."' and link_tipo_img <> ''");
                    ?>

                   <select name="link" class="form-control">
                       <?php echo "xxx";
                          echo '<option value="">Seleccione una categoría</option>';

                          while($row = mysqli_fetch_assoc($query)){
                              $cke = false;
                              while($row2 = mysqli_fetch_assoc($query2)){
                                  if($row2['link_tipo_img'] == $row['url_page_tbl']){$cke = true;}
                              }
                              if($cke == false){
                                echo '<option value="'.$row['fktipo_cate'].'|'.$row['url_page_tbl'].'">'.$row['nombre_cate'].'</option>';
                              }
                          }
                       ?>
                   </select>
                   <input type="hidden" name="id_tipo"  class="form-control" value="<?php echo $_GET['id_tipo']; ?>" />
                </div>
              </div>
    
        <input type="submit" onclick="return validando_clientes('update_imagenes','<?php echo $id ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


          </form>

        </div>

      </div>
    </div>

  </div>
  <?php
   }

  
  
  public function update_imagenesCategorias()
  { 
    $db_Full = new db_model(); $db_Full->conectar();
    if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
    {
      $destino1 = "../webroot/archivos/";
      $name1 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
      $temp1 = $_FILES['imagen1']['tmp_name'];
      $type1 = $_FILES['imagen1']['type'];
      $size1 = $_FILES['imagen1']['size'];
      $ext1 = end(explode(".", $name1));
      move_uploaded_file($temp1,$destino1.$name1);
      $name_pfd1 = explode(".",$name1);
      $update1 = " foto_tipo_img = '".$name_pfd1[0].'.'.$ext1."' ";
      $query = $db_Full->select_sql("UPDATE  tbl_tipos_imagenes SET ".$update1." WHERE id_tipo_img = '".$_GET['id']."' ");
    }

    $dat   = explode("|",$_POST['link']);

    $query = $db_Full->select_sql("UPDATE  tbl_tipos_imagenes SET link_tipo_img='".$dat[1]."' WHERE id_tipo_img = '".$dat[0]."' ");

    location("categorias?id_tipo=".$_GET['id']."&action=list_imagenes");
  }

}
?>
