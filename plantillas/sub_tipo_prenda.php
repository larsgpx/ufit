<?php		
			$db_Full = new db_model(); 
			$db_Full->conectar();
			$result  = $db_Full->select_sql(
			
			$title 		      = '';
			$title_seo        = '';
			$descripcion_seo  = '';
			$keywords_seo 	  = '';
	
			include("../cabecera.php");
			include("../head.php");
			include("../header.php");
			
			include("../footer.php");
?>