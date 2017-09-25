<?php
        /**
         * This example shows making an SMTP connection with authentication.
         */
        
        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        
        require 'PHPMailer/PHPMailerAutoload.php';
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "smtp.gmail.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 587;
    
    $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "james.otiniano@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "Camil@3020Rod@";
        //Set who the message is to be sent from
        $mail->setFrom('james.otiniano@gmail.com', 'James Otiniano');
        //Set an alternative reply-to address
        $mail->addReplyTo('james.otiniano@gmail.com', 'James Otiniano');
        //Set who the message is to be sent to
        $mail->addAddress('nazartj@gmail.com', 'Nazart Jara');
        //Set the subject line
        $mail->Subject = '[Freelo] E-Learning bugs';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML(file_get_contents('no3.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
    
    
    $mail->MessageDate = 'Thu, 12 Apr 2016 22:44:10 -0500';
    
    $mail->RfcDate = 'Thu, 12 Apr 2016 22:44:10 -0500';
    
        //Attach an image file
        $fileName = "Captura de pantalla 2016-04-12 a las 10.15.40 p.m.";
        $mail->addAttachment($fileName . ".png");
    
    $fileName = "Captura de pantalla 2016-04-12 a las 10.19.06 p.m.";
    $mail->addAttachment($fileName . ".png");
    
    $fileName = "Captura de pantalla 2016-04-12 a las 10.19.33 p.m.";
    $mail->addAttachment($fileName . ".png");
    
    $fileName = "Captura de pantalla 2016-04-12 a las 10.27.57 p.m.";
    $mail->addAttachment($fileName . ".png");
    $fileName = "Captura de pantalla 2016-04-12 a las 10.28.26 p.m.";
    $mail->addAttachment($fileName . ".png");
    
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }

    
