<?php
class Oferta{
	
	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;  $db_Full = new db_model(); $db_Full->conectar();
	
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_ofertas,tbl_productos WHERE fkproducto_oferta=id_producto  and id_oferta = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 		        = $row['id_oferta'];
				$this->_id_producto 		        = $row['id_producto'];
				$this->_desde	 		= $row['desde_oferta'];
				$this->_hasta	= $row['hasta_oferta'];
				$this->_fkproducto	= $row['fkproducto_oferta'];
				$this->_fkcategoria	= $row['fkcategoria_oferta'];
				$this->_estado	= $row['estado_oferta'];
				
				$this->_titulo	 		= $row['titulo_producto'];
				$this->_precio	= $row['precio_producto'];
				$this->_descripcion	= $row['descripcion_producto'];
				$this->_codigo	= $row['codigo_producto'];
				$this->_fktipo	= $row['fktipo_producto'];
				$this->_foto	= $row['foto_producto'];
				$this->_precio_oferta	= $row['precio_oferta_producto'];
				$this->_oferta	= $row['oferta_producto'];
				$this->_orden_oferta	= $row['orden_oferta_producto'];
				$this->_foto1	= $row['foto1_producto'];
				$this->_foto2	= $row['foto2_producto'];
				$this->_foto3	= $row['foto3_producto'];
				$this->_foto4	= $row['foto4_producto'];
				$this->_foto5	= $row['foto5_producto'];
				$this->_foto6	= $row['foto6_producto'];
			}
			
	
				
				
		}					
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>