<?php 
		 
		switch ($_GET['tabla']) {
			case 'tbl_tipos':
				//require("../admin/aplication/modelo/modelo_base_datos.php");
					$db_Full = new db_model("".$_GET['uri']); 
					$db_Full->conectar();
			break;
		}

		include("../cabecera.php");
			include("../head.php");
			include("../header.php");
			include("../footer.php");

?>