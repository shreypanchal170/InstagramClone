<?php  
$page ='newsfeed';
$pageMenu = 'menuhere';  
//This file is displayed on all pages, all the changes you make can be displayed on all pages.   
include_once '../functions/inc.php';  
include("../contents/header.php");   
?> 

<div class="profile_not_found">
    <div class="profile_not_found_title"><?php echo $page_Lang['sorry_this_page_is_not_available'][$dataUserPageLanguage];?></div>
    <div class="profile_not_found_note"><?php echo $page_Lang['this_page_may_have_been_removed'][$dataUserPageLanguage];?></div>
    <div class="page_not_found_image"><img src="<?php echo $base_url.'css/img/not_found.png';?>" title="<?php echo $page_Lang['this_page_may_have_been_removed'][$dataUserPageLanguage];?>"></div>
    <div class="suggest_page_links">
         <div class="suggest_page_link_box hvr-bounce-to-right"><a href="<?php echo $base_url;?>" title="<?php echo $page_Lang['go_main_page'][$dataUserPageLanguage];?>"><?php echo $page_Lang['go_main_page'][$dataUserPageLanguage];?></a></div>
         <div class="suggest_page_link_box hvr-bounce-to-left"><a href="<?php echo $base_url.'profile/'.$dataUsername;?>" title="<?php echo $page_Lang['go_profile_page'][$dataUserPageLanguage];?>"><?php echo $page_Lang['go_profile_page'][$dataUserPageLanguage];?></a></div>
    </div>
</div>

<?php  
// Here is some javascript codes
include("../contents/javascripts_vars.php");
?>
</body>
</html>