<?php
class NewArrivals{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}

  //editar arrivals
  public function editNewArrivals(){
       //$obj =  new NewArrivals($_GET['id']);
    $db_Full = new db_model(); $db_Full->conectar();
    $id=$_GET['id'];
     $query = $db_Full->select_sql("SELECT * FROM tbl_new_arrivals WHERE id_new_arrivals=$id");
     $row = mysqli_fetch_assoc($query);

     $query2=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     $query3=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     $query4=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     $query5=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     $query6=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     $query7=$db_Full->select_sql("SELECT * FROM tbl_tipos");
     //$result2=mysql_result($query2);

    ?>

<script src="../js/jquery.min.js"></script>
<script>

function add_bloque(THIS){
     bloque =   '<div class="form-group">'
                +'<div class="delete" onclick="delete_bloque(this)">X</div>'
                +'<label class="col-sm-2 control-label">Imagen 1</label>'
                +'<div class="col-sm-10">'
                  +'<input type="file" name="imagen1" id="imagen1" class="form-control" />'
                  +'<div class="kode-alert kode-alert-icon kode-alert-click alert6">'
                    +'<i class="fa fa-lock"></i>'
                    +'Tamaño recomendable 495x400px'
                  +'</div>'
                +'</div>'
              +'</div>';

  $(THIS).parent().parent().find(".control").append(bloque);
  
}

function validando_clientes(opcion, id){
  var titulo = document.clientes.elements['titulo'];
  var tipo1 = document.clientes.elements['tipo1'];
  var tipo2 = document.clientes.elements['tipo2'];
  var tipo3 = document.clientes.elements['tipo3'];
  var tipo4 = document.clientes.elements['tipo4'];
  var tipo5 = document.clientes.elements['tipo5'];
  var tipo6 = document.clientes.elements['tipo6'];


  if(titulo.value == ""){
    alert("Ingrese Título del New Arrivals");
    titulo.focus();
    return false;
  }
  if(tipo1.value == ""){
    alert("Seleccione Tipo de Prenda 1");
    tipo1.focus();
    return false;
  }
  if(tipo2.value == ""){
    alert("Seleccione Tipo de Prenda 2");
    tipo2.focus();
    return false;
  }
  if(tipo3.value == ""){
    alert("Seleccione Tipo de Prenda 3");
    tipo3.focus();
    return false;
  }
  if(tipo4.value == ""){
    alert("Seleccione Tipo de Prenda 4");
    tipo4.focus();
    return false;
  }
  if(tipo5.value == ""){
    alert("Seleccione Tipo de Prenda 5");
    tipo5.focus();
    return false;
  }
  if(tipo6.value == ""){
    alert("Seleccione Tipo de Prenda 6");
    tipo6.focus();
    return false;
  }
  

  document.clientes.action="new_arrivals?action="+opcion+"&id="+id;
  document.clientes.submit();
}


</script>

 <a href="new_arrivals" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR NEW ARRIVALS 
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

  
            <div class="panel-body">
         
            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
           
              <div class="bloque_seo clearfix" style="margin: 20px 0;">
                  <a class="btn btn-default col-sm-2 col-md-2 col-lg-2" role="button" data-toggle="collapse" href="#collapseSEO" aria-expanded="false" aria-controls="collapseExample">SEO</a>
                  <div class="col-sm-7 col-md-7 col-lg-7 collapse" id="collapseSEO">
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                          <input type="text" name="titulo_seo"  class="titulo_seo form-control" maxlength="25" placeholder="Titulo SEO (Máximo 25 caracteres)" />
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Palabras clave</label>
                        <div class="col-sm-10">
                          <input type="text" name="keywords_seo"  class="form-control" placeholder="Palabras claves separadas por coma para SEO" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="descripcion_seo" placeholder="Descripción del producto SEO"></textarea>
                        </div>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" value="<?php echo $row['titulo_new_arrivals'];?>"  class="generar_url form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Url</label>
                <div class="col-sm-10">
                  <input type="hidden" class="ini_url" name=""  class="form-control mostrar_url" value="new-arrivals/" />
                  <input type="text" name="m_url"  class="form-control mostrar_url" disabled="disabled" value="<?php echo $row['url_page_tbl'];?>" />
                  <input type="hidden" name="url"  class="form-control mostrar_url" value="<?php echo $row['url_page_tbl'];?>" />
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">
                  <input type="file" name="imagenbanner" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1021x425px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['banner_new_arrivals'];?>">
                  <input type="hidden" name="imagenbanner1" value="<?php echo $row['banner_new_arrivals'];?>">
                 </div>
              </div>

              <!-- <div class="tools">
                <span class="agregar" onclick="add_bloque();">Agregar bloque</span>
              </div>
              <div class="control">

              </div> -->
               <div class="form-group">
                  <label class="col-sm-2 control-label">Imagen 1</label>
                  <div class="col-sm-3">
                    <input type="file" name="imagen1" class="form-control" />
                    <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                      <i class="fa fa-lock"></i>
                      Tamaño recomendable 495x400px
                    </div>
                    <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto1'];?>">
                    <input type="hidden" name="imagen11" value="<?php echo $row['foto1'];?>">
                  </div>
                  <div class="col-sm-2">
                    <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                    </div>
                    <select type="file" name="tipo1" class="form-control" />
                    <option value=''>Seleccionar Tipo de Prenda para Imagen 1</option>
                     <?php
                    $w = 1;
                    while($row2 = mysqli_fetch_assoc($query2))
                    {  $url_arrivals = ($row2['url_page_tbl'] != '') ? $row2['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row2['url_page_tbl'] : $row2['id_tipo'].'|'.''; 

                       $selected = ($row['tipo_foto1'] == $row2['id_tipo']) ? "selected" : '';
                    ?>
                      <option value="<?php echo $url_arrivals;?>" <?php echo $selected; ?>>
                         <?php echo $row2['nombre_tipo']; ?>
                      </option>
                    <?php
                    $w++;
                    }?>
                    <!--<option value='#' <?php //if($row['tipo_foto1']=='#'){ //echo "selected"; } ?>>Ninguno</option> --> 
                    </select>
                   </div>
                   <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna1" class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna1']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width1"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto1']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height1"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto1']?>" />
                  </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 2</label>
                <div class="col-sm-3">
                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 495x400px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto2'];?>">
                  <input type="hidden" name="imagen22" value="<?php echo $row['foto2'];?>">
                </div>
                <div class="col-sm-2">
                  <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                  </div>
                  <select type="file" name="tipo2" class="form-control" />
                  <option value=''>Seleccionar Tipo de Prenda para Imagen 2</option>
                   <?php
                  $w = 1;
                  while($row3 =  mysqli_fetch_assoc($query3))
                  {  
                      $url_arrivals = ($row3['url_page_tbl'] != '') ? $row3['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row3['url_page_tbl'] : $row3['id_tipo'].'|'.''; 

                      $selected = ($row['tipo_foto2'] == $row3['id_tipo'])? "selected":''; 
                  ?>
                    <option value="<?php echo $url_arrivals;?>" <?php echo $selected;?>>
                      <?php echo $row3['nombre_tipo']; ?>
                    </option>
                  <?php
                  $w++;
                  }?>
                  <!--<option value='#' <?php// if($row['tipo_foto2']=='#'){ echo "selected"; } ?>>Ninguno</option>-->    
                  </select>
                 </div>
                  <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna2" class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna2']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width2"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto2']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height2"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto2']?>" />
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 3</label>
                <div class="col-sm-3">
                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 320x400px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto3'];?>">
                  <input type="hidden" name="imagen33" value="<?php echo $row['foto3'];?>">
                </div>
                <div class="col-sm-2">
                  <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                  </div>
                  <select type="file" name="tipo3" class="form-control" />
                  <option value=''>Seleccionar Tipo de Prenda para Imagen 3</option>
                   <?php
                  $w = 1;
                  while($row4 = mysqli_fetch_assoc($query4))
                  { 
                      $url_arrivals = ($row4['url_page_tbl'] != '') ? $row4['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row4['url_page_tbl'] : $row4['id_tipo'].'|'.''; 

                      $selected = ($row['tipo_foto3'] == $row4['id_tipo']) ? "selected":'';
                  ?>
                    <option value="<?php echo $url_arrivals;?>" <?php echo $selected;?>>
                      <?php echo $row4['nombre_tipo']; ?>
                    </option>
                  <?php
                  $w++;
                  }?>
                  <!--<option value='#' <?php //if($row['tipo_foto3']=='#'){ echo "selected"; } ?>>Ninguno</option> -->  
                  </select>
                 </div>
                  <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna3" class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna3']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width3"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto3']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height3"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto3']?>" />
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 4</label>
                <div class="col-sm-3">
                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 670x400px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto4'];?>">
                  <input type="hidden" name="imagen44" value="<?php echo $row['foto4'];?>">
                </div>
                <div class="col-sm-2">
                  <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                  </div>
                  <select type="file" name="tipo4" class="form-control" />
                  <option value=''>Seleccionar Tipo de Prenda para Imagen 4</option>
                  <?php
                  $w = 1;
                  while($row5 = mysqli_fetch_assoc($query5))
                  { 
                    $url_arrivals = ($row5['url_page_tbl'] != '') ? $row5['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row5['url_page_tbl'] : $row5['id_tipo'].'|'.''; 

                    $selected = ($row['tipo_foto4'] == $row5['id_tipo'])? "selected":'';
                  ?>
                    <option value="<?php echo $url_arrivals;?>" <?php echo $selected; ?>>
                      <?php echo $row5['nombre_tipo']; ?>
                    </option>
                  <?php
                  $w++;
                  }?>
                 <!-- <option value='#' <?php //if($row['tipo_foto4']=='#'){ echo "selected"; } ?>>Ninguno</option>  -->
                  </select>
                 </div>
                  <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna4" class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna4']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width4"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto4']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height4"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto4']?>" />
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 5</label>
                <div class="col-sm-3">
                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 670x400px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto5'];?>">
                  <input type="hidden" name="imagen55" value="<?php echo $row['foto5'];?>">
                </div>
                <div class="col-sm-2">
                  <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                  </div>
                  <select type="file" name="tipo5" class="form-control" />
                  <option value=''>Seleccionar Tipo de Prenda para Imagen 5</option>
                  <?php
                  $w = 1;
                  while($row6 = mysqli_fetch_assoc($query6))
                  { 
                      $url_arrivals = ($row6['url_page_tbl'] != '') ? $row6['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row6['url_page_tbl'] : $row6['id_tipo'].'|'.''; 

                      $selected = ($row['tipo_foto5'] == $row6['id_tipo']) ? "selected": '';
                  ?>
                    <option value="<?php echo $url_arrivals;?>" <?php echo $selected; ?>>
                        <?php echo $row6['nombre_tipo'] ?>
                    </option>
                  <?php
                  $w++;
                  }?>
                  <!--<option value='#' <?php //if($row['tipo_foto5']=='#'){ echo "selected"; } ?>>Ninguno</option> --> 
                  </select>
                 </div>
                  <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna5"  class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna5']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width5"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto5']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height5"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto5']?>" />
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 6</label>
                <div class="col-sm-3">
                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 320x400px
                  </div>
                  <img style="width:30%;" src="../webroot/archivos/<?php echo $row['foto6'];?>">
                  <input type="hidden" name="imagen66" value="<?php echo $row['foto6'];?>">
                </div>
                <div class="col-sm-2">
                  <div>
                        <label class="col-sm-2 control-label">Tipo</label>
                  </div>
                  <select type="file" name="tipo6" class="form-control" />
                  <option value=''>Seleccionar Tipo de Prenda para Imagen 6</option>
                  <?php
                  $w = 1;
                  while($row7 = mysqli_fetch_assoc($query7))
                  { 
                     $url_arrivals = ($row7['url_page_tbl'] != '') ? $row7['id_tipo'].'|'.$row['url_page_tbl'].'/'.$row7['url_page_tbl'] : $row7['id_tipo'].'|'.''; 

                     $selected = ($row['tipo_foto6'] == $row7['id_tipo']) ? "selected": '';
                  ?>
                    <option value="<?php echo $url_arrivals; ?>"<?php echo $selected;?> >
                       <?php echo $row7['nombre_tipo']; ?>
                    </option>
                  <?php
                  $w++;
                  }?>
                  <!--<option value='#' <?php //if($row['tipo_foto6']=='#'){ echo "selected"; } ?>>Ninguno</option>-->
                  </select>
                 </div>
                 <div class="col-sm-1">
                      <div>
                        <label class="col-sm-2 control-label">Columna</label>
                      </div>
                      <input type="number" min="0" max="12" name="columna6"  class="form-control" placeholder="N~ Columna" value="<?php echo $row['foto_columna6']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Ancho</label>
                      </div>
                      <input type="text" min="0" name="width6"  class="form-control" placeholder="Ancho" value="<?php echo $row['width_foto6']?>" />
                  </div>
                  <div class="col-sm-2">
                      <div>
                        <label class="col-sm-2 control-label">Alto</label>
                      </div>
                      <input type="text" min="0" name="height6"  class="form-control" placeholder="Alto" value="<?php echo $row['height_foto6']?>" />
                  </div>
              </div>
                
              
        <input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
        
                       
          </form>
      </div>


      </div>
    </div>

  </div>
  <!-- End Row -->


    <?php

  } 

  public function updateTipoUrlNewArribals($titulo,$ttipo,$plantilla,$tabla,$id_menu,$id_new_arrivals){
      $db_Full = new db_model(); $db_Full->conectar();
      $i = 0;

      //print_r($ttipo);

      foreach ($ttipo as $key => $value) {
        $r   = explode('|', $value);
        $id  = $r[0];
        $url = $r[1];
        $i++;
        
          if($url){
                $url_repetida = false;
                $query = $db_Full->select_sql("SELECT url_page_tbl
                                               FROM tbl_page 
                                               WHERE plantilla_page_tbl ='".$plantilla."' and
                                               tabla_page_tbl ='".$tabla."' and fk_id_menu =".$id_menu."
                                              ");

                while ($row  = mysqli_fetch_assoc($query)) {
                    if($url == $row['url_page_tbl']){ 
                        $url_repetida = true;
                    }
                }
                      //echo $url;      
                if($url_repetida == false){ // //exit;
                    $page_tble2 = array(
                                    "titulo_page_tbl"    => $titulo,
                                    "url_page_tbl"       => $url,
                                    "plantilla_page_tbl" => $plantilla,
                                    "estado_page_tbl"    => "a",
                                    "orden_page_tbl"     => 0,
                                    "tabla_page_tbl"     => $tabla,
                                    "id_tabla_page_tbl"  => $id,
                                    "fk_id_menu"         => $id_menu
                                  );
                    //print_r($page_tble2);
                    $idPage3  = $db_Full->insert_table("tbl_page",$page_tble2);
                }  
                else{  //print_r($page_tble2);
                      $where = array(
                                      "plantilla_page_tbl"     => "'".$plantilla."'",
                                      "id_tabla_page_tbl"      => $key,
                                      "tabla_page_tbl"         =>"'".$tabla."'"
                                    );

                      $idPage = $db_Full->update_table("tbl_page",$page_tbl,$where);
                } 
          }
      }
      //echo $i;
       //exit;
  }
//Edita New Arrivals
  public function updateNewArrivals()
  {
    if ($_FILES['imagenbanner']['name'] == "") {
        $imgbanner = $_POST['imagenbanner1'];
    }else{
        $destino1  = "../webroot/archivos/";
        $name1     = strtolower(date("ymdhis").$_FILES['imagenbanner']['name']);
        $temp1     = $_FILES['imagenbanner']['tmp_name'];
        $ext1      = end(explode(".", $name1));
        $type1     = $_FILES['imagenbanner']['type'];
        $size1     = $_FILES['imagenbanner']['size'];

        move_uploaded_file($temp1,$destino1.$name1);
        $banner    = explode(".",$name1);
        $imgbanner = $banner[0].'.'.$ext1;
       
    }
    if ($_FILES['imagen1']['name'] == "") {
        $imgf1     = $_POST['imagen11'];
    }else{
        $destino2  = "../webroot/archivos/";
        $name2     = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
        $temp2     = $_FILES['imagen1']['tmp_name'];
        $ext2      = end(explode(".", $name2));
        $type2     = $_FILES['imagen1']['type'];
        $size2     = $_FILES['imagen1']['size'];

        move_uploaded_file($temp2,$destino2.$name2);
        $img1      = explode(".",$name2);
        $imgf1     = $img1[0].'.'.$ext2;
    }
    if ($_FILES['imagen2']['name'] == "") {
        $imgf2     = $_POST['imagen22'];
    }else{
        $destino3  = "../webroot/archivos/";
        $name3     = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
        $temp3     = $_FILES['imagen2']['tmp_name'];
        $ext3      = end(explode(".", $name3));
        $type3     = $_FILES['imagen2']['type'];
        $size3     = $_FILES['imagen2']['size'];

        move_uploaded_file($temp3,$destino3.$name3);
        $img2      = explode(".",$name3);
        $imgf2     = $img2[0].'.'.$ext3;
    }
    if ($_FILES['imagen3']['name'] == "") {
        $imgf3     = $_POST['imagen33'];
    }else{
        $destino4  = "../webroot/archivos/";
        $name4     = strtolower(date("ymdhis").$_FILES['imagen3']['name']);
        $temp4     = $_FILES['imagen3']['tmp_name'];
        $ext4      = end(explode(".", $name4));
        $type4     = $_FILES['imagen3']['type'];
        $size4     = $_FILES['imagen3']['size'];

        move_uploaded_file($temp4,$destino4.$name4);
        $img3      = explode(".",$name4);
        $imgf3     = $img3[0].'.'.$ext4;
    }
    if ($_FILES['imagen4']['name'] == "") {
      $imgf4       = $_POST['imagen44'];
    }else{
        $destino5  = "../webroot/archivos/";
        $name5     = strtolower(date("ymdhis").$_FILES['imagen4']['name']);
        $temp5     = $_FILES['imagen4']['tmp_name'];
        $ext5      = end(explode(".", $name5));
        $type5     = $_FILES['imagen4']['type'];
        $size5     = $_FILES['imagen4']['size'];

        move_uploaded_file($temp5,$destino5.$name5);
        $img4      = explode(".",$name5);
        $imgf4     = $img4[0].'.'.$ext5;
    }
    if ($_FILES['imagen5']['name']=="") {
      $imgf5      = $_POST['imagen55'];
    }else{
        $destino6 = "../webroot/archivos/";
        $name6    = strtolower(date("ymdhis").$_FILES['imagen5']['name']);
        $temp6    = $_FILES['imagen5']['tmp_name'];
        $ext6     = end(explode(".", $name6));
        $type6    = $_FILES['imagen5']['type'];
        $size6    = $_FILES['imagen5']['size'];

        move_uploaded_file($temp6,$destino6.$name6);
        $img5     = explode(".",$name6);
        $imgf5    = $img5[0].'.'.$ext6;
    }
    if ($_FILES['imagen6']['name']=="") {
        $imgf6    = $_POST['imagen66'];
    }else{
        $destino7 = "../webroot/archivos/";
        $name7    = strtolower(date("ymdhis").$_FILES['imagen6']['name']);
        $temp7    = $_FILES['imagen6']['tmp_name'];
        $ext7     = end(explode(".", $name7));
        $type7    = $_FILES['imagen6']['type'];
        $size7    = $_FILES['imagen6']['size'];

        move_uploaded_file($temp7,$destino7.$name7);
        $img6     = explode(".",$name7);
        $imgf6    = $img6[0].'.'.$ext7;
    }
    //verificar que el tipo de prenda seleccionado ya este registrado en new
    /*$query1 = $db_Full->select_sql("SELECT count(*) AS 'canttipo' FROM tbl_new_arrivals WHERE tipo_foto1<>'7' OR tipo_foto2<>'7' OR tipo_foto3<>'7' OR tipo_foto4<>'7' OR tipo_foto5<>'7' OR tipo_foto1<>'7' AND id_new_arrivals<>'".$_GET['id']."' AND tipo_foto1<>'7' OR tipo_foto2<>'7' OR tipo_foto3<>'7' OR tipo_foto4<>'7' OR tipo_foto5<>'7' OR tipo_foto1<>'7'");*/
    $db_Full      = new db_model(); $db_Full->conectar();
    $url_foto     = array('','','','','','','');
      //$query = $db_Full->select_sql("SELECT id_tipo,url_page_tbl FROM tbl_tipos");
      
      /*while($row = mysqli_num_rows($query)){
          for ($i = 1; $i <= 6; $i++) { 
            if($_POST['tipo'.$i] == $row['id_tipo']){
             $url_foto[$i] = $row['url_page_tbl']; 
            }
          }
      }*/

      for ($i = 1; $i <= 6; $i++) { 
         $r = explode('|', $_POST['tipo'.$i]);
         $ttipo[$i] = $_POST['tipo'.$i];
         $tipo ['tipo'][$i] = $r[0];
         $tipo ['img'][$i] = $r[1];
      }

      $this->updateTipoUrlNewArribals($_POST['titulo'],$ttipo,'new_arrivals_detalle',"tbl_new_arrivals",6,$_GET['id']);

      $query = $db_Full->select_sql("UPDATE tbl_new_arrivals 
                                     SET titulo_new_arrivals='".$_POST['titulo']."' , 
                                         banner_new_arrivals='".$imgbanner."', 
                                         url_page_tbl    ='".$_POST['url']."' ,
                                         foto1='".$imgf1."', 
                                         foto2='".$imgf2."', 
                                         foto3='".$imgf3."', 
                                         foto4='".$imgf4."', 
                                         foto5='".$imgf5."', 
                                         foto6='".$imgf6."', 
                                         tipo_foto1='".$tipo ['tipo'][1]."', 
                                         tipo_foto2='".$tipo ['tipo'][2]."', 
                                         tipo_foto3='".$tipo ['tipo'][3]."', 
                                         tipo_foto4='".$tipo ['tipo'][4]."', 
                                         tipo_foto5='".$tipo ['tipo'][5]."', 
                                         tipo_foto6='".$tipo ['tipo'][6]."',
                                         foto_columna1='".$_POST['columna1']."', 
                                         foto_columna2='".$_POST['columna2']."', 
                                         foto_columna3='".$_POST['columna3']."', 
                                         foto_columna4='".$_POST['columna4']."', 
                                         foto_columna5='".$_POST['columna5']."', 
                                         foto_columna6='".$_POST['columna6']."',
                                         width_foto1='".$_POST['width1']."', 
                                         width_foto2='".$_POST['width2']."', 
                                         width_foto3='".$_POST['width3']."', 
                                         width_foto4='".$_POST['width4']."', 
                                         width_foto5='".$_POST['width5']."', 
                                         width_foto6='".$_POST['width6']."',
                                         height_foto1='".$_POST['height1']."', 
                                         height_foto2='".$_POST['height2']."', 
                                         height_foto3='".$_POST['height3']."', 
                                         height_foto4='".$_POST['height4']."', 
                                         height_foto5='".$_POST['height5']."', 
                                         height_foto6='".$_POST['height6']."',

                                         url_foto1='".$tipo ['img'][1]."', 
                                         url_foto2='".$tipo ['img'][2]."', 
                                         url_foto3='".$tipo ['img'][3]."', 
                                         url_foto4='".$tipo ['img'][4]."', 
                                         url_foto5='".$tipo ['img'][5]."', 
                                         url_foto6='".$tipo ['img'][6]."'            
                                         WHERE id_new_arrivals = '".$_GET['id']."' ");

      /*$seo = array(
                      "title_seo"         => $_POST['titulo_seo'],
                      "keywords_seo"      => $_POST['keywords_seo'],
                      "description_seo"   => $_POST['descripcion_seo']
                  );

              $where = array(
                      "id_seo"  => $row_m['_id_seo'] 
                      );

          $id_seo = $db_Full->update_table("tbl_seo",$seo,$where);*/ 
          /*if($id_seo == false) {
                    throw new Exception($mensajes['seo']);
            }*/
            /**************************************************************************/  
        $query = $db_Full->select_sql("SELECT url_page_tbl FROM  tbl_page where tabla_page_tbl='tbl_new_arrivals' and plantilla_page_tbl = 'new_arrivals' and id_tabla_page_tbl  =". $_GET['id']." and fk_id_menu = 6");      
        
        //echo mysqli_num_rows($query); exit;

        if(mysqli_num_rows($query)){

            $page_tbl   = array(
                                 "titulo_page_tbl"    => $_POST['titulo'],
                                 "url_page_tbl"       => $_POST['url'],
                                 "plantilla_page_tbl" => "new_arrivals",
                                 "estado_page_tbl"    => "a",
                                 "orden_page_tbl"     => 0,
                                 "tabla_page_tbl"     => "tbl_new_arrivals",
                                 "id_tabla_page_tbl"  => $_GET['id'],
                                 //"fk_id_seo"          => $id_seo,
                                 "fk_id_menu"         => 6
                              );

              $where    = array(
                                "id_tabla_page_tbl"   => $_GET['id'],
                                "tabla_page_tbl"      => "'tbl_new_arrivals'"
                               );

              $idPage   = $db_Full->update_table("tbl_page",$page_tbl,$where);
              
        }
        else{
              $page_tbl = array(
                                 "titulo_page_tbl"    => $_POST['titulo'],
                                 "url_page_tbl"       => $_POST['url'],
                                 "plantilla_page_tbl" => "new_arrivals",
                                 "estado_page_tbl"    => "a",
                                 "orden_page_tbl"     => 0,
                                 "tabla_page_tbl"     => "tbl_new_arrivals",
                                 "id_tabla_page_tbl"  => $_GET['id'],
                                 //"fk_id_seo"          => $id_seo,
                                 "fk_id_menu"         => 6
                                );
              //echo mysqli_num_rows($query); exit;
              $idPage   = $db_Full->insert_table("tbl_page",$page_tbl);
        }

              
    location("new_arrivals"); //exit;
  }
//nuevo arrivals
public function newNewArrivals()
  {
    
  ?>
 
 <script>
function delete_bloque(THIS){
  $(THIS).parent().remove();
}

function validando_clientes(opcion, id){
  var titulo = document.clientes.elements['titulo'];
  var imagenbanner = document.clientes.elements['imagenbanner'];
  var imagen1 = document.clientes.elements['imagen1'];
  var imagen2 = document.clientes.elements['imagen2'];
  var imagen3 = document.clientes.elements['imagen3'];
  var imagen4 = document.clientes.elements['imagen4'];
  var imagen5 = document.clientes.elements['imagen5'];
  var imagen6 = document.clientes.elements['imagen6'];
  
  if(titulo.value == ""){
    alert("Ingrese Título del New Arrivals");
    titulo.focus();
    return false;
  }
  if(imagenbanner.value == ""){
    alert("Ingrese Imagen del Banner");
    imagenbanner.focus();
    return false;
  }
  if(imagen1.value == ""){
    alert("Ingrese Imagen 1");
    imagen1.focus();
    return false;
  }
  if(imagen2.value == ""){
    alert("Ingrese Imagen 2");
    imagen2.focus();
    return false;
  }
  if(imagen3.value == ""){
    alert("Ingrese Imagen 3");
    imagen3.focus();
    return false;
  }
  if(imagen4.value == ""){
    alert("Ingrese Imagen 4");
    imagen4.focus();
    return false;
  }
  if(imagen5.value == ""){
    alert("Ingrese Imagen 5");
    imagen5.focus();
    return false;
  }
  if(imagen6.value == ""){
    alert("Ingrese Imagen 6");
    imagen6.focus();
    return false;
  }
  
  
  
  document.clientes.action="new_arrivals?action="+opcion+"&id="+id;
  document.clientes.submit();
  }


</script>
  <script src="aplication/utilidades/ckeditor/ckeditor.js"></script>
  
   <a href="new_arrivals" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO NEW ARRIVALS
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
         
            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
           
              <div class="bloque_seo clearfix" style="margin: 20px 0;">
                  <a class="btn btn-default col-sm-2 col-md-2 col-lg-2" role="button" data-toggle="collapse" href="#collapseSEO" aria-expanded="false" aria-controls="collapseExample">SEO</a>
                  <div class="col-sm-7 col-md-7 col-lg-7 collapse" id="collapseSEO">
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                          <input type="text" name="titulo_seo"  class="titulo_seo form-control" maxlength="25" placeholder="Titulo SEO (Máximo 25 caracteres)" />
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Palabras clave</label>
                        <div class="col-sm-10">
                          <input type="text" name="keywords_seo"  class="form-control" placeholder="Palabras claves separadas por coma para SEO" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="descripcion_seo" placeholder="Descripción del producto SEO"></textarea>
                        </div>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" id="titulo" class="form-control" />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen Banner</label>
                <div class="col-sm-10">
                  <input type="file" name="imagenbanner" id="imagenbanner" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 1021x425px
                  </div>
                 </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 1</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" id="imagen1" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 495x400px
                  </div>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 2</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen2" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 495x400px
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 3</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen3" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 320x400px
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 4</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen4" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 670x400px
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 5</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen5" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 670x400px
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Imagen 6</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen6" class="form-control" />
                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">
                    <i class="fa fa-lock"></i>
                    Tamaño recomendable 320x400px
                  </div>
                </div>
              </div>
         
              
              
        <input type="submit" onclick="return validando_clientes('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
        
                       
          </form>
      </div>

      </div>
    </div>

  </div>
  <!-- End Row -->
    <?php
  }
  //insertando new arrivals
    public function addNewArrivals(){
      $db_Full = new db_model(); $db_Full->conectar();
      if(isset($_FILES['imagenbanner']) && ($_FILES['imagenbanner']['name'] != ""))
    {
        $destino1 = "../webroot/archivos/";
        $name1 = strtolower(date("ymdhis").$_FILES['imagenbanner']['name']);
        $temp1 = $_FILES['imagenbanner']['tmp_name'];
        $ext1 = end(explode(".", $name1));
        $type1 = $_FILES['imagenbanner']['type'];
        $size1 = $_FILES['imagenbanner']['size'];

        move_uploaded_file($temp1,$destino1.$name1);
        $banner= explode(".",$name1);
    }
    if(isset($_FILES['imagen1']) && ($_FILES['imagen1']['name'] != ""))
    {
          $destino2 = "../webroot/archivos/";
        $name2 = strtolower(date("ymdhis").$_FILES['imagen1']['name']);
        $temp2 = $_FILES['imagen1']['tmp_name'];
        $ext2 = end(explode(".", $name2));
        $type2 = $_FILES['imagen1']['type'];
        $size2 = $_FILES['imagen1']['size'];

        move_uploaded_file($ext2,$destino2.$name2);
        $img1= explode(".",$name2);
    }
    if(isset($_FILES['imagen2']) && ($_FILES['imagen2']['name'] != ""))
    {
          $destino3 = "../webroot/archivos/";
        $name3 = strtolower(date("ymdhis").$_FILES['imagen2']['name']);
        $temp3 = $_FILES['imagen2']['tmp_name'];
        $ext3 = end(explode(".", $name3));
        $type3 = $_FILES['imagen2']['type'];
        $size3 = $_FILES['imagen2']['size'];

        move_uploaded_file($temp3,$destino3.$name3);
        $img2= explode(".",$name3);
    }
    if(isset($_FILES['imagen3']) && ($_FILES['imagen3']['name'] != ""))
    {
        $destino4 = "../webroot/archivos/";
        $name4 = strtolower(date("ymdhis").$_FILES['imagen3']['name']);
        $temp4 = $_FILES['imagen3']['tmp_name'];
        $ext4 = end(explode(".", $name4));
        $type4 = $_FILES['imagen3']['type'];
        $size4 = $_FILES['imagen3']['size'];

        move_uploaded_file($temp4,$destino4.$name4);
        $img3= explode(".",$name4);
    }
    if(isset($_FILES['imagen4']) && ($_FILES['imagen4']['name'] != ""))
    {
        $destino5 = "../webroot/archivos/";
        $name5 = strtolower(date("ymdhis").$_FILES['imagen4']['name']);
        $temp5 = $_FILES['imagen4']['tmp_name'];
        $ext5 = end(explode(".", $name5));
        $type5 = $_FILES['imagen4']['type'];
        $size5 = $_FILES['imagen4']['size'];

        move_uploaded_file($temp5,$destino5.$name5);
        $img4= explode(".",$name5);
    }
    if(isset($_FILES['imagen5']) && ($_FILES['imagen5']['name'] != ""))
    {
        $destino6 = "../webroot/archivos/";
        $name6 = strtolower(date("ymdhis").$_FILES['imagen5']['name']);
        $temp6 = $_FILES['imagen5']['tmp_name'];
        $ext6 = end(explode(".", $name6));
        $type6 = $_FILES['imagen5']['type'];
        $size6 = $_FILES['imagen5']['size'];

        move_uploaded_file($temp6,$destino6.$name6);
        $img5= explode(".",$name6);
    }
    if(isset($_FILES['imagen6']) && ($_FILES['imagen6']['name'] != ""))
    {
        $destino7 = "../webroot/archivos/";
        $name7 = strtolower(date("ymdhis").$_FILES['imagen6']['name']);
        $temp7 = $_FILES['imagen6']['tmp_name'];
        $ext7 = end(explode(".", $name7));
        $type7 = $_FILES['imagen6']['type'];
        $size7 = $_FILES['imagen6']['size'];

        move_uploaded_file($temp7,$destino7.$name7);
        $img6= explode(".",$name7);
    }
    $query_id = $db_Full->select_sql("INSERT INTO tbl_new_arrivals VALUES ('','".$_POST['titulo']."' ,'".$banner[0].'.'.$ext1."' ,'".$img1[0].'.'.$ext2."','".$img2[0].'.'.$ext3."','".$img3[0].'.'.$ext4."','".$img4[0].'.'.$ext5."','".$img5[0].'.'.$ext6."','".$img6[0].'.'.$ext7."','','','','','','')");
    
    $seo = array(
                  "title_seo"         => $_POST['titulo_seo'],
                  "keywords_seo"      => $_POST['keywords_seo'],
                  "description_seo"   => $_POST['descripcion_seo']
                );

    $id_seo = $db_Full->insert_table("tbl_seo",$seo); 

    $page_tbl = array(
                         "titulo_page_tbl"    => $_POST['titulo'],
                         "url_page_tbl"       => $_POST['url'],
                         "plantilla_page_tbl" => "new_arrivals",
                         "estado_page_tbl"    => "a",
                         "orden_page_tbl"     => 0,
                         "tabla_page_tbl"     => "tbl_productos",
                         "id_tabla_page_tbl"  => $query_id,
                         "fk_id_seo"          => $id_seo,
                         "fk_id_menu"         => 6
                      );

    $idPage = $db_Full->insert_table("tbl_page",$page_tbl);
    location("new_arrivals");
  }

  public function deleteNewArrivals()
  { $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("DELETE FROM tbl_new_arrivals WHERE id_new_arrivals = '".$_GET['id']."'");
    location("new_arrivals");
  }

  public function listNewArrivals(){
    $db_Full = new db_model(); $db_Full->conectar();
    $query = $db_Full->select_sql("select  * FROM tbl_new_arrivals order by id_new_arrivals asc");
    
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
          } } 
         </script>

    <a href="new_arrivals?action=new" class="btn btn-default btn-block">AGREGAR NEW ARRIVALS</a>
<br>

<style>
#listadoul .handle {
  cursor:move;
  }
</style>  

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de New Arrivals
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th>Nombre</th>
                <th>Eitar</th>
                <!--<th>Eliminar</th>-->
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
     $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {
  
      ?>
              
            <tr id="list_item_<?php echo $row['id_new_arrivals']."|popup"; ?>" >
                     <td ><?php echo $row['titulo_new_arrivals']; ?></td>
                  <td>
                      <a class="btn btn-default btn-block"  href="new_arrivals?id=<?php echo $row['id_new_arrivals'] ?>&action=edit">EDITAR</a>
                      </td>
                    <!--<td>
                      <a class="btn btn-default btn-block" onclick=mantenimiento("new_arrivals",<?php //echo $row['id_new_arrivals'] ?>,"delete")>ELIMINAR</a>
                    </td>-->                                    
                                                        
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
     
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

      <script>
      $(document).ready(function(){
        
        if($("#listadoul").length){
            $("#listadoul").sortable({
              handle : '.handle',
              update : function () {
              var order = $('#listadoul').sortable('serialize');
               
                $.get("ajax?"+order,{action:'ordenarPopup'},function(data){
            
              });
              }
            });
        }
         

      });
      </script>          
                   
        <?php

  }

}
?>

