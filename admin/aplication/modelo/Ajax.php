<?php 
class Ajax{
	
	private $_idioma, $_msgbox;

	public function __construct(Idioma $idioma = Null, Msgbox $msg = Null){
		$this->_idioma = $idioma ;
		$this->_msgbox = $msg ;
	}
	
		
	function ordenarFotoProductoAjax(){
		$db_Full = new db_model(); $db_Full->conectar(); 
		
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'productos')
			{
				$query = $db_Full->select_sql("UPDATE tbl_productos_fotos SET orden_productos_fotos=$position WHERE fkproducto_productos_fotos=$type_val[2] and id_productos_fotos = $type_val[0] "); 	
			
			}
		}
	}
	
	
	function ordenarAsesoriaAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'asesoria')
			{
				$query = $db_Full->select_sql("UPDATE tbl_asesorias  SET orden_ase=$position WHERE id_ase = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	function ordenarTemaAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'temas')
			{
				$query = $db_Full->select_sql("UPDATE tbl_temas  SET orden_tema=$position WHERE id_tema = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	function ordenarPopupAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'popup')
			{
				$query = $db_Full->select_sql("UPDATE tbl_popup_home SET orden_popup_home=$position WHERE id_popup_home = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
	function ordenarMagazineAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'magazine')
			{
				$query = $db_Full->select_sql("UPDATE tbl_magazines  SET orden_ma=$position WHERE id_ma = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	function ordenarIdeasAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'ideas')
			{
				$query = $db_Full->select_sql("UPDATE tbl_ideas  SET orden_ide=$position WHERE id_ide = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
		function ordenarVideoAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'video')
			{
				$query = $db_Full->select_sql("UPDATE tbl_videos  SET orden_vi=$position WHERE id_vi = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
	
	
	
	
	function ordenarOfertaAjax()
	{$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'oferta')
			{
				$query = $db_Full->select_sql("UPDATE tbl_productos  SET orden_oferta_producto=$position WHERE id_producto = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
		
	
	function ordenarMarcaAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'marca')
			{
				$query = $db_Full->select_sql("UPDATE tbl_marcas  SET orden_marca=$position WHERE id_marca = $type_val[0] "); 	
			
			}
		}
	}


		function ordenarBannerAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'banner')
			{
				$query = $db_Full->select_sql("UPDATE tbl_banner_home  SET orden=$position WHERE id = $type_val[0] "); 	
			
			}
		}
	}
	
	
	function ordenarTipoAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'tipos')
			{
				$query = $db_Full->select_sql("UPDATE tbl_tipos  SET orden_tipo=$position WHERE id_tipo = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
	function ordenarCategoriaAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'categorias')
			{
				$query = $db_Full->select_sql("UPDATE tbl_categorias SET orden_cate=$position WHERE fktipo_cate=$type_val[2] and id_cate = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
	function ordenarCaracteristicasAjax(){
		$db_Full = new db_model(); $db_Full->conectar();
		foreach($_GET['list_item'] as $position => $item){
			
			$type_val = explode("|",$item);
			
			if($type_val[1] == 'caracteristicas')
			{
				$query = $db_Full->select_sql("UPDATE tbl_productos_caracteristicas  SET orden_cara=$position WHERE fkproducto_cara=$type_val[2] and id_cara = $type_val[0] "); 	
			
			}
		}
	}
	
	
	
	
	
}

?>