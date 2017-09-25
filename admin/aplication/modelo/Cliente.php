<?php

class Cliente{
	
	
	private $_id;
	
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
		$db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0)
		{
			
			$sql = " SELECT * FROM tbl_clientes WHERE id_cli = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 				= $row['id_cli'];
				$this->_nombre	 		= $row['nombre_cli'];
			}
				
		}					
	}
	
	
	
	
    public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>