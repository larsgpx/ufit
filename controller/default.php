<?php 

	global $plantilla_menu;

	global $menu_item;

	global $cont_page;


function base_url_uri(){
  $urk   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/';
  $url   = explode('/', $urk);
  $uri_f = '';

  for ($i = count($url)-1; $i > 0 ; $i--) { 
  	if($url[$i] != ''){$uri_f = $url[$i];break;}
  }

  $url_a = substr($urk,0,strlen($urk)-(strlen($uri_f)+1));

  return ($uri_f == 'controller') ? $url_a : $urk;
}

function base_url(){

  $port = ($_SERVER['SERVER_PORT'] == 80) ? '' : ':'.$_SERVER['SERVER_PORT'] ;	
  //$url  = array();
  $urk = sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    isset($_SERVER['SERVER_PORT'])? $_SERVER['SERVER_NAME'].$port : $_SERVER['SERVER_NAME'],
    rtrim(base_url_uri(), '/\\')
  );

  $url   = explode('/', $urk);
  $uri_f = '';

  for ($i = count($url)-1; $i > 0 ; $i--) { 
  	if($url[$i] != ''){$uri_f = $url[$i];break;}
  }

  $url_a = substr($urk,0,strlen($urk)-strlen($url[count($url)-1]));
  //$url_a = substr($urk,0,strlen($urk)-(strlen($uri_f)+1));
  return ($url[count($url)-1] == 'controller') ? $url_a : $urk.'/';
}

function create_menu($BASE_URL,array $arrayItem, $id_parent = 0, $level = 0,$uri_url,$cabecera='',$start_st='<li class="">',$end_st='</li>'){

	global $menu_item;

	global $plantilla_menu;

	global $cont_page;


	    if($cabecera != ''){

	    	if($id_parent == 0){

		           $menu_item.= '<ul class="sidebar-panel nav list_reset clearfix">';

			}else{

				   $menu_item.= '<ul class="dropdown-menu">';

			}

	    }

	    if(isset($arrayItem[$id_parent]))

	    {

	    	foreach( $arrayItem[$id_parent] as $id_item => $item)

			{
				//echo '  '.$item['Link'] .'  ==  '.$uri_url.'  ' ;
				$current = ($item['Link'] == $uri_url || $item['Link'].'/' == $uri_url)  ? 'active': '';  



				if($current == 'active'){ 

					$cont_page['parent_page']     = $id_parent;

					$cont_page['id_page']         = $item['id_page_tbl'];

					$cont_page['id_page_table']   = $item['id_tabla_page_tbl'];

					$cont_page['plantilla']       = $item['plantilla'];

					$cont_page['title']           = $item['text'];

					$cont_page['title_seo']       = $item['seo_title'];

					$cont_page['key_seo']         = $item['seo_key'];

					$cont_page['desc_seo']        = $item['seo_desc'];

				}



				$popup = (strtolower($item['tipo_url']) == 'p') ? 'width="'.$item['image_width'].'" height="'.$item['image_height'].'"' :'';

				
				if($item['tipo_url'] == 'i'){
					$urli = $BASE_URL.$item['Link'];
				}else{
						if($item['tipo_url'] == 'p'){
							$urli = $item['Link'];
						}
						else{
							$urli = $item['Link'];
						}
				}  


				if($id_parent == 0){ 

					    $image = ($item['image'] != '') ? '<img height="'.$item['image_height'].'" src="'.$urli.'webroot/archivos/'.$item['image'].'">' : $item['text'];

					    $menu_item.= $start_st.'<a '.$popup.' href="'.$urli.'" class="'.$current.' '.$item['class'].'" data-toggle="" role="button">'.$image.'</a>'.$end_st;

				}else{

					   if($item['Link'] == '#'){

					   		   $image = ($item['image'] != '') ? '<img height="'.$item['image_height'].'" src="'.$urli.'webroot/archivos/'.$item['image'].'">' : $item['text'];

						       $menu_item.= $start_st.'<a '.$popup.' href="'.$urli.'" class="'.$current.' '.$item['class'].'" role="button">'.$image.'</a>'.$end_st;

					   }else{

						       $image = ($item['image'] != '') ? '<img height="'.$item['image_height'].'" src="'.$urli.'webroot/archivos/'.$item['image'].'">' : $item['text'];

						       $menu_item.= $start_st.'<a '.$popup.' class="'.$item['class'].'" href="'.$current.' '.$item['Link'].'">'.$image.'</a>'.$end_st;

					   }

				}



				if(isset( $arrayItem[$id_item] ) ){// Llamada recursiva

					create_menu($BASE_URL,$arrayItem , $id_item , $level + 1,$uri_url,$cabecera,$start_st,$end_st);

				}



				$menu_item.= '</li>';// Cerramos el item de la lista

			}

	    

		}

		if($cabecera != ''){

			$menu_item.= '</ul>';// Cerramos la lista

		}

}



