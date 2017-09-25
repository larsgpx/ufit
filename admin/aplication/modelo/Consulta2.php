<?php
class Consulta2{

	var $Consulta_ID = 0;
	var $Errno = 0;
	var $Error = "";

    function Consulta($sql = "",$link=''){

		/*if ($sql == "") {
			$this->Error = "No ha especificado una consulta SQL";
			$this->Errno =  mysqli_errno();
			return false;
		}mysqli_set_charset('utf8');*/
		//$this->Consulta_ID = mysqli_query($link,$sql) or die("<div id='error'>".mysql_error()."<br><br> ".$sql."<div>");

		/*if(!$this->Consulta_ID){
			$this->Errno = mysqli_errno();
			$this->Error = mysqli_error();
		}*/

		//echo $sql;
		//return $this->Consulta_ID;
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

	function VerRegistros(){
		return mysqli_fetch_row($this->Consulta_ID);
	}

	function registrosAfectado(){
		return mysqli_affected_rows($this->Consulta_ID);
	}

}
?>