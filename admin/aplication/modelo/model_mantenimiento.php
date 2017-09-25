<?php 

	include("modelo_base_datos.php");
	$util 	=  new mantenimiento_ajax(); 

	switch($_POST['option']){
		
		case 'gallery_home':   			   $util -> update_gallery_home('tbl_cuerpo_home','id_cuerpo');  break;
		case 'gallery_magazine':   			   $util -> update_gallery_magazine('tbl_magazines','id_ma');  break;
		case 'filtro_producto_descuento':      $util -> filtros_productos_descuentos();  break;
		case 'filtro_producto_arrival':        $util -> filtros_productos_arrivals();  break;
		case 'filtro_producto_comprar_marca':  $util -> filtros_productos_comprar_marcas();  break;
		case 'filtro_producto_recien_llegado': $util -> filtros_productos_recien_llegados();  break;
		case 'url_productos_verificar':        $util -> verificar_url_productos();  break;
		case 'filtro_producto':                $util -> filtros_productos();  break;
		case 'gallery_tipo_marcas_cambio':     $util -> url_tipo_marca();
											   $util -> update_gallery_tipo('tbl_tipos_marcas','numero_columna_marcas','orden_tipo_marcas','','id_tipos_marcas'); 
												
												break;

		case 'gallery_tipo':     		    
											   $util -> update_gallery_tipo('tbl_tipos_imagenes','numero_columna_tipo','orden_tipo','url_page_tbl','id_tipo_img'); break;

		case 'reporte_tipo_cambio':    		 
										       $tabla     = "tbl_tipo_cambio";
										       $consulta  = "select id_tipo_cambio,nombre_moneda,tipo_moneda,valor_moneda,simbolo_moneda from tbl_tipo_cambio";
									           $campos    = array(
										     					    0 => "id_tipo_cambio",
										     					    1 => array(  "nombre"      => "nombre_moneda",
										     					    			 "tipo"        => "textfield",
										     					    			 "consulta"    => "",
										     					    	      ),
										     					    2 => array(  "nombre"      => "tipo_moneda",
										     					    			 "tipo"        => "select",
										     					    			 "consulta"    => "",
										     					    			 "no_consulta" => array( "N" => "Nacional",
	 																									 "E" => "Extranjera"
										     					    			 	                  )
										     					    	      ),
										     					    3 => array(  "nombre"      => "valor_moneda",
										     					    			 "tipo"        => "textfield",
										     					    			 "consulta"    => ""
										     					    	      ),
										     					    4 => array(  "nombre"      => "simbolo_moneda",
										     					    			 "tipo"        => "textfield",
										     					    			 "consulta"    => ""
										     					    	      )
									     					);	

									            $head      = array(
										     						0 => "Nombre tipo cambio",
										     						1 => "Tipo",
										     						2 => "Valor",
										     						3 => "Simbolo"
									     				   );	

				                         echo $util	-> reporte($tabla,$consulta,$campos,$_POST['pagina'],$head,10); 
				                         break;

		case 'update_tipo_cambio': 		 break;                         

	}


class mantenimiento_ajax{
	
