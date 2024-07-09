<?php 
$EditPostID = $PostFromData['user_post_id'];
$EditPostUID = $PostFromData['user_id_fk'];
$EditPostType = $PostFromData['post_type']; 
$EditdataUserVerified = $PostFromData['verified_user'];
$EditPostHashTagNormal = isset($PostFromData['hashtag_normal']) ? $PostFromData['hashtag_normal'] : NULL;
$EditPostHashTagDiez = isset($PostFromData['hashtag_diez']) ? $PostFromData['hashtag_diez'] : NULL;
$EditPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL;
$EditPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$EditPostCreatedUserName = $PostFromData['user_name']; 
$EditPostCreatedUserFullName = $PostFromData['user_fullname'];
$EditPostCreatedLinkUrl =  isset($PostFromData['post_link_url']) ? $PostFromData['post_link_url'] : NULL;
$EditPostCreatedLinkDescription = isset($PostFromData['post_link_description']) ? $PostFromData['post_link_description'] : NULL;
$EditPostCreatedLinkTitle = isset($PostFromData['post_link_title']) ? $PostFromData['post_link_title'] : NULL;
$EditPostCreatedLinkImg = isset($PostFromData['post_link_img']) ? $PostFromData['post_link_img'] : NULL;
$EditPostCreatedLinkMiniUrl = isset($PostFromData['post_link_mini_url']) ? $PostFromData['post_link_mini_url'] : NULL; 
$EditPostCreatedImages = isset($PostFromData['post_image_id']) ? $PostFromData['post_image_id'] : NULL;
$EditPostCreatedVideoID = isset($PostFromData['post_video_id']) ? $PostFromData['post_video_id'] : NULL;
$EditPostCreatedAudioID = isset($PostFromData['post_audio_id']) ? $PostFromData['post_audio_id'] : NULL;
$EditPostCreatedFilterName = isset($PostFromData['filter_name']) ? $PostFromData['filter_name'] : NULL;
$EditPostedUserAvatar = $Dot->Dot_UserAvatar($EditPostUID, $base_url);
$EditverifiedBadge = '';
if($EditdataUserVerified == '1'){
   $EditverifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
} 
?>
<div class="zMhqu white_bg"> 
  <!--Header STARTED-->
  <div class="Ppjfr">
    <!--User Avatar STARTED-->
    <div class="user_avatar">
      <a href="<?php echo $base_url.'profile/'.$EditPostCreatedUserName;?>" title="<?php echo $EditPostCreatedUserFullName;?>"><img class="_6q-tv" src="<?php echo $EditPostedUserAvatar;?>" alt="<?php echo $EditPostCreatedUserFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a> 
    </div>
    <!--User Avatar FINISHED-->
    <!--User Name Started-->
    <div class="o-UQd"><a class="nJAzx" title="<?php echo $EditPostCreatedUserName;?>" href="<?php echo $base_url.'profile/'.$EditPostCreatedUserName;?>"><?php echo $EditPostCreatedUserFullName;?></a><?php echo $EditverifiedBadge;?></div> 
    <!--User Name FINISHED--> 
  </div>
  <!--Header FINISHED-->
  <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container">
           <div class="write_post_information">
               <!--Input STARTED-->
               <div class="global_post_box">
                   <input type="text" class="edit_title" id="title<?php echo $EditPostID;?>" placeholder="Title" value="<?php echo $EditPostTitleText;?>">
               </div>
               <!--Input FINISHED-->
               <!--Textarea STARTED-->
               <div class="global_post_box">
                  <textarea class="edit_description" id="details<?php echo $EditPostID;?>" placeholder="Your text here"><?php echo $EditPostTitleTextDetails;?></textarea>
               </div>
               <!--Textarea FINISHED-->
               <!--Hashtag STARTED-->
               <div class="global_post_box">
                  <input class="edit_hashtag_ hashTag<?php echo $EditPostID;?>" id="hashTag" placeholder="#tags" value="<?php echo $EditPostHashTagDiez;?>">
               </div>
               <!--Hashtag FINISHED-->  
           </div>
           <div class="post_box_footer"> 
                  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue updatethispost" id="<?php echo $EditPostID;?>" data-type="editthispost"><?php echo $page_Lang['post_share'][$dataUserPageLanguage];?></div></div>
             </div>
  </div>
</div> 