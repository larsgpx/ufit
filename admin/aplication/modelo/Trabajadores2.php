<?php
class Trabajadores{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newTrabajadores(){

		 $roles =  new Roles();
		$rols = $roles->getRoles();



			?>




<script>




function validando_trabajadores(opcion, id){
	var nombres = document.trabajadores.elements['nombres'];
	var apellidos = document.trabajadores.elements['apellidos'];
	var materno = document.trabajadores.elements['materno'];

	var dni = document.trabajadores.elements['dni'];
	var cargo = document.trabajadores.elements['email'];
	var contrato = document.trabajadores.elements['id_rol'];


	if(nombres.value == ""){
		alert("Ingrese Nombres");
		nombres.focus();
		return false;
	}

	if(apellidos.value == ""){
		alert("Ingrese apellido paterno");
		apellidos.focus();
		return false;
	}


	if(materno.value == ""){
		alert("Ingrese apellido materno");
		materno.focus();
		return false;
	}


if(dni.value == ""){
		alert("Ingrese DNI");
		dni.focus();
		return false;
	}


	if(cargo.value == ""){
		alert("Ingrese Email");
		cargo.focus();
		return false;
	}



	if(contrato.value == ""){
		alert("Ingrese Rol");
		contrato.focus();
		return false;
	}




	document.trabajadores.action="trabajadores?action="+opcion+"&id="+id;
	document.trabajadores.submit();
}



</script>

<a href="trabajadores" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          NUEVO TRABAJADOR
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form class="form-horizontal">

              <div class="form-group">
                <label class="col-sm-1 control-label">Nombres</label>
                <div class="col-sm-11">
                  <input type="text" name="nombres" class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-1 control-label">Apellido Paterno</label>
                <div class="col-sm-11">
                  <input type="text" name="apellidos" class="form-control" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-1 control-label">Apellido Materno</label>
                <div class="col-sm-11">
                  <input type="text" name="materno" class="form-control" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">DNI</label>
                <div class="col-sm-11">
                  <input type="text" name="dni" class="form-control" onKeyPress="return acceptNum(event)" maxlength="8" />
                </div>
              </div>


                 <div class="form-group">
                <label class="col-sm-1 control-label">Celular</label>
                <div class="col-sm-11">
                  <input type="text" name="celular" class="form-control" onKeyPress="return acceptNum(event)" maxlength="9" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                  <input type="text" name="email" class="form-control"   />
                </div>
              </div>





              <div class="form-group">
                <label class="col-sm-1 control-label">Rol</label>
                <div class="col-sm-11">
                  <select name='id_rol' id='id_rol' class="form-control limited">
																<option value=''> Seleccione rol</option>
																<?php foreach($rols as $key):?>
                                                                <option value='<?php echo $key['id'] ?>'><?php echo $key['nombre'] ?></option>
                                                                <?php endforeach ?>

															</select>
                </div>
              </div>


                    <div class="form-group">
                <label class="col-sm-1 control-label">Usuario</label>
                <div class="col-sm-11">
                  <input type="text" name="usuario" id="usuario" class="form-control" />
                </div>
              </div>



                      <div class="form-group">
                <label class="col-sm-1 control-label">Password</label>
                <div class="col-sm-11">
                  <input type="password" name="clave" id="clave" class="form-control" />
                </div>
              </div>


				<input type="submit" onclick="return validando_trabajadores('add','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


        	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->

		<?php
	}



	public function addTrabajadores()
	{
    $db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("SELECT dni_tra from tbl_trabajadores where dni_tra=".$_POST['dni']." ");
        $row   = mysqli_fetch_assoc($query);
		$dni=$row['dni_tra'];

		// if($dni=="")
		// {
		$query = $db_Full->select_sql("INSERT INTO  tbl_trabajadores VALUES ('','".$_POST['nombres']."','".$_POST['apellidos']."','".$_POST['materno']."','".$_POST['dni']."','".$_POST['email']."','".$_POST['id_rol']."','".$_POST['usuario']."','".$_POST['clave']."' ,'".$_POST['unidad']."' ,'".$_POST['celular']."')");

		$this->_msgbox->setMsgbox('Solucion grabada correctamente',2);
		location("trabajadores");
	// 	}else
	// 	{
	// 	echo '<script>alert("Estos datos ya existen");</script>';
	//
	// }
	//
	//


	}