	function verificar_url_productos(){ 
		$num_max        = array(); 
		$array2         = array();
		$db_Full 		= new db_model(); 
		$db_Full        ->conectar(); 
		$len_url        = strlen($_POST['url']);
		$result 		= $db_Full->select_sql("SELECT url_page_tbl 
												FROM tbl_page 
												WHERE url_page_tbl like '%".$_POST['url']."%' and LENGTH(url_page_tbl) = ".$len_url);
		
		if(mysqli_num_rows($result)){
			$i = 0;

			while($row = mysqli_fetch_assoc($result)){
				$num_max[$i] = trim($row['url_page_tbl']);
				$i++;
			}

			$resultado = array_unique($num_max);
			$array = array_combine($resultado, array_map('strlen', $resultado));
			arsort($array);
			$i = 0;
			$z = 0;
			
			foreach ($array as $key => $value) {
				if($i == 0){$r = $value;}
				if($r <= $value){
					$array2[$z] = $key;
					$z++;
				}
				$i++;
			}
			
			arsort($array2); 
			foreach ($array2 as $key => $value) {
				$url = $value; break;
			}
			
 			$ur  = substr($url,strlen($url)-1,strlen($url));
 			
 			if(is_numeric($ur)){
 				$ur2  = substr($url,0,strlen($url)-1);
 				$ur++;
 				$url=$ur2.$ur;
 				echo $url;
 			}
 			else{
 				echo $url.'-1';
 			}
		}
		else{
			echo '';
		}
	}

	function filtros_productos(){
		include('../../../config/config.php');
		$id_categoria          		= isset($_POST['data_catego']) ? $_POST['data_catego'] : '';
		$data2              		= array();
		$BASE_URL           		= $_POST['url'];
		$db_Full 		    		= new db_model(); 
		$db_Full           			-> conectar(); 
		$cantidad_paginador 		= 10;
		
		$result2                	= $db_Full->select_sql("SELECT columnas_tipo
                                                  		FROM tbl_tipos 
                                                  		WHERE id_tipo = ".$_POST['tipo']);
		if(mysqli_num_rows($result2)){
			$row = mysqli_fetch_assoc($result2);
			$data3['columna_tipo']	= $row['columnas_tipo'];
		}
		else{
			  $data3['columna_tipo']= 0;
		}

		if(isset($_POST['cantidades']))
		{
		   $cantidad_limite = $_POST['cantidades'] + $cantidad_paginador;
		}

		if(isset($_POST['filtro']) && $_POST['filtro'] != "" )
		{
			if($_POST['marca'] == "0")
			{
				$if_categoria = ($_POST['categoria'] != "") ? " inner join tbl_productos_categorias fil2 on
													fkproducto_productos_categorias  = id_producto and fkcategoria_productos_categorias = ".$_POST['categoria']." and ": '';
			
				$if_subcategoria = (isset($_POST['subcategoria']) && $_POST['subcategoria'] != "") ? " fktipo_productos_categorias  = ".$_POST['tipo']." and fksubcategoria_productos_categorias = ".$_POST['subcategoria']: '';	

				$inner_cat_subcat = $if_categoria.$if_subcategoria;
				$subfiltroo = isset($_POST['subfiltro']) ? " and fksubfiltro_productos_filtros =".$_POST['subfiltro'] : '';	

					$sql = "SELECT  fil4.nombre_marca,
							    titulo_producto,
							    tbl_productos.url_page_tbl,
							    foto_producto,
							    precio_producto,
							    precio_oferta_producto,
							    oferta_producto,
							    descuento_producto 
							    from tbl_productos
							    inner join tbl_productos_filtros fil on
								fkproducto_productos_filtros  = id_producto and
								fktipo_productos_filtros      = ".$_POST['tipo']." and
								fkfiltro_productos_filtros    = ".$_POST['filtro']." 
								".$subfiltroo."

								".$inner_cat_subcat."
													 
								left join tbl_productos_marcas fil3 on
								fkproducto_productos_marcas  = id_producto and
								fktipo_productos_marcas = ".$_POST['tipo']." 

								left join tbl_marcas fil4 on
								id_marca  = fkmarca_productos_marcas 
													";
				
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total=mysqli_num_rows($resultado_total);

			}else
			{	
				
				if($_POST['categoria']!=""){ $consulta_categoria="left"; }else{ $consulta_categoria="inner"; }

				
					$sql = "SELECT  fil4.nombre_marca,
								    titulo_producto,
								    tbl_productos.url_page_tbl,
								    foto_producto,
								    precio_producto,
								    precio_oferta_producto,
								    oferta_producto,
								    descuento_producto 
								    from tbl_productos

									inner join tbl_productos_marcas fil3 on
									fkproducto_productos_marcas  = id_producto and
									fkmarca_productos_marcas = ".$_POST['marca']." and
									fktipo_productos_marcas = ".$_POST['tipo']." "; 

									$sql.="inner join tbl_marcas fil4 on
									id_marca  = fkmarca_productos_marcas  ";

									if($_POST['filtro']!="")
									{
										 $sql.= " ".$consulta_categoria." join tbl_productos_filtros fil on
											fkproducto_productos_filtros  = id_producto and
											fktipo_productos_filtros      = ".$_POST['tipo']." and
											fkfiltro_productos_filtros    = ".$_POST['filtro']." and
											fksubfiltro_productos_filtros =".$_POST['subfiltro']."  ";

									}
				
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total  = mysqli_num_rows($resultado_total);
			}
		}
		else
		{
			$sql=" SELECT fil4.nombre_marca,
						  titulo_producto,
						  tbl_productos.url_page_tbl,
						  foto_producto,
						  precio_producto,
						  precio_oferta_producto,
						  oferta_producto,
						  descuento_producto 
						  from tbl_productos ";

			if($_POST['marca'] != "")
			{	
				
					$if_marcas = "  inner join tbl_productos_marcas fil3 on
									fkproducto_productos_marcas  = id_producto and
									fkmarca_productos_marcas = ".$_POST['marca']." and
									fktipo_productos_marcas = ".$_POST['tipo']."   

									inner join tbl_marcas fil4 on
									id_marca  = fkmarca_productos_marcas  ";

					$sql.= $if_marcas;
				
			}
			else{
				
					$if_categorias = " inner join tbl_productos_categorias prod on 
                                      prod.fkcategoria_productos_categorias = ".$_POST['categoria']." and
                                      prod.fksubcategoria_productos_categorias = ".$_POST['subcategoria']." and 
                                      prod.fktipo_productos_categorias = ".$_POST['tipo']." and
                                      prod.fkproducto_productos_categorias = id_producto  

                                      left join tbl_productos_marcas fil3 on
									  fkproducto_productos_marcas  = id_producto and
									  fktipo_productos_marcas = ".$_POST['tipo']."   

									  left join tbl_marcas fil4 on
									  id_marca  = fkmarca_productos_marcas   ";
			    	$sql.= $if_categorias;

			}

            
			$resultado_total = $db_Full->select_sql($sql);
			$cantidad_total  = mysqli_num_rows($resultado_total);

		}

		if(isset($_POST['cantidades']) && $_POST['cantidades'] != ""  )
		{
		   $sql.=" limit 0, ".$cantidad_limite." ";
		}

		$result = $db_Full->select_sql($sql);

		

		if(mysqli_num_rows($result)){ 
			$i = 0;
			while($row 	= mysqli_fetch_assoc($result))
			{
				$data2[$i]['titulo']         = $row['titulo_producto'];
				$data2[$i]['precio']         = $row['precio_producto'];
				$data2[$i]['marca']          = $row['nombre_marca'];
				
				if($row['oferta_producto'] == "si")
		        { 
		           $data2[$i]['precio']      = $row['precio_producto'] - ($row['precio_producto']*$row['descuento_producto']/100);
		           $data2[$i]['preciopro']   = $row['precio_producto'];
		        }else{
		             $data2[$i]['precio']    = $row['precio_producto'];
		             $data2[$i]['preciopro'] = "0";
		        }

				$data2[$i]['url']            = $BASE_URL.$row['url_page_tbl'];
				$data2[$i]['foto']   		 = $BASE_URL.'webroot/archivos/'.$row['foto_producto'];
				$data2[$i]['total']   		 = $cantidad_total;
				$i++;
			}
			echo json_encode(array("productos" =>$data2,"n_columnas" =>$data3));
		}else
		{
		   echo "";
		}
	}



function filtros_productos_descuentos(){
		include('../../../config/config.php');

		$data2              	= array();
		$BASE_URL           	= $_POST['url'];
		$db_Full 		    	= new db_model(); 
		$db_Full           		-> conectar(); 
		$cantidad_paginador 	= 10;
		
		$result2                = $db_Full->select_sql("SELECT columnas_tipo
                                                  		FROM tbl_tipos 
                                                  		WHERE id_tipo = ".$_POST['tipo']);
		if(mysqli_num_rows($result2  )){
			$row = mysqli_fetch_assoc($result2);
			$data3['columna_tipo']	= $row['columnas_tipo'];
		}
		else{
			  $data3['columna_tipo']	= 0;
		}


		if(isset($_POST['cantidades']))
		{
		   $cantidad_limite = $_POST['cantidades'] + $cantidad_paginador;
		}


		if(isset($_POST['filtro']) && $_POST['filtro'] != "" )
		{

				if($_POST['marca'] == "0")
				{

						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas , tbl_productos_filtros where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  descuento_producto>0 and fktipo_producto = ".$_POST['tipo']." and id_producto=fkproducto_productos_filtros and fkfiltro_productos_filtros=".$_POST['filtro']." and fksubfiltro_productos_filtros=".$_POST['subfiltro']." and fktipo_productos_filtros=".$_POST['tipo']."  ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);

				}else
				{
						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  descuento_producto>0 and fktipo_producto = ".$_POST['tipo']." and id_marca=".$_POST['marca']." ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);
				}

		}else
		{
			$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  descuento_producto>0 and fktipo_producto = ".$_POST['tipo']." ";
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total  = mysqli_num_rows($resultado_total);
		}


		if(isset($_POST['cantidades']) && $_POST['cantidades'] != ""  )
		{
		   $sql.=" limit 0, ".$cantidad_limite." ";
		}

		$result = $db_Full->select_sql($sql);

		

		if(mysqli_num_rows($result)){ 
			$i = 0;
			while($row 	= mysqli_fetch_assoc($result))
			{
				$data2[$i]['titulo']         = $row['titulo_producto'];
				$data2[$i]['precio']         = $row['precio_producto'];
				$data2[$i]['marca']          = $row['nombre_marca'];
				
				if($row['oferta_producto'] == "si")
		        { 
		           $data2[$i]['precio']      = $row['precio_producto'] - ($row['precio_producto']*$row['descuento_producto']/100);
		           $data2[$i]['preciopro']   = $row['precio_producto'];
		        }else{
		             $data2[$i]['precio']    = $row['precio_producto'];
		             $data2[$i]['preciopro'] = "0";
		        }

				$data2[$i]['url']            = $BASE_URL.$row['url_page_tbl'];
				$data2[$i]['foto']   		 = $BASE_URL.'webroot/archivos/'.$row['foto_producto'];
				$data2[$i]['total']   		 = $cantidad_total;
				$i++;
			}
			echo json_encode(array("productos" =>$data2,"n_columnas" =>$data3));
		}else
		{
		   echo "";
		}
	}


	function filtros_productos_recien_llegados(){
		include('../../../config/config.php');

		$data2              	= array();
		$BASE_URL           	= $_POST['url'];
		$db_Full 		    	= new db_model(); 
		$db_Full           		-> conectar(); 
		$cantidad_paginador 	= 10;
		
		$result2                = $db_Full->select_sql("SELECT columnas_tipo
                                                  		FROM tbl_tipos 
                                                  		WHERE id_tipo = ".$_POST['tipo']);
		if(mysqli_num_rows($result2  )){
			$row = mysqli_fetch_assoc($result2);
			$data3['columna_tipo']	= $row['columnas_tipo'];
		}
		else{
			  $data3['columna_tipo']	= 0;
		}


		if(isset($_POST['cantidades']))
		{
		   $cantidad_limite = $_POST['cantidades'] + $cantidad_paginador;
		}


		if(isset($_POST['filtro']) && $_POST['filtro'] != "" )
		{

				if($_POST['marca'] == "0")
				{

						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas , tbl_productos_filtros where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  fecha_producto BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE() and fktipo_producto = ".$_POST['tipo']." and id_producto=fkproducto_productos_filtros and fkfiltro_productos_filtros=".$_POST['filtro']." and fksubfiltro_productos_filtros=".$_POST['subfiltro']." and fktipo_productos_filtros=".$_POST['tipo']."  ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);

				}else
				{
						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  fecha_producto BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE()  and fktipo_producto = ".$_POST['tipo']." and id_marca=".$_POST['marca']." ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);
				}

		}else
		{
			$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and  fecha_producto BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE() and fktipo_producto = ".$_POST['tipo']." ";
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total  = mysqli_num_rows($resultado_total);
		}


		if(isset($_POST['cantidades']) && $_POST['cantidades'] != ""  )
		{
		   $sql.=" limit 0, ".$cantidad_limite." ";
		}

		$result = $db_Full->select_sql($sql);

		

		if(mysqli_num_rows($result)){ 
			$i = 0;
			while($row 	= mysqli_fetch_assoc($result))
			{
				$data2[$i]['titulo']         = $row['titulo_producto'];
				$data2[$i]['precio']         = $row['precio_producto'];
				$data2[$i]['marca']          = $row['nombre_marca'];
				
				if($row['oferta_producto'] == "si")
		        { 
		           $data2[$i]['precio']      = $row['precio_producto'] - ($row['precio_producto']*$row['descuento_producto']/100);
		           $data2[$i]['preciopro']   = $row['precio_producto'];
		        }else{
		             $data2[$i]['precio']    = $row['precio_producto'];
		             $data2[$i]['preciopro'] = "0";
		        }

				$data2[$i]['url']            = $BASE_URL.$row['url_page_tbl'];
				$data2[$i]['foto']   		 = $BASE_URL.'webroot/archivos/'.$row['foto_producto'];
				$data2[$i]['total']   		 = $cantidad_total;
				$i++;
			}
			echo json_encode(array("productos" =>$data2,"n_columnas" =>$data3));
		}else
		{
		   echo "";
		}
	}










function filtros_productos_comprar_marcas(){
		include('../../../config/config.php');

		$data2              	= array();
		$BASE_URL           	= $_POST['url'];
		$db_Full 		    	= new db_model(); 
		$db_Full           		-> conectar(); 
		$cantidad_paginador 	= 10;
		
		$result2                = $db_Full->select_sql("SELECT columnas_tipo
                                                  		FROM tbl_tipos 
                                                  		WHERE id_tipo = ".$_POST['tipo']);
		if(mysqli_num_rows($result2  )){
			$row = mysqli_fetch_assoc($result2);
			$data3['columna_tipo']	= $row['columnas_tipo'];
		}
		else{
			  $data3['columna_tipo']	= 0;
		}


		if(isset($_POST['cantidades']))
		{
		   $cantidad_limite = $_POST['cantidades'] + $cantidad_paginador;
		}


		if(isset($_POST['filtro']) && $_POST['filtro'] != "" )
		{

				if($_POST['marca'] == "0")
				{

						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas , tbl_productos_filtros where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas  and fktipo_producto = ".$_POST['tipo']." and id_producto=fkproducto_productos_filtros and fkfiltro_productos_filtros=".$_POST['filtro']." and fksubfiltro_productos_filtros=".$_POST['subfiltro']." and fktipo_productos_filtros=".$_POST['tipo']."  ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);

				}else
				{
						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and fktipo_producto = ".$_POST['tipo']." and id_marca=".$_POST['marca']." ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);
				}

		}else
		{
			$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto from tbl_productos, tbl_productos_marcas, tbl_marcas where id_marca=fkmarca_productos_marcas and id_producto=fkproducto_productos_marcas and fktipo_producto = ".$_POST['tipo']." ";
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total  = mysqli_num_rows($resultado_total);
		}


