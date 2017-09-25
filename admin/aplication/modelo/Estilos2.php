<?php
class Estilos{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	

	public function editEstilos(){
		
		
       $obj =  new Estilo($_GET['id']);


		?>
         
              
<script>


function validando_clientes(opcion, id){
	
	var des = document.clientes.elements['editor1'];
	

	
	
	if(des.value == ""){
		alert("Ingrese texto de estilos");
		des.focus();
		return false;
	}
	
	document.clientes.action="estilos?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

<script src="aplication/utilidades/ckeditor/ckeditor.js"></script>

 <a href="estilos" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR ESTILOS Y CONSEJOS
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">
           
            
              <div class="form-group">
                   <label class="col-sm-2 control-label">Imagen principal</label>
                <div class="col-sm-10">
                 
                  <input type="file" name="imagen1" class="form-control" />
                 
                  <?php  
				  if($obj->__get('_foto')!=".")
				   {
				   ?>
                   <br>
                  <img src="../webroot/archivos/<?php echo $obj->__get('_foto') ?>" width="200"  >
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

	public function updateEstilos()
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
			$update1 = " foto_estilo = '".$name_pfd1[0].'.'.$ext1."' ";
			$query = $db_Full->select_sql("UPDATE  tbl_estilos SET ".$update1." WHERE id_estilo = '".$_GET['id']."' ");
		}
		
		

		$query = $db_Full->select_sql("UPDATE  tbl_estilos SET des_estilo='".$_POST['editor1']."'  WHERE id_estilo = '".$_GET['id']."' ");
		location("estilos");
	}
	
	



	public function listEstilos()
	{
        $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_estilos");
		
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



<style>
#listadoul .handle {
	cursor:move;
	}
</style>  

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Estilos
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>
                 <th>Estilo</th>
               <th >Editar</th>
                </tr> 
              </thead>
                <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{
		
			?>
              
            <tr>
            	  <td >Estilos y consejos</td>
                  <td>
                    	<a class="btn btn-default btn-block"  href="estilos?id=<?php echo $row['id_estilo'] ?>&action=edit">EDITAR</a>
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
	
	
	
	

   
   
   

}
?>