function page_dinamic($menus_page,$url,$base){

	global $cont_page;

	//print_r(var_dump($cont_page)); exit;



	$BASE_URL         = $base;

	$url_final        = (substr($url,strlen($url)-1) == '/') ? substr($url,0,strlen($url)-1) : $url;

	$menus_page       = $menus_page;

	$parent_page      = $cont_page['parent_page'];

	$id_page          = $cont_page['id_page'];

	$id_page_table    = $cont_page['id_page_table'];

	$title 		  = $cont_page['title'];

	$title_seo        = $cont_page['title_seo'];

	$descripcion_seo  = $cont_page['key_seo'];

	$keywords_seo 	  = $cont_page['desc_seo'];

	//print_r($cont_page); exit;

    if(!empty($cont_page['plantilla']) && $url_final != ''){    

		include("../cabecera.php");

		include("../head.php");

		include("../header.php");

		

		if(file_exists("../plantillas/".$cont_page['plantilla'].".php")){ 

			include("../plantillas/".$cont_page['plantilla'].".php");

		}



		else{

			//echo 'LA PAGINA NO EXISTE !!';

			include("../plantillas/plantilla_default.php");

		}

		

		include("../footer.php");

	}

	else{   //echo $cont_page['plantilla'];

			if($url == ''){

				$title 		  = 'Ufit.pe – Tienda Online';
				
				$title_seo        = 'Ufit.pe – Tienda Online';

				$descripcion_seo  = 'Las mejores marcas de ropa y calzado más cerca de ti. Compra Online
                        con Ufit y viste los mejores outfits para toda ocasión';

				$keywords_seo 	  = 'Ropa, tienda online, Ufit, calzado, camisas, zapatos, outfit, vestir bien, estilo, aeropostale, Ritzy of Italy, Etiqueta Negra, Innovatore, Rock & Republic, Renzo Lucciano, Bozzoli, Hartzvolk, Stropicciato, ';

				include("cabecera.php");

				include("head.php");

				include("header.php");

				require("plantillas/home.php");

				include("footer.php");

			}

			else{

				include("../cabecera.php");

				include("../head.php");

				include("../header.php");	

				  //echo 'LA PAGINA NO EXISTE....';

				include("../plantillas/plantilla_default.php");

				include("../footer.php");

			//include("../plantillas/plantilla_default.php");

			}

		}

}

function no_page($title ='Página no existente',$title_seo='404',$desc = '',$keyw = ''){

	

	$title 		 = $title;

	$title_seo       = $title_seo;

	$descripcion_seo = $desc;

	$keywords_seo    = $keyw;



	include("../cabecera.php");

	include("../head.php");

	include("../header.php");

	include("../no_page.php");

	include("../footer.php");

}

		//echo 'xxxxxxxxxxxxxxxxxxxxxxxxx';
		$q 				= 0;
		$url_path   	= $_SERVER['REQUEST_URI'];
		$urls       	= explode("/", $url_path);
		$base_url       = base_url_uri();

		$uri_url    	= substr($url_path, strlen($base_url),strlen($url_path));

		$uri_parent 	= explode("/", $uri_url);

		$url_final  	= $uri_parent[count($uri_parent)-1];

		$url_final_len	= strlen($url_final);

		$sub            = isset($uri_parent[1]) ? true: false; 

		$BASE_URL       = base_url(); 

		//echo $uri_url  ; exit;

		if($uri_url == ''){include("admin/aplication/modelo/modelo_base_datos.php");}

		else{include("../admin/aplication/modelo/modelo_base_datos.php");}  	



					$db_Full = new db_model(); 

					$db_Full->conectar();



					if($sub == false){

						  $url_final = $uri_url;

					}

					else{

						  $url_final = $uri_parent[0];

					}

					

					$result  = $db_Full->select_sql("select id_tabla_page_tbl,men.nombre_menu,id_page_tbl,tipo_url_page,classes_page,imagen_page,imagen_page_width,imagen_page_height,titulo_page_tbl,plantilla_page_tbl,estado_page_tbl,orden_page_tbl,parent_page_tbl,title_seo,keywords_seo,description_seo,url_page_tbl,tabla_page_tbl,id_tabla_page_tbl from tbl_page left join tbl_seo seo on id_seo = fk_id_seo left join tbl_menu men on id_menu = fk_id_menu and estado_menu = 1 where upper(estado_page_tbl) = 'A'");



					if(mysqli_num_rows($result)){

						$i = 0;



						while($row = mysqli_fetch_assoc($result)){

							$menuItens[$row['nombre_menu']][$row['parent_page_tbl']][$row['id_page_tbl']] 

							= array(   

										'tipo_url'		=> $row['tipo_url_page'],

										'Link'      		=> $row['url_page_tbl'],

										'text'      		=> $row['titulo_page_tbl'], 

										'plantilla' 		=> $row['plantilla_page_tbl'],

										'class'     		=> $row['classes_page'],

										'seo_title' 		=> $row['title_seo'],

										'seo_key'   		=> $row['keywords_seo'],

										'seo_desc'  		=> $row['description_seo'],

										'image'     		=> $row['imagen_page'],

										'image_width'   	=> $row['imagen_page_width'],

										'image_height'  	=> $row['imagen_page_height'],

										'id_page_tbl' 		=> $row['id_page_tbl'],

										'id_tabla_page_tbl' => $row['id_tabla_page_tbl']

									);



							if($i == 0){$menu_inicial = $row['nombre_menu'];} $i++;	

						}



						//print_r($menuItens); //exit;



						foreach ($menuItens as $key => $value) {

							$menu_item = '';

							switch($key){

								case 'categoria_productos': create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); 

								break;

								case 'menu_productos': create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); break;

								case 'menu_arrivals': create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); break;

								case 'menu_principal': create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); break;

								case 'menu_principal2': create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); break;

								case 'menu_marcas': //print_r($value); exit;

								create_menu($BASE_URL,$value,0,0,$uri_url,'','<li>','</li>'); break;

								case 'menu_usuario': create_menu($BASE_URL,$value,0,0,$uri_url,'','<tr>

                            <td class="fuente_georgia font_size11" align="left">','</td>

                         </tr><tr><td height="10"></td></tr>'); break;

								

								//default: create_menu($value,0,0,$uri_url,'1','<span>','</span>');	

							}

							

							$menu_list[$key] = $menu_item;

						}

						//print_r($menu_list); exit;

						page_dinamic($menu_list,$uri_url,$BASE_URL);

					}

					else{  

						   no_page();

					}

?>