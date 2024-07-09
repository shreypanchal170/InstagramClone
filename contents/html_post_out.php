<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$message_time=date("c", $time);
$postLatitude =  isset($PostFromData['user_lat']) ? $PostFromData['user_lat'] : NULL;
$postLongitude =  isset($PostFromData['user_lang']) ? $PostFromData['user_lang'] : NULL;
$dataPostHashTagNormal = isset($PostFromData['hashtag_normal']) ? $PostFromData['hashtag_normal'] : NULL;
$dataPostHashTagDiez = isset($PostFromData['hashtag_diez']) ? $PostFromData['hashtag_diez'] : NULL;
$dataPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL;
$dataPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$dataPostCreatedUserName = $PostFromData['user_name'];
$daUserStyleMode = $PostFromData['style_mode']; 
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
$dataPostedUserAvatar = $Dot->Dot_UserAvatar($dataPostUID, $base_url);
if($dataPostSlug){
   $slugSeo = $base_url.'status/'.$dataPostSlug;
}else{
   $slugSeo = $base_url.'status/'.$dataPostID;
}
/*Post Like Section is STARTED HERE*/ 
$LikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ln_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>';
$likeType = 'p_like';
if($CheckOnlineUserLikedThisPostBefore) {
   $LikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ly_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>';
   $likeType = 'p_unlike';
}
$UniqPostLikeCount = $Dot->Dot_UniqPostLikeCount($dataPostID);
$LikeCountStyle ='display:none;';
if($UniqPostLikeCount){
  $LikeCountStyle ='display:block;';
}
/*Post Favourite Section is STARTED HERE*/ 
$FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_n_'.$dataPostID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48.07812,16c-8.76364,0 -16,7.22079 -16,15.98438l-0.07812,144.01562l64,-24l64,24v-11.54687v-132.45313c0,-8.7445 -7.2555,-16 -16,-16zM48.07812,32h95.92188v120.90625l-48,-18l-47.98438,18z"></path></g></g></svg>';
$favType = 'ad_fav';
 
/*Post Comments Section is STARTED HERE*/
$x=1;
$CountUniqPostCommentArray = $Dot->Comments($dataPostID, 0);
$TotallyPostComment='';
if($x){
   if($CountUniqPostCommentArray > 0){
   $CountTheUniqComment = count($CountUniqPostCommentArray);
    $SecondUniqComment = $CountTheUniqComment-3; 
     if($CountTheUniqComment>3){
	   $TotallyPostComment ='<div class="EDfFK eo2As" id="hd'.$dataPostID.'" style="float: right; line-height: 35px; padding-left: 6px;"><div class="HbPOm y9v3U moreComment" id="commentCount'.$dataPostID.'" data-com="'.$dataPostID.'" data-type="moreComment"><span class="vTJ4h"><span>'.$SecondUniqComment.'</span> '.$page_Lang['see_all_comments'][$pagesDefaultLanguage].'</span></div></div>'; 
	  $CountUniqPostCommentArray = $Dot->Comments($dataPostID, $SecondUniqComment);  
   }
   }
   
}
//Check loged in USER ID for buttons
$postDeleteButton = '';
$disableCommentbutton = '';
$editPostbutton =''; 
$postTextDetails = $Dot->GetTheMentions($dataPostTitleTextDetails,$base_url);
 
