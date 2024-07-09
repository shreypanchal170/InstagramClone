<?php 
include_once 'functions/config.php';  
session_start(); //Start the current session
if(isset($_COOKIE[$cookie_name])){
    $hashCookie = mysqli_real_escape_string($db, $_COOKIE[$cookie_name]);
    $checkSession = mysqli_query($db, "SELECT auth,userid FROM dot_session WHERE auth = '$hashCookie'") or die(mysqli_error($db));
    $getDetail = mysqli_fetch_array($checkSession, MYSQLI_ASSOC);
    $theLoginUserID = $getDetail['userid'];
	$theLoginHash = $getDetail['auth'];  
    if(mysqli_num_rows($checkSession) > 0){ 
         setcookie($cookie_name,'',time() - 31556926 ,'/');
         mysqli_query($db,"DELETE FROM dot_session WHERE auth='$theLoginHash'") or die(mysqli_error($db));  
         session_destroy(); //Destroy it! So we are logged out now
          header("Location: $base_url"); 
	    die();
    }else{ 
        setcookie($cookie_name, '', 1);
        setcookie($cookie_name,'',time() - 31556926 ,'/'); 
        mysqli_query($db,"DELETE FROM dot_session WHERE auth='".mysqli_real_escape_string($db,$_COOKIE[$cookie_name])."'") or die(mysqli_error($db)); 
         session_destroy(); //Destroy it! So we are logged out now
        header("Location: $base_url");  
        die();
	}    
}else { 
    setcookie($cookie_name, '', 1);
    setcookie($cookie_name,'',time() - 31556926 ,'/');
    mysqli_query($db,"DELETE FROM dot_session WHERE auth='".mysqli_real_escape_string($db,$_COOKIE[$cookie_name])."'") or die(mysqli_error($db)); 
     session_destroy(); //Destroy it! So we are logged out now	
    header("Location: $base_url"); 
    die();
}
?>