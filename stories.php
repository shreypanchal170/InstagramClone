<?php  
include_once 'functions/inc.php'; 
if(empty($uid)){
   header("Location: $base_url");   
}
$page = 'stories';  
$pageMenu = 'menuhere';  
if(isset($_GET['username'])) { 
$username=$_GET['username']; 
include_once 'functions/get_profile.php';  
if(empty($profileUserID)) {   
	  header("Location:".$base_url."sources/not-found.php");   
 }
}else{
      header("Location:".$base_url."sources/not-found.php");   
}
$FriendStatus = $Dot->Dot_FriendStatus($uid,$profileUserID);
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
function getCurrentOrParentDirectory($type='current')
{
    if ($type == 'current') {
        $path = dirname(__FILE__);  
    } else {
        $path = dirname(dirname(__FILE__));
    }
    $position = strrpos($path, '/') + 1;
    return substr($path, $position);
}  
include_once("contents/header.php");
?>  
<div class="section">
<div class="main">
 <div class="container"> 
      <!--MIDDLE STARTED-->
      <div class="cGcGK"> 
      <div class="_81kxQ" style="padding-right:0px;">
        <div class="pageOn">
            <div class="storyPage_avatar show_card" id="<?php echo $profileUserID;?>" data-user="<?php echo $ProfileUserName;?>" data-type="userCard">
              <a href="<?php echo $base_url.'profile/'.$ProfileUserName;?>" title="<?php echo $ProfileUserFullName;?>"><img class="_6q-tv" src="<?php echo $ProfileUserAvatar;?>" alt="<?php echo $ProfileUserFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a>
              <span class="mewfM Szr5J  coreSpriteVerifiedBadgeSmall icons" title="<?php echo $page_Lang['verified'][$dataUserPageLanguage];?>"></span>
            </div>
            <div class="pageOnUserName"><a class="nJAzx" title="<?php echo $ProfileUserFullName;?>" href="<?php echo $base_url.'profile/'.$ProfileUserName;?>"><?php echo $ProfileUserFullName;?></a></div>
            <div class="storiesOnTitle"><?php echo $page_Lang['my_stories'][$dataUserPageLanguage];?></div>
        </div> 
      </div>
      <div id="u_story" data-pui="<?php echo $profileUserID;?>">
	   <?php include("contents/story_posts.php");  ?>
        </div>    
      </div>
      <!--MIDDLE FINISHED-->
      <!--RIGHT SIDEBAR STARTED-->
      <?php 
         // These areas are the integrated states of all the boxes on the right side.
          include("contents/right_sidebar.php");
      ?>
      <!--RIGHT SIDEBAR FINISHED-->
 </div>
</div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");   
?>    
</body>
</html>