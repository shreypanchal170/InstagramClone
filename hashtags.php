<?php 
//include_once 'functions/control.php';
include_once 'functions/inc.php';  
if(isset($_REQUEST['tag'])) {
  $hashTag = $_REQUEST['tag'];
  $showThisHashTag = $page_Lang['results_for_this_tag'][$dataUserPageLanguage].' #'.$hashTag;
}else {
	$hashTag = "";
	$showThisHashTag =  $page_Lang['results_for_this_tag'][$dataUserPageLanguage];
}
$pageMenu = 'menuhere';
$page = 'hashtags';
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
//This file is displayed on all pages, all the changes you make can be displayed on all pages.   
include("contents/header.php");   
?> 
<div class="section">
<div class="main">
 <div class="container">
      <!--MIDDLE STARTED-->
      <div class="cGcGK"> 
      <div class="_81kxQ"><?php echo $showThisHashTag;?></div>
      <div id="new_posts" data-tag="<?php echo $hashTag;?>">
	   <?php 
		   // It is a page where all pictures, videos, texts and similar things shared by people are displayed.
		   //The change you make here can be instantly viewed by everyone.
		   include("contents/post_hashtags.php");
       ?>
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