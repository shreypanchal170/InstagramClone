<div class="page_title bold"><?php echo $page_Lang['blocked_users'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_users" id="moreType" data-type="users">
       <?php 
	       $lastuID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
	       $GetUsers = $Dot->Dot_AllBlockedUsers($lastuID );
		   if($GetUsers){
		      foreach($GetUsers as $userData){
			      $dataUserID = $userData['user_id'];
				  $dataUserUserName = $userData['user_name'];
				  $dataUserFullName = $userData['user_fullname'];
				  $dataUserProfileStatus = $userData['user_status'];
				  $dataUserUserIP =  isset($userData['user_ip']) ? $userData['user_ip'] : NULL;
				  $CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserID, $base_url);
				  $CardDataUserCover = $Dot->Dot_UserCover($dataUserID, $base_url); 
				  $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$dataUserID);
				  $CalculateTheUserPost = $Dot->Dot_UserPostCount($dataUserID);
				  $CalculateTheFriends = $Dot->Dot_UserFriendsCount($dataUserID);
				  $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($dataUserID); 
				  $blockedNotBlocked ='<div class="button_general  border-radius remove_block_data_user" id="'.$dataUserID.'" data-u="'.$dataUserUserName.'" data-ip="'.$dataUserUserIP.'" data-type="unblockUserPopUp">'.$page_Lang['unblock'][$dataUserPageLanguage].'</div>';
				  include("html_users.php");
			   }
		   }else{
			   echo '<div class="no-founded"><div class="no-founded-title">No blocked User</div><div class="cloud_"><img src="'.$base_url.'admin/css/img/happy.png"></div></div>';
		   }
	   ?>
   </div>
</div>