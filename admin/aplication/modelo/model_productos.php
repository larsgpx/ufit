<?php 

	header('Content-Type: text/html; charset=ISO-8859-1');

	include("modelo_base_datos.php");
	
	switch($_POST['option_consulta']){

		case 'add_productos':    			 add_productos(); break;
		case 'combo_categoria':  			 combo_ajax("SELECT id_item_categoria,nombre_item_categoria 
													     FROM tbl_items_categoria 
													     where fk_item_categoria=".$_POST['option'],
													     "select url_marca,nombre_marca 
													     from tbl_tipos_marcas,tbl_tipos, tbl_marcas
														 WHERE  fkmarcas_tipos_marcas =id_marca and 
														 	    fktipos_tipos_marcas=id_tipo and 
														 	    tipo='prod' and id_tipo =".$_POST['option_data']." 
														 GROUP BY id_marca ORDER BY fkmarcas_tipos_marcas desc",$_POST['option_data'],'id_item_categoria','nombre_item_categoria'); break;

		case 'combo_load_categoria_tipos':   load_ajax("SELECT id_cate,nombre_cate 
													  from tbl_categorias","id_cate","nombre_cate"); break;

		case 'combo_load_filtros_tipos':     load_ajax("SELECT id_cate,nombre_cate 
													   from tbl_categorias 
													   where fktipo_cate=".$_POST['valor'],"id_cate","nombre_cate"); break;

		case 'load_contenidos_tipo' :        contents_tipo_prenda($_POST['tipo']); break;
		case 'load_contenidos_subcategoria': contents_subcategorias($_POST['tipo'],$_POST['cat'],$_POST['data']); 
        break;
        case 'load_contenidos_subfiltros':   contents_subfiltros($_POST['data'],$_POST['copia']); 
        break;
	}
	function load_ajax($sql,$option,$value){
		$db_Full      = new db_model(); 
		$db_Full      ->conectar();
		$result       = $db_Full->select_sql($sql);
		$opti         = '';
		
		while($row    = mysqli_fetch_assoc($result)){
			$opti    .='<option value="'.$row[$option].'">'.$row[$value].'</option>';
		}

		echo $opti;
	}

	function combo_ajax($sql,$option,$sql,$option2,$value){
		$db_Full 	  = new db_model(); 
		$db_Full	  ->conectar();
		$option  	  = '';

		if($option2  != ''){
			  $result = $db_Full->select_sql($sql);
		}
		else{
			  $result = $db_Full->select_sql($sql);
		}
		
		while($row    = $result){
			$option  .='<option value="'.$row[$option].'">'.$row[$value].'</option>';
		}

		echo $option;
	}
	function add_productos(){
		    $db_Full 			  = new db_model(); 
		    $db_Full			  ->conectar();
			$files 			      =  explode(',',$_POST['files_uploader']);
			$files2 			  =  explode(',',$_POST['files_uploader2']);
			$data['error']        =  1;
			$data['tipo_error']   =  1;
		    $data['msj']          =  null;
		    $mensajes['global']   = 'No se pudo guardar el producto, intentelo otra vez o mas tarde';
		    $mensajes['ok']       = 'El producto se registro con éxito';
		    $mensajes['required'] = 'Completa todos los campos requeridos';
		    $mensajes['seo']      = 'No se pudo guardar el registro del SEO, intentelo otra vez o mas tarde';
		    $mensajes['precio']   = 'El precio tiene que ser positivo';
		    $mensajes['img1']     = 'Tienes que asignar imagenes a productos';
		    $mensajes['img2']     = 'Tienes que subir 7 imagenes a productos';
		    $mensajes['periodo']  = 'Tienes que ingresar un periodo para el descuento';
		    $cate_array           = json_decode($_POST['column_categoria'],true); 
			$filt_array           = json_decode($_POST['column_filtro'],true);
		    //print_r(json_decode($_POST['column_categoria'],true));
            
		    try {   
		    		/******************************************VALIDACIONES************************************/
		    		if(trim($_POST['titulo']) == '' || trim($_POST['descripcion']) == '' 
		    			|| trim($_POST['precio']) == '' || trim($_POST['codigo']) == ''
		    			|| trim($_POST['marca']) == '' || trim($_POST['tipo']) == ''
			        	|| trim($_POST['tipopersona']) == '') {
			            throw new Exception($mensajes['required']);
			        }
			        //print_r($files);
			        if(count($files) <= 1){
			        	throw new Exception($mensajes['img1']);
			        }

			        if(count($files2) <= 1){
			        	throw new Exception($mensajes['img2']);
			        }

		    		if(!is_numeric($_POST['precio'])) {
			            throw new Exception($mensajes['precio']);
			        }
			        
			        if(trim($_POST['descuento']) != '' && trim($_POST['periodo_descuento']) == '') {
			            throw new Exception($mensajes['periodo']);
			        }
			        
			        /****************************************Guardar SEO****************************************/
		    		$db_Full ->start(); 
					$seo = array(
			    				  "title_seo"         => trim($_POST['titulo_seo']),
			    				  "keywords_seo"      => trim($_POST['keywords_seo']),
			    				  "description_seo"   => trim($_POST['descripcion_seo'])
			    				);

					$id_seo = $db_Full->insert_table("tbl_seo",$seo); 

					if($id_seo == false) {
				            throw new Exception($mensajes['seo']);
				    }
					/*************************************GUARDAR PRODUCTOS*************************************/	
					date_default_timezone_set('America/Lima');

					$producto = array(
			    					   "titulo_producto" 		=> trim($_POST['titulo']),
			    					   "url_page_tbl"           => trim($_POST['url']),
			    					   "precio_producto" 		=> trim($_POST['precio']),
			    					   "descripcion_producto" 	=> trim($_POST['descripcion']),
			    					   "codigo_producto" 		=> trim($_POST['codigo']),
			    					   "fktipo_producto" 		=> trim($_POST['tipo']),
			    					   "foto_producto" 			=> $files[1],
			    					   //"precio_oferta_producto" => $_POST['precio_oferta'],
			    					   //"oferta_producto" 		=> $_POST['oferta'],
			    					   "orden_oferta_producto"  => 0,
			    					   "descuento_producto"     => $_POST["descuento"],
			    					   "periodo_descuento_prod" => $_POST["periodo_descuento"],
			    					   "foto1_producto" 		=> ($files[2]) != '' ? $files[2] : '',
			    					   "foto2_producto" 		=> ($files[3]) != '' ? $files[3] : '',
			    					   "foto3_producto" 		=> ($files[4]) != '' ? $files[4] : '',
			    					   "foto4_producto" 		=> ($files[5]) != '' ? $files[5] : '',
			    					   "foto5_producto" 		=> ($files[6]) != '' ? $files[6] : '',
			    					   "foto6_producto" 		=> ($files[7]) != '' ? $files[7] : '',
			    					   "fecha_producto"			=> date('y/m/d'),
			    					   "fk_id_tipo_cambio" 		=> $_POST['tipo'],
			    					   "_id_seo" 				=> $id_seo
		    					    );

					$idProd = $db_Full->insert_table("tbl_productos",$producto);

			        if($idProd == false) {
			            throw new Exception($mensajes['global']);
			        }
			        /******************************Guardar MARCAS***************************************/
			        $prod_marcas = array(
			         					  "fkproducto_productos_marcas" 	=> $idProd,
			         					  "fkmarca_productos_marcas" 		=> $_POST['marca'],
			         					  "fktipo_productos_marcas" 		=> $_POST['tipo']
			         					);

			        $idProdm = $db_Full->insert_table("tbl_productos_marcas",$prod_marcas);

					if($idProdm == false) {
			            throw new Exception($mensajes['global']);
			        }
			        /******************************Guardar FECHA***************************************/
			        $fecha_reg_prod = array(
			         						 "id_producto" 	   => $idProd,
			         						 "fecha_registro"  => date("Y/m/d")
			         					   );

			        $idFP = $db_Full->insert_table("tbl_fecha_registro_producto",$fecha_reg_prod);

					if($idFP == false) {
			            throw new Exception($mensajes['global']);
			        }
					/******************************Guardar TIPO DE PERSONA***************************************/
					$prod_persona = array(
			         						 "id_producto" 	   => $idProd,
			         						 "id_tipo_persona" => $_POST['tipopersona']
			         				     );

			        $idPers = $db_Full->insert_table("tbl_producto_persona",$prod_persona);

					if($idPers == false) {
			            throw new Exception($mensajes['global']);
			        }
			        /******************************Guardar CATEGORIAS***************************************/
			    
			        if(count($cate_array))
			        {
			        	$pro_cat = array();

			        	foreach ($cate_array  as $key => $value) {
				        	$productos_categorias = array(
				        								  "fkproducto_productos_categorias"	      => $idProd,
				        								  "fkcategoria_productos_categorias"	  => $value[1],
				        								  "fksubcategoria_productos_categorias"   => $value[2],	
				        								  "fktipo_productos_categorias"           => $value[0]  
				        	                            );
				        	//print_r($productos_categorias); 
				        	$idCatego = $db_Full->insert_table("tbl_productos_categorias",$productos_categorias);

				        	if($idCatego == false) {
					            throw new Exception($mensajes['global']);
					    	}
				        	array_push($pro_cat, $productos_categorias);
				        }
				        //print_r($pro_cat);
				        //$idCatego = $db_Full->insert_batch("tbl_productos_categorias",$pro_cat);
			        }
			        //print_r(count($cate_array));exit; marca
			        /********************************* GUARDAR SUBCATEGORIA *************************************/
                      $query1  = $db_Full->select_sql("SELECT url_page_tbl,nombre_marca 
                      	                               FROM tbl_marcas 
                      	                               WHERE id_marca = '".$_POST['marca']."' ");

                      $prow1   = mysqli_fetch_assoc($query1);
                      $urlmar  = $prow1['url_page_tbl'];
                      $ukr_m   = explode("/", $urlmar);
                      $ukr_m_t = count($ukr_m)-1;
                      $urlMarc = $ukr_m[$ukr_m_t];

                      $query2  = $db_Full->select_sql("SELECT id_cate,url_page_tbl 
                      	                               FROM tbl_categorias 
                      	                               WHERE fktipo_cate = '".$_POST['tipo']."' ");

                      $prow    = mysqli_fetch_assoc($query2);
                      $idcat   = $prow['id_cate'];
                      $urlcat  = $prow['url_page_tbl'];
                      $urlScat = $urlcat.'/'.$urlMarc;

			          $query3  = $db_Full->select_sql("SELECT id_item_categoria 
			          								   FROM tbl_items_categoria 
			          								   WHERE fk_item_categoria = '".$idcat."' and 
			          								         url_page_tbl = '".$urlScat."' ");

	                  if(mysqli_num_rows($query3) == 0){
 						$roww3    = mysqli_fetch_assoc($query3);
 						$idSubCat = $roww3['id_item_categoria'];

		                  $seo    = array (
					    				    "title_seo"         					=> $prow1['nombre_marca'],
					    				    "keywords_seo"      					=> '',
					    				    "description_seo"   					=> ''
			    					    );

						  $id_seo = $db_Full->insert_table("tbl_seo",$seo); 
	                  	  

		                  $data_subCat    = array      (
						                                 "nombre_item_categoria"    => $prow1['nombre_marca'],
						                                 "fk_item_categoria"        => $idcat,
						                                 "fk_id_seo"                => $id_seo
		                                               );

		                  $query   = $db_Full->insert_table("tbl_items_categoria",$data_subCat);
		                  
		                  $queryp  = $db_Full->select_sql("SELECT id_page_tbl 
		                  								  FROM tbl_page 
		                  								  WHERE id_tabla_page_tbl = ".$idcat." and 
		                  								  	    tabla_page_tbl = 'tbl_tipos' ");

	                      $prowp   = mysqli_fetch_assoc($queryp); 
	                      $parent  = $prowp['id_page_tbl']; 

		                  $data_page_subCat    = array (
						                                 "titulo_page_tbl"     		=> $prow1['nombre_marca'],
						                                 "url_page_tbl"        		=> $urlScat,
						                                 "tabla_page_tbl"      		=> "tbl_items_categoria",
						                                 "id_tabla_page_tbl"   		=> $idSubCat,
						                                 "visible_page"        		=> 1,
						                                 "estado_page_tbl"     		=> 'a',
						                                 "tipo_url_page"       		=> "i",
						                                 "fk_id_menu"          		=> 3,
						                                 "parent_page_tbl"     		=> $parent,
						                                 "plantilla_page_tbl"  		=> "categoria_detalle"
		                                               );

		                  $query   = $db_Full->insert_table("tbl_page",$data_page_subCat);
	                  }
	                  
			        /******************************Guardar FILTROS***************************************/
			        if(count($filt_array))
			        {
			        	 $pro_fitro = array(); 
			        	 foreach ($filt_array  as $key => $value) {
					        $productos_filtros = array(			
					        								"fkproducto_productos_filtros"	  => $idProd,
					        								"fkfiltro_productos_filtros"	  => $value[1],
					        								"fksubfiltro_productos_filtros"   => $value[2],	
					        								"fktipo_productos_filtros"        => $value[0]  
					        	                        );

					        $idFiltro = $db_Full->insert_table("tbl_productos_filtros",$productos_filtros);
  							//array_push($pro_fitro, $productos_filtros);
  							if($idFiltro == false) {
				            	throw new Exception($mensajes['global']);
				        	}
				    	}

				    	//$idFiltro = $db_Full->insert_batch("tbl_productos_filtros",$pro_fitro);
					    //var_dump($idFiltro);  
			        }	
			       	
			        /******************************Guardar CARACTERISTICAS***********************************/
			        $productos_caracteristicas = array(			
			        								   "titulo_cara"	    => "'".trim($_POST["titulo_caracteristicas"])."'",
			        								   "detalle_cara"	    => "'".trim($_POST["detalle_caracteristicas"])."'",
			        								   "descripcion_cara"   => "'".trim($_POST["descripcion_caracteristicas"])."'",
			        								   "fkproducto_cara"   => $idProd  
			        	                        );

			        //print_r($productos_caracteristicas);

			        $idCaract = $db_Full->insert_table("tbl_productos_caracteristicas",$productos_caracteristicas);
			        
			        if($idCaract == false) {
			           // throw new Exception($mensajes['global'].'CARACTERISTICAS');
			        }
			        /**************************************Guardar FOTOS**************************************/
			        if(count($files2)){
			        	foreach ($files2 as $key => $value) {
				        	$productos_fotos = array(			
				        								"fkproducto_productos_fotos"	=> $idProd,
				        								"nombre_productos_fotos"	    => $value
				        	                        );

				        	//print_r($productos_fotos);

					        $idFoto = $db_Full->insert_table("tbl_productos_fotos",$productos_fotos);

					        if($idFoto == false) {
					            throw new Exception($mensajes['global'].'files');
					        }
				        }
			        }
			/*************************************GUARDAR PAGINA*************************************************/
			        $page_tbl = array(
			        				   "titulo_page_tbl"     =>  trim($_POST['titulo']),
			        				   "url_page_tbl"        =>  $_POST['url'],
			        				   "plantilla_page_tbl"  =>  "detalle_producto",
			        				   "estado_page_tbl"     =>  "a",
			        				   "orden_page_tbl"      =>  0,
			        				   "fk_id_menu"          =>  7,
			        				   "tabla_page_tbl"      =>  "tbl_productos",
			        				   "id_tabla_page_tbl"   =>  $idProd,
			        				   "fk_id_seo" 		     =>  $id_seo 
			        			     );

			        $idPage = $db_Full->insert_table("tbl_page",$page_tbl);

			        if($idFoto == false) {
				        throw new Exception($mensajes['global']);
				    }

		        $data['error']    = 0;
		        $data['msj']      = $mensajes['ok'];
		        $db_Full->commit();
		        echo json_encode($data);
		    } 
		    catch (Exception $e) {
		        $data['msj'] = $e->getMessage(); 
		        $db_Full->rollback();
		        echo json_encode($data);
		    }
		}

		function contents_subcategorias($op,$op2,$data){
			if(is_numeric($op)){
				
				$db_Full = new db_model(); 
				$db_Full->conectar();
				switch($data){
					case 'marca':
					$html = '<li value = "" onclick="change_ul(this,\'m\');">Seleccione marca</li>';
					$result = $db_Full->select_sql("select id_tipos_marcas,nombre_marca from tbl_tipos_marcas,tbl_tipos, tbl_marcas
WHERE  fkmarcas_tipos_marcas =id_marca and fktipos_tipos_marcas=id_tipo and tipo='prod' and id_tipo =".$op." GROUP BY id_marca ORDER BY fkmarcas_tipos_marcas desc");
					while($row = mysqli_fetch_assoc($result)){
						$html .= '<li value = "'.$row['id_tipos_marcas'].'" onclick="change_ul(this,\'m\');">'.$row['nombre_marca'].'</li>';
					}
					break;	
					default:
					$html = '<li value = "" onclick="change_ul(this,\'m\');">Seleccione subcategoría</li>';
					$result = $db_Full->select_sql("SELECT id_item_categoria,nombre_item_categoria from tbl_items_categoria where fk_item_categoria=".$op2);
					while($row = mysqli_fetch_assoc($result)){
						$html .= '<li value = "'.$row['id_item_categoria'].'" onclick="change_ul(this,\'m\');">'.$row['nombre_item_categoria'].'</li>';
					}
				}
				
				echo utf8_decode($html);
			}
	    }
	    function contents_subfiltros($op,$copia){
	    	if(is_numeric($op)){
				$db_Full = new db_model(); 
				$db_Full->conectar();
				$html = '<li value = "" onclick="change_ul(this);">Seleccione subfiltro</li>';

				if($copia == 0){
					$result = $db_Full->select_sql("SELECT id_item_filtro,nombre_item_filtro 
													  from tbl_items_filtro 
													  where fk_item_filtro=".$op);
					 
					while($row = mysqli_fetch_assoc($result)){
						$html .= '<li value = "'.$row['id_item_filtro'].'" onclick="change_ul(this)">'.$row['nombre_item_filtro'].'</li>';
					}
				}
				else{	//echo 
					    $result = $db_Full->select_sql("SELECT icat.id_item_categoria,
                                                               icat.nombre_item_categoria,
                                                               icat.url_page_tbl 
                                                        FROM tbl_categorias 
                                                        inner join tbl_items_categoria icat on
                                                               icat.fk_item_categoria = id_cate
                                                        where id_cate=".$copia);

					    while($row = mysqli_fetch_assoc($result)){
						  $html .= '<li value = "'.$row['id_item_categoria'].'" onclick="change_ul(this)">'.$row['nombre_item_categoria'].'</li>';
					    }
				}

					

				echo $html;
			}
	    }
		function contents_tipo_prenda($op){
			if(is_numeric($op)){
				$db_Full = new db_model(); 
				$db_Full->conectar();
				$html = '<li value = "" copia="" onclick="change_ul(this,\'s\');">Seleccione categor&iacute;a</option>';
				$result = $db_Full->select_sql("SELECT id_cate,
													   nombre_cate,
													   tipo_categoria 
												FROM tbl_categorias 
												where fktipo_cate = ".$op);

				while($row = mysqli_fetch_assoc($result)){
					$html .= '<li value = "'.$row['id_cate'].'" data="'.$row['tipo_categoria'].'" onclick="change_ul(this,\'s\')">'.$row['nombre_cate'].'</li>';
				}
				
				$html2 = '<li value = "" copia="" onclick="change_ul(this,\'s\')">Seleccione filtro</option>';
				$result2 = $db_Full->select_sql("SELECT id_filtro,
												        nombre_filtro,
												        _id_categoria 
												 FROM tbl_filtros 
												 where fktipo_filtro = ".$op);

				while($row = mysqli_fetch_assoc($result2)){
					$html2 .= '<li value = "'.$row['id_filtro'].'" copia="'.$row['_id_categoria'].'" onclick="change_ul(this,\'s\')">'.$row['nombre_filtro'].'</li>';
				}

				$f = array('categoria' =>($html),'filtro'=>($html2));
				echo json_encode($f);
			}
	    }

		
?>