$verifiedBadge = '';
if($dataUserVerified == '1'){
   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$pagesDefaultLanguage].'"></span>';
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
?>
<!--Post STARTED-->
<div class="zMhqu white_bg u_p<?php echo $dataPostID;?> body<?php echo $dataPostID;?>" id="u_p<?php echo $dataPostID;?>"  data-last="<?php echo $dataPostID;?>"> 
 
  <!--Header STARTED-->
  <div class="Ppjfr">
    <!--User Avatar STARTED-->
    <div class="user_avatar show_card" id="<?php echo $dataPostUID;?>" data-user="<?php echo $dataPostCreatedUserName;?>" data-type="userCard">
      <a href="<?php echo $base_url.'profile/'.$dataPostCreatedUserName;?>" title="<?php echo $dataPostCreatedUserFullName;?>"><img class="_6q-tv" src="<?php echo $dataPostedUserAvatar;?>" alt="<?php echo $dataPostCreatedUserFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$pagesDefaultLanguage];?>"></a>
    </div>
    <!--User Avatar FINISHED-->
    <!--User Name Started-->
    <div class="o-UQd"><a class="nJAzx" title="<?php echo $dataPostCreatedUserFullName;?>" href="<?php echo $base_url.'profile/'.$dataPostCreatedUserName;?>"><?php echo $dataPostCreatedUserFullName;?></a><?php echo $verifiedBadge;?></div>
    <div class="postCreatedTime" title="<?php echo $message_time;?>"></div>
    <!--User Name FINISHED--> 
  </div>
  <!--Header FINISHED-->
  <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container">
    <div class="fast_icon_answer ic<?php echo $dataPostID;?>" id="ic<?php echo $dataPostID;?>"></div>
     <?php 
	      if($dataPostTitleText || $dataPostTitleTextDetails){
			  echo '<div class="post_text_container">';
			  if($dataPostTitleText){
				  echo '<div class="post_title" id="post_title'.$dataPostID.'" data-linkify="this" data-linkify-target="_target">'.htmlentities($dataPostTitleText).'</div>';
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
		 if($dataPostWhichImage){
		      $w = explode(",", $dataPostWhichImage);  
			  echo '<div class="whichImagesBox gallery" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">';
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
				   }else{ 
				       $votedIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>';  
				   }
				   echo ' <div class="countBox">
								  <div class="whichImageHeart heart_'.$whichImageIDa.'" id="'.$whichImageIDa.'" data-id="'.$dataPostID.'">
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
			   echo '<a href="'.$dataPostCreatedLinkUrl.'" target="_blank"><div class="url_link_img"><div class="url_link_mini_link">'.$dataPostCreatedLinkMiniUrl.'</div><img src="'.$dataPostCreatedLinkImg.'" class="a0uk"></div>';
			}
			if($dataPostCreatedLinkDescription || $dataPostCreatedLinkTitle){
				echo '<div class="link_url_des_title">';
			     if($dataPostCreatedLinkTitle){
				    echo '<div class="link_title_url">'.$dataPostCreatedLinkTitle.'</div>';
				 }
				 if($dataPostCreatedLinkDescription){
				    echo '<div class="link_description_url">'.$dataPostCreatedLinkDescription.'</div>';
				 }
				echo '</div></a>'; 
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
			if($dataPostType == 'p_avatar'){
			    $uploadedAvatar = $Dot->Dot_GetUploadedAvatarID($dataPostCreatedImages);
				$userAvatarPath = $uploadedAvatar['image_path']; 
				echo '
				   <div class="item">
				      <img src="'.$base_url.'uploads/avatar/'.$userAvatarPath.'"  class="a0uk">
					  <div class="u_new_avatar">'.$page_Lang['new_avatar_image_uploaded'][$pagesDefaultLanguage].'</div>
				   </div>
				';
			}
			if($dataPostType == 'p_cover'){
			    $uploadedAvatar = $Dot->Dot_GetUploadedCoverID($dataPostCreatedImages);
				$userAvatarPath = $uploadedAvatar['image_path']; 
				echo '
				   <div class="item">
				      <img src="'.$base_url.'uploads/cover/'.$userAvatarPath.'"  class="a0uk">
					  <div class="u_new_avatar">'.$page_Lang['new_cover_image_uploaded'][$pagesDefaultLanguage].'</div>
				   </div>
				';
			}
			if($dataPostHashTagDiez){echo '<span class="hashtags" id="ht-i'.$dataPostID.'">'.makeHashLink($dataPostHashTagDiez, $base_url).'</span>';}
	 ?>  
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
      <span class="_15y0l_com eo2As"><div class="dCJp8 iconColor" id="<?php echo $dataPostID;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M96,16c-39.7645,0 -72,32.2355 -72,72c0,39.7645 32.2355,72 72,72v20c0,3.048 3.2975,4.99675 5.9375,3.46875c15.51489,-8.98193 56.53504,-38.6099 64.57812,-80.98438c0.04288,-0.23937 0.08455,-0.47896 0.125,-0.71875c0.34903,-1.93515 0.68558,-3.87212 0.89062,-5.85938c0.30119,-2.62482 0.45768,-5.26423 0.46875,-7.90625c0,-39.7645 -32.2355,-72 -72,-72z"></path></g></g></svg></div>
      <div class="_15y0l_com eo2As"><div class="dCJp9 iconColor" id="<?php echo $dataPostID;?>" data-type="socialshare"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M112,64c-80,0 -88,96 -88,96c0,0 16,-40 88,-40v32l64,-61.536l-64,-58.464z"></path></g></g></svg></div></div>
    </span>
    <span class="wmtNn fav_p f_<?php echo $dataPostID;?>" id="f_<?php echo $dataPostID;?>" data-post="<?php echo $dataPostID;?>" data-fav="<?php echo $favType;?>" data-type="favouritePost"><div class="dCJp8 f_a<?php echo $dataPostID;?>" id="f_a<?php echo $dataPostID;?>"><span class="favw f_i<?php echo $dataPostID;?>" id="f_i<?php echo $dataPostID;?>"><?php echo $FavouriteButtonClass;?></span></div>
  </span>
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
	   <?php echo $page_Lang['total_like'][$pagesDefaultLanguage];?>
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
 
<div class="commentcurrentlyDisabled comi_<?php echo $dataPostID;?>"><?php echo $page_Lang['please_login'][$pagesDefaultLanguage];?></div> 
</div>
<!--Comments FINISHED-->

</div>
<!--Like Comment Share and Some Other box FINISHED--> 
</div>
<!--Post FINISHED--> 
