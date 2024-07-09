<?php 
include_once("../functions/config.php");  
include_once("../functions/user.php"); 
$DotOut = new DOT_USER($db);  
$page_Lang =  $DotOut->Dot_Languages();
$siteConfigurations = $DotOut->Dot_Configurations();
$maintenance = $siteConfigurations['maintenance_mode'];
if($maintenance == '0'){
	 header("Location: index.php");
}
$DefaultLang = 'english';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php echo $page_Lang['this_account_has_been_blocked'][$DefaultLang];?></title>
<style type="text/css">
 html, body { width: 100%; height: 100%; padding: 0px; margin: 0px;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;-moz-osx-font-smoothing: grayscale;-webkit-font-smoothing: antialiased;-ms-text-size-adjust: 100%;-webkit-texts-size-adjust: 100%;-webkit-backface-visibility: hidden;background-image:url(<?php echo $base_url;?>css/img/maintenance-panel.gif);background-repeat:no-repeat;background-attachment: fixed;background-position: center; }
 .account_deleted {position: relative;width: 100%;padding-top: 200px;font-weight: 600;font-size: 30px;color: #135796;text-align: center;text-transform: capitalize;}
 .boxNote{position:relative;width:100%;text-align:center;padding-top:80px;font-weight:500;font-size:14px;}
div{padding:30px;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box;-ms-box-sizing:border-box;}
</style>
</head>

<body>
<div class="account_deleted"><?php echo $page_Lang['maintenance_text'][$DefaultLang];?></div>
<div class="boxNote"><?php echo $page_Lang['maintenance_note'][$DefaultLang];?></div>
</body>
</html>