<div class="filter_users waves-effect waves-light filus">
<div class="filter_users_icon"><?php echo $Dot->Dot_SelectedMenuIcon('filter_user');?></div>Filter search
</div>

<div class="fltered_users_list">

<?php  
   $distance = '10';  
   if($proSystemStatus == 1){  
	   if($dataUserProType == 1){    
		   $calculatedistance = $Dot->Dot_DistanceGlobalSrc($uid,$dataUserLatitude, $dataUserLongitude, $userOldSearchAgeStart, $userOldSearchAgeEnd, $userOldSearchDistance, $userOldSearchGender, $userOldSearchOnlineOfflineStatus, $userOldSearchAvatarStatus,$userOldSearchRelationShipStatus,$userOldSearchSexuality,$userOldSearchHeight,$userOldSearchWeight,$userOldSearchLifeStyle,$userOldSearchChildren,$userOldSearchSmokingHabit,$userOldSearchDrinkingHabit,$userOldSearchHairColor,$userOldSearchEyeColor,$userOldSearchBodyType); 
	   if($calculatedistance){ 
		  foreach($calculatedistance as $dist){
			  $distUsername = $dist['user_name'];
			  $distLat = $dist['ulat'];
			  $distLong = $dist['ulong'];
			  $dd = $dist['distance'];  
			  $userID = $dist['user_id'];
			  $userDistFullName = $dist['user_fullname'];
			  $distUserVerified = $dist['verified_user'];
			  $dataDistUserAvatar = $Dot->Dot_UserAvatar($userID, $base_url);
			  $verifiedBadge = '';
				if($distUserVerified == '1'){
				   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
				}
				$distUserBirtyDay = $dist['user_birthday'];
				$distUserBirtyMonth = $dist['user_birthmonth'];
				$distUserBirtyYear = $dist['user_birthyear'];  
				if(!empty($visitorUserBirtyYear) && !empty($visitorUserBirtyMonth) && !empty($visitorUserBirtyDay)){
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
   }else{
      echo '
	     <div class="youarenopro">
		     '.$page_Lang['become_a_pro_members_to_save_your_search_history'][$dataUserPageLanguage].'
		 </div>
	  ';
   }}else {
	   $calculatedistance = $Dot->Dot_DistanceGlobalSrc($uid,$dataUserLatitude, $dataUserLongitude, $userOldSearchAgeStart, $userOldSearchAgeEnd, $userOldSearchDistance, $userOldSearchGender, $userOldSearchOnlineOfflineStatus, $userOldSearchAvatarStatus,$userOldSearchRelationShipStatus,$userOldSearchSexuality,$userOldSearchHeight,$userOldSearchWeight,$userOldSearchLifeStyle,$userOldSearchChildren,$userOldSearchSmokingHabit,$userOldSearchDrinkingHabit,$userOldSearchHairColor,$userOldSearchEyeColor,$userOldSearchBodyType); 
	   if($calculatedistance){ 
		  foreach($calculatedistance as $dist){
			  $distUsername = $dist['user_name'];
			  $distLat = $dist['ulat'];
			  $distLong = $dist['ulong'];
			  $dd = $dist['distance'];  
			  $userID = $dist['user_id'];
			  $userDistFullName = $dist['user_fullname'];
			  $distUserVerified = $dist['verified_user'];
			  $dataDistUserAvatar = $Dot->Dot_UserAvatar($userID, $base_url);
			  $verifiedBadge = '';
				if($distUserVerified == '1'){
				   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
				}
				$distUserBirtyDay = $dist['user_birthday'];
				$distUserBirtyMonth = $dist['user_birthmonth'];
				$distUserBirtyYear = $dist['user_birthyear'];  
				if(!empty($visitorUserBirtyYear) && !empty($visitorUserBirtyMonth) && !empty($visitorUserBirtyDay)){
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
  }  }
?> 
 
</div>
<script type="text/javascript">

$(document).ready(function(){ 
$("body").on("click",".filus", function(){ 
	  if ($('div.search_user_filter_container').length === 0) {
		  var types = 'filterusers';
	      var data= 'f='+types;
	  $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: data, 
			beforeSend: function(){ 
			   $("body").append('<div style="position:absolute;bottom:0px;left:0px;width:100%;" class="sls"><span class="progress_blue" id="ccm"><span class="indeterminate"></span></span></div>');
			},
			success: function(html) {
				 $("body").append(html);
				 $(".sls").remove();
				 setTimeout(function() {
						$(".social_share_buttons_container").removeClass('openSocial');
					  }, 500);
			}
		}); 
	  }
});  
});
</script>