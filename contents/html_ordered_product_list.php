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
$cartProductOrderStatus = $cp['order_status'];
$cargoDeliveryStatus = $cp['cargo_delivery_status'];
$cargoCamPany  =  isset($cp['cargo_campany']) ? $cp['cargo_campany'] : NULL;  
$cargoTrackingNumber =  isset($cp['cargo_tracking_number']) ? $cp['cargo_tracking_number'] : NULL;  
$cargoName='';
$trackingn = '';
$inCargoAnimation = '';
$message_time=date("c", $cartAddedTme); 
$date = new DateTime($message_time);
$now = new DateTime();
$diff = $now->diff($date); 

if($diff->days > 9){
     $Dot->Dot_YesIGotProductAutoUpdate($uid, $cartID);
}
if($cargoCamPany){ 
   $cargoCampanyDetails = $Dot->Dot_CargoExpressDetail($cargoCamPany);
   $cargoName = '<div class="amani_cargo"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#f1c40f"><path d="M6.61538,26.46154c-3.97956,0 -6.61538,2.63582 -6.61538,6.61538v92.61538c0,3.97957 2.63582,6.61538 6.61538,6.61538h13.23077c1.31791,-11.24099 11.24099,-20.46635 23.15385,-20.46635c11.91286,0 21.83594,9.22536 23.15385,20.46635h26.46154c3.97957,0 6.61538,-2.63581 6.61538,-6.61538v-92.61538c0,-3.97956 -2.63581,-6.61538 -6.61538,-6.61538zM71.94231,49.40865c1.08534,0 2.22236,0.46515 2.89423,1.44712l3.92788,4.13462c1.31791,1.31791 1.36959,3.79868 -0.62019,5.78846l-32.45673,32.45673c-1.98978,1.98978 -4.67728,1.98978 -5.99519,0l-18.60577,-18.39904c-1.98978,-1.98978 -1.98978,-4.67728 0,-5.99519l4.13462,-3.92788c1.98978,-1.98978 4.47055,-1.98978 5.78846,0l11.99038,11.78365l25.84135,-25.84135c0.98197,-0.98197 2.01563,-1.44712 3.10096,-1.44712zM112.46154,52.92308c-3.97956,0 -6.61538,2.63582 -6.61538,6.61538v66.15385c0,3.30769 2.63582,6.61538 6.61538,6.61538c1.31791,-11.24099 11.24099,-20.46635 23.15385,-20.46635c11.91286,0 21.83594,8.55349 23.15385,20.46635h6.61538c3.97957,0 6.61538,-2.63581 6.61538,-6.61538v-33.07692c0,-5.94351 -5.375,-13.23077 -5.375,-13.23077l-14.47115,-19.84615c-3.30769,-3.97956 -5.29747,-6.61538 -9.92308,-6.61538zM125.69231,66.15385h15.91827c1.31791,0 2.6875,1.24038 2.6875,1.24038l13.85096,19.22596c1.31791,1.98978 2.6875,4.05709 2.6875,5.375h-35.14423zM43,120.31731c-8.39844,0 -15.29808,6.89964 -15.29808,15.29808c0,8.39844 6.89964,15.29808 15.29808,15.29808c8.39844,0 15.29808,-6.89964 15.29808,-15.29808c0,-8.39844 -6.89964,-15.29808 -15.29808,-15.29808zM135.61538,120.31731c-8.39844,0 -15.29808,6.89964 -15.29808,15.29808c0,8.39844 6.89964,15.29808 15.29808,15.29808c8.39844,0 15.29808,-6.89964 15.29808,-15.29808c0,-8.39844 -6.89964,-15.29808 -15.29808,-15.29808z"></path></g></g></svg><span>Cargo: </span><a href="'.$cargoCampanyDetails['cargo_url'].'" target="_blank">'.$cargoCampanyDetails['cargo_name'].'</a></div>'; 
   $trackingn = '<div class="amani_cargo"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9b59b6"><path d="M40.13333,11.46667c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h11.46667c3.1648,0 5.73333,2.5628 5.73333,5.73333c0,3.17053 -2.56853,5.73333 -5.73333,5.73333h-5.73333h-17.2c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h1.22057c-0.0389,0.07606 -0.08454,0.14774 -0.12318,0.22396c2.62013,0.52747 4.63594,2.72871 4.63594,5.50937c0,3.17053 -2.56853,5.73333 -5.73333,5.73333h-17.2c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h17.2c3.1648,0 5.73333,2.5628 5.73333,5.73333c0,3.17053 -2.56853,5.73333 -5.73333,5.73333h-5.73333c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h11.46667c3.1648,0 5.73333,2.5628 5.73333,5.73333c0,3.17053 -2.56853,5.73333 -5.73333,5.73333h-11.46667c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h22.93333h5.73333c3.1648,0 5.73333,2.5628 5.73333,5.73333c0,3.17053 -2.56853,5.73333 -5.73333,5.73333h-2.23958h-3.49375c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h19.01406c1.54185,1.02475 3.57719,2.33007 4.19922,2.88906c5.246,4.71853 9.57242,15.29018 11.3211,21.28724c0.84853,2.91253 3.23682,4.38251 5.59896,4.44558c2.36787,-0.06881 4.75043,-1.53878 5.59896,-4.44558c1.74867,-5.99707 6.0751,-16.56298 11.3211,-21.28724c5.13707,-4.62107 46.14661,-24.48079 46.14661,-65.95573c0,-34.62963 -27.91968,-62.71078 -62.47317,-63.03307c-0.19712,-0.02145 -0.39521,-0.03267 -0.59349,-0.03359zM86,57.33333c9.50013,0 17.2,7.69987 17.2,17.2c0,9.50013 -7.69987,17.2 -17.2,17.2c-9.50013,0 -17.2,-7.69987 -17.2,-17.2c0,-9.50013 7.69987,-17.2 17.2,-17.2z"></path></g></g></svg><span>Tracking Number: </span>'.$cargoTrackingNumber.'</div>'; 
}

