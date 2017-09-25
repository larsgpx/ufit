<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require 'PHPMailer/PHPMailerAutoload.php';

/*
$contenido = file_get_contents('no.html');

//Enviando
$headers = ("Content-type: text/html; charset=iso-8859-1\r\n");
$headers .= "From: Royalty.com <no-reply@royalty.pe>\r\n";
//$headers .= 'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
$headers .= "Date: Thu, 10 May 2016 09:39:23 -0500";

$variable = mail('james.otiniano@gmail.com' ,'no', $contenido, $headers);

    if ($variable)
    echo "enviado";
exit;*/




//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('carolina@joinnus.com', 'Carolina Botto');
//Set an alternative reply-to address
$mail->addReplyTo('carolina@joinnus.com', 'Carolina Botto');
//Set who the message is to be sent to
$mail->addAddress('james.otiniano@gmail.com', 'James Otiniano');
    
//Set the subject line
$mail->Subject = 'Info PayU Latam';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('no.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'Info PayU Latam';
    
$mail->MessageDate = 'Thu, 11 Apr 2016 14:39:23 -0500';
    
$mail->RfcDate = 'Thu, 11 Apr 2016 14:39:23 -0500';
    
//Attach an image file
$mail->addAttachment('PresentacionPayU_Wayra.pdf');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
