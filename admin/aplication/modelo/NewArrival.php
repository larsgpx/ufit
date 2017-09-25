<?php
class NewArrival{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = "SELECT * FROM tbl_new_arrivals WHERE id_new_arrivals='".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_new_arrivals'];
				$this->_titulo_new_arrivals	 		= $row['titulo_new_arrivals'];
				$this->_banner_new_arrivals	= $row['banner_new_arrivals'];
				$this->_foto1	 	= $row['foto1'];
				$this->_foto2	 		= $row['foto2'];
				$this->_foto3	 		= $row['foto3'];
				$this->_foto4	 		= $row['foto4'];
				$this->_foto5	 		= $row['foto5'];
				$this->_foto6	 		= $row['foto6'];
				$this->_tipo_foto1	 		= $row['tipo_foto1'];
				$this->_tipo_foto2	 		= $row['tipo_foto2'];
				$this->_tipo_foto3	 		= $row['tipo_foto3'];
				$this->_tipo_foto4	 		= $row['tipo_foto4'];
				$this->_tipo_foto5	 		= $row['tipo_foto5'];
				$this->_tipo_foto6	 		= $row['tipo_foto6'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>