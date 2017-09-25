<?php
		function urls_amigables($url) {
		// Tranformamos todo a minusculas
		$url = strtolower($url);
		//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		return $url;

		}

		if (empty($_FILES) || $_FILES['file']['error']) {
		    die('{"OK": 0, "info": "Failed to move uploaded file."}');
		}
		$hoy       = getdate();
		$fecha     = $hoy['mday'].'-'.$hoy['mon'].'-'.$hoy['year'].'-'.$hoy['hours'].'-'.$hoy['minutes'].'-'.$hoy['seconds'].'-';
		$chunk     = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks    = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		$name_file = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
		$file_extn = explode(".", strtolower($name_file));
		$fileName  = $fecha.urls_amigables($_REQUEST["name"]).'.'.$file_extn[1];
		$filePath  = "../../webroot/archivos/$fileName";

		$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
		if ($out) {
		    // Read binary input stream and append it to temp file
		    $in = @fopen($_FILES['file']['tmp_name'], "rb");

		    if ($in) {
		        while ($buff = fread($in, 4096))
		            fwrite($out, $buff);
		    } else
		        die('{"OK": 0, "info": "Failed to open input stream."}');

		    @fclose($in);
		    @fclose($out);

		    @unlink($_FILES['file']['tmp_name']);
		} else
		    die('{"OK": 0, "info": "Failed to open output stream."}');

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
		    // Strip the temp .part suffix off 
		    rename("{$filePath}.part", $filePath);
		}

		die('{"OK": 1, "info": "Upload successful.","file":"'.$fileName.'"}');
?>