<?php
class Marca{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_marcas left join tbl_seo seo on seo.id_seo = _id_seo WHERE id_marca = ".$this->_id."";
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 	
				$this->_id 		 	 	 = $row['id_marca'];
				$this->_nombre	 	 	 = $row['nombre_marca'];
				$this->_foto1	 	 	 = $row['foto1_marca'];
				$this->_foto2	 	 	 = $row['foto2_marca'];
				$this->_banner	 	 	 = $row['banner_marca'];
				$this->url_page_tbl	     = $row['url_page_tbl'];

				$this->title_seo	     = $row['title_seo'];
				$this->keywords_seo	     = $row['keywords_seo'];
				$this->description_seo	 = $row['description_seo'];
			}

		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>