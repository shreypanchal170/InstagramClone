<?php 
//include_once 'functions/control.php';
include_once "../functions/inc.php";
include_once "../functions/clear.php"; 
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
 $r = 0;
//The following user updates
if($page == 'newsfeed'){
	$updatesarray=$Dot->Dot_AllFriendsPost($uid, $lastPostID);
	$morePageType = 'more_feeds';
}
if($page == 'profile'){
	$updatesarray=$Dot->Dot_UserProfilePosts($profileUserID, $lastPostID);
	$morePageType = 'more_profilePosts';
}
if($page == 'saved'){
	$updatesarray=$Dot->Dot_SavedPosts($uid, $lastPostID);
	$morePageType = 'more_favourites';
}  
if($page == 'event'){
	$updatesarray=$Dot->Dot_AllFriendsPost($uid, $lastPostID);
	$morePageType = 'more_events';
}  
echo '<div class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'">';
if($updatesarray){
 foreach($updatesarray as $PostFromData) { 
	 $WhoCanSeeThisPost = $PostFromData['who_can_see_post'];
	 include("html_posts.php"); 
 } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>';
}
echo '</div>';
?>