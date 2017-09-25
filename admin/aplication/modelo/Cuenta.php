<?php
class Cuenta {

    private $_cliente, $_errores = 0;

    public function __construct(&$cliente) {
        $this->_cliente = $cliente;
    }

    //Function Cerrar sesion
    public function logoutUsuario() { 
        $this->_cliente->setLogeado(FALSE);
        $this->setData(0);
        unset($_SESSION['quk']);
    }

    // Function Asignar Cliente a Cuenta
    public function setCliente($cliente) {
        $this->_cliente = $cliente;
    }

    // Function Recuperar Cliente
    public function getCliente() {
        return $this->_cliente;
    } 

    function mantenimiento() {
        ?>              


        <div id="micuentaHome">

            <div class="micuenta_left">
                <h2>Mi cuenta</h2>

                <ul id="nav2">
                    <li><a href="cuenta?cuenta=edit">Mis datos personales</a></li>
                    <li><a href="cuenta?cuenta=psw_edit">Cambiar mi Password</a></li>
                    <li><a href="historial_pedidos">Historial de Pedidos</a></li>
                    <li></li>
                </ul>                
                <a class="cerrar_sesion" href="cuenta?cuenta=salir"> x Cerrar Sesión</a>
            </div>

            <div class="micuenta_right">
                <h2>MI CUENTA</h2>
                <div class="dato" align="center">
                    <img src="../webroot/imgs/micuenta1_icon.jpg" width="31" height="41" alt="" /><p>Mis datos Personales</p>
                </div>
                <div class="dato" align="center">
                    <img src="../webroot/imgs/micuenta2_icon.jpg" width="30" height="41" alt="" /><p>Cambiar mi Password</p>
                </div>
                <div class="dato" align="center">
                    <img src="../webroot/imgs/micuenta3_icon.jpg" width="32" height="39" alt="" /><p>Historial de Pedidos</p>
                </div>
            </div>
            <div class="clear"></div>

        </div> 
        <?php
    }

    /*     * ***************** INGRESAR EMAIL PARA RECUPERAR DATOS DE ACCESO *************** */

    function recuperarContrasenia() {
        ?>
        <div id="registrarse" class="fondo2">

            <h2 class="titulo2"><img src="../webroot/imgs/icon_user2.png" width="15" height="16" />Recuperar Contraseña</h2>
            <p>Por favor, dejenos su email y en breve le estaremos enviando sus datos de acceso.</p>
            <br class="clear">
            <form class="frm_reg" name="cuenta" id="frm_reg" method="post" onsubmit="return validar_mi_contrasenia2(this,1)">
                <label>Email : </label><input type="tex" name="email" id="email" class="txt"><br class="clear">
                <br class="clear">
                <div id="opciones">
                    <a class="cancelar" href="javascript:window.history.go(-1)" style="text-decoration:none;"><input type="button" value="CANCELAR" > </a>
                    <input type="submit" value="ENVIAR" >   

                </div>          
            </form>
            <br class="clear"><br class="clear">
        </div>    
        <?php
    }

    /*     * ********************  ENVIAR DATOS DE ACCESO DE CUENTA ************************ */

