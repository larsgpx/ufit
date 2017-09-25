<?php
class Idea{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
	    $db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_ideas WHERE id_idea = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_idea'];
				$this->_titulo	 		= $row['titulo_idea'];
				$this->_subtitulo	= $row['subtitulo_idea'];
				$this->_url	 	= $row['url_idea'];
				$this->_imagen	 		= $row['imagen_idea'];
				$this->_seccion	 		= $row['seccion_idea'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>