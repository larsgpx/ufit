<?php
function ObtenerNavegador($user_agent) {
     $navegadores = array(
          'Opera' => 'Opera',
          'MF'=> '(Firebird)|(Firefox)',
          'Galeon' => 'Galeon',
          'MyIE'=>'MyIE',
          'Lynx' => 'Lynx',
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
          'Konqueror'=>'Konqueror',
		  'GC'=>'Chrome',
		  'IE10' => '(MSIE 10\.[0-9]+)',
		  'IE9' => '(MSIE 9\.[0-9]+)',
          'IE8' => '(MSIE 8\.[0-9]+)',
		  'IE7' => '(MSIE 7\.[0-9]+)',
	);
	foreach($navegadores as $navegador=>$pattern){
		   if (eregi($pattern, $user_agent))
		   return $navegador;
		}
	return 'Desconocido';
}
function paginar($actual, $total, $por_pagina, $enlace){
   $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  if ($actual>1)
    $texto = "<a href=\"$enlace$anterior\">&laquo;</a>";
  else
    $texto = "<a href='#'>&laquo;</a>";
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  $texto   .= "<b>$actual</b>";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  if ($actual<$total_paginas)
    $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
  else
    $texto .= "<a href='#'>&raquo;</a>";
  return $texto;
}

function paginar_catalogo($actual, $total, $por_pagina, $enlace) {
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  	$texto = " " ;

	if ($actual>1)
   $texto .= '<a  class="scroll_left" href="'.$enlace.$anterior.'"><img src="aplication/webroot/imgs/arrow_previous.png"  alt="" /></a>';
  else
   $texto .= '<a class="scroll_left" href="#"><img src="aplication/webroot/imgs/arrow_previous.png"  alt="" /></a>';
		$texto .= " ";
  for ($i=1; $i<$actual; $i++)
    $texto .= " <a href=\"$enlace$i\">$i</a>  ";
  	$texto .= "<a id='active_paginado'>$actual</a> ";
 for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= " <a href=\"$enlace$i\">$i</a> ";
	$texto .= " ";
  if ($actual<$total_paginas)
    $texto .= '<a class="scroll_righ" href="'.$enlace.$posterior.'"><img src="aplication/webroot/imgs/arrow_next.png" alt="" /></a>';
  else
    $texto .= '<a class="scroll_righ" href="#"><img src="aplication/webroot/imgs/arrow_next.png" alt="" /></a>';

  return $texto;
}

function comillas_inteligentes($valor){
    // Retirar las barras
    if (get_magic_quotes_gpc()) {
        $valor = stripslashes($valor);
    }

    // Colocar comillas si no es entero
    if (!is_numeric($valor)) {
        $valor = "'" . mysql_real_escape_string($valor) . "'";
    }

	//utilizar con sprintf($consulta)
    return $valor;
}


function formato_date($comodin,$fecha){
	$nfecha=explode($comodin,$fecha);
	$dia=$nfecha[0];
	$mes=$nfecha[1];
	$a�o=$nfecha[2];
	$ufecha=$a�o."-".$mes."-".$dia;
	return $ufecha;
}
function formato_slash($comodin,$fecha){
	$nfecha=explode($comodin,$fecha);
	$dia=$nfecha[2];
	$mes=$nfecha[1];
	$a�o=$nfecha[0];
	$ufecha=$dia."/".$mes."/".$a�o;
	return $ufecha;
}

function send($text) {
    header("Content-type: text/html; charset=utf-8");
    echo utf8_encode($text);
}

function passcont($psw){
	$txt=strlen($psw);
	$txt1=substr($psw,0,3);
	$txt2=substr($psw,3,3);

}

function impSelect($tabla,$extra,$idd){
	$db_Full = new db_model();
	if($tabla == "provincias"){
		$cat = "departamento";
	}else if($tabla == "distritos"){
		$cat = "provincia";
	}

	$where=" WHERE id_$cat = '".$idd."' ";

	$sql="SELECT * FROM ".$tabla." ".$where ;
	$query = $db_Full->select_sql($sql);

	$retur = "";
	$retur.= '<select name = "'.$tabla.'" '.$extra.'   >
		<option value="">Seleccionar... </option>';
		while($row = mysql_fetch_array($query)){
			$retur .= " <option value='".$row[0]."' > ".$row[2]." ";
		}
		//$retur.= $nuevo_valor;
	$retur .= "</select>";
	// echo  $retur;
	echo $retur ;
}

function passencode($password){
	$newpass = ( md5($password) . '&' . strrev(strlen($password))  );
	return $newpass;
}

function passdecode($password ){
	$newpass = strrev($password);
	$newpass = explode('&', $newpass);
	$newpass = $newpass[0];
	return $newpass;
}

