<?php
class Tema{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_temas WHERE id_tema = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_tema'];
				$this->_tema	 		= $row['titulo_tema'];
			
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>