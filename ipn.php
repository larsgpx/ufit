<?php
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Check to see there are posted variables coming into the script
if ($_SERVER['REQUEST_METHOD'] != "POST") die ("No Post Variables");
// Initialize the $req variable and add CMD key value pair
$req = 'cmd=_notify-validate';
// Read the post from PayPal
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}
// Now Post all of that back to PayPal's server using curl, and validate everything with PayPal
// We will use CURL instead of PHP for this for a more universally operable script (fsockopen has issues on some environments)
//$url = "https://www.paypal.com/cgi-bin/webscr";
$url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$curl_result = $curl_err = '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));
curl_setopt($ch, CURLOPT_HEADER , 0);   
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$curl_result = @curl_exec($ch);
$curl_err = curl_error($ch);
curl_close($ch);

$req = str_replace("&", "\n", $req);  // Make it a nice list in case we want to email it to ourselves for reporting

// Check that the result verifies
/*if (strpos($curl_result, "VERIFIED") !== false) {
    $req .= "\n\nPaypal Verified OK";
} else {
	$req .= "\n\nData NOT verified from Paypal!";
	mail("programador@netkrom.com", "IPN interaction not verified", "$req", "From: programador@netkrom.com" );
	exit();
}*/

/* CHECK THESE 4 THINGS BEFORE PROCESSING THE TRANSACTION, HANDLE THEM AS YOU WISH
1. Make sure that business email returned is your business email
2. Make sure that the transaction’s payment status is “completed”
3. Make sure there are no duplicate txn_id
4. Make sure the payment amount matches what you charge for items. (Defeat Price-Jacking) */
 
// Check Number 1 ------------------------------------------------------------------------------------------------------------
$receiver_email = $_POST['receiver_email'];
/*if ($receiver_email != "programador@netkrom.com") {
	$message = "Investigate why and how receiver email is wrong. Email = " . $_POST['receiver_email'] . "\n\n\n$req";
    mail("programador@netkrom.com", "Receiver Email is incorrect", $message, "From: programador@netkrom.com" );
    exit(); // exit script
}*/
// Check number 2 ------------------------------------------------------------------------------------------------------------
if ($_POST['payment_status'] != "Completed") {
	// Handle how you think you should if a payment is not complete yet, a few scenarios can cause a transaction to be incomplete
}
// Connect to database ------------------------------------------------------------------------------------------------------
mysql_connect("localhost","asesgrou_web","admin123") or die ("could not connect to mysql");
mysql_select_db("asesgrou_royalti") or die ("no database");  

// Check number 3 ------------------------------------------------------------------------------------------------------------
$this_txn = $_POST['txn_id'];
$sql = $db_Full->select_sql("SELECT id FROM tbl_pagos WHERE txn_id='$this_txn' LIMIT 1");
$numRows = mysqli_num_rows($sql);
if ($numRows > 0) 
{
	$sql2 = $db_Full->select_sql("SELECT * FROM tbl_pagos WHERE txn_id='$this_txn'  LIMIT 1");
    while($row2 = mysqli_fetch_array($sql2))
	{
		$db_Full->select_sql("UPDATE tbl_pagos set estado='".$_POST['payment_status']."' , fecha_cancelado='".$_POST['payment_date']."' where txn_id='$this_txn' ");
	}
	
    $message = "Duplicate transaction ID occured so we killed the IPN script. \n\n\n$req";
    mail("programador@netkrom.com", "Duplicate txn_id in the IPN system", $message, "From: programador@netkrom.com" );
    exit(); // exit script
} 
// Check number 4 ------------------------------------------------------------------------------------------------------------
$product_id_string = $_POST['custom'];
$product_id_string = rtrim($product_id_string,","); // remove last comma
// Explode the string, make it an array, then query all the prices out, add them up, and make sure they match the payment_gross amount
$id_str_array = explode(",", $product_id_string); // Uses Comma(,) as delimiter(break point)
$fullAmount = 0;
foreach ($id_str_array as $key => $value) {
    
	$id_quantity_pair = explode("-", $value); // Uses Hyphen(-) as delimiter to separate product ID from its quantity
	$product_id = $id_quantity_pair[0]; // Get the product ID
	$product_quantity = $id_quantity_pair[1]; // Get the quantity
	$sql = $db_Full->select_sql("SELECT precio_producto FROM tbl_productos WHERE id_producto='$product_id' LIMIT 1");
    while($row = mysqli_fetch_array($sql)){
		$product_price = $row["precio_producto"];
	}
	$product_price = $product_price * $product_quantity;
	$fullAmount = $fullAmount + $product_price;
}
$fullAmount = number_format($fullAmount*1 + $_POST['mc_handling']*1, 2);
$grossAmount = $_POST['mc_gross']; 
if ($fullAmount != $grossAmount) {
        $message = "Possible Price: " . $_POST['payment_gross'] . " != $fullAmount \n\n\n$req";
        mail("programador@netkrom.com", "Price Jack or Bad Programming", $message, "From: programador@netkrom.com" );
        exit(); // exit script
} 
// END ALL SECURITY CHECKS NOW IN THE DATABASE IT GOES ------------------------------------
////////////////////////////////////////////////////
// Homework - Examples of assigning local variables from the POST variables
$txn_id = $_POST['txn_id'];
$email_cliente = $_POST['payer_email'];
$datos_array = $_POST['custom'];
$fecha_pago = $_POST['payment_date'];
$total = $_POST['mc_gross'];
$estado = $_POST['payment_status'];
$comision = $_POST['mc_fee'];
$email_empresa=$receiver_email;

$mes=substr($_POST['payment_date'],9,3);

if($mes=="Jan"){ $mes="01";}
if($mes=="Feb"){ $mes="02";}
if($mes=="Mar"){ $mes="03";}
if($mes=="Apr"){ $mes="04";}
if($mes=="May"){ $mes="05";}
if($mes=="Jun"){ $mes="06";}
if($mes=="Jul"){ $mes="07";}
if($mes=="Aug"){ $mes="08";}
if($mes=="Sep"){ $mes="09";}
if($mes=="Oct"){ $mes="10";}
if($mes=="Nov"){ $mes="11";}
if($mes=="Dec"){ $mes="12";}

$dia=substr($_POST['payment_date'],13,2);
$anio=substr($_POST['payment_date'],17,4);

$orden_inicial="RY".$mes.$dia.$anio;

// Place the transaction into the database


$sql = $db_Full->select_sql("INSERT INTO tbl_pagos (id , datos_array , email_cliente , fecha_pago , total , estado , txn_id , email_empresa, comision , fecha_cancelado,orden) 
                                       VALUES('','$datos_array','$email_cliente','$fecha_pago','$total','$estado','$txn_id','$email_empresa','$comision' , '' , '$orden_inicial')") or die ("unable to execute the query");




$sql20 = $db_Full->select_sql("SELECT MAX(id) as maximo FROM tbl_pagos LIMIT 1");
    while($row20 = mysqli_fetch_array($sql20)){
		$orden = $row20["maximo"];
	}
	
$datos="Se realizó una venta web con el número de orden: RY".$mes.$dia.$anio."-".$orden;
	
mysql_close();
// Mail yourself the details
mail("programador@netkrom.com", "SE REALIZO UNA VENTA WEB", $req ."<br><br>".$datos , "From: programador@netkrom.com");

//mail("usa@distriwave.com", "SE REALIZO UNA VENTA WEB", $datos, "From: usa@distriwave.com");
?>