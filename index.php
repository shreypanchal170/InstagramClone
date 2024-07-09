<?php 
// +------------------------------------------------------------------------+
// | @author Mustafa Öztürk (mstfoztrk)
// | @author_url 1: http://www.duhovit.com
// | @author_url 2: http://codecanyon.net/user/mstfoztrk
// | @author_email: socialmaterial@hotmail.com   
// +------------------------------------------------------------------------+
// | oobenn - (Different) Instagram Style Social Networking Platform
// | Copyright (c) 2016 oobenn. All rights reserved.
// +------------------------------------------------------------------------+  
include_once("functions/config.php");   
if(isset($_COOKIE[$cookie_name]) || isset($_GET['token'])){
   //echo $_GET['token'];exit;
	include_once("functions/user.php"); 
	$DotOut = new DOT_USER($db);  
	$siteConfigurations = $DotOut->Dot_Configurations();
    $maintenance = $siteConfigurations['maintenance_mode'];
    $userHash = isset($_COOKIE[$cookie_name]) ? mysqli_real_escape_string($db, $_COOKIE[$cookie_name]) : mysqli_real_escape_string($db, $_GET['token']);
    $checkBeforeLogin = mysqli_query($db,"SELECT userid, auth FROM dot_session WHERE auth = '$userHash'") or die(mysqli_error($db));
	   if(mysqli_num_rows($checkBeforeLogin) > 0){ 
		   if(!isset($_COOKIE[$cookie_name])) {
			  setcookie($cookie_name, $_GET['token'], time() + 31556926, '/');
		   }  
          include("main.php");
	   }else { 
		   setcookie($cookie_name,'',time() - 31556926 ,'/');
		   unset($_COOKIE[$cookie_name]);   
		   header("Location: index.php");   
	   }
}else{
   if(file_exists('install/install.lock')) { 
       header('Location: ./install/index.php'); 
       exit();
   }else{
	   setcookie($cookie_name,'',time() - 31556926 ,'/');
	   unset($_COOKIE[$cookie_name]);
      include_once("wellcome.php");
   } 
}  
?> 

