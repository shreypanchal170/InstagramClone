<?php  
session_start();
include_once 'functions/config.php'; 
include_once 'functions/user.php';   
$DotOut = new DOT_USER($db); 
$page_Lang =  $DotOut->Dot_Languages();
$siteConfigurations = $DotOut->Dot_Configurations();
$siteTitle = $siteConfigurations['script_title'];
$siteLogo = $siteConfigurations['script_logo'];
$siteName = $siteConfigurations['script_name'];
$maintenance = $siteConfigurations['maintenance_mode'];
$wellcomeTheme = $siteConfigurations['wellcome_theme']; 
$DefaultLang = 'english';
if(isset($_GET['theme'])){
   $languageName = $_GET['theme'];
   $wellcomeTheme = $languageName;
} 
if(isset($_GET['lang'])){ 
   $DefaultLang = mysqli_real_escape_string($db, $_GET['lang']);
} 
include_once("wellcome_themes/$wellcomeTheme/$wellcomeTheme.php"); 
include_once("demoThemes.php");
?> 