if($cartProductOrderStatus == 1){
  $inCargoAnimation = 'ordered_prod_incargo';
}
$deliveryStatus ='';
if($cargoDeliveryStatus == 2){
    $deliveryStatus = '
	<div class="amani_cargo yesgotit'.$cartID.'" style="margin-top:12px;padding:15px; background-color:#e6e6e6; border-radius:3px;-webkit-border-radius:3px;-o-border-radius:3px;">
	      <div class="amani_cargo" style="margin-bottom:10px;">Have you received delivery of our product?</div>
	     <div class="udelans"><a class="waves-effect waves-green btn-small blue igotit" id="'.$cartID.'">Yes</a></div>  
		 <div class="amani_cargo" style="margin-bottom:10px; font-weight:300;color:#d84315">It will be automatically approved within 10 days.</div>
	</div>';
}
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
/********************************************/ 
if($cartProductOrderStatus == 0){ 
	$orderStatus = $Dot->Dot_SelectedMenuIcon('waiting_seller_approve');
	$pss = $orderStatus.$page_Lang['waiting_approval_seller'][$dataUserPageLanguage];
}else if($cartProductOrderStatus == 1){
    $orderStatus = $Dot->Dot_SelectedMenuIcon('in_cargo');
	$pss = $orderStatus.$page_Lang['product_in_cargo'][$dataUserPageLanguage];
}else if($cartProductOrderStatus == 2){
	$orderStatus = $Dot->Dot_SelectedMenuIcon('order_delivery');
	$pss = $orderStatus.$page_Lang['product_was_delivered'][$dataUserPageLanguage];
} 
$cartCustomerPersonalFullName = $cp['customer_fullname'];
$cartCustomerPersonalAddress = $cp['customer_address'];
$cartCustomerPersonalPhoneNumber = $cp['customer_phone'];
$cartCustomerPersonalCountry = $cp['customer_country'];
$cartCustomerPersonalCity = $cp['customer_city'];
$cartCustomerPersonalState = $cp['customer_state'];
$cartCustomerPersonalPostCode = $cp['customer_post_code'];
$cartCustomerPersonalPersonalIDorPassportID = $cp['customer_personal_id_or_passport_id'];
?>
<div class="ordered_prod <?php echo $inCargoAnimation;?>">
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
               <div class="cart_btn_box_incoming hvr-shutter-out-vertical waves-effect waves-green"><a href="<?php echo $cartProductSlug;?>" class="prduct">See Product</a></div> 
               <div class="cart_btn_box_incoming hvr-shutter-out-vertical waves-effect waves-red addinfos" id="<?php echo $cartID;?>">Address</div>  
          </div>
   </div>
   
</div>
<div class="csp_center">
 <div class="othrs"><span class="">Product Shipping Status: </span> <?php echo $pss;?></div>
 <div class="othrs add_infos" id="add_infos<?php echo $cartID;?>">
        <div class="shopping_ui_title_ui">Address and personal information</div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['full_name'][$dataUserPageLanguage];?>: </span><?php echo $cartCustomerPersonalFullName;?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['addressui'][$dataUserPageLanguage];?>: </span><?php echo $cartCustomerPersonalAddress;?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['phone_number'][$dataUserPageLanguage];?>:   </span><span class="iti__flag iti__<?php echo strtolower($cartCustomerPersonalCountry);?>"></span><?php echo $cartCustomerPersonalPhoneNumber;?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['ui_country'][$dataUserPageLanguage];?>: </span><?php echo $Dot->Dot_CountryName($cartCustomerPersonalCountry);?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['ui_city'][$dataUserPageLanguage];?>: </span><?php echo $Dot->Dot_UserCity($cartCustomerPersonalCity);?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['ui_state'][$dataUserPageLanguage];?>: </span><?php echo $Dot->Dot_UserState($cartCustomerPersonalState);?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['ui_postcode'][$dataUserPageLanguage];?>: </span><?php echo $cartCustomerPersonalPostCode;?></div>
        <div class="shopping_ui_box"><span class="nmsp"><?php echo $page_Lang['ui_personalid_passportid'][$dataUserPageLanguage];?>: </span><?php echo $cartCustomerPersonalPersonalIDorPassportID;?></div>
</div>
<?php echo $cargoName.$trackingn.$deliveryStatus;?> 
</div>
</div>