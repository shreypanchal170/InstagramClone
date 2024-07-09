<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$message_time=date("c", $time);
$postPageType = isset($PostFromData['post_page_type']) ? $PostFromData['post_page_type'] : NULL;
$postPageEventID = isset($PostFromData['post_event_page_id']) ? $PostFromData['post_event_page_id'] : NULL;
$postLatitude =  isset($PostFromData['user_lat']) ? $PostFromData['user_lat'] : NULL;
$postLongitude =  isset($PostFromData['user_lang']) ? $PostFromData['user_lang'] : NULL;
$postLocationPlace =  isset($PostFromData['location_place']) ? $PostFromData['location_place'] : NULL;
$postAboutLocation =  isset($PostFromData['about_location']) ? $PostFromData['about_location'] : NULL;
$dataPostHashTagNormal = isset($PostFromData['hashtag_normal']) ? $PostFromData['hashtag_normal'] : NULL;
$dataPostHashTagDiez = isset($PostFromData['hashtag_diez']) ? $PostFromData['hashtag_diez'] : NULL;
$dataPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL;
$dataPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$dataPostCreatedUserName = $PostFromData['user_name'];
$daUserStyleMode = $PostFromData['style_mode']; 
$dataUserGifPost = isset($PostFromData['gif_url']) ? $PostFromData['gif_url'] : NULL;  
$dataCommentDisableStatus = $PostFromData['comment_status'];
$dataPostCreatedUserFullName = $PostFromData['user_fullname'];
$dataPostCreatedLinkUrl =  isset($PostFromData['post_link_url']) ? $PostFromData['post_link_url'] : NULL;
$dataPostCreatedLinkDescription = isset($PostFromData['post_link_description']) ? $PostFromData['post_link_description'] : NULL;
$dataPostCreatedLinkTitle = isset($PostFromData['post_link_title']) ? $PostFromData['post_link_title'] : NULL;
$dataPostCreatedLinkImg = isset($PostFromData['post_link_img']) ? $PostFromData['post_link_img'] : NULL;
$dataPostCreatedLinkMiniUrl = isset($PostFromData['post_link_mini_url']) ? $PostFromData['post_link_mini_url'] : NULL; 
$dataPostCreatedImages = isset($PostFromData['post_image_id']) ? $PostFromData['post_image_id'] : NULL;
$dataPostCreatedVideoID = isset($PostFromData['post_video_id']) ? $PostFromData['post_video_id'] : NULL;
$dataPostCreatedAudioID = isset($PostFromData['post_audio_id']) ? $PostFromData['post_audio_id'] : NULL;
$dataPostCreatedFilterName = isset($PostFromData['filter_name']) ? $PostFromData['filter_name'] : NULL;
$dataPostSlug = isset($PostFromData['slug']) ? $PostFromData['slug'] : NULL;
$dataPostEvent_id = isset($PostFromData['post_event_id']) ? $PostFromData['post_event_id'] : NULL;
$dataPostTotalVoted = $Dot->Dot_CountVoteByallID($dataPostID);
if($dataPostSlug){
   $slugSeo = $base_url.'status/'.$dataPostSlug;
}else{
   $slugSeo = $base_url.'status/'.$dataPostID;
}
$dataPostedUserAvatar = $Dot->Dot_UserAvatar($dataPostUID, $base_url);
/*Post Like Section is STARTED HERE*/
$CheckOnlineUserLikedThisPostBefore = $Dot->Dot_CheckPostLiked($uid, $dataPostID); 
 
