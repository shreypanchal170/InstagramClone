<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$storyID = $storyFromData['s_id'];
$storyOwnder  = $storyFromData['uid_fk']; 
$storyImg =  $storyFromData['stories_img'];
$time = $storyFromData['created']; 
$storyCreated_time=date("c", $time);
$StoryOwnerUserFullName = $Dot->Dot_UserFullName($storyOwnder);
$StoryOwnerUserName = $Dot->Dot_GetUserName($storyOwnder);
$StoryOwnerAvatar = $Dot->Dot_UserAvatar($storyOwnder, $base_url); 
$storyViewCount = $Dot->Dot_StoriesViewCount($storyID);
$postDeleteButton ='';
if($storyOwnder == $uid){ 
  $postDeleteButton = '<div class="post_menu_item hvr-underline-from-center del_post" data-post="'.$storyID.'" data-u="'.$StoryOwnerUserName.'" data-type="deleteStory"><span class="postMenuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M90,-0.23077c-12.66346,0 -22.81731,9.92308 -23.53846,22.38462h-29.53846c-4.4423,0 -7.38462,2.94231 -7.38462,7.38462h-3c-6.63461,0 -11.76923,5.13462 -11.76923,11.76923v3h162.46154v-3c0,-6.63461 -5.13461,-11.76923 -11.76923,-11.76923h-3c0,-4.4423 -2.9423,-7.38462 -7.38462,-7.38462h-29.53846c-0.72115,-12.46154 -10.875,-22.38462 -23.53846,-22.38462zM90,15h12c4.09616,0 7.58654,3.20192 8.30769,7.15385h-28.61538c0.72115,-3.95192 4.21154,-7.15385 8.30769,-7.15385zM22.84615,51.69231l21.46154,140.30769h103.38462l21.46154,-140.30769zM43.61538,73.84615h8.07692l12.46154,96h-7.38462zM75.23077,73.84615h8.30769l5.07692,96h-8.76923zM108.46154,73.84615h8.30769l-4.61538,96h-8.07692zM140.30769,73.84615h7.38462l-12.46154,96h-7.38462z"></path></g></g></g></svg></span> '.$page_Lang['delete_story'][$dataUserPageLanguage].'</div>';
}
$whoPostedStory = $Dot->Dot_FriendStatus($uid,$storyOwnder); 
$showClick = '<div class="totalStoryView"><div class="viewicon icons"></div><div class="sumview">'.$storyViewCount.'</div></div>';
if($whoPostedStory == 'me'){
   $showClick = '<div class="totalStoryView seeViewers" data-id="'.$storyID.'" data-u="'.$storyOwnder.'" data-type="svieWers"><div style="display:block;float:left;padding-top:5px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="26" height="26"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M86,40.72596c-33.20613,0 -64.24158,16.51262 -82.89904,44.03365c-3.48858,5.16827 -2.04147,12.01622 3.10096,15.50481c1.9381,1.31791 4.03125,2.06731 6.20192,2.06731c3.61779,0 7.33894,-1.75721 9.50962,-4.96154c0.69772,-1.03365 1.55048,-1.91226 2.27404,-2.89423c8.86358,25.66046 33.12861,44.03365 61.8125,44.03365c28.6839,0 52.94892,-18.3732 61.8125,-44.03365c0.72356,0.98197 1.57632,1.86058 2.27404,2.89423c3.46274,5.14243 10.54327,6.38281 15.71154,2.89423c5.14243,-3.48858 6.58954,-10.36238 3.10096,-15.50481c-18.63161,-27.54687 -49.69291,-44.03365 -82.89904,-44.03365zM112.25481,67.80769c11.03426,3.95372 20.87981,10.51743 29.14904,19.01923c-6.17608,24.85938 -28.65805,43.41346 -55.40385,43.41346c-26.74579,0 -49.22776,-18.55408 -55.40385,-43.41346c8.21755,-8.45012 18.19231,-14.83293 29.14904,-18.8125c-3.54026,5.11659 -5.58173,11.29267 -5.58173,17.98558c0,17.57212 14.26442,31.83654 31.83654,31.83654c17.57212,0 31.83654,-14.26442 31.83654,-31.83654c0,-6.74459 -1.98978,-13.04988 -5.58173,-18.19231z"></path></g></g></svg></div><div class="sumview">'.$storyViewCount.'</div></div>';
}
$exts = pathinfo($storyImg, PATHINFO_EXTENSION); 
$imageExtensions = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
$videoExtensions = array("mp4", "MP4");
$videoTumbnail = $base_url.'uploads/video/safe_video.png';
$dataUserVerified = $storyFromData['verified_user']; 
$dataUserProTypeinPost = $storyFromData['pro_user_type'];
$verifiedBadge = '';
if($dataUserVerified == '1'){
   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
}
$userisPro = '';
if($dataUserProTypeinPost == 1){
    $userisPro = '<span class="p_prst">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
}  
?>
<!--Post STARTED-->
<div class="zMhqu white_bg u_p<?php echo $storyID;?> body<?php echo $storyID;?>" id="u_p<?php echo $storyID;?>"  data-last="<?php echo $storyID;?>"> 
  <!--Post Menu STARTED-->
 <div class="post_menu_container post_menu_<?php echo $storyID;?>" id="post_menu_<?php echo $storyID;?>">
      <?php echo $postDeleteButton;?>
 </div>
 <!--Post Menu FINISHED-->
  <!--Header STARTED-->
  <div class="Ppjfr">
     <?php echo $userisPro;?> 
    <!--User Avatar STARTED-->
    <div class="user_avatar show_card" id="<?php echo $storyOwnder;?>" data-user="<?php echo $StoryOwnerUserName;?>" data-type="userCard">
      <a href="<?php echo $base_url.'profile/'.$StoryOwnerUserName;?>" title="<?php echo $StoryOwnerUserFullName;?>"><img class="_6q-tv" src="<?php echo $StoryOwnerAvatar;?>" alt="<?php echo $StoryOwnerUserFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a>
    </div>
    <!--User Avatar FINISHED-->
    <!--User Name Started-->
    <div class="o-UQd"><a class="nJAzx" title="<?php echo $StoryOwnerUserFullName;?>" href="<?php echo $base_url.'profile/'.$StoryOwnerUserName;?>"><?php echo $StoryOwnerUserFullName;?></a><?php echo $verifiedBadge;?></div>
    <div class="postCreatedTime" title="<?php echo $storyCreated_time;?>"></div>
    <!--User Name FINISHED-->
    <div class="post_menu" id="<?php echo $storyID;?>">
      <div class="post_menu_icn"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16zM96,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16zM144,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16z"></path></g></g></svg></div> 
    </div> 
  </div>
  <!--Header FINISHED-->
   <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container">
      
      <?php if(in_array($exts, $imageExtensions)){?>
		   <div class="item">
			 <img src="<?php echo $base_url.'uploads/stories/'.$storyImg;?>"  class="a0uk">  
           </div>
	  <?php } if(in_array($exts, $videoExtensions)){?>
		   <div class="item column-video">
			   <!--Media Player STARTED-->
					<div class="media-wrapper videoPlayr"  id="videoPlayer<?php echo $storyID;?>"> 
						<video class="vidchaVideo mejs__player" id="player<?php echo $storyID;?>" width="100%" height="360"style="max-width:100%;" src="<?php echo $base_url.'uploads/stories/'.$storyImg;?>" type="video/mp4"  poster="<?php echo $videoTumbnail;?>" controls="controls" preload="none"></video>
					</div>
			   <!--Media Player FINISHED-->
			</div>
	 <?php  } ?>
  </div>
  <div class="stories_footer_container">
      <?php echo $showClick;?>
  </div>
  <!--Global POST CONTAINER FINISHED-->
  
</div>
<!--Post FINISHED-->
