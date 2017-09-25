<?php
class Cateoferta{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_categorias_ofertas WHERE id_cate_oferta = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_cate_oferta'];
				$this->_nombre	 		= $row['nombre_cate_oferta'];
				$this->_foto	 		= $row['foto_cate_oferta'];
				$this->_banner	        = $row['banner_cate_oferta'];
				$this->_url	        = $row['url_page_tbl'];
			
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>