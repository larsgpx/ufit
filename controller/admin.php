<?php 

	global $menu_item; 
	global $plantilla_menu;
	$menu_item = '';

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

function create_menu(array $arrayItem, $id_parent = 0, $level = 0,$uri_url ){

	global $menu_item;
	global $plantilla_menu;
	

	    if($id_parent == 0){
		        $menu_item.= '<ul class="sidebar-panel nav list_reset clearfix">';
		}else{
			    $menu_item.= '<ul class="dropdown-menu">';
		}

		foreach( $arrayItem[$id_parent] as $id_item => $item)
		{	
			$current = ('admin/'.$item['Link'] == $uri_url)  ? 'active': '';  
			if($current == 'active'){
				$plantilla_menu = $item['plantilla'];
			}

			if($id_parent == 0){
				$menu_item.= '<li class=""><a href="'.$item['Link'].'" class="'.$current.'" data-toggle="" role="button"><span class="icon color8"><i class="fa fa-user"></i></span>'.$item['text'].' <span class="label label-danger"><i class="fa fa-user"></i></span></a>';
			}else{
				   /*if($item['Link'] == '#'){
					       $menu_item.= '<li  class=""><a href="'.$item['Link'].'" class="" role="button"><span class="icon color8"><i class="fa fa-user"></i></span>'.$item['text'].'<span class="label label-danger"><i class="fa fa-user"></i></span></a>';
				   }else{
					       $menu_item.= '<li><a href="'.$item['Link'].'"><span class="icon color8"><i class="fa fa-user"></i></span>'.$item['text'].'<span class="label label-danger"><i class="fa fa-user"></i></span></a>';
				   }*/
			}
			if(isset( $arrayItem[$id_item] ) ){// Llamada recursiva
				create_menu($arrayItem , $id_item , $level + 1,$uri_url);
			}
			$menu_item.= '</li>';// Cerramos el item de la lista
		}
		$menu_item.= '</ul>';// Cerramos la lista
}
        
        // inicio menu admin
        
		$url_path   	= $_SERVER['REQUEST_URI'];
		$urls       	= explode("/", $url_path);
		$base_url   	= base_url_uri();

		$uri_url    	= substr($url_path, strlen($base_url),strlen($url_path)); 
		$uri_parent 	= explode("/", $uri_url);
		$url_final  	= $uri_parent[count($uri_parent)-1];
		$url_final_len	= strlen($url_final);
		$sub 			= isset($uri_parent[1]) ? true: false; 
        


		if(empty($uri_parent[1])){
			require("../index.php");
		}

		else{       
					
					if(!isset($_SESSION)) { 
						session_start();
					}
					
				    require("../admin/aplication/modelo/modelo_base_datos.php");
				    

					$db_Full    = new db_model(); 
					$db_Full   ->conectar();

				

					$uri_url2 = explode("?",$uri_parent[1]);

					$result2    = $db_Full->select_sql("select id_privilegio from tbl_privilegio where estado_privilegio = 1 and url_privilegio ='".$uri_url2[0]."'");

					
					//print_r($uri_url2[0]); exit;
					
			
					if(mysqli_num_rows($result2)){  
							$result    = $db_Full->select_sql("select id_privilegio,titulo_privilegio,label_privilegio,url_privilegio,plantilla_privilegio,parent_privilegio from tbl_privilegio,tbl_trabajadores_provilegios where fktrabajador_tra_pri=".$_SESSION['id_trabajador']." and fkprivilegio_tra_pri=id_privilegio and estado_privilegio = 1  ");
						$menuItens 	   = array();
						

						while($row = mysqli_fetch_assoc($result)){
							$menuItens[$row['parent_privilegio']][$row['id_privilegio']] = array(
																								  'Link'      => $row['url_privilegio'],
																								  'text'      => $row['titulo_privilegio'], 
																								  'plantilla' => $row['plantilla_privilegio']
																								);
						}
						create_menu($menuItens,0,0,$uri_url);
						$menu_admin    = $menu_item;
						//print_r($plantilla_menu);exit;

						if(count($uri_url2) == 1 && $plantilla_menu != ''){
							   require("../admin/".$plantilla_menu.'.php');
						}
						else{     //print_r($uri_url2);exit;
								  $i = 0; $url1 = ''; $url2 = array();
							      foreach ($uri_url2 as $key => $value) {
								        if($i == 1){$url1.= $value ;}	
								        $i++;
							      }
							      

							      $gett = explode("&",$url1); $i = 0; $url1='';
							      
							      foreach ($gett as $key => $value) {
								        if($i == 0){$url1.= $value ;}
								        else{$url2[$i]= $value ;}	
								        $i++;
							      }

							      $get1 = explode("=",$url1);
							      

							      if($get1[0] != ''){
							      	 $_GET[$get1[0]] = $get1[1];
							      }
							      	
							      if(count($url2)){
									    foreach ($url2 as $key => $value) {
									      	$get2 = explode("=",$value);
							      	    	//print_r($get2);exit;
									      	$_GET[$get2[0]] = $get2[1];
									    } 
							      }

								  require("../admin/".$uri_url2[0].'.php');
						}
					}
					else{  echo 'fff';
						    //require("../".$uri_url2[0].'.php');
					}
					
				
		}
		

?>