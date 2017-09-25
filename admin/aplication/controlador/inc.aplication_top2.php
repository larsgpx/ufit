<?php
        date_default_timezone_set('America/Lima');
		error_reporting(E_ALL ^ E_NOTICE);
		include_once("../admin/inc.core.php"); 
		require_once("../admin/aplication/modelo/modelo_base_datos.php"); 
		$db_Full = new db_model();$db_Full->conectar();
		//require_once(_model_."Mysql.php");
		//require_once(_model_."Consulta2.php");
			require_once("../admin/aplication/modelo/Roles.php");
			require_once("../admin/aplication/modelo/Msgbox.php");
			require_once("../admin/aplication/modelo/Ajax.php");
			require_once("../admin/aplication/modelo/Listado.php");
			require_once("../admin/aplication/modelo/Trabajador.php");
			require_once("../admin/aplication/modelo/Trabajadores2.php"); 
			require_once("../admin/aplication/modelo/Marca.php");
			require_once("../admin/aplication/modelo/Marcas2.php");
			require_once("../admin/aplication/modelo/Tipo.php");
			require_once("../admin/aplication/modelo/Tipos2.php");
			require_once("../admin/aplication/modelo/Filtro.php");
			require_once("../admin/aplication/modelo/Filtros2.php");   
			require_once("../admin/aplication/modelo/Categoria.php");
			require_once("../admin/aplication/modelo/Categorias2.php");
			require_once("../admin/aplication/modelo/Producto.php");
			require_once("../admin/aplication/modelo/Productos2.php");
			require_once("../admin/aplication/modelo/Cliente.php");
			require_once("../admin/aplication/modelo/Clientes2.php");
			require_once("../admin/aplication/modelo/Asesoria.php");
			require_once("../admin/aplication/modelo/Asesorias2.php");
			require_once("../admin/aplication/modelo/Magazine.php");
			require_once("../admin/aplication/modelo/Magazines2.php");
			require_once("../admin/aplication/modelo/Video.php");
			require_once("../admin/aplication/modelo/Videos2.php");
			require_once("../admin/aplication/modelo/Popup.php");
			require_once("../admin/aplication/modelo/Popups2.php");
			require_once("../admin/aplication/modelo/Popuphome.php");
			require_once("../admin/aplication/modelo/Popuphomes2.php");
			require_once("../admin/aplication/modelo/Msgbox.php");
			require_once("../admin/aplication/modelo/Sesion.php");
			
			require_once("../admin/aplication/modelo/Idea.php");
			require_once("../admin/aplication/modelo/Ideas2.php");
			require_once("../admin/aplication/modelo/Ventas.php");
			require_once("../admin/aplication/modelo/Ubigeos.php");
			require_once("../admin/aplication/modelo/Tema.php");
			require_once("../admin/aplication/modelo/Temas2.php");
			require_once("../admin/aplication/modelo/Pregunta.php");
			require_once("../admin/aplication/modelo/Preguntas2.php");
		 	require_once("../admin/aplication/modelo/Oferta.php");
			require_once("../admin/aplication/modelo/Ofertas2.php");
			require_once("../admin/aplication/modelo/Cateoferta.php");
			require_once("../admin/aplication/modelo/Cateofertas2.php");
			require_once("../admin/aplication/modelo/SliderEditHome.php");
			require_once("../admin/aplication/modelo/SliderHome2.php");
			require_once("../admin/aplication/modelo/Cuerpo.php");
			require_once("../admin/aplication/modelo/Cuerpos2.php");
			require_once("../admin/aplication/modelo/NewArrival.php");
			require_once("../admin/aplication/modelo/NewArrivals2.php");
			require_once("../admin/aplication/modelo/Banneroferta.php");
			require_once("../admin/aplication/modelo/Bannerofertas2.php");

			require_once("../admin/aplication/modelo/Estilo.php");
			require_once("../admin/aplication/modelo/Estilos2.php");

			require_once("../admin/aplication/modelo/Costos2.php");
			require_once("../admin/aplication/utilidades/Libs.php");

			ini_set('post_max_size','100M');
			ini_set('upload_max_filesize','100M');
			ini_set('max_execution_time','1000');
			ini_set('max_input_time','1000');
			
			//$link = new Conexion($_config['bd']['server'],$_config['bd']['user'],$_config['bd']['password'],$_config['bd']['name']);
			
			if(!isset($_SESSION)) { 
				session_start();
			}
			$sesion = new Sesion();

			if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) &&!empty($_POST['password']))
			{
			    $sesion->validaAcceso($_POST['login'], $_POST['password']);
			}
			if($_GET['action'] == "logout"){ $sesion->logout(); }

			//msgbox
			if(!(isset($_SESSION['msg']))){
			    $msgbox = new Msgbox();
			}else{
			    $msgbox = $_SESSION['msg'];
			}



			if(strstr($_SERVER['PHP_SELF'],"login.php")){$flag = 0;} 
			else {$flag = 1;}

			//echo $sesion->getUsuario()->getRol(); echo $flag; exit;
			

			if(!isset($_SESSION)  )
			{  //|| !is_object($sesion->getUsuario()->getRol()
				if ($flag) {
					//header("Location: ../../admin/login.php");
					$location = "Location: ".$base_url."admin/login.php"; 
					//$location = $base_url."login.php"; 
					header($location);
					//include($location);exit;
				}
			}
			if(!isset($_SESSION['id_trabajador'])){ 
				if ($flag) {header("location:".$base_url."login.php");exit;}
			    /*if($sesion->getUsuario()->getLogeado() == FALSE){ // echo $base_url;exit;
			    	//include("login.php");
					if ($flag) {header("location:".$base_url."admin/login.php");exit;}
				}*/
			}

			
			
			

?>
