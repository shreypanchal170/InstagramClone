<?php   
session_start();
//Connect to database
include("../functions/config.php");
include("../functions/user.php");   
$DotOut = new DOT_USER($db);  
require_once '../functions/vendor/autoload.php';
$page_Lang =  $DotOut->Dot_Languages();
$siteConfigurations = $DotOut->Dot_Configurations();
$yourIp = $DotOut->get_ip_address();
$countUserIPfromData = $DotOut->Dot_UserIP($yourIp);
$sendVerifyMail = $siteConfigurations['send_verify_mail'];
$smtpHost = $siteConfigurations['smtp_host'];
$smtpPort = $siteConfigurations['smtp_port'];
$smtpUsername = $siteConfigurations['smtp_username'];
$smtpPassword = $siteConfigurations['smtp_password'];
$smtpFrom = $siteConfigurations['smtp_username'];   
$businessaddress = $siteConfigurations['business_address'];
$siteName = $siteConfigurations['script_name'];
$DefaultLang = $siteConfigurations['default_lang']; 
$ipLimit = $siteConfigurations['ip_register_limit'];
$defaultTheme = $siteConfigurations['default_style'];
$verificationEmail = $siteConfigurations['verification_mail'];
$enableDisableReigsterIP = $siteConfigurations['enable_disable_register_ip'];
$ip=$_SERVER['REMOTE_ADDR']; // user ip
if(isset($_POST["reusername"]) && isset($_POST["fullname"]) && isset($_POST["password"]) && isset($_POST["regemail"]) && isset($_POST["gender"]) && isset($_POST["birth_day"]) && isset($_POST["birth_month"]) && isset($_POST["birth_year"])){
	$firstname = mysqli_real_escape_string($db, strtolower($_POST["reusername"]));
	$fullname = mysqli_real_escape_string($db, strtolower($_POST["fullname"]));
	$password = mysqli_real_escape_string($db, sha1(md5(trim($_POST["password"]))));
	$thisEmail = mysqli_real_escape_string($db, $_POST['regemail']); 
	$gender = mysqli_real_escape_string($db, $_POST["gender"]);
	$birth_day = mysqli_real_escape_string($db, $_POST["birth_day"]);
	$birth_month = mysqli_real_escape_string($db, $_POST["birth_month"]);
	$birth_year = mysqli_real_escape_string($db, $_POST["birth_year"]);
	$verificationCode = mysqli_real_escape_string($db, sha1(md5(trim($_POST["reusername"]))));  
	if (!is_numeric($birth_day) || ($birth_day < 1 || $birth_day > 31)) { 
        exit(); 
     }
	if (!is_numeric($birth_year) || ($birth_year > date("Y")-18 || $birth_year < 1950)) {
        exit(); 
     } 
	$number_list =  array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
     if (!in_array($birth_month, $number_list)) {
        exit(); 
     } 
	// Check Valid Username
	if (preg_match('/[^A-Za-z0-9-_]/', $firstname)) {
		echo '4';
		exit(); 
    }
	// Check Username is exist
	if($firstname != ''){ 
	    $checkUsernameExist = mysqli_query($db, "SELECT user_name FROM dot_users WHERE user_name = '$firstname'") or die(mysqli_error($db));
		if(mysqli_num_rows($checkUsernameExist) > 0){ 
		    echo '1'; 
			exit();
	    }
	} 
	//Check How many times user IP registered before
	if($enableDisableReigsterIP != '1' && $countUserIPfromData > $ipLimit){
	   echo '5';
	   exit();
	}
	// Check User Email is exist
	if($thisEmail != ''){
		$checkUsernameExist = mysqli_query($db, "SELECT user_email FROM dot_users WHERE user_email = '$thisEmail'") or die(mysqli_error($db));
		if(mysqli_num_rows($checkUsernameExist) > 0){ 
		    echo '2'; 
			exit();
	    }
	} 
	// Check email is valid
	if(!filter_var($thisEmail, FILTER_VALIDATE_EMAIL)){ 
	     echo"3"; 
		 exit();
     } 
	 // Check user is blocked by ADMIN
	$checkIPisBlocked = mysqli_query($db, "SELECT blocked_user_ip FROM dot_admin_blocked WHERE blocked_user_ip = '$ip'") or die(mysqli_error($db));
	if(mysqli_num_rows($checkIPisBlocked) > 0){
		echo '6';
		exit();
	} 
	 $regTime = time();
	mysqli_query($db,"SET character_set_client=utf8") or die(mysqli_error($db));
	mysqli_query($db,"SET character_set_connection=utf8") or die(mysqli_error($db)); 
	$saveUser = mysqli_query($db,"INSERT INTO `dot_users`(user_email,user_name,user_fullname,user_gender,user_password,user_birthday,user_birthmonth,user_birthyear,user_status,user_registered,user_ip,style_mode) VALUES('$thisEmail','$firstname','$fullname','$gender','$password','$birth_day','$birth_month','$birth_year','1','$regTime','$ip','$defaultTheme')") or die(mysqli_error($db));
	if($saveUser){
		 $getUserID = mysqli_query($db,"SELECT user_id,user_name FROM dot_users WHERE user_email = '$thisEmail'") or die(mysqli_error($db));
		 $detail=mysqli_fetch_array($getUserID,MYSQLI_ASSOC);
		 $uid=$detail['user_id']; // Get User ID
		 $dbunm = $detail['user_name'];  // Get User Username
		 $_SESSION['user_id'] = $uid; // Session User ID
		 $friend_query=mysqli_query($db,"INSERT INTO `dot_friends` (user_one,user_two,role,created_time)VALUES('$uid','$uid','me', '$regTime')");  
		 $thetime = time(); 
		 $hash = password_hash($dbunm, PASSWORD_DEFAULT).$thetime; //Create a token  
		 if($hash){
			  setcookie($cookie_name,$hash,$thetime+31556926 ,'/'); 
		      mysqli_query($db, "INSERT INTO `dot_session` (userid, auth) VALUES ('$uid', '$hash')"); 
			  if($verificationEmail == '1'){
				   mysqli_query($db,"UPDATE dot_users SET email_verification = '$verificationCode' WHERE user_id = '$uid'") or die(mysqli_error($db));
			       include("mails/emailVerification.php"); 
			  }
			  echo 'ok'; 
			  exit();
		 }else{
		     echo 'error';
			 exit();
		 }
	} else {
	  echo"error";
	  exit();
	}
}else{
   echo '404';
   exit();
}
?>