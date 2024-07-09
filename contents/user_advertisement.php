<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php"; 
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : ''; 
//The following user updates 
if($page == 'of-ads'){
   $updatesarray= $Dot->Dot_UserAdvertisements($uid, $lastPostID);
   $morePageType = 'more_ads';
}
echo '<div class="postNewsFeed" id="morePostType" data-type="'.$morePageType.'">';
if($updatesarray){
 foreach($updatesarray as $u_ad) { 
	 include("html_user_advertisements.php");
 } 
}else{
   echo '<div class="noPost">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>';
}
echo '</div>';
?>