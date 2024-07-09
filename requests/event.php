<?php   
include_once '../functions/inc.php'; 
include_once '../functions/clear.php';  
$postTypes = array("text","video","audio","image","link","filter","giphyPost","myLocation","watermark","which_image","bfaf_image","event_text","event_image","event_video","event_audio","event_link","event_filter","event_giphyPost","myEventLocation","event_watermark","which_event_image","newProduct");
$WhoCanSee = array("everyone","onlyme","friends");
function random_code($length)
{
  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
}
if(in_array($_POST['f'], $postTypes) && in_array($_POST['show'], $WhoCanSee)){
     $type = mysqli_real_escape_string($db, $_POST['f']); 
	 //Create New Text Post
	 if($type == 'text'){
	      if(isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostDetails = isset($postDetails) ? trim($postDetails) : false;
				$strPostText = isset($postTitle) ? trim($postTitle) : false;
				if(empty($strPostDetails)){
				    if(empty($strPostText)){
						echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_text_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit();
				     }
				} 
				$PostFromData = $Dot->Dot_TextPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$slug,$userFeeling);  
				if($PostFromData){
					 $mentionPostID = $PostFromData['user_post_id'];
				     $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					 if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				     include("../contents/html_posts.php"); 
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		  }
	  }  
	  //Create New Image Post
	  if($type == 'image'){ 
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
				$userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}
				if(empty($UploadValues)){ 
					  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_photo'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit(); 
				}
				$PostFromData = $Dot->Dot_ImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$slug,$userFeeling); 
				if($PostFromData){
					$mentionPostID = $PostFromData['user_post_id'];
				   $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				   include("../contents/html_posts.php"); 
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		 }
	  }
	  //Create New Link Post
	  if($type == 'link'){  
		if(isset($_POST['l_title']) && isset($_POST['l_summary']) && isset($_POST['p_d']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['ln']) && isset($_POST['tumb']) && isset($_POST['min'])){
		        $postLinkTitle = htmlcode(mysqli_real_escape_string($db, $_POST['l_title']));
				$postLinkDescription  = mysqli_real_escape_string($db, $_POST['l_summary']);
				$postDescription  = mysqli_real_escape_string($db, $_POST['p_d']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tag']);
				$postLinkLink = mysqli_real_escape_string($db, $_POST['ln']);
				$postLinkimg = mysqli_real_escape_string($db, $_POST['tumb']);
				$postMiniLink = mysqli_real_escape_string($db, $_POST['min']);
				$userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDescription);
				if(!empty($postLinkTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postLinkTitle);
				}elseif(!empty($postDescription)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDescription);
				}elseif (empty($postLinkTitle) && empty($postDescription)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostDetails = isset($postLinkLink) ? trim($postLinkLink) : false;
				$strPostText = isset($postMiniLink) ? trim($postMiniLink) : false;
				if(empty($postLinkLink)){
				    if(empty($strPostText)){
						echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_write_a_link'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit();
				     }
				}
				$PostFromData = $Dot->Dot_LinkPostSave($uid,$postLinkTitle, $postLinkDescription,$canSee, $postTags, $postLinkLink, $postLinkimg, $tags, $postDetailsHtml,$postMiniLink,$slug,$userFeeling); 
				if($PostFromData){
				    $mentionPostID = $PostFromData['user_post_id'];
				    $Dot->Dot_InsertMentionedUsersForPost($uid,$postDescription, $type, $mentionPostID, $dataUsername);
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);}  
				    include("../contents/html_posts.php");
				}else{
				    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}				
		}	  
	  }
	  //Create New Video Post
	  if($type == 'video'){ 
		 if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['vm']) && isset($_POST['vis'])){
		       $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
			   $postDetails  = mysqli_real_escape_string($db, $_POST['description']);
			   $postTags  = mysqli_real_escape_string($db, $_POST['tag']);
			   $canSee = mysqli_real_escape_string($db, $_POST['show']);
			   $videoScreenShot = mysqli_real_escape_string($db, $_POST['vis']);
			   $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
			   $tags = hashtag($postTags);
			   $postDetailsHtml = htmlcode($postDetails);
			   if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
			   $UploadeVideoID = mysqli_real_escape_string($db, $_POST['vm']);
			   if(empty($UploadeVideoID)){ 
					   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['yous_shoud_upload_vide_here'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				       exit(); 
				} 
			   $PostFromData = $Dot->Dot_VideoPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeVideoID,$slug,$userFeeling,$videoScreenShot); 
			   if($PostFromData){
			       $mentionPostID = $PostFromData['user_post_id'];
			       $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername);  
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
			       include("../contents/html_posts.php"); 
			   }else{
			       echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
			   }
		 }
	  }
	  //Create New music Post
	  if($type == 'audio'){ 
		 if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['vm'])){
		       $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
			   $postDetails  = mysqli_real_escape_string($db, $_POST['description']);
			   $postTags  = mysqli_real_escape_string($db, $_POST['tag']);
			   $canSee = mysqli_real_escape_string($db, $_POST['show']);
			   $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
			   $tags = hashtag($postTags);
			   $postDetailsHtml = htmlcode($postDetails);
			   if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
			   $UploadeMusicID = mysqli_real_escape_string($db, $_POST['vm']);
			   if(empty($UploadeMusicID)){ 
					   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_audio'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				       exit();
			   } 
			   $PostFromData = $Dot->Dot_MusicPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeMusicID,$slug,$userFeeling); 
			   if($PostFromData){
				  $mentionPostID = $PostFromData['user_post_id'];
				  $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				  if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
			      include("../contents/html_posts.php"); 
			   }else{
			     echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	  
			  } 
		 }
	  }
	   //Create New Image Post
	  if($type == 'filter'){
		 $filters = array("first","second","third","fourth","fifth","sixth","seventh","eighth","ninth","tenth","eleventh","thirteenth","fourteenth","fifteenth");
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && in_array($_POST['fil'], $filters)){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$filter = mysqli_real_escape_string($db, $_POST['fil']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
				$strPostText = isset($UploadValues) ? trim($UploadValues) : false;
				if(empty($UploadValues)){ 
					  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_filter_image'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit(); 
				} 
				$PostFromData = $Dot->Dot_FilteredImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$filter,$slug,$userFeeling);
				if($PostFromData){
				    $mentionPostID = $PostFromData['user_post_id'];
				    $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				    include("../contents/html_posts.php");
				}else{
				    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	  
				}
		 } 
	  }
	  // Create New Gif Post
	  if($type == 'giphyPost'){
		 if(isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['animateImage'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$animateImage = mysqli_real_escape_string($db, $_POST['animateImage']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails); 
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPost = isset($animateImage) ? trim($animateImage) : false;
				if(empty($strPost)){ 
					 echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_select_gif'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				    exit(); 
				}  
				$headers = get_headers($animateImage, 1);  
				 if (strpos($headers['Content-Type'], 'image/') !== false) {
						$PostFromData = $Dot->Dot_GifPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee, $animateImage,$slug,$userFeeling); 
						if($PostFromData){
				            $mentionPostID = $PostFromData['user_post_id'];
						    $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
							if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
						     include("../contents/html_posts.php");  
				        }else{
						   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
						}
						
				 }  
		  }
	  }
	  // Create New Location Post
	  if($type == 'myLocation'){
	      if(isset($_POST['place']) && isset($_POST['aboutplace']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['lat']) && isset($_POST['long'])){
		        $postLocationPlace = mysqli_real_escape_string($db, $_POST['place']);
				$postAboutLocation  = mysqli_real_escape_string($db, $_POST['aboutplace']);
				$postLat = mysqli_real_escape_string($db, $_POST['lat']);
				$postLong = mysqli_real_escape_string($db, $_POST['long']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostPlace = isset($postLocationPlace) ? trim($postLocationPlace) : false;
				$strPostAboutLocation = isset($postAboutLocation) ? trim($postAboutLocation) : false;
				$strPostLatitude = isset($postLat) ? trim($postLat) : false;
				$strPostLongitude = isset($postLong) ? trim($postLong) : false; 
				if(empty($strPostLatitude)){ 
				    if(empty($strPostLongitude)){
					    if(empty($strPostPlace)){
						    if(empty($strPostAboutLocation)){
						        echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_write_location'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				                exit();
							}
						}
					} 
				}  
				$PostFromData = $Dot->Dot_LocationPostSave($uid, $postLocationPlace, $postAboutLocation, $postTags, $tags,$canSee, $postLat, $postLong,$slug,$userFeeling); 
				if($PostFromData){
				    $mentionPostID = $PostFromData['user_post_id'];
				    $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				     include("../contents/html_posts.php"); 
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
				
		  }
	  }
	  // Create New Watermark Post
	  if($type == 'watermark'){
	      if(isset($_POST['details']) && isset($_POST['wt']) && isset($_POST['tags']) && isset($_POST['show'])){ 
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$waterMarkID = mysqli_real_escape_string($db, $_POST['wt']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				$slug = 'p_'.random_code(8).'_'.url_slug($postDetails);   
				
				$strPostMarkID = isset($waterMarkID) ? trim($waterMarkID) : false; 
				$strPostMarkText = isset($postDetails) ? trim($postDetails) : false; 
				 if(empty($strPostMarkID)){ exit(); }
				 if(empty($strPostMarkText)){ 
				     echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_watermark_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	  
				     exit(); 
				 }
				$PostFromData = $Dot->Dot_WaterMarkPostSave($uid, $postDetailsHtml, $postTags, $tags,$canSee,$slug,$waterMarkID,$userFeeling); 
				if($PostFromData){
				    $mentionPostID = $PostFromData['user_post_id'];
				    $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				     include("../contents/html_posts.php"); 
				}else{
			       echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	  
				}
		   }
	  }
	  //Create New Which Image Post
	  if($type == 'which_image'){
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['category'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
				$whichCategory = mysqli_real_escape_string($db, $_POST['category']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
				$strPostVal = isset($UploadValues) ? trim($UploadValues) : false; 
				 if(empty($strPostVal)){  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_benchmark_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	  exit(); }
				$explodeImage = explode(',', trim($UploadValues, ",")); 
				$num_tags = count($explodeImage);  
				$checkNumeric = preg_replace('/[ ,]+/', '', $UploadValues); 
				if($num_tags == 2 && is_numeric($checkNumeric)){
						$PostFromData = $Dot->Dot_WhichImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$slug,$whichCategory,$userFeeling);
						if($PostFromData){
						    $mentionPostID = $PostFromData['user_post_id'];
						    $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
							if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
						    include("../contents/html_posts.php");
						}else{
						    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	 
						}
						
				} 
		 }
	  }
	   //Create New Which Image Post
	  if($type == 'bfaf_image'){
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']); 
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
				$strPostVal = isset($UploadValues) ? trim($UploadValues) : false; 
				 if(empty($strPostVal)){ echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_an_bf_images'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>'; exit(); }
				        $lastComma = rtrim($UploadValues,',');
						$PostFromData = $Dot->Dot_BeforeAfterImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$lastComma,$slug,$userFeeling);
						if($PostFromData){
						    $mentionPostID = $PostFromData['user_post_id'];
						    $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
							if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
						    include("../contents/html_posts.php");
						}else{
						    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
						}
						
			 
		 }
	  }
	  //Create New Event Text Post
	 if($type == 'event_text'){
	      if(isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['eventID'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostDetails = isset($postDetails) ? trim($postDetails) : false;
				$strPostText = isset($postTitle) ? trim($postTitle) : false;
				if(empty($strPostDetails)){
				    if(empty($strPostText)){
						echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_text_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit();
				     }
				} 
				
				$PostFromData = $Dot->Dot_EventTextPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$slug,$eventPageID,$userFeeling); 
				if($PostFromData){
					$mentionPostID = $PostFromData['user_post_id'];
				    $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				    include("../contents/html_posts.php"); 
			    }else{
				     echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		  }
	  }
	  //Create New Image Post
	  if($type == 'event_image'){
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['eventID'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostDetails = isset($UploadValues) ? trim($UploadValues) : false;
				if(empty($strPostDetails)){ 
					 echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_photo'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit(); 
				}
				$PostFromData = $Dot->Dot_EventImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$slug,$eventPageID,$userFeeling);
				if($PostFromData){ 
				   $mentionPostID = $PostFromData['user_post_id'];
				   $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				   include("../contents/html_posts.php");
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		 }
	  }
	  //Create New Event Video Post
	  if($type == 'event_video'){ 
		 if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['vm']) && isset($_POST['eventID'])){
		       $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
			   $postDetails  = mysqli_real_escape_string($db, $_POST['description']);
			   $postTags  = mysqli_real_escape_string($db, $_POST['tag']);
			   $canSee = mysqli_real_escape_string($db, $_POST['show']);
				$eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
			   $tags = hashtag($postTags);
			   $postDetailsHtml = htmlcode($postDetails);
			   if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
			   $UploadeVideoID = mysqli_real_escape_string($db, $_POST['vm']); 
			   $strPostDetails = isset($UploadeVideoID) ? trim($UploadeVideoID) : false;
			   if(empty($strPostDetails)){ 
					  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['yous_shoud_upload_vide_here'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				       exit(); 
				} 
			   $PostFromData = $Dot->Dot_EventVideoPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeVideoID,$slug,$eventPageID,$userFeeling); 
			   if($PostFromData){
			       $mentionPostID = $PostFromData['user_post_id'];
			       $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername);  
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
			      include("../contents/html_posts.php"); 
			   }else{
			       echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
			   }
			   
		 }
	  }
	  //Create New Event music Post
	  if($type == 'event_audio'){ 
		 if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['vm']) && isset($_POST['eventID'])){
		       $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
			   $postDetails  = mysqli_real_escape_string($db, $_POST['description']);
			   $postTags  = mysqli_real_escape_string($db, $_POST['tag']);
			   $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			   $canSee = mysqli_real_escape_string($db, $_POST['show']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
			   $tags = hashtag($postTags);
			   $postDetailsHtml = htmlcode($postDetails);
			   if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
			   $UploadeMusicID = mysqli_real_escape_string($db, $_POST['vm']);
			   $strPostDetails = isset($UploadeMusicID) ? trim($UploadeMusicID) : false;
			   if(empty($strPostDetails)){ 
					   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_audio'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				       exit();
			   }
			   $PostFromData = $Dot->Dot_EventMusicPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadeMusicID,$slug,$eventPageID,$userFeeling); 
			   if($PostFromData){
				   $mentionPostID = $PostFromData['user_post_id'];
				   $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
			       include("../contents/html_posts.php");
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		 }
	  }
	  //Create New Event Link Post
	  if($type == 'event_link'){  
		if(isset($_POST['l_title']) && isset($_POST['l_summary']) && isset($_POST['p_d']) && isset($_POST['show']) && isset($_POST['tag']) && isset($_POST['ln']) && isset($_POST['tumb']) && isset($_POST['min']) && isset($_POST['eventID'])){
		        $postLinkTitle = htmlcode(mysqli_real_escape_string($db, $_POST['l_title']));
				$postLinkDescription  = mysqli_real_escape_string($db, $_POST['l_summary']);
				$postDescription  = mysqli_real_escape_string($db, $_POST['p_d']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tag']);
				$postLinkLink = mysqli_real_escape_string($db, $_POST['ln']);
				$postLinkimg = mysqli_real_escape_string($db, $_POST['tumb']);
				$postMiniLink = mysqli_real_escape_string($db, $_POST['min']);
			   $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDescription);
				if(!empty($postLinkTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postLinkTitle);
				}elseif(!empty($postDescription)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDescription);
				}elseif (empty($postLinkTitle) && empty($postDescription)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostLink = isset($postLinkLink) ? trim($postLinkLink) : false;
				$strPostLinkMini = isset($postMiniLink) ? trim($postMiniLink) : false;
				if(empty($strPostLink)){
				    if(empty($strPostLinkMini)){
						echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_write_a_link'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				        exit();
				     }
				} 
				$PostFromData = $Dot->Dot_EventLinkPostSave($uid,$postLinkTitle, $postLinkDescription,$canSee, $postTags, $postLinkLink, $postLinkimg, $tags, $postDetailsHtml,$postMiniLink,$slug,$eventPageID,$userFeeling); 
				if($PostFromData){
				   $mentionPostID = $PostFromData['user_post_id'];
				   $Dot->Dot_InsertMentionedUsersForPost($uid,$postDescription, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				   include("../contents/html_posts.php");
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		}	  
	  }
	   //Create New Image Post
	  if($type == 'event_filter'){
		 $filters = array("first","second","third","fourth","fifth","sixth","seventh","eighth","ninth","tenth","eleventh","thirteenth","fourteenth","fifteenth");
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && in_array($_POST['fil'], $filters) && isset($_POST['eventID'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$filter = mysqli_real_escape_string($db, $_POST['fil']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
			   $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostText = isset($UploadValues) ? trim($UploadValues) : false;
				if(empty($UploadValues)){ 
						echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_upload_filter_image'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit(); 
				}  
				$PostFromData = $Dot->Dot_EventFilteredImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$filter,$slug,$eventPageID,$userFeeling);
				if($PostFromData){
				     $mentionPostID = $PostFromData['user_post_id'];
				     $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
					 if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				     include("../contents/html_posts.php");
				}else{
				     echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
				
		 } 
	  }
	  // Create New Event Gif Post
	  if($type == 'event_giphyPost'){
		 if(isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['animateImage']) && isset($_POST['eventID'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$animateImage = mysqli_real_escape_string($db, $_POST['animateImage']);
			   $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails); 
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
				$strPost = isset($animateImage) ? trim($animateImage) : false;
				if(empty($strPost)){ 
					 echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_select_gif'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				    exit(); 
				}  
				$headers = get_headers($animateImage, 1);  
				 if (strpos($headers['Content-Type'], 'image/') !== false) {
						$PostFromData = $Dot->Dot_EventGifPostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee, $animateImage,$slug,$eventPageID,$userFeeling); 
						if($PostFromData){
						$mentionPostID = $PostFromData['user_post_id'];
						$InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
						if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
						 include("../contents/html_posts.php");  
						}else{
						   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
						}
				 }   
		  }
	  }
	  // Create New Location Post
	  if($type == 'myEventLocation'){
	      if(isset($_POST['place']) && isset($_POST['aboutplace']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['lat']) && isset($_POST['long']) && isset($_POST['eventID'])){
		        $postLocationPlace = mysqli_real_escape_string($db, $_POST['place']);
				$postAboutLocation  = mysqli_real_escape_string($db, $_POST['aboutplace']);
				$postLat = mysqli_real_escape_string($db, $_POST['lat']);
				$postLong = mysqli_real_escape_string($db, $_POST['long']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
			    $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				} 
				$strPostPlace = isset($postLocationPlace) ? trim($postLocationPlace) : false;
				$strPostAboutLocation = isset($postAboutLocation) ? trim($postAboutLocation) : false;
				$strPostLatitude = isset($postLat) ? trim($postLat) : false;
				$strPostLongitude = isset($postLong) ? trim($postLong) : false; 
				if(empty($strPostLatitude)){ 
				    if(empty($strPostLongitude)){
					    if(empty($strPostPlace)){
						    if(empty($strPostAboutLocation)){
						        echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_write_location'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				                exit();
							}
						}
					} 
				}
				$PostFromData = $Dot->Dot_EventLocationPostSave($uid, $postLocationPlace, $postAboutLocation, $postTags, $tags,$canSee, $postLat, $postLong,$slug,$eventPageID,$userFeeling); 
				if($PostFromData){
				  $mentionPostID = $PostFromData['user_post_id'];
				   $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				   include("../contents/html_posts.php"); 
				}else{
				    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
				
		  }
	  }
	  // Create New Watermark Post
	  if($type == 'event_watermark'){
	      if(isset($_POST['details']) && isset($_POST['wt']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['eventID'])){ 
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$waterMarkID = mysqli_real_escape_string($db, $_POST['wt']);
			    $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				$slug = 'p_'.random_code(8).'_'.url_slug($postDetails);  
				if(empty($strPostMarkID)){ exit(); }
				 if(empty($strPostMarkText)){  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_watermark_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';	   exit(); } 
				$PostFromData = $Dot->Dot_EventWaterMarkPostSave($uid, $postDetailsHtml, $postTags, $tags,$canSee,$slug,$waterMarkID,$eventPageID,$userFeeling); 
				if($PostFromData){
				   $mentionPostID = $PostFromData['user_post_id'];
				   $InsertMentions = $Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
				   if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
				    include("../contents/html_posts.php");
				}else{echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';} 
		  }
	  }
	  //Create New Which Image Post
	  if($type == 'which_event_image'){
	     if(isset($_POST['uploads']) && isset($_POST['title']) && isset($_POST['details']) && isset($_POST['tags']) && isset($_POST['show']) && isset($_POST['category']) && isset($_POST['eventID'])){
		        $postTitle = htmlcode(mysqli_real_escape_string($db, $_POST['title']));
				$postDetails  = mysqli_real_escape_string($db, $_POST['details']);
				$postTags  = mysqli_real_escape_string($db, $_POST['tags']);
				$canSee = mysqli_real_escape_string($db, $_POST['show']);
				$UploadValues = mysqli_real_escape_string($db, $_POST['uploads']);
				$whichCategory = mysqli_real_escape_string($db, $_POST['category']);
			    $eventPageID = mysqli_real_escape_string($db, $_POST['eventID']);
			    $userFeeling = mysqli_real_escape_string($db, $_POST['myFeeling']);
				$tags = hashtag($postTags);
				$postDetailsHtml = htmlcode($postDetails);
				if(!empty($postTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postTitle);
				}elseif(!empty($postDetails)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($postDetails);
				}elseif (empty($postTitle) && empty($postDetails)){
				    $slug = 'p_'.random_code(8);
				}  
				$strPostVal = isset($UploadValues) ? trim($UploadValues) : false; 
				 if(empty($strPostVal)){ echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_benchmark_post'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>'; exit(); }
				$explodeImage = explode(',', trim($UploadValues, ",")); 
				$num_tags = count($explodeImage);  
				$checkNumeric = preg_replace('/[ ,]+/', '', $UploadValues); 
				if($num_tags == 2 && is_numeric($checkNumeric)){
						$PostFromData = $Dot->Dot_EventWhichImagePostSave($uid, $postTitle, $postDetailsHtml, $postTags, $tags,$canSee,$UploadValues,$slug,$whichCategory,$eventPageID,$userFeeling);
						if($PostFromData){
						$mentionPostID = $PostFromData['user_post_id'];
						$Dot->Dot_InsertMentionedUsersForPost($uid,$postDetails, $type, $mentionPostID, $dataUsername); 
						if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$mentionPostID);} 
						include("../contents/html_posts.php");
						}else{echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';}
				} 
		 }
	  }  
}
if(in_array($_POST['mpro'], $postTypes)){ 
	 $type = mysqli_real_escape_string($db, $_POST['mpro']); 
	   //Create New Image Post
	  if($type == 'newProduct'){  
	     if(isset($_POST['ppric']) && isset($_POST['pti']) && isset($_POST['prid']) && isset($_POST['prCat']) && isset($_POST['uploads']) && isset($_POST['mstatus']) && isset($_POST['place'])){
		        $productTitle = htmlcode(mysqli_real_escape_string($db, $_POST['pti'])); 
				$productDescription = mysqli_real_escape_string($db, $_POST['prid']);
				$productCategory = mysqli_real_escape_string($db, $_POST['prCat']);  
				$productImageValues = mysqli_real_escape_string($db, $_POST['uploads']);  
				$productPrice = mysqli_real_escape_string($db, $_POST['ppric']); 
				$productMessageStatus = mysqli_real_escape_string($db, $_POST['mstatus']);
				$productPlace = mysqli_real_escape_string($db, $_POST['place']); 
				$productDescriptionHtml = htmlcode($productDescription);
				if(!empty($productTitle)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($productTitle);
				}elseif(!empty($productDescription)){
				    $slug = 'p_'.random_code(8).'_'.url_slug($productDescription);
				}elseif (empty($productTitle) && empty($productDescription)){
				    $slug = 'p_'.random_code(8);
				}
				if(!is_numeric($productPrice)){
				    echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_should_write_product_price'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
					exit();
				}
				if(empty($productImageValues) || empty($productTitle) || empty($productDescription) || empty($productCategory) || empty($productPrice) || empty($productMessageStatus) || empty($productPlace) || empty($productCurrency)){ 
					  echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['you_can_not_send_empty_product'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				      exit(); 
				}
				$PostFromData = $Dot->Dot_MarketPlaceProductSave($uid, $productTitle, $productDescriptionHtml,$productImageValues,$slug, $productCategory,$productPrice,$productMessageStatus, $productPlace); 
				if($PostFromData){ 
				    $postIDProduct = $PostFromData['user_post_id'];
					if($pointVoteStatus == '1'){$addPoint = $Dot->Dot_AddPoint($uid, 'post', $pointPost,$postIDProduct);} 
				   include("../contents/html_posts.php"); 
				}else{
				   echo '<span class="noteBox_alert ev_alert"><span class="iconexcla"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></span><span class="exclanote">'.$page_Lang['please_try_again_later'][$dataUserPageLanguage].'</span>
      <div class="noteeBox_alert_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.63167,0 -71.66667,32.035 -71.66667,71.66667c0,39.63167 32.035,71.66667 71.66667,71.66667c39.63167,0 71.66667,-32.035 71.66667,-71.66667c0,-39.63167 -32.035,-71.66667 -71.66667,-71.66667zM119.7335,109.59983c2.80217,2.80217 2.80217,7.3315 0,10.13367c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983l-23.59983,-23.59983l-23.59983,23.59983c-1.3975,1.3975 -3.23217,2.09983 -5.06683,2.09983c-1.83467,0 -3.66933,-0.70233 -5.06683,-2.09983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367l23.59983,-23.59983l-23.59983,-23.59983c-2.80217,-2.80217 -2.80217,-7.3315 0,-10.13367c2.80217,-2.80217 7.3315,-2.80217 10.13367,0l23.59983,23.59983l23.59983,-23.59983c2.80217,-2.80217 7.3315,-2.80217 10.13367,0c2.80217,2.80217 2.80217,7.3315 0,10.13367l-23.59983,23.59983z"></path></g></g></svg></div>
      </span>';
				}
		 }
	  }
}	
?>