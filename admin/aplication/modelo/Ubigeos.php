<?php
class Ubigeos
{
	private $_msgbox;
	
	private $id_provincia;	
	private $id_distrito;
	private $id_departamento;	
		
	private $name_provincia;	
	private $name_distrito;	
	private $name_departamento;	
	
	
	public function __construct(){}
	
	
	public function getRegiones()
	{   $db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM departamento WHERE id_pais=168 ORDER BY 1");
		while($row = mysqli_fetch_assoc($query))
		{
			$datos[] = array(
				'id_dep'	=> $row['id_departamento'],
				'nombre'	=> $row['nombre_departamento']
			);	
		}		
		return $datos;
	}
	
	public function getPaises(){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM pais");
		while($row = mysqli_fetch_assoc($query))
		{
			$datos[] = array(
				'id_pais'	=> $row['id_pais'],
				'nombre'	=> $row['nombre_pais']
			);	
		}		
		return $datos;
	}
	
	public function getProvincias()
	{
		$query = $db_Full->select_sql("SELECT * FROM provincia ");
		while($row = mysqli_fetch_assoc($query))
		{
			$datos[] = array(
				'id'	=> $row['id_provincia'],
				'nombre'	=> $row['nombre_provincia']
			);	
		}		
		return $datos;
	}
	
	public function getDistritos($id=0)	
	{
		if ($id==0){
			$query = $db_Full->select_sql("SELECT * FROM distrito");
		}else{
			$query = $db_Full->select_sql("SELECT * FROM distrito WHERE id_provincia = '".$id."'");
		}
		
		while($row = mysqli_fetch_assoc($query))
		{
			$datos[] = array(
				'id'	=> $row['id_distrito'],
				'nombre'	=> $row['nombre_distrito']
			);	
		}		
		return $datos;
	}
	
	//$id_prov = substr($id_distrito, 0, -2);
	
	
	//public function get_name_
	
	
	
	
	public function set_ubigeo($id_distrito){
		
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM distrito WHERE id_distrito = '".$id_distrito."' ");
		$row = mysqli_fetch_assoc($query);			
		$this->id_provincia = $row['id_provincia'];
		$this->id_distrito = $row['id_distrito'];
		
		$query_p = $db_Full->select_sql("SELECT * FROM provincia WHERE id_provincia = '".$this->id_provincia."'");
		$row_p = mysqli_fetch_assoc($query_p);			
		
		$this->id_departamento = $row_p['id_departamento'];
		
		$this->name_provincia = $this->get_name_provincia($this->id_provincia);	
		$this->name_distrito = $this->get_name_distrito($this->id_distrito);
		$this->name_departamento = $this->get_name_departamento($this->id_departamento);		
				
	}
	
	public function __get($attribute){
		return	$this->$attribute;
	}
	
	public function get_name_departamento($id){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM departamento WHERE id_departamento = '".$id."' ");
		$row = mysqli_fetch_assoc($query);	
		return $row['nombre_departamento'];
	}
	
	public function get_name_provincia($id){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM provincia WHERE id_provincia = '".$id."' ");
		$row = mysqli_fetch_assoc($query);		
		return $row['nombre_provincia'];
	}
	
	public function get_name_distrito($id){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM distrito WHERE id_distrito = '".$id."' ");
		$row = mysqli_fetch_assoc($query);	
		return $row['nombre_distrito'];
	}
	
	public function getProveedores()
	{$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM proveedores ORDER BY 1");
		while($row = mysqli_fetch_assoc($query)	)
		{
			$datos[] = array(
				'id_pro'	=> $row['id_proveedor'],
				'nombre'	=> $row['nombre_proveedor']
			);
		}

		return $datos;
	}
	
}
 ?>