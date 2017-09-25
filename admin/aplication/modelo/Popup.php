<?php
class Popup{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_popup WHERE id_popup = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_popup'];
				$this->_nombre	 		= $row['nombre_popup'];
				$this->_des				= $row['des_popup'];
				$this->_ancho			= $row['ancho_popup'];
				$this->_texto			= $row['titulo_popup'];
			
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>