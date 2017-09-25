<?php
class Filtro{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;  $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_filtros WHERE id_filtro = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_filtro'];
				$this->_nombre	 		= $row['nombre_filtro'];
				$this->_id_categoria    = $row['_id_categoria'];
			
			}
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>