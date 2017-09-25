<?php
//require_once '../../admin/aplication/modelo/Rol.php';
//require_once '../../admin/aplication/modelo/Trabajador.php';
class Sesion
{

    private $_usuario;
    private $_token;


    public function __construct()
    {
    	if(!isset($_SESSION))
    	{	
        session_start();
        }

		if(!$_SESSION['usuario'] || empty($_SESSION['usuario'])){
			$_SESSION['usuario'] = new Trabajador();
		}


		$this->_usuario = $_SESSION['usuario'] ;
	
    }

	public function validaAcceso($usuario, $password){
		$db_Full = new db_model(); $db_Full->conectar();
		$usuario  = trim( str_replace( "'","",str_replace("#","",$usuario) ) );
		$password = trim( str_replace( "'","",str_replace("#","",$password) ) );

		$sql = " SELECT * FROM tbl_trabajadores WHERE user_tra='".$usuario."' AND pass_tra='".$password."' ";
		$query = $db_Full->select_sql($sql);
		//echo 'ingreso0';exit;
		if($db_Full->NumeroRegistros($query) > 0){ 
			$row= mysqli_fetch_assoc($query);
			$this->_usuario = new Trabajador($row['id_tra']);
			$_SESSION['usuario'] = $this->_usuario;
			$_SESSION['nombres'] = $row['nom_tra'];
			$_SESSION['paterno'] = $row['paterno_tra'];
			$_SESSION['id_trabajador'] = $row['id_tra'];
			$this->_usuario->setLogeado(TRUE);
		}else{
			$this->errores += 1;
			return false;
		}
		return true;
	}

	function enviarContrasena($link){
		$db_Full = new db_model(); $db_Full->conectar();
		$query = $db_Full->select_sql("SELECT * FROM usuarios WHERE email_usuario = '".$_POST['login']."'");
		if($db_Full->NumeroRegistros($query) == 1){
			$row=mysqli_fetch_assoc($query);

			$email 	 = $row['email_usuario'];
			$subject = "Datos de Cuenta - Industria Medina";
			$msg="
			Estimado(a) ".$row['nombre_usuario']." ".$row['apellidos_usuario'].".
			A continuación le recordamos los datos de acceso a Industria Medina:

			Usuario: ".$row['login_usuario']."
			Contraseña: ".$row['password_usuario']."


			Atte
			Industria Medina

			http://www.industriamedina.com";


			@mail($email,$subject,$msg,"From: soporte@joyeria.com");
			return true;

		}else{
			return false;
		}
	}

	public function isLoged(){
		if(is_object($this->_usuario)){
			return true;
		}else{
			return false;
		}
	}

	public function conFiltro(){

		if($this->_usuario->getRol()->getNombre() == "Administrador" || $this->_usuario->getRol()->getNombre() == "Jefe de Proyectos"){
			return false;
		}else{
			return true;
		}
	}



	public function logout(){

		unset($_SESSION['usuario']);
	
		//session_destroy();

		$this->_usuario = new Trabajador();
		$this->_usuario->setLogin("Visitante");
		$this->_usuario->setLogeado(FALSE);
		$_SESSION['usuario'] = $usuario;
		header("Location: login");
	}

		function acceso(){ ?>
		<form name="login" action="index" method="post">
			<table align="center" width="300" id="inicio" cellpadding="1" cellspacing="1">
				<tr>
					<td colspan="2" class="title"> ACCESO AL AREA DE ADMINISTRACI&Oacute;N</td>
				</tr>
				<tr>
					<td colspan="2" ><BR></td>
				</tr>
				<tr>
					<td width="40%" align="right">Usuario : </td>
					<td class="total"><input type="text" name="login" class="text"></td>
				</tr>
				<tr>
					<td align="right">Password : </td>
					<td class="total"><input type="password" name="password" class="text"></td>
				</tr>
				<tr>
					<td align="right"><BR><input type="reset" name="limpiar" value="LIMPIAR" class="button"></td>
					<td align="center"><BR><input type="submit" name="enviar" value="ACEPTAR" class="button"></td>
				</tr>
				<tr>
					<td colspan="2" ><BR></td>
				</tr>
			</table>
		</form>

	<?php
	}

	function inicio($msgbox){
		$usuarios   = new Trabajadores();
		//$categorias = new Categorias($this->_idioma, $msgbox);
		//$productos	= new Productos($this->_idioma, $msgbox, $this->_usuario);

		?>
		<h1>Bienvenido a <?php echo NOMBRE_SITIO; ?></h1>
        <ul id="welcome">
       <?php if($this->_usuario->getRol()->getNombre() == "Administrador"){?>

<!--         	<li><a href="solucionarios?cat=0"><img src="<?php //echo _admin_ ?>icon-solucionarios.jpg" /><span>Solucionarios</span></a></li>
            <li><a href="clientes"><img src="<?php //echo _admin_ ?>icon-clientes.jpg" /><span>Clientes</span></a></li>
            <li><a href="autores"><img src="<?php //echo _admin_ ?>icon-autores.jpg" /><span>Autores</span></a></li>
            <li><a href="pedidos"><img src="<?php //echo _admin_ ?>icon-pedidos.jpg" /><span>Pedidos</span></a></li>
            <li><a href="reporte_pedido"><img src="<?php //echo _admin_ ?>icon-reportes.jpg" /><span>Reportes</span></a></li> -->

            <li><a href="configuracion"><img src="<?php echo _admin_ ?>icon-config.jpg" /><span>Configuracion de Sitio</span></a></li>
            <li><a href="usuarios"><img src="<?php echo _admin_ ?>icon-cuentas-accesos.jpg" /><span>Cuentas y
Accesos</span></a></li>
         <?php }else{ ?>
           <!-- <li><a href="solucionarios?cat=0"><img src="<?php //echo _admin_ ?>icon-solucionarios.jpg" /><span>Solucionarios</span></a></li>
            <li><a href="autores"><img src="<?php //echo _admin_ ?>icon-autores.jpg" /><span>Autores</span></a></li>
            <li><a href="tutorias"><img src="<?php //echo _admin_ ?>icon-solucionarios.jpg" /><span>Tutorias</span></a></li>-->

         <?php } ?>
        </ul>
		<?php

	}




    public function getUsuario()
    {
        return $this->_usuario;
    }

	public function getId(){
		return $this->_id;
	}

    public function getToken()
    {
        return $this->_token;
    }

    private function _generarToken($text)
    {
        return md5(rand().$text);
    }

    public static function getStatus()
    {
        $session = new Session();

        if(!empty($_SESSION['usuario']) && !empty($_SESSION['token'])) {

            $token = $this->_persistencia->getToken($_SESSION['usuario']);

            if($_SESSION['token'] == $token){
                $this->_usuario = new Trabajador($_SESSION['usuario']);
                $this->_token   = $this->_generarToken($usuario);
                //$_persistencia->update($this);
            }else {
                exit;
            }
        }
    }

}
?>