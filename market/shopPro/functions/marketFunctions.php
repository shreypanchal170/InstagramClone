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
class DOT_MARKET {
private $db;

public function __construct($db) 
{
  $this->db = $db;
}

public function Market_EditProduct($uid, $editproductTitle, $editproductPrice,$editproductCurrency, $editproductDescription, $editProductMessageStatus, $editProductCategory, $editProductPlace, $editProductDiscount ,$slug , $editProductID)
{ 
    $uid = mysqli_real_escape_string($this->db, $uid);
	$checkUserExist = mysqli_query($this->db,"SELECT user_id FROM dot_users WHERE user_id = '$uid'") or die(mysqli_error($this->db)); 
	if(mysqli_num_rows($checkUserExist) == 1){
	        $UpdateMarketProduct = mysqli_query($this->db,"UPDATE dot_user_posts SET m_product_name = '$editproductTitle', m_product_description = '$editproductDescription', product_normal_price = '$editproductPrice' , product_currency = '$editproductCurrency', product_message_status = '$editProductMessageStatus' , product_category = '$editProductCategory' , product_place = '$editProductPlace' , product_discount_price =  '$editProductDiscount' , slug = '$slug' WHERE user_id_fk = '$uid' AND user_post_id = '$editProductID'") or die(mysqli_error($this->db));
			if(empty($editProductDiscount)){
		            $UpdateMarketProductdiscount = mysqli_query($this->db,"UPDATE dot_user_posts SET product_discount_price = NULL WHERE user_id_fk = '$uid' AND user_post_id = '$editProductID'") or die(mysqli_error($this->db));
	        }
			if($UpdateMarketProduct){
			   return true;
			}else{return false;}
	}
    
}
// Edit Product Information
public function Market_EditMarketDetails($uid)
{
      $uid = mysqli_real_escape_string($this->db, $uid); 
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	$checkMarketPlace = mysqli_query($this->db,"SELECT market_id,market_place_owner_id,market_place_name,market_place_created_time,market_page_name,market_theme,market_temporary_name,market_about,market_phone,market_email,market_address,market_facebook,market_twitter,market_instagram,market_youtube,market_tumblr,market_cover,market_logo,market_slogan FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkMarketPlace) == 1){
		 $data=mysqli_fetch_array($checkMarketPlace,MYSQLI_ASSOC);
	      return $data;
	 }else{return false;}
}
/*User Profile Picture */
public function Market_Logo($mid,$marketThemplateName, $base_url) 
{
   $mid=mysqli_real_escape_string($this->db,$mid);
   //This is checking user uploded profile image or not
   $query = mysqli_query($this->db,"SELECT market_logo FROM `dot_user_market` WHERE market_id='$mid'") or die(mysqli_error($this->db));
   $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
   
   if(!empty($row['market_logo'])){
		$profile_image_path=$base_url.'uploads/avatar/';
		$data= $profile_image_path.$row['market_logo'];
		return $data;
   }else {
	    $data= $base_url."market/".$marketThemplateName."/img/defaultLogo.png";
	    return $data;
  } 
}
// Check User Created MarketPlace Theme
public function Market_CheckUserMarketPlace($mid)
{
     $mid=mysqli_real_escape_string($this->db,$mid);
	mysqli_query($this->db,"SET character_set_client=utf8") or die(mysqli_error($this->db));
    mysqli_query($this->db,"SET character_set_connection=utf8") or die(mysqli_error($this->db)); 
	 $checkMarketPlace = mysqli_query($this->db,"SELECT market_id,
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
	 market_cover,
	 market_slogan,
	 market_facebook,
	 market_twitter,
	 market_tumblr,
	 market_instagram,
	 market_youtube  FROM dot_user_market WHERE market_temporary_name = '$mid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkMarketPlace) == 1){
		 $data=mysqli_fetch_array($checkMarketPlace,MYSQLI_ASSOC);
	      return $data;
	 }else{return false;}
} 

// Edit Market Profile Information
public function Market_EditMarketPlaceInformations($uid, $marketPlaceName, $MarketPageUrlName, $MarketAbout, $MarketPhone, $MarketEmail, $MarketAddress,$MarketSlogan,$MarketFacebook,$MarketTwitter,$MarketTumblr,$MarketYoutube,$MarketInstagram)
{    
      $checkMarketOwnerExist = mysqli_query($this->db,"SELECT market_place_owner_id FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkMarketOwnerExist) == 1){
	       $updateMarket =  mysqli_query($this->db,"UPDATE dot_user_market SET market_page_name = '$MarketPageUrlName' , market_place_name = '$marketPlaceName', market_about = '$MarketAbout', market_phone = '$MarketPhone' , market_email = '$MarketEmail', market_address = '$MarketAddress', market_slogan = '$MarketSlogan', market_facebook = '$MarketFacebook', market_twitter = '$MarketTwitter', market_tumblr = '$MarketTumblr', market_youtube = '$MarketYoutube', market_instagram = '$MarketInstagram' WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	 if($updateMarket){
	   return true;
	 }else{return false;}
	  }else{return false;}
     
}

// Show Discounted Products 
public function Market_UserMarketDiscountedProducts($MarketOwnerID)
{
	  $MarketOwnerID = mysqli_real_escape_string($this->db, $MarketOwnerID);
	  
      $query = mysqli_query($this->db,"SELECT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.slug,P.post_page_type,P.shared_post,P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_place,P.product_message_status,P.product_currency,U.show_suggest_users,U.show_advertisement ,U.show_google_ads , U.user_name, U.user_fullname,U.verified_user,U.style_mode,U.user_page_lang,U.user_registered FROM dot_user_posts P, dot_users U WHERE P.user_id_fk = U.user_id AND P.post_type = 'p_product' AND P.post_page_type = 'market' AND P.user_id_fk = '$MarketOwnerID' AND P.product_status = '0' AND P.product_discount_price IS NOT NULL ORDER BY P.user_post_id DESC limit	6") or die(mysqli_error($this->db));
	//Store the result
	 while($row=mysqli_fetch_array($query)) { 
		 $data[]=$row;
	 }
	 if(!empty($data)) {
	     return $data;
	 }  
}
/*Change ShopPro Cover*/
public function Market_UpdateCover($uid, $actual_image_name) 
{  
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_user_market SET market_cover='$actual_image_name'  WHERE market_place_owner_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT market_place_owner_id,market_cover FROM dot_user_market WHERE market_place_owner_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
}

/*Change ShopPro Cover*/
public function Market_UpdateLogo($uid, $actual_image_name) 
{  
	 //Prepare the statement
	 mysqli_query($this->db,"UPDATE dot_user_market SET market_logo='$actual_image_name'  WHERE market_place_owner_id='$uid'") or die(mysqli_error($this->db));
	 //Check the user id for profile_pic from the user table then update it
	 $query = mysqli_query($this->db,"SELECT market_place_owner_id,market_logo FROM dot_user_market WHERE market_place_owner_id='$uid'") or die(mysqli_error($this->db));
	 $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 return $result;
}

/*User Profile Picture */
public function Market_Cover($mid,$marketThemplateName, $base_url) 
{
   $mid=mysqli_real_escape_string($this->db,$mid);
   //This is checking user uploded profile image or not
   $query = mysqli_query($this->db,"SELECT market_cover FROM `dot_user_market` WHERE market_id='$mid'") or die(mysqli_error($this->db));
   $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
   
  if(!empty($row['market_cover'])){
		$profile_image_path=$base_url.'uploads/cover/';
		$data= $profile_image_path.$row['market_cover'];
		return $data;
   }else {
	    $data= $base_url."market/".$marketThemplateName."/img/defaultCover.png";
	    return $data;
  } 
}
}
?>