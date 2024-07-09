<?php 
include_once '../functions/inc.php';  
include_once "../functions/clear.php"; 
include_once "../api/send_push_notification.php"; 
require_once '../functions/vendor/autoload.php';
$Activitytype = array("likePost", "favouritePost","userCard", "userComment","likeComment","moreComment","deleteComment","editComment","deletePost","getReport","reportThisPost","deleteImage", "allImages", "interested", "newInterest","personalInformation","profileInformation","userbusiness","usernumber","setNewPas","notification","security","friendSend","chat","getMessage","getNewMessage","getNewNotification","updatenot","notifRead","ac_rem","more_explore","more_friends","more_followers","more_favourites","more_feeds","more_profilePosts","more_text","more_image","more_video","more_link","more_music","showPostSingle","more_tags","more_stories","searchChatFriend","friendlistchat","lang","openLangs","showReportedPostSingle","dayNightMode","fastEmoji","fastK","searchPeople","search_explore","usearched","deletestory","wi","winex","svieWers","smen","getStickers","getGifs","jsticker","wsticker","jgif","comstatus","editPost","editthispost","profileBackground","bg_oc","bgAudio","bg_aoc","likedUsers","deleteIadsmage","createadvertise","buycredit","showAdsAd","editAdsAd","deleteAdsAd","editUpdateAds","deleteAdvertisement","adacu","advertisementDetails","editmyaddetails","deletesearcho","deleteconversation","createadadvertise","ads","paypalid","moneyfee","afterscroll","stickerNew","GifNew","deleteSticker","deleteGif","chageProfileDesign","saveNewDesign","selfDestruction","setIt","socialshare","chbgcolor","chiccolor","chtxcolor","chfnt","searchGif","commentGif","vote_which","newEvent","createEvent","eventCategories","evetCovers","inviteFriendList","inviteUserThisEvent","deleteThisEvent","more_events","editEvent","updateEvent","ugoing","uinterested","dgoing","duinterested","shareonWall","more_ev","maincustom","more_message","expanded","re_share","share_accept","Unlike_Post","feelings","translateme","productCategories","productDetails","fastProductQuestion","buyMarketTheme","boost_product","buyProductBoost","more_boosted","product_stat","display_status","more_product","search_product","product_booststat","modeSlider","mtMode","more_explore_text","more_explore_img","more_explore_vid","more_explore_aud","more_explore_fil","more_explore_gif","more_explore_watermarks","more_explore_which","more_explore_bfaf","more_mt","v_mail","new_post_create","choosepament","payment","calculate_earning","paypalwithdrawal","ibanwithdrawal","howtousehome","convertpointtodolar","transferbalance","down","deletemyaccount","infavourite","favourite","userfirstinfo","afterads","filterusers","srcfltyp","promem","more_visitors","more_whofavourite","addToCard","delete_this_prop","select_payment_method","shoppingInformation","patatdoor","userCountryStateCity","thiscountry","thiscity","thisstates","sendCargoStatus","cargostatusupdate","askdeliverystat","yesigotit","donateFrm","o_f_o_n","afterscrolltrendtags","afterscrollGoogleAds","afterscrollmyKnowuser","securityMessage","newMarket","createMyStore","howtouse","cancelthistour","sawa","miniChatBox","yres","whcnse","chngws");
if(isset($_POST['f']) && in_array($_POST['f'], $Activitytype)){
	$activity = mysqli_real_escape_string($db, $_POST['f']); 
	// Vote Which Type Post
	if($activity == 'vote_which'){  
		if(isset($_POST['post']) && isset($_POST['v_id'])){
		     $vodedPostID = mysqli_real_escape_string($db, $_POST['post']);  
			 $vodedImageID = mysqli_real_escape_string($db, $_POST['v_id']); 
			 $dataSaveVote = $Dot->Dot_VoteWhichPost($uid, $vodedPostID, $vodedImageID);
			 if($dataSaveVote){ 
				    $voteCount = $Dot->Dot_CountVoteByID($vodedImageID);
					$allVotesCount = $Dot->Dot_CountVoteByallID($vodedPostID);  
					$percent = $voteCount/$allVotesCount;
					$percent_friendly = number_format( $percent * 100 ); 
					$wk = explode(",", $dataSaveVote); 
					foreach($wk as $wl) {
						 // Get the uploaded image ids
					   $whichImagesFromDatas=$Dot->Dot_GetUploadImageID($wl);
					   if($whichImagesFromDatas) {
						   $whichImageIDm = $whichImagesFromDatas['image_id'];  
						   if($whichImageIDm !=$vodedImageID){
						           $voteCounta = $Dot->Dot_CountVoteByID($whichImageIDm);
									$allVotesCounta = $Dot->Dot_CountVoteByallID($vodedPostID);  
									$percenta = $voteCounta/$allVotesCounta;
									$percent_friendlya = number_format( $percenta * 100 ); 
						   }
						    $likers_name = $Dot->Dot_UserFullName($uid);
						    $authors_data = $Dot->Dot_GetUserDetailsByPostId($vodedPostID);
							//print_r($authors_data);
							$puser_id = $authors_data['user_id_fk'];
							$post_id = $authors_data['user_post_id'];
							$slugURL = $authors_data['slug'];
							$device_id = $authors_data['device_id'];
							$device_type = $authors_data['device_type'];
							$deviceKeyOneSignal = $authors_data['device_key'];
							if ($puser_id != $uid) { 
							      if($pointVoteStatus == '1' && $pointSystemStatus == '1' && $logedinUserdailyTotalPoint < $maxPointDaily){$addPoint = $Dot->Dot_AddPoint($uid, 'vote', $pointVote,$vodedPostID);} 
								if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
									$likedYourPostTitle = $likers_name.' Voted your post!';
									$likedPostNotificationBody = 'Click to see the message that this message came from.';
									$url = $base_url . "status/" . $slugURL;
									$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
								}
								//send push notification here
								$title = "Oobenn";
								$body = $likers_name . " liked your post.";
								$url = $base_url . "status/" . $slugURL;
								//echo $url;
								sendPushNotification($device_id, $device_type, $body, $title, $url);
		
								//END OF PUSH NOTIFICATION CODE FOR POST LIKE
							}
					   }
					}  
						
					$data = array(
					  'id_one' => $vodedImageID, 
					  'first_percent' => $percent_friendly,
					  'second_percent' => $percent_friendlya,
					  'usum' => $allVotesCounta 
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 }else{
			     $data = array(
					  'note' => 'Something Wrong'
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 }
		}
	}
	//Like and Unlike Post 
	if($activity == 'likePost'){
		$postLikeType = array("p_like","p_unlike");
		$postNotType = array("p_text","p_image","p_link","p_video","p_audio","p_avatar","p_cover","p_gif","p_location","p_watermark","p_which","p_event","p_page","p_blog","p_group","p_product","p_bfaf");
		if(isset($_POST['post']) && in_array($_POST['t'], $postLikeType) && in_array($_POST['pt'], $postNotType)){
			$likedPostID = mysqli_real_escape_string($db, $_POST['post']); 
			$postLikeTypeStatus = mysqli_real_escape_string($db, $_POST['t']);
			$postNotTypeStatus = mysqli_real_escape_string($db, $_POST['pt']);
			// Like Post
			if($postLikeTypeStatus == 'p_like'){
				$dataSaveLike = $Dot->Dot_LikePost($uid, $likedPostID,$postNotTypeStatus);
				if($dataSaveLike){
					//SEND PUSH NOTIFICATION CODE	 
					$likers_name = $Dot->Dot_UserFullName($uid);
					//echo $likers_name; 
					//get post author's user id and device_id
					$authors_data = $Dot->Dot_GetUserDetailsByPostId($likedPostID);
					//print_r($authors_data);
					$puser_id = $authors_data['user_id_fk'];
					$post_id = $authors_data['user_post_id'];
                    $slugURL = $authors_data['slug'];
					$device_id = $authors_data['device_id'];
					$device_type = $authors_data['device_type'];
                    $deviceKeyOneSignal = $authors_data['device_key'];
					if ($puser_id != $uid) {
						if($pointVoteStatus == '1' && $pointSystemStatus == '1' && $logedinUserdailyTotalPoint < $maxPointDaily){$addPoint = $Dot->Dot_AddPoint($uid, 'like', $pointLike,$post_id);} 
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
					        $likedYourPostTitle = $likers_name.' liked your post!';
					        $likedPostNotificationBody = 'Click to see the message that this message came from.';
					        $url = $base_url . "status/" . $slugURL;
					        $Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
					    }
						//send push notification here
						$title = "Oobenn";
						$body = $likers_name . " liked your post.";
						$url = $base_url . "status/" . $slugURL;
						//echo $url;
						sendPushNotification($device_id, $device_type, $body, $title, $url);

						//END OF PUSH NOTIFICATION CODE FOR POST LIKE
					}
					echo $dataSaveLike;
				}else{
					echo '200';
				}
			}  
			// Unlike Post
			if($postLikeTypeStatus == 'p_unlike'){
				$dataRemoveLike = $Dot->Dot_UnLikePost($uid, $likedPostID,$postNotTypeStatus);
				if($pointSystemStatus == '1'){$addPoint = $Dot->Dot_RemovePoint($uid, 'like', $pointLike,$likedPostID);}
				if($dataRemoveLike || $dataRemoveLike == '0'){
					echo $dataRemoveLike;
				} 
			}  
		}
	}
	// Direct Unlike Post
	if($activity == 'Unlike_Post'){
	    $postLikeType = array("unliked","unlike");
		$postNotType = array("p_text","p_image","p_link","p_video","p_audio","p_avatar","p_cover","p_gif","p_location","p_watermark","p_which","p_event","p_page","p_blog","p_group","p_bfaf");
		if(isset($_POST['post']) && in_array($_POST['t'], $postLikeType) && in_array($_POST['pt'], $postNotType)){
			$likedPostID = mysqli_real_escape_string($db, $_POST['post']); 
			$postLikeTypeStatus = mysqli_real_escape_string($db, $_POST['t']);
			$postNotTypeStatus = mysqli_real_escape_string($db, $_POST['pt']);
			if($postLikeTypeStatus == 'unlike'){
				$dataSaveUnlikedPost = $Dot->Dot_UnlikeThisPost($uid, $likedPostID,$postNotTypeStatus);
				if($dataSaveUnlikedPost){
				    echo $dataSaveUnlikedPost;
				}
			}
			if($postLikeTypeStatus == 'unliked'){ 
				$dataRemoveLike = $Dot->Dot_UserUnLikedPost($uid, $likedPostID);   
				if(is_numeric($dataRemoveLike) && $dataRemoveLike >= 0){
				    echo $dataRemoveLike;
				}
			}
		}
	}
    // Add and Remove Favourite Post
	if($activity == 'favouritePost'){
	    $postFavType = array("ad_fav","rem_fav");
		// Ad favourite List
		if(isset($_POST['post']) && in_array($_POST['f_t'], $postFavType)){
	        $FavPostID = mysqli_real_escape_string($db, $_POST['post']); 
			$postFavouriteTypeStatus = mysqli_real_escape_string($db, $_POST['f_t']);
			if($postFavouriteTypeStatus == 'ad_fav'){
				$dataSaveFavorite = $Dot->Dot_AdFavouritePost($uid, $FavPostID);
				if($dataSaveFavorite){
					echo $dataSaveFavorite;
				}else{
					echo '200';
				}
			}  
			if($postFavouriteTypeStatus == 'rem_fav'){
				$dataRemoveFavorite = $Dot->Dot_RemoveFavouritePost($uid, $FavPostID);
				if($dataRemoveFavorite){
					echo $dataRemoveFavorite;
				}else{
					echo '200';
				}
			}
		}
	}
    //User Hover Card
	if($activity == 'userCard'){
	    if(isset($_POST['card']) && isset($_POST['user'])){
			  $CardUserID = mysqli_real_escape_string($db, $_POST['card']);
			  $CardUserName = mysqli_real_escape_string($db, $_POST['user']);
			  $GetUserDetailsFrom = $Dot->Dot_GetUserDetailsForCard($CardUserID, $CardUserName);
			  if($GetUserDetailsFrom){
				 foreach($GetUserDetailsFrom as $dataCardUser){
					  $CardDataUserID = $dataCardUser['user_id'];
				      $CardDataUsername = $dataCardUser['user_name'];
					  $CardDataUserFullName = $dataCardUser['user_fullname'];
					  $CardDataUserProfileWord = $dataCardUser['user_profile_word'];
					  $CardPrivateAccount = $dataCardUser['private_account'];
					  $CardUserIsPro = $dataCardUser['pro_user_type'];
					  $CardUserIsVerify = $dataCardUser['verified_user'];
					  $vrfIcon ='';
					  $prfIcon ='';
					  if($CardUserIsVerify == 1){
						   $vrfIcon = '<span class="mrEK_ Szr5J coreSpriteVerifiedBadge icons" style="width:18px;height:18px; display:inline-block;" title="verified"></span>';
					  }
					  if($CardUserIsPro == 1){
					      $prfIcon = '<span class="prmem">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
					  }
					  $cfollowType ='uf';
		              if($CardPrivateAccount == '0'){$cfollowType = 'udf';}
					  $CardDataUserAvatar = $Dot->Dot_UserAvatar($CardDataUserID, $base_url);
					  $CardDataUserCover = $Dot->Dot_UserCover($CardDataUserID, $base_url); 
					  $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$CardDataUserID);
					  $CalculateTheUserPost = $Dot->Dot_UserPostCount($CardDataUserID);
					  $CalculateTheFriends = $Dot->Dot_UserFriendsCount($CardDataUserID);
					  $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($CardDataUserID);
					  $followButton = '';
					  $UserCardProfileWord = '';
					  $followStatusicon = 'iconFollow';
					  if($CheckFriendStatus == 'me'){}
					  if($CheckFriendStatus == ''){
						  $followButton = '<span class="wmtNn" style="margin-right:-2px;margin-top:-2px;"><div class="friend_user icons friend_user_sug'.$CardDataUserID.' '.$followStatusicon.'" id="friend_user_sug'.$CardDataUserID.'" data-type="'.$cfollowType.'"  data-id="'.$CardDataUserID.'" data-get="friendSend" data-rel="'.$cfollowType.'" data-page="suggestion"></div></span>';
					  }
					  if($CheckFriendStatus == '1'){
						  $cfollowType ='uun';
						  $followStatusicon = 'iconFollowSended';
						  $followButton = '<span class="wmtNn" style="margin-right:-2px;margin-top:-2px;"><div class="friend_user icons friend_user_sug'.$CardDataUserID.' '.$followStatusicon.'" id="friend_user_sug'.$CardDataUserID.'" data-type="'.$cfollowType.'"  data-id="'.$CardDataUserID.'" data-get="friendSend" data-rel="'.$cfollowType.'" data-page="suggestion"></div></span>';
					  }
					  if($CheckFriendStatus == 'fri'){
						  $cfollowType ='uun';
						  $followStatusicon = 'iconFollowSended';
						  $followButton = '<span class="wmtNn" style="margin-right:-2px;margin-top:-2px;"><div class="friend_user icons friend_user_sug'.$CardDataUserID.' '.$followStatusicon.'" id="friend_user_sug'.$CardDataUserID.'" data-type="'.$cfollowType.'"  data-id="'.$CardDataUserID.'" data-get="friendSend" data-rel="'.$cfollowType.'" data-page="suggestion"></div></span>';
					  }
					  if($CardDataUserProfileWord){
						  $UserCardProfileWord = '<p class="profileCarddescription">'.$CardDataUserProfileWord.'</p>';
					  }
					  echo '
					     <div class="carDetailsContainer">
						     <div class="profileCardHeader" style="background-image:url('.$CardDataUserCover.');"></div>
							 <a href="'.$base_url.'profile/'.$CardDataUsername.'"><div class="profileCardAvatar" style="background-image:url('.$CardDataUserAvatar.');">'.$prfIcon.'</div></a>
							 <div class="profileCardinfo">
								<a href="'.$base_url.'profile/'.$CardDataUsername.'"><div class="userName" style="display:inline-block;">'.$CardDataUserFullName.$vrfIcon.'</div></a>
								<a href="'.$base_url.'profile/'.$CardDataUsername.'"><div class="userMention">@'.$CardDataUsername.'</div></a>
								'.$UserCardProfileWord.'
							 </div>
							 <div class="cardMenuContainer animwrap">
								<div class="carProfileLink caranim hvr-underline-from-center">
								  <a href="'.$base_url.'profile/'.$CardDataUsername.'">
								  <div class="carHeaderSum">'.$CalculateTheUserPost.'</div>
								  <div class="carHeaderText">'.$page_Lang['user_posts'][$dataUserPageLanguage].'</div>
								  </a>
								</div>
								<div class="carProfileLink caranim hvr-underline-from-center">
								  <a href="'.$base_url.'profile/followers/'.$CardDataUsername.'">
								  <div class="carHeaderSum">'.$CalculateTheFollowers.'</div>
								  <div class="carHeaderText">'.$page_Lang['user_followers'][$dataUserPageLanguage].'</div>
								  </a>
								</div>
								<div class="carProfileLink caranim hvr-underline-from-center">
								  <a href="'.$base_url.'profile/friends/'.$CardDataUsername.'">
								  <div class="carHeaderSum">'.$CalculateTheFriends.'</div>
								  <div class="carHeaderText">'.$page_Lang['user_friends'][$dataUserPageLanguage].'</div>
								  </a>
								</div>
							  </div>
							  <div class="profileCardLink_followBtn">
							      <span class="fr66n" style="margin-left: 0px; color:#ffffff;font-size:13px;font-weight:600;"><a href="'.$base_url.'profile/'.$CardDataUsername.'">'.$CardDataUserFullName.'</a></span>
								  '.$followButton.'
							  </div>
						 </div>
					  ';
				 }
			  }
		}
	}
	
	/*Fast Answer Emoji List*/
	if($activity == 'fastEmoji'){
	     $emoticonList = $Dot->Dot_FastEmojiList();
		 if($emoticonList){
			 $pid = mysqli_real_escape_string($db, $_POST['c']); 
			 $answerPostType = mysqli_real_escape_string($db, $_POST['pt']);
	         foreach($emoticonList as $fast_answer){
		         $answerID = $fast_answer['emoji_id'];
				 $answerKey = $fast_answer['emoji_key'];
				 $answeremojiStyle = $fast_answer['emoji_style'];
				 $answerEmoji = $fast_answer['image'];
				 echo '<div class="fast_icon" id="fast_answer_with_emoji" style="background-image:url('.$base_url.'uploads/fastEmojis/'.$answerEmoji.');" data-fastkey="'.$answerKey.'" data-id="'.$pid.'"  data-post="'.$answerPostType.'" data-type="fastK"></div>';
			 }
		 }else{
		   echo '1';
		 }
	}
	/*Fast Answer Send and Preview*/
	if($activity == 'fastK'){
	    $fastKey = mysqli_real_escape_string($db, $_POST['fastAnswer']); 
		$PostID = mysqli_real_escape_string($db, $_POST['this']);
		$UserCreatedType = mysqli_real_escape_string($db, $_POST['dp']);
		$UserCommentsData = $Dot->Dot_SaveSendedFastAnswer($uid,$PostID,$fastKey,$UserCreatedType);
		if($UserCommentsData){
		    include("../contents/post_comments.php");
		}
	}
	//Insert Like Comment
	if($activity == 'likeComment'){
		$postLikeType = array("c_like","c_unlike"); 
		if(isset($_POST['comment']) && in_array($_POST['t'], $postLikeType)){
			$likedCommentID = mysqli_real_escape_string($db, $_POST['comment']); 
			$postLikeTypeStatus = mysqli_real_escape_string($db, $_POST['t']); 
			// Like Post
			if($postLikeTypeStatus == 'c_like'){
				$dataSaveLike = $Dot->Dot_LikeComment($uid, $likedCommentID);
				if($dataSaveLike){
					//SEND PUSH NOTIFICATION CODE	

					$likers_name = $Dot->Dot_UserFullName($uid);
					//echo $likers_name;

					//get post author's user id and device_id
					$authors_data = $Dot->Dot_GetUserDetailByCommentId($likedCommentID);
					//print_r($authors_data);
					$puser_id = $authors_data['user_id_fk'];
					$post_id = $authors_data['user_post_id'];
                    $slugURL = $Dot->GetUrl($post_id);
					$device_id = $authors_data['device_id'];
					$device_type = $authors_data['device_type'];
                    $deviceKeyOneSignal = $authors_data['device_key'];
				   if ($puser_id != $uid) {
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
							$likedYourPostTitle = $likers_name.' Liked your comment';
							$likedPostNotificationBody = 'Click to see the message that this message came from.';
							$url = $base_url . "status/" . $slugURL;
							$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
						}
						//send push notification here
						$title = "Oobenn";
						$body = $likers_name . " liked your post.";
						$url = $base_url . "status/" . $slugURL;
						//echo $url;
						sendPushNotification($device_id, $device_type, $body, $title, $url);

						//END OF PUSH NOTIFICATION CODE FOR POST LIKE
					}
					echo $dataSaveLike;
				}else{
					echo '200';
				}
			}  
			// Unlike Post
			if($postLikeTypeStatus == 'c_unlike'){
				$dataRemoveLike = $Dot->Dot_UnLikecomment($uid, $likedCommentID);
				if($dataRemoveLike || $dataRemoveLike == '0'){
					echo $dataRemoveLike;
				}else{
					echo '200';
				}
			}  
		}
	}
	//Show More Comments
	if($activity == 'moreComment'){
	    if(isset($_POST['id'])){
		   $allCommentsForThisID = mysqli_real_escape_string($db, $_POST['id']);
		   $UserMoreCommentsData =  $Dot->Comments($allCommentsForThisID, 0);  
		   if($UserMoreCommentsData){
			    foreach($UserMoreCommentsData as $UserCommentsData){
                    include("../contents/post_comments.php");
                }
		   }
		}
	}
	// DeleteComment
	if($activity == 'deleteComment'){
	   if(isset($_POST['comment']) && isset($_POST['ui'])) {
		   	  $deleteCommentID = mysqli_real_escape_string($db, $_POST['comment']);
			  $ownerUid = mysqli_real_escape_string($db, $_POST['ui']);
			  $getPostID = $Dot->Dot_UserPostIDGetFromUserComment($uid, $deleteCommentID);
			  $deleteThisComment = $Dot->Dot_DeleteComment($deleteCommentID,$ownerUid);
			  if($pointSystemStatus == '1'){$Dot->Dot_RemovePoint($uid, 'comment', $pointPost,$getPostID);}
			  if($deleteThisComment){
				  echo '1';
			  }else{
			     echo '2';
			  }
	   }
	}
	//Comment Edit
	if($activity == 'editComment'){
	   if(isset($_POST['post']) && isset($_POST['comment']) && isset($_POST['c_id'])){
	       $CommentEditedID = mysqli_real_escape_string($db, $_POST['post']);
		   $CommentEditedText = mysqli_real_escape_string($db, $_POST['comment']);
		   $commentEditedPostID = mysqli_real_escape_string($db, $_POST['c_id']);
		   $EditThisComment = $Dot->Dot_EditCommentInsert($CommentEditedID,$commentEditedPostID,$CommentEditedText,$uid);
		   if($EditThisComment){
		      echo $EditThisComment;
		   }
	   }
	}
	//Delete Post
	if($activity == 'deletePost'){
       if(isset($_POST['u']) && isset($_POST['this'])){
	      $deleteThisPost = mysqli_real_escape_string($db, $_POST['this']);
		  $user = mysqli_real_escape_string($db, $_POST['u']);
		  if($pointSystemStatus == '1'){$DeletePoint = $Dot->Dot_RemovePoint($uid, 'post', $pointPost,$deleteThisPost);}
		  $DeleteThisPostFromData = $Dot->Dot_DeletePost($uid, $deleteThisPost);
		  if($DeleteThisPostFromData){
		      echo '1';
		  } 
	   }
	}
	//Get Report Post Popup
	if($activity == 'getReport'){
	    if(isset($_POST['post']) && isset($_POST['u']) && isset($_POST['id'])){
	          $reportedPostID = mysqli_real_escape_string($db, $_POST['post']);
			  $reportedUserName = mysqli_real_escape_string($db, $_POST['u']);
			  $reportedUserID = mysqli_real_escape_string($db, $_POST['id']);
			  $CheckUserandPostInData = $Dot->Dot_GetPopUp($reportedPostID, $reportedUserName, $reportedUserID);
			  if($CheckUserandPostInData == 1){
			         echo '
					    <div class="reportPostContainer">
						    <div class="closeReport">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div>
							<div class="reportPos_Wrap">
							   <div class="reportPos-modal-middle">
									<div class="reportTextTitle">'.$page_Lang['report_this'][$dataUserPageLanguage].'</div>
									<div class="reporTextInfo">'.$page_Lang['report_info'][$dataUserPageLanguage].' </div>
									<div class="reportQuestion">'.$page_Lang['what_is_wrong'][$dataUserPageLanguage].'</div>
									<div class="repor_item_List">
									   <div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-1" value="76" name="report"><label for="ckbx-circle-2-1"></label></div>
											  <label for="ckbx-circle-2-1"><div class="rptype">'.$page_Lang['report_one'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-2" value="77" name="report"><label for="ckbx-circle-2-2"></label></div>
											  <label for="ckbx-circle-2-2"><div class="rptype">'.$page_Lang['report_two'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-3" value="78" name="report"><label for="ckbx-circle-2-3"></label></div>
											  <label for="ckbx-circle-2-3"><div class="rptype">'.$page_Lang['report_tree'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-4" value="79" name="report"><label for="ckbx-circle-2-4"></label></div>
											  <label for="ckbx-circle-2-4"><div class="rptype">'.$page_Lang['report_four'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-5" value="80" name="report"><label for="ckbx-circle-2-5"></label></div>
											  <label for="ckbx-circle-2-5"><div class="rptype">'.$page_Lang['report_five'][$dataUserPageLanguage].'</div></label>
											</div> 
											<div class="reportQuestion">'.$page_Lang['block_the_reporter'][$dataUserPageLanguage].'</div>
											<div class="report-section">
											   <div class="switch"><label>'.$page_Lang['no'][$dataUserPageLanguage].'<input type="checkbox" id="block_user" name="block_user" value="0"><span class="lever"></span>'.$page_Lang['yes'][$dataUserPageLanguage].'</label></div>
											</div>
									</div>
									<div class="report_Button" data-un="'.$reportedUserName.'" data-ui="'.$reportedUserID.'" data-p="'.$reportedPostID.'" data-type="reportThisPost"><span class="flag">Flag</span></div>
							   </div>
							</div>
						</div>
					 ';
			  }
		}
	}
	//Report the Post from admin
	if($activity == 'reportThisPost'){ 
	     $reportOrNotReport = array("0","1");
		 if(isset($_POST['note']) && isset($_POST['user']) && isset($_POST['i']) && isset($_POST['pi']) && in_array($_POST['q'], $reportOrNotReport)){
		      $reportNote = mysqli_real_escape_string($db, $_POST['note']);
			  $reportedUserName = mysqli_real_escape_string($db, $_POST['user']);
			  $reportedUID = mysqli_real_escape_string($db, $_POST['i']);
			  $reportedPostID = mysqli_real_escape_string($db, $_POST['pi']);
			  $blockuser = mysqli_real_escape_string($db, $_POST['q']);
			  $sendBlock = $Dot->Dot_SendReportAndBlockUser($reportNote, $reportedUserName, $reportedUID, $reportedPostID, $blockuser,$uid);
			  if($sendBlock){
				 echo '1';
			  }else{
			     echo '2';
			  }
		 }
    }
	// Delete Uploaded Image Before Send Data
	if($activity == 'deleteImage'){
		if(isset($_POST['image'])){
		    $imageID = mysqli_real_escape_string($db, $_POST['image']);
			$deleteThisImageID = $Dot->Dot_DeleteImagePostFromDataBeforeSend($uid, $imageID); 
			 if($deleteThisImageID){
				 echo $deleteThisImageID;
			 }
		} 
	}
	// Get Images From Data
	if($activity == 'allImages'){ 
	    if(isset($_POST['p']) && isset($_POST['u']) && isset($_POST['d'])){
		     $postID = mysqli_real_escape_string($db, $_POST['p']);
			 $postUserName = mysqli_real_escape_string($db, $_POST['u']);
			 $postOwnerID = mysqli_real_escape_string($db, $_POST['d']);
			 $getUserPostedImagesFromData = $Dot->Dot_GetUserImages($postID, $postUserName, $postOwnerID);
			 if($getUserPostedImagesFromData){
				 $im = explode(",", $getUserPostedImagesFromData);
				 echo '<div class="lightBoxContainer"><div class="closeLightBox"></div><div class="lightBoxMiddle"><div class="lightBoxImages">';
				 foreach($im as $a) {
					// Get the uploaded image ids
				   $postedImage=$Dot->Dot_GetUploadImageID($a);
				   if($postedImage) {
					  // The path to be parsed
					  $final_image=$base_url."uploads/images/".$postedImage['uploaded_image']; 
					  echo '<img src="'.$final_image.'" class="lightBoximage materialboxed">';
					} 
				 } 
				 echo '</div></div></div>';
			 }
		}
	}
	//Get User Interest List
	if($activity == 'interested'){
	    $CheckUserIsExist = $Dot->Dot_CheckUserIDexist($uid);
		if($CheckUserIsExist){
			 include_once("../contents/interestList.php");
		}
	}
	//Save New User Interested Item
	if($activity == 'newInterest') { 
		$selectedUnSelected = array("select","unselect"); 
	    if(isset($_POST['this']) && isset($_POST['with']) && in_array($_POST['ty'] , $selectedUnSelected)){
		     $interestType = mysqli_real_escape_string($db, $_POST['this']);
			 $interesteddataValue = mysqli_real_escape_string($db, $_POST['with']);
			 $selectedType = mysqli_real_escape_string($db, $_POST['ty']);
			 if($selectedType == 'select'){
			     $saveThisInterest = $Dot->Dot_SaveInterestedValue($uid, $interestType,$interesteddataValue);
				 if($saveThisInterest){
					 echo '1';
				 }
			 }
			 //Remove Interest
			 if($selectedType == 'unselect'){
			     $RemoveThisInterest = $Dot->Dot_RemoveInterestedValue($uid, $interestType,$interesteddataValue);
				 if($RemoveThisInterest){
					 echo '1';
				 }
			 }
		}
	}
	//Save Personal Information
	if($activity == 'personalInformation') { 
	     $genderArray = array("0","male","female");
		 $SexualityArray = array("unspecified","bisexual","gay","open_minded","heterosexual");
		 $LifeStyleArray = array("unspecified","myself","with_my_family","student_residence","with_my_darling","with_my_roommate");
		 $userChildrenArray = array("unspecified","has_grown","already_have","no_never","one_day");
		 $userSmokeHabitArray = array("unspecified","i_smoke_a_lot","i_hate_smoking","i_do_not_like","i_am_a_social_drinker","i_smoke_occasionally");
		 $userDrinkingHabitArray = array("unspecified","i_drink_socially","i_do_not_drink","i_am_against_drink","i_drink_alot");
		 $userBodyTypeArray = array("unspecified","athletic","average_body","chubby","muscle","big_and_built","rickety");
		 $userHairColorArray = array("unspecified","bald","black_hair","blonde_hair","brown_hair","painted_hair","red_hair","been_shaved","white_hair");
		 $userEyeColorArray = array("unspecified","black_eye","blue_eye","brown_eye","green_eye","hazel_eye","other_eye_color");
		 $userRelationShip = array("unspecified","relationship_status_single","relationship_in_relationship","relationship_status_engaged","relationship_status_married","relationship_status_civil_union","relationship_status_open","relationship_status_complicated","relationship_status_separated","relationship_status_divorced","relationship_status_widoved");
	     if(isset($_POST['height']) && isset($_POST['weight']) && in_array($_POST['gen'],$genderArray) && in_array($_POST['sex'], $SexualityArray) && in_array($_POST['life'],$LifeStyleArray) && in_array($_POST['child'],$userChildrenArray) && in_array($_POST['smoke'],$userSmokeHabitArray) && in_array($_POST['drink'],$userDrinkingHabitArray) && in_array($_POST['body'],$userBodyTypeArray) && in_array($_POST['hair'],$userHairColorArray) && in_array($_POST['eye'],$userEyeColorArray) && in_array($_POST['relation'],$userRelationShip)){
			 $userGender = mysqli_real_escape_string($db, $_POST['gen']);
			 $userSexuality = mysqli_real_escape_string($db, $_POST['sex']);
			 $userHeight = mysqli_real_escape_string($db, $_POST['height']);
			 $userWeight = mysqli_real_escape_string($db, $_POST['weight']);
			 $userLifeStyle = mysqli_real_escape_string($db, $_POST['life']);
			 $userChildren = mysqli_real_escape_string($db, $_POST['child']);
			 $userSmokeHabit  = mysqli_real_escape_string($db, $_POST['smoke']);
			 $userDrinkingHabit = mysqli_real_escape_string($db, $_POST['drink']);
			 $userBodyType = mysqli_real_escape_string($db, $_POST['body']);
			 $userHairColor = mysqli_real_escape_string($db, $_POST['hair']);
			 $userEyeColor = mysqli_real_escape_string($db, $_POST['eye']);	
			 $userRelationShips = mysqli_real_escape_string($db, $_POST['relation']);			 
			 $savePersonalInformation = $Dot->Dot_SaveUserPersonalInformation($uid,$userGender, $userSexuality, $userHeight, $userWeight, $userLifeStyle, $userChildren, $userSmokeHabit, $userDrinkingHabit, $userBodyType, $userHairColor, $userEyeColor,$userRelationShips);
			 if($savePersonalInformation){ 
				 echo '<div class="newOk"> '.$page_Lang['updates_personal_information'][$dataUserPageLanguage].'</div>'; 
				 exit();   
			 }else{ 
				  echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
		      }
		 } 
	}
	// Save Profile Information
	if($activity == 'profileInformation'){ 
	    if(isset($_POST['fn']) && isset($_POST['web']) && isset($_POST['ub']) && isset($_POST['lw'])){
		      $newUserFullName = mysqli_real_escape_string($db, $_POST['fn']); 
			  $newUserWebsite = mysqli_real_escape_string($db, $_POST['web']);
			  $newUserBio = mysqli_real_escape_string($db, $_POST['ub']);
			  $newUserLikedWord = mysqli_real_escape_string($db, $_POST['lw']);
			  $saveNewProfileInformation = $Dot->Dot_SaveUserProfileInformation($uid,$newUserFullName, $newUserWebsite, $newUserBio, $newUserLikedWord);
			  if($saveNewProfileInformation){
				  echo '<div class="newOk"> '.$page_Lang['updates_personal_information'][$dataUserPageLanguage].'</div>'; 
				 exit();  
			  }else{
				  echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
		      }
		}
	}
	// Save User Business and Scholl university
	if($activity == 'userbusiness'){ 
		  if(isset($_POST['jt']) && isset($_POST['cn']) && isset($_POST['su'])){
		      $newJobTitle = mysqli_real_escape_string($db, $_POST['jt']);
			  $newCampanyName = mysqli_real_escape_string($db, $_POST['cn']);
			  $newSchoolUniversity = mysqli_real_escape_string($db, $_POST['su']);
			  $saveNewJobCampanySchollUni = $Dot->Dot_UpdateUserJobUniWorkCampany($uid, $newJobTitle,$newCampanyName,$newSchoolUniversity);
			  if($saveNewJobCampanySchollUni){
				  echo '<div class="newOk"> '.$page_Lang['updates_personal_information'][$dataUserPageLanguage].'</div>'; 
				 exit();  
			  }else{
				  echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
		      }
		  }
	}
	// Save User Phone Number
	if($activity == 'usernumber'){
		if(isset($_POST['ph'])){
			$newPhoneNumber = mysqli_real_escape_string($db, $_POST['ph']);
		    $saveNewPhone = $Dot->Dot_UserPhoneNumber($uid, $newPhoneNumber);
			if($saveNewPhone){
				  echo '<div class="newOk"> '.$page_Lang['updates_personal_information'][$dataUserPageLanguage].'</div>'; 
				 exit();  
			  }else{
				  echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
		      }
		}   
	}
	// Save new Password
	if($activity == 'setNewPas'){ 
	    if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['renew'])){
		    $oldPassword = mysqli_real_escape_string($db, $_POST['old']);
			$newPassword = mysqli_real_escape_string($db, $_POST['new']);
			$reNewPassword = mysqli_real_escape_string($db, $_POST['renew']);
			$updateNewPassword = $Dot->Dot_UpdatePassword($uid, $oldPassword, $newPassword, $reNewPassword); 
			if($updateNewPassword){  
				 echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				 exit();  
			  }else{ 
				  echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
		      }
		}
	}
	//Update Notifications
	if($activity == 'notification'){
	    $notificationType = array("post_like","comment_like","post_comment","profile_follow","profile_visit");
		$notificationEnumNumber = array("0","1");
		if(in_array($_POST['notit'], $notificationEnumNumber) && in_array($_POST['not'], $notificationType)){
		     $noTypeBy = mysqli_real_escape_string($db, $_POST['not']);
			 if($noTypeBy == 'post_like'){
			     $changeThisNot = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewNotType = $Dot->Dot_ChangePostLikeNotificationType($uid, $changeThisNot);
				 if($NewNotType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
			if($noTypeBy =='comment_like'){
			     $changeThisNot = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewNotType = $Dot->Dot_ChangeCommentLikeNotificationType($uid, $changeThisNot);
				 if($NewNotType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
			if($noTypeBy =='post_comment'){
			     $changeThisNot = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewNotType = $Dot->Dot_ChangeCommentedNotificationType($uid, $changeThisNot);
				 if($NewNotType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
			if($noTypeBy =='profile_follow'){
			     $changeThisNot = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewNotType = $Dot->Dot_ChangeFollowedNotificationType($uid, $changeThisNot);
				 if($NewNotType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
			if($noTypeBy =='profile_visit'){
			     $changeThisNot = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewNotType = $Dot->Dot_ChangeVisitedProfileNotificationType($uid, $changeThisNot);
				 if($NewNotType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
		}else{
	      echo '3';
	   }
	}
	// Profile Security
	if($activity == 'security'){
	   $privateType = array("securityProfile");
	   $privateEnumNumber = array("0","1");
	   if(in_array($_POST['notit'], $privateEnumNumber) && in_array($_POST['not'], $privateType)){
	         $PrivTypeBy = mysqli_real_escape_string($db, $_POST['not']);
			 if($PrivTypeBy == 'securityProfile'){
			     $changeThisPriv = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewPrivType = $Dot->Dot_PrivateAccountSet($uid, $changeThisPriv);
				 if($NewPrivType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
	   }else{
	      echo '3';
	   }
	}
	// Follow User
	if($activity == 'friendSend'){
		$f_status = array("uf","uun","udf");
	    if(isset($_POST['ut']) && in_array($_POST['ref'], $f_status)){
		      $UserOneID = mysqli_real_escape_string($db, $_POST['ut']);
			  $f_type = mysqli_real_escape_string($db, $_POST['ref']);
			  if($f_type == 'uf'){
			       $SendFollowRequest = $Dot->Dot_SendFriendFollowRequest($uid,$UserOneID);
				   if($SendFollowRequest){
				       echo '1';
				   }else{
				       echo '2';
				   }
			  }
			  if($f_type == 'udf'){
			       $DirectFollowUserProfile = $Dot->Dot_DirectUserFollow($uid,$UserOneID);
				   if($DirectFollowUserProfile){
					   //SEND PUSH NOTIFICATION CODE					
					$user_f_name = $Dot->Dot_UserFullName($uid);
					$user_name = $Dot->Dot_UserName($uid);

					//print_r($_POST);

					//get comment author's user id and device_id
					$user_data = $Dot->Dot_UserDeviceId($UserOneID);
					//print_r($user_data);
					$device_id = $user_data['device_id'];
					$device_type = $user_data['device_type'];
                    $deviceKeyOneSignal = $authors_data['device_key']; 
					if ($uid != $UserOneID) //use him self will not receive notificatoin
						{
							if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
								$likedYourPostTitle = $likers_name.' Started to follow your profile';
								$likedPostNotificationBody = 'Click to see the message that this message came from.';
								$url = $base_url . "profile/" . $user_name;
								$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
						    }
							//send push notification here
							$title = "Oobenn";
							$body = $user_f_name . " started to follow your profile.";
							$url = $base_url . "profile/" . $user_name;

							sendPushNotification($device_id, $device_type, $body, $title, $url);
						}
				       echo '1';
				   }else{
				       echo '2';
				   }
			  }
			  if($f_type == 'uun'){
			      $RemoveFollowingList = $Dot->Dot_RemoveFromFollowingList($uid,$UserOneID);
				  if($RemoveFollowingList){
				       echo '1';
				   }else{
				       echo '2';
				   }
			  }
		}
	}
	// Get Chat History 
	if($activity == 'chat'){
	  $dataPage = array("chat","normal","minibox");
      if(isset($_POST['user']) && isset($_POST['id']) && in_array($_POST['ct'], $dataPage)){
	      $toUserID = mysqli_real_escape_string($db, $_POST['id']);
		  $toUserName = mysqli_real_escape_string($db, $_POST['user']);
		  $chatPageType = mysqli_real_escape_string($db, $_POST['ct']);
		  $GetChatUserBox = $Dot->Dot_CheckUserExist($toUserID, $toUserName);
		  if($GetChatUserBox){ 
		     if($chatPageType == 'chat'){
			     include_once("../contents/chat_box.php");
			 }
		     if($chatPageType == 'normal'){ 
				 include_once("../contents/mini_chat.php");
			 }
			 if($chatPageType == 'minibox'){
			    include_once("../contents/mini_chat.php");
			 }
		  }
	  }
	}
	// Send Message 
if($activity == 'getMessage'){
	   if(isset($_POST['message']) && isset($_POST['u_n']) && $_POST['u_i'] && isset($_POST['upload']) && isset($_POST['video']) && isset($_POST['file']) && isset($_POST['filename']) && isset($_POST['exten']) && isset($_POST['self'])){
		    $messageText = mysqli_real_escape_string($db, $_POST['message']);
			$messageSendedUserName = mysqli_real_escape_string($db, $_POST['u_n']);
			$messageSendedUserID = mysqli_real_escape_string($db, $_POST['u_i']);
			$messageSendedImage = mysqli_real_escape_string($db, $_POST['upload']);
			$messageSendedVideo = mysqli_real_escape_string($db, $_POST['video']);
			$messageSendedFile = mysqli_real_escape_string($db, $_POST['file']);
			$messageSendedFileName = mysqli_real_escape_string($db, $_POST['filename']);
			$messageSendedFileExtension = mysqli_real_escape_string($db, $_POST['exten']);
			$messageSendedSelfDestruct = mysqli_real_escape_string($db, $_POST['self']);
			$messageSendedEx = getExtension($messageSendedFileExtension); 
			
			if(empty($messageText) && empty($messageSendedVideo) && empty($messageSendedImage) && empty($messageSendedFile)){
			    $json = array();
				  $data = array(  
				     'empty' => 'empty',
					 'message' => '',
					 'user_one' => '',
					 'user_two' => '',
					 'time' => '',
					 'id' => '',
					 'selfdestruct' => '',
					 'destruct' => '',
					 'video' => '',
					 'file' => '',
					 'image' => ''
				  ); 
				  $result =  json_encode( $data );   
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
				exit();
			}
			$SendNewMessage = $Dot->Dot_SendNewConversationMessage($uid, $messageText, $messageSendedUserID, $messageSendedUserName,$messageSendedImage,$messageSendedVideo,$messageSendedFile,$messageSendedFileName,$messageSendedEx,$messageSendedSelfDestruct);
			$GetNewMessageU = $Dot->Dot_GetSendedMessage($uid, $messageSendedUserID, $messageSendedUserName);
			$getImages = isset($GetNewMessageU['imageid']) ? $GetNewMessageU['imageid'] : NULL;  
			$getVideo = isset($GetNewMessageU['videoid']) ? $GetNewMessageU['videoid'] : NULL; 
			$getFile = isset($GetNewMessageU['file']) ? $GetNewMessageU['file'] : NULL; 
			$getTimePost =  isset($GetNewMessageU['dest']) ? $GetNewMessageU['dest'] : NULL; 
			if($getTimePost){
			    $sendedTimeMessage = 'You have sended message that self-destruct.';
				$destructTime = $getTimePost;
			}else{
                $sendedTimeMessage = '';
				$destructTime = '';
			}
			$uploadeVideo = '';
			$uploadedFile = '';
			$extensionArray = array(
				 'ai' => "file_ai",
				 'pdf' => "file_pdf",
				 'eps' => "file_eps",
				 'tif' => "file_tif",
				 'doc' => "file_doc",
				 'docx' => "file_doc",
				 'zip' => "file_zip",
				 'rar' => "file_rar",
				 'psd' => "file_psd",
				 'txt' => "file_txt"
			  );
			if($getFile){
			   $fileDetails = $Dot->Dot_GetUploadChatFileID($getFile);   
			   $uploadedFile = '<a href="'.$base_url.'uploads/files/'.$fileDetails['uploaded_file'].'.'.$fileDetails['extension'].'" download><div class="file_item image_you"><div class="file_extensions_icon '.$extensionArray[$fileDetails['extension']].'"></div><div class="file_name_ex truncate">'.$GetNewMessageU['file_name'].'</div></div></a>';
			}
			if($getVideo){
			    $videoDetails = $Dot->Dot_GetUploadChatVideoID($getVideo);
				$mvideoName = $videoDetails['uploaded_video'];
				$mvideoExtension = $videoDetails['extension']; 
				$videoTumbnail ='';
				if(file_exists($base_url.$videoPath.$mvideoName.'.png')){
					$videoTumbnail = $base_url.'uploads/video/'.$mvideoName.'.png';   
				}else{
					$videoTumbnail = $base_url.'uploads/video/safe_video.png';
				}
				$uploadeVideo = '<div class="media-wrapper videoNew UploadedItemNew"><video id="player1" width="100%" height="auto" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$mvideoName.'.'.$mvideoExtension.'" type="video/mp4"></video></div>';
			}
			$final_images = '';
			if($getImages){
			    $ExploreImage = explode(',', rtrim($getImages, ','));
				$CountExplodes=count($ExploreImage); 
				$final_images = array();                    // Define object as array
				foreach($ExploreImage as $a) { 
				  $newdata=$Dot->Dot_GetUploadChatImageID($a);  
					if($newdata){ 
					  $final_image= '<div class="sldimg"><div class="sld_jjzlbU" style="background-image:url('.$base_url."uploads/images/".$newdata['uploaded_image'].');"><img src="'.$base_url."uploads/images/".$newdata['uploaded_image'].'" class="sld-exPexU"></div></div>'; 
					} 
					$final_images[]= $final_image;
				} 
			}
			
				if($GetNewMessageU){
				  $json = array();
				  $data = array(  
					 'message' => htmlcode($GetNewMessageU['message_text']),
					 'user_one' => $GetNewMessageU['to_user_id'] ,
					 'user_two' => $GetNewMessageU['from_user_id'], 
					 'time' => $GetNewMessageU['message_created_time'],
					 'id' => $GetNewMessageU['msg_id'], 
					 'selfdestruct' => $sendedTimeMessage,
					 'destruct' =>$destructTime,
					 'video' => $uploadeVideo,
					 'file' => $uploadedFile,
					 'image' => $final_images
				  ); 
				  $result =  json_encode( $data );   
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
				  //SEND NOTIFICATION ON MESSAGE SEND
				//get senders name
				$from_user_name = $Dot->Dot_UserFullName($GetNewMessageU['from_user_id']);
				//get receivers details
				$to_user_data = $Dot->Dot_UserDeviceId($GetNewMessageU['to_user_id']);
				//print_r($to_user_data);
				$device_id = $to_user_data['device_id'];
				$device_type = $to_user_data['device_type'];
				$deviceKeyOneSignal = $to_user_data['device_key'];
				if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
					$likedYourPostTitle = $from_user_name.' sent you a message';
					$likedPostNotificationBody = 'Click to see the message that this message came from.';
					$url = $base_url . "chat/" . $messageSendedUserName;
					$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
				}
				//send push notification here
				$title = "Oobenn";
				$body = $from_user_name . " sent you a message.";
				$url = $base_url . "chat/" . $messageSendedUserName;
				//echo $url;
				sendPushNotification($device_id, $device_type, $body, $title, $url); 
				} 
	   }
	}
	/*Get Message notification From Sidebar*/
	if($activity == 'getNewMessage'){
	   $ConversationUserList = $Dot->Dot_ChatUserList($uid);
	   $updateNewMessageNotificationCount = $Dot->Dot_UpdateUserMessageNotification($uid); 
	   echo '
		   <div class="poStListmEnUBox" id="chatBox" data-type="chat">
				<div class="drawer peepr-drawer-container open">
					<div class="peepr-drawer">
						<div class="peepr-body">
							<div class="indash_blog">
								 <div class="notificationBoxHeader">'.$page_Lang['new_message_notification'][$dataUserPageLanguage].'<div class="closeNews">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
								 <div class="not_new_messages">
									 <ul class="listOf">';
	                                    if($ConversationUserList){
										  foreach($ConversationUserList as $cData){  
											   $conversationUserID = $cData['user_id'];   
											   $conversationUserAvatar = $Dot->Dot_UserAvatar($conversationUserID, $base_url);  
											   $conversationLastMessage = $Dot->Dot_ChatLastMessage($uid,$conversationUserID);
											   $conversationUserFullName = $Dot->Dot_UserFullName($conversationUserID);
											   $conversationUserName = $Dot->Dot_GetUserName($conversationUserID); 
											   $time = $conversationLastMessage['message_created_time']; 
											   $conversationLastMessageTime = date("c", $time);
											   $getConversationLastMessage = $conversationLastMessage['message_text'];
											   $getLastMessageID = $conversationLastMessage['msg_id'];
											   $getFromUID = $conversationLastMessage['from_user_id'];
											   $getToUID = $conversationLastMessage['to_user_id'];
											   $getFileName = isset($conversationLastMessage['file_name']) ? $conversationLastMessage['file_name'] : NULL;
											   $getFile = isset($conversationLastMessage['file']) ? $conversationLastMessage['file'] : NULL;
											   $getFileExtension = isset($conversationLastMessage['file_extension ']) ? $conversationLastMessage['file_extension '] : NULL;
											   $getDesto = isset($conversationLastMessage['dest']) ? $conversationLastMessage['dest'] : NULL;
											   $messageSelfDestructionSecret =  isset($conversationLastMessage['secret_checked']) ? $conversationLastMessage['secret_checked'] : NULL; 
											   $messageproductQuestionID = isset($conversationLastMessage['q_question_id']) ? $conversationLastMessage['q_question_id'] : NULL; 
											   $messageproductID = isset($conversationLastMessage['q_product_id']) ? $conversationLastMessage['q_product_id'] : NULL; 
												   if($getDesto){
														if($messageSelfDestructionSecret == '0'){
															  $destText = $page_Lang['self_destruction_message'][$dataUserPageLanguage];
													    }else{
															  $destText = $page_Lang['message_was_self_destruction'][$dataUserPageLanguage];
														}
												   }else if($getConversationLastMessage){
													   $destText = htmlcode($getConversationLastMessage);
												   }else{
												       $destText = $page_Lang[$Dot->Dot_LanguagesKey($messageproductQuestionID)][$dataUserPageLanguage];
												   }
												 if($getFile){
												   $fileID = $Dot->Dot_GetUploadChatFileID($getFile); 
												   $messagefileID = $fileID['file_id'];
												   $messageUploadedFilen = $fileID['uploaded_file'];
												   $messageUploadedFileExtension = $fileID['extension'];
												   $extensionArray = array('ai' => "file_extensions_icon file_ai_mini",'pdf' => "file_extensions_icon file_pdf_mini", 'eps' => "file_extensions_icon file_eps_mini",'tif' => "file_extensions_icon file_tif_mini", 'doc' => "file_extensions_icon file_doc_mini",'docx' => "file_extensions_icon file_doc_mini", 'zip' => "file_extensions_icon file_zip_mini", 'rar' => "file_extensions_icon file_rar_mini",'psd' => "file_extensions_icon file_psd_mini",'txt' => "file_extensions_icon file_txt_mini");
												 $fileIcon = '<span class="'.$extensionArray[$messageUploadedFileExtension].'"></span>';
												 }else{
												  $fileIcon ='';  
												 }
											   
											   echo '
													 <!---->
													  <li class="_5l-3 _1ht1 _1ht2 " id="conme'.$getLastMessageID.'">
														<span class="_5l-3 _1ht5">
														  <span class="_1ht5 _2il3 _5l-3 _3itx">
															<span class="_1qt3 _5l-3" id="js_3u">
															  <span>
																<span class="_4ldz" style="height: 50px; width: 50px;">
																  <span class="_4ld-" style="height: 50px; width: 50px;">
																	<span class="_55lt" style="width: 50px; height: 50px;">
																	  <img src="'.$conversationUserAvatar.'" width="50" height="50" alt="" class="img_avatar"> 
																	</span>
																  </span>
																</span>
															  </span>
															</span>
															<span class="teytey getuse" id="conme'.$getLastMessageID.'" data-id="'.$conversationUserID.'" data-user="'.$conversationUserName.'" data-page="chat">
															  <span class="_1qt5 _5l-3 sr"><span class="_1ht6"><span class="txt_st11">'.$conversationUserFullName.'</span></span>
														  <span><abbr class="_1ht7 timeago" id="time'.$conversationUserID.'" title="'.$conversationLastMessageTime.'">'.$conversationLastMessageTime.'</abbr></span>
														</span>
														<span class="_1qt5 _5l-3 sr"><span class="_1htf"><span class="_j0r"></span>'.$fileIcon.'<span class="txt_st12" id="msg'.$conversationUserID.'">'.$destText.'</span></span>
														</span>
													  </span>
													  </span>
													</span>
													<span>
													</span>
													<span class="reson" data-from="'.$getFromUID.'" data-con="'.$getLastMessageID.'" data-to="'.$getToUID.'" data-type="deleteconversation">
															 <span class="mini_icons deletemessageicon"></span>
													</span>
													</li>
													 <!----> 		 
											   ';
										   }  
	                                  }
	                                  echo '
								 </ul>
							 </div>
						</div>
					</div>
				</div>
			</div> 
		</div>';
	}
	if($activity == 'getNewNotification'){  
	   echo '
		   <div class="poStListmEnUBox">
				<div class="drawer peepr-drawer-container open">
					<div class="peepr-drawer">
						<div class="peepr-body">
							<div class="indash_blog">
								 <div class="notificationBoxHeader">'.$page_Lang['notifications'][$dataUserPageLanguage].'<div class="closeNews">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
								 <div class="not_new_not">'; 
										 $GetNotificationFollowRequestList = $Dot->Dot_GetFollowAndFriendRequestNotificationList($uid);
	                                    if($GetNotificationFollowRequestList){
											echo '<div class="newnotifications_">'.$page_Lang['new_follow_up_requests'][$dataUserPageLanguage].'</div>';
										   foreach($GetNotificationFollowRequestList as $nfollowData){  
											    $newfollowNotificationID = $nfollowData['not_id'];
												$newfollowNotificationType = $nfollowData['not_type'];
												$newfollowNotificationTypeType = $nfollowData['note_type_type'];
												$newfollowNotificationTime = $nfollowData['not_time'];
												$newfollowNotificationUserName = $nfollowData['user_name'];
												$newfollowNotificationUserFullName = $nfollowData['user_fullname'];
												$newfollowNotificationCreatorUID = $nfollowData['not_uid_fk'];
												$newfollowNotificationPostID = $nfollowData['not_post_id_fk'];
												$newfollowNotificationSendedUID = $nfollowData['not_post_owner_id_fk'];
												$newfollowNotificationReadStatus = $nfollowData['not_read_status'];
												$newfollowNotificationCreatorUesrName = $Dot->Dot_GetUserName($newfollowNotificationCreatorUID);
												$nefollowNotificationCreatorAvatar = $Dot->Dot_UserAvatar($newfollowNotificationCreatorUID, $base_url);  
												echo '
												<div class="friendRequestBox" id="newFlw'.$newfollowNotificationCreatorUID.'">
													<div class="friendRequestUserAvatar show_card" id="'.$newfollowNotificationCreatorUID.'"  data-user="'.$newfollowNotificationCreatorUesrName.'" data-type="userCard"><img class="a0uk" src="'.$nefollowNotificationCreatorAvatar.'"></div>
													<div class="friendRequestUserName_btns">
													   <div class="friendRequestName"><a href="'.$base_url.'profile/'.$newfollowNotificationUserName.'">'.$newfollowNotificationUserFullName.'</a> '.$page_Lang['want_to_follow_you'][$dataUserPageLanguage].'</div>
													   <div class="friendRequestNameBtns" id="flanswered'.$newfollowNotificationCreatorUID.'">
														  <div class="answerFol waves-effect waves-light btn blue now_accept" id="'.$newfollowNotificationCreatorUID.'" data-type="ac_rem" data-get="accept">'.$page_Lang['accept_follow_request'][$dataUserPageLanguage].'</div>
														  <div class="answerFol waves-effect waves-light btn orange darken-1 not_now" id="'.$newfollowNotificationCreatorUID.'"  data-type="ac_rem" data-get="remove">'.$page_Lang['not_accept_follow_request'][$dataUserPageLanguage].'</div> 
													   </div>
													</div>
												 </div>
												';
										   }  
	                                  } 
									  $GetEventInviteNotifications = $Dot->Dot_UserEventInvitedNotifications($uid);
									  if($GetEventInviteNotifications){
									      echo '<div class="newnotifications_">Event invitations</div>';
										  foreach($GetEventInviteNotifications as $gein){
										      $inviterUserID = $gein['inviter_user_id'];
											  $invitedEventID = $gein['event_id'];
											  $InviterFullName = $Dot->Dot_UserFullName($inviterUserID);
										      $InviterUsername = $Dot->Dot_GetUserName($inviterUserID);
										      $InviterUserAvatar = $Dot->Dot_UserAvatar($inviterUserID, $base_url); 
											  echo '
												<div class="friendRequestBox" id="iev'.$invitedEventID.'">
													<div class="friendRequestUserAvatar show_card"><img class="a0uk" src="'.$InviterUserAvatar.'"></div>
													<div class="friendRequestUserName_btns">
													   <div class="friendRequestName"><a href="'.$base_url.'profile/'.$InviterUsername.'">'.$InviterFullName.'</a> '.$page_Lang['want_to_follow_you'][$dataUserPageLanguage].'</div>
													   <div class="friendRequestNameBtns">
														   <div class="inviterAnswer_BtnWrapper"><div class="btn waves-effect waves-light red lighten-1" data-ev="'.$invitedEventID.'" data-type="nogoing"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M176,80v-32c0,-8.8 -7.2,-16 -16,-16h-128c-8.8,0 -16,7.2 -16,16v32c8.8,0 16,7.2 16,16c0,8.8 -7.2,16 -16,16v32c0,8.8 7.2,16 16,16h128c8.8,0 16,-7.2 16,-16v-32c-8.8,0 -16,-7.2 -16,-16c0,-8.8 7.2,-16 16,-16zM84.8,96l-16.8,-16.8l11.2,-11.2l16.8,16.8l16.8,-16.8l11.2,11.2l-16.8,16.8l16.8,16.8l-11.2,11.2l-16.8,-16.8l-16.8,16.8l-11.2,-11.2z"></path></g></g></svg></div></div>
														   <div class="inviterAnswer_BtnWrapper">
														      <div class="btn waves-effect waves-light purple darken-1 the_g_'.$invitedEventID.' i_going" data-type="ugoing">
															  '.$page_Lang['go'][$dataUserPageLanguage].'
															  </div>
														   </div>
														   <div class="inviterAnswer_BtnWrapper">
														      <div class="btn waves-effect waves-light pink darken-1 the_i_'.$invitedEventID.' i_going" data-type="uinterested">
														   '.$page_Lang['interest'][$dataUserPageLanguage].' 
															  </div>
														   </div>
													   </div>
													</div>
												 </div>
												';
										  }
									  }
									  echo '<div class="newnotifications_">'.$page_Lang['all_notifications'][$dataUserPageLanguage].'</div>';
									    $GetNotificationAllList = $Dot->Dot_GetAllNotificationList($uid);
	                                    if($GetNotificationAllList){
										   foreach($GetNotificationAllList as $nAllData){  
											    $newNotificationID = $nAllData['not_id'];
												$newNotificationType = $nAllData['not_type'];
												$newNotificationTypeType = $nAllData['note_type_type'];
												$newNotificationTime = $nAllData['not_time']; 
                                                $newNotificationTimeShow=date("c", $newNotificationTime);
												$newNotificationCreatorUID = $nAllData['not_uid_fk'];
												$newNotificationPostID = $nAllData['not_post_id_fk'];
												$newNotificationSendedUID = $nAllData['not_post_owner_id_fk'];
												$newNotificationReadStatus = $nAllData['not_read_status'];
												$readClass='ic_noReaded';
												$statusRead = '0';
												$readRel = 'not_readed';
												$notReadedColorClass = 'notReadedColor';
												$readedToolTip = $page_Lang['update_readed_notification'][$dataUserPageLanguage];
												if($newNotificationReadStatus == '1'){$readClass='ic_readed'; $statusRead = '1';$readRel = 'readed';$readedToolTip = $page_Lang['update_not_readed_notification'][$dataUserPageLanguage];$notReadedColorClass ='';}
												$newNotificationCreatorAvatar = $Dot->Dot_UserAvatar($newNotificationCreatorUID, $base_url);   
												$newNotificationCreatorFullName = $Dot->Dot_UserFullName($newNotificationCreatorUID);
												$newNotificationCreatorUesrName = $Dot->Dot_GetUserName($newNotificationCreatorUID); 
												$postLink ='';
												$GetPostInfo = '';
												$notClass = '';
												$postDataLink = '';
												if($newNotificationPostID){ 
													$getUrlSlugFromID  = $Dot->GetUrl($newNotificationPostID);
													$getNotificationPostTitle = $Dot->Dot_GetPotTextTitleFromNotification($newNotificationPostID);
													$getNotificationPostDescription = $Dot->Dot_GetPotTextDescriptionFromNotification($newNotificationPostID);
													$postDataLink = 'data-type="showPostSingle" data-id="'.$newNotificationPostID.'" data-ui="'.$newNotificationSendedUID.'"';
													if($getNotificationPostTitle){
													  $GetPostInfo = $getNotificationPostTitle; 
													  $postLink = '<div class="postTextNot">'.strip_unsafe($GetPostInfo).'</div>';
													  $notClass = ''; 
													}else if($getNotificationPostDescription){
													  $GetPostInfo = $Dot->GetTheMentions($getNotificationPostDescription,$base_url); 
													  $postLink = '<div class="postTextNot" data-linkify="this" data-linkify-target="_target">'.strip_unsafe($GetPostInfo).'</div>';
													  $notClass = '';
													} 
												}
												if($newNotificationTypeType == 'profile_following'){
												    $notTypeLink = '<a href="'.$base_url.'profile/'.$newNotificationCreatorUesrName.'" class="notLinkp"> ';
												}else{
												    $notTypeLink = '<a href="'.$base_url.'status/'.$getUrlSlugFromID.'" class="notLinkp"> ';
												}
												$typeOfNot = array(
											      'p_text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>',
												  'p_image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>',
												  'p_link' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#4ab37c"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg>',
												  'p_avatar' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_cover' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_video' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="21" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg>',
												  'p_audio' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a073ac"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg>',
												  'p_gif' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8e24aa"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg>',
												  'u_following' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3b8ede"><path d="M131.2,19.2c-13.6064,0 -16,9.6 -16,9.6c-4.7552,0 -8.5557,1.7804 -11.5125,4.75c3.2768,7.0528 5.1125,15.1796 5.1125,24.05c0,4.4544 -0.883,8.7754 -1.875,12.225c1.3248,3.1296 1.9754,6.8922 1.425,11.225c-0.6656,5.216 -2.2404,9.2378 -4.25,12.425c1.2224,3.5264 3.4664,7.1392 5.7,10c10.0736,-8.6272 23.128,-13.875 37.4,-13.875c4.0384,0 7.9795,0.4314 11.7875,1.225c0.0576,-0.3008 0.1555,-0.6242 0.1875,-0.925c2.2656,-0.1728 5.8254,-2.2513 6.875,-10.4625c0.56321,-4.4032 -1.6682,-6.8817 -3.025,-7.6625c0,0 3.375,-7.1094 3.375,-14.175c0,-20.9856 -12.8768,-38.4 -35.2,-38.4zM60.8,19.2125c-13.6064,0 -16,9.6 -16,9.6c-13.1008,0 -19.2,13.2608 -19.2,28.8c0,7.7504 3.375,14.1625 3.375,14.1625c-1.3568,0.7808 -3.5882,3.2529 -3.025,7.6625c1.0496,8.2112 4.6094,10.3022 6.875,10.475c0.864,7.6608 9.095,17.4603 11.975,18.8875v12.8c-6.4,19.2 -44.8,6.4 -44.8,51.2h95.675c-3.8592,-7.7248 -6.075,-16.3968 -6.075,-25.6c0,-4.7424 0.6434,-9.3279 1.725,-13.7375c-6.656,-2.6112 -12.3874,-5.4497 -14.525,-11.8625v-12.8c2.88,-1.4272 11.111,-11.2328 11.975,-18.9c2.2656,-0.1728 5.8254,-2.2513 6.875,-10.4625c0.5632,-4.4032 -1.6682,-6.8817 -3.025,-7.6625c0,0 3.375,-7.1094 3.375,-14.175c0,-20.9856 -12.8768,-38.3939 -35.2,-38.3875zM147.2,102.4c-24.7424,0 -44.8,20.0576 -44.8,44.8c0,24.7424 20.0576,44.8 44.8,44.8c24.7424,0 44.8,-20.0576 44.8,-44.8c0,-24.7424 -20.0576,-44.8 -44.8,-44.8zM147.2,121.6c3.5328,0 6.4,2.8608 6.4,6.4v12.8h12.8c3.5328,0 6.4,2.8608 6.4,6.4c0,3.5392 -2.8672,6.4 -6.4,6.4h-12.8v12.8c0,3.5392 -2.8672,6.4 -6.4,6.4c-3.5328,0 -6.4,-2.8608 -6.4,-6.4v-12.8h-12.8c-3.5328,0 -6.4,-2.8608 -6.4,-6.4c0,-3.5392 2.8672,-6.4 6.4,-6.4h12.8v-12.8c0,-3.5392 2.8672,-6.4 6.4,-6.4z"></path></g></g></svg>',
												  'p_location' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#1E88E5"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg>', 
												  'p_watermark' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg>', 
												  'p_which' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#B71C1C"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>',
												  'p_event' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M48,160v-80h128v80c0,8.79688 -7.20312,16 -16,16h-96c-8.79688,0 -16,-7.20312 -16,-16z" fill="#cfd8dc"></path><path d="M176,64v24h-128v-24c0,-8.79688 7.20312,-16 16,-16h96c8.79688,0 16,7.20312 16,16z" fill="#78909c"></path><path d="M160,64c0,6.625 -5.375,12 -12,12c-6.625,0 -12,-5.375 -12,-12c0,-6.625 5.375,-12 12,-12c6.625,0 12,5.375 12,12z" fill="#37474f"></path><path d="M92,64c0,6.625 -5.375,12 -12,12c-6.625,0 -12,-5.375 -12,-12c0,-6.625 5.375,-12 12,-12c6.625,0 12,5.375 12,12z" fill="#37474f"></path><path d="M148,40c-4.40625,0 -8,3.59375 -8,8v16c0,4.40625 3.59375,8 8,8c4.40625,0 8,-3.59375 8,-8v-16c0,-4.40625 -3.59375,-8 -8,-8z" fill="#b0bec5"></path><path d="M80,40c-4.40625,0 -8,3.59375 -8,8v16c0,4.40625 3.59375,8 8,8c4.40625,0 8,-3.59375 8,-8v-16c0,-4.40625 -3.59375,-8 -8,-8z" fill="#b0bec5"></path><path d="M128,136h16v16h-16z" fill="#90a4ae"></path><path d="M104,136h16v16h-16z" fill="#90a4ae"></path><path d="M80,136h16v16h-16z" fill="#90a4ae"></path><path d="M128,112h16v16h-16z" fill="#90a4ae"></path><path d="M104,112h16v16h-16z" fill="#90a4ae"></path><path d="M80,112h16v16h-16z" fill="#90a4ae"></path><path d="M112,60c0,26.51562 -21.48438,48 -48,48c-26.51562,0 -48,-21.48438 -48,-48c0,-26.51562 21.48438,-48 48,-48c26.51562,0 48,21.48438 48,48z" fill="#f44336"></path><path d="M100,60c0,19.875 -16.125,36 -36,36c-19.875,0 -36,-16.125 -36,-36c0,-19.875 16.125,-36 36,-36c19.875,0 36,16.125 36,36z" fill="#eeeeee"></path><path d="M60,32h8v28h-8z" fill="#000000"></path><path d="M82.0625,72.40625l-5.375,5.375l-15.28125,-15.28125l5.375,-5.375z" fill="#000000"></path><path d="M70,60c0,3.3125 -2.6875,6 -6,6c-3.3125,0 -6,-2.6875 -6,-6c0,-3.3125 2.6875,-6 6,-6c3.3125,0 6,2.6875 6,6z" fill="#000000"></path></g></g></g></svg>',
												  'p_bfaf' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#00695c"><path d="M17.2,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v137.6c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-58.48h-17.24703c-3.18888,4.24496 -8.24337,6.88 -13.71297,6.88c-9.48408,0 -17.2,-7.71592 -17.2,-17.2c0,-9.48408 7.71592,-17.2 17.2,-17.2c5.47304,0 10.52753,2.63504 13.71297,6.88h17.24703v-58.48c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM96.32,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v58.48h19.80687l-7.88781,-7.88781l14.59312,-14.59312l25.50438,25.50437c4.0248,4.0248 4.0248,10.56833 0,14.59313l-25.50438,25.50437l-14.59312,-14.59312l7.88781,-7.88781h-19.80687v58.48c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-137.6c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM119.39219,62.92781l-4.86437,4.86437l14.76781,14.76781h-71.40688c-1.45769,-4.12296 -5.35569,-6.87956 -9.72875,-6.88c-5.69958,0 -10.32,4.62042 -10.32,10.32c0,5.69958 4.62042,10.32 10.32,10.32c4.37059,-0.00329 8.26517,-2.75936 9.72203,-6.88h71.4136l-14.76781,14.76781l4.86437,4.86437l20.64,-20.64c1.34287,-1.34342 1.34287,-3.52095 0,-4.86437z"></path></g></g></svg>',
												  'profile_following' => $page_Lang['profile_following'][$dataUserPageLanguage],
												  'post_like' => $page_Lang['post_like'][$dataUserPageLanguage],
												  'post_comment' => $page_Lang['post_comment'][$dataUserPageLanguage],
												  'post_comment_like' => $page_Lang['post_comment_like'][$dataUserPageLanguage],
												  'post_voted' =>  $page_Lang['post_voted_text'][$dataUserPageLanguage]
												); 
												echo '
												<div class="friendRequestBox '.$notClass.' '.$notReadedColorClass.'" id="answered'.$newNotificationID.'" '.$postDataLink.'> 
												     '.$notTypeLink.'
													<div class="friendRequestUserAvatar show_card" id="'.$newNotificationCreatorUID.'"  data-user="'.$newNotificationCreatorUesrName.'" data-type="userCard"><img class="a0uk" src="'.$newNotificationCreatorAvatar.'"> </div> 
													<div class="friendRequestUserName_btns"> 
													   <div class="o-MQd notCol" id="ed_com_4" data-comment="ad" data-this="4">
													      <span class="FPmhX">'.$newNotificationCreatorFullName.'</span>
														  <span class="not_iconWrap">'.$typeOfNot[$newNotificationType].'</span>  
														  '.$typeOfNot[$newNotificationTypeType].' <span class="comti" title="'.$newNotificationTimeShow.'"></span>
														  </div>
														  '.$postLink.'
														  </div>  
													   </a>
													   <div class="readed makeread icons show_this '.$readClass.'" id="not_id_'.$newNotificationID.'" data-id="'.$newNotificationID.'" data-status="'.$statusRead.'" data-type="notifRead" data-rel="'.$readRel.'" data-position="left" data-tooltip="'.$readedToolTip.'"></div>
												 </div>
												';
										   }  
	                                  }		else{
									     echo '<div class="no_new_not">'.$page_Lang['no_new_notification'][$dataUserPageLanguage].'</div>';
									  }	
									  echo '<div class="newnotifications_">'.$page_Lang['mentoned_notification'][$dataUserPageLanguage].'</div>';
									  	$GetAllMentionNotifications = $Dot->Dot_GetAllMentionNotificationList($uid);
	                                    if($GetAllMentionNotifications){
										   foreach($GetAllMentionNotifications as $mAllData){  
										       $notificationMentionID= $mAllData['m_id'];
											   $notificationMentionedUID= $mAllData['m_uid_fk'];
											   $notificationMentionedPostID= $mAllData['m_post_id_fk'];
											   $notificationMentionedPostType= $mAllData['m_type'];
											   $notificationMentionedReadStatus = $mAllData['m_status'];
											   $notificationMentionedType = $mAllData['m_time']; 
											   $notificationMentionedMentionOwnerUserID = $mAllData['m_user_owner'];
											   $readClass='ic_noReaded';
											   $statusRead = '0';
											   $readRel = 'not_readed';
											   $notReadedColorClass = 'notReadedColor';
											   $readedToolTip = $page_Lang['update_readed_notification'][$dataUserPageLanguage];
											   if($notificationMentionedReadStatus == '0'){$readClass='ic_readed'; $statusRead = '1';$readRel = 'readed';$readedToolTip = $page_Lang['update_not_readed_notification'][$dataUserPageLanguage];$notReadedColorClass ='';}
											   $newNotificationCreatorAvatar = $Dot->Dot_UserAvatar($notificationMentionedMentionOwnerUserID, $base_url);   
											   $newNotificationCreatorFullName = $Dot->Dot_UserFullName($notificationMentionedMentionOwnerUserID);
											   $newNotificationCreatorUesrName = $Dot->Dot_GetUserName($notificationMentionedMentionOwnerUserID); 
											   $postLink ='';
												$GetPostInfo = '';
												$notClass = '';
												$postDataLink = '';
												$getUrlSlugFromMentionID ='';
												if($notificationMentionedPostID){
													$getNotificationPostTitle = $Dot->Dot_GetPotTextTitleFromNotification($notificationMentionedPostID);
													$getUrlSlugFromMentionID  = $Dot->GetUrl($notificationMentionedPostID);
													$getNotificationPostDescription = $Dot->Dot_GetPotTextDescriptionFromNotification($notificationMentionedPostID);
													$postDataLink = 'data-type="showPostSingle" data-id="'.$notificationMentionedPostID.'" data-ui="'.$notificationMentionedMentionOwnerUserID.'"';
													if($getNotificationPostDescription){ 
													  $postLink = '<div class="postTextNot" data-linkify="this" data-linkify-target="_target">'.strip_unsafe($getNotificationPostDescription).'</div>';
													  $notClass = '';
													} 
												}
											   $typeOfNot = array(
											      'p_text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>',
												  'p_image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>',
												  'p_link' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#4ab37c"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg>',
												  'p_avatar' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_cover' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_video' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="21" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg>',
												  'p_audio' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a073ac"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg>',
												  'p_gif' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8e24aa"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg>',
											      'text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>',
												  'image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>',
												  'link' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#4ab37c"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg>',
												  'avatar' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'cover' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'video' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="21" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg>',
												  'audio' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a073ac"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg>',
												  'p_location' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#1E88E5"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg>', 
												  'p_watermark' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg>', 
												  'p_which' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#B71C1C"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>', 
												  'p_bfaf' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#00695c"><path d="M17.2,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v137.6c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-58.48h-17.24703c-3.18888,4.24496 -8.24337,6.88 -13.71297,6.88c-9.48408,0 -17.2,-7.71592 -17.2,-17.2c0,-9.48408 7.71592,-17.2 17.2,-17.2c5.47304,0 10.52753,2.63504 13.71297,6.88h17.24703v-58.48c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM96.32,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v58.48h19.80687l-7.88781,-7.88781l14.59312,-14.59312l25.50438,25.50437c4.0248,4.0248 4.0248,10.56833 0,14.59313l-25.50438,25.50437l-14.59312,-14.59312l7.88781,-7.88781h-19.80687v58.48c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-137.6c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM119.39219,62.92781l-4.86437,4.86437l14.76781,14.76781h-71.40688c-1.45769,-4.12296 -5.35569,-6.87956 -9.72875,-6.88c-5.69958,0 -10.32,4.62042 -10.32,10.32c0,5.69958 4.62042,10.32 10.32,10.32c4.37059,-0.00329 8.26517,-2.75936 9.72203,-6.88h71.4136l-14.76781,14.76781l4.86437,4.86437l20.64,-20.64c1.34287,-1.34342 1.34287,-3.52095 0,-4.86437z"></path></g></g></svg>',
												); 
											   echo '
												<span class="friendRequestBox '.$notClass.' '.$notReadedColorClass.'" id="answered'.$notificationMentionID.'" '.$postDataLink.'>
												     <a href="'.$base_url.'status/'.$getUrlSlugFromMentionID.'"  class="notLinkp">
													<div class="friendRequestUserAvatar show_card" id="'.$notificationMentionedMentionOwnerUserID.'"  data-user="'.$newNotificationCreatorUesrName.'" data-type="userCard"><img class="a0uk" src="'.$newNotificationCreatorAvatar.'"></div>
													<div class="friendRequestUserName_btns">
													   <div class="o-MQd" id="ed_com_4" data-comment="ad" data-this="4">
													          <span class="FPmhX">'.$newNotificationCreatorFullName.'</span>
															  <span class="not_iconWrap">'.$typeOfNot[$notificationMentionedPostType].'</span> 
															        '.$page_Lang['mentioned_you'][$dataUserPageLanguage].' 
																	</div>
															  '.$postLink.'
															  </div>
													   </a>
													   <div class="readed makeread icons show_this '.$readClass.'" id="not_id_'.$notificationMentionID.'" data-id="'.$notificationMentionID.'" data-status="'.$statusRead.'" data-type="notifRead" data-rel="'.$readRel.'" data-position="left" data-tooltip="'.$readedToolTip.'"></div>
												 </span>
												';
												 
										   }
										}
	                                  echo ' 
							 </div>
						</div>
					</div>
				</div>
			</div> 
		</div>';		
	}
	/*Update Notification Count*/
	if($activity == 'updatenot'){
	    $updateNot = $Dot->Dot_UpdateNotificationCount($uid);
	}
	/*Update Notification Read Status*/
	if($activity == 'notifRead'){
		$notrelarray = array("not_readed","readed");
	    if(isset($_POST['not_id']) && in_array($_POST['not_rel'], $notrelarray)){
		    $notificationID = mysqli_real_escape_string($db, $_POST['not_id']);
			$readStatus = mysqli_real_escape_string($db, $_POST['not_rel']);
			if($readStatus == 'readed'){
			    $UpdateReadStatus = $Dot->Dot_UpdateNotificationReadStatusToNotReaded($notificationID, $uid);
				if($UpdateReadStatus){
					echo '1';
				}else{
				    echo '200';
				}
			}
			if($readStatus == 'not_readed'){
			    $UpdateReadStatus = $Dot->Dot_UpdateNotificationReadStatusToReaded($notificationID, $uid);
				if($UpdateReadStatus){
					echo '1';
				}else{
				    echo '200';
				}
			}
		}
	}
	/*Accept or Remove Follow Request*/
	if($activity == 'ac_rem'){
	    $acceptRemoveArray = array("accept","remove");
		if(isset($_POST['user']) && in_array($_POST['t'], $acceptRemoveArray)){
		      $acceptedUserID = mysqli_real_escape_string($db, $_POST['user']);
			  $ac_remType = mysqli_real_escape_string($db, $_POST['t']);
			  if($ac_remType == 'accept'){
		          $AcceptFollowRequest = $Dot->Dot_AcceptFriendReq($uid, $acceptedUserID);
				  $acceptedUserName = $Dot->Dot_GetUserName($acceptedUserID);
				  if($AcceptFollowRequest == '1'){
					    echo '	<a href="'.$base_url.'profile/'.$acceptedUserName.'">'.$page_Lang['see_accepted_profile'][$dataUserPageLanguage].'</a>';
				  }else{
				      echo '200';
				  }
			  }
			  if($ac_remType == 'remove'){
		          $RemoveFollowRequest = $Dot->Dot_RemoveFriendReq($uid, $acceptedUserID);
				  if($RemoveFollowRequest == '1'){
					    echo '1';
				  }else{
				      echo '200';
				  }
			  }
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePosts($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_watermarks'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostWatermarks($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_watermark_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_which'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostWhich($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_which_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_bfaf'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostBfAf($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_bfaf_posts.php");
			 } 
			} 
		}
	} 
	/*Show More Posts from Explore Page*/
	if($activity == 'more_mt'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastThemeID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $themeKey = mysqli_real_escape_string($db, $_POST['theme']);
			$marketThemeList = $Dot->Dot_MarketThemeList($lastThemeID,$themeKey);
			if($marketThemeList){
				foreach($marketThemeList as $mtdata){
					 include("../contents/html_market_themes.php");
				}
			}
		}
	} 
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_text'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostTexts($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_text_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_img'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostImages($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_img_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_fil'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostFilterImages($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_filter_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_gif'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostGifImages($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_gif_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_vid'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostVideos($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_video_posts.php");
			 } 
			} 
		}
	}
	/*Show More Posts from Explore Page*/
	if($activity == 'more_explore_aud'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_PageExplorePostAudios($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_explore_audio_posts.php");
			 } 
			} 
		}
	}
	/*Show More Friends From Profile*/
	if($activity == 'more_friends'){
	   if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){ 
		        $lastFriendID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
				$friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
				$FriendsArray=$Dot->Dot_AllUserFriends($friendsProfileUID, $lastFriendID); 
				if($FriendsArray){
				 foreach($FriendsArray as $FriendsFromData) { 
					  $friendID = $FriendsFromData['user_two'];
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
										<div class="userName">'.$CardDataUserFullName.'</div>
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
					   </div>';
				 } 
		   } 
		}
	}
	/*Show More Friends From Profile*/
	if($activity == 'more_followers'){
	   if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){ 
		        $lastFriendID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
				$friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
				$FriendsArray=$Dot->Dot_AllUserFollowers($friendsProfileUID, $lastFriendID); 
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
										<div class="userName">'.$CardDataUserFullName.'</div>
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
					   </div>';
				 } 
		   } 
		}
	}
	/*Get More Favourites Post*/ 
	if($activity == 'more_favourites'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$updatesarray=$Dot->Dot_SavedPosts($uid, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Favourites Post*/ 
	if($activity == 'more_visitors'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		    $lastuid = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$visitorListItems = $Dot->Dot_UserVisitorLisit($uid, $lastuid);
			if($visitorListItems){
			   foreach($visitorListItems as $visitoru ){ 
				 include("../contents/html_visitors.php");
			 } 
			} 
		}
	}
	/*Get More Favourites Post*/ 
	if($activity == 'more_whofavourite'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		    $lastuid = mysqli_real_escape_string($db, $_POST['lastmid']); 
			$visitorListItems = $Dot->Dot_UserWhoAddedFavouriteLisit($uid, $lastuid);
			if($visitorListItems){
			   foreach($visitorListItems as $visitoru ){ 
				 include("../contents/html_favouritelist.php");
			 } 
			} 
		}
	}    
	/*Get More Friends Posts*/ 
	if($activity == 'more_feeds'){  
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']);  
			$updatesarray=$Dot->Dot_AllFriendsPost($uid, $lastPostID);  
			if($updatesarray){  
			 foreach($updatesarray as $PostFromData) {    
				 include("../contents/html_posts.php");   
			 }  
			 if($datasuggestedHashTagsNumber > $hashtagNumber){
				  include("../contents/suggestedHashTags.php");  
				  $Dot->Dot_UpdateShowSuggestedHashTags($uid); 
			 }
			 if($datasuggestedUsersNumber  > $usersNumber){ 
				 $Dot->Dot_UpdateShowSuggestedUsers($uid); 
				 include("../contents/html_youmayknowusers_betweenposts.php");
			 }
			 if($dataAdvertisementNumber  > $advertisementsNumber){ 
			     include("../contents/html_between_ads.php"); 
				 $Dot->Dot_UpdateShowSuggestedAdvertisements($uid); 
			 }
			 if($datagoogleAdvertisementsNumber  > $googleAdvertisementsNumber){  
				 $Dot->Dot_UpdateShowSuggestedGoogleAdvertisements($uid);
				 include("../contents/html_between_ads_code.php");    
			 }
			} 
		}else{
		   echo 'No uptes found';
		}
	}
	/*Get More Profile Post*/ 
	if($activity == 'more_profilePosts'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfilePosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	} 
	/*Get More Profile Text Posts*/
	if($activity == 'more_text'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfileTextPosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Profile Image Posts*/
	if($activity == 'more_image'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfileImagePosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Profile Video Posts*/
	if($activity == 'more_video'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfileVideoPosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Profile Link Posts*/
	if($activity == 'more_link'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfileLinkPosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Profile Music Posts*/
	if($activity == 'more_link'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['p'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['p']);
			$updatesarray=$Dot->Dot_UserProfileMusicPosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More HashTags*/
	if($activity == 'more_tags'){
	  if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['tag'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $ThisHashTag = mysqli_real_escape_string($db, $_POST['tag']);
			$updatesarray=$Dot->Dot_GetHashTags($lastPostID, $ThisHashTag); 
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	} 
	/*Get More Profile Post*/ 
	if($activity == 'more_stories'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['story'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $friendsProfileUID = mysqli_real_escape_string($db, $_POST['story']);
			$updatesarray=$Dot->Dot_SotriesPosts($friendsProfileUID, $lastPostID); 
			if($updatesarray){
			 foreach($updatesarray as $storyFromData) { 
				 include("../contents/html_stories.php");
			 } 
			} 
		}
	} 
	/*Get More Event Post*/ 
	if($activity == 'more_events'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['event'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $eventID = mysqli_real_escape_string($db, $_POST['event']);
			$updatesarray=$Dot->Dot_AllEventPost($lastPostID, $eventID);   
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) { 
				 include("../contents/html_posts.php");
			 } 
			} 
		}
	}
	/*Get More Event Post*/ 
	if($activity == 'more_boosted'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : ''){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']);  
			$updatesarray=$Dot->Dot_BoostedPosts($uid, $lastPostID);   
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) {  
				 include("../contents/html_boosted.php");
			 } 
			} 
		}
	}
	/*Get More Event Post*/ 
	if($activity == 'more_ev'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['e_ty'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']); 
		   $eventType = mysqli_real_escape_string($db, $_POST['e_ty']);
			$allEventsa = $Dot->Dot_UpComingEvents($uid,$lastPostID,$eventType);  
					if($allEventsa){ 
				        foreach($allEventsa as $resultEvent){
						     $resultEventID = $resultEvent['event_id'];
							 $resultEvent_user_id = $resultEvent['uid_fk'];
							 $resultEvent_title = $resultEvent['event_title']; 
							 $resultEvent_Location = $resultEvent['event_location'];
							 $resultEvent_StartDate = $resultEvent['event_start'];
							 $resultEvent_StartTime = $resultEvent['event_start_time']; 
							 $resultEvent_Type = $resultEvent['event_typ'];
							 $resultEvent_Cover = $resultEvent['event_cover'];
							 $post_event_start_day_number = date('d', strtotime($resultEvent_StartDate));
							 $post_event_start_month_number = date('m', strtotime($resultEvent_StartDate));
							 $eventCoverImage = $base_url.'uploads/event__type_covers/'.$resultEvent_Cover;
							 $monthsa = array('01' => $page_Lang['jan'][$dataUserPageLanguage], '02' => $page_Lang['feb'][$dataUserPageLanguage], '03' => $page_Lang['mar'][$dataUserPageLanguage], '04' => $page_Lang['apr'][$dataUserPageLanguage], '05' => $page_Lang['may'][$dataUserPageLanguage], '06' => $page_Lang['jun'][$dataUserPageLanguage], '07' => $page_Lang['jul'][$dataUserPageLanguage], '08' => $page_Lang['aug'][$dataUserPageLanguage], '09' => $page_Lang['sep'][$dataUserPageLanguage], '10' => $page_Lang['oct'][$dataUserPageLanguage], '11' => $page_Lang['nov'][$dataUserPageLanguage], '12' => $page_Lang['dec'][$dataUserPageLanguage]);
							  echo ' 
								<div class="box_event_wrapper i_event" data-last = "'.$resultEventID.'">
									<div class="box_event_cover" style="background-image:url('.$eventCoverImage.');"></div> 
									<div class="box_event_information_wrapper"> 
										  <div class="box_event_time_wrapper"> 
												  <span class="box_event_month">'.$monthsa[$post_event_start_month_number].'</span>
												  <span class="box_event_day">'.$post_event_start_day_number.'</span> 
										  </div> 
										  <div class="box_event_inf_wrapper">
											   <div class="box_event_name truncate"><a href="'.$base_url.'event/'.$resultEventID.'">'.stripslashes($resultEvent_title).'</a></div>
											   <div class="box_event_other">'.$resultEvent_StartTime.'  ·  '.$resultEvent_Location.' </div>
										  </div>  
									<div class="event_going_intersted">
										<div class="egi"><div class="btn waves-effect waves-light blue-grey the_g_ID i_going" data-type="going">GO</div></div>
										<div class="egi"><div class="btn waves-effect waves-light blue-grey the_i_ID i_going" data-type="going">INTEREST</div></div>
									</div> 
									</div> 
								  </div> 
							   ';
						}
			  } 
		}
	}
	/*Show Post From Right Sidebar*/
	if($activity == 'showPostSingle'){
	    if(isset($_POST['this']) && isset($_POST['ud'])){
		     $showThisPost = mysqli_real_escape_string($db, $_POST['this']);
			 $fromThisUser = mysqli_real_escape_string($db, $_POST['ud']);
			 $ShowThisWantetPost = $Dot->Dot_ShowPostFromRightSideBar($showThisPost,$fromThisUser);
			 if($ShowThisWantetPost){
				 echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['sidebar_post_title'][$dataUserPageLanguage].'<div class="closeNews">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
									   <div class="singlePostHere">';
											 foreach($ShowThisWantetPost as $PostFromData){ 
												  include("../contents/html_posts.php");
											 }
				  echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
			 }else{
			    echo '200';
			 }
		}
	}
	
	/*Show Post From Right Sidebar*/
	if($activity == 'showReportedPostSingle'){
	    if(isset($_POST['this'])){
		     $showThisPost = mysqli_real_escape_string($db, $_POST['this']); 
			 $ShowThisReportedPost = $Dot->Dot_ShowReportedPostFromRightSideBar($uid,$showThisPost);
			 if($ShowThisReportedPost){
				 echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['sidebar_post_title'][$dataUserPageLanguage].'<div class="closeNews"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
									   <div class="singlePostHere">';
											 foreach($ShowThisReportedPost as $PostFromData){ 
												  include("../contents/html_posts.php");
											 }
				  echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
			 }else{
			    echo '200';
			 }
		}
	}
	/*  Chat Friend*/
	if($activity == 'searchChatFriend'){
	    if(isset($_POST['name'])){
		    $searchingUser = mysqli_real_escape_string($db, $_POST['name']);
			$searchResults = $Dot->Dot_SearchChatUser($uid, $searchingUser);
			echo '<div class="ajanda">'.$page_Lang['located_among_people'][$dataUserPageLanguage].'</div>';
			if($searchResults){
			   foreach($searchResults as $searchData){
				   $FindedUserName = $searchData['user_name'];
				   $FinedeUserID = $searchData['user_id'];
				   $FindedUserFullName = $searchData['user_fullname']; 
				   $FindedUserAvatar = $Dot->Dot_UserAvatar($FinedeUserID, $base_url);      
				   echo '
						 <!---->
						  <li class="_5l-3 _1ht1 _1ht2 getuse" data-id="'.$FinedeUserID.'" data-user="'.$FindedUserName.'" data-page="chat">
							<span class="_5l-3 _1ht5">
							  <span class="_1ht5 _2il3 _5l-3 _3itx">
								<span class="_1qt3 _5l-3" id="js_3u">
								  <span>
									<span class="_4ldz" style="height: 50px; width: 50px;">
									  <span class="_4ld-" style="height: 50px; width: 50px;">
										<span class="_55lt" style="width: 50px; height: 50px;">
										  <img src="'.$FindedUserAvatar.'" width="50" height="50" alt="" class="a0uk"> 
										</span>
									  </span>
									</span>
								  </span>
								</span>
								<span class="_1qt4 _5l-m">
								  <span class="_1qt5 _5l-3"><span class="_1ht6"><span class="txt_st11">'.$FindedUserFullName.'</span></span></span> 
							   </span>
						  </span>
						  </span>
						</span>
						<span>
						</span>
						</li>
						 <!----> 		 
				   ';
			   }
			}else{
			   echo '<li class="_5l-3 _1ht1 nouserfounded"><div class="no_search_founded">'.$page_Lang['no_user_found_'][$dataUserPageLanguage].'</div></li>';
			}
		}
	}
	/*User Friends List from Chat Page*/
	if($activity == 'friendlistchat'){
	   $FriendsArray=$Dot->Dot_AllChatFriends($uid); 
	   if($FriendsArray){
		 echo '<div class="friend_user_chat_list_container inChatList">
		 <div class="listHeaderFriend bg_color" id="closeChatUserList"> <h1 class="new_conversation_title"><span class="icons close_fri"></span>Yeni Sohbet</h1></div>
		 <div class="cl_4u-m">
		 <span class="conversationsList">
		 <ul class="listOf">
		 ';
		 foreach($FriendsArray as $FriendsFromData) { 
			  $friendID = $FriendsFromData['user_two'];
			  $FriendDataID = $FriendsFromData['friend_id'];
			  $CardDataUserID = $FriendsFromData['user_id']; 
			  $CardDataUserFullName = $Dot->Dot_UserFullName($friendID);
			  $CardDataUsername = $Dot->Dot_GetUserName($friendID);
			  $CardDataUserAvatar = $Dot->Dot_UserAvatar($friendID, $base_url); 
			  echo '
			  <!---->
				<li class="_5l-3 _1ht1 new_conversation_user_box getuse" id="closeChatUserList" data-id="'.$friendID.'" data-user="'.$CardDataUsername.'" data-page="chat">
				  <span class="_5l-3 _1ht5">
					<span class="_1ht5 _2il3 _5l-3 _3itx">
					  <span class="_1qt3 _5l-3" id="js_3u">
						<span>
						  <span class="_4ldz" style="height: 50px; width: 50px;">
							<span class="_4ld-" style="height: 50px; width: 50px;">
							  <span class="_55lt" style="width: 50px; height: 50px;">
								<img src="'.$CardDataUserAvatar.'" width="50" height="50" alt="" class="a0uk"> 
							  </span>
							</span>
						  </span>
						</span>
					  </span>
					  <span class="_1qt4 _5l-m">
						<span class="_1qt5 _5l-3"><span class="_1ht6"><span class="txt_st11">'.$CardDataUserFullName.'</span></span></span> 
					 </span>
				</span>
				</span>
			  </span>
			  <span>
			  </span>
			  </li>
			<!----> 		 
			  ';
		 }
		 echo '</ul></span></div></div>';
	   }
	}
	/*Open Language List*/
	if($activity == 'openLangs'){
       echo ' <div class="chooseLangContainer">
	   <div class="chooseLanguageHeader">
	       '.$page_Lang['change_your_language'][$dataUserPageLanguage].'
		     <div class="closeLangs"><div class="svg_icon icon_colors"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><path d="M39.92188,31.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l50.34375,50.34375l-50.34375,50.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l50.34375,-50.34375l50.34375,50.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-50.34375,-50.34375l50.34375,-50.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-50.34375,50.34375l-50.34375,-50.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
	   </div>
	   <div class="allLang">'; 
		     $langs = $Dot->Dot_Langs();
			 if($langs){
				  foreach($langs as $column){
				      $lang_name = $column['Field'];
					  $flag = array(
					   $lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'
					   );
					   echo '
					   <div class="langs" data-lang="'.$lang_name.'" data-type="lang">
					       <div class="lang_flag"><img src="'.$flag[$lang_name].'"></div>
						   <div class="langName">'.$lang_name.'</div>
					   </div>';
				  }
		     } 
    echo '</div></div>';  
	}
	/*Change Language*/
	if($activity == 'lang'){
       if(isset($_POST['use'])){
	       $useThisLang = mysqli_real_escape_string($db, $_POST['use']); 
		   $changeLanguage = $Dot->Dot_ChangeLanguage($uid,$useThisLang);
		   if($changeLanguage){
		      echo '1';
		   }
	   }
	}
	/*Chage Day Night Mode Style*/
	if($activity == 'dayNightMode'){
	   if(isset($_POST['mode'])){
		     $StyleMode = mysqli_real_escape_string($db, $_POST['mode']); 
	       if($StyleMode == 'style'){
			   $getNormalStyle = $Dot->Dot_GetDefaultStyle($uid);
			   if($getNormalStyle){
			      echo '1';
			   } 
		   }
		   if($StyleMode == 'night_style'){
			   $getNightStyle = $Dot->Dot_GetNightStyle($uid);
			   if($getNightStyle){
				    echo '2';
			   }
		   }
	   }
	} 
	/*Open Search Menu Area*/
	if($activity == 'searchPeople'){
	   echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="searchBoxHeaderContainer"><div class="search_icon">'.$Dot->Dot_SelectedMenuIcon('search').'</div><input type="text" class="search_input_box" id="search_u" data-type="search_explore" placeholder="'.$page_Lang['serach_friends'][$dataUserPageLanguage].'"><div class="closeNews">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
									   <div class="SearchResultHere"><div class="searchResults" id="searchResults"></div>';
										$OldSearchList = $Dot->Dot_ShowSearchedUserList($uid);
										if($OldSearchList){
											echo '<div class="old_search">'.$page_Lang['old_searches'][$dataUserPageLanguage].'</div>';
										    foreach($OldSearchList as $searhed){
											     $oldSearchedUID = $searhed['searched_id'];
												 $oldSearchID = $searhed['search_event_id'];
												 $oldSearchedUserFullName = $Dot->Dot_UserFullName($oldSearchedUID);
												 $oldSearchedUserUsername = $Dot->Dot_GetUserName($oldSearchedUID);
												 $soAvatar = $Dot->Dot_UserAvatar($oldSearchedUID, $base_url); 
												 echo '
														<div class="resulted_user"  id="olds'.$oldSearchID.'">
														   <a href="'.$base_url.'profile/'.$oldSearchedUserUsername.'">
														   <div class="result_user_avatar"><img src="'.$soAvatar.'" class="a0uk" /></div>
														   <div class="result_user_name">'.$oldSearchedUserFullName.'</div>
														   </a>
														   <span class="deleteSearched" data-id="'.$oldSearchID.'" data-type="deletesearcho"><span class="rmvi">'.$Dot->Dot_SelectedMenuIcon('remove_box_icon').'</span> 
														</div>
														';
											}
										}
				  echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
	} 
	/*Create Search Activity*/
	if($activity == 'usearched'){
		if(isset($_POST['sid'])){
		    $searchedUID = mysqli_real_escape_string($db, $_POST['sid']);
			if($searchedUID !=''){
			    $saveSearchActivity = $Dot->Dot_SaveUserSearchActivity($uid, $searchedUID); 
				if($saveSearchActivity){
				    echo '1';
				}
			}
		} 
	}
	/*Delete Story*/
	if($activity == 'deletestory'){
	    if(isset($_POST['story'])){
		    $storyid = mysqli_real_escape_string($db, $_POST['story']);
			if($storyid != ''){
			    $deleteStoryFromData = $Dot->Dot_DeleteStory($uid,$storyid);
				if($deleteStoryFromData){
				    echo '1';
				}
			}
		}
	} 
	/*Story Seen Insert*/
	if($activity == 'wi'){
	    if(isset($_POST['sids'])){
		    $storyid = mysqli_real_escape_string($db, $_POST['sids']);
			if($storyid != ''){
			    $deleteStoryFromData = $Dot->Dot_StorySeen($uid,$storyid);
				if($deleteStoryFromData){
				    echo '1';
				}
			}
		}
	}
	/*Story Next Seen Insert*/
	if($activity == 'winex'){
	    if(isset($_POST['sids'])){
		    $storyid = mysqli_real_escape_string($db, $_POST['sids']);
			if($storyid != ''){
			    $deleteStoryFromData = $Dot->Dot_StorySeenNext($uid,$storyid);
				if($deleteStoryFromData){
				    echo '1';
				}
			}
		}
	}
	/*Show Story Viewers*/
	if($activity == 'svieWers'){
	    if(isset($_POST['storyPostID']) && isset($_POST['storyOwner'])){
		     $storyPost = mysqli_real_escape_string($db, $_POST['storyPostID']);
			 $storyOwnID = mysqli_real_escape_string($db, $_POST['storyOwner']);
			 if($storyPost !== '' && $storyOwnID !== ''){
				  $storyViewerCount = $Dot->Dot_StoriesViewCount($storyPost);
			      $GetStoryPostViewerList = $Dot->Dot_StoryViewersList($storyPost,$storyOwnID, $uid);
				  if($GetStoryPostViewerList){ 
				      echo '
					  <div class="backBox dialog--open"></div>
						<div class="viewersWrap mover-wrap act">
						    <div class="viewersHeader">'.$storyViewerCount.' '.$page_Lang['story_view'][$dataUserPageLanguage].'  <div class="closeViewers">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div>
					    </div>
					    <div class="viewserListContainer">
							  <div class="viewerItems">
					  ';
					  foreach($GetStoryPostViewerList as $sview){  	   
						$viewerusername = $sview['user_name'];
						$viewedStoryID = $sview['s_viewer_user_id'];
						$vieweTime = $sview['s_viewed_time'];
						$CardPrivateAccount = $sview['private_account'];
					    $cfollowType ='uf';
		               if($CardPrivateAccount == '0'){$cfollowType = 'udf';}
						$StoryViewerFullName = $Dot->Dot_UserFullName($viewedStoryID);
						$StoryViewerAvatar = $Dot->Dot_UserAvatar($viewedStoryID, $base_url); 
						$followStatusicon = 'iconFollow';
						$followButton = '';
					    $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$viewedStoryID); 
						  if($CheckFriendStatus == 'me'){}
						  if($CheckFriendStatus == ''){ 
							  $followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$viewedStoryID.' '.$followStatusicon.'" id="friend_user_sug'.$viewedStoryID.'" data-type="'.$cfollowType.'" data-id="'.$viewedStoryID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						  }
						  if($CheckFriendStatus == 'flwr'){
							  $cfollowType ='uun';
							  $followStatusicon = 'iconFollowSended';
							  $followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$viewedStoryID.' '.$followStatusicon.'" id="friend_user_sug'.$viewedStoryID.'" data-type="'.$cfollowType.'" data-id="'.$viewedStoryID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						  }
						  if($CheckFriendStatus == 'fri'){
							  $cfollowType ='uun';
							  $followStatusicon = 'iconFollowSended';
							  $followButton = '<div class="suggestedFollow"><div class="friend_user icons friend_user_sug'.$viewedStoryID.' '.$followStatusicon.'" id="friend_user_sug'.$viewedStoryID.'" data-type="'.$cfollowType.'" data-id="'.$viewedStoryID.'" data-get="friendSend"  data-rel="'.$cfollowType.'" data-page="suggestion"></div></div>';
						  }
						echo '
						   <div class="suggestedUserBody" id="sgu'.$viewedStoryID.'">
                               <div class="suggestedAvatar show_card" id="'.$viewedStoryID.'" data-user="'.$viewerusername.'" data-type="userCard"><img src="'.$StoryViewerAvatar.'" class="a0uk"></div>
                               <div class="suggestedNameFollower show-user-pro" data-pro="'.$viewedStoryID.'" data-proid="'.$viewerusername.'">
                                  <div class="user_viewerName">'.$StoryViewerFullName.'</div>
                               </div>
                               '.$followButton.'
                         </div>
						';
					  }
					  echo '
					         </div>
                        </div>
                      </div>
					  ';
				  }else{
				     echo '200';
					 echo $GetStoryPostViewerList;
				  }
			 }
		}
	}
	// Get Mention Users
	if($activity == 'smen'){
	    if(isset($_POST['menFriend']) && isset($_POST['posti'])){
		    $searchmUser = mysqli_real_escape_string($db, $_POST['menFriend']);
			$mpostID = mysqli_real_escape_string($db, $_POST['posti']);
			$GetResultMentionedUser = $Dot->Dot_SearchMention($uid, $searchmUser);
			if($GetResultMentionedUser){
			     foreach($GetResultMentionedUser as $um){
				      $resultUsername = $um['user_name'];
					  $resultUserID = $um['user_id'];
					  $resultUserFullName = $um['user_fullname']; 
					  $resultUserAvatar = $Dot->Dot_UserAvatar($resultUserID, $base_url); 
					  echo '
					  <div class="result_user_mention mres_u" data-un="'.$mpostID.'" data-user="'.$resultUsername.'"> 
						 <div class="result_user_avatar"><img src="'.$resultUserAvatar.'" class="a0uk" /></div>
						 <div class="result_user_name">'.$resultUserFullName.'</div> 
					  </div>
					  ';
				 }
			}
		}
	}
	// Get Stickers
	if($activity == 'getStickers'){
	   if(isset($_POST['pmid']) && isset($_POST['post'])){
	       $postStickerID = mysqli_real_escape_string($db, $_POST['pmid']);
		   $postStickerType = mysqli_real_escape_string($db, $_POST['post']);
		   if($postStickerID){ 
		       $Stickers = $Dot->Dot_StickerList();
			   if($Stickers){
				   echo '<div class="stickers_container" data-textarea="textarea'.$postStickerID.'">
				   <div class="stickers_header"> 
									<div class="closeGifBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
							   </div>
				   ';
			       foreach($Stickers as $sticker){
				     $stickerID = $sticker['emoji_id'];
				     $stickerKey = $sticker['emoji_key'];
				     $stickerStyle = $sticker['emoji_style'];
				     $stickerIMG = $sticker['image'];     
   							echo '<div class="sticker_body hvr-underline-from-center" style="background-image:url('.$base_url.'uploads/emoticons/F_Sticker/'.$stickerIMG.');"  data-fastkey="'.$stickerKey.'" data-id="'.$postStickerID.'"  data-post="'.$postStickerType.'" data-type="jsticker"></div>';  
				   }
				   echo '</div>';
			   }
		   }
	   }
	}
	// Insert Comment Post
	if($activity == 'userComment'){
	     if(isset($_POST['post']) && isset($_POST['comment']) && isset($_POST['dp']) && isset($_POST['rec'])){
		    $PostID = mysqli_real_escape_string($db, $_POST['post']);
			$UserCreatedComment = mysqli_real_escape_string($db, $_POST['comment']);
			$userVoiceRecord = mysqli_real_escape_string($db, $_POST['rec']);
			$commentText = htmlcode($UserCreatedComment);  
			$UserCreatedType = mysqli_real_escape_string($db, $_POST['dp']); 
			if($UserCreatedComment !== '' || $userVoiceRecord){ 
					$UserCommentsData = $Dot->Dot_AddNewComment($PostID, $commentText,$uid,$UserCreatedType,$userVoiceRecord);
					$UserCommentedPostID = $UserCommentsData['post_id_fk'];
					$mentionedPostType = $Dot->Dot_DataPostType($UserCommentedPostID);
					$Dot->Dot_InsertMentionedUsersForComment($uid,$UserCreatedComment, $mentionedPostType, $UserCommentedPostID, $dataUsername); 
					if($UserCommentsData){
						//PUSH NOTIFICATION CODE 
					$commenters_name = $Dot->Dot_UserFullName($uid);
					//print_r($_POST);

					//get comment author's user id and device_id
					$authors_data = $Dot->Dot_GetUserDetailsByPostId($PostID);
					//print_r($authors_data);
					$puser_id = $authors_data['user_id_fk'];
					$post_id = $authors_data['user_post_id'];
                    $slugURL = $authors_data['slug'];
					$device_id = $authors_data['device_id'];
					$device_type = $authors_data['device_type'];
					$post_title = $authors_data['post_title_text'];
                    $deviceKeyOneSignal = $to_user_data['device_key'];
					if ($puser_id != $uid) {
						if($pointVoteStatus == '1' && $pointSystemStatus == '1' && $logedinUserdailyTotalPoint < $maxPointDaily){$addPoint = $Dot->Dot_AddPoint($uid, 'comment', $pointComment,$post_id);} 
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
							$likedYourPostTitle = $from_user_name.'  commented on your post.';
							$likedPostNotificationBody = 'Click to see the message that this message came from.';
							$url = $base_url . "status/" . $slugURL;
							$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
						}
						//send push notification here
						$title = "Oobenn";
						$body = $commenters_name . " commented on your post.";
						$url = $base_url . "status/" . $slugURL;

						sendPushNotification($device_id, $device_type, $body, $title, $url);
					}
						include("../contents/post_comments.php");
					}
			}
		 }
	}
	// Send Sticker Post if textarea is empty
	if($activity == 'jsticker'){
		 if(isset($_POST['stickerk']) && isset($_POST['cp']) && isset($_POST['dp'])){
			$StickerKey = mysqli_real_escape_string($db, $_POST['stickerk']); 
			$PostID = mysqli_real_escape_string($db, $_POST['cp']);
			$UserCommentText ='';
			if(isset($_POST['comment'])){
			    $UserCommentText = mysqli_real_escape_string($db, $_POST['comment']);
			} 
			$UserCreatedType = mysqli_real_escape_string($db, $_POST['dp']);
			if($UserCommentText !== ''){
				$UserCommentsData = $Dot->Dot_AddNewCommentwithSticker($PostID, $UserCommentText,$uid,$UserCreatedType, $StickerKey);
				$UserCommentedPostID = $UserCommentsData['post_id_fk'];
				$mentionedPostType = $Dot->Dot_DataPostType($UserCommentedPostID);
				$Dot->Dot_InsertMentionedUsersForComment($uid,$UserCommentText, $mentionedPostType, $UserCommentedPostID, $dataUsername); 
			}else{ 
			   $UserCommentsData = $Dot->Dot_SaveSendedStickerAnswer($uid,$PostID,$StickerKey,$UserCreatedType);
			} 
			if($UserCommentsData){
				//PUSH NOTIFICATION CODE 
				$commenters_name = $Dot->Dot_UserFullName($uid);
				//print_r($_POST);

				//get comment author's user id and device_id
				$authors_data = $Dot->Dot_GetUserDetailsByPostId($PostID);
				//print_r($authors_data);
				$puser_id = $authors_data['user_id_fk'];
				$post_id = $authors_data['user_post_id'];
                $slugURL = $authors_data['slug'];
				$device_id = $authors_data['device_id'];
				$device_type = $authors_data['device_type'];
				$post_title = $authors_data['post_title_text'];
                $deviceKeyOneSignal = $to_user_data['device_key'];

				if ($puser_id != $uid) { 
				if($pointVoteStatus == '1' && $pointSystemStatus == '1' && $logedinUserdailyTotalPoint < $maxPointDaily){$addPoint = $Dot->Dot_AddPoint($uid, 'comment', $pointLike,$post_id);} 
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
							$likedYourPostTitle = $from_user_name.'  commented on your post.';
							$likedPostNotificationBody = 'Click to see the message that this message came from.';
							$url = $base_url . "status/" . $slugURL;
							$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
						}
					//send push notification here
					$title = "Oobenn";
					$body = $commenters_name . " commented on your post.";
					$url = $base_url . "status/" . $slugURL;

					sendPushNotification($device_id, $device_type, $body, $title, $url);
				}
				include("../contents/post_comments.php");
			}
		 } 
	}
	// Disable Enable Comment
	if($activity == 'comstatus'){
	    if(isset($_POST['postid']) && isset($_POST['postType'])){
		     $postID = mysqli_real_escape_string($db, $_POST['postid']); 
			 $commentStatusType = mysqli_real_escape_string($db, $_POST['postType']); 
			 if($commentStatusType == 'disable'){
			    $status = '1';
			 }
			 if($commentStatusType == 'enable'){
			    $status = '0';
			 }
			 $disableComment = $Dot->Dot_CommentDisableEnable($uid, $postID, $status);
			 if($disableComment){
		         echo '1';
			 }else{
		         echo '0';
			 }
		}
	}
	// Open Edit Post PopUp 
	if($activity == 'editPost'){
	    if(isset($_POST['this'])){
		     $showThisPost = mysqli_real_escape_string($db, $_POST['this']); 
			 $ShowThisWantetPost = $Dot->Dot_ShowPostFromRightSideBar($showThisPost,$uid);
			 if($ShowThisWantetPost){
				 echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['edit_post_'][$dataUserPageLanguage].'<div class="closeNews"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
									   <div class="singlePostHere">';
											 foreach($ShowThisWantetPost as $PostFromData){ 
												  include("../contents/html_editpost.php");
											 }
				  echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
			 }else{
			    echo '200';
			 }
		}
	}
	// Update Post
	if($activity == 'editthispost'){
	   if(isset($_POST['updatethis']) && isset($_POST['updateTitle']) && isset($_POST['updateDetails']) && isset($_POST['updateHashtags'])){ 
			$updatethisPostID = mysqli_real_escape_string($db, $_POST['updatethis']);
			$updateThisPostTitle = mysqli_real_escape_string($db, $_POST['updateTitle']);
			$updateThisPostDetails  = mysqli_real_escape_string($db, $_POST['updateDetails']);
			$updateThisPostHashTags = mysqli_real_escape_string($db, $_POST['updateHashtags']);
			$tags = hashtag($updateThisPostHashTags);
		    $postDetailsHtml = htmlcode($updateThisPostDetails);
			$updateThisPost = $Dot->Dot_UpdatePostDetils($uid,$updatethisPostID, $updateThisPostTitle, $postDetailsHtml, $tags, $updateThisPostHashTags);
			$mentionPostID = $updateThisPost['user_post_id'];
			$type = $updateThisPost['post_type'];
			$newPostTitle = $updateThisPost['post_title_text'];
			$newPostDetails = $updateThisPost['post_text_details'];
			$newpostTextDetails = $Dot->GetTheMentions($newPostDetails,$base_url);
			$newPostHashTagDiez = isset($updateThisPost['hashtag_diez']) ? $updateThisPost['hashtag_diez'] : NULL;
			$DeleteOldMentions = $Dot->Dot_DeleteMention($mentionPostID,$uid); 
		    $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$updateThisPostDetails, $type, $mentionPostID, $dataUsername); 
			$json = array();
			$data = array(
					 'title' => htmlcode($newPostTitle),
					 'info' => strip_unsafe(styletext($newpostTextDetails)) ,
					 'hash' => makeHashLink($newPostHashTagDiez, $base_url) 
					 ); 
				  $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
	   }
	}
	// Change Profile Background Image
	if($activity == 'profileBackground'){
	     include("../contents/htmlBackground.php");
	}
	// Open Close Profile Backgorund Image
	if($activity == 'bg_oc'){
	   $openCloseArray = array("0","1");
	   if(in_array($_POST['oc'], $openCloseArray)){
		    $openClose = mysqli_real_escape_string($db, $_POST['oc']);
			$changeBackgroundType = $Dot->Dot_EnableDisableBackgroundImage($uid, $openClose);
			if($changeBackgroundType){
			    echo '1';
			}else{
			    echo '0';
			}
	   }else{
	      echo '200';
	   }
	}
	// Change Profile Background Audio
	if($activity == 'bgAudio'){
	     include("../contents/htmlBackgroundAudio.php");
	}
	// Open Close Profile Backgorund Image
	if($activity == 'bg_aoc'){
	   $openCloseArray = array("0","1");
	   if(in_array($_POST['oac'], $openCloseArray)){
		    $openClose = mysqli_real_escape_string($db, $_POST['oac']);
			$changeBackgroundAudioType = $Dot->Dot_EnableDisableBackgroundMusic($uid, $openClose);
			if($changeBackgroundAudioType){
			    echo '1';
			}else{
			    echo '0';
			}
	   }else{
	      echo '200';
	   }
	}
   // Liked Users
   if($activity == 'likedUsers'){
	  if(isset($_POST['i'])){
		    $likedPost_id = mysqli_real_escape_string($db, $_POST['i']);
			$lastLikedPost = '';
			$getpLikedUsers = $Dot->Dot_PostLikedUsersMore($likedPost_id, $lastLikedPost);
			$UniqPostLikedUserSum = $Dot->Dot_UniqPostLikeCount($likedPost_id);
			if($getpLikedUsers) {
				 echo '
					  <div class="backBox dialog--open"></div>
						<div class="viewersWrap mover-wrap act">
						    <div class="viewersHeader">'.$UniqPostLikedUserSum.' user liked this post <div class="closeViewers">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div>
					    </div>
					    <div class="viewserListContainer" id="moreUseri" data-type="moreLikedUser">
							  <div class="viewerItems" id="likedpp" data-id="'.$likedPost_id.'"> 
					  ';
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
						   <div class="suggestedUserBody theluser sep" id="sgu'.$liked_userID.'" data-last="'.$liked_id.'" data-type="userfirstinfo" data-id="'.$liked_userID.'">
                               <div class="suggestedAvatar show_card" id="'.$liked_userID.'" data-user="'.$likedUserName.'" data-type="userCard"><img src="'.$likedUserAvatar.'" class="a0uk"></div>
                               <div class="suggestedNameFollower show-user-pro" data-pro="'.$liked_userID.'" data-proid="'.$likedUserName.'">
                                  <div class="user_viewerName">'.$likedUserFullName.'</div>
                               </div>
                               '.$followButton.'
                         </div>
						';
				 }
				  echo '  
					         </div>
                        </div>
                      </div>
					  ';
			}
	  }
   }
   // Get Stickers
	if($activity == 'getGifs'){
	   if(isset($_POST['pmid']) && isset($_POST['post'])){
	       $postStickerID = mysqli_real_escape_string($db, $_POST['pmid']);
		   $postStickerType = mysqli_real_escape_string($db, $_POST['post']);
		   if($postStickerID){ 
		       $dGifs = $Dot->Dot_GifList();
			   if($dGifs){
				   echo '<div class="stickers_container" data-textarea="textarea'.$postStickerID.'">
				               <div class="stickers_header">
							        <div class="searchGiphyBox"><input type="text" class="postGif" data-type="commentGif" placeholder="Search Gif"></div>
									<div class="closeGifBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
							   </div>
							   <div class="resultsGifs"></div>
							   <div class="fastGifs">
				   '; 
			       foreach($dGifs as $ggif){
				     $dataGifID = $ggif['emoji_id'];
				     $dataGifKey = $ggif['emoji_key'];
				     $dataGifStyle = $ggif['emoji_style'];
				     $dataGifIMG = $ggif['image'];     
   							echo '
							<div class="gif_body hvr-underline-from-center"  data-fastkey="'.$dataGifKey.'" data-id="'.$postStickerID.'"  data-post="'.$postStickerType.'" data-type="jgif">
							    <img src="'.$base_url.'uploads/gifs/'.$dataGifIMG.'">
							</div>';  
				   }
				   echo '</div></div>';
			   }
		   }
	   }
	}
	// Search Gif from Data
	if($activity == 'commentGif'){
	      if(isset($_POST['gifKeyCo'])){
			    $SearchGifKey = mysqli_real_escape_string($db, $_POST['gifKeyCo']);
				if(!empty($SearchGifKey)){
				      $resultsGifs = $Dot->Dot_SearchGifFromData($uid,$SearchGifKey);  
					  if($resultsGifs){
					       foreach($resultsGifs as $dataGifs){
						     $dataGifID = $dataGifs['emoji_id'];
							 $dataGifKey = $dataGifs['emoji_key'];
							 $dataGifStyle = $dataGifs['emoji_style'];
							 $dataGifIMG = $dataGifs['image'];     
									echo '
									<div class="gif_body hvr-underline-from-center"  data-fastkey="'.$dataGifKey.'" data-id="'.$dataGifID.'"  data-post="'.$dataGifStyle.'" data-type="jgif">
										<img src="'.$base_url.'uploads/gifs/'.$dataGifIMG.'">
									</div>';  
						   }
					  }
				}
		  }
	}
	// Send Sticker Post if textarea is empty
	if($activity == 'jgif'){
		 if(isset($_POST['gifk']) && isset($_POST['cp']) && isset($_POST['dp'])){
			$GifKey = mysqli_real_escape_string($db, $_POST['gifk']); 
			$PostID = mysqli_real_escape_string($db, $_POST['cp']);
			$UserCommentText ='';
			if(isset($_POST['comment'])){
			    $UserCommentText = mysqli_real_escape_string($db, $_POST['comment']);
			} 
			$UserCreatedType = mysqli_real_escape_string($db, $_POST['dp']);
			if($UserCommentText !== ''){
				$UserCommentsData = $Dot->Dot_AddNewCommentwithGif($PostID, $UserCommentText,$uid,$UserCreatedType, $GifKey);
				$UserCommentedPostID = $UserCommentsData['post_id_fk'];
				$mentionedPostType = $Dot->Dot_DataPostType($UserCommentedPostID);
				$Dot->Dot_InsertMentionedUsersForComment($uid,$UserCommentText, $mentionedPostType, $UserCommentedPostID, $dataUsername); 
			}else{ 
			   $UserCommentsData = $Dot->Dot_SaveSendedGifAnswer($uid,$PostID,$GifKey,$UserCreatedType);
			} 
			if($UserCommentsData){
				//PUSH NOTIFICATION CODE 
				$commenters_name = $Dot->Dot_UserFullName($uid);
				//print_r($_POST);

				//get comment author's user id and device_id
				$authors_data = $Dot->Dot_GetUserDetailsByPostId($PostID);
				//print_r($authors_data);
				$puser_id = $authors_data['user_id_fk'];
				$post_id = $authors_data['user_post_id'];
                $slugURL = $authors_data['slug'];
				$device_id = $authors_data['device_id'];
				$device_type = $authors_data['device_type'];
				$post_title = $authors_data['post_title_text'];
                $deviceKeyOneSignal = $to_user_data['device_key'];

				if ($puser_id != $uid) { 
				     if($pointVoteStatus == '1' && $pointSystemStatus == '1' && $logedinUserdailyTotalPoint < $maxPointDaily){$addPoint = $Dot->Dot_AddPoint($uid, 'comment', $pointLike,$post_id);} 
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
							$likedYourPostTitle = $from_user_name.'  commented on your post.';
							$likedPostNotificationBody = 'Click to see the message that this message came from.';
							$url = $base_url . "status/" . $slugURL;
							$Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
						}
					//send push notification here
					$title = "Oobenn";
					$body = $commenters_name . " commented on your post.";
					$url = $base_url . "status/" . $slugURL;

					sendPushNotification($device_id, $device_type, $body, $title, $url);
				}
				include("../contents/post_comments.php");
			}
		 } 
	}
    // Delete Uploaded Ads Image Before Send Data
	if($activity == 'deleteIadsmage'){
		if(isset($_POST['image'])){
		    $imageID = mysqli_real_escape_string($db, $_POST['image']);
			$deleteThisImageID = $Dot->Dot_DeleteImageAdsFromDataBeforeSend($uid, $imageID, $adsPath); 
			 if($deleteThisImageID){
				 echo $deleteThisImageID;
			 }
		} 
	}
	
	// Create Advertisement 
	if($activity == 'createadvertise'){
		$advertisement_category_array = array('519','520','521','522','523','524','525','526','527','528');
		$interruption = array('1','2');
		$ads_time_array = array('1','7','15','30');
		$arrayGender = array('all','male','female');
		$adsAreaDisplayArray = array('1','2','3');
	    if(isset($_POST['campany']) && isset($_POST['web']) && in_array($_POST['show'], $arrayGender) && in_array($_POST['areadisplay'], $adsAreaDisplayArray) && isset($_POST['adsTitle']) && in_array($_POST['offer'], $interruption) && in_array($_POST['adscategory'],$advertisement_category_array) && in_array($_POST['live'], $ads_time_array) && isset($_POST['description']) && isset($_POST['adsfile']) && isset($_POST['budget'])) { 
			  $aCampanyName = mysqli_real_escape_string($db, $_POST['campany']);
			  $aWeb  = mysqli_real_escape_string($db, $_POST['web']);
			  $aShow  = mysqli_real_escape_string($db, $_POST['show']);
			  $aAreaDisplay  = mysqli_real_escape_string($db, $_POST['areadisplay']);
			  $aTitle  = mysqli_real_escape_string($db, $_POST['adsTitle']);
			  $aOffer  = mysqli_real_escape_string($db, $_POST['offer']);
			  $aCategory = mysqli_real_escape_string($db, $_POST['adscategory']);
			  $aLive = mysqli_real_escape_string($db, $_POST['live']);
			  $aDescription = mysqli_real_escape_string($db, $_POST['description']);
			  $aFile = mysqli_real_escape_string($db, $_POST['adsfile']);
			  $CurrentTime = date("Y-m-d H:i:s"); 
			  $aTime = date('Y-m-d H:i:s', strtotime($CurrentTime. ' + '.$aLive.' days')); 
			  $userBudget = mysqli_real_escape_string($db, $_POST['budget']); 
			  if($userBudget > 0){
			         $SaveAdvertisement = $Dot->Dot_SaveAdvertisement($aCampanyName, $aWeb, $aShow, $aAreaDisplay, $aTitle, $aOffer, $aCategory, $aLive, $aDescription, $aFile, $aTime,$uid,$aLive,$userBudget); 
					 if($SaveAdvertisement){
				         echo '1';
					 }else{
				         echo '2';
					 }
			  }else{
			      echo '3';
			  } 
		}
	}
	// Buy Credit
	if($activity == 'buycredit'){
	     if(isset($_POST['amount'])){
		       $uamount = mysqli_real_escape_string($db, $_POST['amount']); 
			   if($uamount >= 15){
				   include_once "../functions/payment.php";   			     
			   }else{
			       echo '2';
			   }
		 }
	}
	// Buy Market Template
	if($activity == 'buyMarketTheme'){
	    if(isset($_POST['theme'])){
		    $themeID = mysqli_real_escape_string($db, $_POST['theme']);
			$themePrice = $Dot->Dot_GetThemeName($themeID);
			$uamount = $themePrice['market_theme_price']; 
			if($uamount){
				if($dataUserCredit > $uamount){
					 $pTime = time();
				     $saveUserMarketTheme = mysqli_query($db, "INSERT INTO dot_user_market_themes(uid_fk,market_theme_id,purchase_time,amounth)VALUES('$uid','$themeID','$pTime','$uamount')") or die(mysqli_error($db));
					 if($saveUserMarketTheme){
					        $updateUserCredit = mysqli_query($db,"UPDATE dot_users SET user_credit = user_credit - $uamount WHERE user_id = '$uid'") or die(mysqli_error($db));
							$getUserMarketID = mysqli_query($db, "SELECT market_id, market_place_owner_id, market_temporary_name FROM dot_user_market WHERE market_place_owner_id = '$uid'") or die(mysqli_error($db));
							  $getName = mysqli_fetch_array($getUserMarketID, MYSQLI_ASSOC);
							  $marketName = $getName['market_temporary_name'];
							  echo $base_url . 'mymarket/'.$marketName;
					 } 
				}else{
			        include_once "../functions/paymentMarketTheme.php"; 
				}
			}else{
			  echo '2';
			}
		}
	} 
	// Show Ads 
	if($activity == 'showAdsAd'){
        if(isset($_POST['ads'])){
	         $advertisementID = mysqli_real_escape_string($db, $_POST['ads']);
			 $getAdvertisement = $Dot->Dot_GetUAds($advertisementID, $uid);
			 if($getAdvertisement){
			    foreach($getAdvertisement as $adsDetails){
				      $uAdvertisementID = $adsDetails['s_ads_id'];
					  $uAdvertisementUidFk = $adsDetails['ads_created_uid_fk'];
					  $uAdvertisementTitle = $adsDetails['s_ads_title']; 
					  $uAdvertisementDescription = $adsDetails['s_ads_description'];
					  $uAdvertisementWebsite = $adsDetails['s_ads_website']; 
					  $uAdvertisementImg = $adsDetails['s_ads_img']; 
					  $uAdvertisementStatus = $adsDetails['s_ads_status']; 
					  $uAdvertisementCampanyName = $adsDetails['ads_campany_name'];
					  $uAdvertisementShowing = $adsDetails['ads_show_gender']; 
					  $uAdvertisementDisplayArea = $adsDetails['ads_display_area'];
					  $uAdvertisementOffer = $adsDetails['ads_offer']; 
					  $uAdvertisementCategory = $adsDetails['ads_category'];
					  $uAdvertisementEndTime = $adsDetails['ads_last_time']; 
					  $uAdvertisementAdminActivate = $adsDetails['admin_activated']; 
					  $uAdvertisementCreatedTime = $adsDetails['s_ads_time'];
					  $uAdvertisementCredit = $adsDetails['credit'];   
					  echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['sidebar_post_title'][$dataUserPageLanguage].'<div class="closeNews"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
									   <div class="singlePostHere">';
											  echo '<div class="support_ads_container">';
													 if($uAdvertisementImg) { 
															$ams = explode(",", $uAdvertisementImg); // Explode the images string value
															$amr=1;
															$amf=count($ams);
															$amTotalImage = $amf-1; 
															 
															// Add to array the available images
															echo '<div class="mostPopularImageContainer">';
															 
																// Get the uploaded image ids
															   $smnewdata=$Dot->Dot_GetUploadAdsImageID($uAdvertisementImg);
															   if($smnewdata) { 
																  // The path to be parsed
																  $smfinal_image=$base_url."supponsoreduploads/".$smnewdata['s_ads_img_img']; 
																  echo '
																  <div class="sldimg">
																	<div class="sld_jjzlbU_mostPopular">
																	  <img src="'.$smfinal_image.'">
																	</div>
																  </div>
																  ';
															 } 
													 echo '</div>';
													}   
											  echo '</div>';
											  echo '<div class="sadsTitleRight">'.$uAdvertisementTitle.'</div>';
											  echo '<div class="sadsDescriptionRight">'.$uAdvertisementDescription.'</div>';
											  echo '<div class="sadsWebsiteRight">'.$uAdvertisementWebsite.'</div>';
       				        echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
				}
			 }
		}
	}
	// Edit Ads
	if($activity == 'editAdsAd'){
    if(isset($_POST['ads'])){
	         $advertisementID = mysqli_real_escape_string($db, $_POST['ads']);
			 $getAdvertisement = $Dot->Dot_GetUAds($advertisementID, $uid);
			 if($getAdvertisement){
			    foreach($getAdvertisement as $adsDetails){
				      $uAdvertisementID = $adsDetails['s_ads_id'];
					  $uAdvertisementUidFk = $adsDetails['ads_created_uid_fk'];
					  $uAdvertisementTitle = $adsDetails['s_ads_title']; 
					  $uAdvertisementDescription = $adsDetails['s_ads_description'];
					  $uAdvertisementWebsite = $adsDetails['s_ads_website']; 
					  $uAdvertisementImg = $adsDetails['s_ads_img']; 
					  $uAdvertisementStatus = $adsDetails['s_ads_status']; 
					  $uAdvertisementCampanyName = $adsDetails['ads_campany_name'];
					  $uAdvertisementShowing = $adsDetails['ads_show_gender']; 
					  $uAdvertisementDisplayArea = $adsDetails['ads_display_area'];
					  $uAdvertisementOffer = $adsDetails['ads_offer']; 
					  $uAdvertisementCategory = $adsDetails['ads_category'];
					  $uAdvertisementEndTime = $adsDetails['ads_last_time']; 
					  $uAdvertisementAdminActivate = $adsDetails['admin_activated']; 
					  $uAdvertisementCreatedTime = $adsDetails['s_ads_time'];
					  $uAdvertisementCredit = $adsDetails['credit'];    
					  $uAdvertisementDisplayDate = $adsDetails['s_ads_display_day'];
					  echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['advertise_show'][$dataUserPageLanguage].'<div class="closeNews"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
									   <div class="singlePostHere">';
											  echo '<div class="support_ads_container">';
													 if($uAdvertisementImg) { 
															$ams = explode(",", $uAdvertisementImg); // Explode the images string value
															$amr=1;
															$amf=count($ams);
															$amTotalImage = $amf-1;  
															// Add to array the available images
															echo '<div class="mostPopularImageContainer">';
															 
																// Get the uploaded image ids
															   $smnewdata=$Dot->Dot_GetUploadAdsImageID($uAdvertisementImg);
															   if($smnewdata) { 
																  // The path to be parsed
																  $smfinal_image=$base_url."supponsoreduploads/".$smnewdata['s_ads_img_img']; 
																  echo '
																  <div class="sldimg">
																	<div class="sld_jjzlbU_mostPopular">
																	  <img src="'.$smfinal_image.'">
																	</div>
																  </div>
																  ';
															 } 
													 echo '</div>';
													}   
											  echo '</div>';
											  echo '<div class="sadsTitleRight"><input type="text" class="edit_adstitle" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementTitle.'"></div>';
											  echo '<div class="sadsDescriptionRight"><textarea class="edit_description" id="details'.$uAdvertisementID.'" placeholder="Your text here">'.$uAdvertisementDescription.'</textarea></div>';
											  echo '<div class="sadsWebsiteRight"><input type="text" class="edit_hashtag_ adsLink" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementWebsite.'"></div>';
											  echo '<div class="sadsTitleRight"><input type="text" class="edit_campanyName" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementTitle.'"></div>';
											  echo '<div class="adsBoxItem">
											      <div class="create_ads_div_in_title" id="campanyname">'.$page_Lang['type_your_budget'][$dataUserPageLanguage].'</div>
                           								 <div class="writeyourbalance"><input type="text" class="writeadsbudget adsBudget" placeholder="0.00" value="'.$uAdvertisementCredit.'"></div>
											    </div> ';
											  echo '<div class="adsBoxItem">
											                 <div class="create_ads_div_in_title" id="showthis__">'.$page_Lang['who_can_see_this_ads'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input" style="margin-top:15px;">
																<span class="genders">
																	<input type="radio" id="radio1" name="showthis" value="all"  '.(($uAdvertisementShowing=='all')?'checked="checked"':"").'>
																	<label for="radio1" class="radio_one gend">'.$page_Lang['ads_everyone'][$dataUserPageLanguage].'</label>
																	<input type="radio" id="radio2" name="showthis" value="male"  '.(($uAdvertisementShowing=='male')?'checked="checked"':"").'>
																	<label for="radio2" class="radio2 gend">'.$page_Lang['ads_male'][$dataUserPageLanguage].'</label>
																	<input type="radio" id="radio3" name="showthis" value="female"  '.(($uAdvertisementShowing=='female')?'checked="checked"':"").'>
																	<label for="radio3" class="radio3 gend">'.$page_Lang['ads_female'][$dataUserPageLanguage].'</label>
																</span>
															  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											               <div class="create_ads_div_in_title" id="ads_display_title">'.$page_Lang['ads_display_area'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input">
																<div class="select-dropdown">
																   <select class="big" id="ads_area_display">
																	  <option value="1" '.(($uAdvertisementDisplayArea=='1')?'selected="selected"':"").'>'.$page_Lang['ads_between_posts'][$dataUserPageLanguage].'</option>
																	  <option value="2" '.(($uAdvertisementDisplayArea=='2')?'selected="selected"':"").'>'.$page_Lang['ads_right_sidebar'][$dataUserPageLanguage].'</option> 
																	</select>
																</div>
															  </div>
											  </div>'; 
											  echo '<div class="adsBoxItem">
											             <div class="create_ads_div_in_title" id="adscat">'.$page_Lang['ads_category'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input">
																<div class="select-dropdown">
																  <select class="big" id="advertisement_category">
																	  <option value="">'.$page_Lang['select_advertisement_category'][$dataUserPageLanguage].'</option>
																	  <option value="519" '.(($uAdvertisementCategory=='519')?'selected="selected"':"").'>'.$page_Lang['ads_cloting_shoes'][$dataUserPageLanguage].'</option>
																	  <option value="520" '.(($uAdvertisementCategory=='520')?'selected="selected"':"").'>'.$page_Lang['ads_home_life'][$dataUserPageLanguage].'</option>
																	  <option value="521" '.(($uAdvertisementCategory=='521')?'selected="selected"':"").'>'.$page_Lang['ads_mother_babby'][$dataUserPageLanguage].'</option>
																	  <option value="522" '.(($uAdvertisementCategory=='522')?'selected="selected"':"").'>'.$page_Lang['ads_cosmetic_personal_care'][$dataUserPageLanguage].'</option>
																	  <option value="523" '.(($uAdvertisementCategory=='523')?'selected="selected"':"").'>'.$page_Lang['ads_jewelery_watches'][$dataUserPageLanguage].'</option>
																	  <option value="524" '.(($uAdvertisementCategory=='524')?'selected="selected"':"").'>'.$page_Lang['ads_sports_outdoor'][$dataUserPageLanguage].'</option>
																	  <option value="525" '.(($uAdvertisementCategory=='525')?'selected="selected"':"").'>'.$page_Lang['ads_book_movies_music_games'][$dataUserPageLanguage].'</option>
																	  <option value="526" '.(($uAdvertisementCategory=='526')?'selected="selected"':"").'>'.$page_Lang['ads_holiday_entertainment'][$dataUserPageLanguage].'</option>
																	  <option value="527" '.(($uAdvertisementCategory=='527')?'selected="selected"':"").'>'.$page_Lang['ads_automative_motorcycle'][$dataUserPageLanguage].'</option>
																	  <option value="528" '.(($uAdvertisementCategory=='528')?'selected="selected"':"").'>'.$page_Lang['ads_electronic'][$dataUserPageLanguage].'</option> 
																	</select>
																</div>
															  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											            <div class="create_ads_div_in_title" id="ads__staylive">'.$page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage].'</div>
														  <div class="create_ads_div_in_input">
															<div class="select-dropdown">
															  <select class="big" id="ads_stay_live">
																  <option value="">'.$page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage].'</option>
																  <option value="1" '.(($uAdvertisementDisplayDate=='1')?'selected="selected"':"").'>'.$page_Lang['ads_one_day'][$dataUserPageLanguage].'</option>
																  <option value="7" '.(($uAdvertisementDisplayDate=='7')?'selected="selected"':"").'>'.$page_Lang['ads_seven_day'][$dataUserPageLanguage].'</option>
																  <option value="15" '.(($uAdvertisementDisplayDate=='15')?'selected="selected"':"").'>'.$page_Lang['ads_fifteen_day'][$dataUserPageLanguage].'</option>
																  <option value="30" '.(($uAdvertisementDisplayDate=='30')?'selected="selected"':"").'>'.$page_Lang['ads_one_month'][$dataUserPageLanguage].'</option>
																</select>
															</div>
														  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											             <div class="create_ads_div_in_title" id="adsoffer__">'.$page_Lang['ads_offer'][$dataUserPageLanguage].':</div>
														  <div class="create_ads_div_in_input">
															<div class="select-dropdown">
															  <select class="big" id="ads_offer">
																  <option value="1"  '.(($uAdvertisementOffer=='1')?'selected="selected"':"").'>'.$page_Lang['ads_per_click'][$dataUserPageLanguage].' ('.$adsPerClick.'$)</option>
																  <option value="2"  '.(($uAdvertisementOffer=='2')?'selected="selected"':"").'>'.$page_Lang['ads_per_impression'][$dataUserPageLanguage].' ('.$adsPerimpression.'$)</option> 
																  '.$uAdvertisementOffer.'
															  </select>
															</div>
														  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											              <div class="create_ads_div_in_title" id="adsoffer__">'.$page_Lang['approval_status'][$dataUserPageLanguage].'</div>
														  <div class="adsBoxItemWrapperEditOut">
														      <div class="adsWrapperTree"><label><input class="with-gap" name="approvalstatus" type="radio" value="adswaiting_approval" '.(($uAdvertisementAdminActivate=='adswaiting_approval')?'checked="checked"':"").'/><span>'.$page_Lang['adswaiting_approval'][$dataUserPageLanguage].'</span></label></div>
															  <div class="adsWrapperTree"><label><input class="with-gap" name="approvalstatus" type="radio" value="adsactive" '.(($uAdvertisementAdminActivate=='adsactive')?'checked="checked"':"").'/><span>'.$page_Lang['adsactive'][$dataUserPageLanguage].'</span></label></div>
															  <div class="adsWrapperTree"><label><input class="with-gap" name="approvalstatus" type="radio" value="adsinactive" '.(($uAdvertisementAdminActivate=='adsinactive')?'checked="checked"':"").'/><span>'.$page_Lang['adsinactive'][$dataUserPageLanguage].'</span></label></div>
														  </div>  
														  <div class="adsBoxItemWrapperEdit">
														        <div class="create_ads_div_in_title">'.$page_Lang['shouldbe_improved'][$dataUserPageLanguage].'</div>
																<div class="adsBoxItemWrapperEditWhy">
																      <textarea class="edit_description" id="whyNot" placeholder="'.$page_Lang['write_something_about_aproval'][$dataUserPageLanguage].'"></textarea>
																</div>
														  </div>
											 </div>';
											 echo '<div class="adsBoxItem"><div class="saveAdsChanges border-radius" data-type="editUpdateAds" data-id="'.$uAdvertisementID.'" data-u="'.$uAdvertisementUidFk.'">'.$page_Lang['update_ad_status'][$dataUserPageLanguage].'</div></div>';
       				        echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>';
				}
			 }
		}
	}
	// Edit Advertisement
	if($activity == 'editUpdateAds'){   
	     if(isset($_POST['advertiseTitle']) && isset($_POST['advertiseDescription']) && isset($_POST['advertiseRedirectUrl']) && isset($_POST['advertisecampanyname']) && isset($_POST['advertisebudget']) && isset($_POST['advertisewhocansee']) && isset($_POST['advertiseareadisplay']) && isset($_POST['advertisecategory']) && isset($_POST['advertisestaylive']) && isset($_POST['advertiseoffer']) && isset($_POST['thisAdvertisement']) && isset($_POST['adminapproveStatus']) && isset($_POST['user'])){
			  $eadsTitle = mysqli_real_escape_string($db, $_POST['advertiseTitle']);
			  $eadsID = mysqli_real_escape_string($db, $_POST['thisAdvertisement']);
			  $eadsDescription = mysqli_real_escape_string($db, $_POST['advertiseDescription']);
			  $eadsRedirectUrl = mysqli_real_escape_string($db, $_POST['advertiseRedirectUrl']);
			  $eadsCampanyName = mysqli_real_escape_string($db, $_POST['advertisecampanyname']);
			  $eadsBudget = mysqli_real_escape_string($db, $_POST['advertisebudget']);
			  $eadsWhoCanSee = mysqli_real_escape_string($db, $_POST['advertisewhocansee']);
			  $eadsDisplayArea = mysqli_real_escape_string($db, $_POST['advertiseareadisplay']);
			  $eadsCategory = mysqli_real_escape_string($db, $_POST['advertisecategory']);
			  $eadsStayLive = mysqli_real_escape_string($db, $_POST['advertisestaylive']);
			  $eadsOffer = mysqli_real_escape_string($db, $_POST['advertiseoffer']);
			  $CurrentTime = date("Y-m-d H:i:s"); 
			  $aTime = date('Y-m-d H:i:s', strtotime($CurrentTime. ' + '.$eadsStayLive.' days')); 
			  $eadsAdminApproveStatus = mysqli_real_escape_string($db, $_POST['adminapproveStatus']);
			  $userID = mysqli_real_escape_string($db, $_POST['user']);
			  // Update Advertise
			  $UpdateAds = $Dot->Dot_UpdateEditAdvertisement($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsBudget,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsStayLive,$eadsOffer,$aTime,$uid,$eadsAdminApproveStatus,$userID);
			  if($UpdateAds){
				  $userEmail = $Dot->Dot_GetUserEmail($userID);
				  $getUserFlNam = $Dot->Dot_UserFullName($userID);
				  include_once '../functions/sendMail.php'; 
			       if($eadsAdminApproveStatus == 'adsactive'){ 
				       $subject = 'Hi '.$getUserFlNam.' ! Congratulations. Your ad has been approved. ';
				       $body="<div style='width:100%; border-radius:3px; -webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;background-color:#fafafa; text-align:center; padding:50px 0px;overflow:hidden;'>
									  <div style='width:100%;max-width:600px;border: 1px solid #e6e6e6;margin:0px auto;background-color:#ffffff;padding:30px;border-radius:3px;-webkit-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;'>
										<div style='width:100%;max-width:100px;margin:0px auto;overflow:hidden;margin-bottom:30px;'><img src='".$base_url.'uploads/logo/'.$dot_logo."' style='width:100%;overflow:hidden;'/></div>
									  <div style='width:100%;position:relative;display:inline-block;padding-bottom:10px;'> <strong>Forgot your Password ?</strong> reset it below:</div>
									  <div style='width:100%;position:relative;padding:10px;background-color:#20B91A;max-width:350px;margin:0px auto; color:#ffffff !important;'>
										<a href='".$base_url."' style='text-decoration:none; color:#ffffff !important;font-weight:500;font-size:18px;position:relative;'>Reset Password</a> 
									  </div>
									  </div>
									</div>"; 
	                               sendMail($userEmail,$subject,$body,$smtpHost,$smtpPort,$smtpUsername,$smtpPassword,$smtpFrom,$dot_siteName);
				   }
			  }else{
			      echo 'Something Went Wrong';
			  }
	     }
	}
	// Delete Advertisement
	if($activity == 'deleteAdsAd'){
         if(isset($_POST['dthisAds'])){
	          $deleteThisAdvertise = mysqli_real_escape_string($db, $_POST['dthisAds']);
			  $DeleteAdvertise = $Dot->Dot_DeleteAdvertisement($deleteThisAdvertise, $uid);
			  if($DeleteAdvertise){
			       echo '1';
			  } 
		 }
	}
	// Activate Deactivate Advertise
	if($activity == 'adacu'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_UpdateAdvertisementStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	// Activate Deactivate Slider
	if($activity == 'modeSlider'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_UpdateSliderAdvertisementStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	// Activate Deactivate Advertise
	if($activity == 'product_stat'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_ProductBoostStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	if($activity == 'display_status'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_ProductBoostDisplayStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	// Show Advertisement Details
	if($activity == 'advertisementDetails'){
	    if(isset($_POST['advertise'])){
		    $getThisAdvertiseID = mysqli_real_escape_string($db, $_POST['advertise']);
			$getAdvertisement = $Dot->Dot_GetUAds($getThisAdvertiseID, $uid);
			 if($getAdvertisement){
			    foreach($getAdvertisement as $adsDetails){
				      $uAdvertisementID = $adsDetails['s_ads_id'];
					  $uAdvertisementUidFk = $adsDetails['ads_created_uid_fk'];
					  $uAdvertisementTitle = $adsDetails['s_ads_title']; 
					  $uAdvertisementDescription = $adsDetails['s_ads_description'];
					  $uAdvertisementWebsite = $adsDetails['s_ads_website']; 
					  $uAdvertisementImg = $adsDetails['s_ads_img']; 
					  $uAdvertisementStatus = $adsDetails['s_ads_status']; 
					  $uAdvertisementCampanyName = $adsDetails['ads_campany_name'];
					  $uAdvertisementShowing = $adsDetails['ads_show_gender']; 
					  $uAdvertisementDisplayArea = $adsDetails['ads_display_area'];
					  $uAdvertisementOffer = $adsDetails['ads_offer']; 
					  $uAdvertisementCategory = $adsDetails['ads_category'];
					  $uAdvertisementEndTime = $adsDetails['ads_last_time']; 
					  $uAdvertisementAdminActivate = $adsDetails['admin_activated']; 
					  $uAdvertisementCreatedTime = $adsDetails['s_ads_time'];
					  $uAdvertisementCredit = $adsDetails['credit'];    
					  $uAdvertisementDisplayDate = $adsDetails['s_ads_display_day'];
					  $ww = '<div class="adsBoxItem"><div class="saveMyChangeAd" id="editmyaddetails" data-type="editmyaddetails" data-id="'.$uAdvertisementID.'">'.$page_Lang['save_my_changes_ad'][$dataUserPageLanguage].'</div></div>';
					  if($uAdvertisementAdminActivate == 'adswaiting_approval'){
						  $ww = '<div class="waitApproval">'.$page_Lang['needa_approval_for_change'][$dataUserPageLanguage].'</div>';
					  }
					 echo '
				 <div class="poStListmEnUBox">
					  <div class="drawer peepr-drawer-container open">
						  <div class="peepr-drawer">
							  <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="notificationBoxHeader">'.$page_Lang['advertise_show'][$dataUserPageLanguage].'<div class="closeNews"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
									   <div class="singlePostHere">';
											  echo '<div class="support_ads_container">';
													 if($uAdvertisementImg) { 
															$ams = explode(",", $uAdvertisementImg); // Explode the images string value
															$amr=1;
															$amf=count($ams);
															$amTotalImage = $amf-1;  
															// Add to array the available images
															echo '<div class="mostPopularImageContainer">';
															 
																// Get the uploaded image ids
															   $smnewdata=$Dot->Dot_GetUploadAdsImageID($uAdvertisementImg);
															   if($smnewdata) { 
																  // The path to be parsed
																  $smfinal_image=$base_url."supponsoreduploads/".$smnewdata['s_ads_img_img']; 
																  echo '
																  <div class="sldimg">
																	<div class="sld_jjzlbU_mostPopular">
																	  <img src="'.$smfinal_image.'">
																	</div>
																  </div>
																  ';
															 } 
													 echo '</div>';
													}   
											  echo '</div>';
											  echo '<div class="sadsTitleRight"><input type="text" class="edit_adstitle" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementTitle.'"></div>';
											  echo '<div class="sadsDescriptionRight"><textarea class="edit_description" id="details'.$uAdvertisementID.'" placeholder="Your text here">'.$uAdvertisementDescription.'</textarea></div>';
											  echo '<div class="sadsWebsiteRight"><input type="text" class="edit_hashtag_ adsLink" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementWebsite.'"></div>';
											  echo '<div class="sadsTitleRight"><input type="text" class="edit_campanyName" id="title'.$uAdvertisementID.'" placeholder="Title" value="'.$uAdvertisementTitle.'"></div>';
											  echo '<div class="adsBoxItem">
											      <div class="create_ads_div_in_title" id="campanyname">'.$page_Lang['type_your_budget'][$dataUserPageLanguage].'</div>
                           								 <div class="writeyourbalance"><input type="text" class="writeadsbudget adsBudget" placeholder="0.00" value="'.$uAdvertisementCredit.'"></div>
											    </div> ';
											  echo '<div class="adsBoxItem">
											                 <div class="create_ads_div_in_title" id="showthis__">'.$page_Lang['who_can_see_this_ads'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input" style="margin-top:15px;">
																<span class="genders">
																	<input type="radio" id="radio1" name="showthis" value="all"  '.(($uAdvertisementShowing=='all')?'checked="checked"':"").'>
																	<label for="radio1" class="radio_one gend">'.$page_Lang['ads_everyone'][$dataUserPageLanguage].'</label>
																	<input type="radio" id="radio2" name="showthis" value="male"  '.(($uAdvertisementShowing=='male')?'checked="checked"':"").'>
																	<label for="radio2" class="radio2 gend">'.$page_Lang['ads_male'][$dataUserPageLanguage].'</label>
																	<input type="radio" id="radio3" name="showthis" value="female"  '.(($uAdvertisementShowing=='female')?'checked="checked"':"").'>
																	<label for="radio3" class="radio3 gend">'.$page_Lang['ads_female'][$dataUserPageLanguage].'</label>
																</span>
															  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											               <div class="create_ads_div_in_title" id="ads_display_title">'.$page_Lang['ads_display_area'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input">
																<div class="select-dropdown">
																   <select class="big" id="ads_area_display">
																	  <option value="1" '.(($uAdvertisementDisplayArea=='1')?'selected="selected"':"").'>'.$page_Lang['ads_between_posts'][$dataUserPageLanguage].'</option>
																	  <option value="2" '.(($uAdvertisementDisplayArea=='2')?'selected="selected"':"").'>'.$page_Lang['ads_right_sidebar'][$dataUserPageLanguage].'</option> 
																	</select>
																</div>
															  </div>
											  </div>'; 
											  echo '<div class="adsBoxItem">
											             <div class="create_ads_div_in_title" id="adscat">'.$page_Lang['ads_category'][$dataUserPageLanguage].'</div>
															  <div class="create_ads_div_in_input">
																<div class="select-dropdown">
																  <select class="big" id="advertisement_category">
																	  <option value="">'.$page_Lang['select_advertisement_category'][$dataUserPageLanguage].'</option>
																	  <option value="519" '.(($uAdvertisementCategory=='519')?'selected="selected"':"").'>'.$page_Lang['ads_cloting_shoes'][$dataUserPageLanguage].'</option>
																	  <option value="520" '.(($uAdvertisementCategory=='520')?'selected="selected"':"").'>'.$page_Lang['ads_home_life'][$dataUserPageLanguage].'</option>
																	  <option value="521" '.(($uAdvertisementCategory=='521')?'selected="selected"':"").'>'.$page_Lang['ads_mother_babby'][$dataUserPageLanguage].'</option>
																	  <option value="522" '.(($uAdvertisementCategory=='522')?'selected="selected"':"").'>'.$page_Lang['ads_cosmetic_personal_care'][$dataUserPageLanguage].'</option>
																	  <option value="523" '.(($uAdvertisementCategory=='523')?'selected="selected"':"").'>'.$page_Lang['ads_jewelery_watches'][$dataUserPageLanguage].'</option>
																	  <option value="524" '.(($uAdvertisementCategory=='524')?'selected="selected"':"").'>'.$page_Lang['ads_sports_outdoor'][$dataUserPageLanguage].'</option>
																	  <option value="525" '.(($uAdvertisementCategory=='525')?'selected="selected"':"").'>'.$page_Lang['ads_book_movies_music_games'][$dataUserPageLanguage].'</option>
																	  <option value="526" '.(($uAdvertisementCategory=='526')?'selected="selected"':"").'>'.$page_Lang['ads_holiday_entertainment'][$dataUserPageLanguage].'</option>
																	  <option value="527" '.(($uAdvertisementCategory=='527')?'selected="selected"':"").'>'.$page_Lang['ads_automative_motorcycle'][$dataUserPageLanguage].'</option>
																	  <option value="528" '.(($uAdvertisementCategory=='528')?'selected="selected"':"").'>'.$page_Lang['ads_electronic'][$dataUserPageLanguage].'</option> 
																	</select>
																</div>
															  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											            <div class="create_ads_div_in_title" id="ads__staylive">'.$page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage].'</div>
														  <div class="create_ads_div_in_input">
															<div class="select-dropdown">
															  <select class="big" id="ads_stay_live">
																  <option value="">'.$page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage].'</option>
																  <option value="1" '.(($uAdvertisementDisplayDate=='1')?'selected="selected"':"").'>'.$page_Lang['ads_one_day'][$dataUserPageLanguage].'</option>
																  <option value="7" '.(($uAdvertisementDisplayDate=='7')?'selected="selected"':"").'>'.$page_Lang['ads_seven_day'][$dataUserPageLanguage].'</option>
																  <option value="15" '.(($uAdvertisementDisplayDate=='15')?'selected="selected"':"").'>'.$page_Lang['ads_fifteen_day'][$dataUserPageLanguage].'</option>
																  <option value="30" '.(($uAdvertisementDisplayDate=='30')?'selected="selected"':"").'>'.$page_Lang['ads_one_month'][$dataUserPageLanguage].'</option>
																</select>
															</div>
														  </div>
											  </div>';
											  echo '<div class="adsBoxItem">
											             <div class="create_ads_div_in_title" id="adsoffer__">'.$page_Lang['ads_offer'][$dataUserPageLanguage].':</div>
														  <div class="create_ads_div_in_input">
															<div class="select-dropdown">
															  <select class="big" id="ads_offer">
																  <option value="1"  '.(($uAdvertisementOffer=='1')?'selected="selected"':"").'>'.$page_Lang['ads_per_click'][$dataUserPageLanguage].' ('.$adsPerClick.'$)</option>
																  <option value="2"  '.(($uAdvertisementOffer=='2')?'selected="selected"':"").'>'.$page_Lang['ads_per_impression'][$dataUserPageLanguage].' ('.$adsPerimpression.'$)</option> 
																  '.$uAdvertisementOffer.'
															  </select>
															</div>
														  </div>
											  </div>';
											 echo '<div class="adsBoxItem"> 
														  <span class="adsBoxItemWrapperEditOut">
														      <div class="adsWrapperTreeMain"><label><input class="with-gaps" name="ads_ads" type="radio" value="1" checked="checked"/><span>'.$page_Lang['just_save_changed_i_made'][$dataUserPageLanguage].'</span></label></div>
															  <div class="adsWrapperTreeMain"><label><input class="with-gaps" name="ads_ads" type="radio" value="2"  /><span>'.$page_Lang['re_post_ad'][$dataUserPageLanguage].'</span></label></div>
														  </span>   
											 </div>';
											 echo '<div class="adsBoxItem"> <div class="adsBoxItemWrapperEditMain">'.$page_Lang['marked_new_repoblish'][$dataUserPageLanguage].'</div> </div> '; 
											  echo $ww;
       				        echo '</div>
						  </div>
					  </div>
				  </div>
			  </div>'; 
				}
			}
		}
	}
	// Edit Advertisement
	if($activity == 'editmyaddetails'){   
	     if(isset($_POST['advertiseTitle']) && isset($_POST['advertiseDescription']) && isset($_POST['advertiseRedirectUrl']) && isset($_POST['advertisecampanyname']) && isset($_POST['advertisebudget']) && isset($_POST['advertisewhocansee']) && isset($_POST['advertiseareadisplay']) && isset($_POST['advertisecategory']) && isset($_POST['advertisestaylive']) && isset($_POST['advertiseoffer']) && isset($_POST['thisAdvertisement']) && isset($_POST['agreStatus'])){
			  $eadsTitle = mysqli_real_escape_string($db, $_POST['advertiseTitle']);
			  $eadsID = mysqli_real_escape_string($db, $_POST['thisAdvertisement']);
			  $eadsDescription = mysqli_real_escape_string($db, $_POST['advertiseDescription']);
			  $eadsRedirectUrl = mysqli_real_escape_string($db, $_POST['advertiseRedirectUrl']);
			  $eadsCampanyName = mysqli_real_escape_string($db, $_POST['advertisecampanyname']);
			  $eadsBudget = mysqli_real_escape_string($db, $_POST['advertisebudget']);
			  $eadsWhoCanSee = mysqli_real_escape_string($db, $_POST['advertisewhocansee']);
			  $eadsDisplayArea = mysqli_real_escape_string($db, $_POST['advertiseareadisplay']);
			  $eadsCategory = mysqli_real_escape_string($db, $_POST['advertisecategory']);
			  $eadsStayLive = mysqli_real_escape_string($db, $_POST['advertisestaylive']);
			  $eadsOffer = mysqli_real_escape_string($db, $_POST['advertiseoffer']);
			  $CurrentTime = date("Y-m-d H:i:s"); 
			  $aTime = date('Y-m-d H:i:s', strtotime($CurrentTime. ' + '.$eadsStayLive.' days')); 
			  $agreeStatuss = mysqli_real_escape_string($db, $_POST['agreStatus']);
			  // Update Advertise
			  if($agreeStatuss == '1'){
			    $UpdateAds = $Dot->Dot_UpdateEditAdvertisementUserTextEdit($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsOffer,$uid);
				  if($UpdateAds){ 
					   echo '1';
				  }else{
					  echo 'Something Went Wrong';
				  }
			  }
			  if($agreeStatuss == '2'){
			    $UpdateAds = $Dot->Dot_UpdateEditAdvertisementUser($eadsID,$eadsTitle,$eadsDescription,$eadsRedirectUrl,$eadsCampanyName,$eadsBudget,$eadsWhoCanSee,$eadsDisplayArea,$eadsCategory,$eadsStayLive,$eadsOffer,$aTime,$uid);
				  if($UpdateAds){ 
					   echo '1';
				  }else{
					  echo 'Something Went Wrong';
				  }
			  }
			  
	     }
	}
	// Delete Old Searched User
	if($activity == 'deletesearcho'){
	      if(isset($_POST['oldID'])){
		       $oldSearchedID = mysqli_real_escape_string($db, $_POST['oldID']);
			   $deleteOldSearched = $Dot->Dot_DeleteOldSearchedUser($uid, $oldSearchedID);
			   if($deleteOldSearched){
			       echo $deleteOldSearched;
			   }else{
			       echo $deleteOldSearched;
			   }
		  }
	}
	// Delete Conversation
	if($activity == 'deleteconversation'){ 
         if(isset($_POST['conID']) && isset($_POST['conIDto']) && isset($_POST['conIDFrom'])){
		      $deleteThisConversationIDto = mysqli_real_escape_string($db, $_POST['conIDto']);
			  $deleteThisConversationIDFrom = mysqli_real_escape_string($db, $_POST['conIDFrom']);
			  $deleteCon = $Dot->Dot_DeleteConversation($uid, $deleteThisConversationIDto, $deleteThisConversationIDFrom);
			  if($deleteCon){
				  echo '1';
			   }
		 }
	}
	// Create Advertisement 
	if($activity == 'createadadvertise'){
		$advertisement_category_array = array('519','520','521','522','523','524','525','526','527','528');
		$interruption = array('1','2');
		$ads_time_array = array('1','7','15','30');
		$arrayGender = array('all','male','female');
		$adsAreaDisplayArray = array('1','2','3');
	    if(isset($_POST['campany']) && isset($_POST['web']) && in_array($_POST['show'], $arrayGender) && in_array($_POST['areadisplay'], $adsAreaDisplayArray) && isset($_POST['adsTitle']) && in_array($_POST['offer'], $interruption) && in_array($_POST['adscategory'],$advertisement_category_array) && in_array($_POST['live'], $ads_time_array) && isset($_POST['description']) && isset($_POST['adsfile']) && isset($_POST['budget'])) { 
			  $aCampanyName = mysqli_real_escape_string($db, $_POST['campany']);
			  $aWeb  = mysqli_real_escape_string($db, $_POST['web']);
			  $aShow  = mysqli_real_escape_string($db, $_POST['show']);
			  $aAreaDisplay  = mysqli_real_escape_string($db, $_POST['areadisplay']);
			  $aTitle  = mysqli_real_escape_string($db, $_POST['adsTitle']);
			  $aOffer  = mysqli_real_escape_string($db, $_POST['offer']);
			  $aCategory = mysqli_real_escape_string($db, $_POST['adscategory']);
			  $aLive = mysqli_real_escape_string($db, $_POST['live']);
			  $aDescription = mysqli_real_escape_string($db, $_POST['description']);
			  $aFile = mysqli_real_escape_string($db, $_POST['adsfile']);
			  $CurrentTime = date("Y-m-d H:i:s"); 
			  $aTime = date('Y-m-d H:i:s', strtotime($CurrentTime. ' + '.$aLive.' days')); 
			  $userBudget = mysqli_real_escape_string($db, $_POST['budget']); 
			   $SaveAdvertisement = $Dot->Dot_SaveAdminAdvertisement($aCampanyName, $aWeb, $aShow, $aAreaDisplay, $aTitle, $aOffer, $aCategory, $aLive, $aDescription, $aFile, $aTime,$uid,$aLive,$userBudget); 
			   if($SaveAdvertisement){
				   echo '1';
			   }else{
				   echo '2';
			   } 
		}
	}
	// Ads PerClick
	if($activity == 'ads'){
	     if(isset($_POST['ad'])){
		     $thisAdClicked  = mysqli_real_escape_string($db, $_POST['ad']);
			 $subtractAdsOffer = $Dot->Dot_SubtractAdsOfferPerClick($thisAdClicked, $uid, $adsPerClick);
		 }
	}
	// Change Paypal Mode, Cliend id and Cliend Secret
	if($activity == 'paypalid'){ 
	     if(isset($_POST['client']) && isset($_POST['secret']) && isset($_POST['paymode'])){
		        $paypalMode = mysqli_real_escape_string($db, $_POST['paymode']);
				$paypalCliendtID = mysqli_real_escape_string($db, $_POST['client']);
				$paypalSecretID = mysqli_real_escape_string($db, $_POST['secret']);
				$SavePayPalSettings = $Dot->Dot_UpdatePayPalSettins($paypalMode, $paypalCliendtID, $paypalSecretID,$uid);
				if($SavePayPalSettings){
				    echo '1';
				}
		 }
	}
	// Money Fee
	if($activity == 'moneyfee'){ 
         if(isset($_POST['adsViewFee']) && isset($_POST['adsClickFee']) ){
		        $adsViewFee = mysqli_real_escape_string($db, $_POST['adsViewFee']);
				$adsClickFee = mysqli_real_escape_string($db, $_POST['adsClickFee']);
				if($adsViewFee > 0 && $adsClickFee > 0){
			        $SaveOffer = $Dot->Dot_UpdateOffers($adsClickFee, $adsViewFee,$uid);
				    if($SaveOffer){
				        echo '1';
				    }
				}else{
				    echo '2';
				}
				
		 }
	}
	// After Scroll
	if($activity == 'afterscroll'){
	    if(isset($_POST['here'])){
		    $afterThisNumber = mysqli_real_escape_string($db, $_POST['here']);
			$updateScrollShowAds = $Dot->Dot_UpdateAfterScroll($afterThisNumber, $uid);
			if($updateScrollShowAds){
			    echo '1';
			}
		}
	}
	// Add New Sticker
	if($activity == 'stickerNew'){ 
	   if(isset($_POST['title']) && !empty($_POST['title'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
				$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				$StickerName = mysqli_real_escape_string($db, $_POST['title']);
				$StickerKey = "_".$StickerName."_"; 
				$Sticker = $_FILES['stickerFile']['name'];
				$Sticker_tmp= $_FILES['stickerFile']['tmp_name'];
				$ext = getExtension($Sticker);
					if(in_array($ext,$valid_formats)) { 
						$Sticker_tmp= $_FILES['stickerFile']['tmp_name'];
						$actual_image_name = '_'.$StickerName."_.".$ext; 
						if(move_uploaded_file($Sticker_tmp,$stickerPath.$actual_image_name)){
						      $newSticker = $Dot->Dot_AddNewSticker($uid, $StickerKey, $actual_image_name);  
							   $newEmoID = $newSticker['emoji_id'];
							   $newStickerKey = $newSticker['emoji_key'];
							   $newStickerStyle = $newSticker['emoji_style'];
							   $newStickerImage = $newSticker['image'];
							   $stickerNew = $base_url.'uploads/emoticons/F_Sticker/'.$newStickerImage;	 
							  if($newSticker){ 
                    echo ' <div class="adivTableRow sorm" id="stickersBody'.$newEmoID.'">
                            <div class="tableStyle">'.$newEmoID.'</div> 
                            <div class="tableStyle tableStyle"  id="" data-last="" data-type="profile">
                                <div class="tableincontainer">
                                    <div class="publicher_avatar">
                                        <img src="'.$stickerNew.'" class="a0uk">
                                    </div> 
                                </div>
                            </div>
                            <div class="tableStyle"><div class="tableincontainer">'.$newStickerKey.'</div></div> 
                            <div class="tableStyle">'.$newStickerStyle.'</div>
                            <div class="tableStyle">
                                <div class="manageThisAds icons_two" id="'.$newEmoID.'">
                                <div class="ads_menu_container post_menu_'.$newEmoID.'" id="post_menu_'.$newEmoID.'" style="display: none;">
                                    <div class="post_menu_item hvr-underline-from-center see_adsa" data-post="'.$newEmoID.'" data-type="editAdsAd"><span class="icons edit_post_icon"></span> Edit Sticker</div> 
                                    <div class="post_menu_item hvr-underline-from-center deleteSticker" data-post="'.$newEmoID.'" data-type="deleteAdsAd"><span class="icons delete_icon"></span> Delete Sticker</div> 
                                </div>
                                </div> 
                            </div> 
                          </div>';
                      }
						}
					}
				}
	   }
	   
  	}

// Add New Sticker
	if($activity == 'GifNew'){ 
	   if(isset($_POST['title']) && !empty($_POST['title'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
				$valid_formats = array("gif","GIF");
				$StickerName = mysqli_real_escape_string($db, $_POST['title']);
				$StickerKey = "-".$StickerName."-"; 
				$Sticker = $_FILES['stickerFile']['name'];
				$Sticker_tmp= $_FILES['stickerFile']['tmp_name'];
				$ext = getExtension($Sticker);
					if(in_array($ext,$valid_formats)) { 
						$Sticker_tmp= $_FILES['stickerFile']['tmp_name'];
						$actual_image_name = '-'.$StickerName."-.".$ext; 
						if(move_uploaded_file($Sticker_tmp,$gifPath.$actual_image_name)){
						      $newSticker = $Dot->Dot_AddNewGif($uid, $StickerKey, $actual_image_name);  
							   $newEmoID = $newSticker['emoji_id'];
							   $newStickerKey = $newSticker['emoji_key'];
							   $newStickerStyle = $newSticker['emoji_style'];
							   $newStickerImage = $newSticker['image'];
							   $stickerNew = $base_url.'uploads/gifs/'.$newStickerImage;	 
							  if($newSticker){ 
                    echo ' <div class="adivTableRow sorm" id="gifsBody'.$newEmoID.'">
                            <div class="tableStyle">'.$newEmoID.'</div> 
                            <div class="tableStyle tableStyle"  id="" data-last="" data-type="profile">
                                <div class="tableincontainer">
                                    <div class="publicher_avatar">
                                        <img src="'.$stickerNew.'" class="a0uk">
                                    </div> 
                                </div>
                            </div>
                            <div class="tableStyle"><div class="tableincontainer">'.$newStickerKey.'</div></div> 
                            <div class="tableStyle">'.$newStickerStyle.'</div>
                            <div class="tableStyle">
                                <div class="manageThisAds icons_two" id="'.$newEmoID.'">
                                <div class="ads_menu_container post_menu_'.$newEmoID.'" id="post_menu_'.$newEmoID.'" style="display: none;"> 
                                    <div class="post_menu_item hvr-underline-from-center deleteGif" data-post="'.$newEmoID.'" data-type="deleteGif"><span class="icons delete_icon"></span> Delete Gif</div> 
                                </div>
                                </div> 
                            </div> 
                          </div>';
                      }
						}
					}
				}
	   } 
  	}
	// Delete Sticker
	if($activity == 'deleteSticker'){
	     if(isset($_POST['st'])){
		     $stickerid = mysqli_real_escape_string($db, $_POST['st']);
			 $deleteSticker = $Dot->Dot_DeleteSticker($uid, $stickerid);
			 if($deleteSticker){
				   echo '1';
			 }
		 }
	}
	// Delete Gif
	if($activity == 'deleteGif'){
	     if(isset($_POST['gf'])){
		     $gifid = mysqli_real_escape_string($db, $_POST['gf']);
			 $deleteGif = $Dot->Dot_DeleteGif($uid, $gifid);
			 if($deleteGif){
				   echo '1';
			 }
		 }
	}
	// Change Profile Design
	if($activity == 'chageProfileDesign'){
	      $checkUserExist = $Dot->Dot_CheckUserIDexist($uid);
		  if($checkUserExist){?>
<div class="fixedBackground_two"></div>
<div class="app-customization-container">
    <div class="app-customization-wrapper">
          <div class="post-modal-middle">
                  <div class="customize_profile_header"><?php echo $page_Lang['customize_profile'][$dataUserPageLanguage];?><div class="closeDesign"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
                  <div class="customization_container">
                       <!---->
                    <div class="customizationWrapper">
                       <div class="customtit"><div class="custom_utuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M144,19.2c-7.3712,0 -14.7401,2.8151 -20.3625,8.4375l-21.075,21.075l-2.0375,-2.0375c-1.20494,-1.23861 -2.85949,-1.9374 -4.5875,-1.9375c-2.60431,0.00069 -4.94854,1.57924 -5.92852,3.99213c-0.97998,2.41289 -0.40029,5.17897 1.46602,6.99537l1.875,1.875l-53.075,53.075c-7.53137,7.53137 -9.6875,15.775 -11.2875,22.175c-1.6,6.4 -2.64387,10.95637 -7.9125,16.225c-2.49836,2.49939 -2.49836,6.55061 0,9.05l12.8,12.8c2.49939,2.49836 6.55061,2.49836 9.05,0c5.26863,-5.26863 9.825,-6.3125 16.225,-7.9125c6.4,-1.6 14.64363,-3.75613 22.175,-11.2875l53.075,-53.075l1.875,1.875c1.60523,1.67194 3.98891,2.34544 6.23174,1.76076c2.24283,-0.58468 3.99434,-2.33619 4.57902,-4.57902c0.58468,-2.24283 -0.08882,-4.62651 -1.76076,-6.23174l-2.0375,-2.0375l21.075,-21.075c11.2448,-11.2448 11.2448,-29.4802 0,-40.725c-5.6224,-5.6224 -12.9913,-8.4375 -20.3625,-8.4375zM102.4,66.65l22.95,22.95l-53.075,53.075c-5.26863,5.26863 -9.825,6.3125 -16.225,7.9125c-4.90544,1.22636 -10.87973,3.56382 -16.8,7.6125l-5.45,-5.45c4.04868,-5.92028 6.38614,-11.89457 7.6125,-16.8c1.6,-6.4 2.64387,-10.95637 7.9125,-16.225z"></path></g></g></svg></div><?php echo $page_Lang['background_colors_title'][$dataUserPageLanguage];?></div> 
                       <div class="change_area_header">
                           <div class="selectedColorContainer"> 
                                <div class="selectedBgColor" id="bgc" data-type="chbgcolor"><?php echo $page_Lang['choose_profile_background_color'][$dataUserPageLanguage];?></div>
                           </div> 
                       </div>
                       </div>
                       <!---->
                       <!---->
                       <div class="customizationWrapper">
                       <div class="customtit"><div class="custom_utuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M88,24c-4.416,0 -8,3.584 -8,8v1.60938c-33.90952,6.92047 -60.1147,35.37622 -63.60938,70.39062h-0.39062c-4.416,0 -8,3.584 -8,8v16c0,4.416 3.584,8 8,8h16c4.416,0 8,-3.584 8,-8v-16c0,-4.2272 -3.31447,-7.60208 -7.46875,-7.89062c3.23663,-26.47304 22.50967,-47.80025 47.875,-54.125c0.90278,3.42872 3.88282,6.01562 7.59375,6.01562h16c3.71093,0 6.69097,-2.58691 7.59375,-6.01562c25.36533,6.32475 44.63837,27.65196 47.875,54.125c-4.15429,0.28854 -7.46875,3.66342 -7.46875,7.89062v16c0,4.416 3.584,8 8,8h16c4.416,0 8,-3.584 8,-8v-16c0,-4.416 -3.584,-8 -8,-8h-0.39062c-3.49468,-35.01441 -29.69986,-63.47015 -63.60938,-70.39062v-1.60938c0,-4.416 -3.584,-8 -8,-8zM85.78125,66.125c-1.191,-0.261 -2.5515,0.20212 -3.1875,1.57812l-25.90625,56.21875c-1.112,2.416 -1.067,5.20975 0.125,7.59375l15.46875,30.95313c1.696,3.392 5.1615,5.53125 8.9375,5.53125h29.54687c3.784,0 7.2415,-2.13162 8.9375,-5.51562l15.48438,-30.96875c1.192,-2.384 1.22137,-5.17775 0.10937,-7.59375l-25.89062,-56.21875c-1.272,-2.752 -5.40625,-1.8445 -5.40625,1.1875v59.10938c0,4.416 -3.584,8 -8,8c-4.416,0 -8,-3.584 -8,-8v-59.10938c0,-1.516 -1.02775,-2.50462 -2.21875,-2.76562z"></path></g></g></svg></div><?php echo $page_Lang['icon_color_title'][$dataUserPageLanguage];?></div> 
                       <div class="change_area_header">
                           <div class="selectedColorContainer"> 
                                <div class="selectedBgColor" id="icc" data-type="chiccolor"><?php echo $page_Lang['choose_profile_icon_color'][$dataUserPageLanguage];?></div>
                           </div> 
                       </div>
                       </div>
                       <!---->
                       <!---->
                       <div class="customizationWrapper">
                       <div class="customtit"><div class="custom_utuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M96,0c-10.52806,0 -19.2,8.67194 -19.2,19.2h-25.6c-10.52781,0 -19.2,8.67219 -19.2,19.2v115.2c0,10.52781 8.67219,19.2 19.2,19.2h89.6c10.52781,0 19.2,-8.67219 19.2,-19.2v-115.2c0,-10.52781 -8.67219,-19.2 -19.2,-19.2h-25.6c0,-10.52806 -8.67194,-19.2 -19.2,-19.2zM96,12.8c3.61043,0 6.4,2.78957 6.4,6.4c0,3.61043 -2.78957,6.4 -6.4,6.4c-3.61043,0 -6.4,-2.78957 -6.4,-6.4c0,-3.61043 2.78957,-6.4 6.4,-6.4zM51.2,32h25.6v6.4c0,3.5328 2.8672,6.4 6.4,6.4h25.6c3.5328,0 6.4,-2.8672 6.4,-6.4v-6.4h25.6c3.61619,0 6.4,2.78381 6.4,6.4v115.2c0,3.61619 -2.78381,6.4 -6.4,6.4h-89.6c-3.61619,0 -6.4,-2.78381 -6.4,-6.4v-115.2c0,-3.61619 2.78381,-6.4 6.4,-6.4zM96.0375,64c-2.66486,-0.01448 -5.05987,1.62368 -6.0125,4.1125l-22.0125,57.6c-0.81777,2.13701 -0.43317,4.54798 1.00888,6.32451c1.44205,1.77653 3.72243,2.64864 5.98192,2.28776c2.2595,-0.36089 4.15476,-1.89993 4.97169,-4.03726l3.3125,-8.6875h25.425l3.3125,8.6875c0.81694,2.13733 2.7122,3.67638 4.97169,4.03726c2.2595,0.36089 4.53987,-0.51123 5.98192,-2.28776c1.44205,-1.77653 1.82665,-4.18749 1.00888,-6.32451l-22.0125,-57.6c-0.94282,-2.46323 -3.30006,-4.09593 -5.9375,-4.1125zM96,88.325l7.825,20.475h-15.65z"></path></g></g></svg></div><?php echo $page_Lang['text_colors_title'][$dataUserPageLanguage];?></div> 
                       <div class="change_area_header">
                           <div class="selectedColorContainer"> 
                                <div class="selectedBgColor" id="txc" data-type="chtxcolor"><?php echo $page_Lang['choose_profile_text_color'][$dataUserPageLanguage];?></div>
                           </div> 
                       </div>
                       </div>
                       <!---->
                       <!---->
                       <div class="customizationWrapper">
                       <div class="customtit"><div class="custom_utuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M32,19.2c-6.9956,0 -12.8,5.8044 -12.8,12.8v25.6c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-25.6h25.6c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359zM134.4,19.2c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h25.6v25.6c-0.03264,2.30807 1.18,4.45492 3.17359,5.61848c1.99358,1.16356 4.45924,1.16356 6.45283,0c1.99358,-1.16356 3.20623,-3.31041 3.17359,-5.61848v-25.6c0,-6.9956 -5.8044,-12.8 -12.8,-12.8zM84.025,57.6l-25.7625,76.8h19.375l4.95,-16.875h25.0625l4.8,16.875h21.2875l-25.8125,-76.8zM94.725,74.8875h1l8.25,28.5875h-17.6625zM25.5,127.9125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v25.6c0,6.9956 5.8044,12.8 12.8,12.8h25.6c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-25.6v-25.6c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957zM166.3,127.9125c-3.5297,0.05517 -6.34834,2.9577 -6.3,6.4875v25.6h-25.6c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h25.6c6.9956,0 12.8,-5.8044 12.8,-12.8v-25.6c0.02369,-1.72992 -0.65393,-3.39575 -1.87846,-4.61793c-1.22453,-1.22218 -2.89166,-1.89659 -4.62154,-1.86957z"></path></g></g></svg></div><?php echo $page_Lang['fonts_title'][$dataUserPageLanguage];?></div> 
                       <div class="change_area_header">
                           <div class="selectedColorContainer"> 
                                <div class="selectedBgColor" id="fntp" data-type="chfnt" style="font-family: <?php echo $getfon; ?>;"><?php echo $page_Lang['choose_profile_font_style'][$dataUserPageLanguage];?></div>
                           </div> 
                       </div>
                       </div>
                    <!---->
                    <!---->
                       <div class="customizationWrapper_main">
                       <div class="customtit"><div class="custom_utuicon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M20,64c-1.024,0 -2.04812,0.39188 -2.82812,1.17188c-0.784,0.776 -1.17188,1.80412 -1.17188,2.82812v52c0,4.41828 3.58172,8 8,8h52c1.024,0 2.04412,-0.39587 2.82812,-1.17187c1.56,-1.56 1.56,-4.09626 0,-5.65626l-21.0625,-21.0625c11.26062,-9.98542 25.99488,-16.10938 42.23438,-16.10938c25.192,0 46.943,14.582 57.375,35.75c2.208,4.48 7.33413,6.67775 12.07813,5.09375c5.672,-1.888 8.55387,-8.36638 5.92187,-13.73438c-13.648,-27.88 -42.231,-47.10938 -75.375,-47.10938c-21.76404,0 -41.45944,8.40251 -56.34375,22l-20.82812,-20.82812c-0.78,-0.78 -1.80412,-1.17188 -2.82812,-1.17188z"></path></g></g></svg></div>Use Default Custom Colors</div> 
                       <div class="change_area_header">
                           <div class="selectedColorContainer"> 
                                <div class="bmg" data-type="maincustom">back to main colors</div>
                           </div> 
                       </div>
                       </div>
                       <!---->
                  </div>
                  <!---->
                  <div class="post_box_footer">
                      <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost"><?php echo $page_Lang['cancel'][$dataUserPageLanguage];?></div></div>
                      <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue theCustoms"  data-type="saveNewDesign" data-pbgcolor="<?php echo $profileBackgroundColor;?>" data-pheadericon="<?php echo $profilebuttonColors;?>" data-ptcolor="<?php echo $profileTextColor;?>" data-fonts="<?php echo $profileSelectedFont;?>" data-headercolor="<?php echo $profileHeaderSecondColors;?>" data-headericontwo="<?php echo $profileHeaderSecondicons;?>"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></div>
                   </div>
                  <!---->
          </div>
    </div>
</div>		        
		  <?php }
	}
	// Save Profile Design
	if($activity == 'saveNewDesign'){
	   if(isset($_POST['pbgall']) && isset($_POST['phicon']) && isset($_POST['phtc']) && isset($_POST['pfnt'])){
		   $profileBackgroundColor = mysqli_real_escape_string($db, $_POST['pbgall']);
		   $profileHeaderIcon  = mysqli_real_escape_string($db, $_POST['phicon']);
		   $profileTextColor = mysqli_real_escape_string($db, $_POST['phtc']);
		   $profileFont = mysqli_real_escape_string($db, $_POST['pfnt']);  
		   //Check Color IDs in Data
		    if(!empty($profileBackgroundColor)){
				$checkprofileBackgroundColor = $Dot->Dot_CheckColorisExist($profileBackgroundColor); 
				if(!$checkprofileBackgroundColor){ 
				    echo $page_Lang['choose_correct_background_color'][$dataUserPageLanguage]; exit();  
			    }
			}
		    if(!empty($profileTextColor)){
			   $checkprofileTextColor = $Dot->Dot_CheckColorisExist($profileTextColor);
			   if(!$checkprofileTextColor){
				   echo $page_Lang['choose_correct_text_color'][$dataUserPageLanguage]; exit();
			   }
			}
			if(!empty($profileFont)){
				$checkprofileFont = $Dot->Dot_CheckFontisExist($profileFont);
				if(!$checkprofileFont){
					echo $page_Lang['choose_correct_font_style'][$dataUserPageLanguage]; exit();
			    }
			}
			if(!empty($profileHeaderIcon)){
		        $checkIconColorExist = $Dot->Dot_CheckColorisExist($profileHeaderIcon); 
				if(!$checkIconColorExist){
					echo $page_Lang['choose_correct_icon_color'][$dataUserPageLanguage]; exit();
			     }
			}
			// If everything is ok then save design  
			$saveDesign = $Dot->Dot_SaveUserDesign($uid, $profileBackgroundColor, $profileHeaderIcon, $profileTextColor, $profileFont); 
			if($saveDesign){
			     echo '1';
			}
	   }
	}
	// Chat Self Destruction Message Open
	if($activity == 'selfDestruction'){
	    if(isset($_POST['chatID']) && isset($_POST['time'])){
		   $destructionChatID = mysqli_real_escape_string($db, $_POST['chatID']);
		   $destructionTime  = mysqli_real_escape_string($db, $_POST['time']);
		   $DestructionMessage = $Dot->Dot_GetSelfDescrutionMessage($destructionChatID, $destructionTime);
		   if($DestructionMessage){
			   foreach($DestructionMessage as $dm){
			       // Destruction Chat Message Details
			       $dmID = $dm['msg_id']; 
				   $dmFromUserID = $dm['from_user_id'];
				   $dmToUserID = $dm['to_user_id'];
				   $dmMessageText = $dm['message_text'];
				   $dmMessageCreatedTime = $dm['message_created_time'];
				   $dmMessageType = $dm['message_type'];
				   $dmImageID = $dm['imageid'];
				   $dmVideoID = $dm['videoid'];
				   $dmFileName = $dm['file_name'];
				   $dmFile = $dm['file'];
				   $dmFileExtension = $dm['file_extension'];
				   //STARTED
				   // Get if Uploded Message
				   $uploadedFile = '';
				   // Get if Uploaded Video
				   $uploadedVideoFile = '';
				   // Get if Text
				   $ChatText = '';
				   $from_to_class= 'you';
				   $from_to_class_image = 'image_you';
				   $from_to_class_video = 'video_you';
				   $class_set = 'm_time_me';
				   if($dmToUserID == $uid){
					   $from_to_class = 'friend';
					   $from_to_class_image = 'image_friend';
					   $from_to_class_video = 'video_friend';
					   $class_set = 'm_time_friend';
				   }  
				   if($dmMessageText){
					   $ChatText = '<div class="'.$from_to_class.'">'.htmlcode($dmMessageText).'</div>';
				   }
				    if($dmFile){
				    $extensionArray = array('ai' => "file_ai",'pdf' => "file_pdf",'eps' => "file_eps", 'tif' => "file_tif",  'doc' => "file_doc",  'docx' => "file_doc",  'zip' => "file_zip",  'rar' => "file_rar", 'psd' => "file_psd", 'txt' => "file_txt");
				    $fileID = $Dot->Dot_GetUploadChatFileID($dmFile); 
					$messagefileID = $fileID['file_id'];
					$messageUploadedFilen = $fileID['uploaded_file'];
					$messageUploadedFileExtension = $fileID['extension'];
					$uploadedFile = '<a href="'.$base_url.'uploads/files/'.$messageUploadedFilen.'" download="'.$messageUploadedFilen.'"><div class="file_item '.$from_to_class_image.'"><div class="file_extensions_icon '.$extensionArray[$messageUploadedFileExtension].'"></div><div class="file_name_ex truncate">'.$dmFileName.'</div></div></a>';
			      }
				   if($dmVideoID){
				   $videoDetails = $Dot->Dot_GetUploadChatVideoID($dmVideoID);
				   $mvideoName = $videoDetails['uploaded_video'];
				   $mvideoExtension = $videoDetails['extension']; 
				  $videoTumbnail ='';
				  if(file_exists($base_url.$videoPath.$mvideoName.'.png')){
				  	  $videoTumbnail = $base_url.'uploads/video/'.$mvideoName.'.png';   
				  }else{
				  	  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
				  }
				  $uploadedVideoFile = '<div class="'.$from_to_class_video.'"><div class="media-wrapper videoNew UploadedItemNew"><video id="player1" width="100%" height="auto" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$mvideoName.'.'.$mvideoExtension.'" type="video/mp4"></video></div></div>';
			   } 
				   //FINISHED 
				   echo '<div class="setTimeContainer"><div class="setTimeWrapperBody"><div class="timerContainerTwo"><div class="timeheader">'.$page_Lang['message_will_self'][$dataUserPageLanguage].' <span id="downtime"></span></div><div class="destructionmessagebody">';
				   echo $ChatText;
				   echo $uploadedFile;
				   echo $uploadedVideoFile;
				   //Images STARTED
				   if($dmImageID){
				   $ExploreImage = explode(",", $dmImageID);
			       $CountExplodes=count($ExploreImage); 
			       echo '<div class="theImages '.$from_to_class_image.'">';
						  foreach($ExploreImage as $a) {
							$newdata=$Dot->Dot_GetUploadChatImageID($a); 
								if($newdata){
									 $final_image=$base_url."uploads/images/".$newdata['uploaded_image'];  
								} 
								echo '
										<div class="sldimg">
										  <div class="sld_jjzlbU" style="background-image:url('.$final_image.');">
											<img src="'.$final_image.'" class="sld-exPexU">
										  </div>
										</div>
										';
						 } 
					  echo ' </div>';
			      } 
				   //Images FINISHED  
				   echo '</div></div></div></div>';
			   }
		       
		   }else{
		       echo '1';
		   }
		}
	}
	// Chang Destruction
	if($activity == 'setIt'){
	     if(isset($_POST['chatID']) && isset($_POST['time'])){
		   $destructionChatID = mysqli_real_escape_string($db, $_POST['chatID']);
		   $destructionTime  = mysqli_real_escape_string($db, $_POST['time']);
		   $changeDestruction = $Dot->Dot_Desturction($destructionChatID, $destructionTime);
		   if($changeDestruction){
		      echo '1';
		   }
		 }
	}  
	//Social Share
	if($activity == 'socialshare'){
	     if(isset($_POST['postNumber'])){
	          $postNumber = mysqli_real_escape_string($db, $_POST['postNumber']);
			  $getPostUrl = $Dot->Dot_StatusPostID($postNumber);
			  $datasPostSlug = isset($getPostUrl['slug']) ? $getPostUrl['slug'] : NULL;
			  $datasID = isset($getPostUrl['post_id']) ? $getPostUrl['post_id'] : NULL;
			  if($datasPostSlug){
				   $sslugSeo = $base_url.'status/'.$datasPostSlug;
				}else{
				   $sslugSeo = $base_url.'status/'.$datasID;
				}
				
			  ?>
              <div class="social_share_buttons_container openSocial">
   <div class="shareonSocial">
         <div class="shareonSocialHeader"><?php echo $page_Lang['share_this_post_on'][$dataUserPageLanguage];?> <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="share_buttons_wrap">
               <!---->
              <div class="socialShareButtonItem"> 
                    <a id="facebook" onclick="o_share_social('facebook', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="facebook" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><circle cx="24" cy="24" transform="scale(4,4)" r="20" fill="#3f51b5"></circle><path d="M117.472,96h-13.472v48h-20v-48h-12v-16h12v-9.64c0.008,-14.032 5.836,-22.36 22.368,-22.36h13.632v16h-9.148c-6.436,0 -6.852,2.4 -6.852,6.892v9.108h16z" fill="#ffffff"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">facebook</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
                 <a id="twitter" onclick="o_share_social('twitter', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="twitter" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><circle cx="24" cy="24" transform="scale(4,4)" r="20" fill="#03a9f4"></circle><path d="M144,68.48c-3.528,1.564 -7.996,3.032 -12,3.52c4.072,-2.416 10.532,-7.448 12,-12c-3.804,2.236 -10.684,4.624 -15.172,5.488c-3.584,-3.8 -8.696,-5.488 -14.36,-5.488c-10.88,0 -18.468,9.22 -18.468,20v8c-16,0 -31.6,-12.188 -41.308,-24c-1.708,2.884 -2.668,6.26 -2.668,9.828c0,7.276 6.684,14.66 11.976,18.172c-3.228,-0.1 -9.34,-2.564 -12,-4c0,0.064 0,0.144 0,0.228c0,9.468 6.644,15.896 15.648,17.688c-1.644,0.452 -3.648,2.084 -11.36,2.084c2.504,7.74 15.092,11.832 23.712,12c-6.744,5.228 -18.768,8 -28,8c-1.596,0 -2.46,0.088 -4,-0.092c8.712,5.52 20.88,8.092 32,8.092c36.228,0 56,-27.672 56,-53.48c0,-0.848 -0.028,-3.688 -0.072,-4.52c3.872,-2.728 5.44,-5.584 8.072,-9.52" fill="#ffffff"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">twitter</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
                 <a id="twitter" onclick="o_share_social('pinterest', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="pinterest" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><circle cx="24" cy="24" transform="scale(4,4)" r="20" fill="#d32f2f"></circle><path d="M78.248,108c0,-13.316 -2.248,-17.928 -2.248,-23.152c0,-11.876 8.524,-12.848 12.128,-12.848c5.136,0 11.872,3.484 11.872,10c0,9.484 -8,10.684 -8,10.684c0,0 0,3.316 0,9.156c0,6.16 1.488,14.16 12.492,14.16c17.656,0 19.508,-24.608 19.508,-31.348c0,-9.316 -5.96,-28.652 -27.148,-28.652c-28.26,0 -32.852,25.252 -32.852,32c0,2.888 0.528,8.488 1.076,10.668c8.424,2.08 6.46,9.5 4.176,11.58c-3.316,3.064 -17.252,3.66 -17.252,-24.948c0,-27.248 24.288,-41.3 45.608,-41.3c20.288,0 42.392,14.008 42.392,40.984c0,24.072 -17.308,43.028 -35.488,43.028c-10.912,0 -16.7,-8.992 -16.7,-8.992c0,16.98 -13.832,41.312 -15.812,44.98c0,0 6.248,-31.416 6.248,-56z" fill="#ffffff"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">pinterest</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('tumblr', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="tumblr" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M168,148c0,11.04688 -8.95312,20 -20,20h-104c-11.04688,0 -20,-8.95312 -20,-20v-104c0,-11.04688 8.95312,-20 20,-20h104c11.04688,0 20,8.95312 20,20z" fill="#01579b"></path><path d="M128,139.5625c0,0.375 -0.14062,0.73438 -0.4375,0.98438c-0.34375,0.3125 -8.67188,7.45312 -27.78125,7.45312c-22.89063,0 -23.5625,-25.64062 -23.5625,-28.5625l-0.21875,-31.4375h-10.6875c-0.73438,0 -1.3125,-0.59375 -1.3125,-1.3125v-12.40625c0,-0.54688 0.32812,-1.03125 0.82812,-1.23438c0.21875,-0.07812 20.6875,-8.32812 20.6875,-27.73438c0,-0.73438 0.57813,-1.3125 1.3125,-1.3125h11.85938c0.73438,0 1.3125,0.57812 1.3125,1.3125v26.6875h22.6875c0.71875,0 1.3125,0.57812 1.3125,1.3125v13.375c0,0.73438 -0.59375,1.3125 -1.3125,1.3125h-22.6875v30.84375c0,0.40625 1.26562,10.07812 11.04688,10.07812c8.07812,0 14.875,-4.17188 14.95312,-4.21875c0.40625,-0.26562 0.90625,-0.26562 1.32812,-0.04687c0.42188,0.23437 0.67188,0.6875 0.67188,1.15625z" fill="#ffffff"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">tumblr</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('vkontakte', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="vkontakte" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><path d="M168,148c0,11.048 -8.952,20 -20,20h-104c-11.044,0 -20,-8.952 -20,-20v-104c0,-11.048 8.956,-20 20,-20h104c11.048,0 20,8.952 20,20z" fill="#1976d2"></path><path d="M143.748,72.164c0.184,-0.604 0.272,-1.164 0.248,-1.664c-0.06,-1.448 -1.056,-2.5 -3.4,-2.5h-10.472c-2.644,0 -3.864,1.6 -4.576,3.204c0,0 -6.528,13.436 -14.052,22.296c-2.44,2.564 -3.68,2.5 -5,2.5c-0.708,0 -2.496,-0.856 -2.496,-3.204v-20.74c0,-2.776 -0.692,-4.056 -2.928,-4.056h-18.596c-1.628,0 -2.476,1.28 -2.476,2.564c0,2.668 3.592,3.308 4,10.784v14.492c0,3.52 -0.612,4.16 -1.932,4.16c-3.56,0 -10.568,-12 -15.26,-27.728c-1.016,-3.096 -2.032,-4.272 -4.676,-4.272h-10.572c-3.052,0 -3.56,1.496 -3.56,3.096c0,2.884 2.4,18.476 15.5,36.404c9.5,13 22.016,20.5 33.096,20.5c6.712,0 7.4,-1.708 7.4,-4.376v-11.888c0.004,-3.204 0.736,-3.736 2.872,-3.736c1.524,0 4.632,1 10.632,8c6.92,8.072 8.176,12 12.144,12h10.472c2.432,0 3.828,-1.02 3.884,-3c0.012,-0.504 -0.06,-1.068 -0.224,-1.696c-0.776,-2.304 -4.336,-7.936 -8.776,-13.304c-2.46,-2.972 -4.888,-5.916 -6.004,-7.516c-0.748,-1.044 -1.032,-1.78 -0.996,-2.484c0.036,-0.74 0.42,-1.444 0.996,-2.428c-0.104,0 13.432,-19.004 14.752,-25.408z" fill="#ffffff"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">vkontakte</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('reddit', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="reddit" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M48.76562,78.21875c-7.75,-6.96875 -19.15625,-6.90625 -25.45312,0.125c-6.29688,7.01562 -5.20312,20.07812 3.70312,26.51562z" fill="#ffffff"></path><path d="M143.23438,78.21875c7.75,-6.96875 19.15625,-6.90625 25.45312,0.125c6.29688,7.01562 5.20312,20.07812 -3.70312,26.51562z" fill="#ffffff"></path><path d="M167.28125,41.90625c0,7.71875 -6.26563,14 -14,14c-7.73438,0 -14,-6.28125 -14,-14c0,-7.73438 6.26562,-14 14,-14c7.73437,0 14,6.26562 14,14z" fill="#ffffff"></path><path d="M168.6875,114.4375c0,-28.59375 -32.39062,-51.78125 -72.34375,-51.78125c-39.95313,0 -72.34375,23.1875 -72.34375,51.78125c0,28.60938 32.39062,51.79688 72.34375,51.79688c39.95312,0 72.34375,-23.1875 72.34375,-51.79688z" fill="#ffffff"></path><path d="M133,105.5625c0,6.375 -5.17188,11.53125 -11.54688,11.53125c-6.35937,0 -11.53125,-5.15625 -11.53125,-11.53125c0,-6.375 5.17188,-11.53125 11.53125,-11.53125c6.375,0 11.54688,5.15625 11.54688,11.53125z" fill="#d84315"></path><path d="M82.07812,105.5625c0,6.375 -5.17187,11.53125 -11.53125,11.53125c-6.375,0 -11.54688,-5.15625 -11.54688,-11.53125c0,-6.375 5.17188,-11.53125 11.54688,-11.53125c6.35938,0 11.53125,5.15625 11.53125,11.53125z" fill="#d84315"></path><path d="M96.01562,139.60938c-13.01562,0 -24.5625,-2.98438 -32.01562,-7.60938c4.09375,8.17188 16.78125,16 32.01562,16c15.20313,0 27.89063,-7.82812 31.98438,-16c-7.42188,4.625 -18.98438,7.60938 -31.98438,7.60938z" fill="#37474f"></path><path d="M167.3125,108.10938l-4.67188,-6.48438c3.32813,-2.40625 5.48438,-6.23438 5.95313,-10.5c0.42187,-3.92188 -0.625,-7.60938 -2.89063,-10.125c-2.28125,-2.54688 -5.5625,-3.95312 -9.21875,-3.96875c-3.71875,0.04687 -7.57812,1.45312 -10.59375,4.15625l-5.34375,-5.95312c4.5,-4.03125 10.1875,-6.09375 15.96875,-6.20312c5.95313,0.03125 11.32813,2.375 15.14063,6.625c3.76562,4.20312 5.54687,10.15625 4.89062,16.32812c-0.70312,6.51562 -4.0625,12.40625 -9.23438,16.125z" fill="#37474f"></path><path d="M24.67188,108.10938c-5.15625,-3.73438 -8.51562,-9.60938 -9.21875,-16.125c-0.67187,-6.17188 1.10938,-12.125 4.89063,-16.32812c3.79687,-4.23438 9.1875,-6.59375 15.125,-6.625c0.04687,0 0.07812,0 0.10937,0c5.76563,0 11.40625,2.20312 15.85938,6.21875l-5.34375,5.95312c-3,-2.71875 -6.75,-4.03125 -10.57813,-4.17187c-3.65625,0.01562 -6.9375,1.42187 -9.21875,3.98437c-2.25,2.5 -3.3125,6.1875 -2.89062,10.10938c0.46875,4.26562 2.625,8.09375 5.95312,10.5z" fill="#37474f"></path><path d="M100,67.35938h-8c0,-11.54688 0,-42.1875 19.92188,-42.1875c8.60938,0 12.76562,4.84375 15.79688,8.375c2.51562,2.9375 3.84375,4.34375 6.46875,4.34375h5.48438v8h-5.48438c-6.42188,0 -9.8125,-3.95312 -12.54688,-7.14062c-2.67187,-3.125 -4.78125,-5.59375 -9.73437,-5.59375c-8,0.01562 -11.90625,11.20312 -11.90625,34.20312z" fill="#37474f"></path><path d="M96.34375,67.79688c37.6875,0 68.34375,20.92188 68.34375,46.64062c0,25.73438 -30.65625,46.65625 -68.34375,46.65625c-37.6875,0 -68.34375,-20.92188 -68.34375,-46.65625c0,-25.71875 30.65625,-46.64062 68.34375,-46.64062M96.34375,59.79688c-42.17188,0 -76.34375,24.46875 -76.34375,54.64062c0,30.1875 34.1875,54.65625 76.34375,54.65625c42.15625,0 76.34375,-24.46875 76.34375,-54.65625c0,-30.17188 -34.1875,-54.64062 -76.34375,-54.64062z" fill="#37474f"></path><path d="M153.28125,31.90625c5.51562,0 10,4.48437 10,10c0,5.5 -4.48438,10 -10,10c-5.51563,0 -10,-4.5 -10,-10c0,-5.51563 4.48437,-10 10,-10M153.28125,23.90625c-9.9375,0 -18,8.04687 -18,18c0,9.9375 8.0625,18 18,18c9.9375,0 18,-8.0625 18,-18c0,-9.95313 -8.04688,-18 -18,-18z" fill="#37474f"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">reddit</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
                <a id="twitter" onclick="o_share_social('linkedin', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="linkedin" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><circle cx="24" cy="24" transform="scale(4,4)" r="20" fill="#0288d1"></circle><rect x="14" y="19" transform="scale(4,4)" width="4" height="15" fill="#ffffff"></rect><path d="M63.952,68h-0.088c-4.776,0 -7.864,-3.56 -7.864,-8.004c0,-4.54 3.184,-7.996 8.044,-7.996c4.868,0 7.864,3.456 7.956,7.996c0,4.444 -3.088,8.004 -8.048,8.004z" fill="#ffffff"></path><path d="M140,98c0,-12.152 -9.848,-22 -22,-22c-7.448,0 -14.02,3.712 -18,9.376v-9.376h-16v60h16v-32c0,-6.628 5.372,-12 12,-12c6.628,0 12,5.372 12,12v32h16c0,0 0,-36.316 0,-38z" fill="#ffffff"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">linkedin</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('whatsapp', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="whatsapp" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="none" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" fill-rule="nonzero"></path><g><g id="surface1"><path d="M19.46875,173.21875l10.78125,-39.34375c-6.65625,-11.51562 -10.14062,-24.57812 -10.14062,-37.95312c0.01562,-41.85938 34.07812,-75.92188 75.95312,-75.92188c20.3125,0.01562 39.375,7.92188 53.71875,22.26562c14.32812,14.34375 22.23437,33.42188 22.21875,53.70313c-0.01562,41.875 -34.09375,75.92187 -75.9375,75.92187c-0.01562,0 0,0 0,0h-0.03125c-12.71875,0 -25.20313,-3.1875 -36.29688,-9.23437z" fill="#ffffff" fill-rule="nonzero"></path><path d="M19.46875,175.21875c-0.53125,0 -1.03125,-0.21875 -1.42188,-0.59375c-0.5,-0.51562 -0.6875,-1.25 -0.5,-1.9375l10.54688,-38.54688c-6.53125,-11.625 -9.98438,-24.82812 -9.98438,-38.21875c0.01562,-42.96875 34.98438,-77.92188 77.95312,-77.92188c20.82812,0.01562 40.40625,8.125 55.125,22.85938c14.71875,14.71875 22.82812,34.29688 22.8125,55.10938c-0.01562,42.96875 -34.98438,77.92187 -77.9375,77.92187c-12.76562,0 -25.375,-3.14062 -36.57812,-9.10937l-39.5,10.35937c-0.17188,0.04688 -0.34375,0.07813 -0.51562,0.07813z" fill="#ffffff" fill-rule="nonzero"></path><path d="M96.0625,20c20.3125,0.01562 39.375,7.92188 53.71875,22.26562c14.32812,14.34375 22.23437,33.42188 22.21875,53.70313c-0.01562,41.875 -34.09375,75.92187 -75.9375,75.92187h-0.03125c-12.71875,0 -25.20313,-3.1875 -36.29688,-9.23437l-40.26562,10.5625l10.78125,-39.34375c-6.65625,-11.51562 -10.14062,-24.57812 -10.14062,-37.95312c0.01562,-41.85938 34.07812,-75.92188 75.95312,-75.92188M96.0625,171.89062v0M96.0625,171.89062v0M96.0625,16c-44.07812,0 -79.9375,35.84375 -79.95312,79.92188c0,13.46875 3.39062,26.73438 9.84375,38.48438l-10.34375,37.75c-0.375,1.39062 0.01562,2.85937 1.01562,3.875c0.76562,0.76562 1.79688,1.1875 2.84375,1.1875c0.34375,0 0.6875,-0.04688 1.01562,-0.14063l38.75,-10.15625c11.3125,5.875 24,8.96875 36.79688,8.98438c44.09375,0 79.95312,-35.85938 79.96875,-79.92188c0.01562,-21.35938 -8.29688,-41.4375 -23.39062,-56.54688c-15.09375,-15.10938 -35.1875,-23.42188 -56.54688,-23.4375z" fill="#cfd8dc" fill-rule="nonzero"></path><path d="M140.70312,51.32812c-11.92187,-11.92187 -27.76562,-18.5 -44.625,-18.5c-34.8125,0 -63.14062,28.29688 -63.15625,63.09375c0,11.92188 3.34375,23.53125 9.65625,33.57812l1.5,2.39062l-6.375,23.28125l23.89063,-6.26562l2.3125,1.375c9.6875,5.75 20.79687,8.79687 32.125,8.79687h0.03125c34.78125,0 63.09375,-28.3125 63.10938,-63.10937c0.01562,-16.85938 -6.54688,-32.71875 -18.46875,-44.64063z" fill="#40c351" fill-rule="nonzero"></path><path d="M77.07812,64.1875c-1.42187,-3.17188 -2.92187,-3.23438 -4.28125,-3.28125c-1.10938,-0.04688 -2.375,-0.04688 -3.64062,-0.04688c-1.25,0 -3.3125,0.46875 -5.04688,2.375c-1.75,1.89062 -6.65625,6.48438 -6.65625,15.82812c0,9.32812 6.8125,18.35938 7.75,19.625c0.95313,1.25 13.14063,21.03125 32.42188,28.64062c16.03125,6.3125 19.29688,5.0625 22.76562,4.75c3.48438,-0.32812 11.23438,-4.59375 12.8125,-9.03125c1.57813,-4.42188 1.57813,-8.21875 1.10938,-9.01562c-0.46875,-0.79688 -1.73438,-1.26563 -3.64062,-2.21875c-1.89062,-0.95312 -11.21875,-5.53125 -12.96875,-6.17188c-1.73437,-0.625 -3,-0.9375 -4.26562,0.95313c-1.26562,1.89062 -4.90625,6.17187 -6.01562,7.4375c-1.10938,1.26562 -2.20312,1.42187 -4.10938,0.48437c-1.89062,-0.95312 -8,-2.95312 -15.25,-9.42187c-5.64062,-5.03125 -9.45312,-11.23438 -10.5625,-13.14063c-1.10938,-1.89062 -0.125,-2.92187 0.82812,-3.875c0.85938,-0.84375 1.90625,-2.21875 2.85938,-3.32812c0.9375,-1.10938 1.25,-1.89062 1.89062,-3.15625c0.625,-1.26563 0.3125,-2.375 -0.15625,-3.32813c-0.46875,-0.95312 -4.15625,-10.32812 -5.84375,-14.07812z" fill="#ffffff" fill-rule="evenodd"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">whatsapp</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('viber', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="viber" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><path d="M96,20c-10.556,0 -42.68,0 -60.44,16.216c-10.576,10.536 -15.56,25.76 -15.56,47.784v12c0,22.024 4.984,37.248 15.684,47.904c5.328,4.86 12.592,8.744 21.472,11.428l2.844,0.856v21.312c0,2.5 0.724,2.5 0.964,2.5c0.492,0 1.28,-0.156 2.776,-1.484c0.36,-0.356 3,-3.212 15.84,-17.596l1.296,-1.452l1.94,0.124c4.3,0.268 8.736,0.408 13.184,0.408c10.556,0 42.68,0 60.44,-16.22c10.572,-10.536 15.56,-25.76 15.56,-47.78v-12c0,-22.024 -4.984,-37.248 -15.684,-47.904c-17.636,-16.096 -49.76,-16.096 -60.316,-16.096z" fill="#ffffff"></path><path d="M133.804,115.416c-4.444,-3.744 -6.496,-4.876 -12.632,-8.56c-2.556,-1.532 -6.452,-2.856 -8.496,-2.856c-1.396,0 -3.068,1.068 -4.092,2.092c-2.624,2.624 -3.484,5.908 -8.084,5.908c-4.5,0 -12.36,-4.58 -18,-10.5c-5.92,-5.64 -10.5,-13.5 -10.5,-18c0,-4.6 3.224,-5.52 5.848,-8.148c1.024,-1.02 2.152,-2.692 2.152,-4.088c0,-2.044 -1.324,-5.88 -2.856,-8.436c-3.684,-6.14 -4.812,-8.192 -8.56,-12.632c-1.268,-1.504 -2.712,-2.192 -4.224,-2.196c-2.556,-0.004 -5.912,1.264 -8.184,2.956c-3.416,2.548 -6.988,6.016 -7.944,10.336c-0.128,0.588 -0.204,1.18 -0.228,1.772c-0.184,4.5 1.584,9.068 3.492,12.936c4.492,9.116 10.436,17.94 16.904,25.82c2.068,2.52 4.32,4.864 6.652,7.128c2.264,2.328 4.608,4.58 7.128,6.652c7.88,6.468 16.704,12.412 25.82,16.904c3.832,1.888 8.344,3.624 12.8,3.496c0.636,-0.02 1.272,-0.092 1.908,-0.232c4.32,-0.952 7.788,-4.528 10.336,-7.944c1.692,-2.272 2.96,-5.624 2.956,-8.184c-0.004,-1.512 -0.692,-2.956 -2.196,-4.224z" fill="#7e57c2"></path><path d="M136,96c-2.208,0 -4,-1.792 -4,-4v-4c0,-19.848 -16.152,-36 -36,-36c-2.208,0 -4,-1.792 -4,-4c0,-2.208 1.792,-4 4,-4c24.26,0 44,19.74 44,44v4c0,2.208 -1.792,4 -4,4z" fill="#7e57c2"></path><path d="M111.432,88c-1.776,0 -3.4,-1.192 -3.868,-2.992c-1.096,-4.204 -4.376,-7.488 -8.564,-8.568c-2.14,-0.556 -3.424,-2.736 -2.872,-4.876c0.552,-2.136 2.728,-3.42 4.876,-2.872c6.992,1.812 12.472,7.288 14.3,14.296c0.556,2.14 -0.724,4.32 -2.86,4.88c-0.34,0.088 -0.68,0.132 -1.012,0.132z" fill="#7e57c2"></path><path d="M124,92c-2.208,0 -4,-1.792 -4,-4c0,-12.752 -9.976,-23.272 -22.712,-23.944c-2.208,-0.116 -3.9,-2 -3.784,-4.204c0.116,-2.208 2.032,-3.904 4.204,-3.784c16.988,0.896 30.292,14.924 30.292,31.932c0,2.208 -1.792,4 -4,4z" fill="#7e57c2"></path><path d="M96,16c-18,0 -46.048,1.656 -63.136,17.264c-12.08,12.028 -16.864,28.9 -16.864,50.736c0,1.808 -0.008,3.824 0.008,6c-0.016,2.172 -0.008,4.188 -0.008,5.996c0,21.836 4.784,38.708 16.864,50.736c6.504,5.94 14.616,9.848 23.136,12.424v18.344c0,6.384 4.196,6.5 4.964,6.5h0.036c1.976,-0.008 3.684,-0.976 5.396,-2.496c0.644,-0.572 8.08,-8.86 16.168,-17.924c4.816,0.308 9.392,0.42 13.432,0.42v0v0c18,0 46.044,-1.66 63.136,-17.268c12.076,-12.024 16.864,-28.9 16.864,-50.736c0,-1.808 0.008,-3.824 -0.008,-6c0.016,-2.176 0.008,-4.188 0.008,-6c0,-21.836 -4.784,-38.708 -16.864,-50.736c-17.088,-15.604 -45.132,-17.26 -63.132,-17.26zM164,94.604v1.392c0,19.624 -4.18,32.996 -13.144,42.048c-15.528,13.956 -45.108,13.956 -54.86,13.956c-2.968,0 -7.784,-0.004 -13.468,-0.4c-1.58,1.776 -18.528,20.732 -18.528,20.732v-23.452c-8.416,-2.02 -16.732,-5.332 -22.856,-10.832c-8.964,-9.056 -13.144,-22.428 -13.144,-42.052v-1.392c0,-1.404 -0.004,-2.92 0.008,-4.692c-0.012,-1.6 -0.012,-3.112 -0.008,-4.52v-1.392c0,-19.624 4.18,-32.996 13.144,-42.048c15.524,-13.956 45.108,-13.956 54.856,-13.956c9.748,0 39.328,0 54.852,13.956c8.968,9.052 13.144,22.424 13.144,42.048v1.392c0,1.404 0.004,2.92 -0.008,4.692c0.012,1.604 0.012,3.116 0.012,4.52z" fill="#7e57c2"></path></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">viber</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('digg', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="digg" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#0277bd"><g id="surface1"><path d="M56,42.40625c0,2.39062 0,13.59375 0,13.59375h18c0,0 2,0 2,-2.40625c0,-2.39063 0,-13.59375 0,-13.59375h-18c0,0 -2,0 -2,2.40625zM56,66.40625c0,2.39062 0,61.59375 0,61.59375h18c0,0 2,0 2,-2.40625c0,-0.39063 0,-61.59375 0,-61.59375h-18c0,0 -2,0 -2,2.40625zM34,40c0,0 -2,0 -2,2.40625v21.59375h-30c0,0 -2,0 -2,2.40625v61.59375h50c0,0 2,0 2,-2.40625c0,-2.39063 0,-85.59375 0,-85.59375zM32,113.59375c0,2.40625 -2,2.40625 -2,2.40625h-10v-37.59375c0,-2.40625 2,-2.40625 2,-2.40625h10zM138,64c0,0 -2,0 -2,2.40625v61.59375h32v8h-30c0,0 -2,0 -2,2.40625c0,2.39062 0,13.59375 0,13.59375h50c0,0 2,0 2,-2.40625c0,-2.39063 0,-85.59375 0,-85.59375zM168,113.59375c0,2.40625 -2,2.40625 -2,2.40625h-10v-37.59375c0,-2.40625 2,-2.40625 2,-2.40625h10zM82,64c0,0 -2,0 -2,2.40625v61.59375h32v8h-30c0,0 -2,0 -2,2.40625c0,2.39062 0,13.59375 0,13.59375h50c0,0 2,0 2,-2.40625c0,-2.39063 0,-85.59375 0,-85.59375zM112,113.59375c0,2.40625 -2,2.40625 -2,2.40625h-10v-37.59375c0,-2.40625 2,-2.40625 2,-2.40625h10z"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">digg</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
               <a id="twitter" onclick="o_share_social('delicious', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="delicious" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M24,40c0,-8.79688 7.20312,-16 16,-16h112c8.79688,0 16,7.20312 16,16v112c0,8.79688 -7.20312,16 -16,16h-112c-8.79688,0 -16,-7.20312 -16,-16z" fill="#eceff1"></path><path d="M152,24h-56v72h72v-56c0,-8.79688 -7.20312,-16 -16,-16z" fill="#448aff"></path><path d="M24,152c0,8.79688 7.20312,16 16,16h56v-72h-72z" fill="#37474f"></path><path d="M96,96v72h56c8.79688,0 16,-7.20312 16,-16v-56z" fill="#b0bec5"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">delicious</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('evernote', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="evernote" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#0ab856"><g id="surface1"><path d="M76.8,7.68c-10.59,0 -19.2,8.61 -19.2,19.2v19.2c0,2.115 -1.725,3.84 -3.84,3.84h-19.2c-8.295,0 -15.12,6.69 -15.21,14.925c-0.18,16.905 1.665,33.195 4.89,43.56c3.705,11.805 11.085,19.455 20.76,21.54l27.15,6.18c4.17,0.885 8.415,0.045 11.925,-2.37c3.51,-2.415 5.82,-6.06 6.51,-10.62l0.615,-8.97c4.41,5.52 11.715,8.715 20.16,8.715h11.52c8.475,0 15.36,6.885 15.36,15.36v11.52c0,6.345 -5.175,11.52 -11.52,11.52h-11.115c-2.055,0 -3.915,-1.38 -4.185,-3.165c-0.195,-1.17 0.105,-2.28 0.84,-3.15c0.735,-0.87 1.815,-1.365 2.94,-1.365h7.68c2.13,0 3.84,-1.725 3.84,-3.84v-15.36c0,-2.115 -1.71,-3.84 -3.84,-3.84h-11.52c-12.705,0 -23.04,10.335 -23.04,23.04v7.68c0,12.705 10.335,23.04 23.04,23.04h19.2c38.4,0 38.4,-54.465 38.4,-80.64c0,-26.52 -0.63,-43.875 -3.96,-59.64c-2.64,-12.45 -10.155,-19.77 -22.53,-21.75c-1.005,-0.105 -22.905,-2.325 -35.565,-2.97c-2.13,-6.36 -9.405,-11.64 -17.025,-11.64zM51.66,17.46l-27.12,27.12c3.03,-1.485 6.435,-2.34 10.02,-2.34h15.36v-15.36c0,-3.315 0.63,-6.48 1.74,-9.42zM132.48,76.8c5.31,0 9.6,4.305 9.6,9.6c0,2.28 -0.825,4.335 -2.145,5.985c-2.91,-2.415 -8.565,-4.065 -15.135,-4.065c-0.585,0 -1.14,0.045 -1.695,0.075c-0.15,-0.645 -0.225,-1.305 -0.225,-1.995c0,-5.31 4.29,-9.6 9.6,-9.6z"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">evernote</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('yahoo', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="yahoo" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#673ab7"><g id="surface1"><path d="M36,20c0,0 5.59375,1.20312 10,1.20312c4.40625,0 10,-1.20312 10,-1.20312l40,68l40.40625,-68c0,0 4.39062,1.59375 9.59375,1.59375c5.59375,0 10,-1.59375 10,-1.59375l-52,88l1.59375,64c0,0 -5.59375,-1.59375 -9.59375,-1.59375c-4,0 -10,1.59375 -10,1.59375l2,-64z"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">yahoo</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem">
              <a id="twitter" onclick="o_share_social('gmail', '<?php echo $base_url;?>status.php?msgID=<?php echo $postNumber;?>', '<?php echo $postNumber;?>')" title="gmail" rel="nofollow">
                   <div class="socialItem">
                       <div class="socialItem_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M22,162h148c7.73438,0 14,-6.26562 14,-14v-104c0,-7.73438 -6.26562,-14 -14,-14h-148c-7.73438,0 -14,6.26562 -14,14v104c0,7.73438 6.26562,14 14,14z" fill="#e0e0e0"></path><path d="M104,162h66c7.73438,0 14,-6.26562 14,-14v-104c0,-7.73438 -6.26562,-14 -14,-14h-148c-7.73438,0 -14,6.26562 -14,14z" fill="#d9d9d9"></path><path d="M26.98438,162h143.01562c7.73438,0 14,-6.26562 14,-14v-102z" fill="#eeeeee"></path><path d="M102.98438,162h67.01562c7.73438,0 14,-6.26562 14,-14v-102l-108.92188,80.46875z" fill="#e0e0e0"></path><path d="M170,38h-148c-7.73438,0 -14,-1.73438 -14,6v104c0,7.73438 6.26562,14 14,14h6v-114h136v114h6c7.73438,0 14,-6.26562 14,-14v-104c0,-7.73438 -6.26562,-6 -14,-6z" fill="#ca3737"></path><path d="M170,30h-148c-7.73438,0 -14,6.14062 -14,14c0,4.82812 6.07812,9.03125 6.07812,9.03125l81.92188,58l81.92188,-58c0,0 6.07812,-4.20313 6.07812,-9.03125c0,-7.85938 -6.26562,-14 -14,-14z" fill="#f5f5f5"></path><path d="M172.98438,30.32812l-76.98438,53.67188l-76.98438,-53.67188c-6.29687,1.34375 -11.01562,6.85938 -11.01562,13.67188c0,4.82812 6.07812,9.03125 6.07812,9.03125l81.92188,58l81.92188,-58c0,0 6.07812,-4.20313 6.07812,-9.03125c0,-6.8125 -4.71875,-12.32812 -11.01562,-13.67188z" fill="#e84f4b"></path></g></g></g></svg></div> 
                   </div>
                   </a>
                   <div class="socialsharename">gmail</div>
              </div>
              <!---->
              <!---->
              <div class="socialShareButtonItem"> 
                   <div class="socialItem" onclick="M.toast({html: '<?php echo $page_Lang['link_copied'][$dataUserPageLanguage];?>'})">
                       <div class="socialItem_icon copyUrl" data-clipboard-text="<?php echo $sslugSeo;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#34495e"><path d="M32,16c-8.84,0 -16,7.16 -16,16v112h16v-112h112v-16zM64,48c-8.84,0 -16,7.16 -16,16v96c0,8.84 7.16,16 16,16h96c8.84,0 16,-7.16 16,-16v-96c0,-8.84 -7.16,-16 -16,-16zM64,64h96v96h-96z"></path></g></g></svg></div> 
                   </div> 
                   <div class="socialsharename">Copy</div>
              </div>
              <!---->
         </div>
   </div>
</div>
              <?php
		 }
	}
	if($activity == 'chbgcolor'){?>
	<div class="social_share_buttons_container openSocial">
   <div class="shareonSocial">
         <div class="shareonSocialHeader"><?php echo $page_Lang['choose_profile_background_color'][$dataUserPageLanguage];?> <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="colorListWrapper">
         <div class="share_buttons_wrap">
               <?php 
			   $colors = $Dot->Dot_DataColors();
				if($colors){
				    foreach($colors as $cl){
					     $cid = $cl['id'];
						 $colorCode = $cl['colors'];
						 $colorName = $cl['color_name'];
						 $bselectedColor ='';
						 if($cid == $profileBackgroundColor){
							 $bselectedColor = 'beforeSelectedBgColor';
						 }
						 echo '<div class="selectablebgColor '.$bselectedColor.'" data-type="background_color" id="'.$cid.'" style="background-color:#'.$colorCode.'" data-color="'.$colorCode.'"></div> '; 
					}
				}  
			   ?>
         </div>
         </div>
   </div>
   <div class="selectedFooter"><div class="control right_btn"><div class="finishSelectC share_post_box waves-effect waves-light btn blue"><?php echo $page_Lang['end_color_selection'][$dataUserPageLanguage];?></div></div></div>
</div>     
    <?php }
	if($activity == 'chiccolor'){?>
	<div class="social_share_buttons_container openSocial">
   <div class="shareonSocial">
         <div class="shareonSocialHeader"><?php echo $page_Lang['choose_profile_icon_color'][$dataUserPageLanguage];?> <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="colorListWrapper">
         <div class="share_buttons_wrap">
               <?php 
			   $colors = $Dot->Dot_DataColors();
				if($colors){
				    foreach($colors as $cl){
					     $cid = $cl['id'];
						 $colorCode = $cl['colors'];
						 $colorName = $cl['color_name'];
						 $bselectedColor ='';
						 if($cid == $profileBackgroundColor){
							 $bselectedColor = 'beforeSelectedBgColor';
						 }
						 echo '<div class="selectablebgColor '.$bselectedColor.'" id="'.$cid.'" data-type="icon_color" style="background-color:#'.$colorCode.'" data-color="'.$colorCode.'"></div> '; 
					}
				}  
			   ?>
         </div> 
         </div>
   </div>
   <div class="selectedFooter"><div class="control right_btn"><div class="finishSelectC share_post_box waves-effect waves-light btn blue"><?php echo $page_Lang['end_color_selection'][$dataUserPageLanguage];?></div></div></div>
</div>     
	<?php }
	if($activity == 'chtxcolor'){?>
	<div class="social_share_buttons_container openSocial">
   <div class="shareonSocial">
         <div class="shareonSocialHeader"><?php echo $page_Lang['choose_profile_text_color'][$dataUserPageLanguage];?> <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="colorListWrapper">
         <div class="share_buttons_wrap">
               <?php 
			   $colors = $Dot->Dot_DataColors();
				if($colors){
				    foreach($colors as $cl){
					     $cid = $cl['id'];
						 $colorCode = $cl['colors'];
						 $colorName = $cl['color_name'];
						 $bselectedColor ='';
						 if($cid == $getIconColor){
							 $bselectedColor = 'beforeSelectedBgColor';
						 }
						 echo '<div class="selectablebgColor '.$bselectedColor.'" id="'.$cid.'" data-type="text_color" style="background-color:#'.$colorCode.'" data-color="'.$colorCode.'"></div> '; 
					}
				}  
			   ?>
         </div>
         </div>
   </div>
   <div class="selectedFooter"><div class="control right_btn"><div class="finishSelectC share_post_box waves-effect waves-light btn blue"><?php echo $page_Lang['end_color_selection'][$dataUserPageLanguage];?></div></div></div>
</div>     
	<?php }
	if($activity == 'chfnt'){?>
	<div class="social_share_buttons_container openSocial">
   <div class="shareonSocial">
         <div class="shareonSocialHeader"><?php echo $page_Lang['choose_profile_font_style'][$dataUserPageLanguage];?> <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="colorListWrapper">
         <div class="share_buttons_wrap">
               <?php 
			   $fonts = $Dot->Dot_DataFonts();
				if($fonts){
				    foreach($fonts as $fnt){
					     $fntID = $fnt['font_id'];
						 $fntName = $fnt['font_name'];
						 $fntCode = $fnt['font'];
						 $fntCodeS = $fnt['font_code'];
						 $beforeSelectedFont = '';
						 if($fntID == $profileSelectedFont){
						    $beforeSelectedFont = 'beforeSelectedFont';
						 }
						 echo '<div class="fontBox '.$beforeSelectedFont.'" id="'.$fntID.'" data-type="font_style" style="'.$fntCode.'" data-fnt="'.$fntCodeS.'">'.$fntName.'</div> ';
					}
				}  
			   ?>
         </div>
         </div>
   </div>
   <div class="selectedFooter"><div class="control right_btn"><div class="finishSelectC share_post_box waves-effect waves-light btn blue"><?php echo $page_Lang['end_color_selection'][$dataUserPageLanguage];?></div></div></div>
</div>     
	<?php }
	if($activity == 'searchGif'){ 
	    if(isset($_POST['gifKey'])){ 
		    $gifSearchName = mysqli_real_escape_string($db, $_POST['gifKey']);
			if(!empty($gifSearchName)){ 
				$file = file_get_contents('http://api.giphy.com/v1/gifs/search?q='.$gifSearchName.'&api_key='.$giphyapiKey.'');
				$json = json_decode($file);
				$count = count($json->data);
				if($count  == '0'){
				    echo '<div class="no-gif-found">'.$page_Lang['no_gif_founded'][$dataUserPageLanguage].'</div>';
					exit();
				}
				for($i = 0 ; $i < $count; $i++){
                       $giphyImageUrl = @$json->data[$i]->images->fixed_height->url;
					   echo '<div class="imageGiphy" data-image="'.$giphyImageUrl.'" data-id="'.$i.'"><img src="'.$giphyImageUrl.'"></div>';
                 }
			}
		}
	}
	// Show Created Event Form
	if($activity == 'newEvent'){
	      include("../contents/html_create_event.php");
	}
	// Insert New Event    &e_sharewall='+shareeventonwall+'&e_gcanpost='+guestcanpost+'&e_caninvite='+guestcaninvite+'&e_type='+eventtype
	if($activity == 'createEvent'){
		 $inArrayType = array("0","1");
	     if(isset($_POST['e_name']) && isset($_POST['e_loc']) && isset($_POST['e_start']) && isset($_POST['e_end']) && isset($_POST['e_st']) && isset($_POST['e_et']) && isset($_POST['e_desc']) && in_array($_POST['e_sharewall'], $inArrayType) && in_array($_POST['e_gcanpost'], $inArrayType) && in_array($_POST['e_caninvite'], $inArrayType)  && isset($_POST['e_type'])){
			   $event_cover_image = mysqli_real_escape_string($db, $_POST['e_co']);
			   $theCoverEvent = empty($event_cover_image) ? '23' : $event_cover_image;
			   $event_name = mysqli_real_escape_string($db, $_POST['e_name']);
			   $event_location = mysqli_real_escape_string($db, $_POST['e_loc']);
			   $event_start = mysqli_real_escape_string($db, $_POST['e_start']);
			   $event_end = mysqli_real_escape_string($db, $_POST['e_end']);
			   $event_start_time = mysqli_real_escape_string($db, $_POST['e_st']);
			   $event_end_time = mysqli_real_escape_string($db, $_POST['e_et']);
			   $event_description = mysqli_real_escape_string($db, $_POST['e_desc']); 
			   $event_ShareOnWall = mysqli_real_escape_string($db, $_POST['e_sharewall']);
			   $event_GuestsCanPostOnEventWall = mysqli_real_escape_string($db, $_POST['e_gcanpost']);
			   $event_GuestsCanInvite = mysqli_real_escape_string($db, $_POST['e_caninvite']);
			   $event_Type = mysqli_real_escape_string($db, $_POST['e_type']);
			   $slugEvent = 'p_'.time().'_'.url_slug($event_name);
			   $preg = '/^(?:[01][0-9]|2[0-3]):[0-5][0-9]$/';
			   function validateDate($date, $format = 'Y-m-d') {
					$d = DateTime::createFromFormat($format, $date); 
					return $d && $d->format($format) === $date;
				}
			   if(empty($event_name)){
				    echo $page_Lang['event_name_can_not_be_blank'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_location)){
				    echo $page_Lang['event_location_can_not_be_blank'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_start)){
				    echo $page_Lang['please_write_event_start_date'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_end)){
				    echo $page_Lang['please_write_event_end_date'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_description)){
				    echo $page_Lang['event_description_can_not_be_empty'][$dataUserPageLanguage];
					exit();
			   }
			   if(!validateDate($event_start)){
			       echo $page_Lang['wrong_date_format'][$dataUserPageLanguage];
				   exit();
			   }
			   if(!validateDate($event_end)){
			       echo $page_Lang['wrong_date_format'][$dataUserPageLanguage];
				   exit();
			   }
			   if(!preg_match($preg,$event_start_time)) {
					echo $page_Lang['wrong_time_format'][$dataUserPageLanguage];
					exit();
				}
				if(!preg_match($preg,$event_end_time)) {
					echo $page_Lang['wrong_time_format'][$dataUserPageLanguage];
					exit();
				} 
			   $saveEvent = $Dot->Dot_NewEventInsert($uid, htmlcode($event_name), htmlcode($event_location), htmlcode($event_description), $event_start,$event_start_time, $event_end, $event_end_time,$event_ShareOnWall,$event_GuestsCanPostOnEventWall,$event_GuestsCanInvite,$event_Type,$slugEvent,$theCoverEvent);
			   if($saveEvent){
			         echo $saveEvent;
			   }else{
			      echo '200';
			   }
		 }
	}
	// Get Event Categories
	if($activity == 'eventCategories'){ 
		 if($EventCategories){
			 echo ' <div class="event_list_back"></div>
						  <div class="event_list_container">
							  <div class="event_list_header">'.$page_Lang['select_event_type'][$dataUserPageLanguage].' <div class="closeevList"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
							  <div class="event_all_list_wrapper">
								   <div class="event_list_item_container"> ';
									 foreach($EventCategories as $event){
										  $eventcID = $event['ev_id'];
										  $eventcKey = $event['ev_key'];
										  $eventcIcon = $event['ev_icon'];
										  echo '<div class="event_item_details hvr-underline-from-center" id="'.$eventcID.'" data-key="'.$page_Lang[$eventcKey][$dataUserPageLanguage].'">
											 <div class="event_item_detail_icon" id="img_icon_'.$eventcID.'">'.$eventcIcon.'</div>
											 <div class="event_item_detail_key">'.$page_Lang[$eventcKey][$dataUserPageLanguage].'</div>
										  </div>';
									 }
								 echo '</div>
							  </div>
						  </div> ';
		 }
	}
	// Get Event Covers
	if($activity == 'evetCovers'){
	    if($allEventCovers){
			echo ' <div class="event_list_back"></div>
						  <div class="event_list_container">
							  <div class="event_list_header">'.$page_Lang['select_cover_photo_for_your_event'][$dataUserPageLanguage].'<div class="closeevList">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
							  <div class="event_all_list_wrapper">
								   <div class="event_list_item_container"> ';
										foreach($allEventCovers as $eCovers){
											   $eventcoverID = $eCovers['e_cover_id'];
											   $eventcoverImage = $eCovers['e_cover_image']; 
											   $eim = $base_url.'uploads/event__type_covers/'.$eventcoverImage;
											   echo '
											   <div class="cover_pbwg8U">
												  <div class="cover_jjzlbU" id="'.$eventcoverID.'" style="background-image: url('.$eim.');">
													 <img src="'.$eim.'" class="cover_exPexU">
												  </div>
											   </div>
											   ';
										}
			echo '</div>
							  </div>
						  </div> ';
		}
	}
	// Invite Friend List
	// Liked Users
   if($activity == 'inviteFriendList'){
	  if(isset($uid) && isset($_POST['evid'])){
		    $the_eventID = mysqli_real_escape_string($db, $_POST['evid']);
		    $lastFriendID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
			$FriendsArray=$Dot->Dot_AllUserFriends($uid, $lastFriendID); 
			if($FriendsArray){
				echo '
					  <div class="backBox dialog--open"></div>
						<div class="viewersWrap mover-wrap act">
						    <div class="viewersHeader">'.$page_Lang['invite_your_friends_to_this_event'][$dataUserPageLanguage].'<div class="closeViewers">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div>
					    </div>
					    <div class="viewserListContainer" id="s" data-type="moreFriends">
							  <div class="viewerItems" id="likedpp" data-id="'.$likedPost_id.'"> ';
									 foreach($FriendsArray as $FriendsFromData) { 
										  $friendID = $FriendsFromData['user_two']; 
										  $CardDataUserFullName = $Dot->Dot_UserFullName($friendID);
										  $CardDataUsername = $Dot->Dot_GetUserName($friendID);
										  $CardDataUserAvatar = $Dot->Dot_UserAvatar($friendID, $base_url);    
										  //Check UserID invited Before
										  $checkUserIDFromInvitedTable = $Dot->Dot_CheckUserIDInvititedBefore($friendID,$the_eventID);  
										  if($checkUserIDFromInvitedTable == '1'){ 
											  $inviteButton = '<div class="inviteu waves-effect waves-light btn blue-grey" id="in_e_'.$friendID.'" data-id="'.$friendID.'" data-event="'.$the_eventID.'" title="invited">'.$page_Lang['interest'][$dataUserPageLanguage].'</div>';
										  } elseif($checkUserIDFromInvitedTable == '2') { 
											  $inviteButton = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000; margin-top:10px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#2ecc71"><path d="M174.7392,88.1152l-5.8176,-3.488c-2.4768,-1.4848 -4.1536,-3.936 -4.9088,-6.72c-0.0128,-0.0512 -0.0256,-0.1024 -0.0448,-0.1536c-0.7744,-2.8096 -0.544,-5.8048 0.8704,-8.3584l3.296,-5.9328c3.3664,-6.0672 -0.9472,-13.536 -7.8848,-13.6512l-6.848,-0.1152c-2.8992,-0.0512 -5.5872,-1.3376 -7.6352,-3.3856c-0.0192,-0.0192 -0.0448,-0.0448 -0.064,-0.064c-2.0544,-2.048 -3.3408,-4.736 -3.3856,-7.6352l-0.1152,-6.848c-0.1216,-6.9504 -7.5904,-11.264 -13.6576,-7.8912l-5.9328,3.296c-2.5472,1.4144 -5.5424,1.6448 -8.3584,0.8704c-0.0512,-0.0128 -0.1024,-0.0256 -0.1536,-0.0448c-2.784,-0.7616 -5.2352,-2.432 -6.72,-4.9088l-3.488,-5.8176c-3.5712,-5.952 -12.192,-5.952 -15.7632,0l-3.4752,5.792c-1.4976,2.496 -3.968,4.1792 -6.7712,4.9472c-0.032,0.0064 -0.0576,0.0192 -0.0896,0.0256c-2.8352,0.7808 -5.8496,0.5504 -8.4224,-0.8768l-5.9136,-3.2832c-6.0672,-3.3728 -13.536,0.9408 -13.6512,7.8784l-0.1152,6.848c-0.0512,2.8992 -1.3376,5.5872 -3.3856,7.6352c-0.0192,0.0192 -0.0448,0.0448 -0.064,0.064c-2.048,2.0544 -4.736,3.3408 -7.6352,3.3856l-6.848,0.1152c-6.944,0.1216 -11.2576,7.5904 -7.8848,13.6576l3.296,5.9328c1.4144,2.5536 1.6448,5.5424 0.8704,8.3584c-0.0128,0.0512 -0.0256,0.1024 -0.0448,0.1536c-0.7616,2.784 -2.432,5.2352 -4.9088,6.72l-5.8176,3.488c-5.952,3.5712 -5.952,12.1984 0,15.7632l5.8176,3.4944c2.4768,1.4848 4.1536,3.936 4.9088,6.72c0.0128,0.0512 0.0256,0.1024 0.0448,0.1536c0.7744,2.816 0.544,5.8048 -0.8704,8.3584l-3.296,5.9456c-3.3664,6.0672 0.9472,13.536 7.8848,13.6512l6.848,0.1152c2.8992,0.0512 5.5872,1.3376 7.6352,3.3856c0.0192,0.0192 0.0448,0.0448 0.064,0.064c2.0544,2.048 3.3408,4.736 3.3856,7.6352l0.1152,6.8416c0.1152,6.9376 7.584,11.2512 13.6512,7.8848l5.9328,-3.296c2.5472,-1.4144 5.5424,-1.6448 8.3584,-0.8704c0.0512,0.0128 0.1024,0.0256 0.1536,0.0448c2.784,0.7616 5.2352,2.432 6.72,4.9088l3.488,5.8176c3.5712,5.952 12.192,5.952 15.7632,0l3.488,-5.8176c1.4848,-2.4768 3.936,-4.1536 6.72,-4.9088c0.0512,-0.0128 0.1024,-0.0256 0.1536,-0.0448c2.8096,-0.7744 5.8048,-0.544 8.3584,0.8704l5.9328,3.296c6.0672,3.3664 13.536,-0.9472 13.6512,-7.8848l0.1152,-6.8416c0.0512,-2.8992 1.3376,-5.5872 3.3856,-7.6352c0.0192,-0.0192 0.0448,-0.0448 0.064,-0.064c2.048,-2.0544 4.736,-3.3408 7.6352,-3.3856l6.848,-0.1152c6.9376,-0.1152 11.2512,-7.584 7.8848,-13.6512l-3.296,-5.9328c-1.4144,-2.5536 -1.6448,-5.5424 -0.8704,-8.3584c0.0128,-0.0512 0.0256,-0.1024 0.0448,-0.1536c0.7616,-2.784 2.432,-5.2352 4.9088,-6.72l5.8176,-3.4944c5.9712,-3.5712 5.9712,-12.1984 0.0256,-15.7696zM132.5248,81.3248l-41.984,41.984c-1.2032,1.2032 -2.8288,1.8752 -4.5248,1.8752c-1.696,0 -3.328,-0.672 -4.5248,-1.8752l-22.0992,-22.0992c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l17.5744,17.5744l37.4592,-37.4592c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496z"></path></g></g></svg>';
										  }elseif($checkUserIDFromInvitedTable == '3'){
										      $inviteButton = '<div class="waves-effect waves-light btn orange">'.$page_Lang['interested'][$dataUserPageLanguage].'</div>';
										  }else{
										      $inviteButton = '<div class="inviteu waves-effect waves-light btn blue" id="in_e_'.$friendID.'" data-id="'.$friendID.'" data-event="'.$the_eventID.'" title="invite">'.$page_Lang['invite'][$dataUserPageLanguage].'</div>';
										  }
										  echo '
										      <div class="suggestedUserBody theluser" id="sgu'.$friendID.'" data-last="'.$friendID.'">
												  <div class="suggestedAvatar show_card" id="'.$friendID.'" data-user="'.$CardDataUsername.'" data-type="userCard"><img src="'.$CardDataUserAvatar.'" class="a0uk"></div>
												  <div class="suggestedNameFollower show-user-pro" data-pro="'.$friendID.'" data-proid="'.$CardDataUsername.'">
													<div class="user_viewerName"><a href="'.$base_url.'profile/'.$CardDataUsername.'">'.$CardDataUserFullName.'</a></div>
												  </div>
												  <div class="invitebtnfr">
													 '.$inviteButton.'
												  </div>
											 </div>
										  ';
										 
									}
			echo '</div>
                        </div>
                      </div>
					  ';
			}
	  }
   }
   // Invite User to Event
   if($activity == 'inviteUserThisEvent'){
        if(isset($_POST['user']) && isset($_POST['ev'])){
		     $InviteUserID = mysqli_real_escape_string($db, $_POST['user']);
			 $InviteEventID = mysqli_real_escape_string($db, $_POST['ev']);
			 $insertInvite = $Dot->Dot_InviteFriendsFromEvent($uid, $InviteUserID, $InviteEventID);
			 if($insertInvite){
			      $CountedInvitedUsers = $Dot->Dot_CountInvitedUsers($InviteEventID);
				  if($insertInvite == 'invite'){
					  $userInvited = 'Invite';
				  }else{
				      $userInvited = 'Invited';
				  }
				  $data = array(
					  'event_id' => $InviteEventID, 
					  'totalinvitesUsers' => $CountedInvitedUsers,
					  'id' => $InviteUserID,
					  'status' =>$userInvited 
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 }else{
			     $data = array(
					  'error' => $CountedInvitedUsers
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 }
		}
   }
   // Delete Event
   if($activity == 'deleteThisEvent'){ 
       if(isset($_POST['thisEvent'])){ 
	         $deleteEventID = mysqli_real_escape_string($db, $_POST['thisEvent']); 
			 $deleteThisEventID = $Dot->Dot_DeleteEvent($uid,$deleteEventID);
			 if($deleteThisEventID){
			      echo $deleteThisEventID;
			 }else{
			    echo '200';	 
			 }
	   }
   }
   // Append Edit Event 
   if($activity == 'editEvent'){
	    if(isset($_POST['eventID'])){
		    $eventID= mysqli_real_escape_string($db, $_POST['eventID']);
			$eventItem = $Dot->Dot_EventEditForm($uid, $eventID);
			if($eventItem){
				echo '
				<div class="poStListmEnUBox">
  <div class="drawer peepr-drawer-container open">
    <div class="peepr-drawer">
      <div class="peepr-body"> 
      
        <div class="indash_blog">
          <div class="notificationBoxHeader">'.$page_Lang['edit_event'][$dataUserPageLanguage].'
            <div class="closeNews">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div>
          </div>
				'; 
				       $thisEventID = $eventItem['event_id'];
					   $thisEventCreatorUserID = $eventItem['uid_fk'];
					   $thisEventTitle = $eventItem['event_title'];
					   $thisEventDescription = $eventItem['event_description'];
					   $thisEventLocation = $eventItem['event_location'];
					   $thisEventStartMonthYearDay = $eventItem['event_start'];
					   $thisEventStartTime = $eventItem['event_start_time'];
					   $thisEventEndMonthYearDay = $eventItem['event_end'];
					   $thisEventEndTime = $eventItem['event_end_time']; 
					   $thisEventType = $eventItem['event_typ'];
					   $thisEventUserCanInvite = $eventItem['event_usercaninvite'];
					   $thisEventUserCanPost = $eventItem['event_usercanpost'];
					   $thisEventUserCanShareOnProfile = $eventItem['event_shareonwall'];
					   $thisEventCover = $eventItem['event_cover'];
					   $thisEventUserCanShareEvent = $eventItem['user_canshareevent'];
					   $thisEventUserCanShareText = $eventItem['user_cansharetext'];
					   $thisEventUserCanShareImage = $eventItem['user_canshareimage'];
					   $thisEventUserCanShareVideo = $eventItem['user_cansharevideo'];
					   $thisEventUserCanShareAudio = $eventItem['user_canshareaudio'];
					   $thisEventUserCanShareFilterImage = $eventItem['user_cansharefilteredimage'];
					   $thisEventUserCanShareLocation = $eventItem['user_cansharelocation'];
					   $thisEventUserCanShareLink = $eventItem['user_cansharelink'];
					   $thisEventUserCanShareGiphy = $eventItem['user_cansharegiphy'];
					   $thisEventUserCanShareWatermark = $eventItem['user_cansharewatermark'];
					   $thisEventUserCanShareBenchMark = $eventItem['user_cansharebenchmark'];
					   include('../contents/html_editEvent.php');
				 
				echo '</div>
        </div>
      </div>
    </div>
  </div>';
			}
		}
   }
   	// Update Event Options      
	if($activity == 'updateEvent'){
		 $inArrayType = array("0","1");   
	     if(isset($_POST['e_name']) && isset($_POST['e_loc']) && isset($_POST['e_start']) && isset($_POST['e_end']) && isset($_POST['e_st']) && isset($_POST['e_et']) && isset($_POST['e_desc']) && in_array($_POST['e_share'], $inArrayType) && in_array($_POST['e_createPost'], $inArrayType) && in_array($_POST['e_inviteUser'], $inArrayType) && in_array($_POST['e_createText'], $inArrayType)  && in_array($_POST['e_createImage'], $inArrayType)  && in_array($_POST['e_createVideo'], $inArrayType)  && in_array($_POST['e_createAudio'], $inArrayType)  && in_array($_POST['e_createFilter'], $inArrayType)  && in_array($_POST['e_createLocation'], $inArrayType)  && in_array($_POST['e_createGif'], $inArrayType)  && in_array($_POST['e_createLink'], $inArrayType)  && in_array($_POST['e_createWatermark'], $inArrayType)  && in_array($_POST['e_createBenchMark'], $inArrayType) && isset($_POST['e_type']) && isset($_POST['eventID'])){
			   $event_cover_image = mysqli_real_escape_string($db, $_POST['e_co']);
			   $theCoverEvent = empty($event_cover_image) ? '23' : $event_cover_image; 
			   $event_name = mysqli_real_escape_string($db, $_POST['e_name']);
			   $event_location = mysqli_real_escape_string($db, $_POST['e_loc']);
			   $event_start = mysqli_real_escape_string($db, $_POST['e_start']);
			   $event_end = mysqli_real_escape_string($db, $_POST['e_end']);
			   $event_start_time = mysqli_real_escape_string($db, $_POST['e_st']);
			   $event_end_time = mysqli_real_escape_string($db, $_POST['e_et']);
			   $event_description = mysqli_real_escape_string($db, $_POST['e_desc']);  
			   $eventUserCanShareEvent = mysqli_real_escape_string($db, $_POST['e_share']);
			   $eventUserCanCreatePost = mysqli_real_escape_string($db, $_POST['e_createPost']);
			   $eventUserCaninviteFriend = mysqli_real_escape_string($db, $_POST['e_inviteUser']);
			   $eventUserCanCreateText = mysqli_real_escape_string($db, $_POST['e_createText']);
			   $eventUserCanCreateImage = mysqli_real_escape_string($db, $_POST['e_createImage']);
			   $eventUserCanCreateVideo = mysqli_real_escape_string($db, $_POST['e_createVideo']);
			   $eventUserCanCreateAudio = mysqli_real_escape_string($db, $_POST['e_createAudio']);
			   $eventUserCanCreateFilter = mysqli_real_escape_string($db, $_POST['e_createFilter']);
			   $eventUserCanCreateLocation = mysqli_real_escape_string($db, $_POST['e_createLocation']);
			   $eventUserCanCreateGif = mysqli_real_escape_string($db, $_POST['e_createGif']);
			   $eventUserCanCreateLink = mysqli_real_escape_string($db, $_POST['e_createLink']);
			   $eventUserCanCreateWaterMark = mysqli_real_escape_string($db, $_POST['e_createWatermark']);
			   $eventUserCanCreateBenchMark = mysqli_real_escape_string($db, $_POST['e_createBenchMark']);
			   $eventID = mysqli_real_escape_string($db, $_POST['eventID']);
			   
			   $event_Type = mysqli_real_escape_string($db, $_POST['e_type']);
			   $slugEvent = 'p_'.time().'_'.url_slug($event_name);
			   $preg = '/^(?:[01][0-9]|2[0-3]):[0-5][0-9]$/';
			   function validateDate($date, $format = 'Y-m-d') {
					$d = DateTime::createFromFormat($format, $date); 
					return $d && $d->format($format) === $date;
				}
			   if(empty($event_name)){
				    echo $page_Lang['event_name_can_not_be_blank'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_location)){
				    echo $page_Lang['event_location_can_not_be_blank'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_start)){
				    echo $page_Lang['please_write_event_start_date'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_end)){
				    echo $page_Lang['please_write_event_end_date'][$dataUserPageLanguage];
					exit();
			   }
			   if(empty($event_description)){
				    echo $page_Lang['event_description_can_not_be_empty'][$dataUserPageLanguage];
					exit();
			   }
			   if(!validateDate($event_start)){
			       echo $page_Lang['wrong_date_format'][$dataUserPageLanguage];
				   exit();
			   }
			   if(!validateDate($event_end)){
			       echo $page_Lang['wrong_date_format'][$dataUserPageLanguage];
				   exit();
			   }
			   if(!preg_match($preg,$event_start_time)) {
					echo $page_Lang['wrong_time_format'][$dataUserPageLanguage];
					exit();
				}
				if(!preg_match($preg,$event_end_time)) {
					echo $page_Lang['wrong_time_format'][$dataUserPageLanguage];
					exit();
				}  
			   $saveEvent = $Dot->Dot_UpdateEventDetails($uid, htmlcode($event_name), htmlcode($event_location), htmlcode($event_description), $event_start,$event_start_time, $event_end, $event_end_time,$event_Type, $eventUserCanShareEvent, $eventUserCanCreatePost, $eventUserCaninviteFriend, $eventUserCanCreateText, $eventUserCanCreateImage, $eventUserCanCreateVideo, $eventUserCanCreateAudio, $eventUserCanCreateFilter, $eventUserCanCreateLocation, $eventUserCanCreateGif, $eventUserCanCreateLink, $eventUserCanCreateWaterMark, $eventUserCanCreateBenchMark,$eventID);
			   if($saveEvent){
			         echo $saveEvent; 
			   }else{
			      echo '200'; 
			   }
		 }
	}
	// User Going Event
	if($activity == 'ugoing'){
       if(isset($_POST['e_e'])){
	        $eventID = mysqli_real_escape_string($db, $_POST['e_e']);
			$getStatus = $Dot->Dot_UpdateUserEventStatus($uid, $eventID);
			$eventgoingUsers = $Dot->Dot_CountHowManyUserGoing($eventID, $showLimit);
			$eventInterestedUsers = $Dot->Dot_CountHowManyUserInterested($eventID, $showLimit); 
			if($getStatus){ 
				$data = array(
					  'event_id' => $eventID, 
					  'totalGoing' => $eventgoingUsers,
					  'totalInterested' => $eventInterestedUsers, 
					  'status' => $page_Lang[$getStatus][$dataUserPageLanguage],
					  'interest'=> $page_Lang['interest'][$dataUserPageLanguage]
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				  
			}else{
			    $data = array(
					  'error' => $getStatus
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			}
	   }
	}
	// User Not Going
	if($activity == 'dgoing'){
	    if(isset($_POST['e_e'])){
			$eventID = mysqli_real_escape_string($db, $_POST['e_e']);
			$getStatus = $Dot->Dot_UserNotGoing($uid, $eventID);
			$eventgoingUsers = $Dot->Dot_CountHowManyUserGoing($eventID, $showLimit);
			$eventInterestedUsers = $Dot->Dot_CountHowManyUserInterested($eventID, $showLimit); 
			if($getStatus){ 
				$data = array(
					  'event_id' => $eventID, 
					  'totalGoing' => $eventgoingUsers, 
					  'totalInterested' => $eventInterestedUsers, 
					  'status' => $page_Lang[$getStatus][$dataUserPageLanguage],
					  'interest'=> $page_Lang['interest'][$dataUserPageLanguage]
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				  
			}
		}
    }
	// User Interested Event
	if($activity == 'uinterested'){
       if(isset($_POST['e_e'])){
	       $eventID = mysqli_real_escape_string($db, $_POST['e_e']);
		   $getStatus = $Dot->Dot_UpdateUserEventInterestedStatus($uid, $eventID);
		   $eventgoingUsers = $Dot->Dot_CountHowManyUserGoing($eventID, $showLimit);
			$eventInterestedUsers = $Dot->Dot_CountHowManyUserInterested($eventID, $showLimit);
			if($getStatus){ 
				$data = array(
					  'event_id' => $eventID, 
					  'totalGoing' => $eventgoingUsers, 
					  'totalInterested' => $eventInterestedUsers, 
					  'status' => $page_Lang[$getStatus][$dataUserPageLanguage],
					  'ugo'=> $page_Lang['go'][$dataUserPageLanguage]
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				  
			}else{
			    $data = array(
					  'error' => $getStatus
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			}
	   }
	}
	// User Not Going
	if($activity == 'duinterested'){
	    if(isset($_POST['e_e'])){
			$eventID = mysqli_real_escape_string($db, $_POST['e_e']);
			$getStatus = $Dot->Dot_UserNotInterested($uid, $eventID);
			 $eventgoingUsers = $Dot->Dot_CountHowManyUserGoing($eventID, $showLimit);
			$eventInterestedUsers = $Dot->Dot_CountHowManyUserInterested($eventID, $showLimit);
			if($getStatus){ 
				$data = array(
					  'event_id' => $eventID, 
					  'totalGoing' => $eventgoingUsers, 
					  'totalInterested' => $eventInterestedUsers, 
					  'status' => $page_Lang[$getStatus][$dataUserPageLanguage],
					  'ugo'=> $page_Lang['go'][$dataUserPageLanguage] 
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
			}
		}
    }
	//Share Event From Profile
	if($activity == 'shareonWall'){
	    if(isset($_POST['event'])){
			$eventID = mysqli_real_escape_string($db, $_POST['event']);
			$shreEvent = $Dot->Dot_ShareEventOnWall($uid, $eventID); 
			if($shreEvent){ 
				   echo $shreEvent;
			}
		}
	}
	// Back to Main Profile custom
	if($activity == 'maincustom'){
	    $updateMainColor = $Dot->Dot_BackToProfileMainCustomColors($uid);
		if($updateMainColor){
		   echo '1';
		}else{
		   echo '2';
		}
	}
	// More Message
	if($activity == 'more_message'){
	    if(isset($_POST['user']) && isset($_POST['message'])){
		     $userID = mysqli_real_escape_string($db, $_POST['user']);
			 $lastMessageID = mysqli_real_escape_string($db, $_POST['message']);
			 $GetAllMessagesa = $Dot->Dot_GetMoreMessages($uid, $userID, $lastMessageID);
			 if($GetAllMessagesa){
			      foreach($GetAllMessagesa as $getMessage){
					  
              $getTexts = $getMessage['message_text']; 
               $getToUID = $getMessage['to_user_id']; 
               $getFromUID = $getMessage['from_user_id'];
               $getMessageID = $getMessage['msg_id']; 
			   $getMessageVideoID = isset($getMessage['videoid']) ? $getMessage['videoid'] : NULL;
               $getMessageCreatedTime = $getMessage['message_created_time'];
               $messageTime=date("c", $getMessageCreatedTime); 
			   $messageFileName = isset($getMessage['file_name']) ? $getMessage['file_name'] : NULL;
			   $messageFile = isset($getMessage['file']) ? $getMessage['file'] : NULL;
			   $messageFileExtension = isset($getMessage['file_extension ']) ? $getMessage['file_extension '] : NULL; 
			   $messageSelfDestruction = isset($getMessage['dest']) ? $getMessage['dest'] : NULL;
			   $messageSelfDestructionSecret =  isset($getMessage['secret_checked']) ? $getMessage['secret_checked'] : NULL;
			   if($messageSelfDestructionSecret == '0'){
			          $destText = $page_Lang['self_destruction_message'][$dataUserPageLanguage];
			   }else{
			          $destText = $page_Lang['message_was_self_destruction'][$dataUserPageLanguage];
			   }
			   // Get if Uploded Message
			   $uploadedFile = '';
			   // Get if Uploaded Video
			   $uploadedVideoFile = '';
			   // Get if Text
			   $ChatText = '';
               $from_to_class= 'you';
			   $from_to_class_image = 'image_you';
			   $from_to_class_video = 'video_you';
               $class_set = 'm_time_me'; 
               if($getToUID == $uid){
                   $from_to_class = 'friend';
				   $from_to_class_image = 'image_friend';
				   $from_to_class_video = 'video_friend';
                   $class_set = 'm_time_friend';
               }  
			   if($getTexts){
			       $ChatText = '<div class="'.$from_to_class.'">'.htmlcode($getTexts).'</div>';
			   }
			   if($messageFile){
				    $extensionArray = array(
								   'ai' => "file_ai",
								   'pdf' => "file_pdf",
								   'eps' => "file_eps",
								   'tif' => "file_tif",
								   'doc' => "file_doc",
								   'docx' => "file_doc",
								   'zip' => "file_zip",
								   'rar' => "file_rar",
								   'psd' => "file_psd",
								   'txt' => "file_txt"
								);
				    $fileID = $Dot->Dot_GetUploadChatFileID($messageFile); 
					$messagefileID = $fileID['file_id'];
					$messageUploadedFilen = $fileID['uploaded_file'];
					$messageUploadedFileExtension = $fileID['extension'];
					$uploadedFile = '<a href="'.$base_url.'uploads/files/'.$messageUploadedFilen.'" download="'.$messageUploadedFilen.'"><div class="file_item '.$from_to_class_image.'"><div class="file_extensions_icon '.$extensionArray[$messageUploadedFileExtension].'"></div><div class="file_name_ex truncate">'.$messageFileName.'</div></div></a>';
			   }
			   $getMessageImage = isset($getMessage['imageid']) ? $getMessage['imageid'] : NULL; 
			   if($getMessageVideoID){
				   $videoDetails = $Dot->Dot_GetUploadChatVideoID($getMessageVideoID);
				  $mvideoName = $videoDetails['uploaded_video'];
				  $mvideoExtension = $videoDetails['extension']; 
				  $videoTumbnail ='';
				  if(file_exists($base_url.$videoPath.$mvideoName.'.png')){
				  	  $videoTumbnail = $base_url.'uploads/video/'.$mvideoName.'.png';   
				  }else{
				  	  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
				  }
				  $uploadedVideoFile = '<div class="'.$from_to_class_video.'"><div class="media-wrapper videoNew UploadedItemNew"><video id="player1" width="100%" height="auto" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$mvideoName.'.'.$mvideoExtension.'" type="video/mp4"></video></div></div>';
			   }   
			   
			  if($messageSelfDestruction){
			      echo '<div class="messageBox_body seldDestruct child'.$getFromUID.'" id="messageBox_body'.$getFromUID.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'" data-destTime="'.$messageSelfDestruction.'" data-type="selfDestruction">';
				  echo  '<div class="'.$from_to_class.' selfDestructMessage" id="selfDest'.$getMessageID.'">'.$destText.'</div>';
				   echo '<div class="message_time_set '.$class_set.'"><div class="timeago" title="'.$messageTime.'"></div></div></div>'; 
			  }else{
			  echo '<div class="messageBox_body child'.$getFromUID.'" id="messageBox_body'.$getFromUID.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'">';
			  echo $ChatText; 
			  if($getMessageImage){
				   $ExploreImage = explode(",", $getMessageImage); 
				   $r=1;
			      $CountExplodes=count($ExploreImage); 
			       echo '<div class="theImages '.$from_to_class_image.'">';
						  foreach($ExploreImage as $a) {
							$newdata=$Dot->Dot_GetUploadChatImageID($a); 
								if($newdata){
									 $final_image=$base_url."uploads/images/".$newdata['uploaded_image'];   
								} 
								echo '
										<div class="sldimg">
										  <div class="sld_jjzlbU" style="background-image:url('.$final_image.');">
											<img src="'.$final_image.'" class="sld-exPexU">
										  </div>
										</div>
										';
								
								$r=$r+1;		
						 } 
					  echo ' </div>';
			   }   
			   echo $uploadedVideoFile;
			   echo $uploadedFile;
			  echo '<div class="message_time_set '.$class_set.'"><div class="timeago" title="'.$messageTime.'"></div></div></div>'; 
			  } 
              }
			 }else{
			    echo '<div class="messageBox_body"><div class="noMoreConversation">'.$page_Lang['seen_it_all'][$dataUserPageLanguage].'</div></div>';
			 }
		}
	}
	if($activity == 'expanded'){
		if(isset($_POST['exid'])){
		    $expandedPostID = mysqli_real_escape_string($db, $_POST['exid']);
			$GetExpandedFrame = $Dot->Dot_ExpandedPostFrame($uid, $expandedPostID);
			if($GetExpandedFrame){
			    $url = $GetExpandedFrame['post_link_url'];
				//////////////////////////////////
				$em = new Mat_Expand($url);
					// Get the link size
					$site = $em->get_site();
					 
					if($site != ""){
						// If code is iframe then show the link in iframe
					   $code = $em->get_iframe();
					   if($code == ""){
						   // If code is embed then show the link in embed
						  $code = $em->get_embed();
						  if($code == "") {
							  // If code is thumb then show the link medium
							 $codesrc=$em->get_thumb("medium");
						   }
					   }
					   echo '
					   <div class="embedVideo openVideoEmbed"><div class="close_frame"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M39.92188,31.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l50.34375,50.34375l-50.34375,50.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l50.34375,-50.34375l50.34375,50.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-50.34375,-50.34375l50.34375,-50.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-50.34375,50.34375l-50.34375,-50.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div><span class="yt_frame">'.$code.'</span></div>
					   '; 
					   } 
				/////////////////////////////////
			}
		}
	}
	// Re Share Post
	if($activity == 're_share'){
	    if(isset($_POST['postNumber'])){
		    $thePostID = mysqli_real_escape_string($db, $_POST['postNumber']);
			$ShowThisWantetPost = $Dot->Dot_ShowWantedPostDetails($thePostID);
			if($ShowThisWantetPost){
			    echo '<div class="share-modal-overlay" id="share-modal-overlay"></div> 
				<div class="share-modal" id="modal">
				 <div class="post-share-modal-header">'.$page_Lang['re_share_post'][$dataUserPageLanguage].'</div>
				  <div class="share-modal-wrapper"> 
					 <div class="sh_post_information">
					 <div class="write_post_information">
							   <!--Input STARTED-->
							   <div class="global_post_box">
								   <input type="text" class="title" id="title" placeholder="'.$page_Lang['post_title'][$dataUserPageLanguage].'">
							   </div>
							   <!--Input FINISHED-->
							   <!--Textarea STARTED-->
							   <div class="global_post_box">
								  <textarea class="description" id="details" placeholder="'.$page_Lang['add_description_if_you_wish'][$dataUserPageLanguage].'" style="overflow: hidden; overflow-wrap: break-word; height: 80px;"></textarea>
							   </div>
							   <!--Textarea FINISHED-->
							   <!--Hashtag STARTED-->
							   <div class="global_post_box">
								  <input class="hashtag_" id="hashTag" placeholder="'.$page_Lang['post_tag'][$dataUserPageLanguage].'">
							   </div>
							   <!--Hashtag FINISHED-->  
						   </div>
				  ';
					  foreach($ShowThisWantetPost as $PostFromData){ 
							 include("../contents/post_data.php");
					  }
					  echo '
					  </div>
				  </div>
				  <div class="post-modal-footer">   
				      <div class="post_share_box_footer">
						  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost">'.$page_Lang['post_cancel'][$dataUserPageLanguage].'</div></div>
						  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue  resharepost" data-type="share_accept">'.$page_Lang['post_share'][$dataUserPageLanguage].'</div></div>
					 </div>
				   
				  </div>
				</div> 
				';
			}
		} 
	}
// Share Accept
if($activity == 'share_accept'){
   if(isset($_POST['shi']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags'])){
	     $sharedPostID = mysqli_real_escape_string($db, $_POST['shi']);
		 $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
		 $postDetails  = mysqli_real_escape_string($db, $_POST['details']);
	     $postTags  = mysqli_real_escape_string($db, $_POST['tags']);
		 $tags = hashtag($postTags);
		 $postDetailsHtml = htmlcode($postDetails);
		 if(!empty($postTitle)){
			$slug = 'p_'.time().'_'.url_slug($postTitle);
	 	 }elseif(!empty($postDetails)){
			$slug = 'p_'.time().'_'.url_slug($postDetails);
		 }elseif (empty($postTitle) && empty($postDetails)){
			$slug = 'p_'.time();
		 } 
		 if(empty($sharedPostID)){ 
			  echo '<div class="newWarning"> '.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</div>'; 
			  exit(); 
		 } 
		 $PostFromData = $Dot->Dot_Share_Post($uid, $sharedPostID,$postTitle, $postDetailsHtml, $postTags, $tags,$slug);
		 $mentionPostID = $PostFromData['user_post_id'];
		 $type = $PostFromData['post_type'];
		 $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
		 if($PostFromData){
		     include("../contents/html_posts.php");
		 }
   }
}
// Feeling List
if($activity == 'feelings'){
    include("../contents/feeling_list.php");
}
function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 4s
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
// Translate Text
if($activity == 'translateme'){
   if(isset($_POST['text']) && isset($_POST['text_title'])){
	   $langArray = array(
		   'english' => "en",
		   'turkish' => "tr",
		   'french' => "fr"
      );
	   $text = mysqli_real_escape_string($db, $_POST['text']);
	   $textTitle = mysqli_real_escape_string($db, $_POST['text_title']);
	   if(empty($text) && empty($textTitle)){
	      $text ="";
		  $textTitle ="";
	   }
	   $api = $yandexAPI; // TODO: Get your key from https://tech.yandex.com/translate/
       $url = url_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api . '&text=' . urlencode($text) . '&lang=' . $langArray[$dataUserPageLanguage]);
	   $urlt = url_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api . '&text=' . urlencode($textTitle) . '&lang=' . $langArray[$dataUserPageLanguage]);
       $json = json_decode($url);
       $theText = $json->text[0];
	   $jsont = json_decode($urlt);
       $theTextTitle = $jsont->text[0];
	   $data = array(
					  'text' => $theText, 
					  'title' => $theTextTitle 
					 ); 
	   $result =  json_encode( $data );	
	   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
   }
} 
// Product Categories
if($activity == 'productCategories'){
   include("../contents/marketplaceProductCategories.php");
}

// Fast Question Send
if($activity == 'fastProductQuestion'){  
    if(isset($_POST['proID']) && isset($_POST['own'])){
		  $questionID = mysqli_real_escape_string($db, $_POST['qid']);
		  $questionProductID = mysqli_real_escape_string($db, $_POST['proID']);
		  $questionOwnerID = mysqli_real_escape_string($db, $_POST['own']);
		  $sendFastQuestion = $Dot->Dot_SendFastQuestionToSeller($uid, $questionOwnerID,$questionProductID, $questionID); 
		  if($sendFastQuestion){ 
				echo '<div class="sndsucc"><div class="newnote_succs">'.$page_Lang['product_message_sended'][$dataUserPageLanguage].'</div></div>';
		  }
	}
}
// Re Share Post
	if($activity == 'boost_product'){
	    if(isset($_POST['productNumber'])){ 
		    $thePostID = mysqli_real_escape_string($db, $_POST['productNumber']);
			$showBoostPost = $Dot->Dot_BoostPostDetails($thePostID,$uid); 
			if($showBoostPost){ 
			    echo '<div class="share-modal-overlay" id="share-modal-overlay"></div> 
				<div class="share-modal" id="modal">
				 <div class="post-share-modal-header">'.$page_Lang['boost_product'][$dataUserPageLanguage].'</div>
				  <div class="share-modal-wrapper"> 
					 <div class="sh_post_information">
					 <div class="write_post_information">
							   <!--Input STARTED-->
							   <div class="global_post_box">
							       <div class="note_helper">'.$page_Lang['write_product_boost_budget'][$dataUserPageLanguage].'</div>
								   <input type="text" class="boost_budget" id="budget" placeholder="Minimum 15$">
							   </div>
							   <!--Input FINISHED--> 
							   <div class="global_post_box">
							   <div class="note_helper" id="stb">'.$page_Lang['choose_boost_show_type'][$dataUserPageLanguage].'</div>
							   <div class="price_currency" style="width:230px;">
									<div class="input-field col s12">
										<select id="crncy" class="currency">
										   <option value="" disabled selected>'.$page_Lang['display_boost_type'][$dataUserPageLanguage].'</option>
										   <option value="1">'.$page_Lang['ads_per_click'][$dataUserPageLanguage].'('.$adsPerClick.'$)</option>
                                           <option value="2">'.$page_Lang['ads_per_impression'][$dataUserPageLanguage].'('.$adsPerimpression.'$)</option> 
										</select> 
									</div> 
							   </div>
							   </div>
						   </div>
				  ';
					  foreach($showBoostPost as $PostFromData){  
							 include("../contents/boost_post.php");
					  }
					  echo '
					  </div>
				  </div>
				  <div class="post-modal-footer">   
				      <div class="post_share_box_footer">
						  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost">'.$page_Lang['post_cancel'][$dataUserPageLanguage].'</div></div>
						  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue  boostaccept" data-type="buyProductBoost" data-id="'.$thePostID.'">'.$page_Lang['accept_boost'][$dataUserPageLanguage].'</div></div>
					 </div>
				   
				  </div>
				</div> 
				';
			}
		} 
	}
	// Buy Market Template
	if($activity == 'buyProductBoost'){
	    if(isset($_POST['boostID']) && isset($_POST['boost_price']) && isset($_POST['disType'])){
		    $boostPostID = mysqli_real_escape_string($db, $_POST['boostID']);
			$uamount = mysqli_real_escape_string($db, $_POST['boost_price']);
			$boostDisplayType = mysqli_real_escape_string($db, $_POST['disType']);
			$checkBoostPostExist = $Dot->Dot_CheckBoostPostExist($uid,$boostPostID); 
			if($uamount && $checkBoostPostExist){
				if($dataUserCredit > $uamount){
					 $pTime = time();
				     $setBoost = mysqli_query($db,"UPDATE dot_user_posts SET ads_status = '1', ads_price = ads_price + $uamount , ads_display_type = '$boostDisplayType', ads_budget = ads_budget + $uamount WHERE user_post_id = '$boostPostID' AND user_id_fk = '$uid'") or die(mysqli_error($db));
					 if($setBoost){
						 $updateUserCredit = mysqli_query($db,"UPDATE dot_users SET user_credit = user_credit - $uamount WHERE user_id = '$uid'") or die(mysqli_error($db));
					     echo $base_url;
					 }
				}else{
			        include_once "../functions/paymentboostPost.php"; 
				}
			}else{
			  echo '2';
			}
		}
	}
	/*Get More Event Post*/ 
	if($activity == 'more_product'){
	    if(isset($_POST['lastmid']) ? $_POST['lastmid'] : '' && isset($_POST['c'])){
		   $lastPostID = mysqli_real_escape_string($db, $_POST['lastmid']);  
		   $category = mysqli_real_escape_string($db, $_POST['c']);
			$updatesarray=$Dot->Dot_MoreProductCategoryPost($lastPostID, $category);    
			if($updatesarray){
			 foreach($updatesarray as $PostFromData) {  
				 include("../contents/html_more_category_product.php");
			 } 
			} 
		}
	}
	// Search Product Seo Friendly Url
	if($activity == 'search_product'){
	    if(isset($_POST['title'])){
		     $searchProductTitle = mysqli_real_escape_string($db, $_POST['title']);
			 echo url_slug($searchProductTitle);
		}
	}
	// Activate Deactivate Advertise
	if($activity == 'product_booststat'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_UpdateProductBoostStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	// Activate Deactivate Slider
	if($activity == 'mtMode'){
	     if(isset($_POST['id']) && isset($_POST['status'])){
	         $thisAdsID = mysqli_real_escape_string($db, $_POST['id']);
			 $thisAdsStatus = mysqli_real_escape_string($db, $_POST['status']);
			 $updateAdvertisementStatus = $Dot->Dot_UpdateMarketThemeStatus($uid, $thisAdsID,$thisAdsStatus);
			 if($updateAdvertisementStatus){
			    echo '1';
			 }else{
			    echo '200';
			 }
		 }
	}
	// Send Email Activation Mail Again
	if($activity == 'v_mail'){
	    // Check Activation Code is Active
		$CheckActivationCodeActive = $Dot->Dot_CheckActivationCodeActive($uid);
		if($CheckActivationCodeActive){ 
		     $getEmailVerificationKey = $dataEmailVerification;
			 $thisEmail = $dataUserAccountEmail; 
             include_once("mails/emailVerificationSendAgain.php");
			 echo '<div class="ac_m_send">'.$page_Lang['activation_mail_sended'][$dataUserPageLanguage].'</div>'; 
		}
	}
	// Post Menu Display
	if($activity == 'new_post_create'){
	     include("../contents/post_menus.php");
	}
	// Choose Payment Methods
	if($activity == 'choosepament'){  
	    if(isset($_POST['pd']) && isset($_POST['u']) && isset($_POST['ty']) && isset($_POST['amnt'])){
		     $postID = mysqli_real_escape_string($db, $_POST['pd']);
			 $postOwnerID = mysqli_real_escape_string($db, $_POST['u']);
			 $paymentPostType = mysqli_real_escape_string($db, $_POST['ty']);  
			 $paymentDonateAmount = mysqli_real_escape_string($db, $_POST['amnt']);
		}
	      error_reporting(E_ALL);
         ini_set('display_errors', 1); 
		 require_once '../functions/methods/vendor/autoload.php';
		 if (!defined('OOBENN_METHODS_CONFIG')) {   
			 define('OOBENN_METHODS_CONFIG', realpath('../functions/paymentConfig.php'));
		 } 
		 $configData = configItem();
		 // User Details Configurations STARTED 
		 $getProductName  = '';
		 $getProductDescription = '';
		 function truncate($val, $dist) {
				//get position of digit $dist places after decimal point
				$pos = strpos($val,'.');
			
				if($pos !== false) {//if $val is actually a float
			
					//get the substring starting at the beginning
					//and ending with the point $dist after the
					//decimal, inclusive -- convert to float.
					$val = floatval(substr($val, 0, $pos + 1 + $dist));
			
				}           
				return $val;
			}
		    if($paymentPostType == 'pm'){
			     $theNewPrice = $Dot->Dot_GetProPriceFromNumber($postID);
		         $paymentAmountPro = $theNewPrice['price_amounth']; 
				 function url_get_contentsa($Url) {
					  if (!function_exists('curl_init')){
						  die('CURL is not installed!');
					  }
					  $ch = curl_init();
					  curl_setopt($ch, CURLOPT_FAILONERROR, 1);
					  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
					  curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 4s
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
					  curl_setopt($ch, CURLOPT_URL, $Url);
					  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					  $output = curl_exec($ch);
					  curl_close($ch);
					  return $output;
				  } 
				 
				 $paypalPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paypalCurrency.'';
				 
				 $jsonPayPalUsdExchangeRate = url_get_contentsa($paypalPaymentExchangeRate);
				 $json_data_PayPalExchangeRate = json_decode($jsonPayPalUsdExchangeRate, true); 
				 $calculateUsdToPayPalExchange = (abs($json_data_PayPalExchangeRate['rate'] - (int)$json_data_PayPalExchangeRate['rate']) < 0.001) ? (int)$json_data_PayPalExchangeRate['rate'] : number_format($json_data_PayPalExchangeRate['rate'], 4);
				 $paypalAmount = truncate($calculateUsdToPayPalExchange * $paymentAmountPro, 2);
				 
				 $paypalCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentAmountPro.'$='.$paypalAmount.''.$currencys[$paypalCurrency].'</div></div>';
				 
				 $iyziCoPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$iyziCoCurrency.'';
				 
				 $jsonIyziCoUsdExchangeRate = url_get_contentsa($iyziCoPaymentExchangeRate);
				 $json_data_IyzCoExchangeRate = json_decode($jsonIyziCoUsdExchangeRate, true); 
				 $calculateUsdToIyziCoExchange = (abs($json_data_IyzCoExchangeRate['rate'] - (int)$json_data_IyzCoExchangeRate['rate']) < 0.001) ? (int)$json_data_IyzCoExchangeRate['rate'] : number_format($json_data_IyzCoExchangeRate['rate'], 4);
				 $iyziCoAmount = truncate($calculateUsdToIyziCoExchange * $paymentAmountPro, 2);
				 
				 $bitPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$bitPayCurrency.'';
				 
				 $jsonbitPayUsdExchangeRate = url_get_contentsa($bitPayPaymentExchangeRate);
				 $json_data_bitPayExchangeRate = json_decode($jsonbitPayUsdExchangeRate, true); 
				 $calculateUsdTobitPayExchange = (abs($json_data_bitPayExchangeRate['rate'] - (int)$json_data_bitPayExchangeRate['rate']) < 0.001) ? (int)$json_data_bitPayExchangeRate['rate'] : number_format($json_data_bitPayExchangeRate['rate'], 4);
				 $bitPayAmount = truncate($calculateUsdTobitPayExchange * $paymentAmountPro, 2);
				 
				 $autHorizeNetPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$authorizeNetCurrency.'';
				 
				 $jsonautHorizeNetUsdExchangeRate = url_get_contentsa($autHorizeNetPaymentExchangeRate);
				 $json_data_autHorizeNetExchangeRate = json_decode($jsonautHorizeNetUsdExchangeRate, true); 
				 $calculateUsdToautHorizeNetExchange = (abs($json_data_autHorizeNetExchangeRate['rate'] - (int)$json_data_autHorizeNetExchangeRate['rate']) < 0.001) ? (int)$json_data_autHorizeNetExchangeRate['rate'] : number_format($json_data_autHorizeNetExchangeRate['rate'], 4);
				 $autHorizeNetAmount = truncate($calculateUsdToautHorizeNetExchange * $paymentAmountPro, 2);
				 
				 $paystackPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paystackCurrency.'';
				 
				 $jsonpaystackUsdExchangeRate = url_get_contentsa($paystackPaymentExchangeRate);
				 $json_data_paystackExchangeRate = json_decode($jsonpaystackUsdExchangeRate, true); 
				 $calculateUsdTopaystackExchange = (abs($json_data_paystackExchangeRate['rate'] - (int)$json_data_paystackExchangeRate['rate']) < 0.001) ? (int)$json_data_paystackExchangeRate['rate'] : number_format($json_data_paystackExchangeRate['rate'], 4);
				 $paystackAmount = truncate($calculateUsdTopaystackExchange * $paymentAmountPro, 2);
				 
				 $stripePaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$stripeCurrency.'';
				 
				 $jsonstripeUsdExchangeRate = url_get_contentsa($stripePaymentExchangeRate);
				 $json_data_stripeExchangeRate = json_decode($jsonstripeUsdExchangeRate, true); 
				 $calculateUsdTostripeExchange = (abs($json_data_stripeExchangeRate['rate'] - (int)$json_data_stripeExchangeRate['rate']) < 0.001) ? (int)$json_data_stripeExchangeRate['rate'] : number_format($json_data_stripeExchangeRate['rate'], 4);
				 $stripeAmount = truncate($calculateUsdTostripeExchange * $paymentAmountPro, 2);
				 
				 $razorPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$razorPayCurrency.'';
				 
				 $jsonrazorPayUsdExchangeRate = url_get_contentsa($razorPayPaymentExchangeRate);
				 $json_data_razorPayExchangeRate = json_decode($jsonrazorPayUsdExchangeRate, true); 
				 $calculateUsdTorazorPayExchange = (abs($json_data_razorPayExchangeRate['rate'] - (int)$json_data_razorPayExchangeRate['rate']) < 0.001) ? (int)$json_data_razorPayExchangeRate['rate'] : number_format($json_data_razorPayExchangeRate['rate'], 4);
				 $razorPayAmount = truncate($calculateUsdTorazorPayExchange * $paymentAmountPro, 2);
				 
				 $getProductName  = 'Pro member';
		         $getProductDescription = 'It is purchased to activate some special areas.';
			 }else if($paymentPostType == 'pb'){
				 if(empty($dataCountry) || empty($dataCity) || empty($dataState) || empty($profileShoppingFullAddress) || empty($profileShoppingPhoneNumber) || empty($profileShoppingFullName) || empty($dataUserPostCode) || empty($dataUserPassportCodeOrIdNumber)){ 
					//echo '<div id="toast-container"><div class="toast" style="top: 0px; opacity: 1;"><span>'.$page_Lang['need_to_finish_address_informations'][$dataUserPageLanguage].'</span><button class="btn-flat toast-action"><a href="'.$base_url.'settings#shoppingaddress">Edit</a></button></div></div>';
				    echo '<div class="popupBack"></div><div class="anm">
						<div class="modalCheckout">
						<div class="payment_method_header">
							  <div class="spm">'.$page_Lang['complete_your_add_informations'][$dataUserPageLanguage].'</div>
										<div class="methods_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M42.93001,35.76335c-2.91628,0.00077 -5.54133,1.76841 -6.63871,4.47035c-1.09737,2.70194 -0.44825,5.79937 1.64164,7.83336l37.93295,37.93294l-37.93295,37.93294c-1.8722,1.79752 -2.62637,4.46674 -1.97164,6.97823c0.65473,2.51149 2.61604,4.4728 5.12753,5.12753c2.51149,0.65473 5.18071,-0.09944 6.97823,-1.97165l37.93294,-37.93294l37.93294,37.93294c1.79752,1.87223 4.46675,2.62641 6.97825,1.97168c2.5115,-0.65472 4.47282,-2.61605 5.12755,-5.12755c0.65472,-2.5115 -0.09946,-5.18073 -1.97168,-6.97825l-37.93294,-37.93294l37.93294,-37.93294c2.11962,-2.06035 2.75694,-5.21064 1.60486,-7.93287c-1.15207,-2.72224 -3.85719,-4.45797 -6.81189,-4.37084c-1.86189,0.05548 -3.62905,0.83363 -4.92708,2.1696l-37.93294,37.93295l-37.93294,-37.93295c-1.34928,-1.38698 -3.20203,-2.16948 -5.13704,-2.1696z"></path></g></g></svg></div>
							</div>
							<div class="methods_wrapper">
								 <div class="methods_con">
								     <div class="someNeed">'.$page_Lang['some_personal_information_required'][$dataUserPageLanguage].'</div>
									 <div class="method_box_item"><a href="'.$base_url.'settings#shoppingaddress" class="btn green waves-effect waves-orange">'.$page_Lang['complete_your_add_informations'][$dataUserPageLanguage].'</a></div> 
								 </div>
							</div>
							</div>
						</div>';
					exit();
			     }
				 $getPostCurrency = $Dot->Dot_GetPostCurency($uid,$postID);
				 $productCurrency = $getPostCurrency['product_currency'];
				 $getProductNormalPrice = $getPostCurrency['product_normal_price'];
				 $getProductDiscount = $getPostCurrency['product_discount_price'];
				 $getProductName  = $getPostCurrency['m_product_name'];
				 $getProductDescription = $getPostCurrency['m_product_description'];
				       if($getProductDiscount){
							$data_differencePrice = $getProductNormalPrice - $getProductDiscount; 
							$data_percentage = 100 - (100 * $data_differencePrice ) / $getProductNormalPrice;   
							$theCurrentPrice = $Dot->Dot_restyle_text($data_differencePrice);
							$theOldOne = '<div class="cart_price_old"><s>'. $Dot->Dot_restyle_text($getProductDiscount).'</s></div>';
						}else{
							$data_dis_Percentage ='';
							$theCurrentPrice =  $Dot->Dot_restyle_text($getProductNormalPrice);
							$theOldOne='';
						}
			     /****/
				          function url_get_contentsa($Url) {
								if (!function_exists('curl_init')){
									die('CURL is not installed!');
								}
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_FAILONERROR, 1);
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
								curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 4s
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
								curl_setopt($ch, CURLOPT_URL, $Url);
								curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
								$output = curl_exec($ch);
								curl_close($ch);
								return $output;
							} 
				 
				 $paypalPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paypalCurrency.'';
				 
				 $jsonPayPalUsdExchangeRate = url_get_contentsa($paypalPaymentExchangeRate);
				 $json_data_PayPalExchangeRate = json_decode($jsonPayPalUsdExchangeRate, true); 
				 $calculateUsdToPayPalExchange = (abs($json_data_PayPalExchangeRate['rate'] - (int)$json_data_PayPalExchangeRate['rate']) < 0.001) ? (int)$json_data_PayPalExchangeRate['rate'] : number_format($json_data_PayPalExchangeRate['rate'], 4);
				 $paypalAmount = truncate($calculateUsdToPayPalExchange * $theCurrentPrice, 2);
				 
				 $iyziCoPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$iyziCoCurrency.'';
				 
				 $jsonIyziCoUsdExchangeRate = url_get_contentsa($iyziCoPaymentExchangeRate);
				 $json_data_IyzCoExchangeRate = json_decode($jsonIyziCoUsdExchangeRate, true); 
				 $calculateUsdToIyziCoExchange = (abs($json_data_IyzCoExchangeRate['rate'] - (int)$json_data_IyzCoExchangeRate['rate']) < 0.001) ? (int)$json_data_IyzCoExchangeRate['rate'] : number_format($json_data_IyzCoExchangeRate['rate'], 4);
				 $iyziCoAmount = truncate($calculateUsdToIyziCoExchange * $theCurrentPrice, 2);
				 
				 $bitPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$bitPayCurrency.'';
				 
				 $jsonbitPayUsdExchangeRate = url_get_contentsa($bitPayPaymentExchangeRate);
				 $json_data_bitPayExchangeRate = json_decode($jsonbitPayUsdExchangeRate, true); 
				 $calculateUsdTobitPayExchange = (abs($json_data_bitPayExchangeRate['rate'] - (int)$json_data_bitPayExchangeRate['rate']) < 0.001) ? (int)$json_data_bitPayExchangeRate['rate'] : number_format($json_data_bitPayExchangeRate['rate'], 4);
				 $bitPayAmount = truncate($calculateUsdTobitPayExchange * $theCurrentPrice, 2);
				 
				 $autHorizeNetPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$authorizeNetCurrency.'';
				 
				 $jsonautHorizeNetUsdExchangeRate = url_get_contentsa($autHorizeNetPaymentExchangeRate);
				 $json_data_autHorizeNetExchangeRate = json_decode($jsonautHorizeNetUsdExchangeRate, true); 
				 $calculateUsdToautHorizeNetExchange = (abs($json_data_autHorizeNetExchangeRate['rate'] - (int)$json_data_autHorizeNetExchangeRate['rate']) < 0.001) ? (int)$json_data_autHorizeNetExchangeRate['rate'] : number_format($json_data_autHorizeNetExchangeRate['rate'], 4);
				 $autHorizeNetAmount = truncate($calculateUsdToautHorizeNetExchange * $theCurrentPrice, 2);
				 
				 $paystackPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paystackCurrency.'';
				 
				 $jsonpaystackUsdExchangeRate = url_get_contentsa($paystackPaymentExchangeRate);
				 $json_data_paystackExchangeRate = json_decode($jsonpaystackUsdExchangeRate, true); 
				 $calculateUsdTopaystackExchange = (abs($json_data_paystackExchangeRate['rate'] - (int)$json_data_paystackExchangeRate['rate']) < 0.001) ? (int)$json_data_paystackExchangeRate['rate'] : number_format($json_data_paystackExchangeRate['rate'], 4);
				 $paystackAmount = truncate($calculateUsdTopaystackExchange * $theCurrentPrice, 2);
				 
				 $stripePaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$stripeCurrency.'';
				 
				 $jsonstripeUsdExchangeRate = url_get_contentsa($stripePaymentExchangeRate);
				 $json_data_stripeExchangeRate = json_decode($jsonstripeUsdExchangeRate, true); 
				 $calculateUsdTostripeExchange = (abs($json_data_stripeExchangeRate['rate'] - (int)$json_data_stripeExchangeRate['rate']) < 0.001) ? (int)$json_data_stripeExchangeRate['rate'] : number_format($json_data_stripeExchangeRate['rate'], 4);
				 $stripeAmount = truncate($calculateUsdTostripeExchange * $theCurrentPrice, 2);
				 
				 $razorPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$razorPayCurrency.'';
				 
				 $jsonrazorPayUsdExchangeRate = url_get_contentsa($razorPayPaymentExchangeRate);
				 $json_data_razorPayExchangeRate = json_decode($jsonrazorPayUsdExchangeRate, true); 
				 $calculateUsdTorazorPayExchange = (abs($json_data_razorPayExchangeRate['rate'] - (int)$json_data_razorPayExchangeRate['rate']) < 0.001) ? (int)$json_data_razorPayExchangeRate['rate'] : number_format($json_data_razorPayExchangeRate['rate'], 4);
				 $razorPayAmount = truncate($calculateUsdTorazorPayExchange * $theCurrentPrice, 2);
			 }
			 if(!empty($paymentDonateAmount)){
				 $getProductName  = 'Donate';
		         $getProductDescription = 'The person I follow is donated to produce better content.';
			     function url_get_contentsa($Url) {
								if (!function_exists('curl_init')){
									die('CURL is not installed!');
								}
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_FAILONERROR, 1);
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
								curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 4s
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
								curl_setopt($ch, CURLOPT_URL, $Url);
								curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
								$output = curl_exec($ch);
								curl_close($ch);
								return $output;
							}
							 
				 
				 $paypalPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paypalCurrency.'';
				 
				 $jsonPayPalUsdExchangeRate = url_get_contentsa($paypalPaymentExchangeRate);
				 $json_data_PayPalExchangeRate = json_decode($jsonPayPalUsdExchangeRate, true); 
				 $calculateUsdToPayPalExchange = (abs($json_data_PayPalExchangeRate['rate'] - (int)$json_data_PayPalExchangeRate['rate']) < 0.001) ? (int)$json_data_PayPalExchangeRate['rate'] : number_format($json_data_PayPalExchangeRate['rate'], 4);
				 $paypalAmount = truncate($calculateUsdToPayPalExchange * $paymentDonateAmount, 2);
				 
				 $paypalCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$paypalAmount.''.$currencys[$paypalCurrency].'</div></div>';
				 
				 $iyziCoPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$iyziCoCurrency.'';
				 
				 $jsonIyziCoUsdExchangeRate = url_get_contentsa($iyziCoPaymentExchangeRate);
				 $json_data_IyzCoExchangeRate = json_decode($jsonIyziCoUsdExchangeRate, true); 
				 $calculateUsdToIyziCoExchange = (abs($json_data_IyzCoExchangeRate['rate'] - (int)$json_data_IyzCoExchangeRate['rate']) < 0.001) ? (int)$json_data_IyzCoExchangeRate['rate'] : number_format($json_data_IyzCoExchangeRate['rate'], 4);
				 $iyziCoAmount = truncate($calculateUsdToIyziCoExchange * $paymentDonateAmount, 2);
				 
				 $iyziCoCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$iyziCoAmount.''.$currencys[$iyziCoCurrency].'</div></div>';
				 
				 $bitPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$bitPayCurrency.'';
				 
				 $jsonbitPayUsdExchangeRate = url_get_contentsa($bitPayPaymentExchangeRate);
				 $json_data_bitPayExchangeRate = json_decode($jsonbitPayUsdExchangeRate, true); 
				 $calculateUsdTobitPayExchange = (abs($json_data_bitPayExchangeRate['rate'] - (int)$json_data_bitPayExchangeRate['rate']) < 0.001) ? (int)$json_data_bitPayExchangeRate['rate'] : number_format($json_data_bitPayExchangeRate['rate'], 4);
				 $bitPayAmount = truncate($calculateUsdTobitPayExchange * $paymentDonateAmount, 2);
				 
				 $bitPayCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$bitPayAmount.''.$currencys[$bitPayCurrency].'</div></div>';
				 
				 $autHorizeNetPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$authorizeNetCurrency.'';
				 
				 $jsonautHorizeNetUsdExchangeRate = url_get_contentsa($autHorizeNetPaymentExchangeRate);
				 $json_data_autHorizeNetExchangeRate = json_decode($jsonautHorizeNetUsdExchangeRate, true); 
				 $calculateUsdToautHorizeNetExchange = (abs($json_data_autHorizeNetExchangeRate['rate'] - (int)$json_data_autHorizeNetExchangeRate['rate']) < 0.001) ? (int)$json_data_autHorizeNetExchangeRate['rate'] : number_format($json_data_autHorizeNetExchangeRate['rate'], 4);
				 $autHorizeNetAmount = truncate($calculateUsdToautHorizeNetExchange * $paymentDonateAmount, 2);
				 
				 $autHorizeNetCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$autHorizeNetAmount.''.$currencys[$authorizeNetCurrency].'</div></div>';
				 
				 $paystackPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$paystackCurrency.'';
				 
				 $jsonpaystackUsdExchangeRate = url_get_contentsa($paystackPaymentExchangeRate);
				 $json_data_paystackExchangeRate = json_decode($jsonpaystackUsdExchangeRate, true); 
				 $calculateUsdTopaystackExchange = (abs($json_data_paystackExchangeRate['rate'] - (int)$json_data_paystackExchangeRate['rate']) < 0.001) ? (int)$json_data_paystackExchangeRate['rate'] : number_format($json_data_paystackExchangeRate['rate'], 4);
				 $paystackAmount = truncate($calculateUsdTopaystackExchange * $paymentDonateAmount, 2);
				 
				 $paystackCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$paystackAmount.''.$currencys[$paystackCurrency].'</div></div>';
				 
				 $stripePaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$stripeCurrency.'';
				 
				 $jsonstripeUsdExchangeRate = url_get_contentsa($stripePaymentExchangeRate);
				 $json_data_stripeExchangeRate = json_decode($jsonstripeUsdExchangeRate, true); 
				 $calculateUsdTostripeExchange = (abs($json_data_stripeExchangeRate['rate'] - (int)$json_data_stripeExchangeRate['rate']) < 0.001) ? (int)$json_data_stripeExchangeRate['rate'] : number_format($json_data_stripeExchangeRate['rate'], 4);
				 $stripeAmount = truncate($calculateUsdTostripeExchange * $paymentDonateAmount, 2);
				 
				 $stripeCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$stripeAmount.''.$currencys[$stripeCurrency].'</div></div>';
				 
				 $razorPayPaymentExchangeRate = 'https://currency-1015.appspot.com/?from=USD&to='.$razorPayCurrency.'';
				 
				 $jsonrazorPayUsdExchangeRate = url_get_contentsa($razorPayPaymentExchangeRate);
				 $json_data_razorPayExchangeRate = json_decode($jsonrazorPayUsdExchangeRate, true); 
				 $calculateUsdTorazorPayExchange = (abs($json_data_razorPayExchangeRate['rate'] - (int)$json_data_razorPayExchangeRate['rate']) < 0.001) ? (int)$json_data_razorPayExchangeRate['rate'] : number_format($json_data_razorPayExchangeRate['rate'], 4);
				 $razorPayAmount = truncate($calculateUsdTorazorPayExchange * $paymentDonateAmount, 2);
				 $razorPayCalculate = '<div class="donate_exchange_rate"><span class="derate_icon">'.$Dot->Dot_SelectedMenuIcon('down_right').'</span><div class="derate">'.$paymentDonateAmount.'$='.$razorPayAmount.''.$currencys[$razorPayCurrency].'</div></div>';
			 } 
		     $DataUserDetails = [
			  'amounts' => [ // at least one currency amount is required
				  $paypalCurrency   => $paypalAmount,
				  $iyziCoCurrency   => $iyziCoAmount,
				  $bitPayCurrency   => $bitPayAmount,
				  $authorizeNetCurrency   => $autHorizeNetAmount,
				  $paystackCurrency => $paystackAmount,
				  $stripeCurrency => $stripeAmount,
				  $razorPayCurrency => $razorPayAmount
			  ],
			  'order_id'      => 'ORDS' . uniqid(), // required in instamojo, Iyzico, Paypal, Paytm gateways
			  'customer_id'   => 'CUSTOMER' . uniqid(), // required in Iyzico, Paytm gateways
			  'item_name'     => $getProductName, // required in Paypal gateways
			  'item_qty'      => 1,
			  'item_id'       => 'ITEM' . uniqid(), // required in Iyzico, Paytm gateways
			  'payer_email'   => $dataUserAccountEmail, // required in instamojo, Iyzico, Stripe gateways
			  'payer_name'    => $profileShoppingFullName, // required in instamojo, Iyzico gateways
			  'description'   => 'Lorem ipsum dolor sit amet, constetur adipisicing', // Required for stripe
			  'ip_address'    => getUserIpAddr(), // required only for iyzico 
			  'address'       => $profileShoppingFullAddress, // required in Iyzico gateways
			  'city'          => $dataCity,  // required in Iyzico gateways
			  'country'       => $dataCountry, // required in Iyzico gateways
			  'post_id' => $postID, // Payed Post ID
			  'customer_user_id' => $postOwnerID, // Payed User ID 
			  'p_t' =>  $paymentPostType
		  ];
		  $PublicConfigs             = getPublicConfigItem(); 
		  
		  $configItem = $configData['payments']['gateway_configuration'];
		  
		  // Get config data
			$configa             = getPublicConfigItem();
			// Get app URL
			$paymentPagePath    = getAppUrl();
		
			$gatewayConfiguration = $configData['payments']['gateway_configuration'];
			// get paystack config data
			$paystackConfigData = $gatewayConfiguration['paystack'];
			// Get paystack callback ur
			$paystackCallbackUrl= getAppUrl($paystackConfigData['callbackUrl']);
		
			// Get stripe config data
			$stripeConfigData   = $gatewayConfiguration['stripe'];
			// Get stripe callback ur
			$stripeCallbackUrl  = getAppUrl($stripeConfigData['callbackUrl']);
		
			// Get razorpay config data
			$razorpayConfigData = $gatewayConfiguration['razorpay'];
			// Get razorpay callback url
			$razorpayCallbackUrl= getAppUrl($razorpayConfigData['callbackUrl']);
		
			// Get Authorize.Net config Data
			$authorizeNetConfigData = $gatewayConfiguration['authorize-net'];
			// Get Authorize.Net callback url
			$authorizeNetCallbackUrl= getAppUrl($authorizeNetConfigData['callbackUrl']);

			// Individual payment gateway url
			$individualPaymentGatewayAppUrl = getAppUrl('individual-payment-gateways');
			 // User Details Configurations FINISHED
			 include("../contents/payment_methods.php");
	}
	// Choose Payment Methods
	if($activity == 'payment'){  
	     include("../functions/paymentConfig.php");
		 if(isset($_POST['met'])){
			 $method = mysqli_real_escape_string($db, $_POST['met']);
		     include("../functions/payment_progress.php");
		 } 
	}
	// Calculate Your Earnings
	if($activity == 'calculate_earning'){
		 
		function truncate($val, $dist) {
				//get position of digit $dist places after decimal point
				$pos = strpos($val,'.'); 
				if($pos !== false) {//if $val is actually a float
			
					//get the substring starting at the beginning
					//and ending with the point $dist after the
					//decimal, inclusive -- convert to float.
					$val = floatval(substr($val, 0, $pos + 1 + $dist));
			
				}           
				return $val;
			}
	      function url_get_contentsa($Url) {
				if (!function_exists('curl_init')){
					die('CURL is not installed!');
				}
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_FAILONERROR, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
				curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 4s
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
				curl_setopt($ch, CURLOPT_URL, $Url);
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$output = curl_exec($ch);
				curl_close($ch);
				return $output;
			}
							$urlusdtoinr = 'https://currency-1015.appspot.com/?from=INR&to=USD';
							$jsonusdtoinr = url_get_contentsa($urlusdtoinr);
							$json_data_usdtoinr = json_decode($jsonusdtoinr, true); 
							//***//
							$urlusdtongn = 'https://currency-1015.appspot.com/?from=NGN&to=USD';
							$jsonusdtongn = url_get_contentsa($urlusdtongn);
							$json_data_usdtongn = json_decode($jsonusdtongn, true); 
							//***//
							$urlusdtotry = 'https://currency-1015.appspot.com/?from=TRY&to=USD';
							$jsonusdtotry = url_get_contentsa($urlusdtotry);
							$json_data_usdtotry = json_decode($jsonusdtotry, true); 
							//***//
							$urlusdtousd = 'https://currency-1015.appspot.com/?from=USD&to=USD';
							$jsonusdtousd = url_get_contentsa($urlusdtousd);
							$json_data_usdtousd = json_decode($jsonusdtousd, true); 
				 /****/  
				 $calculateFormatUsdToUsd = (abs($json_data_usdtousd['rate'] - (int)$json_data_usdtousd['rate']) < 0.001) ? (int)$json_data_usdtousd['rate'] : number_format($json_data_usdtousd['rate'], 4);
				 $calculateFormatUsdToINR = (abs($json_data_usdtoinr['rate'] - (int)$json_data_usdtoinr['rate']) < 0.001) ? (int)$json_data_usdtoinr['rate'] : number_format($json_data_usdtoinr['rate'], 4);
				 $calculateFormatUsdToNGN = (abs($json_data_usdtongn['rate'] - (int)$json_data_usdtongn['rate']) < 0.001) ? (int)$json_data_usdtongn['rate'] : number_format($json_data_usdtongn['rate'], 4);
				 $calculateFormatUsdToTry = (abs($json_data_usdtotry['rate'] - (int)$json_data_usdtotry['rate']) < 0.001) ? (int)$json_data_usdtotry['rate'] : number_format($json_data_usdtotry['rate'], 4);
				 
				 
		    $earningDolarThisMonthSum = $Dot->Dot_TotalEarningThisMonthDolarSum($uid);
			$earningTLThisMonthSum = $Dot->Dot_TotalEarningThisMonthTLSum($uid);
			$earningNGNThisMonthSum = $Dot->Dot_TotalEarningThisMonthNGNSum($uid);
			$earningINRThisMonthSum = $Dot->Dot_TotalEarningThisMonthINRSum($uid); 
			
		   $totalEearning =   $calculateFormatUsdToNGN*$earningNGNThisMonthSum  +  $earningDolarThisMonthSum +   $calculateFormatUsdToINR*$earningINRThisMonthSum +  $calculateFormatUsdToTry*$earningTLThisMonthSum ; 
		   //$sumEarning = $Dot->Dot_UpdateTotalEarning($uid,$totalEearning);
		   $sendTotal = truncate($totalEearning, 2);   
		   $data = array(
		              'one_try_usd' => '1TRY = '.truncate($json_data_usdtotry['rate'], 3).'USD',
					  'total_try_usd' => $earningTLThisMonth.'TRY = '.$calculateFormatUsdToTry*$earningTLThisMonthSum.'USD',
					  'one_ngn_usd' => '1NGN = '.truncate($json_data_usdtongn['rate'], 3).'USD',
					  'total_ngn_usd' => $earningNGNThisMonth.'NGN = '.$calculateFormatUsdToINR*$earningNGNThisMonthSum.'USD',
					  'one_inr_usd' => '1INR = '.truncate($json_data_usdtoinr['rate'], 3).'USD',
					  'total_inr_usd' => $earningINRThisMonth.'INR = '.$calculateFormatUsdToINR*$earningINRThisMonthSum.'USD',
					  'dolar_earning' => '1USD = 1USD',
					  'usd_to_usd' => $earningDolarThisMonth.'USD = '.$earningDolarThisMonth.'USD',  
					  'total_e' => $Dot->Dot_UpdateTotalEarning($uid,$sendTotal).'$' 
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
	}
	// Create WithDrawal
	if($activity == 'paypalwithdrawal'){
	    if(isset($_POST['paypalEmail']) && isset($_POST['amountPaypal'])){
		       $amountPayPal = mysqli_real_escape_string($db, $_POST['amountPaypal']);
			   $paypalEmail = mysqli_real_escape_string($db, $_POST['paypalEmail']);
			   $amountNotCorrect = '';
			   $amountNotCorrect_two = '';
			   $notvalidEmail = '';
			   $withdrawalInserted = '';
			   $notinserted = '';
			   $minimumAmount = '';
			   if(!is_numeric($amountPayPal)){
				   $amountNotCorrect = '<div class="payout_item_box_title err_report">'.$page_Lang['requested_amount_incorrect'][$dataUserPageLanguage].'</div>'; 
			    }
			   if($amountPayPal > $dataUserTotalEarnings){
			       $amountNotCorrect_two = '<div class="payout_item_box_title err_report">'.$page_Lang['you_can_not_claim_more_money_then_you_earn'][$dataUserPageLanguage].'</div>'; 
			   }
			   if($amountPayPal < 50){
				   $amountNotCorrect = '<div class="payout_item_box_title err_report">'.$page_Lang['you_can_transfer_minimum_fifty_dolar_of_your_earnings'][$dataUserPageLanguage].'</div>'; 
			    }
			   if(!filter_var($paypalEmail, FILTER_VALIDATE_EMAIL)){
				   $notvalidEmail = '<div class="payout_item_box_title err_report">'.$page_Lang['please_check_your_paypal_email_address'][$dataUserPageLanguage].'</div>';
			   }
			   if(!empty($amountPayPal) && !empty($paypalEmail) && $amountPayPal >= 50 && is_numeric($amountPayPal) && filter_var($paypalEmail, FILTER_VALIDATE_EMAIL) && $amountPayPal <= $dataUserTotalEarnings){
			        $insertNewWithdrawal = $Dot->Dot_InsertNewWithdrawalPayPal($uid, $amountPayPal, $paypalEmail);
			   }
			   if($insertNewWithdrawal){
				   $withdrawalInserted = '<div class="payout_item_box_title succ_report">'.$page_Lang['payment_request_success'][$dataUserPageLanguage].'</div>';
				   $remaininMoney = $Dot->Dot_RemaininMoney($uid);
			   }else{
			       $notinserted = '<div class="payout_item_box_title err_report">'.$page_Lang['missinf_withdrawal_infos'][$dataUserPageLanguage].'</div>';
			   }
			   $data = array(
		              'not_valid_amount' => $amountNotCorrect,
					  'amount_les_then_earns' => $amountNotCorrect_two,
					  'email_not_valid' => $notvalidEmail,
					  'success' => $withdrawalInserted,
					  'missing' => $notinserted,
					  'minimum' => $minimumAmount,
					  'remaining' => $remaininMoney
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}
	}
	// Create Withdrawal IBAN
	if($activity == 'ibanwithdrawal'){
	     if(isset($_POST['iban']) && isset($_POST['payamount'])){
		       $payAmount = mysqli_real_escape_string($db, $_POST['payamount']);
			   $IBANNumber = mysqli_real_escape_string($db, $_POST['iban']);
			   $amountNotCorrect = '';
			   $amountNotCorrect_two = '';
			   $notvalidEmail = '';
			   $withdrawalInserted = '';
			   $notinserted = '';
			   $minimumAmount = '';
			   if(!is_numeric($payAmount)){
				   $amountNotCorrect = '<div class="payout_item_box_title err_report">'.$page_Lang['requested_amount_incorrect'][$dataUserPageLanguage].'</div>'; 
			    }
			   if($payAmount > $dataUserTotalEarnings){
			       $amountNotCorrect_two = '<div class="payout_item_box_title err_report">'.$page_Lang['you_can_not_claim_more_money_then_you_earn'][$dataUserPageLanguage].'</div>'; 
			   }
			   if($payAmount < 50){
				   $amountNotCorrect = '<div class="payout_item_box_title err_report">'.$page_Lang['you_can_transfer_minimum_fifty_dolar_of_your_earnings'][$dataUserPageLanguage].'</div>'; 
			    }
			   if(strlen($IBANNumber) < 19 && strlen($IBANNumber) > 35){
				   $notValidIBAN = '<div class="payout_item_box_title err_report">'.$page_Lang['your_iban_number_is_not_valid'][$dataUserPageLanguage].'</div>';
			   }
			   if(!empty($payAmount) && !empty($IBANNumber) && is_numeric($payAmount) && strlen($IBANNumber) > 19 && strlen($IBANNumber) < 35 && $payAmount <= $dataUserTotalEarnings){
			        $insertNewWithdrawal = $Dot->Dot_InsertNewWithdrawalIBAN($uid, $payAmount, $IBANNumber);
			   }
			   if($insertNewWithdrawal){
				   $withdrawalInserted = '<div class="payout_item_box_title succ_report">'.$page_Lang['payment_request_success'][$dataUserPageLanguage].'</div>'; 
				   $remaininMoney = $Dot->Dot_RemaininMoney($uid);
			   }else{
			       $notinserted = '<div class="payout_item_box_title err_report">'.$page_Lang['missinf_withdrawal_infos'][$dataUserPageLanguage].'</div>';
			   }
			   $data = array(
		              'not_valid_amount' => $amountNotCorrect,
					  'amount_les_then_earns' => $amountNotCorrect_two,
					  'iban_not_valid' => $notValidIBAN,
					  'success' => $withdrawalInserted,
					  'missing' => $notinserted,
					  'minimum' => $minimumAmount,
					  'remaining' => $remaininMoney
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}
	}
	// How To Use
	if($activity == 'howtousehome'){
	   include("../contents/howTo.php");
	}
	// Convert Point to Dolar
	if($activity == 'convertpointtodolar'){ 
		  $dolarEarningFromPoints =  $AllTotalPoints / $pointEqualDollar;
		  $calculatedPointToDolar = $Dot->Dot_CalculatePointToDolar($uid, $dolarEarningFromPoints);
		  if($calculatedPointToDolar){
		           $data = array(
		              'comSum' => '0',
					  'likSum' => '0',
					  'posSum' => '0',
					  'storSum' => '0',
					  'totpoint' => '0 <span class="poo">points</span>',
					  'dlSum' => $calculatedPointToDolar.'$'
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }
	}
	// Transfer your balance
	if($activity == 'transferbalance'){
	       if($dataPontEarnings >= 50){
		        $transferMoney = $Dot->Dot_TransferDolarToBalance($uid, $dataPontEarnings);
				if($transferMoney){
				    $data = array(  
					  'dlSum' => '0$',
					  'trsuccess' => $page_Lang['money_transfered_to_balance'][$dataUserPageLanguage]
					 );
					 $result =  json_encode( $data );	
				     echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				}
		   }else{
			  $data = array(  
				'dlSumno' => $page_Lang['no_available_balance'][$dataUserPageLanguage]
			   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		  }
	}
	// Download Profile Informatons
 if($activity == 'down'){ 
	$postNotTypes = array("info","text","image","link","video","audio","avatar","cover","gif","location","watermark","which","event","page","blog","group","market","bfaf","stories","following","followers");
		if(isset($_POST['value']) && in_array($_POST['value'], $postNotTypes)){  
			 $nameis = $dataUsername;
			 $thety = mysqli_real_escape_string($db, $_POST['value']);
			file_put_contents('../sources/'.$nameis.'.html', ob_get_clean()); 
			$thefile = '../sources/'.$nameis.'.html';  
			if(file_exists($thefile)) {   
				 echo 'hen.php?thetype='.$thety;
				 exit();  
			} 
		}
	}
	// Delete My Account
	if($activity == 'deletemyaccount'){
		if(isset($_POST['pass'])){
		    $cuPassword = mysqli_real_escape_string($db, $_POST['pass']);
			$cup = strtolower(sha1(md5(trim($cuPassword))));
			if($dataUserPp == $cup){
			     $deleteUserAccount = $Dot->Dot_DeleteMyAccount($uid);
				 if($deleteUserAccount){
				     $data = array(  
					  'deleted' => $deleteUserAccount,
					  'byebye' => '<div class="poSBoxContainer"><div class="post-modal-Wrap"><div class="post-modal-middle byebye"><div class="accountDeletedSuccess">'.$page_Lang['account_deleted_succes'][$dataUserPageLanguage].'</div></div></div></div>'
					 );
					 $result =  json_encode( $data );	
				     echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				 }
			} else {
			    $data = array(  
					  'deletedno' => '<div class="set_box_new delalert" style="color:#e74c3c;">'.$page_Lang['incorrect_current_password'][$dataUserPageLanguage].'</div>', 
					 );
					 $result =  json_encode( $data );	
				     echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			}
		} 
	}
   // add user from favourite list
   if($activity == 'favourite'){
       if(isset($_POST['i'])){ 
		   $favouriteID = mysqli_real_escape_string($db, $_POST['i']);
		   $addUserInFavouriteList = $Dot->Dot_AddThisUserFromFavouriteList($uid, $favouriteID);
		   if($addUserInFavouriteList){ 
		         $data = array(  
					  'addFavourite' => 1,
					  'addedIcon' => $Dot->Dot_GetSvgIcon('65'), 
					  'itype' => 'infavourite',
					  'addnote' => $page_Lang['added_this_user_from_favoirutelist'][$dataUserPageLanguage]
				  );
				 $result =  json_encode( $data );	
				 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }
	   }
   }
   // remove user from favourite list
   if($activity == 'infavourite'){
       if(isset($_POST['i'])){ 
		   $favouriteID = mysqli_real_escape_string($db, $_POST['i']);
		   $addUserInFavouriteList = $Dot->Dot_RemoveThisUserFromFavouriteList($uid, $favouriteID);
		   if($addUserInFavouriteList){ 
		         $data = array(  
					  'addFavourite' => 1,
					  'addedIcon' => $Dot->Dot_GetSvgIcon('64'), 
					  'itype' => 'favourite',
					  'addnote' => $page_Lang['removed_added_this_user_from_favoirutelist'][$dataUserPageLanguage]
				  );
				 $result =  json_encode( $data );	
				 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }
	   }
   }
   // User Information Show
   if($activity == 'userfirstinfo'){
	    if(isset($_POST['u'])){
		    $thisUser = mysqli_real_escape_string($db, $_POST['u']);
			$Dot->Dot_UpdateUserVisitStatus($uid, $thisUser);
			$getUserDetails = $Dot->Dot_GetUserDetailsFromID($uid, $thisUser);   
			if($getUserDetails){
				foreach($getUserDetails as $ud){
			        include_once("../contents/html_user_inf.php"); 
				}
			}
		} 
   }
   // Display Ads After Video
   if($activity == 'afterads'){
	   if(isset($_POST['afID'])){
		    $afterVideoID = mysqli_real_escape_string($db, $_POST['afID']);
			if(!empty($afterVideoID)){ 
			    include_once("../contents/html_after_video_ads.php");
			}
	   } 
   }
   // Get Filter Search panel
   if($activity == 'filterusers'){
           include_once("../contents/html_filter_search_panel.php");
   }
   // Show Filtered Users
   if($activity == 'srcfltyp'){  
	   if(isset($_POST['miAge']) && isset($_POST['maxAge']) && isset($_POST['dist']) && isset($_POST['gen']) && isset($_POST['onof']) && isset($_POST['av']) && isset($_POST['relstat']) && isset($_POST['sexlity']) && isset($_POST['heght']) && isset($_POST['weght']) && isset($_POST['lfstyl']) && isset($_POST['chldrn']) && isset($_POST['smkhbt']) && isset($_POST['drnkhbt']) && isset($_POST['hrclr']) && isset($_POST['eyclr']) && isset($_POST['bdyType'])){ 
	         
	         $checkOnlineOfflineForPro = $Dot->Dot_SearchItemCheckerProUsers(1,$uid); 
			 $checkAvatarForPro = $Dot->Dot_SearchItemCheckerProUsers(2,$uid);
			 $checkDistanceForPro = $Dot->Dot_SearchItemCheckerProUsers(3,$uid);
			 $checkAgeForPro = $Dot->Dot_SearchItemCheckerProUsers(4,$uid);
			 $checkRelationShipForPro = $Dot->Dot_SearchItemCheckerProUsers(5,$uid);
			 $checkGenderForPro = $Dot->Dot_SearchItemCheckerProUsers(6,$uid);
			 $checkSexualityForPro = $Dot->Dot_SearchItemCheckerProUsers(7,$uid);
			 $checkHeightForPro = $Dot->Dot_SearchItemCheckerProUsers(8,$uid);
			 $checkWeightForPro = $Dot->Dot_SearchItemCheckerProUsers(9,$uid);
			 $checkLifeStyleForPro = $Dot->Dot_SearchItemCheckerProUsers(10,$uid);
			 $checkChildrenForPro = $Dot->Dot_SearchItemCheckerProUsers(11,$uid);
			 $checkSmokingHabitForPro = $Dot->Dot_SearchItemCheckerProUsers(12,$uid);
			 $checkDrinkingHabitForPro = $Dot->Dot_SearchItemCheckerProUsers(13,$uid);
			 $checkBodyTypeForPro = $Dot->Dot_SearchItemCheckerProUsers(14,$uid);
			 $checkHairColorForPro = $Dot->Dot_SearchItemCheckerProUsers(15,$uid);
			 $checkEyeColorForPro = $Dot->Dot_SearchItemCheckerProUsers(16,$uid);   
			 
			 if($checkOnlineOfflineForPro == 1){
				   $onofl = mysqli_real_escape_string($db, $_POST['onof']);
			  }else{
				  $onofl = NULL;
			  }
			 if($checkAvatarForPro == 1){$wavatar = mysqli_real_escape_string($db, $_POST['av']);}else{$wavatar = NULL;}
			 if($checkDistanceForPro == 1){$distan = mysqli_real_escape_string($db, $_POST['dist']);}else{$distan = NULL;}
			 if($checkAgeForPro == 1){ 
			     $miniAge = mysqli_real_escape_string($db, $_POST['miAge']); $maxiAge = mysqli_real_escape_string($db, $_POST['maxAge']);
			 }else{
		        $miniAge = NULL;
			    $maxiAge = NULL;
			 }
			 if($checkRelationShipForPro == 1){$srelationshipstatus = mysqli_real_escape_string($db, $_POST['relstat']);}else{$srelationshipstatus = NULL;}
			 if($checkGenderForPro == 1){$gend = mysqli_real_escape_string($db, $_POST['gen']);}else{$gend = NULL;}
			 if($checkSexualityForPro == 1){$ssexuality = mysqli_real_escape_string($db, $_POST['sexlity']);}else{$ssexuality = NULL;} 
			 if($checkHeightForPro == 1){$sheight = mysqli_real_escape_string($db, $_POST['heght']);}else{$sheight = NULL;} 
			 if($checkWeightForPro == 1){$sweight = mysqli_real_escape_string($db, $_POST['weght']);}else{$sweight = NULL;} 
			 if($checkLifeStyleForPro == 1){$slifestyle = mysqli_real_escape_string($db, $_POST['lfstyl']);}else{$slifestyle = NULL;} 
			 if($checkChildrenForPro == 1){$schildren = mysqli_real_escape_string($db, $_POST['chldrn']);}else{$schildren = NULL;} 
			 if($checkSmokingHabitForPro == 1){$ssmokinghabit = mysqli_real_escape_string($db, $_POST['smkhbt']);}else{$ssmokinghabit = NULL;}
			 if($checkDrinkingHabitForPro == 1){$sdrinkinghabit = mysqli_real_escape_string($db, $_POST['drnkhbt']);}else{$sdrinkinghabit = NULL;}
			 if($checkHairColorForPro == 1){$shaircolor = mysqli_real_escape_string($db, $_POST['hrclr']);}else{$shaircolor = NULL;}
			 if($checkEyeColorForPro == 1){$seyecolor = mysqli_real_escape_string($db, $_POST['eyclr']);}else{$seyecolor = NULL;}
			 if($checkBodyTypeForPro == 1){$sbodyType = mysqli_real_escape_string($db, $_POST['bdyType']);}else{$sbodyType = NULL;} 
			  
			 $calculatedistance = $Dot->Dot_DistanceGlobalSrc($uid,$dataUserLatitude, $dataUserLongitude, $miniAge, $maxiAge, $distan, $gend, $onofl, $wavatar,$srelationshipstatus,$ssexuality,$sheight,$sweight,$slifestyle,$schildren,$ssmokinghabit,$sdrinkinghabit,$shaircolor,$seyecolor,$sbodyType); 
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
				 <?php }
			   }
	   }
   }
   // Get Filter Search panel
   if($activity == 'promem'){
           include_once("../contents/html_pro_popup.php");
   }
   //Insert Product in User Cart
   if($activity == 'addToCard'){
       if(isset($_POST['product'])){
	       $addThisProduct = mysqli_real_escape_string($db, $_POST['product']);
		   $addProduct = $Dot->Dot_InsertProductFromShoppingCart($uid, $addThisProduct);
		   if($addProduct){
		       $data = array(  
					  'productAdded' => 1,
					  'productCount' => $Dot->Dot_CalculateUserShoppingCartProducts($uid), 
					  'addedNote' => $page_Lang['product_added_in_your_box'][$dataUserPageLanguage]
				  );
				 $result =  json_encode( $data );	
				 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }else{
		      $data = array(   
					  'addedNote' => $page_Lang['product_not_added_in_your_box'][$dataUserPageLanguage]
				  );
				 $result =  json_encode( $data );	
				 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }
	   }
   }
   // Delete This Product From Shopping Cart List
   if($activity == 'delete_this_prop'){
       if(isset($_POST['prid'])){
	        $productID = mysqli_real_escape_string($db, $_POST['prid']);
			$DeleteThisProductFromShoppingCart = $Dot->Dot_DeleteProductFromShoppingCart($uid, $productID);
			if($DeleteThisProductFromShoppingCart){
			      echo 1;
			}
	   }
   }
   /*Select a Payment Method*/
   if($activity == 'select_payment_method'){
	     if(isset($_POST['cpid']) && isset($_POST['cid']) && isset($_POST['u'])){
		      $cartProductID = mysqli_real_escape_string($db, $_POST['cpid']);
			  $cardID = mysqli_real_escape_string($db, $_POST['cid']);
			  $productOwner = mysqli_real_escape_string($db, $_POST['u']);
			  $checkCorrectDetails = $Dot->Dot_CheckProductIsInData($uid,$productOwner, $cartProductID);
			  if($checkCorrectDetails){
			       echo '
				     <div class="popupBack"></div>
					    <div class="anm">
						<div class="modalCheckout">
						<div class="payment_method_header">
							  <div class="spm">'.$page_Lang['please_select_a_payment_method'][$dataUserPageLanguage].'</div>
										<div class="methods_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M42.93001,35.76335c-2.91628,0.00077 -5.54133,1.76841 -6.63871,4.47035c-1.09737,2.70194 -0.44825,5.79937 1.64164,7.83336l37.93295,37.93294l-37.93295,37.93294c-1.8722,1.79752 -2.62637,4.46674 -1.97164,6.97823c0.65473,2.51149 2.61604,4.4728 5.12753,5.12753c2.51149,0.65473 5.18071,-0.09944 6.97823,-1.97165l37.93294,-37.93294l37.93294,37.93294c1.79752,1.87223 4.46675,2.62641 6.97825,1.97168c2.5115,-0.65472 4.47282,-2.61605 5.12755,-5.12755c0.65472,-2.5115 -0.09946,-5.18073 -1.97168,-6.97825l-37.93294,-37.93294l37.93294,-37.93294c2.11962,-2.06035 2.75694,-5.21064 1.60486,-7.93287c-1.15207,-2.72224 -3.85719,-4.45797 -6.81189,-4.37084c-1.86189,0.05548 -3.62905,0.83363 -4.92708,2.1696l-37.93294,37.93295l-37.93294,-37.93295c-1.34928,-1.38698 -3.20203,-2.16948 -5.13704,-2.1696z"></path></g></g></svg></div>
							</div>
							<div class="methods_wrapper">
								 <div class="methods_con">
									 <div class="method_box_item"><span class="btn green waves-effect waves-orange pay_at_door" data-donateid="'.$cartProductID.'" data-id="'.$cardID.'" data-type="pb" data-u="'.$productOwner.'">'.$page_Lang['pay_at_door'][$dataUserPageLanguage].'</span></div>
									 <div class="method_box_item"><span class="btn blue waves-effect waves-purple donate_post" data-donateid="'.$cartProductID.'" data-id="'.$cardID.'" data-type="pb" data-u="'.$productOwner.'">'.$page_Lang['onlinepayment'][$dataUserPageLanguage].'</span></div>
								 </div>
							</div>
							</div>
						</div>
				   ';
			  }
		 }
	}
	// Save Profile Information     
	if($activity == 'shoppingInformation'){ 
	    if(isset($_POST['spfulnam']) && isset($_POST['spphon']) && isset($_POST['spaddress']) && isset($_POST['pscdid']) && isset($_POST['personalid'])){
		      $newUserFullName = mysqli_real_escape_string($db, $_POST['spfulnam']); 
			  $userphone = mysqli_real_escape_string($db, $_POST['spphon']);
			  $useraddress = mysqli_real_escape_string($db, $_POST['spaddress']); 
			  $userPassportID = mysqli_real_escape_string($db, $_POST['personalid']);
			  $userPostCode = mysqli_real_escape_string($db, $_POST['pscdid']);
			  $saveNewShoppingInformation = $Dot->Dot_SaveUserShoppingInformation($uid,$newUserFullName, $useraddress, $userphone,$userPassportID,$userPostCode);
			  if($saveNewShoppingInformation){
				  echo $page_Lang['updates_personal_information'][$dataUserPageLanguage]; 
				 exit();  
			  }else{
				  echo $page_Lang['something_went_wrong'][$dataUserPageLanguage]; 
				  exit();
		      }
		}
	}
	/*Pat At Door*/
	if($activity == 'patatdoor'){
	     if(isset($_POST['pd']) && isset($_POST['u']) && isset($_POST['ty'])){
	          $postID = mysqli_real_escape_string($db, $_POST['pd']);
			  $postOwnerID = mysqli_real_escape_string($db, $_POST['u']);
			  $paymentPostType = mysqli_real_escape_string($db, $_POST['ty']);  
			  if(empty($dataCountry) || empty($dataCity) || empty($dataState) || empty($profileShoppingFullAddress) || empty($profileShoppingPhoneNumber) || empty($profileShoppingFullName) || empty($dataUserPostCode) || empty($dataUserPassportCodeOrIdNumber)){
			        $data = array(  
					  'status' => 2,
					  'note' => '<div class="withdrawal_note" style="margin-bottom:20px;">'.$page_Lang['need_to_finish_address_informations'][$dataUserPageLanguage].'<div class="card-action"><a href="'.$base_url.'settings#shoppingaddress">'.$page_Lang['complete_your_add_informations'][$dataUserPageLanguage].'</a><a class="card-close">Close</a></div></div>'
				    );
				    $result =  json_encode( $data );	
				    echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
					exit();
			  }
			  $dataInsertOrder = $Dot->Dot_InsertOrder($uid, $postID, $postOwnerID,$dataCountry,$dataCity,$dataState,$profileShoppingFullName,$profileShoppingPhoneNumber,$profileShoppingFullAddress,$dataUserPostCode,$dataUserPassportCodeOrIdNumber);
			  /********/
			  if($dataInsertOrder){
					//SEND PUSH NOTIFICATION CODE	 
					$likers_name = $Dot->Dot_UserFullName($uid);
					//echo $likers_name; 
					//get post author's user id and device_id
					$authors_data = $Dot->Dot_GetUserDetailsByPostId($postID);
					//print_r($authors_data);
					$puser_id = $authors_data['user_id_fk'];
					$post_id = $authors_data['user_post_id'];
                    $slugURL = $authors_data['slug'];
					$device_id = $authors_data['device_id'];
					$device_type = $authors_data['device_type'];
                    $deviceKeyOneSignal = $authors_data['device_key'];
					if ($puser_id != $uid) { 
						if(!empty($deviceKeyOneSignal) && $oneSignalStatus == '1'){
					        $likedYourPostTitle = $likers_name.' has ordered a product.';
					        $likedPostNotificationBody = 'Click here to see which product he ordered.';
					        $url = $base_url . "status/" . $slugURL;
					        $Dot->Dot_OneSignalPushNotificationSend($likedPostNotificationBody, $likedYourPostTitle,$url,$deviceKeyOneSignal,$oneSignalApi,$oneSignalRestApi);
					    }
						//send push notification here
						$title = "Oobenn";
						$body = $likers_name . " has ordered your product.";
						$url = $base_url . "status/" . $slugURL;
						//echo $url;
						sendPushNotification($device_id, $device_type, $body, $title, $url);

						//END OF PUSH NOTIFICATION CODE FOR POST LIKE
					}
					$data = array(  
					  'status' => 1,
					  'note' => $page_Lang['your_product_order_has_received'][$dataUserPageLanguage]
				    );
				    $result =  json_encode( $data );	
				    echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
			  }else{
				    $data = array(  
					  'status' => 1,
					  'note' => $page_Lang['your_product_order_has_no_received'][$dataUserPageLanguage]
				    );
				    $result =  json_encode( $data );	
				    echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);  
			  }
			  /********/
		 }
	}
	// Get Filter Search panel
   if($activity == 'userCountryStateCity'){
	    if(isset($_POST['ttip'])){
			$theLocType = mysqli_real_escape_string($db, $_POST['ttip']);
			if($theLocType == 'county'){
			    $selectText = $page_Lang['select_country'][$dataUserPageLanguage];
			}else if($theLocType == 'ustate'){
			    $selectText = $page_Lang['select_state'][$dataUserPageLanguage];
			}else if($theLocType == 'ucitty'){
			    $selectText = $page_Lang['select_city'][$dataUserPageLanguage];
			}
		    include_once("../contents/html_country_state_city.php");
		} 
   }
   // Save Born Country
	if($activity == 'thiscountry'){
	     if(isset($_POST['countrycode'])){
	         $saveCountry = mysqli_real_escape_string($db, $_POST['countrycode']);
			 if($dataCity){
			     $Dot->Dot_UpdateCityState($uid);
			  }
			 $saveThisCountry = $Dot->Dot_SaveCountry($saveCountry, $uid);
			 if($saveThisCountry){
			      echo $saveThisCountry;
			 }
		 }
	}
	// Save Born City
	if($activity == 'thiscity'){
	     if(isset($_POST['city'])){
		       $City = mysqli_real_escape_string($db, $_POST['city']); 
			   $saveThisCity = $Dot->Dot_SaveCities($City, $uid);
			   if($saveThisCity){
				    echo $saveThisCity;
			   }
		 }
	}
	// Save Born City
	if($activity == 'thisstates'){
	     if(isset($_POST['sta'])){
		       $satess = mysqli_real_escape_string($db, $_POST['sta']); 
			   $saveThisState = $Dot->Dot_GetSavedState($satess, $uid);
			   if($saveThisState){
				    echo $saveThisState;
			   }
		 }
	}
	/*Send Cargo Status*/
	if($activity == 'sendCargoStatus'){
		 if(isset($_POST['cus']) && isset($_POST['cart'])){
			  $customerID = mysqli_real_escape_string($db, $_POST['cus']);
			  $cartID  = mysqli_real_escape_string($db, $_POST['cart']);
		      include_once("../contents/html_cargo_list.php");
		 } 
	}
	/*Send Cargo Status*/
	if($activity == 'cargostatusupdate'){
		 if(isset($_POST['cus']) && isset($_POST['cart']) && isset($_POST['cargo']) && isset($_POST['tracking'])){
			  $customerID = mysqli_real_escape_string($db, $_POST['cus']);
			  $cartID  = mysqli_real_escape_string($db, $_POST['cart']);
			  $cargoCampany  = mysqli_real_escape_string($db, $_POST['cargo']);
			  $trackingNumber  = mysqli_real_escape_string($db, $_POST['tracking']);
			  if(empty($cargoCampany) || empty($trackingNumber)){
			       echo $page_Lang['all_feald_are_required'][$dataUserPageLanguage];
				   exit();
			  }
		      $updadtetCargoStatus = $Dot->Dot_UpdateCargoStatuus($uid, $customerID, $cartID,$cargoCampany,$trackingNumber);
			  if($updadtetCargoStatus){
			     echo '1';
			  }
		 } 
	}
	/*Ask Product Delivery Status to Customser*/
	if($activity == 'askdeliverystat'){
	    if(isset($_POST['prd'])){
		    $cartID = mysqli_real_escape_string($db, $_POST['prd']);
			$askDelivery = $Dot->Dot_AskDeliveryStatus($uid, $cartID);
			if($askDelivery == true){
			    $data = array(  
					  'status' => 1,
					  'note' => $page_Lang['sended_success'][$dataUserPageLanguage]
			    );
			}else{
			    $data = array(  
					  'status' => 2,
					  'note' => $page_Lang['send_not_success'][$dataUserPageLanguage]
			    );
			}
		    
		     $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
		}
	}
	/*Yes i got it  */
	if($activity == 'yesigotit'){
	    if(isset($_POST['prd'])){
		    $cartID = mysqli_real_escape_string($db, $_POST['prd']);
			$askDelivery = $Dot->Dot_YesIGotProduct($uid, $cartID);
			if($askDelivery == true){
			    $data = array(  
					  'status' => 1,
					  'note' => $page_Lang['thanks_for_your_answer'][$dataUserPageLanguage]
			    );
			}else{
			    $data = array(  
					  'status' => 2,
					  'note' => $page_Lang['send_not_success'][$dataUserPageLanguage]
			    );
			}
		    
		     $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
		}
	}
	/*Donate Form OPEN*/
	if($activity == 'donateFrm'){
	     if(isset($_POST['donateThis']) && isset($_POST['donateThisu'])){
		      $donateThisPost = mysqli_real_escape_string($db, $_POST['donateThis']);
			  $donateThisUser = mysqli_real_escape_string($db, $_POST['donateThisu']);
			  $checkAllExist = $Dot->Dot_CheckAllisOk($uid, $donateThisPost, $donateThisUser);
			  if($checkAllExist){
				     include("../contents/html_donate_form.php");
			  }
		 }
	}
	
	/*On off Last Seen status*/
	if($activity == 'o_f_o_n'){
	    if(isset($_POST['status'])){
		      $status = mysqli_real_escape_string($db, $_POST['status']);
			  $updadteOnlineOfflineStatus = $Dot->Dot_UpdateLastSeenStatusOpenClose($uid, $status);
			  if($updadteOnlineOfflineStatus){
				   echo $page_Lang['online_offline_status_changed_successfully'][$dataUserPageLanguage];
			  }else{ 
				  echo $page_Lang['you_should_be_pro_member'][$dataUserPageLanguage];
			   }
		}
	}
	// After Scroll HashTag
	if($activity == 'afterscrolltrendtags'){
	    if(isset($_POST['here'])){
		    $afterThisNumber = mysqli_real_escape_string($db, $_POST['here']);
			$updateScrollShowAds = $Dot->Dot_UpdateAfterScrollTags($afterThisNumber, $uid);
			if($updateScrollShowAds){
			    echo '1';
			}
		}
	}
	// After Scroll HashTag
	if($activity == 'afterscrollGoogleAds'){
	    if(isset($_POST['here'])){
		    $afterThisNumber = mysqli_real_escape_string($db, $_POST['here']);
			$updateScrollShowAds = $Dot->Dot_UpdateAfterScrollGoogleAds($afterThisNumber, $uid);
			if($updateScrollShowAds){
			    echo '1';
			}
		}
	}
	// After Scroll HashTag
	if($activity == 'afterscrollmyKnowuser'){
	    if(isset($_POST['here'])){
		    $afterThisNumber = mysqli_real_escape_string($db, $_POST['here']);
			$updateScrollShowAds = $Dot->Dot_UpdateAfterScrollMayKnowUser($afterThisNumber, $uid);
			if($updateScrollShowAds){
			    echo '1';
			}
		}
	}
	// Profile Security
	if($activity == 'securityMessage'){
	   $privateType = array("securityProfileMessage");
	   $privateEnumNumber = array("0","1");
	   if(in_array($_POST['notit'], $privateEnumNumber) && in_array($_POST['not'], $privateType)){
	         $PrivTypeBy = mysqli_real_escape_string($db, $_POST['not']);
			 if($PrivTypeBy == 'securityProfileMessage'){
			     $changeThisPriv = mysqli_real_escape_string($db, $_POST['notit']);
				 $NewPrivType = $Dot->Dot_MessageAvailableOnProfile($uid, $changeThisPriv);
				 if($NewPrivType){
				    echo '<div class="newOk"> '.$page_Lang['update_success'][$dataUserPageLanguage].'</div>'; 
				    exit();  
				 }else{
				    echo '<div class="newWarning"> '.$page_Lang['something_went_wrong'][$dataUserPageLanguage].'</div>'; 
				  exit();
				 }
			}
	   }else{
	      echo '3';
	   }
	}
/*Create New Market*/
if($activity == 'newMarket'){
    include("../contents/createMarket.php");
}
if($activity == 'createMyStore'){ 
    if(isset($_POST['urlname']) && isset($_POST['mrktflnam']) && isset($_POST['marketinfo'])){
	    $marketName = mysqli_real_escape_string($db, $_POST['urlname']);
		$marketFullName = mysqli_real_escape_string($db, $_POST['mrktflnam']);
		$marketInformations = mysqli_real_escape_string($db, $_POST['marketinfo']);
		$checkMarketNameExist = $Dot->Dot_CheckMarketNameExist($marketName);
		$checkCreatedMarketBefore = $Dot->Dot_CreatedMarketBefore($uid);
		if($checkMarketNameExist){
		    echo $page_Lang['store_name_taken_before_try_another'][$dataUserPageLanguage];
			exit();
		}
		if($checkCreatedMarketBefore){
		    echo $page_Lang['you_already_have_store'][$dataUserPageLanguage];
			exit();
		}
		$saveNewMarket = $Dot->Dot_CreateNewMarket($uid, $marketName, $marketFullName, $marketInformations);
		if($saveNewMarket){
		   echo '1';
		}
	}
}
/*How To Use Hover Tooltip*/
if($activity == 'howtouse'){
    if(isset($_POST['help'])){
	    $help = mysqli_real_escape_string($db, $_POST['help']); 
		$getKeyFromData = $Dot->Dot_GetTourKey($uid,$help);
		 if($getKeyFromData){
				echo '<span class="">'.$page_Lang[$getKeyFromData][$dataUserPageLanguage].'</span><span class="clsCon"><span class="clsTour waves-effect waves-light" id="'.$help.'" data-type="cancelthistour">Close</span></span>';
		 } 
	}
}
/*Don't show this tour again*/
if($activity == 'cancelthistour'){
   if(isset($_POST['thistour'])){
	    $tourID = mysqli_real_escape_string($db, $_POST['thistour']); 
		$updateTour = $Dot->Dot_DoNotShowThisTour($uid, $tourID);   
   }
}
/*Set Saw Announcement*/
if($activity == 'sawa'){
    if(isset($_POST['saw'])){
	    $sawID = mysqli_real_escape_string($db, $_POST['saw']);
		$insertSaw = $Dot->Dot_SawAnnouncement($uid, $sawID);
		if($insertSaw){echo '1';}
	}
} 
/*Update Message Read Status*/
if($activity == 'yres'){
   if(isset($_POST['user']) && isset($_POST['id'])){
         $updateReadStatusFromThisUserName = mysqli_real_escape_string($db, $_POST['user']);
		 $updateReadStatusFromThisUserID = mysqli_real_escape_string($db, $_POST['id']);
		 $updateReadStatus = $Dot->Dot_UpdateMessageReadStatus($uid, $updateReadStatusFromThisUserID);
   }
}
/*Donate Form OPEN*/
	if($activity == 'whcnse'){
	     if(isset($_POST['post'])){
		      $postID = mysqli_real_escape_string($db, $_POST['post']); 
			  $checkUserPostOwner = $Dot->Dot_CheckOwner($uid, $postID);
			  $getWhoCanSeeThisPostSet = $Dot->Dot_GetWhoCanSeeThisPostSet($uid, $postID); 
			  if($checkUserPostOwner){
				  include("../contents/html_whocansee_list.php");
			  }
		 }
	}
/*Update Who Can See*/
if($activity == 'chngws'){
	$WhoCanSee = array("everyone","onlyme","friends");
   if(isset($_POST['post']) && in_array($_POST['whs'], $WhoCanSee)){
       $postID = mysqli_real_escape_string($db, $_POST['post']); 
	   $selectedWhs = mysqli_real_escape_string($db, $_POST['whs']);
	   $checkUserPostOwner = $Dot->Dot_UpdateWhoCanSee($uid, $postID,$selectedWhs);
	   if($checkUserPostOwner){
	 	    if($selectedWhs == 'everyone'){
			    echo $page_Lang['now_everyone_can_see_this_post'][$dataUserPageLanguage];
			}else if($selectedWhs == 'onlyme'){
			    echo $page_Lang['now_just_you_can_see_this_post'][$dataUserPageLanguage];
			}else if($selectedWhs == 'friends'){
			    echo $page_Lang['now_just_your_friends_can_see_this_post'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['please_try_again_later_for_changing_visilility'][$dataUserPageLanguage];
			}
	   }else{
	        echo $page_Lang['please_try_again_later_for_changing_visilility'][$dataUserPageLanguage];
	   }
   }
}
}
?>

