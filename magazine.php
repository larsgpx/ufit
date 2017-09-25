<?php 
//include("inc.aplication_top.php");
session_start();
require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<?php
include("head.php");
include("header.php");
?>


<!--FOTOS MAGAZINE-->

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="30"></td></tr>
<tr>
<td class="fuente_georgia font_size28" align="center">MAGAZINE UFIT</td>
</tr
><tr><td height="20"></td></tr>
</table>

<?php

include("admin/aplication/modelo/modelo_base_datos.php");
$db_Full = new db_model();
$db_Full->conectar();

		$result100=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=13  ");
		$data100=mysqli_fetch_assoc($result100);
		$foto1 = $data100['foto1_ma'];
		$titulo1 = $data100['titulo_ma'];
		
		$result101=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=12 ");
		$data101=mysqli_fetch_assoc($result101);
		$foto2 = $data101['foto1_ma'];
		$titulo2 = $data101['titulo_ma'];
		
		$result102=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=10 ");
		$data102=mysqli_fetch_assoc($result102);
		$foto3 = $data102['foto1_ma'];
		$titulo3 = $data102['titulo_ma'];
		
		$result103=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=14 ");
		$data103=mysqli_fetch_assoc($result103);
		$foto4 = $data103['foto1_ma'];
		$titulo4 = $data103['titulo_ma'];
		
		$result104=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=17 ");
		$data104=mysqli_fetch_assoc($result104);
		$foto5 = $data104['foto1_ma'];
		$titulo5 = $data104['titulo_ma'];
		
		$result105=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=15 ");
		$data105=mysqli_fetch_assoc($result105);
		$foto6 = $data105['foto1_ma'];
		$titulo6 = $data105['titulo_ma'];
		
		$result106=$db_Full->select_sql("SELECT foto1_ma,titulo_ma FROM tbl_magazines where id_ma=18 ");
		$data106=mysqli_fetch_assoc($result106);
		$foto7 = $data106['foto1_ma'];
		$titulo7 = $data106['titulo_ma'];
?>



<!-- Contenido nuevo -->
<section id="catalogo">
	<div class="container">
		<div class="row">
			<h2 class="text-center fuente_georgia font_size28 title-uppercase">Catálogo</h2>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6 padding-as">
						<a href="catalogo-13-<?php echo str_replace(' ','-',strtolower($titulo1)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto1; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
					<div class="col-sm-6 padding-as">
						<a href="catalogo-12-<?php echo str_replace(' ','-',strtolower($titulo2)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto2; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="height-10"></div>
				</div>
				<div class="row">
					<div class="col-sm-6 padding-as">
						<a href="catalogo-14-<?php echo str_replace(' ','-',strtolower($titulo4)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto4; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
					<div class="col-sm-6 padding-as">
						<a href="catalogo-17-<?php echo str_replace(' ','-',strtolower($titulo5)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto5; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="height-10"></div>
				</div>
				<div class="row">
					<div class="col-sm-12 padding-as">
						<a href="catalogo-18-<?php echo str_replace(' ','-',strtolower($titulo7)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto7; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12 padding-as">
						<a href="catalogo-10-<?php echo str_replace(' ','-',strtolower($titulo3)); ?>">
							<div  style="width: 100%; height:220px; background-image: url(webroot/archivos/<?php echo $foto3; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="height-10"></div>
				</div>
				<div class="row">
					<div class="col-sm-12 padding-as">
						<a href="catalogo-15-<?php echo str_replace(' ','-',strtolower($titulo6)); ?>">
							<div  style="width: 100%; height:450px; background-image: url(webroot/archivos/<?php echo $foto6; ?>); background-size: cover; background-position: center;"></div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="30"></td></tr>
</table>
<!--FIN MAGAZINE-->

<!--FOOTER-->
<?php
include("footer.php");
?>


</body>    
</html>
