<?php 
/*include_once 'functions/config.php';
include_once 'functions/user.php';
$Dot = new DOT_USER($db);  
require_once 'functions/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer; 
$reset_mail = 'socialmaterial@hotmail.com';  
$GetForgotKey = md5(time());
	 $GetScriptInfo = $Dot->Dot_Configurations();
	 $scriptName = $GetScriptInfo['script_title'];
	 $scriptLogo = $GetScriptInfo['script_logo']; 
	 $smtpHost = $GetScriptInfo['smtp_host']; 
	 $smtpUsername = $GetScriptInfo['smtp_username']; 
	 $smtpPassword = $GetScriptInfo['smtp_password']; 
	 $smtpPort = $GetScriptInfo['smtp_port']; 
	 $smtpFrom = $GetScriptInfo['smtp_username'];
	 $smtpOrMailServer = $GetScriptInfo['smtp_or_mail_server'];
	 $tlsOrssl = $GetScriptInfo['tls_or_ssl'];
	 $newpassword_url=$base_url.'reset?id='.$GetForgotKey;  
     $subject =''.$scriptName.' Password'; 
		if($smtpOrMailServer == 'mail'){
		$mail->IsMail();
		}else if($smtpOrMailServer == 'smtp'){
		$mail->isSMTP();
		$mail->Host          = $smtpHost; // Specify main and backup SMTP servers
		$mail->SMTPAuth      = true;
		$mail->SMTPKeepAlive = true;
		$mail->Username      = $smtpUsername; // SMTP username
		$mail->Password      = $smtpPassword; // SMTP password
		$mail->SMTPSecure    = $tlsOrssl; // Enable TLS encryption, `ssl` also accepted
		$mail->Port          = $smtpPort;
		$mail->SMTPOptions   = array(
		 'ssl' => array(
			 'verify_peer' => false,
			 'verify_peer_name' => false,
			 'allow_self_signed' => true
		 )
		);
		}else {
		return false;
		}
		
		$mail->setFrom($smtpUsername, $scriptName);
		$send          = false;
		$mail->CharSet = 'utf-8'; 
		$mail->addAddress($reset_mail);
		$mail->Subject = $subject ;
		$mail->MsgHTML("<div style='width:100%; border-radius:3px; -webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;background-color:#fafafa; text-align:center; padding:50px 0px;overflow:hidden;'>
				  <div style='width:100%;max-width:600px;border: 1px solid #e6e6e6;margin:0px auto;background-color:#ffffff;padding:30px;border-radius:3px;-webkit-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;'>
					<div style='width:100%;max-width:100px;margin:0px auto;overflow:hidden;margin-bottom:30px;'><img src='".$base_url.'uploads/logo/'.$scriptLogo."' style='width:100%;overflow:hidden;'/></div>
				  <div style='width:100%;position:relative;display:inline-block;padding-bottom:10px;'> <strong>Forgot your Password ?</strong> reset it below:</div>
				  <div style='width:100%;position:relative;padding:10px;background-color:#20B91A;max-width:350px;margin:0px auto; color:#ffffff !important;'>
					<a href='".$newpassword_url."' style='text-decoration:none; color:#ffffff !important;font-weight:500;font-size:18px;position:relative;'>Reset Password</a> 
				  </div>
				  </div>
				</div>");
		$mail->IsHTML(true);
		$send = $mail->send();
		$mail->ClearAddresses(); 
	 echo 'sended'; */
$news = simplexml_load_file('https://news.google.com/news?pz=1&cf=all&ned=en&hl=en&topic=n&output=rss');

$feeds = array();

$i = 0;

foreach ($news->channel->item as $item) 
{
	preg_match('~<img[^>]*src\s?=\s?[\'"]([^\'"]*)~i',$item->description, $imageurl);
    //preg_match('@src="([^"]+)"@', $item->description, $imageurl);   
    $parts = explode('<font size="-1">', $item->description);

    $feeds[$i]['title'] = (string) $item->title;
    $feeds[$i]['link'] = (string) $item->link;
    $feeds[$i]['image'] = $imageurl[1];
    $feeds[$i]['site_title'] = strip_tags($parts[1]);
    $feeds[$i]['story'] = strip_tags($parts[2]);
 

    $i++;
}

echo '<pre>';
print_r($feeds);
echo '</pre>';
 
?>