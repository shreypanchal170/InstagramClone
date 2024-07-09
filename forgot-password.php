<?php 
include_once 'functions/config.php'; 
include_once 'functions/user.php';  
$Dot = new DOT_USER($db); 
$page_Lang =  $Dot->Dot_Languages();
$siteConfigurations = $Dot->Dot_Configurations();
$siteTitle = $siteConfigurations['script_title'];
$siteLogo = $siteConfigurations['script_logo'];
$siteName = $siteConfigurations['script_name'];
$DefaultLang = $siteConfigurations['default_lang']; 
$wellcomeTheme = $siteConfigurations['wellcome_theme'];
if(isset($_GET['lang'])){ 
   $DefaultLang = mysqli_real_escape_string($db, $_GET['lang']);
}
 if (isset($_COOKIE["user"]) || isset($_COOKIE["pass"])){ 
	$userUsername =  $_COOKIE["user"];
	$userPassword = $_COOKIE["pass"]; 
	$checkLoginDetails = $Dot->Dot_User_AutoLogin($userUsername, $userPassword);
	if($checkLoginDetails){  
           $_SESSION['user_id']=$checkLoginDetails;    
		   $getLoginDetails = $Dot->Dot_UserDetails($checkLoginDetails);
		   $userLoginName = $getLoginDetails['user_name'];
		   $userLoginPassword = $getLoginDetails['user_password'];
		   setcookie("user", $userLoginName, time() + (86400 * 30), "/"); 
		   setcookie("pass", $userLoginPassword, time() + (86400 * 30), "/");   
		   $session_uid = $checkLoginDetails;
		   header('Location:index.php');  
	}  
}  
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php echo $siteTitle;?></title>
  <link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
<link href="https://fonts.googleapis.com/css?family=Abel|Metrophobic|Nixie+One|Nobile:400,400i,500,500i|Poiret+One|Quicksand:400,500|Rajdhani:300,400,500,600,700|Zilla+Slab:300,300i,400,400i,500,700&amp;subset=cyrillic,devanagari,latin-ext,vietnamese" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_url;?>css/wellcome.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css"> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script> 
<script type="text/javascript">
 var siteurl = '<?php echo $base_url;?>';   
</script> 
</head>

<body>
<div class="forgot_body">
  <div class="nara-logo" style="background-image:url(<?php echo $base_url.'uploads/logo/'.$siteLogo;?>); background-repeat:no-repeat; background-position: center center;  padding: 35px 15px; background-size:200px;"></div>
  <div class="n_rfrm" id="show_what">
    <div class="n_in sendedMail" style="display:none;"><p><?php echo $page_Lang['sendedChangePassCode'][$DefaultLang];?></p><p><?php echo $page_Lang['make_sure'][$DefaultLang];?></p></div>
    <div class="n_in notsendedMail" id="error_l" style="display:none;"><?php echo $page_Lang['sure_Email'][$DefaultLang];?></div>
    <div id="reset_p">
      <div class="n_in nin">
        <input type="text" class="i_nfrm_forgot" id="r_email" placeholder="E-Mail">
      </div>
      <div class="n_in nin">
        <a href="<?php echo $base_url;?>">
          <div class="remembered"><?php echo $page_Lang['i_remembered_pass'][$DefaultLang];?></div>
        </a>
      </div>
      <div class="n_in" nin>
        <div class="reset_password" id="resetPassword"><?php echo $page_Lang['reset_pass'][$DefaultLang];?></div>
      </div>
    </div>

  </div>
</div>
</body>
</html>