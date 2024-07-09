<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$ownerLanguage = $PostFromData['user_page_lang'];
$onlineOfflineStatus = $PostFromData['show_online_offline_status'];
$userLastLogin = $PostFromData['last_login']; //       ,U.last_login
$FromuserLastLogin = date("c",$userLastLogin);
$treeMinutesBefore = time()-180; // Tree minutes ago
$loginStatus = '';
if($userLastLogin > $treeMinutesBefore && $onlineOfflineStatus == 1){
    $loginStatus = '<div class="online_offline_status">'.$page_Lang['online_offline_status'][$dataUserPageLanguage].'</div>';
}else{
	if($onlineOfflineStatus == '1'){
		$loginStatus = '<div class="online_offline_status_offline">'.$page_Lang['online_offline_status'][$dataUserPageLanguage].' : <span class="ltime" title="'.$FromuserLastLogin.'""></span></div>';
    } 
}
$message_time=date("c", $time);
$postPageType = isset($PostFromData['post_page_type']) ? $PostFromData['post_page_type'] : NULL;
$postPageEventID = isset($PostFromData['post_event_page_id']) ? $PostFromData['post_event_page_id'] : NULL;
$postLatitude =  isset($PostFromData['user_lat']) ? $PostFromData['user_lat'] : NULL;
$postLongitude =  isset($PostFromData['user_lang']) ? $PostFromData['user_lang'] : NULL;
$userDonateMessage = isset($PostFromData['user_donate_message']) ? $PostFromData['user_donate_message'] : $page_Lang['donate_for_more_post_like_this'][$dataUserPageLanguage];
$postLocationPlace =  isset($PostFromData['location_place']) ? $PostFromData['location_place'] : NULL;
$postAboutLocation =  isset($PostFromData['about_location']) ? $PostFromData['about_location'] : NULL;
$dataPostHashTagNormal = isset($PostFromData['hashtag_normal']) ? $PostFromData['hashtag_normal'] : NULL;
$dataPostHashTagDiez = isset($PostFromData['hashtag_diez']) ? $PostFromData['hashtag_diez'] : NULL;
$dataPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL;
$dataPostVideoScreenShot = isset($PostFromData['post_video_name']) ? $PostFromData['post_video_name'] : NULL;
$dataPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$dataPostCreatedUserName = $PostFromData['user_name'];
$daUserStyleMode = $PostFromData['style_mode']; 
$dataUserGifPost = isset($PostFromData['gif_url']) ? $PostFromData['gif_url'] : NULL;  
$dataCommentDisableStatus = $PostFromData['comment_status'];
$dataPostCreatedUserFullName = $PostFromData['user_fullname'];
$dataPostCreatedLinkUrl =  isset($PostFromData['post_link_url']) ? $PostFromData['post_link_url'] : NULL;
$dataPostUserFeeling =  isset($PostFromData['user_feeling']) ? $PostFromData['user_feeling'] : NULL;
$dataPostCreatedLinkDescription = isset($PostFromData['post_link_description']) ? $PostFromData['post_link_description'] : NULL;
$dataPostCreatedLinkTitle = isset($PostFromData['post_link_title']) ? $PostFromData['post_link_title'] : NULL;
$dataPostCreatedLinkImg = isset($PostFromData['post_link_img']) ? $PostFromData['post_link_img'] : NULL;
$dataPostCreatedLinkMiniUrl = isset($PostFromData['post_link_mini_url']) ? $PostFromData['post_link_mini_url'] : NULL; 
$dataPostCreatedImages = isset($PostFromData['post_image_id']) ? $PostFromData['post_image_id'] : NULL;
$dataPostCreatedVideoID = isset($PostFromData['post_video_id']) ? $PostFromData['post_video_id'] : NULL;
$dataPostCreatedAudioID = isset($PostFromData['post_audio_id']) ? $PostFromData['post_audio_id'] : NULL;
$dataPostCreatedFilterName = isset($PostFromData['filter_name']) ? $PostFromData['filter_name'] : NULL;
$dataPostSlug = isset($PostFromData['slug']) ? $PostFromData['slug'] : NULL;
$dataSharedPost = isset($PostFromData['shared_post']) ? $PostFromData['shared_post'] : NULL; 
$dataUserProTypeinPost = $PostFromData['pro_user_type'];

$dataBeforeAfterImages = isset($PostFromData['before_after_images']) ? $PostFromData['before_after_images'] : NULL; 

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
 
