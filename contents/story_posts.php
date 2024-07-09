<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php"; 
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : ''; 
//The following user updates 
if($page == 'stories'){
   $updatesarray= $Dot->Dot_SotriesPosts($profileUserID, $lastPostID);
   $morePageType = 'more_stories';
}
echo '<div class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'">';
if($updatesarray){
 foreach($updatesarray as $storyFromData) { 
	 include("html_stories.php");
 } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>';
}
echo '</div>';
?>