function encriptar($valor){
	$cad=strlen($valor);
	$subcad=ceil($cad/2);
	$prev_valor=substr(strrev($valor),0,$subcad);
	$next_valor=substr(strrev($valor),$subcad,$cad);
	$pcad=$cad*647667904564;
	$pass=$pcad.'|'.$prev_valor.'$'.$subcad.'|'.$next_valor.'$w3809245n0t9';
	return str_replace("'","?",$pass);
}

function desencriptar($valor){
	$cad=strlen($valor);
	$subcad=ceil($cad/2);
	$new_valor=explode("|",$valor);

	$pvalor=explode("$",$new_valor[1]);
	$prev_valor=$pvalor[0];

	$nvalor=explode("$",$new_valor[2]);
	$next_valor=$nvalor[0];

	$pass=strrev($prev_valor.$next_valor);
	return str_replace('?',"'",$pass);
}
function in_multi_array($needle, $haystack)
{
    $in_multi_array = false;
    if(in_array($needle, $haystack))
    {
        $in_multi_array = true;
    }
    else
    {
        for($i = 0; $i < sizeof($haystack); $i++)
        {
            if(is_array($haystack[$i]))
            {
                if(in_multi_array($needle, $haystack[$i]))
                {
                    $in_multi_array = true;
                    break;
                }
            }
        }
    }
    return $in_multi_array;
}

function encode_json($array){
	$array_claves = array_keys($array);
	$filas = count($array, COUNT_RECURSIVE);
	$filas_array = count($array);
	if($filas == 0 or $filas == "")
		return false;
	else{
		if($filas>$filas_array){
			$coma = "";
			for($j=0; $j<$filas_array; $j++){
				$array_claves = array_keys($array[$j]);
				$filas = count($array[$j]);
				$array_array = $array[$j];
				$vector = $vector . $coma .recuperar_array($array_claves,$filas,$array_array);
				$coma=", ";
			}
			$vector = '['.$vector.']';
			return $vector;
		}
		else
		{
		$vector = recuperar_array($array_claves,$filas,$array);
		}
	}
}

