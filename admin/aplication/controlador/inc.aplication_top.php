<?php
date_default_timezone_set('America/Lima');
		error_reporting(E_ALL ^ E_NOTICE);
		include_once("../../admin/inc.core.php"); 
		require_once("../admin/aplication/modelo/modelo_base_datos.php");
		$db_Full = new db_model();$db_Full->conectar();
		//require_once(_model_."Mysql.php");
		//require_once(_model_."Consulta2.php");
		require_once(_model_."Sesion.php");
		require_once(_model_."Roles.php");
			require_once(_model_."Msgbox.php");
			require_once(_model_."Ajax.php");
			require_once(_model_."Listado.php");
			require_once(_model_."Trabajador.php");
			require_once(_model_."Trabajadores.php");
			require_once(_model_."Marca.php");
			require_once(_model_."Marcas.php");
			require_once(_model_."Tipo.php");
			require_once(_model_."Tipos.php");
			require_once(_model_."Filtro.php");
			require_once(_model_."Filtros.php");   
			require_once(_model_."Categoria.php");
			require_once(_model_."Categorias.php");
			require_once(_model_."Producto.php");
			require_once(_model_."Productos.php");
			require_once(_model_."Cliente.php");
			require_once(_model_."Clientes.php");
			require_once(_model_."Asesoria.php");
			require_once(_model_."Asesorias.php");
			require_once(_model_."Magazine.php");
			require_once(_model_."Magazines.php");
			require_once(_model_."Video.php");
			require_once(_model_."Videos.php");
			require_once(_model_."Popup.php");
			require_once(_model_."Popups.php");
			require_once(_model_."Popuphome.php");
			require_once(_model_."Popuphomes.php");
			require_once(_model_."Msgbox.php");
			require_once(_model_."Sesion.php");
			require_once(_model_."Productos.php");
			require_once(_model_."Idea.php");
			require_once(_model_."Ideas.php");
			require_once(_model_."Ventas.php");
			require_once(_model_."Ubigeos.php");
			require_once(_model_."Tema.php");
			require_once(_model_."Temas.php");
			require_once(_model_."Pregunta.php");
			require_once(_model_."Preguntas.php");
			require_once(_model_."Oferta.php");
			require_once(_model_."Ofertas.php");
			require_once(_model_."Cateoferta.php");
			require_once(_model_."Cateofertas.php");
			require_once(_model_."SliderEditHome.php");
			require_once(_model_."SliderHome.php");
			require_once(_model_."Cuerpo.php");
			require_once(_model_."Cuerpos.php");
			//require_once(_model_."NewArrival.php");
			//require_once(_model_."NewArrivals.php");
			require_once(_model_."Banneroferta.php");
			require_once(_model_."Bannerofertas.php");
			require_once(_util_."Libs.php");

			ini_set('post_max_size','100M');
			ini_set('upload_max_filesize','100M');
			ini_set('max_execution_time','1000');
			ini_set('max_input_time','1000');
			
			//$link = new Conexion($_config['bd']['server'],$_config['bd']['user'],$_config['bd']['password'],$_config['bd']['name']);
			session_start();

			$sesion = new Sesion();

			if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) &&!empty($_POST['password'])){
			    $sesion->validaAcceso($_POST['login'], $_POST['password']);
			}
			if($_GET['action']=="logout"){ $sesion->logout(); }

			//msgbox
			if(!(isset($_SESSION['msg']))){
			    $msgbox = new Msgbox();
			}else{
			    $msgbox = $_SESSION['msg'];
			}



			if(strstr($_SERVER['PHP_SELF'],"login.php")){$flag=0;} else {$flag=1;}
			if(!is_object($sesion->getUsuario()->getRol()))	if ($flag) header("location:login.php");
			if($sesion->getUsuario()->getLogeado()==FALSE)  if ($flag) header("location:login.php");
			
