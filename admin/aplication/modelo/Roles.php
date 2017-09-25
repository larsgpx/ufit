<?php
class Roles{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newRoles(){
		$db_Full = new db_model(); $db_Full->conectar();
	    

	
        
			?>
         

		<script>
		function validando_roles(opcion, id)
		{
			var titulo = document.clientes.elements['rol'];

			if(titulo.value == "")
			{
				alert("Ingrese Rol");
				titulo.focus();
				return false;
			}

			document.clientes.action="roles?action="+opcion+"&id="+id;
			document.clientes.submit();
		}
		</script> 

           <a href="?" class="btn btn-default btn-block">Atrás</a>

            <form action="" method="post" name="clientes" enctype="multipart/form-data">
          
							
										<div class="col-xs-12 col-sm-5">
											<div class="widget-box">
												<div class="widget-header">
													<h4>Registro de Rol</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="icon-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="icon-remove"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														
                                                            
														<div>
															<label for="form-field-8">Rol</label>
															<input class="form-control limited" type="text" id="form-field-9"  name="rol">	
                                                         </div>

														
                                                   
													</div>
												</div>
											</div>
										</div><!-- /span -->

                                        
                                        
                                        <div class="col-xs-12 col-sm-8">
                                        <br>
											<input type="submit" onclick="return validando_roles('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">
											
										</div><!-- /span -->
                       
        	</form>
       
		<?php
	}

	public function addRoles(){

		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("INSERT INTO  tbl_roles VALUES ('','".$_POST['rol']."')");

		location("roles");
	

	}

	public function editRoles(){
		$obj = new Rol($_GET['id']);
	
		
		?>
        
        <script>
		function validando_roles(opcion, id)
		{
			var titulo = document.clientes.elements['rol'];

			if(titulo.value == "")
			{
				alert("Ingrese Rol");
				titulo.focus();
				return false;
			}

			document.clientes.action="roles?action="+opcion+"&id="+id;
			document.clientes.submit();
		}
		</script> 


         <form action="" method="post" name="clientes" enctype="multipart/form-data">
            
             <a href="?" class="btn btn-default btn-block">Atrás</a>

							
										<div class="col-xs-12 col-sm-5">
											<div class="widget-box">
												<div class="widget-header">
													<h4>Registro de Rol</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="icon-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="icon-remove"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														
                                                            
														<div>
															<label for="form-field-8">Rol</label>
															<input class="form-control limited" type="text" id="form-field-9"  name="rol" value="<?php echo $obj->getNombre(); ?>">	
                                                         </div>

													

														
                                                   
													</div>
												</div>
											</div>
										</div><!-- /span -->

										
                                        
                                    
                                        
                                        
                                        <div class="col-xs-12 col-sm-8">
                                        <br>
											<input type="submit" onclick="return validando_roles('update','<?php echo $_GET['id'] ?>')"  value="ACTUALIZAR" class="btn btn-sm btn-success">
											<br><br>
											
										</div><!-- /span -->
                       
        	</form>
       
       
       
                       
                </ul>
                <div class="button-actions_nuevo_proveedor">

                 

                </div>

                </div>

        	</form>
      

		<?php

	}

	public function updateRoles(){
		$db_Full = new db_model(); $db_Full->conectar();
	
		$query = $db_Full->select_sql("UPDATE  tbl_roles SET nombre_rol='".$_POST['rol']."' WHERE id_rol = '".$_GET['id']."'");
		

		location("roles");
		
		
	}
	
	

	public function deleteRoles(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_roles WHERE id_rol = '".$_GET['id']."'");
		
		location("roles");
	}





	public function listRoles(){
		$db_Full = new db_model(); $db_Full->conectar();
		$sql = " SELECT * FROM tbl_roles c ORDER BY c.id_rol ASC";
		$query = $db_Full->select_sql($sql);
	
		
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


        <div id="eleg_bu">
        
          <a href="?action=new" class="btn btn-default btn-block">AGREGAR ROLES</a>
                                            
          <br><br>
    
   
                     
       <div class="table-responsive">
		<table id="sample-table-1" class="table  table-bordered">
              <thead  >
               <tr>
                <th  >Item</th>
                <th  >Roles</th>
                <th  >Privilegios</th>
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
              
            <tr  >
					<td  bgcolor="#EAEAEA"><?php echo $w; ?></td>
                    <td  bgcolor="#EAEAEA"><?php echo $row['nombre_rol']; ?></td>

                    <td>
                        <a class="btn btn-default btn-block"  href="roles?id=<?php echo $row['id_rol'] ?>&action=relacionar">PRIVILEGIOS</a>
                    </td>

                    <td bgcolor="#EAEAEA">
                    	<a class="btn btn-default btn-block" href="roles?id=<?php echo $row['id_rol'] ?>&amp;action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" href="#"  onclick=mantenimiento("roles",<?php echo $row['id_rol'] ?>,"delete")>ELIMINAR</a>
                    </td>
                                                  
                                                        
			</tr>
                <?php
			$w++;
			}
			?>        
                        
