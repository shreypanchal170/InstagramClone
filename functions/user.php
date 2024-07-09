<?php 
class DOT_USER {
   private $db;
   public function __construct($db) {
       $this->db = $db;
   }
 
// Languages
public function Dot_Languages(){ 
   $query = mysqli_query($this->db, "SELECT * FROM dot_languages") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		 $data[$row['lang_key']] = $row;
		 $data[$row['lang_id']] = $row;
	  }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	  } 
}
/*Show Language List from Table*/
public function Dot_Lngs()
{ 
	$query = mysqli_query($this->db,"SHOW COLUMNS FROM dot_languages WHERE field != 'lang_id' AND field != 'lang_key' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
		return $data;
	 }   
}
// Site Configurations
public function Dot_Configurations(){
	$configurations = mysqli_query($this->db,"SELECT configuration_id, script_name,script_logo,script_title,site_description,site_keywords,maintenance_mode,pr_cod,activated,wellcome_theme,show_hashtag_when,show_users_when,show_advertisement_when,show_google_ads_when,ads_per_click,ads_per_impression,min_amonth,credit_currency,paypal_mode,paypal_cliend_id,paypal_secret_id,post_types_position,post_text,post_image,post_video,post_audio,post_link,post_filter,google_map_api ,google_analytics_code,smtp_or_mail_server,tls_or_ssl , smtp_host , smtp_username , smtp_password , smtp_port,send_verify_mail,business_address,default_lang,enable_disable_user_choose_lang,enable_disable_register,ip_register_limit,enable_disable_register_ip,verification_mail,script_logo_mini,default_style  FROM dot_configuration WHERE configuration_id = '1'") or die(mysqli_error($this->db));
    $data=mysqli_fetch_array($configurations,MYSQLI_ASSOC);
    return $data;
}

// Get Details
public function Dot_UserDetails($sessionUserID){
   $sessionUserID = mysqli_real_escape_string($this->db, $sessionUserID);
   $query = mysqli_query($this->db,"SELECT  user_id,user_name,user_email,user_password FROM dot_users WHERE user_id='$sessionUserID' AND user_status IN('1','2','3')") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
   return $data;
} 
 
