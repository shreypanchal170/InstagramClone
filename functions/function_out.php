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
class DOT_GET {
private $db;

public function __construct($db) 
{
  $this->db = $db;
}
// Site Configurations
public function Dot_Configurations()
{
	$configurations = mysqli_query($this->db,"SELECT configuration_id, script_name,script_logo,script_title,site_description,site_keywords,maintenance_mode,pr_cod,activated,wellcome_theme,show_hashtag_when,show_users_when,show_advertisement_when,show_google_ads_when,ads_per_click,ads_per_impression,min_amonth,credit_currency,paypal_mode,paypal_cliend_id,paypal_secret_id,post_types_position,post_text,post_image,post_video,post_audio,post_link,post_filter,google_map_api ,google_analytics_code,smtp_or_mail_server,tls_or_ssl , smtp_host , smtp_username , smtp_password , smtp_port,send_verify_mail,business_address,default_lang,enable_disable_profile_card,enable_disable_youmayknow,enable_disable_radar,enable_disable_trend_tags,version,logo_type,logo_svg,post_type_giphy,giphy_key,post_type_location,google_font_import,enable_disable_watermark_post,enable_disable_which_post,enable_disable_user_choose_lang,enable_disable_advertisement_pages,script_logo_mini,enable_disable_event_feature,enable_disable_register,ip_register_limit,enable_disable_register_ip,header_ads,header_ads_code ,sidebar_ads,sidebar_ads_code,post_between_ads,post_between_ads_code,weather_api, weather_api_status,weather_widget,weather_default_location,enable_disable_unlike_button,yandex_translate_api_key,menu_position  FROM dot_configuration WHERE configuration_id = '1'") or die(mysqli_error($this->db));
    $data=mysqli_fetch_array($configurations,MYSQLI_ASSOC); 
    return $data;
}

// Check User Created MarketPlace Theme
public function Dot_CheckUserMarketPlace($mid)
{
     $mid=mysqli_real_escape_string($this->db,$mid);
	 $checkMarketPlace = mysqli_query($this->db,"SELECT market_place_owner_id,market_place_name,market_place_created_time,market_theme,market_temporary_name,market_about,market_phone,market_email,market_address FROM dot_user_market WHERE market_place_owner_id = '$mid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkMarketPlace) == 1){
		 $data=mysqli_fetch_array($checkMarketPlace,MYSQLI_ASSOC);
	      return $data;
	 }else{return false;}
}


// Selected Icon 
public function Dot_SelectedMenuIcon($type){
   $type = mysqli_real_escape_string($this->db, $type);
   $queryIcon = mysqli_query($this->db,"SELECT icon_id, icon_code, icon_name, icon_type FROM dot_icons WHERE icon_type = '1' AND icon_name = '$type'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($queryIcon,MYSQLI_ASSOC);
   return $data['icon_code'];
}
// Product Details
public function Dot_GetProductDetailsOut($url)
{ 
	$slug=mysqli_real_escape_string($this->db,$url);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checProductExist = mysqli_query($this->db,"SELECT slug, user_post_id FROM dot_user_posts WHERE slug = '$slug'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checProductExist) == 1){
		  $pdata=mysqli_fetch_array($checProductExist,MYSQLI_ASSOC);
		  $productID = $pdata['user_post_id']; 
		  $getDetails = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.product_place,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_post_id = '$productID'") or die(mysqli_error($this->db));
	     $data=mysqli_fetch_array($getDetails,MYSQLI_ASSOC);
	      return $data;
	}else{
	   return false;
	} 
}
// Insert Product Seen
public function Dot_ProductSeen($productID, $uid)
{
	$productID=mysqli_real_escape_string($this->db,$productID);
	$uid=mysqli_real_escape_string($this->db,$uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
    $checkUserSeenBefore = mysqli_query($this->db,"SELECT seen_product_id FROM dot_product_seen WHERE seen_product_id = '$productID' AND seen_uid_fk = '$uid'") or die(mysqli_error($this->db));
	if(mysqli_num_rows($checkUserSeenBefore) == 0 && mysqli_num_rows($checkUserExist ) == 1){
		$time = time();
		$insertNewSeen = mysqli_query($this->db,"INSERT INTO dot_product_seen (seen_product_id,seen_uid_fk,seen_time)VALUES('$productID','$uid','$time')") or die(mysqli_error($this->db));
	}
}
// Count Vote by ID
public function Dot_CountProductSeen($postID)
{
      //Count how many people liked this post
	  $CounSeen = mysqli_query($this->db,"SELECT COUNT(*) AS productSeenCount FROM dot_product_seen WHERE seen_product_id = '$postID'") or die(mysqli_error($this->db));
	  $row = mysqli_fetch_array($CounSeen, MYSQLI_ASSOC);  
	  return $row['productSeenCount'];
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
/*Get Uploaded Image IDS From dot_user_uploads_image*/
public function Dot_GetUploadImageID($imageID)
{
   $GetImageId = mysqli_query($this->db,"SELECT image_id,uploaded_image FROM dot_user_upload_images WHERE image_id='$imageID'") or die(mysqli_error($this->db));
   $resultImageID = mysqli_fetch_array($GetImageId,MYSQLI_ASSOC);
   return $resultImageID;
} 
/* User Post Comments  */
public function Comments($postID,$second) 
{
	$postID=mysqli_real_escape_string($this->db,$postID);
	$query='';
	if($second) {   $query="limit $second,3"; 	}
	//Query the dot_post_comments and dot_users table and check existing user and created post
	$DataComments = mysqli_query($this->db,"SELECT C.comment_id, C.uid_fk, C.post_id_fk, C.comment_text, C.user_ip,C.sticker,C.gif, C.comment_created_time,C.voice, U.user_name, U.user_fullname,U.verified_user FROM dot_post_comments C, dot_users U WHERE U.user_status = '1' AND C.uid_fk = U.user_id AND C.post_id_fk = '$postID' ORDER BY C.comment_id ASC $query") or die(mysqli_error($this->db)); 
	// Fetch the results set
	while($row=mysqli_fetch_array($DataComments,MYSQLI_ASSOC)) { 
	     // Store the result into array
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
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
// Total Post Unliked
public function Dot_TotalPostUnliked($postID){
     $postID = mysqli_real_escape_string($this->db, $postID);
	 $CountLike = mysqli_query($this->db,"SELECT COUNT(*) AS postThisLikeCount FROM dot_post_unlike WHERE post_id_fk = '$postID'") or die(mysqli_error($this->db));
	 $row = mysqli_fetch_array($CountLike, MYSQLI_ASSOC);  
	  return $row['postThisLikeCount'];
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
// Check Username is already from database 
public  function GetTheMentions($content,$base_url) {
     
    if (preg_match_all("/\B@\K[\w-]+/", $content, $matches)) { 
        if (!$result = mysqli_query($this->db, "SELECT user_id, user_name, user_fullname FROM dot_users WHERE user_name  IN ('" . implode("','", $matches[0]) . "')")) {
            // error
        } else {
            foreach ($result as $row) {
                $content = preg_replace("~\B@{$row["user_name"]}\b~", "<a href=\"{$base_url}profile/{$row["user_name"]}\" class='mention_ show_card' id='{$row["user_id"]}' data-user='{$row["user_name"]}' data-type='userCard'>@{$row["user_fullname"]}</a>", $content);
            }
        }
    }
    return $content;
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
/*Get Uploaded Music ID*/
public function Dot_GetUploadedAudioID($id) 
{
	$query = mysqli_query($this->db,"SELECT id,audio_path FROM dot_audios WHERE id='$id'") or die(mysqli_error($this->db));
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $result;
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
// Product Category
public function Dot_MarketProductPostCategory($cateGoryID)
{
   $cateGoryID = mysqli_real_escape_string($this->db, $cateGoryID);
   $query = mysqli_query($this->db,"SELECT m_category_key FROM `dot_market_categories` WHERE m_category_id='$cateGoryID'") or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['m_category_key']) {
		$name=$data['m_category_key'];
	    return  $name;
	}
}
public function Dot_LanguagesID($key)
{ 
   $query = mysqli_query($this->db, "SELECT lang_id, lang_key FROM dot_languages WHERE lang_key = '$key'") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($data['lang_id']) {
		$name=$data['lang_id'];
	    return  $name;
	} 
}
// Update Displayed Product Price
public function Dot_UpdateClickProductPrice($post_id, $uid, $adsPerimpression)
{
     $post_id = mysqli_real_escape_string($this->db,  $post_id);
	 $uid = mysqli_real_escape_string($this->db, $uid);
	 $adsPerimpression = mysqli_real_escape_string($this->db, $adsPerimpression);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_display WHERE uid_fk = '$uid' AND ads_id_fk = '$post_id'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1){ 
		 $creditUpdate = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_price = CASE WHEN (ads_price > $adsPerimpression) THEN ads_price - $adsPerimpression ELSE ads_price END  WHERE user_post_id='$post_id'") or die(mysqli_error($this->db));
		 $checkBoostPrice = mysqli_query($this->db,"SELECT ads_price FROM dot_user_posts WHERE user_post_id = '$post_id'") or die(mysqli_error($this->db));
		 $row = mysqli_fetch_array($checkBoostPrice, MYSQLI_ASSOC);  
	     if($row['ads_price'] < $adsPerimpression){
		     $boostStatus = mysqli_query($this->db,"UPDATE dot_user_posts SET ads_status = '0'  WHERE user_post_id='$post_id'") or die(mysqli_error($this->db));
		 }
	 }
}
// Clicked Product
public function Dot_ProductClickedSingle($uid, $productID)
{
     $uid = mysqli_real_escape_string($this->db, $uid);
	 $productID = mysqli_real_escape_string($this->db, $productID);
	 $ip=$_SERVER['REMOTE_ADDR'];	
     $time = time();
	 $checkClickedBefore = mysqli_query($this->db,"SELECT uid_fk , ads_id_fk FROM dot_ads_click WHERE uid_fk = '$uid' AND ads_id_fk = '$productID'") or die(mysqli_error($this->db));
	 $checkUserIDFromDatabase = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkClickedBefore) == 0 && mysqli_num_rows($checkUserIDFromDatabase) == 1){
		   $saveClick = mysqli_query($this->db,"INSERT INTO dot_ads_click(uid_fk, ads_id_fk, time, ip)VALUES('$uid','$productID',NOW(),'$ip')") or die(mysqli_error($this->db)); 
	 }else{return false;}
}
// Get Details
public function Dot_UserDetails($sessionUserID)
{
   $sessionUserID = mysqli_real_escape_string($this->db, $sessionUserID);
   $query = mysqli_query($this->db,"SELECT  user_id,user_name,user_fullname,user_email,user_password,user_relationship,user_avatar,user_page_lang,user_profile_word,delete_key,user_cover,user_website,user_bio,user_gender,user_height,user_credit,user_weight,user_life_style,user_children,user_smoke,user_drink,user_body_type,user_hair_color,user_eye_color,user_sexuality,notification_count,user_job_title,last_login,user_job_company_name,user_school_university,user_phone_number,post_like_notification,post_comment_notification,comment_like_notification,user_type,follow_notification,visited_profile_notification,private_account,style_mode,show_suggest_hashTags,show_suggest_users,show_advertisement,show_google_ads, profile_bg, profile_bg_type,bg_music_name,bg_music,bg_music_type,pbg_color,pha_color,pt_color,phv_color,pp_icon,pshb_color,pfont_font,pshb_icon,verified_user,notification_event_count  FROM dot_users WHERE user_id='$sessionUserID' AND user_status IN('1','2','3')") or die(mysqli_error($this->db));
   $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
   return $data;
}

// Get Market Full Name from if Exist
public function Dot_MarketPlaceFullName($murl)
{
    $murl = mysqli_real_escape_string($this->db, $murl);
	$query = mysqli_query($this->db,"SELECT market_page_name FROM dot_user_market WHERE market_temporary_name = '$murl'") or die(mysqli_error($this->db));
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if($data['market_page_name']){
		 $name=$data['market_page_name'];
	     $str_length = strlen($name);    
		 if($str_length > 25){  // If the name is greater than 25 characters 
			  $name= substr($name, 0, 25) . "..." ; //Show points after 25 characters
		 }
		 return ucfirst($name); //Show capitalize the first letter of the name
	}else{
	   return $murl;
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
}
?>