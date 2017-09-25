<?php
class SliderEditHome{

	private $_id, $_idioma, $_title, $_subtitle, $_foto1, $_foto2, $_parent, $_contenido_idiomas, $_has_link1, $_has_link2, $_link1, $_link2;

	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id; $db_Full = new db_model(); $db_Full->conectar();


		if($this->_id > 0){

			$sql = " SELECT * FROM tbl_banner_home left join tbl_banner_home_slides on tbl_banner_home.id=tbl_banner_home_slides.banner_home_id WHERE tbl_banner_home.id = '".$this->_id."'";

			// $query = new Consulta($sql);
			$query = $db_Full->select_sql($sql);




				$cont=1;
				while ($row = mysqli_fetch_array($query)) {
					$variableName = '_foto' . $cont;
					$variableLink = '_has_link' . $cont;
					$variableLinkUrl = '_link' . $cont;
					$variableNameImage = '_oldfoto' . $cont;
					$this->_id 		        = $row['id'];
					$this->_title	 		= $row['title'];
					$this->_subtitle	= $row['subtitle'];

					$this->$variableName	= $row['image'];
					$this->$variableNameImage	= $row[3];

					$this->$variableLink	= $row['has_link'];
					$this->$variableLinkUrl	= $row['link'];
					$cont++;
				}



			// }




		}
	}

	public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>