// Forgot Password Set New Password
public function Dot_ForGot_PassWord($user_email){
  $user_email = mysqli_real_escape_string($this->db, $user_email);
  $checkUserisExist = mysqli_query($this->db,"SELECT user_id,user_email,user_status FROM dot_users WHERE user_email = '$user_email' AND user_status='1'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($checkUserisExist) == 1){
	 $active_code=md5($user_email.time());
	 $query = mysqli_query($this->db,"UPDATE dot_users SET forgot_password_key='$active_code' WHERE user_email='$user_email'") or die(mysqli_error($this->db));
	 return $query;
  }else{
	 return false; 
  }
}
// Get Forgot ID
public function Dot_GetForgotID($user_email){
  $user_email = mysqli_real_escape_string($this->db, $user_email);
  $checkUserisExist = mysqli_query($this->db,"SELECT user_email FROM dot_users WHERE user_email = '$user_email'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($checkUserisExist) == 1){
     $query = mysqli_query($this->db,"SELECT forgot_password_key FROM `dot_users` WHERE user_email = '$user_email' AND user_status='1'") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 if($data['forgot_password_key']) {
		$forgotKey=$data['forgot_password_key'];
	    return  $forgotKey;
	 }
  }else{
     return false;
  }
}
// Get Forgot ID
public function Dot_GetVerifyID($user_email){
  $user_email = mysqli_real_escape_string($this->db, $user_email);
  $checkUserisExist = mysqli_query($this->db,"SELECT user_email FROM dot_users WHERE user_email = '$user_email'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($checkUserisExist) == 1){
     $query = mysqli_query($this->db,"SELECT email_verification FROM `dot_users` WHERE user_email = '$user_email' AND user_status='1'") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 if($data['email_verification']) {
		$forgotKey=$data['email_verification'];
	    return  $forgotKey;
	 }
  }else{
     return false;
  }
}
// Check Reset Password Activation Code
public function Dot_CheckActivationCode($ActivationCode){
    $ActivationCode = mysqli_real_escape_string($this->db, $ActivationCode);
	$CheckActivationCodeSame = mysqli_query($this->db,"SELECT forgot_password_key FROM dot_users WHERE forgot_password_key = '$ActivationCode' AND user_status='1'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($CheckActivationCodeSame) == 1) {
	  return true;
  }else{
      return false;
  }
}
// Set New Password 
public function Dot_SetNewPassword($newPassWord, $activateID){
   $newPassWord = mysqli_real_escape_string($this->db, $newPassWord);
   $activateID = mysqli_real_escape_string($this->db, $activateID);  
   $CheckActivationCodeSame = mysqli_query($this->db,"SELECT forgot_password_key FROM dot_users WHERE forgot_password_key = '$activateID' AND user_status='1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($CheckActivationCodeSame) == 1) { 
	  $newPassword= sha1(md5(mysqli_real_escape_string($this->db,$newPassWord))); 
	  $query=mysqli_query($this->db,"UPDATE dot_users SET user_password='$newPassword' WHERE forgot_password_key='$activateID'") or die(mysqli_error($this->db));
	  mysqli_query($this->db,"UPDATE dot_users SET forgot_password_key='' WHERE forgot_password_key='$activateID'") or die(mysqli_error($this->db));
	  return true;
    }else{
      return false;
    }
}
// Check Username Exist 
public function Dot_CheckUserNameExist($gousername){
	$gousername = mysqli_real_escape_string($this->db, $gousername);
	$CheckUser = mysqli_query($this->db,"SELECT user_name FROM dot_users WHERE user_name = '$gousername'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUser) == 1) {
		return true;
	}else{
        return false;
    }
}
// Check Email Exist 
public function Dot_EmailExist($goEmail){
	$goEmail = mysqli_real_escape_string($this->db, $goEmail);
	$CheckEmail = mysqli_query($this->db,"SELECT user_email FROM dot_users WHERE user_email = '$goEmail'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckEmail) == 1) {
		return true;
	}else{
        return false;
    }
}
/*Delete User From Data*/
public function Dot_DeleteUserAccount($user)
{
   $user = mysqli_real_escape_string($this->db, $user);
   $checkUserExist = mysqli_query($this->db,"SELECT delete_key, user_id FROM dot_users WHERE delete_key = '$user' AND user_status = '3'") or die(mysqli_error($this->db));
   $dataGetDeleteUserID = mysqli_fetch_array($checkUserExist, MYSQLI_ASSOC);
   $DeleteUid = $dataGetDeleteUserID['user_id'];  
   if(mysqli_num_rows($checkUserExist) == 1){
        mysqli_query($this->db,"DELETE FROM `dot_users` WHERE user_id = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_videos` WHERE uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_user_upload_images` WHERE user_id_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_user_stories` WHERE uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_user_posts` WHERE user_id_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_user_interests` WHERE interested_user_id_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_report_post` WHERE reporter_user_id_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_post_like` WHERE liked_uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_post_comments` WHERE uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_notifications` WHERE not_post_owner_id_fk = '$DeleteUid' AND not_uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_friends` WHERE user_two = '$DeleteUid' AND user_one='$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_favourite_list` WHERE fav_uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_comment_like` WHERE liked_uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_chat` WHERE to_user_id = '$DeleteUid' AND from_user_id='$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_blocked_users` WHERE blocked_uid_fk = '$DeleteUid' AND blocker_uid_fk='$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_avatars` WHERE uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_audios` WHERE uid_fk = '$DeleteUid'") or die(mysqli_error($this->db));
		mysqli_query($this->db,"DELETE FROM `dot_admin_blocked` WHERE blocked_user_id = '$DeleteUid'") or die(mysqli_error($this->db));
		return true;
   }else{
        return false;
   }
}
// Check User is Blocked
public function Dot_CheckUserBlocked($userID)
{  
   $userID = mysqli_real_escape_string($this->db,$userID);
   $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userID' AND user_status = '2'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserisExist) == 1){ 
	   $GetUserStatus = mysqli_query($this->db,"SELECT user_status FROM `dot_users` WHERE user_id='$userID'") or die(mysqli_error($this->db));
	   $data=mysqli_fetch_array($GetUserStatus,MYSQLI_ASSOC);
	   if($data['user_status']) {
		   $status=$data['user_status'];
	       return  $status;
	   }
   }
}
// latest Registered 5 User
public function Dot_LatestRegisteredUsers($numberOfUser){
	$numberOfUser = mysqli_real_escape_string($this->db, $numberOfUser);
  $query=mysqli_query($this->db,"SELECT user_name,user_fullname,user_avatar,user_id FROM dot_users ORDER BY user_id DESC LIMIT $numberOfUser") or die(mysqli_error($this->db));
	 $data = array();
	 while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		 $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
		 return $data;
	  } 
}
/*User Profile Picture */
public function Dot_UserAvatar($uid, $base_url) 
{
   $uid=mysqli_real_escape_string($this->db,$uid);
   //This is checking user uploded profile image or not
   $query = mysqli_query($this->db,"SELECT user_avatar, user_gender FROM `dot_users` WHERE user_id='$uid'") or die(mysqli_error($this->db));
   $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
   
   if(!empty($row['user_avatar'])){
		$profile_image_path=$base_url.'uploads/avatar/';
		$data= $profile_image_path.$row['user_avatar'];
		return $data;
   }else {
	   if($row['user_gender'] == 'male'){
		   $data= $base_url."uploads/avatar/avatar_male.png";
		   return $data;	
	   }else{
		   $data= $base_url."uploads/avatar/avatar_female.png";
		   return $data;	
	   }
	   
  } 
}
// Get User ID from Hash
public function Dot_UserIDFromHash($hash)
{
   $hash = mysqli_real_escape_string($this->db, $hash);
	$CheckUserHash = mysqli_query($this->db,"SELECT userid, auth FROM dot_session WHERE auth = '$hash'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserHash) == '1'){
		$row=mysqli_fetch_array($CheckUserHash,MYSQLI_ASSOC);
		return $row['userid'];
	}else{
		return false; 
	}
 }
