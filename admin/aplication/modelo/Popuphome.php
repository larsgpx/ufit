<?php
class Popuphome{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
		$db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_popup_home WHERE id_popup_home = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_popup_home'];
				$this->_nombre	 		= $row['nombre_popup_home'];
				$this->_des				= $row['des_popup_home'];
				$this->_ancho			= $row['ancho_popup_home'];
				$this->_foto			= $row['foto_popup_home'];
				$this->_orden			= $row['orden_popup_home'];
				$this->_desde			= $row['desde_popup_home'];
				$this->_hasta			= $row['hasta_popup_home'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>