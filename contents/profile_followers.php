<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php";
include_once "functions/get_profile.php";
$lastFriendID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
$FriendsArray=$Dot->Dot_AllUserFollowers($profileUserID, $lastFriendID); 
if($FriendsArray){
 foreach($FriendsArray as $FriendsFromData) { 
	  $friendID = $FriendsFromData['user_one'];
	  $FriendDataID = $FriendsFromData['friend_id'];
	  $CardDataUserID = $FriendsFromData['user_id']; 
	  $CardDataUserFullName = $Dot->Dot_UserFullName($friendID);
	  $CardDataUsername = $Dot->Dot_GetUserName($friendID);
	  $CardDataUserAvatar = $Dot->Dot_UserAvatar($friendID, $base_url);
	  $CardDataUserCover = $Dot->Dot_UserCover($friendID, $base_url); 
	  $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$friendID);
	  $CalculateTheUserPost = $Dot->Dot_UserPostCount($friendID);
	  $CalculateTheFriends = $Dot->Dot_UserFriendsCount($friendID);
	  $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($friendID); 
	  echo '
	  <div class="UserCardContainer body'.$FriendDataID.'" id="'.$FriendDataID.'" data-last="'.$FriendDataID.'">
	   <div class="m0NAq_friend">
		  <!--Cover STARTED-->
		  <div class="_pbwg8U_">
			 <div class="_jjzlbU_" style="background-image: url('.$CardDataUserCover.');">
				  <img src="'.$CardDataUserCover.'" class="_exPexU">
			 </div>
		  </div>
		  <!--Cover FINISHED-->
		  <!--Avatar STARTED-->
		  <div class="a4Ce_"> 
			  <div class="infoProfileAvatar">
				  <img src="'.$CardDataUserAvatar.'">
			  </div>
		   </div>
			  <!--Avatar FINISHED-->
			  <!--UserName and User Mention STARTED-->
			  <div class="userNameMention">
				<div class="userName"><a href="'.$base_url.'profile/'.$CardDataUsername.'">'.$CardDataUserFullName.'</a></div>
				<div class="userMention">@'.$CardDataUsername.'</div>
			  </div>
			  <!--UserName and User Mention FINISHED-->
			  <!--Tree Menu STARTED-->
			  <div class="cardMenuContainer">
				<div class="carProfileLink hvr-underline-from-center">
				  <a href="'.$base_url.'profile/'.$CardDataUsername.'">
				  <div class="carHeaderSum">'.$CalculateTheUserPost.'</div>
				  <div class="carHeaderText">'.$page_Lang['user_posts'][$dataUserPageLanguage].'</div>
				  </a>
				</div>
				<div class="carProfileLink hvr-underline-from-center">
				  <a href="'.$base_url.'profile/followers/'.$CardDataUsername.'">
				  <div class="carHeaderSum">'.$CalculateTheFollowers.'</div>
				  <div class="carHeaderText">'.$page_Lang['user_followers'][$dataUserPageLanguage].'</div>
				  </a>
				</div>
				<div class="carProfileLink hvr-underline-from-center">
				  <a href="'.$base_url.'profile/friends/'.$CardDataUsername.'">
				  <div class="carHeaderSum">'.$CalculateTheFriends.'</div>
				  <div class="carHeaderText">'.$page_Lang['user_friends'][$dataUserPageLanguage].'</div>
				  </a>
				</div>
			  </div>
			  <!--Tree Menu FINISHED-->
			</div>
			</div>
					  ';
 } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_followers_will_be_shown'][$dataUserPageLanguage].'</div>';
}
?>
