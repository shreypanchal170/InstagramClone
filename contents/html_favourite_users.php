<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php";
include_once "functions/get_profile.php";
$lastFriendID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
$FriendsArray=$Dot->Dot_UserFavouriteUserList($uid, $lastFriendID); 
if($FriendsArray){
 foreach($FriendsArray as $FriendsFromData) { 
	  $userID = $FriendsFromData['f_user_id_two'];
	  $FriendDataID = $FriendsFromData['fid'];
	  $CardDataUserID = $FriendsFromData['user_id']; 
	  $distUserVerified = $FriendsFromData['verified_user'];
	  //$sUprivateAccount = $FriendsFromData['private_account'];
	  $userDistFullName = $Dot->Dot_UserFullName($userID);
	  $distUsername = $Dot->Dot_GetUserName($userID);
	  $dataDistUserAvatar = $Dot->Dot_UserAvatar($userID, $base_url);  
	  $followType ='uf';
	  if($sUprivateAccount == '0'){$followType = 'udf';}
	  $verifiedBadge = '';
	  if($distUserVerified == '1'){
		 $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
	  }
	  $distUserBirtyDay = $FriendsFromData['user_birthday'];
	  $distUserBirtyMonth = $FriendsFromData['user_birthmonth'];
	  $distUserBirtyYear = $FriendsFromData['user_birthyear'];
	  $today = new DateTime();
	  $birthdate = new DateTime("".$distUserBirtyYear."-".$distUserBirtyMonth."-".$distUserBirtyDay."");
	  $interval = $today->diff($birthdate);
	  $distUserAge =  $interval->format('%y'); 
	  $checkUserIsInFavouriteList = $Dot->Dot_CheckUserIsInFavouriteList($uid, $userID);
	  $favoIcon = $Dot->Dot_GetSvgIcon('64');
	  $favType = 'favourite';
	  if($checkUserIsInFavouriteList){
		  $favoIcon = $Dot->Dot_GetSvgIcon('65');
		  $favType = 'infavourite';
	  }
?>
<div class="user_c">
    <div class="user_w no<?php echo $userID;?>" style="background-image:url('<?php echo $dataDistUserAvatar;?>');"> 
        <div class="user_flw_btn_in"><div class="friend_user icons friend_user_sug<?php echo $userID;?> iconFollow" id="" data-type="<?php echo $followType;?>"  data-id="<?php echo $userID;?>" data-get="friendSend" data-rel="<?php echo $followType;?>" data-page="suggestion"></div></div>
         <div class="user_in">
             <div class="user_inf">
                  <div class="see_profile hvr-underline-from-left sep" data-type="userfirstinfo" data-id="<?php echo $userID;?>"><div class="sp_i"><?php echo $Dot->Dot_SelectedMenuIcon('see_profle');?></div><?php echo $page_Lang['see_user_profile_in_popup'][$dataUserPageLanguage];?></div>
                  <div class="user_in_nm truncate"><?php echo $userDistFullName.','.$distUserAge.' '.$verifiedBadge;?></div>
                  <div class="user_in_dist"><?php echo floor($dd);?> <?php echo $page_Lang['km_away'][$dataUserPageLanguage];?></div>
             </div>
             <span class="user_inf_btns">
                  <div class="to_item_u right_to_color getuse" id="chatBox" data-id="<?php echo $userID;?>" data-user="<?php echo $distUsername;?>" data-page="normal" data-type="chat"><div class="to_item_icon"><?php echo $Dot->Dot_SelectedMenuIcon('messenger');?></div></div>
                  <div class="to_item_u tii makeFavourite mf_<?php echo $userID;?>" id="<?php echo $userID;?>" data-f="<?php echo $favType;?>"><div class="to_item_icon" id="f_v_<?php echo $userID;?>"><?php echo $favoIcon;?></div></div>
             </span>
         </div>
    </div>
</div> 
<?php  } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_friends_will_be_shown'][$dataUserPageLanguage].'</div>';
}
?> 
 
 
