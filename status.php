<?php 
session_start(); 
include_once("functions/config.php");
$page = 'status';
$statusPage = '';
if(isset($_COOKIE[$cookie_name])){   
    include_once("functions/inc.php");
	if($page == 'status'){
	   if(isset($_GET['msgID'])) {
			 $GetMessageID = mysqli_real_escape_string($db, $_GET['msgID']);
			 $postMetaDetail = $Dot->Dot_StatusPostSlug($GetMessageID);
			 $postMetaTitle = $postMetaDetail['post_title_text'];
			 $postMetaDescription = $postMetaDetail['post_text_details']; 
			 $postMetaImage =  isset($postMetaDetail['post_image_id']) ? $postMetaDetail['post_image_id'] : NULL;
			 $postMetaImageUrl=$Dot->Dot_GetUploadImageID($postMetaImage);
			 if($postMetaImageUrl){
			     $postMetaImage=$base_url."uploads/images/".$postMetaImageUrl['uploaded_image']; 
			 }else{
	             $postMetaImage=$base_url."uploads/images/no-image.png"; 
			 } 
			 $postContentUrl  = $base_url.'status/'.$GetMessageID;
			 if(!empty($postMetaTitle)){
				 $metaTitle = $postMetaTitle;
			 }elseif(!empty($postMetaDescription)){
				 $metaTitle = $postMetaDescription;
			 }elseif(empty($postMetaTitle) && empty($postMetaDescription)){
				 $metaTitle = $dot_title;
			 }else{
			     $metaTitle = $dot_title;
			 }
		}
	}else{
	    $metaTitle = $dot_title;
		$postMetaDescription = $dot_description;
		$postContentUrl = $base_url;
	}
	include_once("contents/header.php"); 
	$statusPage = '1';
} else{   
	include_once 'functions/html_code.php'; 
	include_once 'functions/clear.php';  
	include_once 'o_expand.php'; 
	include_once("functions/functions.php");
    $Dot = new DOT_UPDATES($db);  
    $hash = '';
	$hash = mysqli_real_escape_string($db, $_COOKIE[$cookie_name]);
	date_default_timezone_set('UTC'); 
    $uid = $Dot->Dot_UserIDFromHash($hash); 
	$page_Lang =  $Dot->Dot_Languages();   
    $duhovit = $Dot->Dot_Configurations(); 
	$pagesDefaultLanguage = $duhovit['default_lang'];
	$loginTheme = $duhovit['wellcome_theme'];
	$dot_logo = $duhovit['script_logo'];
	$dot_title = $duhovit['script_title'];
	$dot_description = $duhovit['site_description'];
	$dot_googleMapApi = $duhovit['google_map_api'];
	$dot_googleAnalyticsCode = $duhovit['google_analytics_code']; 
    $_SESSION['user_id'] = $uid; 
	$styleMode = 'style';
	if($page == 'status'){
	   if(isset($_GET['msgID'])) {
			 $GetMessageID = mysqli_real_escape_string($db, $_GET['msgID']);
			 $postMetaDetail = $Dot->Dot_StatusPostSlug($GetMessageID);
			 $postMetaTitle = $postMetaDetail['post_title_text'];
			 $postMetaDescription = $postMetaDetail['post_text_details']; 
			 $postMetaImage =  isset($postMetaDetail['post_image_id']) ? $postMetaDetail['post_image_id'] : NULL;
			 $postMetaImageUrl=$Dot->Dot_GetUploadImageID($postMetaImage);
			 if($postMetaImageUrl){
			     $postMetaImage=$base_url."uploads/images/".$postMetaImageUrl['uploaded_image']; 
			 }else{
	             $postMetaImage=$base_url."uploads/images/no-image.png"; 
			 } 
			  $postContentUrl  = $base_url.'status/'.$GetMessageID;
			 if(!empty($postMetaTitle)){
				 $metaTitle = $postMetaTitle;
			 }elseif(!empty($postMetaDescription)){
				 $metaTitle = $postMetaDescription;
			 }elseif(empty($postMetaTitle) && empty($postMetaDescription)){
				 $metaTitle = $dot_title;
			 }else{
			     $metaTitle = $dot_title;
			 }
		}
	}
   include_once("contents/headerOut.php");
}
echo '
<div class="section">
   <div class="main">
        <div class="container">
           <div class="statusPostContainer">
';
if(isset($_GET['msgID'])) {
	 $GetMessageID = mysqli_real_escape_string($db, $_GET['msgID']);
	 $PostFromData = $Dot->Dot_StatusPostSlug($GetMessageID);
	 if($PostFromData){
		   if($statusPage == '1'){
			   include_once("contents/html_posts.php"); 
		   }else{
		      include_once("contents/html_post_out.php");
		   }
	 }else{
         echo '<div class="noPostFounded"><img src="'.$base_url.'css/img/404.png"></div>';
	 }
     include_once("contents/javascripts_vars.php");
} 
echo '</div>
      </div>
   </div>
</div>
';
?>  
<script type="text/javascript">
$(document).ready(function(){ 
// Read more
$("body").on("click",".showMoreText", function(){
	   var title = $(this).attr("title");
	   var ID = $(this).attr("id");
	   var more = $(this).attr("data-more");
	   var less = $(this).attr("data-less");
	   if(title == 'more'){
		     $(".post_info"+ID).removeClass("readmore").addClass("all_text"); 
			 $(this).attr("title",'less');
			 $(".cht_"+ID).html(more);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M19.2,96c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8zM100.5248,65.8752l38.4,38.4c1.248,1.248 1.8752,2.8864 1.8752,4.5248c0,1.6384 -0.6272,3.2768 -1.8752,4.5248c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0l-33.8752,-33.8752l-33.8752,33.8752c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496l38.4,-38.4c2.5024,-2.5024 6.5472,-2.5024 9.0496,0z"></path></g></g></svg>');
	   }else{
	         $(".post_info"+ID).addClass("readmore").removeClass("all_text");
			 $(this).attr("title",'more');
			 $(".cht_"+ID).html(less);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg>');
	   }
}); 
});
</script>
</body>
</html>