function recuperar_array($array_claves,$filas,$array){
	for($i=0; $i<$filas; $i++){
		$coma=", ";
		if(($i+1)==$filas)
		$coma="";
		$vector= $vector . '"' . $array_claves[$i] . '":"' . eregi_replace("[\n|\r|\n\r]", ' ', utf8_encode($array[$array_claves[$i]])). '"' . $coma;
	}
	$vector="{".$vector."}";
	return $vector;
}
function Month($fecha){
	$nfecha = explode("-",$fecha);
	$dia = $nfecha[2];
	$mes = $nfecha[1];
	$ano = $nfecha[0];
	$meses = array('01' => 'Enero','02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
	return  $meses[$mes]." ".$ano;
}
function fecha_long($fecha){
	$nfecha = explode("-",$fecha);
	$dia = $nfecha[2];
	$mes = $nfecha[1];
	$ano = $nfecha[0];
	$meses = array('01' => 'Enero','02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
	return  $dia." de ".$meses[$mes]." del ".$ano;
}
function ext($archivo) {
	$trozos = explode("." , $archivo);
	$ext = $trozos[ count($trozos) - 1];
	return (string) $ext;
}

function formatVideo($video, $w, $h){
	$nvideo = str_replace('width="640" height="385"','width="'.$w.'" height="'.$h.'"',$video);
	$nvideo = str_replace('width="560" height="340"','width="'.$w.'" height="'.$h.'"',$nvideo);
	$nvideo = str_replace('width="480" height="385"','width="'.$w.'" height="'.$h.'"',$nvideo);
	$nvideo = str_replace('allowfullscreen="true"','allowfullscreen="true" wmode="transparent"',$nvideo);
	return $nvideo;
}
function validateUser($id){
	$objca  = new ClienteAdmin($id);
	$plan = $objca->__get("_planes");

	if($plan[0]['estado'] == 0){
		return FALSE;
	}else{
		return TRUE;
	}
}

function aumentarMonth($desde, $cant){
	$fecha = $desde;
	return date("Y-m-d", strtotime("$fecha +".$cant." month"));
}

function updateEstatus(){
	$query = $db_Full->select_sql("SELECT * FROM clientes_planes WHERE fecha_finaliza < '".date("Y-m-d")."'");
	while($row = mysqli_fetch_assoc($query)){
		$queryU = $db_Full->select_sql("UPDATE clientes_planes SET estado = '0'
										WHERE id_cliente_plan = '".$row['id_cliente_plan']."'");
	}
}

function inCategories($id_cat=0){

	$sql = "SELECT * FROM categorias c, categorias_idiomas ci
					WHERE c.id_categoria = ci.id_categoria
					AND  ci.id_idioma = '".ID_IDIOMA."' ORDER BY c.id_categoria";

	$query = $db_Full->select_sql($sql);

	while($row = mysqli_fetch_assoc($query)){
		$data[$row['id_categoria']] = array("parent_id" => $row['id_parent'], "name" => $row['nombre_categoria']);
	}
	$array   = $data;

	return createTree($array,$id_cat);
}

function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
	foreach ($array as $categoryId => $category) {
		if ($currentParent == $category['parent_id']) {

			return $categoryId.",";

			if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
			$currLevel++;
			createTree ($array, $categoryId, $currLevel, $prevLevel);
			$currLevel--;
		}
	}
}


function getUrlActual(){
	$numero  = count($_GET);
	$tags 	 = array_keys($_GET);
	$valores = array_values($_GET);

	for($i=0;$i<$numero;$i++){
			$cad .=$tags[$i]."=".$valores[$i]."&";
	}
	$url = ($cad == '') ? basename($_SERVER['PHP_SELF']) : basename($_SERVER['PHP_SELF']).'?'.substr($cad,0,strlen($cad)-1);
	return $url;
}

function location($url)
{
	echo '<script type="text/javascript">location.href="'.$url.'";</script>';
}

function get_uid_producto($prid, $params){
	$uprid = $prid;
	if ( (is_array($params)) && (!strstr($prid, '{')) ) {
		while (list($option, $value) = each($params)){
			$uprid = $uprid . '{' .$option . '}' . $value;
		}
	}
	return $uprid;
}

function get_id_producto($uprid) {
    $pieces = explode('{', $uprid);

    return $pieces[0];
}

function diaNumLetras($dia)
{
	switch($dia)
	{
		case '0': return 'Domingo';break;
		case '1': return 'Lunes';break;
		case '2': return 'Martes';break;
		case '3': return 'Miercoles';break;
		case '4': return 'Jueves';break;
		case '5': return 'Viernes';break;
		case '6': return 'Sabado';break;
	}
}
function mesChange($mes)
{
	switch($mes)
	{
		case 'Ene,': return '01';break;
		case 'Feb,': return '02';break;
		case 'Mar,': return '03';break;
		case 'Abr,': return '04';break;
		case 'May,': return '05';break;
		case 'Jun,': return '06';break;
		case 'Jul,': return '07';break;
		case 'Ago,': return '08';break;
		case 'Sep,': return '09';break;
		case 'Oct,': return '10';break;
		case 'Nov,': return '11';break;
		case 'Dic,': return '12';break;
	}
}
function mesletrasmin($mes)
{
	switch($mes)
	{
		case '01': return 'Ene';break;
		case '02': return 'Feb';break;
		case '03': return 'Mar';break;
		case '04': return 'Abr';break;
		case '05': return 'May';break;
		case '06': return 'Jun';break;
		case '07': return 'Jul';break;
		case '08': return 'Ago';break;
		case '09': return 'Sep';break;
		case '10': return 'Oct';break;
		case '11': return 'Nov';break;
		case '12': return 'Dic';break;
	}
}
function mesletras($mes)
{
	switch($mes)
	{
		case '01': return 'Enero';break;
		case '02': return 'Febrero';break;
		case '03': return 'Marzo';break;
		case '04': return 'Abril';break;
		case '05': return 'Mayo';break;
		case '06': return 'Junio';break;
		case '07': return 'Julio';break;
		case '08': return 'Agosto';break;
		case '09': return 'Septiembre';break;
		case '10': return 'Octubre';break;
		case '11': return 'Noviembre';break;
		case '12': return 'Diciembre';break;
	}
}
function diaLetras($dia){
	switch($dia)
	{
		case 'Sun': return 'Dom.';break;
		case 'Mon': return 'Lun.';break;
		case 'Tue': return 'Mar.';break;
		case 'Wed': return 'Mie.';break;
		case 'Thu': return 'Jue.';break;
		case 'Fri': return 'Vie.';break;
		case 'Sat': return 'Sab.';break;
	}
}
function verificarActivo($url)
{
	if($url == basename($_SERVER['PHP_SELF']))
		echo 'id="activa"';
}
function convert($fecha)
{
	list($a,$b,$c,$d) = explode(" ",$fecha);
	return diaLetras($a)." ".$b." de ".mesletras($c)." $d";
}
/************************************************************************/
function fecha_natural($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return diaNumLetras($w)." ".$d." de ".mesletras($m)." del ".$a."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora:".$h.":".$n." ".$t;
}
function fecha_nat($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return diaNumLetras($w)." ".$d." de ".mesletras($m)." del ".$a;
}
function fecha_natural_min($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return substr(diaNumLetras($w),0,3)." ".$d." de ".substr(mesletras($m),0,3)." del ".$a."<br>Hora: ".$h.":".$n." ".$t;
}
function fecha_natural_mini($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return substr(diaNumLetras($w),0,3)." ".$d.", ".substr(mesletras($m),0,3)." - ".$a."<br>Hora: ".$h.":".$n." ".$t;
}
function fecha_natural_mini_lineal($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return substr(diaNumLetras($w),0,3)." ".$d.", ".substr(mesletras($m),0,3)." - ".$a.", ".str_pad($h,2,"0",STR_PAD_LEFT).":".$n." ".$t;
}
function fecha_natural_mini_lineal2($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return substr(diaNumLetras($w),0,3)." ".$d.", ".substr(mesletras($m),0,3);
}

function fecha_natural_mini_lineal3($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return substr(diaNumLetras($w),0,3)." ".$d.", ".substr(mesletras($m),0,3)." - ".$a;
}

function fecha_natural_mini_lineal4($data)
{
	//20-09-2011-11-00-PM
	list($d,$m,$a,$h,$n,$t) = explode("-",$data);
	return $d."  ".substr(mesletras($m),0,3).",  ".$a;
}

function fecha_natural_mini_lineal5($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return $d." de ".mesletras($m)." del ".$a;
	//23 de Marzo del 2013
}

function fecha_natural_mini_lineal6($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return $d." - ".mesletrasmin($m)." - ".$h.":".$n." ".$t;
	//23 - Marzo - 11:00 pm
}

function fecha_natural_mini_lineal7($data)
{
	//2-20-09-2011-11-00-PM
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$data);
	return $d." ".substr(mesletras($m),0,3)." - ".$a;
}


function getdates($date)
{
	list($w,$d,$m,$a,$h,$n,$t) = explode("-",$date);
	return diaNumLetras($w)."-".mesletras($m)."-".$d;
}

function hora_real($time)
{
	list($h,$m,$s) = explode(":",$time);
	return ($h>12 ? $h-12 : $h).":".$m." ".($h>=12 ? 'PM' : 'AM');
}

function darFormatoFecha($fechain)//2011-09-20 23:00:35
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
	list($a,$m,$d) =  explode("-",$fecha);
	list($h,$n)=explode(":",$hora);
	$t = "AM";
	if($h > 12)
	{
		$h = $h-12;
		$t = "PM";
	}
	if($h==12)
		$t = "PM";
	return fecha_natural_mini_lineal($w."-".$d."-".$m."-".$a."-".$h."-".$n."-".$t);
}

