<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$ownerLanguage = $PostFromData['user_page_lang'];
$message_time=date("c", $time); 
$postLongitude =  isset($PostFromData['user_lang']) ? $PostFromData['user_lang'] : NULL; 
$dataPostCreatedUserName = $PostFromData['user_name'];   
$dataPostCreatedUserFullName = $PostFromData['user_fullname']; 
$dataPostSlug = isset($PostFromData['slug']) ? $PostFromData['slug'] : NULL; 

$dataMarketProductTitle = isset($PostFromData['m_product_name']) ? $PostFromData['m_product_name'] : NULL; 
$dataMarketProductDescription = isset($PostFromData['m_product_description']) ? $PostFromData['m_product_description'] : NULL; 
$dataMarketProductImages = isset($PostFromData['product_images']) ? $PostFromData['product_images'] : NULL; 
$dataMarketProductPrice = isset($PostFromData['product_normal_price']) ? $PostFromData['product_normal_price'] : NULL; 
$dataMarketProductCategory = isset($PostFromData['product_category']) ? $PostFromData['product_category'] : NULL; 
$dataMarketProductStatus = isset($PostFromData['product_status']) ? $PostFromData['product_status'] : NULL; 
$dataMarketProductDiscountPrice =  isset($PostFromData['product_discount_price']) ? $PostFromData['product_discount_price'] : NULL; 
$dataMarketProductCurrency =  isset($PostFromData['product_currency']) ? $PostFromData['product_currency'] : NULL;  
$dataMarketProductAdsDisplayStatus = isset($PostFromData['ads_display_type']) ? $PostFromData['ads_display_type'] : NULL;  
$dataMarketProductAdsStatus = isset($PostFromData['ads_status']) ? $PostFromData['ads_status'] : NULL;   
$dataMarketProductAdsPrice = isset($PostFromData['ads_price']) ? $PostFromData['ads_price'] : NULL;  
$dataMarketProductAdsBudget = isset($PostFromData['ads_budget']) ? $PostFromData['ads_budget'] : NULL;  
if($dataMarketProductAdsStatus == '1'){
     echo $Dot->Dot_UpdateSeenProductPrice($dataPostID, $uid, $adsPerimpression);
} 

