<?php
class Temas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	public function newTemas()
	{

	?>




<script>


function validando_clientes(opcion, id){
	var tema = document.clientes.elements['tema'];

	if(tema.value == ""){
		alert("Ingrese un Tema");
		tema.focus();
		return false;
	}



	document.clientes.action="temas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>

   <a href="temas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          REGISTRO DE NUEVO TEMA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

            <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-2 control-label">Tema</label>
                <div class="col-sm-10">
                  <input type="text" name="tema"  class="form-control" />
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

	public function addTemas(){
    $db_Full = new db_model(); $db_Full->conectar();

		$query = $db_Full->select_sql("SELECT titulo_tema from tbl_temas where titulo_tema='".$_POST['tema']."' ");
        $row   = mysqli_fetch_assoc($query);
		$tipo=$row['titulo_tema'];

		// if($tipo=="")
		// {

		$query = $db_Full->select_sql("INSERT INTO  tbl_temas VALUES ('','".$_POST['tema']."' , '' )");
		location("temas");
		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	    // }

	}


	public function editTemas(){


       $obj =  new Tema($_GET['id']);

		?>


<script>


function validando_clientes(opcion, id){
	var tema = document.clientes.elements['tema'];

	if(tema.value == ""){
		alert("Ingrese un Tema");
		tema.focus();
		return false;
	}



	document.clientes.action="temas?action="+opcion+"&id="+id;
	document.clientes.submit();
}


</script>



 <a href="temas" class="btn btn-default btn-block">ATRÁS</a>
<br>

    <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          EDITAR TEMA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">


           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label">Tema</label>
                <div class="col-sm-10">
                  <input type="text" name="tema"  class="form-control" value="<?php echo $obj->__get('_tema'); ?>" />
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

	public function updateTemas()
	{
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("UPDATE  tbl_temas SET titulo_tema='".$_POST['tema']."'  WHERE id_tema = '".$_GET['id']."'");
		location("temas");


	}



	public function deleteTemas()
	{ $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_temas WHERE id_tema = '".$_GET['id']."'");
		location("temas");
	}





	public function listTemas(){
    $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("select  * FROM tbl_temas order by orden_tema asc");

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

    <a href="temas?action=new" class="btn btn-default btn-block">AGREGAR TEMA</a>
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
          Lista de Temas
        </div>
        <div class="panel-body table-responsive">

            <table  id="example0" class="table display">
            <thead>
               <tr>
                <th></th>
                <th >Tema</th>
                <th >Agregar Preguntas</th>
                <th >Editar</th>
                <th >Eliminar</th>
                <th></th>
                </tr>
              </thead>
               <tbody id="listadoul">
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr id="list_item_<?php echo $row['id_tema']."|temas"; ?>" >
            		<td class="handle"><i class="fa fa-bars"></i></td>
                    <td ><?php echo $row['titulo_tema']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block"  data-toggle="modal" data-target="#Moda<?php echo $row['id_tema']; ?>">AGREGAR PREGUNTAS</a>



                           <!-- Modal -->
                            <div class="modal fade" id="Moda<?php echo $row['id_tema']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">AGREGAR PREGUNTAS A : <?php echo $row['titulo_tema']; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <iframe src="temas_preguntas?id_tema=<?php echo $row['id_tema'] ?>&action=list_temas" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->

                    </td>


                    <td>
                    	<a class="btn btn-default btn-block"  href="temas?id=<?php echo $row['id_tema'] ?>&action=edit">EDITAR</a>
                    </td>
                    <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("temas",<?php echo $row['id_tema'] ?>,"delete")>ELIMINAR</a>
                    </td>
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
     

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script  src="../webroot/js/admin/jquery-ui-1.10.0.custom.min.js"></script>

            <script>
			$(document).ready(function(){



	$("#listadoul").sortable({
	  handle : '.handle',
	  update : function () {
		var order = $('#listadoul').sortable('serialize');

		  $.get("ajax.php?"+order,{action:'ordenarTema'},function(data){

		});
	  }
	});



});
			</script>


        <?php

	}










}
?>
