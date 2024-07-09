<?php 
include_once '../functions/config.php';
if(isset($_COOKIE[$cookie_name])){
	$hashCookie = mysqli_real_escape_string($db, $_COOKIE[$cookie_name]);
	$checkSession = mysqli_query($db, "SELECT auth FROM dot_session WHERE auth = '$hashCookie'") or die(mysqli_error($db));
	if(mysqli_num_rows($checkSession) > 0){
	     mysqli_query($db,"DELETE FROM dot_session WHERE auth='$hashCookie'") or die(mysqli_error($db));
		 setcookie($cookie_name,'',time() - 31556926 ,'/');
	     unset($_COOKIE[$cookie_name]);
	     //header("Location: $base_url");
	}else{
	   setcookie($cookie_name,'',time() - 31556926 ,'/');
       unset($_COOKIE[$cookie_name]);
       //header("Location: $base_url");  
	} 
} else {
   setcookie($cookie_name,'',time() - 31556926 ,'/');
   unset($_COOKIE[$cookie_name]);
   //header("Location: $base_url"); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php echo $page_Lang['this_account_has_been_blocked'][$DefaultLang];?></title>
<style type="text/css">
 html, body { width: 100%; height: 100%; padding: 0px; margin: 0px;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;-moz-osx-font-smoothing: grayscale;-webkit-font-smoothing: antialiased;-ms-text-size-adjust: 100%;-webkit-texts-size-adjust: 100%;-webkit-backface-visibility: hidden;background-image:url(<?php echo $base_url;?>css/img/accountDeleted.png);background-repeat:no-repeat;background-attachment: fixed;background-position: center; }
 .account_deleted {position: relative;width: 100%;padding-top: 200px;font-weight: 600;font-size: 30px;color: #135796;text-align: center;text-transform: capitalize;}
  .boxNote{position:relative;width:100%;text-align:center;padding-top:80px;font-weight:500;font-size:14px;}
 .boxNote a{text-decoration:none;color:#3484CF;font-weight:bold;}
div{padding:30px;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box;-ms-box-sizing:border-box;}
</style>
</head>

<body>
<div class="account_deleted"><?php echo $page_Lang['this_account_has_been_blocked'][$DefaultLang];?></div>
<div class="boxNote"><?php echo $page_Lang['this_account_frozen'][$DefaultLang];?> <a href="<?php echo $base_url;?>privacy-policies">Privacy Policies</a></div>
</body>
</html>