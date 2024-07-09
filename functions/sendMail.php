<?php
function sendMail($to,$subject,$body,$smtpHost,$smtpPort,$smtpUsername,$smtpPassword,$smtpFrom,$smtpFromTitle)
{

	    require 'class.phpmailer.php';
	    $from       = $smtpFrom;
	    $title=$smtpFromTitle; 
        $mail       = new PHPMailer();
		$mail->CharSet = "UTF-8";
		$mail->Encoding = 'base64';
	    $mail->IsSMTP(true);            // use SMTP
	    $mail->IsHTML(true);
        //$mail->SMTPDebug  = 2;        // enables SMTP debug information (for testing)
	                                    // 1 = errors and messages
	                                 // 2 = messages only
	    $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    $mail->Host       = $smtpHost; // Amazon SES server, note "tls://" protocol
	    $mail->Port       = $smtpPort;                    // set the SMTP port
	    $mail->Username   = $smtpUsername;  // SES SMTP  username
	    $mail->Password   = $smtpPassword;  // SES SMTP password

	    $mail->SetFrom($from, $title);
	    $mail->AddReplyTo($from,$title);
	    $mail->Subject    = $subject;
	    $mail->MsgHTML($body);
	    $address = $to;
	    $mail->AddAddress($address, $to);

	   $mail->Send();

    }

?>
