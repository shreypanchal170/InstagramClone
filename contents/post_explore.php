<?php 
//include_once 'functions/control.php';
include_once "functions/inc.php";
$lastPostID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';  
$updatesarray=$Dot->Dot_PageExplorePosts($uid, $lastPostID); 
if($updatesarray){
 foreach($updatesarray as $PostFromData) { 
	 include("html_explore.php");
 } 
}else{
   echo '<div class="post_explore_box">
  <div class="post_explore_box_in">
     <div class="noPost">'.$page_Lang['no_post_yet'][$dataUserPageLanguage].'</div>
  </div>
</div>';
} 
?>
