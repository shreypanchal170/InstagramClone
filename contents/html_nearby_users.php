<?php 
   $distance = '10';  
   $calculatedistance = $Dot->Dot_Distance($uid,$dataUserLatitude, $dataUserLongitude,$distance,$oldid);
   if($calculatedistance){
	  foreach($calculatedistance as $dist){
		  $distUsername = $dist['user_name'];
		  $distLat = $dist['ulat'];
		  $distLong = $dist['ulong'];
		  $dd = $dist['distance'];  
		  $userID = $dist['user_id'];
		  $userDistFullName = $dist['user_fullname'];
          $distUserVerified = $dist['verified_user'];
		  $sUprivateAccount = $dist['private_account'];
		  $followType ='uf';
		 if($sUprivateAccount == '0'){$followType = 'udf';}
		 
		  $dataDistUserAvatar = $Dot->Dot_UserAvatar($userID, $base_url);
		  $verifiedBadge = '';
			if($distUserVerified == '1'){
			   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
			}
			$distUserBirtyDay = $dist['user_birthday'];
			$distUserBirtyMonth = $dist['user_birthmonth'];
			$distUserBirtyYear = $dist['user_birthyear'];
			if(!empty($distUserBirtyYear) && !empty($distUserBirtyMonth) && !empty($distUserBirtyDay)){
			  $today = new DateTime();
			  $birthdate = new DateTime("".$distUserBirtyYear."-".$distUserBirtyMonth."-".$distUserBirtyDay."");
			  $interval = $today->diff($birthdate);
			  $distUserAge =  ','.$interval->format('%y');   
			}else{
			  $distUserAge = '';  
			} 
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
<?php
	  }
  } 
?> 