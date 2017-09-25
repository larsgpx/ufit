<?php
class Pregunta{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_preguntas WHERE id_pre = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_pre'];
				$this->_titulo	 		= $row['titulo_pre'];
				$this->_respuesta	= $row['respuesta_pre'];
				$this->_fktema	 	= $row['fktema_pre'];
			
			}
			
		
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>