if($CheckOnlineUserAddedThisPostFromFavouriteList) {
   $FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_y_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3e99ed"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>'; 
   $favType = 'rem_fav';
}
/*Post Comments Section is STARTED HERE*/
$x=1;
$CountUniqPostCommentArray = $Dot->Comments($dataPostID, 0);
$TotallyPostComment='';
if($x){
   if($CountUniqPostCommentArray > 0){
   $CountTheUniqComment = count($CountUniqPostCommentArray);
    $SecondUniqComment = $CountTheUniqComment-3; 
     if($CountTheUniqComment>3){
	   $TotallyPostComment ='<div class="EDfFK eo2As" id="hd'.$dataPostID.'" style="float: right; line-height: 35px; padding-left: 6px;"><div class="HbPOm y9v3U moreComment" id="commentCount'.$dataPostID.'" data-com="'.$dataPostID.'" data-type="moreComment"><span class="vTJ4h"><span>'.$SecondUniqComment.'</span> '.$page_Lang['see_all_comments'][$dataUserPageLanguage].'</span></div></div>'; 
	  $CountUniqPostCommentArray = $Dot->Comments($dataPostID, $SecondUniqComment);  
   }
   }
   
}
//Check loged in USER ID for buttons
$postDeleteButton = '';
$disableCommentbutton = '';
$editPostbutton =''; 
$postTextDetails = $Dot->GetTheMentions($dataPostTitleTextDetails,$base_url);
if($dataCommentDisableStatus == '0'){
     $commentDisabledEnabled = 'disable';
	 $commentDisableTextStatus =  $page_Lang['disable_comment_feature'][$dataUserPageLanguage];
}else if($dataCommentDisableStatus == '1'){
     $commentDisabledEnabled = 'enable';
	 $commentDisableTextStatus =  $page_Lang['enable_comment_feature'][$dataUserPageLanguage];
}
if($dataPostUID == $uid){   $postDeleteButton = '<div class="post_menu_item hvr-underline-from-center del_post" data-post="'.$dataPostID.'" data-u="'.$dataPostCreatedUserName.'" data-type="deletePost"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M90,-0.23077c-12.66346,0 -22.81731,9.92308 -23.53846,22.38462h-29.53846c-4.4423,0 -7.38462,2.94231 -7.38462,7.38462h-3c-6.63461,0 -11.76923,5.13462 -11.76923,11.76923v3h162.46154v-3c0,-6.63461 -5.13461,-11.76923 -11.76923,-11.76923h-3c0,-4.4423 -2.9423,-7.38462 -7.38462,-7.38462h-29.53846c-0.72115,-12.46154 -10.875,-22.38462 -23.53846,-22.38462zM90,15h12c4.09616,0 7.58654,3.20192 8.30769,7.15385h-28.61538c0.72115,-3.95192 4.21154,-7.15385 8.30769,-7.15385zM22.84615,51.69231l21.46154,140.30769h103.38462l21.46154,-140.30769zM43.61538,73.84615h8.07692l12.46154,96h-7.38462zM75.23077,73.84615h8.30769l5.07692,96h-8.76923zM108.46154,73.84615h8.30769l-4.61538,96h-8.07692zM140.30769,73.84615h7.38462l-12.46154,96h-7.38462z"></path></g></g></g></svg></span> '.$page_Lang['delete_post'][$dataUserPageLanguage].'</div>';
  $disableCommentbutton = '<div class="post_menu_item disable_comment  hvr-underline-from-center"  id="cm-ed'.$dataPostID.'" data-cmid="'.$dataPostID.'" data-type="'.$commentDisabledEnabled.'" data-uid="'.$dataPostUID.'"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M32,24c-8.8,0 -15.92188,7.2 -15.92188,16l-0.0625,95.98438c0,8.84 7.16,16.01562 16,16.01562h15.98438v32l32,-32h80c8.8,0 16,-7.2 16,-16v-96c0,-8.8 -7.2,-16 -16,-16zM75.3125,56l20.6875,20.6875l20.6875,-20.6875l11.3125,11.3125l-20.6875,20.6875l20.6875,20.6875l-11.3125,11.3125l-20.6875,-20.6875l-20.6875,20.6875l-11.3125,-11.3125l20.6875,-20.6875l-20.6875,-20.6875z"></path></g></g></svg></span> <span class="cmc'.$dataPostID.'"> '.$commentDisableTextStatus.'</span></div> ';
  $editPostbutton = '<div class="post_menu_item hvr-underline-from-center edit_post" data-post="'.$dataPostID.'"  data-type="editPost"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M153.375,16c-5.79,0 -11.58,2.205 -16,6.625l-9.375,9.375l32,32l9.375,-9.375c8.832,-8.832 8.832,-23.16 0,-32c-4.42,-4.42 -10.21,-6.625 -16,-6.625zM116,44l-92,92v32h32l92,-92z"></path></g></g></svg></span> '.$page_Lang['edit_post_'][$dataUserPageLanguage].'</div>';
}  
$copyUrl = '<div class="post_menu_item copyUrl" data-clipboard-text="'.$slugSeo.'"  onclick="M.toast({html: \''.$page_Lang['link_copied'][$dataUserPageLanguage].'\'})"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M130.5,24c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,4.75781 0.91406,9.39844 2.625,13.6875l9.75,-9.75c-1.21875,-7.78125 1.14844,-16.14844 7.125,-22.125l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c6.82031,0 13.17188,2.67188 18,7.5c9.96094,9.96094 9.96094,26.22656 0,36.1875l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-1.33594,0 -2.64844,-0.14062 -3.9375,-0.375l-9.75,9.75c4.28906,1.71094 8.92969,2.625 13.6875,2.625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-10.03125 -3.96094,-19.33594 -11.0625,-26.4375c-7.07812,-7.10156 -16.40625,-11.0625 -26.4375,-11.0625zM115.6875,67.6875l-48,48l8.625,8.625l48,-48zM70.5,84c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,10.03125 3.96094,19.33594 11.0625,26.4375c7.07813,7.10156 16.40625,11.0625 26.4375,11.0625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-4.75781 -0.91406,-9.39844 -2.625,-13.6875l-9.75,9.75c1.21875,7.78125 -1.14844,16.14844 -7.125,22.125l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-6.82031,0 -13.17187,-2.67187 -18,-7.5c-9.96094,-9.96094 -9.96094,-26.22656 0,-36.1875l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c1.33594,0 2.64844,0.14063 3.9375,0.375l9.75,-9.75c-4.28906,-1.71094 -8.92969,-2.625 -13.6875,-2.625z"></path></g></g></g></svg></span> Copy Url</div>';
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
$showMoreBtn = '';
$str_length = strlen($postTextDetails);
if($str_length > 500) {
   $longText= 'readmore';
   $showMoreBtn = '<div class="showMoreText" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
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
      $sharedEvent = '<div class="event_s_b">'.$dataPostCreatedUserFullName.' '.$page_Lang['created_an_event'][$dataUserPageLanguage].'. <span class="baseline event_s_b_i" style="margin-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M20.07692,81.40385l98.07692,-7.38462v-23.25c0,-2.42308 1.18269,-4.24039 3.54808,-6.05769c2.36538,-0.60577 4.73077,-0.60577 6.49038,0.60577c24.23077,16.96154 47.27885,45.375 47.85577,46.58654c0.57692,1.15385 1.125,2.88462 1.15385,4.09615c0,0.02884 0.02884,0.08654 0.02884,0.11538c0,1.21154 -0.57692,3.02884 -1.18269,3.63462c-0.57692,1.21153 -23.04808,29.71153 -47.85577,46.67307c-2.36538,1.21154 -4.73077,1.81731 -6.49038,0.60577c-2.36539,-1.21153 -3.54808,-3.02884 -3.54808,-5.45192v-23.25l-98.07692,-7.38462c-2.9423,-2.36539 -5.30769,-8.30769 -5.30769,-14.82693c0,-5.88462 1.75961,-12.34615 5.30769,-14.71153z"></path></g></g></g></svg></span><a href="'.$base_url.'event/'.$post_event_id.'">'.stripslashes($post_event_title).'</a></div>';
  }
}
?>  
  <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container" id="resharep" data-id="<?php echo $dataPostID;?>">
    <div class="fast_icon_answer ic<?php echo $dataPostID;?>" id="ic<?php echo $dataPostID;?>"></div>
     <?php  
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
			if($dataPostCreatedLinkImg){ 
			$em = new Mat_Expand($dataPostCreatedLinkUrl);
	        // Get the link size
            $site = $em->get_site();
				if($site){
				  echo '<div class="url_link_img emyt" data-ytkey="'.$dataPostID.'">
				    <div class="url_link_mini_link">'.$dataPostCreatedLinkMiniUrl.'</div>
					     <img src="'.$dataPostCreatedLinkImg.'" class="a0uk">
						 <div class="rightUpIcon emyt" data-ytkey="'.$dataPostID.'">
					    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ecf0f1"><g id="surface1"><path d="M145.92,23.04h-99.84c-6.525,0 -11.52,4.995 -11.52,11.52v128.97l59.85,-59.85h-32.97v-7.68h46.08v46.08h-7.68v-32.97l-59.85,59.85h105.93c6.525,0 11.52,-4.995 11.52,-11.52v-122.88c0,-6.525 -4.995,-11.52 -11.52,-11.52z"></path></g></g></g></svg>
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
				$tumbImage = $base_url.'uploads/video/'.$getVideoImage.'.png'; 
				if(@getimagesize($tumbImage) !== false) {  
				   $videoTumbnail = $base_url.'uploads/video/'.$getVideoImage.'.png';  
                }
				if(@getimagesize($tumbImage) == false){
				   $videoTumbnail = $base_url.'uploads/video/safe_video.png'; 
			    }  
			   echo '
			   <div class="item column-video" id="videobox'.$dataPostID.'" data-id="'.$dataPostID.'">
			   <div class="float_video_c icon_utuNew" data-id="'.$dataPostID.'" data-type="floatVideo" data-user="'.$dataPostUID.'"></div>
			   <!--Media Player STARTED-->
					<div class="media-wrapper videoPlayr" id="videoPlayer'.$dataPostID.'"> 
						<video class="vidchaVideo mejs__player" id="player'.$dataPostID.'" width="100%" height="360"style="max-width:100%;" src="'.$base_url.'uploads/video/'.$VideoData['video_path'].'.'.$getVideoExtension.'" type="video/mp4"  poster="'.$videoTumbnail.'" controls="controls" preload="none"></video>
					</div>
			   <!--Media Player FINISHED-->
			</div> 
			   ';
			} 
			if($dataPostCreatedAudioID){
				$getAudio = $Dot->Dot_GetUploadedAudioID($dataPostCreatedAudioID);
				$audioPath = $getAudio['audio_path']; 
			    echo '
				<!--Media Player STARTED-->
			   <div class="media-wrapper">
				   <audio id="player2" preload="none" controls style="max-width:100%;">
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
					  <img src="'.$dataUserGifPost.'">
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
			if($dataPostType == 'p_event'){ 
				  echo $EventPostDetailsHere;
			}
			if($dataPostTitleText || $dataPostTitleTextDetails){
			  echo '<div class="post_text_container">';
			  if($dataPostTitleText){
				  echo '<div class="post_title" id="post_title'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.$dataPostTitleText.'</div>';
			  }
			  if($dataPostWaterMarkID){
				  echo '<div class="post_text_info_watermark post_info'.$dataPostID.'" style="background-image:url('.$base_url.'uploads/watermarkbg/'.$waterMarkImage.'); color:#'.$colorWaterMark.';" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.strip_unsafe(styletext($postTextDetails)).'</div>';
			  }else{
			       echo '<div class="post_text_info post_info'.$dataPostID.' '.$longText.'" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.strip_unsafe(styletext($postTextDetails)).' '.$showMoreBtn.'</div>';
			  }
			 /* if($dataPostTitleTextDetails){
				  echo '<div class="post_text_info" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.strip_unsafe(styletext($postTextDetails)).'</div>';
			  }*/
			  if($postLatitude && $postLongitude){
				    echo '<div class="placeLocationFrame"><iframe src="https://maps.google.com/maps?q='.$postLatitude.','.$postLongitude.'&z=12&output=embed" width="100%" height="270" frameborder="0" style="border:0"></iframe></div>';
	          }
			  echo '</div>';
		 }
	 ?>    
<!--Post FINISHED--> 