/*class Aplication_top{

	public function __construct($op=''){
		date_default_timezone_set('America/Lima');
		error_reporting(E_ALL ^ E_NOTICE);
		include_once("inc.core.php");
		require_once(_model_."Conexion.php");
		require_once(_model_."Mysql.php");
		require_once(_model_."Sesion.php");

			ini_set('post_max_size','100M');
			ini_set('upload_max_filesize','100M');
			ini_set('max_execution_time','1000');
			ini_set('max_input_time','1000');

		if($op == ''){
			
			
			
			require_once(_model_."Roles.php");
			require_once(_model_."Msgbox.php");
			require_once(_model_."Ajax.php");
			require_once(_model_."Listado.php");
			require_once(_model_."Trabajador.php");
			require_once(_model_."Trabajadores.php");
			require_once(_model_."Marca.php");
			require_once(_model_."Marcas.php");
			require_once(_model_."Tipo.php");
			require_once(_model_."Tipos.php");
			require_once(_model_."Filtro.php");
			require_once(_model_."Filtros.php");
			require_once(_model_."Categoria.php");
			require_once(_model_."Categorias.php");
			require_once(_model_."Producto.php");
			require_once(_model_."Productos.php");
			require_once(_model_."Cliente.php");
			require_once(_model_."Clientes.php");
			require_once(_model_."Asesoria.php");
			require_once(_model_."Asesorias.php");
			require_once(_model_."Magazine.php");
			require_once(_model_."Magazines.php");
			require_once(_model_."Video.php");
			require_once(_model_."Videos.php");
			require_once(_model_."Popup.php");
			require_once(_model_."Popups.php");
			require_once(_model_."Popuphome.php");
			require_once(_model_."Popuphomes.php");
			require_once(_model_."Idea.php");
			require_once(_model_."Ideas.php");
			require_once(_model_."Ventas.php");
			require_once(_model_."Ubigeos.php");
			require_once(_model_."Tema.php");
			require_once(_model_."Temas.php");
			require_once(_model_."Pregunta.php");
			require_once(_model_."Preguntas.php");
			require_once(_model_."Oferta.php");
			require_once(_model_."Ofertas.php");
			require_once(_model_."Cateoferta.php");
			require_once(_model_."Cateofertas.php");
			require_once(_model_."SliderEditHome.php");
			require_once(_model_."SliderHome.php");
			require_once(_model_."Cuerpo.php");
			require_once(_model_."Cuerpos.php");
			//require_once(_model_."NewArrival.php");
			//require_once(_model_."NewArrivals.php");
			require_once(_model_."Banneroferta.php");
			require_once(_model_."Bannerofertas.php");
			require_once(_util_."Libs.php");
			
			$link = new Conexion($_config['bd']['server'],$_config['bd']['user'],$_config['bd']['password'],$_config['bd']['name']);
			session_start();


			$sesion = new Sesion();

			if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) &&!empty($_POST['password'])){
			    $sesion->validaAcceso($_POST['login'], $_POST['password']);
			}
			if($_GET['action']=="logout"){ $sesion->logout(); }

			//msgbox
			if(!(isset($_SESSION['msg']))){
			    $msgbox = new Msgbox();
			}else{
			    $msgbox = $_SESSION['msg'];
			}



			if(strstr($_SERVER['PHP_SELF'],"login.php")){$flag=0;} else {$flag=1;}
			if(!is_object($sesion->getUsuario()->getRol()))	if ($flag) header("location:login.php");
			if($sesion->getUsuario()->getLogeado()==FALSE)  if ($flag) header("location:login.php");
		}
		$link = new Conexion($_config['bd']['server'],$_config['bd']['user'],$_config['bd']['password'],$_config['bd']['name']);
	}
	public function load_productos(){
		require_once(_model_."Msgbox.php");
		require_once(_model_."Sesion.php");
		require_once(_model_."Productos.php");
	}

}*/
?>
