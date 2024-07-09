<?php 
include_once '../functions/config.php'; 
include_once '../functions/user.php';  
$Dot = new DOT_USER($db); 
$siteConfigurations = $Dot->Dot_Configurations();
$page_Lang =  $Dot->Dot_Languages();
$siteName = $siteConfigurations['script_name'];
$DefaultLang = 'english';
if(isset($_GET['get'])){
	$pages = $_GET['get'];  
}    
switch ($pages) {  
   case 'deleted':
      include('deleted.php');  
   break;
   case 'blocked':
      include('blocked.php');  
   break;
   case 'maintenance':
      include('maintenance.php');  
   break;
  default:
     header('Location:'.$base_url.'index.php');  
 }
?>
 