if($dataMarketProductDiscountPrice){
  $data_differencePrice = $dataMarketProductPrice - $dataMarketProductDiscountPrice; 
  $data_percentage = 100 - (100 * $data_differencePrice ) / $dataMarketProductPrice; 
  $data_dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($data_percentage, 1).'%</div></div></div>';
  $theCurrentPrice = $Dot->Dot_restyle_text($dataMarketProductDiscountPrice). ' ' .$dataMarketProductCurrency;
  $theOldOne = '<div class="price_old"><s>'. $Dot->Dot_restyle_text($dataMarketProductDiscountPrice). ' ' .$dataMarketProductCurrency.'</s></div>';
}else{
	$data_dis_Percentage ='';
    $theCurrentPrice =  $Dot->Dot_restyle_text($dataMarketProductPrice). ' ' .$dataMarketProductCurrency;
    $theOldOne='';
}
$userisPro = '';
if($dataUserProTypeinPost == 1){
    $userisPro = '<span class="p_prst">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
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
 

$totalyPostUnLiked = $Dot->Dot_TotalPostUnliked($dataPostID);
$dislikeStyle ="";
if($totalyPostUnLiked == 0){
   $dislikeStyle = 'display:none;';
} 
if($dataSharedPost){ 
   $bSharedPost = $dataSharedPost; 
}else{
  $bSharedPost = $dataPostID;
}
$dataPostEvent_id = isset($PostFromData['post_event_id']) ? $PostFromData['post_event_id'] : NULL;
$dataPostTotalVoted = $Dot->Dot_CountVoteByallID($dataPostID);
if($dataPostSlug){
	if($dataMarketProductTitle){
	      $slugSeo = $base_url.'mymarket/'.$dataPostSlug;
	}else{
	   $slugSeo = $base_url.'status/'.$dataPostSlug;
	}
   
}else{
   $slugSeo = $base_url.'status/'.$dataPostID;
}
$dataPostedUserAvatar = $Dot->Dot_UserAvatar($dataPostUID, $base_url);
/*Post Like Section is STARTED HERE*/
$CheckOnlineUserLikedThisPostBefore = $Dot->Dot_CheckPostLiked($uid, $dataPostID); 

$checkOnlineUserUNlikedThisPostBefore = $Dot->Dot_CheckPostUnLiked($uid, $dataPostID);
$unlikeType = 'unlike';
$UnlikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" tyle=" fill:#000000;" class="punli bunli_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></g></svg>';
if($checkOnlineUserUNlikedThisPostBefore){
$unlikeType = 'unliked';
$UnlikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" tyle=" fill:#000000;" class="punli bunli_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8e24aa"><g id="surface1"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></g></svg>';
}
$LikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ln_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>';
$likeType = 'p_like';
if($CheckOnlineUserLikedThisPostBefore) {
   $LikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ly_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>';
   $likeType = 'p_unlike';
}

/*Post Favourite Section is STARTED HERE*/
$CheckOnlineUserAddedThisPostFromFavouriteList = $Dot->Dot_PostAddedFavouriteListBefore($uid, $dataPostID);
$FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_n_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48.07812,16c-8.76364,0 -16,7.22079 -16,15.98438l-0.07812,144.01562l64,-24l64,24v-11.54687v-132.45313c0,-8.7445 -7.2555,-16 -16,-16zM48.07812,32h95.92188v120.90625l-48,-18l-47.98438,18z"></path></g></g></svg>';
$favType = 'ad_fav';
if($CheckOnlineUserAddedThisPostFromFavouriteList) {
   $FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_y_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3e99ed"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>'; 
   $favType = 'rem_fav';
}
/*Post Comments Section is STARTED HERE*/
$UniqPostLikeCount = $Dot->Dot_UniqPostLikeCount($dataPostID);
$LikeCountStyle ='display:none;';
if($UniqPostLikeCount || $totalyPostUnLiked != 0){
  $LikeCountStyle ='display:block;';
}
$x=1;
$CountUniqPostCommentArray = $Dot->Comments($dataPostID, 0);
$TotallyPostComment='';
if($x){
   if($CountUniqPostCommentArray > 0){
   $CountTheUniqComment = count($CountUniqPostCommentArray);
    $SecondUniqComment = $CountTheUniqComment-5; 
     if($CountTheUniqComment>5){
		 $LikeCountStyle ='display:block;';
	   $TotallyPostComment ='<div class="EDfFK eo2As" id="hd'.$dataPostID.'" style="float: right; line-height: 35px; padding-left: 6px;"><div class="HbPOm y9v3U moreComment" id="commentCount'.$dataPostID.'" data-com="'.$dataPostID.'" data-type="moreComment"><span class="vTJ4h"><span>'.$SecondUniqComment.'</span> '.$page_Lang['see_all_comments'][$dataUserPageLanguage].'</span></div></div>'; 
	  $CountUniqPostCommentArray = $Dot->Comments($dataPostID, $SecondUniqComment);  
   }
   } 
}
//Check loged in USER ID for buttons
$postDeleteButton = '';
$disableCommentbutton = '';
$editPostbutton =''; 
$boostAds =''; 
$editWhoCanSee = '';
$postTextDetails = $Dot->GetTheMentions($dataPostTitleTextDetails,$base_url);
if($dataCommentDisableStatus == '0'){
     $commentDisabledEnabled = 'disable';
	 $commentDisableTextStatus =  $page_Lang['disable_comment_feature'][$dataUserPageLanguage];
}else if($dataCommentDisableStatus == '1'){
     $commentDisabledEnabled = 'enable';
	 $commentDisableTextStatus =  $page_Lang['enable_comment_feature'][$dataUserPageLanguage];
}
/*BURAYA KADAR ALINDI*/
if($dataPostUID == $uid){   
$postDeleteButton = '<div class="post_menu_item hvr-underline-from-center del_post" data-post="'.$dataPostID.'" data-u="'.$dataPostCreatedUserName.'" data-type="deletePost"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('delete_icon').'</span> '.$page_Lang['delete_post'][$dataUserPageLanguage].'</div>';
if($postPageType != 'market'){
	$editWhoCanSee = '<div class="post_menu_item hvr-underline-from-center whns" data-id="'.$dataPostID.'"  data-type="whcnse"><span class="postMenuicon dnb">'.$Dot->Dot_SelectedMenuIcon('who_can_see_this_post').'</span> '.$page_Lang['change_who_can_see'][$dataUserPageLanguage].'</div>';
	$disableCommentbutton = '<div class="post_menu_item disable_comment  hvr-underline-from-center"  id="cm-ed'.$dataPostID.'" data-cmid="'.$dataPostID.'" data-type="'.$commentDisabledEnabled.'" data-uid="'.$dataPostUID.'"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('disable_comment_button').'</span> <span class="cmc'.$dataPostID.'"> '.$commentDisableTextStatus.'</span></div> ';
  $editPostbutton = '<div class="post_menu_item hvr-underline-from-center edit_post" data-post="'.$dataPostID.'"  data-type="editPost"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('edit_icon').'</span> '.$page_Lang['edit_post_'][$dataUserPageLanguage].'</div>'; 
}
  if($dataMarketProductPrice){
     $boostAds = '<div class="post_menu_item hvr-underline-from-center boost_post" data-boost="'.$dataPostID.'"  data-type="boost_product"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('boost_icon').'</span> '.$page_Lang['boost_product'][$dataUserPageLanguage].'</div>';
  }
  
}  
$copyUrl = '<div class="post_menu_item copyUrl" data-clipboard-text="'.$slugSeo.'"  onclick="M.toast({html: \''.$page_Lang['link_copied'][$dataUserPageLanguage].'\'})"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('copy_url_icon').'</span> Copy Url</div>';
$verifiedBadge = '';
if($dataUserVerified == '1'){
   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
}
$dataPostWaterMarkID = isset($PostFromData['watermarkid']) ? $PostFromData['watermarkid'] : NULL; 
if($dataPostWaterMarkID){
   $patternDetails = $Dot->Dot_WaterMarkDetails($dataPostWaterMarkID); 
   $waterMarkImage = $patternDetails['watermark_image'];
   $waterMarkTextColor = $patternDetails['watermark_text_color'];
   $colorWaterMark = $Dot->Dot_GetColorFromID($waterMarkTextColor);
}
$dataPostWhichImage = isset($PostFromData['which_image']) ? $PostFromData['which_image'] : NULL; 
$longText = '';
$longTexts = '';
$showMoreBtn = '';
$showMoreBtns = '';
$str_length = strlen($postTextDetails);
if($str_length > 500) {
   $longText= 'readmore';
   $showMoreBtn = '<div class="showMoreText" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
} 
 

$sharePostHeader = '';
$checkPostAlreadyExist = $Dot->Dot_CheckPostAlreadyInData($dataSharedPost); 
if($checkPostAlreadyExist){
	$FirstSharerUserID = $Dot->Dot_GetUserIDFromPostID($dataSharedPost);
   $sharePostHeader = '<div class="event_s_b">'.$page_Lang['first_sharer'][$dataUserPageLanguage].' <span class="baseline event_s_b_i" style="margin-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#43a047"><path d="M64.514,35.83333c-6.01283,0 -9.35429,6.95167 -5.59896,11.64583c1.36167,1.6985 3.42029,2.6875 5.59896,2.6875h64.486c3.956,0 7.16667,3.21067 7.16667,7.16667v43h-11.22591c-4.14233,0 -6.43645,4.78834 -3.84929,8.02051l17.2308,21.55599c2.56567,3.21067 7.45647,3.21067 10.02214,0l17.2308,-21.55599c2.58717,-3.23217 0.29305,-8.02051 -3.84929,-8.02051h-11.22591v-43c0,-11.87517 -9.62483,-21.5 -21.5,-21.5zM28.66667,39.68262c-1.86333,0 -3.72823,0.80222 -5.01107,2.40755l-17.23079,21.55599c-2.58717,3.23217 -0.29305,8.02051 3.84928,8.02051h11.22591v43c0,11.87517 9.62483,21.5 21.5,21.5h64.486c6.01283,0 9.35429,-6.95167 5.59896,-11.64583c-1.36167,-1.6985 -3.42029,-2.6875 -5.59896,-2.6875h-64.486c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667v-43h11.22591c4.14233,0 6.43645,-4.78834 3.84928,-8.02051l-17.23079,-21.55599c-1.28283,-1.60533 -3.14773,-2.40755 -5.01107,-2.40755z"></path></g></g></svg></span><a href="'.$base_url.'profile/'.$Dot->Dot_GetUserName($FirstSharerUserID).'">'.$Dot->Dot_UserFullName($FirstSharerUserID).'</a></div>';
}
$sharedFrom = '';
if($postPageType == 'event'){
   $eventPageDetails = $Dot->Dot_EventProfilePageDetails($postPageEventID);
   $eventPageName = $eventPageDetails['event_title'];
   $sharedFrom = '<span class="the_page_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M20.07692,81.40385l98.07692,-7.38462v-23.25c0,-2.42308 1.18269,-4.24039 3.54808,-6.05769c2.36538,-0.60577 4.73077,-0.60577 6.49038,0.60577c24.23077,16.96154 47.27885,45.375 47.85577,46.58654c0.57692,1.15385 1.125,2.88462 1.15385,4.09615c0,0.02884 0.02884,0.08654 0.02884,0.11538c0,1.21154 -0.57692,3.02884 -1.18269,3.63462c-0.57692,1.21153 -23.04808,29.71153 -47.85577,46.67307c-2.36538,1.21154 -4.73077,1.81731 -6.49038,0.60577c-2.36539,-1.21153 -3.54808,-3.02884 -3.54808,-5.45192v-23.25l-98.07692,-7.38462c-2.9423,-2.36539 -5.30769,-8.30769 -5.30769,-14.82693c0,-5.88462 1.75961,-12.34615 5.30769,-14.71153z"></path></g></g></g></svg></span><div class="t_page"><a href="'.$base_url.'event/'.$postPageEventID.'">'.stripslashes($eventPageName).'</a></div>';
}
$EventPostDetailsHere = '';
$sharedEvent ='';
if($dataPostType == 'p_event'){
    $eventPostWallDetails = $Dot->Dot_EventProfilePageDetails($dataPostEvent_id);
    $post_event_id = $eventPostWallDetails['event_id'];
    $post_event_title = $eventPostWallDetails['event_title'];
    $post_event_description = $eventPostWallDetails['event_description'];
    $post_event_location = $eventPostWallDetails['event_location'];
    $post_event_start = $eventPostWallDetails['event_start'];
    $post_event_start_time = $eventPostWallDetails['event_start_time'];
    $post_event_end = $eventPostWallDetails['event_end'];
    $post_event_end_time = $eventPostWallDetails['event_end_time'];
    $post_event_creator_id = $eventPostWallDetails['uid_fk'];
    $post_event_type = $eventPostWallDetails['event_typ']; 
    $post_event_cover = $eventPostWallDetails['event_cover'];
	$eventCoverImage = '<img src="'.$base_url.'uploads/event__type_covers/'.$post_event_cover.'">';  
	$post_event_start_day_number = date('d', strtotime($post_event_start));
	$post_event_end_day_number = date('d', strtotime($post_event_end));
	$post_event_started_month = date('m', strtotime($post_event_start)); 
	$post_event_end_month = date('m', strtotime($post_event_end));  
	$post_event_day_left = strtotime($post_event_end) - strtotime($post_event_start);
	$post_event_year_started= strtotime($post_event_start); 
	$post_event_year_ended= strtotime($post_event_end);
	$calculate_event_day = round($post_event_day_left / (60 * 60 * 24)); 
	$eventHolder = array( "{DateBetween}"); 
	$replaceThisDay  = array( "".$calculate_event_day."");  
	$post_event_left_note = preg_replace($eventHolder, $replaceThisDay,  $page_Lang['number_of_days_remaining'][$dataUserPageLanguage]);   
	if($calculate_event_day == '0'){
	   $post_event_left_note = $page_Lang['event_today'][$dataUserPageLanguage];
	} elseif($calculate_event_day > 0){
		$post_event_left_note = $post_event_left_note;
	} else {
	   $post_event_left_note = $page_Lang['event_finished'][$dataUserPageLanguage];
	}
	$monthsa = array('01' => $page_Lang['jan'][$dataUserPageLanguage], '02' => $page_Lang['feb'][$dataUserPageLanguage], '03' => $page_Lang['mar'][$dataUserPageLanguage], '04' => $page_Lang['apr'][$dataUserPageLanguage], '05' => $page_Lang['may'][$dataUserPageLanguage], '06' => $page_Lang['jun'][$dataUserPageLanguage], '07' => $page_Lang['jul'][$dataUserPageLanguage], '08' => $page_Lang['aug'][$dataUserPageLanguage], '09' => $page_Lang['sep'][$dataUserPageLanguage], '10' => $page_Lang['oct'][$dataUserPageLanguage], '11' => $page_Lang['nov'][$dataUserPageLanguage], '12' => $page_Lang['dec'][$dataUserPageLanguage]);
	$EventPostDetailsHere = '  
	 <div class="event_post_container">
		<div class="event_post_cover"><a href="'.$base_url.'event/'.$post_event_id.'">'.$eventCoverImage.'</a></div>
		<div class="event_post_details_box">
		<div class="event_post_time">'.$post_event_start_day_number.' '.$monthsa[$post_event_started_month].'</div>
		<div class="event_post_name"><a href="'.$base_url.'event/'.$post_event_id.'">'.stripslashes($post_event_title).'</a></div>
		<div class="event_post_information">'.mb_strimwidth(stripslashes($post_event_description) , 0, 200, "...").'</div>
		<div class="event_post_location">'.htmlcode($post_event_location).'</div>
		<div class="event_post_image">
		<div class="event_post_image_icon">'.$Dot->Dot_GetEventIconFromID($post_event_type).'</div>
		<div class="event_post_tip_name">'.$page_Lang[$Dot->Dot_GetEventKeyFromID($post_event_type)][$dataUserPageLanguage].'</div>
	 </div>
		<div class="event_day_time"><span style="float:left; margin-right:15px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#606770"><g id="surface1"><path d="M53.76,0c-7.335,0 -14.43,1.23 -21.12,4.17c-1.29,0.51 -2.205,1.695 -2.37,3.09c-0.18,1.395 0.42,2.76 1.56,3.57c1.125,0.825 2.625,0.96 3.885,0.36c5.595,-2.445 11.565,-3.51 18.045,-3.51c25.59,0 46.08,20.49 46.08,46.08c0,25.59 -20.49,46.08 -46.08,46.08c-25.59,0 -46.08,-20.49 -46.08,-46.08c0,-11.67 4.47,-22.11 11.52,-30.39v10.035c-0.015,1.38 0.705,2.67 1.905,3.375c1.2,0.69 2.67,0.69 3.87,0c1.2,-0.705 1.92,-1.995 1.905,-3.375v-21.885h-21.885c-1.38,-0.015 -2.67,0.705 -3.375,1.905c-0.69,1.2 -0.69,2.67 0,3.87c0.705,1.2 1.995,1.92 3.375,1.905h7.65c-7.71,9.405 -12.645,21.33 -12.645,34.56c0,14.655 5.865,27.915 15.36,37.62v85.26c0,4.245 3.435,7.68 7.68,7.68h153.6c4.245,0 7.68,-3.435 7.68,-7.68v-119.04h-76.98c0.105,-1.275 0.18,-2.55 0.18,-3.84c0,-1.29 -0.105,-2.565 -0.195,-3.84h76.995v-26.88c0,-4.455 -3.225,-7.68 -7.68,-7.68h-19.2v-7.68c0,-4.2 -3.48,-7.68 -7.68,-7.68h-7.68c-4.2,0 -7.68,3.48 -7.68,7.68v7.68h-43.02c-9.705,-9.495 -22.965,-15.36 -37.62,-15.36zM142.08,7.68h7.68v23.04h-7.68zM53.7,19.14c-2.115,0.045 -3.81,1.785 -3.78,3.9v30.105c-0.12,0.825 0.015,1.665 0.42,2.4c0.345,0.69 0.9,1.26 1.575,1.635l14.91,11.175c1.695,1.275 4.095,0.93 5.37,-0.78c1.275,-1.695 0.93,-4.095 -0.78,-5.37l-13.815,-10.365v-28.8c0.015,-1.035 -0.39,-2.04 -1.125,-2.775c-0.735,-0.735 -1.74,-1.14 -2.775,-1.125zM103.68,80.64h19.2v19.2h-19.2zM130.56,80.64h19.2v19.2h-19.2zM96,86.955v0.27l-0.54,0.45c0.195,-0.225 0.36,-0.48 0.54,-0.72zM49.92,107.52h19.2v19.2h-19.2zM76.8,107.52h19.2v19.2h-19.2zM103.68,107.52h19.2v19.2h-19.2zM130.56,107.52h19.2v19.2h-19.2zM49.92,134.4h19.2v19.2h-19.2zM76.8,134.4h19.2v19.2h-19.2zM103.68,134.4h19.2v19.2h-19.2zM130.56,134.4h19.2v19.2h-19.2z"></path></g></g></g></svg></span>'.$post_event_left_note.'</div>
		</div>
		</div>
		  ';
  $sharedEvent = '<div class="event_s_b">'.$dataPostCreatedUserFullName.' <span class="baseline event_s_b_i"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M112,64c-80,0 -88,96 -88,96c0,0 16,-40 88,-40v32l64,-61.536l-64,-58.464z"></path></g></g></svg></span> '.$page_Lang['shared_this_event'][$dataUserPageLanguage].'</div>';
  if($post_event_creator_id == $uid) {
      $sharedEvent = '<div class="event_s_b">'.$dataPostCreatedUserFullName.' '.$page_Lang['created_an_event'][$dataUserPageLanguage].'. <span class="baseline event_s_b_i" style="margin-right:5px;">'.$Dot->Dot_SelectedMenuIcon('shared_icon').'</span><a href="'.$base_url.'event/'.$post_event_id.'">'.stripslashes($post_event_title).'</a></div>';
  }
}
$feelingStatus = '';
   if($dataPostUserFeeling){
	 $GetFeelingStatus = $Dot->Dot_GetFeelingStatus($dataPostUserFeeling);
	 $FeelingKey = $GetFeelingStatus['f_key'];
	 $FeelingName = $GetFeelingStatus['f_name'];  
	 $FeelingImage = $GetFeelingStatus['f_img'];
	 $feelingStatus ='<div class="feeling-status-box"><img src="'.$base_url.'uploads/feelings/'.$FeelingName.'/'.$FeelingImage.'" class="feeling_emoji_img"> '.$page_Lang[$FeelingKey][$dataUserPageLanguage].'</div>';   
}
$postDonateButton = '';
$postDonateButtonFooter = '';
if($dataPostUID != $uid){
$postDonateButton = '<div class="post_menu_item hvr-underline-from-center mamount" data-donateid="'.$dataPostID.'"  data-type="donateFrm" data-u="'.$dataPostUID.'"><span class="postMenuicon dnb">'.$Dot->Dot_SelectedMenuIcon('donate_icon').'</span> '.$page_Lang['donate_this_post'][$dataUserPageLanguage].'</div>';
$postDonateButtonFooter = '<span class="dCJp8_don mamount tooltipster-punk-preview tooltipsteredOn dnf" data-donateid="'.$dataPostID.'"  data-type="donateFrm" data-u="'.$dataPostUID.'" title="'.$userDonateMessage.'">'.$Dot->Dot_SelectedMenuIcon('donate_icon').'</span>';
}
$startMute = '';
if($videoSoundOpenStatus == false){
   $startMute = '<div class="mute_btn_ob"  id="'.$dataPostID.'"></div>';
}
?>
<!--Post STARTED-->
<div class="zMhqu white_bg u_p<?php echo $dataPostID;?> body<?php echo $dataPostID;?>" id="u_p<?php echo $dataPostID;?>"  data-last="<?php echo $dataPostID;?>"> 
 <!--Post Menu STARTED-->
 <div class="post_menu_container post_menu_<?php echo $dataPostID;?>" id="post_menu_<?php echo $dataPostID;?>">
      <?php 
	  echo $editWhoCanSee;
	  echo $editPostbutton;
	  echo $disableCommentbutton;
	  echo $copyUrl;
	  echo $postDeleteButton;
	  echo $boostAds;
	  echo $postDonateButton;
	  ?>
     <div class="post_menu_item hvr-underline-from-center rep_post" data-post="<?php echo $dataPostID;?>" data-u="<?php echo $dataPostCreatedUserName;?>" data-block="<?php echo $dataPostUID;?>" data-type="getReport"><span class="postMenuicon"><?php echo $Dot->Dot_SelectedMenuIcon('report_icon');?></span> <span class="rep_<?php echo $dataPostID;?>"><?php echo $page_Lang['report_this_post'][$dataUserPageLanguage];?></span></div>
 </div>
 <!--Post Menu FINISHED--> 
 <?php echo $sharePostHeader; echo $sharedEvent;?>
  <!--Header STARTED-->
  <div class="Ppjfr">
     <?php echo $MarketPlacePost; echo $userisPro;?> 
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
      <div class="post_menu_icn"><?php echo $Dot->Dot_SelectedMenuIcon('dotdot_sleep_icon');?></div> 
    </div>
    <?php echo $loginStatus;?>
  </div>
  <!--Header FINISHED-->
  <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container">
    <div class="fast_icon_answer ic<?php echo $dataPostID;?>" id="ic<?php echo $dataPostID;?>"></div>
     <?php 
	     echo $feelingStatus;
	     if($dataPostTitleText || $dataPostTitleTextDetails || $postLatitude || $postLongitude){
			  echo '<div class="post_text_container">';
			  if($dataPostTitleText){
				  echo '<div class="post_title theTit_'.$dataPostID.'" id="post_title'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$dataPostTitleText.'">'.congract($dataPostTitleText).'</div>';
			  }
			  if($dataPostWaterMarkID){
				  echo '<div class="post_text_info_watermark post_info'.$dataPostID.'" style="background-image:url('.$base_url.'uploads/watermarkbg/'.$waterMarkImage.'); color:#'.$colorWaterMark.';" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.strip_unsafe(styletext($dataPostTitleTextDetails)).'">'.strip_unsafe(styletext($postTextDetails)).'</div>';
			  }else if($postTextDetails){
			       echo '<div class="post_text_info post_info'.$dataPostID.' '.$longText.'" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.strip_unsafe(styletext($dataPostTitleTextDetails)).'">'.strip_unsafe(styletext(congract($postTextDetails))).' '.$showMoreBtn.'</div>';
			  }
			 /* if($dataPostTitleTextDetails){
				  echo '<div class="post_text_info" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.strip_unsafe(styletext($postTextDetails)).'</div>';
			  }*/
			  if($postLatitude && $postLongitude){
				    echo '<div class="placeLocationFrame"><iframe src="https://maps.google.com/maps?q='.$postLatitude.','.$postLongitude.'&z=12&output=embed" width="100%" height="270" frameborder="0" style="border:0"></iframe></div>';
	          }
			  echo '</div>';
		 }  
		 if($dataBeforeAfterImages){ 
			    $wBfaf = explode(',', $dataBeforeAfterImages);
                $last1 = isset($wBfaf[1]) ? $wBfaf[1] : NULL;
                $last2 = isset($wBfaf[0]) ? $wBfaf[0] : NULL; 
				$before=$base_url."uploads/images/".$last1;
				$after=$base_url."uploads/images/".$last2;
				echo '<div class="js-img-compare">  
						  <div>
						       <span class="images-compare-label">'.$page_Lang['before_text'][$dataUserPageLanguage].'</span>
								<img src="'.$before.'"> 
						  </div> 
						  <div>
						       <span class="images-compare-label">'.$page_Lang['after_text'][$dataUserPageLanguage].'</span>
								<img src="'.$after.'"> 
						  </div> 
						 </div> ';   
		 }
		 if($dataPostWhichImage){
		      $w = explode(",", $dataPostWhichImage);  
			  echo '<div class="whichImagesBox gallery" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">';
			  echo '<span class="votePeopleSum"><div class="center_me" id="vs_'.$dataPostID.'">'.$dataPostTotalVoted.'</div></span>';
			 foreach($w as $wi) {
				 // Get the uploaded image ids
			   $whichImagesFromData=$Dot->Dot_GetUploadImageID($wi);
			   if($whichImagesFromData) {
				  // The path to be parsed
				  $final_image=$base_url."uploads/images/".$whichImagesFromData['uploaded_image']; 
				  $whichImageID = $whichImagesFromData['image_id']; 
				   echo '
				  <div class="whichImage" id="wi_'.$whichImageID.'" data-src="'.$final_image.'">
				      <a  href="'.$final_image.'">
					  <div class="whichImageBox '.$dataPostCreatedFilterName.'" style="background-image: url('.$final_image.');">
						 <img src="'.$final_image.'" class="whichImageBox_hide '.$dataPostCreatedFilterName.'">
					  </div>
					  </a> 
				   </div> 
				  '; 
				}
			 }
			 echo '<div class="whicImage_precent_heart">';  
			 foreach($w as $wa) {
				 // Get the uploaded image ids
			   $whichImagesFromDatas=$Dot->Dot_GetUploadImageID($wa);
			   if($whichImagesFromDatas) {
				   $whichImageIDa = $whichImagesFromDatas['image_id']; 
				   $checkPostVotedBefore = $Dot->Dot_CheckVotedBefore($uid, $whichImageIDa); 
				    $voteCount = $Dot->Dot_CountVoteByID($whichImageIDa);
					$allVotesCount = $Dot->Dot_CountVoteByallID($dataPostID);  
					$percent_friendly = '0';
					if(!empty($allVotesCount)){
					    $percent = $voteCount/$allVotesCount;
					    $percent_friendly = number_format( $percent * 100 ); 
					} 
				   if($checkPostVotedBefore){
					   $votedIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>';   
					   $vtb = 'voted';
				   }else{ 
				       $votedIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>';  
					   $vtb = 'notvoted';
				   }
				   echo ' <div class="countBox">
								  <div class="whichImageHeart heart_'.$whichImageIDa.' heart_v_'.$dataPostID.'" id="'.$whichImageIDa.'" data-id="'.$dataPostID.'" title="'.$vtb.'">
									   '.$votedIcon.' 
								  </div> 
								  <div class="voteCount" id="vtc_'.$whichImageIDa.'">'.$percent_friendly.'</div>
							 </div>'; 
			   } 
			 }
			 
	          echo '</div></div>';
		 }
		 if($dataMarketProductPrice){ 
			   $color = substr(md5(rand()), 0, 6); 
			   $colorText = substr(md5(rand()), 0, 6);
			   $supponsoredProduct ='';
			   $Dot->Dot_ProductSeenSingle($uid, $dataPostID);
			   if($dataMarketProductAdsStatus == '1'){
				 echo $Dot->Dot_UpdateSeenProductPrice($dataPostID, $uid, $adsPerimpression);
			   } 
			   $shoppingBoxIcon = '<div class="shoppingBox addttCart" data-id="'.$dataPostID.'">'.$Dot->Dot_SelectedMenuIcon('shopping_cart').'</div>';
			   if($dataMarketProductAdsStatus != '0'){$supponsoredProduct = '<div class="sponsor_wrap"><div class="sponsor_rel"><div class="sponsor_rot"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffa000"><path d="M85.91937,8.52609c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.23391v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851zM49.64485,18.21453c-1.81993,0.07025 -3.46807,1.09462 -4.33672,2.69541c-0.86865,1.6008 -0.82916,3.54093 0.10391,5.10506l12.04,20.855c0.8869,1.66261 2.60952,2.70962 4.49377,2.73132c1.88425,0.0217 3.63053,-0.98536 4.55548,-2.62711c0.92496,-1.64175 0.88152,-3.65713 -0.11332,-5.2575l-12.04,-20.86172c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM122.20063,18.21453c-1.88461,-0.01648 -3.62832,0.99575 -4.5486,2.64047l-12.04,20.86172c-0.99483,1.60037 -1.03827,3.61575 -0.11332,5.2575c0.92496,1.64175 2.67123,2.64881 4.55548,2.62711c1.88425,-0.0217 3.60687,-1.06871 4.49377,-2.73132l12.04,-20.855c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM23.56938,44.6864c-2.38408,-0.09103 -4.51977,1.46408 -5.16507,3.76097c-0.6453,2.29689 0.36803,4.73671 2.4507,5.90059l20.86172,12.04c1.60037,0.99483 3.61575,1.03827 5.2575,0.11332c1.64175,-0.92496 2.64881,-2.67123 2.62711,-4.55548c-0.0217,-1.88425 -1.06871,-3.60687 -2.73132,-4.49377l-20.855,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44562,-0.72563zM148.79344,44.6864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.855,12.04c-1.66261,0.8869 -2.70962,2.60952 -2.73132,4.49377c-0.0217,1.88425 0.98536,3.63053 2.62711,4.55548c1.64175,0.92496 3.65713,0.88152 5.2575,-0.11332l20.86172,-12.04c2.0226,-1.1314 3.04289,-3.47238 2.49482,-5.72418c-0.54807,-2.2518 -2.53007,-3.86205 -4.84638,-3.93738zM13.76,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM134.16,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM44.52515,104.8864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.86172,12.04c-1.63833,0.90063 -2.66142,2.61692 -2.6744,4.48643c-0.01298,1.86951 0.98619,3.59984 2.61185,4.52313c1.62566,0.92329 3.62356,0.89513 5.22255,-0.07362l20.855,-12.04c2.02174,-1.13069 3.04233,-3.47001 2.496,-5.7211c-0.54634,-2.25109 -2.52572,-3.86232 -4.84084,-3.94046zM127.83765,104.8864c-2.38276,-0.08765 -4.51534,1.46853 -5.15877,3.76445c-0.64343,2.29591 0.36983,4.73372 2.45112,5.89712l20.855,12.04c1.59899,0.96874 3.59689,0.9969 5.22255,0.07362c1.62566,-0.92329 2.62483,-2.65362 2.61185,-4.52313c-0.01298,-1.86951 -1.03607,-3.5858 -2.6744,-4.48643l-20.86172,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44563,-0.72563zM62.00063,122.48281c-1.88603,-0.01513 -3.63007,0.99987 -4.5486,2.64719l-12.04,20.855c-0.96874,1.59899 -0.9969,3.59689 -0.07362,5.22255c0.92329,1.62566 2.65362,2.62483 4.52313,2.61185c1.86951,-0.01298 3.5858,-1.03607 4.48643,-2.6744l12.04,-20.86172c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM109.84485,122.48953c-1.81782,0.07154 -3.46368,1.09495 -4.33192,2.69362c-0.86824,1.59867 -0.83059,3.5364 0.09911,5.10013l12.04,20.86172c0.90063,1.63833 2.61692,2.66142 4.48643,2.6744c1.86951,0.01298 3.59984,-0.98619 4.52313,-2.61185c0.92329,-1.62566 0.89513,-3.62356 -0.07362,-5.22255l-12.04,-20.855c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM85.91937,128.9261c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.2339v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851z"></path></g></g></svg></div>
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
			    <div class="product_more" style="background-color:#'.$color.';">'.$shoppingBoxIcon.'
				    <div class="product_price">
					<div class="adtoCardText">Add to Card</div>
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M165.10656,70.10344l0.01344,-51.18344c0,-6.63812 -5.40187,-12.04 -12.04,-12.04l-51.17,0.01344l-2.16344,-0.01344c-4.46125,0 -8.7075,0.25531 -11.77125,3.31906l-78.17938,78.16594c-1.88125,1.88125 -2.91594,4.38063 -2.91594,7.04125c0,2.64719 1.03469,5.14656 2.91594,7.02781l59.77,59.77c1.86781,1.88125 4.36719,2.91594 7.02781,2.91594c2.64719,0 5.16,-1.03469 7.02781,-2.91594l78.17937,-78.19281c3.35938,-3.34594 3.3325,-8.15656 3.31906,-12.80594zM109.73063,91.16l-4.81063,-4.81062c3.09063,-4.47469 3.78938,-9.98406 -1.37062,-15.14406c-7.22938,-7.21594 -13.07469,-3.09063 -15.14406,-1.03469c-4.81063,4.82406 -1.72,10.66937 2.41875,17.2c4.81062,7.91469 8.93594,16.86406 1.02125,24.77875c-9.28531,9.63469 -20.64,3.77594 -25.10125,0.68531l-4.47469,4.47469l-4.82406,-4.82406l4.82406,-4.81063c-3.44,-4.81062 -8.26406,-14.44531 1.37062,-25.8l4.81063,4.81063c-3.09063,3.09062 -6.88,11.00531 0.69875,18.57062c7.56531,7.57875 12.72531,5.85875 16.85062,1.72c11.69063,-11.69062 -18.92,-26.48531 -3.44,-41.96531c8.25063,-8.25063 18.57063,-4.47469 23.04531,-1.03469l5.50937,-5.49594l4.81063,4.81063l-5.49594,5.50937c5.84531,8.25063 3.09062,15.48 -0.69875,22.36zM134.16,48.16c-5.6975,0 -10.32,-4.6225 -10.32,-10.32c0,-5.6975 4.6225,-10.32 10.32,-10.32c5.6975,0 10.32,4.6225 10.32,10.32c0,5.6975 -4.6225,10.32 -10.32,10.32z"></path></g></g></g></svg> '.$theCurrentPrice.'</div>
					<a href="'.$dataPostSlug.'" class="prduct"><span class="go_product">'.$page_Lang['see_product_details'][$dataUserPageLanguage].' <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M79.6145,21.5v0c-9.5245,0 -15.2005,10.61383 -9.91867,18.54017l30.6375,45.95983l-30.6375,45.95983c-5.28183,7.92633 0.39417,18.54017 9.91867,18.54017v0c3.98467,0 7.71133,-1.99233 9.92583,-5.3105l34.15633,-51.24167c3.21067,-4.816 3.21067,-11.08683 0,-15.90283l-34.15633,-51.24167c-2.2145,-3.311 -5.934,-5.30333 -9.92583,-5.30333z"></path></g></g></svg></span></a>
				</div>
			 ';
		 } 
		 if($dataPostCreatedImages && $dataPostType !=='p_avatar' && $dataPostType !=='p_cover') {
			$s = explode(",", $dataPostCreatedImages); // Explode the images string value
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
			echo '<div class="item column-1 '.$PopUpStart.'" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">';
			foreach($s as $a) {
				// Get the uploaded image ids
			   $newdata=$Dot->Dot_GetUploadImageID($a);
			   if($newdata) {
				   $nudePhoto = '';
				   $nsldimgWarning ='';
				   $nsldimg = 'sldimg'; 
				  // The path to be parsed
				  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
				  if($newdata['nude_score'] >= 70){
				       $nsldimg = 'nsldimg';
					   $nsldimgWarning = '<div class="nudePhotoNote him'.$newdata['image_id'].'"><div class="showNudeImageButon"><div class="nudeImageNotWrapper"><div class="nudeNote">Are you sure you want to open this inappropriate photo?</div><div class="openNudePhoto" data-id="'.$newdata['image_id'].'">'.$Dot->Dot_SelectedMenuIcon('see_profle').'</div></div></div></div>';
				   }
				  echo '  
				  <div class="tnp'.$newdata['image_id'].' '.$nsldimg.'" '.$nudePhoto.'  data-src="'.$final_image.'"> '.$nsldimgWarning.' 
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
			if($dataPostCreatedLinkImg){ 
			$em = new Mat_Expand($dataPostCreatedLinkUrl);
	        // Get the link size
            $site = $em->get_site();
				if($site){
				  echo '<div class="url_link_img" data-ytkey="'.$dataPostID.'">
				    <div class="url_link_mini_link">'.$dataPostCreatedLinkMiniUrl.'</div>
					     <img src="'.$dataPostCreatedLinkImg.'" class="a0uk">
						 <div class="rightUpIcon emyt" data-ytkey="'.$dataPostID.'">
					    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M143.19336,21.43001c-0.26705,0.00844 -0.53341,0.03181 -0.79785,0.06999h-34.89551c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h18.53256l-66.59961,66.59961c-1.8722,1.79752 -2.62637,4.46674 -1.97164,6.97823c0.65473,2.51149 2.61604,4.4728 5.12753,5.12753c2.51149,0.65473 5.18071,-0.09944 6.97823,-1.97165l66.59961,-66.59961v18.53255c-0.03655,2.58456 1.32136,4.98858 3.55376,6.29153c2.2324,1.30295 4.99342,1.30295 7.22582,0c2.2324,-1.30295 3.59031,-3.70697 3.55376,-6.29153v-34.9235c0.28889,-2.08845 -0.35639,-4.19816 -1.76411,-5.76769c-1.40772,-1.56953 -3.43507,-2.43964 -5.54253,-2.3788zM35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-43c0.03655,-2.58456 -1.32136,-4.98858 -3.55376,-6.29153c-2.2324,-1.30295 -4.99342,-1.30295 -7.22582,0c-2.2324,1.30295 -3.59031,3.70697 -3.55376,6.29153v43h-100.33333v-100.33333h43c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376z"></path></g></g></svg>
				  </div>
					</div>
					';    
				}else{
				echo '<a href="'.$dataPostCreatedLinkUrl.'" target="_blank"><div class="url_link_img"><div class="url_link_mini_link">'.$dataPostCreatedLinkMiniUrl.'</div><img src="'.$dataPostCreatedLinkImg.'" class="a0uk"></div>';
				} 
			}
			if($dataPostCreatedLinkDescription || $dataPostCreatedLinkTitle){
				echo '<div class="link_url_des_title">';
			     if($dataPostCreatedLinkTitle){
				    echo '<div class="link_title_url"><a href="'.$dataPostCreatedLinkUrl.'" target="_blank">'.$dataPostCreatedLinkTitle.'</a></div>';
				 }
				 if($dataPostCreatedLinkDescription){
				    echo '<div class="link_description_url">'.$dataPostCreatedLinkDescription.'</div>';
				 }
				echo '</div>'; 
				if(!$site){
				   echo '</a>';   
				}
			}
			if($dataPostCreatedVideoID){
				$VideoData = $Dot->Dot_GetUploadedVideoID($dataPostCreatedVideoID);
				$getVideoImage = $VideoData['video_path'];
				$getVideoExtension = $VideoData['video_ext'];
				$videoTumbnail =''; 
				$tumbImage = $base_url.'uploads/video/'.$dataPostVideoScreenShot.'.png'; 
				if(file_exists($tumbImage) && filesize($tumbImage) > 0) {  
				   $videoTumbnail = $base_url.'uploads/video/'.$dataPostVideoScreenShot.'.png';  
                } else {
				   $videoTumbnail = $base_url.'uploads/video/safe_video.png'; 
			    }  
			   echo '
			   <div class="item column-video" id="videobox'.$dataPostID.'" data-id="'.$dataPostID.'">
			   <div class="float_video_c icon_utuNew" data-id="'.$dataPostID.'" data-type="floatVideo" data-user="'.$dataPostUID.'"></div>
			   <!--Media Player STARTED-->
					<div class="media-wrapper videoPlayr" id="videoPlayer'.$dataPostID.'"> 
						<video class="vidchaVideo mejs__player el_'.$dataPostID.'" id="player'.$dataPostID.'" data-id="'.$dataPostID.'" width="100%" height="360"style="max-width:100%;" src="'.$base_url.'uploads/video/'.$VideoData['video_path'].'.'.$getVideoExtension.'" type="video/mp4"  poster="'.$videoTumbnail.'" controls preload="none"></video>
					</div>
			   <!--Media Player FINISHED--> 
			   '.$startMute.'
			</div> 
			   ';
			} 
			if($dataPostCreatedAudioID){
				$getAudio = $Dot->Dot_GetUploadedAudioID($dataPostCreatedAudioID);
				$audioPath = $getAudio['audio_path']; 
			    echo '
				<!--Media Player STARTED-->
			   <div class="media-wrapper">
				   <audio class="player_aud" preload="none" controls style="max-width:100%;">
					  <source src="'.$base_url.'uploads/audio/'.$audioPath.'" type="audio/mp3">
				   </audio>
			   </div>
			   <!--Media Player FINISHED-->
				';
			}
			if($dataUserGifPost){
			    echo '
				<div class="item column-1" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">
				<div class="sldimg"  data-src="'.$dataUserGifPost.'">
				  <a class="single-image" href="'.$dataUserGifPost.'">
					<div class="gif_jjzlbU">
					  <img class="giphyClass" src="'.$dataUserGifPost.'">
					</div>
					</a>
				  </div>
				  </div>
				';
			}
			
			if($dataPostType == 'p_avatar'){
			    $uploadedAvatar = $Dot->Dot_GetUploadedAvatarID($dataPostCreatedImages);
				$userAvatarPath = $uploadedAvatar['image_path']; 
				echo '
				   <div class="item">
				      <img src="'.$base_url.'uploads/avatar/'.$userAvatarPath.'"  class="a0uk">
					  <div class="u_new_avatar">'.$page_Lang['new_avatar_image_uploaded'][$dataUserPageLanguage].'</div>
				   </div>
				';
			}
			if($dataPostType == 'p_cover'){
			    $uploadedAvatar = $Dot->Dot_GetUploadedCoverID($dataPostCreatedImages);
				$userAvatarPath = $uploadedAvatar['image_path']; 
				echo '
				   <div class="item">
				      <img src="'.$base_url.'uploads/cover/'.$userAvatarPath.'"  class="a0uk">
					  <div class="u_new_avatar">'.$page_Lang['new_cover_image_uploaded'][$dataUserPageLanguage].'</div>
				   </div>
				';
			}
			if($dataPostHashTagDiez){echo '<span class="hashtags" id="ht-i'.$dataPostID.'">'.makeHashLink($dataPostHashTagDiez, $base_url).'</span>';}
			if($dataPostType == 'p_event'){ 
				  echo $EventPostDetailsHere;
			}
			if($checkPostAlreadyExist){
				 $sharedPostDetail = $Dot->Dot_GetSomeDetailsFromSharedPost($dataSharedPost);
				 $sharedPostTitle = $sharedPostDetail['post_title_text'];
				 $sharedPostDesc = $sharedPostDetail['post_text_details'];
				 $str_lengthS = strlen($sharedPostDesc);
					if($str_lengthS > 500) {
					   $longTexts= 'readmore';
					   $showMoreBtns = '<div class="showMoreTexts" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
					} 
					if($dataPostWaterMarkID){
					   $wtStyle = '<div class="post_text_info_watermark post_info'.$dataPostID.'" style="background-image:url('.$base_url.'uploads/watermarkbg/'.$waterMarkImage.'); color:#'.$colorWaterMark.';" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$sharedPostDesc.'">'.strip_unsafe(styletext($sharedPostDesc)).'</div>';
					}else{
					   $wtStyle = '<div class="post_text_info_share post_infos'.$dataPostID.' '.$longTexts.'" data-linkify="this" data-linkify-target="_target">'.strip_unsafe(styletext($sharedPostDesc)).' '.$showMoreBtns.'</div>';
					}
					if($sharedPostTitle){$sTitle = '<div class="post_title_share" data-linkify="this" data-linkify-target="_target">'.$sharedPostTitle.'</div>';}else{$sTitle='';}
			    echo '
				<div class="post_text_container_shared">
				   '.$sTitle.'
				   '.$wtStyle.'
				</div>
				';
			}
	 ?>  
<?php if($dataPostType != 'p_product'){?>   
    <!--Like Comment Share and Some Other box STARTED-->
    <div class="here<?php echo $dataPostID;?>">
      <!--Like Share Comment Button STARTED-->
      <div class="ltpMr eo3As" id="after_p<?php echo $dataPostID;?>" data-id="<?php echo $dataPostID;?>">
        <span class="fr66n like_p p_<?php echo $dataPostID;?>" id="p_<?php echo $dataPostID;?>" data-pt="<?php echo $dataPostType;?>" data-post="<?php echo $dataPostID;?>" data-liked="<?php echo $likeType;?>" data-type="likePost">
           <div class="coreSpriteHeartOpen iconColor dCJp8  p_a<?php echo $dataPostID;?>" id="p_a<?php echo $dataPostID;?>">
              <!--<span class="Szr5J icons_two l_<?php echo $dataPostID;?> " id="l_<?php echo $dataPostID;?>"></span>-->
              <?php echo $LikeButtonClass;?>
           </div>
      </span>
      <span class="_15y0l_com eo2As">
      <div class="dCJp8 iconColor" id="<?php echo $dataPostID;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M96,16c-39.7645,0 -72,32.2355 -72,72c0,39.7645 32.2355,72 72,72v20c0,3.048 3.2975,4.99675 5.9375,3.46875c15.51489,-8.98193 56.53504,-38.6099 64.57812,-80.98438c0.04288,-0.23937 0.08455,-0.47896 0.125,-0.71875c0.34903,-1.93515 0.68558,-3.87212 0.89062,-5.85938c0.30119,-2.62482 0.45768,-5.26423 0.46875,-7.90625c0,-39.7645 -32.2355,-72 -72,-72z"></path></g></g></svg></div>
      <?php if($unlikeFeature != 1){?>
      <div class="dCJp8sh iconColor unli_<?php echo $dataPostID;?>" id="<?php echo $dataPostID;?>" data-pot="<?php echo $dataPostType;?>" data-type="Unlike_Post" data-unliked="<?php echo $unlikeType;?>">
        <?php echo $UnlikeButtonClass;?>
      </div>
      <?php } ?>
      <div class="_15y0l_com eo2Ash">
          <div class="dCJpS iconColor" data-id="<?php echo $bSharedPost;?>" data-type="re_share">
               <!---->
               <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M64.514,35.83333c-6.01283,0 -9.35429,6.95167 -5.59896,11.64583c1.36167,1.6985 3.42029,2.6875 5.59896,2.6875h64.486c3.956,0 7.16667,3.21067 7.16667,7.16667v43h-11.22591c-4.14233,0 -6.43645,4.78834 -3.84929,8.02051l17.2308,21.55599c2.56567,3.21067 7.45647,3.21067 10.02214,0l17.2308,-21.55599c2.58717,-3.23217 0.29305,-8.02051 -3.84929,-8.02051h-11.22591v-43c0,-11.87517 -9.62483,-21.5 -21.5,-21.5zM28.66667,39.68262c-1.86333,0 -3.72823,0.80222 -5.01107,2.40755l-17.23079,21.55599c-2.58717,3.23217 -0.29305,8.02051 3.84928,8.02051h11.22591v43c0,11.87517 9.62483,21.5 21.5,21.5h64.486c6.01283,0 9.35429,-6.95167 5.59896,-11.64583c-1.36167,-1.6985 -3.42029,-2.6875 -5.59896,-2.6875h-64.486c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667v-43h11.22591c4.14233,0 6.43645,-4.78834 3.84928,-8.02051l-17.23079,-21.55599c-1.28283,-1.60533 -3.14773,-2.40755 -5.01107,-2.40755z"></path></g></g></svg>
               <!---->
          </div>
      </div>
      <?php  $os = array("p_which", "p_event"); if(!in_array($dataPostType, $os)){?>
      <div class="_15y0l_com eo2As"><div class="dCJp9 iconColor" id="<?php echo $dataPostID;?>" data-type="socialshare"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M112,64c-80,0 -88,96 -88,96c0,0 16,-40 88,-40v32l64,-61.536l-64,-58.464z"></path></g></g></svg></div></div>
      <?php } echo $postDonateButtonFooter;?>
    </span>
    <span class="wmtNn fav_p f_<?php echo $dataPostID;?>" id="f_<?php echo $dataPostID;?>" data-post="<?php echo $dataPostID;?>" data-fav="<?php echo $favType;?>" data-type="favouritePost">
        <div class="dCJp8 f_a<?php echo $dataPostID;?>" id="f_a<?php echo $dataPostID;?>">
            <span class="favw f_i<?php echo $dataPostID;?>" id="f_i<?php echo $dataPostID;?>"><?php echo $FavouriteButtonClass;?></span>
        </div>
    </span>
    <?php if($ownerLanguage != $dataUserPageLanguage && $dataPostTitleText || $dataPostTitleTextDetails && $uid != $dataPostUID){?>
    <!---->
    <span class="wmtNntr" id="tr_<?php echo $dataPostID;?>">
        <div class="dCJp8tr" data-post="<?php echo $dataPostID;?>" data-type="translateme">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M11.42188,0c-6.4388,0 -11.42187,4.98308 -11.42187,11.42188v78.16146c0,5.73893 4.98308,10.75 11.42188,10.75h17.24479l-14.33333,14.33333h7.16667v21.5l21.5,21.5h21.5v7.16667l7.16667,-7.16667v2.23958c0,6.43881 5.65495,12.09375 12.09375,12.09375h76.14583c6.43881,0 12.09375,-5.65494 12.09375,-12.09375v-76.14583c0,-6.4388 -5.65494,-12.09375 -12.09375,-12.09375h-58.90104v-60.24479c-0.72786,-6.4388 -5.65494,-11.42187 -12.09375,-11.42187zM12.98958,12.98958h74.35417v58.67708h-3.58333c-6.4388,0 -12.09375,5.65495 -12.09375,12.09375v4.47917h-58.67708zM43,21.5v7.16667h-21.5v7.16667h44.11979c-4.47917,8.25847 -9.99414,14.92122 -15.67708,20.38021c-2.74349,-2.40755 -5.15104,-4.73112 -6.94271,-6.71875c-4.8151,-5.40299 -6.27083,-8.51042 -6.27083,-8.51042l-8.95833,4.03125c0,0 2.04362,4.95508 7.61458,11.19792c1.84766,2.07162 4.25521,4.33919 6.94271,6.71875c-11.50586,8.84635 -21.72396,12.54167 -21.72396,12.54167l3.35938,9.63021c0,0 12.65365,-4.47917 26.42708,-15.67708c4.00326,2.88347 8.53841,5.76693 13.88542,8.73438l4.70313,-8.73437c-4.22722,-2.32357 -7.75456,-4.67513 -10.97396,-6.94271c6.38281,-6.35482 12.56966,-14.16536 17.46875,-23.73958l-5.82292,-2.91146h9.18229v-7.16667h-21.5v-7.16667zM115.33854,88.23958h15.00521l24.41146,66.51563h-15.67708l-5.15104,-14.33333h-23.51562l-5.15104,14.33333h-15.00521zM35.83333,100.33333h35.83333v35.83333l-7.16667,-7.16667v7.16667h-21.5v-21.5h7.16667zM121.83333,106.82813l-8.51042,23.51563h16.34896z"></path></g></g></g></svg>
        </div>
    </span>
    <!---->
    <?php  }?>
</div>
<!--Like Share Comment Button FINISHED-->
<!--Like Sum STARTED-->
<div class="EDfFK pl_sum<?php echo $dataPostID;?>" id="pl_sum<?php echo $dataPostID;?>" style="<?php echo $LikeCountStyle;?>">
  <div class="HbPOm y9v3U">
  <?php 
      $GetLikedUsers = $Dot->Dot_ShowPostLikedUserAvatar($dataPostID);
      if($GetLikedUsers){
		  echo '<span class="likedUsers" id="likedusers" data-id="'.$dataPostID.'" data-type="likedUsers" style="float:left;">';
	      foreach($GetLikedUsers as $likedU){
		       $likedUid_fk = $likedU['liked_uid_fk'];
			   $likedU_time = $likedU['liked_time'];
			   $likedUser_avatar = $Dot->Dot_UserAvatar($likedUid_fk, $base_url);
			   echo ' <div class="liked_user_avatar"><img src="'.$likedUser_avatar.'" /></div> ';
		  }
		  echo '</span>';
	  }
  ?>   
    <span class="zV_Nj" style="float:left;line-height:35px;padding-left:6px;"> 
       <span class="l_sum<?php echo $dataPostID;?>" id="l_sum<?php echo $dataPostID;?>"><?php echo $UniqPostLikeCount;?></span> 
	   <?php echo $page_Lang['total_like'][$dataUserPageLanguage];?>
    </span> 
    <span class="prearrow dis<?php echo $dataPostID;?>" style="<?php echo $dislikeStyle;?>"> · </span>
    <span class="dislikeCount dis<?php echo $dataPostID;?>" style="<?php echo $dislikeStyle;?>">
       <span class="dis_<?php echo $dataPostID;?>"><?php echo $totalyPostUnLiked;?></span> Unlike
    </span>
  </div>
  <!--Comment Sum STARTED-->
<?php echo $TotallyPostComment;?>
<!--Comment Sum FINISHED-->
</div>
<!--Like Sum FINISHED-->

<!--Comments STARTED-->
<div class="comments all_c_for<?php echo $dataPostID;?>" id="all_c_for<?php echo $dataPostID;?>"> 

    <?php 
	   if($CountUniqPostCommentArray){
		  // Pull the comments
		 foreach($CountUniqPostCommentArray as $UserCommentsData){
				 include('post_comments.php');
		 } 
     }
    ?>
</div>
<!--Comments FINISHED-->
<?php if($dataCommentDisableStatus == '0'){?>
<!--Comment This POST STARTED-->
<div class="sH9wk _JgwE  eo2As tag_<?php echo $dataPostID;?>"> 
<textarea  class="Ypffh addComment vals<?php echo $dataPostID;?> textarea<?php echo $dataPostID;?>" id="<?php echo $dataPostID;?>" data-textarea="textarea<?php echo $dataPostID;?>"  data-id="<?php echo $dataPostID;?>" data-post="<?php echo $dataPostType;?>" data-type="userComment" placeholder="<?php echo $page_Lang['add_comment'][$dataUserPageLanguage];?>" autocomplete="off" autocorrect="off"></textarea></div>
<div class="commentFastButtons h_body<?php echo $dataPostID;?>" style="display:none;">
    <div class="audioWrapper" id="res_<?php echo $dataPostID;?>"> 
       <canvas id="level" style="display:none;" height="200" width="500"></canvas>
       <input type="hidden" class="voice_r voice_r_<?php echo $dataPostID;?>" id="voice_r" />
    </div>  
   <div class="recordVoice recordButton" id="record" data-id="<?php echo $dataPostID;?>">
        <div class="record_btn<?php echo $dataPostID;?>" style="display:block;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#3498db"><path d="M86,14.33333c-11.87517,0 -21.5,9.62483 -21.5,21.5v43c0,11.87517 9.62483,21.5 21.5,21.5c11.87517,0 21.5,-9.62483 21.5,-21.5v-43c0,-11.87517 -9.62483,-21.5 -21.5,-21.5zM43.62988,78.83333c-4.343,0 -7.841,3.85365 -7.13867,8.14649c3.5108,21.49797 20.70692,38.35796 42.34212,41.46028v14.89323c0,3.956 3.21067,7.16667 7.16667,7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-14.89323c21.63521,-3.10233 38.83133,-19.96231 42.34212,-41.46028c0.70233,-4.29283 -2.79567,-8.14649 -7.13867,-8.14649c-3.54033,0 -6.45985,2.60553 -7.05469,6.10286c-2.9025,16.87751 -17.60659,29.73047 -35.31543,29.73047c-17.70883,0 -32.41293,-12.85297 -35.31543,-29.73047c-0.59483,-3.49733 -3.50719,-6.10286 -7.05469,-6.10286z"></path></g></g></svg></div>
        <div class="finish_record_btn<?php echo $dataPostID;?>" id="save" data-vid="<?php echo $dataPostID;?>" style="display:none;">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;" class="pls"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M86,14.33333c-39.5815,0 -71.66667,32.08517 -71.66667,71.66667c0,39.5815 32.08517,71.66667 71.66667,71.66667c39.5815,0 71.66667,-32.08517 71.66667,-71.66667c0,-39.5815 -32.08517,-71.66667 -71.66667,-71.66667zM71.66667,114.66667v0c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667v-43c0,-3.956 3.21067,-7.16667 7.16667,-7.16667v0c3.956,0 7.16667,3.21067 7.16667,7.16667v43c0,3.956 -3.21067,7.16667 -7.16667,7.16667zM100.33333,114.66667v0c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667v-43c0,-3.956 3.21067,-7.16667 7.16667,-7.16667v0c3.956,0 7.16667,3.21067 7.16667,7.16667v43c0,3.956 -3.21067,7.16667 -7.16667,7.16667z"></path></g></g></svg></svg>
        </div>
   </div>
   
   <div class="gifs show_this" data-position="top" data-tooltip="Send Gif"data-type="getGifs" data-id="<?php echo $dataPostID;?>"  data-post="<?php echo $dataPostType;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8e24aa"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg></div>
   
<div class="stickers  show_this" data-position="top" data-tooltip="<?php echo $page_Lang['post_a_sticker'][$dataUserPageLanguage];?>"data-type="getStickers" data-id="<?php echo $dataPostID;?>"  data-post="<?php echo $dataPostType;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#388e3c"><path d="M38.4,19.2c-10.52781,0 -19.2,8.67219 -19.2,19.2v19.2c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-19.2c0,-3.61619 2.78381,-6.4 6.4,-6.4h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359zM134.4,19.2c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c3.61619,0 6.4,2.78381 6.4,6.4v19.2c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-19.2c0,-10.52781 -8.67219,-19.2 -19.2,-19.2zM63.9,70.3125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v12.8c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-12.8c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957zM95.9,70.3125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v25.6c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359c6.9956,0 12.8,-5.8044 12.8,-12.8v-25.6c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957zM127.9,70.3125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v12.8c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-12.8c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957zM115.2,121.5c-1.49995,-0.06012 -2.97331,0.40888 -4.1625,1.325c-3.65884,2.65904 -8.74417,5.175 -15.0375,5.175c-6.29333,0 -11.37866,-2.51596 -15.0375,-5.175c-1.03187,-0.77431 -2.27365,-1.21873 -3.5625,-1.275c-2.83724,-0.12106 -5.41501,1.64181 -6.33122,4.32977c-0.91622,2.68796 0.04821,5.65822 2.36872,7.29523c5.14756,3.74096 12.85583,7.625 22.5625,7.625c9.70667,0 17.41494,-3.88404 22.5625,-7.625c2.27496,-1.55933 3.29522,-4.40059 2.5319,-7.05093c-0.76332,-2.65034 -3.13855,-4.51367 -5.89441,-4.62408zM25.5,127.9125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v19.2c0,10.52781 8.67219,19.2 19.2,19.2h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-19.2c-3.61619,0 -6.4,-2.78381 -6.4,-6.4v-19.2c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957zM166.3,127.9125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v19.2c0,3.61619 -2.78381,6.4 -6.4,6.4h-19.2c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c10.52781,0 19.2,-8.67219 19.2,-19.2v-19.2c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957z"></path></g></g></svg></div>

<div class="fast_answericons show_this" data-id="<?php echo $dataPostID;?>" data-position="top" data-tooltip="<?php echo $page_Lang['fast_emoji_answer'][$dataUserPageLanguage];?>" data-type="fastEmoji"  data-post="<?php echo $dataPostType;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f9a825"><g id="surface1"><path d="M72.96,184.32c-0.48,0 -0.975,-0.09 -1.455,-0.285c-1.71,-0.705 -2.685,-2.535 -2.295,-4.35l14.385,-68.325h-33.675c-1.425,0 -2.73,-0.78 -3.39,-2.04c-0.675,-1.26 -0.585,-2.79 0.21,-3.96l65.28,-96c1.05,-1.515 3,-2.085 4.68,-1.365c1.695,0.72 2.64,2.52 2.265,4.32l-14.4,68.325h29.835c1.395,0 2.7,0.765 3.375,1.995c0.675,1.23 0.615,2.73 -0.135,3.915l-61.44,96c-0.735,1.14 -1.965,1.77 -3.24,1.77z"></path></g></g></g></svg></div>
</div>
<div class="mentionUserList menlist<?php echo $dataPostID;?>"  data-textarea="textarea<?php echo $dataPostID;?>"></div>
<!--Comment This Post FINISHED-->
<?php }else{?>
<div class="commentcurrentlyDisabled comi_<?php echo $dataPostID;?>"><?php echo $page_Lang['commenting_disab'][$dataUserPageLanguage];?></div>
<?php } ?>
</div>
<!--Comments FINISHED-->
<?php }?>  
</div>
<!--Like Comment Share and Some Other box FINISHED-->
<?php if($postPageType != 'market'){ ?>
<a class="post_permalink showThisPost_" id="permalink_<?php echo $dataPostID;?>" target="_blank" title="<?php echo $page_Lang['view_post'][$dataUserPageLanguage];?>" rel="noopener" data-type="showPostSingle" data-id="<?php echo $dataPostID;?>" data-ui="<?php echo $dataPostUID;?>"></a>
<?php } ?>
</div>
<!--Post FINISHED--> 
