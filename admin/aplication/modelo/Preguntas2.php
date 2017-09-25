<?php
class Preguntas{

	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}






	public function list_temasPreguntas(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql(" select  * FROM tbl_temas,tbl_preguntas where fktema_pre=id_tema and id_tema=".$_GET['id_tema']." ");


		?>

         <script>
		function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_temas_preguntas"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_temas_preguntas"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }

		function validando_clientes(opcion, id)
		{
			var pregunta = document.clientes.elements['pregunta'];
			var respuesta = document.clientes.elements['respuesta'];

			if(pregunta.value == ""){
				alert("Ingrese una pregunta");
				pregunta.focus();
				return false;
			}


			if(respuesta.value == ""){
				alert("Ingrese una respuesta");
				respuesta.focus();
				return false;
			}

			document.clientes.action="temas_preguntas?action="+opcion+"&id="+id;
			document.clientes.submit();
		}


       </script>

<script type="text/javascript" src="aplication/utilidades/ckeditor/ckeditor.js"></script>


     <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Pregunta</label>
                <div class="col-sm-10">
                  <input type="text"  name="pregunta"  class="form-control" />
                   <input type="hidden" value="<?php echo $_GET['id_tema']?>" name="id_tema"  class="form-control" />
                </div>
              </div>

              <br>
           <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Respuesta</label>
                <div class="col-sm-10">
                 <TEXTAREA  name="respuesta" id="ckeditor"  class="ckeditor" >  </TEXTAREA>
                  
                </div>
              </div>


				<input type="submit" onclick="return validando_clientes('add_temas_preguntas','<?php echo $_GET['id_tema'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


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
          Lista de Preguntas
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
            <thead>
               <tr>

                <th  >Pregunta</th>
                <th  >Respuesta</th>
                <th >Eliminar</th>
                </tr>
              </thead>
              <tbody >
              <?php
			$w = 1;
			while($row = mysqli_fetch_assoc($query))
			{

			?>

            <tr class="gradeX">

                    <td ><?php echo $row['titulo_pre']; ?></td>
                    <td ><?php echo $row['respuesta_pre']; ?></td>
                    <td>
                    	<a class="btn btn-default btn-block"  href="temas_preguntas?id_pre=<?php echo $row['id_pre'] ?>&id_tema=<?php echo $_GET['id_tema'];?>&action=edit_temas_preguntas">EDITAR</a>
                    </td>
                     <td>
                    	<a class="btn btn-default btn-block" onclick=mantenimiento("temas_preguntas?id_tema=<?php echo $_GET['id_tema'];?>",<?php echo $row['id_pre'] ?>,"delete_temas_preguntas")>ELIMINAR</a>
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








	public function add_temas_preguntasPreguntas(){

		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT titulo_pre from  tbl_preguntas  where titulo_pre='".$_POST['pregunta']."' and fktema_pre='".$_GET['id_tema']."' ");
        $row   = mysqli_fetch_assoc($query);
		$marca=$row['titulo_pre'];

		// if($marca=="")
		// {

		$query = $db_Full->select_sql("INSERT INTO  tbl_preguntas VALUES ('', '".$_POST['pregunta']."' ,  '".$_POST['respuesta']."', '".$_POST['id_tema']."' )");

		// }else
		// {
		// echo '<script>alert("Estos datos ya existen");</script>';
	    // }

		location("temas_preguntas?id_tema=".$_POST['id_tema']."&action=list_temas");

	}




	public function delete_temas_preguntasPreguntas()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("DELETE  FROM tbl_preguntas WHERE id_pre = '".$_GET['id']."'");
		location("temas_preguntas?id_tema=".$_GET['id_tema']."&action=list_temas");
	}






		public function edit_temas_preguntasPreguntas(){

		 $obj =  new Pregunta($_GET['id_pre']);


		?>

         <script>
		function mantenimiento(url,id,opcion)
		{
			if(opcion!="delete_temas_preguntas"){
				location.replace(url+'&action='+opcion+'&id='+id);
			}else if(opcion=="delete_temas_preguntas"){
				if(!confirm("Esta Seguro que desea Eliminar el Registro")){
					return false;
				}else{
					location.replace(url+'&action='+opcion+'&id='+id);
				}
			}
	    }

		function validando_clientes(opcion, id)
		{
			var pregunta = document.clientes.elements['pregunta'];
			var respuesta = document.clientes.elements['ckeditor'];

			if(pregunta.value == ""){
				alert("Ingrese una pregunta");
				pregunta.focus();
				return false;
			}


			if(respuesta.value == ""){
				alert("Ingrese una respuesta");
				respuesta.focus();
				return false;
			}

			document.clientes.action="temas_preguntas?action="+opcion+"&id="+id;
			document.clientes.submit();
		}


       </script>
       <script type="text/javascript" src="aplication/utilidades/ckeditor/ckeditor.js"></script>

 <a href="temas_preguntas?id_tema=<?php echo $_GET['id_tema']; ?>&action=list_temas" class="btn btn-default btn-block">ATRÁS</a>
<br>

     <!-- Start -->
  <div class="col-md-12">

       <div class="panel panel-default">
              <div class="panel-body table-responsive">

           <form action="" method="post" name="clientes" class="form-horizontal row-border"  enctype="multipart/form-data">


              <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Pregunta</label>
                <div class="col-sm-10">
                  <input type="text"  name="pregunta"  class="form-control" value="<?php echo $obj->__get('_titulo'); ?>" />
                   <input type="hidden" value="<?php echo $_GET['id_tema']?>" name="id_tema"  class="form-control" />
                </div>
              </div>

              <br>
           <div class="form-group" style="margin:0px">
                <label class="col-sm-2 control-label">Respuesta</label>
                <div class="col-sm-10">
                <TEXTAREA  name="ckeditor"  id="ckeditor"  class="ckeditor"  >  <?php echo $obj->__get('_respuesta'); ?> </TEXTAREA>
                  
                </div>
              </div>


				<input type="submit" onclick="return validando_clientes('update_temas_preguntas','<?php echo $_GET['id_pre'] ?>')" class="btn btn-sm btn-success" value="GUARDAR">


        	</form>

      		</div>

      </div>


  </div>
  <!-- End  -->



        <?php

	}




	public function update_temas_preguntasPreguntas()
	{
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("UPDATE  tbl_preguntas SET titulo_pre='".$_POST['pregunta']."' , respuesta_pre='".$_POST['ckeditor']."'  WHERE id_pre = '".$_GET['id']."' ");
		location("temas_preguntas?id_tema=".$_POST['id_tema']."&action=list_temas");


	}




}
?>
