<?php
class Popups{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newPopups()
	{
		
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
	
	document.clientes.action="popups?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>
  <script src="aplication/utilidades/ckeditor/ckeditor.js"></script>
  
   <a href="popups" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO POPUP
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
                <label class="col-sm-2 control-label">Ancho máximo popup (px)</label>
                <div class="col-sm-10">
                  <input type="text" name="ancho"  class="form-control" />
                </div>
              </div>
             
             
              <?php
              if($_GET['id']=="1")
			  {
			  ?>
               <div class="form-group">
                <label class="col-sm-2 control-label">Texto Web</label>
                <div class="col-sm-10">
                  <input type="text" name="texto"  class="form-control" />
                </div>
              </div>
               <?php
			  }
			  ?>
              
              
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

	public function addPopups()
	{
        $query = $db_Full->select_sql("INSERT INTO  tbl_popup VALUES ('','".$_POST['nombre']."' , '".$_POST['editor1']."' , '".$_POST['ancho']."' , '".$_POST['texto']."' )");
		location("popups");
	}


	public function editPopups(){
		
		
       $obj =  new Popup($_GET['id']);
		
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
	
	document.clientes.action="popups?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

<script src="aplication/utilidades/ckeditor/ckeditor.js"></script>

 <a href="popups" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR POPUP
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
                <label class="col-sm-2 control-label">Ancho máximo popup (px)</label>
                <div class="col-sm-10">
                  <input type="text" name="ancho"  class="form-control" value="<?php echo $obj->__get('_ancho'); ?>"  />
                </div>
              </div>
              
              
			  <?php
              if($_GET['id']=="1")
			  {
			  ?>
              <div class="form-group">
                <label class="col-sm-2 control-label">Texto Web</label>
                <div class="col-sm-10">
                  <input type="text" name="texto"  class="form-control" value="<?php echo $obj->__get('_texto'); ?>" />
                </div>
              </div>
              <?php
			  }
			  ?>
              
              
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

	public function updatePopups()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("UPDATE  tbl_popup SET nombre_popup='".$_POST['nombre']."' , des_popup='".$_POST['editor1']."' , ancho_popup='".$_POST['ancho']."' , titulo_popup='".$_POST['texto']."'  WHERE id_popup = '".$_GET['id']."' ");
		location("popups");
	}
	
	

	public function deletePopups()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_popup WHERE id_popup = '".$_GET['id']."'");
		location("popups");
	}





	public function listPopups(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_popup");
		
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

   <!-- <a href="popups?action=new" class="btn btn-default btn-block">AGREGAR POPUP</a>-->
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
          Lista de Popups
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  >Título</th>
                <th  >Ancho del Popup (pixeles)</th>
                <th >Editar</th>
                <th ></th>
                </tr> 
              </thead>
              <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr >
            		
                    <td ><?php echo $row['nombre_popup']; ?></td>
                     <td ><?php echo $row['ancho_popup']; ?></td>
                  <td>
                    	<a class="btn btn-default btn-block"  href="popups?id=<?php echo $row['id_popup'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                   <?php /*?> 	<a class="btn btn-default btn-block" onclick=mantenimiento("popups",<?php echo $row['id_popup'] ?>,"delete")>ELIMINAR</a>
                    <?php */?></td>                                    
                                                        
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