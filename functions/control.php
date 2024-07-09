<?php /*
include("config.php");  
error_reporting(E_ALL ^ E_NOTICE);

session_start(); // Start Session
header('Cache-control: private'); // IE 6 FIX

// always modified 
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
// HTTP/1.1 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0', false); 
// HTTP/1.0 
header('Pragma: no-cache'); 
//COOKIE INFO AND AUTOLOGIN

$cookie_name = 'login_auth'; // EDIT THIS TO RENAME COOKIE
$cookie_time = (10 * 365 * 24 * 60 * 60); // 30 days

$login ='';
if(isset($_SESSION['user_id'])){
$login = 'ok';
}

if(!isset($_SESSION['user_id'])){  
	if(isset($_COOKIE[$cookie_name])){  
	include_once 'autologin.php';   
	
	}
}*/


?>