<?php 
class Modulo{

	private $_id, $_nombre;
	
	public function __construct($id = 0){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			$sql = " SELECT * FROM modulos WHERE id_modulo = '".$this->_id."' ";
			$query = $db_Full->select_sql($sql);
			if($row = mysqli_fetch_assoc($query)){
				$this->_id 	   	= $row['id_modulo'];
				$this->_nombre 	= $row['nombre_modulo'];
			}			
		}
	}
	
	public function getId(){
		return $this->_id;
	}

	public function getNombre(){
		return $this->_nombre;
	}
	public function __toString(){
		return $this->_id;
	}
		
}
?>