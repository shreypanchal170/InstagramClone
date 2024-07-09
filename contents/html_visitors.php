<?php   
$visitDataID = $visitoru['v_id'];
$visitorUserID = $visitoru['visitor_id'];  
$visitChecked = $visitoru['visit_checked'];
$VisitorUserAvatar = $Dot->Dot_UserAvatar($visitorUserID, $base_url); 
$ThisUserDetail = $Dot->Dot_UserDetailsFromID($visitorUserID,$dataUserLatitude, $dataUserLongitude); 
$visitorUserVerified = $ThisUserDetail['verified_user'];
$visitorUserBirtyDay = $ThisUserDetail['user_birthday'];
$visitorUserBirtyMonth = $ThisUserDetail['user_birthmonth'];
$visitorUserBirtyYear = $ThisUserDetail['user_birthyear']; 
$visitorUserFullName = $ThisUserDetail['user_fullname']; 
$visitorUserName = $ThisUserDetail['user_name']; 
$sUprivateAccount = $ThisUserDetail['private_account'];
$followType ='uf';
if($sUprivateAccount == '0'){$followType = 'udf';}
$dd = isset($ThisUserDetail['distance']) ? floor($ThisUserDetail['distance']).' '.$page_Lang['km_away'][$dataUserPageLanguage] : NULL; 
if(!empty($visitorUserBirtyYear) && !empty($visitorUserBirtyMonth) && !empty($visitorUserBirtyDay)){
  $today = new DateTime();
  $birthdate = new DateTime("".$visitorUserBirtyYear."-".$visitorUserBirtyMonth."-".$visitorUserBirtyDay."");
  $interval = $today->diff($birthdate);
  $visitorUserAge =  ','.$interval->format('%y');   
}else{
  $visitorUserAge = '';  
}

$verifiedBadge = '';
if($visitorUserVerified == '1'){
 $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
}
$checkUserIsInFavouriteList = $Dot->Dot_CheckUserIsInFavouriteList($uid, $visitorUserID);
$favoIcon = $Dot->Dot_GetSvgIcon('64');
$favType = 'favourite';
if($checkUserIsInFavouriteList){
  $favoIcon = $Dot->Dot_GetSvgIcon('65');
  $favType = 'infavourite';
}  
$visitCheckedStatus = '';
if($visitChecked == '0'){
   $visitCheckedStatus = 'notSeen';
}
?>
<div class="visitor_user_container" data-last="<?php echo $visitDataID;?>">
    <div class="user_w <?php echo $visitCheckedStatus;?> no<?php echo $visitorUserID;?>" style="background-image:url('<?php echo $VisitorUserAvatar;?>');">  
         <div class="user_in">
             <div class="user_inf">
                  <div class="see_profile hvr-underline-from-left sep" data-type="userfirstinfo" data-id="<?php echo $visitorUserID;?>"><div class="sp_i"><?php echo $Dot->Dot_SelectedMenuIcon('see_profle');?></div><?php echo $page_Lang['see_user_profile_in_popup'][$dataUserPageLanguage];?></div>
                  <div class="user_in_nm truncate"><?php echo $visitorUserFullName.' '.$visitorUserAge.' '.$verifiedBadge;?></div>
                  <div class="user_in_dist"><?php echo $dd;?></div>
             </div>
             <span class="user_inf_btns">
                  <div class="to_item_u right_to_color getuse" id="chatBox" data-id="<?php echo $visitorUserID;?>" data-user="<?php echo $visitorUserName;?>" data-page="normal" data-type="chat"><div class="to_item_icon"><?php echo $Dot->Dot_SelectedMenuIcon('messenger');?></div></div>
                  <div class="to_item_u tii makeFavourite mf_<?php echo $visitorUserID;?>" id="<?php echo $visitorUserID;?>" data-f="<?php echo $favType;?>"><div class="to_item_icon" id="f_v_<?php echo $visitorUserID;?>"><?php echo $favoIcon;?></div></div>
             </span>
         </div>
    </div>
</div> 



