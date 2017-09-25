<?php
class Popuphomes{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newPopuphomes()
	{
		
	?>
            
            
            
            
<script>


function validando_clientes(opcion, id){
	var nombre = document.clientes.elements['nombre'];
	var ancho = document.clientes.elements['ancho'];
	var imagen1 = document.clientes.elements['imagen1'];
	
	if(nombre.value == ""){
		alert("Ingrese Título del Popup");
		nombre.focus();
		return false;
	}
	
	
	if(ancho.value == ""){
		alert("Ingrese en pixeles el ancho del popup");
		ancho.focus();
		return false;
	}
	
	if(imagen1.value == ""){
		alert("Ingrese Imagen del Popup");
		imagen1.focus();
		return false;
	}
	
	
	
	document.clientes.action="popuphomes?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>
  <script src="aplication/utilidades/ckeditor/ckeditor.js"></script>
  
   <a href="popuphomes" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO POPUP HOME
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
         
            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
           
			
              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre"  class="form-control" />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Imagen principal</label>
                <div class="col-sm-10">
                  <input type="file" name="imagen1" class="form-control" />
                 </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Ancho máximo popup (px)</label>
                <div class="col-sm-10">
                  <input type="text" name="ancho"  class="form-control" />
                </div>
              </div>
              

                 <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
	                  <label class="col-xs-5 col-sm-5 col-md-5 col-lg-5 control-label">Periodo descuento</label>
	                  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
	                     <input type="text" id="periodo_descuento" name="periodo_descuento"  class="form-control" />
	                  </div>
	              </div>


              
               <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"> </textarea> 
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

	public function addPopuphomes()
	{
		$db_Full = new db_model(); $db_Full->conectar();
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
		
		
		
        $query = $db_Full->select_sql("INSERT INTO  tbl_popup_home VALUES ('','".$_POST['nombre']."' , '".$_POST['editor1']."' , '".$_POST['ancho']."'  , '".$name_pfd1[0].'.'.$ext1."' ,'' , '".$_POST['periodo_descuento']."' )");
		location("popuphomes");
	}


	public function editPopuphomes(){
		
		
       $obj =  new Popuphome($_GET['id']);


		
		$array_fecha_inicial= explode('-',$obj->__get('_desde'));
		$fecha_inicial_dia = $array_fecha_inicial[0];
		$fecha_inicial_mes = $array_fecha_inicial[1];
		$fecha_inicial_anio = $array_fecha_inicial[2]; 

		$desde = trim($fecha_inicial_anio)."/".trim($fecha_inicial_mes)."/".trim($fecha_inicial_dia);

		$array_fecha_final= explode('-',$obj->__get('_hasta'));
		$fecha_final_dia = $array_fecha_final[0];
		$fecha_final_mes = $array_fecha_final[1];
		$fecha_final_anio = $array_fecha_final[2]; 

		$hasta= trim($fecha_final_anio)."/".trim($fecha_final_mes)."/".trim($fecha_final_dia);
		
		?>
         
              
<script>


function validando_clientes(opcion, id){
	var nombre = document.clientes.elements['nombre'];
	var ancho = document.clientes.elements['ancho'];
	
	if(nombre.value == ""){
		alert("Ingrese Título del Popup");
		nombre.focus();
		return false;
	}
	
	
	if(ancho.value == ""){
		alert("Ingrese en pixeles el ancho del popup");
		ancho.focus();
		return false;
	}
	
	document.clientes.action="popuphomes?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

<script src="aplication/utilidades/ckeditor/ckeditor.js"></script>

 <a href="popuphomes" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR POPUP HOME
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
           
              <div class="form-group">
                <label class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre"  class="form-control" value="<?php echo $obj->__get('_nombre'); ?>" />
                </div>
              </div>
             
              
              <div class="form-group">
                   <label class="col-sm-2 control-label">Imagen principal</label>
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
              </div>
              
              
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Ancho máximo popup (px)</label>
                <div class="col-sm-10">
                  <input type="text" name="ancho"  class="form-control" value="<?php echo $obj->__get('_ancho'); ?>"  />
                </div>
              </div>
              
              
               <div class="form-group">
	                  <label class="col-sm-2 control-label">Período</label>
	                  <div class="col-sm-10">
	                     <input type="text" id="periodo_descuento" name="periodo_descuento" value="<?php echo $desde; ?> - <?php echo $hasta; ?>"  class="form-control" />
	                  </div>
	              </div>

              
               <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo $obj->__get('_des'); ?> </textarea> 
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

	public function updatePopuphomes()
	{   $db_Full = new db_model(); $db_Full->conectar();
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
			$update1 = " foto_popup_home = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_popup_home SET ".$update1." WHERE id_popup_home = '".$_GET['id']."' ");
		}
		
		$array_fecha= explode('-',$_POST['periodo_descuento']); 
		$fecha_desde = $array_fecha[0];
		$fecha_hasta = $array_fecha[1];
		
		$array_fecha_inicial= explode('/',$fecha_desde);
		$fecha_inicial_dia = $array_fecha_inicial[0];
		$fecha_inicial_mes = $array_fecha_inicial[1];
		$fecha_inicial_anio = $array_fecha_inicial[2]; 

		$desde = trim($fecha_inicial_anio)."-".trim($fecha_inicial_mes)."-".trim($fecha_inicial_dia);

		$array_fecha_final= explode('/',$fecha_hasta);
		$fecha_final_dia = $array_fecha_final[0];
		$fecha_final_mes = $array_fecha_final[1];
		$fecha_final_anio = $array_fecha_final[2]; 

		$hasta= trim($fecha_final_anio)."-".trim($fecha_final_mes)."-".trim($fecha_final_dia);

		$query = $db_Full->select_sql("UPDATE  tbl_popup_home SET nombre_popup_home='".$_POST['nombre']."' , des_popup_home='".$_POST['editor1']."' , ancho_popup_home='".$_POST['ancho']."' ,  desde_popup_home='".$desde."' ,  hasta_popup_home='".$hasta."'  WHERE id_popup_home = '".$_GET['id']."' ");
		location("popuphomes?".$desde);
	}
	
	

	public function deletePopuphomes()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_popup_home WHERE id_popup_home = '".$_GET['id']."'");
		location("popuphomes");
	}