$adsViewCount = $Dot->Dot_UniqAdsViewCount($dataPostID);
$adsClickCount = $Dot->Dot_UniqAdsClickCount($dataPostID);
if($dataMarketProductDiscountPrice){
  $data_differencePrice = $dataMarketProductPrice - $dataMarketProductDiscountPrice; 
  $data_percentage = (100 * $data_differencePrice ) / $dataMarketProductPrice; 
  $data_dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($data_percentage, 1).'%</div></div></div>';
  $theCurrentPrice = number_format($dataMarketProductDiscountPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency;
  $theOldOne = '<div class="price_old"><s>'.number_format($dataMarketProductPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency.'</s></div>';
}else{
	$data_dis_Percentage ='';
  $theCurrentPrice = number_format($dataMarketProductPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency;
  $theOldOne='';
}


$MarketPlacePost =''; 
if($dataMarketProductPrice){
   $MarketPlacePost = '<span class="m_pst"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></span>';
}
$str_lengthProductDescription = strlen($dataMarketProductDescription);
$showMoreProductDetailBtn ='';
$longProductDescription ='';
if($str_lengthProductDescription > 500) {
   $longProductDescription= 'readmore';
   $showMoreProductDetailBtn = '<div class="showMoreText" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
}  
$dislikeStyle =""; 
if($dataPostSlug){
   $slugSeo = $base_url.'status/'.$dataPostSlug;
}else{
   $slugSeo = $base_url.'status/'.$dataPostID;
}
$dataPostedUserAvatar = $Dot->Dot_UserAvatar($dataPostUID, $base_url);
 
//Check loged in USER ID for buttons
$postDeleteButton = '';
$disableCommentbutton = '';
$editPostbutton =''; 
$boostAds =''; 
if($dataPostUID == $uid){   $postDeleteButton = '<div class="post_menu_item hvr-underline-from-center del_post" data-post="'.$dataPostID.'" data-u="'.$dataPostCreatedUserName.'" data-type="deletePost"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M90,-0.23077c-12.66346,0 -22.81731,9.92308 -23.53846,22.38462h-29.53846c-4.4423,0 -7.38462,2.94231 -7.38462,7.38462h-3c-6.63461,0 -11.76923,5.13462 -11.76923,11.76923v3h162.46154v-3c0,-6.63461 -5.13461,-11.76923 -11.76923,-11.76923h-3c0,-4.4423 -2.9423,-7.38462 -7.38462,-7.38462h-29.53846c-0.72115,-12.46154 -10.875,-22.38462 -23.53846,-22.38462zM90,15h12c4.09616,0 7.58654,3.20192 8.30769,7.15385h-28.61538c0.72115,-3.95192 4.21154,-7.15385 8.30769,-7.15385zM22.84615,51.69231l21.46154,140.30769h103.38462l21.46154,-140.30769zM43.61538,73.84615h8.07692l12.46154,96h-7.38462zM75.23077,73.84615h8.30769l5.07692,96h-8.76923zM108.46154,73.84615h8.30769l-4.61538,96h-8.07692zM140.30769,73.84615h7.38462l-12.46154,96h-7.38462z"></path></g></g></g></svg></span> '.$page_Lang['delete_post'][$dataUserPageLanguage].'</div>';
if($postPageType != 'market'){
	$disableCommentbutton = '<div class="post_menu_item disable_comment  hvr-underline-from-center"  id="cm-ed'.$dataPostID.'" data-cmid="'.$dataPostID.'" data-type="'.$commentDisabledEnabled.'" data-uid="'.$dataPostUID.'"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M32,24c-8.8,0 -15.92188,7.2 -15.92188,16l-0.0625,95.98438c0,8.84 7.16,16.01562 16,16.01562h15.98438v32l32,-32h80c8.8,0 16,-7.2 16,-16v-96c0,-8.8 -7.2,-16 -16,-16zM75.3125,56l20.6875,20.6875l20.6875,-20.6875l11.3125,11.3125l-20.6875,20.6875l20.6875,20.6875l-11.3125,11.3125l-20.6875,-20.6875l-20.6875,20.6875l-11.3125,-11.3125l20.6875,-20.6875l-20.6875,-20.6875z"></path></g></g></svg></span> <span class="cmc'.$dataPostID.'"> '.$commentDisableTextStatus.'</span></div> ';
  $editPostbutton = '<div class="post_menu_item hvr-underline-from-center edit_post" data-post="'.$dataPostID.'"  data-type="editPost"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M153.375,16c-5.79,0 -11.58,2.205 -16,6.625l-9.375,9.375l32,32l9.375,-9.375c8.832,-8.832 8.832,-23.16 0,-32c-4.42,-4.42 -10.21,-6.625 -16,-6.625zM116,44l-92,92v32h32l92,-92z"></path></g></g></svg></span> '.$page_Lang['edit_post_'][$dataUserPageLanguage].'</div>';
  
}
  if($dataMarketProductPrice){
     $boostAds = '<div class="post_menu_item hvr-underline-from-center boost_post" data-boost="'.$dataPostID.'"  data-type="boost_product"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M134.73333,22.93333c-4.7472,0 -8.6,3.8528 -8.6,8.6v0.66068l-63.06667,19.40599v57.33333l63.06667,19.40599v0.66067c0,4.7472 3.8528,8.6 8.6,8.6c4.7472,0 8.6,-3.8528 8.6,-8.6v-97.46667c0,-4.7472 -3.8528,-8.6 -8.6,-8.6zM51.6,52.74219l-35.54219,3.56094c-5.85947,0.5848 -10.32448,5.51681 -10.32448,11.41068v25.10573c0,5.89387 4.46501,10.82588 10.32448,11.41068l13.93021,1.39974l6.59557,38.66641c0.4644,2.75773 2.85162,4.77031 5.64375,4.77031h3.63932c3.1648,0 5.73333,-2.56853 5.73333,-5.73333l-0.0224,-35.54219h0.0224zM154.8,65.93333v28.66667l2.77708,-0.69427c5.10267,-1.27853 8.68958,-5.86206 8.68958,-11.11953v-5.02786c0,-5.2632 -3.58692,-9.85219 -8.68958,-11.13073z"></path></g></g></svg></span> '.$page_Lang['boost_product'][$dataUserPageLanguage].'</div>';
  }
  
}  
$copyUrl = '<div class="post_menu_item copyUrl" data-clipboard-text="'.$slugSeo.'"  onclick="M.toast({html: \''.$page_Lang['link_copied'][$dataUserPageLanguage].'\'})"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M130.5,24c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,4.75781 0.91406,9.39844 2.625,13.6875l9.75,-9.75c-1.21875,-7.78125 1.14844,-16.14844 7.125,-22.125l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c6.82031,0 13.17188,2.67188 18,7.5c9.96094,9.96094 9.96094,26.22656 0,36.1875l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-1.33594,0 -2.64844,-0.14062 -3.9375,-0.375l-9.75,9.75c4.28906,1.71094 8.92969,2.625 13.6875,2.625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-10.03125 -3.96094,-19.33594 -11.0625,-26.4375c-7.07812,-7.10156 -16.40625,-11.0625 -26.4375,-11.0625zM115.6875,67.6875l-48,48l8.625,8.625l48,-48zM70.5,84c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,10.03125 3.96094,19.33594 11.0625,26.4375c7.07813,7.10156 16.40625,11.0625 26.4375,11.0625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-4.75781 -0.91406,-9.39844 -2.625,-13.6875l-9.75,9.75c1.21875,7.78125 -1.14844,16.14844 -7.125,22.125l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-6.82031,0 -13.17187,-2.67187 -18,-7.5c-9.96094,-9.96094 -9.96094,-26.22656 0,-36.1875l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c1.33594,0 2.64844,0.14063 3.9375,0.375l9.75,-9.75c-4.28906,-1.71094 -8.92969,-2.625 -13.6875,-2.625z"></path></g></g></g></svg></span> Copy Url</div>';
$verifiedBadge = '';
if($dataUserVerified == '1'){
   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
} 
$longText = '';
$longTexts = '';
$showMoreBtn = '';
$showMoreBtns = '';
 
 
?>
<!--Post STARTED-->
<div class="zMhqu white_bg u_p<?php echo $dataPostID;?> body<?php echo $dataPostID;?>" id="u_p<?php echo $dataPostID;?>"  data-last="<?php echo $dataPostID;?>"> 
 <!--Post Menu STARTED-->
 <div class="post_menu_container post_menu_<?php echo $dataPostID;?>" id="post_menu_<?php echo $dataPostID;?>">
      <?php   
	  echo $copyUrl;
	  echo $postDeleteButton;
	  echo $boostAds;
	  ?>
     <div class="post_menu_item hvr-underline-from-center rep_post" data-post="<?php echo $dataPostID;?>" data-u="<?php echo $dataPostCreatedUserName;?>" data-block="<?php echo $dataPostUID;?>" data-type="getReport"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M96,7.38462c-48.95192,0 -88.61538,39.66346 -88.61538,88.61538c0,48.95192 39.66346,88.61538 88.61538,88.61538c48.95192,0 88.61538,-39.66346 88.61538,-88.61538c0,-48.95192 -39.66346,-88.61538 -88.61538,-88.61538zM96,152.56731c-6.92308,0 -11.65385,-5.33654 -11.65385,-12.25961c0,-7.125 4.93269,-12.25961 11.65385,-12.25961c7.125,0 11.65385,5.13461 11.65385,12.25961c0,6.92308 -4.52884,12.25961 -11.65385,12.25961zM100.58654,105.75c-1.75961,6.02884 -7.32693,6.11538 -9.17308,0c-2.13461,-7.06731 -9.72115,-33.86539 -9.72115,-51.25962c0,-22.96154 28.73077,-23.07692 28.73077,0c0,17.50962 -7.99038,45 -9.83654,51.25962z"></path></g></g></g></svg></span> <span class="rep_<?php echo $dataPostID;?>"><?php echo $page_Lang['report_this_post'][$dataUserPageLanguage];?></span></div>
 </div>
 <!--Post Menu FINISHED--> 
 <?php echo $sharePostHeader; echo $sharedEvent;?>
  <!--Header STARTED-->
  <div class="Ppjfr">
     <?php echo $MarketPlacePost;?>
    <!--User Avatar STARTED-->
    <div class="user_avatar show_card" id="<?php echo $dataPostUID;?>" data-user="<?php echo $dataPostCreatedUserName;?>" data-type="userCard">
      <a href="<?php echo $base_url.'profile/'.$dataPostCreatedUserName;?>" title="<?php echo $dataPostCreatedUserFullName;?>"><img class="_6q-tv" src="<?php echo $dataPostedUserAvatar;?>" alt="<?php echo $dataPostCreatedUserFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a>
    </div>
    <!--User Avatar FINISHED-->
    <!--User Name Started-->
    <div class="o-UQd"><a class="nJAzx" title="<?php echo $dataPostCreatedUserFullName;?>" href="<?php echo $base_url.'profile/'.$dataPostCreatedUserName;?>"><?php echo $dataPostCreatedUserFullName;?></a><?php echo $verifiedBadge;?><?php echo $sharedFrom;?></div>
    <div class="postCreatedTime" title="<?php echo $message_time;?>"></div>
    <!--User Name FINISHED-->
    <div class="post_menu" id="<?php echo $dataPostID;?>">
      <div class="post_menu_icn"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16zM96,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16zM144,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16z"></path></g></g></svg></div> 
    </div>
  </div>
  <!--Header FINISHED-->
  <!--Global POST CONTAINER STARTED-->
  <!---->
  <div class="Ppjfr">
      <div class="adsOpenCloseText">
	  <?php echo $page_Lang['boost_status'][$dataUserPageLanguage];?> 
      </div>
      <div class="boost_stat">
          <div class="ckbx-style-8 ckbx-medium">
            <input type="checkbox" name="ckbx-square-1" class="gst" id="ckbx-size-<?php echo $dataPostID;?>" data-id="<?php echo $dataPostID;?>" data-type="product_stat" <?php echo $dataMarketProductAdsStatus == '1' ? "checked='checked'":""; echo $dataMarketProductAdsStatus == '0' ? "value='1'":"value='0'"; ?>>
            <label for="ckbx-size-<?php echo $dataPostID;?>"></label>
          </div>
      </div>
  </div>
  <!---->
  <!---->
  <div class="Ppjfr_select">
       <div class="note_helper" id="stb"><?php echo $page_Lang['choose_boost_show_type'][$dataUserPageLanguage];?></div>
       <div class="price_currency" style="width:230px;">
            <div class="input-field col s12">
                <select id="crncy" class="currency dis_status" data-id="<?php echo $dataPostID;?>">
                   <option value="" disabled selected><?php echo $page_Lang['display_boost_type'][$dataUserPageLanguage];?></option>
                   <option <?php echo $dataMarketProductAdsDisplayStatus == '1' ? "selected='selected'":""; echo $dataMarketProductAdsDisplayStatus == '2' ? "value='1'":"value='2'"; ?>><?php echo $page_Lang['ads_per_click'][$dataUserPageLanguage].' '.$adsPerClick;?> ($)</option>
                   <option  <?php echo $dataMarketProductAdsDisplayStatus == '2' ? "selected='selected'":""; echo $dataMarketProductAdsDisplayStatus == '2' ? "value='1'":"value='2'"; ?>><?php echo $page_Lang['ads_per_impression'][$dataUserPageLanguage].' '.$adsPerimpression;?> ($)</option> 
                </select> 
            </div> 
       </div>
  </div>
  <!---->
  <!---->
  <span class="otherDetails__a">
       <div class="yourBudget_a rightArrow">
            <div class="yourBudget_o"><?php echo $page_Lang['your_ads_budget'][$dataUserPageLanguage];?></div>
            <div class="uu_udget"><?php echo $dataMarketProductAdsBudget.' '.$dataMarketProductCurrency;?></div>
       </div>
       <div class="yourBudget_a">
           <div class="yourBudget_o"><?php echo $page_Lang['your_remaining_budget'][$dataUserPageLanguage];?></div>
           <div class="uu_udget"><?php echo $dataMarketProductAdsPrice.' '.$dataMarketProductCurrency;?></div>
       </div>
    </span>
    <!---->
    <!----> 
    <span class="otherDetails__a">
       <div class="yourBudget_a rightArrow">
            <div class="yourBudget_o"><?php echo $page_Lang['number_of_click'][$dataUserPageLanguage];?></div>
            <div class="uu_udget"><?php echo $adsClickCount;?></div>
       </div>
       <div class="yourBudget_a">
           <div class="yourBudget_o"><?php echo $page_Lang['number_of_views'][$dataUserPageLanguage];?></div>
           <div class="uu_udget"><?php echo $adsViewCount;?></div>
       </div>
    </span>
    <!---->
    <div class="showHideProduct" id="<?php echo $dataPostID;?>"><div id="sh<?php echo $dataPostID;?>"><?php echo $page_Lang['show_product'][$dataUserPageLanguage];?></div><div class="icons_new eye_open" id="sha<?php echo $dataPostID;?>"></div></div>
  <div class="attang aclosed" id="adsBody<?php echo $dataPostID;?>">
  <div class="global_post_info_container"> 
  
     <?php  
		 if($dataMarketProductPrice){ 
			   $color = substr(md5(rand()), 0, 6); 
			   $colorText = substr(md5(rand()), 0, 6);
			   $supponsoredProduct ='';
			   if($dataMarketProductAdsDisplayStatus){$supponsoredProduct = '<div class="sponsor_wrap"><div class="sponsor_rel"><div class="sponsor_rot"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffa000"><path d="M85.91937,8.52609c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.23391v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851zM49.64485,18.21453c-1.81993,0.07025 -3.46807,1.09462 -4.33672,2.69541c-0.86865,1.6008 -0.82916,3.54093 0.10391,5.10506l12.04,20.855c0.8869,1.66261 2.60952,2.70962 4.49377,2.73132c1.88425,0.0217 3.63053,-0.98536 4.55548,-2.62711c0.92496,-1.64175 0.88152,-3.65713 -0.11332,-5.2575l-12.04,-20.86172c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM122.20063,18.21453c-1.88461,-0.01648 -3.62832,0.99575 -4.5486,2.64047l-12.04,20.86172c-0.99483,1.60037 -1.03827,3.61575 -0.11332,5.2575c0.92496,1.64175 2.67123,2.64881 4.55548,2.62711c1.88425,-0.0217 3.60687,-1.06871 4.49377,-2.73132l12.04,-20.855c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM23.56938,44.6864c-2.38408,-0.09103 -4.51977,1.46408 -5.16507,3.76097c-0.6453,2.29689 0.36803,4.73671 2.4507,5.90059l20.86172,12.04c1.60037,0.99483 3.61575,1.03827 5.2575,0.11332c1.64175,-0.92496 2.64881,-2.67123 2.62711,-4.55548c-0.0217,-1.88425 -1.06871,-3.60687 -2.73132,-4.49377l-20.855,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44562,-0.72563zM148.79344,44.6864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.855,12.04c-1.66261,0.8869 -2.70962,2.60952 -2.73132,4.49377c-0.0217,1.88425 0.98536,3.63053 2.62711,4.55548c1.64175,0.92496 3.65713,0.88152 5.2575,-0.11332l20.86172,-12.04c2.0226,-1.1314 3.04289,-3.47238 2.49482,-5.72418c-0.54807,-2.2518 -2.53007,-3.86205 -4.84638,-3.93738zM13.76,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM134.16,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM44.52515,104.8864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.86172,12.04c-1.63833,0.90063 -2.66142,2.61692 -2.6744,4.48643c-0.01298,1.86951 0.98619,3.59984 2.61185,4.52313c1.62566,0.92329 3.62356,0.89513 5.22255,-0.07362l20.855,-12.04c2.02174,-1.13069 3.04233,-3.47001 2.496,-5.7211c-0.54634,-2.25109 -2.52572,-3.86232 -4.84084,-3.94046zM127.83765,104.8864c-2.38276,-0.08765 -4.51534,1.46853 -5.15877,3.76445c-0.64343,2.29591 0.36983,4.73372 2.45112,5.89712l20.855,12.04c1.59899,0.96874 3.59689,0.9969 5.22255,0.07362c1.62566,-0.92329 2.62483,-2.65362 2.61185,-4.52313c-0.01298,-1.86951 -1.03607,-3.5858 -2.6744,-4.48643l-20.86172,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44563,-0.72563zM62.00063,122.48281c-1.88603,-0.01513 -3.63007,0.99987 -4.5486,2.64719l-12.04,20.855c-0.96874,1.59899 -0.9969,3.59689 -0.07362,5.22255c0.92329,1.62566 2.65362,2.62483 4.52313,2.61185c1.86951,-0.01298 3.5858,-1.03607 4.48643,-2.6744l12.04,-20.86172c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM109.84485,122.48953c-1.81782,0.07154 -3.46368,1.09495 -4.33192,2.69362c-0.86824,1.59867 -0.83059,3.5364 0.09911,5.10013l12.04,20.86172c0.90063,1.63833 2.61692,2.66142 4.48643,2.6744c1.86951,0.01298 3.59984,-0.98619 4.52313,-2.61185c0.92329,-1.62566 0.89513,-3.62356 -0.07362,-5.22255l-12.04,-20.855c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM85.91937,128.9261c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.2339v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851z"></path></g></g></svg></div>
      <div class="sponsor_dolar"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffa000"><path d="M125.259,100.93533c-2.494,-4.3645 -6.37833,-8.19867 -11.63867,-11.48817c-5.2675,-3.29667 -12.599,-6.31383 -21.98733,-9.05867c-9.38833,-2.73767 -16.13217,-5.7835 -20.22433,-9.14467c-4.09933,-3.34683 -6.149,-7.85467 -6.149,-13.50917c0,-6.09167 1.94217,-10.85033 5.8265,-14.2545c3.87717,-3.41133 9.4815,-5.10983 16.80583,-5.10983c7.01617,0 12.599,2.3005 16.71983,6.90867c1.935,2.15717 3.41133,4.6655 4.44333,7.525c0.50883,1.42617 1.42617,4.72283 1.47633,4.86617c1.4405,4.31433 3.89867,6.82983 8.14133,6.82983c4.687,0 8.48533,-2.967 8.48533,-8.48533c0,-1.03917 -0.22217,-2.13567 -0.35833,-2.78067c-1.29,-6.42133 -3.83417,-11.78917 -7.64683,-16.11067c-5.762,-6.52167 -13.81017,-10.4275 -24.15883,-11.696l-0.03583,-0.00717v-11.08683c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v11.1155c-9.976,1.1825 -17.87367,4.5795 -23.6285,10.26267c-5.88383,5.81217 -8.82933,13.25117 -8.82933,22.32417c0,8.90817 3.00283,16.254 9.0085,22.0375c6.00567,5.77633 15.566,10.4705 28.681,14.06817c9.42417,2.82367 16.11783,5.977 20.09533,9.46c3.96317,3.49017 5.9555,7.77583 5.9555,12.86417c0,6.03433 -2.31483,10.793 -6.93017,14.276c-4.6225,3.483 -10.965,5.2245 -19.03467,5.2245c-8.24883,0 -15.51583,-2.07117 -20.00933,-6.22067c-3.02433,-2.78783 -5.02383,-6.37833 -6.01283,-10.7715c-0.03583,-0.16483 -0.559,-1.849 -0.93167,-2.54417c-1.40467,-2.65167 -4.26417,-4.43617 -7.482,-4.43617c-4.69417,-0.01433 -8.50683,3.79833 -8.50683,8.49967c0,2.064 1.032,4.988 1.34733,5.848c1.6125,4.4075 4.22833,8.41367 7.5035,11.64583c6.32817,6.22783 15.94583,9.81833 26.9825,10.87183v8.80783c0,3.956 3.2035,7.16667 7.1595,7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-8.67167l0.17917,-0.00717c11.266,-1.0535 20.03083,-4.42183 26.28017,-10.1265c6.24933,-5.6975 9.38117,-13.2225 9.38117,-22.56783c0,-5.86233 -1.25417,-10.9865 -3.741,-15.35817z"></path></g></g></svg>
      </div>
    </div>
  </div>';  }
			   
		     if($dataMarketProductImages){
			        $s = explode(",", $dataMarketProductImages); // Explode the images string value
					$r=1;
					$f=count($s);
					$TotalImage = $f-1;
					$PopUpStart ='';
					$singleImage='';
					if($TotalImage == '1'){
						 $singleImage = 'class="single-image"';
					}
					if($TotalImage > 1){
						 $PopUpStart ='gallery';
					}
					// Add to array the available images
						echo ''.$supponsoredProduct.'<div class="item column-1 '.$PopUpStart.'" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">';
						
						foreach($s as $a) {
							// Get the uploaded image ids
						   $newdata=$Dot->Dot_GetUploadImageID($a);
						   if($newdata) {
							  // The path to be parsed
							  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
							  echo '
							  <div class="sldimg"  data-src="'.$final_image.'">
							  <a '.$singleImage.' href="'.$final_image.'">
								<div class="sld_jjzlbU '.$dataPostCreatedFilterName.'" style="background-image:url('.$final_image.');">
								  <img src="'.$final_image.'" class="sld-exPexU '.$dataPostCreatedFilterName.'">
								</div>
								</a>
							  </div>
							  ';
							}
							$r=$r+1;
						 } 
						 echo '</div>';
			 } 
			 $explodeCurrency = explode(",", $productCurrency); 
			 echo '<div class="product_category" style="color:#'.$colorText.';">'.$page_Lang[$Dot->Dot_MarketProductPostCategory($dataMarketProductCategory)][$dataUserPageLanguage].' '.$data_dis_Percentage.'</div>';
			 echo '<div class="product_post_title">'.$dataMarketProductTitle.'</div>';
			 echo '<div class="product_post_description post_info'.$dataPostID.' '.$longProductDescription.'" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$dataMarketProductDescription.'">'.strip_unsafe(styletext($dataMarketProductDescription)).' '.$showMoreProductDetailBtn.'</div>';
			 echo '
			    <div class="product_more" style="background-color:#'.$color.';">
				    <div class="product_price"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M165.10656,70.10344l0.01344,-51.18344c0,-6.63812 -5.40187,-12.04 -12.04,-12.04l-51.17,0.01344l-2.16344,-0.01344c-4.46125,0 -8.7075,0.25531 -11.77125,3.31906l-78.17938,78.16594c-1.88125,1.88125 -2.91594,4.38063 -2.91594,7.04125c0,2.64719 1.03469,5.14656 2.91594,7.02781l59.77,59.77c1.86781,1.88125 4.36719,2.91594 7.02781,2.91594c2.64719,0 5.16,-1.03469 7.02781,-2.91594l78.17937,-78.19281c3.35938,-3.34594 3.3325,-8.15656 3.31906,-12.80594zM109.73063,91.16l-4.81063,-4.81062c3.09063,-4.47469 3.78938,-9.98406 -1.37062,-15.14406c-7.22938,-7.21594 -13.07469,-3.09063 -15.14406,-1.03469c-4.81063,4.82406 -1.72,10.66937 2.41875,17.2c4.81062,7.91469 8.93594,16.86406 1.02125,24.77875c-9.28531,9.63469 -20.64,3.77594 -25.10125,0.68531l-4.47469,4.47469l-4.82406,-4.82406l4.82406,-4.81063c-3.44,-4.81062 -8.26406,-14.44531 1.37062,-25.8l4.81063,4.81063c-3.09063,3.09062 -6.88,11.00531 0.69875,18.57062c7.56531,7.57875 12.72531,5.85875 16.85062,1.72c11.69063,-11.69062 -18.92,-26.48531 -3.44,-41.96531c8.25063,-8.25063 18.57063,-4.47469 23.04531,-1.03469l5.50937,-5.49594l4.81063,4.81063l-5.49594,5.50937c5.84531,8.25063 3.09062,15.48 -0.69875,22.36zM134.16,48.16c-5.6975,0 -10.32,-4.6225 -10.32,-10.32c0,-5.6975 4.6225,-10.32 10.32,-10.32c5.6975,0 10.32,4.6225 10.32,10.32c0,5.6975 -4.6225,10.32 -10.32,10.32z"></path></g></g></g></svg> '.$theCurrentPrice.'</div>
					<a href="'.$dataPostSlug.'" class="prduct"><span class="go_product">'.$page_Lang['shop_now'][$dataUserPageLanguage].' <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M79.6145,21.5v0c-9.5245,0 -15.2005,10.61383 -9.91867,18.54017l30.6375,45.95983l-30.6375,45.95983c-5.28183,7.92633 0.39417,18.54017 9.91867,18.54017v0c3.98467,0 7.71133,-1.99233 9.92583,-5.3105l34.15633,-51.24167c3.21067,-4.816 3.21067,-11.08683 0,-15.90283l-34.15633,-51.24167c-2.2145,-3.311 -5.934,-5.30333 -9.92583,-5.30333z"></path></g></g></svg></span></a>
				</div>
			 ';
		 } 
		 
	 ?>  
 </div>
</div>
<!--Post FINISHED--> 
