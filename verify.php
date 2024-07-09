<?php 
include_once 'functions/config.php'; 
include_once 'functions/user.php';  
$Dot = new DOT_USER($db); 
$page_Lang =  $Dot->Dot_Languages();
$siteConfigurations = $Dot->Dot_Configurations();
$siteTitle = $siteConfigurations['script_title'];
$siteLogo = $siteConfigurations['script_logo'];
$siteName = $siteConfigurations['script_name'];
if(isset($_GET['activation'])){
   $theActivationKey = mysqli_real_escape_string($db, $_GET['activation']);
   // Get Activation User Details From Database If Activation Key Exists
   $getActivationUserDetails = $Dot->Dot_CheckActivationEmailKeyExist($theActivationKey);
   if($getActivationUserDetails){ 
		sleep(rand(5, 8));  
		// displaying time again 
		$update = $Dot->Dot_GetEmailActivationDetails($theActivationKey);
   } else {
	   echo '2';
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $siteTitle;?></title>
<style type="text/css">
body,html {
background-color:#f7f7f7;
width:100%;
height:100%; 
min-with:100%;
min-height:100%;
margin:0px;
padding:0px;
}
.container {
   position:relative;
   width:100%;
   max-width:250px;
   margin:0px auto;
   padding-top:1%;
}
.success {
   display:inline-block;
   width:100%;
   text-align:center;
}
</style>
</head>

<body>

<div class="container">
   <div class="success"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M89.58333,21.5l32.25,14.33333l-32.25,14.33333z" fill="#ff3d00"></path><path d="M82.41667,14.33333h7.16667v53.75h-7.16667z" fill="#5d4037"></path><path d="M172,157.66667h-86l27.26917,-47.72283l8.56417,4.72283h21.5l4.8375,1.30792z" fill="#90a4ae"></path><path d="M148.17083,115.97458l-1.25417,12.28008l-14.33333,-11.0295l-10.75,11.0295l-8.56417,-18.31083l12.63842,-22.12708c1.38317,-2.42233 4.79808,-2.42233 6.18483,0z" fill="#b3e5fc"></path><path d="M0,157.66667h86l-27.26917,-47.72283l-8.56417,4.72283h-21.5l-4.8375,1.30792z" fill="#90a4ae"></path><path d="M23.82917,115.97458l1.25417,12.28008l14.33333,-11.0295l10.75,11.0295l8.56417,-18.31083l-12.63842,-22.12708c-1.38317,-2.42233 -4.79808,-2.42233 -6.18483,0z" fill="#b3e5fc"></path><path d="M143.33333,157.66667h-114.66667l24.51,-42.4625l11.32333,-7.70417h43l11.32333,7.70417z" fill="#546e7a"></path><path d="M82.41667,21.5h7.16667v28.66667h-7.16667z" fill="#dd2c00"></path><path d="M118.82333,115.20417l-7.74,6.62917l-12.54167,-10.75l-12.54167,10.75l-12.54167,-10.75l-12.54167,10.75l-7.74,-6.62917l0.39417,-0.71667l26.23,-45.54417c3.40417,-5.9125 8.99417,-5.9125 12.39833,0l26.23,45.54417z" fill="#81d4fa"></path></g></g></svg></div>
</div>

</body>
</html>