	public function listPopuphomes(){
        $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_popup_home order by orden_popup_home asc");
		
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

    <a href="popuphomes?action=new" class="btn btn-default btn-block">AGREGAR POPUP HOME</a>
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
          Lista de Popup Home
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                 <th></th>
                <th  >Título</th>
                <th  >Ancho del Popup (pixeles)</th>
                <th >Editar</th>
                <th >Eliminar</th>
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr id="list_item_<?php echo $row['id_popup_home']."|popup"; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
                    <td ><?php echo $row['nombre_popup_home']; ?></td>
                     <td ><?php echo $row['ancho_popup_home']; ?></td>
                  <td>
                    	<a class="btn btn-default btn-block"  href="popuphomes?id=<?php echo $row['id_popup_home'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("popuphomes",<?php echo $row['id_popup_home'] ?>,"delete")>ELIMINAR</a>
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
     
     
      
     
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

            <script>
			$(document).ready(function(){
				
	
	
	$("#listadoul").sortable({
	  handle : '.handle',
	  update : function () {
		var order = $('#listadoul').sortable('serialize');
	   
		  $.get("ajax.php?"+order,{action:'ordenarPopup'},function(data){
	
		});
	  }
	});



});
			</script>          
                   
        <?php

	}
	
	
	
	

	
	
	public function listemailingPopuphomes(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_email group by email_em");
		
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

   

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en emailing
        </div>
        <div class="panel-body table-responsive">

             <table id="example0" class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr  >
            		
                    <td ><?php echo $row['email_em']; ?></td>
                    <td></td> 
                    <td></td>                                    
                                                        
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
   
   
   
   
   
   
   
   
   public function listnovedadesPopuphomes(){
  		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_novedades group by email_no");
		
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

   

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en novedades
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr  >
            		
                    <td ><?php echo $row['email_no']; ?></td>
                    <td></td> 
                    <td></td>                                    
                                                        
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
   
   
   
   
    public function listofertasPopuphomes(){
    	$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes_ofertas group by email_ofe");
		
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

   

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de usuarios inscritos en ofertas
        </div>
        <div class="panel-body table-responsive">

              <table id="example0" class="table display">
            <thead>
               <tr>
                <th >Email</th>
                <th ></th>
                <th ></th>
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr  >
            		
                    <td ><?php echo $row['email_ofe']; ?></td>
                    <td></td> 
                    <td></td>                                    
                                                        
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
	
	



}
?>