		if(isset($_POST['cantidades']) && $_POST['cantidades'] != ""  )
		{
		   $sql.=" limit 0, ".$cantidad_limite." ";
		}

		$result = $db_Full->select_sql($sql);

		

		if(mysqli_num_rows($result)){ 
			$i = 0;
			while($row 	= mysqli_fetch_assoc($result))
			{
				$data2[$i]['titulo']         = $row['titulo_producto'];
				$data2[$i]['precio']         = $row['precio_producto'];
				$data2[$i]['marca']          = $row['nombre_marca'];
				
				if($row['oferta_producto'] == "si")
		        { 
		           $data2[$i]['precio']      = $row['precio_producto'] - ($row['precio_producto']*$row['descuento_producto']/100);
		           $data2[$i]['preciopro']   = $row['precio_producto'];
		        }else{
		             $data2[$i]['precio']    = $row['precio_producto'];
		             $data2[$i]['preciopro'] = "0";
		        }

				$data2[$i]['url']            = $BASE_URL.$row['url_page_tbl'];
				$data2[$i]['foto']   		 = $BASE_URL.'webroot/archivos/'.$row['foto_producto'];
				$data2[$i]['total']   		 = $cantidad_total;
				$i++;
			}
			echo json_encode(array("productos" =>$data2,"n_columnas" =>$data3));
		}else
		{
		   echo "";
		}
	}



