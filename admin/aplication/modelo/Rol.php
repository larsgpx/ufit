<?php 
class Rol{

	private $_id;
	private $_servicio;
	private $_nombre;
	private $_descripcion; 

	public function __construct($id = 0){
		$db_Full = new db_model(); $db_Full->conectar();
		$this->_id = $id;
		if($this->_id > 0){
			$sql = " SELECT * FROM tbl_roles WHERE  id_rol ='".$this->_id."'  ";
			$query = $db_Full->select_sql($sql);
			if($db_Full->NumeroRegistros($query) > 0){
				$row = mysqli_fetch_assoc($query); 
				$this->_nombre 		  	= $row['nombre_rol'];
			}				
		} 
	}
	
	public function getId(){
		return $this->_id;
	}
	 
	public function getNombre(){
		return $this->_nombre;
	}
	 
	public function getDescripcion(){
		return $this->_descripcion;
	}
	
	public function __toString()
	{
		return $this->_nombre ;
	}
	
}
?>