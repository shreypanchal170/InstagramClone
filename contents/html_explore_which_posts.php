<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$ownerLanguage = $PostFromData['user_page_lang'];
$message_time=date("c", $time); 
$dataPostHashTagNormal = isset($PostFromData['hashtag_normal']) ? $PostFromData['hashtag_normal'] : NULL;
$dataPostHashTagDiez = isset($PostFromData['hashtag_diez']) ? $PostFromData['hashtag_diez'] : NULL;
$dataPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL; 
$dataPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$dataPostCreatedUserName = $PostFromData['user_name'];
$daUserStyleMode = $PostFromData['style_mode'];   
$dataCommentDisableStatus = $PostFromData['comment_status'];
$dataPostCreatedUserFullName = $PostFromData['user_fullname'];
$dataPostCreatedLinkUrl =  isset($PostFromData['post_link_url']) ? $PostFromData['post_link_url'] : NULL;
$dataPostUserFeeling =  isset($PostFromData['user_feeling']) ? $PostFromData['user_feeling'] : NULL;  
$dataPostSlug = isset($PostFromData['slug']) ? $PostFromData['slug'] : NULL;
$dataSharedPost = isset($PostFromData['shared_post']) ? $PostFromData['shared_post'] : NULL;  
$totalyPostUnLiked = $Dot->Dot_TotalPostUnliked($dataPostID);
$dislikeStyle ="";
if($totalyPostUnLiked == 0){
   $dislikeStyle = 'display:none;';
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
$UniqPostLikeCount = $Dot->Dot_UniqPostLikeCount($dataPostID);
$LikeCountStyle ='display:none;';
if($UniqPostLikeCount || $totalyPostUnLiked != 0){
  $LikeCountStyle ='display:block;';
}
/*Post Favourite Section is STARTED HERE*/
$CheckOnlineUserAddedThisPostFromFavouriteList = $Dot->Dot_PostAddedFavouriteListBefore($uid, $dataPostID);
$FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_n_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48.07812,16c-8.76364,0 -16,7.22079 -16,15.98438l-0.07812,144.01562l64,-24l64,24v-11.54687v-132.45313c0,-8.7445 -7.2555,-16 -16,-16zM48.07812,32h95.92188v120.90625l-48,-18l-47.98438,18z"></path></g></g></svg>';
$favType = 'ad_fav';
if($CheckOnlineUserAddedThisPostFromFavouriteList) {
   $FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_y_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3e99ed"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>'; 
   $favType = 'rem_fav';
}
$postTextDetails = $Dot->GetTheMentions($dataPostTitleTextDetails,$base_url);
if($dataCommentDisableStatus == '0'){
     $commentDisabledEnabled = 'disable';
	 $commentDisableTextStatus =  $page_Lang['disable_comment_feature'][$dataUserPageLanguage];
}else if($dataCommentDisableStatus == '1'){
     $commentDisabledEnabled = 'enable';
	 $commentDisableTextStatus =  $page_Lang['enable_comment_feature'][$dataUserPageLanguage];
}
$longText = '';
$showMoreBtn = '';
$str_length = strlen($postTextDetails);
if($str_length > 500) {
   $longText= 'ex_readmore'; 
   $showMoreBtn = '<div class="showMoreText_ex showThisPost_" data-id="'.$dataPostID.'" data-ui="'.$dataPostUID.'" data-type="showPostSingle" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
}

if($dataSharedPost){ 
   $bSharedPost = $dataSharedPost; 
}else{
  $bSharedPost = $dataPostID;
} 
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
$dataPostWhichImage = isset($PostFromData['which_image']) ? $PostFromData['which_image'] : NULL; 
$dataPostTotalVoted = $Dot->Dot_CountVoteByallID($dataPostID);
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
	   $TotallyPostComment ='<div class="EDfFK eo2As EDfFK_bif" id="hd'.$dataPostID.'" style="float: right; line-height: 35px; padding-left: 6px;"><div class="HbPOm y9v3U moreComment" id="commentCount'.$dataPostID.'" data-com="'.$dataPostID.'" data-type="moreComment"><span class="vTJ4h"><span>'.$SecondUniqComment.'</span> '.$page_Lang['see_all_comments'][$dataUserPageLanguage].'</span></div></div>'; 
	  $CountUniqPostCommentArray = $Dot->Comments($dataPostID, $SecondUniqComment);  
   }
   } 
}
?> 
<!--Post STARTED-->
<div class="zMhqu white_bg u_p<?php echo $dataPostID;?> body<?php echo $dataPostID;?>" id="u_p<?php echo $dataPostID;?>"  data-last="<?php echo $dataPostID;?>"> 
 <!--Post Menu STARTED-->
 <div class="post_menu_container post_menu_<?php echo $dataPostID;?>" id="post_menu_<?php echo $dataPostID;?>">
      <?php 
	  echo $editPostbutton;
	  echo $disableCommentbutton;
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
  <div class="global_post_info_container">
    <div class="fast_icon_answer ic<?php echo $dataPostID;?>" id="ic<?php echo $dataPostID;?>"></div>
     <?php 
	     echo $feelingStatus;
	     if($dataPostTitleText || $dataPostTitleTextDetails){
			  echo '<div class="post_text_container">';
			  if($dataPostTitleText){
				  echo '<div class="post_title theTit_'.$dataPostID.'" id="post_title'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$dataPostTitleText.'">'.$dataPostTitleText.'</div>';
			  }
			  if($postTextDetails){
			       echo '<div class="post_text_info post_info'.$dataPostID.' '.$longText.'" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$postTextDetails.'">'.strip_unsafe(styletext($postTextDetails)).' '.$showMoreBtn.'</div>';
			  }
		     echo '</div>';
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
		  
		 if($dataPostHashTagDiez){echo '<span class="hashtags" id="ht-i'.$dataPostID.'">'.makeHashLink($dataPostHashTagDiez, $base_url).'</span>';} 
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
      <?php } ?>
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
  </div>
<!--Like Sum FINISHED-->

<!--Comments STARTED-->
<div class="comments all_c_for<?php echo $dataPostID;?>" id="all_c_for<?php echo $dataPostID;?>"> 

    <?php 
	  echo $TotallyPostComment; 
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