	public function editTrabajadores(){

			$roles =  new Roles();
		$rols = $roles->getRoles();


       $obj =  new Trabajador($_GET['id']);



		?>


<script>


function validando_trabajadores(opcion, id){
	var nombres = document.trabajadores.elements['nombres'];
	var apellidos = document.trabajadores.elements['apellidos'];
	var materno = document.trabajadores.elements['materno'];

	var dni = document.trabajadores.elements['dni'];
	var cargo = document.trabajadores.elements['email'];
	var contrato = document.trabajadores.elements['id_rol'];

	if(nombres.value == ""){
		alert("Ingrese Nombres");
		nombres.focus();
		return false;
	}

	if(apellidos.value == ""){
		alert("Ingrese apellido paterno");
		apellidos.focus();
		return false;
	}


	if(materno.value == ""){
		alert("Ingrese apellido materno");
		materno.focus();
		return false;
	}


if(dni.value == ""){
		alert("Ingrese DNI");
		dni.focus();
		return false;
	}


	if(cargo.value == ""){
		alert("Ingrese Email");
		cargo.focus();
		return false;
	}



	if(contrato.value == ""){
		alert("Ingrese Rol");
		contrato.focus();
		return false;
	}




	document.trabajadores.action="trabajadores?action="+opcion+"&id="+id;
	document.trabajadores.submit();
}



</script>

<a href="trabajadores" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR TRABAJADOR
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

           <form action="" method="post" name="trabajadores" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-1 control-label">Nombres</label>
                <div class="col-sm-11">
                  <input type="text" name="nombres" class="form-control" value="<?php echo $obj->__get('_nombre'); ?>" />
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-1 control-label">Apellido Paterno</label>
                <div class="col-sm-11">
                  <input type="text" name="apellidos" class="form-control" value="<?php echo $obj->__get('_paterno'); ?>" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">Apellido Materno</label>
                <div class="col-sm-11">
                  <input type="text" name="materno" class="form-control" value="<?php echo $obj->__get('_materno'); ?>" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">DNI</label>
                <div class="col-sm-11">
                  <input type="text" name="dni" class="form-control"  value="<?php echo $obj->__get('_dni'); ?>" onKeyPress="return acceptNum(event)" maxlength="8" />
                </div>
              </div>



                 <div class="form-group">
                <label class="col-sm-1 control-label">Celular</label>
                <div class="col-sm-11">
                  <input type="text" name="celular" class="form-control" value="<?php echo $obj->__get('_celular'); ?>" onKeyPress="return acceptNum(event)" maxlength="9" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                  <input type="text" name="email" class="form-control"  value="<?php echo $obj->__get('_email'); ?>"  />
                </div>
              </div>



               <div class="form-group">
                <label class="col-sm-1 control-label">Rol</label>
                <div class="col-sm-11">
                 <select name='id_rol' id='id_rol' class="form-control limited">
																<option value=' '> Seleccione rol</option>
																<?php foreach($rols as $key):?>
                                                                <option value='<?php echo $key['id'] ?>' <?php if($key['nombre']==$obj->getRol()){echo "selected";} ?>><?php echo $key['nombre'] ?></option>
                                                                <?php endforeach ?>

															</select>
                </div>
              </div>


                    <div class="form-group">
                <label class="col-sm-1 control-label">Usuario</label>
                <div class="col-sm-11">
                  <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $obj->__get('_login'); ?>" />
                </div>
              </div>



                      <div class="form-group">
                <label class="col-sm-1 control-label">Password</label>
                <div class="col-sm-11">
                  <input type="password" name="clave" id="clave" class="form-control" value="<?php echo $obj->__get('_password'); ?>" />
                </div>
              </div>


				<input type="submit" onclick="return validando_trabajadores('update','<?php echo $_GET['id'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">


     	</form>

        </div>

      </div>
    </div>

  </div>
  <!-- End Row -->



		<?php

	}

	public function updateTrabajadores(){
    $db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("UPDATE  tbl_trabajadores SET nom_tra='".$_POST['nombres']."' , paterno_tra='".$_POST['apellidos']."'  , materno_tra='".$_POST['materno']."'  , dni_tra='".$_POST['dni']."'  , email_tra='".$_POST['email']."'  , user_tra='".$_POST['usuario']."' , pass_tra='".$_POST['clave']."'       , celular_tra='".$_POST['celular']."'   WHERE id_tra = '".$_GET['id']."'");



		location("trabajadores");


	}



