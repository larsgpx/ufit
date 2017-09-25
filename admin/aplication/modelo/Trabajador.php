<?php
require_once '../admin/aplication/modelo/Rol.php';
class Trabajador{
	
	
	private $_id;
	private $_nombre;
	private $_apellidos;
	private $_email;
	private $_rol;
	private $_login = "Visitante";
	private $_password;
	private $_fecha_ingreso;
	private $_secciones;
	private $_logeado = FALSE;
	private $_sucursal;
	private $_sucursald;
	private $_fechaa;
	private $_foto;
	private $_idsucursal;
	private $_carrito;
	private $_back;	
	private $_estado;	
	
	
	
	public function __construct($id = 0, Idioma $idioma = Null){
		$this->_id = $id;
		$db_Full = new db_model(); $db_Full->conectar();
		
		if($this->_id > 0){
			
			$sql = " SELECT * FROM tbl_trabajadores WHERE id_tra = '".$this->_id."'";
			
			$query = $db_Full->select_sql($sql);
			
			if($row = mysqli_fetch_assoc($query))
			{ 
				$this->_id 				= $row['id_tra'];
				$this->_nombre	 		= $row['nom_tra'];
				$this->_paterno	 		= $row['paterno_tra'];
				$this->_materno	 		= $row['materno_tra'];
				$this->_dni	 		    = $row['dni_tra'];
				$this->_email	 		= $row['email_tra'];
				$this->_login 		    = $row['user_tra'];
				$this->_password 		= $row['pass_tra'];
				$this->_celular 		= $row['celular_tra'];
				$this->_rol 	   		= new Rol($row['fk_rol']);
			}
				
		}					
	}
	
	public function getLogeado(){
		return $this->_logeado;
	}
 
	public function setLogeado( $valor ){
		$this->_logeado = $valor;
	}	
	public function getNombre(){
		return $this->_nombre;
	}
	
	public function getPaterno(){
		return $this->_paterno;
	}
	
	public function getMaterno(){
		return $this->_materno;
	}

	
	public function getEmail(){
		return $this->_email;
	}
	

	public function getTelefono(){
		return $this->_telefono;
	}
	
	public function getRol(){
		return $this->_rol;
	}
		

	public function getLogin(){
		return $this->_login;
	}
	
		
	public function getId(){
		return $this->_id; 
	}
	public function setLogin($valor){
		 $this->_login = $valor;
	}
		
	public function __toString()
	{
		return $this->_nombre . ' ' .$this->_apellidos;
	}
	
	
    public function __get($attribute){
		return	$this->$attribute;
	}
}
 ?>