    function mandarContrasenia() {
        $db_Full = new db_model(); $db_Full->conectar();
        $sql = "SELECT * FROM clientes WHERE email_cliente='" . $_POST['email'] . "'";
        $query = $db_Full->select_sql($sql);
        if ($db_Full->NumeroRegistros($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            $email = $row['email_cliente'];
            $subject = "Datos de Cuenta - " . NOMBRE_SITIO;
            $msg = "
			Estimado(a) " . $row['nombre_cliente'] . " " . $row['apellidos_cliente'] . ". 
			A continuación le recordamos los datos de acceso a " . NOMBRE_SITIO . ":
			
			Email: " . $row['email_cliente'] . " 
			Contraseña: " . desencriptar($row['password_cliente']) . "			
			
			
			Atte
			" . NOMBRE_SITIO . "
			
			www.develoweb.pe/holsitica	
						
			";
            //echo desencriptar($row['password_cliente']);
            @mail($email, $subject, $msg, "from: " . EMAIL_PEDIDOS);
            //echo "Se enviaron sus datos de acceso correctamente a su e-mail";
            $href = "index";
            $texto = "Sus datos de acceso fueron enviados a su E-mail.";
        } else {
            $href = "cuenta?cuenta=recuperar_contrasenia";
            $texto = "Lo sentimos,  no se encontro el usuario con ese E-mail.";
        }
        ?>

        <div id="registrarse" class="fondo2">
            <h2>Recuperar Contraseña</h2>
            <p> <?php echo $texto; ?></p>
            <br class="clear">
            <div id="opciones">
                <a class="cancelar" href="javascript:window.history.go(-1)"><input type="submit" value="REGRESAR" ></a>           
            </div>   
        </div>   
        <br class="clear"><br class="clear">        
        <?php
    }

    /*     * ******************** INGRESAR DATOS DE NUEVO CLIENTE **************************** */

    function registrarse() {
        $db_Full = new db_model(); $db_Full->conectar();
        $sq_pais = $db_Full->select_sql("SELECT * FROM distrito");
        $ubigeo = new Ubigeos($msg);
        $distrito = $ubigeo->getDistritos();
        $sq_pais = $db_Full->select_sql("SELECT * FROM provincia");
        $ubigeo = new Ubigeos($msg);
        $provincia = $ubigeo->getProvincias();
        $sq_pais = $db_Full->select_sql("SELECT * FROM departamento");
        $ubigeo = new Ubigeos($msg);
        $departamento = $ubigeo->getRegiones();
        ?>    

        <h2 class="titulo2"><img src="../webroot/imgs/icon_user2.png" width="15" height="16" />Regístrate aquí</h2>
        <div id="registro_cuerpo">
            <p>Al registrarte podrás realizar tus compras, revisar el estado de tus pedidos y consultar tus operaciones anteriores. 
                <em>* Todos los campos son obligatorios.</em></p>
        <?php $val = isset($_GET['linkF']) ? $_GET['linkF'] : 0; ?>
            <form name="frm_reg" id="frm_reg" action="" method="post"  class="frm_reg"

                  onsubmit="return  validar_clientes(this,'add','<?php echo $val ?>','<?php echo ID_IDIOMA ?>')">
                <table width="633" border="0" align="center">
                    <tr>
                        <td width="373">
                            <label for="name">Nombres: <em>*</em></label><br/><input type="text" name="name" id="name" class="txt" /><br/>
                            <label for="apellidos">Apellidos:<em>*</em></label><br/><input type="text" name="apellidos" id="apellidos" /><br/>
                            <label for="correo">Email: <em>*</em></label><br/><input type="text" name="email" id="email" /><br/>
                            <label>Password: <em>*</em></label><br/><input type="password" name="password" id="password" /><br/>
                            <label>Repetir Password: <em>*</em></label><br/><input type="password" name="passwordr" id="passwordr" /><br/>
                        </td>
                        <td width="250">
                            <label for="telefono">Teléfono: <em>*</em></label><br/><input type="text" name="telefono" id="telefono" class="txt" /><br/>
                            <label for="dirección">Dirección: <em>*</em></label><br/><input type="text" name="direccion" id="direccion" /><br/>
                            <label>Departamento: <em>*</em></label><br/>
                            <select name="departamento" id="departamento" size="1" class="txt" >
                                <option value="">Elegir departamento...</option>
        <?php for ($i = 0; $i < count($departamento); $i++) { ?>
                                    <option value="<?php echo $departamento[$i]['id_dep'] ?>"><?php echo $departamento[$i]['nombre'] ?></option> <?php } ?>
                            </select><br/>
                            <label>Provincia: <em>*</em></label><br/>
                            <select name="provincia" id="provincia" size="1" class="txt" >
                                <option value="">Elegir provincia... </option>
        <?php for ($i = 0; $i < count($provincia); $i++) { ?>
                                    <option value="<?php echo $provincia[$i]['id'] ?>"><?php echo $provincia[$i]['nombre'] ?></option>
                                <?php } ?>
                            </select><br/>
                            <label>Distrito: <em>*</em></label><br/>
                            <select name="distrito" id="distrito" size="1" class="txt" >
                                <option value="">Elegir distrito... </option>
        <?php for ($i = 0; $i < count($distrito); $i++) { ?>
                                    <option value="<?php echo $distrito[$i]['id'] ?>"><?php echo $distrito[$i]['nombre'] ?></option>
                                <?php } ?>
                            </select><br />  

                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="REGISTRARME" class="btn_registrarme">    </td>
                    </tr>
                </table>
            </form>

            <div class="loadingn"> </div>

        </div>     
        <?php
    }

    /*     * **************************** GUARDAR DATOS DE NUEVO CLIENTE ********************** */

    function cuentaAdd() {
        $db_Full = new db_model(); $db_Full->conectar();

        if (!isset($_POST['email'])) {
            return false;
        }
        $sql_ver = "SELECT * FROM clientes WHERE email_cliente='" . $_POST['email'] . "'";
        $query_ver = $db_Full->select_sql($sql_ver);
        if ($db_Full->NumeroRegistros($query_ver) == 0) {

            $sql = "INSERT INTO clientes (`nombre_cliente`,`apellidos_cliente`,`email_cliente`,`password_cliente`,`telefono_cliente`,`direccion_cliente`,`departamento_cliente`,`provincia_cliente`,`distrito_cliente`,`observacion_cliente`) VALUES('" . $_POST['name'] . "','" . $_POST['apellidos'] . "','" . $_POST['email'] . "','" . encriptar($_POST['password']) . "','" . $_POST['telefono'] . "','" . $_POST['direccion'] . "','" . $_POST['departamento'] . "','" . $_POST['provincia'] . "','" . $_POST['distrito'] . "','0')";


            $query = $db_Full->select_sql($sql);
            $id = @mysqli_insert_id();


            $this->_cliente->__set('_logeado', TRUE);
            $this->_cliente->__set('_id', $id);
            $this->_cliente->__set('_usuario', $_POST['nombre'] . " " . $_POST['apellidos']);
            $this->_cliente->__set('_email', $_POST['email']);
            $this->_cliente->sumaIngreso();

            $subject = " Registro en " . NOMBRE_SITIO;
            $msg = "			
				
				BIENVENIDO A " . NOMBRE_SITIO . "
				
				Estimado(a) " . $_POST['name'] . " " . $_POST['apellidos'] . " su cuenta ha sido creada:
				
				Tu Cuenta
				--------------------------------------
				Usuario: " . $_POST['email'] . " 
				Contrasena: " . $_POST['password'] . "
				
				Con estos datos de acceso podras ingresar a nuestra pagina e informarte de nuestras promociones, ofertas y eventos especiales de ". NOMBRE_SITIO .".
 
				Gracias por registrarte.
				Que tengas un maravilloso dia!
				Namaste
 
				Atte
				Lucero Aguilar
				" . NOMBRE_SITIO . " - Joyeria y articulos holisticos en general
				
				www.joyeriaholistica.com
				www.joyeriaespiritual.com
				
				";
            @mail($_POST['email'], $subject, $msg, "from: " . EMAIL_CONTACTENOS);
            $this->notificacion = " BIENVENIDO A " . NOMBRE_SITIO . ".  Lo invitamos tambien a que participe de nuestro <a href='foro/index'>foro</a> de soporte de nuestros productos, al cual ingresa automaticamente al registrarse ";
            unset($_SESSION['register']);
            //InterfazCuenta::CuentaMantenimiento();
        } else {


            /*             * ******** DATOS DE USUARIO ********** */
            $_SESSION['register'][0] = $_POST['nombre'];
            $_SESSION['register'][1] = $_POST['apellidos'];
            $_SESSION['register'][2] = $_POST['dni'];
            /* $_SESSION['register'][3]=$_POST['sexo']; */
            $_SESSION['register'][3] = $_POST['email'];

            $_SESSION['register'][10] = $_POST['telefono'];
            $_SESSION['register'][11] = $_POST['movil'];
            $_SESSION['register'][12] = $_POST['boletin_cliente'];


            /*             * ************ ADDRESS *************** */
            /* $_SESSION['register'][6]=$_POST['suburbio']; */
            /* $_SESSION['register'][7]=$_POST['boletin']; */
            /* $_SESSION['register'][13]=$_POST['pais']; */
            $_SESSION['register'][4] = $_POST['empresa'];
            $_SESSION['register'][5] = $_POST['departamento'];
            $_SESSION['register'][6] = $_POST['provincia'];
            $_SESSION['register'][7] = $_POST['distrito'];
            $_SESSION['register'][8] = $_POST['cp'];
            $_SESSION['register'][9] = $_POST['direccion'];




            $this->notificacion = "  <img src='" . _imgs_ . "icon_exclaim.gif'> &nbsp; El email que ingreso ya existe, si ya tiene una cuenta por favor <a href='#' onclick='javascript:void(document.f1.email.focus())'>entre</a> a ella. ";
        }
    }

    /*     * ************************ EDITAR DATOS DE CUENTA DE CLIENTE ************************ */

    function cuentaEdit() {
        $db_Full = new db_model(); $db_Full->conectar();
        $sql_cliente = "select * from clientes where id_cliente=" . $this->_cliente->__get("_id");
        $queryCliente = $db_Full->select_sql($sql_cliente);
        $rowC = mysqli_fetch_assoc($queryCliente);

        $ubigeo = new Ubigeos($msg);
        $distrito = $ubigeo->getDistritos();
        $provincia = $ubigeo->getProvincias();
        $departamento = $ubigeo->getRegiones();
        ?>        



        <div id="misdatosP">

            <div class="micuenta_left">
                <h2>Mi cuenta</h2>

                <ul id="nav2">
                    <li><a class="active" href="cuenta?cuenta=edit">Mis datos personales</a></li>
                    <li><a href="cuenta?cuenta=psw_edit">Cambiar mi Password</a></li>
                    <li><a href="historial_pedidos">Historial de Pedidos</a></li>
                    <li></li>
                </ul>                
                <a class="cerrar_sesion" href="cuenta?cuenta=salir"> x Cerrar Sesión</a>
            </div>

            <div class="micuenta_right">
                <h2 >Mis Datos Personales</h2>

                <form action="" method="post" name="cuenta" id="cuenta" >                
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Puedes modificar tus datos aquí. <em>* Todos los campos son obligatorios.</em> </p>
                    <div class="table_reg">
                        <div class="colum_reg1">
                            <label for="name">Nombres: <em>*</em></label><br/><input type="text" name="name" id="name" class="txt" value="<?php echo $rowC['nombre_cliente'] ?>" /><br/>
                            <label for="apellidos">Apellidos:<em>*</em></label><br/><input type="text" name="apellidos" id="apellidos"  value="<?php echo $rowC['apellidos_cliente'] ?>" /><br/>
                            <label for="correo">Email: <em>*</em></label><br/><input type="text" name="correo" id="correo" value="<?php echo $rowC['email_cliente'] ?>" /><br/>
                            <label for="telefono">Teléfono: <em>*</em></label><br/><input type="text" name="telefono" id="telefono" class="txt" value="<?php echo $rowC['telefono_cliente'] ?>"/><br/>
                        </div>

                        <div class="colum_reg2">
                            <label for="direccion">Dirección: <em>*</em></label><br/><input type="text" name="direccion" id="direccion" value="<?php echo $rowC['direccion_cliente'] ?>"/><br/>

                            <label>Departamento: <em>*</em></label><br/>
                            <select name="departamento" id="departamento" size="1" class="txt" >
                                <option value="0">Elegir departamento...</option>
        <?php for ($i = 0; $i < count($departamento); $i++) { ?>
                                    <option value="<?php echo $departamento[$i]['id_dep'] ?>"  <?php if ($rowC['departamento_cliente'] == $departamento[$i]['id_dep']) echo 'selected="selected"'; ?>><?php echo $departamento[$i]['nombre'] ?></option> <?php } ?>
                            </select><br/>  

                            <label>Provincia: <em>*</em></label><br/>
                            <select name="provincia" id="provincia" size="1" class="txt" >
                                <option value="0">Elegir provincia...</option>
                                <?php for ($i = 0; $i < count($provincia); $i++) { ?>
                                    <option value="<?php echo $provincia[$i]['id'] ?>" <?php if ($rowC['provincia_cliente'] == $provincia[$i]['id']) echo 'selected="selected"'; ?> ><?php echo $provincia[$i]['nombre'] ?></option>
        <?php } ?>
                            </select><br/>   

                            <label>Distrito: <em>*</em></label><br/>
                            <select name="distrito" id="distrito" size="1" class="txt" >
                                <option value="0">Elegir distrito...</option>
                                <?php for ($i = 0; $i < count($distrito); $i++) { ?>
                                    <option value="<?php echo $distrito[$i]['id'] ?>" <?php if ($rowC['distrito_cliente'] == $distrito[$i]['id']) echo 'selected="selected"'; ?> ><?php echo $distrito[$i]['nombre'] ?></option>
                                <?php } ?>
                            </select><br/>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="loadingn"> </div>
                    <div align="center" class="clear">
                        <input type="submit" value="Cancelar" onclick="javascript:window.history.go(-1)" />
                        <input type="submit" name="button" id="button" value="Guardar cambios"  onclick="javascript:validar_mis_datos('update')"/>
                    </div>


                </form>                 

            </div>

            <div class="clear"></div>

        </div> 

        <?php
    }

    /*     * ************************ ACTUALIZA LOS DATOS DEL CLIENTE *************************** */

    function cuentaUpdate() {
        $sql = "UPDATE clientes SET 
						nombre_cliente='" . $_POST['name'] . "',
						apellidos_cliente='" . $_POST['apellidos'] . "',						
						email_cliente='" . $_POST['correo'] . "',
						telefono_cliente='" . $_POST['telefono'] . "',
						direccion_cliente='" . $_POST['direccion'] . "',
						departamento_cliente='" . $_POST['departamento'] . "',						
						provincia_cliente = '" . $_POST['provincia'] . "',
						distrito_cliente = '" . $_POST['distrito'] . "'						
						
				WHERE id_cliente='" . $this->_cliente->__get("_id") . "' ";
        $query = $db_Full->select_sql($sql);

        $sql_info = "UPDATE clientes_informacion 
							SET fecha_ultima_modificacion='" . date('Y-m-d') . "'
							WHERE id_cliente='" . $this->_cliente->__get("_id") . "'";
        $query_info = $db_Full->select_sql($sql_info);


        //$this->notificacion="<img src='"._imgs_."note.gif'> &nbsp; Se actualizaron sus datos satisfactoriamente. ";			
    }

    /*     * ***************************** EDITAR PASSSWORD DE CUENTA **************************** */

    function passwordEdit() {
        //$cliente = new Cliente($cliente->getId());
        $sql_cliente = "select * from clientes where id_cliente=" . $this->_cliente->__get("_id");
        $queryCliente = $db_Full->select_sql($sql_cliente);
        $rowC = mysqli_fetch_assoc($queryCliente);
        ?>  

        <div id="micuenta">

            <div class="micuenta_left">
                <h2>Mi cuenta</h2>

                <ul id="nav2">
                    <li><a href="cuenta?cuenta=edit">Mis datos personales</a></li>
                    <li><a class="active" href="cuenta?cuenta=psw_edit">Cambiar mi Password</a></li>
                    <li><a href="historial_pedidos">Historial de Pedidos</a></li>
                    <li></li>
                </ul>                
                <a class="cerrar_sesion" href="cuenta?cuenta=salir"> x Cerrar Sesión</a>
            </div>

            <div class="micuenta_right">
                <h2 >Cambiar tu Password</h2>

                <form name="cuenta" action="" method="post" class="frm_reg" onsubmit="return validar_mi_contrasenia(this,'psw_update')">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Puedes modificar tus password aquí. <em>* Todos los campos son obligatorios.</em> </p>
                    <div class="table_reg">
                        <div class="colum_password">
                            <label for="name">Password Actual: <em>*</em></label><br/><input type="password" name="name" id="name" class="txt" value="<?php echo $rowC['password_cliente'] ?>" /><br/>
                            <label for="apellidos">Nuevo password:<em>*</em></label><br/><input type="password" name="password" id="password" onKeyPress="return validpsw(event)" /><br/>
                            <label for="correo">Repetir Nuevo Password: <em>*</em></label><br/><input type="password" name="nuevo_password" id="nuevo_password" onKeyPress="return validpsw(event)" /><br/>
                            <div class="clear">
                                <input type="submit" value="Cancelar" onclick="javascript:window.history.go(-1)" />
                                <input type="submit" name="button" id="button" value="Guardar cambios" />
                            </div>

                        </div>
                    </div>
                    <div class="loadingn"> </div>
                </form>
            </div>
            <div class="clear"></div>

        </div>


        <?php /* ?>    <div id="cesta">
          <div id="cesta_u"></div>
          <div id="cesta_c">
          <h1 class="azul">Mi Cuenta</h1>
          <h3 class="mi_password">Modificar mi Password de Acceso</h3>
          <div class="datos_center">
          <form name="cuenta" action="" method="post" class="frm_reg" >
          <label>Password Actual <b>*</b> : </label><input type="password" name="password_actual" id="password_actual" class="txt" value="<?php echo $rowC['password_cliente'] ?>"><br />
          <label>Nuevo Password <b>*</b> : </label><input type="password" onKeyPress="return validpsw(event)" name="password_actual" id="password_actual" class="txt"><br />
          <label>Repetir Nuevo Password <b>*</b> : </label><input type="password" onKeyPress="return validpsw(event)" name="nuevo_password" id="nuevo_password" class="txt"><br />
          <br class="clear"><br class="clear"><br class="clear">
          <div id="opciones">
          <a class="cancelar" href="javascript:window.history.go(-1)">Cancelar</a>
          <a href="javascript:validar_mi_contrasenia('psw_update')" class="btn_guardar_cambios"></a>
          </div>
          <br class="clear"> <br class="clear">
          </form>
          </div>
          </div>
          <div id="cesta_d"></div>
          </div>    <?php */ ?>         
        <?php
    }

    /*     * ********************** ACTUALIZA EL PASSWORD DEL CLIENTE *************************** */

    function passwordUpdate() {

        $sql = "UPDATE clientes SET 
					password_cliente='" . encriptar($_POST['nuevo_password']) . "'						
			WHERE id_cliente='" . $this->_cliente->__get("_id") . "' ";
        $query = $db_Full->select_sql($sql);

        $sql_info = "UPDATE clientes_informacion 
						SET fecha_ultima_modificacion='" . date('Y-m-d') . "'
						WHERE id_cliente='" . $this->_cliente->__get("_id") . "' ";
        $query_info = $db_Full->select_sql($sql_info);

        //$this->notificacion="<img src='"._imgs_."note.gif'> &nbsp; Se actualizó su contraseña satisfactoriamente. ";					
    }

    /*     * ************************** ACCESAR A LA CUENTA DEL CLIENTE *************************** */

    function cuentaAcceso() {
        $db_Full = new db_model(); $db_Full->conectar();
        $sql = "SELECT *, CONCAT(nombre_cliente,' ',apellidos_cliente) AS Cliente
			FROM clientes 
			WHERE email_cliente=" . comillas_inteligentes($_POST['email']) . " AND 
				  password_cliente=" . comillas_inteligentes(encriptar($_POST['password'])) . " ";

        $query = $db_Full->select_sql($sql);

        if ($db_Full->NumeroRegistros($query) > 0) {

            $row = mysqli_fetch_assoc($query);

            $this->_cliente->__set("_logeado", TRUE);
            $this->_cliente->__set("_id", $row["id_cliente"]);
            $this->_cliente->__set("_usuario", $row["Cliente"]);
            $this->_cliente->__set("_email", $row["email_cliente"]);
            $this->_cliente->__set("_nombre", $row["nombre_cliente"]);
            $this->_cliente->__set("_apellidos", $row["apellidos_cliente"]);
            $this->_cliente->__set("_email", $row["email_cliente"]);
            $this->_cliente->__set("_telefono", $row["telefono_cliente"]);

            $this->_cliente->sumaIngreso();
            $msg = " Bienvenido " . $this->_cliente->__get("_usuario") . "  ";
        } else {
            
        }
    }

    /*     * ******************** CERRAR SESSION DE CLIENTE ********************* */

    function cerrarSession() {

        $this->_cliente->__set("_logeado", FALSE);
        $this->_cliente->__set("_id", '');
        $this->_cliente->__set("_usuario", 'Visitante');
        $this->_cliente->__set("_email", '');
        $this->_cliente->__get("_carrito")->reset(TRUE);
    }

    function acceso() {
        ?> 

        <h2 class="titulo2"><img src="../webroot/imgs/icon_user2.png" width="15" height="16" />Login</h2>
        <div id="login_cuerpo">
            <div class="cuerpo_sec" id="login_sec">
                <h3>Soy un cliente registrado</h3>
        <?php $val = isset($_GET['linkF']) ? $_GET['linkF'] : 0; ?>
                <form class="frm_reg" name="cuenta_acceso" id="frm_reg"  method="post" onsubmit="return validate_acceso_cuenta(this,1,'<?php echo $val ?>')">
                    <div id="login_inputs">
                        <label for="email">Email:</label><br/><input type="text" name="email" id="email" /><br/>
                        <label for="password">Password:</label><br/><input type="password" name="password" id="password" />
                        <span class="olvido"><a href="cuenta?cuenta=recuperar_contrasenia" style="text-decoration:none;">¿Olvidó su password?</a></span>
                        <input type="submit" class="login" name="button" id="button" value="Iniciar Sesión" />
                    </div>
                </form>
            </div>
            <div class="cuerpo_sec cuerpo_sec2" id="login_sec2">
                <h3>Soy un Nuevo cliente</h3>
                <p>
                    Al registrarte podrás realizar tus compras, revisar el estado de tus pedidos y consultar tus operaciones anteriores.<br/><br/>
                    Haz clic en regístrate aquí y sigue las instrucciones
                </p>
                <a href="cuenta?cuenta=registrarse&linkF=<?php echo $val ?>"><input type="submit" name="button" id="button" value="Reg&iacute;strate Aquí" /></a>
            </div>
            <div class="clear"></div>
        </div>  

        <?php
    }

    function mailings() {
        ?>
        <div class="titulo_cuerpo">Suscribete al Boletin</div>
        <div class="notificacion">Por favor, dejenos su email y en breve le estaremos suscribiendo al boletin.  </div> 
        <div id="contenido"> 							
            <form name="frmemail" action="" method="post">
                <label>E-mail:</label> <input type="text" name="email" size="40" class="inp"> <br /> 
                <div class="botones"><input type="button" name="enviar" value="ENVIAR" onclick="return validar_send_mailings('suscribe')" class="btn_detalle" />	 </div>					
            </form>						
        </div><?php
    }

    function suscribe() {
        $sqlSus = "INSERT INTO mailings(id_mailings , email_mailings) values ('' , '" . $_POST['email'] . "' )";
        $rsSus = $db_Full->select_sql($sqlSus);
    }

}
?>