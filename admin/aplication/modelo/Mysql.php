<?php
class Consulta{

	var $Consulta_ID = 0;
	var $Errno = 0;
	var $Error = "";

	function Consulta($sql = "",$link){
		/*if ($sql == "") {
			$this->Error = "No ha especificado una consulta SQL";
			$this->Errno =  mysqli_errno();
			return false;
		}*/
		$this->Consulta_ID = mysqli_query($link,$sql);

		if(!$this->Consulta_ID){
			$this->Errno = mysqli_errno();
			$this->Error = mysqli_error();
		}

		//echo $sql;
		return $this->Consulta_ID;
	}
	function NumeroCampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}

	function nuevoId(){
		return mysqli_insert_id();
	}

	function Nombretabla(){
		return mysqli_field_table($this->Consulta_ID, 'name');
	}

	function flagscampo($numcampo){
		return mysqli_field_flags($this->Consulta_ID, $numcampo);
	}

	function NumeroRegistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}

	function nombrecampo($numcampo){
		return mysqli_field_name($this->Consulta_ID, $numcampo);
	}

	function tipocampo($numcampo){
		return mysqli_field_type($this->Consulta_ID, $numcampo);
	}

	function tamaniocampo($numcampo){
		return mysqli_field_len($this->Consulta_ID, $numcampo);
	}

	function VerRegistro(){
		return mysqli_fetch_array($this->Consulta_ID);
	}


}
?>