<?php
class Video{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
		$db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_videos WHERE id_vi = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_vi'];
				$this->_titulo	 		= $row['titulo_vi'];
				$this->_foto	        = $row['foto_vi'];
				$this->_link	 	    = $row['link_vi'];
				$this->_orden	 		= $row['orden_vi'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>