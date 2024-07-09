<?php 
  $SuggestedUserList = $Dot->Dot_SuggestionUserList($uid);
  if($SuggestedUserList){
	  $youmyKnowTour = $Dot->Dot_CheckTourSawBefore($uid, 1725) ? '<div style="position:absolute;width:100%;height:100%;z-index:2;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1725" data-tip="1725"></div>' : '';
      echo '<div class="uMnUsrS">'.$youmyKnowTour.'<div class="globalBoxHeader">'.$page_Lang['you_may_know_persons'][$dataUserPageLanguage].'</div><div class="suggestedBoxRight">';
	  foreach($SuggestedUserList as $sugUser){
		 $sUsername = $sugUser['user_name'];
		 $sFullName = $sugUser['user_fullname'];
		 $sUid= $sugUser['user_id'];
		 $sUprivateAccount = $sugUser['private_account'];
		 $sUserAvatar = $Dot->Dot_UserAvatar($sUid,$base_url); 
		 $sUserFollowerCount = $Dot->Dot_UserFollowersCount($sUid);
		 $followType ='uf';
		 if($sUprivateAccount == '0'){$followType = 'udf';}
		 echo '
		 <!--Suggested User STARTED-->
			<div class="suggestedUserBody" id="sgu6">
			  <div class="suggestedAvatar show_card" id="'.$sUid.'" data-user="'.$sUsername.'" data-type="userCard"><img src="'.$sUserAvatar.'" class="a0uk"></div>
			  <div class="suggestedNameFollower show-user-pro" data-pro="6" data-proid="mustafa">
				<div class="suggestedName"><a href="'.$base_url.'profile/'.$sUsername.'">'.$sFullName.'</a></div>
				<div class="suggestedFollower">'.$sUserFollowerCount.' '.$page_Lang['may_know_follower'][$dataUserPageLanguage].'</div>
			  </div>
			  <div class="suggestedFollow">
				<div class="friend_user icons friend_user_sug'.$sUid.' iconFollow" id="" data-type="'.$followType.'"  data-id="'.$sUid.'" data-get="friendSend" data-rel="'.$followType.'" data-page="suggestion"></div>
			  </div>
			</div>
		 <!--Suggested User FINISHED-->'; 	      
	  }
	  echo '</div></div>';
  }
?>