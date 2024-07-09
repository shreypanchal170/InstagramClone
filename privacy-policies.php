<?php  
session_start();
error_reporting(0); 
error_reporting(E_ALL  & ~E_DEPRECATED);
ini_set('display_errors', 1);
include("functions/config.php");  
include_once 'functions/user.php';  
$Dot = new DOT_USER($db); 
$page_Lang =  $Dot->Dot_Languages();
$siteConfigurations = $Dot->Dot_Configurations(); 
$siteLogo = $siteConfigurations['script_logo'];
$siteLogoMini = $siteConfigurations['script_logo_mini'];
$session_uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;  
$DefaultLang = 'english';
if(isset($_GET['lang'])){ 
   $DefaultLang = mysqli_real_escape_string($db, $_GET['lang']);
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title>Duhovit</title>
<link rel="stylesheet" href="<?php echo $base_url;?>css/style.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/hover.css"> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>   
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>     
<script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script> 
</head> 
<body>

<!--HEADER STARTED-->
<div class="header_container" id="view" data-type="view">
  <div class="header_in">
    <div class="oJZym">
      <div class="aU2HW">  
          <a class="logos _7mese insta_font Szr5J is_big" href="<?php echo $base_url;?>" style="height: 35px;width: 176px;"><img src="<?php echo $base_url.'uploads/logo/'.$siteLogo;?>" /></a> 
          <a class="logos _7mese insta_font Szr5JMini" href="<?php echo $base_url;?>" style="height: 35px;width: 35px;"><img src="<?php echo $base_url.'uploads/logo/'.$siteLogoMini;?>" /></a> 
      </div>
    </div> 
      <div class="ctQZg">
          <div class="_47KiJ">
               <?php
			    if(!empty($session_uid)){
					if (isset($_COOKIE["user"]) || isset($_COOKIE["pass"])){ 
						$userUsername =  $_COOKIE["user"];
						$userPassword = $_COOKIE["pass"]; 
						echo '<a href="'.$base_url.'profile/'.$userUsername.'">'.$userUsername.'</a>';
					} 
			   }else{
			       echo '<a href="'.$base_url.'">'.$page_Lang['login'][$DefaultLang].'</a>';
			   }?>
          </div> 
      </div> 
  </div>
</div>
<!--HEADER FINISHED-->
<div class="section">
   <div class="main">
       <div class="setttings_out">
         <!--Settings Block STARTED-->
          <div class="BvMHM">
              <?php 
			  $staticPage = $Dot->Dot_DisplayStaticPage('privacy_policies');
			  if($staticPage){
			      foreach($staticPage as $pageCode){ 
					  $aboutUsDescription = $pageCode['static_page_code'];
					  $aboutUsUpdateTime = $pageCode['static_page_time'];
					  echo stripcslashes($aboutUsDescription);
				  }
			  }			  
			  ?>
          </div>
         <!--Settings Block FINISHED--> 
        </div>
        <!--Full With Footer STARTED-->
            <div class="settings_out_footer">
               <div class="VWk7Y iseBh">
                    <?php include("contents/footer_menu.php");?>
               </div>
           </div>
        <!--Full With Footer FINISHED-->
   </div> 
</div> 
 
</body>
</html>