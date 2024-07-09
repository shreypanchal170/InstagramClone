<?php 
$profileUserID = $Dot->Dot_UserID($username);
$UserDetails = $Dot->Dot_UserDetails($profileUserID);
/*Profile Details*/
$ProfileUserName = $UserDetails['user_name'];
$ProfileUserFullName = $UserDetails['user_fullname'];
$ProfileWord = $UserDetails['user_profile_word'];
$ProfilePrivateAccount = $UserDetails['private_account'];
$ProfileUserAvatar = $Dot->Dot_UserAvatar($profileUserID, $base_url);
$ProfileUserCover = $Dot->Dot_UserCover($profileUserID, $base_url);
$CountTheUserPost = $Dot->Dot_UserPostCount($profileUserID);
$CountTheFriends = $Dot->Dot_UserFriendsCount($profileUserID);
$CountTheFollowers = $Dot->Dot_UserFollowersCount($profileUserID);
$profileUserWebsite = $UserDetails['user_website']; 
$ProfileBio = isset($UserDetails['user_bio']) ? $UserDetails['user_bio'] : NULL;
$profileGender = $UserDetails['user_gender'];
$profileUserHeight = isset($UserDetails['user_height']) ? $UserDetails['user_height'] : NULL;
$profileUserWeight = isset($UserDetails['user_weight']) ? $UserDetails['user_weight'] : NULL;
$profileUserLifeStyle = $UserDetails['user_life_style'];
$profileUserChildren = $UserDetails['user_children'];
$profileUserSmoke = $UserDetails['user_smoke'];
$profileUserDrink = $UserDetails['user_drink'];
$profileUserBodyType = $UserDetails['user_body_type'];
$profileUserHairColor = $UserDetails['user_hair_color'];
$profileUserEyeColor = $UserDetails['user_eye_color'];
$profileUserSexuality = $UserDetails['user_sexuality'];
$profileUserJobTitle = $UserDetails['user_job_title'];
$profileUserLastLogin = $UserDetails['last_login'];
$profileUserRelationShip = $UserDetails['user_relationship'];
$profileUserJobCampanyName = $UserDetails['user_job_company_name'];
$profileUserSchoolUniversity = $UserDetails['user_school_university'];
$profileUserPhoneNumber = $UserDetails['user_phone_number'];
$profileBackgroundImage = isset($UserDetails['profile_bg']) ? $UserDetails['profile_bg'] : NULL;
$profileBackgroundImageType = $UserDetails['profile_bg_type']; 
$profileUserCanSendMessage = $UserDetails['message_available'];

$profileBackgroundColor = isset($UserDetails['pbg_color']) ? $UserDetails['pbg_color'] : NULL;
$getBgColor = $Dot->Dot_GetColorFromID($profileBackgroundColor);
$profileHeaderBackgroundColor = isset($UserDetails['pha_color']) ? $UserDetails['pha_color'] : NULL;
$profileTextColor = isset($UserDetails['pt_color']) ? $UserDetails['pt_color'] : NULL;
$getTextColor = $Dot->Dot_GetColorFromID($profileTextColor);
$profileHoverColor = isset($UserDetails['phv_color']) ? $UserDetails['phv_color'] : NULL;
$profilebuttonColors = isset($UserDetails['pp_icon']) ? $UserDetails['pp_icon'] : NULL; 
$profileHeaderSecondColors = isset($UserDetails['pshb_color']) ? $UserDetails['pshb_color'] : NULL; 
$getSecondHeaderColor = $Dot->Dot_GetColorFromID($profileHeaderSecondColors);
$profileSelectedFont = isset($UserDetails['pfont_font']) ? $UserDetails['pfont_font'] : NULL;
$getfon = $Dot->Dot_GetFontFromID($profileSelectedFont); 
$profileHeaderSecondicons = isset($UserDetails['pshb_icon']) ? $UserDetails['pshb_icon'] : NULL; 
$getPiconColor = $Dot->Dot_GetColorFromID($profilebuttonColors);
$iconColorProfile = '8a99a4';
if($getPiconColor){
    $iconColorProfile = $getPiconColor;
} 
$pbg ='';
if($profileBackgroundImageType == '1'){
   $pbg = 'style="background-image:url('.$base_url.'uploads/avatar/'.$profileBackgroundImage.');"';
}
$profileBackgroundMusicName = isset($UserDetails['bg_music_name']) ? $UserDetails['bg_music_name'] : NULL;
$profileBackgroundMusic = $UserDetails['bg_music'];
$profileBackgroundMusicType = $UserDetails['bg_music_type'];
$profileVerifiedStatus = $UserDetails['verified_user'];
$profileProStatuss = $UserDetails['pro_user_type'];
$verifiedBadge = '';
$prosstattus = '';
if($profileVerifiedStatus){
   $verifiedBadge = '<span class="mrEK_ Szr5J coreSpriteVerifiedBadge icons" title="Doğrulanmış"></span>';
}
if($profileProStatuss == 1){
   $prosstattus =  '<span class="prmem" style="right:15px;">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
}
?>