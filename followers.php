<?php  
$page = 'profile'; 
include_once 'functions/inc.php';
if(isset($_GET['username'])) { 
$username=$_GET['username']; 
include_once 'functions/get_profile.php'; 
if(empty($profileUserID)) {   
	  header("Location:".$base_url."sources/not-found.php");   
 }
}else{
      header("Location:".$base_url."sources/not-found.php");   
}
$FriendStatus = $Dot->Dot_FriendStatus($uid,$profileUserID);
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 
<div class="section" id="which_user_profile" data-type="profile" data-id="<?php echo $profileUserID;?>" data-who="<?php echo $ProfileUserName;?>">
   <div class="main">
    <!--Profile Cover STARTED-->
    <div class="profile_cover_container">
        <div id="profile_cover_container"><div class="CoverImage" style="background-image:url('<?php echo $ProfileUserCover;?>');"></div></div>
        <?php if($FriendStatus == 'me'){ ?>
        <div class="uploadNewCover">
          <form id="coverForm" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                  <label class="chng-avatar" for="changeCover">  
                     <input type="file" name="coverimage" id="changeCover" data-id="cover" class="chose-image-btn" />
                     <div class="icons upladNewCoverImage"></div> 
                 </label>
          </form> 
        </div>
        <?php }?>
    </div>
    <!--Profile Cover FINISHED-->
    <!--Profile Image, some user information STARTED-->
    <div class="xSlty"> 
         <div class="profile_avatar_image_profile"> 
             <div id="user_profile_avatar"><div class="profile_avatar_image_container" style="background-image: url('<?php echo $ProfileUserAvatar;?>'); "></div><?php echo $prosstattus;?></div>
             <?php if($FriendStatus == 'me'){ ?>
             <div class="uploadNewAvatar">
              <form id="avatarForm" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                  <label class="chng-avatar" for="change">  
                     <input type="file" name="avatarimage" id="change" data-id="avatar" class="chose-image-btn" />
                     <div class="uploadNewAvatarBtn">
                          <div class="icons upladNewImage"></div>
                          <div class="uploadNewAvatar_title"><?php echo $page_Lang['change_avatar'][$dataUserPageLanguage];?></div>
                     </div>
                 </label>
              </form>
             </div>
             <?php }?>
         </div> 
         <div class="pUsrNm"><h1 class="AC5d8 notranslate" title="<?php echo $ProfileUserFullName;?>"><?php echo $ProfileUserFullName;?></h1><?php echo $verifiedBadge;?></div>
         <div class="pUsrLTxt"><?php echo $ProfileWord;?></div>
         <div class="pUsrFlpsM">
              <div class="pUPsms"><a href="<?php echo $base_url.'profile/'.$ProfileUserName;?>"><div class="puTp ttext_"><?php echo $CountTheUserPost;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_posts'][$dataUserPageLanguage];?></div></a></div>
              <div class="pUPsms"><a href="<?php echo $base_url.'profile/followers/'.$ProfileUserName;?>"><div class="puTp ttext_"><?php echo $CountTheFollowers;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_followers'][$dataUserPageLanguage];?></div></a></div>
              <div class="pUPsms"><a href="<?php echo $base_url.'profile/friends/'.$ProfileUserName;?>"><div class="puTp ttext_"><?php echo $CountTheFriends;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></div></a></div>
         </div>
         <div class="pUsrFlpsM_p">
              <div class="pUmA">
                  <?php 
				  $followType ='uf';
				  if($ProfilePrivateAccount == '0'){$followType = 'udf';}
				      $friendStatusButton = ''; 
				      $messageButton ='';
				  if($FriendStatus !== 'me' && $FriendStatus == ''){
				      $friendStatusButton = '<div class="pfst_item friend_user" id="friend__user_'.$profileUserID.'" data-type="'.$followType.'"  data-id="'.$profileUserID.'" data-get="friendSend" data-rel="'.$followType.'" data-page="profile"><div class="Ar2yR_ follow_usr button_blue" id="friend_user'.$profileUserID.'" style="padding: 5px 10px 5px 12px;"><span class="icons_tree sendf sendFicon" id="friend_user_'.$profileUserID.'"></span></div></div>';
					  $messageButton ='<div class="pfst_item"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon icons_two"></span></div></div>';
				  }
				  if($FriendStatus !== 'me' && $FriendStatus == '1' || $FriendStatus == 'flwr'  ){
					  $followType = 'uun';
					  $rel = 'wait';
				      $friendStatusButton = '<div class="pfst_item friend_user" id="friend__user_'.$profileUserID.'" data-type="'.$followType.'"  data-id="'.$profileUserID.'" data-get="friendSend" data-rel="'.$rel.'" data-page="profile"><div class="Ar2yR_ follow_usr button_orange" id="friend_user'.$profileUserID.'" style="padding: 5px 10px 5px 12px;"><span class="icons_tree sendf friendWaiting" id="friend_user_'.$profileUserID.'"></span></div></div>';
					  $messageButton ='<div class="pfst_item"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon icons_two"></span></div></div>';
				  }
				  if($FriendStatus !== 'me' && $FriendStatus == 'fri' ||  $FriendStatus == 'flwr'  ){
					  $followType = 'uun';
				      $friendStatusButton = '<div class="pfst_item friend_user" id="friend__user_'.$profileUserID.'" data-type="'.$followType.'"  data-id="'.$profileUserID.'" data-get="friendSend" data-rel="'.$followType.'" data-page="profile"><div class="Ar2yR_ follow_usr button_yellow" id="friend_user'.$profileUserID.'" style="padding: 5px 10px 5px 12px;"><span class="icons_tree sendf alreadyFriend" id="friend_user_'.$profileUserID.'"></span></div></div>';
					  $messageButton ='<div class="pfst_item"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon icons_two"></span></div></div>';
				  }
				    echo $messageButton;
				    echo $friendStatusButton;
				  ?>  
                   <div class="pfst_item"><div class="Ar2yR_ about_info"><span class="showAicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><path d="M96,112.568l-30.568,-30.568c-3.312,-3.312 -8.688,-3.312 -12,0v0c-3.312,3.312 -3.312,8.688 0,12l36.912,36.912c3.128,3.128 8.192,3.128 11.312,0l36.912,-36.912c3.312,-3.312 3.312,-8.688 0,-12v0c-3.312,-3.312 -8.688,-3.312 -12,0z"></path></g></g></svg></span><span class="hidm" style="color:#<?php echo $iconColorProfile;?>;"><?php echo $page_Lang['about_user'][$dataUserPageLanguage];?></span></div></div>
              </div>
         </div>
         <div class="pUsrFlpsM_p_info">
            <!--Left Profile Info Card STARTED-->
            <div class="profileInfoCardBox">
                 <!--1 STARTED-->
                 <div class="life_info_form">
                     <h1 class="info_title"><?php echo $page_Lang['personal_information'][$dataUserPageLanguage];?></h1>
                     <div class="info_form_items">
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['relationship'][$dataUserPageLanguage];?></div>
                            <div class="info_item_answer">İlişkisi var</div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?></div>
                            <div class="info_item_answer"><?php echo $page_Lang[$dataUserSexuality][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['appearance'][$dataUserPageLanguage];?></div>
                            <div class="info_item_answer"><?php echo $dataUserHeight;?> cm, <?php echo $dataUserWeight;?> kg, <?php echo $page_Lang[$dataUserBodyType][$dataUserPageLanguage];?> , <?php echo $page_Lang[$dataUserHairColor][$dataUserPageLanguage];?>  ve <?php echo $page_Lang[$dataUserEyeColor][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['life_style'][$dataUserPageLanguage];?>:</div>
                            <?php 
							   if($dataUserLifeStyle){
							   echo '<div class="info_item_answer">'.$page_Lang[$dataUserLifeStyle][$dataUserPageLanguage].'</div>';
							   }
							?> 
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['children'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$dataUserChildren][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$dataUserSmoke][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$dataUserDrink][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                     </div>
                     <h1 class="info_title"><?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?></h1>
                     <div class="info_form_items">
                         <div class="business_scholl_university">
                             <div class="info_item_box _item_answer"><?php echo $dataUserJobTitle;?>, <?php echo $dataUserCampanyName;?></div>
                             <div class="info_item_box _item_answer"><?php echo $dataUserSchoolUniversity;?></div>
                         </div>
                     </div>
                 </div>
                 <!--1 FINISHED-->
            </div>
            <!--Left Profile Info Card FINISHED-->
            <!--Right Profile Info Card STARTED-->
            <div class="profileInfoCardBox">
                 <h1 class="info_title"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></h1>
                 <div class="info_form_items boxflex"> 
                    <?php  
						$Friendsf=$Dot->Dot_FriendsWidget($profileUserID);
							if($Friendsf) {
								foreach($Friendsf as $dataf) {
								$friendUserFullName = $dataf['user_fullname'];
								$friendUserID = $dataf['user_id'];
								$friendUserUsername = $dataf['user_name'];
								$FriendAvatarImg = $Dot->Dot_UserAvatar($friendUserID,$base_url);  
						  echo '
						     <!--User STARTED-->
							 <div class="info_user_friend_box">
								<div class="user_friend_avatar"><a href="'.$base_url.'profile/'.$friendUserUsername.'"><img src="'.$FriendAvatarImg.'"></a></div>
							 </div>
							 <!--User FINISHED-->';
					   }
						} else {
						echo '<div class="noResultf">'.$page_Lang['no_friends_yet'][$dataUserPageLanguage].'</div>'; 
						}
						?> 
                     <!--User STARTED-->
                     <div class="info_user_friend_box">
                        <div class="user_friend_avatar"  style="border: 1px solid #8D8D8D;"><a href="hurafe/"><span class="other_friends_icon icons_tree"></span></a></div>
                     </div>
                     <!--User FINISHED--> 
                 </div>
                 <h1 class="info_title"><?php echo $page_Lang['areas_of_interest'][$dataUserPageLanguage];?></h1>
                 <div class="info_form_items">
                    <?php  
					   $GetAllUserInterstedItems = $Dot->Dot_GetUserInterestedList($profileUserID);
					   if($GetAllUserInterstedItems){
						    foreach($GetAllUserInterstedItems as $GetUserInterest){
								$InterestedIDdata = $GetUserInterest['user_interested_id'];
							    $InterestedUserID_fk = $GetUserInterest['interested_user_id_fk'];
								$UserInterestedTypeValue = $GetUserInterest['interested_type_value'];
								$UserInterestedType = $GetUserInterest['user_interested_type'];
								$typesArray = array(
								   'type_eating' => "icons_tree eatingicon",
								   'type_music' => "icons_tree musicicon",
								   'type_film_tv' => "icons_tree filmicon",
								   'type_travel' => "icons_tree travelicon",
								   'type_expertise' => "icons_tree businessicon"
								);
								echo '<span class="intr js-intr js-intr-ids-'.$InterestedIDdata.'" id="'.$UserInterestedTypeValue.'"><span class="icons_tree '.$typesArray[$UserInterestedType].'"></span><span class="intr-txt">'.$page_Lang[$UserInterestedTypeValue][$dataUserPageLanguage].'</span></span>'; 
							}
						} else {
						echo '<div class="noResultf">'.$page_Lang['no_interested_inserted'][$dataUserPageLanguage].'</div>'; 
						}
					 ?>
                 </div>
            </div>
            <!--Right Profile Info Card FINISHED-->
            <!--Featured Images and Videos STARTED-->
            <div class="featuredImagesVideosContainer">
              <div class="featuredImages_">
                <?php 
				  $photosWidget = $Dot->Dot_PhotosWidget($profileUserID);
				  if($photosWidget){ 
				     foreach($photosWidget as $photosData) {
						  $photosWidgetID = $photosData['user_post_id'];
						  $photosWidgetImageID = $photosData['post_image_id']; 
						  $ExplodeImage = explode(",", $photosWidgetImageID); // Explode the images string value 
			              $CountExplodes=count($ExplodeImage);
						  $more = '';
						  if($CountExplodes > 2){
							   $more =  '<div class="icons moreThanone"></div>';
						  }
						  $newdata=$Dot->Dot_GetUploadImageID($photosWidgetImageID);
						  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
						  if($newdata){
						     echo ' 
							  <div class="_pbwg8Uft" id="in1" data-id="1">
								 <div class="_jjzlbUft" style="background-image: url('.$final_image.');">
									 '.$more.'
									 <img src="'.$final_image.'" class="exPexUft">
								  </div>
							   </div>  
						  ';
						  } 
					 }
					  
				  }
				  echo '<div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div><div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div><div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div><div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div><div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div><div class="_pbwg8Uft" style="background-color:#d8dbdf;"><div class="_jjzlbUft"></div></div>  ';
				?> 
              </div>
            </div>
            <!--Featured Images and Videos FINISHED-->
         </div> 
    </div>
    <?php 
	   if($ProfilePrivateAccount == '1' && $FriendStatus !=='me' && $FriendStatus !== 'flwr' && $FriendStatus !== 'fri'){
	         echo '<div class="profile_posts_container"><div class="cGcGK_pNo">Bu hesap gizli<span class="icons secretAccount_icon"></span></div></div>';
	   }else{
	?>
     
    <!--Profile Image, some user informations FINISHED-->
       <div class="profile_friends_container">
            
              <!--MIDDLE STARTED-->
            <div class="cGcGK_fri"> 
                <div class="profile_f_container" id="morePostType" data-type="more_followers" data-profile="<?php echo $profileUserID;?>">
                     <?php include("contents/profile_followers.php"); ?> 
                  </div>    
            </div>
            <!--MIDDLE FINISHED-->
       </div>
       <?php }?>
   </div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");
?>
<script type="text/javascript" src="<?php echo $base_url;?>js/scrollFixed.js"></script>
<script type="text/javascript">
  $(".fx7hk").stick_in_parent(); 
</script>
</body>
</html>