function filtros_productos_arrivals(){
		include('../../../config/config.php');

		$data2              	= array();
		$BASE_URL           	= $_POST['url'];
		$db_Full 		    	= new db_model(); 
		$db_Full           		-> conectar(); 
		$cantidad_paginador 	= 10;
		
		$result2                = $db_Full->select_sql("SELECT columnas_tipo
                                                  		FROM tbl_tipos 
                                                  		WHERE id_tipo = ".$_POST['tipo']);
		if(mysqli_num_rows($result2  )){
			$row = mysqli_fetch_assoc($result2);
			$data3['columna_tipo']	= $row['columnas_tipo'];
		}
		else{
			  $data3['columna_tipo']	= 0;
		}


		if(isset($_POST['cantidades']))
		{
		   $cantidad_limite = $_POST['cantidades'] + $cantidad_paginador;
		}


		if(isset($_POST['filtro']) && $_POST['filtro'] != "" )
		{

				if($_POST['marca'] == "0")
				{

					 	$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto FROM tbl_tipos,tbl_productos,tbl_producto_persona,tbl_tipo_persona , tbl_productos_marcas, tbl_marcas , tbl_productos_filtros where tbl_tipo_persona.id_tipo_persona=tbl_producto_persona.id_tipo_persona and tbl_productos.id_producto=tbl_producto_persona.id_producto and id_tipo=fktipo_producto and tbl_tipo_persona.id_tipo_persona=".$_POST['persona']." and fktipo_producto=".$_POST['tipo']." and id_marca=fkmarca_productos_marcas and tbl_productos.id_producto=fkproducto_productos_marcas   and tbl_productos.id_producto=fkproducto_productos_filtros and fkfiltro_productos_filtros=".$_POST['filtro']." and fksubfiltro_productos_filtros=".$_POST['subfiltro']." and fktipo_productos_filtros=".$_POST['tipo']." ";

				
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);

				}else
				{
						$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto FROM tbl_tipos,tbl_productos,tbl_producto_persona,tbl_tipo_persona , tbl_productos_marcas, tbl_marcas where tbl_tipo_persona.id_tipo_persona=tbl_producto_persona.id_tipo_persona and tbl_productos.id_producto=tbl_producto_persona.id_producto and id_tipo=fktipo_producto and tbl_tipo_persona.id_tipo_persona=".$_POST['persona']." and fktipo_producto=".$_POST['tipo']." and id_marca=fkmarca_productos_marcas and tbl_productos.id_producto=fkproducto_productos_marcas  and id_marca=".$_POST['marca']." ";
						//echo $sql;
						$resultado_total = $db_Full->select_sql($sql);
						$cantidad_total  = mysqli_num_rows($resultado_total);
				}

		}else
		{
			$sql=" SELECT nombre_marca,titulo_producto,tbl_productos.url_page_tbl,foto_producto,precio_producto,precio_oferta_producto,oferta_producto,descuento_producto FROM tbl_tipos,tbl_productos,tbl_producto_persona,tbl_tipo_persona , tbl_productos_marcas, tbl_marcas where tbl_tipo_persona.id_tipo_persona=tbl_producto_persona.id_tipo_persona and tbl_productos.id_producto=tbl_producto_persona.id_producto and id_tipo=fktipo_producto and tbl_tipo_persona.id_tipo_persona=".$_POST['persona']." and fktipo_producto=".$_POST['tipo']." and id_marca=fkmarca_productos_marcas and tbl_productos.id_producto=fkproducto_productos_marcas  ";
				//echo $sql;
				$resultado_total = $db_Full->select_sql($sql);
				$cantidad_total  = mysqli_num_rows($resultado_total);
		}


		if(isset($_POST['cantidades']) && $_POST['cantidades'] != ""  )
		{
		   $sql.=" limit 0, ".$cantidad_limite." ";
		}

		$result = $db_Full->select_sql($sql);

		

		if(mysqli_num_rows($result)){ 
			$i = 0;
			while($row 	= mysqli_fetch_assoc($result))
			{
				$data2[$i]['titulo']         = $row['titulo_producto'];
				$data2[$i]['precio']         = $row['precio_producto'];
				$data2[$i]['marca']          = $row['nombre_marca'];
				
				if($row['oferta_producto'] == "si")
		        { 
		           $data2[$i]['precio']      = $row['precio_producto'] - ($row['precio_producto']*$row['descuento_producto']/100);
		           $data2[$i]['preciopro']   = $row['precio_producto'];
		        }else{
		             $data2[$i]['precio']    = $row['precio_producto'];
		             $data2[$i]['preciopro'] = "0";
		        }

				$data2[$i]['url']            = $BASE_URL.$row['url_page_tbl'];
				$data2[$i]['foto']   		 = $BASE_URL.'webroot/archivos/'.$row['foto_producto'];
				$data2[$i]['total']   		 = $cantidad_total;
				$i++;
			}
			echo json_encode(array("productos" =>$data2,"n_columnas" =>$data3));
		}else
		{
		   echo "";
		}
	}











	function url_tipo_marca(){
		$db_Full 		= new db_model(); $db_Full->conectar(); 
		$data 			= array(array());
		$id_table 		= array();
		$id_tab         = array();
		$result 		= $db_Full->select_sql("select url_page_tbl from tbl_marcas where id_marca = ".$_POST['url_1']);
		$row 			= mysqli_fetch_assoc($result);
		$url_marca 		= $row['url_page_tbl'];
		
		foreach ($_POST['tipo'] as $key => $value) {
			$id_table['id_tipos_marcas'][] = $value['value'];
			$id_tab[] = $value['value'];
		}
		$i = 0;
		foreach ($_POST['url_2'] as $key => $value) {
			$url_f_marcas = $url_marca .'/'.$value['value'];
			$tipo_marcas_url['url_page_tbl'][] = $url_f_marcas;
			$result = $db_Full->select_sql("select id_page_tbl
										    from tbl_page 
										    where tabla_page_tbl = 'tbl_tipos_marcas' and 
										    url_page_tbl ='".$url_f_marcas."' and id_tabla_page_tbl =".$id_tab[$i]);

			if(mysqli_num_rows($result)){
				$id = mysqli_fetch_assoc($result);
				$result = $db_Full->select_sql("update tbl_page set titulo_page_tbl = '',url_page_tbl='".$url_f_marcas."',plantilla_page_tbl = 'marca_detalle',estado_page_tbl = 'a',orden_page_tbl = 0,tabla_page_tbl = 'tbl_tipos_marcas',id_tabla_page_tbl = ".$id_tab[$i].",tipo_url_page = 'i',fk_id_menu = 3,visible_page = 0 where id_page_tbl = ".$id['id_page_tbl']);
			}
			else{
				    $page_tbl = array(
						        		"titulo_page_tbl"    	=> "",
						        		"url_page_tbl"       	=> $url_f_marcas,
						        		"plantilla_page_tbl" 	=> "marca_detalle",
						        		"estado_page_tbl"    	=> "a",
						        		"orden_page_tbl"     	=> 0,
						        		"tabla_page_tbl"     	=> "tbl_tipos_marcas",
						        		"id_tabla_page_tbl"  	=> $id_tab[$i],
						        		"tipo_url_page" 		=> 'i',
						        		"visible_page"          => 0,
						        		"fk_id_menu"			=> 3
						        	);

				    $idPage = $db_Full->insert_table("tbl_page",$page_tbl);
			}
			$i ++;
		}

		array_push($data, $tipo_marcas_url);
		unset($data[0]);

		$query = $db_Full		-> update_batch("tbl_tipos_marcas",$data,$id_table);
			    

	}
	function total_num_rows($sql){
		$db_Full = new db_model(); $db_Full->conectar();
		$result = $db_Full->select_sql($sql);
		return mysqli_num_rows($result);
	}

	function update($sql){
		$db_Full = new db_model(); $db_Full->conectar();
		$result = $db_Full->select_sql($sql);
		return mysqli_num_rows($result);
	}

	function delete($sql){
		$db_Full = new db_model(); $db_Full->conectar();
		$result = $db_Full->select_sql($sql);
		return mysqli_num_rows($result);
	}

	function update_gallery_home($tabla,$id){
		$db_Full 			=  new db_model(); 
		$db_Full			-> conectar();
		$numero_marcas  	=  array();
		$orden_tipo_marcas  =  array();
		$data 				=  array(array());

		foreach ($_POST['tipo_imagen'] as $key => $value) {
			$tipo_imagen_column['tipo_imagen_cuerpo_home'][] = $value['value'];
		}
		
		array_push($data,$tipo_imagen_column);

		foreach ($_POST['ancho_imagen'] as $key => $value) {
			$ancho_imagen_column['width_cuerpo_home'][] = $value['value'];
		}
		
		array_push($data,$ancho_imagen_column);

		foreach ($_POST['alto_imagen'] as $key => $value) {
			$alto_imagen_column['height_cuerpo_home'][] = $value['value'];
		}
		
		array_push($data,$alto_imagen_column);

		foreach ($_POST['texto_imagen'] as $key => $value) {
			$texto_imagen_column['titulo_cuerpo'][] = $value['value'];
		}
		
		array_push($data,$texto_imagen_column);

		foreach ($_POST['size_texto_ima'] as $key => $value) {
			$size_texto_imagen_column['size_texto_imagen_cuerpo_home'][] = $value['value'];
		}
		
		array_push($data,$size_texto_imagen_column);

		foreach ($_POST['clases_imagen'] as $key => $value) {
			$clases_texto_imagen_column['clases_cuerpo_home'][] = $value['value'];
		}
		
		array_push($data,$clases_texto_imagen_column);
		/**********************************************************************/

		foreach ($_POST['apertura_column'] as $key => $value) {
			$apertura_column['apertura_columnas_cuerpohome'][] = $value['value'];
		}
		
		array_push($data,$apertura_column);

		foreach ($_POST['anumero_columnas'] as $key => $value) {
			$apertura_column2['numero_columna_cuerpohome_aper'][] = $value['value'];
		}
		
		array_push($data,$apertura_column2);

		foreach ($_POST['numero_columnas'] as $key => $value) {
			$numero_marcas['	numero_columna_cuerpohome'][] = $value['value'];
		}
		
		array_push($data, $numero_marcas);

		foreach ($_POST['orden_imagen'] as $key => $value) {
			$orden_tipo_marcas['orden_tipo_cuerpohome'][] = $value['value'];
		}
		//print_r($_POST['orden_imagen']); exit;
		array_push($data, $orden_tipo_marcas);

		foreach ($_POST['tipo'] as $key => $value) {
			$id_table[$id][] = $value['value'];
		}

		unset($data[0]);

		$query = $db_Full		-> update_batch($tabla,$data,$id_table);

		if($query == true){
			  echo json_encode(array("error" => 0, "mensaje" => "Los datos fueron actualizados con éxito."));
		}
		else{
			  echo json_encode(array("error" => 1, "mensaje" => "Error al actualizar"));
		}
	}
	function update_gallery_magazine($tabla,$id){
		$db_Full 			=  new db_model(); 
		$db_Full			-> conectar();
		$numero_marcas  	=  array();
		$orden_tipo_marcas  =  array();
		$data 				=  array(array());

		foreach ($_POST['apertura_column'] as $key => $value) {
			$apertura_column['apertura_columnas_magazines'][] = $value['value'];
		}
		
		array_push($data,$apertura_column);

		foreach ($_POST['anumero_columnas'] as $key => $value) {
			$apertura_column2['numero_columna_magazines_aper'][] = $value['value'];
		}
		
		array_push($data,$apertura_column2);

		foreach ($_POST['numero_columnas'] as $key => $value) {
			$numero_marcas['numero_columna_magazines'][] = $value['value'];
		}
		
		array_push($data, $numero_marcas);

		foreach ($_POST['orden_imagen'] as $key => $value) {
			$orden_tipo_marcas['orden_tipo_magazines'][] = $value['value'];
		}
		//print_r($_POST['orden_imagen']); exit;
		array_push($data, $orden_tipo_marcas);

		foreach ($_POST['tipo'] as $key => $value) {
			$id_table[$id][] = $value['value'];
		}

		unset($data[0]);

		$query = $db_Full		-> update_batch($tabla,$data,$id_table);

		if($query == true){
			  echo json_encode(array("error" => 0, "mensaje" => "Los datos fueron actualizados con éxito."));
		}
		else{
			  echo json_encode(array("error" => 1, "mensaje" => "Error al actualizar"));
		}
	}
	function update_gallery_tipo($tabla,$column,$orden_tipo,$url='',$id){  
		$db_Full 			=  new db_model(); 
		$db_Full			-> conectar();
		$numero_marcas  	=  array();
		$orden_tipo_marcas  =  array();
		$data 				=  array(array());
		$data2 				=  array(array());
		$data3 				=  array(array());

		if($url != ''){
			foreach ($_POST['url_imagen'] as $key => $value) {
				$url_img[$url][] = $value['value'];
			}
			array_push($data, $url_img);
		}

		foreach ($_POST['numero_columnas'] as $key => $value) {
			$numero_marcas[$column][] = $value['value'];
		}
		
		array_push($data, $numero_marcas);

		foreach ($_POST['orden_imagen'] as $key => $value) {
			$orden_tipo_marcas[$orden_tipo][] = $value['value'];
		}
		//print_r($_POST['orden_imagen']); exit;
		array_push($data, $orden_tipo_marcas);

		foreach ($_POST['tipo'] as $key => $value) {
			$id_table[$id][] = $value['value'];
		}

		/*foreach ($_POST['url_tipo'] as $key => $value) {
					$url_tipo_marca[$url_tipo][] = $value['value'];
		}	

		array_push($data, $url_tipo_marca); 
		array_push($data2, $url_tipo_marca);*/

		unset($data[0]);

		$query = $db_Full		-> update_batch($tabla,$data,$id_table);

		/*if(isset($_POST['url_tipo'])){ 

			$i = 0; $url_tipo_m ='';

			foreach ($_POST['url_tipo'] as $key => $value) {
				if($i != 0){ 
					$url_tipo_m.= ',';
			  	}
				$url_tipo_m.= "'".$value['value']."'"; $i++;
			}
		
			$result = $db_Full->select_sql("select id_page_tbl,url_page_tbl from tbl_page where url_page_tbl in(".$url_tipo_m.")");
		
			

			if(mysqli_num_rows($result)){

					foreach ($_POST['url_tipo'] as $key => $value) {
						while($row = mysqli_fetch_assoc($result)){
							if($row['url_page_tbl'] == $value['value']){
								$id_table2['id_page_tbl'][] = $row['url_page_tbl'];	
								$estado_page['estado_page_tbl'][] = 'a';
								$plantilla_page['plantilla_page_tbl'][] = 'marca_detalle';
							}
						}
						
					}
					array_push($data2, $estado_page);
					array_push($data2, $plantilla_page);
					unset($data2[0]);
					//print_r($data2); 
					//print_r($id_table2); 
					//exit;
					$query = $db_Full		-> update_batch("tbl_page",$data2,$id_table2);
					//print_r($query);
			}
			else{   
				    foreach ($_POST['url_tipo'] as $key => $value){

						$dat = array(
										"url_page_tbl"         => $value['value'],
										"estado_page_tbl"      => 'a',
										"plantilla_page_tbl"   => 'marca_detalle'
									);

						array_push($data3, $dat);
					}
				
					unset($data2[0]);
					$query = $db_Full		-> insert_batch("tbl_page",$data3);
			}
		}*/

		if($query == true){
			  echo json_encode(array("error" => 0, "mensaje" => "Los datos fueron actualizados con éxito."));
		}
		else{
			  echo json_encode(array("error" => 1, "mensaje" => "Error al actualizar"));
		}
	}
	function reporte($tabla,$consulta,$campos,$pag,$head,$result_paginas){
			$TAMANO_PAGINA 	=  $result_paginas;
			$paginador 		=  '';
			$db_Full 		=  new db_model(); 
			$db_Full		-> conectar();
			$pagina 		=  $pag;

			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
			       $inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}

			$num_total_registros = $this->total_num_rows("select count(".$campos[0].") from ".$tabla);

			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); // redondear valor 
			
			$consulta .= " LIMIT ".$inicio."," . $TAMANO_PAGINA; 
			$result = $db_Full->select_sql($consulta);
			$html = '<table class="table">';
			$html.= '<thead>';
			$html.= '<tr>';
				$html.= '<th>#</th>';
			foreach ($head as $key => $value) {
				$html.= '<th>'.$value.'</th>';
			}

			$html.= '</tr>';
			$html.= '<thead>';
			$html.= '<tbody>';

			if(!$pagina){
				$count = 1;
			}
			else{
					if($pagina == 1){
					   	$count = 1;	  
					}
					else{
						$count = $pagina * $TAMANO_PAGINA;
					}
			}

			while($row = mysqli_fetch_assoc($result)){
				$html.= '<tr>'; $i = 0;

				foreach ($campos as $key => $value){
					if($i == 0){
						$html .= '<td class="checkbox"><span>'.$count.'</span><input type="checkbox" onclick="checkbox_reporte(this);" value="'.$row[$value].'" style="opacity:1" /></td>';
					}
					else{
							$html .= '<td>';

						    if($value['consulta'] != ''){
						    	switch($value['tipo']){
							      	case "textfield" : $html .= '<input col="'.$key.'" onchange="change_form_reporte(this);" change="" type="text" name="form_'.$i.'" value="'.$row[$value['nombre']].'">'; 
							      						break;
								    case "select"    : $html .= '<select col="'.$key.'" onchange="change_form_reporte(this);" change=""  name="form_'.$i.'" value="'.$row[$value['nombre']].'">';
											    					$result = $db_Full->select_sql($value['consulta']);
											    					while($row2 = mysqli_fetch_assoc($result)){
											    						$html .= '<option value="'.$row2[''].'">'.$row2[''].'</option>';
											    					}
								    				   $html .= '</select>';
								      					break;
							      	default : 			$html .= $row[$value['nombre']];
							    }
						      	    //$html .= $row[$value['nombre']];
						    }

						    else{
						      	    switch($value['tipo']){
								      	case "textfield" : $html .= '<input col="'.$key.'" onchange="change_form_reporte(this);" change=""  type="text" name="form_'.$i.'" value="'.$row[$value['nombre']].'">'; 			   break;
								      	case "select"    : $html .= '<select col="'.$key.'" onchange="change_form_reporte(this);" change=""  name="form_'.$i.'">'; $selected='';
								      						foreach ($value['no_consulta'] as $key2 => $val) {
								      							$selected = ($row[$value['nombre']] == $key2)? 'selected' : '';
								      							$html .= '<option value="'.$key2.'" '.$selected.'>'.$val.'</option>';
								      						}
								      					   $html .= '</select>';
								      					   break;
								      	default : 	       $html .= $row[$value['nombre']];
								    }

						    }
						  	  
						    $html .= '</td>';
						  
						}
					$i++; 
				}
				$count ++;
				$html.='</tr>';
			}

			$html.= '</tbody>';
			$html.= '<tfoot>';
			$html.= '<tr>';
			$html.= '<th>#</th>';
			foreach ($head as $key => $value) {
				$html.='<th>'.$value.'</th>';
			}

			$html.= '</tr>';
			$html.= '</tfoot>';
			$html.= '</table>';

			if($total_paginas > 1) {
			   if ($pagina != 1)
			      $paginador.= '<span class="pagina" pag="'.($pagina-1).'"><img src="images/izq.gif" border="0"></span>';
			      for ($i = 1; $i <= $total_paginas; $i ++) {
			         if ($pagina == $i)
			            //si muestro el índice de la página actual, no coloco enlace
			            $paginador.= $pagina;
			         else
			            //si el índice no corresponde con la página mostrada actualmente,
			            //coloco el enlace para ir a esa página
			            $paginador.= '<span class="pagina" pag="'.$i.'">'.$i.'</span>';
			      }
			      if ($pagina != $total_paginas)
			         $paginador.= '<span class="pagina" pag="'.($pagina+1).'"><img src="images/der.gif" border="0"></span>';
			}

			return json_encode(array("reporte" => $html, "paginacion" =>$paginador));
	}
}

?>