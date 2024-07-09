<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php";
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
if(isset($_REQUEST['tag'])) {
  $hashTag = $_REQUEST['tag'];
} else {
	$hashTag = "";
}
$morePageType ='';
//The following user updates
if($page == 'hashtags'){
	$updatesarray=$Dot->Dot_GetHashTags($lastPostID, $hashTag);
	$morePageType = 'more_tags'; 
} 
echo '<div class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'" data-tag="'.$hashTag.'">';
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