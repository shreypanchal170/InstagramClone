<?php  
// +------------------------------------------------------------------------+
// | @author Mustafa Öztürk (mstfoztrk)
// | @author_url 1: http://www.duhovit.com
// | @author_url 2: http://codecanyon.net/user/mstfoztrk
// | @author_email: socialmaterial@hotmail.com   
// +------------------------------------------------------------------------+
// | oobenn - (Different) Instagram Style Social Networking Platform
// | Copyright (c) 2016 oobenn. All rights reserved.
// +------------------------------------------------------------------------+
class DOT_UPDATES {
private $db;

public function __construct($db) 
{
  $this->db = $db;
}
public $perpage = 10; /*Uploads perpage*/
// Site Configurations
public function Dot_Configurations()
{
	$configurations = mysqli_query($this->db,"SELECT configuration_id, script_name,script_logo,script_title,site_description,site_keywords,maintenance_mode,pr_cod,activated,wellcome_theme,show_hashtag_when,show_users_when,show_advertisement_when,show_google_ads_when,ads_per_click,ads_per_impression,min_amonth,credit_currency,paypal_mode,paypal_cliend_id,paypal_secret_id,post_types_position,post_text,post_image,post_video,post_audio,post_link,post_filter,google_map_api ,google_analytics_code,smtp_or_mail_server,tls_or_ssl , smtp_host , smtp_username , smtp_password , smtp_port,send_verify_mail,business_address,default_lang,enable_disable_profile_card,enable_disable_youmayknow,enable_disable_radar,enable_disable_trend_tags,version,logo_type,logo_svg,post_type_giphy,giphy_key,post_type_location,google_font_import,enable_disable_watermark_post,enable_disable_which_post,enable_disable_user_choose_lang,enable_disable_advertisement_pages,script_logo_mini,enable_disable_event_feature,enable_disable_register,ip_register_limit,enable_disable_register_ip,header_ads,header_ads_code ,sidebar_ads,sidebar_ads_code,post_between_ads,post_between_ads_code,weather_api, weather_api_status,weather_widget,weather_default_location,enable_disable_unlike_button,yandex_translate_api_key,menu_position,money_currencys,search_product,market_menu,market_slider,market_post,before_after_post,ons_status,verification_mail,ons_api,ons_rest_api,payment_usd, paymentiner, payment_ngn, payment_try, payment_fee,paypal_payment_mode,bitpay_payment_mode,stripe_payment_mode,authorize_payment_mode,iyzico_payment_mode,paystack_payment_mode,razorpay_payment_mode,paypal_sendbox_business_email,paypal_product_business_email,paystack_testing_secret_key,paystack_testing_public_key,paystack_live_secret_key,pay_stack_liive_public_key,paypal_active_pasive,iyzico_active_pasive,iyzico_testing_secret_key,iyzico_testing_api_key,iyzico_live_api_key,iyzico_live_secret_key,bitpay_active_pasive,bitpay_notification_email,bitpay_password,bitpay_pairing_code,bitpay_label,authorizenet_active_pasive,authorizenet_test_ap_id,authorizenet_test_transaction_key,authorizenet_live_api_id,authorizenet_live_transaction_key,chtime,paystack_active_pasive,stripe_active_pasive,stripe_test_secret_key,stripe_test_public_key,stripe_live_secret_key,stripe_live_public_key,razorpay_active_pasive,razorpay_testing_key_id,razorpay_testing_secret_key,razorpay_live_key_id,razorpay_live_secret_key,most_sponsored_posts_daily_widget,one_signal_app_id,point_like, point_comment,point_post,point_stories,point_like_status, point_comment_status,point_post_status,point_stories_status,point_vote,point_vote_status,point_equal_dolar,point_daily,default_search_gender,default_search_onlineoffline,default_search_avatarstatus,default_search_agestart,default_search_ageend,default_search_distance,pro_system,default_search_relationship, default_search_sexuality, default_search_height, default_search_weight, default_search_lifestyle, default_search_children, default_search_smokinghabit, default_search_drinkinghabit, default_search_bodytype, default_search_haircolor, default_search_eyecolor,point_system_status,one_signal_status,customize_profile_feature,change_background,change_background_sound,twilio_account_sid,twilio_key_sid,twilo_api_key_secret,video_call_call_time,video_call_dial_time, twilio_mode,paypal_crncy,iyzico_crncy,bitpay_crncy,authorize_crncy,paystack_crncy,stripe_crncy,razorpay_crncy,video_autoplay,video_play_sound,default_style FROM dot_configuration WHERE configuration_id = '1'") or die(mysqli_error($this->db));
    $data=mysqli_fetch_array($configurations,MYSQLI_ASSOC); 
    return $data;
}
// Update Exchanges
public function Dot_UpdateExchanges($uid,$ngnUSD,$inrUSD,$tryUSD)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$ngnUSD = mysqli_real_escape_string($this->db,$ngnUSD); 
	$inrUSD = mysqli_real_escape_string($this->db,$inrUSD);
	$tryUSD = mysqli_real_escape_string($this->db,$tryUSD);
	$query = mysqli_query($this->db,"UPDATE dot_configuration SET ngn_exchange_rate = '$ngnUSD' ,inr_exchange_rate = '$inrUSD' ,tl_exchange_rate = '$tryUSD'  WHERE configuration_id = '1'") or die(mysqli_error($this->db));
} 
// Get Forgot ID
public function Dot_GetVerifyIDFrom($user_email){
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
/* User ID Valid Check*/
public function User_ID($session_ID) 
{
    $session_ID=mysqli_real_escape_string($this->db,$session_ID);
    //This is user id Cheking for valid
    $query=mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id='$session_ID' AND user_status='1'");
    if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['user_id'];
    } else {
       return false;
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
// Check User Verified
public function Dot_CheckUserVerified($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CheckUserVerified = mysqli_query($this->db,"SELECT user_id, verified_user FROM dot_users WHERE user_id = '$uid' AND verified_user='1'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserVerified) == 1){
      return true;
   }else{
      return false;
   }
}
// Check Hash is Exist
public function Dot_CheckCookieHash($hash){
    $hash = mysqli_real_escape_string($this->db, $hash);
	$CheckUserHash = mysqli_query($this->db,"SELECT auth FROM dot_session WHERE auth = '$hash'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserHash) == 0){
		return true;
	}else{
		return false; 
	}
}
/*Check User is Exist*/
public function Dot_CheckUserIDexist($userID)
{
    $userID=mysqli_real_escape_string($this->db,$userID);
	$query=mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id='$userID' AND user_status='1'");
    if(mysqli_num_rows($query)==1) {return true;}else{return false;}
}
/*Check User is Exist with user_id with user_name*/
public function Dot_CheckUserExist($userID,$userName)
{
    $userID=mysqli_real_escape_string($this->db,$userID);
	$userName=mysqli_real_escape_string($this->db,$userName);
	$query=mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id='$userID' AND user_name='$userName' AND user_status='1'");
    if(mysqli_num_rows($query)==1) {return true;}else{return false;}
}
 
/*User Full Name*/
public function Dot_UserFullName($userID) 
{
	$userID=mysqli_real_escape_string($this->db,$userID); 
	$query = mysqli_query($this->db,"SELECT user_fullname FROM `dot_users` WHERE user_id='$userID' AND user_status='1'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['user_fullname']) {
		$name=$data['user_fullname'];
		$str_length = strlen($name);
		if($str_length > 25) {
		   $name= substr($name, 0, 25) . "..." ;
		}
		return ucfirst($name);
	} else {
	  return ucfirst($userID);
	}
}
// Get UserName From Pages
public function Dot_GetUserName($userID)
{
	$userID=mysqli_real_escape_string($this->db,$userID);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT user_name FROM `dot_users` WHERE user_id='$userID' AND user_status='1'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['user_name']) {
		$name=$data['user_name'];
	    return  $name;
	}
}
// Get UserEmail
public function Dot_GetUserEmail($userID)
{
	$userID=mysqli_real_escape_string($this->db,$userID);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT user_email FROM `dot_users` WHERE user_id='$userID' AND user_status='1'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['user_email']) {
		$name=$data['user_email'];
	    return  $name;
	}
}
// Get Details
public function Dot_UserDetails($sessionUserID)
{
   $sessionUserID = mysqli_real_escape_string($this->db, $sessionUserID);
   $query = mysqli_query($this->db,"SELECT user_id,user_name,user_fullname,user_email,user_password,user_relationship,user_avatar,user_page_lang,user_profile_word,delete_key,user_cover,user_website,user_bio,user_gender,user_height,user_credit,user_weight,user_life_style,user_children,user_smoke,user_drink,user_body_type,user_hair_color,user_eye_color,user_sexuality,notification_count,user_job_title,last_login,user_job_company_name,user_school_university,user_phone_number,post_like_notification,post_comment_notification,comment_like_notification,user_type,follow_notification,visited_profile_notification,private_account,style_mode,show_suggest_hashTags,show_suggest_users,show_advertisement,show_google_ads, profile_bg, profile_bg_type,bg_music_name,bg_music,bg_music_type,pbg_color,pha_color,pt_color,phv_color,pp_icon,pshb_color,pfont_font,pshb_icon,verified_user,notification_event_count,email_verification,device_key,total_earnings,last_earn_calculate,point_earning,user_donate_message,ulat,ulong,search_gender,search_onofstatus,search_avatarstatus,search_agestart,search_ageend,search_distance,pro_user_type,pro_user_plain_time,user_birthday,user_birthmonth,user_birthyear,profile_favourite_count,profile_visit_count,shopping_fullname,shopping_phone_number,shopping_full_address,country,city,state,postcode,idorpssportnumber,show_online_offline_status,search_relationshipstatus ,search_sexuality ,search_height ,search_weight ,search_lifestyle ,search_children ,search_smokinghabit ,search_drinkinghabit ,search_haircolor ,search_eyecolor ,search_bodytype,message_available FROM dot_users WHERE user_id='$sessionUserID' AND user_status IN('1','2','3')") or die(mysqli_error($this->db)); 
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
   return $data;
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
// Check User is Blocked
public function Dot_CheckUserDeleted($userID)
{  
   $userID = mysqli_real_escape_string($this->db,$userID);
   $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userID' AND user_status = '3'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserisExist) == 1){ 
	   $GetUserStatus = mysqli_query($this->db,"SELECT user_status FROM `dot_users` WHERE user_id='$userID'") or die(mysqli_error($this->db));
	   $data=mysqli_fetch_array($GetUserStatus,MYSQLI_ASSOC);
	   if($data['user_status']) {
		   $status=$data['user_status'];
	       return  $status;
	   }
   }
}
//Get User Details For Hover Card
public function Dot_GetUserDetailsForCard($CardID, $CardName) 
{
   $CardID = mysqli_real_escape_string($this->db, $CardID);
   $CardName = mysqli_real_escape_string($this->db, $CardName);
   $query = mysqli_query($this->db,"SELECT user_id,user_name,user_fullname,user_email,user_password,private_account,user_avatar,user_page_lang,user_profile_word,user_cover,last_login,pro_user_type,verified_user FROM dot_users WHERE user_id='$CardID' AND user_name = '$CardName' AND  user_status IN('1','2','3')") or die(mysqli_error($this->db)); 
   while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
// Languages
public function Dot_Languages()
{ 
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
/*User Profile Picture */
public function Dot_UserCover($uid, $base_url) 
{
   $uid=mysqli_real_escape_string($this->db,$uid);
   //This is checking user uploded profile image or not
   $query = mysqli_query($this->db,"SELECT user_cover, user_gender FROM `dot_users` WHERE user_id='$uid'") or die(mysqli_error($this->db));
   $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
   
   if(!empty($row['user_cover'])){
		$profile_image_path=$base_url.'uploads/cover/';
		$data= $profile_image_path.$row['user_cover'];
		return $data;
   }else {
	   if($row['user_gender'] == 'male'){
		   $data= $base_url."uploads/cover/safe_male_cover.png";
		   return $data;	
	   }else{
		   $data= $base_url."uploads/cover/safe_female_cover.png";
		   return $data;	
	   }
	   
  } 
}
/*Get User ID when user visited his own profile or other users profile*/ 
public function Dot_UserID($theProfileUrlUsername) 
{
    $theProfileUrlUsername=mysqli_real_escape_string($this->db,$theProfileUrlUsername);
	//Check the username from the users table then get user_id for the profile details
	$query=mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_name='$theProfileUrlUsername' AND user_status='1'");
	if(mysqli_num_rows($query)==1) {
	//This is if user id valid is ok then return user id
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $row['user_id'];
	} else {
	 return false;
	}
}
/*Upload Music*/ 
public function Dot_AudioUpload($uid, $music,$type) 
{
   $ids = 0; 
   $query = mysqli_query($this->db,"INSERT INTO dot_audios (audio_path,audio_page_type,uid_fk)VALUES('$music','$type','$uid')") or die(mysqli_error($this->db)); 
   $ids = mysqli_insert_id($this->db);
   return $ids;
}
/*Get Uploaded Music*/  
public function GetDot_Audio($uid, $music,$type) 
{
	if($music) {
	   //If image is not empty 
	   //The query to select for image path
	  $query = mysqli_query($this->db,"SELECT id,audio_path,audio_page_type FROM dot_audios WHERE audio_path='$music' AND audio_page_type='$type'") or die(mysqli_error($this->db));
	 } else {
	   //The query to select for image id
	   $query = mysqli_query($this->db,"SELECT id,audio_path FROM dot_audios WHERE uid_fk='$uid' ORDER BY id DESC ") or die(mysqli_error($this->db));
	 }
	   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $result;
} 
/*Upload Video*/
public function Dot_VideoUpload($uid, $video_path, $video_ext)  
{
	$video_path = mysqli_real_escape_string($this->db,$video_path);
	$uid = mysqli_real_escape_string($this->db,$uid);
	$video_ext= mysqli_real_escape_string($this->db,$video_ext);
	$ids = 0;
	$query = mysqli_query($this->db,"INSERT INTO dot_videos (video_path,video_ext,uid_fk)VALUES('$video_path','$video_ext' ,'$uid')") or die(mysqli_error($this->db));
	$ids = mysqli_insert_id($this->db);
	return $ids;
} 
/*Get Video Upload*/  
public function Dot_GetVideo($uid,$video_path)   
{	
	 if($video_path)  {
	 $query = mysqli_query($this->db,"SELECT id,video_path FROM dot_videos WHERE video_path='$video_path'") or die(mysqli_error($this->db));
	 } else {
	 $query = mysqli_query($this->db,"SELECT id,video_path FROM dot_videos WHERE uid_fk='$uid' ORDER BY id desc ") or die(mysqli_error($this->db));
	 }
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
} 
/*Save Text Post*/
public function Dot_TextPostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$slugURL,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
    mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db));  
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post, slug,user_feeling) VALUES ('$uid','p_text','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.slug,P.user_feeling,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_text' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result; 
}
/*Save Text Post*/
public function Dot_EventTextPostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$slugURL,$eventPageID) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
    mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	   $saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post, slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_text','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_text' AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID'  ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Image Post*/
public function Dot_EventImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$slugURL,$eventPageID,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_image_id,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_image','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.post_page_type,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_image'  AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Video Post*/
public function Dot_EventVideoPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeVideoID,$slugURL,$eventPageID,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		    $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveVideoFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_video_id,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_video','$time','$ip','$tags','$postTags','$postTitle','$postDetailsHtml','$canSee','$UploadeVideoID','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewVideoPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_video_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_video'   AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewVideoPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Music Event Post*/
public function Dot_EventMusicPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeMusicID,$slugURL,$eventPageID,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		    $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveMusicFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_audio_id,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_audio','$time','$ip','$tags','$postTags','$postTitle','$postDetailsHtml','$canSee','$UploadeMusicID','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewMusicPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_audio_id,P.slug,P.post_page_type,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_audio'  AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewMusicPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Link Post*/
public function Dot_EventLinkPostSave($uid,$postLinkTitle, $postLinkDescription,$canSee, $postTags, $postLinkLink, $postLinkimg, $tags, $postDetailsHtml,$postMiniLink,$slugURL,$eventPageID,$feeling) 
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	$checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveLinkFromData = mysqli_query($this->db,"INSERT INTO `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_text_details,who_can_see_post,post_link_url,post_link_description,post_link_title,post_link_img,post_link_mini_url,slug,post_event_page_id,post_page_type,user_feeling)VALUES('$uid','p_link','$time','$ip','$tags','$postTags','$postDetailsHtml','$canSee','$postLinkLink','$postLinkDescription','$postLinkTitle','$postLinkimg','$postMiniLink','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewLinkPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.hashtag_normal,P.hashtag_diez, P.post_page_type,P.post_text_details,P.who_can_see_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_link' AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewLinkPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Event Filter Image Post*/
public function Dot_EventFilteredImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$filter,$slugURL,$eventPageID,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_image_id,	filter_name,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_image','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$filter','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.filter_name,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_image' AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Text Post*/
public function Dot_EventGifPostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee, $animateImage,$slugURL,$eventPageID,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveGifFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post, gif_url,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_gif','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$animateImage','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewGifPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.comment_status,P.post_page_type,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.gif_url,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_gif' AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewGifPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Text Post*/
public function Dot_EventLocationPostSave($uid, $postLocationPlace, $postAboutLocation, $postTags, $postHashTags,$canSee, $postLat, $postLong,$slugURL,$eventPageID,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		    $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,user_lat ,user_lang,slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_location','$time','$ip','$postHashTags','$postTags','$postLocationPlace','$postAboutLocation','$canSee','$postLat','$postLong','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.user_lat, P.user_lang,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_location' AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	}else{
      return false;
    } 
}
/*Save Text Post*/
public function Dot_EventWaterMarkPostSave($uid, $postDetails, $postTags, $postHashTags,$canSee,$slugURL,$waterMarkID,$eventPageID,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	$checkWaterMarkIDExist = mysqli_query($this->db,"SELECT watermark_id FROM dot_watermarks WHERE watermark_id = '$waterMarkID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkWaterMarkIDExist) == 1 && mysqli_num_rows($checkEventExist) == 1){
		$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,watermarkid,post_text_details,who_can_see_post, slug,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_watermark','$time','$ip','$postHashTags','$postTags','$waterMarkID','$postDetails','$canSee','$slugURL','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
		$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.watermarkid,P.post_text_details,P.who_can_see_post,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_watermark'  AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
		$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
		return $result;
	}else{
	    return false;
	}
}
/*Save Image Post*/
public function Dot_EventWhichImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$slugURL, $selectedCategory,$eventPageID,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventPageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,which_image,slug,whc_category,post_event_page_id,post_page_type,user_feeling) VALUES ('$uid','p_which','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$slugURL','$selectedCategory','$eventPageID','event','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.which_image,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_which'  AND P.post_page_type = 'event' AND post_event_page_id='$eventPageID'  ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	}else{
	    return false;
	}
}
/*Save Text Post*/
public function Dot_WaterMarkPostSave($uid, $postDetails, $postTags, $postHashTags,$canSee,$slugURL,$waterMarkID,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$checkWaterMarkIDExist = mysqli_query($this->db,"SELECT watermark_id FROM dot_watermarks WHERE watermark_id = '$waterMarkID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkWaterMarkIDExist) == 1){
		$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,watermarkid,post_text_details,who_can_see_post, slug,user_feeling) VALUES ('$uid','p_watermark','$time','$ip','$postHashTags','$postTags','$waterMarkID','$postDetails','$canSee','$slugURL','$feeling')") or die(mysqli_error($this->db));
		$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.watermarkid,P.post_text_details,P.who_can_see_post,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_watermark' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
		$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
		return $result;
	}else{
	    return false;
	}
}
/*Save Text Post*/
public function Dot_LocationPostSave($uid, $postLocationPlace, $postAboutLocation, $postTags, $postHashTags,$canSee, $postLat, $postLong,$slugURL,$feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,user_lat ,user_lang,slug,user_feeling) VALUES ('$uid','p_location','$time','$ip','$postHashTags','$postTags','$postLocationPlace','$postAboutLocation','$canSee','$postLat','$postLong','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.user_lat, P.user_lang,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_location' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Text Post*/
public function Dot_GifPostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee, $animateImage,$slugURL, $feeling) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveGifFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post, gif_url,slug,user_feeling) VALUES ('$uid','p_gif','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$animateImage','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewGifPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.comment_status,P.post_page_type,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.gif_url,P.user_feeling,P.slug, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_gif' AND P.post_page_type = 'wall'  ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewGifPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Image Post*/
public function Dot_ImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$slugURL,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_image_id,slug,user_feeling) VALUES ('$uid','p_image','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.post_page_type,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_image' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}

/*Save Image Post*/
public function Dot_WhichImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$slugURL, $selectedCategory,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,which_image,slug,whc_category,user_feeling) VALUES ('$uid','p_which','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$slugURL','$selectedCategory','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.which_image,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_which' AND P.post_page_type = 'wall'  ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Before After Image Post*/
public function Dot_BeforeAfterImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$slugURL,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,before_after_images,slug,user_feeling) VALUES ('$uid','p_bfaf','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.before_after_images,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_bfaf' AND P.post_page_type = 'wall'  ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Image Post*/
public function Dot_FilteredImagePostSave($uid, $postTitle, $postDetails, $postTags, $postHashTags,$canSee,$UploadValues,$filter,$slugURL,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_image_id,	filter_name,slug,user_feeling) VALUES ('$uid','p_image','$time','$ip','$postHashTags','$postTags','$postTitle','$postDetails','$canSee','$UploadValues','$filter','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.filter_name,P.slug,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_image' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Link Post*/
public function Dot_LinkPostSave($uid,$postLinkTitle, $postLinkDescription,$canSee, $postTags, $postLinkLink, $postLinkimg, $tags, $postDetailsHtml,$postMiniLink,$slugURL,$feeling) 
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	$saveLinkFromData = mysqli_query($this->db,"INSERT INTO `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_text_details,who_can_see_post,post_link_url,post_link_description,post_link_title,post_link_img,post_link_mini_url,slug,user_feeling)VALUES('$uid','p_link','$time','$ip','$tags','$postTags','$postDetailsHtml','$canSee','$postLinkLink','$postLinkDescription','$postLinkTitle','$postLinkimg','$postMiniLink','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewLinkPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.hashtag_normal,P.hashtag_diez, P.post_page_type,P.post_text_details,P.who_can_see_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.slug,P.user_feeling,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_link' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewLinkPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Video Post*/
public function Dot_VideoPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeVideoID,$slugURL,$feeling,$videoScreenShot)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveVideoFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_video_id,slug,user_feeling,post_video_name) VALUES ('$uid','p_video','$time','$ip','$tags','$postTags','$postTitle','$postDetailsHtml','$canSee','$UploadeVideoID','$slugURL','$feeling','$videoScreenShot')") or die(mysqli_error($this->db));
	$getNewVideoPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.post_page_type,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_video_id,P.slug,P.user_feeling,P.post_video_name,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_video' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewVideoPost, MYSQLI_ASSOC);
	return $result;
}
/*Save Music Post*/
public function Dot_MusicPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeMusicID,$slugURL,$feeling)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveMusicFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,hashtag_normal,hashtag_diez,post_title_text,post_text_details,who_can_see_post,post_audio_id,slug,user_feeling) VALUES ('$uid','p_audio','$time','$ip','$tags','$postTags','$postTitle','$postDetailsHtml','$canSee','$UploadeMusicID','$slugURL','$feeling')") or die(mysqli_error($this->db));
	$getNewMusicPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_audio_id,P.slug,P.post_page_type,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,U.pro_user_type FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_audio' AND P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewMusicPost, MYSQLI_ASSOC);
	return $result;
}
/*Get All Post From Data*/
public function Dot_AllFriendsPost($uid, $lastPostID)
{
    $morePost=""; 
   if($lastPostID) {
	  //build up the query
	  $morePost=" and P.user_post_id <'".$lastPostID."' ";
   }
	$data = null;
	/*$getData = mysqli_query($this->db,"
	SELECT DISTINCT 
	P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message   
	FROM  dot_friends F, dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U FORCE INDEX (ix_status_istatus)
    ON P.user_id_fk = U.user_id AND U.user_status='1' WHERE P.user_id_fk = F.user_two AND F.user_one='$uid' AND  (F.role = 'fri' OR F.role = 'me' OR F.role = 'flwr') AND  P.post_page_type IN('wall','market') $morePost GROUP BY P.user_post_id DESC limit " .$this->perpage) or die(mysqli_error($this->db));*/
	$getData = mysqli_query($this->db,"
	SELECT DISTINCT 
	P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status,F.user_one, F.user_two   
	FROM dot_friends F FORCE INDEX (ix_user_one_user_two)
         INNER JOIN dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
         ON P.user_id_fk = F.user_two
         INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
         ON P.user_id_fk = U.user_id AND U.user_status='1'  AND F.role IN('me','fri','flwr') AND  P.post_page_type IN('wall','market') 
    WHERE F.user_one='$uid' $morePost GROUP BY P.user_post_id DESC limit " .$this->perpage) or die(mysqli_error($this->db));  
	$UpdateShowBetweenPost = mysqli_query($this->db,"UPDATE dot_users SET  show_suggest_hashTags = show_suggest_hashTags + 1 , show_suggest_users = show_suggest_users + 1 , show_advertisement = show_advertisement + 1, show_google_ads = show_google_ads + 1 WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	 //Store the result
	 while($row=mysqli_fetch_array($getData)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
 
// Upadate Suggested HashTags Show Between Post
public function Dot_UpdateShowSuggestedHashTags($uid){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserExist) > 0){
	    $UpdateShowBetweenPost = mysqli_query($this->db,"UPDATE dot_users SET  show_suggest_hashTags = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	}
}
// Upadate Suggested Users Show Between Post
public function Dot_UpdateShowSuggestedUsers($uid){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserExist) > 0){
	    $UpdateShowBetweenPost = mysqli_query($this->db,"UPDATE dot_users SET  show_suggest_users = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	}
}
// Upadate Advertisements  Between Post
public function Dot_UpdateShowSuggestedAdvertisements($uid){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserExist) > 0){
	    $UpdateShowBetweenPost = mysqli_query($this->db,"UPDATE dot_users SET  show_advertisement = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	}
}
// Upadate Google Advertisements  Between Post
public function Dot_UpdateShowSuggestedGoogleAdvertisements($uid){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserExist) > 0){
	    $UpdateShowBetweenPost = mysqli_query($this->db,"UPDATE dot_users SET  show_google_ads = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	}
}

/*Get All User Event Posts From Data*/
public function Dot_AllEventPost($lastProfilePostID, $eventID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_event_page_id,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.user_feeling, P.post_video_name, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.post_page_type = 'event' AND P.post_event_page_id = '$eventID'  $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get All Text Posts From User Profile*/
public function Dot_UserProfileTextPosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_page_type,P.post_video_id,P.post_audio_id,P.slug,P.shared_post,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_id_fk='$uid' AND P.post_type ='p_text' AND P.post_page_type = 'wall' $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get All Image Posts From User Profile*/
public function Dot_UserProfileImagePosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_page_type,P.post_video_id,P.post_audio_id,P.filter_name,P.slug,P.shared_post,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_id_fk='$uid' AND P.post_type ='p_image' AND P.post_page_type = 'wall'  $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get User Uploaded Latest Image Posts*/
public function Dot_PhotosWidget($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$profileAboutPhotosQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_image_id,P.filter_name,P.comment_status,P.slug, U.user_name, U.user_fullname,U.verified_user
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U FORCE INDEX (ix_status_istatus)
    ON
	P.user_id_fk = U.user_id AND 
     U.user_status='1' 
	 WHERE P.user_id_fk='$uid' AND P.post_type ='p_image' ORDER BY rand() LIMIT 6") or die(mysqli_error($this->db));
		 //Store the result
	while($row=mysqli_fetch_array($profileAboutPhotosQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
/*Get All Video Posts From User Profile*/
public function Dot_UserProfileVideoPosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_page_type,P.post_video_id,P.post_audio_id,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_id_fk='$uid' AND P.post_type ='p_video' AND P.post_page_type = 'wall'  $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get All Link Posts From User Profile*/
public function Dot_UserProfileLinkPosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.comment_status,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_page_type,P.post_video_id,P.post_audio_id,P.slug,P.shared_post,P.user_feeling, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_id_fk='$uid' AND P.post_type ='p_link' AND P.post_page_type = 'wall' $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get All Music Posts From User Profile*/
public function Dot_UserProfileMusicPosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.comment_status,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_page_type,P.post_audio_id,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_id_fk='$uid' AND P.post_type ='p_audio' AND P.post_page_type = 'wall' $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}

// Vote Image 
public function Dot_VoteWhichPost($uid, $post_id, $voted_image_id)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $postID = mysqli_real_escape_string($this->db, $post_id);
   //Check this $uid is already liked  this $postID from dot_post_like table
   $CheckUserVotedBefore = mysqli_query($this->db,"SELECT vote_id FROM dot_votes_by_which WHERE voted_user_id_fk='$uid' AND voted_image_post_id='$post_id'") or die(mysqli_error($this->db)); 
   //Check user exist from dot_users table
   $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   // Check the post already in data
   $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserVotedBefore)==0){
       if(mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {
			  $time = time(); 
			  //Save this $postID from dot_post_like table
			  $query=mysqli_query($this->db,"INSERT INTO dot_votes_by_which (voted_image_id ,voted_image_post_id,voted_user_id_fk,voted_time) VALUES('$voted_image_id','$post_id','$uid','$time')") or die(mysqli_error($this->db));
			  //Get Post Owner user_id from the dot_user_posts list
			  $GetPostOwnerID = mysqli_query($this->db,"SELECT user_id_fk FROM `dot_user_posts` WHERE user_post_id= '$postID'") or die(mysqli_error($this->db));
			  $dataPostCreatedID = mysqli_fetch_array($GetPostOwnerID, MYSQLI_ASSOC);
			  $OwnerUid = $dataPostCreatedID['user_id_fk'];
			  $CheckUserWantedNotification = mysqli_query($this->db,"SELECT post_like_notification FROM dot_users WHERE user_id = '$OwnerUid'") or die(mysqli_error($this->db));
			  $dataWantedNotification = mysqli_fetch_array($CheckUserWantedNotification, MYSQLI_ASSOC);
			  $CheckUserWantedToNotificationGet = $dataWantedNotification['post_like_notification'];
			  //Create notification for this $postID from this $owner_uid
			  if($OwnerUid !== $uid && $CheckUserWantedToNotificationGet == '1'){
				 $query=mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,not_time,not_uid_fk,not_post_id_fk,not_read_status,not_post_owner_id_fk,note_type_type) VALUES('p_which','$time','$uid','$postID','0','$OwnerUid','post_voted')") or die(mysqli_error($this->db)); 
				 $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count +1 WHERE user_id = '$OwnerUid' AND user_status = '1'") or die(mysqli_error($this->db));
			  }
			  //Count how many people liked this post
			  $CountLike = mysqli_query($this->db,"SELECT which_image FROM `dot_user_posts` WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
			  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
			  return $row['which_image']; 
	   }else{
		  return false;
	   }
   }else {
       if(mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {
			  $time = time(); 
			  // Update the Vote
			  $updateVote = mysqli_query($this->db,"UPDATE dot_votes_by_which SET voted_image_id = '$voted_image_id', voted_time = '$time' WHERE voted_image_post_id = '$postID' AND voted_user_id_fk = '$uid'") or die(mysqli_error($this->db)); 
			  //Get Post Owner user_id from the dot_user_posts list
			  $GetPostOwnerID = mysqli_query($this->db,"SELECT user_id_fk FROM `dot_user_posts` WHERE user_post_id= '$postID'") or die(mysqli_error($this->db)); 
			  //Count how many people liked this post
			  $CountLike = mysqli_query($this->db,"SELECT which_image FROM `dot_user_posts` WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
			  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
			  return $row['which_image']; 
	   }else{
		  return false;
	   }
   }
   
}
// Check Post Voted Before

public function Dot_CheckVotedBefore($uid,$pid)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $pid = mysqli_real_escape_string($this->db, $pid);
     //Check this $uid is already liked  this $postID from dot_post_like table
     $CheckUserVotedBefore = mysqli_query($this->db,"SELECT vote_id FROM dot_votes_by_which WHERE voted_user_id_fk='$uid' AND voted_image_id='$pid'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($CheckUserVotedBefore) == 1){
         return true;
	 } else{
	    return false;
	 }   
}
// Count Vote by ID
public function Dot_CountVoteByID($postID)
{
      //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postVoteCount FROM dot_votes_by_which WHERE voted_image_id = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postVoteCount'];
}
// Count Vote by ID
public function Dot_CountVoteByallID($postID)
{
    //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postVoteiCount FROM dot_votes_by_which WHERE voted_image_post_id = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postVoteiCount'];
}
// Unlike Post
public function Dot_UnlikeThisPost($uid, $post_id, $postNotTypeStatus){
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  $postNotTypeStatus = mysqli_real_escape_string($this->db, $postNotTypeStatus);
  //Check this $uid is already liked  this $postID from dot_post_like table
  $CheckUserLikedBefore = mysqli_query($this->db,"SELECT like_id FROM dot_post_like WHERE liked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
   //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
  // Unlike 
  $CheckUserUnLikedBefore = mysqli_query($this->db,"SELECT unlike_id FROM dot_post_unlike WHERE unliked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
  if(mysqli_num_rows($CheckUserLikedBefore) == 1){
      $this->Dot_UnLikePost($uid, $post_id, $postNotTypeStatus);
  }
  if(mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1 && mysqli_num_rows($CheckUserUnLikedBefore) == 0) {
      $time = time(); 
	  //Save this $postID from dot_post_like table
	  $query=mysqli_query($this->db,"INSERT INTO dot_post_unlike (post_id_fk,unliked_uid_fk,unliked_post_type,liked_time) VALUES('$postID','$uid','$postNotTypeStatus','$time')") or die(mysqli_error($this->db));
	  //Get Post Owner user_id from the dot_user_posts list
	  $GetPostOwnerID = mysqli_query($this->db,"SELECT user_id_fk FROM `dot_user_posts` WHERE user_post_id= '$postID'") or die(mysqli_error($this->db));  
	  //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postUnLikeCount FROM dot_post_unlike WHERE post_id_fk = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postUnLikeCount'];
  }
} 
/*Remove The Saved Post from dot_post_like table*/
public function Dot_UserUnLikedPost($uid, $post_id)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  //Check this $uid is already liked  this $postID from dot_post_like table
  $CheckUserUnLikedBefore = mysqli_query($this->db,"SELECT unlike_id FROM dot_post_unlike WHERE unliked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
  //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserUnLikedBefore) == 1 && mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {
	    //Delete this $postID from table
	    $RemoveLikedPostFromData=mysqli_query($this->db,"DELETE FROM dot_post_unlike WHERE post_id_fk='$postID' AND unliked_uid_fk='$uid'") or die(mysqli_error($this->db));
	    //Count how many people liked this post
	    $CountUnLike = mysqli_query($this->db,"SELECT COUNT(*) AS removeThisUnLikeCount FROM dot_post_unlike WHERE post_id_fk='$postID'") or die(mysqli_error($this->db));
	    $row = mysqli_fetch_array($CountUnLike, MYSQLI_ASSOC);  
	    return $row['removeThisUnLikeCount'];
   }
}
// Total Post Unliked
public function Dot_TotalPostUnliked($postID){
     $postID = mysqli_real_escape_string($this->db, $postID);
	 $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postThisLikeCount FROM dot_post_unlike WHERE post_id_fk = '$postID'") or die(mysqli_error($this->db));
	 $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postThisLikeCount'];
}
/*Save the liked post*/
public function Dot_LikePost($uid, $post_id,$postNotTypeStatus)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  $postNotTypeStatus = mysqli_real_escape_string($this->db, $postNotTypeStatus);
  //Check this $uid is already liked  this $postID from dot_post_like table
  $CheckUserLikedBefore = mysqli_query($this->db,"SELECT like_id FROM dot_post_like WHERE liked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
   //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
  $CheckUserUnLikedBefore = mysqli_query($this->db,"SELECT unlike_id FROM dot_post_unlike WHERE unliked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
  if(mysqli_num_rows($CheckUserUnLikedBefore) == 1){
	  $this->Dot_UserUnLikedPost($uid, $post_id);
  }
  //If $CheckUserLikedBefore is an equal zero then save this $uid and $postID from the dot_post_like
  if(mysqli_num_rows($CheckUserLikedBefore)==0 && mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {
      $time = time(); 
	  //Save this $postID from dot_post_like table
	  $query=mysqli_query($this->db,"INSERT INTO dot_post_like (post_id_fk,liked_uid_fk,liked_post_type,liked_time) VALUES('$postID','$uid','$postNotTypeStatus','$time')") or die(mysqli_error($this->db));
	  //Get Post Owner user_id from the dot_user_posts list
	  $GetPostOwnerID = mysqli_query($this->db,"SELECT user_id_fk FROM `dot_user_posts` WHERE user_post_id= '$postID'") or die(mysqli_error($this->db));
	  $dataPostCreatedID = mysqli_fetch_array($GetPostOwnerID, MYSQLI_ASSOC);
	  $OwnerUid = $dataPostCreatedID['user_id_fk'];
	  $CheckUserWantedNotification = mysqli_query($this->db,"SELECT post_like_notification FROM dot_users WHERE user_id = '$OwnerUid'") or die(mysqli_error($this->db));
	  $dataWantedNotification = mysqli_fetch_array($CheckUserWantedNotification, MYSQLI_ASSOC);
	  $CheckUserWantedToNotificationGet = $dataWantedNotification['post_like_notification'];
	  //Create notification for this $postID from this $owner_uid
	  if($OwnerUid !== $uid && $CheckUserWantedToNotificationGet == '1'){
	     $query=mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,not_time,not_uid_fk,not_post_id_fk,not_read_status,not_post_owner_id_fk,note_type_type) VALUES('$postNotTypeStatus','$time','$uid','$postID','0','$OwnerUid','post_like')") or die(mysqli_error($this->db)); 
		 $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count +1 WHERE user_id = '$OwnerUid' AND user_status = '1'") or die(mysqli_error($this->db));
	  } 
	  //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postLikeCount FROM dot_post_like WHERE post_id_fk = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postLikeCount'];
  }
}
/*Remove The Saved Post from dot_post_like table*/
public function Dot_UnLikePost($uid, $post_id,$postNotTypeStatus)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  //Check this $uid is already liked  this $postID from dot_post_like table
  $CheckUserLikedBefore = mysqli_query($this->db,"SELECT like_id FROM dot_post_like WHERE liked_uid_fk='$uid' AND post_id_fk='$postID'") or die(mysqli_error($this->db)); 
  //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
  //If $CheckUserLikedBefore is an equal one then delete this $uid and $postID from the dot_post_like
  if(mysqli_num_rows($CheckUserLikedBefore) == 1 && mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {  
	  //Delete this Note from dot_notifications
	  $DeleteNoteFromData=mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_post_id_fk='$postID' AND not_uid_fk='$uid'") or die(mysqli_error($this->db));
	  $GetPostOwnerID = mysqli_query($this->db,"SELECT user_id_fk FROM `dot_user_posts` WHERE user_post_id= '$postID'") or die(mysqli_error($this->db));
	  $dataPostCreatedID = mysqli_fetch_array($GetPostOwnerID, MYSQLI_ASSOC);
	  $OwnerUid = $dataPostCreatedID['user_id_fk']; 
	  $CheckPostNotificationCount = mysqli_query($this->db,"SELECT notification_count, user_id FROM dot_users WHERE user_id = '$OwnerUid'") or die(mysqli_error($this->db));
	  $dataNotificationCount = mysqli_fetch_array($CheckPostNotificationCount, MYSQLI_ASSOC);
	  $userNotificationCound = $dataNotificationCount['notification_count'];
	  if($userNotificationCound > 0){
	      $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count - 1 WHERE user_id = '$OwnerUid' AND user_status = '1'") or die(mysqli_error($this->db));
	  }
      //Delete this $postID from table
	  $RemoveLikedPostFromData=mysqli_query($this->db,"DELETE FROM dot_post_like WHERE post_id_fk='$postID' AND liked_uid_fk='$uid'") or die(mysqli_error($this->db));
	  //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postLikeCount FROM dot_post_like WHERE post_id_fk = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postLikeCount'];
  }
}
/*Check User Liked Post Before*/ 
public function Dot_CheckPostLiked($uid, $post_id) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	$post_id=mysqli_real_escape_string($this->db,$post_id); 
	//Check The loged in user id is liked this $post_id from the dot_post_like
	 $q=mysqli_query($this->db,"SELECT like_id FROM dot_post_like WHERE  liked_uid_fk='$uid' and post_id_fk='$post_id'") or die(mysqli_error($this->db));
	// Output the result
	if(mysqli_num_rows($q)==1) {
		//If this $uid and $post_id is in the dot_post_like table then return true
		return true;
	 } else {
		 //If this $uid and $post_id is not in the dot_post_like table then return false
		 return false;
	 }
}
/*Check User Liked Post Before*/ 
public function Dot_CheckPostUnLiked($uid, $post_id) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	$post_id=mysqli_real_escape_string($this->db,$post_id); 
	//Check The loged in user id is liked this $post_id from the dot_post_like
	 $q=mysqli_query($this->db,"SELECT unlike_id FROM dot_post_unlike WHERE unliked_uid_fk='$uid' and post_id_fk='$post_id'") or die(mysqli_error($this->db));
	// Output the result
	if(mysqli_num_rows($q)==1) {
		//If this $uid and $post_id is in the dot_post_like table then return true
		return true;
	 } else {
		 //If this $uid and $post_id is not in the dot_post_like table then return false
		 return false;
	 }
}
/*Total uniq Post Like Count*/ 
public function Dot_UniqPostLikeCount($post_id) 
{
	$post_id = mysqli_real_escape_string($this->db,$post_id); 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS UniqLikeCount FROM dot_post_like WHERE post_id_fk = '$post_id'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['UniqLikeCount'];
	 } else{
		  return false;
	 }
}
/*Total Uniq Post Comment Count*/
public function Dot_UniqPostCommentCount($post_id)
{
	$post_id = mysqli_real_escape_string($this->db,$post_id); 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS UniqCommentCount FROM dot_post_comments WHERE post_id_fk = '$post_id'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['UniqCommentCount'];
	 } else{
		  return false;
	 } 
}
/*Save the Post from Favourite List*/
public function Dot_AdFavouritePost($uid, $post_id)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  //Check this uid is already added this  $postID from the dot_favourite_list
  $CheckUserLikedBefore = mysqli_query($this->db,"SELECT fav_id FROM dot_favourite_list WHERE fav_uid_fk='$uid' AND fav_post_id='$postID'") or die(mysqli_error($this->db)); 
  //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
  //If $CheckUserLikedBefore is an equal zero then save this $uid and $postID from the dot_post_like
  if(mysqli_num_rows($CheckUserLikedBefore)==0 && mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) {
      $time = time(); 
	  //Insert this $postID from favourite list form this $uid
	  $query=mysqli_query($this->db,"INSERT INTO dot_favourite_list (fav_post_id,fav_uid_fk,fav_created) VALUES('$postID','$uid','$time')") or die(mysqli_error($this->db)); 
	  return true;
  }
}
/*Remove the from Favourite Post*/
public function Dot_RemoveFavouritePost($uid, $post_id)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $postID = mysqli_real_escape_string($this->db, $post_id);
  //Check this $uid is already liked  this $postID from dot_post_like table
  $CheckUserLikedBefore = mysqli_query($this->db,"SELECT fav_id FROM dot_favourite_list WHERE fav_uid_fk='$uid' AND fav_post_id='$postID'") or die(mysqli_error($this->db)); 
  //Check user exist from dot_users table
  $CheckUserIDFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
  // Check the post already in data
  $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
  //If $CheckUserLikedBefore is an equal one then delete this $uid and $postID from the dot_post_like
  if(mysqli_num_rows($CheckUserLikedBefore) == 1 && mysqli_num_rows($CheckUserIDFromData) == 1 && mysqli_num_rows($CheckPostIDFromData) == 1) { 
      //Delete this $postID from table
	  $RemoveLikedPostFromData=mysqli_query($this->db,"DELETE FROM dot_favourite_list WHERE fav_post_id='$postID' AND fav_uid_fk='$uid'") or die(mysqli_error($this->db)); 
	  return true;
  }
}
/*Check Post added the favourite list*/
public function Dot_PostAddedFavouriteListBefore($uid, $post_id)
{
   $uid=mysqli_real_escape_string($this->db,$uid);
   $post_id=mysqli_real_escape_string($this->db,$post_id); 
	//Check The loged in user id is added  this $post_id from the dot_favourite_list
	$q=mysqli_query($this->db,"SELECT fav_id FROM dot_favourite_list WHERE  fav_uid_fk='$uid' and fav_post_id='$post_id'") or die(mysqli_error($this->db));
	// Output the result
	if(mysqli_num_rows($q)==1) {
		//If this $uid and $post_id is in the dot_favourite_list table then return true
		return true;
	 } else {
		 //If this $uid and $post_id is not in the dot_favourite_list table then return false
		 return false;
	 }
}
/*Check The Friends Status from dot_friends table*/ 
public function Dot_FriendStatus($uid, $userID) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	$userID=mysqli_real_escape_string($this->db,$userID); 
	// Check the user role me, 1, fri  
	// me is loged in user role, 1 is friend request waiting approval and fri is user_one and user_two is already friends
	$GetFriendStatus=mysqli_query($this->db,"SELECT role FROM dot_friends WHERE user_one='$uid' AND user_two='$userID'") or die(mysqli_error($this->db));	
    $role=mysqli_fetch_array($GetFriendStatus,MYSQLI_ASSOC);
	//return the user role me, 1 or fri
	return $role['role'];	 
}
public function Dot_CheckUserFriendStatusForVideoCall($uid, $userID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$userID=mysqli_real_escape_string($this->db,$userID); 
	// Check the user role me, 1, fri  
	// me is loged in user role, 1 is friend request waiting approval and fri is user_one and user_two is already friends
	$GetFriendStatus=mysqli_query($this->db,"SELECT role FROM dot_friends WHERE user_one='$uid' AND user_two='$userID' AND role IN('flwr','fri')") or die(mysqli_error($this->db));	
    if(mysqli_num_rows($GetFriendStatus) == 1){return true;}else{return false;}
}
// User Post Count
public function Dot_UserPostCount($uid) 
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	//Calculate the post for this $uid
	$CalculateThePost= mysqli_query($this->db,"SELECT COUNT(*) AS userPostCount FROM dot_user_posts WHERE user_id_fk = '$uid'")or die(mysqli_error($this->db));
	$sumPosts = mysqli_fetch_array($CalculateThePost,MYSQLI_ASSOC);
	if($sumPosts) { 
	    //return the userPostcount
		return $sumPosts['userPostCount'];
     }else{
	 return 0;
	}   
}
/*User Friends Conunt*/
public function Dot_UserFriendsCount($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   //Calculate the Friens for this $uid
   $CalculateTheFriends = mysqli_query($this->db,"SELECT COUNT(*) AS userFriendsCount FROM dot_friends WHERE  user_one = '$uid' AND role='flwr'") or die(mysqli_error($this->db));
   $sumFriens = mysqli_fetch_array($CalculateTheFriends,MYSQLI_ASSOC);
   if($sumFriens) { 
	    //return the userPostcount
		return $sumFriens['userFriendsCount'];
     }else{
	 return 0;
	}   
}

/*User Follower Count*/
public function Dot_UserFollowersCount($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   //Calculate the Friens for this $uid
   $CalculateTheFollower = mysqli_query($this->db,"SELECT COUNT(*) AS userFollowerCount FROM dot_friends WHERE  user_two = '$uid' AND role='flwr'") or die(mysqli_error($this->db));
   $sumFollower = mysqli_fetch_array($CalculateTheFollower,MYSQLI_ASSOC);
   if($sumFollower) { 
	    //return the userPostcount
		return $sumFollower['userFollowerCount'];
     }else{
	 return 0;
	}   
}
/* User Post Comments  */
public function Comments($postID,$second) 
{
	$postID=mysqli_real_escape_string($this->db,$postID);
	$query='';
	if($second) {   $query="limit $second,5"; 	}
	//Query the dot_post_comments and dot_users table and check existing user and created post
	$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip,C.sticker,C.gif, C.comment_created_time,C.voice, U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$postID' ORDER BY C.comment_id ASC $query") or die(mysqli_error($this->db)); 
	// Fetch the results set
	while($row=mysqli_fetch_array($DataComments,MYSQLI_ASSOC)) { 
	     // Store the result into array
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}  
/*Create a new Comment From Data*/
public function Dot_AddNewComment($CommentPostID, $CommentText, $commentedUid, $UserCreatedType, $userVoice) 
{
    $CommentPostID = mysqli_real_escape_string($this->db, $CommentPostID); 
	$commentedUid = mysqli_real_escape_string($this->db,$commentedUid);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	// Check the post already in data
    $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckPostIDFromData) == 1){
		 mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db));
	    $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,comment_text,user_ip,comment_created_time,post_id_fk,voice)VALUES('$commentedUid','$CommentText','$ip','$time','$CommentPostID','$userVoice')") or die(mysqli_error($this->db));
		//Create Notification for post owner
	    // Get post type from data_user_posts for a notification
	    $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $commentedUid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$commentedUid','$CommentPostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip, C.comment_created_time,C.voice, U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$CommentPostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
// Get Post Type 
public function Dot_DataPostType($CommentPostID){
    $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	 // Fetch the results set
    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
    $CreatedPostType = $dataPostCreatedType['post_type'];
	return $CreatedPostType;
}
/*Save Fast Emoji Answer*/
public function Dot_SaveSendedFastAnswer($uid,$PostID,$fastKey,$UserCreatedType)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$PostID = mysqli_real_escape_string($this->db, $PostID);
	$fastKey = mysqli_real_escape_string($this->db, $fastKey);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$checkUser = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$checkPostID = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	$checkEmojiKey = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_key = '$fastKey'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUser)  == 1 && mysqli_num_rows($checkPostID)  == 1 && mysqli_num_rows($checkEmojiKey)  == 1){
	     $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,comment_text,user_ip,comment_created_time,post_id_fk)VALUES('$uid','$fastKey','$ip','$time','$PostID')") or die(mysqli_error($this->db));
		 $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $uid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$uid','$PostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip, C.comment_created_time, U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$PostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
/*Save the Liked Comment*/
public function Dot_LikeComment($uid, $commentID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$commentID = mysqli_real_escape_string($this->db, $commentID);
	//Check Comment for already in data
	$CheckCommentID = mysqli_query($this->db,"SELECT comment_id FROM dot_post_comments WHERE comment_id = '$commentID'") or die(mysqli_error($this->db));
	$CheckCommendLikedBefore = mysqli_query($this->db,"SELECT comment_id_fk FROM dot_comment_like WHERE comment_id_fk = '$commentID' AND liked_uid_fk = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckCommentID) == 1 && mysqli_num_rows($CheckCommendLikedBefore) == 0){
	   $time = time(); 
	   // Get commented user id and commented post id from the dot_post_comments for a notifications
	   $GetPostIDFromCommentData = mysqli_query($this->db,"SELECT uid_fk,post_id_fk FROM dot_post_comments WHERE comment_id ='$commentID'") or die(mysqli_error($this->db));
	   // Fetch the results set
	   $dataPostCreatedID = mysqli_fetch_array($GetPostIDFromCommentData, MYSQLI_ASSOC);
	   $OwnerUid = $dataPostCreatedID['uid_fk'];
	   $CommentedPostID = $dataPostCreatedID['post_id_fk'];
	   // Get post type from data_user_posts for a notification
	   $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type FROM dot_user_posts WHERE user_post_id = '$CommentedPostID'") or die(mysqli_error($this->db));
	   // Fetch the results set
	   $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	   $CreatedPostType = $dataPostCreatedType['post_type'];
	   $CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,comment_like_notification FROM dot_users WHERE user_id = '$OwnerUid'") or die(mysqli_error($this->db));
	   $dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
	   $GetNotification = $dataPostCreatedUserID['comment_like_notification'];
	   //Create notification for this $postID from this $owner_uid
	   if($OwnerUid !== $uid && $GetNotification == '1'){
	      $query=mysqli_query($this->db,"INSERT INTO dot_notifications (not_type,not_time,not_uid_fk,not_post_id_fk,not_read_status,not_post_owner_id_fk,note_type_type) VALUES('$CreatedPostType','$time','$uid','$CommentedPostID','0','$OwnerUid','post_comment_like')") or die(mysqli_error($this->db)); 
	      $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$OwnerUid' AND user_status = '1'") or die(mysqli_error($this->db));
	   } 
	   $InsertCommentLike = mysqli_query($this->db,"INSERT INTO dot_comment_like(comment_id_fk,liked_uid_fk,liked_time)VALUES('$commentID','$uid','$time')") or die(mysqli_error($this->db));
	    //Count how many people liked this post
	   $CountCommentLike = mysqli_query($this->db,"SELECT COUNT(*) AS CommentLikeCount FROM dot_comment_like WHERE comment_id_fk = '$commentID'") or die(mysqli_error($this->db));
	   $row = mysqli_fetch_array($CountCommentLike, MYSQLI_ASSOC);  
	   return $row['CommentLikeCount'];
	}
}
/*Remove The Liked Comment*/
public function Dot_UnLikecomment($uid, $commentID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$commentID = mysqli_real_escape_string($this->db, $commentID);
    //Check Comment for already in data
	$CheckCommentID = mysqli_query($this->db,"SELECT comment_id FROM dot_post_comments WHERE comment_id = '$commentID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckCommentID) == 1){
        $DeleteCommentLike = mysqli_query($this->db,"DELETE FROM dot_comment_like WHERE comment_id_fk='$commentID' AND liked_uid_fk='$uid'") or die(mysqli_error($this->db));
		$DeleteCommentLikeFromNotificationTable =  mysqli_query($this->db,"DELETE FROM dot_notifications WHERE note_type_type='post_comment_like' AND not_uid_fk='$uid'") or die(mysqli_error($this->db)); 
		$getCommentOwner = mysqli_query($this->db,"SELECT comment_id,post_id_fk FROM dot_post_comments WHERE comment_id = '$commentID'") or die(mysqli_error($this->db));
		$getOwnerInformation = mysqli_fetch_array($getCommentOwner, MYSQLI_ASSOC);
		$postID = $getOwnerInformation['post_id_fk'];
	    $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC); 
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk'];  
		$CheckPostNotificationCount = mysqli_query($this->db,"SELECT notification_count, user_id FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
	    $dataNotificationCount = mysqli_fetch_array($CheckPostNotificationCount, MYSQLI_ASSOC);
	    $userNotificationCound = $dataNotificationCount['notification_count'];
	    if($userNotificationCound > 0){
	        $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count - 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
	    }
		//Count how many people liked this post
	    $CountCommentLike = mysqli_query($this->db,"SELECT COUNT(*) AS CommentLikeCount FROM dot_comment_like WHERE comment_id_fk = '$commentID'") or die(mysqli_error($this->db));
	    $row = mysqli_fetch_array($CountCommentLike, MYSQLI_ASSOC);  
	    return $row['CommentLikeCount'];
	}
}
/*Check User Liked Comment Before*/ 
public function Dot_CheckCommentLiked($uid, $CommendID) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	$CommendID=mysqli_real_escape_string($this->db,$CommendID); 
	//Check The loged in user id is liked this $CommendID from the dot_comment_like
	 $q=mysqli_query($this->db,"SELECT like_id FROM dot_comment_like WHERE  liked_uid_fk='$uid' and comment_id_fk='$CommendID'") or die(mysqli_error($this->db));
	// Output the result
	if(mysqli_num_rows($q)==1) {
		//If this $uid and $post_id is in the dot_post_like table then return true
		return true;
	 } else {
		 //If this $uid and $post_id is not in the dot_post_like table then return false
		 return false;
	 }
}
/*Total uniq Comment Like Count*/ 
public function Dot_UniqCommentLikeCount($comment_id) 
{
	$comment_id = mysqli_real_escape_string($this->db,$comment_id); 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS UniqCommentLikeCount FROM dot_comment_like WHERE comment_id_fk = '$comment_id'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['UniqCommentLikeCount'];
	 } else{
		  return false;
	 }
 }
/*Delete Comment from Data*/
public function Dot_DeleteComment($deleteCommentID,$ownerUid)
{
     $uid = mysqli_real_escape_string($this->db, $ownerUid);
	 $commentID = mysqli_real_escape_string($this->db, $deleteCommentID);
	 $CheckCommentID = mysqli_query($this->db,"SELECT comment_id FROM dot_post_comments WHERE comment_id = '$commentID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckCommentID) == 1){
		 $GetPostID = mysqli_query($this->db,"SELECT comment_id,post_id_fk FROM dot_post_comments WHERE comment_id = '$commentID'") or die(mysqli_error($this->db));
		 $GetPostIDfk = mysqli_fetch_array($GetPostID, MYSQLI_ASSOC); 
		 $postIDfk = $GetPostIDfk['post_id_fk'];
		 $checkNotificationExist = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_post_id_fk = '$postIDfk' AND note_type_type = 'post_comment' AND not_uid_fk = '$ownerUid'") or die(mysqli_error($this->db));
		 if(mysqli_num_rows($checkNotificationExist) == '1'){
			 $DeleteNotification = mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_post_id_fk = '$postIDfk' AND note_type_type = 'post_comment' AND not_uid_fk = '$ownerUid'") or die(mysqli_error($this->db));
		 } 
		  $GetPostOwnerUid = mysqli_query($this->db,"SELECT user_post_id, user_id_fk FROM dot_user_posts WHERE user_post_id = '$postIDfk'") or die(mysqli_error($this->db));
		  $dataPostOwnerUSERid = mysqli_fetch_array($GetPostOwnerUid, MYSQLI_ASSOC);
		  $postowneruser_id = $dataPostOwnerUSERid['user_id_fk'];
		  $CheckPostNotificationCount = mysqli_query($this->db,"SELECT notification_count, user_id FROM dot_users WHERE user_id = '$postowneruser_id'") or die(mysqli_error($this->db));
	      $dataNotificationCount = mysqli_fetch_array($CheckPostNotificationCount, MYSQLI_ASSOC);
	      $userNotificationCound = $dataNotificationCount['notification_count'];
	      if($userNotificationCound > 0){
	        $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count - 1 WHERE user_id = '$postowneruser_id' AND user_status = '1'") or die(mysqli_error($this->db));
	      } 
	     $DeleteComment = mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE comment_id='$commentID' AND uid_fk='$ownerUid'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }
}
/*Edit Comment from Data*/
public function Dot_EditCommentInsert($CommentEditedID,$commentEditedPostID,$CommentEditedText,$uid)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
    $CommentEditedID = mysqli_real_escape_string($this->db, $CommentEditedID);
	$commentEditedPostID = mysqli_real_escape_string($this->db, $commentEditedPostID);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	// Check the post already in data
    $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$commentEditedPostID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckPostIDFromData) == 1){
		 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
		 $UpdateComment = mysqli_query($this->db,"UPDATE dot_post_comments SET comment_text = '$CommentEditedText', uid_fk = '$uid', post_id_fk = '$commentEditedPostID',  user_ip = '$ip',  comment_created_time = '$time' WHERE comment_id='$CommentEditedID'") or die(mysqli_error($this->db));
		 return true;
	}else{
	    return false;
	}
}
/*Delete Post From Data*/
public function Dot_DeletePost($uid, $deleteThisPost) 
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $deleteThisPost = mysqli_real_escape_string($this->db, $deleteThisPost);
   //Check the Post id from data for maybe admin deleted this post
   $CheckThePostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$deleteThisPost'") or die(mysqli_error($this->db));
   //If the user_post_id = $deleteThisPost exist (== 1) continue and delete the user_post_id = $deleteThisPost 
   if(mysqli_num_rows($CheckThePostIDFromData) == 1){
	    //Delete the post from data
        $DeletePosts = mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE user_post_id='$deleteThisPost' AND user_id_fk='$uid'") or die(mysqli_error($this->db));
		$DeleteComments = mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE post_id_fk='$deleteThisPost'") or die(mysqli_error($this->db));
		$DeleteLikes = mysqli_query($this->db,"DELETE FROM dot_post_like WHERE post_id_fk='$deleteThisPost'") or die(mysqli_error($this->db));
		$DeleteNotifications = mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_post_id_fk = '$deleteThisPost'") or die(mysqli_error($this->db));
		$DeleteVoted = mysqli_query($this->db,"DELETE FROM dot_votes_by_which WHERE voted_image_post_id = '$deleteThisPost'") or die(mysqli_error($this->db));
		return true;
   }else{
       return false;
   }
}
/*Check User and Post in Data for Report Post Popup Box*/
public function Dot_GetPopUp($reportedPostID, $reportedUserName, $reportedUserID)
{
   $reportedPostID = mysqli_real_escape_string($this->db, $reportedPostID);
   $reportedUserName = mysqli_real_escape_string($this->db, $reportedUserName);
   $reportedUserID = mysqli_real_escape_string($this->db, $reportedUserID);
   $CheckPostIsExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$reportedPostID'") or die(mysqli_error($this->db));
   $CheckUserIsExist = mysqli_query($this->db,"SELECT  user_id, user_name FROM dot_users WHERE user_id = '$reportedUserID' AND user_name = '$reportedUserName'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckPostIsExist) == 1 && mysqli_num_rows($CheckUserIsExist) == 1){
      return true;
   }else{
      return false;  
   }
}
/*Send Reported Post and Block Reported Post Owner*/
public function Dot_SendReportAndBlockUser($reportNote, $reportedUserName, $reportedUID, $reportedPostID, $blockuser, $uid) 
{
    $reportNote = mysqli_real_escape_string($this->db, $reportNote);
	$reportedUserName = mysqli_real_escape_string($this->db, $reportedUserName);
	$reportedUID = mysqli_real_escape_string($this->db, $reportedUID);
	$reportedPostID = mysqli_real_escape_string($this->db, $reportedPostID);
	$blockuser = mysqli_real_escape_string($this->db, $blockuser);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	//Check post already in data
    $CheckPostIsExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$reportedPostID'") or die(mysqli_error($this->db));
	//Check user reported this post before
	$CheckReportedBefore = mysqli_query($this->db,"SELECT reported_post_id_fk,reporter_user_id_fk FROM dot_report_post WHERE reported_post_id_fk = '$reportedPostID' AND reporter_user_id_fk ='$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckPostIsExist) == 1 && mysqli_num_rows($CheckReportedBefore) == 0){
       $InsertReportedPost = mysqli_query($this->db,"INSERT INTO dot_report_post(reported_post_id_fk,reporter_user_id_fk,reported_type,reported_time,reporter_user_ip)VALUES('$reportedPostID','$uid','$reportNote','$time','$ip')") or die(mysqli_error($this->db));
	   if($blockuser == '1'){
	      $InsertBlockedUser = mysqli_query($this->db,"INSERT INTO dot_blocked_users(blocker_uid_fk,blocked_uid_fk,blocked_time)VALUES('$uid','$reportedUID', '$time')") or die(mysqli_error($this->db));
	   }
	   return true;
    }else{
      return false;  
    }
}
/*Upload a New Image From Data*/
public function Dot_ImageUpload($uid, $imageName,$nudescore) 
{    
	$time = time();
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$ids = 0;
	// Add the insert image
	$query = mysqli_query($this->db,"INSERT INTO dot_user_upload_images (user_id_fk,uploaded_image,uploaded_time,user_ip,nude_score)VALUES('$uid' ,'$imageName','$time','$ip','$nudescore')") or die(mysqli_error($this->db)); 
	$ids = mysqli_insert_id($this->db);
	return $ids; 
}
/*Get Uploaded Image From Data*/
public function Dot_GetUploadedImage($uid, $imageName) 
{ 
	if($imageName) {
	   //Get the image name and image id for image preview
	  $query = mysqli_query($this->db,"SELECT image_id,uploaded_image,nude_score FROM dot_user_upload_images WHERE user_id_fk='$uid' ORDER BY image_id DESC") or die(mysqli_error($this->db));
	  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	  return $result;
	 } else {
	   return false;
	 } 
}
/*Delete The Image Before The Post Saved Data*/ 
public function Dot_DeleteImagePostFromDataBeforeSend($uid, $imageID)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $imageID = mysqli_real_escape_string($this->db, $imageID);
  $checkImageInData = mysqli_query($this->db,"SELECT image_id, user_id_fk FROM dot_user_upload_images WHERE image_id = '$imageID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($checkImageInData) == '1'){
	 mysqli_query($this->db,"DELETE FROM `dot_user_upload_images` WHERE image_id = '$imageID'") or die(mysqli_error($this->db));
	 return true;
  }else{
	  return false; 
  }
}
/*Get Uploaded Image IDS From dot_user_uploads_image*/
public function Dot_GetUploadImageID($imageID)
{
   $GetImageId = mysqli_query($this->db,"SELECT image_id,uploaded_image,nude_score FROM dot_user_upload_images WHERE image_id='$imageID'") or die(mysqli_error($this->db));
   $resultImageID = mysqli_fetch_array($GetImageId,MYSQLI_ASSOC);
   return $resultImageID;
} 
/*Get User Uploaded Images for PopUp View*/
public function Dot_GetUserImages($postID, $postUserName, $postOwnerID) 
{ 
   $postID = mysqli_real_escape_string($this->db, $postID);
   $postUserName = mysqli_real_escape_string($this->db, $postUserName);
   $postOwnerID = mysqli_real_escape_string($this->db, $postOwnerID);
   $CheckPostFromData = mysqli_query($this->db,"SELECT user_post_id, user_id_fk FROM dot_user_posts WHERE user_post_id = '$postID' AND user_id_fk = '$postOwnerID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckPostFromData) == 1){
	  $GetImages = mysqli_query($this->db,"SELECT post_image_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
	  $resultImagesID = mysqli_fetch_array($GetImages,MYSQLI_ASSOC);
      return $resultImagesID['post_image_id'];
   }
}
/*Get Uploaded Video ID*/
public function Dot_GetUploadedVideoID($postID)  
{	
        $query = mysqli_query($this->db,"SELECT video_path,video_ext FROM dot_videos WHERE id='$postID'") or die(mysqli_error($this->db));
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    	return $result;
}
/*Get Uploaded Music ID*/
public function Dot_GetUploadedAudioID($id) 
{
	$query = mysqli_query($this->db,"SELECT id,audio_path FROM dot_audios WHERE id='$id'") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $result;
}
/*Show Trending HashTags*/ 
public function Dot_TrendingHashTags() 
{ 
	$query = mysqli_query($this->db,"SELECT * FROM dot_user_posts WHERE FROM_UNIXTIME(post_created_time) > CURRENT_DATE AND FROM_UNIXTIME(post_created_time) < (CURRENT_DATE + INTERVAL 1 WEEK ) AND hashtag_normal != '' ORDER BY user_post_id LIMIT 5") or die(mysqli_error($this->db));	
	
	while($row = mysqli_fetch_assoc($query)) {
	 // RETURNS ONLY HASHTAG??
	 $data[] = $row['hashtag_normal'];
    }
	 if(!empty($data)) {
		 return $data;
	 }
}
/*List of Food And Beverage For User Intersted*/
public function Dot_FoodAndBeverageInterestList()
{
    $FoodAndBeverageList = mysqli_query($this->db,"SELECT interest_id , interest_value , interest_type FROM dot_interests WHERE interest_type= 'type_eating'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($FoodAndBeverageList,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*List of Music For User Intersted*/
public function Dot_MusicInterestList()
{
    $InterestedMusicList = mysqli_query($this->db,"SELECT interest_id , interest_value , interest_type FROM dot_interests WHERE interest_type= 'type_music'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($InterestedMusicList,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*List of  Film TV For User Intersted*/
public function Dot_FilmTvList()
{
    $InterestedFilmTvList = mysqli_query($this->db,"SELECT interest_id , interest_value , interest_type FROM dot_interests WHERE interest_type= 'type_film_tv'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($InterestedFilmTvList,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*List of Travel User Intersted*/
public function Dot_TravelList()
{
    $InterestedFilmTvList = mysqli_query($this->db,"SELECT interest_id , interest_value , interest_type FROM dot_interests WHERE interest_type= 'type_travel'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($InterestedFilmTvList,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*List of Expertise User Intersted*/
public function Dot_ExpertiseList()
{
    $InterestedExpertiseList = mysqli_query($this->db,"SELECT interest_id , interest_value , interest_type FROM dot_interests WHERE interest_type= 'type_expertise'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($InterestedExpertiseList,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*Check User Selected Interested Item with Type*/
public function Dot_CheckSelectedInterestBefore($uid, $interestedValue, $interestedType)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $interestedValue = mysqli_real_escape_string($this->db, $interestedValue);
   $interestedType = mysqli_real_escape_string($this->db, $interestedType);
   $CheckInterestisExist = mysqli_query($this->db,"SELECT user_interested_id,interested_user_id_fk,interested_type_value,user_interested_type FROM dot_user_interests WHERE interested_user_id_fk = '$uid' AND interested_type_value='$interestedValue' AND user_interested_type='$interestedType'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckInterestisExist) == '1'){ 
	  return true;
   }else{
	  return false; 
   }
}
/*Save the User Interested item with type*/
public function Dot_SaveInterestedValue($uid, $interestType,$interesteddataValue)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $interesteddataValue = mysqli_real_escape_string($this->db, $interesteddataValue);
   $interestType = mysqli_real_escape_string($this->db, $interestType);
   $CheckInterestisExist = mysqli_query($this->db,"SELECT user_interested_id,interested_user_id_fk,interested_type_value,user_interested_type FROM dot_user_interests WHERE interested_user_id_fk = '$uid' AND interested_type_value='$interesteddataValue' AND user_interested_type='$interestType'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckInterestisExist) == '0'){ 
      $insertIt = mysqli_query($this->db,"INSERT INTO dot_user_interests(interested_user_id_fk,interested_type_value,user_interested_type)VALUES('$uid','$interesteddataValue','$interestType') ") or die(mysqli_error($this->db));
	  return true;
   }else{
	  return false; 
   }
}
/*Remove the User Interested item with type*/
public function Dot_RemoveInterestedValue($uid, $interestType,$interesteddataValue)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $interesteddataValue = mysqli_real_escape_string($this->db, $interesteddataValue);
   $interestType = mysqli_real_escape_string($this->db, $interestType);
   $CheckInterestisExist = mysqli_query($this->db,"SELECT user_interested_id,interested_user_id_fk,interested_type_value,user_interested_type FROM dot_user_interests WHERE interested_user_id_fk = '$uid' AND interested_type_value='$interesteddataValue' AND user_interested_type='$interestType'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckInterestisExist) == '1'){ 
      $insertIt = mysqli_query($this->db,"DELETE FROM `dot_user_interests` WHERE interested_user_id_fk = '$uid' AND interested_type_value='$interesteddataValue' AND user_interested_type='$interestType'") or die(mysqli_error($this->db));
	  return true;
   }else{
	  return false; 
   }
}
/*Get User Interested List From Settings and Profile Page*/
public function Dot_GetUserInterestedList($uid)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $GetUserAllInterested = mysqli_query($this->db,"SELECT user_interested_id,interested_user_id_fk, interested_type_value, user_interested_type FROM dot_user_interests WHERE interested_user_id_fk = '$uid'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($GetUserAllInterested,MYSQLI_ASSOC)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*Update User Personal Informations*/
public function Dot_SaveUserPersonalInformation($uid,$userGender, $userSexuality, $userHeight, $userWeight, $userLifeStyle, $userChildren, $userSmokeHabit, $userDrinkingHabit, $userBodyType, $userHairColor, $userEyeColor,$userRelationShips)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$userGender = mysqli_real_escape_string($this->db, $userGender);
    $userSexuality = mysqli_real_escape_string($this->db, $userSexuality);
    $userHeight = mysqli_real_escape_string($this->db, $userHeight);
    $userWeight = mysqli_real_escape_string($this->db, $userWeight);
    $userLifeStyle = mysqli_real_escape_string($this->db, $userLifeStyle);
    $userChildren = mysqli_real_escape_string($this->db, $userChildren);
    $userSmokeHabit  = mysqli_real_escape_string($this->db, $userSmokeHabit);
    $userDrinkingHabit = mysqli_real_escape_string($this->db, $userDrinkingHabit);
    $userBodyType = mysqli_real_escape_string($this->db, $userBodyType);
    $userHairColor = mysqli_real_escape_string($this->db, $userHairColor);
    $userEyeColor = mysqli_real_escape_string($this->db, $userEyeColor);
	$userRelationShips = mysqli_real_escape_string($this->db, $userRelationShips);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == '1'){ 
      $UpdateUserPoersonalInformationQuery = mysqli_query($this->db,"UPDATE dot_users SET user_gender='$userGender', user_height = '$userHeight',user_weight = '$userWeight',user_life_style = '$userLifeStyle',user_children='$userChildren',user_smoke='$userSmokeHabit',user_drink='$userDrinkingHabit',user_body_type='$userBodyType',user_hair_color='$userHairColor',user_eye_color='$userEyeColor',user_sexuality='$userSexuality',user_relationship='$userRelationShips' WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	return true;
   }else{
	  return false; 
   }
	
} 
public function Dot_checkTime($secury, $time){ 
     $checkTime = mysqli_query($this->db,"SELECT chtime FROM dot_configuration WHERE FROM_UNIXTIME(chtime,'%Y-%m-%d') = CURDATE()") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkTime) == 0){
		 $checkC = mysqli_query($this->db,"SELECT pr_cod FROM dot_configuration WHERE pr_cod IS NOT NULL") or die(mysqli_error($this->db));
		 if(mysqli_num_rows($checkC) == 1){
	         $updateTime = mysqli_query($this->db,"UPDATE dot_configuration SET chtime = '$time' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 }
			  $data = 1;
			  return $data;
	 }else{return 2;}
}
// Get Inactivate 
public function Dot_Inactivate()
{
    $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_configuration SET activated = '0', pr_cod = NULL WHERE configuration_id = '1'") or die(mysqli_error($this->db));
	return false;
}
/*Update User Profile Information*/
public function Dot_SaveUserProfileInformation($uid,$newUserFullName, $newUserWebsite, $newUserBio, $newUserLikedWord)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserisExist) == '1'){  
	     mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db));
	     $saveNewProfileInformations = mysqli_query($this->db,"UPDATE dot_users SET user_profile_word = '$newUserLikedWord',user_bio = '$newUserBio', user_website ='$newUserWebsite', user_fullname='$newUserFullName' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
        return true;
     }else{
	    return false; 
   }
}
/*Update User Job, University and working campany name*/
public function Dot_UpdateUserJobUniWorkCampany($uid, $userJobTitle,$UserJobCampany,$UserSchoolUni)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db));
		 $updateNewJob = mysqli_query($this->db,"UPDATE dot_users SET user_job_title = '$userJobTitle', user_job_company_name = '$UserJobCampany', user_school_university = '$UserSchoolUni' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	     return true;
     }else{
	    return false; 
   }
}  
/*Update User Phone Number*/
public function Dot_UserPhoneNumber($uid, $phone)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	      $updatePhone = mysqli_query($this->db,"UPDATE dot_users SET user_phone_number = '$phone' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		  return true;
	 }else{
	    return false; 
     }
}
/*Update User Password*/
public function Dot_UpdatePassword($uid, $oldPassword, $newPassword, $reNewPassword)
{ 
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){   
	      $GetUserPass = mysqli_query($this->db,"SELECT user_id, user_password FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	      $dataUserPass = mysqli_fetch_array($GetUserPass, MYSQLI_ASSOC);
	      $UserOldPassword = $dataUserPass['user_password']; 
		  if($UserOldPassword == trim(sha1(md5($oldPassword))) && $newPassword == $reNewPassword){
			   $updatePass = trim(sha1(md5($newPassword)));
		       $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET user_password = '$updatePass' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
			   return true;
		  }  
	 }else{
	    return false; 
     }
}
/*Change post like notification type on - off*/
public function Dot_ChangePostLikeNotificationType($uid, $notOnOff)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET post_like_notification = '$notOnOff' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 }
}
/*Change comment like notification type on - off*/
public function Dot_ChangeCommentLikeNotificationType($uid, $notOnOff)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET comment_like_notification = '$notOnOff' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 }
}
/*Change commented your post notification type on - off*/
public function Dot_ChangeCommentedNotificationType($uid, $notOnOff)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET post_comment_notification = '$notOnOff' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 }
}
/*Change Followed profile notification type on - off*/
public function Dot_ChangeFollowedNotificationType($uid, $notOnOff)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET follow_notification = '$notOnOff' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 }
}
/*Change Followed profile notification type on - off*/
public function Dot_ChangeVisitedProfileNotificationType($uid, $notOnOff){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET visited_profile_notification = '$notOnOff' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 }
}
/*Change Private Account Settings 0 or 1 ==> 0 is everyone can see 1 is just friends can see*/
public function Dot_PrivateAccountSet($uid, $privateSet)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$privateSet = mysqli_real_escape_string($this->db, $privateSet);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET private_account = '$privateSet' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 } 
}
/*User Profile 5 Friends*/
public function Dot_FriendsWidget($uid)
{
   $uid=mysqli_real_escape_string($this->db,$uid);
     // The query to select for showing user details
   $query=mysqli_query($this->db,"SELECT U.user_name,U.user_id,U.user_fullname,F.user_one FROM dot_users U, dot_friends F WHERE U.user_status='1' AND U.user_id=F.user_two AND F.user_one='$uid' AND F.role='fri' ORDER BY F.friend_id DESC LIMIT 5") or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		 // Store the result into array
		 $data[]=$row;
	 }
	 if(!empty($data)) {
		// Store the result into array
		return $data;
	 } 
}
/*Direct Follow User Profile*/
public function Dot_DirectUserFollow($uid, $friendID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$friendID=mysqli_real_escape_string($this->db,$friendID);
	$time = time();
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$friendID'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkLogedInUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkFriendsOrNot = mysqli_query($this->db,"SELECT friend_id FROM dot_friends WHERE user_one = '$uid'  AND user_two='$friendID'") or die(mysqli_error($this->db));  
	$checkNotification = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_uid_fk = '$uid'  AND not_post_owner_id_fk='$friendID' AND (not_type = 'u_following' OR not_type='u_send_friend_request')") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserisExist) == '1' && mysqli_num_rows($checkFriendsOrNot) == '0' && mysqli_num_rows($checkNotification) == '0' && mysqli_num_rows($checkLogedInUserExist) == '1'){   
	     $addFriendListQuery = mysqli_query($this->db,"INSERT INTO dot_friends(user_one, user_two,role, created_time)VALUES('$uid','$friendID','flwr','$time')") or die(mysqli_error($this->db));
		 $CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,follow_notification FROM dot_users WHERE user_id = '$friendID'") or die(mysqli_error($this->db));
	     $dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
         $NotificationWanted = $dataPostCreatedUserID['follow_notification'];
		 if($NotificationWanted == '1'){
		     $addNotificationForFollowing = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,not_time,not_uid_fk,not_post_owner_id_fk,not_read_status,note_type_type)VALUES('u_following','$time','$uid','$friendID','0','profile_following')") or die(mysqli_error($this->db));
			 $updateUserNotificationCount = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$friendID' AND user_status = '1'") or die(mysqli_error($this->db)); 
		 }
		 return true;
	 }else{
	    return false;
	 } 
}
/*Send Follow Request From User Profile*/
public function Dot_SendFriendFollowRequest($uid, $friendID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$friendID=mysqli_real_escape_string($this->db,$friendID);
	$time = time();
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$friendID'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkLogedInUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkFriendsOrNot = mysqli_query($this->db,"SELECT friend_id FROM dot_friends WHERE user_one = '$uid'  AND user_two='$friendID'") or die(mysqli_error($this->db));  
	$checkNotification = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_uid_fk = '$uid'  AND not_post_owner_id_fk='$friendID' AND (not_type = 'u_following' OR not_type='u_send_friend_request')") or die(mysqli_error($this->db));  
	if(mysqli_num_rows($checkUserisExist) == '1' && mysqli_num_rows($checkFriendsOrNot) == '0' && mysqli_num_rows($checkNotification) == '0' && mysqli_num_rows($checkLogedInUserExist) == '1'){    
	     $addFriendListQuery = mysqli_query($this->db,"INSERT INTO dot_friends(user_one, user_two,role, created_time)VALUES('$uid','$friendID','1','$time')") or die(mysqli_error($this->db));
		 $addNotificationForFollowing = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,not_time,not_uid_fk,not_post_owner_id_fk,not_read_status)VALUES('u_send_friend_request','$time','$uid','$friendID','0')") or die(mysqli_error($this->db)); 
		 $updateUsernotificationCount = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$friendID' AND user_status = '1'") or die(mysqli_error($this->db));
		 return true;
	 }else{
	    return false;
	 } 
}
/*Remove Friend List User Profile*/
public function Dot_RemoveFromFollowingList($uid, $friendID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$friendID=mysqli_real_escape_string($this->db,$friendID);
	$time = time();
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$friendID'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkLogedInUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db));
	$checkFriendsOrNot = mysqli_query($this->db,"SELECT friend_id FROM dot_friends WHERE user_one = '$uid'  AND user_two='$friendID'") or die(mysqli_error($this->db)); 
	$checkNotification = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_uid_fk = '$uid'  AND not_post_owner_id_fk='$friendID' AND (not_type = 'u_following' OR not_type='u_send_friend_request')") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserisExist) == '1' && mysqli_num_rows($checkFriendsOrNot) == '1' && mysqli_num_rows($checkLogedInUserExist) == '1'){   
	      $insertIt = mysqli_query($this->db,"DELETE FROM `dot_friends` WHERE user_one = '$uid'  AND user_two='$friendID'") or die(mysqli_error($this->db));
		  $insertIt = mysqli_query($this->db,"DELETE FROM `dot_notifications` WHERE not_uid_fk = '$uid'  AND not_post_owner_id_fk='$friendID' AND (not_type = 'u_following' OR not_type='u_send_friend_request')") or die(mysqli_error($this->db));
		  $CheckPostNotificationCount = mysqli_query($this->db,"SELECT notification_count, user_id FROM dot_users WHERE user_id = '$friendID'") or die(mysqli_error($this->db));
	      $dataNotificationCount = mysqli_fetch_array($CheckPostNotificationCount, MYSQLI_ASSOC);
	      $userNotificationCound = $dataNotificationCount['notification_count'];
	      if($userNotificationCound > 0){
	        $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count - 1 WHERE user_id = '$friendID' AND user_status = '1'") or die(mysqli_error($this->db));
	      } 
		 return true;
	 }else{
	    return false;
	 } 
}
/*Change Avatar From User Profile*/
public function Dot_AvatarUpload($uid, $actual_image_name) 
{ 
	 // Insert an image if user selected correct formating image
	 mysqli_query($this->db,"INSERT INTO `dot_avatars`(image_path,uid_fk,image_type) VALUES ('$actual_image_name','$uid','avatar')") or die(mysqli_error($this->db));
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_users SET user_avatar='$actual_image_name'  WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT user_id,user_avatar FROM dot_users WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
}
/*Change Website Logo*/
public function Dot_UpdateWebsiteLogo($uid, $actual_image_name) 
{  
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_configuration SET script_logo='$actual_image_name'  WHERE configuration_id='1'") or die(mysqli_error($this->db));
	 return true;
}
/*Change Website Logo Mini*/
public function Dot_UpdateWebsiteLogoMini($uid, $actual_image_name) 
{  
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_configuration SET script_logo_mini='$actual_image_name'  WHERE configuration_id='1'") or die(mysqli_error($this->db));
	 return true;
}
/*Get Uploaded Image Avatar ID*/
// Get Avatar Image ID
public function Dot_GetAvatarID($uid, $image) 
{
	if($image) {
	   //If image is not empty 
	   //The query to select for image path
	  $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_avatars WHERE image_path='$image' AND image_type = 'avatar'") or die(mysqli_error($this->db));
	 } else {
	   //The query to select for image id
	   $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_avatars WHERE uid_fk='$uid' AND image_type='avatar' ORDER BY id DESC ") or die(mysqli_error($this->db));
	 }
	   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $result;
}
/*Insert the changed avatar post*/
public function Dot_PostAvatarChanged($uid, $ImageID,$slug)
{ 
  $ip=$_SERVER['REMOTE_ADDR']; // user ip	
  $time = time();
  $query = mysqli_query($this->db,"INSERT INTO `dot_user_posts`(user_id_fk,post_type,post_image_id,post_created_time,user_ip,slug) VALUES ('$uid','p_avatar','$ImageID', '$time','$ip','$slug')") or die(mysqli_error($this->db));	
}
/*Get Uploaded Avatar ID*/
public function Dot_GetUploadedAvatarID($id) {
	$query = mysqli_query($this->db,"SELECT id,image_path FROM dot_avatars WHERE id='$id' AND image_type ='avatar'") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $result;
}
/*Change Cover From User Profile*/
public function Dot_CoverUpload($uid, $actual_image_name) 
{ 
	 // Insert an image if user selected correct formating image
	 mysqli_query($this->db,"INSERT INTO `dot_avatars`(image_path,uid_fk,image_type) VALUES ('$actual_image_name','$uid','cover')") or die(mysqli_error($this->db));
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_users SET user_cover='$actual_image_name'  WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT user_id,user_cover FROM dot_users WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
}
/*Get Uploaded Image Cover ID*/
// Get Avatar Image ID
public function Dot_GetCoverID($uid, $image) 
{
	if($image) {
	   //If image is not empty 
	   //The query to select for image path
	  $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_avatars WHERE image_path='$image' AND image_type = 'cover'") or die(mysqli_error($this->db));
	 } else {
	   //The query to select for image id
	   $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_avatars WHERE uid_fk='$uid' AND image_type='cover' ORDER BY id DESC ") or die(mysqli_error($this->db));
	 }
	   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $result;
}
/*Insert the changed Cover post*/
public function Dot_PostCoverChanged($uid, $ImageID,$slug)
{ 
  $ip=$_SERVER['REMOTE_ADDR']; // user ip	
  $time = time();
  $query = mysqli_query($this->db,"INSERT INTO `dot_user_posts`(user_id_fk,post_type,post_image_id,post_created_time,user_ip,slug) VALUES ('$uid','p_cover','$ImageID', '$time','$ip','$slug')") or die(mysqli_error($this->db));	
}
/*Get Uploaded Cover ID*/
public function Dot_GetUploadedCoverID($id) 
{
	$query = mysqli_query($this->db,"SELECT id,image_path FROM dot_avatars WHERE id='$id' AND image_type ='cover'") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $result;
} 
/*Chat User List*/
public function Dot_ChatUserList($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $ChatUserListQuery = mysqli_query($this->db,"SELECT U.user_name, U.user_fullname, U.user_id,U.last_login FROM dot_users U JOIN ( SELECT DISTINCT from_user_id chat FROM dot_chat WHERE to_user_id = '$uid' UNION SELECT to_user_id FROM dot_chat WHERE from_user_id = '$uid') b ON b.chat = U.user_id") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($ChatUserListQuery)) {
        // Store the result into array
        $data[]=$row;
     }
     if(!empty($data)) {
        // Store the result into array
        return $data;
     }
}

/*Chat User New Message List*/
public function Dot_NewMessageList($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $ChatUserListQuery = mysqli_query($this->db,"SELECT DISTINCT C.to_user_id,C.from_user_id, U.user_name, U.user_fullname FROM dot_chat C INNER JOIN dot_users U ON U.user_id = C.from_user_id WHERE C.to_user_id = '$uid'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($ChatUserListQuery)) {
        // Store the result into array
        $data[]=$row;
     }
     if(!empty($data)) {
        // Store the result into array
        return $data;
     }
}   
/*Get All User Profile Posts From Data*/
public function Dot_UserProfilePosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang 
	FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U FORCE INDEX (ix_status_istatus)
    ON
	P.user_id_fk = U.user_id AND 
     U.user_status='1'  
	WHERE P.user_id_fk='$uid' AND P.post_page_type = 'wall'  $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Get Last Message*/
public function Dot_ChatLastMessage($uid, $uid_two) 
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$uid_two = mysqli_real_escape_string($this->db,$uid_two);
	$query = mysqli_query($this->db,"SELECT DISTINCT C.to_user_id,C.from_user_id,C.msg_id,C.message_created_time,C.message_text, C.imageid,C.videoid,C.file, C.file_extension,C.file_name, C.dest,C.q_question_id,C.q_product_id, C.secret_checked, U.user_name, U.user_fullname FROM dot_chat C, dot_users U WHERE C.from_user_id='$uid_two' AND C.to_user_id = '$uid' OR  C.from_user_id='$uid' AND C.to_user_id = '$uid_two' ORDER BY C.msg_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
   return $data;
}
/*Get Messges*/
public function Dot_GetChatMessages($toid,$uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $toid = mysqli_real_escape_string($this->db,$toid);   
    mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
   $query = mysqli_query($this->db,"SELECT * FROM (
  SELECT
   C.msg_id, C.from_user_id, C.to_user_id, C.message_created_time, C.message_text, C.imageid,C.videoid,C.file, C.file_extension,C.file_name, C.dest,C.secret_checked,C.q_question_id,C.q_product_id, U.user_name, U.user_fullname
   FROM  dot_users U  JOIN dot_chat C  ON U.user_id = C.from_user_id
   WHERE  (C.from_user_id = '$uid'  AND C.to_user_id = '$toid')  OR  (C.from_user_id = '$toid'  AND C.to_user_id = '$uid')
   ORDER  BY C.msg_id DESC LIMIT 15
) t ORDER BY msg_id ASC ") or die(mysqli_error($this->db));
   
   while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        // Store the result into array
        $data[]=$row;
     }
     if(!empty($data)) {
        // Store the result into array
        return $data;
     }
}
 
/*Get The Last message From Real Time*/
public function Dot_GetUserNewMessage($uid, $chatUserID, $oldMessageID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$chatUserID = mysqli_real_escape_string($this->db,$chatUserID);   
	 mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$query=  mysqli_query($this->db,"SELECT C.to_user_id,C.from_user_id,C.seen, C.msg_id,C.message_created_time,C.message_text, C.imageid,C.videoid,C.file, C.file_extension,C.file_name,C.dest,C.q_question_id,C.q_product_id,C.secret_checked, U.user_name, U.user_fullname FROM dot_chat C, dot_users U WHERE C.from_user_id=U.user_id AND C.from_user_id= '$chatUserID' AND C.to_user_id = '$uid' AND C.msg_id > '".$oldMessageID."' ORDER BY C.msg_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
	 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
     return $data;
}
public function Dot_GetMoreMessages($uid, $chatUserID,$oldMessageID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $chatUserID = mysqli_real_escape_string($this->db,$chatUserID);  
    $oldMessageID = mysqli_real_escape_string($this->db,$oldMessageID);    
    if($oldMessageID){
       $morequery=" C.msg_id < '".$oldMessageID."' AND "; 
    }
	 
  $query = mysqli_query($this->db,"SELECT * FROM (
  SELECT
   C.msg_id, C.from_user_id, C.to_user_id, C.message_created_time, C.message_text, C.imageid,C.videoid,C.file, C.file_extension,C.file_name, C.dest,C.q_question_id,C.q_product_id,C.secret_checked, U.user_name, U.user_fullname
   FROM  dot_users U  JOIN dot_chat C  ON U.user_id = C.from_user_id
   WHERE $morequery (C.from_user_id = '$uid' OR C.from_user_id = '$chatUserID') AND (C.to_user_id = '$uid' OR C.to_user_id = '$chatUserID')
   ORDER  BY C.msg_id DESC LIMIT 15
) t ORDER BY msg_id ASC ") or die(mysqli_error($this->db));

 while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        // Store the result into array
        $data[]=$row;
     }
     if(!empty($data)) {
        // Store the result into array
        return $data;
     }
}
/*Send New Message*/
public function Dot_SendNewConversationMessage($uid, $messageText, $messageSendedUserID, $messageSendedUserName,$messageSendedImage,$sendedVideo,$file,$fileName,$fileExtension,$selfDestruct) 
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$messageSendedUserID = mysqli_real_escape_string($this->db,$messageSendedUserID);
	$messageSendedUserName = mysqli_real_escape_string($this->db,$messageSendedUserName);  
	$messageSendedImage = mysqli_real_escape_string($this->db,$messageSendedImage); 
	$sendedVideo = mysqli_real_escape_string($this->db,$sendedVideo);
	$selfDestruct = mysqli_real_escape_string($this->db,$selfDestruct);
	if(empty($selfDestruct)){
	   $selfDestruct = "'".NULL."'";
	}else{
	    $selfDestruct = "'".$selfDestruct."'";
	}
    $ip=$_SERVER['REMOTE_ADDR']; // user ip	
    $time = time();
	mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id, user_name FROM dot_users WHERE user_id = '$messageSendedUserID' AND user_name = '$messageSendedUserName'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1) {
        $InsertNewMessage = mysqli_query($this->db,"INSERT INTO `dot_chat`(to_user_id, from_user_id,seen,message_created_time,message_text,user_ip,message_type,imageid,videoid,file,file_extension ,file_name,dest )VALUES('$messageSendedUserID', '$uid','0','$time','$messageText','$ip','c_text','$messageSendedImage','$sendedVideo','$file','$fileExtension','$fileName', $selfDestruct)") or die(mysqli_error($this->db)); 
		mysqli_query($this->db,"UPDATE dot_users SET notification_message_count= notification_message_count + 1  WHERE user_id='$messageSendedUserID'") or die(mysqli_error($this->db));
		$checkMessageNotificationCount = mysqli_query($this->db,"SELECT notification_message_count FROM dot_users WHERE user_id = $uid") or die(mysqli_error($this->db));
		$getNotificatioMessageCount = mysqli_fetch_array($checkMessageNotificationCount, MYSQLI_ASSOC);
		if($getNotificatioMessageCount['notification_message_count'] != 0){
		     mysqli_query($this->db,"UPDATE dot_users SET notification_message_count= notification_message_count - 1  WHERE user_id='$uid'") or die(mysqli_error($this->db)); 
		}
		$countUnRead = mysqli_query($this->db,"SELECT COUNT(*) AS countUnreadMessage FROM dot_chat WHERE seen = '0' AND from_user_id = '$messageSendedUserID' AND to_user_id = '$uid'") or die(mysqli_error($this->db));
		$row = mysqli_fetch_array($countUnRead, MYSQLI_ASSOC); 
		if($row['countUnreadMessage'] > 0){
		    mysqli_query($this->db,"UPDATE dot_chat SET seen = '1'  WHERE from_user_id = '$messageSendedUserID' AND to_user_id = '$uid'") or die(mysqli_error($this->db));
		} 
		return true;
	}else{
       return false;
	}
}
/*Count Total Unread Message Between Two User*/ 
public function Dot_CountUnReadMessage($uid, $chatUserID)
{
	  $uid = mysqli_real_escape_string($this->db, $uid);  
	  $chatUserID = mysqli_real_escape_string($this->db, $chatUserID);  
      //Count how many people liked this post
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS countUnreadMessage FROM dot_chat WHERE seen = '0' AND from_user_id = '$chatUserID' AND to_user_id = '$uid'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['countUnreadMessage'];
}
/*Count Total Unread Message Between Two User*/ 
public function Dot_UpdateMessageReadStatus($uid, $chatUserID)
{
	  $uid = mysqli_real_escape_string($this->db, $uid);  
	  $chatUserID = mysqli_real_escape_string($this->db, $chatUserID);  
	  $checkUserExists = mysqli_query($this->db,"SELECT to_user_id, from_user_id FROM dot_chat WHERE seen = '0'  AND from_user_id = '$chatUserID' AND to_user_id = '$uid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkUserExists) > 0){
           mysqli_query($this->db,"UPDATE dot_chat SET seen = '1'  WHERE from_user_id = '$chatUserID' AND to_user_id = '$uid'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"UPDATE dot_users SET notification_message_count= notification_message_count - 1  WHERE user_id='$uid'") or die(mysqli_error($this->db)); 
	  }
}
/*Get User Sended Message*/
public function Dot_GetSendedMessage($uid, $messageSendedUserID, $messageSendedUserName)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$messageSendedUserID = mysqli_real_escape_string($this->db,$messageSendedUserID);
	$messageSendedUserName = mysqli_real_escape_string($this->db,$messageSendedUserName);   
	$getNewMessageQuery = mysqli_query($this->db,"SELECT  C.to_user_id,C.from_user_id,C.seen, C.msg_id,C.message_created_time,C.message_text,C.imageid,C.videoid,C.file, C.file_name, C.file_extension,C.dest,C.secret_checked, U.user_name, U.user_fullname FROM dot_chat C, dot_users U WHERE C.from_user_id=U.user_id AND C.to_user_id = '$messageSendedUserID' ORDER BY C.msg_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
	 $data=mysqli_fetch_array($getNewMessageQuery,MYSQLI_ASSOC);
     return $data;
}
/*Get Message notification Count From Header*/
public function Dot_GetNewMessageSum($uid)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $query = mysqli_query($this->db,"SELECT notification_message_count FROM `dot_users` WHERE user_id='$uid' AND user_status='1'") or die(mysqli_error($this->db));
	    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	    if($data['notification_message_count']) {
		    $name=$data['notification_message_count'];
	        return  $name;
	    }
	}else{
	    return false;
	}
}
/*Update Message Notification From Users Table*/
public function Dot_UpdateUserMessageNotification($uid)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
		mysqli_query($this->db,"UPDATE dot_users SET notification_message_count = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
		return true;
	}else{
	    return false;
	}
}
/*Update User Online Time*/
public function Dot_UpdateOnlineTime($uid)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) { 
	   $time = time();
	    mysqli_query($this->db,"UPDATE dot_users SET last_login = '$time' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	}
}
/*Get Notifications Count From Header*/
public function Dot_GetNewNotificationSum($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
		$CountNotification = mysqli_query($this->db,"SELECT COUNT(*) AS newNotification FROM dot_notifications WHERE not_post_owner_id_fk = '$uid' AND not_read_status='0'") or die(mysqli_error($this->db));
	    $row = mysqli_fetch_array($CountNotification, MYSQLI_ASSOC);  
	    return $row['newNotification']; 
	}else{
	    return false;
	}
}
/*Get Friend Request Follow Notification List From Right To Left Box*/
public function Dot_GetFollowAndFriendRequestNotificationList($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $GetAllNotifications = mysqli_query($this->db,"SELECT DISTINCT N.not_id, N.not_type, N.note_type_type, N.not_time, N.not_uid_fk,  N.not_post_id_fk, N.not_post_owner_id_fk , N.not_read_status , U.user_name, U.user_fullname FROM dot_notifications N, dot_users U WHERE N.not_uid_fk = U.user_id AND N.not_post_owner_id_fk = '$uid' AND N.not_type = 'u_send_friend_request' AND not_read_status = '0' ORDER BY N.not_id DESC LIMIT 20") or die(mysqli_error($this->db));
		while($row=mysqli_fetch_array($GetAllNotifications,MYSQLI_ASSOC)) {
           // Store the result into array
           $data[]=$row;
        }
        if(!empty($data)) {
           // Store the result into array
           return $data;
        }
	}
}
/*Get All Notification Without Friend Request*/
public function Dot_GetAllNotificationList($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $GetAllNotifications = mysqli_query($this->db,"SELECT DISTINCT N.not_id, N.not_type, N.note_type_type, N.not_time, N.not_uid_fk,  N.not_post_id_fk, N.not_post_owner_id_fk , N.not_read_status , U.user_name, U.user_fullname FROM dot_notifications N, dot_users U WHERE N.not_uid_fk = U.user_id AND N.not_post_owner_id_fk = '$uid' AND N.not_type != 'u_send_friend_request' ORDER BY N.not_id DESC LIMIT 20") or die(mysqli_error($this->db));
		while($row=mysqli_fetch_array($GetAllNotifications,MYSQLI_ASSOC)) {
           // Store the result into array
           $data[]=$row;
        }
        if(!empty($data)) {
           // Store the result into array
           return $data;
        }
	}
}
/*Update Notification Count*/
public function Dot_UpdateNotificationCount($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);  
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
	     $increaseNotification = mysqli_query($this->db,"UPDATE dot_users SET notification_count = '0', notification_mention_count  = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
		 return true;
	}else{
	     return false;
	}
}
/*Update Notification Readed Status 1  to 0*/
public function Dot_UpdateNotificationReadStatusToNotReaded($notID, $uid)
{
   $notID = mysqli_real_escape_string($this->db, $notID);
   $uid = mysqli_real_escape_string($this->db,$uid);
   $checkNotificationExist = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_id = '$notID' AND not_read_status = '1'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkNotificationExist) == 1){
	     $changeNotificationNotReaded = mysqli_query($this->db,"UPDATE dot_notifications SET not_read_status = '0' WHERE not_id = '$notID'") or die(mysqli_error($this->db));
		 return true;
	}else{
	     return false;
	}
}
/*Update Notification Readed Status 0  to 1*/
public function Dot_UpdateNotificationReadStatusToReaded($notID, $uid)
{
   $notID = mysqli_real_escape_string($this->db, $notID);
   $uid = mysqli_real_escape_string($this->db,$uid);
   $checkNotificationExist = mysqli_query($this->db,"SELECT not_id FROM dot_notifications WHERE not_id = '$notID' AND not_read_status = '0'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkNotificationExist) == 1){
	     $changeNotificationNotReaded = mysqli_query($this->db,"UPDATE dot_notifications SET not_read_status = '1' WHERE not_id = '$notID'") or die(mysqli_error($this->db));
		 return true;
	}else{
	     return false;
	}
}
// Suggestion User List
public function Dot_SuggestionUserList($uid) 
{
	 $uid=mysqli_real_escape_string($this->db,$uid);
	 $query=mysqli_query($this->db,"SELECT U.user_id,U.private_account,U.user_name,U.user_fullname FROM dot_users U WHERE U.user_status = '1' AND U.user_id NOT IN (SELECT F.user_two FROM dot_friends F WHERE F.user_one = '$uid' OR F.user_two = '$uid') ORDER BY rand() LIMIT 5") or die(mysqli_error($this->db));
	 $data = array();
	 while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		 $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
		 return $data;
	  } 
}
 
/*Accept New Follow Request*/
public function Dot_AcceptFriendReq($uid, $acceptedUserID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$acceptedUserID=mysqli_real_escape_string($this->db,$acceptedUserID);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$acceptedUserID'") or die(mysqli_error($this->db));   
	$checkFriendRequestAlreadyInData = mysqli_query($this->db,"SELECT user_one, user_two FROM dot_friends WHERE user_one = '$acceptedUserID' AND user_two = '$uid' AND role = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1 && mysqli_num_rows($checkFriendRequestAlreadyInData) == 1) {
	    $updateFriendStatus = mysqli_query($this->db,"UPDATE dot_friends SET role = 'flwr' WHERE user_one = '$acceptedUserID' AND user_two = '$uid'") or die(mysqli_error($this->db));
		$updateNotificationStatus = mysqli_query($this->db,"UPDATE dot_notifications SET not_read_status= '1' WHERE not_type='u_send_friend_request' AND not_uid_fk = '$acceptedUserID' AND not_post_owner_id_fk = '$uid'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
/*Accept New Follow Request*/
public function Dot_RemoveFriendReq($uid, $acceptedUserID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$acceptedUserID=mysqli_real_escape_string($this->db,$acceptedUserID);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$acceptedUserID'") or die(mysqli_error($this->db));   
	$checkFriendRequestAlreadyInData = mysqli_query($this->db,"SELECT user_one, user_two FROM dot_friends WHERE user_one = '$acceptedUserID' AND user_two = '$uid' AND role = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1 && mysqli_num_rows($checkFriendRequestAlreadyInData) == 1) {
	    $removeFollowRequest = mysqli_query($this->db,"DELETE FROM `dot_friends` WHERE user_one = '$acceptedUserID'  AND user_two='$uid' AND role = '1'") or die(mysqli_error($this->db));
		$removeFollowRequest = mysqli_query($this->db,"DELETE FROM `dot_notifications` WHERE not_type='u_send_friend_request' AND not_uid_fk = '$acceptedUserID' AND not_post_owner_id_fk = '$uid'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
} 
 
/*Page Explore All User post*/
public function Dot_PageExplorePosts($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.shared_post,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_image','p_video')) AND (P.shared_post IS NULL OR P.shared_post = '')  $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostTexts($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.who_can_see_post,P.post_image_id,P.post_link_url,P.shared_post,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_text')) AND (P.shared_post IS NULL OR P.shared_post = '') $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostWatermarks($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.watermarkid,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_watermark')) AND P.watermarkid IS NOT NULL AND (P.shared_post IS NULL OR P.shared_post = '')  $morequery ORDER BY P.user_post_id DESC LIMIT 2") or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostWhich($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.which_image,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_which')) AND P.which_image IS NOT NULL AND (P.shared_post IS NULL OR P.shared_post = '')  $morequery ORDER BY P.user_post_id DESC LIMIT 2") or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostBfAf($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.before_after_images,P.who_can_see_post,P.shared_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_bfaf')) AND P.before_after_images IS NOT NULL AND (P.shared_post IS NULL OR P.shared_post = '')  $morequery ORDER BY P.user_post_id DESC LIMIT 2") or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostImages($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_image')) AND (P.post_type NOT IN('p_cover','p_avatar')) AND (P.shared_post IS NULL OR P.shared_post = '')  $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostFilterImages($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.filter_name,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_image')) AND (P.post_type NOT IN('p_cover','p_avatar')) AND P.filter_name IS NOT NULL AND (P.shared_post IS NULL OR P.shared_post = '') $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostGifImages($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.gif_url,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_gif')) AND (P.post_type NOT IN('p_cover','p_avatar')) AND (P.shared_post IS NULL OR P.shared_post = '') $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostVideos($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.who_can_see_post,P.post_image_id,P.shared_post,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.post_video_name, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_video')) AND (P.shared_post IS NULL OR P.shared_post = '') $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Page Explore All User post*/
public function Dot_PageExplorePostAudios($uid, $lastpostid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT
	 P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.comment_status,P.who_can_see_post,P.shared_post,P.post_audio_id, U.user_name, U.user_fullname 
	 FROM dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type)
   INNER JOIN dot_users U FORCE INDEX (ix_status_istatus)
   ON P.user_id_fk = U.user_id  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  AND P.who_can_see_post = 'everyone' AND (P.post_type IN('p_audio')) AND (P.shared_post IS NULL OR P.shared_post = '') $morequery ORDER BY P.user_post_id DESC LIMIT 2") or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
// Get User Story Posts
public function Dot_FriendStoryPost($uid) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
    $query = mysqli_query($this->db,"
	SELECT DISTINCT 
	S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name, GROUP_CONCAT(S.stories_img) as pics  
	FROM dot_user_stories S, dot_users U, dot_friends F 
	WHERE U.user_status='1' 
	AND S.uid_fk=U.user_id 
	AND S.uid_fk = F.user_two 
	AND FROM_UNIXTIME(S.created) > CURRENT_DATE 
	AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 1 WEEK ) 
	AND F.user_one='$uid'
	AND (F.role = 'fri' OR F.role = 'me' OR F.role = '1' OR F.role = 'flwr') 
	GROUP BY S.uid_fk
	ORDER BY S.uid_fk ASC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	 while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
// Get User Story Posts
public function Dot_AllStoryPost($uid) 
{
	$uid=mysqli_real_escape_string($this->db,$uid);
    $query = mysqli_query($this->db,"
	SELECT DISTINCT 
	S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name, 
	GROUP_CONCAT(S.stories_img) as pics  
	FROM dot_user_stories S, dot_users U 
	WHERE U.user_status='1' 
	AND S.uid_fk=U.user_id  
	AND FROM_UNIXTIME(S.created) > CURRENT_DATE 
	AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 1 WEEK ) 
	GROUP BY S.uid_fk ORDER BY S.uid_fk DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	 while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
/*All Friends For User Profile*/
public function Dot_AllUserFriends($uid, $lastUserID) 
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $lastUserID = mysqli_real_escape_string($this->db, $lastUserID);
   $moreFriends=""; 
    if($lastUserID) { 
	  $moreFriends=" AND F.friend_id<'".$lastUserID."' ";
    } 
	$data = null; 
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_friends F  WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_one='$uid' AND F.role='flwr' $moreFriends ORDER BY F.friend_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
/*All Followers For User Profile*/
public function Dot_AllUserFollowers($uid, $lastUserID) 
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $lastUserID = mysqli_real_escape_string($this->db, $lastUserID);
   $moreFriends=""; 
    if($lastUserID) { 
	  $moreFriends=" AND F.friend_id<'".$lastUserID."' ";
    } 
	$data = null; 
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_friends F  WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_two='$uid' AND F.role='flwr' $moreFriends ORDER BY F.friend_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
/*All Saved Posts From Saved Page*/
public function Dot_SavedPosts($uid, $lastFavouritePostID)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $lastFavouritePostID = mysqli_real_escape_string($this->db, $lastFavouritePostID);
   $morFav ='';
   if($lastFavouritePostID){
		$morFav = "and P.user_post_id < '".$lastFavouritePostID."'";
	}
   $data = null;
   $getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status, P.post_created_time,P.watermarkid,P.which_image,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.user_lat,P.slug, P.user_lang,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_event_id,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.gif_url,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang FROM dot_favourite_list F JOIN dot_user_posts P ON  P.user_post_id = F.fav_post_id JOIN dot_users U ON U.user_id = F.fav_uid_fk WHERE F.fav_post_id  = P.user_post_id AND F.fav_uid_fk = '$uid' $morFav  ORDER BY F.fav_post_id DESC LIMIT ".$this->perpage)or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
/*Show Clicked Post From Right Sidebar*/
public function Dot_ShowPostFromRightSideBar($postID,$postOwnerId)
{
	$postID = mysqli_real_escape_string($this->db, $postID);
	$postOwnerId = mysqli_real_escape_string($this->db, $postOwnerId);
    $getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,P.ads_status,P.ads_display_type,U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id and P.user_post_id='$postID' AND P.user_id_fk = '$postOwnerId'")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
/*Get HashTags*/
public function Dot_GetHashTags($lasthid, $hashTag="")
{
   $hashTag = mysqli_real_escape_string($this->db,strip_tags(trim($hashTag)));
   // Now if it has commas, you have to explode() it to an array
   $hashtags_list = explode(',', $hashTag);
   // A variable to hold all the hashtag LIKE conditions
   $hashtag_query = array();
   foreach ($hashtags_list as $ht) {
   // Each tag has to be checked with LIKE alone
	  $hashtag_query[] = "FIND_IN_SET(LOWER('$ht'), LOWER(hashtag_normal))";
   }
   // Make them into AND conditions
   $hashtag_query = implode(' AND ', $hashtag_query);
 
   $morequery="";
   if($lasthid) {
	   //build up the query
	  $morequery=" AND P.user_post_id < '".$lasthid."' ";
   }
   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
   $getData = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.watermarkid,P.which_image,P.which_image,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.user_lat, P.user_lang,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name,P.gif_url,P.slug,P.post_event_page_id,P.post_video_name ,P.post_page_type,P.post_event_id, U.user_name, U.user_fullname,U.user_page_lang FROM dot_users U  INNER JOIN dot_user_posts P  ON U.user_id =  P.user_id_fk   WHERE ($hashtag_query) $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
 // Search User
 public function Dot_SearchChatUser($uid, $key)
 {
   $key = mysqli_real_escape_string($this->db, $key);
   $uid = mysqli_real_escape_string($this->db, $uid);
   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
   mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
   $result = mysqli_query($this->db,"SELECT U.user_name, U.user_id, U.user_fullname, UT.user_name, UT.user_id, UT.user_fullname, F.role FROM dot_friends F  JOIN dot_users U ON F.user_one = U.user_id JOIN dot_users UT ON F.user_two = UT.user_id WHERE (U.user_name Like '%$key' OR UT.user_fullname Like '$key%' OR UT.user_name Like '$key%' OR UT.user_fullname Like '%$key' OR UT.user_name Like '$key' OR UT.user_fullname Like '$key') AND F.user_one = '$uid' AND F.role IN('fri','flwr') AND UT.message_available = '1' ORDER  BY F.user_one LIMIT 10") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		 $data[]=$row;
    }
    if(!empty($data)) {
	  // Store the result into array
	 return $data;
    } 
 }
/*All Friends For User Profile*/
public function Dot_AllChatFriends($uid) 
{
   $uid = mysqli_real_escape_string($this->db, $uid);  
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_friends F  WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_one='$uid' AND F.role IN('fri','flwr') ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
public function Dot_MostPopularPost()
{ 
$query = mysqli_query($this->db,"
SELECT
      YEARWEEK(FROM_UNIXTIME(liked_time)) AS yearweek,
      post_id_fk,
      liked_post_type,
      COUNT(*) AS cnt
    FROM dot_post_like
    WHERE 
      YEARWEEK(FROM_UNIXTIME(liked_time)) IN (SELECT MAX(YEARWEEK(FROM_UNIXTIME(liked_time))) FROM dot_post_like)
    GROUP BY 
      YEARWEEK(FROM_UNIXTIME(liked_time)),
      post_id_fk,
      liked_post_type
    ORDER BY cnt DESC LIMIT 1
") or die(mysqli_error($this->db));	
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
return $row['post_id_fk']; 
}
/*Show Mot Popular Image Post*/
public function Dot_MostPopularImagePostID($popularPostID)
{
   $popularPostID = mysqli_real_escape_string($this->db, $popularPostID);
   $mostPopularPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.verified_user,U.pro_user_type FROM dot_user_posts P, dot_users U, dot_friends F  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.user_post_id='$popularPostID' AND P.post_type ='p_image' AND P.who_can_see_post = 'everyone' ORDER BY P.user_post_id") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($mostPopularPostQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }   
}
/*Insert a New Stories*/
public function Dot_InsertNewStories($uid, $storyImage) 
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$storyImage = mysqli_real_escape_string($this->db, $storyImage);
	$time = time();
   //Prepare the statement 
   $query = mysqli_query($this->db, "INSERT INTO  dot_user_stories(uid_fk,stories_img, created) VALUES ('$uid','$storyImage', '$time')") or die(mysqli_error($this->db));
   return true;
}
/*Show Language List from Table*/
public function Dot_Langs()
{ 
	$query = mysqli_query($this->db,"SHOW COLUMNS FROM dot_languages WHERE field != 'lang_id' AND field != 'lang_key' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
		return $data;
	 }   
}
/*Change Language*/
public function Dot_ChangeLanguage($uid, $selectedLanguage)
{
    $uid = mysqli_real_escape_string($this->db, $uid); 
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	 if(mysqli_num_rows($checkUserisExist) == 1){
	     $ChagneUserLanguage = mysqli_query($this->db,"UPDATE dot_users SET user_page_lang = '$selectedLanguage' WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
		 return true;
	}else{
	     return false;
	} 
}
/*Total Registered Users*/
public function Dot_CountRegisteredUsers() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS userCount FROM dot_users WHERE user_status = '1'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['userCount'];
	 } else{ return 0;}
}
/*Total Posts*/
public function Dot_TotalUserPosts() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS userPosts FROM dot_user_posts") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['userPosts'];
	 } else{ return 0;}
}
/*Total Comments*/
public function Dot_TotalPostComments() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS commentCount FROM dot_post_comments") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['commentCount'];
	} else{ return 0;}
}
// Total Online Users
public function Dot_TotalOnlineUser()
{ 
   $query = mysqli_query($this->db,"SELECT COUNT(*) AS CountOnlineUser FROM dot_users WHERE FROM_UNIXTIME(last_login) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 3 minute)") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
   if($row) {
	 return $row['CountOnlineUser'];
   } else{ return 0;} 
}
/*Total Messages*/
public function Dot_TotalMessages() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS messageCount FROM dot_chat") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['messageCount'];
	} else{ return 0;}
}
/*Total Posted Videos*/
public function Dot_TotalVideos() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS videosCount FROM dot_videos") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['videosCount'];
	} else{ return 0;}
}
/*Total Posted Text*/
public function Dot_TotalTextPost() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS textPostCount FROM dot_user_posts WHERE post_type = 'p_text'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['textPostCount'];
	} else{ return 0;}
}
/*Total Posted Photos*/
public function Dot_TotalPhotosPost() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS imagePostCount FROM dot_user_posts WHERE post_type = 'p_image'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['imagePostCount'];
	} else{ return 0;}
}
/*Total Posted Links*/
public function Dot_TotalLinksPost() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS linkPostCount FROM dot_user_posts WHERE post_type = 'p_link'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['linkPostCount'];
	} else{ return 0;}
}
/*Total Posted Musics*/
public function Dot_TotalMusicsPost() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS audioPostCount FROM dot_user_posts WHERE post_type = 'p_audio'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['audioPostCount'];
	} else{ return 0;}
}
/*Total Post Liked*/
public function Dot_TotalLikedPosts() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS likedPostCount FROM dot_post_like") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['likedPostCount'];
	} else{ return 0;}
}
/*Total Post Liked*/
public function Dot_TotalCommentLiked() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS likedCommendCount FROM dot_comment_like") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if($row) {
		 return $row['likedCommendCount'];
	} else{ return 0;}
}
/*Total Male User*/ 
public function Dot_CountMaleUser() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS MaleCount FROM dot_users WHERE user_gender = 'male'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['MaleCount'];
	 } else{
		  return false;
	 }
}
/*Total Female User*/ 
public function Dot_CountFemaleUser() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS FemaleCount FROM dot_users WHERE user_gender = 'female'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['FemaleCount'];
	 } else{
		  return false;
	 }
}
/*Count Do not want to show Gender User*/ 
public function Dot_CountDontUser() 
{ 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS DontCount FROM dot_users WHERE user_gender = '0'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['DontCount'];
	 } else{
		  return false;
	 }
}
/***
***************
***************
Admin Functions STARTED HERE
***************
***************
***/
/*Update Website Settings*/
public function Dot_UpdateWebsiteSetting($uid,$websiteName,$websiteKeyword,$websiteInformation,$websiteTitle)
{
	 $uid = mysqli_real_escape_string($this->db, $uid);
     $website_name = mysqli_real_escape_string($this->db,$websiteName);
	 $website_keyword = mysqli_real_escape_string($this->db,$websiteKeyword);
	 $website_info = mysqli_real_escape_string($this->db,$websiteInformation);
	 $websiteTitle = mysqli_real_escape_string($this->db,$websiteTitle);
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET script_name = '$website_name', script_title = '$websiteTitle', site_description= '$website_info', site_keywords = '$websiteKeyword'  WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }
}
/*Update Website Apis*/
public function Dot_UpdateWebsiteAPIs($uid,$googleMapAPI,$googleAnalyticsCode,$apiGiphy,$apiWeather,$DefaultLocationWeather,$yandexTranslateAPIKey,$oneSignalAppID,$oneSignalRestAPI)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $googleMapAPI = mysqli_real_escape_string($this->db,$googleMapAPI);
	 $apiGiphy = mysqli_real_escape_string($this->db,$apiGiphy);  
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET google_map_api = '$googleMapAPI', google_analytics_code = '$googleAnalyticsCode' , giphy_key ='$apiGiphy', weather_default_location = '$DefaultLocationWeather',weather_api='$apiWeather' , yandex_translate_api_key = '$yandexTranslateAPIKey' , one_signal_app_id = '$oneSignalAppID', ons_rest_api = '$oneSignalRestAPI' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }
}
/*Update Maintenance Mode*/
public function Dot_MaintenanceModeUpdate($uid, $maintenanceMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $maintenanceMode = mysqli_real_escape_string($this->db,$maintenanceMode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET maintenance_mode = '$maintenanceMode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
/*Update Maintenance Mode*/
public function Dot_TwilioModeUpdate($uid, $twilioModde) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $twilioModde = mysqli_real_escape_string($this->db,$twilioModde); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET twilio_mode = '$twilioModde' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}

/*Update Product Search Mode*/
public function Dot_ProductSearchModeUpdate($uid, $Mode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $Mode = mysqli_real_escape_string($this->db,$Mode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET search_product = '$Mode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
/*Update Product Menus Mode*/
public function Dot_ProductMenuModeUpdate($uid, $Mode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $Mode = mysqli_real_escape_string($this->db,$Mode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET market_menu = '$Mode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
/*Update Product Menus Mode*/
public function Dot_ProductSliderModeUpdate($uid, $Mode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $Mode = mysqli_real_escape_string($this->db,$Mode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET market_slider = '$Mode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}

/*Language Mode Update*/
public function Dot_UpdateChooseLangMode($uid, $mode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $mode = mysqli_real_escape_string($this->db,$mode);  
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_user_choose_lang = '$mode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
/*User List from Admin Panel*/
public function Dot_AllUsers($lastUserID)
{ 
   $lastUserID = mysqli_real_escape_string($this->db, $lastUserID);
   $morFav ='';
   if($lastUserID){
		$morFav = "AND user_id < '".$lastUserID."'";
	}
   $data = null;
   $getData = mysqli_query($this->db,"SELECT * FROM dot_users WHERE user_id AND user_status='1' $morFav  ORDER BY user_id DESC LIMIT ".$this->perpage)or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
/*User List from Admin Panel*/
public function Dot_AllBlockedUsers($lastUserID)
{ 
   $lastUserID = mysqli_real_escape_string($this->db, $lastUserID);
   $morFav ='';
   if($lastUserID){
		$morFav = "AND user_id < '".$lastUserID."'";
	}
   $data = null;
   $getData = mysqli_query($this->db,"SELECT * FROM dot_users WHERE user_id AND user_status='2' $morFav  ORDER BY user_id DESC LIMIT ".$this->perpage)or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
/*Show This User From Admin Right Sidebar*/
public function Dot_ShowThisUser($userid)
{
   $userid = mysqli_real_escape_string($this->db, $userid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserExist) == 1){
        $query = mysqli_query($this->db,"SELECT  user_id,user_name,user_fullname,user_email,user_password,user_relationship,user_avatar,user_page_lang,user_profile_word,delete_key,user_cover,user_website,user_bio,user_gender,user_height,user_credit,user_weight,user_life_style,user_children,user_smoke,user_drink,user_body_type,user_hair_color,user_eye_color,user_sexuality,notification_count,user_job_title,last_login,user_job_company_name,user_school_university,user_phone_number,post_like_notification,post_comment_notification,comment_like_notification,user_type,follow_notification,visited_profile_notification,private_account,style_mode,show_suggest_hashTags,show_suggest_users,show_advertisement,show_google_ads, profile_bg, profile_bg_type,bg_music_name,bg_music,bg_music_type,pbg_color,pha_color,pt_color,phv_color,pp_icon,pshb_color,pfont_font,pshb_icon,verified_user,email_verification FROM dot_users WHERE user_id='$userid'") or die(mysqli_error($this->db));
		while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
		 }
		 if(!empty($data)) {
			 return $data;
		 } 
   }
}
// Update User Verify
public function Dot_UpdateVerifyStatus($uid, $updateThisUserDetail, $updateUserVerify)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){    
	   $update = mysqli_query($this->db,"UPDATE dot_users SET verified_user = '$updateUserVerify' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Verify
public function Dot_UpdateEmailVerifyStatus($uid, $updateThisUserDetail, $updateUserVerify)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){    
	   if($updateUserVerify == 0){
	       $update = mysqli_query($this->db,"UPDATE dot_users SET email_verification = NULL WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   }else{
		  $update = mysqli_query($this->db,"UPDATE dot_users SET email_verification = '$updateUserVerify' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
		}
	   return true;
   }else{return false;}
}
// Update User Login Passcode
public function Dot_UpdateUserPassCode($uid, $updateThisUserDetail, $updateUserPass)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){   
       $newPassCode = mysqli_real_escape_string($this->db, sha1(md5(trim($updateUserPass))));
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_password = '$newPassCode' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Job Informations
public function Dot_UpdateUserSchollandEducations($uid, $updateThisUserDetail, $updateUserJob,$updateUserWorkCampanyName,$updateUserSchollOrUniversity)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
        mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
        mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_job_company_name = '$updateUserWorkCampanyName' , user_school_university = '$updateUserSchollOrUniversity', user_job_title = '$updateUserJob' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserEyeColorStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_eye_color = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserHairColorStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_hair_color = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserBodyTypeStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_body_type = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserDrinkHabitStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_drink = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserSmokeHabitStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_smoke = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserChildrenStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_children = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserLifeStyleStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_life_style = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserWeightStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_weight = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Height Status
public function Dot_UpdateUserHeightStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_height = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Gender Status
public function Dot_UpdateUserGenderStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_gender = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Sexuality Status
public function Dot_UpdateUserSexualityStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_sexuality = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User RelationShip Status
public function Dot_UpdateUserRelationShipStatus($uid, $updateThisUserDetail, $thisStatus)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){  
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_relationship = '$thisStatus' WHERE user_id = '$updateThisUserDetail'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
// Update User Profile Details
public function Dot_UpdateUserProfileInformations($uid, $updateUserID, $updateUserFullname, $updateUserName, $updateUserWebsite, $updateUserBio, $updateUserLikedWord, $updateUserEmail)
{
   $userid = mysqli_real_escape_string($this->db, $uid);
   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$userid' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$updateUserID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserAdmin) == 1 && mysqli_num_rows($checkUserExist) == 1){ 
        mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
        mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	   $update = mysqli_query($this->db,"UPDATE dot_users SET user_name = '$updateUserName', user_fullname = '$updateUserFullname' , user_website = '$updateUserWebsite', user_bio = '$updateUserBio', user_profile_word = '$updateUserLikedWord', user_email = '$updateUserEmail' WHERE user_id = '$updateUserID'") or die(mysqli_error($this->db));
	   return true;
   }else{return false;}
}
/*Block This User From Website*/
public function Dot_BlockUserIP($uid, $blockThisUserID, $blockThisUserName, $blockThisUserIP,$blockThisUserBecause)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $blockThisUserID = mysqli_real_escape_string($this->db, $blockThisUserID);
   $blockThisUserName = mysqli_real_escape_string($this->db, $blockThisUserName);
   $blockThisUserIP = mysqli_real_escape_string($this->db, $blockThisUserIP);
   $blockThisUserBecause = mysqli_real_escape_string($this->db, $blockThisUserBecause);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$blockThisUserID'") or die(mysqli_error($this->db));
   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
   $time = time();
   $checkBlockedBefore = mysqli_query($this->db,"SELECT blocked_user_id FROM dot_admin_blocked WHERE blocked_user_id = '$blockThisUserID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkBlockedBefore) == 0){
	   $blockUserQuery = mysqli_query($this->db,"UPDATE dot_users SET user_status = '2' WHERE user_id = '$blockThisUserID'") or die(mysqli_error($this->db));
	   $InserBlockList = mysqli_query($this->db,"INSERT INTO `dot_admin_blocked`(blocked_user_id,blocked_user_ip,blocked_time,because_of) VALUES ('$blockThisUserID','$blockThisUserIP','$time','$blockThisUserBecause')") or die(mysqli_error($this->db));
      return true;
   }else{
	  return false;
   }  
}
/*Become a Delete User Account*/
public function Dot_BecomeDeleteUserAccount($uid,$user)
{
   $user = mysqli_real_escape_string($this->db, $user);
   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$user'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1){
              mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE user_id_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_click WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_display WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_note WHERE note_uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_audios WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_avatars WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_backgrounds WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_chat WHERE from_user_id='$user' OR to_user_id='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_comment_like WHERE liked_uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_files WHERE user_id_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_images WHERE user_id_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_videos WHERE user_id_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_events WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE inviter_user_id='$user' OR invited_user_id='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_favourite_list WHERE fav_uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_friends WHERE user_one='$user' OR user_two='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_mentions WHERE m_uid_fk='$user' OR m_user_owner='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_uid_fk='$user' OR not_post_owner_id_fk = '$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE uid_fk='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_like WHERE liked_uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_unlike WHERE unliked_uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_product_seen WHERE seen_uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_report_post WHERE reporter_user_id_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_session WHERE userid ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_story_viewer WHERE s_viewer_user_id ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_supponsored_ads WHERE ads_created_uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_supponsored_ads_img WHERE user_id_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_users WHERE user_id ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_interests WHERE interested_user_id_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_market WHERE market_place_owner_id ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_market_themes WHERE uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_point_earnings WHERE poninted_user_id ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_search_events WHERE searcher_id ='$user' OR  searched_id = '$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_stories WHERE uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_upload_images WHERE user_id_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_videos WHERE uid_fk ='$user'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_withdrawals WHERE withdraw_uid_fk ='$user'") or die(mysqli_error($this->db));
      return true;
   }else{
        return false;
   }
}
// Get User Delete Key
public function Dot_GetDeleteKey($userid)
{
     $userid=mysqli_real_escape_string($this->db,$userid);
	 $query=mysqli_query($this->db,"SELECT delete_key FROM dot_users WHERE user_id = '$userid' AND user_status = '3'");
	if(mysqli_num_rows($query)==1) {
          $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
		  $key=$row['delete_key']; 
		  return $key;
     } else {
           return false;
     }
}
/*Remove This User From Blocked List*/
public function Dot_removeFromBlockList($uid, $userid)
{
    $userid=mysqli_real_escape_string($this->db,$userid);
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	$query=mysqli_query($this->db,"SELECT user_id, user_status FROM dot_users WHERE user_id = '$userid' AND user_status = '2'");
	if(mysqli_num_rows($query)==1 && mysqli_num_rows($checkUserisAdmin) == 1) {
          $blockUserQuery = mysqli_query($this->db,"UPDATE dot_users SET user_status = '1' WHERE user_id = '$userid'") or die(mysqli_error($this->db));
		  return true;
     } else {
           return false;
     }
}
 
/*Page Explore All User post*/
public function Dot_AllUserPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND post_type NOT IN('p_product')  $morequery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*Delete Post From Admin*/
public function Dot_DeletePostAdmin($uid, $deleteThisUserID, $deleteThisPostID)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $deleteThisUserID=mysqli_real_escape_string($this->db,$deleteThisUserID);
    $deleteThisPostID=mysqli_real_escape_string($this->db,$deleteThisPostID);   
	$query=mysqli_query($this->db,"SELECT user_id, user_status FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'"); 
	if(mysqli_num_rows($query)==1) {
           mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_post_id_fk='$deleteThisPostID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE user_post_id='$deleteThisPostID' AND user_id_fk ='$deleteThisUserID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_report_post WHERE reported_post_id_fk='$deleteThisPostID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_post_like WHERE post_id_fk='$deleteThisPostID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE post_id_fk='$deleteThisPostID'") or die(mysqli_error($this->db)); 
		  return true;
     } else {
           return false;
     }
}
/*All Reported Post List From Admin Area*/
public function Dot_AllReportedPostList($lastReport)
{
   $lastReport=mysqli_real_escape_string($this->db,$lastReport); 
   $morequery=""; 
    if($lastReport) { 
	  $morequery=" AND report_id <'".$lastReport."' ";
    } 
	$data = null;   
	$GetAllReportsQuery = mysqli_query($this->db,"SELECT report_id,reported_post_id_fk,reporter_user_id_fk,reported_type,reported_time,report_checked FROM dot_report_post  WHERE report_id  $morequery ORDER BY report_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllReportsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }    
}
/*Update Reported Post Checked Type*/
public function Dot_UpdateReportChecked($checkedID)
{
    $checkedID=mysqli_real_escape_string($this->db,$checkedID);  
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	$checkReportedPostExist = mysqli_query($this->db,"SELECT report_id FROM dot_report_post WHERE report_id = '$checkedID' AND report_checked = '0'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkReportedPostExist)==1 && mysqli_num_rows($checkUserisAdmin)==1) {
	   $updateReportStatus = mysqli_query($this->db,"UPDATE dot_report_post SET report_checked = '1' WHERE report_id = '$checkedID'") or die(mysqli_error($this->db));
	   return true;
	}else{
       return false;
	}
}
/*Show Reported Post From Right Sidebar*/
public function Dot_ShowReportedPostFromRightSideBar($uid,$postID)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$postID = mysqli_real_escape_string($this->db, $postID); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisAdmin) == 1){
	$getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id and P.user_post_id='$postID' ")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
	} 
}
/*Delete Reported Post and Reported ID*/
public function Dot_DeleteReportedPost($uid,$reportID,$reporPosttID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$reportID = mysqli_real_escape_string($this->db, $reportID); 
	$reporPosttID = mysqli_real_escape_string($this->db, $reporPosttID);
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	$checkPostExist =  mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$reporPosttID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkPostExist) == 1){
	       mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_post_id_fk='$reporPosttID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE user_post_id='$reporPosttID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_report_post WHERE reported_post_id_fk='$reporPosttID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_post_like WHERE post_id_fk='$reporPosttID'") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE post_id_fk='$reporPosttID'") or die(mysqli_error($this->db));  
		   return true;
	} else{
	   return false;
	}
}
// Delete Story From Data
public function Dot_DeleteStory($uid, $storyID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$storyID = mysqli_real_escape_string($this->db, $storyID); 
	$checkStoryOwnerisinFromData = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	$checkPostExist =  mysqli_query($this->db,"SELECT s_id FROM dot_user_stories WHERE s_id = '$storyID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkStoryOwnerisinFromData) == 1 && mysqli_num_rows($checkPostExist) == 1){
	       mysqli_query($this->db,"DELETE FROM dot_user_stories WHERE s_id='$storyID'") or die(mysqli_error($this->db)); 
		   return true;
	} else{
	   return false;
	}
}
/*Show All Language keys, values and id*/
public function Dot_AllLanguagesData($lastLangID)
{
   $lastLangID=mysqli_real_escape_string($this->db,$lastLangID); 
   $moreKey=""; 
    if($lastLangID) { 
	  $moreKey=" AND lang_id <'".$lastLangID."' ";
    } 
	$data = null;   
	$getLangQuery = mysqli_query($this->db,"SELECT lang_id,lang_key,english FROM dot_languages  WHERE lang_id  $moreKey ORDER BY lang_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getLangQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Delete Language Key
public function Dot_DeleteLangKey($uid, $keyid)
{   
	$uid = mysqli_real_escape_string($this->db, $uid);
	$keyid = mysqli_real_escape_string($this->db, $keyid); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisAdmin) == 1){
		  mysqli_query($this->db,"DELETE FROM dot_languages WHERE lang_id='$keyid'") or die(mysqli_error($this->db));  
		   return true;
	}else{return false;}
}
/*Show Language Values From right PopUp Side Bar*/
public function Dot_LangKeysValues()
{ 
	$query = mysqli_query($this->db,"SHOW COLUMNS FROM dot_languages WHERE field !='lang_id' AND field != 'lang_key'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
		return $data;
	 }   
}
/*Show This Lang ID values*/
public function Dot_AllLangKeysValues($langIDval)
{
   $langIDval=mysqli_real_escape_string($this->db,$langIDval); 
   $getLangsQuery = mysqli_query($this->db,"SELECT * FROM dot_languages WHERE lang_id = '$langIDval'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($getLangsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
/*Update Language key Word*/
public function Dot_UpdateLanguageKeyValue($uid,$thisLang, $updateID, $updateWord,$updateKey)
{
    $thisLang=mysqli_real_escape_string($this->db,$thisLang); 
	$updateID=mysqli_real_escape_string($this->db,$updateID);  
    $updateKey=mysqli_real_escape_string($this->db,$updateKey); 
    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	$checkLangKeyExist = mysqli_query($this->db,"SELECT lang_id, lang_key FROM dot_languages WHERE lang_id = '$updateID' AND lang_key = '$updateKey'") or die(mysqli_error($this->db));
	$checkColumnExist = mysqli_query($this->db,"SHOW COLUMNS FROM `dot_languages` LIKE '$thisLang'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkLangKeyExist) == 1 && mysqli_num_rows($checkColumnExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1){
	    $updateLanguageKey = mysqli_query($this->db,"UPDATE dot_languages SET  `$thisLang` = '$updateWord' WHERE lang_id = '$updateID' AND lang_key = '$updateKey'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
/*Update Default Style*/
public function Dot_GetDefaultStyle($uid)
{
   $uid=mysqli_real_escape_string($this->db,$uid);
   $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserExist)  == 1){
	  $updateLanguageKey = mysqli_query($this->db,"UPDATE dot_users SET style_mode = '1' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
/*Update Default Style*/
public function Dot_GetNightStyle($uid)
{
   $uid=mysqli_real_escape_string($this->db,$uid);
   $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserExist)  == 1){
	  $updateLanguageKey = mysqli_query($this->db,"UPDATE dot_users SET style_mode = '2' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
/*Update Wellcome Page Theme*/
public function Dot_ChangeWellcomePageTheme($uid,$themeName)
{
  $themeName = mysqli_real_escape_string($this->db, $themeName);
  $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
  if(mysqli_num_rows($checkUserisAdmin) == 1){
      $updateLanguageKey = mysqli_query($this->db,"UPDATE dot_configuration SET wellcome_theme = '$themeName' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
      return true;
  }else {
      return false;
  }
  
} 
/*Fast Emoji List */
public function Dot_FastEmojiList() 
{
   $FastEmojiQuery = mysqli_query($this->db,"SELECT * FROM dot_emoticons WHERE emoji_style = 'fast'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($FastEmojiQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
/*Replace Emoji*/
public function Dot_ReplaceEmoji($text, $base_url)
{
   $text = mysqli_real_escape_string($this->db, $text);
   preg_match_all('/(:\w+:)/', $text, $match);
   $sql = mysqli_query($this->db, "SELECT emoji_key, image FROM dot_emoticons WHERE emoji_key IN ('" . implode("','", $match[0]) . "')") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($sql)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
 // Search User
public function Dot_SearchUser($keys){
	 $keys = mysqli_real_escape_string($this->db, $keys);
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
	 mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $result = mysqli_query($this->db,"SELECT user_name,user_id,user_fullname FROM dot_users WHERE user_name like '%$keys' or  
	user_fullname like '$keys%' or  user_name like '$keys%' or  
	user_fullname like '%$keys' or user_name like '$keys' or  
	user_fullname like '$keys' 
			ORDER BY user_id LIMIT 10") or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		   $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
	   return $data;
	  } 
}
 // Save Search Activity
public function Dot_SaveUserSearchActivity($uid, $searchedUID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$searchedUID = mysqli_real_escape_string($this->db, $searchedUID);
	$time=time();
	$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$searchedUID'") or die(mysqli_error($this->db));
	$checkBeforeSearched = mysqli_query($this->db,"SELECT searcher_id, searched_id FROM dot_user_search_events WHERE searcher_id = '$uid' AND searched_id = '$searchedUID'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($CheckUserExist)  == 1 && mysqli_num_rows($checkBeforeSearched) == 0){
        $InsertSearchActivity = mysqli_query($this->db,"INSERT INTO `dot_user_search_events`(searcher_id,searched_id,searched_time) VALUES ('$uid','$searchedUID','$time')") or die(mysqli_error($this->db));
        return true;
	}else{
	   return false;
	}
}
// Show Searched User List
public function Dot_ShowSearchedUserList($uid){
    $uid = mysqli_real_escape_string($this->db, $uid);
	$query = mysqli_query($this->db,"SELECT search_event_id,searcher_id, searched_id, searched_time FROM dot_user_search_events WHERE searcher_id = '$uid'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		 $data[]=$row;
    }
    if(!empty($data)) {
	  // Store the result into array
	 return $data;
    }  
} 
// All Profile Story Posts
public function Dot_SotriesPosts($uid, $lastStoryPostID)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $lastStoryPostID = mysqli_real_escape_string($this->db, $lastStoryPostID);
   $morStory ='';
   if($lastStoryPostID){
		$morStory = "AND S.s_id < '".$lastStoryPostID."'";
	}
   $data = null;
   $getStories = mysqli_query($this->db,"SELECT DISTINCT S.s_id, S.uid_fk, S.stories_img, S.created , U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_stories S , dot_users U WHERE S.uid_fk = U.user_id AND S.uid_fk = '$uid' $morStory ORDER BY S.s_id DESC LIMIT  2") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($getStories, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Save See Story From data
public function Dot_StorySeen($uid, $storyID)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $storyID = mysqli_real_escape_string($this->db, $storyID);  
   $time = time();
   $checkStoryIDAndUserID = mysqli_query($this->db,"SELECT s_id FROM dot_user_stories WHERE s_id = '$storyID'") or die(mysqli_error($this->db));
   $checkUserSeeThisIDBefore =  mysqli_query($this->db,"SELECT s_viewed_story_id,s_viewer_user_id FROM dot_story_viewer WHERE  s_viewed_story_id='$storyID' AND s_viewer_user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkStoryIDAndUserID) == 1 && mysqli_num_rows($checkUserSeeThisIDBefore) == 0){
	    $InsertStorySeen = mysqli_query($this->db,"INSERT INTO `dot_story_viewer`(s_viewed_story_id,s_viewer_user_id,s_viewed_time) VALUES ('$storyID','$uid','$time')") or die(mysqli_error($this->db));
        return true;
	}else{
	   return false;
	}
}
//Save Seen Other Story From Data
public function Dot_StorySeenNext($uid, $storyImage)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $storyImage = mysqli_real_escape_string($this->db, $storyImage);  
   $time = time(); 
   $GetStoryIDFromData = mysqli_query($this->db,"SELECT s_id,uid_fk FROM dot_user_stories WHERE stories_img = '$storyImage'") or die(mysqli_error($this->db));
   // Fetch the results set
   $dataStoryID = mysqli_fetch_array($GetStoryIDFromData, MYSQLI_ASSOC); 
   $storyID = $dataStoryID['s_id'];   
   $checkStoryIDAndUserID = mysqli_query($this->db,"SELECT s_id FROM dot_user_stories WHERE s_id = '$storyID'") or die(mysqli_error($this->db));
   $checkUserSeeThisIDBefore =  mysqli_query($this->db,"SELECT s_viewed_story_id,s_viewer_user_id FROM dot_story_viewer WHERE  s_viewed_story_id='$storyID' AND s_viewer_user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkStoryIDAndUserID) == 1 && mysqli_num_rows($checkUserSeeThisIDBefore) == 0){
	    $InsertStorySeen = mysqli_query($this->db,"INSERT INTO `dot_story_viewer`(s_viewed_story_id,s_viewer_user_id,s_viewed_time) VALUES ('$storyID','$uid','$time')") or die(mysqli_error($this->db));
        return true;
	}else{
	   return false;
	}
}
// Get Post Notification Text
public function Dot_GetPotTextTitleFromNotification($postNotificationID)
{
   $postNotificationID = mysqli_real_escape_string($this->db, $postNotificationID);
   $GetNotificationText = mysqli_query($this->db,"SELECT user_post_id,post_title_text FROM dot_user_posts WHERE user_post_id = '$postNotificationID'") or die(mysqli_error($this->db)); 
   $data=mysqli_fetch_array($GetNotificationText,MYSQLI_ASSOC);
	if($data['post_title_text']) {
		$postTitle=$data['post_title_text'];
	    return  $postTitle;
	}else{
	   return false;
	}
}
// Get Post Notification Text
public function Dot_GetPotTextDescriptionFromNotification($postNotificationID)
{
   $postNotificationID = mysqli_real_escape_string($this->db, $postNotificationID);
   $GetNotificationText = mysqli_query($this->db,"SELECT user_post_id,post_text_details FROM dot_user_posts WHERE user_post_id = '$postNotificationID'") or die(mysqli_error($this->db)); 
   $data=mysqli_fetch_array($GetNotificationText,MYSQLI_ASSOC);
	if($data['post_text_details']) {
		$postDescription=$data['post_text_details'];
	    return  $postDescription;
	}else{
	   return false;
	}
} 
// Site Configurations 
public function Dot_StoriesViewCount($sPostID) 
{
	
	$sPostID = mysqli_real_escape_string($this->db,$sPostID); 
	$queryCountStory = mysqli_query($this->db,"SELECT COUNT(*) AS UniqViewCount FROM dot_story_viewer WHERE s_viewed_story_id  = '$sPostID'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($queryCountStory,MYSQLI_ASSOC);
	if ($row['UniqViewCount']) {
		$CountStoryResult = $row['UniqViewCount'];
		 return $CountStoryResult;
	 } else{
		  return false;
	 }
}
// Check Username is already from database 
public  function GetTheMentions($content,$base_url) {
     
    if (preg_match_all("/\B@\K[\w-]+/", $content, $matches)) { 
        if (!$result = mysqli_query($this->db, "SELECT user_id, user_name, user_fullname FROM dot_users WHERE user_name  IN ('" . implode("','", $matches[0]) . "')")) {
            // error
        } else {
            foreach ($result as $row) {
                $content = preg_replace("~\B@{$row["user_name"]}\b~", "<a href=\"{$base_url}profile/{$row["user_name"]}\" class=\"mention_ show_card\" id=\"{$row["user_id"]}\" data-user=\"{$row["user_name"]}\" data-type=\"userCard\">@{$row["user_fullname"]}</a>", $content);
            }
        }
    }
    return $content;
} 
// Show Story Viewers
public function Dot_StoryViewersList($storyID,$ownerID, $uid){ 
	$storyID = mysqli_real_escape_string($this->db,$storyID); 
	$ownerID = mysqli_real_escape_string($this->db,$ownerID); 
	$uid = mysqli_real_escape_string($this->db,$uid);
	/* More Button*/
  $moreProfilePostQuery="";
   
   if($storyID) {
	  //build up the query
	  $moreProfilePostQuery=" and S.s_view_id >".$storyID."";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT U.user_name, U.user_fullname,U.private_account, S.s_viewed_story_id , S.s_view_id, S.s_viewer_user_id , S.s_viewed_time, O.uid_fk  FROM  dot_story_viewer S, dot_users U, dot_user_stories O  WHERE U.user_status='1' AND O.uid_fk = '$uid' AND S.s_viewer_user_id = U.user_id AND S.s_viewed_story_id ='$storyID' $moreProfilePostQuery  ORDER BY  S.s_viewed_story_id  DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 
/*Get All Notification Without Friend Request*/
public function Dot_GetAllMentionNotificationList($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $GetAllNotifications = mysqli_query($this->db,"SELECT DISTINCT M.m_id,M.m_uid_fk ,M.m_post_id_fk , M.m_type , M.m_status , M.m_time ,M.m_user_owner, U.user_name, U.user_fullname FROM dot_mentions M, dot_users U WHERE M.m_uid_fk = U.user_id AND M.m_uid_fk = '$uid' ORDER BY M.m_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
		while($row=mysqli_fetch_array($GetAllNotifications,MYSQLI_ASSOC)) {
           // Store the result into array
           $data[]=$row;
        }
        if(!empty($data)) {
           // Store the result into array
           return $data;
        }
	}
}

// Insert Mention
public function Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername){
   $uid = mysqli_real_escape_string($this->db,$uid);
   $mentionPostID = mysqli_real_escape_string($this->db,$mentionPostID);
   $mention_regex = '/@([A-Za-z0-9_]+)/i';
   $pregMatch = preg_match_all($mention_regex, $postDetails, $matches);
   if($pregMatch){
   
   
   foreach ($matches[1] as $key => $match) {
	  if ($match != $dataUsername) {
	   // Add the user to an array if it is not the logged in user.
	   $mentioned[] = mysqli_real_escape_string($this->db, $match);
	  } 
	   
   }  
       $mentionTime = time();     
	   $mentioned = array_unique($mentioned);
       $mention_sql = mysqli_query($this->db,"INSERT INTO dot_mentions (m_uid_fk , m_type , m_post_id_fk,m_user_owner, m_status,mention_type, m_time ) SELECT user_id, '$type', '$mentionPostID','$uid', '1', 'post', '$mentionTime' FROM dot_users WHERE user_name IN ('" .implode("','", $mentioned). "')") or die(mysqli_error($this->db));  
       $mentionNot = mysqli_query($this->db,"UPDATE dot_users SET notification_count = '1' WHERE user_name IN ('" .implode("','", $mentioned). "')") or die(mysqli_error($this->db));  
	} 
}
// Insert Mention
public function Dot_InsertMentionedUsersForComment($uid,$postDetails, $type, $mentionPostID, $dataUsername){
   $uid = mysqli_real_escape_string($this->db,$uid);
   $mentionPostID = mysqli_real_escape_string($this->db,$mentionPostID);
   $mention_regex = '/@([A-Za-z0-9_]+)/i';
   $pregMatch = preg_match_all($mention_regex, $postDetails, $matches);
   if($pregMatch){
   
   
   foreach ($matches[1] as $key => $match) {
	  if ($match != $dataUsername) {
	   // Add the user to an array if it is not the logged in user.
	   $mentioned[] = mysqli_real_escape_string($this->db, $match);
	  } 
	   
   }  
   $mentionTime = time();     
	   $mentioned = array_unique($mentioned);
    $mention_sql = mysqli_query($this->db,"INSERT INTO dot_mentions (m_uid_fk , m_type , m_post_id_fk,m_user_owner, m_status,mention_type, m_time ) SELECT user_id, '$type', '$mentionPostID','$uid', '1', 'comment', '$mentionTime' FROM dot_users WHERE user_name IN ('" .implode("','", $mentioned). "')") or die(mysqli_error($this->db));  
    $mentionNot = mysqli_query($this->db,"UPDATE dot_users SET notification_count = '1' WHERE user_name IN ('" .implode("','", $mentioned). "')") or die(mysqli_error($this->db));  
	} 
}
// Search Friend For Mention
public function Dot_SearchMention($uid, $searchmUser)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $searchmUser = mysqli_real_escape_string($this->db,$searchmUser);  
   $sql_res=mysqli_query($this->db,"SELECT user_name, user_id, user_fullname, user_avatar, user_status,private_account  FROM dot_users WHERE (user_name like '%$searchmUser%' or user_fullname like '%$searchmUser%') AND private_account = '0' ORDER BY user_id LIMIT 5") or die(mysqli_error($this->db));  
   while($row=mysqli_fetch_array($sql_res,MYSQLI_ASSOC)) {
           // Store the result into array
           $data[]=$row;
        }
        if(!empty($data)) {
           // Store the result into array
           return $data;
        }
} 
/*Sticker List */
public function Dot_StickerList() 
{
   $StickerQuery = mysqli_query($this->db,"SELECT * FROM dot_emoticons WHERE emoji_style = 'sticker'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($StickerQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
/*Replace Emoji*/
public function Dot_ReplaceSticker($text, $base_url)
{
   $text = mysqli_real_escape_string($this->db, $text);
   preg_match_all('/(_\w+_)/', $text, $match);
   $sql = mysqli_query($this->db, "SELECT emoji_key, image FROM dot_emoticons WHERE emoji_key IN ('" . implode("','", $match[0]) . "')") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($sql)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
/*Save Sticker Answer*/
public function Dot_SaveSendedStickerAnswer($uid,$PostID,$stickertKey,$UserCreatedType)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$PostID = mysqli_real_escape_string($this->db, $PostID);
	$stickertKey = mysqli_real_escape_string($this->db, $stickertKey);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$checkUser = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$checkPostID = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	$checkEmojiKey = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_key = '$stickertKey'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUser)  == 1 && mysqli_num_rows($checkPostID)  == 1 && mysqli_num_rows($checkEmojiKey)  == 1){
	     $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,sticker,user_ip,comment_created_time,post_id_fk)VALUES('$uid','$stickertKey','$ip','$time','$PostID')") or die(mysqli_error($this->db));
		 $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $uid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$uid','$PostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text,C.sticker, C.user_ip, C.comment_created_time, U.user_name, U.user_fullname FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$PostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
/*Create a new Comment With Sticker From Data*/
public function Dot_AddNewCommentwithSticker($CommentPostID, $CommentText, $commentedUid, $UserCreatedType, $sticker) 
{
    $CommentPostID = mysqli_real_escape_string($this->db, $CommentPostID); 
	$commentedUid = mysqli_real_escape_string($this->db,$commentedUid);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$sticker = mysqli_real_escape_string($this->db,$sticker); 
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	// Check the post already in data
    $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckPostIDFromData) == 1){
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	    $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,comment_text,sticker,user_ip,comment_created_time,post_id_fk)VALUES('$commentedUid','$CommentText','$sticker','$ip','$time','$CommentPostID')") or die(mysqli_error($this->db));
		//Create Notification for post owner
	    // Get post type from data_user_posts for a notification
	    $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $commentedUid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$commentedUid','$CommentPostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip,C.sticker, C.comment_created_time, U.user_name, U.user_fullname FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$CommentPostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
// Disable Enable Comment
public function Dot_CommentDisableEnable($uid, $postID, $commentStatusType)
{  
   //comment_status
   $uid = mysqli_real_escape_string($this->db,$uid);
   $postID = mysqli_real_escape_string($this->db,$postID); 
   $commentStatusType = mysqli_real_escape_string($this->db,$commentStatusType);  
   $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckPostIDFromData) == 1){
       $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_user_posts SET comment_status = '$commentStatusType' WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	   return true;
   }else{
	   return false;
   }
} 
/*Save Text Post*/
public function Dot_UpdatePostDetils($uid,$postID, $updateThisPostTitle, $postDetailsHtml, $tags, $updateThisPostHashTags) {
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$saveTextFromData = mysqli_query($this->db,"UPDATE dot_user_posts SET hashtag_normal = '$tags' , hashtag_diez = '$updateThisPostHashTags' , post_title_text = '$updateThisPostTitle', post_text_details = '$postDetailsHtml' WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	$getNewTextPost = mysqli_query($this->db,"SELECT user_id_fk, user_post_id, hashtag_normal, hashtag_diez, post_title_text, post_text_details,post_type FROM dot_user_posts WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
// Delete Mention
public function Dot_DeleteMention($postID, $uid){
   $uid = mysqli_real_escape_string($this->db,$uid);
   $postID = mysqli_real_escape_string($this->db,$postID); 
   $DeleteOldMention = mysqli_query($this->db,"DELETE FROM dot_mentions WHERE m_user_owner='$uid' AND m_post_id_fk = '$postID' AND mention_type = 'post'") or die(mysqli_error($this->db));
   if($DeleteOldMention){return true;}else{return false;}
}
/*All Followers For User Profile*/
public function Dot_OnlineFriends($uid) 
{ 
   $uid = mysqli_real_escape_string($this->db, $uid); 
   $tree_minutes_ago = time() - (60 * 1);
   $datetime = date("Y-m-d H:i:s", $tree_minutes_ago);    
	$allFriendsQuery = mysqli_query($this->db,"
	SELECT DISTINCT
	F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname,U.last_login
	FROM
	dot_users U
	INNER JOIN dot_friends F ON U.user_status = '1' AND U.user_id = F.user_two AND F.user_one='$uid' 
	LEFT JOIN dot_chat C ON (C.from_user_id = F.user_two OR C.to_user_id = F.user_two)
	WHERE
	U.last_login >= '$tree_minutes_ago'  AND F.role IN('flwr','fri') AND
	( C.from_user_id IS NULL AND C.to_user_id IS NULL)
	ORDER BY F.user_two DESC LIMIT
	" .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
} 
// Count Online Friends
public function Dot_OnlineFriendsCount($uid)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$tree_minutes_ago = time() - (60 * 1);
    $datetime = date("Y-m-d H:i:s", $tree_minutes_ago);   
	$GetOnlineFriendsCount = mysqli_query($this->db,"SELECT  F.friend_id, F.user_one, F.user_two, U.user_id,U.last_login, COUNT(U.user_id) AS userOnlineCount FROM dot_users U, dot_friends F WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_two='$uid' AND 
	 U.last_login >= '$tree_minutes_ago'  AND (F.role='flwr' OR F.role = 'fri') ") or die(mysqli_error($this->db));
    $sumFriens = mysqli_fetch_array($GetOnlineFriendsCount,MYSQLI_ASSOC);
   if($sumFriens) { 
	    //return the userPostcount
		return $sumFriens['userOnlineCount'];
     }else{
	 return 0;
	}   
}
/*Change Background From User Profile*/
public function Dot_ProfileBackgroundUpload($uid, $actual_image_name) 
{ 
     $uid = mysqli_real_escape_string($this->db, $uid);
	 // Insert an image if user selected correct formating image
	 mysqli_query($this->db,"INSERT INTO `dot_backgrounds`(image_path,uid_fk,image_type) VALUES ('$actual_image_name','$uid','background_profile')") or die(mysqli_error($this->db));
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_users SET profile_bg ='$actual_image_name'  WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT user_id,profile_bg  FROM dot_users WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
} 
// Get Background Image ID
public function Dot_GetProfileBackgroundID($uid, $image) 
{
	if($image) {
	   //If image is not empty 
	   //The query to select for image path
	  $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_backgrounds WHERE image_path='$image' AND image_type = 'background_profile'") or die(mysqli_error($this->db));
	 } else {
	   //The query to select for image id
	   $query = mysqli_query($this->db,"SELECT id,image_path,image_type FROM dot_backgrounds WHERE uid_fk='$uid' AND image_type='background_profile' ORDER BY id DESC ") or die(mysqli_error($this->db));
	 }
	   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $result;
}
// Open Close Profile Background Image
public function Dot_EnableDisableBackgroundImage($uid, $type)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserExist) == 1){
	  $query = mysqli_query($this->db,"UPDATE dot_users SET profile_bg_type = '$type' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if($query){
		   return true;
		}else{
		   return false;
		}
   }
   
}
/*Change Background From User Profile*/
public function Dot_ProfileBackgroundMusicUpload($uid, $actual_bgMusicName,$actual_audiobgname) 
{ 
     $uid = mysqli_real_escape_string($this->db, $uid); 
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_users SET bg_music ='$actual_bgMusicName'  , bg_music_name = '$actual_audiobgname' WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT user_id,bg_music_name,bg_music  FROM dot_users WHERE user_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
} 
// Open Close Profile Background Music
public function Dot_EnableDisableBackgroundMusic($uid, $type)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckUserExist) == 1){
	  $query = mysqli_query($this->db,"UPDATE dot_users SET bg_music_type = '$type' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if($query){
		   return true;
		}else{
		   return false;
		}
   } 
}  
// Show Post Liked Users
public function Dot_ShowPostLikedUserAvatar($postID)
{
    $postID = mysqli_real_escape_string($this->db, $postID);
	$getPostLikedUsers = mysqli_query($this->db,"SELECT post_id_fk, liked_uid_fk ,liked_time  FROM dot_post_like WHERE post_id_fk = '$postID' ORDER BY post_id_fk ASC LIMIT 5" ) or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($getPostLikedUsers, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Pot Liked Users
public function Dot_PostLikedUsers($postID)
{
     $postID = mysqli_real_escape_string($this->db, $postID);
	 $getPostLikedUsers = mysqli_query($this->db,"SELECT post_id_fk, liked_uid_fk ,liked_time  FROM dot_post_like WHERE post_id_fk = '$postID' ORDER BY post_id_fk ASC LIMIT 5" ) or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($getPostLikedUsers, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Show Story Viewers
public function Dot_PostLikedUsersMore($postID, $lastLikedPost){ 
	$postID = mysqli_real_escape_string($this->db,$postID); 
	$lastLikedPost = mysqli_real_escape_string($this->db,$lastLikedPost);  
	/* More Button*/
    $moreLikedPostUserQuery="";
   
   if($lastLikedPost) {
	  //build up the query
	  $moreLikedPostUserQuery=" and L.like_id <".$lastLikedPost."";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT U.user_name, U.user_fullname,U.user_id,U.private_account, L.like_id, L.post_id_fk, L.liked_uid_fk, L.liked_time  FROM  dot_post_like L, dot_users U  WHERE U.user_status='1' AND  L.liked_uid_fk = U.user_id AND L.post_id_fk ='$postID' $moreLikedPostUserQuery  ORDER BY  L.like_id  DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 
/*Gif List */
public function Dot_GifList() 
{
   $StickerQuery = mysqli_query($this->db,"SELECT * FROM dot_emoticons WHERE emoji_style = 'gif' ORDER BY RAND()") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($StickerQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
// Search Translate Key
public function Dot_SearchGifFromData($uid,$SearchGifKey){
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $keys = mysqli_real_escape_string($this->db, $SearchGifKey);
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
	 mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUser = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUser) == 1){ 
		 $result = mysqli_query($this->db,"SELECT * FROM dot_emoticons WHERE full_key like '%$keys%' AND emoji_style = 'gif' ORDER BY emoji_id LIMIT 30") or die(mysqli_error($this->db));
		 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {      
			   $data[]=$row;
		  }
		  if(!empty($data)) {
			// Store the result into array
		   return $data;
		  } 
	 }else{
	     return false;
	 } 
}
/*Replace Emoji*/
public function Dot_ReplaceGif($text, $base_url)
{
   $text = mysqli_real_escape_string($this->db, $text);
   preg_match_all('/(-\w+-)/', $text, $match);
   $sql = mysqli_query($this->db, "SELECT emoji_key, image FROM dot_emoticons WHERE emoji_key IN ('" . implode("','", $match[0]) . "')") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($sql)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
} 
/*Save Sticker Answer*/
public function Dot_SaveSendedGifAnswer($uid,$PostID,$gifKey,$UserCreatedType)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$PostID = mysqli_real_escape_string($this->db, $PostID);
	$gifKey = mysqli_real_escape_string($this->db, $gifKey);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$checkUser = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$checkPostID = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	$checkEmojiKey = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_key = '$gifKey'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUser)  == 1 && mysqli_num_rows($checkPostID)  == 1 && mysqli_num_rows($checkEmojiKey)  == 1){
	     $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,gif,user_ip,comment_created_time,post_id_fk)VALUES('$uid','$gifKey','$ip','$time','$PostID')") or die(mysqli_error($this->db));
		 $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$PostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $uid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$uid','$PostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text,C.sticker,C.gif, C.user_ip, C.comment_created_time, U.user_name, U.user_fullname FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$PostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
/*Create a new Comment With Sticker From Data*/
public function Dot_AddNewCommentwithGif($CommentPostID, $CommentText, $commentedUid, $UserCreatedType, $ggif) 
{
    $CommentPostID = mysqli_real_escape_string($this->db, $CommentPostID); 
	$commentedUid = mysqli_real_escape_string($this->db,$commentedUid);
	$UserCreatedType = mysqli_real_escape_string($this->db,$UserCreatedType);
	$ggif = mysqli_real_escape_string($this->db,$ggif); 
	$time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	// Check the post already in data
    $CheckPostIDFromData = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckPostIDFromData) == 1){
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	    $InsertComment = mysqli_query($this->db,"INSERT INTO dot_post_comments(uid_fk,comment_text,gif,user_ip,comment_created_time,post_id_fk)VALUES('$commentedUid','$CommentText','$ggif','$ip','$time','$CommentPostID')") or die(mysqli_error($this->db));
		//Create Notification for post owner
	    // Get post type from data_user_posts for a notification
	    $GetPostTypeStatusFromPostData = mysqli_query($this->db,"SELECT post_type,user_id_fk FROM dot_user_posts WHERE user_post_id = '$CommentPostID'") or die(mysqli_error($this->db));
	    // Fetch the results set
	    $dataPostCreatedType = mysqli_fetch_array($GetPostTypeStatusFromPostData, MYSQLI_ASSOC);
	    $CreatedPostType = $dataPostCreatedType['post_type'];
		$CreatedPostOwnerID = $dataPostCreatedType['user_id_fk']; 
		$CheckUserWantToGetNotification = mysqli_query($this->db,"SELECT user_id,post_comment_notification FROM dot_users WHERE user_id = '$CreatedPostOwnerID'") or die(mysqli_error($this->db));
		$dataPostCreatedUserID = mysqli_fetch_array($CheckUserWantToGetNotification, MYSQLI_ASSOC);
		$GetNotification = $dataPostCreatedUserID['post_comment_notification'];
		if($CreatedPostOwnerID !== $commentedUid && $GetNotification == '1'){
		   $CreateNotification = mysqli_query($this->db,"INSERT INTO dot_notifications(not_type,note_type_type,not_time,not_uid_fk,not_post_id_fk,not_post_owner_id_fk,not_read_status)VALUES('$UserCreatedType','post_comment','$time','$commentedUid','$CommentPostID','$CreatedPostOwnerID','0')") or die(mysqli_error($this->db)); 
		   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET notification_count = notification_count + 1 WHERE user_id = '$CreatedPostOwnerID' AND user_status = '1'") or die(mysqli_error($this->db));
		} 
		$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip,C.gif, C.comment_created_time, U.user_name, U.user_fullname FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$CommentPostID' ORDER BY C.comment_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
		// Fetch the results set
		$result = mysqli_fetch_array($DataComments, MYSQLI_ASSOC);
	    return $result;
	}
}
// Supponsored Advertisements
public function Dot_GetSupponsoredAdvertisement($dataUserGender, $adsPerClick, $adsPerimpression)
{
   $time = date("Y-m-d H:i:s");
   $QuerySupponsoredAds = mysqli_query($this->db,"SELECT s_ads_id, ads_created_uid_fk, s_ads_title, s_ads_description, s_ads_website, s_ads_img, s_ads_status, ads_campany_name, ads_show_gender, ads_display_area, ads_offer, ads_category, ads_last_time, admin_activated, s_ads_time, credit FROM dot_supponsored_ads WHERE s_ads_status='1' AND admin_activated ='adsactive' AND ads_last_time > '$time' AND ( ads_show_gender = '$dataUserGender' OR ads_show_gender = 'all' ) AND ( ads_display_area = '1' OR ads_display_area = '2' ) AND (credit >= '$adsPerClick' OR credit >= '$adsPerimpression') ORDER BY RAND() LIMIT 1") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($QuerySupponsoredAds, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
}
/*Get Uploaded Image IDS From dot_user_uploads_image*/
public function Dot_GetUploadAdsImageID($imageID)
{
   $GetImageId = mysqli_query($this->db,"SELECT s_ads_img_id,s_ads_img_img  FROM dot_supponsored_ads_img WHERE s_ads_img_id ='$imageID'") or die(mysqli_error($this->db));
   $resultImageID = mysqli_fetch_array($GetImageId,MYSQLI_ASSOC);
   return $resultImageID;
} 
// Substract Ads Offer Per Click for One User
public function Dot_SubtractAdsOfferPerClick($supponsoredAdsID,$uid,$adsPerClick)
{
     $supponsoredAdsID = mysqli_real_escape_string($this->db,  $supponsoredAdsID);
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $adsPerClick = mysqli_real_escape_string($this->db, $adsPerClick);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_click WHERE uid_fk = '$uid' AND ads_id_fk = '$supponsoredAdsID'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1){
         $saveClick = mysqli_query($this->db,"INSERT INTO dot_ads_click(uid_fk, ads_id_fk, time, ip)VALUES('$uid','$supponsoredAdsID',NOW(),'$ip')") or die(mysqli_error($this->db));
		 $creditUpdate = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET credit = credit - $adsPerClick WHERE s_ads_id='$supponsoredAdsID'") or die(mysqli_error($this->db));
		 return true;
	 }else{
	     return false;
	 }
}
// Substract Ads Offer Per Click for One User
public function Dot_SubtractAdsOfferImpression($supponsoredAdsID,$uid,$adsPerimpression)
{
     $supponsoredAdsID = mysqli_real_escape_string($this->db,  $supponsoredAdsID);
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $adsPerimpression = mysqli_real_escape_string($this->db, $adsPerimpression);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_display WHERE uid_fk = '$uid' AND ads_id_fk = '$supponsoredAdsID'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1){
         $saveClick = mysqli_query($this->db,"INSERT INTO dot_ads_display(uid_fk, ads_id_fk, time, ip)VALUES('$uid','$supponsoredAdsID',NOW(),'$ip')") or die(mysqli_error($this->db));
		 $creditUpdate = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET credit = credit - $adsPerimpression WHERE s_ads_id='$supponsoredAdsID'") or die(mysqli_error($this->db));
	 }
}
/*Upload a New Image From Data*/
public function Dot_AdsImageUpload($uid, $imageName) 
{    
	$time = time(); 
	$ids = 0;
	// Add the insert image
	$query = mysqli_query($this->db,"INSERT INTO dot_supponsored_ads_img (user_id_fk,s_ads_img_img,s_ads_img_time)VALUES('$uid' ,'$imageName','$time')") or die(mysqli_error($this->db)); 
	$ids = mysqli_insert_id($this->db);
	return $ids; 
}
/*Get Uploaded Image From Data*/
public function Dot_GetUploadedAdsImage($uid, $imageName) 
{ 
	if($imageName) {
	   //Get the image name and image id for image preview
	  $query = mysqli_query($this->db,"SELECT s_ads_img_id,s_ads_img_img FROM dot_supponsored_ads_img WHERE user_id_fk='$uid' ORDER BY s_ads_img_id DESC") or die(mysqli_error($this->db));
	  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	  return $result;
	 } else {
	   return false;
	 } 
}
/*Delete The Image Before The Post Saved Data*/ 
public function Dot_DeleteImageAdsFromDataBeforeSend($uid, $imageID, $base_url)
{
  $uid = mysqli_real_escape_string($this->db, $uid);
  $imageID = mysqli_real_escape_string($this->db, $imageID);
  $checkImageInData = mysqli_query($this->db,"SELECT s_ads_img_id, user_id_fk,s_ads_img_img FROM dot_supponsored_ads_img WHERE s_ads_img_id = '$imageID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
  $result = mysqli_fetch_array($checkImageInData, MYSQLI_ASSOC);
  $image = $result['s_ads_img_img'];
  if(mysqli_num_rows($checkImageInData) == '1'){
	  if(unlink($base_url.$image)){
	     mysqli_query($this->db,"DELETE FROM `dot_supponsored_ads_img` WHERE s_ads_img_id = '$imageID'") or die(mysqli_error($this->db));
	     return true;
	  } 
  }else{
	  return false; 
  }
}
// Save Advertisement From Data
public function Dot_SaveAdvertisement($aCampanyName, $aWeb, $aShow, $aAreaDisplay, $aTitle, $aOffer, $aCategory, $aLive, $aDescription, $aFile, $aTime,$uid,$displayDay,$userBudget)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $aCampanyName = mysqli_real_escape_string($this->db, $aCampanyName);
	   $aWeb = mysqli_real_escape_string($this->db, $aWeb);
	   $aShow = mysqli_real_escape_string($this->db, $aShow);
	   $aAreaDisplay = mysqli_real_escape_string($this->db, $aAreaDisplay);
	   $aTitle = mysqli_real_escape_string($this->db, $aTitle);
	   $aOffer = mysqli_real_escape_string($this->db, $aOffer);
	   $aCategory = mysqli_real_escape_string($this->db, $aCategory);
	   $aLive = mysqli_real_escape_string($this->db, $aLive);
	   $aDescription = mysqli_real_escape_string($this->db, $aDescription);
	   $aFile = mysqli_real_escape_string($this->db, $aFile);
	   $aTime = mysqli_real_escape_string($this->db, $aTime);
	   $displayDay = mysqli_real_escape_string($this->db,$displayDay);
	   $userBudget = mysqli_real_escape_string($this->db,$userBudget);
	   $ip=$_SERVER['REMOTE_ADDR'];	
	   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserIDFromDatabase) == 1){
	         $insertAdvertisement = mysqli_query($this->db,"INSERT INTO dot_supponsored_ads(ads_created_uid_fk, ads_campany_name, s_ads_website, ads_show_gender, ads_display_area, s_ads_title, ads_offer, ads_category, ads_last_time ,s_ads_description, s_ads_img, s_ads_status, admin_activated, s_ads_time, credit,s_ads_display_day,a_credit )VALUES('$uid','$aCampanyName','$aWeb','$aShow','$aAreaDisplay','$aTitle','$aOffer','$aCategory','$aTime','$aDescription','$aFile','0','adswaiting_approval',NOW(),'$userBudget','$displayDay','$userBudget')") or die(mysqli_error($this->db));
			 return true;
	   }
}
/*Show All Language keys, values and id*/
public function Dot_AllAdvertisementData($lastAdsID)
{
   $lastAdsID=mysqli_real_escape_string($this->db,$lastAdsID); 
   $moreKey=""; 
    if($lastAdsID) { 
	  $moreKey=" AND s_ads_id <'".$lastAdsID."' ";
    } 
	$data = null;   
	$getAdsQuery = mysqli_query($this->db,"SELECT s_ads_id,ads_created_uid_fk,s_ads_status,admin_activated,ads_offer   FROM dot_supponsored_ads  WHERE s_ads_id  $moreKey ORDER BY s_ads_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getAdsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
/*Total uniq Post Ads View Count*/ 
public function Dot_UniqAdsViewCount($ads_id) 
{
	$ads_id = mysqli_real_escape_string($this->db,$ads_id); 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS UniqAdsViewCount FROM dot_ads_display WHERE ads_id_fk = '$ads_id'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['UniqAdsViewCount'];
	 } else{
		  return false;
	 }
}
/*Total uniq Post Ads View Count*/ 
public function Dot_UniqAdsClickCount($ads_id) 
{
	$ads_id = mysqli_real_escape_string($this->db,$ads_id); 
	$q = mysqli_query($this->db,"SELECT COUNT(*) AS UniqAdsClickCount FROM dot_ads_click WHERE ads_id_fk = '$ads_id'") or die(mysqli_error($this->db));
	$row = mysqli_fetch_array($q, MYSQLI_ASSOC);
	if ($row) {
		 return $row['UniqAdsClickCount'];
	 } else{
		  return false;
	 }
}
/*Get User Advertisement*/
public function Dot_GetUAds($adsID, $uid)
{
    $adsID = mysqli_real_escape_string($this->db,$adsID); 
	$checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$adsID'") or die(mysqli_error($this->db));
	$checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	     $getAdvertisementFromID = mysqli_query($this->db,"SELECT s_ads_id,ads_created_uid_fk, ads_campany_name, s_ads_website, ads_show_gender, ads_display_area, s_ads_title, ads_offer, ads_category, ads_last_time ,s_ads_description, s_ads_img, s_ads_status, admin_activated, s_ads_time, credit,s_ads_display_day ,a_credit FROM dot_supponsored_ads WHERE s_ads_id = '$adsID'") or die(mysqli_error($this->db));
		 while($row=mysqli_fetch_array($getAdvertisementFromID)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
	}
}
// Update User Advertisement
public function Dot_UpdateEditAdvertisement($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsBudget,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsStayLive,$eadsOffer,$aTime,$uid,$eadsAdminApproveStatus,$userID)
{
       mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$eadsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
		      $updaetAdvertisement = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET ads_campany_name = '$eadsCampanyName', s_ads_website = '$eadsRedirectUrl', ads_show_gender = '$eadsWhoCanSee', ads_display_area = '$eadsDisplayArea',  s_ads_title = '$eadsTitle',ads_offer='$eadsOffer',ads_category= '$eadsCategory', ads_last_time = '$aTime', s_ads_description = '$eadsDescription', admin_activated = '$eadsAdminApproveStatus', s_ads_time = NOW() , credit = '$eadsBudget',a_credit='$eadsBudget', s_ads_display_day = '$eadsStayLive'  WHERE s_ads_id = '$eadsID'") or die(mysqli_error($this->db));
			  $updateUserCredit = mysqli_query($this->db,"UPDATE dot_users SET user_credit = user_credit - $eadsBudget WHERE user_id = '$userID'") or die(mysqli_error($this->db));
			   return true;
	   }else{
	         return false;
	   }
}
// Delete Advertisement
public function Dot_DeleteAdvertisement($adsID, $uid)
{
	   $adsID = mysqli_real_escape_string($this->db,$adsID); 
	   $uid = mysqli_real_escape_string($this->db,$uid); 
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$adsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
		   mysqli_query($this->db,"DELETE FROM `dot_supponsored_ads` WHERE s_ads_id = '$adsID'") or die(mysqli_error($this->db));
	       return true;
	   }
}
// Get User Advertisements
public function Dot_UserAdvertisements($uid, $lastAdsID)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $lastAdsID = mysqli_real_escape_string($this->db, $lastAdsID);
	   $morStory ='';
	   if($lastAdsID){
			$morStory = "AND A.s_ads_id < '".$lastAdsID."'";
		}
	   $data = null;
	   $getStories = mysqli_query($this->db,"SELECT DISTINCT A.s_ads_id,A.ads_created_uid_fk, A.ads_campany_name, A.s_ads_website, A.ads_show_gender, A.ads_display_area, A.s_ads_title, A.ads_offer, A.ads_category, A.ads_last_time ,A.s_ads_description, A.s_ads_img, A.s_ads_status, A.admin_activated, A.s_ads_time, A.credit,A.s_ads_display_day, A.a_credit , U.user_name, U.user_fullname FROM dot_supponsored_ads A , dot_users U WHERE A.ads_created_uid_fk = U.user_id AND A.ads_created_uid_fk = '$uid' $morStory ORDER BY A.s_ads_id DESC LIMIT  2") or die(mysqli_error($this->db));
	   while($row=mysqli_fetch_array($getStories, MYSQLI_ASSOC)) {
			  // Store the result into array
			 $data[]=$row;
		 }
		  if(!empty($data)) {
			 return $data;
		  } 
}
// Update Uniq Advertisement Status 
public function Dot_UpdateAdvertisementStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type IN('0','1')") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET s_ads_status = '$adsStatus' WHERE s_ads_id = '$thisAdsID'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Update User Advertisement
public function Dot_UpdateEditAdvertisementUser($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsBudget,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsStayLive,$eadsOffer,$aTime,$uid,$eadsAdminApproveStatus,$userID)
{
       mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$eadsID' AND admin_activated = 'adsactive'") or die(mysqli_error($this->db));
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserExist) > 0){
		      $updaetAdvertisement = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET ads_campany_name = '$eadsCampanyName', s_ads_website = '$eadsRedirectUrl', ads_show_gender = '$eadsWhoCanSee', ads_display_area = '$eadsDisplayArea',  s_ads_title = '$eadsTitle',ads_offer='$eadsOffer',ads_category= '$eadsCategory', ads_last_time = '$aTime', s_ads_description = '$eadsDescription', admin_activated = 'adswaiting_approval', s_ads_time = NOW() , credit = '$eadsBudget', a_credit='$eadsBudget', s_ads_display_day = '$eadsStayLive'  WHERE s_ads_id = '$eadsID'") or die(mysqli_error($this->db));
			  
			   return true;
	   }else{
	         return false;
	   }
}
// Update User Advertisement Just Something
public function Dot_UpdateEditAdvertisementUserTextEdit($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsOffer,$uid)
{
       mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT s_ads_id FROM dot_supponsored_ads WHERE s_ads_id = '$eadsID'") or die(mysqli_error($this->db));
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserExist) > 0){
		      $updaetAdvertisement = mysqli_query($this->db,"UPDATE dot_supponsored_ads SET ads_campany_name = '$eadsCampanyName', s_ads_website = '$eadsRedirectUrl', ads_show_gender = '$eadsWhoCanSee', ads_display_area = '$eadsDisplayArea',  s_ads_title = '$eadsTitle',ads_offer='$eadsOffer',ads_category= '$eadsCategory',  s_ads_description = '$eadsDescription', admin_activated = 'adswaiting_approval'  WHERE s_ads_id = '$eadsID'") or die(mysqli_error($this->db));
			  
			   return true;
	   }else{
	         return false;
	   }
}
// Delete Old Searched user ID
public function Dot_DeleteOldSearchedUser($uid, $oldSearchedID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $oldSearchedID = mysqli_real_escape_string($this->db, $oldSearchedID);
	 $checkOldIDExist = mysqli_query($this->db,"SELECT search_event_id, searcher_id  FROM dot_user_search_events WHERE search_event_id = '$oldSearchedID' AND searcher_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkOldIDExist) > 0){
	       $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_user_search_events` WHERE search_event_id = '$oldSearchedID' AND searcher_id = '$uid' ") or die(mysqli_error($this->db));
		   return true;
	 }else{
	      return false;
	 }
}
// Delete Conversation
public function Dot_DeleteConversation($uid, $deleteThisConversationIDto, $deleteThisConversationIDFrom) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $deleteThisConversationIDto = mysqli_real_escape_string($this->db, $deleteThisConversationIDto);
	 $deleteThisConversationIDFrom = mysqli_real_escape_string($this->db, $deleteThisConversationIDFrom);
	 $checkConversation = mysqli_query($this->db,"SELECT from_user_id , to_user_id FROM dot_chat WHERE (from_user_id = '$deleteThisConversationIDFrom' AND to_user_id = '$deleteThisConversationIDto') OR (to_user_id = '$deleteThisConversationIDFrom' AND from_user_id = '$deleteThisConversationIDto')") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkConversation) > 0){
		   $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_chat` WHERE (from_user_id = '$deleteThisConversationIDFrom' AND to_user_id = '$deleteThisConversationIDto') OR (to_user_id = '$deleteThisConversationIDFrom' AND from_user_id = '$deleteThisConversationIDto')") or die(mysqli_error($this->db));
		   return true;
	  }else{
	      return false;
	 }
}
// Save Advertisement From Data
public function Dot_SaveAdminAdvertisement($aCampanyName, $aWeb, $aShow, $aAreaDisplay, $aTitle, $aOffer, $aCategory, $aLive, $aDescription, $aFile, $aTime,$uid,$displayDay,$userBudget)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $aCampanyName = mysqli_real_escape_string($this->db, $aCampanyName);
	   $aWeb = mysqli_real_escape_string($this->db, $aWeb);
	   $aShow = mysqli_real_escape_string($this->db, $aShow);
	   $aAreaDisplay = mysqli_real_escape_string($this->db, $aAreaDisplay);
	   $aTitle = mysqli_real_escape_string($this->db, $aTitle);
	   $aOffer = mysqli_real_escape_string($this->db, $aOffer);
	   $aCategory = mysqli_real_escape_string($this->db, $aCategory);
	   $aLive = mysqli_real_escape_string($this->db, $aLive);
	   $aDescription = mysqli_real_escape_string($this->db, $aDescription);
	   $aFile = mysqli_real_escape_string($this->db, $aFile);
	   $aTime = mysqli_real_escape_string($this->db, $aTime);
	   $displayDay = mysqli_real_escape_string($this->db,$displayDay);
	   $userBudget = mysqli_real_escape_string($this->db,$userBudget);
	   $ip=$_SERVER['REMOTE_ADDR'];	
	   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserIDFromDatabase) == 1){
	         $insertAdvertisement = mysqli_query($this->db,"INSERT INTO dot_supponsored_ads(ads_created_uid_fk, ads_campany_name, s_ads_website, ads_show_gender, ads_display_area, s_ads_title, ads_offer, ads_category, ads_last_time ,s_ads_description, s_ads_img, s_ads_status, admin_activated, s_ads_time, credit,s_ads_display_day,a_credit )VALUES('$uid','$aCampanyName','$aWeb','$aShow','$aAreaDisplay','$aTitle','$aOffer','$aCategory','$aTime','$aDescription','$aFile','1','adsactive',NOW(),'$userBudget','$displayDay','$userBudget')") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Update PayPal payment 
public function Dot_UpdatePayPalSettins($paypalMode, $paypalCliendtID, $paypalSecretID,$uid)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $paypalSecretID = mysqli_real_escape_string($this->db, $paypalSecretID);
	   $paypalMode = mysqli_real_escape_string($this->db, $paypalMode);
	   $paypalCliendtID = mysqli_real_escape_string($this->db, $paypalCliendtID);
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updatePayPal = mysqli_query($this->db,"UPDATE dot_configuration SET paypal_mode = '$paypalMode' , paypal_cliend_id = '$paypalCliendtID' , paypal_secret_id = '$paypalSecretID' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
// PayPal Mode open/close
public function Dot_PayPal_Mode($uid, $PayPalMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $PayPalMode = mysqli_real_escape_string($this->db, $PayPalMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET paypal_payment_mode = '$PayPalMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// RazorPay Mode open/close
public function Dot_RazorPay_Mode($uid, $razorPayMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $razorPayMode = mysqli_real_escape_string($this->db, $razorPayMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET razorpay_payment_mode = '$razorPayMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// BitPay Mode open/close
public function Dot_BitPay_Mode($uid, $BitPayMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $BitPayMode = mysqli_real_escape_string($this->db, $BitPayMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET bitpay_payment_mode = '$BitPayMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// PayStack Mode open/close
public function Dot_PayStack_Mode($uid, $PayStackMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $PayStackMode = mysqli_real_escape_string($this->db, $PayStackMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET paystack_payment_mode = '$PayStackMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// STRİPE Mode open/close
public function Dot_Stripe_Mode($uid, $StripeMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $StripeMode = mysqli_real_escape_string($this->db, $StripeMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET stripe_payment_mode = '$StripeMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// STRİPE Mode open/close
public function Dot_Stripe_ActivePasive($uid, $StripeMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $StripeMode = mysqli_real_escape_string($this->db, $StripeMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET stripe_active_pasive = '$StripeMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// BitPay Active/Pasive
public function Dot_BitPay_AP($uid, $BitPayap) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $BitPayap = mysqli_real_escape_string($this->db, $BitPayap);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET bitpay_active_pasive = '$BitPayap' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// PayStack Active/Pasive
public function Dot_PayStack_AP($uid, $PayStackap) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $PayStackap = mysqli_real_escape_string($this->db, $PayStackap);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET paystack_active_pasive = '$PayStackap' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// PayPal Active/Pasive
public function Dot_PayPal_AP($uid, $PayPalap) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $PayPalap = mysqli_real_escape_string($this->db, $PayPalap);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET paypal_active_pasive = '$PayPalap' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// RazorPay Active/Pasive
public function Dot_RazorPay_AP($uid, $razorPayAp) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $razorPayAp = mysqli_real_escape_string($this->db, $razorPayAp);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET razorpay_active_pasive = '$razorPayAp' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update PayPal Business Emails
public function Dot_SavePayPalEmails($paypalSendBoxBusinessEmail, $payPalBusinessEmail, $uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $paypalSendBoxBusinessEmail = mysqli_real_escape_string($this->db, $paypalSendBoxBusinessEmail);
	 $payPalBusinessEmail = mysqli_real_escape_string($this->db, $payPalBusinessEmail);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET paypal_sendbox_business_email= '$paypalSendBoxBusinessEmail', paypal_product_business_email = '$payPalBusinessEmail'  WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Advertisement Offers
public function Dot_UpdateOffers($adsClickFee, $adsViewFee,$uid)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $adsClickFee = mysqli_real_escape_string($this->db, $adsClickFee);
	   $adsViewFee = mysqli_real_escape_string($this->db, $adsViewFee);
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updateSiteOffer = mysqli_query($this->db,"UPDATE dot_configuration SET ads_per_click = '$adsClickFee', ads_per_impression = '$adsViewFee' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
// Update After Scroll show Advertisement
public function Dot_UpdateAfterScroll($afterThisNumber, $uid)
{  
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $afterThisNumber = mysqli_real_escape_string($this->db, $afterThisNumber); 
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updateShowAfterScroll = mysqli_query($this->db,"UPDATE dot_configuration SET show_advertisement_when = '$afterThisNumber' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
// Admin Sticker List  
public function Dot_AdminStickerLists($lastStickerID)
{
   $lastStickerID=mysqli_real_escape_string($this->db,$lastStickerID); 
   $moreSticker=""; 
    if($lastStickerID) { 
	  $moreSticker=" AND emoji_id <'".$lastStickerID."' ";
    } 
	$data = null;   
	$getStickersQuery = mysqli_query($this->db,"SELECT emoji_id, emoji_key, emoji_style, image   FROM dot_emoticons  WHERE emoji_style = 'sticker'  $moreSticker ORDER BY emoji_id DESC LIMIT  " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getStickersQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Add New Sticker
public function Dot_AddNewSticker($uid,$stickerName,$stickerImage)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $stickerName = mysqli_real_escape_string($this->db, $stickerName);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkEmojiExist = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_key = '$stickerName'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkEmojiExist) == 0){
		   $saveSticker = mysqli_query($this->db,"INSERT INTO dot_emoticons(emoji_key, emoji_style, image)VALUES('$stickerName','sticker','$stickerImage')") or die(mysqli_error($this->db));
		   $getUploadedSticker = mysqli_query($this->db,"SELECT emoji_id, emoji_key,emoji_style, image FROM dot_emoticons WHERE emoji_style = 'sticker' AND emoji_key = '$stickerName' ORDER BY emoji_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getUploadedSticker, MYSQLI_ASSOC);
	        return $result;
	   }else{
		    return false;  
		}
}
// Admin Sticker List  
public function Dot_AdminGifLists($lastGifID)
{
   $lastGifID=mysqli_real_escape_string($this->db,$lastGifID); 
   $moreGif=""; 
    if($lastGifID) { 
	  $moreGif=" AND emoji_id <'".$lastGifID."' ";
    } 
	$data = null;   
	$getGifQuery = mysqli_query($this->db,"SELECT emoji_id, emoji_key, emoji_style, image   FROM dot_emoticons  WHERE emoji_style = 'gif'  $moreGif ORDER BY emoji_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getGifQuery, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Admin Sticker List  
public function Dot_AdminWatermarkLists($lastWaterMarkID)
{
   $lastWaterMarkID=mysqli_real_escape_string($this->db,$lastWaterMarkID); 
   $moreWaterMark=""; 
    if($lastWaterMarkID) { 
	  $moreWaterMark="WHERE watermark_id <'".$lastWaterMarkID."' ";
    } 
	$data = null;   
	$getWaterMarkQuery = mysqli_query($this->db,"SELECT watermark_id, watermark_name, watermark_text_color , watermark_image   FROM dot_watermarks  $moreWaterMark ORDER BY watermark_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getWaterMarkQuery, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Add New Sticker
public function Dot_AddNewGif($uid,$stickerName,$stickerImage)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $stickerName = mysqli_real_escape_string($this->db, $stickerName);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkEmojiExist = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_key = '$stickerName'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkEmojiExist) == 0){
		   $saveSticker = mysqli_query($this->db,"INSERT INTO dot_emoticons(emoji_key, emoji_style, image)VALUES('$stickerName','gif','$stickerImage')") or die(mysqli_error($this->db));
		   $getUploadedSticker = mysqli_query($this->db,"SELECT emoji_id, emoji_key,emoji_style, image FROM dot_emoticons WHERE emoji_style = 'gif' AND emoji_key = '$stickerName' ORDER BY emoji_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getUploadedSticker, MYSQLI_ASSOC);
	        return $result;
	   }else{
		    return false;  
		}
}
// Delete Sticker
public function Dot_DeleteSticker($uid, $sticker)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $sticker = mysqli_real_escape_string($this->db, $sticker);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkEmojiExist = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_id = '$sticker' AND emoji_style = 'sticker' ") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkEmojiExist) == 1){
		   $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_emoticons` WHERE emoji_id = '$sticker'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Delete Sticker
public function Dot_DeleteGif($uid, $sticker)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $sticker = mysqli_real_escape_string($this->db, $sticker);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkEmojiExist = mysqli_query($this->db,"SELECT emoji_key FROM dot_emoticons WHERE emoji_id = '$sticker' AND emoji_style = 'gif' ") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkEmojiExist) == 1){
		   $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_emoticons` WHERE emoji_id = '$sticker'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Colors
public function Dot_DataColors()
{
    $GetDataColors = mysqli_query($this->db,"SELECT id, colors, color_name FROM dot_colors") or die(mysqli_error($this->db));
	//Store the result
    while($row=mysqli_fetch_array($GetDataColors, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Delete Color
public function Dot_DeleteColor($uid, $DeleteThiscolorID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$DeleteThiscolorID = mysqli_real_escape_string($this->db,$DeleteThiscolorID);
	$checkColorExist = mysqli_query($this->db,"SELECT id FROM dot_colors WHERE id = '$DeleteThiscolorID'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkColorExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1) { 
	    $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_colors` WHERE id = '$DeleteThiscolorID'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Delete Font
public function Dot_DeleteFont($uid, $deleteFontID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$deleteFontID = mysqli_real_escape_string($this->db,$deleteFontID);
	$checkColorExist = mysqli_query($this->db,"SELECT font_id FROM dot_fonts WHERE font_id = '$deleteFontID'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkColorExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1) { 
	    $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_fonts` WHERE font_id = '$deleteFontID'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Add New Color
public function Dot_AddNewColor($uid,$newColorCode)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$newColorCode = mysqli_real_escape_string($this->db,$newColorCode);
	$checkColorExist = mysqli_query($this->db,"SELECT colors FROM dot_colors WHERE colors = '$newColorCode'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkColorExist) == 0 && mysqli_num_rows($checkUserisAdmin) == 1) { 
	     $query = mysqli_query($this->db,"INSERT INTO dot_colors (colors)VALUES('$newColorCode')") or die(mysqli_error($this->db)); 
		return true;
	}else{
	    return false;
	}
}
// Edit Font
public function Dot_EditFont($uid, $EditFontName, $EditFontFullCode, $EditFontCode, $EditFontID)
{
	$uid = mysqli_real_escape_string($this->db,$uid); 
	$EditFontID = mysqli_real_escape_string($this->db,$EditFontID); 
	$checkFontExist = mysqli_query($this->db,"SELECT font_id FROM dot_fonts WHERE font_id = '$EditFontID'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkFontExist) == 1) { 
	     $UpdateImportURL = mysqli_query($this->db,"UPDATE dot_fonts SET font_name = '$EditFontName', font = '$EditFontFullCode', font_code = '$EditFontCode' WHERE  font_id = '$EditFontID'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Add New Google Font Import Link
public function Dot_AddNewGoogleImportLink($uid,$importLink)
{
    $uid = mysqli_real_escape_string($this->db,$uid); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkUserisAdmin) == 1) { 
	     $UpdateImportURL = mysqli_query($this->db,"UPDATE dot_configuration SET google_font_import = '$importLink' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Add New Font
public function Dot_SaveNewFont($uid, $newFontName, $newFontFullCode, $newFontCode)
{
    $uid = mysqli_real_escape_string($this->db,$uid); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkUserisAdmin) == 1) { 
	     $query = mysqli_query($this->db,"INSERT INTO dot_fonts(font_name, font, font_code)VALUES('$newFontName','$newFontFullCode','$newFontCode')") or die(mysqli_error($this->db)); 
		return true;
	}else{
	    return false;
	}
}
// Get Selected Color
public function Dot_GetSelectedBackgroundColor($colorCode)
{
	$colorCode = mysqli_real_escape_string($this->db,$colorCode);
	$GetBgCode = mysqli_query($this->db,"SELECT id,colors FROM dot_colors WHERE id = '$colorCode'") or die(mysqli_error($this->db));
    $data = mysqli_fetch_array($GetBgCode, MYSQLI_ASSOC);
	return $data['colors'];
}
// Colors
public function Dot_DataFonts()
{
    $GetDataFonts = mysqli_query($this->db,"SELECT font_id, font_name, font, font_code FROM dot_fonts") or die(mysqli_error($this->db));
	//Store the result
    while($row=mysqli_fetch_array($GetDataFonts, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Check Data Color ID is exist 
public function Dot_CheckFontisExist($fontID)
{
     $fontID = mysqli_real_escape_string($this->db, $fontID);
	 $checkFontID = mysqli_query($this->db, "SELECT font_id FROM dot_fonts WHERE font_id = '$fontID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkFontID) > 0){
		 return true;
	 }else{
	     return false;
	 }
}
// Check Data Color ID is exist 
public function Dot_CheckColorisExist($colorID)
{
     $colorID = mysqli_real_escape_string($this->db, $colorID);
	 $checkColorID = mysqli_query($this->db, "SELECT id FROM dot_colors WHERE id = '$colorID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkColorID) > 0){
		 return true;
	 }else{
	     return false;
	 }
}
// Update Profile Design
public function Dot_SaveUserDesign($uid, $profileBackgroundColor, $profileHeaderIcon, $profileTextColor, $profileFont)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
    $profileBackgroundColor = mysqli_real_escape_string($this->db, $profileBackgroundColor);
	$profileHeaderIcon = mysqli_real_escape_string($this->db, $profileHeaderIcon);
	$profileTextColor = mysqli_real_escape_string($this->db, $profileTextColor);
	$profileFont = mysqli_real_escape_string($this->db, $profileFont); 
	$checkUser = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUser) > 0){
		   $updateDesign = mysqli_query($this->db,"UPDATE dot_users SET  pbg_color = '$profileBackgroundColor' , pp_icon = '$profileHeaderIcon', pt_color  = '$profileTextColor', pfont_font  = '$profileFont'  WHERE  user_id = '$uid'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
// Get UserName From Pages
public function Dot_GetColorFromID($clID)
{
	$clID=mysqli_real_escape_string($this->db,$clID);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT colors FROM `dot_colors` WHERE id='$clID'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['colors']) {
		$name=$data['colors'];
	    return  $name;
	}
}
// Get UserName From Pages
public function Dot_GetFontFromID($clID)
{
	$clID=mysqli_real_escape_string($this->db,$clID);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT font_code FROM `dot_fonts` WHERE font_id='$clID'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['font_code']) {
		$name=$data['font_code'];
	    return  $name;
	}
} 
/*Upload a New Image From Data*/
public function Dot_ConversationImageUpload($uid, $imageName, $extension) 
{    
	$time = time();
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$ids = 0;
	// Add the insert image
	$query = mysqli_query($this->db,"INSERT INTO dot_conversation_uploaded_images (user_id_fk,uploaded_image,uploaded_time,user_ip,extension)VALUES('$uid' ,'$imageName','$time','$ip', '$extension')") or die(mysqli_error($this->db)); 
	$ids = mysqli_insert_id($this->db);
	return $ids; 
}
/*Get Uploaded Image From Data*/
public function Dot_GetConversationUploadedImage($uid, $imageName) 
{ 
	if($imageName) {
	   //Get the image name and image id for image preview
	  $query = mysqli_query($this->db,"SELECT image_id,uploaded_image,extension FROM dot_conversation_uploaded_images WHERE user_id_fk='$uid' ORDER BY image_id DESC") or die(mysqli_error($this->db));
	  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	  return $result;
	 } else {
	   return false;
	 } 
}
/*Get Uploaded Chat Image*/
public function Dot_GetUploadChatImageID($imageID)
{
   $GetImageId = mysqli_query($this->db,"SELECT image_id,uploaded_image FROM dot_conversation_uploaded_images WHERE image_id='$imageID'") or die(mysqli_error($this->db));
   $resultImageID = mysqli_fetch_array($GetImageId,MYSQLI_ASSOC);
   return $resultImageID;
} 
/*Upload a New Image From Data*/
public function Dot_ConversationVideoUpload($uid, $VideoName, $extension) 
{    
	$time = time();
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$ids = 0;
	// Add the insert image
	$query = mysqli_query($this->db,"INSERT INTO dot_conversation_uploaded_videos (user_id_fk,uploaded_video,uploaded_time,user_ip,extension)VALUES('$uid' ,'$VideoName','$time','$ip', '$extension')") or die(mysqli_error($this->db)); 
	$ids = mysqli_insert_id($this->db);
	return $ids; 
}
/*Get Uploaded Image From Data*/
public function Dot_GetConversationUploadedvideo($uid, $VideoName) 
{ 
	if($VideoName) {
	   //Get the image name and image id for image preview
	  $query = mysqli_query($this->db,"SELECT video_id,uploaded_video,extension FROM dot_conversation_uploaded_videos WHERE user_id_fk='$uid' ORDER BY video_id DESC") or die(mysqli_error($this->db));
	  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	  return $result;
	 } else {
	   return false;
	 } 
}
/*Get Uploaded Chat Image*/
public function Dot_GetUploadChatVideoID($VideoID)
{
   $GetVideoId = mysqli_query($this->db,"SELECT video_id,uploaded_video,extension FROM dot_conversation_uploaded_videos WHERE video_id='$VideoID'") or die(mysqli_error($this->db));
   $resultVideoID = mysqli_fetch_array($GetVideoId,MYSQLI_ASSOC);
   return $resultVideoID;
} 
/*Upload a New Image From Data*/
public function Dot_ConversationFileUpload($uid, $FileName, $extension) 
{    
	$time = time();
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
	$ids = 0;
	// Add the insert image
	$query = mysqli_query($this->db,"INSERT INTO dot_conversation_uploaded_files (user_id_fk,uploaded_file,uploaded_time,user_ip,extension)VALUES('$uid' ,'$FileName','$time','$ip', '$extension')") or die(mysqli_error($this->db)); 
	$ids = mysqli_insert_id($this->db);
	return $ids; 
}
/*Get Uploaded Image From Data*/
public function Dot_GetConversationUploadedFile($uid, $FileName) 
{ 
	if($FileName) {
	   //Get the image name and image id for image preview
	  $query = mysqli_query($this->db,"SELECT file_id,uploaded_file,extension FROM dot_conversation_uploaded_files WHERE user_id_fk='$uid' ORDER BY file_id DESC") or die(mysqli_error($this->db));
	  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	  return $result;
	 } else {
	   return false;
	 } 
}
/*Get Uploaded Chat Image*/
public function Dot_GetUploadChatFileID($FileID)
{
   $GetFileId = mysqli_query($this->db,"SELECT file_id,uploaded_file,extension FROM dot_conversation_uploaded_files WHERE file_id='$FileID'") or die(mysqli_error($this->db));
   $resultFileID = mysqli_fetch_array($GetFileId,MYSQLI_ASSOC);
   return $resultFileID;
} 
// Get Destruction Chat Message
public function Dot_GetSelfDescrutionMessage($chatID, $destructionTime){ 
	 $destructionTime = mysqli_real_escape_string($this->db, $destructionTime);
	 $chatID = mysqli_real_escape_string($this->db, $chatID);
	 $checkDestructionMessage = mysqli_query($this->db,"SELECT msg_id, dest FROM dot_chat WHERE msg_id = '$chatID' AND dest = '$destructionTime' AND secret_checked = '0'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkDestructionMessage) > 0){
	       $GetDestructionMessage = mysqli_query($this->db,"SELECT msg_id, dest, from_user_id, to_user_id, message_text,message_created_time, message_type, imageid, videoid,file_name, file, file_extension FROM dot_chat WHERE msg_id = '$chatID' AND dest = '$destructionTime'") or die(mysqli_error($this->db));
	        //Store the result
    while($row=mysqli_fetch_array($GetDestructionMessage)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
	 }else{
	     return false;
	 }
}
// Change post Status
public function Dot_Desturction($destructionChatID, $destructionTime) 
{
     $destructionTime = mysqli_real_escape_string($this->db, $destructionTime);
	 $destructionChatID = mysqli_real_escape_string($this->db, $destructionChatID);
	 $checkDestructionMessage = mysqli_query($this->db,"SELECT msg_id, dest FROM dot_chat WHERE msg_id = '$destructionChatID' AND dest = '$destructionTime' AND secret_checked = '0'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkDestructionMessage) > 0){
		  $updateShowAfterScroll = mysqli_query($this->db,"UPDATE dot_chat SET secret_checked = '1' WHERE  msg_id = '$destructionChatID' AND dest = '$destructionTime'") or die(mysqli_error($this->db));
		   return true;
	 }else{
	     return false;
	 }
}
// Floating Video 
public function Dot_CheckPostExist($videoCreator,$videoPost)
{
     $videoCreator = mysqli_real_escape_string($this->db, $videoCreator);
	 $videoPost = mysqli_real_escape_string($this->db, $videoPost);
	 $checkVideoExist = mysqli_query($this->db,"SELECT user_post_id , user_id_fk , post_video_id  FROM dot_user_posts WHERE user_post_id = '$videoPost' AND user_id_fk = '$videoCreator' AND post_type= 'p_video'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkVideoExist) > 0){
		   while($row=mysqli_fetch_array($checkVideoExist)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
	 }
}
// Search Translate Key
public function Dot_SearchTranslateKey($uid, $keys){
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $keys = mysqli_real_escape_string($this->db, $keys);
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
	 mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $result = mysqli_query($this->db,"SELECT * FROM dot_languages WHERE english like '%$keys%' or turkish like '%$keys%' or turkish like '$keys' or english like '$keys' ORDER BY lang_id LIMIT 30") or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		   $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
	   return $data;
	  } 
}
// Text Post Mode open/close 
public function Dot_TextPostMode($uid, $textPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $textPostMode = mysqli_real_escape_string($this->db, $textPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_text = '$textPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Image Post Mode open/close
public function Dot_ImagePostMode($uid, $ImagePostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $ImagePostMode = mysqli_real_escape_string($this->db, $ImagePostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_image = '$ImagePostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Video Post Mode open/close
public function Dot_VideoPostMode($uid, $VideoPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $VideoPostMode = mysqli_real_escape_string($this->db, $VideoPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_video = '$VideoPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Audio Post Mode open/close
public function Dot_AudioPostMode($uid, $AudioPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $AudioPostMode = mysqli_real_escape_string($this->db, $AudioPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_audio = '$AudioPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Link Post Mode open/close
public function Dot_LinkPostMode($uid, $LinkPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $LinkPostMode = mysqli_real_escape_string($this->db, $LinkPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_link = '$LinkPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Filtered Image Post Mode open/close
public function Dot_FilterImagePostMode($uid, $FilterPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $FilterPostMode = mysqli_real_escape_string($this->db, $FilterPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_filter = '$FilterPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Before After Image Post Mode open/close
public function Dot_BeforeAfterPostMode($uid, $FilterPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $FilterPostMode = mysqli_real_escape_string($this->db, $FilterPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET before_after_post = '$FilterPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Gif Post Mode open/close
public function Dot_GiphyPostMode($uid, $GifPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $PostMode = mysqli_real_escape_string($this->db, $PostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_type_giphy = '$PostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Location Post Mode open/close
public function Dot_LocationPostMode($uid, $LocationPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $LocationPostMode = mysqli_real_escape_string($this->db, $LocationPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_type_location = '$LocationPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Watermark Post Mode open/close
public function Dot_WaterMarkPostMode($uid, $WaterMarkPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $WaterMarkPostMode = mysqli_real_escape_string($this->db, $WaterMarkPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_watermark_post = '$WaterMarkPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Benchmark Post Mode open/close
public function Dot_BenchmarkPostMode($uid, $BenchmarkPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $BenchmarkPostMode = mysqli_real_escape_string($this->db, $BenchmarkPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_which_post = '$BenchmarkPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Market Post Mode open/close
public function Dot_MarketPostMode($uid, $marketPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $marketPostMode = mysqli_real_escape_string($this->db, $marketPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET market_post = '$marketPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Post List Position
public function Dot_PostListPosition($uid, $position){
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $position = mysqli_real_escape_string($this->db, $position);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_types_position = '$position' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Smtp or Mail 
public function Dot_UpdateSmtpOrMailServer($uid, $serverType)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $serverType = mysqli_real_escape_string($this->db, $serverType);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET smtp_or_mail_server = '$serverType' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// TLS or SSL
public function Dot_UpdateTLSorSSLServer($uid, $tlsOrssl)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $tlsOrssl = mysqli_real_escape_string($this->db, $tlsOrssl);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET tls_or_ssl = '$tlsOrssl' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Smtp Settings  
public function Dot_UpdateSMTP($uid, $smtpHost, $smtpUsername,$smtpPassword,$smtpPort)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $smtpHost = mysqli_real_escape_string($this->db, $smtpHost);
	 $smtpUsername = mysqli_real_escape_string($this->db, $smtpUsername);
	 $smtpPassword = mysqli_real_escape_string($this->db, $smtpPassword);
	 $smtpPort = mysqli_real_escape_string($this->db, $smtpPort);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET smtp_host = '$smtpHost' , smtp_username = '$smtpUsername' , smtp_password = '$smtpPassword' , smtp_port = '$smtpPort' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Profile Card open/close
public function Dot_ShowHideProfileCardFeature($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_profile_card = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// You May Know open/close
public function Dot_ShowHideYouMayKnowFeature($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_youmayknow = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Radar open/close
public function Dot_ShowHideRadarFeature($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_radar = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Trend HashTags open/close
public function Dot_ShowHideHashTagsFeature($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_trend_tags = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Can Create Advertisement
public function Dot_ShowHideHashUserCreateAdvertisementPageFeature($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_advertisement_pages = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Can Create Event
public function Dot_IsUserCanCreateAnEvent($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_event_feature = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Enable Disable Weather Widget
public function Dot_EnableDisableWeather($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET weather_widget = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Enable Disable Unlike Button
public function Dot_EnableDisableUnlikeButton($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_unlike_button = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Add New Language
public function Dot_NewLanguage($uid, $change)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $change = mysqli_real_escape_string($this->db, $change);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"ALTER TABLE `dot_languages` ADD $change LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL") or die(mysqli_error($this->db));  
		  return true;
	 }else{
	     return false;
	 }
}
// Add New Language
public function Dot_NewLanguageKey($uid, $theNewKey)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $theNewKey = mysqli_real_escape_string($this->db, $theNewKey);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"INSERT INTO dot_languages (lang_key) VALUES ('$theNewKey')") or die(mysqli_error($this->db)); 
		  return true;
	 }else{
	     return false;
	 }
}
// Delete Language
public function Dot_DeleteLanguage($uid, $langName)
{
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $langName = mysqli_real_escape_string($this->db, $langName);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $deleteLang = mysqli_query($this->db,"ALTER TABLE dot_languages DROP COLUMN $langName") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Main Language
public function Dot_UpdateDefaultLanguage($uid, $langName)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $langName = mysqli_real_escape_string($this->db, $langName);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMainLang = mysqli_query($this->db,"UPDATE dot_configuration SET default_lang = '$langName' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Get Post Details for Status Page 
 
public function Dot_StatusPostID($statusID) {
	$statusID=mysqli_real_escape_string($this->db,$statusID);
	$checMessageExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$statusID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checMessageExist) == 1){
        $query=mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U WHERE  P.user_id_fk=U.user_id and P.user_post_id='$statusID'") or die(mysqli_error($this->db));
	   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $data;
	}else{
	   return false;
	} 
}
// Get Post Details From Status Page for Slug URL
public function Dot_StatusPostSlug($slug) {
	$slug=mysqli_real_escape_string($this->db,$slug);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checMessageExist = mysqli_query($this->db,"SELECT slug,user_post_id FROM dot_user_posts WHERE slug = '$slug' OR user_post_id = '$slug'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checMessageExist) == 1){
        $query=mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U WHERE  P.user_id_fk=U.user_id and (P.slug='$slug' OR P.user_post_id = '$slug')") or die(mysqli_error($this->db));
	   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	   return $data;
	}else{
	   return false;
	} 
}
// Check Username and Get ID for Chat Page
public function Dot_ChatUser($chatUsername)
{
    $chatUsername = mysqli_real_escape_string($this->db, $chatUsername);
	$checkChatUsernameExist = mysqli_query($this->db,"SELECT user_name FROM dot_users WHERE user_name = '$chatUsername'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkChatUsernameExist) == 1){
	    $GetUserSomeDetails = mysqli_query($this->db,"SELECT user_name , user_id FROM dot_users WHERE user_name = '$chatUsername'") or die(mysqli_error($this->db));
		$data=mysqli_fetch_array($GetUserSomeDetails,MYSQLI_ASSOC);
	    return $data;
	}else{
	    return false;
	}
}
// Get Url Slug From Post ID
public function GetUrl($id)
{
    $id = mysqli_real_escape_string($this->db,$id);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$id'") or die(mysqli_error($this->db));   
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $GetNotificationText = mysqli_query($this->db,"SELECT user_post_id,slug FROM dot_user_posts WHERE user_post_id = '$id'") or die(mysqli_error($this->db)); 
		   $data=mysqli_fetch_array($GetNotificationText,MYSQLI_ASSOC);
			if($data['slug']) {
				$postTitle=$data['slug'];
				return  $postTitle;
			}else{
			   return false;
			}
	}else{return false;}
}
 
/*Get user id from post id */  
public function Dot_GetUserDetailsByPostId($likedPostID)
{
	$likedPostID = mysqli_real_escape_string($this->db, $likedPostID);
	$query = mysqli_query($this->db, "SELECT up.user_id_fk,up.slug,up.user_post_id,up.post_title_text,u.device_id,u.device_type,u.device_key FROM `dot_user_posts` up LEFT JOIN `dot_users` u ON up.user_id_fk = u.user_id WHERE up.user_post_id='$likedPostID' ") or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if (count($data) > 0) {

		return $data;
	} else {
		return $data;
	}
}

/*Get user device detail from comment id */
public function Dot_GetUserDetailByCommentId($likedCommentID)
{
	$likedCommentID = mysqli_real_escape_string($this->db, $likedCommentID);
	$query = mysqli_query($this->db, "SELECT upc.uid_fk,upc.post_id_fk,u.device_id,u.device_type,u.device_key FROM `dot_post_comments` upc LEFT JOIN `dot_users` u ON upc.uid_fk = u.user_id WHERE upc.comment_id='$likedCommentID' ") or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if (count($data) > 0) {

		return $data;
	} else {
		return $data;
	}
}

/*User DEVICE ID*/
public function Dot_UserDeviceId($userID)
{
	$userID = mysqli_real_escape_string($this->db, $userID);
	$query = mysqli_query($this->db, "SELECT user_fullname,device_id,device_type FROM `dot_users` WHERE user_id='$userID' AND user_status='1'") or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if (count($data) > 0) {
		
		return $data;
	} else {
		return $data;			
	}
}
// Get All Watermark images
public function Dot_WatermarkPatterns()
{
    $query = mysqli_query($this->db,"SELECT watermark_id,watermark_name,watermark_image,watermark_text_color FROM dot_watermarks") or die(mysqli_error($this->db));
	//Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
}
// Get WaterMarkDetails From ID
public function Dot_WaterMarkDetails($wid)
{
	$wid = mysqli_real_escape_string($this->db, $wid);  
	$GetWatermarkDetails = mysqli_query($this->db,"SELECT watermark_id,watermark_name,watermark_image,watermark_text_color FROM dot_watermarks WHERE watermark_id = '$wid'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($GetWatermarkDetails,MYSQLI_ASSOC);
	return $data; 
}
// Get All List Categories List
public function Dot_ListOfWhichCategories()
{
    $queryWhich = mysqli_query($this->db,"SELECT ct_id, ct_key FROM dot_which_categories") or die(mysqli_error($this->db));
	//Store the result
    while($row=mysqli_fetch_array($queryWhich, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Add New WaterMark
public function Dot_AddNewWaterMark($uid,$waterMarkName,$waterMarkImage,$waterMarkTextColor)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $waterMarkName = mysqli_real_escape_string($this->db, $waterMarkName);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkWaterMarkExist = mysqli_query($this->db,"SELECT watermark_name FROM dot_watermarks WHERE watermark_name = '$waterMarkName'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkWaterMarkExist) == 0){ 
			mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
			mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
		   $saveWaterMark = mysqli_query($this->db,"INSERT INTO dot_watermarks(watermark_name, watermark_image, watermark_text_color)VALUES('$waterMarkName','$waterMarkImage','$waterMarkTextColor')") or die(mysqli_error($this->db));
		   $getUploadedWaterMark = mysqli_query($this->db,"SELECT watermark_id, watermark_name,watermark_image, watermark_text_color FROM dot_watermarks WHERE watermark_name = '$waterMarkName' ORDER BY watermark_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getUploadedWaterMark, MYSQLI_ASSOC);
	        return $result;
	   }else{
		    return false;  
		}
}
// Delete WaterMark ID
public function Dot_DeleteWaterMark($uid, $deleteThisID)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $deleteThisID = mysqli_real_escape_string($this->db, $deleteThisID);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkWaterMarkExist = mysqli_query($this->db,"SELECT watermark_id FROM dot_watermarks WHERE watermark_id = '$deleteThisID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkWaterMarkExist) == 1){
		   $deleteWaterMark = mysqli_query($this->db,"DELETE FROM `dot_watermarks` WHERE watermark_id = '$deleteThisID'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Insert New Event
public function Dot_NewEventInsert($uid, $eventName, $eventLocation, $eventDescription, $eventStart,$eventStartTime, $eventEnd, $eventEndTime,$event_ShareOnWall,$event_GuestsCanPostOnEventWall,$event_GuestsCanInvite,$event_Type,$slugEvent,$theCoverEvent)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$eventName = mysqli_real_escape_string($this->db,$eventName);
	$eventLocation = mysqli_real_escape_string($this->db,$eventLocation);
	$eventDescription = mysqli_real_escape_string($this->db,$eventDescription);
	$eventStart = mysqli_real_escape_string($this->db,$eventStart);
	$eventEnd = mysqli_real_escape_string($this->db,$eventEnd);
	$event_ShareOnWall = mysqli_real_escape_string($this->db,$event_ShareOnWall);
	$event_GuestsCanPostOnEventWall = mysqli_real_escape_string($this->db,$event_GuestsCanPostOnEventWall);
	$event_GuestsCanInvite = mysqli_real_escape_string($this->db,$event_GuestsCanInvite);
	$event_Type = mysqli_real_escape_string($this->db,$event_Type);
	$theCoverEvent = mysqli_real_escape_string($this->db,$theCoverEvent);
	$checkCoverIDExist = mysqli_query($this->db, "SELECT e_cover_id, e_cover_image FROM dot_event_covers WHERE e_cover_id = '$theCoverEvent'") or die(mysqli_error($this->db));
    $checkUserExist = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$checkEventTypeExist = mysqli_query($this->db,"SELECT ev_id FROM dot_event_categories WHERE ev_id = '$event_Type'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserExist) > 0 && mysqli_num_rows($checkEventTypeExist) == 1 && mysqli_num_rows($checkCoverIDExist) == 1){ 
	       $time=time(); // Current post time
	       $ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
		   $getCoverImage=mysqli_fetch_array($checkCoverIDExist,MYSQLI_ASSOC);
		   $coverSelectedID = $getCoverImage['e_cover_image'];
		   $saveEvent = mysqli_query($this->db,"INSERT INTO dot_events(event_title, event_description, event_location,event_start,event_start_time,event_end,event_end_time,uid_fk,event_typ,event_usercaninvite,event_usercanpost,event_shareonwall,event_cover)VALUES('$eventName','$eventDescription','$eventLocation','$eventStart','$eventStartTime','$eventEnd','$eventEndTime','$uid','$event_Type','$event_GuestsCanInvite','$event_GuestsCanPostOnEventWall','$event_ShareOnWall','$coverSelectedID')") or die(mysqli_error($this->db)); 
		   $getEventDetails = mysqli_query($this->db,"SELECT event_id, event_title,event_description, event_location FROM dot_events WHERE uid_fk = '$uid' ORDER BY event_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getEventDetails, MYSQLI_ASSOC); 
		   $theEventID = $result['event_id'];
		   $creatorGoing = mysqli_query($this->db,"INSERT INTO dot_event_invites(inviter_user_id,invited_user_id,invited_event_id,invited_user_answer,invited_time,creator)VALUES('$uid','$uid','$theEventID','2','$time','own')") or die(mysqli_error($this->db));
		   if($event_ShareOnWall == '1' && $result == true){ 
				$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip, slug, post_event_id) VALUES ('$uid','p_event','$time','$ip','$slugEvent','$theEventID')") or die(mysqli_error($this->db));
		    } 
	        return $theEventID;
	   }else{
		    return false;  
		}
}
/* Event ID Valid Check*/
public function Dot_EventID($eventID) 
{
    $eventID=mysqli_real_escape_string($this->db,$eventID);
    //This is user id Cheking for valid
    $query=mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id='$eventID'");
    if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['event_id'];
    } else {
       return false;
    }
}
// Get Event Page Details
public function Dot_EventProfilePageDetails($eventProfileID)
{
     $eventProfileID=mysqli_real_escape_string($this->db,$eventProfileID);
	 $query = mysqli_query($this->db,"SELECT  event_id,uid_fk,event_title, event_description, event_location,event_start,event_start_time,event_end,event_end_time,event_typ,event_usercaninvite,event_usercanpost,event_shareonwall,event_cover,user_canshareevent, user_cansharetext, user_canshareimage , user_cansharevideo , user_canshareaudio, user_cansharefilteredimage , user_cansharelocation , user_cansharelink, user_cansharegiphy, user_cansharewatermark, user_cansharebenchmark  FROM dot_events WHERE event_id='$eventProfileID'") or die(mysqli_error($this->db));
     $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
     return $data;
}
// Event Categories
public function Dot_EventCategories()
{
   $CategoryEventsQuery = mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon FROM dot_event_categories") or die(mysqli_error($this->db));
   //Store the result
    while($row=mysqli_fetch_array($CategoryEventsQuery, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}

// User Created Events List
public function Dot_CreatedEvents($uid)
{
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $checkUserExist = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserExist) > 0){ 
           $query = mysqli_query($this->db,"SELECT  event_id,event_title, event_description, event_location,event_start,event_start_time,event_end,event_end_time,uid_fk,event_typ,event_cover  FROM dot_events WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
		   //Store the result
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }	
	  }else{
		    return false;  
	 }
}
// Get Event Icon From ID
public function Dot_GetEventIconFromID($typeID)
{
    $typeID = mysqli_real_escape_string($this->db,$typeID);
	$query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon FROM dot_event_categories WHERE ev_id = '$typeID'");
	if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['ev_icon'];
    } else {
       return false;
    }
}
// Get Event Icon From ID
public function Dot_GetEventKeyFromID($typeID)
{
    $typeID = mysqli_real_escape_string($this->db,$typeID);
	$query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon FROM dot_event_categories WHERE ev_id = '$typeID'");
	if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['ev_key'];
    } else {
       return false;
    }
}
// Get Event Icon SRC From ID
public function Dot_GetEventIconSrcFromID($typeID)
{
    $typeID = mysqli_real_escape_string($this->db,$typeID);
	$query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon,src FROM dot_event_categories WHERE ev_id = '$typeID'");
	if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['src'];
    } else {
       return false;
    }
}
// Event Covers
public function Dot_EventCovers()
{
   $coverEvents = mysqli_query($this->db,"SELECT e_cover_id, e_cover_image FROM dot_event_covers") or die(mysqli_error($this->db));
   //Store the result
    while($row=mysqli_fetch_array($coverEvents, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Check user in Invited List
public function Dot_CheckUserIDInvititedBefore($invitedUserID,$event)
{
      $invitedUserID = mysqli_real_escape_string($this->db,$invitedUserID);
	  $event = mysqli_real_escape_string($this->db,$event);
	  $checkUserInvitedBefore = mysqli_query($this->db,"SELECT invited_user_id,invited_event_id, invited_user_answer FROM dot_event_invites WHERE invited_user_id = '$invitedUserID' AND invited_event_id = '$event'  AND invited_user_answer  IN('1','2','3')") or die(mysqli_error($this->db));
	  $row=mysqli_fetch_array($checkUserInvitedBefore, MYSQLI_ASSOC);
	  return $row['invited_user_answer'];
}
// Invite Friends From Event
public function Dot_InviteFriendsFromEvent($uid, $friend_id, $eventID)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $friend_id = mysqli_real_escape_string($this->db,$friend_id);
	  $eventID = mysqli_real_escape_string($this->db,$eventID);
	  $checkFriendIDExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$friend_id'") or die(mysqli_error($this->db));
	  $checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	  $checkUserInvitedBefore = mysqli_query($this->db,"SELECT inviter_user_id, invited_user_id, invited_event_id FROM dot_event_invites WHERE inviter_user_id = '$uid' AND invited_user_id = '$friend_id' AND invited_event_id = '$eventID' ") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkUserInvitedBefore) == 1){
		  $query=mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE inviter_user_id = '$uid' AND invited_user_id = '$friend_id' AND invited_event_id = '$eventID'") or die(mysqli_error($this->db));
		  
		  $checkNotificationCount = mysqli_query($this->db,"SELECT notification_event_count,notification_count FROM dot_users WHERE user_id = $friend_id") or die(mysqli_error($this->db));
		  $getNotificatioCount = mysqli_fetch_array($checkNotificationCount, MYSQLI_ASSOC);  
		  if($getNotificatioCount['notification_event_count'] != 0){
			   mysqli_query($this->db,"UPDATE dot_users SET notification_event_count= notification_event_count - 1  WHERE user_id='$friend_id'") or die(mysqli_error($this->db));
		  }
		  if($getNotificatioCount['notification_count'] != 0){
			   mysqli_query($this->db,"UPDATE dot_users SET notification_count= notification_count - 1  WHERE user_id='$friend_id'") or die(mysqli_error($this->db));
		  }
		  $removedInviteList = 'invite';
		  return $removedInviteList;
	  }elseif(mysqli_num_rows($checkFriendIDExist) == 1 && mysqli_num_rows($checkEventExist) == 1){
		   $time=time(); // Current post time
	       $saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_event_invites`(inviter_user_id , invited_user_id , invited_event_id ,invited_time,creator) VALUES ('$uid','$friend_id','$eventID','$time','user')") or die(mysqli_error($this->db)); 
		   mysqli_query($this->db,"UPDATE dot_users SET notification_event_count= notification_event_count + 1 , notification_count= notification_count + 1  WHERE user_id='$friend_id'") or die(mysqli_error($this->db));  
		   $added = 'invited';
		   return $added;
	  }else{return false;}
}
// Count Invited Users
public function Dot_CountInvitedUsers($eventID)
{
    $eventID = mysqli_real_escape_string($this->db,$eventID);
	$checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){ 
			//Count how many people Invited
			$CountInvites = mysqli_query($this->db,"SELECT COUNT(*) AS invitedUserCount FROM dot_event_invites WHERE invited_event_id = '$eventID'") or die(mysqli_error($this->db));
			$row = mysqli_fetch_array($CountInvites, MYSQLI_ASSOC);  
			return $row['invitedUserCount'];
	  }else{return false;}
}
// Count How Many User going
public function Dot_CountHowManyUserGoing($eventID)
{
    $eventID = mysqli_real_escape_string($this->db,$eventID);
	$checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){ 
			//Count how many people Invited
			$CountInvites = mysqli_query($this->db,"SELECT COUNT(*) AS goingUserCount FROM dot_event_invites WHERE invited_event_id = '$eventID' AND  invited_user_answer = '2'") or die(mysqli_error($this->db));
			$row = mysqli_fetch_array($CountInvites, MYSQLI_ASSOC);  
			return $row['goingUserCount'];
	  }else{return false;}
}
// Count How Many User InterestedEvent
public function Dot_CountHowManyUserInterested($eventID)
{
    $eventID = mysqli_real_escape_string($this->db,$eventID);
	$checkEventExist = mysqli_query($this->db,"SELECT event_id FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkEventExist) == 1){ 
			//Count how many people Invited
			$CountInvites = mysqli_query($this->db,"SELECT COUNT(*) AS InterestedUserCount FROM dot_event_invites WHERE invited_event_id = '$eventID' AND  invited_user_answer = '3'") or die(mysqli_error($this->db));
			$row = mysqli_fetch_array($CountInvites, MYSQLI_ASSOC);  
			return $row['InterestedUserCount'];
	  }else{return false;}
}
/*Get Message notification Count From Header*/
public function Dot_GetEventNotificationSum($uid)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $query = mysqli_query($this->db,"SELECT notification_event_count FROM `dot_users` WHERE user_id='$uid' AND user_status='1'") or die(mysqli_error($this->db));
	    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	    if($data['notification_event_count']) {
		    $name=$data['notification_event_count'];
	        return  $name;
	    }
	}else{
	    return false;
	}
}
/*Get Message notification Count From Header*/
public function Dot_GetMentionNotification($uid)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1) {
	    $query = mysqli_query($this->db,"SELECT notification_mention_count FROM `dot_users` WHERE user_id='$uid' AND user_status='1'") or die(mysqli_error($this->db));
	    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	    if($data['notification_mention_count']) {
		    $name=$data['notification_mention_count'];
	        return  $name;
	    }
	}else{
	    return false;
	}
}
// Show Event Going Users Widget
public function Dot_WidgetGoingUsers($eventID, $limit)
{
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $limit = mysqli_real_escape_string($this->db,$limit);
     $getData = mysqli_query($this->db,"SELECT DISTINCT E.invited_user_id,E.invite_id, E.invited_event_id ,U.user_name, U.user_id, U.user_fullname, U.user_avatar FROM dot_event_invites E, dot_users U WHERE E.invited_user_id = U.user_id AND E.invited_event_id = '$eventID'  AND invited_user_answer = '2' ORDER BY  rand() LIMIT $limit") or die(mysqli_error($this->db));  
	 //Store the result
    while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
}
// Delete Event End Event Family
public function Dot_DeleteEvent($uid,$eventID)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$eventID = mysqli_real_escape_string($this->db,$eventID);
	$checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID' AND uid_fk = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){
	      mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE invited_event_id = '$eventID'") or die(mysqli_error($this->db));
	      mysqli_query($this->db,"DELETE FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
		  mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE post_event_id = '$eventID'") or die(mysqli_error($this->db));
		  return true;
	 }else {
	    return false;
	 }  
}
 // Search Friend
 public function Dot_SearchFriendWid($uid, $key)
 {
   $key = mysqli_real_escape_string($this->db, $key);
   $uid = mysqli_real_escape_string($this->db, $uid);
   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
   mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
   $result = mysqli_query($this->db,"SELECT U.user_name, U.user_id, U.user_fullname, UT.user_name, UT.user_id, UT.user_fullname, F.role FROM dot_friends F  JOIN dot_users U ON F.user_one = U.user_id JOIN dot_users UT ON F.user_two = UT.user_id WHERE (U.user_name Like '%$key' OR UT.user_fullname Like '$key%' OR UT.user_name Like '$key%' OR UT.user_fullname Like '%$key' OR UT.user_name Like '$key' OR UT.user_fullname Like '$key') AND F.user_one = '$uid' AND F.role IN('fri','flwr') ORDER  BY F.user_one LIMIT 3") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		 $data[]=$row;
    }
    if(!empty($data)) {
	  // Store the result into array
	 return $data;
    } 
 }
 // Get Event Page Details
public function Dot_EventEditForm($uid,$eventProfileID)
{
     $eventProfileID=mysqli_real_escape_string($this->db,$eventProfileID);
	 $checkUserisCreator = mysqli_query($this->db,"SELECT event_id, uid_fk FROM dot_events WHERE event_id = '$eventProfileID' AND uid_fk = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisCreator) == 1){
	    $query = mysqli_query($this->db,"SELECT  event_id,uid_fk,event_title, event_description, event_location,event_start,event_start_time,event_end,event_end_time,event_typ,event_usercaninvite,event_usercanpost,event_shareonwall,event_cover,user_canshareevent, user_cansharetext, user_canshareimage , user_cansharevideo , user_canshareaudio, user_cansharefilteredimage , user_cansharelocation , user_cansharelink, user_cansharegiphy, user_cansharewatermark, user_cansharebenchmark  FROM dot_events WHERE event_id='$eventProfileID'") or die(mysqli_error($this->db));
        $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
        return $data;
	 }else{
	     return false;
	 } 
}
// Update Event
public function Dot_UpdateEventDetails($uid, $event_name, $event_location, $event_description, $event_start,$event_start_time, $event_end, $event_end_time,$event_Type, $eventUserCanShareEvent, $eventUserCanCreatePost, $eventUserCaninviteFriend, $eventUserCanCreateText, $eventUserCanCreateImage, $eventUserCanCreateVideo, $eventUserCanCreateAudio, $eventUserCanCreateFilter, $eventUserCanCreateLocation, $eventUserCanCreateGif, $eventUserCanCreateLink, $eventUserCanCreateWaterMark, $eventUserCanCreateBenchMark,$eventID)
{
     $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $checkUserisCreator = mysqli_query($this->db,"SELECT event_id, uid_fk FROM dot_events WHERE event_id = '$eventID' AND uid_fk = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisCreator) == 1){
		   mysqli_query($this->db,"UPDATE dot_events SET event_title = '$event_name', event_description = '$event_description' , event_location = '$event_location' , event_start = '$event_start', event_start_time = '$event_start_time', event_end = '$event_end' , event_end_time = '$event_end_time', event_typ = '$event_Type', event_usercaninvite = '$eventUserCaninviteFriend', event_usercanpost = '$eventUserCanCreatePost' , user_canshareevent = '$eventUserCanShareEvent', user_cansharetext = '$eventUserCanCreateText' , user_canshareimage = '$eventUserCanCreateImage', user_cansharevideo = '$eventUserCanCreateVideo' , user_canshareaudio = '$eventUserCanCreateAudio' , user_cansharefilteredimage='$eventUserCanCreateFilter' , user_cansharelocation = '$eventUserCanCreateLocation', user_cansharegiphy = '$eventUserCanCreateGif' , user_cansharelink = '$eventUserCanCreateLink' , user_cansharewatermark='$eventUserCanCreateWaterMark',user_cansharebenchmark='$eventUserCanCreateBenchMark' WHERE event_id='$eventID' AND uid_fk = '$uid'") or die(mysqli_error($this->db));  
		   return true;
	 }else{
	     return false;
	 } 
}
// User Going
public function Dot_UpdateUserEventStatus($uid, $eventID)
{
	 $uid = mysqli_real_escape_string($this->db,$uid);
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $time = time();
     $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){
		   $checkUserSettedGoingBefore = mysqli_query($this->db,"SELECT invited_user_id, invited_event_id FROM dot_event_invites WHERE (invited_user_id = '$uid' OR inviter_user_id = '$uid') AND invited_event_id = '$eventID' AND invited_user_answer IN('1','2','3')") or die(mysqli_error($this->db)); 
		   if(mysqli_num_rows($checkUserSettedGoingBefore) == 1){
		        $removeUser = mysqli_query($this->db,"UPDATE dot_event_invites SET invited_user_answer = '2' WHERE invited_event_id = '$eventID' AND (invited_user_id = '$uid' OR inviter_user_id = '$uid')") or die(mysqli_error($this->db));
				return  'going';
				exit();
		   }else{ 
		        $insertGoingList = mysqli_query($this->db,"INSERT INTO `dot_event_invites`(inviter_user_id , invited_user_id , invited_event_id ,invited_time,invited_user_answer,creator)VALUES('$uid','$uid','$eventID','$time','2','user')") or die(mysqli_error($this->db)); 
				return  'going';
				exit();
		   }  
	 }else{
	    return false;
	 }
}
// User Not Going
public function Dot_UserNotGoing($uid, $eventID){
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){
		 $checkUserGoing = mysqli_query($this->db,"SELECT invited_user_id, invited_event_id FROM dot_event_invites WHERE (invited_user_id = '$uid' OR inviter_user_id = '$uid') AND invited_event_id = '$eventID' AND invited_user_answer = '2'") or die(mysqli_error($this->db));
		 if(mysqli_num_rows($checkUserGoing) == 1){
			   $deleteGoingStatus = mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE invited_event_id = '$eventID' AND  (invited_user_id = '$uid' OR inviter_user_id = '$uid')") or die(mysqli_error($this->db));
			   return 'go';
	     }
	 }else{
	    return false;
	 }
}
// Check user in  Going
public function Dot_CheckUsergoing($uid,$eventID)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $eventID = mysqli_real_escape_string($this->db,$eventID);
	  $checkUserInvitedBefore = mysqli_query($this->db,"SELECT invited_user_id,invited_event_id, invited_user_answer FROM dot_event_invites WHERE invited_user_id = '$uid' AND invited_event_id = '$eventID'  AND invited_user_answer = '2'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserInvitedBefore) == 1){
	       return true;
	   }else{return false;}
}
// Check user in  Going
public function Dot_CheckUserInterestedEvent($uid,$eventID)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $eventID = mysqli_real_escape_string($this->db,$eventID);
	  $checkUserInvitedBefore = mysqli_query($this->db,"SELECT invited_user_id,invited_event_id, invited_user_answer FROM dot_event_invites WHERE (invited_user_id = '$uid' OR inviter_user_id = '$uid') AND invited_event_id = '$eventID'  AND invited_user_answer = '3'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserInvitedBefore) == 1){
	       return true;
	   }else{return false;}
}
// Interested or Not interested
public function Dot_UpdateUserEventInterestedStatus($uid, $eventID)
{
	 $uid = mysqli_real_escape_string($this->db,$uid);
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $time = time();
     $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){
		   $checkUserSettedGoingBefore = mysqli_query($this->db,"SELECT invited_user_id, invited_event_id FROM dot_event_invites WHERE (invited_user_id = '$uid' OR inviter_user_id = '$uid') AND invited_event_id = '$eventID' AND invited_user_answer IN('1','2','3')") or die(mysqli_error($this->db)); 
		   if(mysqli_num_rows($checkUserSettedGoingBefore) == 1){
		        $removeUser = mysqli_query($this->db,"UPDATE dot_event_invites SET invited_user_answer = '3' WHERE invited_event_id = '$eventID' AND (invited_user_id = '$uid' OR inviter_user_id = '$uid')") or die(mysqli_error($this->db));
				return  'interested';
				exit();
		   }else{ 
		        $insertGoingList = mysqli_query($this->db,"INSERT INTO `dot_event_invites`(inviter_user_id , invited_user_id , invited_event_id ,invited_time,invited_user_answer,creator)VALUES('$uid','$uid','$eventID','$time','3','user')") or die(mysqli_error($this->db)); 
				return  'interested';
				exit();
		   }  
	 }else{
	    return false;
	 }
}
// User Not Going
public function Dot_UserNotInterested($uid, $eventID){
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){
		 $checkUserGoing = mysqli_query($this->db,"SELECT invited_user_id, invited_event_id FROM dot_event_invites WHERE (invited_user_id = '$uid' OR inviter_user_id = '$uid') AND invited_event_id = '$eventID' AND invited_user_answer = '3'") or die(mysqli_error($this->db));
		 if(mysqli_num_rows($checkUserGoing) == 1){
			   $deleteGoingStatus = mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE invited_event_id = '$eventID' AND  (invited_user_id = '$uid' OR inviter_user_id = '$uid')") or die(mysqli_error($this->db));
			   return 'interest';
	     }
	 }else{
	    return false;
	 }
}
// Slug Url
public function url_slugi($slug){
	  $str = mb_strtolower(trim($str), 'UTF-8');
	  $str = preg_replace('/[^\pL\pN]+/u', ' ', $str);
	  $str = trim($str);
	  $str = preg_replace('/\h+/', '-', $str);
	  return $str;
}
// Share On Wall
public function Dot_ShareEventOnWall($uid, $eventID)
{
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $eventID = mysqli_real_escape_string($this->db,$eventID);
	 $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkEventExist) == 1){   
	    $time=time(); // Current post time
	    $ip=$_SERVER['REMOTE_ADDR']; // user ip
		 
		 $getEventDetails = mysqli_query($this->db,"SELECT event_title, event_id FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
		 $data=mysqli_fetch_array($getEventDetails,MYSQLI_ASSOC); 
		 $theURL = 'p_'.time().'_'.$this->url_slugi($data['event_title']); 
		 $Insert = mysqli_query($this->db,"INSERT INTO `dot_user_posts`(user_id_fk, post_type, user_ip, post_created_time,slug, post_event_id, post_page_type)VALUES('$uid','p_event','$ip','$time','$theURL','$eventID','wall')") or die(mysqli_error($this->db));
		 return true;
	 }else{
	    return false;
	 }
} 
// Upcoming Events
public function Dot_UpComingEventsResult($uid,$eventType)
{
      $uid = mysqli_real_escape_string($this->db, $uid); 
	  $eventType = mysqli_real_escape_string($this->db, $eventType);
	  $moreEvent = '';     
	  $query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon,src FROM dot_event_categories WHERE ev_id = '$eventType'");
	  
	  if(mysqli_num_rows($query) == 1) { 
	         $moreEvent="E.event_typ = '".$eventType."' AND";
      }
	  $getAllEventsQuery = mysqli_query($this->db,"
	  SELECT
         E.event_id, E.uid_fk, E.event_title, E.event_location, E.event_start, E.event_start_time, E.event_end, E.event_end_time, E.event_typ, E.event_cover
     FROM dot_events E
     WHERE 
        E.event_start >= CURDATE() AND
		$moreEvent 
		E.event_id 
     NOT IN(
     SELECT F.invited_event_id
     FROM dot_event_invites F
     WHERE F.invited_event_id = '$uid' OR
        F.invited_user_id = '$uid'
   )
   ORDER BY E.event_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	  //Store the result    FROM dot_events WHERE event_id='$eventProfileID'
    while($row=mysqli_fetch_array($getAllEventsQuery, MYSQLI_ASSOC)) {   
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}

// Upcoming Events
public function Dot_UpComingEvents($uid,$eventID,$eventType)
{
      $uid = mysqli_real_escape_string($this->db, $uid);
	  $eventID = mysqli_real_escape_string($this->db, $eventID);
	  $eventType = mysqli_real_escape_string($this->db, $eventType);
	  $moreEvent = '';    
	  $checkEventExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$eventID'") or die(mysqli_error($this->db));
	  $query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon,src FROM dot_event_categories WHERE ev_id = '$eventType'");
	  
	  if(mysqli_num_rows($checkEventExist) == 1 && mysqli_num_rows($query) == 1) { 
	         $moreEvent="E.event_id <'".$eventID."' AND E.event_typ = '".$eventType."' AND";
      }
	  $getAllEventsQuery = mysqli_query($this->db,"
	  SELECT
         E.event_id, E.uid_fk, E.event_title, E.event_location, E.event_start, E.event_start_time, E.event_end, E.event_end_time, E.event_typ, E.event_cover
     FROM dot_events E
     WHERE 
        E.event_start >= CURDATE() AND
		$moreEvent 
		E.event_id 
     NOT IN(
     SELECT F.invited_event_id
     FROM dot_event_invites F
     WHERE F.invited_event_id = '$uid' OR
        F.invited_user_id = '$uid'
   )
   ORDER BY E.event_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	  //Store the result    FROM dot_events WHERE event_id='$eventProfileID'
    while($row=mysqli_fetch_array($getAllEventsQuery, MYSQLI_ASSOC)) {   
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}

// Get Event Type ID 
public function Dot_EventTypeID($eventTypeKey)
{
	 $eventTypeKey = mysqli_real_escape_string($this->db, $eventTypeKey);
     $query=mysqli_query($this->db,"SELECT ev_id, ev_key, ev_icon,src FROM dot_event_categories WHERE ev_key = '$eventTypeKey'");
	 if(mysqli_num_rows($query)==1) {
       //This is if user id valid is ok then return user id
       $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $row['ev_id'];
    } else {
       return false;
    }
}
// User Going And Interested Events List
public function Dot_GoingInterestedEvents($uid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	  
	 $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisExist) == 1) {
	      $getAllEventsQuery = mysqli_query($this->db,"
	          SELECT DISTINCT 
			        F.invite_id, F.inviter_user_id, F.invited_user_id,F.invited_event_id,F.invited_user_answer , F.creator,
					U.event_id ,U.event_title,U.event_start , U.event_typ
		     FROM 
			       dot_events U, dot_event_invites F  
			 WHERE 
			       F.invited_event_id=U.event_id AND 
				   F.invited_user_id='$uid' AND 
				   F.invited_user_answer IN('2','3') AND
				   U.event_start >= CURDATE() AND
				   F.creator = 'user'
				   ORDER BY F.invite_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	  //Store the result    FROM dot_events WHERE event_id='$eventProfileID'
    while($row=mysqli_fetch_array($getAllEventsQuery, MYSQLI_ASSOC)) {   
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
	  }else{
	     return false;
	  } 
}
// User Invited notification List
public function Dot_UserEventInvitedNotifications($uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $getAllEventsQuery = mysqli_query($this->db,"
	          SELECT DISTINCT 
			        F.invite_id, F.inviter_user_id, F.invited_user_id,F.invited_event_id,F.invited_user_answer , F.creator,
					U.event_id ,U.event_title,U.event_start , U.event_typ
		     FROM 
			       dot_events U, dot_event_invites F  
			 WHERE 
			       F.invited_event_id=U.event_id AND 
				   F.invited_user_id='$uid' AND 
				   F.invited_user_answer = '1' AND 
				   F.creator = 'user'
				   ORDER BY F.invite_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db)); 
	  //Store the result    FROM dot_events WHERE event_id='$eventProfileID'
    while($row=mysqli_fetch_array($getAllEventsQuery, MYSQLI_ASSOC)) {   
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
/*Change Avatar From User Profile*/
public function Dot_EventCoverUpdate($uid,$uidfk, $actual_image_name) 
{  
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $uidfk = mysqli_real_escape_string($this->db, $uidfk);
     $checkUserisExist = mysqli_query($this->db,"SELECT event_id,uid_fk FROM dot_events WHERE event_id = '$uid' AND uid_fk = '$uidfk'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisExist) == 1) {
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_events SET event_cover='$actual_image_name'  WHERE event_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT event_id,event_cover FROM dot_events WHERE event_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
	 }else{
        return false;
	 }
} 
// Update and Back to Main Profile Custom Colors
public function Dot_BackToProfileMainCustomColors($uid)
{
      $uid = mysqli_real_escape_string($this->db, $uid);
	  $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkUserisExist) == 1){  
	        mysqli_query($this->db,"UPDATE dot_users SET pbg_color = NULL , pt_color = NULL , pp_icon = NULL , pfont_font = NULL WHERE user_id = '$uid'") or die(mysqli_error($this->db));
			return true;
	  }else{
	     return false;
	  }
}
// Delete Event Category
public function Dot_DeleteEventCategory($uid,$categoryID, $categoryKey)
{
	   $uid = mysqli_real_escape_string($this->db, $uid);
	   $categoryID = mysqli_real_escape_string($this->db, $categoryID);
	   $categoryKey = mysqli_real_escape_string($this->db, $categoryKey);
       $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkCatIDExist = mysqli_query($this->db,"SELECT ev_id FROM dot_event_categories WHERE ev_id = '$categoryID'") or die(mysqli_error($this->db));
	   $checkLangKeyExist = mysqli_query($this->db,"SELECT lang_id FROM dot_languages WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkCatIDExist) == 1 && mysqli_num_rows($checkLangKeyExist) == 1){  
	        $deleteCategory = mysqli_query($this->db,"DELETE FROM `dot_event_categories` WHERE ev_id = '$categoryID'") or die(mysqli_error($this->db)); 
		    $deleteLangKey = mysqli_query($this->db, "DELETE FROM `dot_languages` WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
			return true;
	  }else{
	     return false;
	  }
}
// Languages
public function Dot_LanguagesID($key)
{ 
   $query = mysqli_query($this->db, "SELECT lang_id, lang_key FROM dot_languages WHERE lang_key = '$key'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['lang_id']) {
		$name=$data['lang_id'];
	    return  $name;
	} 
}
// Languages
public function Dot_LanguagesKey($id)
{ 
   $query = mysqli_query($this->db, "SELECT lang_key FROM dot_languages WHERE lang_id = '$id'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['lang_key']) {
		$name=$data['lang_key'];
	    return  $name;
	} 
} 
/*Get Tour Key*/
public function Dot_GetTourKey($uid,$tourKey)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $tourKey = mysqli_real_escape_string($this->db, $tourKey);
	 $checkTourKeySawBefore = mysqli_query($this->db,"SELECT user_id_fk, tour_key_id FROM dot_tour_saw WHERE user_id_fk = '$uid' AND tour_key_id = '$tourKey' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkTourKeySawBefore) == 0){
           $query = mysqli_query($this->db, "SELECT lang_key FROM dot_languages WHERE lang_id = '$tourKey'") or die(mysqli_error($this->db));
		   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
			if($data['lang_key']) {
				//$insertSaw = mysqli_query($this->db, "INSERT INTO dot_tour_saw(user_id_fk, tour_key_id) VALUES('$uid','$tourKey')") or die(mysqli_error($this->db));
				$name=$data['lang_key'];
				return  $name;
			}else{return false;}
	 }else{return false;}
}
/*Check Tour Saw Before*/
public function Dot_CheckTourSawBefore($uid,$tourKey){
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $tourKey = mysqli_real_escape_string($this->db, $tourKey);
     $checkTourKeySawBefore = mysqli_query($this->db,"SELECT user_id_fk, tour_key_id FROM dot_tour_saw WHERE user_id_fk = '$uid' AND tour_key_id = '$tourKey' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkTourKeySawBefore) == 0){
		  $query = mysqli_query($this->db, "SELECT lang_key FROM dot_languages WHERE lang_id = '$tourKey'") or die(mysqli_error($this->db));
		   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
			if($data['lang_key']) { 
				$name=$data['lang_key'];
				return  $name;
			}
	 }else{return false;}
}
/*Do not show this tour again*/
public function Dot_DoNotShowThisTour($uid, $tourID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $tourID = mysqli_real_escape_string($this->db, $tourID);
	 $checkTourKeySawBefore = mysqli_query($this->db,"SELECT user_id_fk, tour_key_id FROM dot_tour_saw WHERE user_id_fk = '$uid' AND tour_key_id = '$tourID' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkTourKeySawBefore) == 0){
	      $insertSaw = mysqli_query($this->db, "INSERT INTO dot_tour_saw(user_id_fk, tour_key_id) VALUES('$uid','$tourID')") or die(mysqli_error($this->db));
	 }
}
// Event Covers
public function Dot_AdminEventCoverLists($lastEventCover)
{
   $lastEventCover=mysqli_real_escape_string($this->db,$lastEventCover); 
   $moreEventcover=""; 
    if($lastEventCover) { 
	  $moreEventcover="WHERE watermark_id <'".$lastEventCover."' ";
    } 
	$data = null;   
	$getEventCoversQuery = mysqli_query($this->db,"SELECT e_cover_id,e_cover_image   FROM dot_event_covers  $moreEventcover ORDER BY e_cover_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($getEventCoversQuery, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Add New EventCover
public function Dot_AddNewEventCover($uid,$EventCoverImage)
{
       $uid = mysqli_real_escape_string($this->db,$uid); 
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db)); 
	   if(mysqli_num_rows($checkUserisAdmin) > 0){  
		   $saveWaterMark = mysqli_query($this->db,"INSERT INTO dot_event_covers(e_cover_image)VALUES('$EventCoverImage')") or die(mysqli_error($this->db));
		   $getUploadedWaterMark = mysqli_query($this->db,"SELECT e_cover_id, e_cover_image FROM dot_event_covers ORDER BY e_cover_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getUploadedWaterMark, MYSQLI_ASSOC);
	        return $result;
	   }else{
		    return false;  
		}
}
// Delete Event Cover
public function Dot_DeleteEventCover($uid, $deleteThisID)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $deleteThisID = mysqli_real_escape_string($this->db, $deleteThisID);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkEventCoverExist = mysqli_query($this->db,"SELECT e_cover_id FROM dot_event_covers WHERE e_cover_id = '$deleteThisID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkEventCoverExist) == 1){
		   $deleteEC = mysqli_query($this->db,"DELETE FROM `dot_event_covers` WHERE e_cover_id = '$deleteThisID'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
/*All User Text Posts*/
public function Dot_AllUserTextPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_text' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}

/*All User Text Posts*/
public function Dot_AllUserImagePostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_image' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserVideoPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_video' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserAudioPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_audio' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserLinkPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_link' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserGifPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_gif' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserLocationPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_location' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 
/*All User Text Posts*/
public function Dot_AllUserWatermarkPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_watermark' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 
/*All User Text Posts*/
public function Dot_AllUserWhichPostsManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_which' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
// market theme list
public function Dot_MarketThemeList($lastThemeID,$themeKey)
{
	$lastThemeID=mysqli_real_escape_string($this->db,$lastThemeID);
	$morequery=""; 
	$moreThemeKey = "";
	if($themeKey){
	   $moreThemeKey=" AND market_theme_category = '".$themeKey."' ";
	}
    if($lastThemeID) { 
	  $morequery=" AND market_theme_id < '".$lastThemeID."' ";
    } 
	$data = null;  
   $ThemesQuery = mysqli_query($this->db,"SELECT market_theme_id,market_theme_name,market_theme_upload_time,market_theme_status,market_theme_type,market_theme_screen,market_theme_price,market_theme_category FROM dot_market_themes 
   WHERE 
   market_theme_status = '1'
   $morequery 
   $moreThemeKey  
   ORDER BY 
   market_theme_id 
   DESC LIMIT 20") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($ThemesQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }
}

/*Update Maintenance Mode*/
public function Dot_CanRegisterModeUpdate($uid, $regMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $regMode = mysqli_real_escape_string($this->db,$regMode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_register = '$regMode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
/*Enable Disable Per IP Register*/
public function Dot_IpEnableDisableModeUpdate($uid, $ipMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $ipMode = mysqli_real_escape_string($this->db,$ipMode); 
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id,user_status,user_type FROM dot_users WHERE user_id = '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		 $updateSiteSetting = mysqli_query($this->db,"UPDATE dot_configuration SET enable_disable_register_ip = '$ipMode' WHERE configuration_id = '1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	     return false;
	 }  
}
// Delete Event Cover
public function Dot_SavedNumberIP($uid, $numberIP)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $numberIP = mysqli_real_escape_string($this->db, $numberIP);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db)); 
	   if(mysqli_num_rows($checkUserisAdmin) == 1 ){
		   $savePerIP = mysqli_query($this->db,"UPDATE dot_configuration SET  ip_register_limit  = '$numberIP' WHERE configuration_id  = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
public function parse_yturl($url) 
{
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : false;
}
// Header Ads Open Close
public function Dot_HeaderAdsCode($uid, $featureMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $featureMode = mysqli_real_escape_string($this->db, $featureMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET header_ads = '$featureMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
} 
public function Dot_AdvertisementCode($uid, $codeAds)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $codeAds = mysqli_real_escape_string($this->db, $codeAds); 
	   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db)); 
	   if(mysqli_num_rows($checkUserisAdmin) == 1 ){
		   $saveAdsCode = mysqli_query($this->db,"UPDATE dot_configuration SET  header_ads_code  = '$codeAds' WHERE configuration_id  = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Sidebar Ads Open Close
public function Dot_SidebarAdsCode($uid, $featureMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $featureMode = mysqli_real_escape_string($this->db, $featureMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET sidebar_ads = '$featureMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Sidebar Advertisement Code
public function Dot_SidebarAdvertisementCode($uid, $codeAds)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $codeAds = mysqli_real_escape_string($this->db, $codeAds);
	    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db)); 
	   if(mysqli_num_rows($checkUserisAdmin) == 1 ){
		   $saveAdsCode = mysqli_query($this->db,"UPDATE dot_configuration SET  sidebar_ads_code  = '$codeAds' WHERE configuration_id  = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Between Post Ads Open Close
public function Dot_BetwenPostAdsCode($uid, $featureMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $featureMode = mysqli_real_escape_string($this->db, $featureMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET post_between_ads = '$featureMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Sidebar Advertisement Code
public function Dot_BetweenPostAdvertisementCode($uid, $codeAds)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $codeAds = mysqli_real_escape_string($this->db, $codeAds); 
	   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
       mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db)); 
	   if(mysqli_num_rows($checkUserisAdmin) == 1 ){
		   $saveAdsCode = mysqli_query($this->db,"UPDATE dot_configuration SET  post_between_ads_code  = '$codeAds' WHERE configuration_id  = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// Get Iframe From Exptaned URL
public function Dot_ExpandedPostFrame($uid, $expandedPostID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
    $expandedPostID = mysqli_real_escape_string($this->db, $expandedPostID);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	$checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$expandedPostID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkPostExist)){
		   $getNewLinkPost = mysqli_query($this->db,"SELECT  user_post_id, user_id_fk, post_type, post_page_type, post_link_url FROM dot_user_posts  WHERE post_type = 'p_link' AND user_post_id = '$expandedPostID'") or die(mysqli_error($this->db));
	       $result = mysqli_fetch_array($getNewLinkPost, MYSQLI_ASSOC);
	       return $result;
	   }else{
	     return false;
	  }
}
/*Show Clicked Post From Right Sidebar*/
public function Dot_ShowWantedPostDetails($postID)
{
	$postID = mysqli_real_escape_string($this->db, $postID); 
    $getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id and P.user_post_id='$postID'")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
/*Share Post*/
public function Dot_Share_Post($uid,$message_id,$postTitle, $postDetailsHtml, $postTags, $tags,$slug) {   
		$time=time(); // Current post time
		$message_id = mysqli_real_escape_string($this->db, $message_id);// Direct Message ID 
		$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	    $checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$message_id'") or die(mysqli_error($this->db));
		if(mysqli_num_rows($checkUserExist)>0 && mysqli_num_rows($checkPostExist)){ 
		   $InsertShareMessageFromData = mysqli_query($this->db,"INSERT INTO dot_user_posts (user_id_fk,post_type,comment_status,watermarkid,which_image,post_created_time,hashtag_normal,hashtag_diez,post_title_text,post_text_details,post_event_id,post_event_page_id,who_can_see_post,post_image_id,post_link_url,post_link_description,post_link_title,post_link_img,post_link_mini_url,post_video_id,post_audio_id,filter_name, gif_url,user_lat ,user_lang,location_place,about_location,slug,post_page_type,shared_post)
SELECT '".mysqli_real_escape_string($this->db, $uid)."',post_type,comment_status,watermarkid,which_image,'$time','".mysqli_real_escape_string($this->db,$tags)."','".mysqli_real_escape_string($this->db,$postTags)."','".mysqli_real_escape_string($this->db,$postTitle)."','".mysqli_real_escape_string($this->db,$postDetailsHtml)."',post_event_id,post_event_page_id,who_can_see_post,post_image_id,post_link_url,post_link_description,post_link_title,post_link_img,post_link_mini_url,post_video_id,post_audio_id,filter_name, gif_url,user_lat ,user_lang,location_place,about_location,'".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8)."',post_page_type,'".mysqli_real_escape_string($this->db, $message_id)."' FROM dot_user_posts  WHERE user_post_id = '$message_id'") or die(mysqli_error($this->db)); 
			$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
	    }
	}
/*Check Post Exist*/
public function Dot_CheckPostAlreadyInData($postID){
   $message_id = mysqli_real_escape_string($this->db, $postID); // Direct Message ID 
   $checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$message_id'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkPostExist)>0){ 
      return true;
   }else{return false;}
}

/*Get Post First Shared UserID*/
public function Dot_GetUserIDFromPostID($postID)
{
	$message_id = mysqli_real_escape_string($this->db, $postID); // Direct Message ID 
    $checkPostExist = mysqli_query($this->db,"SELECT user_post_id, user_id_fk FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkPostExist)>0){ 
	  $data=mysqli_fetch_array($checkPostExist,MYSQLI_ASSOC);
      return $data['user_id_fk'];
    }else{return false;}
}
/*Get Shared Post Some Details*/
public function Dot_GetSomeDetailsFromSharedPost($postID)
{
   $message_id = mysqli_real_escape_string($this->db, $postID); // Direct Message ID 
    $checkPostExist = mysqli_query($this->db,"SELECT user_post_id,post_title_text, post_text_details FROM dot_user_posts WHERE user_post_id = '$postID'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkPostExist)>0){ 
	  $data=mysqli_fetch_array($checkPostExist,MYSQLI_ASSOC);
      return $data;
    }else{return false;}
} 
 // Feelings Activity	
 public function Dot_Feelings_Activity($factivity){
	 $factivity = mysqli_real_escape_string($this->db, $factivity);
    $query = mysqli_query($this->db,"SELECT f_id,f_key,f_name, f_img FROM dot_feelings_activity WHERE f_name = '$factivity'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		 $data[]=$row;
    }
    if(!empty($data)) {
	  // Store the result into array
	 return $data;
    } 	 
 }
// Get Feeling Status From Posts
public function Dot_GetFeelingStatus($feelingID){
	$feelingID = mysqli_real_escape_string($this->db, $feelingID);
	$query = mysqli_query($this->db,"SELECT f_id,f_name, f_img,f_key FROM dot_feelings_activity WHERE f_id = '$feelingID'") or die(mysqli_error($this->db)); 
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data){
	  return $data;
    }
 }
// Get All Feelings
public function Dot_GetAllFeelings(){
    $query = mysqli_query($this->db,"SELECT f_id,f_name, f_img,f_key FROM dot_feelings_activity") or die(mysqli_error($this->db)); 
	//Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Get All Feelings
public function Dot_FeelingCategories(){
    $query = mysqli_query($this->db,"SELECT f_c_id,f_c_name FROM dot_feeling_categories") or die(mysqli_error($this->db)); 
	//Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Delete Event Category
public function Dot_DeleteFeeling($uid,$categoryID, $categoryKey)
{
	   $uid = mysqli_real_escape_string($this->db, $uid);
	   $categoryID = mysqli_real_escape_string($this->db, $categoryID);
	   $categoryKey = mysqli_real_escape_string($this->db, $categoryKey);
       $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkCatIDExist = mysqli_query($this->db,"SELECT f_id FROM dot_feelings_activity WHERE f_id = '$categoryID'") or die(mysqli_error($this->db));
	   $checkLangKeyExist = mysqli_query($this->db,"SELECT lang_id FROM dot_languages WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkCatIDExist) == 1 && mysqli_num_rows($checkLangKeyExist) == 1){  
	        $deleteCategory = mysqli_query($this->db,"DELETE FROM `dot_feelings_activity` WHERE f_id = '$categoryID'") or die(mysqli_error($this->db)); 
		    $deleteLangKey = mysqli_query($this->db, "DELETE FROM `dot_languages` WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
			return true;
	  }else{
	     return false;
	  }
}
// Selected Icon 
public function Dot_SelectedMenuIcon($type){
   $type = mysqli_real_escape_string($this->db, $type);
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons WHERE icon_type = '1' AND icon_name = '$type'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($queryIcon,MYSQLI_ASSOC);
   return $data['icon_code'];
}
public function Dot_CheckIconExist($eThisIcon) {
    $eThisIcon = mysqli_real_escape_string($this->db, $eThisIcon);
	$queryIcon = mysqli_query($this->db,"SELECT  * FROM dot_icons WHERE icon_name = '$eThisIcon'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($queryIcon) > 0){
	    return true;
	}else{return false;}
}
// Show SVG Icons
public function Dot_ShowSVGIcons(){
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons") or die(mysqli_error($this->db));
   //Store the result
    while($row=mysqli_fetch_array($queryIcon, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Show SVG Icons
public function Dot_SVGIconsList($type){
	$type = mysqli_real_escape_string($this->db, $type);
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons WHERE icon_name = '$type'") or die(mysqli_error($this->db));
   //Store the result
    while($row=mysqli_fetch_array($queryIcon, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// icon
public function Dot_IconG($type){
   $type = mysqli_real_escape_string($this->db, $type);
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons WHERE icon_id = '$type'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($queryIcon,MYSQLI_ASSOC);
   return $data;
}
//Icon group list
public function Dot_IconGroupList(){ 
    $query = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type, GROUP_CONCAT(icon_name) FROM `dot_icons` GROUP BY icon_name") or die(mysqli_error($this->db)); 
	
    //Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
/*Update Icon*/
public function Dot_UpdateIcon($uid, $thisIconID, $thisIconCode)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $thisIconID = mysqli_real_escape_string($this->db, $thisIconID); 
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 $queryIcon = mysqli_query($this->db,"SELECT icon_id FROM dot_icons WHERE icon_id = '$thisIconID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($queryIcon) > 0){ 
	       $updateIcon = mysqli_query($this->db,"UPDATE dot_icons SET icon_code = '$thisIconCode' WHERE  icon_id = '$thisIconID'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
/*Add New Icon*/
public function Dot_SaveNewIcon($uid, $thisIconID, $thisIconCode)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $thisIconID = mysqli_real_escape_string($this->db, $thisIconID); 
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 $queryIcon = mysqli_query($this->db,"SELECT icon_id FROM dot_icons WHERE icon_name = '$thisIconID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($queryIcon) > 0){ 
	       $updateIcon = mysqli_query($this->db,"INSERT INTO `dot_icons`(icon_code,icon_name)VALUES('$thisIconCode','$thisIconID')") or die(mysqli_error($this->db)); 
		   return true;
	 }else{return false;}
}
/*Save New Icon*/
public function Dot_SaveNewSVGIcon($uid, $thisIconID, $thisIconCode)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $thisIconID = mysqli_real_escape_string($this->db, $thisIconID); 
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 $queryIcon = mysqli_query($this->db,"SELECT icon_id FROM dot_icons WHERE icon_name = '$thisIconID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($queryIcon) == 0){ 
	       $updateIcon = mysqli_query($this->db,"INSERT INTO `dot_icons`(icon_code,icon_name,icon_type)VALUES('$thisIconCode','$thisIconID','0')") or die(mysqli_error($this->db)); 
		   return true;
	 }else{return false;}
}
// Update Icon Active 
public function Dot_UpdateActiveIcon($uid, $type, $iconID){
   $uid = mysqli_real_escape_string($this->db, $uid);
   $type = mysqli_real_escape_string($this->db, $type);
   $iconID = mysqli_real_escape_string($this->db, $iconID);
   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserisAdmin)){ 
          $updateIconType = mysqli_query($this->db,"UPDATE dot_icons SET icon_type = '0' WHERE icon_type = '1' AND icon_name = '$type'") or die(mysqli_error($this->db));
		  $updateIcon = mysqli_query($this->db,"UPDATE dot_icons SET icon_type = '1' WHERE  icon_id = '$iconID' AND icon_name='$type'") or die(mysqli_error($this->db));
		  return true;
   }else{return false;}
}
// Update Menu Position 
public function Dot_MenuPostiion($uid, $position){
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $position = mysqli_real_escape_string($this->db, $position);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET menu_position = '$position' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Product Categories
public function Dot_MarketPlaceProductCategories()
{
    $query = mysqli_query($this->db,"SELECT m_category_id,m_category_key FROM dot_market_categories") or die(mysqli_error($this->db));
	//Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }	
}
// Check MarketPlace Category Exist
public function Dot_ProductCategorySecurity($pid)
{
      $pid = mysqli_real_escape_string($this->db, $pid);
	  $query = mysqli_query($this->db,"SELECT m_category_id,m_category_key FROM dot_market_categories WHERE m_category_id = '$pid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($query) == 1){
		    return true;
	  }else{return false;}
}
public function Dot_UserExistSecurity($uid){
   $uid = mysqli_real_escape_string($this->db, $uid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserExist) == 1){
		    return true;
	  }else{return false;}
}
/*Save Image Post*/
public function Dot_MarketPlaceProductSave($uid, $productTitle, $productDescriptionHtml,$productImageValues,$slugURL, $productCategory,$productPrice,$messageStatus, $place)
{
    $time=time(); // Current post time
	$ip=$_SERVER['REMOTE_ADDR']; // user ip
           mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
           mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$checkProductIDExist = $this->Dot_ProductCategorySecurity($productCategory);
	$checkUserExist = $this->Dot_UserExistSecurity($uid);
	//if(!$checkProductIDExist && !$checkUserExist){exit;}
	$saveTextFromData = mysqli_query($this->db,"INSERT INTO  `dot_user_posts`(user_id_fk,post_type,post_created_time,user_ip,slug,m_product_name,m_product_description,product_images,product_normal_price,product_category,product_status,post_page_type,product_message_status,product_place,product_currency) VALUES ('$uid','p_product','$time','$ip','$slugURL', '$productTitle', '$productDescriptionHtml', '$productImageValues', '$productPrice', '$productCategory', '0','market','$messageStatus','$place','USD')") or die(mysqli_error($this->db));
	//Create Market If Not Exist
	$checkMarketPlace = mysqli_query($this->db,"SELECT market_place_owner_id,market_place_name,market_place_created_time,market_theme FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkMarketPlace) == 0){
		 $name = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
	      mysqli_query($this->db,"INSERT INTO `dot_user_market`(market_place_owner_id, market_temporary_name, market_place_created_time, market_theme)VALUES('$uid','$name','$time','default')") or die(mysqli_error($this->db));
	}
	$getNewTextPost = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.user_id_fk ='$uid' AND P.post_type = 'p_product' AND P.post_page_type = 'market' ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($getNewTextPost, MYSQLI_ASSOC);
	return $result;
}
// Product Category
public function Dot_MarketProductPostCategory($cateGoryID)
{
   $cateGoryID = mysqli_real_escape_string($this->db, $cateGoryID);
   $query = mysqli_query($this->db,"SELECT m_category_key FROM `dot_market_categories` WHERE m_category_id='$cateGoryID'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['m_category_key']) {
		$name=$data['m_category_key'];
	    return  $name;
	}else{return false;}
}
// Product Details
public function Dot_GetProductDetails($url)
{ 
	$slug=mysqli_real_escape_string($this->db,$url);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checProductExist = mysqli_query($this->db,"SELECT slug, user_post_id FROM dot_user_posts WHERE slug = '$slug'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checProductExist) == 1){
		  $pdata=mysqli_fetch_array($checProductExist,MYSQLI_ASSOC);
		  $productID = $pdata['user_post_id'];
		  $getDetails = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.who_can_see_post,P.slug,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status, U.user_name, U.user_fullname,U.verified_user FROM dot_user_posts P, dot_users U WHERE P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_post_id = '$productID'") or die(mysqli_error($this->db));
	     $data=mysqli_fetch_array($getDetails,MYSQLI_ASSOC);
	      return $data;
	}else{
	   return false;
	} 
}
// Send a Fast Question to Seller
public function Dot_SendFastQuestionToSeller($from_user_id, $to_user_id,$questionProductID, $questionID)
{
       $from_user_id = mysqli_real_escape_string($this->db, $from_user_id);
	   $to_user_id = mysqli_real_escape_string($this->db, $to_user_id);
	   $questionProductID = mysqli_real_escape_string($this->db, $questionProductID);
	   $questionID = mysqli_real_escape_string($this->db, $questionID);
	   $time=time(); // Current post time
	   $ip=$_SERVER['REMOTE_ADDR']; // user ip
	   $checkProductExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$questionProductID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkProductExist) == 1){
	        $InsertQuestion  = mysqli_query($this->db,"INSERT INTO dot_chat (from_user_id,to_user_id,user_ip,q_product_id,q_question_id,message_created_time)VALUES('$from_user_id','$to_user_id','$ip','$questionProductID','$questionID','$time')") or die(mysqli_error($this->db));
			 if($InsertQuestion){
				 mysqli_query($this->db,"UPDATE dot_users SET notification_message_count = notification_message_count + 1  WHERE user_id = '$to_user_id'") or die(mysqli_error($this->db)); 
				 return true;
		     }else{return false;}
	   }
}
// Check User Created MarketPlace Theme
public function Dot_CheckUserMarketPlace($mid)
{
    $mid=mysqli_real_escape_string($this->db,$mid);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkMarketPlace = mysqli_query($this->db,"SELECT 
	  market_id,
	  market_place_owner_id,
	  market_place_name, 
	  market_place_created_time,
	  market_theme,
	  market_temporary_name,
	  market_about,
	  market_phone,
	  market_email,
	  market_address,
	  market_page_name,
	  market_logo,
	  market_slogan FROM dot_user_market WHERE '$mid' IN (market_temporary_name , market_page_name)") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($checkMarketPlace,MYSQLI_ASSOC);
	 return $data;
} 
// Get All Market Products
public function Dot_GetUserMarketUsername($mymarketUrl)
{
   $mymarketUrl = mysqli_real_escape_string($this->db, $mymarketUrl);
   mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
   mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
   $query = mysqli_query($this->db,"SELECT user_id_fk FROM dot_user_posts WHERE slug = '$mymarketUrl'") or die(mysqli_error($this->db));
   $query2 = mysqli_query($this->db,"SELECT market_temporary_name FROM dot_user_market WHERE market_temporary_name = '$mymarketUrl' OR market_page_name = '$mymarketUrl'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($query) == 1){
       $queryData = mysqli_fetch_array($query, MYSQLI_ASSOC);
      $marketOwnerID = $queryData['user_id_fk'];
      $GetMarketUsername = mysqli_query($this->db,"SELECT market_temporary_name FROM dot_user_market WHERE market_place_owner_id = '$marketOwnerID'") or die(mysqli_error($this->db));
      $queryMarketUserData = mysqli_fetch_array($GetMarketUsername, MYSQLI_ASSOC);
      if($queryMarketUserData['market_temporary_name']){
          return $queryMarketUserData['market_temporary_name'];
      }else{
          return false;
      } 
   }else if(mysqli_num_rows($query2) == 1){
       $queryData = mysqli_fetch_array($query2, MYSQLI_ASSOC);
       return $queryData['market_temporary_name'];
   }else {return false;}	  
}

// Get All Market Products
public function Dot_UserMarketProducts($MarketOwnerID)
{
	  $MarketOwnerID = mysqli_real_escape_string($this->db, $MarketOwnerID);
	  
      $query = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_id_fk = '$MarketOwnerID' AND P.product_status = '0' ORDER BY P.user_post_id DESC limit	" .$this->perpage) or die(mysqli_error($this->db));
	//Store the result
	 while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}

// Get All Market Products
public function Dot_UserMarketProductsSold($MarketOwnerID)
{
	  $MarketOwnerID = mysqli_real_escape_string($this->db, $MarketOwnerID);
	  
      $query = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_id_fk = '$MarketOwnerID' AND P.product_status = '1' ORDER BY P.user_post_id DESC limit	" .$this->perpage) or die(mysqli_error($this->db));
	//Store the result
	 while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
// Product Details For Edit
public function Dot_GetProductEditDetails($uid, $productID)
{ 
	$productID=mysqli_real_escape_string($this->db,$productID);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checProductExist = mysqli_query($this->db,"SELECT user_post_id, user_id_fk FROM dot_user_posts WHERE user_post_id = '$productID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checProductExist) == 1){ 
		  $getDetails = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.who_can_see_post,P.slug,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency, U.user_name, U.user_fullname,U.verified_user FROM dot_user_posts P, dot_users U WHERE P.user_post_id = '$productID' AND P.user_id_fk = '$uid'") or die(mysqli_error($this->db));
	     //Store the result
	      $data=mysqli_fetch_array($getDetails,MYSQLI_ASSOC);
	      return $data;
	}else{
	   return false;
	} 
}
/*User Full Name*/
public function Dot_MarketName($marKetID) 
{
	$marKetID=mysqli_real_escape_string($this->db,$marKetID); 
	$query = mysqli_query($this->db,"SELECT market_id, market_page_name , market_temporary_name , market_place_name FROM `dot_user_market` WHERE market_id='$marKetID' ") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['market_place_name']) {
		$name=$data['market_place_name']; 
		return $name;
	} else {
	  return $data['market_temporary_name'];
	}
}
/*User Full Name*/
public function Dot_MarketUrlName($marKetID) 
{
	$marKetID=mysqli_real_escape_string($this->db,$marKetID); 
	$query = mysqli_query($this->db,"SELECT market_id, market_page_name , market_temporary_name FROM `dot_user_market` WHERE market_id='$marKetID' ") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['market_page_name']) {
		$name=$data['market_page_name']; 
		return $name;
	} else {
	  return $data['market_temporary_name'];
	}
}
// Suggested Products Widget
public function Dot_SuggestedProducts($showingNumber)
{
    $showingNumber = mysqli_real_escape_string($this->db,$showingNumber);  
	 $productsSuggesionsQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.product_status = '0' AND P.ads_status = '1' ORDER BY rand() LIMIT $showingNumber") or die(mysqli_error($this->db));
		 //Store the result
	while($row=mysqli_fetch_array($productsSuggesionsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }   
}

// Get Theme Details
public function Dot_GetThemeName($tid)
{
    $tid = mysqli_real_escape_string($this->db,$tid);  
    $ThemesQuery = mysqli_query($this->db,"SELECT market_theme_id,market_theme_name,market_theme_upload_time,market_theme_status,market_theme_type,market_theme_screen,market_theme_price FROM dot_market_themes WHERE market_theme_id = '$tid'") or die(mysqli_error($this->db));
	if($ThemesQuery){
	   $data=mysqli_fetch_array($ThemesQuery,MYSQLI_ASSOC);
	      return $data;
	}else{return false;}
}
// Check User Already Purchased Market Theme
public function Dot_CheckThemePurchased($uid, $themeID)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $themeID = mysqli_real_escape_string($this->db, $themeID);
   $checkUserPurchasedTheme = mysqli_query($this->db,"SELECT uid_fk,market_theme_id FROM dot_user_market_themes WHERE uid_fk = '$uid' AND market_theme_id = '$themeID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserPurchasedTheme) == 1){return true;}else{return false;}
} 

//Check User Created MarketPlace and Purchased Market Place Theme
public function Dot_CheckUserMarketPlaceExist($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $checkMarketPlaceUser = mysqli_query($this->db,"SELECT market_place_owner_id FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkMarketPlaceUser) == 1){return true;}else{return false;}
}
// Check User Purchased Theme Before
public function Dot_CheckUserPurchasedMarketTheme($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $query = mysqli_query($this->db,"SELECT uid_fk FROM dot_user_market_themes WHERE uid_fk = '$uid'") or die($this->db);
     if(mysqli_num_rows($query) == 1){
		   return true;
	 }else{return false;}
}
// Show User Purchased Market Themes
public function Dot_ShowUserPurchasedMarketThemes($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	  $query = mysqli_query($this->db,"SELECT id,uid_fk,market_theme_id,purchase_time,amounth FROM dot_user_market_themes WHERE uid_fk = '$uid'") or die($this->db);
      while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		       // Store the result into array
	           $data[]=$row;
		  }
	  if(!empty($data)) {
		 return $data;
	  }  
}
// Get Market Theme Name
public function Dot_GetMarketThemeName($themeID)
{
      $themeID = mysqli_real_escape_string($this->db,$themeID);
	  $query = mysqli_query($this->db,"SELECT market_theme_id,market_theme_name FROM dot_market_themes WHERE market_theme_id = '$themeID'") or die(mysqli_error($this->db));
	  $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	   if($data['market_theme_name']) {
		$name=$data['market_theme_name'];
	    return  $name;
	  }
} 
// Check User Using Market Theem
public function Dot_CheckUserUsingMarketTheme($uid,$theme)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $theme = mysqli_real_escape_string($this->db,$theme);
   $query = mysqli_query($this->db,"SELECT market_place_owner_id, market_theme FROM dot_user_market WHERE ") or die(mysqli_error($this->db));
}
/*Show Clicked Post From Right Sidebar*/
public function Dot_BoostPostDetails($postID, $uid)
{ 
	$uid = mysqli_real_escape_string($this->db, $uid);
	$postID = mysqli_real_escape_string($this->db, $postID); 
    $getData = mysqli_query($this->db,"SELECT DISTINCT 
	 P.user_post_id, 
	 P.user_id_fk,
	 P.post_type,
	 P.post_created_time,
	 P.who_can_see_post,
	 P.slug,
	 P.post_page_type,
	 P.m_product_name, 
	 P.m_product_description,
	 P.product_images,
	 P.product_normal_price,
	 P.product_category,	 
	 P.product_status,
	 P.product_discount_price, 
	 P.product_place, 
	 P.product_message_status,
	 P.product_currency,
	 U.show_suggest_users,
	 U.show_advertisement ,
	 U.show_google_ads , 
	 U.user_name, 
	 U.user_fullname,
	 U.verified_user,
	 U.style_mode 
	 FROM dot_user_posts P INNER JOIN dot_users U ON P.user_id_fk=U.user_id WHERE U.user_status='1' AND P.user_post_id='$postID' AND P.user_id_fk = '$uid' AND P.post_page_type = 'market' AND P.post_type = 'p_product'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Check Boost Post ID
public function Dot_CheckBoostPostExist($uid,$boost_id)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$boost_id = mysqli_real_escape_string($this->db, $boost_id);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$checkBoostPost = mysqli_query($this->db,"SELECT user_post_id, user_id_fk,post_page_type,post_type FROM dot_user_posts WHERE user_post_id = '$boost_id' AND user_id_fk = '$uid' AND post_page_type = 'market' AND post_type = 'p_product'") or die(mysqli_error($tihs->db));
	if(mysqli_num_rows($checkBoostPost) == 1 && mysqli_num_rows($checkUserExist) == 1){
	    return true;
	}else{return false;}
}

// Check user Boosted Product
public function Dot_CheckHasBoostedProduct($uid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkHasBoosted = mysqli_query($this->db,"SELECT user_id_fk, post_page_type, post_type, ads_display_type FROM dot_user_posts WHERE user_id_fk = '$uid' AND post_page_type = 'market' AND post_type = 'p_product' AND ads_display_type IN('1','2')") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkHasBoosted) == 1){
		return true;
	}else{return false;}
}
/*Get All User Profile Posts From Data*/
public function Dot_BoostedPosts($uid, $lastProfilePostID) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastProfilePostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastProfilePostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,P.ads_status,P.ads_display_type,P.ads_budget,P.ads_price,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang FROM dot_user_posts P INNER JOIN dot_users U ON P.user_id_fk=U.user_id WHERE U.user_status='1' AND P.user_id_fk='$uid' AND P.post_page_type = 'market' AND P.post_type = 'p_product' AND P.ads_display_type IN('1','2')  $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT 1") or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 

// Seen Product
public function Dot_ProductSeenSingle($uid, $productID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $productID = mysqli_real_escape_string($this->db, $productID);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_display WHERE uid_fk = '$uid' AND ads_id_fk = '$productID'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 $checkPostMarket = mysqli_query($this->db,"SELECT user_post_id, post_type FROM dot_user_posts WHERE user_post_id = '$productID' AND post_type = 'p_product'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1 && mysqli_num_rows($checkPostMarket) == 1 ){
		 $saveClick = mysqli_query($this->db,"INSERT INTO dot_ads_display(uid_fk, ads_id_fk, time, ip)VALUES('$uid','$productID',NOW(),'$ip')") or die(mysqli_error($this->db)); 
	 }else{return false;}
}
// Update Displayed Product Price
public function Dot_UpdateSeenProductPrice($post_id, $uid, $adsPerimpression)
{
     $post_id = mysqli_real_escape_string($this->db,  $post_id);
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $adsPerimpression = mysqli_real_escape_string($this->db, $adsPerimpression);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_display WHERE uid_fk = '$uid' AND ads_id_fk = '$post_id'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 $checkPostMarket = mysqli_query($this->db,"SELECT user_post_id, post_page_type FROM dot_user_posts WHERE user_post_id = '$post_id' AND post_page_type = 'market'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1 && mysqli_num_rows($checkPostMarket) == 1){ 
		 $creditUpdate = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_price = CASE WHEN (ads_price > $adsPerimpression) THEN ads_price - $adsPerimpression ELSE ads_price END  WHERE user_post_id='$post_id'") or die(mysqli_error($this->db));
		 $checkBoostPrice = mysqli_query($this->db,"SELECT ads_price FROM dot_user_posts WHERE user_post_id = '$post_id'") or die(mysqli_error($this->db));
		 $row = mysqli_fetch_array($checkBoostPrice, MYSQLI_ASSOC);  
	     if($row['ads_price'] < $adsPerimpression){
		     $boostStatus = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_status = '0'  WHERE user_post_id='$post_id'") or die(mysqli_error($this->db));
		 }
	 }
}
// Update Uniq Advertisement Status 
public function Dot_ProductBoostStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type IN('0','1')") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_status = '$adsStatus' WHERE user_post_id = '$thisAdsID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Update Boost Display Status
public function Dot_ProductBoostDisplayStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type IN('0','1')") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_display_type = '$adsStatus' WHERE user_post_id = '$thisAdsID'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Group List for Product
public function Dot_MarketProductGroupList($showingNumber, $productCategory)
{
    $showingNumber = mysqli_real_escape_string($this->db,$showingNumber);  
	$productCategory = mysqli_real_escape_string($this->db,$productCategory);
	
	 $productsSuggesionsQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.product_status = '0' AND P.ads_status = '0' AND P.product_category = '$productCategory' ORDER BY rand() LIMIT $showingNumber ") or die(mysqli_error($this->db));
		 //Store the result
	while($row=mysqli_fetch_array($productsSuggesionsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }   
}

// Suggested Products Widget
public function Dot_MarketCategoryProductResult($categoryNumber)
{
    $categoryNumber = mysqli_real_escape_string($this->db,$categoryNumber);   
	
	 $productsSuggesionsQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.product_status = '0' AND  P.product_category = '$categoryNumber' ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
		 //Store the result
	while($row=mysqli_fetch_array($productsSuggesionsQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }   
}
/*Get All User Profile Posts From Data*/
public function Dot_MoreProductCategoryPost($lastPostID, $categoryNumber) 
{
  /* More Button*/
  $moreProfilePostQuery="";
   
   if($lastPostID) {
	  //build up the query
	  $moreProfilePostQuery=" and P.user_post_id<'".$lastPostID."' ";
   }
	$data = null;
	$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.product_status = '0' AND  P.product_category = '$categoryNumber' $moreProfilePostQuery ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
} 
 

// Market Place Advertisement Slider
public function Dot_AdvertisementMarketPlaceSlider($category)
{
	$category = mysqli_real_escape_string($this->db, $category);
	$thisCategory = "WHERE ads_slider_status = '1'";
	$checkIDExist = $this->Dot_ProductCategorySecurity($category);
	if($checkIDExist){ 
	    $thisCategory = "WHERE ads_slider_category = '".$category."' AND ads_slider_status = '1' ";
    }
	$query = mysqli_query($this->db,"SELECT ads_slider_id,ads_slider_image,ads_slider_redirect_url,ads_slider_category,ads_slider_status FROM dot_market_ads_slider $thisCategory") or die(mysqli_error($this->db));
	//Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
		// Store the result into array
		return $data;
	 }   
}

 // Search User
public function Dot_ProductSearch($keys, $lastProductID){
	 $keys = mysqli_real_escape_string($this->db, $keys);
	 $lastProductID = mysqli_real_escape_string($this->db, $lastProductID);
	 mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
	 mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
	 /* More Button*/
	  $moreProfilePostQuery="";
	   
	   if($lastProductID) {
		  //build up the query
		  $moreProfilePostQuery=" and P.user_post_id<'".$lastProductID."' ";
	   }
		$data = null; 
	 $result = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P INNER JOIN dot_users U ON P.user_id_fk = U.user_id WHERE P.product_status = '0' AND P.post_type = 'p_product' AND P.post_page_type = 'market'  $moreProfilePostQuery AND  (LOWER(P.m_product_name) like '%$keys%') ORDER BY P.user_post_id DESC LIMIT " . $this->perpage) or die(mysqli_error($this->db));
	 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		   $data[]=$row;
	  }
	  if(!empty($data)) {
		// Store the result into array
	   return $data;
	  } 
}
/*All User Text Posts*/
public function Dot_AllUserProductManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id , P.post_created_time, P.user_id_fk , P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.post_type = 'p_product'  $morequery  ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
/*All User Text Posts*/
public function Dot_AllUserProductBoostedManagement($lastpostid)
{ 
    $lastpostid=mysqli_real_escape_string($this->db,$lastpostid);
	$morequery=""; 
    if($lastpostid) { 
	  $morequery=" AND P.user_post_id<'".$lastpostid."' ";
    } 
	$data = null;   
	$GetAllPostQuery = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id , P.post_created_time, P.user_id_fk , P.post_type,P.slug,P.post_page_type,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,P.ads_status,P.ads_price, P.ads_budget, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id AND P.post_type = 'p_product' AND P.ads_status = '1' $morequery  ORDER BY P.user_post_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($GetAllPostQuery)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
}
// Change Market Theme
public function Dot_ChangeMarketTheme($uid, $themeID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$themeID = mysqli_real_escape_string($this->db, $themeID);
	$checkThemePurchased = $this->Dot_CheckThemePurchased($uid, $themeID);
	$themeName = $this->Dot_GetMarketThemeName($themeID); 
	 if($checkThemePurchased){ 
	     $query = mysqli_query($this->db,"UPDATE dot_user_market SET market_theme = '$themeName' WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
		 if($query){return true;}else{return false;}
	}else{return false;} 
}
// Update Uniq Advertisement Status 
public function Dot_UpdateProductBoostStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_status = '$adsStatus' WHERE user_post_id = '$thisAdsID'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Delete Event Category
public function Dot_DeleteMarketCategory($uid,$categoryID, $categoryKey)
{
	   $uid = mysqli_real_escape_string($this->db, $uid);
	   $categoryID = mysqli_real_escape_string($this->db, $categoryID);
	   $categoryKey = mysqli_real_escape_string($this->db, $categoryKey);
       $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkCatIDExist = mysqli_query($this->db,"SELECT m_category_id FROM dot_market_categories WHERE m_category_id = '$categoryID'") or die(mysqli_error($this->db));
	   $checkLangKeyExist = mysqli_query($this->db,"SELECT lang_id FROM dot_languages WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkCatIDExist) == 1 && mysqli_num_rows($checkLangKeyExist) == 1){  
	        $deleteCategory = mysqli_query($this->db,"DELETE FROM `dot_market_categories` WHERE m_category_id = '$categoryID'") or die(mysqli_error($this->db)); 
		    $deleteLangKey = mysqli_query($this->db, "DELETE FROM `dot_languages` WHERE lang_id = '$categoryKey'") or die(mysqli_error($this->db));
			return true;
	  }else{
	     return false;
	  }
}
// Add New MarketPlace Slider
public function Dot_AddNewMarketAdsSlider($uid,$marketCategoryID,$sliderImage,$sliderURL)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $waterMarkName = mysqli_real_escape_string($this->db, $waterMarkName);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkWaterMarkExist = mysqli_query($this->db,"SELECT m_category_id FROM dot_market_categories WHERE m_category_id = '$marketCategoryID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkWaterMarkExist) == 0){ 
			mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
			mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
		   $saveWaterMark = mysqli_query($this->db,"INSERT INTO dot_market_ads_slider(ads_slider_image, ads_slider_redirect_url, ads_slider_category,ads_slider_status)VALUES('$sliderImage','$marketCategoryID','$sliderURL','1')") or die(mysqli_error($this->db));
		   $getUploadedWaterMark = mysqli_query($this->db,"SELECT ads_slider_id,ads_slider_image, ads_slider_redirect_url, ads_slider_category,ads_slider_status FROM dot_market_ads_slider WHERE ads_slider_category = '$marketCategoryID' ORDER BY ads_slider_id DESC LIMIT 1") or die(mysqli_error($this->db));
		   $result = mysqli_fetch_array($getUploadedWaterMark, MYSQLI_ASSOC);
	        return $result;
	   }else{
		    return false;  
		}
}
// Public Advertisement Sliders  
public function Dot_AdvertisementsSliderDisplay($lastAdsSID)
{
   $lastAdsSID=mysqli_real_escape_string($this->db,$lastAdsSID); 
   $moreSliderAds=""; 
    if($lastAdsSID) { 
	  $moreSliderAds="WHERE ads_slider_id <'".$lastAdsSID."' ";
    } 
	$data = null;   
	$Query = mysqli_query($this->db,"SELECT ads_slider_id,ads_slider_image, ads_slider_redirect_url, ads_slider_category,ads_slider_status  FROM dot_market_ads_slider  $moreSliderAds ORDER BY ads_slider_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	 //Store the result
    while($row=mysqli_fetch_array($Query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Update Uniq Advertisement Status 
public function Dot_UpdateSliderAdvertisementStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT ads_slider_id FROM dot_market_ads_slider WHERE ads_slider_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type IN('0','1')") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_market_ads_slider SET ads_slider_status = '$adsStatus' WHERE ads_slider_id = '$thisAdsID'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Delete WaterMark ID
public function Dot_DeleteSlidAd($uid, $deleteThisID)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $deleteThisID = mysqli_real_escape_string($this->db, $deleteThisID);
	   $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	   $checkWaterMarkExist = mysqli_query($this->db,"SELECT ads_slider_id FROM dot_market_ads_slider WHERE ads_slider_id = '$deleteThisID'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($checkWaterMarkExist) == 1){
		   $deleteWaterMark = mysqli_query($this->db,"DELETE FROM `dot_market_ads_slider` WHERE ads_slider_id = '$deleteThisID'") or die(mysqli_error($this->db));
		   return true;
	   }else{
		    return false;  
		}
}
// All Market Themes
public function Dot_AllMarketThemes()
{
	    $query = mysqli_query($this->db,"SELECT market_theme_id,market_theme_name,market_theme_status,market_theme_type,market_theme_price FROM dot_market_themes WHERE market_theme_id ORDER BY market_theme_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
		 //Store the result
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Update Uniq Advertisement Status 
public function Dot_UpdateMarketThemeStatus($uid, $thisAdsID,$adsStatus)
{
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $thisAdsID = mysqli_real_escape_string($this->db, $thisAdsID);
	   $adsStatus = mysqli_real_escape_string($this->db, $adsStatus);
	   $checkAdsIDExist = mysqli_query($this->db,"SELECT market_theme_id FROM dot_market_themes WHERE market_theme_id = '$thisAdsID'") or die(mysqli_error($this->db));
	   $checkUserAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type IN('0','1')") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkAdsIDExist) > 0 && mysqli_num_rows($checkUserAdmin) > 0){
	         $updateAdsStatus = mysqli_query($this->db,"UPDATE dot_market_themes SET market_theme_status = '$adsStatus' WHERE market_theme_id = '$thisAdsID'") or die(mysqli_error($this->db));
			 return true;
	   }
}
// Edit Font
public function Dot_EditMarketTheme($uid, $themeType, $themeName, $themePrce, $themeID)
{
	$uid = mysqli_real_escape_string($this->db,$uid); 
	$themeID = mysqli_real_escape_string($this->db,$themeID);  
	$checkThemeExist = mysqli_query($this->db,"SELECT market_theme_id FROM dot_market_themes WHERE market_theme_id = '$themeID'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkUserisAdmin) == 1 && mysqli_num_rows($checkThemeExist) == 1) { 
	     if(empty($themePrce)){
				mysqli_query($this->db,"UPDATE dot_market_themes SET market_theme_price = NULL WHERE  market_theme_id = '$themeID'") or die(mysqli_error($this->db));
			}else{
				mysqli_query($this->db,"UPDATE dot_market_themes SET market_theme_price = '$themePrce' WHERE  market_theme_id = '$themeID'") or die(mysqli_error($this->db));
			}
	     $UpdateImportURL = mysqli_query($this->db,"UPDATE dot_market_themes SET market_theme_name = '$themeName', market_theme_type = '$themeType' WHERE  market_theme_id = '$themeID'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Add new Market Theme
public function Dot_AddNewMarketTheme($uid, $themeName, $themeType,$themePriec,$martem)
{
    $uid = mysqli_real_escape_string($this->db, $uid); 
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisAdmin) == 1) { 
	    $saveWaterMark = mysqli_query($this->db,"INSERT INTO dot_market_themes(market_theme_name, market_theme_status, market_theme_type,market_theme_price,theme_category)VALUES('$themeName','1','$themeType','$themePriec','$martem')") or die(mysqli_error($this->db));
	    if($saveWaterMark){return true;}else{return false;}
	}else{return false;}
	
}
// Delete Font
public function Dot_MarketTheme($uid, $deleteFontID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$deleteFontID = mysqli_real_escape_string($this->db,$deleteFontID);
	$checkColorExist = mysqli_query($this->db,"SELECT market_theme_id FROM dot_market_themes WHERE market_theme_id = '$deleteFontID'") or die(mysqli_error($this->db));
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
    if(mysqli_num_rows($checkColorExist) == 1 && mysqli_num_rows($checkUserisAdmin) == 1) { 
	    $deleteOldSearch = mysqli_query($this->db,"DELETE FROM `dot_market_themes` WHERE market_theme_id = '$deleteFontID'") or die(mysqli_error($this->db));
		return true;
	}else{
	    return false;
	}
}
// Product Details
public function Dot_GetProductDetailsByID($prodID)
{ 
	$prodID=mysqli_real_escape_string($this->db,$prodID);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checProductExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$prodID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checProductExist) == 1){ 
		  $getDetails = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.comment_status,P.who_can_see_post,P.slug,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status, U.user_name, U.user_fullname,U.verified_user FROM dot_user_posts P, dot_users U WHERE P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_post_id = '$prodID'") or die(mysqli_error($this->db));
	     $data=mysqli_fetch_array($getDetails,MYSQLI_ASSOC);
	      return $data;
	}else{
	   return false;
	} 
}
public function Dot_AllLann()
{
$query = mysqli_query($this->db,"SELECT lang_id, lang_key,english FROM dot_languages") or die(mysqli_error($this->db));
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
public function Dot_restyle_text($UserPostCount){ 
    $UserPostCount = number_format($UserPostCount);
    $input_count = substr_count($UserPostCount, ',');
    if($input_count != '0'){
        if($input_count == '2'){
            return substr($UserPostCount, 0, -8).'mil';
        } else if($input_count == '3'){
            return substr($UserPostCount, 0,  -12).'bil';
		}else if($input_count == '4'){
		    return substr($UserPostCount, 0, -16).' quadrillion';
		}else if($input_count == '5'){
		    return substr($UserPostCount, 0, -20).' quintillion';
		}else if($input_count == '6'){
		    return substr($UserPostCount, 0, -24).' sekstilyo';
		}else {
            return $UserPostCount;
        }
    } else {
        return $UserPostCount;
    }
}
public function strip_tags_content($string) { 
    // ----- remove HTML TAGs ----- 
    $string = preg_replace ('/<[^>]*>/', ' ', $string); 
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);
    $string = str_replace("\n", ' ', $string);
    $string = str_replace("\t", ' ', $string);
    // ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    return $string;
}
// Market Place Categories List
public function Dot_MarketPlaceThemeCategories()
{
   $mt = mysqli_query($this->db, "SELECT market_theme_category_id,market_theme_category_key FROM dot_market_theme_categories") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($mt, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// Check Activation Code Active
public function Dot_CheckActivationCodeActive($uid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$checkActivationCode = mysqli_query($this->db,"SELECT email_verification FROM dot_users WHERE user_id = '$uid'") or die($mysqli_error($this->db));
	if(mysqli_num_rows($checkActivationCode) == 1){
	    return true;
	}else{return false;}
}
// OneSignal Send Push Notification
public function Dot_OneSignalPushNotificationSend($msg_body, $msg_title,$url,$device_id,$oneSignalApi,$oneSignalRestApi) {
    $content = array(
      "en" => $msg_body
      );
     $heading = array(
      "en" => $msg_title
      ); 
    $include_player_id = array(
        $device_id
      );  

    $msg_img = '';
    $fields = array(
      'app_id' => $oneSignalApi,
      'contents' => $content,
      'headings' => $heading,
      'data' => array("foo" => "bar"),
      'small_icon'=> "ic_launcher",
      'large_icon'=> "ic_launcher",
      'image'=> $msg_img,
      'include_player_ids' => $include_player_id, 
      'url' => $url
      );
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                           'Authorization: Basic '.$oneSignalRestApi.''));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
//Update User OneSignal NotificatiionKey
public function Dot_OneSignalDeviceKey($uid, $userDeviceOneSignalKey)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $userDeviceOneSignalKey=mysqli_real_escape_string($this->db,$userDeviceOneSignalKey);
    $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET device_key = '$userDeviceOneSignalKey' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if($updateNotificationUser) {
	  return true;
	}else{return false;}
} 
// Remove OneSignal Key
public function Dot_OneSignalDeviceKeyRemove($uid)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
    $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET device_key = NULL WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	if($updateNotificationUser) {
	  return true;
	}else{return false;}
}
// Get Last Payment Post ID
public function Dot_LastPaymentPostID($uid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$time = time();
	$getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'donate' AND product_owner_id IS NULL AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($getLatestPayment) == 1){
		 $getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'donate' AND product_owner_id IS NULL AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
		 
		 $dataLastPayment=mysqli_fetch_array($getLatestPayment,MYSQLI_ASSOC);
		 $postID = $dataLastPayment['payment_post_id'];
		 $postOwnerId = $dataLastPayment['customer_user_id'];
	     $getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id and P.user_post_id='$postID' AND P.user_id_fk = '$postOwnerId'") or die(mysqli_error($this->db));
		 while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
			// Store the result into array
			$data[]=$row;
		 }
		 if(!empty($data)) {
			// Store the result into array
			return $data;
		 }  
	}
}
// Check Payment is Pro
public function Dot_CheckPaymentIsProduct($puid)
{
    $puid = mysqli_real_escape_string($this->db, $puid);
	$getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id,payment_type FROM dot_payments WHERE payment_user_id = '$puid' AND payment_type='pb' AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$dataLastPayment=mysqli_fetch_array($getLatestPayment,MYSQLI_ASSOC);
	if($dataLastPayment){return $dataLastPayment;	 }else{return false;}
}
// Get Last Payment Post ID
public function Dot_LastPaymentProductID($uid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	$time = time();
	$getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id,product_owner_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' AND product_owner_id IS NOT NULL AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($getLatestPayment) == 1){
		 $getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id,product_owner_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' AND product_owner_id IS NOT NULL AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
		 
		 $dataLastPayment=mysqli_fetch_array($getLatestPayment,MYSQLI_ASSOC);
		 $postID = $dataLastPayment['payment_post_id'];
		 $postOwnerId = $dataLastPayment['product_owner_id'];
	     $getData = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id and P.user_post_id='$postID' AND P.user_id_fk = '$postOwnerId'") or die(mysqli_error($this->db));
		 while($row=mysqli_fetch_array($getData, MYSQLI_ASSOC)) {
			// Store the result into array
			$data[]=$row;
		 }
		 if(!empty($data)) {
			// Store the result into array
			return $data;
		 }  
	}
}
// Update IyziCo Keys
public function Dot_SaveIyziCoKeys($uid, $iyzicoTestingSecretKey, $iyzicoTestingApiKey, $iyzicoLiveApiKey, $iyzicoLiveSecretKey)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$iyzicoTestingSecretKey=mysqli_real_escape_string($this->db,$iyzicoTestingSecretKey);
	$iyzicoTestingApiKey=mysqli_real_escape_string($this->db,$iyzicoTestingApiKey);
	$iyzicoLiveApiKey=mysqli_real_escape_string($this->db,$iyzicoLiveApiKey);
	$iyzicoLiveSecretKey=mysqli_real_escape_string($this->db,$iyzicoLiveSecretKey);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET iyzico_testing_secret_key = '$iyzicoTestingSecretKey' , iyzico_testing_api_key = '$iyzicoTestingApiKey' , iyzico_live_api_key = '$iyzicoLiveApiKey' , iyzico_live_secret_key = '$iyzicoLiveSecretKey'  WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update BitPay Infos
public function Dot_UpdateBitPayInfo($uid, $bitpayEmail, $bitpayPass, $bitpayPairing, $bitpayLabel)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$bitpayEmail=mysqli_real_escape_string($this->db,$bitpayEmail);
	$bitpayPass=mysqli_real_escape_string($this->db,$bitpayPass);
	$bitpayPairing=mysqli_real_escape_string($this->db,$bitpayPairing);
	$bitpayLabel=mysqli_real_escape_string($this->db,$bitpayLabel);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET bitpay_notification_email = '$bitpayEmail' , bitpay_password = '$bitpayPass' , bitpay_pairing_code = '$bitpayPairing' , bitpay_label = '$bitpayLabel'  WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update AuthorizeNet Infos
public function Dot_UpdateAuthorizeNetInfo($uid, $authorizeTestApiID, $authorizeTestTransactionKey, $authorizeLiveApiID, $authorizeLiveTransactionKey)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$authorizeTestApiID=mysqli_real_escape_string($this->db,$authorizeTestApiID);
	$authorizeTestTransactionKey=mysqli_real_escape_string($this->db,$authorizeTestTransactionKey);
	$authorizeLiveApiID=mysqli_real_escape_string($this->db,$authorizeLiveApiID);
	$authorizeLiveTransactionKey=mysqli_real_escape_string($this->db,$authorizeLiveTransactionKey);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){ 
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET authorizenet_test_ap_id = '$authorizeTestApiID' , authorizenet_test_transaction_key = '$authorizeTestTransactionKey' , authorizenet_live_api_id = '$authorizeLiveApiID' , authorizenet_live_transaction_key = '$authorizeLiveTransactionKey' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update PayStack Payment Infos
public function Dot_UpdatePayStackInfo($uid, $payStackSecret_Key, $payStackPublic_Key, $payStackLive_Key, $payStackLivePublic_Key)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$payStackSecret_Key=mysqli_real_escape_string($this->db,$payStackSecret_Key);
	$payStackPublic_Key=mysqli_real_escape_string($this->db,$payStackPublic_Key);
	$payStackLive_Key=mysqli_real_escape_string($this->db,$payStackLive_Key);
	$payStackLivePublic_Key=mysqli_real_escape_string($this->db,$payStackLivePublic_Key);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){ 
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET paystack_testing_secret_key = '$payStackSecret_Key' , paystack_testing_public_key = '$payStackPublic_Key' , paystack_live_secret_key = '$payStackLive_Key' , pay_stack_liive_public_key = '$payStackLivePublic_Key' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Striipe Payment Infos
public function Dot_UpdateStripeInfo($uid, $stripeTestSecret_Key, $stripeTestPublic_Key, $striipeLiveSecret_Key, $stripeLivePublic_Key)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$stripeTestSecret_Key=mysqli_real_escape_string($this->db,$stripeTestSecret_Key);
	$stripeTestPublic_Key=mysqli_real_escape_string($this->db,$stripeTestPublic_Key);
	$striipeLiveSecret_Key=mysqli_real_escape_string($this->db,$striipeLiveSecret_Key);
	$stripeLivePublic_Key=mysqli_real_escape_string($this->db,$stripeLivePublic_Key);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){ 
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET stripe_test_secret_key = '$stripeTestSecret_Key' ,stripe_test_public_key = '$stripeTestPublic_Key' ,stripe_live_secret_key = '$striipeLiveSecret_Key' ,stripe_live_public_key = '$stripeLivePublic_Key'  WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Striipe Payment Infos
public function Dot_UpdateRazorPayInfo($uid, $razorPayTest_ID, $razorPayTest_Secret, $razorPayLive_Key, $rarzorPayLive_secret)
{
    $uid=mysqli_real_escape_string($this->db,$uid);
	$razorPayTest_ID=mysqli_real_escape_string($this->db,$razorPayTest_ID);
	$razorPayTest_Secret =mysqli_real_escape_string($this->db,$razorPayTest_Secret);
	$razorPayLive_Key=mysqli_real_escape_string($this->db,$razorPayLive_Key);
	$rarzorPayLive_secret=mysqli_real_escape_string($this->db,$rarzorPayLive_secret);
	
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){ 
	      $updateap = mysqli_query($this->db,"UPDATE dot_configuration SET razorpay_testing_key_id = '$razorPayTest_ID' , razorpay_testing_secret_key = '$razorPayTest_Secret' , razorpay_live_key_id = '$razorPayLive_Key' , razorpay_live_secret_key = '$rarzorPayLive_secret'   WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
} 
/*Show Trending HashTags*/ 
public function Dot_TrendingDonatedFive($uid) 
{ 
    $uid = mysqli_real_escape_string($this->db, $uid);  
	$query = mysqli_query($this->db,"SELECT M.payment_post_id, count(M.payment_post_id) AS cnt , P.post_title_text,P.slug FROM dot_payments M INNER JOIN dot_user_posts P ON P.user_post_id = M.payment_post_id WHERE payment_type = 'donate' AND M.customer_user_id = '$uid' AND FROM_UNIXTIME(M.payment_time) > CURRENT_DATE AND FROM_UNIXTIME(M.payment_time) < (CURRENT_DATE + INTERVAL 1 WEEK ) GROUP BY M.payment_post_id ORDER BY cnt DESC LIMIT 5") or die(mysqli_error($this->db)); 
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
/*Show Trending HashTags*/ 
public function Dot_TrendingDonatedFiveMonth($uid) 
{ 
    $uid = mysqli_real_escape_string($this->db, $uid);  
	 $query = mysqli_query($this->db,"SELECT M.payment_post_id, count(M.payment_post_id) AS cnt , P.post_title_text,P.slug FROM dot_payments M INNER JOIN dot_user_posts P ON P.user_post_id = M.payment_post_id WHERE payment_type = 'donate' AND M.customer_user_id = '$uid' AND MONTH(FROM_UNIXTIME(M.payment_time)) = MONTH(CURRENT_DATE())  AND YEAR(FROM_UNIXTIME(M.payment_time)) = YEAR(CURRENT_DATE()) GROUP BY M.payment_post_id ORDER BY cnt DESC LIMIT 5") or die(mysqli_error($this->db)); 
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 } 
}
// sum of earnings by currency
// Dolar
public function Dot_MarketSumOfEarningsByCurrencyDolar($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'pb' AND payment_option IN ('bitpay','authorize-net','stripe','paypal') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
   if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;} 
}
// Turkish Liras
public function Dot_MarketSumOfEarningsByCurrencyTL($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'pb' AND payment_option IN ('iyzico') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Turkish Liras
public function Dot_MarketSumOfEarningsByCurrencyNGN($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'pb' AND payment_option IN ('paystack') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Turkish Liras
public function Dot_MarketSumOfEarningsByCurrencyINR($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'pb' AND payment_option IN ('razorpay') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Dolar
public function Dot_SumOfEarningsByCurrencyDolar($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('bitpay','authorize-net','stripe','paypal') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
   if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;} 
}
// Turkish Liras
public function Dot_SumOfEarningsByCurrencyTL($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('iyzico') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Turkish Liras
public function Dot_SumOfEarningsByCurrencyNGN($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('paystack') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Turkish Liras
public function Dot_SumOfEarningsByCurrencyINR($postID){
   $postID = mysqli_real_escape_string($this->db,$postID);
   $query = mysqli_query($this->db,"SELECT payment_post_id, SUM(user_earning) AS daily_total FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('razorpay') AND payment_time = '$postID'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
	if($row['daily_total']){
	   return $row['daily_total'];
   }else {return 0;}
}
// Total Sales This Month
public function Dot_TotalSalesThisMonth($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postVoteCount FROM dot_payments WHERE payment_type = 'donate' AND payment_status = '1' AND payment_user_id = '$uid' AND FROM_UNIXTIME(payment_time) > DATE_SUB(NOW(), INTERVAL 1 MONTH)") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postVoteCount'];   
}
// Total Sales This Month
public function Dot_MarketTotalSalesThisMonth($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postVoteCount FROM dot_payments WHERE payment_type = 'pb' AND payment_status = '1' AND product_owner_id = '$uid' AND FROM_UNIXTIME(payment_time) > DATE_SUB(NOW(), INTERVAL 1 MONTH)") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postVoteCount'];   
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthDolar($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningDolar FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('bitpay','authorize-net','stripe','paypal') AND payment_status = '1' AND customer_user_id = '$uid' AND MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURRENT_DATE())  AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURRENT_DATE())") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['earningDolar']){
	     return $row['earningDolar'];   
	  }else{
	     return 0;
	  } 
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthTL($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningtl FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('iyzico') AND payment_status = '1' AND customer_user_id = '$uid' AND MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURRENT_DATE())  AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURRENT_DATE())") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['earningtl']){
	     return $row['earningtl'];   
	  }else{
	     return 0;
	  }    
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthNGN($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningngn FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('paystack') AND payment_status = '1' AND customer_user_id = '$uid' AND MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURRENT_DATE())  AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURRENT_DATE())") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);   
	  if($row['earningngn']){
	     return $row['earningngn'];   
	  }else{
	     return 0;
	  } 
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthINR($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earninginr FROM dot_payments WHERE payment_type = 'donate' AND payment_option IN ('razorpay') AND payment_status = '1' AND customer_user_id = '$uid' AND MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURRENT_DATE())  AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURRENT_DATE())") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['earninginr']){
	     return $row['earninginr'];   
	  }else{
	     return 0;
	  }  
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthDolarSum($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningDolar FROM dot_payments WHERE payment_type IN ('donate','pb') AND payment_option IN ('bitpay','authorize-net','stripe','paypal') AND payment_status = '1' AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND calculated = '0'") or die(mysqli_error($this->db));
   //$updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_user_id = '$uid' AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
   $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
   if(mysqli_num_rows($CountLike) > 0){
	   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_type IN ('donate','pb') AND payment_option IN ('bitpay','authorize-net','stripe','paypal') AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
   }
	  if($row['earningDolar']){
	     return $row['earningDolar'];   
	  }else{
	     return 0;
	  } 
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthTLSum($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningtl FROM dot_payments WHERE payment_type IN ('donate','pb') AND payment_option IN ('iyzico') AND payment_status = '1' AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND calculated = '0'") or die(mysqli_error($this->db));
   //$updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_user_id = '$uid' AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	if(mysqli_num_rows($CountLike) > 0){
	   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_type  IN ('donate','pb') AND payment_option IN ('iyzico') AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
   }  
	  if($row['earningtl']){
	     return $row['earningtl'];   
	  }else{
	     return 0;
	  }    
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthNGNSum($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earningngn FROM dot_payments WHERE payment_type IN ('donate','pb') AND payment_option IN ('paystack') AND payment_status = '1' AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND calculated = '0'") or die(mysqli_error($this->db));
   //$updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_user_id = '$uid' AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if(mysqli_num_rows($CountLike) > 0){
	   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_type IN ('donate','pb') AND payment_option IN ('paystack') AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
      }   
	  if($row['earningngn']){
	     return $row['earningngn'];   
	  }else{
	     return 0;
	  } 
}
// Total Sales This Month
public function Dot_TotalEarningThisMonthINRSum($uid){
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $CountLike = mysqli_query($this->db,"SELECT SUM(user_earning) AS earninginr FROM dot_payments WHERE payment_type IN ('donate','pb') AND payment_option IN ('razorpay') AND payment_status = '1' AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND calculated = '0'") or die(mysqli_error($this->db));
   //$updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_user_id = '$uid' AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);
	  if(mysqli_num_rows($CountLike) > 0){
	   $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_payments SET calculated = '1' WHERE payment_type IN ('donate','pb') AND payment_option IN ('razorpay') AND (customer_user_id = '$uid' OR product_owner_id = '$uid') AND payment_status = '1' AND calculated = '0'") or die(mysqli_error($this->db));
      }   
	  if($row['earninginr']){
	     return $row['earninginr'];   
	  }else{
	     return 0;
	  }  
}
// Calculate Earning
public function Dot_UpdateTotalEarning($uid,$totalEearning)
{
       $uid = mysqli_real_escape_string($this->db,$uid); 
	   $totalEearning = mysqli_real_escape_string($this->db,$totalEearning); 
	   $time = time();
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
	         $updateNotificationUser = mysqli_query($this->db,"UPDATE dot_users SET total_earnings = total_earnings + $totalEearning , last_earn_calculate = '$time' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
			 $totalE = mysqli_query($this->db,"SELECT total_earnings FROM dot_users WHERE  user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	         $row = mysqli_fetch_array($totalE, MYSQLI_ASSOC);  
	         return $row['total_earnings'];
	   }else{
	        return false;
	   }
 }
// Witdrawal List
public function Dot_UserWithDrawals($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
		      $query = mysqli_query($this->db,"SELECT withdraw_id,withdraw_uid_fk,withdraw_paypal_email, withdraw_amounth, withdraw_status, withdraw_time,withdrawal_iban_number,withdrawal_type FROM dot_withdrawals WHERE withdraw_uid_fk = '$uid' ORDER BY withdraw_id DESC LIMIT 30") or die(mysqli_error($this->db));
			 while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					// Store the result into array
					$data[]=$row;
				 }
				 if(!empty($data)) {
					// Store the result into array
					return $data;
				 }  
	   }
}
// Create Withdrawal
public function Dot_InsertNewWithdrawalPayPal($uid, $amount, $paypalEmail)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$amount = mysqli_real_escape_string($this->db,$amount);
	$paypalEmail= mysqli_real_escape_string($this->db,$paypalEmail);
	$time = time();  
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
		      $InsertWithdraw  = mysqli_query($this->db,"INSERT INTO dot_withdrawals (withdraw_uid_fk,withdraw_paypal_email, withdraw_amounth, withdraw_time,withdrawal_type)VALUES('$uid','$paypalEmail','$amount','$time','paypal')") or die(mysqli_error($this->db));
			  if($InsertWithdraw){
				  mysqli_query($this->db,"UPDATE dot_users SET total_earnings = total_earnings - $amount WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
			      return true;
			  }else{return false;}
	   }else{return false;}
}
// Create Withdrawal
public function Dot_InsertNewWithdrawalIBAN($uid, $payAmount, $IBANNumber)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$payAmount = mysqli_real_escape_string($this->db,$payAmount);
	$IBANNumber= mysqli_real_escape_string($this->db,$IBANNumber);
	$time = time();  
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
		      $InsertWithdraw  = mysqli_query($this->db,"INSERT INTO dot_withdrawals (withdraw_uid_fk,withdrawal_iban_number, withdraw_amounth, withdraw_time,withdrawal_type)VALUES('$uid','$IBANNumber','$payAmount','$time','IBAN')") or die(mysqli_error($this->db));
			  if($InsertWithdraw){
			      mysqli_query($this->db,"UPDATE dot_users SET total_earnings = total_earnings - $payAmount WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
				  return true;
			  }else{return false;}
	   }else{return false;}
}
// User Earnings Remainings After Withdrawal
public function Dot_RemaininMoney($uid)
{
	 $uid = mysqli_real_escape_string($this->db,$uid);
	 $query = mysqli_query($this->db,"SELECT total_earnings FROM `dot_users` WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
		$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		if($data['total_earnings']) {
			$name=$data['total_earnings'];
			return  $name;
		}
}
// User Payout List
public function Dot_UserPayoutList($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$query = mysqli_query($this->db,"SELECT withdraw_id, withdraw_paypal_email, withdraw_amounth , withdraw_status , withdraw_time , withdrawal_iban_number , withdrawal_type  FROM dot_withdrawals WHERE withdraw_uid_fk = '$uid' AND withdraw_status = '1' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
		  $data[]=$row;
	   }
	   if(!empty($data)) {
		  // Store the result into array
		  return $data;
	   }  
}
// User Payout List
public function Dot_CurrentWithdrawal($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$query = mysqli_query($this->db,"SELECT withdraw_id, withdraw_paypal_email, withdraw_amounth , withdraw_status , withdraw_time , withdrawal_iban_number , withdrawal_type  FROM dot_withdrawals WHERE withdraw_uid_fk = '$uid' AND withdraw_status = '0' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
		  $data[]=$row;
	   }
	   if(!empty($data)) {
		  // Store the result into array
		  return $data;
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
// Update Page Codes
public function Dot_UpdatePageCodes($uid, $pageCode,$pageType)
{
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $pageCode = mysqli_real_escape_string($this->db,$pageCode);
	 $pageType = mysqli_real_escape_string($this->db,$pageType);
	 $time = time();
	 $query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	     mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($query) == 1){
	     mysqli_query($this->db,"UPDATE dot_static_pages SET static_page_code = '$pageCode' , static_page_time = '$time' WHERE static_page_title = '$pageType'") or die(mysqli_error($this->db));
		 return true;
	 }else{
	    return  false;	
	 }
} 
// Add Point
public function Dot_AddPoint($uid, $pointType, $pointPost,$votePostID)
{
     $uid = mysqli_real_escape_string($this->db,$uid);
	 $pointType = mysqli_real_escape_string($this->db,$pointType);
	 $votePostID = mysqli_real_escape_string($this->db,$votePostID);
	 $pointPost = mysqli_real_escape_string($this->db,$pointPost);
	 $time = time();
	 $query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	 $checkPostID = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$votePostID'") or die(mysqli_error($this->db));
	 $checkVotedBefore = mysqli_query($this->db,"SELECT poninted_post_id,poninted_user_id FROM dot_user_point_earnings WHERE poninted_post_id = '$votePostID' AND poninted_user_id = '$uid' AND pointed_type = '$pointType'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkPostID) == 1 && mysqli_num_rows($checkVotedBefore) == '0'){
		     $InsertPoint  = mysqli_query($this->db,"INSERT INTO dot_user_point_earnings (poninted_post_id,poninted_user_id, pointed_time, pointed_type,calculated_point,point)VALUES('$votePostID','$uid','$time','$pointType','0','$pointPost')") or die(mysqli_error($this->db));
			 return true;
	 }else{return false;}
}
// Remove Point
public function Dot_RemovePoint($uid, $pointType, $pointPost,$votePostID)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	 $pointType = mysqli_real_escape_string($this->db,$pointType);
	 $votePostID = mysqli_real_escape_string($this->db,$votePostID);
	 $pointPost = mysqli_real_escape_string($this->db,$pointPost);
	 $time = time();
	 $query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	 $checkPostID = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$votePostID'") or die(mysqli_error($this->db));
	 $checkVotedBefore = mysqli_query($this->db,"SELECT poninted_post_id,poninted_user_id FROM dot_user_point_earnings WHERE poninted_post_id = '$votePostID' AND poninted_user_id = '$uid' AND pointed_type = '$pointType'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkPostID) == 1 && mysqli_num_rows($checkVotedBefore) == '1'){
		     mysqli_query($this->db,"DELETE FROM dot_user_point_earnings WHERE poninted_post_id='$votePostID' AND poninted_user_id='$uid' AND pointed_type = '$pointType'") or die(mysqli_error($this->db));
			 return true;
	 }else{return false;}
}
// Get Post ID from USER COMMENT
public function Dot_UserPostIDGetFromUserComment($uid, $commentID)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $commentID = mysqli_real_escape_string($this->db, $commentID); 
   $query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
   $comment = mysqli_query($this->db,"SELECT post_id_fk,uid_fk FROM dot_post_comments WHERE comment_id = '$commentID' AND uid_fk = '$uid'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($query) == 1 && mysqli_num_rows($comment) == 1){
	     $queryID=mysqli_query($this->db,"SELECT post_id_fk FROM dot_post_comments WHERE comment_id = '$commentID' AND uid_fk = '$uid'");
			if(mysqli_num_rows($queryID)==1) {
			//This is if user id valid is ok then return user id
			$row=mysqli_fetch_array($queryID,MYSQLI_ASSOC);
			return $row['post_id_fk'];
			} else {
			 return false;
			}
   }else{return false;}
}
// Calculate New Points Like
public function Dot_CalculateNewPointsLike($uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
     $CountLike = mysqli_query($this->db,"SELECT SUM(point) AS totalPointLike FROM dot_user_point_earnings WHERE poninted_user_id = '$uid' AND calculated_point = '0' AND pointed_type = 'like'") or die(mysqli_error($this->db)); 
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['totalPointLike']){
		   $earningTotal = $row['totalPointLike']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Calculate New Points Comment
public function Dot_CalculateNewPointsComment($uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
     $CountLike = mysqli_query($this->db,"SELECT SUM(point) AS totalPointComment FROM dot_user_point_earnings WHERE poninted_user_id = '$uid' AND calculated_point = '0' AND pointed_type = 'comment'") or die(mysqli_error($this->db)); 
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
     if($row['totalPointComment']){
		   $earningTotal = $row['totalPointComment']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Calculate New Points Post
public function Dot_CalculateNewPointsPost($uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
     $CountLike = mysqli_query($this->db,"SELECT SUM(point) AS totalPointPost FROM dot_user_point_earnings WHERE poninted_user_id = '$uid' AND calculated_point = '0' AND pointed_type = 'post'") or die(mysqli_error($this->db)); 
	 $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);   
	  if($row['totalPointPost']){
		   $earningTotal = $row['totalPointPost']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Calculate New Points Comment
public function Dot_CalculateNewPointsStoriesPost($uid)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
     $CountLike = mysqli_query($this->db,"SELECT SUM(point) AS totalPointStory FROM dot_user_point_earnings WHERE poninted_user_id = '$uid' AND calculated_point = '0' AND pointed_type = 'story'") or die(mysqli_error($this->db)); 
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);   
	  if($row['totalPointStory']){
		   $earningTotal = $row['totalPointStory']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Calculate Point To Dollar
public function Dot_CalculatePointToDolar($uid, $pointDolar)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$pointDolar = mysqli_real_escape_string($this->db, $pointDolar);
	$query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1){
	     mysqli_query($this->db,"UPDATE dot_users SET point_earning = point_earning + $pointDolar WHERE user_id = '$uid'") or die(mysqli_error($this->db));
		 mysqli_query($this->db,"UPDATE dot_user_point_earnings SET calculated_point = '1' WHERE poninted_user_id = '$uid'") or die(mysqli_error($this->db));
		 $querySumPointDolar = mysqli_query($this->db,"SELECT point_earning FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
		 $data=mysqli_fetch_array($querySumPointDolar,MYSQLI_ASSOC);
			if($data['point_earning']) {
				$dlr=$data['point_earning'];
				return  $dlr;
			} 
	 }else{
	    return 0;	
	 } 
}
// Transfer Your Dolar to Balance
public function Dot_TransferDolarToBalance($uid, $dataPontEarnings)
{
        $uid = mysqli_real_escape_string($this->db, $uid);
		$dataPontEarnings = mysqli_real_escape_string($this->db, $dataPontEarnings);
		$query = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
		$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
		if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkUserExist) == '1'){ 
			   mysqli_query($this->db,"UPDATE dot_users SET total_earnings = total_earnings - $dataPontEarnings WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
			   mysqli_query($this->db,"UPDATE dot_users SET point_earning = '0' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
			   $querySumPointDolar = mysqli_query($this->db,"SELECT total_earnings FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
		       $data=mysqli_fetch_array($querySumPointDolar,MYSQLI_ASSOC);
			   if($data['total_earnings']) {
				$dlr=$data['total_earnings'];
				return  $dlr;
			} 
		}else{
	        return 0;	
	    } 
}
/*Get All User Profile Posts From Data*/
public function Dot_GetTextPostsForPage($uid,$thePageType) 
{ 
    mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
	$query = mysqli_query($this->db,"SELECT DISTINCT 
	P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
	P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
	P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
	P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
	P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
	P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
	P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
	P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
	P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , 
	U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_donate_message   
	FROM  dot_friends F, dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U FORCE INDEX (ix_status_istatus)
    ON
	P.user_id_fk = U.user_id AND 
     U.user_status='1' 
	WHERE P.user_id_fk='$uid' AND post_type='$thePageType' ") or die(mysqli_error($this->db));
	 //Store the result
	while($row=mysqli_fetch_array($query)) {
		// Store the result into array
		$data[]=$row;
	 }
	 if(!empty($data)) {
	    // Store the result into array
		return $data;
	 }  
	   }
}
// All Profile Story Posts
public function Dot_SotriesPostsAlla($uid)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
   $getStories = mysqli_query($this->db,"SELECT DISTINCT S.s_id, S.uid_fk, S.stories_img, S.created , U.user_name, U.user_fullname FROM dot_user_stories S , dot_users U WHERE S.uid_fk = U.user_id AND S.uid_fk = '$uid'") or die(mysqli_error($this->db));
   while($row=mysqli_fetch_array($getStories, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
	   }
}
/*All Followers For User Profile*/
public function Dot_AllUserFollowersPage($uid) 
{
   $uid = mysqli_real_escape_string($this->db, $uid);
    $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_friends F  WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_two='$uid' AND F.role='flwr' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
	   }
}
/*All Friends For User Profile*/
public function Dot_AllUserFriendsPage($uid) 
{
   $uid = mysqli_real_escape_string($this->db, $uid); 
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_friends F  WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_one='$uid' AND F.role='flwr' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
	   }
}
// Delete User Account
public function Dot_DeleteMyAccount($uid)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1'){
              mysqli_query($this->db,"DELETE FROM dot_user_posts WHERE user_id_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_click WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_display WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_ads_note WHERE note_uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_audios WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_avatars WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_backgrounds WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_chat WHERE from_user_id='$uid' OR to_user_id='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_comment_like WHERE liked_uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_files WHERE user_id_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_images WHERE user_id_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_conversation_uploaded_videos WHERE user_id_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_events WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_event_invites WHERE inviter_user_id='$uid' OR invited_user_id='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_favourite_list WHERE fav_uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_friends WHERE user_one='$uid' OR user_two='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_mentions WHERE m_uid_fk='$uid' OR m_user_owner='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_notifications WHERE not_uid_fk='$uid' OR not_post_owner_id_fk = '$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_comments WHERE uid_fk='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_like WHERE liked_uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_post_unlike WHERE unliked_uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_product_seen WHERE seen_uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_report_post WHERE reporter_user_id_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_session WHERE userid ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_story_viewer WHERE s_viewer_user_id ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_supponsored_ads WHERE ads_created_uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_supponsored_ads_img WHERE user_id_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_users WHERE user_id ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_interests WHERE interested_user_id_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_market WHERE market_place_owner_id ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_market_themes WHERE uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_point_earnings WHERE poninted_user_id ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_search_events WHERE searcher_id ='$uid' OR  searched_id = '$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_stories WHERE uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_user_upload_images WHERE user_id_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_videos WHERE uid_fk ='$uid'") or die(mysqli_error($this->db));
			  mysqli_query($this->db,"DELETE FROM dot_withdrawals WHERE withdraw_uid_fk ='$uid'") or die(mysqli_error($this->db));
			  return true;
	   }else{return false;} 
}
// Earnings Ads
public function Dot_TotalCreditEarnings()
{
    $totalAdsEarnings = mysqli_query($this->db,"SELECT SUM(amonth) AS totalCreditStory FROM dot_transactions WHERE complete = '1' AND product_boost_id IS NULL") or die(mysqli_error($this->db));  
	  $row = mysqli_fetch_array($totalAdsEarnings, MYSQLI_ASSOC);   
	  if($row['totalCreditStory']){
		   $earningTotal = $row['totalCreditStory']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Earnings Boost
public function Dot_TotalBoostEarnings()
{
    $totalBoostEarnings = mysqli_query($this->db,"SELECT SUM(amonth) AS totalBoost FROM dot_transactions WHERE complete = '1' AND product_boost_id IS NOT NULL") or die(mysqli_error($this->db));  
	  $row = mysqli_fetch_array($totalBoostEarnings, MYSQLI_ASSOC);   
	  if($row['totalBoost']){
		   $earningTotal = $row['totalBoost']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Earnings Donate
public function Dot_TotalDonateEarnings()
{
    $totalBoostEarnings = mysqli_query($this->db,"SELECT SUM(fee) AS totalDonate FROM dot_payments WHERE payment_type = 'donate' AND payment_status = '1'") or die(mysqli_error($this->db));  
	  $row = mysqli_fetch_array($totalBoostEarnings, MYSQLI_ASSOC);   
	  if($row['totalDonate']){
		   $earningTotal = $row['totalDonate']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}

// Earnings Theme Sales
public function Dot_TotalThemeSaleEarnings()
{
    $totalAdsEarnings = mysqli_query($this->db,"SELECT SUM(amonth) AS totalthemesoldearnings FROM dot_transactions WHERE complete = '1' AND theme_id IS NOT NULL") or die(mysqli_error($this->db));  
	  $row = mysqli_fetch_array($totalAdsEarnings, MYSQLI_ASSOC);   
	  if($row['totalthemesoldearnings']){
		   $earningTotal = $row['totalthemesoldearnings']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
} 
// Pay Success
public function Dot_WithdrawalPaid($uid,$userid,$withdrawID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$userid = mysqli_real_escape_string($this->db, $userid);
	$withdrawID = mysqli_real_escape_string($this->db, $withdrawID); 
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db)); 
	$checkWithdrawalStatus = mysqli_query($this->db,"SELECT withdraw_status FROM dot_withdrawals WHERE withdraw_status = '0' AND withdraw_uid_fk = '$userid' AND withdraw_id = '$withdrawID' ") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1' && mysqli_num_rows($checkWithdrawalStatus) == 1){
	          $query =mysqli_query($this->db,"UPDATE dot_withdrawals SET withdraw_status = '1' WHERE withdraw_uid_fk = '$userid' AND withdraw_id = '$withdrawID'") or die(mysqli_error($this->db)); 
			  if($query){
				  return true;
			  }else{return false;}
			  
	   }else{return false;}
}
// Declined
public function Dot_WithdrawalDeclined($uid,$userid,$withdrawID, $amount)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$userid = mysqli_real_escape_string($this->db, $userid);
	$withdrawID = mysqli_real_escape_string($this->db, $withdrawID); 
	$amount = mysqli_real_escape_string($this->db, $amount); 
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db)); 
	$checkWithdrawalStatus = mysqli_query($this->db,"SELECT withdraw_status FROM dot_withdrawals WHERE withdraw_status = '0' AND withdraw_uid_fk = '$userid' AND withdraw_id = '$withdrawID' ") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1' && mysqli_num_rows($checkWithdrawalStatus) == 1){
	          $query =mysqli_query($this->db,"UPDATE dot_withdrawals SET withdraw_status = '2' WHERE withdraw_uid_fk = '$userid' AND withdraw_id = '$withdrawID'") or die(mysqli_error($this->db)); 
			  $queryBack =mysqli_query($this->db,"UPDATE dot_users SET total_earnings = total_earnings + ($amount) WHERE user_id = '$userid'") or die(mysqli_error($this->db));
			  return true;
	   }else{return false;}
}
// Pay Success
public function Dot_WithdrawalDelete($uid,$userid,$withdrawID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$userid = mysqli_real_escape_string($this->db, $userid);
	$withdrawID = mysqli_real_escape_string($this->db, $withdrawID); 
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db)); 
	$checkWithdrawalStatus = mysqli_query($this->db,"SELECT withdraw_status FROM dot_withdrawals WHERE withdraw_status IN ('1','2') AND withdraw_uid_fk = '$userid' AND withdraw_id = '$withdrawID' ") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == '1' && mysqli_num_rows($checkWithdrawalStatus) == 1){
	          mysqli_query($this->db,"DELETE FROM dot_withdrawals WHERE withdraw_uid_fk ='$userid' AND withdraw_id = '$withdrawID'") or die(mysqli_error($this->db));
			  return true;
	   }else{return false;}
}
// Delete User Point
public function Dot_DeletePointFromData($uid, $pointID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointID = mysqli_real_escape_string($this->db, $pointID);
	 $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db)); 
	 $checkPointExist = mysqli_query($this->db,"SELECT calculated_point , point_id FROM dot_user_point_earnings WHERE calculated_point = '1' AND point_id = '$pointID' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserExist) == '1' && mysqli_num_rows($checkPointExist) == 1){
		  mysqli_query($this->db,"DELETE FROM dot_user_point_earnings WHERE point_id ='$pointID' AND calculated_point = '1'") or die(mysqli_error($this->db));
			  return true;
	   }else{return false;}
}
// Delete User Point
public function Dot_DeleteBoostFromData($uid, $pointID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointID = mysqli_real_escape_string($this->db, $pointID);
	 $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type = '1'") or die(mysqli_error($this->db)); 
	 $checkBoostExist = mysqli_query($this->db,"SELECT product_boost_id , transaction_id FROM dot_transactions WHERE complete IN('0','1') AND transaction_id = '$pointID' ") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($checkBoostExist,MYSQLI_ASSOC);
	 $thisData = $data['product_boost_id'];
	 $checkPostExist = mysqli_query($this->db,"SELECT user_post_id , ads_status FROM dot_user_posts WHERE ads_status IN('0','1') AND user_post_id = '$thisData' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkBoostExist) == 1 && mysqli_num_rows($checkPostExist) == 1){
		  mysqli_query($this->db,"DELETE FROM dot_transactions WHERE transaction_id = '$pointID'") or die(mysqli_error($this->db));
			  return true;
	   }else{return false;}
}
// Insert User Latitude and Longitude
public function Dot_InsertOrUpdateLatitudeLongitude($uid, $lat, $long)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $lat = mysqli_real_escape_string($this->db, $lat);
   $long = mysqli_real_escape_string($this->db, $long);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkUserExist) == 1){
          $updateLatitudeAndLongitude = mysqli_query($this->db,"UPDATE dot_users SET ulat = '$lat', ulong = '$long' WHERE user_id = '$uid'") or die(mysqli_error($this->db));
		  return true;
   }else{return false;}
}
// Display User Distance
public function Dot_Distance($uid,$latitude, $longitude,$distance,$oldid)
{ 
    $latitude = mysqli_real_escape_string($this->db, $latitude);
    $longitude = mysqli_real_escape_string($this->db, $longitude);
	$distance = mysqli_real_escape_string($this->db, $distance); 
	$oldid = mysqli_real_escape_string($this->db, $oldid); 
	$morequery = '';
	 if($oldid){
       $morequery=" user_id < '".$oldid."' AND "; 
    }  
	 $query = mysqli_query($this->db,"SELECT * FROM (SELECT *,  (((acos(sin(( $latitude * pi() / 180)) *sin(( `ulat` * pi() / 180)) + cos(( $latitude * pi() /180 ))*cos(( `ulat` * pi() / 180)) * cos((( $longitude - `ulong`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `dot_users` ORDER BY distance * 1 ASC) dot_users WHERE $morequery ulat IS NOT NULL AND ulong IS NOT NULL AND user_id NOT IN (SELECT f_user_id_two FROM dot_favourite_users WHERE f_user_id_two = user_id) AND user_status = '1' AND user_id <> '$uid' AND distance <= 685 LIMIT  " .$this->perpage) or die(mysqli_error($this->db));
		   //Store the result
			while($row=mysqli_fetch_array($query)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }  
}
// Display User Distance
public function Dot_DistanceGlobal($uid,$latitude, $longitude)
{ 
    $latitude = mysqli_real_escape_string($this->db, $latitude);
    $longitude = mysqli_real_escape_string($this->db, $longitude); 
	 
	 $query = mysqli_query($this->db,"SELECT * FROM (SELECT *,  (((acos(sin(( $latitude * pi() / 180)) *sin(( `ulat` * pi() / 180)) + cos(( $latitude * pi() /180 ))*cos(( `ulat` * pi() / 180)) * cos((( $longitude - `ulong`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `dot_users` ORDER BY RAND() ) dot_users WHERE ulat IS NOT NULL AND ulong IS NOT NULL AND user_status = '1' AND user_id <> '$uid' AND user_id NOT IN (SELECT F.user_two FROM dot_friends F WHERE F.user_one = '$uid' OR F.user_two = '$uid') AND user_id NOT IN (SELECT m.f_user_id_two FROM dot_favourite_users m WHERE m.f_user_id = '$uid' OR m.f_user_id_two = '$uid') LIMIT  " .$this->perpage) or die(mysqli_error($this->db));
		   //Store the result
			while($row=mysqli_fetch_array($query)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }  
}
//  
// Display User Distance
public function Dot_DistanceGlobalSrc($uid,$latitude, $longitude, $miniAge, $maxiAge, $distan, $gend, $onofl, $wavatar,$srelationshipstatus,$ssexuality,$sheight,$sweight,$slifestyle,$schildren,$ssmokinghabit,$sdrinkinghabit,$shaircolor,$seyecolor,$sbodyType)
{ 
    $latitude = mysqli_real_escape_string($this->db, $latitude); // Ok
    $longitude = mysqli_real_escape_string($this->db, $longitude); // Ok
	$betweenAgeStart = mysqli_real_escape_string($this->db, $miniAge);// Ok
	$betweenAgeAnd = mysqli_real_escape_string($this->db, $maxiAge);// Ok
	$distance =  mysqli_real_escape_string($this->db, $distan);// Ok
	$gender =  mysqli_real_escape_string($this->db, $gend); // Ok
	$wavatar =  mysqli_real_escape_string($this->db, $wavatar); // Ok 
	
	$srelationshipstatus =  mysqli_real_escape_string($this->db, $srelationshipstatus); // Ok
	$ssexuality =  mysqli_real_escape_string($this->db, $ssexuality); // Ok
	$sheight =  mysqli_real_escape_string($this->db, $sheight); // Ok
	$sweight =  mysqli_real_escape_string($this->db, $sweight); // Ok
	$slifestyle =  mysqli_real_escape_string($this->db, $slifestyle); // Ok
	$schildren =  mysqli_real_escape_string($this->db, $schildren); // Ok
	$ssmokinghabit =  mysqli_real_escape_string($this->db, $ssmokinghabit); // Ok
	$sdrinkinghabit =  mysqli_real_escape_string($this->db, $sdrinkinghabit); // Ok
	$shaircolor =  mysqli_real_escape_string($this->db, $shaircolor); 
	$seyecolor =  mysqli_real_escape_string($this->db, $seyecolor); 
	$sbodyType =  mysqli_real_escape_string($this->db, $sbodyType); 
	
	
	$onlineOfflineSttu = '';
	$withAvatar = '';
	$sgender = '';
	$sagea = '';
	$relationStips = '';
	$userSearchSexuality = '';
	$userSearchHeight = '';
	$userSearchWeight = '';
	$userSearchLifeStyle = '';
	$userSearchChildren = '';
	$userSearchSmokingHabit = '';
	$userSearchDrinkingHabit = '';
	$userSearchHairColor = '';
	$userSearchEyeColor = '';
	$userSearchBodyType = '';
	if($onofl == 'online'){
	     $onlineOfflineSttu = 'AND FROM_UNIXTIME(last_login) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 3 minute)';
	} 
	if($wavatar){
        $withAvatar = 'AND user_avatar IS NOT NULL';
	} 
	if($betweenAgeStart && $betweenAgeAnd){
	    $sagea = 'AND (user_birthyear BETWEEN (YEAR(CURDATE())- '.$betweenAgeAnd.')  AND (YEAR(CURDATE())-'.$betweenAgeStart.'))';
	}
	if($gender){
	   $sgender = "AND user_gender = '$gender'";
	}
	if($srelationshipstatus){
	   $relationStips = "AND user_relationship = '$srelationshipstatus'";
	}
	if($ssexuality){
	   $userSearchSexuality = "AND user_sexuality = '$ssexuality'";
	}
	if($sheight){
	   $userSearchHeight = "AND user_height = '$sheight'";
	}
	if($sweight){
	   $userSearchWeight = "AND user_weight = '$sweight'";
	}
	if($slifestyle){
	   $userSearchLifeStyle = "AND user_life_style = '$slifestyle'";
	}
	if($schildren){
	   $userSearchChildren = "AND user_children = '$schildren'";
	}  
	if($ssmokinghabit){
	   $userSearchSmokingHabit = "AND user_smoke = '$ssmokinghabit'";
	} 
	if($sdrinkinghabit){
	   $userSearchDrinkingHabit = "AND user_drink = '$sdrinkinghabit'";
	}
	if($shaircolor){
	   $userSearchHairColor = "AND user_hair_color = '$shaircolor'";
	} 
	if($seyecolor){
	   $userSearchEyeColor = "AND user_eye_color = '$seyecolor'";
	}
	if($sbodyType){
	   $userSearchBodyType = "AND user_body_type = '$sbodyType'";
	} 
	if($distance){
	   $userSearchDistance = "AND distance <= $distance";
	} else {
	   $userSearchDistance = "AND distance <= 650";
	}
	 $query = mysqli_query($this->db,"SELECT * FROM (SELECT *, (((acos(sin(( $latitude * pi() / 180)) *sin(( `ulat` * pi() / 180)) + cos(( $latitude * pi() /180 ))*cos(( `ulat` * pi() / 180)) * cos((( $longitude - `ulong`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `dot_users` ORDER BY RAND() ) dot_users WHERE 
	 ulat IS NOT NULL AND 
	 ulong IS NOT NULL AND 
	 user_status = '1' AND 
	 user_id <> '$uid' 
	 $userSearchDistance  
	 $sagea
	 $sgender
	 $relationStips
	 $userSearchSexuality
	 $userSearchHeight
	 $userSearchWeight
	 $userSearchLifeStyle
	 $userSearchChildren
	 $userSearchSmokingHabit
	 $userSearchDrinkingHabit
	 $userSearchHairColor
	 $userSearchEyeColor
	 $userSearchBodyType
	 $onlineOfflineSttu 
	 $withAvatar  
	 LIMIT  " .$this->perpage) or die(mysqli_error($this->db));     
	   //Store the result
	   while($row=mysqli_fetch_array($query)) {
		   $updateSearch = mysqli_query($this->db, "UPDATE dot_users SET search_gender = '$gender', search_onofstatus = '$onofl' , search_avatarstatus = '$wavatar',search_agestart = '$betweenAgeStart', search_ageend = '$betweenAgeAnd',search_distance = '$distance' ,search_relationshipstatus = '$srelationshipstatus' ,search_sexuality = '$ssexuality' ,search_height = '$sheight' ,search_weight = '$sweight' ,search_lifestyle = '$slifestyle' ,search_children = '$schildren',search_smokinghabit = '$ssmokinghabit',search_drinkinghabit = '$sdrinkinghabit',search_haircolor = '$shaircolor',search_eyecolor = '$seyecolor'	 ,search_bodytype = '$sbodyType'  WHERE user_id = '$uid' AND user_status = '1' AND pro_user_type = '1'") or die(mysqli_error($this->db));  
		    // Store the result into array
	       $data[]=$row;
	   }
	   if(!empty($data)) {
			 // Store the result into array
			 return $data;
	   }  
} 
// Reset Filter Search
public function Dot_ResetOldSearch($uid)
{
$updateSearch = mysqli_query($this->db, "UPDATE dot_users SET search_gender = 'male' , search_onofstatus = 'online' , search_avatarstatus = '1' , search_agestart = '20' , search_ageend = '80' ,search_distance = '100' ,search_relationshipstatus = NULL ,search_sexuality = NULL ,search_height = NULL ,search_weight = NULL ,search_lifestyle = NULL ,search_children = NULL , search_smokinghabit = NULL ,search_drinkinghabit = NULL , search_haircolor = NULL ,search_eyecolor = NULL ,search_bodytype = NULL  WHERE user_id = '$uid' AND user_status = '1' AND pro_user_type = '1'") or die(mysqli_error($this->db));  
}

 
// Selected Icon 
public function Dot_GetSvgIcon($svgID){
   $svgID = mysqli_real_escape_string($this->db, $svgID);
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons WHERE icon_id = '$svgID'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($queryIcon,MYSQLI_ASSOC);
   return $data['icon_code'];
} 
// Check InFavourite
public function Dot_CheckUserIsInFavouriteList($uid, $userid)
{
      $uid = mysqli_real_escape_string($this->db, $uid);
	  $userid = mysqli_real_escape_string($this->db, $userid);
	  $query = mysqli_query($this->db,"SELECT f_user_id_two, f_user_id FROM dot_favourite_users WHERE f_user_id = '$uid' AND f_user_id_two = '$userid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($query) == 1){
		   return true; 
	  }else{return false;} 
}
// Get User Favourite List
public function Dot_UserFavouriteUserList($uid, $lastuid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$lastuid = mysqli_real_escape_string($this->db,$lastuid);
	$moreFriends=""; 
    if($lastUserID) { 
	  $moreFriends=" AND F.fid<'".$lastuid."' ";
    } 
	$data = null; 
	$allFriendsQuery = mysqli_query($this->db,"SELECT DISTINCT F.fid, F.f_user_id, F.f_user_id_two,F.time, U.user_id,U.user_name,U.user_fullname,U.user_birthday,U.user_birthmonth,U.user_birthyear,U.verified_user FROM dot_users U, dot_favourite_users F  WHERE U.user_status = '1' AND F.f_user_id=U.user_id AND F.f_user_id='$uid' $moreFriends ORDER BY F.fid DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }
}
// Add User FromFavouriteList
public function Dot_AddThisUserFromFavouriteList($uid, $favouriteID)
{
	  $uid = mysqli_real_escape_string($this->db, $uid);
	  $favouriteID = mysqli_real_escape_string($this->db, $favouriteID);
	  $time = time();
	  $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == '1'){
		    $saveTextFromData = mysqli_query($this->db,"INSERT INTO `dot_favourite_users`(f_user_id,f_user_id_two,time)VALUES('$uid','$favouriteID','$time')") or die(mysqli_error($this->db));
			 mysqli_query($this->db,"UPDATE dot_users SET profile_favourite_count = profile_favourite_count + 1 WHERE user_id = '$favouriteID' AND user_status = '1'") or die(mysqli_error($thisi->db));
		    return true; 
	  }else{return false;}
} 
// Add User FromFavouriteList
public function Dot_RemoveThisUserFromFavouriteList($uid, $favouriteID)
{
	  $uid = mysqli_real_escape_string($this->db, $uid);
	  $favouriteID = mysqli_real_escape_string($this->db, $favouriteID);
	  $time = time();
	  $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  $checkUserExistInFavourite = mysqli_query($this->db,"SELECT f_user_id,f_user_id_two FROM dot_favourite_users WHERE f_user_id = '$uid' AND f_user_id_two = '$favouriteID'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == '1' && mysqli_num_rows($checkUserExistInFavourite) == '1'){
		    mysqli_query($this->db,"DELETE FROM dot_favourite_users WHERE f_user_id = '$uid' AND f_user_id_two = '$favouriteID'") or die(mysqli_error($this->db));
			mysqli_query($this->db,"UPDATE dot_users SET profile_favourite_count = profile_favourite_count - 1 WHERE user_id = '$favouriteID' AND user_status = '1'") or die(mysqli_error($thisi->db));
		    return true; 
	  }else{return false;}
} 
// Get Details
public function Dot_GetUserDetailsFromID($uid, $thisUser)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
    $thisUser = mysqli_real_escape_string($this->db, $thisUser);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	$checkUserExistSecond = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$thisUser' AND user_status = '1'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkUserExistSecond) == 1){
	        $query = mysqli_query($this->db,"SELECT  user_id,user_name,user_fullname,user_email,user_password,user_relationship,user_avatar,user_page_lang,user_profile_word,delete_key,user_cover,user_website,user_bio,user_gender,user_height,user_credit,user_weight,user_life_style,user_children,user_smoke,user_drink,user_body_type,user_hair_color,user_eye_color,user_sexuality,notification_count,user_job_title,last_login,user_job_company_name,user_school_university,user_phone_number,post_like_notification,post_comment_notification,comment_like_notification,user_type,follow_notification,visited_profile_notification,private_account,style_mode,show_suggest_hashTags,show_suggest_users,show_advertisement,show_google_ads, profile_bg, profile_bg_type,bg_music_name,bg_music,bg_music_type,pbg_color,pha_color,pt_color,phv_color,pp_icon,pshb_color,pfont_font,pshb_icon,verified_user,notification_event_count,email_verification,device_key,total_earnings,last_earn_calculate,point_earning,user_donate_message,ulat,ulong  FROM dot_users WHERE user_id='$thisUser' AND user_status IN('1','2','3')") or die(mysqli_error($this->db));
	   while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
	} 
}
// Price Table
public function Dot_ProPriceTable()
{
    $query = mysqli_query($this->db,"SELECT price_id,price_type,price_amounth,price_discount,price_info,price_key_number,price_icon FROM dot_pro_price_table") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Price Table
public function Dot_ProPriceTableAvantages()
{
    $query = mysqli_query($this->db,"SELECT avantage_id,avantage_icon,avantage_title,avantage_desc,avantage_status FROM dot_pro_member_avantages WHERE avantage_status = '1'") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Calculate Price Table Row
public function Dot_ProPriceTableTotal()
{ 
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postVoteCount FROM dot_pro_price_table") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postVoteCount'];
}
// Get Pricess
public function Dot_GetProPriceFromNumber($pnumber)
{
    $pnumber = mysqli_real_escape_string($this->db, $pnumber);
	$query = mysqli_query($this->db,"SELECT price_id,price_type,price_amounth,price_discount,price_key_number,price_amount_try,price_amount_ngn,price_amount_inr,price_icon FROM dot_pro_price_table WHERE price_key_number = '$pnumber'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC); 
	if($data){return $data;	 }else{return false;} 
} 
// Check Payment is Pro
public function Dot_CheckPaymentIsPro($puid)
{
    $puid = mysqli_real_escape_string($this->db, $puid);
	$getLatestPayment = mysqli_query($this->db,"SELECT payment_post_id,customer_user_id,payment_user_id,payment_type FROM dot_payments WHERE payment_user_id = '$puid' AND payment_type='pm' AND FROM_UNIXTIME(payment_time) > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 minute) ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$dataLastPayment=mysqli_fetch_array($getLatestPayment,MYSQLI_ASSOC);
	if($dataLastPayment){return $dataLastPayment;	 }else{return false;}
}

// Check Pro Status 
public function Dot_CheckProStatus($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
    $query = mysqli_query($this->db,"SELECT user_id, pro_user_type,pro_user_plain_time FROM dot_users WHERE user_id = '$uid' AND pro_user_type = '1' AND FROM_UNIXTIME(pro_user_plain_time) < DATE(NOW())") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1){
	     mysqli_query($this->db,"UPDATE dot_users SET pro_user_type = '0' , pro_user_plain_time = NULL WHERE user_id = '$uid' AND user_status = '1' AND pro_user_type = '1'") or die(mysqli_error($thisi->db));
		 return false;
	}else{return true;}
}
// Price Table
public function Dot_ProUsersWidget()
{ 
    $query = mysqli_query($this->db,"SELECT user_id,user_name,user_fullname,pro_user_plain_time FROM dot_users WHERE (SELECT avantage_status FROM dot_pro_member_avantages WHERE avantage_id = '3') = 1 AND user_status = '1' AND pro_user_type = '1' AND FROM_UNIXTIME(pro_user_plain_time) > DATE(NOW()) ORDER BY RAND() LIMIT 16") or die(mysqli_error($this->db));
	
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}

// Insert Profile Visito If visited Profile is in pro member () visit_checked
public function Dot_InsertVisitor($uid, $visitedUserID)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$visitedUserID = mysqli_real_escape_string($this->db,$visitedUserID);
	$time = time();
	$checkVisitedProfileIsPro = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$visitedUserID' AND user_status = '1' AND pro_user_type = '1'") or die(mysqli_error($this->db)); 
	$checkVisitChecked = mysqli_query($this->db,"SELECT visited_user_id FROM dot_profile_visitors WHERE visited_user_id = '$visitedUserID' AND visitor_id = '$uid'") or die(mysqli_error($this->db));
	$checkUserisInDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkVisitedProfileIsPro) == 1 && mysqli_num_rows($checkVisitChecked) == 0 && mysqli_num_rows($checkUserisInDatabase) == 1){ 
	       $saveTextFromData = mysqli_query($this->db,"INSERT INTO `dot_profile_visitors`(visitor_id ,visited_user_id,time)VALUES('$uid','$visitedUserID','$time')") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"UPDATE dot_users SET profile_visit_count = '1' WHERE  user_id = '$visitedUserID' AND user_status = '1'  AND pro_user_type = '1'") or die(mysqli_error($this->db));
		   return true; 
	}else{
          $saveTextFromData = mysqli_query($this->db,"UPDATE dot_profile_visitors SET visit_checked = '0' WHERE  visited_user_id = '$visitedUserID' AND visitor_id = '$uid'") or die(mysqli_error($this->db));
		  mysqli_query($this->db,"UPDATE dot_users SET profile_visit_count = '1' WHERE  user_id = '$visitedUserID' AND user_status = '1'  AND pro_user_type = '1'") or die(mysqli_error($this->db));
		  return true; 
	} 
}
// Insert Profile Visito If visited Profile is in pro member () visit_checked
public function Dot_InsertVisitorNormal($uid, $visitedUserID)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$visitedUserID = mysqli_real_escape_string($this->db,$visitedUserID);
	$time = time();
	$checkVisitedProfileIsPro = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$visitedUserID' AND user_status = '1'") or die(mysqli_error($this->db)); 
	$checkVisitChecked = mysqli_query($this->db,"SELECT visited_user_id FROM dot_profile_visitors WHERE visited_user_id = '$visitedUserID' AND visitor_id = '$uid'") or die(mysqli_error($this->db));
	$checkUserisInDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkVisitChecked) == 0 && mysqli_num_rows($checkUserisInDatabase) == 1){ 
	       $saveTextFromData = mysqli_query($this->db,"INSERT INTO `dot_profile_visitors`(visitor_id ,visited_user_id,time)VALUES('$uid','$visitedUserID','$time')") or die(mysqli_error($this->db));
		   mysqli_query($this->db,"UPDATE dot_users SET profile_visit_count = '1' WHERE  user_id = '$visitedUserID' AND user_status = '1'") or die(mysqli_error($this->db));
		   return true; 
	}else{
          $saveTextFromData = mysqli_query($this->db,"UPDATE dot_profile_visitors SET visit_checked = '0' WHERE  visited_user_id = '$visitedUserID' AND visitor_id = '$uid'") or die(mysqli_error($this->db));
		  mysqli_query($this->db,"UPDATE dot_users SET profile_visit_count = '1' WHERE  user_id = '$visitedUserID' AND user_status = '1'") or die(mysqli_error($this->db));
		  return true; 
	} 
}
// Check User have Visitor
public function Dot_CheckUserHaveVisitor($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS visitorCount FROM dot_profile_visitors WHERE visited_user_id = '$uid' AND visit_checked = '0'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['visitorCount'] > 0){
	     return $row['visitorCount'];
	  }else{return false;} 
}
// Update Visitor Count Status
public function Dot_UpdateProfileVisitCount($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkUserExist) == 1){
       mysqli_query($this->db,"UPDATE dot_users SET profile_visit_count = '0' WHERE  user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
   } 
}
// Update Visit status ()
public function Dot_UpdateUserFavouriteStatus($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid);
   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
   if(mysqli_num_rows($checkUserExist) == 1){
	      mysqli_query($this->db,"UPDATE dot_users SET profile_favourite_count = '0' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
          return true;
   }else{return false;}
}
// Get UserName From Pages
public function Dot_GetVsitorNotificationNumber($uid)
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT profile_visit_count FROM `dot_users` WHERE user_id='$uid' AND user_status='1'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['profile_visit_count']) {
		$name=$data['profile_visit_count'];
	    return  $name;
	}
}
// Get UserName From Pages
public function Dot_GetFavouriteNotificationNumber($uid)
{
	$uid=mysqli_real_escape_string($this->db,$uid);
	// Username is not enouth for your user
	// If your user changed his/her name then thiw query will be start on that time
	// It will show just 25 character if you want more then you can change it easyly
	$query = mysqli_query($this->db,"SELECT profile_favourite_count FROM `dot_users` WHERE user_id='$uid' AND user_status='1'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['profile_favourite_count']) {
		$name=$data['profile_favourite_count'];
	    return  $name;
	}
}
// Update Visit status ()
public function Dot_UpdateUserVisitStatus($uid, $thisUser)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $thisUser = mysqli_real_escape_string($this->db, $thisUser);
   $checkUserExistInVisitList = mysqli_query($this->db,"SELECT visit_checked FROM dot_profile_visitors WHERE visit_checked = '0' AND visited_user_id = '$uid' AND visitor_id = '$thisUser'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($checkUserExistInVisitList) == 1){
	      mysqli_query($this->db,"UPDATE dot_profile_visitors SET visit_checked = '1' WHERE visit_checked = '0' AND visited_user_id = '$uid' AND visitor_id = '$thisUser'") or die(mysqli_error($this->db));
          return true;
   }else{return false;}
}

// Get User Favourite List
public function Dot_UserVisitorLisit($uid, $lastuid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$lastuid = mysqli_real_escape_string($this->db,$lastuid);
	$moreFriends=""; 
    if($lastuid) { 
	  $moreFriends=" AND F.v_id < '".$lastuid."' ";
    } 
	$data = null; 
	$allFriendsQuery = mysqli_query($this->db,"SELECT F.v_id, F.visitor_id, F.visited_user_id,F.visit_checked, F.time, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_profile_visitors F WHERE U.user_id = F.visited_user_id AND U.user_status = '1' AND F.visited_user_id='$uid' $moreFriends ORDER BY F.v_id DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }
}
// Get Details
public function Dot_UserDetailsFromID($sessionUserID,$latitude,$longitude)
{
   $sessionUserID = mysqli_real_escape_string($this->db, $sessionUserID);
   $query = mysqli_query($this->db,"SELECT user_id,user_name,user_fullname,user_email,user_password,user_relationship,user_avatar,user_page_lang,user_profile_word,delete_key,user_cover,user_website,user_bio,user_gender,user_height,user_credit,user_weight,user_life_style,user_children,user_smoke,user_drink,user_body_type,user_hair_color,user_eye_color,user_sexuality,notification_count,user_job_title,last_login,user_job_company_name,user_school_university,user_phone_number,post_like_notification,post_comment_notification,comment_like_notification,user_type,follow_notification,visited_profile_notification,private_account,style_mode,show_suggest_hashTags,show_suggest_users,show_advertisement,show_google_ads, profile_bg, profile_bg_type,bg_music_name,bg_music,bg_music_type,pbg_color,pha_color,pt_color,phv_color,pp_icon,pshb_color,pfont_font,pshb_icon,verified_user,notification_event_count,email_verification,device_key,total_earnings,last_earn_calculate,point_earning,user_donate_message,ulat,ulong,search_gender,search_onofstatus,search_avatarstatus,search_agestart,search_ageend,search_distance,pro_user_type,pro_user_plain_time,user_birthday,user_birthmonth,user_birthyear, (((acos(sin(( $latitude * pi() / 180)) *sin(( `ulat` * pi() / 180)) + cos(( $latitude * pi() /180 ))*cos(( `ulat` * pi() / 180)) * cos((( $longitude - `ulong`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM dot_users WHERE user_id='$sessionUserID' AND user_status IN('1','2','3')") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
   return $data;
} 
// Get User Favourite List
public function Dot_UserWhoAddedFavouriteLisit($uid, $lastuid)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$lastuid = mysqli_real_escape_string($this->db,$lastuid);
	$moreFriends=""; 
    if($lastuid) { 
	  $moreFriends=" AND F.fid < '".$lastuid."' ";
    } 
	$data = null; 
	$allFriendsQuery = mysqli_query($this->db,"SELECT F.fid, F.f_user_id, F.f_user_id_two, F.time, U.user_id,U.user_name,U.user_fullname FROM dot_users U, dot_favourite_users F WHERE U.user_id = F.f_user_id_two AND U.user_status = '1' AND F.f_user_id_two='$uid' $moreFriends ORDER BY F.fid DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }
}
// Add Product From Cart ()
public function Dot_InsertProductFromShoppingCart($uid, $productID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$productID = mysqli_real_escape_string($this->db,$productID);
	$time = time();
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	$checkPostIsProduct = mysqli_query($this->db,"SELECT user_post_id,user_id_fk FROM dot_user_posts WHERE user_post_id = '$productID' AND post_type = 'p_product' AND user_id_fk <> $uid") or die(mysqli_error($this->db)); 
	$uuid = mysqli_fetch_array($checkPostIsProduct, MYSQLI_ASSOC);
	$productOwnerID = $uuid['user_id_fk'];
   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkPostIsProduct) == 1){
	       $checkPostIsInCard = mysqli_query($this->db,"SELECT product_id_fk,user_id_fk FROM dot_user_cart WHERE product_id_fk = '$productID' AND user_id_fk = '$uid' AND purchase_status = '0'") or die(mysqli_error($this->db)); 
		   
			if(mysqli_num_rows($checkPostIsInCard) == 1){  
				mysqli_query($this->db,"UPDATE dot_user_cart SET pieces = pieces+1 WHERE product_id_fk = '$productID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
				return true;
			}else{
				$insertQuery = mysqli_query($this->db,"INSERT INTO dot_user_cart(user_id_fk,product_id_fk,product_owner_id,pieces,time)VALUES('$uid','$productID','$productOwnerID','1','$time')") or die(mysqli_error($this->db));
				return true;
			} 
   }else{return false;}
}
// Check User have Visitor
public function Dot_CalculateUserShoppingCartProducts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS productCount FROM dot_user_cart WHERE user_id_fk = '$uid' AND purchase_status = '0'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['productCount']){
	     return $row['productCount'];
	  }else{return false;} 
}
// Check User have Visitor
public function Dot_CalculateUserOrderedProducts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS productCount FROM dot_user_cart WHERE user_id_fk = '$uid' AND purchase_status IN('1','2')") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['productCount']){
	     return $row['productCount'];
	  }else{return false;} 
}
// Check User have Visitor
public function Dot_CalculateUserInComingOrdersProducts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS productCount FROM dot_user_cart WHERE product_owner_id = '$uid' AND purchase_status IN('1','2') AND cargo_delivery_status IN('0','1','2')") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['productCount']){
	     return $row['productCount'];
	  }else{return false;} 
}
// User Cart Product List
public function Dot_MyCartProduccts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == 1){ 
			$query = mysqli_query($this->db,"SELECT DISTINCT K.cart_id,K.user_id_fk,K.product_id_fk,K.product_owner_id,K.pieces,K.purchase_status,K.time,K.customer_fullname,K.customer_address,K.customer_phone,K.customer_country,K.customer_city,K.customer_state,K.customer_post_code,K.customer_personal_id_or_passport_id,K.cargo_delivery_status,P.user_post_id,P.user_id_fk,P.post_type,P.product_images,P.product_category,P.product_discount_price,P.product_normal_price,P.slug,P.m_product_name,P.product_currency FROM dot_user_cart K, dot_user_posts P WHERE K.user_id_fk = '$uid' AND P.user_post_id = K.product_id_fk AND P.post_type = 'p_product' AND K.purchase_status = '0' ") or die(mysqli_error($this->db));	
			//Store the result
			while($row=mysqli_fetch_array($query)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }  
	   } 
}
// User Cart Product List
public function Dot_MyOrderedProducts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == 1){ 
			$query = mysqli_query($this->db,"SELECT DISTINCT K.cart_id,K.user_id_fk,K.product_id_fk,K.product_owner_id,K.pieces,K.purchase_status,K.time,K.order_status,K.customer_fullname,K.customer_address,K.customer_phone,K.customer_country,K.customer_city,K.customer_state,K.customer_post_code,K.customer_personal_id_or_passport_id,K.cargo_campany, K.cargo_tracking_number,K.cargo_delivery_status,P.user_post_id,P.user_id_fk,P.post_type,P.product_images,P.product_category,P.product_discount_price,P.product_normal_price,P.slug,P.m_product_name,P.product_currency FROM dot_user_cart K, dot_user_posts P WHERE K.user_id_fk = '$uid' AND P.user_post_id = K.product_id_fk AND P.post_type = 'p_product' AND K.purchase_status IN('1','2') AND K.cargo_delivery_status IN('0','1','2') ") or die(mysqli_error($this->db));	
			//Store the result
			while($row=mysqli_fetch_array($query)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }  
	   } 
}
// User Cart Product List
public function Dot_MyIncomingProducts($uid)
{
      $uid = mysqli_real_escape_string($this->db,$uid);
	  $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == 1){ 
			$query = mysqli_query($this->db,"SELECT DISTINCT P.user_post_id,P.user_id_fk,P.post_type,P.product_images,P.product_category,P.product_discount_price,P.product_normal_price,P.slug,P.m_product_name,P.product_currency,K.cart_id,K.user_id_fk,K.product_id_fk,K.product_owner_id,K.pieces,K.purchase_status,K.time,K.order_status,K.customer_fullname,K.customer_address,K.customer_phone,K.customer_country,K.customer_city,K.customer_state,K.customer_post_code,K.customer_personal_id_or_passport_id,K.cargo_campany, K.cargo_tracking_number,K.cargo_delivery_status FROM dot_user_posts P INNER JOIN dot_user_cart K ON K.product_owner_id = P.user_id_fk WHERE K.product_owner_id = '$uid' AND P.user_post_id = K.product_id_fk AND P.post_type = 'p_product' AND K.purchase_status IN('1','2') AND K.cargo_delivery_status IN('0','1','2')") or die(mysqli_error($this->db));	 
			
			//Store the result
			while($row=mysqli_fetch_array($query)) {
				// Store the result into array
				$data[]=$row;
			 }
			 if(!empty($data)) {
				// Store the result into array
				return $data;
			 }  
	   } 
}
public function Dot_DeleteProductFromShoppingCart($uid, $productID)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $productID = mysqli_real_escape_string($this->db,$productID);
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	  if(mysqli_num_rows($checkUserExist) == 1){ 
	          mysqli_query($this->db,"DELETE FROM dot_user_cart WHERE cart_id = '$productID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
			  return true;
	  }else{return false;}
}
// GET POSTCurrency
public function Dot_GetPostCurency($uid,$postID)
{
	   $uid = mysqli_real_escape_string($this->db,$uid);
	   $postID = mysqli_real_escape_string($this->db,$postID);
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	   $checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID' AND post_type = 'p_product'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkPostExist) == 1){ 
          $query = mysqli_query($this->db,"SELECT product_currency,product_normal_price,product_discount_price,m_product_name,m_product_description FROM `dot_user_posts` WHERE user_post_id='$postID' AND post_type='p_product'") or die(mysqli_error($this->db));
		  $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		  return $data; 
	  }
}
// CheckProductExist
public function Dot_CheckProductIsInData($uid, $productOwner, $cartProductID)
{
       $uid = mysqli_real_escape_string($this->db,$uid);
	   $productOwner = mysqli_real_escape_string($this->db,$productOwner);
	   $cartProductID = mysqli_real_escape_string($this->db,$cartProductID);
	   $checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
	   $checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$cartProductID' AND user_id_fk = '$productOwner' AND post_type = 'p_product'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkUserExist) == 1 && mysqli_num_rows($checkPostExist) == 1){ 
	        return true;
	   }else{return false;}
}
/*Update User Profile Information*/
public function Dot_SaveUserShoppingInformation($uid,$UserFullName, $useraddress, $userphone,$userPassportID,$userPostCode)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
    $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserisExist) == '1'){  
         mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
         mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	     $saveNewProfileInformations = mysqli_query($this->db,"UPDATE dot_users SET shopping_fullname = '$UserFullName',shopping_phone_number = '$userphone', shopping_full_address ='$useraddress', postcode = '$userPostCode',idorpssportnumber = '$userPassportID' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
        return true;
     }else{
	    return false; 
   }
}
/*Insert Order  ()*/
public function Dot_InsertOrder($uid, $postID, $postOwnerID,$dataCountry,$dataCity,$dataState,$profileShoppingFullName,$profileShoppingPhoneNumber,$profileShoppingFullAddress,$dataUserPostCode,$dataUserPassportCodeOrIdNumber)
{
   $uid = mysqli_real_escape_string($this->db, $uid);
   $postID = mysqli_real_escape_string($this->db, $postID);
   $postOwnerID = mysqli_real_escape_string($this->db, $postOwnerID);
   $time = time();
       $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	   $checkPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id = '$postID' AND post_type = 'p_product'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserisExist) == 1 && mysqli_num_rows($checkPostExist) == 1){   
		  mysqli_query($this->db,"UPDATE dot_user_cart SET purchase_status = '2', time = '$time', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber' WHERE product_id_fk = '$postID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
				return true;
		  return true;
	}else{return false;}
} 
// All Countries
public function Dot_Countries(){
    $Countries = mysqli_query($this->db,"SELECT id, sortname, name,phonecode FROM dot_countries") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($Countries)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
// Update city and state if changed country
public function Dot_UpdateCityState($GetUserID)
{
   $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
   $countryNameQuery = mysqli_query($this->db,"UPDATE dot_users SET city = NULL , state = NULL WHERE user_id = '$GetUserID'") or die(mysqli_error($this->db));
   return true;
}
// Save and Get Borned Country
public function Dot_SaveCountry($saveCountry, $GetUserID)
{
    $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
    $saveCountry = mysqli_real_escape_string($this->db, $saveCountry);
	$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$GetUserID' AND user_status = '1'") or die(mysqli_error($this->db));
	$CheckCountryCode = mysqli_query($this->db,"SELECT id, sortname, name, phonecode FROM dot_countries WHERE sortname = '$saveCountry'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($CheckCountryCode) == 1){
	    $data = mysqli_fetch_array($CheckCountryCode, MYSQLI_ASSOC);
		$countryName = $data['name'];
		$countryNameQuery = mysqli_query($this->db,"UPDATE dot_users SET country = '$saveCountry' WHERE user_id = '$GetUserID'") or die(mysqli_error($this->db));
		return $countryName;
	}else{
	   return false;
	}
}
// Save Born City and Get States
public function Dot_SaveCities($city, $GetUserID)
{
	 $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
     $city = mysqli_real_escape_string($this->db, $city);
	 $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$GetUserID' AND user_status = '1'") or die(mysqli_error($this->db));
	 $CheckCityID = mysqli_query($this->db,"SELECT id, name, country_id FROM dot_states WHERE id = '$city'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($CheckCityID) == 1){
		   $data = mysqli_fetch_array($CheckCityID, MYSQLI_ASSOC);
		   $stateID = $data['id'];
		   $stateName = $data['name'];
		   $countryNameQuery = mysqli_query($this->db,"UPDATE dot_users SET city = '$stateID' WHERE user_id = '$GetUserID'") or die(mysqli_error($this->db));
		   return $stateName;
	 }else{
	     return false;
	 }
}
// Get All Cities
public function Dot_UserCities($dataCountry, $GetUserID)
{ 
     $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
     $dataCountry = mysqli_real_escape_string($this->db, $dataCountry);
	 $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$GetUserID' AND user_status = '1'") or die(mysqli_error($this->db));
	 $CheckCountryCode = mysqli_query($this->db,"SELECT id, sortname, name, phonecode FROM dot_countries WHERE sortname = '$dataCountry'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckUserExist) == 1 ){  
		 $GetCountryID = mysqli_fetch_array($CheckCountryCode, MYSQLI_ASSOC);
		 $countryID = $GetCountryID['id'];  
		 $UserCities = mysqli_query($this->db,"SELECT id, name, country_id FROM dot_states WHERE country_id = ' $countryID'") or die(mysqli_error($this->db)); 
		  while($row=mysqli_fetch_array($UserCities)) { 
				$data[]=$row;
			 }
			 if(!empty($data)) {
				 return $data;
			 }  
	 } else {
	    return false;
	 }
}
// Get User City States
public function Dot_GetCityStates($dataStateID, $GetUserID)
{
     $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
     $dataStateID = mysqli_real_escape_string($this->db, $dataStateID);
	 $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$GetUserID' AND user_status = '1'") or die(mysqli_error($this->db));
	 $CheckStateID = mysqli_query($this->db,"SELECT id, name, country_id FROM dot_states WHERE id = '$dataStateID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($CheckStateID) == 1){
		 $allcities = mysqli_query($this->db,"SELECT id, name, state_id FROM dot_cities WHERE state_id = '$dataStateID'") or die(mysqli_error($this->db));
		 while($row=mysqli_fetch_array($allcities)) { 
				$data[]=$row;
			 }
			 if(!empty($data)) {
				 return $data;
			 } 
	 }
}
// Save State and Get State Name
public function Dot_GetSavedState($StateID, $GetUserID)
{
	 $GetUserID = mysqli_real_escape_string($this->db, $GetUserID);
     $StateID = mysqli_real_escape_string($this->db, $StateID);
	 $CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$GetUserID'  AND user_status = '1'") or die(mysqli_error($this->db));
	 $CheckCiryID = mysqli_query($this->db,"SELECT id, name, state_id FROM dot_cities WHERE id = '$StateID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($CheckCiryID) == 1){
		 $data = mysqli_fetch_array($CheckCiryID, MYSQLI_ASSOC);
		   $stateName = $data['name'];
		   $countryNameQuery = mysqli_query($this->db,"UPDATE dot_users SET state = '$StateID' WHERE user_id = '$GetUserID'") or die(mysqli_error($this->db));
		   return $stateName;
	 }else{
	     return false;
	 }
}
// Get User Country Name
public function Dot_CountryName($countryCode)
{
   $countryCode = mysqli_real_escape_string($this->db, $countryCode);
   $GetCountryNameQuery = mysqli_query($this->db,"SELECT sortname, name FROM dot_countries WHERE sortname = '$countryCode'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($GetCountryNameQuery,MYSQLI_ASSOC);
   $GetCountryName = $data['name'];
   return $GetCountryName;
}
// Get User City
public function Dot_UserCity($cityCode)
{
   $cityCode = mysqli_real_escape_string($this->db, $cityCode);
   $CheckCityID = mysqli_query($this->db,"SELECT id, name, country_id FROM dot_states WHERE id = '$cityCode'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckCityID) == 1){
        $data = mysqli_fetch_array($CheckCityID, MYSQLI_ASSOC);
		return $data['name']; 
   } 
}
// Get User State  ()
public function Dot_UserState($userStateID)
{
   $userStateID = mysqli_real_escape_string($this->db, $userStateID);
   $CheckCityID = mysqli_query($this->db,"SELECT id, name, state_id FROM dot_cities WHERE id = '$userStateID'") or die(mysqli_error($this->db));
   if(mysqli_num_rows($CheckCityID) == 1){
        $data = mysqli_fetch_array($CheckCityID, MYSQLI_ASSOC);
		return $data['name'];
		
   } 
}
/*Cargo List*/
public function Dot_CargoExpressList()
{
    $query = mysqli_query($this->db,"SELECT cargo_id, cargo_name,cargo_url FROM dot_cargos") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 } 
}
/*Cargo Name and Link*/
public function Dot_CargoExpressDetail($cargoID)
{
    $query = mysqli_query($this->db,"SELECT cargo_id, cargo_name,cargo_url FROM dot_cargos WHERE cargo_id = '$cargoID'") or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	return $data;
}
/*Update Customer Shopping Cargo Status*/  
public function Dot_UpdateCargoStatuus($uid, $customerID, $cartID,$cargoCampany,$trackingNumber)
{
        $uid = mysqli_real_escape_string($this->db, $uid);
		$customerID = mysqli_real_escape_string($this->db, $customerID);
		$cartID = mysqli_real_escape_string($this->db, $cartID);
		$cargoCampany = mysqli_real_escape_string($this->db, $cargoCampany);
		$trackingNumber = mysqli_real_escape_string($this->db, $trackingNumber);
		$time = time();
		$checkUserCart = mysqli_query($this->db,"SELECT user_id_fk, cart_id,product_owner_id FROM dot_user_cart WHERE cart_id = '$cartID' AND product_owner_id = '$uid' AND cargo_campany IS NULL") or die(mysqli_error($this->db));
		$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
		$checkCargoisExist = mysqli_query($this->db,"SELECT cargo_id FROM dot_cargos WHERE cargo_id= '$cargoCampany'") or die(mysqli_error($this->db));
		if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($checkUserCart) == 1 && mysqli_num_rows($checkCargoisExist) == 1){
		    $countryNameQuery = mysqli_query($this->db,"UPDATE dot_user_cart SET cargo_campany = '$cargoCampany', cargo_tracking_number = '$trackingNumber', order_status = '1', time = '$time', cargo_delivery_status = '1' WHERE cart_id = '$cartID'") or die(mysqli_error($this->db)); 
		   return true;
		 }else{
			 return false;
		 }
}
/*Ask Delivery Status for Product to customer*/
public function Dot_AskDeliveryStatus($uid, $cartID)
{
        $uid = mysqli_real_escape_string($this->db, $uid); 
		$cartID = mysqli_real_escape_string($this->db, $cartID); 
		$time = time();
		$checkUserCart = mysqli_query($this->db,"SELECT user_id_fk, cart_id,product_owner_id FROM dot_user_cart WHERE cart_id = '$cartID' AND product_owner_id = '$uid'") or die(mysqli_error($this->db));
		$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
		if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($checkUserCart) == 1){
		    $countryNameQuery = mysqli_query($this->db,"UPDATE dot_user_cart SET cargo_delivery_status = '2' WHERE cart_id = '$cartID'") or die(mysqli_error($this->db)); 
		   return true;
		 }else{
			 return false;
		 }
}
/*Answer*/
public function Dot_YesIGotProduct($uid, $cartID)
{
        $uid = mysqli_real_escape_string($this->db, $uid); 
		$cartID = mysqli_real_escape_string($this->db, $cartID); 
		$time = time();
		$checkUserCart = mysqli_query($this->db,"SELECT user_id_fk, cart_id,product_owner_id FROM dot_user_cart WHERE cart_id = '$cartID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db));
		$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1'") or die(mysqli_error($this->db)); 
		if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($checkUserCart) == 1){
		    $countryNameQuery = mysqli_query($this->db,"UPDATE dot_user_cart SET order_status = '2',cargo_delivery_status = '3' WHERE cart_id = '$cartID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db)); 
		   return true;
		 }else{
			 return false;
		 }
}
/*Update Delivery Status*/
public function Dot_YesIGotProductAutoUpdate($uid, $cartID)
{
     $countryNameQuery = mysqli_query($this->db,"UPDATE dot_user_cart SET order_status = '2',cargo_delivery_status = '3' WHERE cart_id = '$cartID' AND user_id_fk = '$uid'") or die(mysqli_error($this->db)); 
}
/*Check All is Ok*/
public function Dot_CheckAllisOk($uid, $donateThisPost, $donateThisUser)
{
    $uid = mysqli_real_escape_string($this->db, $uid); 
	$donateThisPost = mysqli_real_escape_string($this->db, $donateThisPost); 
	$donateThisUser = mysqli_real_escape_string($this->db, $donateThisUser); 
	$CheckUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1'") or die(mysqli_error($this->db));
	$CheckPostExist = mysqli_query($this->db,"SELECT user_post_id FROM dot_user_posts WHERE user_post_id= '$donateThisPost' AND user_id_fk = '$donateThisUser'") or die(mysqli_error($this->db));  
	if(mysqli_num_rows($CheckUserExist) == 1 && mysqli_num_rows($CheckPostExist) == 1){ 
	   return true;
	 }else{
		 return false;
	 }
}
// Create new Pro Package
public function Dot_AddNewProPackage($uid, $newproPackageTitle,$newproPackageDescription,$newproPackageAmount,$newproPackageIcon,$newproPackageEvery,$newproPackageDwMy,$uniqKey)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
	 $newproPackageTitle = mysqli_real_escape_string($this->db, $newproPackageTitle); 
	 $newproPackageDescription = mysqli_real_escape_string($this->db, $newproPackageDescription); 
	 $newproPackageAmount = mysqli_real_escape_string($this->db, $newproPackageAmount);  
	 $newproPackageEvery = mysqli_real_escape_string($this->db, $newproPackageEvery);
	 $newproPackageDwMy = mysqli_real_escape_string($this->db, $newproPackageDwMy);
	 $CheckUserIsAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 $checkTitleExist = mysqli_query($this->db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$newproPackageTitle'") or die(mysqli_error($this->db));
	 $checkDescriptionExist = mysqli_query($this->db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$newproPackageDescription'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($CheckUserIsAdmin) == 1 && mysqli_num_rows($checkTitleExist) == 1 && mysqli_num_rows($checkDescriptionExist) == 1){ 
	    mysqli_query($this->db,"INSERT INTO dot_pro_price_table(price_type,price_amounth,price_info,price_key_number,price_icon,pro_price_time,pro_price_year_day_month_week)VALUES('$newproPackageTitle','$newproPackageAmount','$newproPackageDescription','$uniqKey','$newproPackageIcon','$newproPackageEvery','$newproPackageDwMy')") or die(mysqli_error($this->db));
	   return true;
	 }else{
		 return false;
	 }
}
/*Get Pro Package Details From ID*/
public function Dot_GetProPackageItemFromID($uid, $editPackageID)
{
	$uid = mysqli_real_escape_string($this->db, $uid); 
	$editPackageID = mysqli_real_escape_string($this->db, $editPackageID); 
	$CheckUserIsAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid'") or die(mysqli_error($this->db));
	$checkPriceIDExist = mysqli_query($this->db,"SELECT price_id FROM dot_pro_price_table WHERE price_id= '$editPackageID'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserIsAdmin) == 1 && mysqli_num_rows($checkPriceIDExist) == 1){ 
          $query = mysqli_query($this->db,"SELECT price_type,price_amounth,price_info,price_key_number,price_icon,pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_id = '$editPackageID'") or die(mysqli_error($this->db));
	      $data = mysqli_fetch_array($query, MYSQLI_ASSOC); 
          return $data;
	  }else{
		 return false;
	 }
}
// Update Pro Package
public function Dot_UpdateProPackage($uid, $newproPackageTitle,$newproPackageDescription,$newproPackageAmount,$newproPackageIcon,$newproPackageEvery,$newproPackageDwMy,$packageID)
{
     $uid = mysqli_real_escape_string($this->db, $uid); 
	 $newproPackageTitle = mysqli_real_escape_string($this->db, $newproPackageTitle); 
	 $newproPackageDescription = mysqli_real_escape_string($this->db, $newproPackageDescription); 
	 $newproPackageAmount = mysqli_real_escape_string($this->db, $newproPackageAmount);  
	 $newproPackageEvery = mysqli_real_escape_string($this->db, $newproPackageEvery);
	 $newproPackageDwMy = mysqli_real_escape_string($this->db, $newproPackageDwMy);
	 $packageID = mysqli_real_escape_string($this->db, $packageID); 
	 $CheckUserIsAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 $checkPriceIDExist = mysqli_query($this->db,"SELECT price_id FROM dot_pro_price_table WHERE price_id = '$packageID'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($CheckUserIsAdmin) == 1 && mysqli_num_rows($checkPriceIDExist) == 1){ 
	    $updateProPackage = mysqli_query($this->db,"UPDATE dot_pro_price_table SET price_type = '$newproPackageTitle',price_amounth= '$newproPackageAmount',price_info = '$newproPackageDescription',price_icon = '$newproPackageIcon',pro_price_time = '$newproPackageEvery',pro_price_year_day_month_week = '$newproPackageDwMy' WHERE price_id = '$packageID'") or die(mysqli_error($this->db));  
	   return true;
	 }else{
		 return false;
	 }
}
// Avantage Status open/close 
public function Dot_ProAvantageStatus($uid, $status,$theID) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $status = mysqli_real_escape_string($this->db, $status);
	 $theID = mysqli_real_escape_string($this->db, $theID);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 $avantageStatusID = mysqli_query($this->db,"SELECT avantage_id FROM dot_pro_member_avantages WHERE avantage_id = '$theID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0 && mysqli_num_rows($avantageStatusID) == 1){
	      $updateAvantageStatus = mysqli_query($this->db,"UPDATE dot_pro_member_avantages SET avantage_status = '$status' WHERE  avantage_id = '$theID'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Price Table
public function Dot_ProPriceTableAvantagesList()
{
    $query = mysqli_query($this->db,"SELECT avantage_id,avantage_icon,avantage_title,avantage_desc,avantage_status FROM dot_pro_member_avantages WHERE avantage_status IN('0','1')") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  } 
}
// Delete Event End Event Family
public function Dot_DeleteProPackage($uid,$prPackageID)
{
	$uid = mysqli_real_escape_string($this->db,$uid);
	$prPackageID = mysqli_real_escape_string($this->db,$prPackageID);
	$CheckUserIsAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	 $checkPriceIDExist = mysqli_query($this->db,"SELECT price_id FROM dot_pro_price_table WHERE price_id = '$prPackageID'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($CheckUserIsAdmin) == 1 && mysqli_num_rows($checkPriceIDExist) == 1){ 
	      mysqli_query($this->db,"DELETE FROM dot_pro_price_table WHERE price_id = '$prPackageID'") or die(mysqli_error($this->db)); 
		  return true;
	 }else {
	    return false;
	 }  
}
// Video Post Mode open/close
public function Dot_ProSystemMode($uid, $ProSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $ProSystemMode = mysqli_real_escape_string($this->db, $ProSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET pro_system = '$ProSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Price Table Active Passive
public function Dot_ProPriceTableAvantagesStatus($tableID)
{
    $query = mysqli_query($this->db,"SELECT avantage_id,avantage_icon,avantage_title,avantage_desc,avantage_status FROM dot_pro_member_avantages WHERE avantage_status IN('0','1') AND avantage_id = '$tableID'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
    $status = $data['avantage_status'];
    if($status){
	    return $status;
	} else{return false;}
}
/*Update Show Online Offline Last seen Status*/
public function Dot_UpdateLastSeenStatusOpenClose($uid, $status)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $status = mysqli_real_escape_string($this->db, $status);
	 $checkUserisPro = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND pro_user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisPro) == 1){
	      $UpdateStatus = mysqli_query($this->db,"UPDATE dot_users SET show_online_offline_status = '$status' WHERE  user_id = '$uid'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/* Search Filter List*/
public function Dot_SearchItemFiltersList()
{
    $query = mysqli_query($this->db,"SELECT search_filter_id,search_filter_statuus,search_filter_key,search_filter_icon FROM dot_search_filter_items ORDER BY search_filter_statuus, search_filter_id") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
     }
	  if(!empty($data)) {
		 return $data;
	  }
} 
/*Detect Search Filter Status*/
public function Dot_SearchItemCheckerProUsers($theID,$uid)
{
	$theID = mysqli_real_escape_string($this->db, $theID);
	$uid = mysqli_real_escape_string($this->db, $uid);
    $query = mysqli_query($this->db,"SELECT search_filter_id,search_filter_statuus FROM dot_search_filter_items WHERE search_filter_id = '$theID' AND search_filter_statuus = '1' AND (SELECT pro_user_type FROM dot_users WHERE user_id = '$uid' AND pro_user_type = '1') = '1' ") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1){
		return 1;
	}else{
		$query2 = mysqli_query($this->db,"SELECT search_filter_id,search_filter_statuus FROM dot_search_filter_items WHERE search_filter_id = '$theID' AND search_filter_statuus = '0' AND (SELECT pro_user_type FROM dot_users WHERE user_id = '$uid' AND pro_user_type IN ('0','1')) = '1' ") or die(mysqli_error($this->db));
		if(mysqli_num_rows($query2) == 1){
		    return 1;
		}else{
			return  0;
		}
	}
}
 // Set Default Values For Filter Search
public function Dot_UpdateDefaultSearchFilter($uid, $defaultGender, $defaultOnlineOfflineStatus, $defaultAvatarStatus, $defaultAgeStart, $defaultAgeEnd, $defaultDistance, $defaultRelationShip, $defaultSexuality, $defaultHeight, $defaultWeight, $defaultLifeStyle , $defaultChildren , $defaultSmokingHabit, $defaultDrinkingHabit, $defaultBodyType, $defaultHairColor, $defaultEyeColor)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$CheckUserIsAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id= '$uid' AND user_status = '1' AND user_type = '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($CheckUserIsAdmin) == 1){
         $updateSearch = mysqli_query($this->db, "UPDATE dot_configuration SET
		 default_search_gender = '$defaultGender', 
		 default_search_onlineoffline = '$defaultOnlineOfflineStatus', 
		 default_search_avatarstatus = '$defaultAvatarStatus', 
		 default_search_agestart = '$defaultAgeStart', 
		 default_search_ageend = '$defaultAgeEnd', 
		 default_search_distance = '$defaultDistance', 
		 default_search_relationship = '$defaultRelationShip', default_search_sexuality = '$defaultSexuality', default_search_height = '$defaultHeight', default_search_weight = '$defaultWeight', default_search_lifestyle = '$defaultLifeStyle', default_search_children = '$defaultChildren', default_search_smokinghabit = '$defaultSmokingHabit', default_search_drinkinghabit = '$defaultDrinkingHabit', default_search_bodytype = '$defaultBodyType', default_search_haircolor = '$defaultHairColor', default_search_eyecolor = '$defaultEyeColor'  WHERE configuration_id = '1'") or die(mysqli_error($this->db));  
	}
}
// Earnings Pro Member from Stripe
public function Dot_TotalProSystemGatewayEarnings($gatewayType)
{
    $totalProEarn = mysqli_query($this->db,"SELECT SUM(amount) AS EarningTotal FROM dot_payments WHERE payment_option = '$gatewayType' AND payment_type = 'pm' AND payment_status = '1' ") or die(mysqli_error($this->db));  
	  $row = mysqli_fetch_array($totalProEarn, MYSQLI_ASSOC);   
	  if($row['EarningTotal']){
		   $earningTotal = $row['EarningTotal']; 
	     return $earningTotal;   
	  }else{
	     return 0;
	  }    
}
// Video Post Mode open/close
public function Dot_PointSystemMode($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_system_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Update Max Point*/
public function Dot_UpdateMaxPoint($uid, $hmpetod, $tmnopucgpd)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$hmpetod = mysqli_real_escape_string($this->db, $hmpetod);
	$tmnopucgpd = mysqli_real_escape_string($this->db, $tmnopucgpd);
	$checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
		  $UpdateMax = mysqli_query($this->db,"UPDATE dot_configuration SET point_equal_dolar = '$hmpetod', point_daily = '$tmnopucgpd' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		 return true;
	 }else{return false;}
}
/*Daily User Total Point*/
public function Dot_TotalEarningPointsInaDay($uid){
   $uid = mysqli_real_escape_string($this->db,$uid);  //  DATE(FROM_UNIXTIME(pointed_time))=CURDATE()
   $CountLike = mysqli_query($this->db,"SELECT SUM(point) AS earningPoints FROM dot_user_point_earnings WHERE DATE(FROM_UNIXTIME(pointed_time))=CURDATE() AND poninted_user_id = '$uid'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  if($row['earningPoints']){
	     return $row['earningPoints'];   
	  }else{
	     return 0;
	  } 
}
/*Update Points for One Post*/
public function Dot_UpdatePointsForOnePost($uid, $updateHowManyPointOneLike, $updateHowManyPointOneComment, $updateHowManyPointOnePost, $updateHowManyPointOneStorie, $updateHowManyPointOneVote)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$updateHowManyPointOneLike = mysqli_real_escape_string($this->db, $updateHowManyPointOneLike);
	$updateHowManyPointOneComment = mysqli_real_escape_string($this->db, $updateHowManyPointOneComment);
	$updateHowManyPointOnePost = mysqli_real_escape_string($this->db, $updateHowManyPointOnePost);
	$updateHowManyPointOneStorie = mysqli_real_escape_string($this->db, $updateHowManyPointOneStorie);
	$updateHowManyPointOneVote = mysqli_real_escape_string($this->db, $updateHowManyPointOneVote);
    $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
		  $UpdateMax = mysqli_query($this->db,"UPDATE dot_configuration SET point_like = '$updateHowManyPointOneLike', point_post = '$updateHowManyPointOnePost', point_stories = '$updateHowManyPointOneStorie', point_comment = '$updateHowManyPointOneComment',point_vote ='$updateHowManyPointOneVote' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		 return true;
	 }else{return false;}
}
// Mode open/close For Post Like 
public function Dot_PointSystemModeForLike($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_like_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Mode open/close For Post Like  
public function Dot_PointSystemModeForComment($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_comment_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Mode open/close For Post Like  
public function Dot_PointSystemModeForPost($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_post_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Mode open/close For Post Like  
public function Dot_PointSystemModeForStories($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_stories_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Mode open/close For Post Like  
public function Dot_PointSystemModeForVote($uid, $pointSystemMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $pointSystemMode = mysqli_real_escape_string($this->db, $pointSystemMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET point_vote_status = '$pointSystemMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// User Payout List
public function Dot_UserRequestedPayoutList($uid)
{
    $uid = mysqli_real_escape_string($this->db,$uid);
	$query = mysqli_query($this->db,"SELECT withdraw_id, withdraw_paypal_email, withdraw_amounth , withdraw_status , withdraw_time , withdrawal_iban_number , withdrawal_type  FROM dot_withdrawals WHERE withdraw_uid_fk = '$uid' AND withdraw_status = '0' ") or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		  // Store the result into array
		  $data[]=$row;
	   }
	   if(!empty($data)) {
		  // Store the result into array
		  return $data;
	   }  
}
// Mode open/close OneSignalStatus
public function Dot_OneSignalStatusMode($uid, $OneSignalMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $OneSignalMode = mysqli_real_escape_string($this->db, $OneSignalMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET one_signal_status = '$OneSignalMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}  
public function Dot_VerificationMailStatusMode($uid, $mailVerifyStatus) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $mailVerifyStatus = mysqli_real_escape_string($this->db, $mailVerifyStatus);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET verification_mail = '$mailVerifyStatus' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
} 
public function Dot_UpdateAfterScrollTags($afterThisNumber, $uid)
{  
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $afterThisNumber = mysqli_real_escape_string($this->db, $afterThisNumber); 
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updateShowAfterScroll = mysqli_query($this->db,"UPDATE dot_configuration SET show_hashtag_when = '$afterThisNumber' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
public function Dot_UpdateAfterScrollGoogleAds($afterThisNumber, $uid)
{  
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $afterThisNumber = mysqli_real_escape_string($this->db, $afterThisNumber); 
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updateShowAfterScroll = mysqli_query($this->db,"UPDATE dot_configuration SET show_google_ads_when = '$afterThisNumber' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
}
public function Dot_UpdateAfterScrollMayKnowUser($afterThisNumber, $uid)
{  
       $uid = mysqli_real_escape_string($this->db, $uid);
	   $afterThisNumber = mysqli_real_escape_string($this->db, $afterThisNumber); 
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) > 0){
		   $updateShowAfterScroll = mysqli_query($this->db,"UPDATE dot_configuration SET show_users_when = '$afterThisNumber' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	   }else{
	       return false;
	   }
} 
/*Change Private Account Settings 0 or 1 ==> 0 is everyone can see 1 is just friends can see*/
public function Dot_MessageAvailableOnProfile($uid, $privateSet)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$privateSet = mysqli_real_escape_string($this->db, $privateSet);
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == '1'){  
	     $updateNewPass = mysqli_query($this->db,"UPDATE dot_users SET message_available = '$privateSet' WHERE  user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
		 return true;
	 }else{
	    return false;
	 } 
}
// Enable Disable Profile Design Feature
public function Dot_EnableDisableProfileDesign($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET customize_profile_feature = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Enable Disable Background Image
public function Dot_EnableDisableProfileBackgroundImage($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET change_background = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Enable Disable Background Sound
public function Dot_EnableDisableProfileBackgroundSound($uid, $showHide) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $showHide = mysqli_real_escape_string($this->db, $showHide);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET change_background_sound = '$showHide' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Create a Market*/
public function Dot_CreateNewMarket($uid, $marketName, $marketFullName, $marketInformations)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $marketName = mysqli_real_escape_string($this->db, $marketName);
	 $time = time();
	 $checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'  AND user_status='1'") or die(mysqli_error($this->db)); 
	 $checkMarketUsernameExist = mysqli_query($this->db,"SELECT market_page_name FROM dot_user_market WHERE market_page_name = '$marketName'") or die(mysqli_error($this->db)); 
	 $checkThisUserHasAnotherMarket = mysqli_query($this->db,"SELECT market_place_owner_id FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));  
	 mysqli_query($this->db,"SET character_set_client=utf8mb4") or die(mysqli_error($this->db));
     mysqli_query($this->db,"SET character_set_connection=utf8mb4") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkUserisExist) == 1 && mysqli_num_rows($checkMarketUsernameExist) == 0 && mysqli_num_rows($checkThisUserHasAnotherMarket) == 0){
		   $insertQuery = mysqli_query($this->db,"INSERT INTO dot_user_market(market_place_owner_id,market_temporary_name,market_page_name, market_place_name,market_place_created_time,market_about)VALUES('$uid','$marketName','$marketName','$marketFullName','$time','$marketInformations')") or die(mysqli_error($this->db));
		   return true;
     }else{return false;}
}
/*Check Marketplace Name Already Exst*/
public function Dot_CheckMarketNameExist($marketName)
{
	 $marketName = mysqli_real_escape_string($this->db, $marketName);
     $checkMarketUsernameExist = mysqli_query($this->db,"SELECT market_page_name FROM dot_user_market WHERE market_page_name = '$marketName'") or die(mysqli_error($this->db)); 
	 if(mysqli_num_rows($checkMarketUsernameExist) == 1){
		 return true;
	 }
}
/*Check Marketplace created before by current user*/
public function Dot_CreatedMarketBefore($uid)
{
	 $uid = mysqli_real_escape_string($this->db, $uid);
     $checkThisUserHasAnotherMarket = mysqli_query($this->db,"SELECT market_place_owner_id FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));  
	 if(mysqli_num_rows($checkThisUserHasAnotherMarket) == 1){
		 return true;
	 }
} 
// Get Market Url Name
public function Dot_GetMarketUrlName($uid)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
	$query = mysqli_query($this->db,"SELECT market_temporary_name FROM `dot_user_market` WHERE market_place_owner_id='$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1){
		$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		if($data['market_temporary_name']) {
			$name=$data['market_temporary_name'];
			return  $name;
		}
	}
	
}
/*Get User Last Login*/
public function Dot_GetUserLastLoginForChat($uid)
{
   $uid = mysqli_real_escape_string($this->db,$uid); 
   $query = mysqli_query($this->db,"SELECT last_login FROM dot_users WHERE user_id='$uid' AND user_status ='1'") or die(mysqli_error($this->db));
   $data = mysqli_fetch_array($query,MYSQLI_ASSOC);
   if($data['last_login']) {
		$lstLogin=$data['last_login'];
	    return $lstLogin;
	}
} 
/*Update Cargo Informations*/
public function Dot_UpdateCargoDetails($uid, $cargoName, $cargoId, $cargoUrl)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
	$cargoName=mysqli_real_escape_string($this->db,$cargoName); 
	$cargoId=mysqli_real_escape_string($this->db,$cargoId); 
	$cargoUrl=mysqli_real_escape_string($this->db,$cargoUrl);  
    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
     $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  $checkCargoIDExist = mysqli_query($this->db,"SELECT cargo_id FROM dot_cargos WHERE cargo_id = '$cargoId'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1 && mysqli_num_rows($checkCargoIDExist) == 1){
		   $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_cargos SET cargo_name = '$cargoName', cargo_url = '$cargoUrl' WHERE  cargo_id = '$cargoId'") or die(mysqli_error($this->db)); 
		   return true;
	 }else{
	       return false;
	 }
}
/*Update Cargo Informations*/
public function Dot_SaveNewCargo($uid, $cargoName, $cargoUrl)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
	$cargoName=mysqli_real_escape_string($this->db,$cargoName);  
	$cargoUrl=mysqli_real_escape_string($this->db,$cargoUrl);  
    mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db));
     $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1){ 
		   $insertQuery = mysqli_query($this->db,"INSERT INTO dot_cargos(cargo_name,cargo_url)VALUES('$cargoName','$cargoUrl')") or die(mysqli_error($this->db));
		   return true;
	 }else{
	       return false;
	 }
}
/*Delete Cargo*/
public function Dot_DeleteCargo($uid, $cargoId)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $cargoId=mysqli_real_escape_string($this->db,$cargoId);
	  $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  $checkCargoIDExist = mysqli_query($this->db,"SELECT cargo_id FROM dot_cargos WHERE cargo_id = '$cargoId'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1 && mysqli_num_rows($checkCargoIDExist) == 1){ 
	         mysqli_query($this->db,"DELETE FROM dot_cargos WHERE cargo_id = '$cargoId'") or die(mysqli_error($this->db)); 
			 return true;
	 }else{return false;}
}
/*Insert a New Announcement*/
public function Dot_InsertNewAnnouncement($uid, $announceType,$announceTitle,$announcement)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $announceType=mysqli_real_escape_string($this->db,$announceType); 
	 $announceTitle=mysqli_real_escape_string($this->db,$announceTitle);  
	 $time = time();  
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1){ 
	       $insertQuery = mysqli_query($this->db,"INSERT INTO dot_announcements(an_type,annnouncement_text,announcement_title,announce_time)VALUES('$announceType','$announcement','$announceTitle','$time')") or die(mysqli_error($this->db));
		   $query = mysqli_query($this->db,"SELECT an_id,an_type, annnouncement_text,announcement_title,announce_time FROM dot_announcements ORDER BY an_id DESC LIMIT 1") or die(mysqli_error($this->db)); 
	       $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	    return $result;
	 }else{return false;}
}
/*Get Last Announcement*/
public function Dot_GetLastAnnouncement($uid)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
    $query = mysqli_query($this->db,"SELECT an_id,an_type, annnouncement_text, announcement_title,announce_time FROM dot_announcements WHERE announce_status = '1' ORDER BY an_id DESC LIMIT 1") or die(mysqli_error($this->db));
	$Check=mysqli_fetch_array($query, MYSQLI_ASSOC);
	$getAID = $Check['an_id']; 
	 $checkUserSawBeforeThisAnnounce = mysqli_query($this->db,"SELECT an_id_fk, an_uid_fk FROM dot_announcement_saw WHERE an_id_fk = '$getAID' AND an_uid_fk = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserSawBeforeThisAnnounce) == '0'){
		$query_two = mysqli_query($this->db,"SELECT an_id,an_type, annnouncement_text, announcement_title,announce_time FROM dot_announcements WHERE announce_status = '1' ORDER BY an_id DESC LIMIT 1") or die(mysqli_error($this->db));
	   while($row=mysqli_fetch_array($query_two, MYSQLI_ASSOC)) {
		  // Store the result into array
	     $data[]=$row;
		 }
		  if(!empty($data)) {
			 return $data;
		  }
	}else{
		return false;
	}  
} 
/*Insert Saw*/
public function Dot_SawAnnouncement($uid, $sawID)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
	$sawID=mysqli_real_escape_string($this->db,$sawID); 
      $checkuserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status='1'") or die(mysqli_error($this->db));
	  $checkAnnouncementIDExist = mysqli_query($this->db,"SELECT an_id FROM dot_announcements WHERE an_id = '$sawID'") or die(mysqli_error($this->db));
	  $time = time();
	  if(mysqli_num_rows($checkuserisExist) == 1 && mysqli_num_rows($checkAnnouncementIDExist) == 1){ 
	         mysqli_query($this->db,"INSERT INTO dot_announcement_saw(an_id_fk,an_uid_fk,an_saw_time)VALUES('$sawID','$uid','$time')") or die(mysqli_error($this->db)); 
			 return true;
	 }else{return false;}
}
/*Get Announcement From ID for Edit*/
public function Dot_GetAnnouncementDetailsFromID($announceID)
{
     $announceID=mysqli_real_escape_string($this->db,$announceID); 
	 $checkAnnouncementIDExist = mysqli_query($this->db,"SELECT an_id FROM dot_announcements WHERE an_id = '$announceID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkAnnouncementIDExist) == 1){ 
		 $query = mysqli_query($this->db,"SELECT an_id,an_type, annnouncement_text, announcement_title,announce_time, announce_status FROM dot_announcements WHERE an_id = '$announceID'") or die(mysqli_error($this->db));
		 $data=mysqli_fetch_array($query, MYSQLI_ASSOC);
		 return $data;
	 }
}
/*Save Edited Announcement Details*/
public function Dot_SaveEditedAnnounceDetails($uid, $editedAnnounceID, $editedAnnounceText,$editedAnnounceTitle,$editedAnnounceType)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $editedAnnounceID=mysqli_real_escape_string($this->db,$editedAnnounceID); 
	 $editedAnnounceText=mysqli_real_escape_string($this->db,$editedAnnounceText); 
	 $editedAnnounceTitle=mysqli_real_escape_string($this->db,$editedAnnounceTitle); 
	 $editedAnnounceType=mysqli_real_escape_string($this->db,$editedAnnounceType);  
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	 $checkAnnouncementIDExist = mysqli_query($this->db,"SELECT an_id FROM dot_announcements WHERE an_id = '$editedAnnounceID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1 && mysqli_num_rows($checkAnnouncementIDExist) == 1){ 
	         $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_announcements SET an_type = '$editedAnnounceType', annnouncement_text = '$editedAnnounceText', announcement_title = '$editedAnnounceTitle' WHERE  an_id = '$editedAnnounceID'") or die(mysqli_error($this->db));
			 return true;
	 }else{return false;}
}
/*Delete Announcement*/
public function Dot_DeleteAnnouncement($uid, $anID)
{
    $uid=mysqli_real_escape_string($this->db,$uid); 
	$anID=mysqli_real_escape_string($this->db,$anID); 
	$checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	 $checkAnnouncementIDExist = mysqli_query($this->db,"SELECT an_id FROM dot_announcements WHERE an_id = '$anID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1 && mysqli_num_rows($checkAnnouncementIDExist) == 1){ 
	         mysqli_query($this->db,"DELETE FROM dot_announcements WHERE an_id = '$anID'") or die(mysqli_error($this->db)); 
			 mysqli_query($this->db,"DELETE FROM dot_announcement_saw WHERE an_id_fk = '$anID'") or die(mysqli_error($this->db));
			 return true;
	 }else{return false;}
}
/*Update Announcement Status*/
public function Dot_UpdateAnnouncementStatus($uid, $modeAnnouncementID, $modeVal)
{
	$uid=mysqli_real_escape_string($this->db,$uid); 
	$modeAnnouncementID=mysqli_real_escape_string($this->db,$modeAnnouncementID); 
	$modeVal=mysqli_real_escape_string($this->db,$modeVal); 
     $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	 $checkAnnouncementIDExist = mysqli_query($this->db,"SELECT an_id FROM dot_announcements WHERE an_id = '$modeAnnouncementID'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkuserisAdmin) == 1 && mysqli_num_rows($checkAnnouncementIDExist) == 1){ 
	     $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_announcements SET announce_status = '$modeVal' WHERE  an_id = '$modeAnnouncementID'") or die(mysqli_error($this->db));
		 return true;
	 }else{return false;}
} 
/*All Followers For User Profile*/
public function UserBirthDay($uid) 
{
    $uid = mysqli_real_escape_string($this->db, $uid);  
	$allFriendsQuery = mysqli_query($this->db,"
	SELECT DISTINCT 
	F.friend_id, F.user_one, F.user_two, U.user_id,U.user_name,U.user_fullname,U.last_login, U.user_birthday,U.user_birthmonth 
	FROM dot_users U, dot_friends F  
	WHERE U.user_status = '1' AND F.user_one=U.user_id AND F.user_two='$uid' AND 
    U.user_birthmonth = MONTH(NOW()) AND U.user_birthday = DAY(NOW())  AND (F.role='flwr' OR F.role = 'fri') 
	ORDER BY F.user_two DESC LIMIT " .$this->perpage) or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($allFriendsQuery)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) { 
	    return $data;
	 }  
}
public function Dot_UpdateTwilio($uid, $updateTwilioSID,$twilioKeySID, $twilioAKeyID,$twilioVideoCallTime,$twilioVideoCallDialTime)
{
      $uid=mysqli_real_escape_string($this->db,$uid); 
	  $updateTwilioSID=mysqli_real_escape_string($this->db,$updateTwilioSID); 
	  $twilioKeySID=mysqli_real_escape_string($this->db,$twilioKeySID); 
	  $twilioAKeyID=mysqli_real_escape_string($this->db,$twilioAKeyID); 
	  $twilioVideoCallTime=mysqli_real_escape_string($this->db,$twilioVideoCallTime); 
	  $twilioVideoCallDialTime=mysqli_real_escape_string($this->db,$twilioVideoCallDialTime); 
	   $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	   if(mysqli_num_rows($checkuserisAdmin) == 1){
	        $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_configuration SET twilio_account_sid = '$updateTwilioSID',twilio_key_sid = '$twilioKeySID',twilo_api_key_secret = '$twilioAKeyID',video_call_call_time = '$twilioVideoCallTime',video_call_dial_time = '$twilioVideoCallDialTime' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		 return true;
	  }else{return false;}
}
/*Get State Name From ID*/
public function Dot_GetStateNameFromID($id)
{
     $id=mysqli_real_escape_string($this->db,$id); 
	 $query = mysqli_query($this->db,"SELECT name FROM dot_states WHERE id = '$id'") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 if($data['name']) {
		$name=$data['name'];
	    return  $name;
	 } 
}
/*Get Country Name From ID*/
public function Dot_GetCountryNameFromID($id)
{
     $id=mysqli_real_escape_string($this->db,$id); 
	 $query = mysqli_query($this->db,"SELECT name FROM dot_countries WHERE id = '$id'") or die(mysqli_error($this->db));
	 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 if($data['name']) {
		$name=$data['name'];
	    return  $name;
	 } 
}
/*Update City*/
public function Dot_UpdateCityNameFromID($uid, $cityID, $city)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $cityID=mysqli_real_escape_string($this->db,$cityID); 
	 $city=mysqli_real_escape_string($this->db,$city); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){
		  $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_cities SET name = '$city' WHERE id = '$cityID'") or die(mysqli_error($this->db));
		  return true;
	  }else{return false;}
}
/*Update City*/
public function Dot_UpdateCountryNameFromID($uid, $cityID, $city)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $cityID=mysqli_real_escape_string($this->db,$cityID); 
	 $city=mysqli_real_escape_string($this->db,$city); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){
		  $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_countries SET name = '$city' WHERE id = '$cityID'") or die(mysqli_error($this->db));
		  return true;
	  }else{return false;}
}
/*Update City*/
public function Dot_UpdateStateNameFromID($uid, $cityID, $city)
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $cityID=mysqli_real_escape_string($this->db,$cityID); 
	 $city=mysqli_real_escape_string($this->db,$city); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){
		  $updateCargoInfos = mysqli_query($this->db,"UPDATE dot_states SET name = '$city' WHERE id = '$cityID'") or die(mysqli_error($this->db));
		  return true;
	  }else{return false;}
}
/*Delete City*/
public function Dot_DeleteThisCityFomData($uid, $cityID) 
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $cityID=mysqli_real_escape_string($this->db,$cityID); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){ 
	         $getStateID = mysqli_query($this->db,"SELECT state_id FROM dot_cities WHERE id = '$cityID'") or die(mysqli_error($this->db));
	         $data=mysqli_fetch_array($getStateID,MYSQLI_ASSOC);
			 $deleteThisStateID = $data['state_id']; 
			 mysqli_query($this->db,"DELETE FROM dot_cities WHERE id = '$cityID'") or die(mysqli_error($this->db));  
			 mysqli_query($this->db,"DELETE FROM dot_states WHERE id = '$deleteThisStateID'") or die(mysqli_error($this->db));  
			 return true;
	  }else{return false;}
}
/*Delete Country*/
public function Dot_DeleteThisCountryFomData($uid, $countryID) 
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $countryID=mysqli_real_escape_string($this->db,$countryID); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){  
	         $getStateID = mysqli_query($this->db,"SELECT id FROM dot_states WHERE country_id = '$countryID'") or die(mysqli_error($this->db));
	         $data=mysqli_fetch_array($getStateID,MYSQLI_ASSOC);
			 $deleteThisStateID = $data['id']; 
			 mysqli_query($this->db,"DELETE FROM dot_cities WHERE id = '$deleteThisStateID'") or die(mysqli_error($this->db));
			 mysqli_query($this->db,"DELETE FROM dot_countries WHERE id = '$countryID'") or die(mysqli_error($this->db));  
			 mysqli_query($this->db,"DELETE FROM dot_states WHERE country_id = '$countryID'") or die(mysqli_error($this->db));  
			 return true;
	  }else{return false;}
}
/*Delete State*/
public function Dot_DeleteThisStateFomData($uid, $stateID) 
{
     $uid=mysqli_real_escape_string($this->db,$uid); 
	 $stateID=mysqli_real_escape_string($this->db,$stateID); 
	 $checkuserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type='1'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkuserisAdmin) == 1){   
			 mysqli_query($this->db,"DELETE FROM dot_states WHERE id = '$stateID'") or die(mysqli_error($this->db));  
			 return true;
	  }else{return false;}
}
/*Iyzico Mode uupdate*/ 
public function Dot_IyziCoMode($uid, $iyziCoMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $iyziCoMode = mysqli_real_escape_string($this->db, $iyziCoMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET iyzico_payment_mode = '$iyziCoMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Iyzico Mode uupdate*/ 
public function Dot_IyziCoOnOf($uid, $iyziCoMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $iyziCoMode = mysqli_real_escape_string($this->db, $iyziCoMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET iyzico_active_pasive = '$iyziCoMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Iyzico Mode uupdate*/ 
public function Dot_AutHorizeMode($uid, $authorizeMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $authorizeMode = mysqli_real_escape_string($this->db, $authorizeMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET authorize_payment_mode = '$authorizeMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Iyzico Mode uupdate*/ 
public function Dot_AutHorizeOnOf($uid, $authorizeOnOff) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $authorizeOnOff = mysqli_real_escape_string($this->db, $authorizeOnOff);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	      $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET authorizenet_active_pasive = '$authorizeOnOff' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
/*Check User is Post Owner*/
public function Dot_CheckOwner($uid, $postID)
{
	$uid = mysqli_real_escape_string($this->db, $uid);
	$postID = mysqli_real_escape_string($this->db, $postID);
    $query = mysqli_query($this->db,"SELECT user_id_fk, user_post_id FROM dot_user_posts WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status= '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkUserisExist) == 1){
	   return true;
	}else{return false;}
}
/*Update Who Can See*/
public function Dot_UpdateWhoCanSee($uid, $postID,$whoCanSee)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$postID = mysqli_real_escape_string($this->db, $postID);
    $query = mysqli_query($this->db,"SELECT user_id_fk, user_post_id FROM dot_user_posts WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status= '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkUserisExist) == 1){
	   $UpdateMode = mysqli_query($this->db,"UPDATE dot_user_posts SET who_can_see_post = '$whoCanSee' WHERE  user_post_id = '$postID'") or die(mysqli_error($this->db));
	   return true;
	}else{return false;}
}
/*Get Who Can See Setted this post*/
public function Dot_GetWhoCanSeeThisPostSet($uid, $postID)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
	$postID = mysqli_real_escape_string($this->db, $postID);
    $query = mysqli_query($this->db,"SELECT user_id_fk, user_post_id FROM dot_user_posts WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
	$checkUserisExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_status= '1'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($query) == 1 && mysqli_num_rows($checkUserisExist) == 1){
	     $query = mysqli_query($this->db,"SELECT who_can_see_post FROM dot_user_posts WHERE user_id_fk = '$uid' AND user_post_id = '$postID'") or die(mysqli_error($this->db));
		 $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		 if($data['who_can_see_post']) {
			$whcs=$data['who_can_see_post'];
			return  $whcs;
		 } 
	}else{return false;}
}
/*Update Search Active Pasive*/
public function Dot_UpdateSearchFilterStatus($uid, $id, $status)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $id = mysqli_real_escape_string($this->db, $id);
	 $status = mysqli_real_escape_string($this->db, $status);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_search_filter_items SET search_filter_statuus = '$status' WHERE  search_filter_id = '$id'") or die(mysqli_error($this->db));
	       return true;    
	 }else{return false;}
}
/*Generate Fake User*/
public function Dot_GenerateFakeUsers($uid,$fakeUserEmail,$fakeUserUsername,$fakeUserFullName,$fakeUserGender,$fakeUserPassword,$fakeUserBirthDay,$fakeUserBirthMonth,$fakeuserBithYear,$fakeUserRegisterTime,$fakeUserCountry,$fakeUserLatitude,$fakeUserLongitude)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
         $query = mysqli_query($this->db,"INSERT INTO `dot_users`(user_email,user_name,user_fullname,user_gender,user_password,user_birthday,user_birthmonth,user_birthyear,user_status,user_registered,country,ulat,ulong,user_fake)VALUES('$fakeUserEmail','$fakeUserUsername','$fakeUserFullName','$fakeUserGender','$fakeUserPassword','$fakeUserBirthDay','$fakeUserBirthMonth','$fakeuserBithYear','1','$fakeUserRegisterTime','$fakeUserCountry','$fakeUserLatitude','$fakeUserLongitude','1')") or die(mysqli_error($this->db));  
	 return true;
	 }else{return false;}
} 
/*Update Currencies*/
public function Dot_UpdatePayPalCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1' ") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET paypal_crncy = '$crncy' WHERE configuration_id = '1' ") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdateIyzicoCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET iyzico_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdateBitpayCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET bitpay_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdateAuthorizeCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET authorize_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdatePayStackCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET paystack_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdateStripeCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET stripe_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
public function Dot_UpdateRazorPayCurrency($uid, $crncy)
{
    $uid = mysqli_real_escape_string($this->db, $uid);
     $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) == 1){
		   $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET razorpay_crncy = '$crncy' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
		   return true;
	 }else{return false;}
}
// Before After Image Post Mode open/close
public function Dot_VideoAutoPlayMode($uid, $FilterPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $FilterPostMode = mysqli_real_escape_string($this->db, $FilterPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET video_autoplay = '$FilterPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Before After Image Post Mode open/close
public function Dot_VideoAutoMuteMode($uid, $FilterPostMode) 
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $FilterPostMode = mysqli_real_escape_string($this->db, $FilterPostMode);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMode = mysqli_query($this->db,"UPDATE dot_configuration SET video_play_sound = '$FilterPostMode' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
// Update Main Language
public function Dot_UpdateDefaultTheme($uid, $styleNumber)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $styleNumber = mysqli_real_escape_string($this->db, $styleNumber);
	 $checkUserisAdmin = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkUserisAdmin) > 0){
	     $UpdateMainLang = mysqli_query($this->db,"UPDATE dot_configuration SET default_style = '$styleNumber' WHERE  configuration_id = '1'") or die(mysqli_error($this->db));
		  return true;
	 }else{
	     return false;
	 }
}
}  
?>