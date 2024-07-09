<?php 
include_once '../functions/control.php';
include_once '../functions/inc.php';  
$feedarray = array("moreLikedUser");
if(in_array($_POST['feed'],$feedarray) && isset($_POST['lastid']) && isset($_POST['pid'])){ 
   $feed = mysqli_real_escape_string($db, $_POST['feed']); 
   $likedPOSTID = mysqli_real_escape_string($db, $_POST['pid']); 
   /*Get Profile feed If user clicked from profile*/
   if($feed == 'moreLikedUser'){ 
	     $lasttID = isset($_POST['lastid']) ? $_POST['lastid'] : '';
		 if($feed == 'moreLikedUser'){
			  $getpLikedUsers=$Dot->Dot_PostLikedUsersMore($likedPOSTID, $lasttID); 
			  if($getpLikedUsers){
			   
			   
			  foreach($getpLikedUsers as $postL){
					 $likedUserName = $postL['user_name'];
					 $likedUserFullName = $postL['user_fullname'];
					 $liked_userID = $postL['user_id'];
					 $liked_id = $postL['like_id'];
					 $CardPAccount = $postL['private_account'];
					 $cfollowType ='uf';
					 if($CardPAccount == '0'){$cfollowType = 'udf';} 
					  $likedUserAvatar = $Dot->Dot_UserAvatar($liked_userID, $base_url); 
					  $followStatusicon = 'iconFollow';
					  $followButton = '';
					  $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$liked_userID); 
						if($CheckFriendStatus == 'me'){}
						if($CheckFriendStatus == ''){ 
							$followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$liked_userID.' '.$followStatusicon.'" id="friend_user_sug'.$liked_userID.'" data-type="'.$cfollowType.'" data-id="'.$liked_userID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						}
						if($CheckFriendStatus == 'flwr'){
							$cfollowType ='uun';
							$followStatusicon = 'iconFollowSended';
							$followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$liked_userID.' '.$followStatusicon.'" id="friend_user_sug'.$liked_userID.'" data-type="'.$cfollowType.'" data-id="'.$liked_userID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						}
						if($CheckFriendStatus == 'fri'){
							$cfollowType ='uun';
							$followStatusicon = 'iconFollowSended';
							$followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$liked_userID.' '.$followStatusicon.'" id="friend_user_sug'.$liked_userID.'" data-type="'.$cfollowType.'" data-id="'.$liked_userID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						}
				             echo '
						   <div class="suggestedUserBody theluser" id="sgu'.$liked_userID.'" data-last="'.$liked_id.'">
                               <div class="suggestedAvatar show_card" id="'.$liked_userID.'" data-user="'.$likedUserName.'" data-type="userCard"><img src="'.$likedUserAvatar.'" class="a0uk"></div>
                               <div class="suggestedNameFollower show-user-pro" data-pro="'.$liked_userID.'" data-proid="'.$likedUserName.'">
                                  <div class="user_viewerName">'.$likedUserFullName.'</div>
                               </div>
                               '.$followButton.'
                         </div>
						';
				 }
		  }
		   }
   }
}
?>