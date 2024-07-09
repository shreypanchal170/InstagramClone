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
	$checkMarketPlace = mysqli_query($this->db,"SELECT market_id,market_place_owner_id,market_place_name,market_place_created_time,market_theme,market_page_name,market_temporary_name,market_about,market_phone,market_email,market_address FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	 if(mysqli_num_rows($checkMarketPlace) == 1){
		 $data=mysqli_fetch_array($checkMarketPlace,MYSQLI_ASSOC);
	      return $data;
	 }else{return false;}
} 
// Edit Market Profile Information
public function Market_EditMarketPlaceInformations($uid, $marketPlaceName, $MarketPageUrlName, $MarketAbout, $MarketPhone, $MarketEmail, $MarketAddress)
{    
      $checkMarketOwnerExist = mysqli_query($this->db,"SELECT market_place_owner_id FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	  if(mysqli_num_rows($checkMarketOwnerExist) == 1){
	       $updateMarket =  mysqli_query($this->db,"UPDATE dot_user_market SET market_page_name = '$MarketPageUrlName' , market_place_name = '$marketPlaceName', market_about = '$MarketAbout', market_phone = '$MarketPhone' , market_email = '$MarketEmail', market_address = '$MarketAddress' WHERE market_place_owner_id = '$uid'") or die(mysqli_error($this->db));
	 if($updateMarket){
	   return true;
	 }else{return false;}
	  }else{return false;}
     
}


}
?>