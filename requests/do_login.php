<?php  
session_start();
//Connect to database
include("../functions/config.php");
// If request is not made by ajax end request.
if (isset($_POST['login_username']) && isset($_POST['login_password'])){ 
// Declare post fields from login form.  
$login_user_name = mysqli_real_escape_string($db, strtolower($_POST["login_username"])); 
$login_user_password = mysqli_real_escape_string($db, strtolower(sha1(md5(trim($_POST["login_password"])))));

//Check with database if user exists.
$result = mysqli_query($db, "SELECT * FROM `dot_users` WHERE (user_name ='$login_user_name' OR user_email = '$login_user_name') AND user_password= '$login_user_password' AND user_status = '1'");
$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
$uname = $r['user_name'];
$uemail = $r['user_email'];
$pass = $r['user_password'];
$userid = $r['user_id'];
 
//If user exists in database check each input
if(($login_user_name != '') && ($login_user_password != '') && ($login_user_name == $uname || $login_user_name == $uemail) && ($login_user_password == $pass)){

    $login_ok = true; 
	$getUserID = mysqli_query($db,"SELECT user_id,user_name, user_email FROM dot_users WHERE user_password = '$login_user_password' AND (user_name = '$login_user_name') AND user_status = '1'") or die(mysqli_error($db));
    $row=mysqli_fetch_array($getUserID,MYSQLI_ASSOC);
    $uid=$row['user_id']; 
	$dbunm = $row['user_name'];
	$_SESSION['user_id'] = $uid; 
	$loginTime = time();
	$hash = sha1($dbunm).$loginTime;
	if($hash){ 
	   $checkBeforeLogin = mysqli_query($db,"SELECT userid, auth FROM dot_session WHERE userid = '$uid'") or die(mysqli_error($db));
	   if(mysqli_num_rows($checkBeforeLogin) > 0){
	       $deleteOldHash = mysqli_query($db, "DELETE FROM dot_session WHERE userid = '$uid'") or die(mysqli_error($db));
	   }
	   setcookie($cookie_name,$hash,time()+31556926 ,'/');
	   $saveHash = mysqli_query($db, "INSERT INTO `dot_session`(userid, auth) VALUES ('$uid','$hash')") or die(mysqli_error($db)); 
	   if($saveHash){
	     echo 'login_ok'; 
         exit; 
	   }
	   
	 }   
} 

//If user does not exist in database or values are incorrect, return an error to show on form.
else {
	echo 'user_error';
} 
}
else{
exit();	
}//If request is ajax 
?>