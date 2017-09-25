<?php

include_once("admin/aplication/modelo/modelo_base_datos.php");

function urls_amigables($url) {
	$url = strtolower($url);
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$url = str_replace ($find, $repl, $url);
	$find = array(' ', '&', '\r\n', '\n', '+');
	$url = str_replace ($find, '-', $url);
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	$repl = array('', '-', '');
	$url = preg_replace ($find, $repl, $url);
	return $url;
}

$texto = $_POST['search'];

/*$url  = array(
	   "tipo_prenda" => 'T-'.$row_tipos["id_tipo"].urls_amigables($row_tipos["nombre_tipo"]),
	   "categoria"   => 'C-'.$row_cate["id_cate"].urls_amigables($row_cate["nombre_cate"]),
	   "categoria"   => 'S-'.$row_sub["id_item_categoria"].urls_amigables($row_sub["nombre_item_categoria"]),
	   "marcas"      => 'M-'.urls_amigables($row_marcas["id_marca"]),
	   "producto"    => 'D-'.$row10["id_producto"].urls_amigables($row10['titulo_producto'])
	);*/
if(3<=strlen($texto)){
	$db_Full = new db_model();  $db_Full->conectar();
	$result = $db_Full->select_sql("SELECT titulo_page_tbl,url_page_tbl FROM tbl_page where lower(titulo_page_tbl) like lower('%".$texto."%')  group by titulo_page_tbl limit 0,10");

	if(mysqli_num_rows($result)){
		$dat='';
		while($fila=mysqli_fetch_object($result)){$data[]=$fila;}
		foreach ($data as $key => $value) {
			$dat.= '<li><a href="'.$base_url.$value->url_page_tbl.'">'.$value->titulo_page_tbl.'</a></li>';
		}
		echo $dat;
	}
	else{
			$db_Full = new db_model();  $db_Full->conectar();
			$result2 = $db_Full->select_sql("SELECT titulo_producto,url_page_tbl FROM tbl_productos where lower(titulo_producto) like lower('%".$texto."%') limit 0,10");

			if(mysqli_num_rows($result2)){
				$dat='';
				while($fila=mysqli_fetch_object($result2)){$data[]=$fila;}
				foreach ($data as $key => $value) {
					$dat.= '<li><a href="'.$base_url.$value->url_page_tbl.'">'.$value->titulo_producto.'</a></li>';
				}
				echo $dat;
			}
	}
}
else{
	echo '';
}
?>
