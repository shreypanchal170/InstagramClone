<?php 
$mostPopularPostID = $mp['user_post_id'];
$mostPopularPostImages = isset($mp['post_image_id']) ? $mp['post_image_id'] : NULL;
$mostPopulrPostType = $mp['post_type'];
$mostPopularPostUID = $mp['user_id_fk'];
$mostPopularPostUserName = $mp['user_name'];
$mostPopularPostFullName = $mp['user_fullname']; 
$mostPopularPostVerified = $mp['verified_user'];
$mostPopularPostUserAvatar = $Dot->Dot_UserAvatar($mostPopularPostUID, $base_url);
$CheckOnlineUserLikedThisPopularPostBefore = $Dot->Dot_CheckPostLiked($uid, $mostPopularPostID); 
$mostPopularPostLikedClass = 'glyphsSpriteHeart__outline_ok__24__grey_9';
$mostPopularlikeType = 'p_like';
if($CheckOnlineUserLikedThisPopularPostBefore) {
   $mostPopularPostLikedClass = 'glyphsSpriteHeart__outline__24__grey_9';
   $mostPopularlikeType = 'p_unlike';
} 
/*Post Comments Section is STARTED HERE*/
$x=1;
$mostPopularPostCommentArray = $Dot->Comments($mostPopularPostID, 0);
$mostPopularTotallyPostComment='';
if($x){
	if($mostPopularPostCommentArray>0){
   $CountThemostPopularUniqComment = count($mostPopularPostCommentArray);
   $SecondmostPopularUniqComment = $CountThemostPopularUniqComment-3; 
   if($CountThemostPopularUniqComment>3){
	   $mostPopularTotallyPostComment ='<span class="vTJ4h"><span>'.$SecondmostPopularUniqComment.'</span> '.$page_Lang['most_popular_post_notes'][$dataUserPageLanguage].'</span>'; 
	  $CountUniqPostCommentArray = $Dot->Comments($mostPopularPostID, $SecondmostPopularUniqComment);  
   }
   }
}
$mostPopularPostProTypeinPost = $mp['pro_user_type'];
$propularverifiedBadge = '';
if($mostPopularPostVerified == '1'){
   $propularverifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
}
$userisPro = '';
if($mostPopularPostProTypeinPost == 1){
    $userisPro = '<span class="p_prst">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
}
?>
<div class="mostPopularPostContainer">
    <div class="mostPopularPostHeader">
        <!--User Avatar STARTED-->
        <div class="user_avatar show_card" id="<?php echo $mostPopularPostUID;?>" data-user="<?php echo $mostPopularPostUserName;?>" data-type="userCard">
          <a href="<?php echo $base_url.'profile/'.$mostPopularPostUserName;?>" title="<?php echo $mostPopularPostFullName;?>"><img class="_6q-tv" src="<?php echo $mostPopularPostUserAvatar;?>" alt="<?php echo $mostPopularPostFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a> 
        </div>
        <?php echo $userisPro;?>
        <!--User Avatar FINISHED-->
        <!--User Name Started-->
        <div class="o-UQd"><a class="nJAzx" title="<?php echo $mostPopularPostFullName;?>" href="<?php echo $base_url.'profile/'.$mostPopularPostUserName;?>"><?php echo $mostPopularPostFullName;?></a><?php echo $propularverifiedBadge;?></div>
        <!--User Name FINISHED-->
    </div>
    <div class="mostPopularPost">
       <?php 
	   if($mostPopularPostImages) {
			$ms = explode(",", $mostPopularPostImages); // Explode the images string value
			$mr=1;
			$mf=count($ms);
			$mTotalImage = $mf-1;
			$PopUpStart ='';
			if($mTotalImage > 1){
				 $mPopUpStart ='openPopUp';
			}
			// Add to array the available images
			echo '<div class="mostPopularImageContainer showThisPost_" data-type="showPostSingle" data-u="'.$mostPopularPostUserName.'" data-ui="'.$mostPopularPostUID.'" data-id="'.$mostPopularPostID.'">';
			 
				// Get the uploaded image ids
			   $mnewdata=$Dot->Dot_GetUploadImageID($mostPopularPostImages);
			   if($mnewdata) {
				  // The path to be parsed
				  $mfinal_image=$base_url."uploads/images/".$mnewdata['uploaded_image']; 
				  echo '
				  <div class="sldimg">
					<div class="sld_jjzlbU_mostPopular">
					  <img src="'.$mfinal_image.'">
					</div>
				  </div>
				  ';
				} 
			 echo '</div>';
			}   
	   ?>
    </div>
    <div class="mostPopularPostFooter">
       <span class="wmtNn fav_p f_147"><?php echo $mostPopularTotallyPostComment;?> </span>
        <span class="fr66n mpRight like_p p_<?php echo $mostPopularPostID;?>" id="p_<?php echo $mostPopularPostID;?>" data-pt="<?php echo $mostPopulrPostType;?>" data-post="<?php echo $mostPopularPostID;?>" data-liked="<?php echo $mostPopularlikeType;?>" data-type="likePost"><div class="coreSpriteHeartOpen dCJp8  p_a<?php echo $mostPopularPostID;?>" id="p_a<?php echo $mostPopularPostID;?>"><span class="Szr5J icons_two l_<?php echo $mostPopularPostID;?> <?php echo $mostPopularPostLikedClass;?>" id="l_<?php echo $mostPopularPostID;?>"></span></div>
        </span>
        <span class="_15y0l mpRight eo2As"><div class="dCJp8"><span class="glyphsSpriteComment__outline__24__grey_9 Szr5J icons_two"></span></div></span>
    </div>
</div>