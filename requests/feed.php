<?php 
include_once '../functions/control.php';
include_once '../functions/inc.php'; 
$feedType = array("all","text","image","video","link","music");
$feed = array("newsfeed","profile");
if(in_array($_GET['feed'],$feedType) && in_array($_GET['type'], $feed) && isset($_GET['who']) && isset($_GET['id'])){
   $getFeed = mysqli_real_escape_string($db, $_GET['feed']);
   $feed = mysqli_real_escape_string($db, $_GET['type']);
   $getUID = mysqli_real_escape_string($db, $_GET['id']);
   $getUserName = mysqli_real_escape_string($db, $_GET['who']);
   if($feed == 'newsfeed'){
	   
   }
   /*Get Profile feed If user clicked from profile*/
   if($feed == 'profile'){
	  $CheckUserExistInData = $Dot->Dot_CheckUserExist($getUID,$getUserName);
	  if($CheckUserExistInData) {
	      $lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
		  if($getFeed == 'all'){
			  $updatesarray=$Dot->Dot_UserProfilePosts($getUID, $lastPostID);
			  $morePageType ='more_feeds';
		  }
		  if($getFeed == 'text'){
			  $updatesarray=$Dot->Dot_UserProfileTextPosts($getUID, $lastPostID);
			  $morePageType ='more_text';
		  }
		  if($getFeed == 'image'){
			  $updatesarray=$Dot->Dot_UserProfileImagePosts($getUID, $lastPostID);
			  $morePageType ='more_image';
		  } 
		  if($getFeed == 'video'){
			  $updatesarray=$Dot->Dot_UserProfileVideoPosts($getUID, $lastPostID);
			  $morePageType ='more_video';
		  } 
		  if($getFeed == 'link'){
			  $updatesarray=$Dot->Dot_UserProfileLinkPosts($getUID, $lastPostID);
			  $morePageType ='more_link';
		  } 
		  if($getFeed == 'music'){
			  $updatesarray=$Dot->Dot_UserProfileMusicPosts($getUID, $lastPostID);
			  $morePageType ='more_music';
		  } 
		  if($updatesarray){
				echo '<div  class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'">';
				 foreach($updatesarray as $PostFromData) {
					 $WhoCanSeeThisPost = $PostFromData['who_can_see_post'];
					 include("../contents/html_posts.php");
				 }
				'</div>';
		   }else{
			   echo '<div class="noPost postNewsFeed" id="morePostType">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>';
		  }
	  }else{
	      echo '400';
	  }
	   
   }
}
?>