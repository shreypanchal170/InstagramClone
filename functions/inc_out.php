<?php 
ob_start();
session_start(); 
error_reporting(0); 
error_reporting(E_ALL  & ~E_DEPRECATED);
ini_set('display_errors', 1);
include_once 'config.php'; // Database connection
include_once 'function_out.php'; // Functions 
include_once 'html_code.php';  
include_once 'clear.php';  
$Dot_Out = new DOT_GET($db);     
//include_once 'checklogin.php'; // Functions   
if(isset($_COOKIE[$cookie_name]) || isset($_GET['token'])){
	$hash = isset($_COOKIE[$cookie_name]) ? mysqli_real_escape_string($db, $_COOKIE[$cookie_name]) : mysqli_real_escape_string($db, $_GET['token']); 
} else if(isset($_SESSION['user_id'])){
    $hash = isset($_SESSION['user_id']) ? mysqli_real_escape_string($db , $_SESSION['user_id']) : "";
} else {
    $hash = '';
}
date_default_timezone_set('UTC'); 
$uid = $Dot_Out->Dot_UserIDFromHash($hash);  
$dataU=$Dot_Out->Dot_UserDetails($uid);
$duhovitOut = $Dot_Out->Dot_Configurations();  

$pagesDefaultLanguage = $duhovitOut['default_lang']; 
$page_Lang =  $Dot_Out->Dot_Languages();  
$dataUserPageLanguage = isset($dataU['user_page_lang']) ? $dataU['user_page_lang'] : $pagesDefaultLanguage;  


$adsPerClick = $duhovitOut['ads_per_click'];
$adsPerimpression = $duhovitOut['ads_per_impression'];
?>