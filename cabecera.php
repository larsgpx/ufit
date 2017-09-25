<?php
/*
if($id_page_table!="")
{
	$contador="0";


	if( isset( $_COOKIE['cookie_productos_3'] ) ) 
	{
		foreach($_COOKIE['cookie_productos_3'] as $name => $value)
		{
		  $contador++;
		}
		
		if($contador>0)
		{
			foreach ($_COOKIE['cookie_productos_3'] as $name => $value) 
		    {
		        $name = htmlspecialchars($name);
		        $value = htmlspecialchars($value);
		       // echo  $value;
		        if($value!=$id_page_table)
		        {
		        	//setcookie("cookie_productos_3[".$id_page_table."]", $id_page_table , time()+1200);	
		        }
		    }
		}

	}else
	{
	    //setcookie("cookie_productos_3[".$id_page_table."]", $id_page_table ,time()+1200);	
	}

	
}*/
      session_start();
	  require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
	  $detect = new Mobile_Detect;

	  $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	  //include_once("conexion.php");
	?>

	<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title?></title>
	<meta name="title" content="<?php echo ($title_seo == '') ? $title : $title_seo?>" />
	<meta name="description" content="<?php echo $descripcion_seo?>" />
	<meta name="og:image" content="<?php echo $BASE_URL?>images/cabecera_email.jpg" />
	<meta name="keywords" content="<?php echo $keywords_seo?>" />
	<link rel="shortcut icon" href="<?php echo $BASE_URL?>images/favicon.ico" type="image/x-icon" />	