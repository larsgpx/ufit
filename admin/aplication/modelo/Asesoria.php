<?php
class Asesoria{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
	     $db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_asesorias WHERE id_ase = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_ase'];
				$this->_titulo	 		= $row['titulo_ase'];
				$this->_link	 		= $row['url_page_tbl'];
				$this->_subtitulo	    = $row['subtitulo_ase'];
				$this->_descripcion	 	= $row['descripcion_ase'];
				$this->_foto1	 		= $row['foto1_ase'];
				$this->_foto2	 		= $row['foto2_ase'];
			}
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>