function darFormatoFecha2($fechain)// Sab 29, Dic
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
	list($a,$m,$d) =  explode("-",$fecha);
	list($h,$n)=explode(":",$hora);
	$t = "AM";
	if($h>12)
	{
		$h = $h-12;
		$t = "PM";
	}
	return fecha_natural_mini_lineal2($w."-".$d."-".$m."-".$a."-".$h."-".$n."-".$t);
}

function darFormatoFecha3($fechain)// 01 Abr, 2013
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) );
	list($a,$m,$d) =  explode("-",$fecha);
	// list($h,$n)=explode(":",$hora);
	// $t = "AM";
	// if($h > 12)
	// {
	// 	$h = $h-12;
	// 	$t = "PM";
	// }
	// if($h==12)
	// 	$t = "PM";
	return fecha_natural_mini_lineal3($w."-".$d."-".$m."-".$a);
}


function darFormatoFecha4($fechain) // Sab 29, Dic - 2012
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) );
	list($a,$m,$d) =  explode("-",$fecha);

	return fecha_natural_mini_lineal4($d."-".$m."-".$a);
}

function darFormatoFecha5($fechain) // 23 de Marzo del 2013
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) );
	list($a,$m,$d) =  explode("-",$fecha);

	return fecha_natural_mini_lineal5($w."-".$d."-".$m."-".$a);
}



function darFormatoFecha6($fechain) // 23 - Marzo - 11:00 pm
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
	list($a,$m,$d) =  explode("-",$fecha);
	list($h,$n)=explode(":",$hora);
	$t = "am";
	if($h>12)
	{
		$h = $h-12;
		$t = "pm";
	}
	return fecha_natural_mini_lineal6($w."-".$d."-".$m."-".$a."-".$h."-".$n."-".$t);
}

function darFormatoFecha7($fechain)// 01 Abr - 2013
{
	list($fecha,$hora) = explode(" ",$fechain);
	$i = strtotime($fecha);
	$w = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) );
	list($a,$m,$d) =  explode("-",$fecha);
	return fecha_natural_mini_lineal7($w."-".$d."-".$m."-".$a);
}


//mes

function getUltimoDiaMes($elAnio,$elMes) {
  return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
}

function getUltimoDiaMesActual() {
       return date("d",(mktime(0,0,0,date('m')+1,1,date('Y'))-1));
}

function fechaprimerdiadelmesActual(){
	return   date('Y')."-".date('m')."-01";
}

function fechaultimodiadelmesActual(){
	return   date('Y')."-".date('m')."-".getUltimoDiaMesActual();
}



?>