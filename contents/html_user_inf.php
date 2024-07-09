<?php 
$infUserID = isset($ud['user_id']) ? $ud['user_id'] : NULL;
$infUserName = isset($ud['user_name']) ? $ud['user_name'] : NULL;
$infUserFulName = isset($ud['user_fullname']) ? $ud['user_fullname'] : NULL;
$infUserEmail = isset($ud['user_email']) ? $ud['user_email'] : NULL;
$infUserRelationShip = isset($ud['user_relationship']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['relationship'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_relationship']][$dataUserPageLanguage].'</div></div>' : NULL;  
$infUserProfileWord = isset($ud['user_profile_word']) ? $ud['user_profile_word'] : NULL; 
$infUserWebsite  = isset($ud['user_website']) ? $ud['user_website'] : NULL;
$infUserBio = isset($ud['user_bio']) ? $ud['user_bio'] : NULL;
$infUserGender = isset($ud['user_gender']) ? $ud['user_gender'] : NULL;
$infUserHeight = isset($ud['user_height']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['height'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$ud['user_height'].'cm</div></div>' : NULL; 
$infUserWeight = isset($ud['user_weight']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['weight'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$ud['user_weight'].'kg</div></div>' : NULL;
$infUserLifeStyle = isset($ud['user_life_style']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['life_style'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_life_style']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserChildren = isset($ud['user_children']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['children'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_children']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserSmoke  = isset($ud['user_smoke']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['smoke_habit'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_smoke']][$dataUserPageLanguage].'</div></div>' : NULL; 
$infUserDrink = isset($ud['user_drink']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['drinking_habit'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_drink']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserBodyType = isset($ud['user_body_type']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['body_type'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_body_type']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserHairColor = isset($ud['user_hair_color']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['hair_colour'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_hair_color']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserEyeColor = isset($ud['user_eye_color']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['eye_color'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_eye_color']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserSexuality = isset($ud['user_sexuality']) ? '<div class="info_item_box"><div class="info_item_title">'.$page_Lang['sexuality'][$dataUserPageLanguage].'</div><div class="info_item_answer">'.$page_Lang[$ud['user_sexuality']][$dataUserPageLanguage].'</div></div>' : NULL;
$infUserJobTitle = isset($ud['user_job_title']) ? $ud['user_job_title'] : NULL;
$infUserLastLogin = isset($ud['last_login']) ? $ud['last_login'] : NULL;
$infUserJobCampanyName = isset($ud['user_job_company_name']) ? ','.$ud['user_job_company_name'] : NULL;
$infUserUniversitySchool = isset($ud['user_school_university']) ? '<div class="info_item_box _item_answer">'.$ud['user_school_university'].'</div>' : NULL;
$infUsePhoneNumber = isset($ud['user_phone_number']) ? $ud['user_phone_number'] : NULL; 
$infUseVerifiedUser = isset($ud['verified_user']) ? '<span class="mrEK_ Szr5J coreSpriteVerifiedBadge icons" style="display: inherit !important;" title="Doğrulanmış"></span>' : NULL;
$infUserulat = isset($ud['ulat']) ? $ud['ulat'] : NULL;
$infUserLongitude = isset($ud['ulong']) ? $ud['ulong'] : NULL; 
$infUserAvatar = $Dot->Dot_UserAvatar($infUserID, $base_url);
$infUserCover = $Dot->Dot_UserCover($infUserID, $base_url);
$CountinfUserPost = $Dot->Dot_UserPostCount($infUserID);
$CountinfUserFriends = $Dot->Dot_UserFriendsCount($infUserID);
$CountinfUserFollowers = $Dot->Dot_UserFollowersCount($infUserID);
?>
<div class="popupBack"></div>
<div class="uinfo_wrapper_ss uinfSlideInUp">
  <div class="inf_con_box">
   <div class="closeNewsinf"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
   <div class="uinfCover" style="background-image:url('<?php echo $infUserCover;?>');"></div>
   <div class="uinfAllContainer">
         <div class="uinfAvatar" style="background-image:url('<?php echo $infUserAvatar;?>');"></div>
         <div class="uinfName"> <?php echo $infUserFulName;?> <?php echo $infUseVerifiedUser;?></div>
         <div class="infUserTextBigo"><?php echo $infUserBio;?></div>
         <!---->
         <div class="pUsrFlpsM">
              <div class="pUPsms hvr-underline-from-left"><a href="<?php echo $base_url;?>profile/<?php echo $infUserName;?>"><div class="puTp ttext_"><?php echo $CountinfUserPost;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_posts'][$dataUserPageLanguage];?></div></a></div>
              <div class="pUPsms hvr-underline-from-left"><a href="<?php echo $base_url;?>profile/followers/<?php echo $infUserName;?>"><div class="puTp ttext_"><?php echo $CountinfUserFollowers;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_followers'][$dataUserPageLanguage];?></div></a></div>
              <div class="pUPsms hvr-underline-from-left"><a href="<?php echo $base_url;?>profile/friends/<?php echo $infUserName;?>"><div class="puTp ttext_"><?php echo $CountinfUserFriends;?></div><div class="putpx ttext_"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></div></a></div>
         </div>
         <!---->
         <div class="uinfOtherInformations">
             <h1 class="uinfo_title"><?php echo $page_Lang['personal_information'][$dataUserPageLanguage];?></h1>
             <?php 
			 echo $infUserRelationShip; 
			 echo $infUserSexuality;
			 echo $infUserLifeStyle;
			 echo $infUserChildren;
			 ?>
             <h1 class="uinfo_title"><?php echo $page_Lang['appearance'][$dataUserPageLanguage];?></h1>
             <?php 
			 echo $infUserEyeColor;
			 echo $infUserHairColor;
			 echo $infUserHeight;
			 echo $infUserWeight;
			 echo $infUserBodyType;
			 echo $infUserSmoke;
			 echo $infUserDrink;
			 ?>
             <h1 class="uinfo_title"><?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?></h1>
             <div class="info_item_box _item_answer"><?php echo $infUserJobTitle; echo $infUserJobCampanyName;?></div>
             <?php echo $infUserUniversitySchool;?>
         </div>
     </div>
   </div>
</div>


