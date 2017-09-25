<?php
class Categoria{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
		$db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT id_cate,url_page_tbl,nombre_cate,foto_cate FROM tbl_categorias WHERE id_cate = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_cate'];
				$this->_url_pag         = $row['url_page_tbl'];
				$this->_nombre	 		= $row['nombre_cate'];
				$this->_foto	 		= $row['foto_cate'];
			}
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>