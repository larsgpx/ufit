<?php
class Costos{

	private $_idioma, $_msgbox; 

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;

	}




	
public function updateCostos()
{

		$db_Full = new db_model(); 
		$db_Full->conectar();
		
		if($_POST['departamento']=="14")
		{
			$query = $db_Full->select_sql("UPDATE distrito 
									   SET costo_distrito  ='".$_POST['costo']."' 
									   WHERE id_distrito    = '".$_POST['distrito']."' ");
		}else
		{
			$query = $db_Full->select_sql("UPDATE departamento,provincia,distrito 
									   SET costo_distrito  ='".$_POST['costo']."' 
									   WHERE provincia.id_provincia=distrito.id_provincia and  provincia.id_departamento=departamento.id_departamento 
									         and  departamento.id_departamento    = '".$_POST['departamento']."' ");
		}

		location("costos");
		
}





public function listCostos()
{
		$db_Full = new db_model(); 
		$db_Full->conectar();

		$sql = " SELECT * FROM departamento,provincia,distrito where departamento.id_departamento=provincia.id_departamento and provincia.id_provincia=distrito.id_provincia ";
		$query = $db_Full->select_sql($sql);

		$sqls1 = " SELECT * FROM departamento";
		$querys1 = $db_Full->select_sql($sqls1);

		

		?>


<!-- Start Panel -->
<script>

function validando_clientes(opcion, id)
{
  var departamento = document.clientes.elements['departamento'];
  var provincia = document.clientes.elements['provincia'];
  var distrito = document.clientes.elements['distrito'];
  var costo = document.clientes.elements['costo'];

  if(departamento.value == "")
  {
    alert("Seleccione Departamento");
    departamento.focus();
    return false;
  }

  if(provincia.value == "")
  {
    alert("Seleccione Provincia");
    provincia.focus();
    return false;
  }


  if(distrito.value == "")
  {
    alert("Seleccione Distrito");
    distrito.focus();
    return false;
  }


  if(costo.value == "")
  {
    alert("Ingrese costo de envío");
    costo.focus();
    return false;
  }

  document.clientes.action="costos?action="+opcion+"&id="+id;
  document.clientes.submit();
}


function enviar_departamento(departamento)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_filtro_departamentos",
                  data : "departamento="+$('#departamento').val(),
                  success: function(data)
                  {
                     $("#busqueda_costos").html(data);
                  }
            });

}


function enviar_provincia(provincia)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_filtro_departamentos",
                  data : "departamento="+$('#departamento').val()+"&provincia="+$('#provincia').val(),
                  success: function(data)
                  {
                     $("#busqueda_costos").html(data);
                  }
            });

}



function enviar_distrito(distrito)
{
	
	$.ajax({
                  type: "POST",
                  url: "ubigeos.php?tipe=lista_filtro_departamentos",
                  data : "departamento="+$('#departamento').val()+"&provincia="+$('#provincia').val()+"&distrito="+$('#distrito').val(),
                  success: function(data)
                  {
                     $("#busqueda_costos").html(data);
                  }
            });

}


</script>
 
<div class="row">

    <div class="col-md-12">
     
    
      <div class="panel panel-default">

      <div class="panel-body">

         <div id="row">

             <div class="form-group">
	                <label class="col-sm-2 control-label">Departamento</label>
	                <div class="col-sm-2">
	                  <select class="form-control required ini_url" id="departamento" onchange="enviar_departamento(this.value);"  name="departamento">
						<option value="" data="">Seleccione</option>
							<?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_departamento'] ?>'><?php echo $rows1['nombre_departamento'] ?></option>
	                        <?php } ?>
						</select>
	                 </div>
              </div>

              <div class="form-group">
                	<label class="col-sm-2 control-label">Provincia</label>
	                <div class="col-sm-2">
	                  <select class="form-control required" id="provincia" name="provincia" onchange="enviar_provincia(this.value);">
					  </select>
					</div>
			  </div>


			  <div class="form-group">
                	<label class="col-sm-2 control-label">Distrito</label>
	                <div class="col-sm-2">
	                  <select class="form-control required" id="distrito" name="distrito" onchange="enviar_distrito(this.value);">
					  </select>
					</div>
			  </div>
	 
               
      </div>
    </div>

  </div>

 



    <div class="col-md-12" >
      <div class="panel panel-default">
        <div class="panel-title">
          Lista de Distritos
        </div>
        <div class="panel-body table-responsive" id="busqueda_costos">


            <table id="example0" class="table display">
            <thead>
               <tr>
                <th  >Departamento</th>
                <th  >Provincia</th>
                <th  >Distrito</th>
                <th  >Costo</th>
                <th  >Editar</th>
                </tr>
              </thead>
              <tbody>
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

              <tr  >
					<td ><?php echo $row['nombre_departamento']; ?></td>
                    <td ><?php echo $row['nombre_provincia']; ?></td>
                    <td ><?php echo $row['nombre_distrito']; ?></td>
                    <td ><?php echo $row['costo_distrito']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block"  href="costos?action=editar_envio&id_departamento=<?php echo $row['id_departamento'] ?>&id_provincia=<?php echo $row['id_provincia'] ?>&id_distrito=<?php echo $row['id_distrito'] ?>">EDITAR</a>
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







