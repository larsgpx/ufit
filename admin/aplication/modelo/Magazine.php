<?php
class Magazine{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
	    $db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_magazines WHERE id_ma = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_ma'];
				$this->_titulo	 		= $row['titulo_ma'];
				$this->_subtitulo	    = $row['subtitulo_ma'];
				$this->_descripcion	 	= $row['descripcion_ma'];
				$this->_link	 		= $row['url_page_tbl'];
				$this->_foto1	 		= $row['foto1_ma'];
				$this->_foto2	 		= $row['foto2_ma'];
				$this->_foto3	 		= $row['foto3_ma'];
				$this->_foto4	 		= $row['foto4_ma'];
				$this->_foto5	 		= $row['foto5_ma'];
				$this->_foto6	 		= $row['foto6_ma'];
				$this->_foto7	 		= $row['foto7_ma'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>