// Check User Hash Geting Admin
public function Dot_CheckUserHashAdmin($Hash_ID)
{
    $hash = mysqli_real_escape_string($this->db, $Hash_ID);
	$CheckUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$hash'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserisAdmin) == '1'){
	    return true;
	}else{
	    return false;
	}
} 
public function get_ip_address() {
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
    return $_SERVER['REMOTE_ADDR'];
}

public function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;
    $ip = ip2long($ip);
    if ($ip !== false && $ip !== -1) {
        $ip = sprintf('%u', $ip);
        if ($ip >= 0 && $ip <= 50331647)
            return false;
        if ($ip >= 167772160 && $ip <= 184549375)
            return false;
        if ($ip >= 2130706432 && $ip <= 2147483647)
            return false;
        if ($ip >= 2851995648 && $ip <= 2852061183)
            return false;
        if ($ip >= 2886729728 && $ip <= 2887778303)
            return false;
        if ($ip >= 3221225984 && $ip <= 3221226239)
            return false;
        if ($ip >= 3232235520 && $ip <= 3232301055)
            return false;
        if ($ip >= 4294967040)
            return false;
    }
    return true;
}
// Count User IP
public function Dot_UserIP($userIP)
{
   $userIP = mysqli_real_escape_string($this->db, $userIP);
   $countIP = mysqli_query($this->db,"SELECT COUNT(*) AS userIPCount FROM dot_users WHERE user_ip = '$userIP'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($countIP, MYSQLI_ASSOC);  
   return $row['userIPCount'];
} 
// Check Activation Exist
public function Dot_CheckActivationEmailKeyExist($keyEmail)
{
   $keyEmail = mysqli_real_escape_string($this->db,$keyEmail);
   $query = mysqli_query($this->db,"SELECT email_verification FROM dot_users WHERE email_verification = '$keyEmail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($query) == 1){
	    return true;
   }else{return false;}
}
// Get User Details Using Activation Key
public function Dot_GetEmailActivationDetails($activationKey){
   $activationKey = mysqli_real_escape_string($this->db, $activationKey);
   $checkActivationKey = mysqli_query($this->db,"SELECT email_verification, user_name, user_id, user_email FROM dot_users WHERE email_verification = '$activationKey'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkActivationKey) == 1){
	    mysqli_query($this->db,"UPDATE dot_users SET email_verification = '1' WHERE email_verification='$activationKey'") or die(mysqli_error($this->db));
      while($row=mysqli_fetch_array($checkActivationKey, MYSQLI_ASSOC)) {
		   $data[]=$row;
	    }
	  if(!empty($data)) {
		// Store the result into array
		 return $data;
	  } 
   }
}
// Page
public function Dot_DisplayStaticPage($pageType)
{
    $pageType = mysqli_real_escape_string($this->db, $pageType);
	$query = mysqli_query($this->db,"SELECT static_page_title,static_page_code,static_page_time,static_page_status FROM dot_static_pages WHERE static_page_title = '$pageType' AND static_page_status = '1'") or die(mysqli_error($this->db));
	$data = array();
	 while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		 $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
		 return $data;
	  } 
}  
}
?>