<?php

function base_url_uri_model()
{
	  $urk   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/';
	  $url   = explode('/', $urk);
	  $uri_f = '';

	  for ($i = count($url)-1; $i > 0 ; $i--) { 
	  	if($url[$i] != ''){$uri_f = $url[$i];break;}
	  }

	  $url_a = substr($urk,0,strlen($urk)-(strlen($uri_f)+1));

	  return ($uri_f == 'controller') ? $url_a : $urk;
}

function base_url_model()
{

	$port = ($_SERVER['SERVER_PORT'] == 80) ? '' : ':'.$_SERVER['SERVER_PORT'] ;	
	  //$url  = array();
	  $urk = sprintf(
	    "%s://%s%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    isset($_SERVER['SERVER_PORT'])? $_SERVER['SERVER_NAME'].$port : $_SERVER['SERVER_NAME'],
	    rtrim(base_url_uri_model(), '/\\')
	  );

	  $url   = explode('/', $urk);
	  $uri_f = '';

	  for ($i = count($url)-1; $i > 0 ; $i--) { 
	  	if($url[$i] != ''){$uri_f = $url[$i];break;}
	  }

	  $url_a = substr($urk,0,strlen($urk)-strlen($url[count($url)-1]));
	  //$url_a = substr($urk,0,strlen($urk)-(strlen($uri_f)+1));
	  return ($url[count($url)-1] == 'controller') ? $url_a : $urk.'/';
}

	$base_url = base_url_model();
	/*include("../config/config.php");
	global $database_name;
	global $database_user;
	global $database_clave;
	global $database_host;

	$database_name  = $config['database_name'];
	$database_clave = $config['database_clave'];
	$database_user  = $config['database_user'];
	$database_host  = $config['database_host'];*/

	class db_model{
		protected $conexion;
	    protected $db;
	    public $link_base_datos;

	    // public function conectar($host='localhost',$user='asesper_royal',$clave='r4_T@1*.*=f',$db='asesper_royalty')
	    public function conectar($host='localhost',$user='root',$clave='',$db='royalty_web')
	    {	
	    	/*global $database_name; asesgrou_royalty_oficial   royalty2016
asesgrou_oficial
			global $database_user;  
			global $database_clave;
			global $database_host;

	    	$db     = ($database_name != '')  ? $database_name  : '';
	    	$user   = ($database_user != '')  ? $database_user  : '';
	    	$clave  = ($database_clave != '') ? $database_clave : '';
	    	$host   = ($database_host != '')  ? $database_host  : '';*/

	        $this->link_base_datos = mysqli_connect($host, $user, $clave,$db);
	        mysqli_set_charset($this->link_base_datos,"utf8");
	        //return $this->link;
	    }
	 
	    public function desconectar()
	    { mysqli_close($this->link_base_datos);
	    }
	    public function file_upload($file,$destino = 'aplication/webroot/archivos/'){
	    	//print_r($file);exit;
	    	if($file['name'] != "")
			{
					$name1 = strtolower(date("ymdhis").$file['name']);
					$temp1 = $file['tmp_name'];
					$ext1 = end(explode(".", $name1));
					$type1 = $file['type'];
					$size1 = $file['size'];
					move_uploaded_file($temp1,$destino.$name1);
					$name_pfd1= explode(".",$name1);
					return true;
			}
			else{
				return false;
			}
	    }
	    public function start(){
	    	mysqli_query($this->link_base_datos,"START TRANSACTION");
	    }
	    public function NumeroRegistros($op){
	    	return mysqli_num_rows($op);
	    }
	    public function select_sql($sql,$r=''){
	    	$query = mysqli_query($this->link_base_datos,$sql);
	    	//$this->desconectar();
	    	return $query;
	    }


		public function insert_table($tabla,$data){
			//$link=$this->conectar();
			if($tabla!='' && count($data)){
				$insert = 'insert into '.$tabla.' (';
				$i=0; $campos =''; $valor='';
				foreach ($data as $key => $value) {
					if(0 < $i){
						$campos .= ',';
						$valor .= ',';
					}
					$i++;
					$campos .= $key;
					if(is_numeric($value)){$valor .= $value;}
					else{$valor .= "'".$value."'";}
					
				}
				$insert .= $campos.') values(';
				$insert .= $valor.')';
				
				$query = mysqli_query($this->link_base_datos,$insert);
				//print_r($insert); //exit;
				if($query){
					return mysqli_insert_id($this->link_base_datos);
				}
				else{
					return false;
				}
			}
			else{
					return false;
				}
		}

		public function insert_batch($tabla,$data2){
			if($tabla!='' && count($data2)){ $insert='';
				foreach ($data2 as $keey => $data) {
					$insert .= 'insert into '.$tabla.' (';
					$i = 0; $campos =''; $valor='';
					foreach ($data as $key => $value) {
						if(0 < $i){
							$campos .= ',';
							$valor .= ',';
						}
						$i++;
						$campos .= $key;
						if(is_numeric($value)){$valor .= $value;}
						else{$valor .= "'".$value."'";}
						
					}
					$insert .= $campos.') values(';
					$insert .= $valor.'); ';
				}
					//print_r($insert);
				$query = mysqli_multi_query($this->link_base_datos,$insert);
				//var_dump($query);	
				if($query){
						return true;
				}
				else{
						return false;
				}
			}
			else{
					return false;
				}
		}
		public function update_batch($tabla,$data,$where){
			if($tabla != '' && count($data)){
				$update = 'update '.$tabla.' set ';
				$total  = count($data);
				$z      = 0;

				foreach ($data as $key2 => $data2) { $j = 0; $i = 0; $z ++;
					foreach ($data2 as $key => $value) {
						
						$update .= $key;   //echo $key; exit;
						$update .= ' = (CASE '; 
						foreach ($value as $id => $v) {  $r[$i] = $v; $i++;}

							foreach ($where as $id_table => $vwhere) {
								//if($tmp == 0){
									$update .= ' WHEN '; $f = 0;
									foreach ($vwhere as $val_w) {
										//if(isset($r[$j])){
											if($f != 0){$update .= ' WHEN ';}
											$update .= $id_table.' = '.$val_w;
											$update .= (is_numeric($r[$j])) ?' THEN '.$r[$j].' ' :' THEN "'.$r[$j].'" ' ;
											$f++; $j++;
										//}
										
									}
									$update .=' END) ';
								//}
								
							} 
						
						if($z < $total){$update .=', ';}
					}
				}	
				$update.=' where '; $i=0;
				foreach ($where as $key => $value) {
					$update.=$key.' in (';
					foreach ($value as $k => $v) {
						if(0 < $i){
							$update .= ' , ';
						}
						$update .= $v;
						$i++;
					}
				}
				$update.=')'; //echo $update;

				$query = mysqli_query($this->link_base_datos,$update);

				if($query){
					return true;
				}
				else{
					return false;
				}
			}
			else{
					return false;
				}
		}
		public function update_table($tabla,$data,$where){
			if($tabla!='' && count($data)){
				$update = 'update '.$tabla.' set ';
				$i=0; 
				foreach ($data as $key => $value) {
					if(0<$i){
						$update .= ',';
					}
					$i++;
					$update .= $key; $update .='=';
					if(is_numeric($value)){$update .= $value;}
					else{$update .= "'".$value."'";}
					
				}
				$update.=' where '; $i=0;
				foreach ($where as $key => $value) {
					if(0 < $i){
						$update.=' and ';
					}
					$update.=$key.'='.$value;
					$i++;
				}
				//print_r($update); 
				$query = mysqli_query($this->link_base_datos,$update);

				if($query){
					return true;
				}
				else{
					return false;
				}
			}
			else{
					return false;
				}
		}
		public function commit(){
			mysqli_query($this->link_base_datos,"COMMIT");
		}
		public function rollback(){
			mysqli_query($this->link_base_datos,"ROLLBACK");
		}
	}
?>