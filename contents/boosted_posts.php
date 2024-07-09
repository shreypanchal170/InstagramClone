<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php";
include_once "functions/clear.php"; 
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
 $r = 0;
//The following user updates 
if($page == 'boosted'){
	$updatesarray=$Dot->Dot_BoostedPosts($uid, $lastPostID);
	$morePageType = 'more_boosted'; 
}
echo '<div class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'">';
if($updatesarray){
 foreach($updatesarray as $PostFromData) { 
	 $WhoCanSeeThisPost = $PostFromData['who_can_see_post'];
	 include("html_boosted.php"); 
 } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>';
}
echo '</div>';
?>