              </tbody>
            
              </table>  
              
              </div>        
            
            
        <?php

	}







	public function relacionarRoles()
  {
    
    $db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_privilegio ";
    $query = $db_Full->select_sql($sql);


    $query2 = $db_Full->select_sql("select nombre_rol FROM tbl_roles where id_rol=".$_GET['id']."");
    $row2   = mysqli_fetch_assoc($query2);
    $nombre_rol=$row2['nombre_rol'];


    $validar_check=$db_Full->select_sql("SELECT * FROM tbl_roles_privilegios WHERE fkrol_rol_pri=".$_GET['id']." ");
    $contador = mysqli_num_rows($validar_check); 
   
   ?>

    <script>
    var lista=new Array();  

    <?php
    while($row_check = mysqli_fetch_assoc($validar_check))
    {
        $lista_productos[]=$row_check['fkprivilegio_rol_pri'];
    ?>  
        lista.push(<?php echo $row_check['fkprivilegio_rol_pri'];?>);
    <?php
    }
    ?>


    </script>


  <a href="roles" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
    <br>
    <table>
    <tr>
       <td align="center">Rol :  <B> <?php echo $nombre_rol; ?> </B> se relacionará con :</td>
    </tr>
    </table>
  </div>
                   

 
<form name="f1" action="" method="post">



<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de módulos a relacionar
        </div>
        <div class="panel-body table-responsive">




  
       <table  class="table display">
      <tr bgcolor="#F2F2F2">
                 <td colspan="4" align="center"  style="padding-top:20px; padding-bottom:20px" >
         <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='roles?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
        </tr>
    </table>

      <div id="relacionar_productos">
        <input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
            <table id="example0" class="table display">
            <thead>
                <tr>
                <th >Modulo</th>
                <th >Activar</th>
                <th ></th>
                <th ></th>
                </tr>
              </thead>
              <tbody>
              <?php
      $w = 1;
      while($row = mysqli_fetch_assoc($query))
      {
      ?>
            <tr >
                    <td ><?php echo $row['titulo_privilegio']; ?></td>
                   
                    <td>
                    <?php
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_roles_privilegios WHERE fkrol_rol_pri=".$_GET['id']." and fkprivilegio_rol_pri=".$row['id_privilegio']."");
          $NUM=mysqli_num_rows($Query_SA);
          ?>
                    <input type="checkbox" class="seccion" name="seccion" id="seccion"  value="<?php echo $row['id_privilegio']?>" <?php if($NUM==1){ echo "checked"; }?>>
                    </td>
                    <TD></TD>
                    <TD></TD>
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
    </div>

    </form>
    <!-- End Panel -->
  <?php
  }








function addrelacionarRoles()
{
 
	$db_Full = new db_model(); $db_Full->conectar();
    
    $sql1="SELECT * FROM tbl_privilegio ";
    $query1 = $db_Full->select_sql($sql1);
  
    while($row1 = mysqli_fetch_assoc($query1))
    {     
      $DelQuery=$db_Full->select_sql( "DELETE FROM tbl_roles_privilegios WHERE fkprivilegio_rol_pri=".$row1['id_privilegio']." and  fkrol_rol_pri=".$_GET['id']." ");
    }

    $array_2=array();

    $cadena = $_POST['lista_productos'];
    $array = explode(",", $cadena);

    foreach ($array as $clave=>$valor)
      { 
        if($valor!=0)
        {
          $array_1 =array(
              "fkprivilegio_rol_pri" => $valor,
              "fkrol_rol_pri"        => $_GET['id']
            ); 
          array_push($array_2, $array_1);
        }
      }

    $Query= $db_Full->insert_batch("tbl_roles_privilegios",$array_2);
    location("roles?action=relacionar&id=".$_GET['id']);
}







		function getRoles(){
		$data; $db_Full = new db_model(); $db_Full->conectar();
		$sql = "SELECT * FROM tbl_roles ORDER BY id_rol DESC ";
		$query = $db_Full->select_sql($sql);
		while($row = mysqli_fetch_assoc($query)){
			$data[] = array(
						'id'		=> $row['id_rol'],
						'nombre'	=> $row['nombre_rol']
			);		
		}
		return $data; 	
	}
	



}
?>