public function editar_envioCostos()
{
		$db_Full = new db_model(); 
		$db_Full->conectar();

		$sqls1 = " SELECT * FROM departamento";
		$querys1 = $db_Full->select_sql($sqls1);

		$sqls2 = " SELECT * FROM provincia";
		$querys2 = $db_Full->select_sql($sqls2);


		$sqls3 = " SELECT * FROM distrito";
		$querys3 = $db_Full->select_sql($sqls3);

		$query20 = $db_Full->select_sql("SELECT costo_distrito FROM distrito WHERE id_distrito=".$_GET['id_distrito']." ");
		$row20   =  mysqli_fetch_assoc($query20);
		$costo=$row20['costo_distrito'];

		?>


<!-- Start Panel -->
<script>

function validando_clientes(opcion, id)
{
  var departamento = document.clientes.elements['departamento'];
  var provincia = document.clientes.elements['provincia'];
  var distrito = document.clientes.elements['distrito'];
  var costo = document.clientes.elements['costo'];

  if(departamento.value == "")
  {
    alert("Seleccione Departamento");
    departamento.focus();
    return false;
  }

  if(provincia.value == "")
  {
    alert("Seleccione Provincia");
    provincia.focus();
    return false;
  }


  if(distrito.value == "")
  {
    alert("Seleccione Distrito");
    distrito.focus();
    return false;
  }




  document.clientes.action="costos?action="+opcion+"&id="+id;
  document.clientes.submit();
}




</script>
 
<div class="row">

    <div class="col-md-12">
     
     <form action="" method="post" name="clientes"   enctype="multipart/form-data">
      <div class="panel panel-default">

      <div class="panel-body">

         <div id="row">

             <div class="form-group">
	                <label class="col-sm-2 control-label">Departamento</label>
	                <div class="col-sm-2">
	                  <select class="form-control required ini_url" name="departamento" id="departamento" onchange="enviar_departamento(this.value);"  name="departamento">
						  <?php while($rows1 = mysqli_fetch_assoc($querys1)){?>
	                        <option value='<?php echo $rows1['id_departamento'] ?>' <?php if($_GET[id_departamento]==$rows1['id_departamento']){ echo "selected"; }?> ><?php echo $rows1['nombre_departamento'] ?></option>
	                        <?php } ?>
						</select>
	                 </div>
              </div>

              <div class="form-group">
                	<label class="col-sm-2 control-label">Provincia</label>
	                <div class="col-sm-2">
	                   <select class="form-control required ini_url" name="provincia" id="provincia" onchange="enviar_provincia(this.value);"  name="provincia">
						    <?php while($rows2 = mysqli_fetch_assoc($querys2)){?>
	                        <option value='<?php echo $rows2['id_provincia'] ?>' <?php if($_GET[id_provincia]==$rows2['id_provincia']){ echo "selected"; }?> ><?php echo $rows2['nombre_provincia'] ?></option>
	                        <?php } ?>
						</select>
					</div>
			  </div>


			  <div class="form-group">
                	<label class="col-sm-2 control-label">Distrito</label>
	                <div class="col-sm-2">
	                  <select class="form-control required" id="distrito" name="distrito" onchange="enviar_distrito(this.value);">
	                  <?php while($rows3= mysqli_fetch_assoc($querys3)){?>
	                        <option value='<?php echo $rows3['id_distrito'] ?>' <?php if($_GET[id_distrito]==$rows3['id_distrito']){ echo "selected"; }?> ><?php echo $rows3['nombre_distrito'] ?></option>
	                        <?php } ?>
					  </select>
					</div>
			  </div>


			   <div class="form-group" style="padding-top: 50px">
                	<label class="col-sm-2 control-label">Costo de envío</label>
	                <div class="col-sm-4">
	                  <input class="form-control required" id="costo" name="costo" value="<?php echo $costo;?>">
					</div>
			  </div>

			   <div class="form-group">
				   <div class="col-sm-12">
	                <input type="submit" onclick="return validando_clientes('update','<?php echo $_GET['id_tipo'] ?>')" class="btn btn-sm btn-success" value="ACTUALIZAR">
	               </div>  
               </div>
               
      </div>
    </div>

  </div>
 </form>
 



     <?php
    }



}
?>
