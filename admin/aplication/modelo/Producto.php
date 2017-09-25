<?php
class Producto{

	private $_id, $_idioma, $_nombre, $_imagen, $_parent, $_contenido_idiomas;

	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;  $db_Full = new db_model(); $db_Full->conectar();


		if($this->_id > 0){

			$sql = " SELECT * FROM tbl_productos WHERE id_producto = '".$this->_id."'";

			$query = $db_Full->select_sql($sql);

			if($row = mysqli_fetch_assoc($query))
			{
				$this->_id 		         = $row['id_producto'];
				$this->_titulo	 		 = $row['titulo_producto'];
				$this->url_page_tbl	 	 = $row['url_page_tbl'];
				$this->_precio			 = $row['precio_producto'];
				$this->fk_id_tipo_cambio = $row['fk_id_tipo_cambio'];
				$this->descuento_producto = $row['descuento_producto'];
				$this->periodo_descuento_prod = $row['periodo_descuento_prod'];
				
				$this->title_seo		 = $row['title_seo'];
				$this->keywords_seo		 = $row['keywords_seo'];
				$this->description_seo	 = $row['description_seo'];

				$this->_descripcion		 = $row['descripcion_producto'];
				$this->_codigo			 = $row['codigo_producto'];
				$this->_fktipo			 = $row['fktipo_producto'];
				$this->_foto			 = $row['foto_producto'];
				$this->_precio_oferta	 = $row['precio_oferta_producto'];
				$this->_oferta			 = $row['oferta_producto'];
				$this->_orden_oferta	 = $row['orden_oferta_producto'];
				$this->_foto1			 = $row['foto1_producto'];
				$this->_foto2			 = $row['foto2_producto'];
				$this->_foto3			 = $row['foto3_producto'];
				$this->_foto4			 = $row['foto4_producto'];
				$this->_foto5			 = $row['foto5_producto'];
				$this->_foto6			 = $row['foto6_producto'];
			}




		}
	}

	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>
