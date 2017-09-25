<?php
class Cuerpo{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_cuerpo_home WHERE id_cuerpo = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_cuerpo'];
				$this->_imagen	 		= $row['imagen_cuerpo'];
				$this->_link	= $row['link_cuerpo'];
				$this->_titulo	= $row['titulo_cuerpo'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>