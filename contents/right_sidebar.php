<div class="COOzN theiaSidebar">
<div class="rightSidebarMobileContainer">
<div class="rightSidebarHeaderTop">
  <!--Right Header User Name STARTED-->
  <div class="_5743" style="width: auto;"><h2 class="rightSidebarHeaderTopTitle" id="js_6"><div class="_6f6l"><span class="_3oh-"><span>Menu</span></span></div></h2></div> 
   <ul class="_fl2"><li><span class="closeRightSideBarContainer"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></span></li></ul> 
</div>
<?php  
$completeAvatar = isset($data['user_avatar']) ? '1' : NULL;
$completeCover = isset($data['user_cover']) ? '1' : NULL;
$completeCountry = isset($data['country']) ? '1' : NULL;
$completeUserWord = isset($data['user_profile_word']) ? '1' : NULL;
$completeUserJobTitle = isset($data['user_job_title']) ? '1' : NULL; 
$completeUserBio = isset($data['user_bio']) ? '1' : NULL;  
if($data['user_relationship'] == 'unspecified'){$completeRelationShip = NULL;}else{$completeRelationShip = '1';}
$completeUserInterests = $Dot->Dot_GetUserInterestedList($uid) ? '1' : NULL; 
if($data['user_sexuality'] == 'unspecified'){$completeUserSexuality = NULL;}else{$completeUserSexuality = '1';}
$completeFullAddress = isset($data['shopping_full_address']) ? '1' : NULL ; 
$equal = (($completeAvatar+$completeCover+$completeCountry+$completeUserWord+$completeUserJobTitle+$completeUserInterests+$completeUserBio+$completeRelationShip+$completeUserSexuality+$completeFullAddress)*100)/10;
 
	// You can change the location of the fields below. 3351760274
	// You can use the name of your php file here if you want to add another field.
	// For example  include("yourwidgetfilename.php"); and paste after any include();
	// Profile Card Box 
	if($showHideProfileCard != '1'){
		include("user_profile_card.php");  
	} 
    include("html_birthdays.php");   
	if($equal != '100'){
	    include_once("html_profilecompletion.php");
	} 
	if($proSystemStatus == '1'){
	   include_once("html_pro_members.php");
	}    
	// Earning
	if($mostSponsoredPostDailyWidget == '1'){
	   include("post_sponsor_earning_widget.php");  
	} 
	// Suggested Products
	if($marketPost == 0){
	  include("products_widget.php");
	}
	if($sidebarWeather != '1'){
	   include("weather.php");
	}
	// Right Sidebar Menu
	 if($menuTypePosition == '0'){include("right_menu.php"); }
	// Ads Box
	include("adsCode.php");
	//User Created Events
	if($showHideEventFeature != '1'){
	  include("user_created_events.php"); 
	}
	// Upcoming Going and Interested Events
	include("user_going_interested_events.php"); 
	// Supponsored Advertisements
	include("suponsoredAds.php");
	// Online Friends
	include("onlineFriends.php");
	// Trending HashTags
	if($showHideTrendTags != '1'){
		include("trendingTags.php");
	} 
	// Suggested You May Know Users
	if($showHideYouMayKnowPeople != '1'){
	   include("you_may_know_users.php"); 
	}
	// Most Popular Post in a Week 
	if($showHideRadar !='1'){
       include("mostPopularPost.php"); 
	}
	// Footer Menus, you can use this box from all after the pages also.
	include("footer_menu.php"); 
?>
</div>
</div>