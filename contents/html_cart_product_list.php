<?php 
$cartProductID = $cp['product_id_fk'];
$cartProductOwnerUserIDFk = $cp['product_owner_id'];
$cartProductImages = $cp['product_images'];
$cartID = $cp['cart_id'];
$carUserIDFk = $cp['user_id_fk'];
$cartProductPieces = $cp['pieces'];
$cartProductPurchaseStatus = $cp['purchase_status'];
$cartAddedTme = $cp['time'];
$cartProductSlug = $cp['slug'];
$cartPostProductCategory = $cp['product_category'];
$cartPostProductDistouncPrice = $cp['product_discount_price'];
$cartPostProductNormalPrice = $cp['product_normal_price'];
$cartPostproductName = $cp['m_product_name'];
$cartMarketProductCurrency =  isset($cp['product_currency']) ? $cp['product_currency'] : NULL;  
$newdata=$Dot->Dot_GetUploadImageID($cartProductImages);
if($newdata){
  $final_imagea=$base_url."uploads/images/".$newdata['uploaded_image']; 
} 
if($cartPostProductDistouncPrice){
    $data_differencePrice = $cartPostProductNormalPrice - $cartPostProductDistouncPrice; 
    $data_percentage = 100 - (100 * $data_differencePrice ) / $cartPostProductNormalPrice;  
    $data_dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($data_percentage, 1).'%</div></div></div>';
    $theCurrentPrice = $Dot->Dot_restyle_text($data_differencePrice). ' ' .$cartMarketProductCurrency;
    $theOldOne = '<div class="cart_price_old"><s>'. $Dot->Dot_restyle_text($cartPostProductDistouncPrice). ' ' .$cartMarketProductCurrency.'</s></div>';
}else{
    $data_dis_Percentage ='';
    $theCurrentPrice =  $Dot->Dot_restyle_text($cartPostProductNormalPrice). ' ' .$cartMarketProductCurrency;
    $theOldOne='';
} 
$productOwnerUserFullName = $Dot->Dot_UserFullName($cartProductOwnerUserIDFk);
$productOwnerUsername = $Dot->Dot_GetUserName($cartProductOwnerUserIDFk);
$cartCustomerPersonalFullName = $cp['customer_fullname'];
$cartCustomerPersonalAddress = $cp['customer_address'];
$cartCustomerPersonalPhoneNumber = $cp['customer_phone'];
$cartCustomerPersonalCountry = $cp['customer_country'];
$cartCustomerPersonalCity = $cp['customer_city'];
$cartCustomerPersonalState = $cp['customer_state'];
$cartCustomerPersonalPostCode = $cp['customer_post_code'];
$cartCustomerPersonalPersonalIDorPassportID = $cp['customer_personal_id_or_passport_id'];
/********************************************/ 
?>
<div class="cart_productcn" id="tc__<?php echo $cartID;?>"> 
   <div class="sp_center sep" data-type="userfirstinfo" data-id="<?php echo $cartProductOwnerUserIDFk;?>"><span><strong>Product seller:</strong> </span>Mustafa Öztürk</div>
<div class="cart_product_box" id="cart_<?php echo $cartID;?>">
   <div class="cart_product_image" style="background-image:url('<?php echo $final_imagea;?>');">
          <?php echo $data_dis_Percentage;?>
          <img src="<?php echo $final_imagea;?>" class="cart_product_imageimg">
   </div>
   <div class="cart_product_informations">
          <div class="cart_product_title truncate"><?php echo $cartPostproductName;?></div>
          <div class="cart_product_category"><?php echo $page_Lang[$Dot->Dot_MarketProductPostCategory($cartPostProductCategory)][$dataUserPageLanguage];?></div>
          <div class="cart_product_price"><?php echo $theCurrentPrice.' '.$theOldOne;?></div>
          <div class="cart_buttons">
               <div class="cart_btn_box hvr-shutter-out-vertical waves-effect waves-green"><a href="<?php echo $cartProductSlug;?>" class="prduct">See Product</a></div>
               <div class="cart_btn_box left-rightBorder hvr-shutter-out-vertical waves-effect waves-purple orm" data-id ="<?php echo $cartProductID;?>" data-c="<?php echo $cartID;?>" data-u="<?php echo $cartProductOwnerUserIDFk;?>">Order Now</div>
               <div class="cart_btn_box hvr-shutter-out-vertical waves-effect waves-red p_delete" data-id="<?php echo $cartID;?>" data-type="delpro">Delete</div>
          </div>
   </div>
</div>
</div>