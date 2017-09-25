<?php
include("../admin/aplication/controlador/inc.aplication_top2.php");
$db_Full = new db_model(); $db_Full->conectar();

switch($_GET['tipe'])
{
	
    
		
     case 'categoria':{
		if($_POST['categoria']!='')
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_items_categoria WHERE fk_item_categoria='".$_POST['categoria']."' ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_item_categoria']?>"><?php echo $row['nombre_item_categoria']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir...</option><?php }
		}break;
		
		
		
	case 'filtro':
	{
		if($_POST['filtro']!='')
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_items_filtro  WHERE fk_item_filtro='".$_POST['filtro']."' ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_item_filtro']?>"><?php echo $row['nombre_item_filtro']?></option>
			<?php
			}
		}
		else
		{
		?>
			<option value="">Elegir...</option>
		<?php 
		}
	}break;
		


	case 'filtro_categoria':
	{
		if($_POST['filtro_categoria']!='' && $_POST['filtro_categoria']!='0')
		{
			$query = $db_Full->select_sql(" SELECT icat.id_item_categoria,icat.nombre_item_categoria,icat.url_page_tbl 
                                                                   FROM tbl_categorias 
                                                                   inner join tbl_items_categoria icat on
                                                                   icat.fk_item_categoria = id_cate
                                                                   where id_cate='".$_POST['filtro_categoria'] ."' ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_item_categoria']?>"><?php echo $row['nombre_item_categoria']?></option>
			<?php
			}
		}else
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_items_filtro  WHERE fk_item_filtro='".$_POST['filtro']."' ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_item_filtro']?>"><?php echo $row['nombre_item_filtro']?></option>
			<?php
			}
		}
	}break;
		
		


	case 'lista_tipos_combobox':{
		if($_POST['tipo']!='')
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_marcas,tbl_productos_marcas  WHERE fktipo_producto='".$_POST['tipo']."' and id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto group by fkmarca_productos_marcas  ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_marca']?>"><?php echo $row['nombre_marca']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir...</option><?php }
		}break;




	case 'lista_categorias_combobox':{
		if($_POST['tipo']!='')
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_tipos,tbl_categorias WHERE id_tipo=".$_POST['tipo']." and id_tipo=fktipo_cate  ");
			?><option value="">Elegir...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_cate']?>"><?php echo $row['nombre_cate']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir...</option><?php }
		}break;



		case 'lista_tipos':{
		if($_POST['tipo']!='')
		{
			$query = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ");

			
			{
			?>
				<script>


				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

						<table id="example1" class="table display">
			            <thead>
			               <tr>
			                <th  >Producto</th>
			                <th  >Tipo de Prenda</th>
			                <th  >Foto</th>
			                <th  >Precio</th>
			                <th  >Precio Oferta</th>
			                <th >Relacionar Productos</th>
			                </tr>
			              </thead>
			              <tbody>
			              <?php
						$w = 1;
						while($row = mysqli_fetch_assoc($query))
						{

						?>

			              <tr  >
								<td ><?php echo $row['titulo_producto']; ?></td>
			                    <td ><?php echo $row['nombre_tipo']; ?></td>
			                    <td>
			                     <?php
									  if($row['foto_producto']!=".")
									   {
									   ?>
									  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="50"  >
									  <?php
									   }else
									   {
									  ?>
									  <img src="../webroot/assets/img/no_image.png" width="100" >
									  <?php
									   }
									  ?>
			                    </td>
			                    <td ><?php echo $row['precio_producto']; ?></td>
			                    <td ><?php echo $row['precio_oferta_producto']; ?></td>
			                      <td>
			                    	<a class="btn btn-default btn-block"  href="productos?id=<?php echo $row['id_producto'] ?>&action=relacionar_final">RELACIONAR PRODUCTOS</a>
			                    </td>

						</tr>
			                <?php
						$w++;
						}
						?>

			               </tbody>
			            </table>


			<?php
			}
		}
		
		}break;






		case 'lista_marcas':{
		if($_POST['tipo']!='')
		{
			if($_POST['tipo']!='' && $_POST['marca']!='')
			{
			    $query = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and id_marca=".$_POST['marca']." group by id_producto ");
			}else
			{
				$query = $db_Full->select_sql("SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ");
			}

			{
			?>
				<script>
				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

						<table id="example1" class="table display">
			            <thead>
			               <tr>
			                <th  >Producto</th>
			                <th  >Tipo de Prenda</th>
			                <th  >Foto</th>
			                <th  >Precio</th>
			                <th  >Precio Oferta</th>
			                <th >Relacionar Productos</th>
			                </tr>
			              </thead>
			              <tbody>
			              <?php
						$w = 1;
						while($row = mysqli_fetch_assoc($query))
						{

						?>

			              <tr  >
								<td ><?php echo $row['titulo_producto']; ?></td>
			                    <td ><?php echo $row['nombre_tipo']; ?></td>
			                    <td>
			                     <?php
									  if($row['foto_producto']!=".")
									   {
									   ?>
									  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="50"  >
									  <?php
									   }else
									   {
									  ?>
									  <img src="../webroot/assets/img/no_image.png" width="100" >
									  <?php
									   }
									  ?>
			                    </td>
			                    <td ><?php echo $row['precio_producto']; ?></td>
			                    <td ><?php echo $row['precio_oferta_producto']; ?></td>
			                      <td>
			                    	<a class="btn btn-default btn-block"  href="productos?id=<?php echo $row['id_producto'] ?>&action=relacionar_final">RELACIONAR PRODUCTOS</a>
			                    </td>

						</tr>
			                <?php
						$w++;
						}
						?>

			               </tbody>
			            </table>


			<?php
			}
		}
		
		}break;







		case 'lista_marcas_relacionar':{
		if($_POST['tipo']!='')
		{
			if($_POST['tipo']!='' && $_POST['marca']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and id_marca=".$_POST['marca']." group by id_producto ";
				$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." ");
    		$contador = mysqli_num_rows($validar_check); 

			{
			?>
				<script>
				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto2_re_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto2_re_pro'];?>);
				<?php
				}
				?>

				$('.seccion').on( 'click', function() 
				{
							
						    if( $(this).is(':checked') )
						    {
						        lista.push($(this).val());
						    } else
						    {
						        lista.splice( $.inArray($(this).val(),lista),1);
						        $('input[name="lista_productos"]').val(''); 
						    }

							      $.each(lista, function (ind, elem) 
							      { 
							        $('input[name="lista_productos"]').val(lista); 
							      }); 
				});


				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>
				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
				<input type="hidden" name="marca" id="marca" value="<?php echo $_POST['marca']; ?>">
						<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." and fkproducto2_re_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			}
		}
		
		}break;






		case 'lista_tipos_relacionar':{
		
			if($_POST['tipo']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
			$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="select  * FROM tbl_productos where id_producto!='".$_GET['id']."' order by id_producto asc ";
				$query = $db_Full->select_sql($sql);
			}


			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." ");
    		$contador = mysqli_num_rows($validar_check); 
			
			{
			?>
				<script>

				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto2_re_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto2_re_pro'];?>);
				<?php
				}
				?>

				$('.seccion').on( 'click', function() 
				{
							
						    if( $(this).is(':checked') )
						    {
						        lista.push($(this).val());
						    } else
						    {
						        lista.splice( $.inArray($(this).val(),lista),1);
						        $('input[name="lista_productos"]').val(''); 
						    }

							      $.each(lista, function (ind, elem) 
							      { 
							        $('input[name="lista_productos"]').val(lista); 
							      }); 
				});


				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
						 	<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos WHERE fkproducto1_re_pro=".$_GET['id']." and fkproducto2_re_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			
		}
		
		}break;

		






   case 'p':{
		if($_POST['departamento']!='')
		{
			
			$sql=" SELECT * FROM provincia WHERE  id_departamento=".$_POST['departamento']." ORDER BY nombre_provincia ";
			$query = $db_Full->select_sql($sql);
		
			?>
			<option value="">Elegir provincia...</option>
			<?php
			while($row = mysqli_fetch_assoc($query))
			{
			?>
				<option value="<?php echo $row['id_provincia']?>"><?php echo $row['nombre_provincia']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir provincia...</option><?php }
		}break;
	
	

	case 'd':{
		if($_POST['provincia']!='')
		{
			$sql=" SELECT * FROM distrito WHERE id_provincia='".$_POST['provincia']."' ORDER BY nombre_distrito ";
			$query = $db_Full->select_sql($sql);

			
			?>

			<option value="">Elegir distrito...</option><?php
			while($row = mysqli_fetch_assoc($query))
			{?>
				<option value="<?php echo $row['id_distrito']?>"><?php echo $row['nombre_distrito']?></option>
			<?php
			}
		}
		else{?><option value="">Elegir distrito...</option><?php }
		}break;








	case 'lista_tipos_relacionar_asesoria':{
		
			if($_POST['tipo']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
			$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="select  * FROM tbl_productos ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." ");
    		$contador = mysqli_num_rows($validar_check); 
			
			
			{
			?>
				<script>
				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_ase_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_ase_pro'];?>);
				<?php
				}
				?>

				 $('.seccion').on( 'click', function() 
				{
							
						    if( $(this).is(':checked') )
						    {
						        lista.push($(this).val());
						    } else
						    {
						        lista.splice( $.inArray($(this).val(),lista),1);
						        $('input[name="lista_productos"]').val(''); 
						    }

							      $.each(lista, function (ind, elem) 
							      { 
							        $('input[name="lista_productos"]').val(lista); 
							      }); 
				});

				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">

						 	<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." and fkproducto_ase_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			
		}
		
		}break;






		case 'lista_marcas_relacionar_marca':{
		if($_POST['tipo']!='')
		{
			if($_POST['tipo']!='' && $_POST['marca']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and id_marca=".$_POST['marca']." group by id_producto ";
				$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." ");
    		$contador = mysqli_num_rows($validar_check); 

			{
			?>
				<script>
				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_ase_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_ase_pro'];?>);
				<?php
				}
				?>

				 $('.seccion').on( 'click', function() 
				{
							
						    if( $(this).is(':checked') )
						    {
						        lista.push($(this).val());
						    } else
						    {
						        lista.splice( $.inArray($(this).val(),lista),1);
						        $('input[name="lista_productos"]').val(''); 
						    }

							      $.each(lista, function (ind, elem) 
							      { 
							        $('input[name="lista_productos"]').val(lista); 
							      }); 
				});
				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
				<input type="hidden" name="marca" id="marca" value="<?php echo $_POST['marca']; ?>">
						<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_asesorias_productos WHERE fkase_ase_pro=".$_GET['id']." and fkproducto_ase_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			}
		}
		
		}break;







		case 'lista_tipos_relacionar_magazine':{
		
			if($_POST['tipo']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
				$query = $db_Full->select_sql($sql);
				
			}else
			{
				$sql="select  * FROM tbl_productos  ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." ");
			$contador = mysqli_num_rows($validar_check);
			
			
			{
			?>
				<script>

				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_ma_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_ma_pro'];?>);
				<?php
				}
				?>

				 $('.seccion').on( 'click', function() 
				{
							
						    if( $(this).is(':checked') )
						    {
						        lista.push($(this).val());
						    } else
						    {
						        lista.splice( $.inArray($(this).val(),lista),1);
						        $('input[name="lista_productos"]').val(''); 
						    }

							      $.each(lista, function (ind, elem) 
							      { 
							        $('input[name="lista_productos"]').val(lista); 
							      }); 
				});

				$(document).ready(function() 
				{

				    $('#example1').DataTable();

				});
				</script>
				
					
				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">

						 	<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." and fkproducto_ma_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" onclick="ayuda(this.value)" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			
		}
		
		}break;







		case 'lista_marcas_relacionar_magazine':{
		if($_POST['tipo']!='')
		{
			if($_POST['tipo']!='' && $_POST['marca']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and id_marca=".$_POST['marca']." group by id_producto ";
				$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." ");
			$contador = mysqli_num_rows($validar_check);
			{
			?>
				<script>

				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_ma_pro'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_ma_pro'];?>);
				<?php
				}
				?>


					$( '.seccion' ).on( 'click', function() 
					{
					    if( $(this).is(':checked') )
					    {
					        lista.push($(this).val());
					    } else
					    {
					        lista.splice( $.inArray($(this).val(),lista),1);
					        $('input[name="lista_productos"]').val('');
					    }

					      $.each(lista, function (ind, elem) 
					      { 
					        $('input[name="lista_productos"]').val(lista); 
					      }); 
					});


					$(document).ready(function() 
					{
					    $('#example1').DataTable();
					} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
				<input type="hidden" name="marca" id="marca" value="<?php echo $_POST['marca']; ?>">
						<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_magazines_productos WHERE fkmagazine_ma_pro=".$_GET['id']." and fkproducto_ma_pro=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			}
		}
		
		}break;










		case 'lista_tipos_relacionar_ofertas':{
		
			if($_POST['tipo']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and descuento_producto>0 ";
			$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="select  * FROM tbl_productos  where  descuento_producto>0 ";
				$query = $db_Full->select_sql($sql);
			}


			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." ");
			$contador = mysqli_num_rows($validar_check);
			
			{
			?>
				<script>

				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_re_oferta'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_re_oferta'];?>);
				<?php
				}
				?>


					$( '.seccion' ).on( 'click', function() 
					{
					    if( $(this).is(':checked') )
					    {
					        lista.push($(this).val());
					    } else
					    {
					        lista.splice( $.inArray($(this).val(),lista),1);
					        $('input[name="lista_productos"]').val('');
					    }

					      $.each(lista, function (ind, elem) 
					      { 
					        $('input[name="lista_productos"]').val(lista); 
					      }); 
					});



				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
						 	<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." and fkproducto_re_oferta=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			
		}
		
		}break;





		case 'lista_marcas_relacionar_ofertas':{
		if($_POST['tipo']!='')
		{
			
			if($_POST['tipo']!='' && $_POST['marca']!='')
			{
			    $sql="SELECT * FROM tbl_productos,tbl_tipos,tbl_productos_marcas,tbl_marcas  WHERE id_marca=fkmarca_productos_marcas and fkproducto_productos_marcas=id_producto and fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and descuento_producto>0 and id_marca=".$_POST['marca']." group by id_producto  ";
				$query = $db_Full->select_sql($sql);
			}else
			{
				$sql="SELECT * FROM tbl_productos,tbl_tipos  WHERE fktipo_producto=id_tipo and id_tipo=".$_POST['tipo']." and descuento_producto>0 ";
				$query = $db_Full->select_sql($sql);
			}

			$validar_check=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." ");
			$contador = mysqli_num_rows($validar_check);

			{
			?>
				<script>

				var lista=new Array();	

				<?php
				while($row_check = mysqli_fetch_assoc($validar_check))
				{
						$lista_productos[]=$row_check['fkproducto_re_oferta'];
				?>	
						lista.push(<?php echo $row_check['fkproducto_re_oferta'];?>);
				<?php
				}
				?>


					$( '.seccion' ).on( 'click', function() 
					{
					    if( $(this).is(':checked') )
					    {
					        lista.push($(this).val());
					    } else
					    {
					        lista.splice( $.inArray($(this).val(),lista),1);
					        $('input[name="lista_productos"]').val('');
					    }

					      $.each(lista, function (ind, elem) 
					      { 
					        $('input[name="lista_productos"]').val(lista); 
					      }); 
					});


				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>

				<input type="hidden" name="lista_productos" value="<?php if($contador>0){ foreach ($lista_productos as $lista) echo $lista.","; } ?>">
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $_POST['tipo']; ?>">
				<input type="hidden" name="marca" id="marca" value="<?php echo $_POST['marca']; ?>">
						<table id="example1" class="table display">
				            <thead>
				               <tr>
				                <th>Título</th>
				                <th>Imagen</th>
				                <th>Activar</th>
				                <th></th>
				                <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
							$w = 1;
							while($row = mysqli_fetch_assoc($query))
							{

							?>

				            <tr >

				                    <td ><?php echo $row['titulo_producto']; ?></td>
				                    <td valign="top" >
				                    	  <?php
										  if($row['foto_producto']!=".")
										   {
										   ?>
										  <img src="../webroot/archivos/<?php echo $row['foto_producto'] ?>" width="100"  >
										  <?php
										   }else
										   {
										  ?>
										  <img src="../webroot/assets/img/no_image.png" width="100" >
										  <?php
										   }
										  ?>
				                    </td>
				                    <td>
				                    <?php
				                    $Query_SA=$db_Full->select_sql("SELECT * FROM tbl_relacionar_productos_ofertas WHERE fkcategoria_re_oferta=".$_GET['id']." and fkproducto_re_oferta=".$row['id_producto']."");
									$NUM=mysqli_num_rows($Query_SA);
									?>
				                    <input type="checkbox" class="seccion" name="seccion" id="seccion" value="<?php echo $row['id_producto']?>" <?php if($NUM==1){ echo "checked"; }?>>
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


			<?php
			}
		}
		
		}break;






		case 'lista_filtro_departamentos':{
		if($_POST['departamento']!='')
		{
			
			if($_POST['departamento']!=''  && $_POST['provincia']=='' && $_POST['distrito']=='')
			{
				$sql=" SELECT * FROM departamento,provincia,distrito where departamento.id_departamento=provincia.id_departamento and provincia.id_provincia=distrito.id_provincia and  departamento.id_departamento=".$_POST['departamento']." ";

			}else if($_POST['departamento']!='' && $_POST['provincia']!='' && $_POST['distrito']=='')
			{
				$sql=" SELECT * FROM departamento,provincia,distrito where departamento.id_departamento=provincia.id_departamento and provincia.id_provincia=distrito.id_provincia and  departamento.id_departamento=".$_POST['departamento']."  and  provincia.id_provincia=".$_POST['provincia']." ";

			}else if($_POST['departamento']!='' && $_POST['provincia']!='' && $_POST['distrito']!='')
			{
				$sql=" SELECT * FROM departamento,provincia,distrito where departamento.id_departamento=provincia.id_departamento and provincia.id_provincia=distrito.id_provincia and  departamento.id_departamento=".$_POST['departamento']."  and  provincia.id_provincia=".$_POST['provincia']." and  distrito.id_distrito=".$_POST['distrito']." ";
			}
			$query = $db_Full->select_sql($sql);

			?>
				<script>
				$(document).ready(function() 
				{
				    $('#example1').DataTable();
				} );
				</script>
			
					<table id="example1" class="table display">
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
			<?php
			
		}
		
		}break;



}
?>