	public function deleteTrabajadores()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_trabajadores WHERE id_tra = '".$_GET['id']."'");
		location("trabajadores");
	}






	public function listTrabajadores(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_trabajadores,tbl_roles where id_rol=fk_rol ");

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


<a href="trabajadores?action=new" class="btn btn-default btn-block">AGREGAR TRABAJADORES</a>
<br>

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Trabajadores
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rol</th>
                        <!--<th>Privilegios</th>-->
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                  <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

                    <tr>
                        <td ><?php echo $row['nom_tra']; ?></td>
                        <td ><?php echo $row['paterno_tra']; ?></td>
                        <td ><?php echo $row['materno_tra']; ?></td>
                        <td ><?php echo $row['nombre_rol']; ?></td>
                        <!--<td>
                        <a class="btn btn-default btn-block"  href="trabajadores?id=<?php //echo $row['id_tra'] ?>&action=relacionar">PRIVILEGIOS</a>
                        </td>-->
                         <td>
                        <a class="btn btn-default btn-block"  href="trabajadores?id=<?php echo $row['id_tra'] ?>&action=edit">EDITAR</a>
                        </td>
                        <td>
                        <a class="btn btn-default btn-block" onclick=mantenimiento("trabajadores",<?php echo $row['id_tra'] ?>,"delete")>ELIMINAR</a>
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










   public function relacionarTrabajadores()
  {
    
    $db_Full = new db_model();
    $db_Full->conectar();

    $sql="select  * FROM tbl_privilegio ";
    $query = $db_Full->select_sql($sql);

    $obj =  new Trabajador($_GET['id']);

 

    $validar_check=$db_Full->select_sql("SELECT * FROM tbl_trabajadores_provilegios WHERE fktrabajador_tra_pri=".$_GET['id']." ");
    $contador = mysqli_num_rows($validar_check); 
   
   ?>

    <script>
    var lista=new Array();  

    <?php
    while($row_check = mysqli_fetch_assoc($validar_check))
    {
        $lista_productos[]=$row_check['fkprivilegio_tra_pri'];
    ?>  
        lista.push(<?php echo $row_check['fkprivilegio_tra_pri'];?>);
    <?php
    }
    ?>


    </script>


  <a href="trabajadores" class="btn btn-default btn-block">REGRESAR</a>
 
  <div style="font-size:15px;">
    <br>
    <table>
    <tr>
       <td align="center">Trabajador:  <B> <?PHP ECHO $obj->__get('_nombre'); ?> </B> se relacionará con :</td>
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
         <input type="submit" class="btn btn-sm btn-success" name="guardar" value="GUARDAR" onClick="void(document.f1.action='trabajadores?id=<?php echo $_GET['id']?>&action=addrelacionar');void(document.f1.submit())"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
        </tr>
    </table>

      <div id="relacionar_productos">
        <input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  >Modulo</th>
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
                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_trabajadores_provilegios WHERE fktrabajador_tra_pri=".$_GET['id']." and fkprivilegio_tra_pri=".$row['id_privilegio']."");
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






function addrelacionarTrabajadores()
{

$db_Full = new db_model(); $db_Full->conectar();
    
    
    $sql1="SELECT * FROM tbl_privilegio  ";
    $query1 = $db_Full->select_sql($sql1);
  
    while($row1 = mysqli_fetch_assoc($query1))
    {     
      $DelQuery=$db_Full->select_sql( "DELETE FROM tbl_trabajadores_provilegios WHERE fkprivilegio_tra_pri=".$row1['id_privilegio']."  ");
    }



    $array_2=array();

    $cadena = $_POST['lista_productos'];
    $array = explode(",", $cadena);


    foreach ($array as $clave=>$valor)
      { 
        if($valor!=0)
        {
          $array_1 =array(
              "fkprivilegio_tra_pri" => $valor,
              "fktrabajador_tra_pri" => $_GET['id']
            ); 
          array_push($array_2, $array_1);
        }
      }

  

    $Query= $db_Full->insert_batch("tbl_trabajadores_provilegios",$array_2);
    
    location("trabajadores?action=relacionar&id=".$_GET['id']);



  }




}
?>
