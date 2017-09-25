<?php
class Clientes{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newClientes(){

		 $roles =  new Roles();
		$rols = $roles->getRoles();


			?>




<script>


function validando_clientes(opcion, id){
	var nombres = document.clientes.elements['nombre'];
	var empresa = document.clientes.elements['empresa'];
	var ruc = document.clientes.elements['ruc'];
	var email = document.clientes.elements['email'];
	var celular = document.clientes.elements['celular'];
	var direccion = document.clientes.elements['direccion'];

	if(nombres.value == ""){
		alert("Ingrese Nombres");
		nombres.focus();
		return false;
	}




if(empresa.value == ""){
		alert("Ingrese empresa");
		empresa.focus();
		return false;
	}


	if(ruc.value == ""){
		alert("Ingrese RUC");
		ruc.focus();
		return false;
	}


	if(direccion.value == ""){
		alert("Ingrese dirección");
		direccion.focus();
		return false;
	}




	document.clientes.action="clientes?action="+opcion+"&id="+id;
	document.clientes.submit();
}




function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890- ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

</script>

   <a href="clientes" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          NUEVO CLIENTE
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-1 control-label">Nombres</label>
                <div class="col-sm-11">
                  <input type="text" name="nombre" onkeypress="return soloLetras(event)" class="form-control" />
                </div>
              </div>




              <div class="form-group">
                <label class="col-sm-1 control-label">Empresa</label>
                <div class="col-sm-11">
                  <input type="text" name="empresa" class="form-control" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">RUC</label>
                <div class="col-sm-11">
                  <input type="text" name="ruc" class="form-control" onkeypress="return soloNumeros(event)"  maxlength="11" />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                  <input type="text" name="email" class="form-control"   />
                </div>
              </div>





                    <div class="form-group">
                <label class="col-sm-1 control-label">Celular</label>
                <div class="col-sm-11">
                  <input type="text" name="celular" id="celular" class="form-control" onkeypress="return soloNumeros(event)" maxlength="8" />
                </div>
              </div>


                <div class="form-group">
                <label class="col-sm-1 control-label">Dirección</label>
                <div class="col-sm-11">
                  <input type="text" name="direccion" id="direccion" class="form-control" />
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

	public function addClientes(){

    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT ruc_cli from tbl_clientes where ruc_cli=".$_POST['ruc']." ");
        $row   = mysqli_fetch_assoc($query);
		$ruc=$row['ruc_cli'];

		// if($ruc=="")
		// {
		$query = $db_Full->select_sql("INSERT INTO  tbl_clientes VALUES ('','".$_POST['nombre']."' , '".$_POST['empresa']."','".$_POST['ruc']."','".$_POST['email']."','".$_POST['celular']."','".$_POST['direccion']."')");


		location("clientes");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
		//
		// }




	}

	public function editClientes(){

			$roles =  new Roles();
		$rols = $roles->getRoles();


       $obj =  new Cliente($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var nombres = document.clientes.elements['nombre'];
	var empresa = document.clientes.elements['empresa'];
	var ruc = document.clientes.elements['ruc'];
	var email = document.clientes.elements['email'];
	var celular = document.clientes.elements['celular'];
	var direccion = document.clientes.elements['direccion'];

	if(nombres.value == ""){
		alert("Ingrese Nombres");
		nombres.focus();
		return false;
	}



if(empresa.value == ""){
		alert("Ingrese empresa");
		empresa.focus();
		return false;
	}


	if(ruc.value == ""){
		alert("Ingrese RUC");
		ruc.focus();
		return false;
	}


	if(direccion.value == ""){
		alert("Ingrese dirección");
		direccion.focus();
		return false;
	}




	document.clientes.action="clientes?action="+opcion+"&id="+id;
	document.clientes.submit();
}


function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890- ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

</script>

 <a href="clientes" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR CLIENTE
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-1 control-label">Nombres</label>
                <div class="col-sm-11">
                  <input type="text" name="nombre" class="form-control" onkeypress="return soloLetras(event)" value="<?php echo $obj->__get('_nombre'); ?>" />
                </div>
              </div>






                <div class="form-group">
                <label class="col-sm-1 control-label">Empresa</label>
                <div class="col-sm-11">
                  <input type="text" name="empresa" class="form-control" value="<?php echo $obj->__get('_empresa'); ?>"  />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">RUC</label>
                <div class="col-sm-11">
                  <input type="text" name="ruc" class="form-control"  onkeypress="return soloNumeros(event)" maxlength="11" value="<?php echo $obj->__get('_ruc'); ?>"  />
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                  <input type="text" name="email" class="form-control" value="<?php echo $obj->__get('_email'); ?>"    />
                </div>
              </div>





                    <div class="form-group">
                <label class="col-sm-1 control-label">Celular</label>
                <div class="col-sm-11">
                  <input type="text" name="celular" id="celular" class="form-control" value="<?php echo $obj->__get('_celular'); ?>"  onkeypress="return soloNumeros(event)" maxlength="8" />
                </div>
              </div>


                <div class="form-group">
                <label class="col-sm-1 control-label">Dirección</label>
                <div class="col-sm-11">
                  <input type="text" name="direccion" id="direccion" class="form-control"  value="<?php echo $obj->__get('_direccion'); ?>"  />
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

	public function updateClientes()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("UPDATE  tbl_clientes SET nombre_cli='".$_POST['nombre']."' ,  email_cli='".$_POST['empresa']."'  , pais_cli='".$_POST['ruc']."'  WHERE id_cli = '".$_GET['id']."'");
		location("clientes");
	}



	public function deleteClientes(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_clientes WHERE id_cli = '".$_GET['id']."'");



		location("clientes");
	}





	public function listClientes(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_clientes");

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

 <!--   <a href="clientes?action=new" class="btn btn-default btn-block">AGREGAR CLIENTES</a>
<br>-->

<!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Clientes
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th  >Nombres</th>
                <th  >Email</th>
                <th >País</th>
                <th >Método de Envío</th>
                <th >País de Envío</th>
                <th >Dirección 1</th>
                <th >Dirección 2</th>
                <th >Provincia</th>
                <th >Postal</th>
                <th >Teléfono</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr class="gradeX">

                    <td ><?php echo $row['nombre_cli']; ?></td>
                    <td ><?php echo $row['email_cli']; ?></td>
                    <td ><?php echo $row['pais_cli']; ?></td>
                    <td ><?php echo $row['envio_cli']; ?></td>
                    <td ><?php echo $row['pais_direccion_cli']; ?></td>
                    <td ><?php echo $row['dir1_direccion_cli']; ?></td>
                    <td ><?php echo $row['dir2_direccion_cli']; ?></td>
                    <td ><?php echo $row['provincia_direccion_cli']; ?></td>
                    <td ><?php echo $row['postal_direccion_cli']; ?></td>
                    <td ><?php echo $row['tel_direccion_cli']; ?></td>
                   <?php /*?> <td>
                    <a  href="clientes?id=<?php echo $row['id_cli'] ?>&amp;action=edit">EDITAR</a>
                    &nbsp;&nbsp;
                    <a onclick=mantenimiento("clientes",<?php echo $row['id_cli'] ?>,"delete")>ELIMINAR</a>
                    </td>
                             <?php */?>

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
