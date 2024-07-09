<?php  
$page = 'profile'; 
//include_once 'functions/control.php'; 
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
include_once("contents/header.php");
if($profileUserID != $uid){ 
   if($proSystemStatus == '1'){
        $Dot->Dot_InsertVisitor($uid, $profileUserID);
   }else{$Dot->Dot_InsertVisitorNormal($uid, $profileUserID);}
}
?> 
<div class="section" id="which_user_profile" data-type="profile" data-id="<?php echo $profileUserID;?>" data-who="<?php echo $ProfileUserName;?>">
   <div class="main">
    <!--Profile Cover STARTED-->
    <div class="profile_cover_container">
        <div id="profile_cover_container"><div class="CoverImage img-thumbnail" style="background-image:url('<?php echo $ProfileUserCover;?>');"></div></div>
        <?php if($FriendStatus == 'me'){ ?>
        <div class="uploadNewCover">
          <form id="coverForm" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                  <label class="chng-avatar" for="changeCover">  
                     <input type="file" name="coverimage" id="changeCover" data-id="cover" class="chose-image-btn" accept="image/*"/>
                     <div class="icons upladNewCoverImage"></div> 
                 </label>
          </form> 
        </div>
        <?php } ?>
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
                     <input type="file" name="avatarimage" id="change" data-id="avatar" class="chose-image-btn" accept="image/*"/>
                     <div class="uploadNewAvatarBtn">
                          <div class="icons upladNewImage"></div>
                          <div class="uploadNewAvatar_title"><?php echo $page_Lang['change_avatar'][$dataUserPageLanguage];?></div>
                     </div>
                 </label>
              </form>
             </div>
             <?php }?>
         </div>
         <div class="pUsrNm"><h1 class="AC5d8 notranslate ttext_" title="<?php echo $ProfileUserFullName;?>"><?php echo $ProfileUserFullName;?></h1><?php echo $verifiedBadge;?></div> 
         <div class="pUsrLTxt"><?php echo htmlentities($ProfileWord);?></div>
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
					  $messageButton ='<div class="pfst_item getuse" id="chatBox" data-id="'.$profileUserID.'" data-user="'.$ProfileUserName.'" data-page="normal" data-type="chat"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M96,24c-39.53906,0 -72,30.82031 -72,69c0,20.34375 9.42188,38.41406 24,51v27.75l26.625,-13.3125c6.77344,2.03906 13.85156,3.5625 21.375,3.5625c39.53906,0 72,-30.82031 72,-69c0,-38.17969 -32.46094,-69 -72,-69zM96,36c33.35156,0 60,25.59375 60,57c0,31.40625 -26.64844,57 -60,57c-7.17187,0 -14.01562,-1.35937 -20.4375,-3.5625l-2.4375,-0.75l-13.125,6.5625v-13.5l-2.25,-1.875c-13.3125,-10.5 -21.75,-26.22656 -21.75,-43.875c0,-31.40625 26.64844,-57 60,-57zM89.25,74.0625l-36.1875,38.25l32.4375,-18l17.25,18.5625l35.8125,-38.8125l-31.6875,17.8125z"></path></g></g></g></svg></span></div></div>';
				  }
				  if($FriendStatus !== 'me' && $FriendStatus == '1' || $FriendStatus == 'flwr'  ){
					  $followType = 'uun';
					  $rel = 'wait';
				      $friendStatusButton = '<div class="pfst_item friend_user" id="friend__user_'.$profileUserID.'" data-type="'.$followType.'"  data-id="'.$profileUserID.'" data-get="friendSend" data-rel="'.$rel.'" data-page="profile"><div class="Ar2yR_ follow_usr button_orange" id="friend_user'.$profileUserID.'" style="padding: 5px 10px 5px 12px;"><span class="icons_tree sendf friendWaiting" id="friend_user_'.$profileUserID.'"></span></div></div>';
					  $messageButton ='<div class="pfst_item getuse" id="chatBox" data-id="'.$profileUserID.'" data-user="'.$ProfileUserName.'" data-page="normal" data-type="chat"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M96,24c-39.53906,0 -72,30.82031 -72,69c0,20.34375 9.42188,38.41406 24,51v27.75l26.625,-13.3125c6.77344,2.03906 13.85156,3.5625 21.375,3.5625c39.53906,0 72,-30.82031 72,-69c0,-38.17969 -32.46094,-69 -72,-69zM96,36c33.35156,0 60,25.59375 60,57c0,31.40625 -26.64844,57 -60,57c-7.17187,0 -14.01562,-1.35937 -20.4375,-3.5625l-2.4375,-0.75l-13.125,6.5625v-13.5l-2.25,-1.875c-13.3125,-10.5 -21.75,-26.22656 -21.75,-43.875c0,-31.40625 26.64844,-57 60,-57zM89.25,74.0625l-36.1875,38.25l32.4375,-18l17.25,18.5625l35.8125,-38.8125l-31.6875,17.8125z"></path></g></g></g></svg></span></div></div>';
				  }
				  if($FriendStatus !== 'me' && $FriendStatus == 'fri' ||  $FriendStatus == 'flwr'  ){
					  $followType = 'uun';
				      $friendStatusButton = '<div class="pfst_item friend_user" id="friend__user_'.$profileUserID.'" data-type="'.$followType.'"  data-id="'.$profileUserID.'" data-get="friendSend" data-rel="'.$followType.'" data-page="profile"><div class="Ar2yR_ follow_usr button_yellow" id="friend_user'.$profileUserID.'" style="padding: 5px 10px 5px 12px;"><span class="icons_tree sendf alreadyFriend" id="friend_user_'.$profileUserID.'"></span></div></div>';
					  $messageButton ='<div class="pfst_item getuse" id="chatBox" data-id="'.$profileUserID.'" data-user="'.$ProfileUserName.'" data-page="normal" data-type="chat"><div class="Ar2yR_ sndMessage" style="padding: 5px 10px 5px 12px;"><span class="sendMicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M96,24c-39.53906,0 -72,30.82031 -72,69c0,20.34375 9.42188,38.41406 24,51v27.75l26.625,-13.3125c6.77344,2.03906 13.85156,3.5625 21.375,3.5625c39.53906,0 72,-30.82031 72,-69c0,-38.17969 -32.46094,-69 -72,-69zM96,36c33.35156,0 60,25.59375 60,57c0,31.40625 -26.64844,57 -60,57c-7.17187,0 -14.01562,-1.35937 -20.4375,-3.5625l-2.4375,-0.75l-13.125,6.5625v-13.5l-2.25,-1.875c-13.3125,-10.5 -21.75,-26.22656 -21.75,-43.875c0,-31.40625 26.64844,-57 60,-57zM89.25,74.0625l-36.1875,38.25l32.4375,-18l17.25,18.5625l35.8125,-38.8125l-31.6875,17.8125z"></path></g></g></g></svg></span></div></div>';
				  }
				    if($profileUserCanSendMessage == 1){
					   echo $messageButton;
					}
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
                            <div class="info_item_answer"><?php echo $page_Lang[$profileUserRelationShip][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?></div>
                            <div class="info_item_answer"><?php echo $page_Lang[$profileUserSexuality][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                          <!--Item FINISHED-->
							<?php if(!$profileUserHeight && !$profileUserWeight && $profileUserBodyType == 'unspecified' && $profileUserHairColor == 'unspecified' && $profileUserEyeColor == 'unspecified'){} else{?>
                            <!--Item STARTED-->
                            <div class="info_item_box">
                              <div class="info_item_title">
                                <?php echo $page_Lang['appearance'][$dataUserPageLanguage];?>
                              </div>
                              <div class="info_item_answer">
                                <?php if($profileUserHeight){echo $profileUserHeight.'cm';}?>
                                <?php if($profileUserWeight){echo ','.$profileUserWeight.'kg';}?>   
                                <?php if($profileUserBodyType !== 'unspecified'){ echo ','.$page_Lang[$profileUserBodyType][$dataUserPageLanguage]; }?>   
                                <?php if($profileUserHairColor !== 'unspecified'){ echo ','.$page_Lang[$profileUserHairColor][$dataUserPageLanguage];}?>   
                                <?php if($profileUserEyeColor !== 'unspecified'){ echo $page_Lang[$profileUserEyeColor][$dataUserPageLanguage];}?>   
                                </div>
                            </div>
                              <?php }?>    
                         <!--Item FINISHED-->
                        
      
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['life_style'][$dataUserPageLanguage];?>:</div>
                            <?php 
							   if($profileUserLifeStyle){
							   echo '<div class="info_item_answer">'.$page_Lang[$profileUserLifeStyle][$dataUserPageLanguage].'</div>';
							   }
							?> 
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['children'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$profileUserChildren][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$profileUserSmoke][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                         <!--Item STARTED-->
                         <div class="info_item_box">
                            <div class="info_item_title"><?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?>:</div>
                            <div class="info_item_answer"><?php echo $page_Lang[$profileUserDrink][$dataUserPageLanguage];?></div>
                         </div>
                         <!--Item FINISHED-->
                     </div>
                     <?php if(!$profileUserJobTitle && !$profileUserJobCampanyName){
						     
					 }else{?> 
                     <h1 class="info_title"><?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?></h1>
                     <div class="info_form_items">
                         <div class="business_scholl_university">
                             
                             <div class="info_item_box _item_answer"> 
							     <?php echo $profileUserJobTitle;?><?php if($profileUserJobCampanyName){ echo ', '.$profileUserJobCampanyName;}?>
                             </div>
                             
                             <?php if($profileUserSchoolUniversity){echo '<div class="info_item_box _item_answer">'.$profileUserSchoolUniversity.'</div>';}?>
                             
                         </div>
                     </div>
                     <?php }?>
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
                 <h1 class="info_title"><?php echo $page_Lang['biography'][$dataUserPageLanguage];?></h1>
                 <div class="info_form_items _item_answer">
                     <?php echo htmlcode($ProfileBio);?>
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
    <div class="fx7hk"> 
             <div class="pUmA">
                  <div class="iconWrp hvr-underline-from-center" data-feed="all"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><g id="surface1"><path d="M48.75,16c-5.59375,0 -10.3125,3.1875 -13.5,8l-17.75,28.75c-0.8125,1.59375 -1.5,4.84375 -1.5,7.25v100c0,8.8125 7.1875,16 16,16h128c8.8125,0 16,-7.1875 16,-16v-100c0,-2.40625 -0.6875,-5.59375 -1.5,-8l-17.75,-28c-3.1875,-4.8125 -7.90625,-8 -13.5,-8zM48.75,32h94.5l9.5,16h-113.5zM32,64h128v96h-128zM78.5,80c-4.40625,0.40625 -7.65625,4.34375 -7.25,8.75c0.40625,4.40625 4.34375,7.65625 8.75,7.25h32c2.875,0.03125 5.5625,-1.46875 7.03125,-3.96875c1.4375,-2.5 1.4375,-5.5625 0,-8.0625c-1.46874,-2.5 -4.15625,-4 -7.03125,-3.96875h-32c-0.25,0 -0.5,0 -0.75,0c-0.25,0 -0.5,0 -0.75,0z"></path></g></g></g></svg></div></div>
                  <div class="iconWrp hvr-underline-from-center" data-feed="text"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><path d="M38.4,25.6c-6.9956,0 -12.8,5.8044 -12.8,12.8v46.5375c-3.95334,2.28245 -6.39193,6.49759 -6.4,11.0625c0.00361,4.56938 2.4428,8.79031 6.4,11.075v46.525c0,6.9956 5.8044,12.8 12.8,12.8h115.2c6.9956,0 12.8,-5.8044 12.8,-12.8v-46.5375c3.95334,-2.28245 6.39193,-6.49759 6.4,-11.0625c-0.00361,-4.56938 -2.4428,-8.79031 -6.4,-11.075v-46.525c0,-6.9956 -5.8044,-12.8 -12.8,-12.8zM38.4,38.4h115.2v46.5375c-3.95334,2.28245 -6.39193,6.49759 -6.4,11.0625c0.00361,4.56938 2.4428,8.79031 6.4,11.075v46.525h-115.2v-46.5375c3.95334,-2.28245 6.39193,-6.49759 6.4,-11.0625c-0.00361,-4.56938 -2.4428,-8.79031 -6.4,-11.075zM64,64v12.8h25.6v57.6h12.8v-57.6h25.6v-12.8h-25.6h-12.8z"></path></g></g></svg></div></div>
                  <div class="iconWrp hvr-underline-from-center" data-feed="image"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><g id="surface1"><path d="M77.32031,18c-11.625,0 -21.58594,8.32031 -23.64844,19.75781l-0.75,4.24219h-16.92188c-13.26562,0 -24,10.73438 -24,24v78c0,13.26563 10.73438,24 24,24h120c13.26563,0 24,-10.73437 24,-24v-78c0,-13.26562 -10.73437,-24 -24,-24h-16.92187l-0.77344,-4.24219c-2.03906,-11.4375 -12,-19.75781 -23.625,-19.75781zM77.32031,30h37.35937c5.83594,0 10.80469,4.14844 11.83594,9.89063l0.77344,4.21875c1.00781,5.71875 5.97656,9.89062 11.78906,9.89062h16.92187c6.60938,0 12,5.39063 12,12v78c0,6.60938 -5.39062,12 -12,12h-120c-6.60937,0 -12,-5.39062 -12,-12v-78c0,-6.60937 5.39063,-12 12,-12h16.92188c5.8125,0 10.78125,-4.17187 11.8125,-9.89062l0.77344,-4.21875c1.00781,-5.71875 5.97656,-9.89063 11.8125,-9.89063zM96,66c-21.53906,0 -39,17.46094 -39,39c0,21.53906 17.46094,39 39,39c21.53906,0 39,-17.46094 39,-39c0,-21.53906 -17.46094,-39 -39,-39zM96,78c14.88281,0 27,12.11719 27,27c0,14.88281 -12.11719,27 -27,27c-14.88281,0 -27,-12.11719 -27,-27c0,-14.88281 12.11719,-27 27,-27z"></path></g></g></g></svg></div></div>
                  <div class="iconWrp hvr-underline-from-center" data-feed="video"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><path d="M56,24c-8.84,0 -16,7.16 -16,16h112c0,-8.84 -7.16,-16 -16,-16zM32,56c-8.84,0 -16,7.16 -16,16v80c0,8.84 7.16,16 16,16h128c8.84,0 16,-7.16 16,-16v-80c0,-8.84 -7.16,-16 -16,-16zM80,88l40,24l-40,24z"></path></g></g></svg></div></div>
                  <div class="iconWrp hvr-underline-from-center" data-feed="link"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><g id="surface1"><path d="M130.5,24c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,4.75781 0.91406,9.39844 2.625,13.6875l9.75,-9.75c-1.21875,-7.78125 1.14844,-16.14844 7.125,-22.125l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c6.82031,0 13.17188,2.67188 18,7.5c9.96094,9.96094 9.96094,26.22656 0,36.1875l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-1.33594,0 -2.64844,-0.14062 -3.9375,-0.375l-9.75,9.75c4.28906,1.71094 8.92969,2.625 13.6875,2.625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-10.03125 -3.96094,-19.33594 -11.0625,-26.4375c-7.07812,-7.10156 -16.40625,-11.0625 -26.4375,-11.0625zM115.6875,67.6875l-48,48l8.625,8.625l48,-48zM70.5,84c-10.03125,0 -19.54687,3.96094 -26.625,11.0625l-8.8125,8.8125c-7.10156,7.10156 -11.0625,16.59375 -11.0625,26.625c0,10.03125 3.96094,19.33594 11.0625,26.4375c7.07813,7.10156 16.40625,11.0625 26.4375,11.0625c10.03125,0 19.54688,-3.96094 26.625,-11.0625l8.8125,-8.8125c7.10156,-7.10156 11.0625,-16.59375 11.0625,-26.625c0,-4.75781 -0.91406,-9.39844 -2.625,-13.6875l-9.75,9.75c1.21875,7.78125 -1.14844,16.14844 -7.125,22.125l-8.8125,8.8125c-4.82812,4.82813 -11.36719,7.5 -18.1875,7.5c-6.82031,0 -13.17187,-2.67187 -18,-7.5c-9.96094,-9.96094 -9.96094,-26.22656 0,-36.1875l8.8125,-8.8125c4.82813,-4.82812 11.36719,-7.5 18.1875,-7.5c1.33594,0 2.64844,0.14063 3.9375,0.375l9.75,-9.75c-4.28906,-1.71094 -8.92969,-2.625 -13.6875,-2.625z"></path></g></g></g></svg></div></div>
                  <div class="iconWrp hvr-underline-from-center" data-feed="music"><div class="list_gridView"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><g id="surface1"><path d="M96,3.84c-32.91,0 -60.51,23.16 -67.44,54c0.705,-0.075 1.44,-0.24 2.16,-0.24c1.965,0 3.855,0.405 5.64,0.96c6.51,-26.925 30.735,-47.04 59.64,-47.04c28.905,0 53.13,20.115 59.64,47.04c1.785,-0.555 3.675,-0.96 5.64,-0.96c0.72,0 1.455,0.165 2.16,0.24c-6.93,-30.84 -34.545,-54 -67.44,-54zM30.72,65.28c-6.345,0 -11.52,5.175 -11.52,11.52v57.6c0,6.345 5.175,11.52 11.52,11.52c6.345,0 11.52,-5.175 11.52,-11.52v-57.6c0,-6.345 -5.175,-11.52 -11.52,-11.52zM161.28,65.28c-6.345,0 -11.52,5.175 -11.52,11.52v57.6c0,6.345 5.175,11.52 11.52,11.52c6.345,0 11.52,-5.175 11.52,-11.52v-57.6c0,-6.345 -5.175,-11.52 -11.52,-11.52zM11.52,77.28c-6.93,5.565 -11.52,16.005 -11.52,28.32c0,12.315 4.59,22.755 11.52,28.32zM180.48,77.28v56.64c6.93,-5.565 11.52,-16.005 11.52,-28.32c0,-12.315 -4.59,-22.755 -11.52,-28.32z"></path></g></g></g></svg></div></div>
             </div>
         </div>
    <!--Profile Image, some user informations FINISHED-->
    <div class="bgNew" <?php echo $pbg;?>> 
       <div class="profile_posts_container"> 
              <!--MIDDLE STARTED-->
            <div class="cGcGK_p"> 
                <div id="feed">
                     <?php 
					 // It is a page where all pictures, videos, texts and similar things shared by people are displayed.
					 //The change you make here can be instantly viewed by everyone.
					 include("contents/posts.php");
					 ?>
                  </div>    
            </div>
            <!--MIDDLE FINISHED-->
       </div>
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
<?php if($profileBackgroundMusicType == '1'){?> 
<span class="soundContainer"> 
    <span class="soundBgWrapper">
         <span class="manage pause"></span>
         <span class="soundmanage"></span>
    </span>
</span>
<div class="bgSound" style="display:none;"> 
<script type="text/javascript">
$(document).ready(function() {  
function playProfileBg(){
   ion.sound({
		sounds: [
			{name: "<?php echo $profileBackgroundMusicName;?>"} 
		], 
		// main config
		path: requestUrl+"uploads/audio/",
		preload: true,  
		volume: 1.0
	}); 
	ion.sound.play("<?php echo $profileBackgroundMusicName;?>");
}
playProfileBg();
$("body").on("click", ".manage , #changeAud", function(){
    ion.sound.pause("<?php echo $profileBackgroundMusicName;?>");
	if ($(".manage").hasClass("pause")) {
      $(".manage").removeClass("pause").addClass("play");
    } else {
      $(".manage").removeClass("play").addClass("pause");
    }
 }); 
}); 
  </script>
  <?php }?>  
</div>

<?php if($FriendStatus == 'me'){ ?>
<!--Avatar Crop STARTED-->
<div class="fixedAvatarBackground"></div>
<div class="crop-avatar-container" id="uploadimageModal">
    <div class="crop-avatar-wrapper">
         <div class="crop-avatar-modal-middle">
             <div class="crop_avatar_header"><?php echo $page_Lang['crop_upload_new_avatar'][$dataUserPageLanguage];?><div class="closeavatarCrop closeCrop"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
             <div class="cropier_container">
                  <div class="crop_middle"><span id="image_demo"></span></div>
             </div>
             <!---->
             <div class="cropTypeisGif" style="display:none;"><?php echo $page_Lang['crop_gif_note'][$dataUserPageLanguage];?></div>
             <!---->
             <!---->
             <div class="crop_avatar_box_footer">
                <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3 closeCrop"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
                <div class="control right_btn"><button class="waves-effect waves-light btn blue crop_image"><?php echo $page_Lang['finish_crop'][$dataUserPageLanguage];?></button></div>
             </div>
             <!---->
         </div>
    </div>
</div>
<!--Avatar Crop FINISHED-->
<!--Cover Crop STARTED-->
<div class="fixedCoverBackground"></div>
<div class="crop-Cover-container" id="uploadCoverModal">
    <div class="crop-Cover-wrapper">
         <div class="crop-Cover-modal-middle">
             <div class="crop_Cover_header"><?php echo $page_Lang['crop_upload_new_cover'][$dataUserPageLanguage];?><div class="closeavatarCrop closeCrop"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
             <div class="cropier_container">
                  <div class="crop_middle_cover"><div id="cover_image"></div></div>
             </div>
             <!---->
             <div class="cropTypeisGif" style="display:none;"><?php echo $page_Lang['crop_gif_note'][$dataUserPageLanguage];?></div>
             <!---->
             <!---->
             <div class="crop_Cover_box_footer">
                <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3 closeCrop"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
                <div class="control right_btn"><button class="waves-effect waves-light btn blue crop_cover_image"><?php echo $page_Lang['finish_crop'][$dataUserPageLanguage];?></button></div>
             </div>
             <!---->
         </div>
    </div>
</div>
<!--Cover Crop FINISHED-->
<script type="text/javascript">
$(document).ready(function() {
	// Close Crop
	$("body").on("click",".closeCrop", function(){
	    $(".fixedCoverBackground , .fixedAvatarBackground").hide(); 
	});
	$('#image_demo , #cover_image').croppie('destroy');
  $image_crop = $("#image_demo").croppie({
    enableExif: true, 
	 enableResize: false, 
    viewport: {
      width: 200,
      height: 200,
      type: "square" //circle
    },
    boundary: {
      width: 300,
      height: 300
    }
  });

  $("body").on("change", "#change", function() {
    var reader = new FileReader();
	var file = this.files[0];
    var fileType = file["type"];
    var validImageTypes = ["image/gif", "image/jpeg", "image/png","image/svg+xml", "image/jpg"];
	if ($.inArray(fileType, validImageTypes) < 0) {
		 // invalid file type code goes here.
		 alert('Not valit Image format');
	}else{
		var reader = new FileReader();
    reader.onload = function(event) {
      $image_crop
        .croppie("bind", {
          url: event.target.result
        })
        .then(function() {
          if(fileType == "image/gif"){
		      $(".cropTypeisGif").show();
		  }
        });
    };
    reader.readAsDataURL(this.files[0]);
    $("#uploadimageModal , .fixedAvatarBackground").show();
	}
  });

  $("body").on("click", ".crop_image", function(event) {
    $image_crop
      .croppie("result", {
        type: "canvas",
        size: 'original',
        circle:'false',
      })
      .then(function(response) {
        $.ajax({
          url:  requestUrl + "requests/crop.php",
          type: "POST",
          data: { image: response ,  t : 'avatar' },
          success: function(data) {
            $("#uploadimageModal , .fixedAvatarBackground").hide();
            $("#user_profile_avatar").html(data);
			$(".cropTypeisGif").hide();
          }
        });
      });
  }); 
 $coverimage_crop = $("#cover_image").croppie({
    enableExif: true, 
	  enableResize: false, 
    viewport: {
      width: 330,
      height: 220,
      type: "square" //circle
    },
    boundary: {
      width: "100%",
      height: 220
    }
  }); 
  $("body").on("change", "#changeCover", function() {
    var reader = new FileReader();
	var file = this.files[0];
    var fileType = file["type"];
    var validImageTypes = ["image/gif", "image/jpeg", "image/png", "image/jpg"];
	if ($.inArray(fileType, validImageTypes) < 0) {
		 // invalid file type code goes here.
		 alert('Not valit Image format');
	}else{ 
		var reader = new FileReader();  
    reader.onload = function(event) {
      $coverimage_crop
        .croppie("bind", {
          url: event.target.result
        })
        .then(function() {
          if(fileType == "image/gif"){
		      $(".cropTypeisGif").show();
		  }
        });
    };
    reader.readAsDataURL(this.files[0]);
    $("#uploadCoverModal , .fixedCoverBackground").show();
	}
  });

  $("body").on("click", ".crop_cover_image", function(event) {
    $coverimage_crop
      .croppie("result", {
        type: "canvas",
        size: 'original',
        circle:'false',
      })
      .then(function(response) {
        $.ajax({
          url:  requestUrl + "requests/crop.php",
          type: "POST",
          data: { image: response  ,  t : 'cover'},
          success: function(data) {
            $("#uploadCoverModal , .fixedCoverBackground").hide();
            $("#profile_cover_container").html(data); 
			$(".cropTypeisGif").hide();
          }
        });
      });
  });
}); 
</script> 
<?php } ?>
</body>
</html>
